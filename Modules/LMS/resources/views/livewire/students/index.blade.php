<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                {{-- Header --}}
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Student Management</strong></h6>
                    </div>
                </div>

                {{-- Add Button --}}
                <div class="me-3 my-3 text-end">
                    <a href="{{ route('lms.students.create') }}" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Student
                    </a>
                </div>

                {{-- Flash Message --}}
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    {{-- Search and Filters --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <input type="text" class="form-control w-50" wire:model.debounce.300ms="search"
                            placeholder="Search by name, email, or SID">

                        <select wire:model="filterStatus" class="form-select w-auto">
                            <option value="">All Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    {{-- Students Table --}}
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>SID</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Courses</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $index => $student)
                                    <tr>
                                        <td class="text-center">{{ $students->firstItem() + $index }}</td>

                                        {{-- Photo --}}
                                        <td class="text-center">
                                            @if($student->photo)
                                                <img src="{{ asset('storage/' . $student->photo) }}" alt="Photo"
                                                    class="rounded-circle" width="40" height="40">
                                            @else
                                                <img src="{{ url('assets/img/no-photo.jpg') }}" alt="No Photo"
                                                    class="rounded-circle" width="40" height="40">
                                            @endif
                                        </td>

                                        <td>{{ is_array($student->name) ? $student->name['en'] ?? '' : $student->name }}
                                        </td>
                                        <td>{{ $student->email ?? '—' }}</td>
                                        <td>{{ $student->reference ?? '—' }}</td>
                                        <td>{{ $student->phone ?? '—' }}</td>
                                        <td>
                                            <span
                                                class="badge bg-gradient-{{ $student->is_active ? 'success' : 'secondary' }}">
                                                {{ $student->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($student->courses->isNotEmpty())
                                                @php
                                                    $firstCourse = $student->courses->first();
                                                @endphp
                                                {{ is_array($firstCourse->name) ? ($firstCourse->name['en'] ?? '') : $firstCourse->name }}
                                                @if($student->courses->count() > 1)
                                                    , etc.
                                                @endif
                                            @else
                                                —
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('lms.students.show', $student->id) }}"
                                                class="btn btn-sm btn-info" title="View">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="{{ route('lms.students.edit', $student->id) }}"
                                                class="btn btn-sm btn-success" title="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <button wire:click="confirmDelete({{ $student->id }})"
                                                class="btn btn-sm btn-danger" title="Delete">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-muted">No students found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    @include('livewire.partials.delete-confirmation-modal', ['deleteId' => $deleteId ?? null])
</div>