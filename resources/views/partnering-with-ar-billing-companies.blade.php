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
                        <h1>Partnering with AR Billing Companies</h1>
                        <div class="pages-intro" style="color: white;">
                            <a href="{{url('/')}}" style="color: white;">Home</a>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">Services</p>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">Partnering with AR Billing Companies</p>
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
                                <input type="text" placeholder="Search billing services...">
                                <button><i class="fa-regular fa-magnifying-glass"></i></button>
                            </form>
                        </div>

                        <div class="_job_widget _cetegories mt-40">
                            <h3>Our Services</h3>
                            <div class="_cetegories-list">
                                <ul>
                                    <li><a href="#">AR Billing Service<span><i class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li class="active"><a href="#">Partnering with AR Billing Companies<span><i class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li><a href="#">Training and Placement<span><i class="fa-regular fa-arrow-right"></i></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="_job_widget _recent-job mt-40">
                            <h3>Related Services</h3>
                            <div class="recent-job-list">
                                <div class="recent-job-single">
                                    <h4>Medical Coding</h4>
                                    <p>Certified coders for accurate claims</p>
                                </div>
                                <div class="recent-job-single">
                                    <h4>RCM Solutions</h4>
                                    <p>End-to-end revenue cycle support</p>
                                </div>
                                <div class="recent-job-single">
                                    <h4>Provider Credentialing</h4>
                                    <p>Streamlined enrollment services</p>
                                </div>
                            </div>
                        </div>

                        <div class="_job_widget _call-btn mt-40">
                            <h3>Ready to Partner With Us?</h3>
                            <div class="space10"></div>
                            <a href="tel:+917052101786" class="call-btn"><img src="{{ asset('frontend/img/icons/details-call.png') }}" alt=""> +91 705 2101 786</a>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="col-lg-8 order-lg-2 order-1">
                    <div class="service-details-area">
                        <article>
                            <div class="heading1">
                                <div class="image">
                                    <img src="{{ asset('frontend/img/job-post/job-details-image.png') }}" alt="AR Billing Partnerships">
                                </div>
                                <div class="space30"></div>
                                <h2>Strategic Partnerships with AR Billing Companies</h2>
                                <div class="space16"></div>
                                <p>We establish mutually beneficial partnerships with billing companies to enhance revenue cycle management through shared expertise, resources, and best practices.</p>

                                <div class="space30"></div>
                                <h3>Our Partnership Model</h3>
                                <div class="space16"></div>
                                <p>Our collaborative approach helps billing companies scale operations and improve efficiency:</p>

                                <div class="job-detials-list">
                                    <div class="space10"></div>
                                    <ul>
                                        <li><span><i class="fa-solid fa-check"></i></span> Staff augmentation with trained billing specialists</li>
                                        <li><span><i class="fa-solid fa-check"></i></span> Technology integration support</li>
                                        <li><span><i class="fa-solid fa-check"></i></span> Process optimization consulting</li>
                                        <li><span><i class="fa-solid fa-check"></i></span> Compliance and regulatory guidance</li>
                                        <li><span><i class="fa-solid fa-check"></i></span> Performance benchmarking</li>
                                    </ul>
                                </div>
                            </div>
                        </article>

                        <div class="space30"></div>
                        <article>
                            <div class="heading1">
                                <h3>Partnership Benefits</h3>
                                <div class="space16"></div>
                                <p>Our partners gain competitive advantages through our collaboration:</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="space30"></div>
                                        <div class="image">
                                            <img src="{{ asset('frontend/img/service/service-details-img2.png') }}" alt="Scalable Workforce">
                                        </div>
                                        <div class="space16"></div>
                                        <div class="heading1">
                                            <h4>Scalable Workforce</h4>
                                            <p>Quickly scale your team up or down based on client needs with our trained billing professionals.</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="space30"></div>
                                        <div class="image">
                                            <img src="{{ asset('frontend/img/service/service-details-img3.png') }}" alt="Technology Integration">
                                        </div>
                                        <div class="space16"></div>
                                        <div class="heading1">
                                            <h4>Technology Integration</h4>
                                            <p>Access to advanced billing software and analytics tools through our partnerships.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!-- Contact Form Section -->
                        <div class="space40"></div>
                        <div class="details-contact-form">
                            <div class="heading1">
                                <h3>Become a Partner</h3>
                                <div class="space16"></div>
                                <p>Complete the form below to explore partnership opportunities with us.</p>
                            </div>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" placeholder="Company Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" placeholder="Contact Person">
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
                                                <option value="">Partnership Type</option>
                                                <option value="staffing">Staffing Partnership</option>
                                                <option value="technology">Technology Partnership</option>
                                                <option value="referral">Referral Partnership</option>
                                                <option value="full">Full Service Partnership</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <textarea name="" id="" rows="4" placeholder="Tell us about your company and partnership interests"></textarea>
                                        </div>
                                        <div class="space30"></div>
                                        <div class="button">
                                            <button class="theme-btn1" type="submit">Submit Partnership Request <span><i
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
                        <h2>Explore Our Partnership Services</h2>
                        <div class="space16"></div>
                        <p>Comprehensive solutions for billing companies</p>
                    </div>
                </div>
            </div>
            <div class="space30"></div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service1-box">
                        <div class="image overlay-anim">
                            <img src="{{ asset('frontend/img/service/service1-img1.png') }}" alt="Staffing Solutions">
                        </div>
                        <div class="hover-area">
                            <div class="icon">
                                <img src="{{ asset('frontend/img/icons/service1-icon1.png') }}" alt="">
                            </div>
                            <div class="space16"></div>
                            <div class="heading1-w">
                                <h4><a href="#">Staffing Solutions</a></h4>
                                <div class="space16"></div>
                                <p>Access to trained billing specialists for your staffing needs.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service1-box active">
                        <div class="image overlay-anim">
                            <img src="{{ asset('frontend/img/service/service1-img2.png') }}" alt="Technology Partnerships">
                        </div>
                        <div class="hover-area">
                            <div class="icon">
                                <img src="{{ asset('frontend/img/icons/service1-icon2.png') }}" alt="">
                            </div>
                            <div class="space16"></div>
                            <div class="heading1-w">
                                <h4><a href="#">Technology Partnerships</a></h4>
                                <div class="space16"></div>
                                <p>Integrate advanced billing software and analytics tools.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service1-box">
                        <div class="image overlay-anim">
                            <img src="{{ asset('frontend/img/service/service1-img3.png') }}" alt="Training Programs">
                        </div>
                        <div class="hover-area">
                            <div class="icon">
                                <img src="{{ asset('frontend/img/icons/service1-icon3.png') }}" alt="">
                            </div>
                            <div class="space16"></div>
                            <div class="heading1-w">
                                <h4><a href="#">Training Programs</a></h4>
                                <div class="space16"></div>
                                <p>Customized training for your billing teams.</p>
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