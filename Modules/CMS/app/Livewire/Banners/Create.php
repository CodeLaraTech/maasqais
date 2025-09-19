<?php

namespace Modules\CMS\Livewire\Banners;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Modules\CMS\Models\Banner;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $status = 'active';
    public $items = [];

    public $manualSlug = false; // 👈 Track manual slug edit

    public function mount()
    {
        $this->addItem(); // Start with one banner item
    }

    /**
     * Auto-generate slug from name (only if not manually changed)
     */
    public function updatedName($value)
    {
        if (!$this->manualSlug) {
            $this->slug = Str::slug($value);
        }
    }

    /**
     * Detect manual slug change
     */
    public function updatedSlug($value)
    {
        $this->manualSlug = true;
        $this->slug = Str::slug($value); // normalize user input
    }

    /**
     * Add banner item
     */
    public function addItem()
    {
        $this->items[] = [
            'title'      => '',
            'subtitle'   => '',
            'content'    => '',
            'image'      => null,
            'link'       => '',
            'buttons'    => [],
            'sort_order' => 0,
            'status'     => 'active',
        ];
    }

    /**
     * Remove banner item
     */
    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    /**
     * Add button to a banner item
     */
    public function addButton($itemIndex)
    {
        $this->items[$itemIndex]['buttons'][] = [
            'label'      => '',
            'url'        => '',
            'sort_order' => count($this->items[$itemIndex]['buttons']) + 1,
        ];
    }

    /**
     * Remove button from a banner item
     */
    public function removeButton($itemIndex, $btnIndex)
    {
        unset($this->items[$itemIndex]['buttons'][$btnIndex]);
        $this->items[$itemIndex]['buttons'] = array_values($this->items[$itemIndex]['buttons']);
    }

    /**
     * Store banner and items
     */
    public function store()
    {
        $this->validate([
            'name'   => 'required|string|max:255',
            'slug'   => 'required|string|max:255|unique:cms_banners,slug',
            'status' => 'required|in:active,inactive',

            'items.*.title'      => 'nullable|string|max:255',
            'items.*.subtitle'   => 'nullable|string|max:255',
            'items.*.content'    => 'nullable|string',
            'items.*.link'       => 'nullable|url',
            'items.*.sort_order' => 'nullable|integer',
            'items.*.status'     => 'required|in:active,inactive',
        ]);

        $banner = Banner::create([
            'name'   => $this->name,
            'slug'   => $this->slug,
            'status' => $this->status === 'active' ? 1 : 0,
        ]);

        foreach ($this->items as $item) {
            $banner->items()->create([
                'title'      => $item['title'],
                'subtitle'   => $item['subtitle'],
                'content'    => $item['content'],
                'image'      => $item['image'] ? $item['image']->store('banners', 'public') : null,
                'link'       => $item['link'],
                'buttons'    => collect($item['buttons'])->sortBy('sort_order')->values()->toArray(),
                'sort_order' => $item['sort_order'] ?? 0,
                'status'     => $item['status'] === 'active' ? 1 : 0,
            ]);
        }

        session()->flash('message', 'Banner created successfully!');
        return redirect()->route('cms.banners.index');
    }

    public function render()
    {
        return view('cms::livewire.banners.create');
    }
}
