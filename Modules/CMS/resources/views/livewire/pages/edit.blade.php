<div class="container-fluid py-4">
    <div class="row">
        <div class="col-10 m-auto">
            <h3 class="mt-3 mb-0 text-center">Edit Page</h3>
            <p class="lead font-weight-normal opacity-8 mb-3 text-center">Fill in the details for the new page.</p>
            <div class="card">
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Title</label>
                                    <input type="text" class="form-control" wire:model.defer="page.title" wire:blur ="generateSlug">
                                </div>
                                @error('page.title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" wire:model.defer="page.slug">
                                </div>
                                @error('page.slug') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <div class="input-group d-block input-group-static mb-4"  wire:ignore>
                                    <label class="ms-0">Content</label>
                                    <div id="content" style="min-height: 150px;"></div>
                                </div>
                                @error('page.content') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Status</label>
                                    <select class="form-control" wire:model.defer="page.status">
                                        <option value="draft">Draft</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>
                                @error('page.status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Template Type</label>
                                    <select class="form-control" wire:model.defer="page.template_type">
                                        <option value="default">Default</option>
                                        <option value="custom">Custom</option>
                                    </select>
                                </div>
                                @error('page.template_type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Template Name</label>
                                    <input type="text" class="form-control" wire:model.defer="page.template_name">
                                </div>
                                @error('page.template_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Parent Page</label>
                                    <select class="form-control" wire:model.defer="page.parent_id">
                                        <option value="">-- None --</option>
                                        @foreach ($parentPages as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('page.parent_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Published At</label>
                                    <input type="datetime" class="form-control" wire:model.defer="page.published_at">
                                </div>
                                @error('page.published_at') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-12 my-3">
                                <h5>Meta Tags</h5>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label>Meta Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-outline">
                                            <textarea class="form-control" rows="6" wire:model.defer="page.meta_description"></textarea>
                                        </div>
                                        @error('page.meta_description') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label>Meta Keywords</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-outline">
                                            <textarea class="form-control" rows="6" wire:model.defer="page.meta_keywords"></textarea>
                                        </div>
                                        @error('page.meta_keywords') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label>Canonical URL</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-outline">
                                            <input type="text" class="form-control" wire:model.defer="page.canonical_url">
                                        </div>
                                        @error('page.canonical_url') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 my-3">
                                <h5>Open Graph Tags</h5>
                                @foreach ([
                                    'og_title' => 'OG Title',
                                    'og_description' => 'OG Description',
                                    'og_url' => 'OG URL',
                                    'og_type' => 'OG Type',
                                    'og_site_name' => 'OG Site Name',
                                    'og_locale' => 'OG Locale'
                                ] as $field => $label)
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label>{{ $label }}</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-outline">
                                            <input type="text" class="form-control" wire:model.defer="page.{{ $field }}">
                                        </div>
                                        @error('page.' . $field) <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                @endforeach
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label>Published Time</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-outline">
                                            <input type="datetime-local" class="form-control" wire:model.defer="page.published_time">
                                        </div>
                                        @error('page.published_time') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label>Modified Time</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-outline">
                                            <input type="datetime-local" class="form-control" wire:model.defer="page.modified_time">
                                        </div>
                                        @error('page.modified_time') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 my-3">
                                <h5>Twitter Tags</h5>
                                @foreach ([
                                    'twitter_card' => 'Twitter Card',
                                    'twitter_title' => 'Twitter Title',
                                    'twitter_description' => 'Twitter Description'
                                ] as $field => $label)
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label>{{ $label }}</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-outline">
                                            <input type="text" class="form-control" wire:model.defer="page.{{ $field }}">
                                        </div>
                                        @error('page.' . $field) <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary">Create Page</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            document.addEventListener('alpine:init', () => {
                setTimeout(() => {
                    const contentElement = document.getElementById('content');
                    if (contentElement) {
                        const quill = new Quill('#content', { theme: 'snow' });

                        quill.root.innerHTML = @js($page['content'] ?? '');

                        quill.on('text-change', function () {
                            @this.set('page.content', quill.root.innerHTML);
                        });
                    }
                }, 300);
            })
        </script>
    @endpush
</div>