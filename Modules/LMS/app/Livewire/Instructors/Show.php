<?php 

namespace Modules\LMS\Livewire\Instructors;

use Livewire\Component;
use Modules\LMS\Models\Instructor;

class Show extends Component
{
    public Instructor $instructor;

    public function render()
    {
        return view('lms::livewire.instructors.show');
    }
}
