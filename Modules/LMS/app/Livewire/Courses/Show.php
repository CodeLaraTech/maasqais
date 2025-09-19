<?php 

namespace Modules\LMS\Livewire\Courses;

use Livewire\Component;
use Modules\LMS\Models\Course;
use Modules\LMS\Models\Student;

class Show extends Component
{
    public Course $course;
    public $students = [];

    public function mount(Course $course)
    {
        // Load the course with assigned students
        $this->course = $course->load('students');

        // Get all students to show in modal
        $this->students = Student::all();
    }

    public function render()
    {
        return view('lms::livewire.courses.show', [
            'course' => $this->course,
            'students' => $this->students,
        ]);
    }
}
