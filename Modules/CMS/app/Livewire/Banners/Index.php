<?php

namespace Modules\CMS\Livewire\Banners;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\CMS\Models\Banner;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $banners = Banner::withCount('items') // use items instead of images
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('cms::livewire.banners.index', compact('banners'));
    }
}
