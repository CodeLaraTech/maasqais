<div class="container-fluid py-4" x-data>
    <div class="row">
        <div class="col-10 m-auto">
            <h3 class="mt-3 mb-0 text-center">Create Student</h3>
            <p class="lead font-weight-normal opacity-8 mb-3 text-center">Fill in the details for the new student.</p>

            <div class="card">
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <form wire:submit.prevent="store" enctype="multipart/form-data">
                        <div class="row">
                            {{-- Name fields --}}
                            @foreach (['en' => 'English'] as $lang => $label)
                                <div class="col-md-6 mb-3">
                                    <div class="input-group input-group-outline">
                                        <label>Name ({{ $label }})</label>
                                        <input type="text" class="form-control" wire:model.lazy="student.name.{{ $lang }}">
                                    </div>
                                    @error("student.name.$lang") <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            @endforeach

                            {{-- Email --}}
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Email</label>
                                    <input type="email" class="form-control" wire:model.defer="student.email">
                                </div>
                                @error('student.email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                             {{-- Password --}}
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Password</label>
                                    <input type="password" class="form-control" wire:model.defer="student.password">
                                </div>
                                @error('student.password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>


                            {{-- Phone --}}
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" wire:model.defer="student.phone">
                                </div>
                                @error('student.phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>




                            {{-- Bio (Quill) --}}
                            <div class="col-12 mb-5" wire:ignore>
                                <label>Bio (English)</label>
                                <div id="bio" class="border rounded p-2" style="min-height:100px;">
                                    {!! $student['bio']['en'] ?? '' !!}
                                </div>
                                @error('student.bio.en') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Photo --}}
                            <div class="col-12 mt-5 mb-3">
                                <div class="input-group">
                                    <label>Student Photo</label>
                                    <input type="file" class="form-control" wire:model="student.photo">
                                </div>
                                @error('student.photo') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>


                            {{-- Submit --}}
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary">Create Student</button>
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
                    // -----------------------------
                    // Quill for Bio
                    // -----------------------------
                    const quillBio = new Quill('#bio', { theme: 'snow' });
                    quillBio.root.innerHTML = @js($student['bio']['en'] ?? '');
                    quillBio.on('text-change', function () {
                        @this.set('student.bio.en', quillBio.root.innerHTML);
                    });

                    // -----------------------------
                    // Select2 for Courses
                    // -----------------------------
                    const courseSelect = $('#courseSelect');

                    courseSelect.select2({
                        placeholder: 'Select Courses',
                        width: '100%',
                        allowClear: true
                    });

                    // Update Livewire when selection changes
                    courseSelect.on('change', function () {
                        const selected = $(this).val() || []; // ensure it's always an array
                        @this.set('student.course_ids', selected);
                    });

                    // Keep Select2 in sync after Livewire updates
                    Livewire.hook('message.processed', (message, component) => {
                        courseSelect.val(@this.get('student.course_ids')).trigger('change');
                    });
                }, 300);
            });
        </script>

    @endpush
</div>
