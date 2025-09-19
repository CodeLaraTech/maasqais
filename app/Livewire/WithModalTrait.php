<?php

namespace App\Livewire;
use Livewire\Component;

trait WithModalTrait
{
    public $showModal = false;
    public $deleteId;

    public function openModal()
    {
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
