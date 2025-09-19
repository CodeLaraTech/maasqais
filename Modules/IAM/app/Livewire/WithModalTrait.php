<?php

namespace Modules\IAM\Livewire;
use Livewire\Component;

trait WithModalTrait
{
    public $showModal = false;
    public $deleteId;

    public function openModal()
    {
        $this->resetInputFields(); // Optionally reset input fields when opening modal
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function cancelDelete(){
        $this->deleteId = null;
    }
}
