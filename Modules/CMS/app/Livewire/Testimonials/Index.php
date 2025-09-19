<?php

namespace Modules\CMS\Livewire\Testimonials;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\CMS\Models\Testimonial;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';

    protected $listeners = [
        'testimonialDeleted' => '$refresh',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            $testimonial->delete();
            session()->flash('message', 'Testimonial deleted successfully.');
        }

        $this->resetPage(); // ensure pagination is correct
    }

    public function render()
    {
        $locale = 'en'; // Show English only in table, but other locales are saved in DB

        $testimonials = Testimonial::query()
            ->when($this->search, function ($query) use ($locale) {
                $query->where(function ($q) use ($locale) {
                    $q->where("name->{$locale}", 'like', '%' . $this->search . '%')
                      ->orWhere("designation->{$locale}", 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('cms::livewire.testimonials.index', [
            'testimonials' => $testimonials,
            'locale' => $locale,
        ]);
    }
}
