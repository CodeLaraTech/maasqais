<?php

namespace Modules\LMS\Livewire\Courses;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\LMS\Models\Course;
use Modules\LMS\Models\Instructor;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;

    public $course = [];
    public $image;
    public $instructors = [];

    public function mount(Course $course)
    {
        $this->instructors = Instructor::all();

        // Initialize course data
        $this->course = $course->toArray();

        // Fill translatable fields
        $this->course['name'] = $course->getTranslations('name');
        $this->course['description'] = $course->getTranslations('description');

        // Assign related instructor IDs
        $this->course['instructor_ids'] = $course->instructors->pluck('id')->toArray();
    }

    public function generateSlug()
    {
        if (!empty($this->course['name']['en'])) {
            $this->course['slug'] = Str::slug($this->course['name']['en']);
        }
    }

    public function update()
    {
        // Validation
        $this->validate([
            'course.name.en' => 'required|string|max:255',
            'course.slug' => 'required|string|unique:courses,slug,' . $this->course['id'],
            'course.fee' => 'nullable|numeric',
            'course.currency' => 'nullable|string|max:10',
            'course.price_display' => 'nullable|string|max:255',
            'course.duration_value' => 'nullable|integer',
            'course.duration_type' => 'nullable|string|in:days,weeks,months,years',
            'course.enrollments' => 'nullable|integer|min:0',
            'course.description.en' => 'nullable|string',
            'course.instructor_ids' => 'nullable|array',
            'image' => 'nullable|image|max:2048',
        ]);

        $course = Course::findOrFail($this->course['id']);

        // Update translations
        $course->setTranslations('name', $this->course['name']);
        $course->setTranslations('description', $this->course['description']);

        // Update other fields
        $course->slug = $this->course['slug'];
        $course->fee = $this->course['fee'];
        $course->currency = $this->course['currency'];
        $course->price_display = $this->course['price_display'];
        $course->duration_value = $this->course['duration_value'];
        $course->duration_type = $this->course['duration_type'];
        $course->enrollments = $this->course['enrollments'] ?? 0;

        // Handle image upload
        if ($this->image) {
            $course->image = $this->image->store('courses', 'public');
        }

        $course->save();

        // Sync instructors
        $course->instructors()->sync($this->course['instructor_ids'] ?? []);

        session()->flash('message', 'Course updated successfully!');
    }

    public function render()
    {
        return view('lms::livewire.courses.edit', [
            'instructors' => $this->instructors,
        ]);
    }
}
