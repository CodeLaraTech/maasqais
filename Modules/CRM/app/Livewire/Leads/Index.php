<?php

namespace Modules\CRM\Livewire\Leads;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\CRM\Models\Lead;
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
    public $name;
    public $email;
    public $phone;
    public $followup_date;
    public $source_id;
    public $leadId;
    public $updateMode = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortDirection' => [],
        'perPage' => [],
    ];

    public $mediaComponentNames = ['avatar'];

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:leads,email',
            'phone'=>'required',
            'followup_date'=>'required',
            'source_id'=>'required'
        ];
    }

    public function mount()
    {

        $this->sortBy = 'id'; // Default sort by ID
        $this->sortDirection = 'desc'; // Default sort direction
        $this->perPage = 10; // Default pagination limit
        $this->orderable = ['id', 'name', 'email'];
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->followup_date = '';
        $this->source_id = '';
    }

    public function store()
    {

        $this->validate();

        $lead = Lead::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'followup_date' => $this->followup_date,
            'source_id' => $this->source_id
        ]);

        session()->flash('message', 'Leads created successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }


    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        $this->leadId = $lead->id;
        $this->name = $lead->name;
        $this->email = $lead->email;
        $this->phone = $lead->phone;
        $this->followup_date = $lead->followup_date;
        $this->source_id = $lead->source_id;
        $this->updateMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();
        $user = Lead::find($this->leadId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'followup_date' => $this->followup_date,
            'source_id' => $this->source_id,
        ]);

        session()->flash('message', 'User updated successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete()
    {
        Lead::find($this->deleteId)->delete();
        session()->flash('message', 'User deleted successfully.');
    }

    public function render()
    {
        //$roles = Role::all();
        $leads = Lead::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        $sources = CrmSource::all();

        return view('crm::livewire.leads.index', compact('leads', 'sources'));
    }
}
