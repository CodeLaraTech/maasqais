<div class="container-fluid py-4">
    <form wire:submit.prevent="save">
        <div class="card p-4">
            <div class="row g-4">

                <!-- Left Column: English Fields -->
                <div class="col-lg-8 border-end">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control border rounded p-3"
                               wire:model="translations.en.name" placeholder="Enter name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Designation</label>
                        <input type="text" class="form-control border rounded p-3"
                               wire:model="translations.en.designation" placeholder="Enter designation">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bio</label>
                        <textarea class="form-control border rounded p-3" rows="4"
                                  wire:model="translations.en.bio" placeholder="Enter bio"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control border rounded p-3" rows="3"
                                  wire:model="translations.en.message" placeholder="Enter message"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control border rounded p-3"
                               wire:model="translations.en.phone" placeholder="Enter phone number">
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="col-lg-4 ps-4">

                    <div class="mb-4 text-end border-bottom pb-3">
                        <button type="submit" class="btn bg-gradient-primary w-100">Save Team Member</button>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Photo</label>
                        <input type="file" class="form-control border rounded p-3" wire:model="photo">

                        <!-- Live Image Preview -->
                        @if ($photo)
                            <div class="mt-3">
                                <img src="{{ $photo->temporaryUrl() }}" 
                                     class="img-fluid rounded border" 
                                     style="max-height: 180px;">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control border rounded p-3"
                               wire:model="email" placeholder="Enter email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Facebook</label>
                        <input type="url" class="form-control border rounded p-3"
                               wire:model="facebook" placeholder="Enter Facebook link">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Twitter</label>
                        <input type="url" class="form-control border rounded p-3"
                               wire:model="twitter" placeholder="Enter Twitter link">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">LinkedIn</label>
                        <input type="url" class="form-control border rounded p-3"
                               wire:model="linkedin" placeholder="Enter LinkedIn link">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Instagram</label>
                        <input type="url" class="form-control border rounded p-3"
                               wire:model="instagram" placeholder="Enter Instagram link">
                    </div>

                    <!-- Active Checkbox -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="status" wire:model="status" value="1">
                        <label class="form-check-label" for="status">Active</label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" class="form-control border rounded p-3" wire:model="sort_order" value="0">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
