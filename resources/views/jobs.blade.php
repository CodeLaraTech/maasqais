@extends('layouts.main')
@section('content')
    <div class="common-hero"
        style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d'); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 100px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <div class="main-heading" style="color: white;">
                        <h1>Jobs</h1>
                        <div class="pages-intro" style="color: white;">
                            <a href="index.html" style="color: white;">Home</a>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">Jobs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====HERO AREA END=======-->

    <!--===== JOB POST START =======-->

    <div class="job-page sp">
        <div class="container">
            <div class="row">
                @foreach ($jobs as $job)
                    <div class="col-lg-4 col-md-6">
                        <div class="job-post-box">
                            <p class="tag">{{ ucwords(str_replace('-', ' ', $job->type)) }}
                            </p>
                            <div class="job-owners-area">
                                <div class="image">
                                    <img src="{{ asset('storage/' . $job->image) }}" alt="">
                                </div>
                                <div class="text">
                                    <a href="{{ route('job.detail', $job->slug) }}">{{ $job->title }}</a>
                                    <p>{{ $job->location }}</p>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="text">
                                {{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($job->description ?? 'Job Opening')), 200, '...') }}
                            </div>
                            <div class="work-info">
                                <h5>{{ $job->position }}</h5>
                                <h6>{{ $job->salary }}</h6>
                                <span>Posted {{ \Carbon\Carbon::parse($job->posted_at)->diffForHumans() }}</span>
                            </div>
                            <div class="button">
                                <a class="job-learn" href="{{ route('job.detail', $job->slug) }}">
                                    View Details <span><i class="fa-solid fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


            <div class="space30"></div>
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="theme-pagination text-center">
                        {{ $jobs->links('vendor.pagination.default') }}
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!--===== JOB POST AREA END =======-->

    <!--===== CTA AREA START =======-->

    @include('partials.cta')
@endsection
