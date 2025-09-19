<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">

                {{-- Header --}}
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Courses Management</strong></h6>
                    </div>
                </div>

                {{-- Add New Course --}}
                <div class="me-3 my-3 text-end">
                    <a href="{{ route('lms.courses.create') }}" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Course
                    </a>
                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    {{-- Search --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" wire:model.debounce.500ms="search" placeholder="Search by name">
                        </div>
                        <div>{{ $courses->links() }}</div>
                    </div>

                    {{-- Courses Table --}}
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th wire:click="sort('name')" style="cursor:pointer;">Name</th>
                                    <th>Fee</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th wire:click="sort('status')" style="cursor:pointer;">Status</th>
                                    <th wire:click="sort('created_at')" style="cursor:pointer;">Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($courses as $key => $course)
                                    <tr>
                                        {{-- Serial Number --}}
                                        <td>{{ $courses->firstItem() + $key }}</td>

                                        {{-- Course Name (English only) --}}
                                        <td>{{ is_array($course->name) ? $course->name['en'] : $course->name }}</td>

                                        {{-- Instructors (English only) --}}
                                        

                                        {{-- Fee --}}
                                        <td>{{ $course->fee ?? '-' }}</td>

                                        {{-- Price Display --}}
                                        <td>{{ $course->price_display ?? '-' }}</td>

                                        {{-- Duration --}}
                                        <td>{{ $course->duration_value ? $course->duration_value . ' ' . $course->duration_type : '-' }}</td>

                                        {{-- Enrollments --}}
                                        

                                        {{-- Status --}}
                                        <td>
                                            <span class="badge bg-{{ $course->status == 'active' ? 'success' : 'danger' }}">
                                                {{ ucfirst($course->status) }}
                                            </span>
                                        </td>

                                        {{-- Created At --}}
                                        <td>{{ $course->created_at->format('Y-m-d') }}</td>

                                        {{-- Actions --}}
                                        <td>
                                            <a href="{{ route('lms.courses.show', $course->id) }}" class="btn btn-sm btn-info btn-link">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="{{ route('lms.courses.edit', $course->id) }}" class="btn btn-sm btn-success btn-link">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <button wire:click="confirmDelete({{ $course->id }})" class="btn btn-sm btn-danger btn-link">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No courses found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    @include('livewire.partials.delete-confirmation-modal')
</div>
