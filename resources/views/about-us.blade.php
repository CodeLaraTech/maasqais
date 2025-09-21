@extends('layouts.main')
@section('content')
    <section class="section breadcrumb flex items-center h-[320px] relative">
        <div class="breadcrumb_bg absolute top-0 left-0 w-full h-full pointer-events-none">
            <img src="frontend/assets/images/breadcrumb/about.jpg" alt="About Us" class="h-full object-cover">
        </div>
        <div class="container relative text-white">
            <ul class="breadcrumb_nav flex items-center gap-1 animate">
                <li class="flex items-center">
                    <a href="index.html" class="breadcrumb_link caption1 duration-300 hover:underline">Home</a>
                </li>
                <li class="flex items-center">
                    <span class="ph ph-caret-right text-xs opacity-50"></span>
                    <a href="#!" class="breadcrumb_link pl-1 caption1 opacity-50">About Us</a>
                </li>
            </ul>
            <h2 class="section_tit mt-3 heading2 animate" style="--i: 2">About Us</h2>
        </div>
    </section>
    <!-- ABOUT -->
    <section class="section about sm:py-25 py-15">
        <div class="container flex max-lg:flex-col items-center xl:gap-20 gap-10">
            <div class="about_img flex-shrink-0 relative lg:w-[49%] sm:w-2/3 w-full pb-15 animate animate_right">
                <img src="frontend/assets/images/components/about3_1.jpg" class="w-2/3" alt="Maas Qais Trading Est.">
                <div class="about_banner absolute xl:top-13 top-6 xl:right-4 right-0 sm:py-7.5 py-4 sm:px-10 px-6 bg-orange text-white animate animate_left"
                    style="--i: 3">
                    <h2 class="heading2 text-center">Trusted</h2>
                    <p class="block mt-1 text-center">Procurement Partner</p>
                </div>
                <div class="absolute right-0 bottom-0 w-[54%] border-t-[20px] border-l-[20px] border-white animate"
                    style="--i: 2">
                    <img src="frontend/assets/images/components/about3_2.jpg" alt="Maas Qais Trading Est.">
                </div>
            </div>
            <div class="about_content">
                <span class="section_tag tag bg-orange animate">About Us</span>
                <h3 class="section_tit mt-4 heading3 animate">Your Trusted Procurement Partner for Industrial Supplies</h3>
                <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 animate">
                    We at Maas Qais Trading Est. are focused on becoming your trusted procurement partner for industrial
                    supplies.
                    Our mission is to support customers with:
                </p>
                <ul class="about_benefit flex max-sm:flex-col gap-7.5 gap-y-5 mt-5">
                    <li class="animate" style="--i: 1">
                        <span class="ph ph-trophy text-6xl"></span>
                        <strong class="block mt-5 heading6">Best Quality Products</strong>

                    </li>
                    <li class="animate" style="--i: 2">
                        <span class="ph ph-currency-dollar text-6xl"></span>
                        <strong class="block mt-5 heading6">Right Price</strong>

                    </li>
                    <li class="animate" style="--i: 3">
                        <span class="ph ph-truck text-6xl"></span>
                        <strong class="block mt-5 heading6">On-Time Delivery</strong>

                    </li>
                </ul>
                <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 animate">
                    Occasionally, our customers require items outside our defined categories — and we make it our goal to
                    source them, saving your time and ensuring smooth operations.
                </p>
                <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 animate">
                    Looking forward to building long-term business relationships, we welcome you to share your requirements
                    at
                    <a href="mailto:info@maasqais.com" class="text-orange underline">info@maasqais.com</a>. Our team will
                    get back to you with the best sources for your needs.
                </p>
                <div class="btn_area animate">
                    <a href="about-us.html" class="btn mt-10 bg-orange">Learn More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- WHY CHOOSE US -->
    <section class="section choose_us sm:py-25 py-15">
        <div class="container flex flex-col items-center">
            <span class="section_tag tag w-fit animate">WHY CHOOSE US</span>
            <h3 class="section_tit mt-4 heading3 text-center animate">Why Choose Us</h3>
            <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 text-center animate">
                We go the extra mile to ensure your satisfaction with every step of the process.
            </p>
            <div class="choose_us_content flex max-lg:flex-col items-center gap-15 mt-12">

                <ul class="choose_us_list flex flex-col lg:gap-12 gap-8 max-lg:w-full">
                    <li class="choose_us_item flex flex-col lg:items-end animate animate_right">
                        <span class="icon-box text-6xl"></span>
                        <strong class="block mt-5 heading5">1000+ Products</strong>
                        <p class="mt-3 text-variant1 lg:text-right">We offer 1000+ products across multiple categories to
                            meet your diverse needs.</p>
                    </li>
                    <li class="line flex-shrink-0 w-full h-px bg-outline"></li>
                    <li class="choose_us_item flex flex-col lg:items-end animate animate_right">
                        <span class="icon-shield-check text-6xl"></span>
                        <strong class="block mt-5 heading5">Trusted Quality</strong>
                        <p class="mt-3 text-variant1 lg:text-right">Our products are of trusted quality with competitive
                            pricing for reliable performance.</p>
                    </li>
                </ul>

                <div class="choose_us_bg flex-shrink-0 lg:w-1/3 sm:w-3/4 w-full">
                    <img src="frontend/assets/images/components/about_us.png" alt="about_us">
                </div>

                <ul class="choose_us_list flex flex-col lg:gap-12 gap-8 max-lg:w-full">
                    <li class="choose_us_item animate animate_left">
                        <span class="icon-truck text-6xl"></span>
                        <strong class="block mt-5 heading5">Swift Delivery</strong>
                        <p class="mt-3 text-variant1">We ensure fast delivery to keep your operations running smoothly
                            without delays.</p>
                    </li>
                    <li class="line flex-shrink-0 w-full h-px bg-outline"></li>
                    <li class="choose_us_item animate animate_left">
                        <span class="icon-handshake text-6xl"></span>
                        <strong class="block mt-5 heading5">Flexible Sourcing</strong>
                        <p class="mt-3 text-variant1">We can source items outside standard categories to provide you with
                            exactly what you need.</p>
                    </li>
                    <li class="line flex-shrink-0 w-full h-px bg-outline"></li>
                    <li class="choose_us_item animate animate_left">
                        <span class="icon-users text-6xl"></span>
                        <strong class="block mt-5 heading5">Customer-Centric Service</strong>
                        <p class="mt-3 text-variant1">We focus on building long-term partnerships with attentive,
                            customer-first service.</p>
                    </li>
                </ul>

            </div>
        </div>
    </section>

    <!-- COUNTER -->
    <section class="section counter">
        <div class="counter_list sm:py-20 py-12 bg-dark">
            <ul class="container flex max-xl:flex-wrap items-center justify-between gap-y-10">
                <li class="counter_item flex flex-col items-center gap-4 max-xl:w-1/2 max-sm:w-full text-white animate"
                    style="--i: 1">
                    <h2 class="heading1"><span id="counter_number1" class="counter_number">50</span>+</h2>
                    <strong class="heading6">Projects Completed</strong>
                </li>
                <li class="line max-xl:hidden flex-shrink-0 w-px h-32 bg-white bg-opacity-20"></li>
                <li class="counter_item flex flex-col items-center gap-4 max-xl:w-1/2 max-sm:w-full text-white animate"
                    style="--i: 2">
                    <h2 class="heading1"><span id="counter_number2" class="counter_number">120</span>+</h2>
                    <strong class="heading6">Satisfied Clients</strong>
                </li>
                <li class="line max-xl:hidden flex-shrink-0 w-px h-32 bg-white bg-opacity-20"></li>
                <li class="counter_item flex flex-col items-center gap-4 max-xl:w-1/2 max-sm:w-full text-white animate"
                    style="--i: 3">
                    <h2 class="heading1"><span id="counter_number3" class="counter_number">15</span>+</h2>
                    <strong class="heading6">Years of Expertise</strong>
                </li>
                <li class="line max-xl:hidden flex-shrink-0 w-px h-32 bg-white bg-opacity-20"></li>
                <li class="counter_item flex flex-col items-center gap-4 max-xl:w-1/2 max-sm:w-full text-white animate"
                    style="--i: 4">
                    <h2 class="heading1"><span id="counter_number4" class="counter_number">100</span>+</h2>
                    <strong class="heading6">Global Partners</strong>
                </li>
            </ul>
        </div>
    </section>


    <!-- PROCESS -->

    <!-- TESTIMONIALS -->
    @if(isset($testimonials) && $testimonials->count())
        <section class="section testimonials sm:py-25 py-15 bg-surface">
            <div class="container flex max-lg:flex-col xl:gap-20 gap-10 gap-y-8">
                <!-- Section Header -->
                <div class="flex-shrink-0 lg:w-[30%] sm:w-2/3 w-full">
                    <span class="section_tag tag bg-orange animate">Testimonials</span>
                    <h3 class="section_tit mt-4 heading3 animate">What Our Clients Are Saying?</h3>
                    <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 animate">
                        Hear from our satisfied clients who trust us for top-quality service, reliable results, and exceptional
                        customer care on every project.
                    </p>
                </div>

                <!-- Testimonials Carousel -->
                <div class="testimonials_content overflow-hidden w-full xl:pl-20 lg:pl-10 lg:border-l border-outline animate animate_left"
                    style="--i: 1">
                    <div class="testimonials_swiper_three swiper w-full">
                        <ul class="swiper-wrapper">
                            @foreach($testimonials as $testimonial)
                                <li class="testimonials_item swiper-slide">
                                    <!-- Rating -->
                                    <ul class="rating flex">
                                        @for($i = 1; $i <= 5; $i++)
                                            <li class="ph-fill ph-star text-xl {{ $i > $testimonial->rating ? 'text-variant2' : '' }}">
                                            </li>
                                        @endfor
                                    </ul>

                                    <!-- Testimonial Message -->
                                    <p class="testimonials_desc mt-4 text-3xl font-bold line-clamp-4">
                                        "{{ $testimonial->getTranslation('message', app()->getLocale()) }}"
                                    </p>

                                    <!-- Author Info -->
                                    <div class="flex items-center gap-4 mt-8">
                                        <div class="testimonials_img flex-shrink-0 overflow-hidden w-15 h-15 rounded-full">
                                            @if($testimonial->image)
                                                <img src="{{ asset('storage/' . $testimonial->image) }}" class="h-full object-cover"
                                                    alt="{{ $testimonial->getTranslation('name', app()->getLocale()) }}">
                                            @else
                                                <img src="{{ asset('frontend/assets/images/team/default.png') }}"
                                                    class="h-full object-cover" alt="Default Testimonial">
                                            @endif
                                        </div>
                                        <div class="testimonials_author">
                                            <strong
                                                class="testimonials_name heading6">{{ $testimonial->getTranslation('name', app()->getLocale()) }}</strong>
                                            <span class="testimonials_address block mt-1 text-variant1">
                                                {{ $testimonial->getTranslation('designation', app()->getLocale()) }}
                                                @if($testimonial->getTranslation('company', app()->getLocale()))
                                                    , {{ $testimonial->getTranslation('company', app()->getLocale()) }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Swiper Pagination -->
                    <div class="swiper-pagination relative mt-8 text-left"></div>
                </div>
            </div>
        </section>
    @endif



    <!-- OUR TEAMS -->
    <section class="section team" style="display: none;">
        <div class="container">
            <div class="team_inner flex flex-col items-center sm:py-25 py-15 border-t border-outline">
                <span class="section_tag tag bg-orange animate">Our teams</span>
                <h3 class="section_tit mt-4 heading3 animate">Meet the Our Experts</h3>
                <p class="section_desc lg:w-1/2 lg:mt-5 mt-3 body2 text-variant1 text-center animate">Our team of skilled
                    professionals brings years of experience, ensuring top-quality service and attention to detail in every
                    task.</p>
                <div class="team_swiper_three swiper w-full">
                    <ul class="team_list swiper-wrapper w-full lg:mt-12 mt-9">
                        <li class="swiper-slide group">
                            <div class="team_item animate" style="--i: 1">
                                <div class="team_img overflow-hidden relative aspect-[3/4]">
                                    <img src="frontend/assets/images/team/team1.jpg"
                                        class="h-full object-cover duration-400 group-hover:scale-110" alt="John Michaels">
                                    <ul
                                        class="team_socials flex flex-col gap-2 absolute top-3 right-3 translate-x-25 duration-400 group-hover:translate-x-0 max-lg:translate-x-0">
                                        <li class="translate-x-20 duration-400 delay-0 group-hover:translate-x-0">
                                            <a href="https://www.facebook.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-facebook-logo text-2xl"></span>
                                            </a>
                                        </li>
                                        <li class="translate-x-20 duration-400 delay-100 group-hover:translate-x-0">
                                            <a href="https://www.x.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-x-logo text-2xl"></span>
                                            </a>
                                        </li>
                                        <li class="translate-x-20 duration-400 delay-200 group-hover:translate-x-0">
                                            <a href="https://www.linkedin.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-linkedin-logo text-2xl"></span>
                                            </a>
                                        </li>
                                        <li class="translate-x-20 duration-400 delay-300 group-hover:translate-x-0">
                                            <a href="https://www.instagram.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-instagram-logo text-2xl"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="team_info mt-5">
                                    <strong
                                        class="team_name line-clamp-2 heading5 duration-300 group-hover:text-orange">John
                                        Michaels</strong>
                                    <span class="team_position mt-2 text-variant1 line-clamp-2">Senior Project
                                        Manager</span>
                                </div>
                            </div>
                        </li>
                        <li class="swiper-slide group">
                            <div class="team_item animate" style="--i: 2">
                                <div class="team_img overflow-hidden relative aspect-[3/4]">
                                    <img src="frontend/assets/images/team/team2.jpg"
                                        class="h-full object-cover duration-400 group-hover:scale-110" alt="Sarah Thompson">
                                    <ul
                                        class="team_socials flex flex-col gap-2 absolute top-3 right-3 translate-x-25 duration-400 group-hover:translate-x-0 max-lg:translate-x-0">
                                        <li class="translate-x-20 duration-400 delay-0 group-hover:translate-x-0">
                                            <a href="https://www.facebook.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-facebook-logo text-2xl"></span>
                                            </a>
                                        </li>
                                        <li class="translate-x-20 duration-400 delay-100 group-hover:translate-x-0">
                                            <a href="https://www.x.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-x-logo text-2xl"></span>
                                            </a>
                                        </li>
                                        <li class="translate-x-20 duration-400 delay-200 group-hover:translate-x-0">
                                            <a href="https://www.linkedin.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-linkedin-logo text-2xl"></span>
                                            </a>
                                        </li>
                                        <li class="translate-x-20 duration-400 delay-300 group-hover:translate-x-0">
                                            <a href="https://www.instagram.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-instagram-logo text-2xl"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="team_info mt-5">
                                    <strong
                                        class="team_name line-clamp-2 heading5 duration-300 group-hover:text-orange">Sarah
                                        Thompson</strong>
                                    <span class="team_position mt-2 text-variant1 line-clamp-2">Lead HVAC Technician</span>
                                </div>
                            </div>
                        </li>
                        <li class="swiper-slide group">
                            <div class="team_item animate" style="--i: 3">
                                <div class="team_img overflow-hidden relative aspect-[3/4]">
                                    <img src="frontend/assets/images/team/team3.jpg"
                                        class="h-full object-cover duration-400 group-hover:scale-110" alt="Emily Carter">
                                    <ul
                                        class="team_socials flex flex-col gap-2 absolute top-3 right-3 translate-x-25 duration-400 group-hover:translate-x-0 max-lg:translate-x-0">
                                        <li class="translate-x-20 duration-400 delay-0 group-hover:translate-x-0">
                                            <a href="https://www.facebook.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-facebook-logo text-2xl"></span>
                                            </a>
                                        </li>
                                        <li class="translate-x-20 duration-400 delay-100 group-hover:translate-x-0">
                                            <a href="https://www.x.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-x-logo text-2xl"></span>
                                            </a>
                                        </li>
                                        <li class="translate-x-20 duration-400 delay-200 group-hover:translate-x-0">
                                            <a href="https://www.linkedin.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-linkedin-logo text-2xl"></span>
                                            </a>
                                        </li>
                                        <li class="translate-x-20 duration-400 delay-300 group-hover:translate-x-0">
                                            <a href="https://www.instagram.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-instagram-logo text-2xl"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="team_info mt-5">
                                    <strong
                                        class="team_name line-clamp-2 heading5 duration-300 group-hover:text-orange">Emily
                                        Carter</strong>
                                    <span class="team_position mt-2 text-variant1 line-clamp-2">Customer Support
                                        Manager</span>
                                </div>
                            </div>
                        </li>
                        <li class="swiper-slide group">
                            <div class="team_item animate" style="--i: 4">
                                <div class="team_img overflow-hidden relative aspect-[3/4]">
                                    <img src="frontend/assets/images/team/team4.jpg"
                                        class="h-full object-cover duration-400 group-hover:scale-110" alt="Mark Robinson">
                                    <ul
                                        class="team_socials flex flex-col gap-2 absolute top-3 right-3 translate-x-25 duration-400 group-hover:translate-x-0 max-lg:translate-x-0">
                                        <li class="translate-x-20 duration-400 delay-0 group-hover:translate-x-0">
                                            <a href="https://www.facebook.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-facebook-logo text-2xl"></span>
                                            </a>
                                        </li>
                                        <li class="translate-x-20 duration-400 delay-100 group-hover:translate-x-0">
                                            <a href="https://www.x.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-x-logo text-2xl"></span>
                                            </a>
                                        </li>
                                        <li class="translate-x-20 duration-400 delay-200 group-hover:translate-x-0">
                                            <a href="https://www.linkedin.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-linkedin-logo text-2xl"></span>
                                            </a>
                                        </li>
                                        <li class="translate-x-20 duration-400 delay-300 group-hover:translate-x-0">
                                            <a href="https://www.instagram.com/"
                                                class="inline-flex items-center justify-center w-11 h-11 bg-white duration-400 hover:bg-orange hover:text-white"
                                                target="_blank">
                                                <span class="ph ph-instagram-logo text-2xl"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="team_info mt-5">
                                    <strong
                                        class="team_name line-clamp-2 heading5 duration-300 group-hover:text-orange">Mark
                                        Robinson</strong>
                                    <span class="team_position mt-2 text-variant1 line-clamp-2">Plumbing Services
                                        Specialist</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection