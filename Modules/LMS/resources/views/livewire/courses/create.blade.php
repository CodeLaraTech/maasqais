<div class="container-fluid py-4">
    <div class="card p-4">
        <div class="row g-4">

            <!-- Left: Course Details -->
            <div class="col-lg-8 border-end">

                {{-- Course Name --}}
                <div class="mb-3">
                    <label class="form-label">Course Name</label>
                    <input type="text" class="form-control border rounded p-3" 
                        placeholder="Enter course name" 
                        wire:model.defer="course.name.en" 
                        wire:keyup="generateSlug">
                </div>

                {{-- Slug --}}
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control border rounded p-3" 
                        placeholder="Slug will be auto-generated" 
                        wire:model.defer="course.slug">
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control border rounded p-3" rows="4"
                        placeholder="Enter course description" 
                        wire:model.defer="course.description.en"></textarea>
                </div>

            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 ps-4">

                {{-- Save Button --}}
                <div class="mb-4 text-end border-bottom pb-3">
                    <button type="button" class="btn bg-gradient-primary w-100" wire:click="store">
                        Save Course
                    </button>
                </div>

                {{-- Image Upload --}}
                <div class="mb-3">
                    <label class="form-label">Course Image</label>
                    <input type="file" class="form-control border rounded p-3" wire:model="image">
                    @if($image)
                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded mt-2" style="max-height:200px;">
                    @endif
                </div>

                {{-- Fee --}}
                <div class="mb-3">
                    <label class="form-label">Fee</label>
                    <input type="number" class="form-control border rounded p-3" 
                        placeholder="Enter course fee" wire:model.defer="course.fee" min="0">
                </div>

                {{-- Currency --}}
                <div class="mb-3">
                    <label class="form-label">Currency</label>
                    <input type="text" class="form-control border rounded p-3" 
                        placeholder="Currency (e.g., USD, INR)" wire:model.defer="course.currency">
                </div>

                {{-- Price Display --}}
                <div class="mb-3">
                    <label class="form-label">Price Display</label>
                    <input type="text" class="form-control border rounded p-3" 
                        placeholder="Auto-generated if left blank" wire:model.defer="course.price_display">
                </div>

                {{-- Duration --}}
                <div class="mb-3">
                    <label class="form-label">Duration</label>
                    <div class="input-group">
                        <input type="number" class="form-control border rounded p-3" 
                            placeholder="Enter value" wire:model.defer="course.duration_value" min="0">
                        <select class="form-select border rounded p-3" wire:model.defer="course.duration_type">
                            <option value="">Select type</option>
                            <option value="days">Days</option>
                            <option value="weeks">Weeks</option>
                            <option value="months">Months</option>
                            <option value="years">Years</option>
                        </select>
                    </div>
                </div>

                {{-- Enrollments --}}
                <div class="mb-3">
                    <label class="form-label">Enrollments</label>
                    <input type="number" class="form-control border rounded p-3" 
                        placeholder="Number of students" wire:model.defer="course.enrollments" min="0">
                </div>

                {{-- Instructors --}}
                <div class="mb-3">
                    <label class="form-label">Assign Instructors</label>
                    <select class="form-control border rounded p-3" wire:model.defer="course.instructor_ids" multiple>
                        @foreach($instructors as $instructor)
                            <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Status --}}
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" wire:model.defer="course.status" id="status">
                    <label class="form-check-label" for="status">Active</label>
                </div>

            </div>

        </div>
    </div>
</div>
