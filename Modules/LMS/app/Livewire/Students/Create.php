<?php

namespace Modules\LMS\Livewire\Students;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
use Modules\LMS\Models\Student;
use Modules\LMS\Models\Course;

class Create extends Component
{
    use WithFileUploads;

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

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function store()
    {
        $this->validate([
            'student.name.en' => 'required|string|max:255',
            'student.email' => 'required|email|unique:students,email',
            'student.phone' => 'required|string|max:20',
            'student.photo' => 'nullable|image|max:2048',
        ]);

        // 1. Create user
        $user = User::create([
            'name'     => $this->student['name']['en'],
            'email'    => $this->student['email'],
            'password' => Hash::make($this->student['password']),
        ]);
        if($user){

            // 2. Assign "Student" role
            $user->assignRole('Student'); // Spatie will insert into model_has_roles

            $student = Student::create([
                'name' => $this->student['name'],
                'bio' => $this->student['bio'],
                'email' => $this->student['email'],
                'phone' => $this->student['phone'],
                'user_id' => $user->id,
                'is_active'=>1,
            ]);
        }

        // Send email with SID
        Mail::raw("Welcome {$this->student['name']['en']}! Your Student ID is: {$student->reference}", function ($message) use ($student) {
            $message->to($student->email)->subject('Your Student ID');
        });

        session()->flash('message', 'Student created and enrolled successfully!');

        return redirect()->route('lms.students.index');
    }

    public function render()
    {
        return view('lms::livewire.students.create');
    }
}
