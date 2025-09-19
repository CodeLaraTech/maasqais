<?php

namespace Modules\CMS\Livewire\Banners;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Modules\CMS\Models\Banner;
use Modules\CMS\Models\BannerItem;

class Edit extends Component
{
    use WithFileUploads;

    public $banner;

    public $name;
    public $slug;
    public $status;
    public $items = [];

    public $manualSlug = false; // 👈 Track manual slug edits

    public function mount(Banner $banner)
    {
        $this->banner  = $banner;
        $this->name    = $banner->name;
        $this->slug    = $banner->slug;
        $this->status  = $banner->status ? 'active' : 'inactive';

        // Load existing banner items
        foreach ($banner->items as $item) {
            $this->items[] = [
                'id'            => $item->id,
                'title'         => $item->title,
                'subtitle'      => $item->subtitle,
                'content'       => $item->content,
                'image'         => null,
                'image_preview' => $item->image ? asset('storage/' . $item->image) : null,
                'link'          => $item->link,
                'buttons'       => $item->buttons ?? [],
                'sort_order'    => $item->sort_order,
                'status'        => $item->status ? 'active' : 'inactive',
            ];
        }

        if (empty($this->items)) {
            $this->addItem();
        }
    }

    /** Auto-generate slug when editing name */
    public function updatedName($value)
    {
        if (!$this->manualSlug) {
            $this->slug = Str::slug($value);
        }
    }

    /** Track manual slug editing */
    public function updatedSlug($value)
    {
        if (empty($value)) {
            $this->manualSlug = false;
            $this->slug = Str::slug($this->name);
        } else {
            $this->manualSlug = true;
            $this->slug = Str::slug($value);
        }
    }

    public function addItem()
    {
        $this->items[] = [
            'id'            => null,
            'title'         => '',
            'subtitle'      => '',
            'content'       => '',
            'image'         => null,
            'image_preview' => null,
            'link'          => '',
            'buttons'       => [],
            'sort_order'    => 0,
            'status'        => 'active',
        ];
    }

    public function removeItem($index)
    {
        if (!empty($this->items[$index]['id'])) {
            BannerItem::find($this->items[$index]['id'])?->delete();
        }
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function addButton($itemIndex)
    {
        $this->items[$itemIndex]['buttons'][] = [
            'label'      => '',
            'url'        => '',
            'sort_order' => count($this->items[$itemIndex]['buttons']) + 1,
        ];
    }

    public function removeButton($itemIndex, $btnIndex)
    {
        unset($this->items[$itemIndex]['buttons'][$btnIndex]);
        $this->items[$itemIndex]['buttons'] = array_values($this->items[$itemIndex]['buttons']);
    }

    public function update()
    {
        $this->validate([
            'name'   => 'required|string|max:255',
            'slug'   => 'required|string|max:255|unique:cms_banners,slug,' . $this->banner->id,
            'status' => 'required|in:active,inactive',

            'items.*.title'      => 'nullable|string|max:255',
            'items.*.subtitle'   => 'nullable|string|max:255',
            'items.*.content'    => 'nullable|string',
            'items.*.link'       => 'nullable|url',
            'items.*.sort_order' => 'nullable|integer',
            'items.*.status'     => 'required|in:active,inactive',
        ]);

        // Update banner
        $this->banner->update([
            'name'   => $this->name,
            'slug'   => $this->slug,
            'status' => $this->status === 'active' ? 1 : 0,
        ]);

        foreach ($this->items as $item) {
            if (!empty($item['id'])) {
                // Update existing item
                $bannerItem = BannerItem::find($item['id']);
                if ($bannerItem) {
                    $bannerItem->update([
                        'title'      => $item['title'],
                        'subtitle'   => $item['subtitle'],
                        'content'    => $item['content'],
                        'image'      => $item['image'] ? $item['image']->store('banners', 'public') : $bannerItem->image,
                        'link'       => $item['link'],
                        'buttons'    => collect($item['buttons'])->sortBy('sort_order')->values()->toArray(),
                        'sort_order' => $item['sort_order'] ?? 0,
                        'status'     => $item['status'] === 'active' ? 1 : 0,
                    ]);
                }
            } else {
                // Create new item
                $this->banner->items()->create([
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
        }

        session()->flash('message', 'Banner updated successfully!');
        return redirect()->route('cms.banners.index');
    }

    public function render()
    {
        return view('cms::livewire.banners.edit');
    }
}
