<?php
namespace Modules\LMS\Livewire\Students;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\LMS\Models\Student;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $deleteId = null;

public function confirmDelete($id)
{
    $this->deleteId = $id;
}

public function cancelDelete()
{
    $this->deleteId = null;
}

public function delete()
{
    $student = \Modules\LMS\Models\Student::findOrFail($this->deleteId);
    $student->delete();

    $this->deleteId = null;
    session()->flash('message', 'Student deleted successfully!');
}

    public function render()
    {
        $students = Student::with('courses')
            ->where('name->en', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('lms::livewire.students.index', [
            'students' => $students,
            'deleteId' => $this->deleteId,
        ]);
    }
}
