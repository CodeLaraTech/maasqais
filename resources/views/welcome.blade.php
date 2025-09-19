@extends('layouts.main')
@section('content')
    <main>
        @if($banners && $banners->items->count())
            <!--===== HERO AREA START =======-->
            <div class="_relative">
                <div class="hero10-sliders">
                    @foreach($banners->items as $item)
                        <div class="hero10-single">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-10">
                                        <div class="main-heading">
                                            @if($item->subtitle)
                                                <span class="span">
                                                    <img src="{{ asset('frontend/img/icons/span10.png') }}" alt="">
                                                    {{ $item->subtitle }}
                                                </span>
                                            @endif
                                            <h1>{!! nl2br(e($item->title)) !!}</h1>
                                            <div class="space16"></div>
                                            <p>{{ $item->content }}</p>
                                            <div class="space30"></div>

                                            <div class="button">
                                                @if(is_array($item->buttons))
                                                    @foreach($item->buttons as $btn)
                                                        <a class="theme-btn1" href="{{ $btn['url'] ?? '#' }}">
                                                            {{ $btn['label'] ?? 'Learn More' }}
                                                            <span><i class="fa-solid fa-arrow-right"></i></span>
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="hero10-btns">
                    <button class="hero10-next-arrow"><i class="fa-solid fa-arrow-left"></i></button>
                    <button class="hero10-prev-arrow"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        @endif

        <!--=====HERO AREA END=======-->

        <!--=====HERO ICONS START=======-->
        <div class="hero10-icons-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-8">
                        <div class="hero10-icon-boxs">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="icon">
                                            <span><i class="fa-light fa-users fs-4"></i></span>
                                        </div>
                                        <div class="heading">
                                            <h5>Medical Staffing</h5>
                                            <p>9,200+ Professionals</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="icon">
                                            <span><i class="fa-light fa-users fs-4"></i></span>
                                        </div>
                                        <div class="heading">
                                            <h5>IT Specialists</h5>
                                            <p>5,800+ Experts</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="single-box">
                                        <div class="icon">
                                            <span><i class="fa-light fa-users fs-4"></i></span>
                                        </div>
                                        <div class="heading">
                                            <h5>Engineering</h5>
                                            <p>3,500+ Talent</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=====HERO ICONS END=======-->

        <!--=====ABOUT AREA START=======-->
        <div class="about10 sp">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="about10-images">
                            <div class="cs_height_118 cs_height_lg_70"></div>
                            <div class="cs_case_study_1_list">
                                <div class="cs_case_study cs_style_1 cs_hover_active active">
                                    <div class="cs_case_study_thumb cs_bg_filed"
                                        data-src="frontend/img/hero/hero7-image1.png"></div>
                                </div>
                                <div class="cs_case_study cs_style_1 cs_hover_active">
                                    <div class="cs_case_study_thumb cs_case_study_thumb2 cs_bg_filed"
                                        data-src="frontend/img/about/about1-img1.html"></div>
                                </div>
                                <div class="cs_case_study cs_style_1 cs_hover_active">
                                    <div class="cs_case_study_thumb cs_case_study_thumb3 cs_bg_filed"
                                        data-src="frontend/img/about/about1-img1.html"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="heading1">
                            <span class="span" data-aos="zoom-in-left" data-aos-duration="700"><img
                                    src="frontend/img/icons/span10.png" alt=""> About Global Overseas</span>
                            <h2 class="text-anime-style-3">Transforming Staffing Through Innovation</h2>
                            <div class="space16"></div>
                            <p data-aos="fade-left" data-aos-duration="700">At Global Overseas, we redefine staffing
                                solutions by combining deep industry knowledge with cutting-edge technology. Our approach
                                ensures perfect matches between top-tier professionals and leading organizations worldwide.
                            </p>
                            <div class="row" data-aos="fade-left" data-aos-duration="900">
                                <div class="col-md-4 col-6">
                                    <div class="counter-box">
                                        <h3>25+</h3>
                                        <p>Years Experience</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="counter-box">
                                        <h3>98%</h3>
                                        <p>Placement Success</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="counter-box">
                                        <h3>50+</h3>
                                        <p>Countries Served</p>
                                    </div>
                                </div>
                            </div>
                            <div class="space30"></div>
                            <div class="" data-aos="fade-left" data-aos-duration="1100">
                                <a class="theme-btn1" href="{{url('about-us')}}">Our Success Story <span><i
                                            class="fa-solid fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=====ABOUT AREA END=======-->

        <!--=====SERVICE AREA START=======-->
        <div class="service1 sp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center">
                        <div class="heading1-w">
                            <span class="span" data-aos="zoom-in-left" data-aos-duration="700">Our Specializations</span>
                            <h2 class="text-anime-style-3">Comprehensive Workforce Solutions</h2>
                            <div class="space16"></div>
                            <p data-aos="fade-left" data-aos-duration="800">
                                From healthcare professionals to technology experts, we deliver specialized staffing
                                solutions that drive organizational success across multiple sectors.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space30"></div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="service1-box" data-aos="zoom-in-up" data-aos-duration="700">
                            <div class="image overlay-anim">
                                <img src="frontend/img/service/service1-img1.png" alt="">
                            </div>
                            <div class="hover-area">
                                <div class="icon">
                                    <img src="frontend/img/icons/service1-icon1.png" alt="">
                                </div>
                                <div class="space16"></div>
                                <div class="heading1-w">
                                    <h4><a href="service-details.html">AR Billing Services</a></h4>
                                    <div class="space16"></div>
                                    <p>
                                        Delivering skilled AR billing professionals to healthcare providers for efficient
                                        revenue cycle management and faster reimbursements.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="service1-box active" data-aos="zoom-in-up" data-aos-duration="900">
                            <div class="image overlay-anim">
                                <img src="frontend/img/service/service1-img2.png" alt="">
                            </div>
                            <div class="hover-area">
                                <div class="icon">
                                    <img src="frontend/img/icons/service1-icon2.png" alt="">
                                </div>
                                <div class="space16"></div>
                                <div class="heading1-w">
                                    <h4><a href="service-details.html">Partnering with AR Billing Companies</a></h4>
                                    <div class="space16"></div>
                                    <p>
                                        Collaborating with AR billing firms to provide them with highly qualified staffing
                                        resources tailored to their unique operational needs.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="service1-box" data-aos="zoom-in-up" data-aos-duration="1100">
                            <div class="image overlay-anim">
                                <img src="frontend/img/service/service1-img3.png" alt="">
                            </div>
                            <div class="hover-area">
                                <div class="icon">
                                    <img src="frontend/img/icons/service1-icon3.png" alt="">
                                </div>
                                <div class="space16"></div>
                                <div class="heading1-w">
                                    <h4><a href="service-details.html">Training and Placement</a></h4>
                                    <div class="space16"></div>
                                    <p>
                                        Offering customized training programs and placement services to prepare candidates
                                        for success in various staffing roles.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space50"></div>
                    <div class="col-lg-12">
                        <div class="text-center" data-aos="zoom-in-up" data-aos-duration="700">
                            <a class="theme-btn1" href="{{ url('services') }}">View All Services <span><i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--=====SERVICE AREA END=======-->

        <!--=====WORK AREA START=======-->
        <div class="work1 sp">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="work-img reveal overlay-anim">
                            <img src="frontend/img/work/work1-image.png" alt="Recruitment Technologies Image">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="heading1 work1-heading">
                            <span class="span" data-aos="zoom-in-left" data-aos-duration="700">Innovative Approach</span>
                            <h2 class="text-anime-style-3">Revolutionizing Talent Acquisition</h2>
                            <div class="space16"></div>
                            <p data-aos="fade-left" data-aos-duration="900">
                                Our proprietary matching algorithms and global network ensure we connect the right talent
                                with the right opportunities, every time.
                            </p>

                            <div class="space10"></div>

                            <div data-aos="fade-left" data-aos-duration="900">
                                <div class="work1-box">
                                    <div>
                                        <div class="icon">
                                            <span><i class="fa-light fa-network-wired fs-4"></i></span>
                                        </div>
                                    </div>
                                    <div class="heading1">
                                        <h4><a href="service-details.html">Global Talent Network</a></h4>
                                        <p>Access to pre-vetted professionals across 50+ countries in key industries and
                                            specialties.</p>
                                    </div>
                                </div>
                            </div>

                            <div data-aos="fade-left" data-aos-duration="700">
                                <div class="work1-box">
                                    <div>
                                        <div class="icon">
                                            <span><i class="fa-brands fa-codepen fs-4"></i></span>
                                        </div>
                                    </div>
                                    <div class="heading1">
                                        <h4><a href="service-details.html">AI-Driven Matching</a></h4>
                                        <p>Advanced algorithms that analyze skills, experience, and cultural fit for perfect
                                            placements.</p>
                                    </div>
                                </div>
                            </div>

                            <div data-aos="fade-left" data-aos-duration="1100">
                                <div class="work1-box">
                                    <div>
                                        <div class="icon">
                                            <span><i class="fa-light fa-people-group fs-4"></i></span>
                                        </div>
                                    </div>
                                    <div class="heading1">
                                        <h4><a href="service-details.html">Compliance Expertise</a></h4>
                                        <p>Ensuring all placements meet international labor laws and industry regulations.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=====WORK AREA END=======-->

        <!--=====CASE AREA START=======-->
        <div class="case10 sp" style="background-color: #F7F5FB;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto text-center">
                        <div class="heading1">
                            <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                                <img src="frontend/img/icons/span10.png" alt=""> Success Stories
                            </span>
                            <h2 class="text-anime-style-3">Transforming Businesses Through Talent</h2>
                        </div>
                    </div>
                </div>

                <div class="space30"></div>
                <div class="row">
                    @if(isset($stories) && $stories->count())
                        @foreach($stories as $story)
                            <div class="col-lg-6" data-aos="zoom-in-up" data-aos-duration="{{ 800 + ($loop->index * 150) }}">
                                <div class="case-box">
                                    <div class="image">
                                        @if($story->featured_image)
                                            <img src="{{ asset('storage/' . $story->featured_image) }}"
                                                alt="{{ $story->getTranslation('title', app()->getLocale()) }}">
                                        @else
                                            <img src="{{ asset('frontend/img/case-study/default.png') }}" alt="Default Story">
                                        @endif
                                    </div>

                                    <div class="hover-area">
                                        <h6>{{ $story->getTranslation('excerpt', app()->getLocale()) }}</h6>
                                        <h3>
                                            <a href="#">
                                                {{ $story->getTranslation('title', app()->getLocale()) }}
                                            </a>
                                        </h3>
                                        <p>{!! $story->getTranslation('content', app()->getLocale()) !!}</p>
                                        <a href="#" class="arrow">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p>No success stories available at the moment.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!--=====CASE AREA END=======-->
        <!--=====TESTIMONIAL AREA START=======-->
        @if(isset($testimonials) && count($testimonials))
            <div class="tes1 sp">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-lg-6">
                            <div class="heading1">
                                <span class="span" data-aos="zoom-in-left" data-aos-duration="800">Client Voices</span>
                                <h2 class="text-anime-style-3">Trusted By Industry Leaders</h2>
                                <div class="space16"></div>
                                <p data-aos="fade-left" data-aos-duration="800">
                                    Hear from organizations and professionals who have experienced our staffing solutions
                                    firsthand.
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="tes7-buttons" data-aos="fade-right" data-aos-duration="900">
                                <button class="testimonial-prev-arrow1"><i class="fa-regular fa-arrow-left"></i></button>
                                <button class="testimonial-next-arrow1"><i class="fa-regular fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="space30"></div>
                    <div class="row">
                        <div class="tes1-slider" data-aos="fade-up" data-aos-duration="900">
                            @foreach($testimonials as $testimonial)
                                            <div class="single-slider">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <ul class="stars">
                                                            @for($i = 1; $i <= $testimonial->rating; $i++)
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                            @endfor
                                                        </ul>

                                                        <div class="pera">
                                                            <p>
                                                                "{{ \Illuminate\Support\Str::limit(
                                    $testimonial->getTranslation('message', app()->getLocale()),
                                    120,
                                    '...'
                                ) }}"
                                                            </p>
                                                        </div>

                                                        <div class="bottom-heading">
                                                            <h4>
                                                                <a href="#">
                                                                    {{ $testimonial->getTranslation('name', app()->getLocale()) }}
                                                                </a>
                                                            </h4>
                                                            <p>
                                                                {{ $testimonial->getTranslation('designation', app()->getLocale()) }}
                                                                @if($testimonial->getTranslation('company', app()->getLocale()))
                                                                    , {{ $testimonial->getTranslation('company', app()->getLocale()) }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="tes1-image d-flex justify-content-center align-items-center"
                                                            style="height:200px; overflow:hidden; border-radius:10px;">
                                                            @if($testimonial->image)
                                                                <img src="{{ asset('storage/' . $testimonial->image) }}"
                                                                    alt="{{ $testimonial->getTranslation('name', app()->getLocale()) }}"
                                                                    style="max-height:100%; max-width:100%; object-fit:cover;">
                                                            @else
                                                                <img src="{{ asset('frontend/img/testimonial/default.png') }}"
                                                                    alt="Default Testimonial"
                                                                    style="max-height:100%; max-width:100%; object-fit:cover;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!--=====TESTIMONIAL AREA END=======-->

        @if(isset($blogs) && count($blogs))
            <div class="blog1 sp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 m-auto text-center">
                            <div class="heading1">
                                <span class="span" data-aos="zoom-in-left" data-aos-duration="800">Industry Insights</span>
                                <h2 class="text-anime-style-3"> Latest Trends &amp; Strategies</h2>
                                <div class="space16"></div>
                                <p data-aos="fade-up" data-aos-duration="800">
                                    Stay informed with our expert analysis on workforce trends, recruitment strategies, and
                                    industry developments across healthcare, technology, and engineering sectors.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="space30"></div>
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-lg-6">
                                <div class="blog1-box overlay-anim" data-aos="zoom-in-up"
                                    data-aos-duration="{{ 800 + ($loop->index * 100) }}">
                                    <div class="image">
                                        <img src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('frontend/img/blog/default.png') }}"
                                            alt="{{ $blog->getTranslation('title', app()->getLocale()) }}">
                                    </div>
                                    <div class="heading-area">
                                        <div class="tags">
                                            <a href="#"><img src="{{ asset('frontend/img/icons/date.png') }}" alt="">
                                                {{ $blog->created_at->format('M d, Y') }}</a>
                                            <a href="#"><img src="{{ asset('frontend/img/icons/user.png') }}" alt=""> By
                                                {{ $blog->author ?? 'Admin' }}</a>
                                        </div>
                                        <div class="heading1">
                                            <h4>
                                                <a href="#">
                                                    {{ $blog->getTranslation('title', app()->getLocale()) }}
                                                </a>
                                            </h4>
                                            <div class="space16"></div>
                                            <p>{!! Str::limit(strip_tags($blog->getTranslation('content', app()->getLocale())), 150) !!}
                                            </p>
                                            <div class="blog1-border"></div>
                                            <a href="#" class="learn">Read More <span><i
                                                        class="fa-solid fa-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif


        <!--=====CONTACT AREA START=======-->
        <div class="contact10 sp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto text-center">
                        <div class="heading1">
                            <span class="span" data-aos="zoom-in-left" data-aos-duration="700"><img
                                    src="frontend/img/icons/span10.png" alt=""> Contact us</span>
                            <h2 class="text-anime-style-3">Let's Start The Conversation</h2>
                        </div>
                    </div>
                </div>

                <div class="space30"></div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-from">
                            <h3>Send Us A Message</h3>
                            <p>Our response time is within 30 minutes during business hours</p>
                            <div class="form-area">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <form action="{{ route('contact.send') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <!-- First Name -->
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input type="text" name="firstName" value="{{ old('firstName') }}"
                                                    placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input type="text" name="lastName" value="{{ old('lastName') }}"
                                                    placeholder="Last Name" required>
                                            </div>
                                        </div>

                                        <!-- Phone Number -->
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input type="text" name="number" value="{{ old('number') }}"
                                                    placeholder="Phone Number" required>
                                            </div>
                                        </div>

                                        <!-- Email Address -->
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input type="email" name="email" value="{{ old('email') }}"
                                                    placeholder="Email Address" required>
                                            </div>
                                        </div>

                                        <!-- Appointment Date -->
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input type="text" name="date" value="{{ old('date') }}"
                                                    placeholder="Date (MM/DD/YYYY)" required>
                                            </div>
                                        </div>

                                        <!-- Service Type -->
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input type="text" name="services" value="{{ old('services') }}"
                                                    placeholder="Service Type" required>
                                            </div>
                                        </div>

                                        <!-- Message -->
                                        <div class="col-md-12">
                                            <div class="single-input">
                                                <textarea name="message" rows="5" placeholder="Message"
                                                    required>{{ old('message') }}</textarea>

                                            </div>
                                            <div class="space30"></div>

                                            <!-- Submit Button -->
                                            <div class="button-area">
                                                <button class="theme-btn1" type="submit">Submit Now
                                                    <span><i class="fa-solid fa-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2996.4895796404458!2d-72.86862152446955!3d41.3199663001753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e7d73cf6964995%3A0xc978753d151780ee!2s135%20Old%20Foxon%20Rd%20%232%2C%20East%20Haven%2C%20CT%2006513%2C%20USA!5e0!3m2!1sen!2sin!4v1748959930120!5m2!1sen!2sin"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=====CONTACT AREA END=======-->

        <!--===== CTA AREA START =======-->
        <div class="cta8 d-none" style="background-image: url(frontend/img/bg/cta10-bg.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center">
                        <div class="heading6-w">
                            <h2>Optimize Your Workforce Strategy Today</h2>
                            <div class="space16"></div>
                            <p>Subscribe to receive the latest staffing insights, industry reports, and exclusive offers
                                directly to your inbox.</p>

                            <div class="form-area">
                                <form action="#">
                                    <input type="email" placeholder="Your Business Email">
                                    <div class="button">
                                        <button class="theme-btn1" type="submit">Subscribe Now <span><i
                                                    class="fa-solid fa-arrow-right"></i></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection