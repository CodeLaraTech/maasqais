<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class="row">
                    {{-- Student Photo --}}
                    <div class="col-lg-3 text-center">
                        <img src="{{ $student->photo ? asset('storage/' . $student->photo) : url('assets/img/no-photo.jpg') }}"
                             class="rounded-circle mb-3" width="120" height="120" alt="Student Photo">
                    </div>

                    {{-- Student Info --}}
                    <div class="col-lg-6">
                        <h4>{{ $student->name['en'] ?? '-' }}</h4>
                        <p class="text-sm text-muted mb-2">SID: <code>{{ $student->reference }}</code></p>
                        <p class="mb-0"><strong>Email:</strong> {{ $student->email ?? '-' }}</p>
                        <p class="mb-0"><strong>Phone:</strong> {{ $student->phone ?? '-' }}</p>
                        <p class="mb-0"><strong>Status:</strong>
                            <span class="text-capitalize text-{{ $student->is_active ? 'success' : 'danger' }}">
                                {{ $student->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                        <p class="mb-0"><strong>Courses:</strong>
                            {{ $student->courses->pluck('name')->map(fn($name) => is_array($name) ? $name['en'] : $name)->join(', ') ?: '—' }}
                        </p>
                    </div>

                    {{-- Actions --}}
                    <div class="col-lg-3 text-end">
                        <a href="{{ route('lms.students.edit', $student->id) }}" class="btn btn-outline-success btn-sm mb-1">Edit</a>

                        <!-- Button to Open Modal -->
                        <button type="button" class="btn btn-outline-primary btn-sm mb-1" 
                                data-bs-toggle="modal" data-bs-target="#assignCoursesModal">
                            Assign Courses
                        </button>

                        <a href="{{ route('lms.students.index') }}" class="btn btn-outline-secondary btn-sm mb-1">Back</a>
                    </div>
                </div>

                {{-- Bio Section --}}
                <hr class="horizontal dark">
                <div class="row">
                    <div class="col-12">
                        <h6>Bio</h6>
                        <div class="border p-3 bg-light">
                            {!! $student->bio['en'] ?? 'No bio provided.' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Assign Courses Modal --}}
    <div class="modal fade" id="assignCoursesModal" tabindex="-1" aria-labelledby="assignCoursesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                {{-- Header --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="assignCoursesModalLabel">
                        Assign Courses to {{ $student->name['en'] ?? $student->name }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                {{-- Body --}}
                <div class="modal-body">
                    <form action="{{ route('lms.students.assign-courses', $student->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            @forelse($courses as $course)
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input 
    class="form-check-input" 
    type="checkbox" 
    name="courses[]" 
    value="{{ $course->id }}" 
    id="course{{ $course->id }}"
    {{ $student->courses->contains($course->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="course{{ $course->id }}">
                                            {{ is_array($course->name) ? ($course->name['en'] ?? reset($course->name)) : $course->name }}
                                        </label>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">No courses available.</p>
                            @endforelse
                        </div>

                        {{-- Footer --}}
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Courses</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
