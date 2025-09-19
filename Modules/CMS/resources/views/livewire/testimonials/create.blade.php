<div class="container-fluid py-4">
    <div class="card p-4">
        <div class="row g-4">

            <!-- Left: English Fields -->
            <div class="col-lg-8 border-end">

                <div class="mb-3">
                    <label class="form-label">Name </label>
                    <input type="text" class="form-control border rounded p-3" placeholder="Enter name "
                        wire:model.defer="translations.en.name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone </label>
                    <input type="text" class="form-control border rounded p-3" placeholder="Enter phone number "
                        wire:model.defer="translations.en.phone">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email </label>
                    <input type="email" class="form-control border rounded p-3" placeholder="Enter email"
                        wire:model.defer="email">
                </div>

                <div class="mb-3">
                    <label class="form-label">About </label>
                    <textarea class="form-control border rounded p-3" rows="4" placeholder="Write about the person "
                        wire:model.defer="translations.en.about"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Message </label>
                    <textarea class="form-control border rounded p-3" rows="3" placeholder="Write testimonial message "
                        wire:model.defer="translations.en.message"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Designation </label>
                    <input type="text" class="form-control border rounded p-3" placeholder="Enter designation "
                        wire:model.defer="translations.en.designation">
                </div>

                <div class="mb-3">
                    <label class="form-label">Company </label>
                    <input type="text" class="form-control border rounded p-3" placeholder="Enter company name "
                        wire:model.defer="translations.en.company">
                </div>

                <div class="mb-3">
                    <label class="form-label">Location </label>
                    <input type="text" class="form-control border rounded p-3" placeholder="Enter location "
                        wire:model.defer="translations.en.location">
                </div>

            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 ps-4">

                <!-- Save Button -->
                <div class="mb-4 text-end border-bottom pb-3">
                    <button type="button" class="btn bg-gradient-primary w-100" wire:click="save">Save
                        Testimonial</button>
                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control border rounded p-3" wire:model="image">
                    @if($image)
                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded mt-2" style="max-height:200px;">
                    @elseif(isset($testimonial) && $testimonial->image)
                        <img src="{{ asset('storage/' . $testimonial->image) }}" class="img-fluid rounded mt-2"
                            style="max-height:200px;">
                    @endif
                </div>

                <!-- Video URL -->
                <div class="mb-3">
                    <label class="form-label">Video URL</label>
                    <input type="text" class="form-control border rounded p-3"
                        placeholder="Enter video URL (YouTube/Vimeo)" wire:model.defer="video_url">

                    @if($video_url)
                        <div class="mt-2">
                            <iframe class="img-fluid rounded" style="height:150px;width:100%"
                                src="{{ str_replace('watch?v=', 'embed/', $video_url) }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    @endif
                </div>

                <!-- Video File Upload -->
                <div class="mb-3">
                    <label class="form-label">Upload Video</label>
                    <input type="file" class="form-control border rounded p-3" accept="video/*" wire:model="video_file">
                </div>

                <!-- Video Preview -->
                @if($video_file)
                    <div class="mb-3">
                        <label class="form-label">Video Preview</label>
                        <video class="img-fluid rounded" style="max-height:150px;" controls>
                            <source src="{{ $video_file->temporaryUrl() }}">
                        </video>
                    </div>
                @elseif(isset($testimonial) && $testimonial->video_path)
                    <div class="mb-3">
                        <label class="form-label">Video Preview</label>
                        <video class="img-fluid rounded" style="max-height:150px;" controls>
                            <source src="{{ asset('storage/' . $testimonial->video_path) }}">
                        </video>
                    </div>
                @endif

                <!-- Rating -->
                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <input type="number" class="form-control border rounded p-3" min="1" max="5"
                        placeholder="Enter rating (1-5)" wire:model.defer="rating">
                </div>

                <!-- Featured -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" wire:model.defer="featured" id="featured">
                    <label class="form-check-label" for="featured">Featured</label>
                </div>

                <!-- Status -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" wire:model.defer="status" id="status">
                    <label class="form-check-label" for="status">Active</label>
                </div>

                <!-- Sort Order -->
                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" class="form-control border rounded p-3" placeholder="Enter sort order"
                        wire:model.defer="sort_order" value="0">
                </div>

            </div>
        </div>
    </div>
</div>