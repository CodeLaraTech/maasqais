<div class="container py-5">
    <h2 class="mb-4">👋 Welcome, {{ $student->name['en'] ?? $student->name }}</h2>

    <div class="mb-4">
        <a href="{{ route('courses.index') }}" class="btn btn-primary">📚 Browse More Courses</a>
    </div>

    <h4>Your Enrolled Courses:</h4>

    @if($student->courses->count())
        <div class="row">
            @foreach($student->courses as $course)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->name['en'] ?? $course->name }}</h5>
                            <p class="card-text">
                                Status: <strong>{{ ucfirst($course->pivot->status) }}</strong><br>
                                Enrolled At: <small>{{ \Carbon\Carbon::parse($course->pivot->enrolled_at)->format('d M Y') }}</small>
                            </p>
                            <a href="{{ route('frontend.courses.show', $course->slug) }}" class="btn btn-sm btn-outline-primary">View Course</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">You haven't enrolled in any courses yet.</p>
    @endif
</div>
