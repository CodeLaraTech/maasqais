<?php
namespace Modules\LMS\Livewire\Students;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Modules\LMS\Models\Student;

class Dashboard extends Component
{
    public $student;

    public function mount()
    {
        $user = Auth::user();
        $this->student = Student::with('courses')->where('user_id', $user->id)->first();
    }

    public function render()
    {
        return view('lms::livewire.students.dashboard'); // Or 'layouts.student' if you use a separate student layout
    }
}
