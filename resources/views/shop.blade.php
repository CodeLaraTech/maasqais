@extends('layouts.main')
@section('content')
    <main>
        <!-- BREADCRUMB -->
        <section class="section breadcrumb flex items-center h-[320px] relative">
            <div class="breadcrumb_bg absolute top-0 left-0 w-full h-full pointer-events-none">
                <img src="frontend/assets/images/breadcrumb/blog.jpg" alt="Our Products" class="h-full object-cover">
            </div>
            <div class="container relative text-white">
                <ul class="breadcrumb_nav flex items-center gap-1 animate">
                    <li class="flex items-center">
                        <a href="index.html" class="breadcrumb_link caption1 duration-300 hover:underline">Home</a>
                    </li>
                    <li class="flex items-center">
                        <span class="ph ph-caret-right text-xs opacity-50"></span>
                        <a href="#!" class="breadcrumb_link pl-1 caption1 opacity-50">Shop</a>
                    </li>
                </ul>
                <h2 class="section_tit mt-3 heading2 animate" style="--i: 2">Our Products</h2>
            </div>
        </section>
        <!-- SHOP -->
        <section class="section services sm:py-25 py-15 bg-surface">
            <div class="container flex flex-col items-center">
                <div class="heading flex text-center max-lg:flex-col justify-center gap-7 gap-y-5">
                    <div class="lg:w-full animate animate_right show">
                        <span class="section_tag tag bg-red">Our Products</span>
                        
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
                                    timing belts, and conveyor belts for power transmission and material handling.</p>
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
                                    and precision tools for repair, maintenance, and industrial applications.</p>
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
                                    safety glasses, and footwear to keep your workforce safe and compliant.</p>
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
                                    stretch films, bubble wraps, and adhesive tapes for storage and transport.</p>
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
                                    that minimize wear and extend the life of machinery and vehicles.</p>
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
                                    bearings, and mounted units engineered for long-lasting smooth performance.</p>
                                <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                                    <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                                    <span class="ph-bold ph-arrow-up-right text-2xl"></span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <!-- 7. General Electricals -->
<li class="services_item animate show" style="--i: 7">
    <a href="#" class="services_link flex flex-col gap-7 h-full p-7 bg-white group">
        <div class="services_thumb relative">
            <div class="services_img overflow-hidden">
                <img src="frontend/assets/images/services/2-7.jpg"
                    class="duration-400 group-hover:scale-110" alt="General Electricals">
            </div>
            <span
                class="services_icon flex items-center justify-center flex-shrink-0 absolute sm:-bottom-10 -bottom-7 right-5 
                       sm:w-20 w-14 sm:h-20 h-14 border-8 border-white bg-black duration-500 group-hover:bg-blue">
                <i class="fa-solid fa-plug sm:text-3xl text-xl text-white"></i>
            </span>
        </div>
        <div class="services_info">
            <strong class="services_name heading5 hover:underline">General Electricals</strong>
            <p class="services_desc mt-4 text-variant1">
                Electrical supplies including wires, switches, connectors, fuses, and more — ensuring
                safety and reliability in every installation.
            </p>
            <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                <i class="fa-solid fa-arrow-up-right text-2xl text-white"></i>
            </span>
        </div>
    </a>
</li>

<!-- 8. Cleaning Materials -->
<li class="services_item animate show" style="--i: 8">
    <a href="#" class="services_link flex flex-col gap-7 h-full p-7 bg-white group">
        <div class="services_thumb relative">
            <div class="services_img overflow-hidden">
                <img src="frontend/assets/images/services/2-8.jpg"
                    class="duration-400 group-hover:scale-110" alt="Cleaning Materials">
            </div>
            <span
                class="services_icon flex items-center justify-center flex-shrink-0 absolute sm:-bottom-10 -bottom-7 right-5 
                       sm:w-20 w-14 sm:h-20 h-14 border-8 border-white bg-black duration-500 group-hover:bg-blue">
                <i class="fa-solid fa-broom sm:text-3xl text-xl text-white"></i>
            </span>
        </div>
        <div class="services_info">
            <strong class="services_name heading5 hover:underline">Cleaning Materials</strong>
            <p class="services_desc mt-4 text-variant1">
                Industrial-grade cleaning chemicals, detergents, mops, brushes, and consumables to
                maintain cleanliness and hygiene.
            </p>
            <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                <i class="fa-solid fa-arrow-up-right text-2xl text-white"></i>
            </span>
        </div>
    </a>
</li>

<!-- 9. Fasteners -->
<li class="services_item animate show" style="--i: 9">
    <a href="#" class="services_link flex flex-col gap-7 h-full p-7 bg-white group">
        <div class="services_thumb relative">
            <div class="services_img overflow-hidden">
                <img src="frontend/assets/images/services/2-9.jpg"
                    class="duration-400 group-hover:scale-110" alt="Fasteners">
            </div>
            <span
                class="services_icon flex items-center justify-center flex-shrink-0 absolute sm:-bottom-10 -bottom-7 right-5 
                       sm:w-20 w-14 sm:h-20 h-14 border-8 border-white bg-black duration-500 group-hover:bg-blue">
                <i class="fa-solid fa-screwdriver-wrench sm:text-3xl text-xl text-white"></i>
            </span>
        </div>
        <div class="services_info">
            <strong class="services_name heading5 hover:underline">Fasteners</strong>
            <p class="services_desc mt-4 text-variant1">
                Nuts, bolts, screws, washers, anchors, and specialty fasteners. Manufactured to exacting
                standards for dependable strength.
            </p>
            <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                <i class="fa-solid fa-arrow-up-right text-2xl text-white"></i>
            </span>
        </div>
    </a>
</li>

<!-- 10. Industrial Consumables -->
<li class="services_item animate show" style="--i: 10">
    <a href="#" class="services_link flex flex-col gap-7 h-full p-7 bg-white group">
        <div class="services_thumb relative">
            <div class="services_img overflow-hidden">
                <img src="frontend/assets/images/services/2-10.jpg"
                    class="duration-400 group-hover:scale-110" alt="Industrial Consumables">
            </div>
            <span
                class="services_icon flex items-center justify-center flex-shrink-0 absolute sm:-bottom-10 -bottom-7 right-5 
                       sm:w-20 w-14 sm:h-20 h-14 border-8 border-white bg-black duration-500 group-hover:bg-blue">
                <i class="fa-solid fa-toolbox sm:text-3xl text-xl text-white"></i>
            </span>
        </div>
        <div class="services_info">
            <strong class="services_name heading5 hover:underline">Industrial Consumables</strong>
            <p class="services_desc mt-4 text-variant1">
                Daily-use industrial items such as adhesives, welding rods, abrasives, and sealants.
                Essential to keep your operations uninterrupted.
            </p>
            <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                <i class="fa-solid fa-arrow-up-right text-2xl text-white"></i>
            </span>
        </div>
    </a>
</li>

<!-- 11. Pressure Gauges -->
<li class="services_item animate show" style="--i: 11">
    <a href="#" class="services_link flex flex-col gap-7 h-full p-7 bg-white group">
        <div class="services_thumb relative">
            <div class="services_img overflow-hidden">
                <img src="frontend/assets/images/services/2-11.jpg"
                    class="duration-400 group-hover:scale-110" alt="Pressure Gauges">
            </div>
            <span
                class="services_icon flex items-center justify-center flex-shrink-0 absolute sm:-bottom-10 -bottom-7 right-5 
                       sm:w-20 w-14 sm:h-20 h-14 border-8 border-white bg-black duration-500 group-hover:bg-blue">
                <i class="fa-solid fa-gauge-high sm:text-3xl text-xl text-white"></i>
            </span>
        </div>
        <div class="services_info">
            <strong class="services_name heading5 hover:underline">Pressure Gauges</strong>
            <p class="services_desc mt-4 text-variant1">
                Accurate instruments for monitoring gas and liquid pressure in industrial systems, ensuring
                safety and performance.
            </p>
            <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                <i class="fa-solid fa-arrow-up-right text-2xl text-white"></i>
            </span>
        </div>
    </a>
</li>

<!-- 12. Raw Materials -->
<li class="services_item animate show" style="--i: 12">
    <a href="#" class="services_link flex flex-col gap-7 h-full p-7 bg-white group">
        <div class="services_thumb relative">
            <div class="services_img overflow-hidden">
                <img src="frontend/assets/images/services/2-12.jpg"
                    class="duration-400 group-hover:scale-110" alt="Raw Materials">
            </div>
            <span
                class="services_icon flex items-center justify-center flex-shrink-0 absolute sm:-bottom-10 -bottom-7 right-5 
                       sm:w-20 w-14 sm:h-20 h-14 border-8 border-white bg-black duration-500 group-hover:bg-blue">
                <i class="fa-solid fa-box sm:text-3xl text-xl text-white"></i>
            </span>
        </div>
        <div class="services_info">
            <strong class="services_name heading5 hover:underline">Raw Materials</strong>
            <p class="services_desc mt-4 text-variant1">
                A wide variety of raw materials including metals, plastics, and chemicals tailored to
                production and manufacturing needs.
            </p>
            <span class="flex items-center gap-2 mt-4 duration-300 hover:text-blue">
                <span class="border-b-2 underline-offset-2 txt-button">Learn More</span>
                <i class="fa-solid fa-arrow-up-right text-2xl text-white"></i>
            </span>
        </div>
    </a>
</li>


                </ul>
            </div>
        </section>
    </main>
@endsection