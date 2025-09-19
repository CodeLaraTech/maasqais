<?php
namespace Modules\LMS\Livewire\Instructors;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\LMS\Models\Instructor;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $deleteId = null;

    public function render()
    {
        $instructors = Instructor::query()
            ->when($this->search, fn ($query) =>
                $query->where('name->en', 'like', "%{$this->search}%")
                      ->orWhere('email', 'like', "%{$this->search}%")
            )
            ->latest()
            ->paginate(10);

        return view('lms::livewire.instructors.index', compact('instructors'));
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        Instructor::findOrFail($this->deleteId)->delete();
        $this->deleteId = null;
        session()->flash('message', 'Instructor deleted successfully.');
    }
}

