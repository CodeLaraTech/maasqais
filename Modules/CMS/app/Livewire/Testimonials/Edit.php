<?php

namespace Modules\CMS\Livewire\Testimonials;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\CMS\Models\Testimonial;

class Edit extends Component
{
    use WithFileUploads;

    public $testimonial;

    // Translations array (English only)
    public $translations = [
        'en' => [
            'name' => '',
            'designation' => '',
            'company' => '',
            'website' => '',
            'location' => '',
            'phone' => '',
            'about' => '',
            'message' => '',
        ]
    ];

    // Non-translatable fields
    public $email;
    public $image;       // Existing image path
    public $newImage;    // New uploaded image
    public $video_url;
    public $video_file;  // New uploaded video
    public $rating;
    public $featured = 0;
    public $sort_order = 0;
    public $status = 1;

    public function mount(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;

        // Load non-translatable fields
        $this->email = $testimonial->email;
        $this->image = $testimonial->image;
        $this->video_url = $testimonial->video_url;
        $this->rating = $testimonial->rating;
        $this->featured = $testimonial->featured;
        $this->sort_order = $testimonial->sort_order;
        $this->status = $testimonial->status;

        // Load English translations
        $translatableFields = ['name', 'designation', 'company', 'website', 'location', 'phone', 'about', 'message'];
        foreach ($translatableFields as $field) {
            $this->translations['en'][$field] = $testimonial->getTranslation($field, 'en') ?? '';
        }
    }

    protected function rules()
    {
        return [
            'translations.en.name' => 'required|string|max:255',
            'translations.en.message' => 'required|string',
            'translations.en.designation' => 'nullable|string|max:255',
            'translations.en.company' => 'nullable|string|max:255',
            'translations.en.website' => 'nullable|url|max:255',
            'translations.en.location' => 'required|string|max:255',
            'translations.en.phone' => 'required|string|max:50',
            'translations.en.about' => 'nullable|string',
            'email' => 'required|email|max:255',
            'newImage' => 'nullable|image|max:2048',
            'video_url' => 'nullable|url|max:255',
            'video_file' => 'nullable|mimes:mp4,mov,avi,wmv|max:51200',
            'rating' => 'nullable|integer|min:1|max:5',
            'featured' => 'boolean',
            'sort_order' => 'integer|min:0',
            'status' => 'boolean',
        ];
    }

    public function update()
    {
        $data = $this->validate();

        // Handle new image upload
        if ($this->newImage) {
            if ($this->testimonial->image && \Storage::disk('public')->exists($this->testimonial->image)) {
                \Storage::disk('public')->delete($this->testimonial->image);
            }
            $this->testimonial->image = $this->newImage->store('testimonials/images', 'public');
        }

        // Handle new video upload
        if ($this->video_file instanceof \Livewire\TemporaryUploadedFile) {
            if ($this->testimonial->video_path && \Storage::disk('public')->exists($this->testimonial->video_path)) {
                \Storage::disk('public')->delete($this->testimonial->video_path);
            }
            $this->testimonial->video_path = $this->video_file->store('testimonials/videos', 'public');
        }

        // Update non-translatable fields
        $this->testimonial->email = $data['email'];
        $this->testimonial->video_url = $data['video_url'];
        $this->testimonial->rating = $data['rating'] ?? $this->testimonial->rating;
        $this->testimonial->featured = $data['featured'] ?? $this->testimonial->featured;
        $this->testimonial->sort_order = $data['sort_order'] ?? $this->testimonial->sort_order;
        $this->testimonial->status = $data['status'] ?? $this->testimonial->status;

        // ✅ Update translations BEFORE saving
        $translatableFields = ['name', 'designation', 'company', 'website', 'location', 'phone', 'about', 'message'];
        foreach ($translatableFields as $field) {
            $this->testimonial->setTranslation($field, 'en', $this->translations['en'][$field] ?? '');
        }

        // Save once
        $this->testimonial->save();

        session()->flash('success', 'Testimonial updated successfully.');
        return redirect()->route('cms.testimonials.index');
    }


    public function render()
    {
        return view('cms::livewire.testimonials.edit');
    }
}
