<?php

namespace Modules\CMS\Livewire\WebSettings;

use Livewire\Component;
use Modules\CMS\Models\WebSetting;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $locale = 'en';

    public $site_name = [];
    public $footer_about = [];
    public $footer_text = [];

    public $contact_email;
    public $social_whatsapp;
    public $social_facebook;
    public $social_twitter;
    public $social_instagram;
    public $social_linkedin;

    public $header_logo = null;
    public $footer_logo = null;

    public $mediaComponentNames = ['header_logo','footer_logo'];

    public function mount()
    {
        $this->site_name = WebSetting::firstOrCreate(['key' => 'site_name'])->getTranslations('value');
        $this->footer_about = WebSetting::firstOrCreate(['key' => 'footer_about'])->getTranslations('value');
        $this->footer_text = WebSetting::firstOrCreate(['key' => 'footer_text'])->getTranslations('value');

        $this->contact_email = WebSetting::firstOrCreate(['key' => 'contact_email'])->value;
        $this->header_logo = WebSetting::firstOrCreate(['key' => 'header_logo'])->value;
        $this->footer_logo = WebSetting::firstOrCreate(['key' => 'footer_logo'])->value;
        $this->social_facebook = WebSetting::firstOrCreate(['key' => 'social_facebook'])->value;
        $this->social_twitter = WebSetting::firstOrCreate(['key' => 'social_twitter'])->value;
        $this->social_instagram = WebSetting::firstOrCreate(['key' => 'social_instagram'])->value;
        $this->social_linkedin = WebSetting::firstOrCreate(['key' => 'social_linkedin'])->value;
    }

    public function save()
    {
        $siteName = WebSetting::firstOrCreate(['key' => 'site_name']);
        $siteName->setTranslation('value', $this->locale, $this->site_name[$this->locale] ?? '');
        $siteName->save();

        $footerAbout = WebSetting::firstOrCreate(['key' => 'footer_about']);
        $footerAbout->setTranslation('value', $this->locale, $this->footer_about[$this->locale] ?? '');
        $footerAbout->save();

        $footerText = WebSetting::firstOrCreate(['key' => 'footer_text']);
        $footerText->setTranslation('value', $this->locale, $this->footer_text[$this->locale] ?? '');
        $footerText->save();

        WebSetting::updateOrCreate(['key' => 'contact_email'], ['value' => $this->contact_email]);
        WebSetting::updateOrCreate(['key' => 'social_whatsapp'], ['value' => $this->social_whatsapp]);
        WebSetting::updateOrCreate(['key' => 'social_facebook'], ['value' => $this->social_facebook]);
        WebSetting::updateOrCreate(['key' => 'social_twitter'], ['value' => $this->social_twitter]);
        WebSetting::updateOrCreate(['key' => 'social_instagram'], ['value' => $this->social_instagram]);
        WebSetting::updateOrCreate(['key' => 'social_linkedin'], ['value' => $this->social_linkedin]);

        // Save Header & Footer Logo
        if (@$this->header_logo) {
            $headerLogo = WebSetting::firstOrCreate(['key' => 'header_logo']);
            $headerLogo->clearMediaCollection('header_logo');
            $headerLogo->addMedia($this->header_logo->getRealPath())->toMediaCollection('header_logo');
        }

        if (@$this->footer_logo) {
            $footerLogo = WebSetting::firstOrCreate(['key' => 'footer_logo']);
            $footerLogo->clearMediaCollection('footer_logo');
            $footerLogo->addMedia($this->footer_logo->getRealPath())->toMediaCollection('footer_logo');
        }
        session()->flash('success', 'Website settings updated successfully!');
        return redirect()->route('cms.web-settings.index');
    }


    public function render()
    {
        return view('cms::livewire.web-settings.index');
    }
}
