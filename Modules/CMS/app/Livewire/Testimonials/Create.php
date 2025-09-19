<?php

namespace Modules\CMS\Livewire\Testimonials;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\CMS\Models\Testimonial;

class Create extends Component
{
    use WithFileUploads;

    // Translatable fields
    public $translations = [
        'en' => ['name' => '', 'designation' => '', 'company' => '', 'website' => '', 'location' => '', 'phone' => '', 'about' => '', 'message' => ''],
        'ur' => ['name' => '', 'designation' => '', 'company' => '', 'website' => '', 'location' => '', 'phone' => '', 'about' => '', 'message' => ''],
        'ar' => ['name' => '', 'designation' => '', 'company' => '', 'website' => '', 'location' => '', 'phone' => '', 'about' => '', 'message' => ''],
    ];

    // Non-translatable
    public $email, $image, $video_url, $video_file;
    public $rating = 0;
    public $featured = 0;
    public $sort_order = 0;
    public $status = 1;

    protected $rules = [
        // Translatable fields
        'translations.en.name' => 'required|string|max:255',
        'translations.en.message' => 'required|string',
        'translations.en.designation' => 'required|string|max:255',
        'translations.en.company' => 'nullable|string|max:255',
        'translations.en.website' => 'nullable|url|max:255',
        'translations.en.location' => 'nullable|string|max:255',
        'translations.en.phone' => 'nullable|string|max:20',
        'translations.en.about' => 'nullable|string',

        'translations.ur.name' => 'required|string|max:255',
        'translations.ur.message' => 'required|string',
        'translations.ur.designation' => 'required|string|max:255',
        'translations.ur.company' => 'nullable|string|max:255',
        'translations.ur.website' => 'nullable|url|max:255',
        'translations.ur.location' => 'nullable|string|max:255',
        'translations.ur.phone' => 'nullable|string|max:20',
        'translations.ur.about' => 'nullable|string',

        'translations.ar.name' => 'required|string|max:255',
        'translations.ar.message' => 'required|string',
        'translations.ar.designation' => 'required|string|max:255',
        'translations.ar.company' => 'nullable|string|max:255',
        'translations.ar.website' => 'nullable|url|max:255',
        'translations.ar.location' => 'nullable|string|max:255',
        'translations.ar.phone' => 'nullable|string|max:20',
        'translations.ar.about' => 'nullable|string',

        // Non-translatable fields
        'email' => 'nullable|email|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        'video_url' => 'nullable|url|max:255',
        'video_file' => 'nullable|mimes:mp4,mov,avi,wmv|max:51200', // 50MB
        'rating' => 'nullable|integer|min:1|max:5',
        'featured' => 'boolean',
        'sort_order' => 'nullable|integer|min:0',
        'status' => 'boolean',
    ];


    public function save()
    {
        $this->validate();

        $imagePath = $this->image ? $this->image->store('testimonials/images', 'public') : null;
        $videoPath = $this->video_file ? $this->video_file->store('testimonials/videos', 'public') : null;

        // Create testimonial with only non-translatable fields first
        $testimonial = Testimonial::create([
            'email' => $this->email,
            'image' => $imagePath,
            'video_url' => $this->video_url,
            'video_path' => $videoPath,
            'rating' => $this->rating,
            'featured' => $this->featured,
            'sort_order' => $this->sort_order,
            'status' => $this->status,
        ]);

        // Save all translations
        $locales = ['en', 'ur', 'ar'];
        $translatableFields = ['name', 'designation', 'company', 'website', 'location', 'phone', 'about', 'message'];

        foreach ($translatableFields as $field) {
            $values = [];
            foreach ($locales as $locale) {
                $values[$locale] = $this->translations[$locale][$field] ?? '';
            }
            $testimonial->setTranslations($field, $values);
        }

        // Important: save model after setting translations
        $testimonial->save();

        session()->flash('success', 'Testimonial created successfully.');
        return redirect()->route('cms.testimonials.index');
    }

    public function render()
    {
        return view('cms::livewire.testimonials.create');
    }
}
