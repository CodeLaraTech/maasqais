<?php

namespace Modules\Business\Livewire\BusinessPartners;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Business\Models\BusinessPartner;
use App\Livewire\WithSorting;
use App\Livewire\WithModalTrait;
class Index extends Component
{
    use WithPagination, WithModalTrait, WithSorting;

    public $search = '';
    public $name;
    public $email;
    public $partnerId;
    public $updateMode = false;

    protected $queryString = ['search'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:business_partners,email',
    ];

    public $orderable = ['id', 'name', 'email']; // Define sortable columns

    public $perPage = 10; // Pagination limit

    public function render()
    {
        $partners = BusinessPartner::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('business::livewire.business-partners.index', [
            'partners' => $partners,
        ]);
    }

    public function store()
    {
        $this->validate();

        BusinessPartner::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        $this->closeModal();
        session()->flash('message', 'Business Partner created successfully.');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->updateMode = false;
    }


    public function edit($id)
    {
        $partner = BusinessPartner::findOrFail($id);
        $this->partnerId = $id;
        $this->name = $partner->name;
        $this->email = $partner->email;
        $this->updateMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:business_partners,email,' . $this->partnerId,
        ]);

        $partner = BusinessPartner::findOrFail($this->partnerId);
        $partner->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        session()->flash('message', 'Role updated successfully.');
        $this->closeModal();
        $this->resetInputFields();

    }

    public function delete()
    {
        BusinessPartner::findOrFail($this->deleteId)->delete();
        $this->closeModal();
        session()->flash('message', 'Business Partner deleted successfully.');
    }
}
