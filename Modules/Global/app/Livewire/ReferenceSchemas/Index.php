<?php

namespace Modules\Global\Livewire\ReferenceSchemas;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Global\Models\ReferenceSchema;

use Modules\IAM\Livewire\WithModalTrait;
use Modules\IAM\Livewire\WithSorting;

class Index extends Component
{
    use WithPagination, WithModalTrait, WithSorting;

    protected $paginationTheme = 'bootstrap';

    public int $perPage;
    public array $orderable = [];

    public $search = '';
    public $type, $prefix, $initial_value, $increment,$next_value, $digits, $status;
    public $schemaId;
    public $updateMode = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortDirection' => [],
        'perPage' => [],
    ];

    protected function rules()
    {
        return [
            'type' => 'required|min:3|unique:reference_schemas,type,' . $this->schemaId,
            'prefix' => 'required|string',
            'initial_value' => 'required|numeric|min:0',
            'increment' => 'required|numeric|min:1',
            'next_value'=>'required',
            'digits'=>'required',
            'status' => 'required|in:Active,Inactive',
        ];
    }

    public function mount()
    {
        $this->sortBy = 'id'; // Default sort by ID
        $this->sortDirection = 'desc'; // Default sort direction
        $this->perPage = 100; // Default pagination limit
        $this->orderable = ['id', 'type', 'status'];
    }

    public function resetInputFields()
    {
        $this->type = '';
        $this->prefix = '';
        $this->initial_value = '';
        $this->increment = '';
        $this->next_value = "";
        $this->digits = "";
        $this->status = 'Active';
        $this->schemaId = '';
        $this->updateMode = false;
    }

    public function store()
    {
        $this->validate();
        ReferenceSchema::create([
            'type' => $this->type,
            'prefix' => $this->prefix,
            'initial_value' => $this->initial_value,
            'increment' => $this->increment,
            'next_value' => $this->next_value,
            'digits' => $this->digits,
            'status' => $this->status
        ]);

        session()->flash('message', 'Reference Schema created successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $schema = ReferenceSchema::findOrFail($id);
        $this->schemaId = $schema->id;
        $this->type = $schema->type;
        $this->prefix = $schema->prefix;
        $this->initial_value = $schema->initial_value;
        $this->increment = $schema->increment;
        $this->next_value = $schema->next_value;
        $this->digits = $schema->digits;
        $this->status = $schema->status;
        $this->updateMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();
        $schema = ReferenceSchema::find($this->schemaId);
        $schema->update([
            'type' => $this->type,
            'prefix' => $this->prefix,
            'initial_value' => $this->initial_value,
            'increment' => $this->increment,
            'next_value' => $this->next_value,
            'digits' => $this->digits,
            'status' => $this->status
        ]);

        session()->flash('message', 'Reference Schema updated successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete()
    {
        ReferenceSchema::find($this->deleteId)->delete();
        session()->flash('message', 'Reference Schema deleted successfully.');
    }

    public function render()
    {
        $schemas = ReferenceSchema::where('type', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('global::livewire.reference-schemas.index', compact('schemas'));
    }
}
