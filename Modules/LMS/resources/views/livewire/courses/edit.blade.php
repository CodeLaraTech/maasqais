<div class="container-fluid py-4">
    <div class="row">
        <div class="col-10 m-auto">
            <h3 class="mt-3 mb-0 text-center">Edit Course</h3>
            <p class="lead font-weight-normal opacity-8 mb-3 text-center">Update the course details below.</p>

            <div class="card">
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <form wire:submit.prevent="update" enctype="multipart/form-data">
                        <div class="row">

                            {{-- Multilingual Name --}}
                            @foreach (['en' => 'English', 'ar' => 'Arabic', 'ur' => 'Urdu'] as $lang => $label)
                                <div class="col-md-4 mb-3">
                                    <div class="input-group input-group-outline">
                                        <label>Name ({{ $label }})</label>
                                        <input type="text" class="form-control"
                                               wire:model.live="course.name.{{ $lang }}"
                                               @if($lang === 'en') wire:blur="generateSlug" @endif>
                                    </div>
                                    @error("course.name.$lang") <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            @endforeach

                            {{-- Slug --}}
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" wire:model.defer="course.slug">
                                </div>
                                @error('course.slug') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Instructors --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Instructors</label>
                                <div class="input-group input-group-outline">
                                    <select class="form-control" multiple wire:model.defer="course.instructor_ids">
                                        @foreach($instructors as $instructor)
                                            <option value="{{ $instructor->id }}">
                                                {{ $instructor->getTranslation('name', 'en') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('course.instructor_ids') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Fee --}}
                            <div class="col-md-3 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Fee (Amount)</label>
                                    <input type="number" step="0.01" class="form-control" wire:model.defer="course.fee">
                                </div>
                                @error('course.fee') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Currency --}}
                            <div class="col-md-3 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Currency</label>
                                    <select class="form-control" wire:model.defer="course.currency">
                                        <option value="">Select</option>
                                        <option value="USD">USD ($)</option>
                                        <option value="INR">INR (₹)</option>
                                        <option value="EUR">EUR (€)</option>
                                        <option value="GBP">GBP (£)</option>
                                        <option value="AED">AED (د.إ)</option>
                                    </select>
                                </div>
                                @error('course.currency') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Price Display --}}
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Price Display (Optional)</label>
                                    <input type="text" class="form-control"
                                           wire:model.defer="course.price_display"
                                           placeholder="$16.00 or د.إ50.00">
                                </div>
                                @error('course.price_display') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Duration --}}
                            <div class="col-md-3 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Duration</label>
                                    <input type="number" class="form-control" wire:model.defer="course.duration_value">
                                </div>
                                @error('course.duration_value') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Duration Type</label>
                                    <select class="form-control" wire:model.defer="course.duration_type">
                                        <option value="">Select</option>
                                        <option value="days">Days</option>
                                        <option value="weeks">Weeks</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                    </select>
                                </div>
                                @error('course.duration_type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Enrollments --}}
                            <div class="col-md-3 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Enrollments</label>
                                    <input type="number" class="form-control" wire:model.defer="course.enrollments">
                                </div>
                                @error('course.enrollments') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Description --}}
                            <div class="col-12 mb-3">
                                <div class="input-group d-block input-group-static mb-4" wire:ignore>
                                    <label class="ms-0">Description (English)</label>
                                    <div id="description" style="min-height: 150px;"></div>
                                </div>
                                @error('course.description.en') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Image --}}
                            <div class="col-12 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Course Image</label>
                                    <input type="file" class="form-control" wire:model="image">
                                </div>
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary">Update Course</button>
                            </div>
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
                    const quill = new Quill('#description', { theme: 'snow' });
                    quill.root.innerHTML = @js($course['description']['en'] ?? '');
                    quill.on('text-change', function () {
                        @this.set('course.description.en', quill.root.innerHTML);
                    });
                }, 300);
            });
        </script>
    @endpush
</div>
