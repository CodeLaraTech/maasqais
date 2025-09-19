<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <!-- Card Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Instructor Management</strong></h6>
                    </div>
                </div>

                <!-- Add New Instructor Button -->
                <div class="me-3 my-3 text-end">
                    <a href="{{ route('lms.instructors.create') }}" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Instructor
                    </a>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <div class="mt-3">
                        <!-- Search -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="input-group input-group-outline">
                                <input type="text" class="form-control" wire:model.live="search" placeholder="Search by name or email">
                            </div>
                            <div>{{ $instructors->links() }}</div>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Photo</th>
                                        <th>Bio</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($instructors as $instructor)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $instructor->getTranslation('name', 'en') }}</td>
                                            <td>{{ $instructor->email ?? '—' }}</td>
                                            <td>
                                                @if ($instructor->photo)
                                                    <img src="{{ asset('storage/' . $instructor->photo) }}" alt="photo" class="avatar avatar-sm rounded-circle">
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td>{{ Str::limit($instructor->getTranslation('bio', 'en'), 50) ?? '—' }}</td>
                                            <td>
                                                <a href="{{ route('lms.instructors.show', $instructor->id) }}" target="_blank"
                                                    class="btn btn-sm btn-info btn-link" title="View">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                                <a href="{{ route('lms.instructors.edit', $instructor->id) }}" class="btn btn-sm btn-success btn-link">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button wire:click="confirmDelete({{ $instructor->id }})" class="btn btn-sm btn-danger btn-link">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-3">
                            {{ $instructors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.partials.delete-confirmation-modal')
</div>
