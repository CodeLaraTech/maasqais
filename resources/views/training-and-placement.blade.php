@extends('layouts.main')
@include('partials.pages.title-meta-tags')
@section('content')
    <!-- Hero Section -->
    <div class="common-hero"
        style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d'); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 100px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <div class="main-heading" style="color: white;">
                        <h1>Training and Placement</h1>
                        <div class="pages-intro" style="color: white;">
                            <a href="{{url('/')}}" style="color: white;">Home</a>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">Services</p>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">Training and Placement</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== HERO AREA END ======-->

    <!--===== SERVICE DETAILS START ======-->
    <div class="service-details-all sp">
        <div class="container">
            <div class="row">
                <!-- Left Sidebar Section -->
                <div class="col-lg-4 order-lg-1 order-2">
                    <div class="job-sidebar">
                        <div class="_job_widget _search">
                            <h3>Search Services</h3>
                            <form action="#" class="_relative">
                                <input type="text" placeholder="Search training programs...">
                                <button><i class="fa-regular fa-magnifying-glass"></i></button>
                            </form>
                        </div>

                        <div class="_job_widget _cetegories mt-40">
                            <h3>Our Services</h3>
                            <div class="_cetegories-list">
                                <ul>
                                    <li><a href="#">AR Billing Service<span><i class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li><a href="#">Partnering with AR Billing Companies<span><i class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li class="active"><a href="#">Training and Placement<span><i class="fa-regular fa-arrow-right"></i></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="_job_widget _recent-job mt-40">
                            <h3>Related Services</h3>
                            <div class="recent-job-list">
                                <div class="recent-job-single">
                                    <h4>Medical Coding Training</h4>
                                    <p>Certified coding programs</p>
                                </div>
                                <div class="recent-job-single">
                                    <h4>AR Specialist Training</h4>
                                    <p>Accounts receivable training</p>
                                </div>
                                <div class="recent-job-single">
                                    <h4>Job Placement</h4>
                                    <p>Direct placement services</p>
                                </div>
                            </div>
                        </div>

                        <div class="_job_widget _call-btn mt-40">
                            <h3>Interested in Training?</h3>
                            <div class="space10"></div>
                            <a href="tel:+917052101786" class="call-btn"><img src="frontend/img/icons/details-call.png" alt=""> +91 705 2101 786</a>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="col-lg-8 order-lg-2 order-1">
                    <div class="service-details-area">
                        <article>
                            <div class="heading1">
                                <div class="image">
                                    <img src="{{ asset('frontend/img/job-post/job-details-image.png') }}" alt="Training and Placement">
                                </div>
                                <div class="space30"></div>
                                <h2>Comprehensive Training & Placement Programs</h2>
                                <div class="space16"></div>
                                <p>We bridge the gap between education and employment with our specialized training programs in medical billing, coding, and accounts receivable management, followed by guaranteed placement opportunities.</p>

                                <div class="space30"></div>
                                <h3>Our Training Programs</h3>
                                <div class="space16"></div>
                                <p>Hands-on training designed to create job-ready professionals:</p>

                                <div class="job-detials-list">
                                    <div class="space10"></div>
                                    <ul>
                                        <li><span><i class="fa-solid fa-check"></i></span> Medical Billing Specialist Certification</li>
                                        <li><span><i class="fa-solid fa-check"></i></span> Certified Professional Coder (CPC) Training</li>
                                        <li><span><i class="fa-solid fa-check"></i></span> AR Management & Follow-up Training</li>
                                        <li><span><i class="fa-solid fa-check"></i></span> Denial Management Specialist Program</li>
                                        <li><span><i class="fa-solid fa-check"></i></span> EHR/EMR Software Training</li>
                                    </ul>
                                </div>
                            </div>
                        </article>

                        <div class="space30"></div>
                        <article>
                            <div class="heading1">
                                <h3>Placement Assistance</h3>
                                <div class="space16"></div>
                                <p>Our placement services connect trained professionals with opportunities:</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="space30"></div>
                                        <div class="image">
                                            <img src="{{ asset('frontend/img/service/service-details-img2.png') }}" alt="Career Placement">
                                        </div>
                                        <div class="space16"></div>
                                        <div class="heading1">
                                            <h4>Job Placement Guarantee</h4>
                                            <p>We guarantee job placement for all graduates who complete our certification programs.</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="space30"></div>
                                        <div class="image">
                                            <img src="{{ asset('frontend/img/service/service-details-img3.png') }}" alt="Resume Building">
                                        </div>
                                        <div class="space16"></div>
                                        <div class="heading1">
                                            <h4>Career Development</h4>
                                            <p>Resume building, interview preparation, and career counseling services.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!-- Contact Form Section -->
                        <div class="space40"></div>
                        <div class="details-contact-form">
                            <div class="heading1">
                                <h3>Enroll in Our Training Program</h3>
                                <div class="space16"></div>
                                <p>Start your career in medical billing today</p>
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

                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <select>
                                                <option value="">Select Program</option>
                                                <option value="billing">Medical Billing Specialist</option>
                                                <option value="coding">Professional Coder (CPC)</option>
                                                <option value="ar">AR Management</option>
                                                <option value="denial">Denial Management</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <textarea name="" id="" rows="4" placeholder="Your Background and Career Goals"></textarea>
                                        </div>
                                        <div class="space30"></div>
                                        <div class="button">
                                            <button class="theme-btn1" type="submit">Submit Application <span><i
                                                        class="fa-solid fa-arrow-right"></i></span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== SERVICE DETAILS END ======-->

    <!--===== MORE SERVICES START ======-->
    <div class="service1 service-page-service pb120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <div class="heading1">
                        <h2>Explore Our Training Programs</h2>
                        <div class="space16"></div>
                        <p>Specialized training for healthcare revenue cycle careers</p>
                    </div>
                </div>
            </div>
            <div class="space30"></div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service1-box">
                        <div class="image overlay-anim">
                            <img src="{{ asset('frontend/img/service/service1-img1.png') }}" alt="Medical Billing Training">
                        </div>
                        <div class="hover-area">
                            <div class="icon">
                                <img src="{{ asset('frontend/img/icons/service1-icon1.png') }}" alt="">
                            </div>
                            <div class="space16"></div>
                            <div class="heading1-w">
                                <h4><a href="#">Medical Billing Training</a></h4>
                                <div class="space16"></div>
                                <p>Comprehensive billing training for healthcare providers.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service1-box active">
                        <div class="image overlay-anim">
                            <img src="{{ asset('frontend/img/service/service1-img2.png') }}" alt="Coding Certification">
                        </div>
                        <div class="hover-area">
                            <div class="icon">
                                <img src="{{ asset('frontend/img/icons/service1-icon2.png') }}" alt="">
                            </div>
                            <div class="space16"></div>
                            <div class="heading1-w">
                                <h4><a href="#">Coding Certification</a></h4>
                                <div class="space16"></div>
                                <p>CPC certification training for medical coders.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service1-box">
                        <div class="image overlay-anim">
                            <img src="{{ asset('frontend/img/service/service1-img3.png') }}" alt="AR Management">
                        </div>
                        <div class="hover-area">
                            <div class="icon">
                                <img src="{{ asset('frontend/img/icons/service1-icon3.png') }}" alt="">
                            </div>
                            <div class="space16"></div>
                            <div class="heading1-w">
                                <h4><a href="#">AR Management</a></h4>
                                <div class="space16"></div>
                                <p>Specialized training in accounts receivable.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== MORE SERVICES END ======-->

    <!--===== CTA AREA START =======-->
    @include('partials.cta')
    <!--===== CTA AREA END =======-->
@endsection