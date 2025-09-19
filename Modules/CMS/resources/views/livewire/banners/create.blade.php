<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">

                <!-- Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Create Banner</strong></h6>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Success Message -->
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="store" class="border rounded p-3">
                        <!-- Banner Name -->
                        <div class="mb-3">
                            <label class="form-label">Banner Name</label>
                            <input type="text" class="form-control border rounded p-3" wire:model="name"
                                placeholder="Enter banner name">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Banner Slug -->
                        <!-- Banner Slug -->
                        <div class="mb-3">
                            <label class="form-label">Banner Slug</label>
                            <input type="text" class="form-control border rounded p-3" wire:model.lazy="slug"
                                wire:keydown="$set('manualSlug', true)" placeholder="Auto-generated or enter manually">
                            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>


                        <!-- Banner Status -->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control border rounded p-3" wire:model="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <hr>
                        <h6><strong>Banner Items</strong></h6>

                        <!-- Banner Items Repeater -->
                        @foreach($items as $index => $item)
                            <div class="card border rounded p-3 mb-3">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control border rounded p-3"
                                            wire:model="items.{{ $index }}.title" placeholder="Enter title">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Subtitle</label>
                                        <input type="text" class="form-control border rounded p-3"
                                            wire:model="items.{{ $index }}.subtitle" placeholder="Enter subtitle">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label">Content</label>
                                        <textarea class="form-control border rounded p-3" rows="2"
                                            wire:model="items.{{ $index }}.content" placeholder="Enter content"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control border rounded p-3"
                                            wire:model="items.{{ $index }}.image">
                                        @if(isset($item['image_preview']))
                                            <img src="{{ $item['image_preview'] }}" alt="preview" class="img-fluid mt-2"
                                                style="max-height: 120px;">
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Link</label>
                                        <input type="text" class="form-control border rounded p-3"
                                            wire:model="items.{{ $index }}.link" placeholder="https://example.com">
                                    </div>

                                    <!-- Buttons Repeater -->
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label">Buttons</label>
                                        @foreach($item['buttons'] ?? [] as $btnIndex => $button)
                                            <div class="row mb-2 border rounded p-2">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control border rounded p-3"
                                                        wire:model="items.{{ $index }}.buttons.{{ $btnIndex }}.label"
                                                        placeholder="Button Label">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control border rounded p-3"
                                                        wire:model="items.{{ $index }}.buttons.{{ $btnIndex }}.url"
                                                        placeholder="Button URL">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" class="form-control border rounded p-3"
                                                        wire:model="items.{{ $index }}.buttons.{{ $btnIndex }}.sort_order"
                                                        placeholder="Sort Order">
                                                </div>
                                                <div class="col-md-2 text-end">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        wire:click="removeButton({{ $index }}, {{ $btnIndex }})">
                                                        Remove
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                        <button type="button" class="btn btn-outline-success btn-sm mt-2"
                                            wire:click="addButton({{ $index }})">
                                            + Add Button
                                        </button>
                                    </div>

                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Sort Order</label>
                                        <input type="number" class="form-control border rounded p-3"
                                            wire:model="items.{{ $index }}.sort_order">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Status</label>
                                        <select class="form-control border rounded p-3"
                                            wire:model="items.{{ $index }}.status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="text-end mt-2">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        wire:click="removeItem({{ $index }})">
                                        Remove Item
                                    </button>
                                </div>
                            </div>
                        @endforeach

                        <!-- Add Item Button -->
                        <div class="mb-3">
                            <button type="button" class="btn btn-outline-primary" wire:click="addItem">+ Add Banner
                                Item</button>
                        </div>

                        <!-- Submit -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Save Banner</button>
                            <a href="{{ route('cms.banners.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>