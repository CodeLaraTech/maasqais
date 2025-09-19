<?php

namespace Modules\CMS\Livewire\Pages;

use Livewire\Component;
use Modules\CMS\Models\Page;

class Show extends Component
{
    public $page;

    public function mount($id)
    {
        $this->page = Page::findOrFail($id);
    }

    public function render()
    {
        return view('cms::livewire.pages.show');
    }
}
