<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm bg-white p-4">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Edit Blog</h1>
                    <button type="button" wire:click="update" class="btn btn-primary">Update</button>
                </div>

                <form id="blogEditForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- Left Column -->
                        <div class="col-lg-8">
                            <!-- Language Tabs -->
                            <ul class="nav nav-tabs mb-3" id="langTabs" role="tablist">
                                @foreach(['en' => 'English'] as $locale => $label)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if($loop->first) active @endif" id="tab-{{ $locale }}"
                                            data-bs-toggle="tab" data-bs-target="#content-{{ $locale }}" type="button"
                                            role="tab" aria-controls="content-{{ $locale }}"
                                            aria-selected="@if($loop->first) true @else false @endif">
                                            {{ $label }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content">
                                @foreach(['en' => 'English'] as $locale => $label)
                                    <div class="tab-pane fade @if($loop->first) show active @endif"
                                        id="content-{{ $locale }}" role="tabpanel" aria-labelledby="tab-{{ $locale }}">
                                        <div class="mb-4">
                                            <input type="text" wire:model.defer="title.{{ $locale }}"
                                                class="form-control border rounded p-3 fs-4 fw-normal"
                                                placeholder="Add title" required>
                                            @error('title.' . $locale) <span
                                            class="text-danger">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="mb-4">
                                            <div class="fw-semibold mb-2">Content</div>
                                            <textarea wire:model.defer="content.{{ $locale }}"
                                                class="form-control border rounded p-3" rows="8"></textarea>
                                            @error('content.' . $locale) <span
                                            class="text-danger">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="mb-4">
                                            <div class="fw-semibold mb-2">Excerpt</div>
                                            <textarea wire:model.defer="excerpt.{{ $locale }}"
                                                class="form-control border rounded p-3" rows="3"></textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Discussion -->
                            <div class="mb-4">
                                <div class="fw-semibold mb-2">Discussion</div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" wire:model.defer="allow_comments">
                                    <label class="form-check-label">Allow comments</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.defer="allow_pings">
                                    <label class="form-check-label">Allow trackbacks and pingbacks</label>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column (Sidebar) -->
                        <div class="col-lg-4">
                            <!-- Publish Box -->
                            <div class="mb-4 p-3 border rounded bg-light">
                                <div class="fw-semibold mb-2">Publish</div>
                                <select wire:model.defer="status" class="form-select mb-2 p-2 border rounded">
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select>
                            </div>

                            <!-- Categories -->
                            <div class="mb-4 p-3 border rounded">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="fw-semibold">Categories</div>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-sm btn-outline-primary"
                                            data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                            + Add New
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                            wire:click.prevent="deleteSelectedCategories"
                                            onclick="confirm('Are you sure to delete selected categories?') || event.stopImmediatePropagation()">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                @foreach($categories as $parent)
                                    <div class="form-check ms-0">
                                        <input type="checkbox" value="{{ $parent->id }}"
                                            wire:model.defer="selectedCategoryIds" class="form-check-input"
                                            id="cat{{ $parent->id }}">
                                        <label class="form-check-label"
                                            for="cat{{ $parent->id }}">{{ $parent->name }}</label>
                                    </div>

                                    @if($parent->children()->count())
                                        @foreach($parent->children as $child)
                                            <div class="form-check ms-4">
                                                <input type="checkbox" value="{{ $child->id }}"
                                                    wire:model.defer="selectedCategoryIds" class="form-check-input"
                                                    id="subcat{{ $child->id }}">
                                                <label class="form-check-label"
                                                    for="subcat{{ $child->id }}">{{ $child->name }}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>

                            <!-- Tags -->
                            <div class="mb-4 p-3 border rounded">
                                <div class="fw-semibold mb-2">Tags</div>
                                <input type="text" wire:model.defer="tags" class="form-control mb-2"
                                    placeholder="Add tags">
                            </div>

                            <!-- Featured Image -->
                            <div class="mb-4 p-3 border rounded text-center" x-data="{ imagePreview: null }">
                                <div class="fw-semibold mb-2">Featured Image</div>

                                <!-- Image preview -->
                                <template x-if="imagePreview">
                                    <img :src="imagePreview" class="img-fluid mb-2">
                                </template>

                                <template x-if="!imagePreview">
                                    @if($blog->featured_image)
                                        <img src="{{ $image ? $image->temporaryUrl() : asset('storage/' . $blog->featured_image) }}"
                                            class="img-fluid mb-2">
                                    @endif
                                </template>

                                <!-- File input -->
                                <input type="file" wire:model="image" class="form-control mb-2" @change="
                                    const file = $event.target.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = e => imagePreview = e.target.result;
                                        reader.readAsDataURL(file);
                                    }
                                ">
                            </div>
                        </div>
                    </div>
                </form>

                @if(session()->has('message'))
                    <div class="alert alert-success mt-3">{{ session('message') }}</div>
                @endif
            </div>
        </div>
    </div>

    <div>
        <!-- Add Category Modal -->
        <div wire:ignore.self class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <!-- Toggle Buttons -->
                        <div class="mb-3 text-center">
                            <button type="button" class="btn btn-primary me-2" wire:click="toggleParent">Add
                                Parent</button>
                            <button type="button" class="btn btn-outline-primary" wire:click="toggleChild">Add
                                Subcategory</button>
                        </div>

                        <!-- Form -->
                        <form wire:submit.prevent="saveCategory">
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input type="text" class="form-control border rounded p-3" wire:model.defer="cat_name"
                                    placeholder="Enter category name">
                                @error('cat_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            @if($isChild)
                                <div class="mb-3">
                                    <label class="form-label">Select Parent Category</label>
                                    <select class="form-select" wire:model.defer="parentId">
                                        <option value="">-- Select Parent --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('parentId') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control border rounded p-3" wire:model.defer="cat_slug"
                                    placeholder="Enter slug">
                                @error('cat_slug') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" wire:model.defer="cat_status" checked>
                                <label class="form-check-label">Active</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>

                        <!-- Existing Categories -->
                        <div class="mt-4">
                            <h6>Existing Categories:</h6>
                            <ul class="list-group">
                                @foreach($categories as $category)
                                    <li class="list-group-item">
                                        {{ $category->name }} ({{ $category->status ? 'Active' : 'Inactive' }})
                                        @if($category->children->count())
                                            <ul class="list-group mt-2">
                                                @foreach($category->children as $child)
                                                    <li class="list-group-item">{{ $child->name }}
                                                        ({{ $child->status ? 'Active' : 'Inactive' }})</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        @if(session()->has('message'))
                            <div class="alert alert-success mt-3">{{ session('message') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- JS to close bootstrap modal when Livewire dispatches event -->
        <script>
            window.addEventListener('close-modal', event => {
                const id = event.detail.id;
                const el = document.getElementById(id);
                if (!el) return;
                const modal = bootstrap.Modal.getInstance(el) || new bootstrap.Modal(el);
                modal.hide();
            });
        </script>

    </div>



</div>