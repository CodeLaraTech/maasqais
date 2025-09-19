<?php

namespace Modules\LMS\Livewire\Students;

use Livewire\Component;
use Modules\LMS\Models\Student;
use Modules\LMS\Models\Course;

class Show extends Component
{
    public $student;
    public $courses;

    public function mount(Student $student)
    {
        $this->student = $student->load('courses');
        $this->courses = Course::all(); // fetch all courses for the modal
    }

    public function render()
    {
        return view('lms::livewire.students.show')
            ->layout('layouts.base');
    }
}
