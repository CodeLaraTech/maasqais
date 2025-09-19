<div class="container-fluid py-4">
    <div class="card p-4">
        <div class="row g-4">

            <!-- Left: English Fields Only -->
            <div class="col-lg-8 border-end">
                <div class="mb-3">
                    <label class="form-label">Name (English)</label>
                    <input type="text" class="form-control border rounded p-3"
                        wire:model.defer="translations.en.name" placeholder="Enter name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Designation (English)</label>
                    <input type="text" class="form-control border rounded p-3"
                        wire:model.defer="translations.en.designation" placeholder="Enter designation">
                </div>

                <div class="mb-3">
                    <label class="form-label">Bio (English)</label>
                    <textarea class="form-control border rounded p-3" rows="4"
                        wire:model.defer="translations.en.bio" placeholder="Enter bio"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Message (English)</label>
                    <textarea class="form-control border rounded p-3" rows="3"
                        wire:model.defer="translations.en.message" placeholder="Enter message"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone (English)</label>
                    <input type="text" class="form-control border rounded p-3"
                        wire:model.defer="translations.en.phone" placeholder="Enter phone number">
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 ps-4">
                <div class="mb-4 text-end border-bottom pb-3">
                    <button type="button" wire:click="update" class="btn bg-gradient-primary w-100">
                        Update Team Member
                    </button>
                </div>

                <!-- Photo -->
                <div class="mb-3">
                    <label class="form-label">Photo</label>
                    <input type="file" class="form-control border rounded p-3" wire:model="newPhoto">
                    @if ($newPhoto)
                        <img src="{{ $newPhoto->temporaryUrl() }}" class="img-fluid mt-2 rounded shadow" width="120">
                    @elseif ($photo)
                        <img src="{{ asset('storage/' . $photo) }}" class="img-fluid mt-2 rounded shadow" width="120">
                    @endif
                </div>

                <!-- Social Media Fields -->
                <div class="mb-3">
                    <label class="form-label">Facebook</label>
                    <input type="url" class="form-control border rounded p-3" wire:model="facebook"
                        placeholder="Enter Facebook link">
                </div>

                <div class="mb-3">
                    <label class="form-label">Twitter</label>
                    <input type="url" class="form-control border rounded p-3" wire:model="twitter"
                        placeholder="Enter Twitter link">
                </div>

                <div class="mb-3">
                    <label class="form-label">LinkedIn</label>
                    <input type="url" class="form-control border rounded p-3" wire:model="linkedin"
                        placeholder="Enter LinkedIn link">
                </div>

                <div class="mb-3">
                    <label class="form-label">Instagram</label>
                    <input type="url" class="form-control border rounded p-3" wire:model="instagram"
                        placeholder="Enter Instagram link">
                </div>

                <!-- Active Checkbox -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="status" wire:model="status" value="1"
                        @if($status) checked @endif>
                    <label class="form-check-label" for="status">Active</label>
                </div>

                <!-- Sort Order -->
                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" class="form-control border rounded p-3" wire:model="sort_order" min="0"
                        placeholder="Enter sort order">
                </div>
            </div>

        </div>
    </div>
</div>
