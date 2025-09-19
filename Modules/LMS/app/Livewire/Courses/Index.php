<?php
namespace Modules\LMS\Livewire\Courses;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\LMS\Models\Course;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $deleteId = null;

    // Sorting
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $orderable = ['name', 'status', 'created_at'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sort($field)
    {
        if (!in_array($field, $this->orderable)) return;

        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        if ($this->deleteId) {
            Course::findOrFail($this->deleteId)->delete();
            $this->deleteId = null;
            session()->flash('message', 'Course deleted successfully.');
        }
    }

    public function render()
    {
        $courses = Course::with('instructors')
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        return view('lms::livewire.courses.index', [
            'courses' => $courses,
        ]);
    }
}
