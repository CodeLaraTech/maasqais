<?php

namespace Modules\CRM\Livewire\Opportunities;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\CRM\Models\Opportunity;
use Modules\CRM\Models\CrmSource;
use App\Livewire\WithModalTrait;
use App\Livewire\WithSorting;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
class Index extends Component
{
    use WithPagination, WithModalTrait, WithSorting, WithFileUploads;

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
      
        $this->sortBy = 'id'; // Default sort by ID
        $this->sortDirection = 'desc'; // Default sort direction
        $this->perPage = 10; // Default pagination limit
        $this->orderable = ['id', 'name', 'email'];
    }


    public function render()
    {   
       
        //$roles = Role::all();
        $opportunities = Opportunity::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('crm::livewire.opportunities.index', compact('opportunities'));
    }
}
