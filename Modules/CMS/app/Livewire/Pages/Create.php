<?php

namespace Modules\CMS\Livewire\Pages;

use Livewire\Component;
use Modules\CMS\Models\Page;
use Illuminate\Support\Str;

class Create extends Component
{
    public $page = [];

    protected function rules()
    {
        return [
            'page.title' => 'required|string|min:3|max:255',
            'page.slug' => 'required|string|max:255|unique:pages,slug',
            'page.content' => 'nullable|string',
            'page.status' => 'required|in:draft,published',
            'page.template_type' => 'nullable|in:default,custom',
            'page.template_name' => 'nullable|string|max:255',
            'page.parent_id' => 'nullable|integer|exists:pages,id',
            'page.published_at' => 'nullable|date',
            'page.meta_description' => 'nullable|string|max:255',
            'page.meta_keywords' => 'nullable|string|max:255',
            'page.canonical_url' => 'nullable|url|max:255',
            'page.og_title' => 'nullable|string|max:255',
            'page.og_description' => 'nullable|string|max:1000',
            'page.og_url' => 'nullable|url|max:255',
            'page.og_type' => 'nullable|string|max:50',
            'page.og_site_name' => 'nullable|string|max:255',
            'page.og_locale' => 'nullable|string|max:20',
            'page.published_time' => 'nullable|date',
            'page.modified_time' => 'nullable|date',
            'page.twitter_card' => 'nullable|string|max:50',
            'page.twitter_title' => 'nullable|string|max:255',
            'page.twitter_description' => 'nullable|string|max:1000',
        ];
    }

    public function save()
    {
        $this->validate();

        Page::create(array_merge(
            $this->page,
        ));

        session()->flash('message', 'Page created successfully.');
        return redirect()->route('cms.pages.index');
    }

    public function mount()
    {
        $this->page = [
            'status' => 'draft',
            'template_type' => 'default',
        ];
    }
    // public function updatedPageTitle($value)
    // {
    //     $this->generateSlug();
    // }
    public function generateSlug()
    {
        if (!empty($this->page['title'])) {
            $this->page['slug'] = Str::slug($this->page['title']);
        }
    }

    public function render()
    {
        $parentPages = Page::select('id', 'title')->get();

        return view('cms::livewire.pages.create', [
            'parentPages' => $parentPages
        ]);
    }
}
