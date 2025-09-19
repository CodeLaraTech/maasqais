<?php

namespace Modules\Business\Livewire\Sponsors;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Business\Models\Sponsor;
use App\Livewire\WithModalTrait;
use App\Livewire\WithSorting;

class Index extends Component
{
    use WithPagination, WithModalTrait, WithSorting;

    public $search = '';
    public $name;
    public $email;
    public $sponsorId;
    public $updateMode = false;

    protected $queryString = ['search'];

    public $orderable = ['id', 'name', 'email']; // Define sortable columns

    public $perPage = 10; // Pagination limit

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:sponsors,email',
    ];

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->updateMode = false;
    }

    public function render()
    {
        $sponsors = Sponsor::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('business::livewire.sponsors.index', [
            'sponsors' => $sponsors,
        ]);
    }


    public function store()
    {
        $this->validate();

        Sponsor::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Sponsor created successfully.');
        $this->closeModal();
    }

    public function edit($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $this->sponsorId = $id;
        $this->name = $sponsor->name;
        $this->email = $sponsor->email;
        $this->updateMode = true;
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:sponsors,email,' . $this->sponsorId,
        ]);

        $sponsor = Sponsor::findOrFail($this->sponsorId);
        $sponsor->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Sponsor updated successfully.');
        $this->closeModal();
    }

    public function delete()
    {
        Sponsor::findOrFail($this->deleteId)->delete();
        $this->closeModal();
        session()->flash('message', 'Sponsor deleted successfully.');
    }
}
