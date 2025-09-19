@extends('layouts.main')
@include('partials.pages.title-meta-tags')

@section('content')
<style>
    ul{
        list-style: square;
        padding-left: 20px;
    }
</style>
    <div class="common-hero"
        style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d'); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 100px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <div class="main-heading" style="color: white;">
                        <h1>{{ $job->title ?? 'Job Details' }}</h1>
                        <div class="pages-intro" style="color: white;">
                            <a href="{{ url('/') }}" style="color: white;">Home</a>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">Jobs</p>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">{{ $job->title ?? 'Job Opening' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--===== Job Details Start =====-->
    <div class="job-post-details sp">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job-details-area right-padding">
                        <div class="tags-area">
                            <ul>
                                <li class="tag">{{ ucwords(str_replace('-', ' ', $job->type)) }}</li>
                                <li class="add-icon"><span class="icon"><img
                                            src="{{ asset('assets/img/icons/job-details-tag-icon1.svg') }}" alt=""></span>
                                    {{ $job->location }}</li>
                                <li class="add-icon"><span class="icon"><img
                                            src="{{ asset('assets/img/icons/job-details-tag-icon2.svg') }}" alt=""></span>
                                    Posted {{ \Carbon\Carbon::parse($job->posted_at)->diffForHumans() }}</li>
                                <li class="add-icon"><span class="icon"><img
                                            src="{{ asset('assets/img/icons/job-details-tag-icon3.svg') }}" alt=""></span>Salary $ {{ $job->basic_salary ?? '1700/Month' }}</li>
                            </ul>
                        </div>

                        <div class="space40"></div>

                        <article>
                            <div class="job-single-post">
                                <div class="image">
                                    <img src="{{ asset('assets/img/job-post/job-details-image.png') }}" alt="">
                                </div>
                                <div class="space20"></div>
                                <div class="heading1">
                                    <h3>Current Opening: {{ $job->title ?? 'Job Details' }}</h3>
                                </div>
                                <div class="content mt-3">
                                    {!! $job->description !!}
                                </div>
                            </div>
                        </article>
                        <div class="space40"></div>
                        <div class="social-area">
                            <div class="icons">
                                <ul>
                                    <li class="text">Connect With Us:</li>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="button">
                                <a class="theme-btn1" href="#apply">Apply Now <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="space30"></div>

                        <!--===== Form Section =====-->
                        <div class="details-contact-form" id="apply">
                            <div class="heading1">
                                <h3>Apply for this Position</h3>
                                <p>Please fill out the form below to apply.</p>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('jobs.apply',$job->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="job_id" value="{{$job->id}}">
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" name="first_name" placeholder="First Name" value="{{old('first_name')??''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" name="last_name" placeholder="Last Name"  value="{{old('last_name')??''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="email" name="email" placeholder="Email"  value="{{old('email')??''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" name="phone"  value="{{old('phone')??''}}" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <input type="text" name="subject"  value="{{old('subject')??''}}" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <textarea name="message" rows="4" placeholder="Message">{{old('message')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <label>Upload Resume (PDF/DOC)</label>
                                            <input type="file" name="resume" accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="button">
                                            <button class="theme-btn1" type="submit">Submit Now <i
                                                    class="fa-solid fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="space40"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="job-sidebar">
                        <div class="_job_widget _search">
                            <h3>Search</h3>
                            <form class="_relative">
                                <input type="text" placeholder="Search...">
                                <button><i class="fa-regular fa-magnifying-glass"></i></button>
                            </form>
                        </div>

                        <div class="_job_widget _cetegories mt-40">
                            <h3>Categories</h3>
                            <ul class="_cetegories-list">
                                <li><a href="#">Talent Chronicles <i class="fa-regular fa-arrow-right"></i></a></li>
                                <li><a href="#">Professional Tips <i class="fa-regular fa-arrow-right"></i></a></li>
                                <li><a href="#">Recruitology <i class="fa-regular fa-arrow-right"></i></a></li>
                            </ul>
                        </div>

                        <div class="_job_widget _recent-job mt-40">
                            <h3>Recent Openings</h3>
                            <div class="recent-job-list">
                                <div class="recent-job-single">
                                    <h4>Sales Manager</h4>
                                    <p>Saudi Arabia / Freelance</p>
                                </div>
                                <div class="recent-job-single">
                                    <h4>Project Manager</h4>
                                    <p>London / Part Time</p>
                                </div>
                                <div class="recent-job-single">
                                    <h4>Marketing Director</h4>
                                    <p>Paris / Full Time</p>
                                </div>
                            </div>
                        </div>

                        <div class="_job_widget _call-btn mt-40">
                            <h3>Need Help?</h3>
                            <a href="tel:+917052101786" class="call-btn">
                                <img src="{{ asset('assets/img/icons/details-call.png') }}" alt=""> +91 705 2101 786
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.cta')
@endsection
