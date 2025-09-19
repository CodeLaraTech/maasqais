<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Website Settings</strong></h6>
                    </div>
                </div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form wire:submit.prevent="save">
                        <div class="row">
                            {{-- Language Switcher --}}
                            <div class="col-md-12 mb-4">
                                <div class="input-group input-group-outline">
                                    <label>Language</label>
                                    <select class="form-control form-select" wire:model.live="locale">
                                        <option value="en">English</option>
                                        <option value="ar">العربية</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Translatable Fields --}}
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline @if($site_name[$locale] ?? false) is-filled @endif">
                                    <label class="">Site Name ({{ strtoupper($locale) }})</label>
                                    <input type="text" class="form-control" wire:model.defer="site_name.{{ $locale }}">
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline @if($footer_about[$locale] ?? false) is-filled @endif">
                                    <label class="">Footer About ({{ strtoupper($locale) }})</label>
                                    <textarea class="form-control" rows="3" wire:model.defer="footer_about.{{ $locale }}"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline @if($footer_text[$locale] ?? false) is-filled @endif">
                                    <label class="">Footer Text ({{ strtoupper($locale) }})</label>
                                    <textarea class="form-control" rows="2" wire:model.defer="footer_text.{{ $locale }}"></textarea>
                                </div>
                            </div>

                            {{-- Non-translatable Fields --}}
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline @if($contact_email) is-filled @endif">
                                    <label class="">Contact Email</label>
                                    <input type="email" class="form-control" wire:model.defer="contact_email">
                                </div>
                            </div>

                            {{-- Social Links --}}
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline @if($social_whatsapp) is-filled @endif">
                                    <label class="">Whatsapp Link [Example: https://wa.me/96600000000]</label>
                                    <input type="text" class="form-control" wire:model.defer="social_whatsapp">
                                </div>
                            </div>

                            {{-- Social Links --}}
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline @if($social_facebook) is-filled @endif">
                                    <label class="">Facebook</label>
                                    <input type="text" class="form-control" wire:model.defer="social_facebook">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline @if($social_twitter) is-filled @endif">
                                    <label class="">Twitter</label>
                                    <input type="text" class="form-control" wire:model.defer="social_twitter">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline @if($social_instagram) is-filled @endif">
                                    <label class="">Instagram</label>
                                    <input type="text" class="form-control" wire:model.defer="social_instagram">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline @if($social_linkedin) is-filled @endif">
                                    <label class="">LinkedIn</label>
                                    <input type="text" class="form-control" wire:model.defer="social_linkedin">
                                </div>
                            </div>

                            {{-- Header Logo --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Header Logo</label>
                                <input type="file" class="form-control" wire:model="header_logo">

                                @if($header_logo)
                                    @php
                                        $existingHeader = \Modules\CMS\Models\WebSetting::where('key', 'header_logo')->first()?->getFirstMediaUrl('header_logo');
                                    @endphp
                                    @if($existingHeader)
                                        <div class="mt-2">
                                            <img src="{{ $existingHeader }}" class="img-thumbnail" width="150">
                                        </div>
                                    @endif
                                   
                                @endif
                            </div>

                            {{-- Footer Logo --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Footer Logo</label>
                                <input type="file" class="form-control" wire:model="footer_logo">

                                @if($footer_logo)
                                   @php
                                        $existingFooter = \Modules\CMS\Models\WebSetting::where('key', 'footer_logo')->first()?->getFirstMediaUrl('footer_logo');
                                    @endphp
                                    @if($existingFooter)
                                        <div class="mt-2">
                                            <img src="{{ $existingFooter }}" class="img-thumbnail" width="150">
                                        </div>
                                    @endif
                                    
                                @endif
                            </div>
                        </div>
                        <div class="text-end mt-3">
                        <button type="submit"
                            class="btn btn-primary btn-loading"
                            wire:loading.attr="disabled"
                            wire:loading.class="loading-active"
                            wire:target="save">
                            Save Settings
                            <img wire:loading wire:target="save"
                                src="{{ url('assets/img/loading.gif') }}"
                                class="loading" alt="Loading...">
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
