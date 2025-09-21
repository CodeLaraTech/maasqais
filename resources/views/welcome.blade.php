@extends('layouts.main')
@section('content')
    <main>
        <!-- SLIDER -->
        @if($banners && $banners->items->count())
            <!--===== HERO AREA START =======-->
            <section class="section style-three slider sm:h-[43.5rem] h-[32rem] relative">

                <!-- Prev Button -->
                <button
                    class="btn_prev flex items-center justify-center absolute top-1/2 left-0 z-[2] -translate-y-1/2 w-13 h-[4.75rem] bg-white min-[1600px]:bg-opacity-10 bg-opacity-30 text-white duration-300 lg:hover:bg-opacity-80 lg:hover:text-black">
                    <span class="ph ph-caret-left text-xl"></span>
                    <span class="blind">button prev</span>
                </button>

                <!-- Swiper Wrapper -->
                <div class="slider_swiper_three swiper w-full h-full">
                    <ul class="swiper-wrapper">
                        @foreach($banners->items as $item)
                            <li class="swiper-slide flex items-center justify-center relative">
                                <div class="slider_bg absolute top-0 left-0 w-full h-full pointer-events-none">
                                    <img src="{{ asset($item->image ?? 'frontend/assets/images/slider/default.jpg') }}"
                                        alt="{{ $item->title }}" class="h-full object-cover">
                                </div>

                                <div class="container relative max-sm:-mt-10">
                                    @if($item->title)
                                        <h2 class="section_tit_three lg:w-2/3 text-white heading1" style="--i:6">
                                            {!! nl2br(e($item->title)) !!}
                                        </h2>
                                    @endif

                                    @if($item->content)
                                        <p class="section_desc mt-4 text-white body2" style="--i:7">
                                            {{ $item->content }}
                                        </p>
                                    @endif

                                    @if(is_array($item->buttons) && count($item->buttons))
                                        <ul class="slider_btn_group flex flex-wrap gap-4 mt-9">
                                            @foreach($item->buttons as $index => $btn)
                                                <li class="slider_btn_item" style="--i: {{ 8 + $index }}">
                                                    <a href="{{ $btn['url'] ?? '#' }}"
                                                        class="slider_btn btn btn_icon {{ $btn['bg'] ?? 'bg-yellow' }}">
                                                        <span>{{ $btn['label'] ?? 'Learn More' }}</span>
                                                        <span class="ph ph-arrow-up-right text-2xl"></span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="swiper-pagination pagination-white"></div>
                </div>

                <!-- Next Button -->
                <button
                    class="btn_next flex items-center justify-center absolute top-1/2 right-0 z-[2] -translate-y-1/2 w-13 h-[4.75rem] bg-white min-[1600px]:bg-opacity-10 bg-opacity-30 text-white duration-300 lg:hover:bg-opacity-80 lg:hover:text-black">
                    <span class="ph ph-caret-right text-xl"></span>
                    <span class="blind">button next</span>
                </button>
            </section>
        @endif


        <!-- ABOUT -->
        <section class="section about sm:py-25 py-15">
            <div class="container flex max-xl:flex-col-reverse items-center xl:gap-20 gap-10">
                <div class="about_content w-full">
                    <span class="section_tag tag bg-red animate">About Us</span>
                    <h3 class="section_tit mt-4 heading3 animate">Maas Qais Trading Est. – Your Trusted Procurement Partner
                    </h3>
                    <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 animate">
                        At Maas Qais Trading Est., Jeddah – Saudi Arabia, we are a team of procurement experts dedicated to
                        fulfilling industrial supply requirements with quality, affordability, and timely delivery.
                    </p>
                    <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 animate">
                        Our mission is to support customers with:
                    </p>
                    <ul class="about_benefit flex flex-wrap gap-10 gap-y-6 mt-5">
                        <li class="flex items-center gap-5 animate" style="--i: 1">
                            <span class="ph ph-check text-2xl text-red"></span>
                            <strong class="body2">The best quality products</strong>
                        </li>
                        <li class="flex items-center gap-5 animate" style="--i: 2">
                            <span class="ph ph-check text-2xl text-red"></span>
                            <strong class="body2">At the right price</strong>
                        </li>
                        <li class="flex items-center gap-5 animate" style="--i: 3">
                            <span class="ph ph-check text-2xl text-red"></span>
                            <strong class="body2">With on-time delivery</strong>
                        </li>
                    </ul>
                    <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 animate">
                        We proudly supply a diverse range of products to industries in Saudi Arabia and beyond.
                        Occasionally, our customers require items outside our defined categories — and we make it our goal
                        to source them, saving your time and ensuring smooth operations.
                    </p>
                    <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 animate">
                        Looking forward to building long-term business relationships, we welcome you to share your
                        requirements at
                        <a href="mailto:info@maasqais.com" class="text-red underline">info@maasqais.com</a>. Our team will
                        get back to you with the best sources for your needs.
                    </p>
                    <ul class="about_btn flex flex-wrap gap-8 gap-y-6 mt-10">
                        <li class="animate" style="--i: 1">
                            <a href="{{ url('about-us') }}" class="btn bg-red">About Us</a>
                        </li>
                        <li class="animate" style="--i: 2">
                            <a href="#" class="flex items-center gap-3 group">
                                <span
                                    class="flex items-center justify-center w-14 h-14 border-2 border-red duration-400 group-hover:bg-red group-hover:text-white">
                                    <span class="ph ph-envelope-simple text-3xl"></span>
                                </span>
                                <div>
                                    <span class="text-variant1">Have any Question?</span>
                                    <strong class="heading6 block mt-0.5">info@maasqais.com</strong>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="about_img flex-shrink-0 grid grid-cols-2 sm:gap-7.5 gap-6 relative xl:w-[55%] sm:w-2/3 w-full">
                    <div class="about_bg animate animate_right">
                        <img src="frontend/assets/images/components/about3_1.jpg" alt="Industrial Supplies">
                    </div>
                    <div class="about_bg sm:pt-20 pt-12 animate animate_left">
                        <img src="frontend/assets/images/components/about4_2.jpg" alt="Procurement Experts">
                    </div>
                </div>
            </div>
        </section>



        <!-- SERVICES -->
        <section class="section services sm:py-25 py-15 bg-surface">
            <div class="container flex flex-col items-center">
                <div class="heading flex max-lg:flex-col justify-center gap-7 gap-y-5">
                    <div class="lg:w-1/2 animate animate_right show">
                        <span class="section_tag tag bg-red">Our Products</span>
                        <h3 class="section_tit mt-4 heading3">Industrial Products & Consumables We Supply</h3>
                    </div>
                    <div class="lg:w-1/2 animate animate_left show">
                        <p class="section_desc body2">We supply a broad portfolio of industrial products and consumables
                            designed to meet your operational needs with quality and reliability.</p>
                        <a href="{{ url('shop') }}" class="inline-flex items-center gap-2 mt-3 mx-auto">
                            <span class="has_line line_black animate_width txt-button">View All Categories</span>
                            <span class="ph-bold ph-arrow-up-right text-2xl"></span>
                        </a>

                    </div>
                </div>
                <ul class="services_list grid xl:grid-cols-3 md:grid-cols-2 lg:gap-11 gap-6 lg:mt-12 mt-9">
                    <li class="services_item animate show" style="--i: 1">
                        <a href="#" class="services_link flex flex-col gap-7 h-full p-7 bg-white group">
                            <div class="services_thumb relative">
                                <div class="services_img overflow-hidden">
                                    <img src="frontend/assets/images/services/2-1.jpg"
                                        class="duration-400 group-hover:scale-110" alt="Leak Detection">
                                </div>
                                <span
                                    class="services_icon flex items-center justify-center flex-shrink-0 absolute sm:-bottom-10 -bottom-7 right-5 sm:w-20 w-14 sm:h-20 h-14 border-8 border-white bg-black duration-500 group-hover:bg-blue">
                                    <span class="icon-pipe-leak sm:text-3xl text-xl"></span>
                                </span>
                            </div>
                            <div class="services_info">
                                <strong class="services_name heading5 hover:underline">Belts</strong>
                                <p class="services_desc mt-4 text-variant1">Durable industrial belts including V-belts,
                                    timing
                                    belts, and conveyor belts for power transmission and material handling.</p>
                                <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                                    <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                                    <span class="ph-bold ph-arrow-up-right text-2xl"></span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="services_item animate show" style="--i: 2">
                        <a href="#" class="services_link flex flex-col gap-7 h-full p-7 bg-white group">
                            <div class="services_thumb relative">
                                <div class="services_img overflow-hidden">
                                    <img src="frontend/assets/images/services/2-2.jpg"
                                        class="duration-400 group-hover:scale-110" alt="Drain Cleaning">
                                </div>
                                <span
                                    class="services_icon flex items-center justify-center flex-shrink-0 absolute sm:-bottom-10 -bottom-7 right-5 sm:w-20 w-14 sm:h-20 h-14 border-8 border-white bg-black duration-500 group-hover:bg-blue">
                                    <span class="icon-pipe-oval sm:text-3xl text-xl"></span>
                                </span>
                            </div>
                            <div class="services_info">
                                <strong class="services_name heading5 hover:underline">Tools</strong>
                                <p class="services_desc mt-4 text-variant1">Comprehensive range of hand tools, power tools,
                                    and
                                    precision tools for repair, maintenance, and industrial applications.</p>
                                <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                                    <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                                    <span class="ph-bold ph-arrow-up-right text-2xl"></span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="services_item animate show" style="--i: 3">
                        <a href="#" class="services_link flex flex-col gap-7 h-full p-7 bg-white group">
                            <div class="services_thumb relative">
                                <div class="services_img overflow-hidden">
                                    <img src="frontend/assets/images/services/2-3.jpg"
                                        class="duration-400 group-hover:scale-110" alt="Pipe Installation">
                                </div>
                                <span
                                    class="services_icon flex items-center justify-center flex-shrink-0 absolute sm:-bottom-10 -bottom-7 right-5 sm:w-20 w-14 sm:h-20 h-14 border-8 border-white bg-black duration-500 group-hover:bg-blue">
                                    <span class="icon-spanner sm:text-3xl text-xl"></span>
                                </span>
                            </div>
                            <div class="services_info">
                                <strong class="services_name heading5 hover:underline">Safety & PPE</strong>
                                <p class="services_desc mt-4 text-variant1">Protective gear including helmets, gloves,
                                    safety
                                    glasses, and footwear to keep your workforce safe and compliant.</p>
                                <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                                    <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                                    <span class="ph-bold ph-arrow-up-right text-2xl"></span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="services_item animate show" style="--i: 4">
                        <a href="#" class="services_link flex flex-col gap-7 h-full p-7 bg-white group">
                            <div class="services_thumb relative">
                                <div class="services_img overflow-hidden">
                                    <img src="frontend/assets/images/services/2-4.jpg"
                                        class="duration-400 group-hover:scale-110" alt="Heater Installation">
                                </div>
                                <span
                                    class="services_icon flex items-center justify-center flex-shrink-0 absolute sm:-bottom-10 -bottom-7 right-5 sm:w-20 w-14 sm:h-20 h-14 border-8 border-white bg-black duration-500 group-hover:bg-blue">
                                    <span class="icon-heater sm:text-3xl text-xl"></span>
                                </span>
                            </div>
                            <div class="services_info">
                                <strong class="services_name heading5 hover:underline">Packing Materials</strong>
                                <p class="services_desc mt-4 text-variant1">Strong packing solutions including cartons,
                                    stretch
                                    films, bubble wraps, and adhesive tapes for storage and transport.</p>
                                <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                                    <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                                    <span class="ph-bold ph-arrow-up-right text-2xl"></span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="services_item animate show" style="--i: 5">
                        <a href="#" class="services_link flex flex-col gap-7 h-full p-7 bg-white group">
                            <div class="services_thumb relative">
                                <div class="services_img overflow-hidden">
                                    <img src="frontend/assets/images/services/2-5.jpg"
                                        class="duration-400 group-hover:scale-110" alt="Toilet Repair">
                                </div>
                                <span
                                    class="services_icon flex items-center justify-center flex-shrink-0 absolute sm:-bottom-10 -bottom-7 right-5 sm:w-20 w-14 sm:h-20 h-14 border-8 border-white bg-black duration-500 group-hover:bg-blue">
                                    <span class="icon-plunger sm:text-3xl text-xl"></span>
                                </span>
                            </div>
                            <div class="services_info">
                                <strong class="services_name heading5 hover:underline">Oil & Lubricants</strong>
                                <p class="services_desc mt-4 text-variant1">High-performance lubricants, greases, and oils
                                    that
                                    minimize wear and extend the life of machinery and vehicles.</p>
                                <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                                    <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                                    <span class="ph-bold ph-arrow-up-right text-2xl"></span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="services_item animate show" style="--i: 6">
                        <a href="#" class="services_link flex flex-col gap-7 h-full p-7 bg-white group">
                            <div class="services_thumb relative">
                                <div class="services_img overflow-hidden">
                                    <img src="frontend/assets/images/services/2-6.jpg"
                                        class="duration-400 group-hover:scale-110" alt="Sewer Services">
                                </div>
                                <span
                                    class="services_icon flex items-center justify-center flex-shrink-0 absolute sm:-bottom-10 -bottom-7 right-5 sm:w-20 w-14 sm:h-20 h-14 border-8 border-white bg-black duration-500 group-hover:bg-blue">
                                    <span class="icon-tap sm:text-3xl text-xl"></span>
                                </span>
                            </div>
                            <div class="services_info">
                                <strong class="services_name heading5 hover:underline">Bearings</strong>
                                <p class="services_desc mt-4 text-variant1">Wide selection of ball bearings, roller
                                    bearings,
                                    and mounted units engineered for long-lasting smooth performance.</p>
                                <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                                    <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                                    <span class="ph-bold ph-arrow-up-right text-2xl"></span>
                                </span>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </section>



        <!-- WHY CHOOSE US -->
        <section class="section choose_us sm:py-25 py-15 bg-surface">
            <div class="container flex max-lg:flex-col items-center xl:gap-20 gap-10">
                <div class="choose_us_img flex-shrink-0 lg:w-[45%] sm:w-2/3 w-full animate animate_right">
                    <img src="frontend/assets/images/components/form_request_img3.jpg" alt="WHY CHOOSE US">
                </div>
                <div class="choose_us_content w-full">
                    <span class="section_tag tag bg-red animate">WHY CHOOSE US</span>
                    <h3 class="section_tit mt-4 heading3 animate">Why Choose Maas Qais Trading Est.</h3>
                    <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 animate">We are committed to being your trusted
                        procurement partner for industrial supplies, offering quality products at competitive prices with
                        reliable delivery.</p>
                    <div class="heading_menu mt-10 border-b-2 border-outline animate">
                        <div class="menu_tab style-red -mb-0.5">
                            <ul class="menu flex gap-10" role="tablist">
                                <li class="indicator absolute bottom-0 h-0.5 bg-red duration-300"></li>
                                <li class="tab_item" role="presentation">
                                    <button
                                        class="tab_btn tab_btn_border pb-2.5 heading6 hover:text-red duration-300 active"
                                        id="services_tab01" role="tab" aria-controls="services_01" aria-selected="true">Our
                                        Advantages</button>
                                </li>
                                <li class="tab_item" role="presentation">
                                    <button class="tab_btn tab_btn_border pb-2.5 heading6 hover:text-red duration-300"
                                        id="services_tab02" role="tab" aria-controls="services_02" aria-selected="false">Our
                                        Mission</button>
                                </li>
                                <li class="tab_item" role="presentation">
                                    <button class="tab_btn tab_btn_border pb-2.5 heading6 hover:text-red duration-300"
                                        id="services_tab03" role="tab" aria-controls="services_03" aria-selected="false">Our
                                        Approach</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="services_01" class="tab_panel mt-6 animate active" role="tabpanel"
                        aria-labelledby="services_tab01" aria-hidden="false">
                        <p class="text-variant1">We offer comprehensive industrial supply solutions with a focus on quality,
                            reliability, and customer satisfaction.</p>
                        <ul class="list_feature grid xs:grid-cols-2 gap-10 gap-y-5 mt-5">
                            <li class="flex gap-1">
                                <span class="ph ph-check text-red text-xl"></span>
                                <strong class="txt-button">1000+ Products across multiple categories</strong>
                            </li>
                            <li class="flex gap-1">
                                <span class="ph ph-check text-red text-xl"></span>
                                <strong class="txt-button">Trusted Quality with competitive pricing</strong>
                            </li>
                            <li class="flex gap-1">
                                <span class="ph ph-check text-red text-xl"></span>
                                <strong class="txt-button">Swift Delivery to keep your operations running</strong>
                            </li>
                            <li class="flex gap-1">
                                <span class="ph ph-check text-red text-xl"></span>
                                <strong class="txt-button">Flexible Sourcing for special requirements</strong>
                            </li>
                            <li class="flex gap-1">
                                <span class="ph ph-check text-red text-xl"></span>
                                <strong class="txt-button">Customer-Centric Service approach</strong>
                            </li>
                            <li class="flex gap-1">
                                <span class="ph ph-check text-red text-xl"></span>
                                <strong class="txt-button">Long-term partnership focus</strong>
                            </li>
                        </ul>
                    </div>
                    <div id="services_02" class="tab_panel mt-6 animate" role="tabpanel" aria-labelledby="services_tab02"
                        aria-hidden="true">
                        <p class="text-variant1">Our mission is to support industries in Saudi Arabia and beyond with the
                            best quality products at the right price with on-time delivery.</p>
                        <p class="text-variant1 mt-2">We aim to become your trusted procurement partner, providing not just
                            products but complete solutions that keep your operations running smoothly.</p>
                    </div>
                    <div id="services_03" class="tab_panel mt-6 animate" role="tabpanel" aria-labelledby="services_tab03"
                        aria-hidden="true">
                        <p class="text-variant1">We take a proactive approach to understanding your needs and providing
                            tailored solutions that meet your specific requirements.</p>
                        <ul class="list_feature flex flex-col gap-5 mt-5">
                            <li class="flex gap-1">
                                <span class="ph ph-check text-red text-xl"></span>
                                <strong class="txt-button">Understanding client requirements thoroughly</strong>
                            </li>
                            <li class="flex gap-1">
                                <span class="ph ph-check text-red text-xl"></span>
                                <strong class="txt-button">Sourcing quality products from reliable suppliers</strong>
                            </li>
                            <li class="flex gap-1">
                                <span class="ph ph-check text-red text-xl"></span>
                                <strong class="txt-button">Ensuring timely delivery to prevent operational delays</strong>
                            </li>
                            <li class="flex gap-1">
                                <span class="ph ph-check text-red text-xl"></span>
                                <strong class="txt-button">Providing ongoing support and building long-term
                                    relationships</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="btn_area animate">
                        <a href="#" class="btn mt-10 bg-red">Contact Us</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- PROCESS -->
        <section class="section process style-three style-four sm:py-25 py-15">
            <div class="container flex flex-col items-center">
                <span class="section_tag tag bg-red animate">Our Process</span>
                <h3 class="section_title mt-4 heading3 text-center animate">Our Procurement Process</h3>
                <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 text-center animate">We follow a streamlined process
                    to ensure your industrial supply needs are met efficiently and effectively.</p>
                <ul class="process_list grid xl:grid-cols-4 sm:grid-cols-2 gap-[4.375rem] gap-y-10 lg:mt-12 mt-9">
                    <li class="process_item flex flex-col items-center gap-7 relative group animate" style="--i: 1">
                        <div
                            class="process_img overflow-hidden w-[12.5rem] h-[12.5rem] p-1.5 border-2 border-transparent rounded-full duration-400 group-hover:border-red">
                            <img src="frontend/assets/images/process/1.jpg" class="h-full object-cover rounded-full"
                                alt="Requirement Analysis">
                        </div>
                        <div class="process_info">
                            <span class="block txt-label text-red text-center">Step 1</span>
                            <h5 class="mt-4 heading5 text-center">Requirement Analysis</h5>
                            <p class="mt-3 text-variant1 text-center">We carefully analyze your specific industrial supply
                                needs and requirements.</p>
                        </div>
                    </li>
                    <li class="process_item flex flex-col items-center gap-7 relative group animate" style="--i: 2">
                        <div
                            class="process_img overflow-hidden w-[12.5rem] h-[12.5rem] p-1.5 border-2 border-transparent rounded-full duration-400 group-hover:border-red">
                            <img src="frontend/assets/images/process/2.jpg" class="h-full object-cover rounded-full"
                                alt="Product Sourcing">
                        </div>
                        <div class="process_info">
                            <span class="block txt-label text-red text-center">Step 2</span>
                            <h5 class="mt-4 heading5 text-center">Product Sourcing</h5>
                            <p class="mt-3 text-variant1 text-center">We source the best quality products from reliable
                                suppliers at competitive prices.</p>
                        </div>
                    </li>
                    <li class="process_item flex flex-col items-center gap-7 relative group animate" style="--i: 3">
                        <div
                            class="process_img overflow-hidden w-[12.5rem] h-[12.5rem] p-1.5 border-2 border-transparent rounded-full duration-400 group-hover:border-red">
                            <img src="frontend/assets/images/process/3.jpg" class="h-full object-cover rounded-full"
                                alt="Quality Assurance">
                        </div>
                        <div class="process_info">
                            <span class="block txt-label text-red text-center">Step 3</span>
                            <h5 class="mt-4 heading5 text-center">Quality Assurance</h5>
                            <p class="mt-3 text-variant1 text-center">We ensure all products meet our strict quality
                                standards before delivery.</p>
                        </div>
                    </li>
                    <li class="process_item flex flex-col items-center gap-7 relative group animate" style="--i: 4">
                        <div
                            class="process_img overflow-hidden w-[12.5rem] h-[12.5rem] p-1.5 border-2 border-transparent rounded-full duration-400 group-hover:border-red">
                            <img src="frontend/assets/images/process/4.jpg" class="h-full object-cover rounded-full"
                                alt="Timely Delivery">
                        </div>
                        <div class="process_info">
                            <span class="block txt-label text-red text-center">Step 4</span>
                            <h5 class="mt-4 heading5 text-center">Timely Delivery</h5>
                            <p class="mt-3 text-variant1 text-center">We deliver your products on time to ensure
                                uninterrupted operations.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>



        <!-- TESTIMONIALS -->
        @if(isset($testimonials) && count($testimonials))
            <section class="section testimonials sm:py-25 py-15">
                <div class="container">
                    <div class="testimonials_inner">
                        <div class="section_heading flex flex-wrap items-end justify-between gap-7">
                            <div>
                                <span class="section_tag tag bg-red animate">Testimonials</span>
                                <h3 class="section_tit mt-4 heading3 animate">What our clients say?</h3>
                            </div>
                            <div class="group_btn flex items-center gap-3 animate">
                                <button
                                    class="btn_prev flex items-center justify-center w-12 h-12 border border-outline duration-300 hover:bg-black hover:text-white">
                                    <span class="ph ph-caret-left text-2xl"></span>
                                    <span class="blind">button prev</span>
                                </button>
                                <button
                                    class="btn_next flex items-center justify-center w-12 h-12 border border-outline duration-300 hover:bg-black hover:text-white">
                                    <span class="ph ph-caret-right text-2xl"></span>
                                    <span class="blind">button next</span>
                                </button>
                            </div>
                        </div>
                        <div class="testimonials_content relative w-full lg:mt-12 mt-9">
                            <div class="testimonials_swiper_two swiper">
                                <ul class="swiper-wrapper">
                                    @foreach($testimonials as $testimonial)
                                        <li class="swiper-slide p-7 border border-outline duration-300 hover:border-red">
                                            <div class="testimonials_item animate" style="--i: 1">
                                                <ul class="rating flex">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <li
                                                            class="ph-fill ph-star text-xl @if($i > $testimonial->rating) text-variant2 @endif">
                                                        </li>
                                                    @endfor
                                                </ul>
                                                <p class="testimonials_desc mt-3 body2 line-clamp-4">
                                                    "{{ \Illuminate\Support\Str::limit($testimonial->getTranslation('message', app()->getLocale()), 120, '...') }}"
                                                </p>
                                                <div class="flex items-center gap-4 mt-6 pt-6 border-t border-outline">
                                                    <div
                                                        class="testimonials_img flex-shrink-0 overflow-hidden w-15 h-15 rounded-full">
                                                        @if($testimonial->image)
                                                            <img src="{{ asset('storage/' . $testimonial->image) }}"
                                                                class="h-full object-cover"
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
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- COUNTER -->
        <section class="section counter">
            <div class="container">
                <ul class="counter_list grid xl:grid-cols-4 grid-cols-2 gap-10 sm:py-25 py-15 border-t border-outline">
                    <li class="counter_item animate" style="--i: 1">
                        <h2 class="heading1"><span id="counter_number1" class="counter_number">1000</span>+</h2>
                        <p class="mt-4 body2 text-variant1">Products across multiple categories to meet diverse industrial
                            needs.</p>
                    </li>
                    <li class="counter_item animate" style="--i: 2">
                        <h2 class="heading1"><span id="counter_number2" class="counter_number">500</span>+</h2>
                        <p class="mt-4 body2 text-variant1">Satisfied clients across Saudi Arabia and beyond.</p>
                    </li>
                    <li class="counter_item animate" style="--i: 3">
                        <h2 class="heading1"><span id="counter_number3" class="counter_number">98</span>%</h2>
                        <p class="mt-4 body2 text-variant1">On-time delivery rate ensuring uninterrupted operations.</p>
                    </li>
                    <li class="counter_item animate" style="--i: 4">
                        <h2 class="heading1"><span id="counter_number4" class="counter_number">24</span>/7</h2>
                        <p class="mt-4 body2 text-variant1">Customer support to address your queries and requirements.</p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- FORM REQUEST -->
        <section class="section form_request sm:py-25 py-15 bg-dark">
            <div class="container flex items-center max-xl:flex-col gap-30 gap-y-14">
                <div class="form_request_content w-full text-white">
                    <span class="section_tag tag bg-white animate">Contact US</span>
                    <h3 class="section_tit mt-4 heading3 animate">Get in Touch with Us</h3>
                    <p class="section_desc lg:mt-5 mt-3 body2 animate">Reach out today for expert guidance, product
                        inquiries, or customized sourcing solutions. We're here to support your industrial supply needs!</p>
                    <ul class="list_feature grid sm:grid-cols-2 gap-14 gap-y-4 mt-5">
                        <li class="flex items-center gap-3 animate" style="--i: 1">
                            <span class="ph ph-check text-xl"></span>
                            <span>Expert Procurement Guidance</span>
                        </li>
                        <li class="flex items-center gap-3 animate" style="--i: 2">
                            <span class="ph ph-check text-xl"></span>
                            <span>Customized Sourcing Solutions</span>
                        </li>
                        <li class="flex items-center gap-3 animate" style="--i: 3">
                            <span class="ph ph-check text-xl"></span>
                            <span>Quality Products at Competitive Prices</span>
                        </li>
                        <li class="flex items-center gap-3 animate" style="--i: 4">
                            <span class="ph ph-check text-xl"></span>
                            <span>Timely Delivery Guarantee</span>
                        </li>
                    </ul>
                    <ul class="list_info grid md:grid-cols-3 gap-8 mt-10 pt-10 border-t border-white border-opacity-10">
                        <li class="item flex gap-3 animate" style="--i: 1">
                            <span
                                class="flex flex-shrink-0 items-center justify-center w-15 h-15 rounded-full bg-white bg-opacity-10">
                                <span class="ph ph-map-pin text-3xl"></span>
                            </span>
                            <div>
                                <span class="caption1 text-variant2">Our Location</span>
                                <p class="mt-1">Jeddah, Saudi Arabia</p>
                            </div>
                        </li>
                        <li class="item flex gap-3 animate" style="--i: 2">
                            <span
                                class="flex flex-shrink-0 items-center justify-center w-15 h-15 rounded-full bg-white bg-opacity-10">
                                <span class="ph ph-envelope-simple text-3xl"></span>
                            </span>
                            <div>
                                <span class="caption1 text-variant2">Email Us</span>
                                <p class="mt-1">info@maasqais.com</p>
                            </div>
                        </li>
                        <li class="item flex gap-3 animate" style="--i: 3">
                            <span
                                class="flex flex-shrink-0 items-center justify-center w-15 h-15 rounded-full bg-white bg-opacity-10">
                                <span class="ph ph-phone-call text-3xl"></span>
                            </span>
                            <div>
                                <span class="caption1 text-variant2">Call Us</span>
                                <p class="mt-1">+966 12 345 6789</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="form_request_form flex-shrink-0 relative xl:w-5/12 w-full p-8 bg-white animate animate_left"
                    style="--i: 3">
                    <h4 class="heading4">Request A Quote</h4>
                    <p class="mt-3 text-variant1">We'll work with you to provide the best industrial supply solutions that
                        meet your needs and budget.</p>
                    <form class="form grid sm:grid-cols-2 grid-cols-1 gap-5 w-full mt-6">
                        <div class="form_group w-full">
                            <input type="text" name="name" class="form_input w-full py-3 px-4 border border-outline rounded"
                                placeholder="Your Name" required>
                        </div>
                        <div class="form_group w-full">
                            <input type="tel" name="phone" pattern="\d*"
                                class="form_input w-full py-3 px-4 border border-outline rounded" placeholder="Phone Number"
                                required>
                        </div>
                        <div class="form_group w-full">
                            <input type="email" name="email"
                                class="form_input w-full py-3 px-4 border border-outline rounded"
                                placeholder="Email Address" required>
                        </div>
                        <div class="form_group form_select w-full">
                            <select name="product_category" class="w-full py-3 px-4 border border-outline rounded" required>
                                <option selected disabled value>Product Category</option>
                                <option value="Industrial Tools">Industrial Tools</option>
                                <option value="Safety Equipment">Safety Equipment</option>
                                <option value="Maintenance Supplies">Maintenance Supplies</option>
                                <option value="Industrial Components">Industrial Components</option>
                                <option value="Other">Other</option>
                            </select>
                            <span class="ph ph-caret-down arrow_down text-xl"></span>
                        </div>
                        <div class="form_group sm:col-span-2 w-full">
                            <textarea name="message" class="form_input w-full py-3 px-4 border border-outline rounded"
                                rows="3" placeholder="Your Requirements" required></textarea>
                        </div>
                        <div class="form_group sm:col-span-2 mt-1 w-full">
                            <button type="submit" class="btn w-full bg-red text-center">Request Quote</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- VIDEO -->
        <section class="section video animate">
            <div class="video_inner flex items-center justify-center lg:h-[35rem] h-[20rem]">
                <h3 class="blind">Video</h3>
                <img src="frontend/assets/images/components/bg_video4.jpg"
                    class="absolute top-0 left-0 z-[-1] w-full h-full object-cover" alt="video">
                <video class="w-full h-full object-cover" autoplay loop muted playsinline>
                    <source src="frontend/assets/images/other/video4.mp4" type="video/mp4">
                </video>
                <button class="btn_play js_btn_open_popup absolute w-full h-full" data-popup="popup_video">
                    <span class="blind">button play video</span>
                </button>
            </div>
        </section>

        @if(isset($blogs) && count($blogs))
            <!-- LATEST NEWS -->
            <section class="section blog sm:py-25 py-15">
                <div class="container flex flex-col items-center">
                    <span class="section_tag tag animate">Industry Insights</span>
                    <h3 class="section_tit mt-4 heading3 text-center animate">Latest Industrial News & Tips</h3>
                    <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 text-center animate">
                        Stay updated with the latest trends, insights, and tips for industrial supplies and procurement.
                    </p>

                    <ul class="blog_list grid lg:grid-cols-2 gap-7.5 w-full lg:mt-12 mt-9">
                        @foreach($blogs as $blog)
                            @if($loop->first)
                                <!-- Featured Blog -->
                                <li class="blog_item flex flex-col gap-6 animate animate_right">
                                    <a href="#" class="blog_thumb block overflow-hidden group">
                                        <img src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('frontend/assets/images/blog/default.jpg') }}"
                                            class="duration-400 group-hover:scale-110"
                                            alt="{{ $blog->getTranslation('title', app()->getLocale()) }}">
                                    </a>
                                    <div class="blog_info">
                                        <div class="flex flex-wrap items-center gap-3 txt-label text-variant1">
                                            <span class="blog_date">{{ $blog->created_at->format('F d, Y') }}</span>
                                            <span class="flex-shrink-0 w-px h-3 bg-outline"></span>
                                            <a href="#" class="blog_cate duration-300 hover:underline hover:text-black">
                                                {{ $blog->category->name ?? 'Uncategorized' }}
                                            </a>
                                        </div>
                                        <a href="#" class="block mt-4">
                                            <strong class="blog_tit line-clamp-2 heading4 duration-300 hover:text-orange">
                                                {{ $blog->getTranslation('title', app()->getLocale()) }}
                                            </strong>
                                            <p class="blog_tit mt-5 line-clamp-2 text-variant1">
                                                {!! Str::limit(strip_tags($blog->getTranslation('content', app()->getLocale())), 150) !!}
                                            </p>
                                        </a>
                                    </div>
                                </li>
                            @else
                                <!-- Other Blogs -->
                                <li>
                                    <ul class="flex flex-col sm:gap-6 gap-7.5">
                                        @foreach($blogs->slice(1) as $index => $otherBlog)
                                            <li class="blog_item flex max-sm:flex-col sm:items-center gap-6 animate animate_left"
                                                style="--i: {{ $index + 1 }}">
                                                <a href="#" class="blog_thumb block flex-shrink-0 overflow-hidden sm:w-56 group">
                                                    <img src="{{ $otherBlog->featured_image ? asset('storage/' . $otherBlog->featured_image) : asset('frontend/assets/images/blog/default.jpg') }}"
                                                        class="duration-400 group-hover:scale-110"
                                                        alt="{{ $otherBlog->getTranslation('title', app()->getLocale()) }}">
                                                </a>
                                                <div class="blog_info">
                                                    <div class="flex flex-wrap items-center gap-3 txt-label text-variant1">
                                                        <span class="blog_date">{{ $otherBlog->created_at->format('F d, Y') }}</span>
                                                        <span class="flex-shrink-0 w-px h-3 bg-outline"></span>
                                                        <a href="#" class="blog_cate duration-300 hover:underline hover:text-black">
                                                            {{ $otherBlog->category->name ?? 'Uncategorized' }}
                                                        </a>
                                                    </div>
                                                    <a href="#" class="blog_tit mt-4 line-clamp-2 heading5 duration-300 hover:text-orange">
                                                        {{ $otherBlog->getTranslation('title', app()->getLocale()) }}
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @break
                            @endif
                        @endforeach
                    </ul>
                </div>
            </section>
        @endif

    </main>
@endsection