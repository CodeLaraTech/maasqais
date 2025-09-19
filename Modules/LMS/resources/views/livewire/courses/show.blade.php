<div>
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-body">

                        {{-- Course Image --}}
                        @if($course->image)
                            <div class="mb-4 text-center">
                                <img src="{{ asset('storage/' . $course->image) }}" 
                                     class="img-fluid rounded" 
                                     alt="Course Image" 
                                     style="max-height: 300px;">
                            </div>
                        @endif

                        {{-- Title + Actions --}}
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="mb-0">{{ $course->name['en'] ?? $course->name }}</h2>

                            {{-- Actions --}}
                            <div class="text-end">
                                <a href="{{ route('lms.courses.edit', $course->id) }}" 
                                   class="btn btn-outline-success btn-sm mb-1">
                                    Edit
                                </a>

                                <!-- Button to Open Assign Students Modal -->
                                <button type="button" 
                                        class="btn btn-outline-primary btn-sm mb-1" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#assignStudentsModal">
                                    Assign Students
                                </button>

                                <a href="{{ route('lms.courses.index') }}" 
                                   class="btn btn-outline-secondary btn-sm mb-1">
                                    Back
                                </a>
                            </div>
                        </div>

                        {{-- Fee and Currency --}}
                        <p><strong>Fee:</strong> {{ $course->currency ?? '-' }} {{ $course->fee ?? '-' }}</p>

                        {{-- Price Display --}}
                        <p><strong>Price Display:</strong> {{ $course->price_display ?? '-' }}</p>

                        {{-- Duration --}}
                        <p><strong>Duration:</strong> 
                            {{ $course->duration_value ?? '-' }} {{ $course->duration_type ? ucfirst($course->duration_type) : '-' }}
                        </p>

                        {{-- Description --}}
                        @if($course->description)
                            <div class="mt-4">
                                <h5>Description</h5>
                                <div class="border p-3 rounded bg-light">
                                    {!! $course->description !!}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Assign Students Modal --}}
    <div class="modal fade" id="assignStudentsModal" tabindex="-1" aria-labelledby="assignStudentsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Students</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lms.courses.assign-students', $course->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            @forelse($students as $student)
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input 
                                            class="form-check-input" 
                                            type="checkbox" 
                                            name="students[]" 
                                            value="{{ $student->id }}" 
                                            id="student{{ $student->id }}"
                                            {{ $course->students->contains($student->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="student{{ $student->id }}">
                                            {{ $student->name['en'] ?? $student->name }}
                                        </label>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">No students found.</p>
                            @endforelse
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Students</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> {{-- ✅ closes the outer wrapper --}}
