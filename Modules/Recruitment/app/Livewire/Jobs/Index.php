<?php

namespace Modules\Recruitment\Livewire\Jobs;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Recruitment\Models\Job;
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
        $this->orderable = ['id', 'title', 'type', 'location', 'posted_at'];
    }

    public function delete()
    {
        Job::findOrFail($this->deleteId)->delete();
        $this->deleteId = "";
        session()->flash('message', 'Job deleted successfully.');
    }

    public function render()
    {
        $jobs = Job::query()
            ->where(function ($query) {
                $query->where('title', 'like', "%{$this->search}%")
                      ->orWhere('type', 'like', "%{$this->search}%")
                      ->orWhere('location', 'like', "%{$this->search}%");
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('recruitment::livewire.jobs.index', compact('jobs'));
    }
}
