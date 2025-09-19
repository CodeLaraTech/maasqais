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
                        <h1>AR Billing Services</h1>
                        <div class="pages-intro" style="color: white;">
                            <a href="{{url('/')}}" style="color: white;">Home</a>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">Services</p>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">AR Billing Services</p>
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
                                    <li><a href="#">AR Billing Service<span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li><a href="#">Partnering with AR Billing Companies<span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li><a href="#">Training and Placement<span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
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
                            <h3>Need Billing Staff Immediately?</h3>
                            <div class="space10"></div>
                            <a href="tel:+917052101786" class="call-btn"><img src="{{ asset('frontend/img/icons/details-call.png') }}"
                                    alt=""> +91 705 2101 786</a>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="col-lg-8 order-lg-2 order-1">
                    <div class="service-details-area">
                        <article>
                            <div class="heading1">
                                <div class="image">
                                    <img src="{{ asset('frontend/img/job-post/job-details-image.png') }}" alt="AR Billing Services">
                                </div>
                                <div class="space30"></div>
                                <h2>AR Billing Services - Partnering with AR Billing Companies and Training & Placement</h2>
                                <div class="space16"></div>
                                <p>We specialize in connecting healthcare organizations with skilled AR billing
                                    professionals and forming strategic partnerships with billing companies. Our
                                    comprehensive service includes staffing solutions, training programs, and placement
                                    services to optimize your revenue cycle management.</p>

                                <div class="space30"></div>
                                <h3>Billing Company Partnerships</h3>
                                <div class="space16"></div>
                                <p>We collaborate with AR billing companies to provide:</p>

                                <div class="job-detials-list">
                                    <div class="space10"></div>
                                    <ul>
                                        <li><span><i class="fa-solid fa-check"></i></span> Skilled billing professionals on
                                            contract or permanent basis</li>
                                        <li><span><i class="fa-solid fa-check"></i></span> Scalable staffing solutions for
                                            fluctuating workloads</li>
                                        <li><span><i class="fa-solid fa-check"></i></span> Quality assurance and performance
                                            monitoring</li>
                                        <li><span><i class="fa-solid fa-check"></i></span> Continuous training on latest
                                            billing regulations</li>
                                        <li><span><i class="fa-solid fa-check"></i></span> Specialized teams for denial
                                            management and follow-up</li>
                                    </ul>
                                </div>
                            </div>
                        </article>

                        <div class="space30"></div>
                        <article>
                            <div class="heading1">
                                <h3>Training & Placement Programs</h3>
                                <div class="space16"></div>
                                <p>Our comprehensive training and placement services include:</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="space30"></div>
                                        <div class="image">
                                            <img src="{{ asset('frontend/img/service/service-details-img2.png') }}" alt="Billing Training">
                                        </div>
                                        <div class="space16"></div>
                                        <div class="heading1">
                                            <h4>Certified Training Programs</h4>
                                            <p>Hands-on training in medical billing, coding, AR follow-up, and denial
                                                management using real-world scenarios.</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="space30"></div>
                                        <div class="image">
                                            <img src="{{ asset('frontend/img/service/service-details-img3.png') }}" alt="Job Placement">
                                        </div>
                                        <div class="space16"></div>
                                        <div class="heading1">
                                            <h4>Job Placement Assistance</h4>
                                            <p>Direct placement opportunities with our partner billing companies and
                                                healthcare providers.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!-- Contact Form Section -->
                        <div class="space40"></div>
                        <div class="details-contact-form">
                            <div class="heading1">
                                <h3>Request AR Billing Services</h3>
                                <div class="space16"></div>
                                <p>Tell us about your AR billing needs and we'll connect you with the right solution.</p>
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
                                                <option value="">Select Service Type</option>
                                                <option value="staffing">Billing Staffing</option>
                                                <option value="partnership">Billing Company Partnership</option>
                                                <option value="training">Training Program</option>
                                                <option value="placement">Placement Services</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <textarea name="" id="" rows="4" placeholder="Your Requirements"></textarea>
                                        </div>
                                        <div class="space30"></div>
                                        <div class="button">
                                            <button class="theme-btn1" type="submit">Submit Request <span><i
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
                        <h2>Explore Our Billing Services</h2>
                        <div class="space16"></div>
                        <p>Comprehensive revenue cycle solutions for healthcare providers</p>
                    </div>
                </div>
            </div>
            <div class="space30"></div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service1-box">
                        <div class="image overlay-anim">
                            <img src="{{ asset('frontend/img/service/service1-img1.png') }}" alt="Medical Billing">
                        </div>
                        <div class="hover-area">
                            <div class="icon">
                                <img src="{{ asset('frontend/img/icons/service1-icon1.png') }}" alt="">
                            </div>
                            <div class="space16"></div>
                            <div class="heading1-w">
                                <h4><a href="#">Medical Billing</a></h4>
                                <div class="space16"></div>
                                <p>Comprehensive billing services for healthcare providers of all sizes.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service1-box active">
                        <div class="image overlay-anim">
                            <img src="{{ asset('frontend/img/service/service1-img2.png') }}" alt="AR Follow-up">
                        </div>
                        <div class="hover-area">
                            <div class="icon">
                                <img src="{{ asset('frontend/img/icons/service1-icon2.png') }}" alt="">
                            </div>
                            <div class="space16"></div>
                            <div class="heading1-w">
                                <h4><a href="#">AR Follow-up</a></h4>
                                <div class="space16"></div>
                                <p>Specialized teams to manage your accounts receivable and reduce days in A/R.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service1-box">
                        <div class="image overlay-anim">
                            <img src="{{ asset('frontend/img/service/service1-img3.png') }}" alt="Denial Management">
                        </div>
                        <div class="hover-area">
                            <div class="icon">
                                <img src="{{ asset('frontend/img/icons/service1-icon3.png') }}" alt="">
                            </div>
                            <div class="space16"></div>
                            <div class="heading1-w">
                                <h4><a href="#">Denial Management</a></h4>
                                <div class="space16"></div>
                                <p>Proactive approach to reduce claim denials and maximize reimbursements.</p>
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