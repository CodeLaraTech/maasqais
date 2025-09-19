<?php

namespace Modules\LMS\Livewire\Students;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
use Modules\LMS\Models\Student;
use Modules\LMS\Models\Course;

class Edit extends Component
{
    use WithFileUploads;

    public $studentId;
    public $student = [
        'name' => ['en' => '', 'ar' => '', 'ur' => ''],
        'bio' => ['en' => '', 'ar' => '', 'ur' => ''],
        'email' => '',
        'phone' => '',
        'photo' => null,
        'password' => '',
        'course_ids' => [],
    ];

    public $courses;

    public function mount($id)
    {

        $this->studentId = $id;
        $this->courses = Course::all();

        $student = Student::findOrFail($id);

        $this->student['name'] = [
            'en' => $student->getTranslation('name', 'en') ?? '',
            'ar' => $student->getTranslation('name', 'ar') ?? '',
            'ur' => $student->getTranslation('name', 'ur') ?? '',
        ];

        $this->student['bio'] = [
            'en' => $student->getTranslation('bio', 'en') ?? '',
            'ar' => $student->getTranslation('bio', 'ar') ?? '',
            'ur' => $student->getTranslation('bio', 'ur') ?? '',
        ];

        $this->student['photo'] = $student->photo;

        $this->student['email'] = $student->email;
        $this->student['phone'] = $student->phone;
        $this->student['course_ids'] = $student->courses->pluck('id')->toArray() ?? [];
    }

    public function update()
    {
        $this->validate([
            'student.name.en' => 'required|string|max:255',
            'student.email' => 'required|email|unique:students,email,' . $this->studentId,
            'student.phone' => 'required|string|max:20',
            'student.photo' => 'nullable|image|max:2048',
        ]);

        $student = Student::findOrFail($this->studentId);
        $student->update([
            'name' => $this->student['name'],
            'bio' => $this->student['bio'],
            'email' => $this->student['email'],
            'phone' => $this->student['phone'],
        ]);

        // Update password if provided
        if (!empty($this->student['password'])) {
            $student->user->update([
                'password' => Hash::make($this->student['password']),
            ]);
        }

        // Handle photo upload
        if ($this->student['photo']) {
            $student->update([
                'photo' => $this->student['photo']->store('students', 'public'),
            ]);
        }

        // Update courses
        $student->courses()->sync($this->student['course_ids']);

        session()->flash('message', 'Student updated successfully!');
        return redirect()->route('lms.students.index');
    }

    public function render()
    {
        return view('lms::livewire.students.edit');
    }
}
