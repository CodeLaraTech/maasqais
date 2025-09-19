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

    <div class="job-post-details sp">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job-details-area right-padding">

                        <div class="job-owner">
                            <div class="image">
                                <img src="assets/img/job-post/job-post-image2.png" alt="">
                            </div>
                            <div class="text">
                                <h4>Candidate Portal</h4>
                            </div>
                        </div>

                        <div class="space40"></div>

                        <!-- Bootstrap Nav Tabs -->
                        <ul class="nav nav-tabs" id="authTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="signup-tab" data-bs-toggle="tab"
                                    data-bs-target="#signup" type="button" role="tab" aria-controls="signup"
                                    aria-selected="true">
                                    Sign Up
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                                    type="button" role="tab" aria-controls="login" aria-selected="false">
                                    Login
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="authTabsContent">
                            <!-- Sign Up Tab -->
                            <div class="tab-pane fade show active" id="signup" role="tabpanel">
                                <div class="details-contact-form">
                                    <div class="heading1">
                                        <h3>Sign Up</h3>
                                        <div class="space16"></div>
                                        <p>Create a new candidate account below</p>
                                    </div>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <input type="text" placeholder="First Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Last Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <input type="email" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <input type="number" placeholder="Phone">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <input type="password" placeholder="Password">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <input type="password" placeholder="Confirm Password">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="space30"></div>
                                                <div class="button">
                                                    <button class="theme-btn1" type="submit">Register Now <span><i
                                                                class="fa-solid fa-arrow-right"></i></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Login Tab -->
                            <div class="tab-pane fade" id="login" role="tabpanel">
                                <div class="details-contact-form">
                                    <div class="heading1">
                                        <h3>Login</h3>
                                        <div class="space16"></div>
                                        <p>Already registered? Login to your account</p>
                                    </div>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <input type="email" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <input type="password" placeholder="Password">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="space30"></div>
                                                <div class="button">
                                                    <button class="theme-btn1" type="submit">Login <span><i
                                                                class="fa-solid fa-arrow-right"></i></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="space40"></div>
                    </div>
                </div>

                <!-- Sidebar (unchanged) -->
                <div class="col-lg-4">
                    <div class="job-sidebar">
                        <div class="_job_widget _search">
                            <h3>Search</h3>
                            <form action="#" class="_relative">
                                <input type="email" placeholder="Search...">
                                <button><i class="fa-regular fa-magnifying-glass"></i></button>
                            </form>
                        </div>

                        <div class="_job_widget _cetegories mt-40">
                            <h3>Categories</h3>
                            <div class="_cetegories-list">
                                <ul>
                                    <li><a href="#">Talent Chronicles Stories <span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li><a href="#">Navigating Professional <span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li><a href="#">Recruitology Recruitment <span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li><a href="#">The Staffing Scoop <span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li><a href="#">Stories of Success <span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="_job_widget _call-btn mt-40">
                            <h3>If You Need Any Help Contact With Us</h3>
                            <div class="space10"></div>
                            <a href="tel:+917052101786" class="call-btn">
                                <img src="assets/img/icons/details-call.png" alt=""> +91 705 2101 786
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--===== CTA AREA START =======-->
    @include('partials.cta')
@endsection