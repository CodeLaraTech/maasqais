<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $is_asset = false;

    public function render()
    {
        return view('livewire.dashboard');
    }
}
