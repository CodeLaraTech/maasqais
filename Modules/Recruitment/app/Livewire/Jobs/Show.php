<?php

namespace Modules\Recruitment\Livewire\Jobs;

use Livewire\Component;
use Modules\Recruitment\Models\Job;

class Show extends Component
{
    public $job;

    public function mount($id)
    {
        $this->job = Job::with(['customer', 'applications.media'])->findOrFail($id);
    }

    public function render()
    {
        return view('recruitment::livewire.jobs.show');
    }
}
