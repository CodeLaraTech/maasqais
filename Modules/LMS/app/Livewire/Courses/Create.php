<?php

namespace Modules\LMS\Livewire\Courses;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\LMS\Models\Instructor;
use Modules\LMS\Models\Course;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $course = [
        'name' => ['en' => '', 'ar' => '', 'ur' => ''],
        'slug' => '',
        'instructor_ids' => [],
        'fee' => null,
        'currency' => '',
        'price_display' => '',
        'duration_value' => null,
        'duration_type' => '',
        'enrollments' => 0,
        'description' => ['en' => '', 'ar' => '', 'ur' => ''],
    ];

    public $image;
    public $instructors = [];

    public function mount()
    {
        $this->instructors = Instructor::all();
    }

    public function generateSlug()
    {
        if (!empty($this->course['name']['en'])) {
            $this->course['slug'] = Str::slug($this->course['name']['en']);
        }
    }

    public function store()
    {
        $this->validate([
            'course.name.en' => 'required|string|max:255',
            'course.slug' => 'required|string|unique:courses,slug',
            'course.instructor_ids' => 'nullable|array',
            'course.fee' => 'nullable|numeric|min:0',
            'course.currency' => 'nullable|string|max:10',
            'course.price_display' => 'nullable|string|max:255',
            'course.duration_value' => 'nullable|integer|min:0',
            'course.duration_type' => 'nullable|string|in:days,weeks,months,years',
            'course.enrollments' => 'nullable|integer|min:0',
            'course.description.en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $newCourse = new Course();
        $newCourse->name = $this->course['name'];
        $newCourse->slug = $this->course['slug'];
        $newCourse->fee = $this->course['fee'];
        $newCourse->currency = $this->course['currency'];
        $newCourse->duration_value = $this->course['duration_value'];
        $newCourse->duration_type = $this->course['duration_type'];
        $newCourse->enrollments = $this->course['enrollments'] ?? 0;
        $newCourse->description = $this->course['description'];

        // Auto Price Display
        if (empty($this->course['price_display']) && $this->course['fee']) {
            $symbol = match (strtoupper($this->course['currency'] ?? '')) {
                'USD' => '$',
                'INR' => '₹',
                'EUR' => '€',
                'GBP' => '£',
                'AED' => 'د.إ',
                'SAR' => '﷼',
                'PKR' => '₨',
                default => ''
            };
            $newCourse->price_display = $symbol . number_format($this->course['fee'], 2);
        } else {
            $newCourse->price_display = $this->course['price_display'] ?? null;
        }

        // Upload Image
        if ($this->image) {
            $newCourse->image = $this->image->store('courses', 'public');
        }

        $newCourse->save();

        // Sync instructors if any
        if (!empty($this->course['instructor_ids'])) {
            $newCourse->instructors()->sync($this->course['instructor_ids']);
        }

        session()->flash('message', 'Course created successfully.');
        return redirect()->route('lms.courses.index');
    }

    public function render()
    {
        return view('lms::livewire.courses.create');
    }
}
