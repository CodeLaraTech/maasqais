<?php

namespace Modules\Recruitment\Livewire\JobApplications;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Recruitment\Models\JobApplication;
use App\Livewire\WithModalTrait;
use App\Livewire\WithSorting;

class Index extends Component
{
    use WithPagination, WithModalTrait, WithSorting;

    protected $paginationTheme = 'bootstrap';

    public int $perPage;
    public array $orderable = [];

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortDirection' => [],
        'perPage' => [],
    ];

    public function mount()
    {
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->perPage = 100;
        $this->orderable = [
            'id',
            'first_name',
            'last_name',
            'email',
            'subject',
            'job_id',
            'created_at',
        ];
    }

    public function delete()
    {
        JobApplication::findOrFail($this->deleteId)->delete();
        $this->deleteId = "";
        session()->flash('message', 'Application deleted successfully.');
    }

    public function render()
    {
        $applications = JobApplication::query()
            ->with(['job', 'job.customer']) // Load related job and employer
            ->where(function ($query) {
                $query->where('first_name', 'like', "%{$this->search}%")
                      ->orWhere('last_name', 'like', "%{$this->search}%")
                      ->orWhere('email', 'like', "%{$this->search}%")
                      ->orWhere('subject', 'like', "%{$this->search}%")
                      ->orWhereHas('job.customer', function ($q) {
                          $q->where('company', 'like', "%{$this->search}%");
                      });
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);




        return view('recruitment::livewire.job-applications.index', compact('applications'));
    }
}
