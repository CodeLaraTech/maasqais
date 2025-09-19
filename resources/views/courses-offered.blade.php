@extends('layouts.main')
@include('partials.pages.title-meta-tags')
@section('content')
    <div class="common-hero"
        style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d'); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 100px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <div class="main-heading" style="color: white;">
                        <h1>{{ $page->title ?? 'Page' }}</h1>
                        <div class="pages-intro" style="color: white;">
                            <a href="{{url('/')}}" style="color: white;">Home</a>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">Services</p>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">{{ $page->title ?? 'Page' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====HERO AREA END=======-->

    <!--=====SERVICE DETAILS START=======-->

    @if(isset($courses) && $courses->count())
        <div class="job-page sp">
            <div class="container">
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6">
                            <div class="job-post-box @if($loop->index > 2) mt-30 @endif">
                                <p class="tag">Course</p>
                                <p class="tag">{{ $course->duration_value }} {{ ucfirst($course->duration_type) }}</p>

                                <!-- Image Area (Centered) -->
                                <div class="job-owners-area justify-content-center align-items-center">
                                    <div class="d-flex justify-content-center align-items-center"
                                        style="height:180px; overflow:hidden; border-radius:10px;">
                                        @if($course->image)
                                            <img src="{{ asset('storage/' . $course->image) }}"
                                                alt="{{ $course->getTranslation('name', app()->getLocale()) }}"
                                                style="max-width:100%; max-height:100%; object-fit:cover;">
                                        @else
                                            <img src="{{ asset('frontend/img/course/default.png') }}" alt="Default Course"
                                                style="max-width:100%; max-height:100%; object-fit:cover;">
                                        @endif
                                    </div>
                                </div>

                                <div class="divider"></div>

                                <!-- Work Info -->
                                <div class="work-info">
                                    <h5>{{ $course->getTranslation('name', app()->getLocale()) }}</h5>
                                    <h6>{{ $course->price_display }} / Course</h6>

                                    <!-- Course Bio/Short Description -->
                                    @if($course->getTranslation('description', app()->getLocale()))
                                                    <div class="course-bio">
                                                        {!! \Illuminate\Support\Str::limit(
                                            $course->getTranslation('description', app()->getLocale()),
                                            100,
                                            '...'
                                        ) !!}
                                                    </div>
                                    @endif

                                    <span>Started {{ $course->created_at->diffForHumans() }}</span>
                                </div>

                                <!-- Button -->
                                <div class="button">
                                    <a class="job-learn" href="#">
                                        View Details <span><i class="fa-solid fa-arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="space30"></div>
                <div class="row">
                    <div class="col-12 m-auto">
                        <div class="theme-pagination text-center">
                            {{ $courses->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif



    <!--=====SERVICE DETAILS END=======-->



    <!--===== CTA AREA START =======-->

    @include('partials.cta')
@endsection