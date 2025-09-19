<?php

namespace Modules\Recruitment\Livewire\JobOffers;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Recruitment\Models\JobOffer;
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
            'employer_name',
            'candidate_name',
            'basic_salary',
            'gross_salary',
            'status',
            'offer_date',
        ];
    }

    public function delete()
    {
        JobOffer::findOrFail($this->deleteId)->delete();
        $this->deleteId = "";
        session()->flash('message', 'Offer deleted successfully.');
    }

    public function render()
    {
        $offers = JobOffer::query()
            ->where(function ($query) {
                $query->where('employer_name', 'like', "%{$this->search}%")
                      ->orWhere('candidate_name', 'like', "%{$this->search}%")
                      ->orWhere('status', 'like', "%{$this->search}%");
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('recruitment::livewire.job-offers.index', compact('offers'));
    }
}
