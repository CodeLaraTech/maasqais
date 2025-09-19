<?php

namespace Modules\LMS\Livewire\Students;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Modules\LMS\Models\Student;
use Modules\LMS\Models\StudentUser;

class StudentPortal extends Component
{
    public $tab = 'login';
    public $sid, $password;

    public $register = [
        'name' => '', 'email' => '', 'phone' => '', 'password' => '', 'password_confirmation' => ''
    ];

    public function login()
    {
        $this->validate([
            'sid' => 'required|string',
            'password' => 'required|string'
        ]);

        $student = Student::where('reference', $this->sid)->first();

        if (!$student || !Hash::check($this->password, $student->user->password)) {
            session()->flash('error', 'Invalid SID or Password');
            return;
        }

        Auth::login($student->user);
        return redirect()->route('student.dashboard');
    }

    public function register()
    {
        $data = $this->validate([
            'register.name' => 'required|string|max:255',
            'register.email' => 'required|email|unique:students_users,email',
            'register.phone' => 'required',
            'register.password' => 'required|min:6|confirmed',
        ])['register'];

        $user = StudentUser::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        $student = Student::create([
            'user_id' => $user->id,
            'name' => ['en' => $data['name']],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        

        Auth::login($user);
        return redirect()->route('student.dashboard');
    }

    public function render()
    {
        return view('students.student-portal')->layout('layouts.student');
    }
}
