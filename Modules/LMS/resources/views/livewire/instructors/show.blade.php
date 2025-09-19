<div class="container-fluid py-4">
    <div class="row">
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-body">
                    {{-- Instructor Photo --}}
                    @if ($instructor->photo)
                        <div class="mb-4 text-center">
                            <img src="{{ asset('storage/' . $instructor->photo) }}" class="img-fluid rounded-circle" alt="Instructor Photo" style="max-height: 200px;">
                        </div>
                    @endif

                    {{-- Name --}}
                    <h2 class="mb-2 text-center">{{ $instructor->getTranslation('name', 'en') }}</h2>

                    {{-- Email --}}
                    <p class="text-center mb-4">
                        <strong>Email:</strong> {{ $instructor->email ?? '—' }}
                    </p>

                    {{-- Bio --}}
                    <div class="mt-4">
                        <h5>Bio</h5>
                        <div class="border p-3 rounded bg-light">
                            {!! $instructor->getTranslation('bio', 'en') !!}
                        </div>
                    </div>

                    {{-- Optional: Assigned Courses --}}
                    @if ($instructor->courses && $instructor->courses->count())
                        <div class="mt-4">
                            <h5>Courses Taught</h5>
                            <ul class="list-group">
                                @foreach ($instructor->courses as $course)
                                    <li class="list-group-item">
                                        {{ $course->getTranslation('name', 'en') }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
