<?php

namespace Modules\CRM\Livewire\Customers;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\CRM\Models\Customer;
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

    public $mediaComponentNames = ['avatar'];


    public function mount()
    {

        $this->sortBy = 'id'; // Default sort by ID
        $this->sortDirection = 'desc'; // Default sort direction
        $this->perPage = 10; // Default pagination limit
        $this->orderable = ['id','reference', 'name', 'email'];
    }
    public function delete()
    {

        Customer::find($this->deleteId)->delete();
        session()->flash('message', 'Customer deleted successfully.');
    }
    public function render()
    {

        //$roles = Role::all();
        $customers = Customer::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('crm::livewire.customers.index', compact('customers'));
    }
}
