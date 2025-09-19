<div class="container-fluid py-4">
    <div class="row">
        <div class="col-10 m-auto">
            <h3 class="mt-3 mb-0 text-center">Create Instructor</h3>
            <p class="lead font-weight-normal opacity-8 mb-3 text-center">Fill in the details for the new instructor.</p>

            <div class="card">
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <form wire:submit.prevent="store" enctype="multipart/form-data">
                        <div class="row">
                            {{-- Name fields --}}
                            @foreach (['en' => 'English', 'ar' => 'Arabic', 'ur' => 'Urdu'] as $lang => $label)
                                <div class="col-md-4 mb-3">
                                    <div class="input-group input-group-outline">
                                        <label>Name ({{ $label }})</label>
                                        <input type="text" class="form-control" wire:model.lazy="instructor.name.{{ $lang }}">
                                    </div>
                                    @error("instructor.name.$lang") <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            @endforeach

                            {{-- Email --}}
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Email</label>
                                    <input type="email" class="form-control" wire:model.lazy="instructor.email">
                                </div>
                                @error('instructor.email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Bio --}}
                            <div class="col-12 mb-3">
                                <div class="input-group d-block input-group-static mb-4" wire:ignore>
                                    <label class="ms-0">Bio (English)</label>
                                    <div id="bio" style="min-height: 150px;"></div>
                                </div>
                                @error('instructor.bio.en') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Photo --}}
                            <div class="col-12 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Photo</label>
                                    <input type="file" class="form-control" wire:model="photo">
                                </div>
                                @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary">Create Instructor</button>
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
                    const quillBio = new Quill('#bio', { theme: 'snow' });
                    quillBio.root.innerHTML = @js($instructor['bio']['en'] ?? '');
                    quillBio.on('text-change', function () {
                        @this.set('instructor.bio.en', quillBio.root.innerHTML);
                    });
                }, 300);
            });
        </script>
    @endpush
</div>
