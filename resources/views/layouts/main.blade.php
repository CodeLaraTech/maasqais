<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title ?? 'Page' }} | {{ $web_settings['site_name'] ?? 'Maasqais' }}
    </title>


    @yield('meta')

    <link rel="shortcut icon" href="{{ url('frontend/assets/images/logo_red.png') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/dist/output-tailwind.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/dist/output-scss.css') }}">
    <!-- Font Awesome 6 Free -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">



</head>

<body class="body">


    <header id="header" class="header relative z-[2]">
        <!-- Top Nav -->
        <div class="top_nav flex items-center justify-between h-11 lg:px-10 px-4 bg-dark text-white">
            <ul class="top_nav_info flex items-center gap-6">
                <!-- Address -->
                @if(!empty($web_settings['address']))
                    <li
                        class="info_item inline-flex items-center gap-2 pr-6 border-r border-white border-opacity-10 max-md:hidden">
                        <span class="ph ph-map-pin"></span>
                        <span class="caption1">{{ $web_settings['address'] }}</span>
                    </li>
                @endif

                <!-- Working Hours -->
                @if(!empty($web_settings['working_hours']))
                    <li
                        class="info_item inline-flex items-center gap-2 pr-6 border-r border-white border-opacity-10 max-[500px]:hidden">
                        <span class="ph ph-alarm"></span>
                        <span class="caption1">{{ $web_settings['working_hours'] }}</span>
                    </li>
                @endif

            </ul>

            <!-- Social Links -->
            <ul class="top_nav_social flex items-center">
                <li class="social_item">
                    <a href="{{ $web_settings['social_facebook'] ?? '#' }}"
                        class="social_link flex items-center justify-center w-9 h-9" target="_blank">
                        <span class="ph ph-facebook-logo text-xl"></span>
                        <span class="blind">link facebook</span>
                    </a>
                </li>
                <li class="social_item">
                    <a href="{{ $web_settings['social_twitter'] ?? '#' }}"
                        class="social_link flex items-center justify-center w-9 h-9" target="_blank">
                        <span class="ph ph-x-logo text-xl"></span>
                        <span class="blind">link x</span>
                    </a>
                </li>
                <li class="social_item">
                    <a href="{{ $web_settings['social_instagram'] ?? '#' }}"
                        class="social_link flex items-center justify-center w-9 h-9" target="_blank">
                        <span class="ph ph-instagram-logo text-xl"></span>
                        <span class="blind">link instagram</span>
                    </a>
                </li>
                <li class="social_item">
                    <a href="{{ $web_settings['social_skype'] ?? '#' }}"
                        class="social_link flex items-center justify-center w-9 h-9" target="_blank">
                        <span class="ph ph-skype-logo text-xl"></span>
                        <span class="blind">link skype</span>
                    </a>
                </li>
                <li class="social_item">
                    <a href="{{ $web_settings['social_telegram'] ?? '#' }}"
                        class="social_link flex items-center justify-center w-9 h-9" target="_blank">
                        <span class="ph ph-telegram-logo text-xl"></span>
                        <span class="blind">link telegram</span>
                    </a>
                </li>
            </ul>

        </div>

        <!-- Header Main -->
        <div
            class="header_main flex items-center justify-between absolute top-11 left-0 w-full sm:h-25 h-20 lg:px-10 px-4 bg-[#000] bg-opacity-[12%] backdrop-blur">

            <!-- Logo -->
            <h1>
                <a href="{{ url('/') }}" class="logo flex items-center gap-3">
                    <img src="{{ asset($web_settings['logo'] ?? 'frontend/assets/images/logo_red.png') }}"
                        class="flex-shrink-0 w-20" alt="logo">

                </a>
            </h1>

            <!-- Menu -->
            <ul class="menu style-red flex items-center gap-10 h-full max-lg:hidden">
                @if (@$primary_menu)
                    @foreach ($primary_menu->items as $item)
                        @include('partials.menu-item', ['item' => $item])
                    @endforeach
                @endif

            </ul>


            <!-- Header Info -->
            <ul class="header_info flex items-center gap-10">
                <li>
                    <ul class="menu_icons">
                        <!-- Search -->
                        <li class="menu_icons_item inline-block align-middle max-lg:hidden">
                            <button class="menu_icons_btn js_btn_open_popup" data-popup="popup_search">
                                <span class="ph ph-magnifying-glass text-2xl text-white"></span>
                                <span class="blind">button search</span>
                            </button>
                        </li>


                        <!-- Mobile Menu -->
                        <li class="menu_icons_item inline-block align-middle ml-5 lg:hidden">
                            <button class="menu_icons_btn js_btn_open_popup" data-popup="popup_menu_mobile">
                                <span class="ph ph-list text-2xl text-white"></span>
                                <span class="blind">button menu mobile</span>
                            </button>
                        </li>
                    </ul>
                </li>

                <!-- Request Estimate -->
                <li class="max-xl:hidden">
                    <a href="{{ url('contact-us') }}" class="btn bg-red">Request an estimate</a>
                </li>

                <!-- Phone -->
                @if(!empty($web_settings['phone']))
                    <li class="max-[1600px]:hidden">
                        <a href="tel:{{ $web_settings['phone'] }}" class="flex items-center gap-3 group">
                            <span
                                class="flex items-center justify-center sm:w-14 w-12 sm:h-14 h-12 bg-white text-red duration-400 group-hover:bg-red group-hover:text-white">
                                <span class="ph ph-phone-call sm:text-3xl text-2xl"></span>
                            </span>
                            <div class="max-lg:hidden">
                                <span class="text-white">Call Us Now:</span>
                                <strong class="heading6 block mt-0.5 text-white">{{ $web_settings['phone'] }}</strong>
                            </div>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </header>
    <!--=====HEADER END=======-->


    <!--=====Mobile header end=======-->

    <main class="main-wrapper" id="page-content">
        @yield('content')
    </main>

    @unless (isset($no_footer))
        <footer class="footer sm:pt-20 pt-12 bg-dark text-white">
            <div class="container flex flex-wrap justify-between gap-10">

                {{-- Left Info Section --}}
                <div class="footer_info md:w-1/4 w-full">
                    <h1>
                        <a href="{{ url('/') }}" class="footer_logo flex items-center gap-3">
                            <img src="{{ url('frontend/assets/images/logo_red.png') }}" class="flex-shrink-0 w-20"
                                alt="logo">

                        </a>
                    </h1>

                    <div class="footer_map mt-7">
                        <div class="flex items-center gap-2 pb-2">
                            <span class="ph ph-map-pin text-2xl"></span>
                            <span>{!! $web_settings['address'] ?? 'G6P7+JW2 Mishrifah, Jeddah Saudi Arabia' !!}</span>
                        </div>
                        <a href="{{ $web_settings['map_link'] ?? 'https://maps.app.goo.gl/nN8uYfBkUUSGZxbEA' }}"
                            class="text-sm font-bold underline duration-300 hover:text-red" target="_blank">Google map</a>
                    </div>

                    <div class="footer_mail flex flex-wrap items-center gap-2 mt-4">
                        <span class="ph ph-envelope text-2xl"></span>
                        <span>{{ $web_settings['email'] ?? 'info@maasqais.com' }}</span>
                    </div>

                    <div class="footer_time mt-4">
                        <span class="block pb-1 text-variant2">Opening Times:</span>
                        <span>{{ $web_settings['opening_times_week'] ?? 'Mon - Fri: 9am - 5pm' }}</span>
                        <span>{{ $web_settings['opening_times_weekend'] ?? 'Weekend: 10am - 4pm' }}</span>
                    </div>

                    {{-- Social Links --}}
                    <ul class="footer_social flex flex-wrap items-center gap-3 mt-7">
                        @if(!empty($web_settings['social_messenger']))
                            <li class="social_item">
                                <a href="{{ $web_settings['social_messenger'] }}"
                                    class="social_link flex items-center justify-center w-10 h-10 border border-white border-opacity-10 rounded-full text-white duration-400 hover:bg-white hover:text-red"
                                    target="_blank">
                                    <span class="ph ph-messenger-logo text-xl"></span>
                                    <span class="blind">link messenger</span>
                                </a>
                            </li>
                        @endif
                        @if(!empty($web_settings['social_twitter']))
                            <li class="social_item">
                                <a href="{{ $web_settings['social_twitter'] }}"
                                    class="social_link flex items-center justify-center w-10 h-10 border border-white border-opacity-10 rounded-full text-white duration-400 hover:bg-white hover:text-red"
                                    target="_blank">
                                    <span class="ph ph-x-logo text-xl"></span>
                                    <span class="blind">link x</span>
                                </a>
                            </li>
                        @endif
                        @if(!empty($web_settings['social_instagram']))
                            <li class="social_item">
                                <a href="{{ $web_settings['social_instagram'] }}"
                                    class="social_link flex items-center justify-center w-10 h-10 border border-white border-opacity-10 rounded-full text-white duration-400 hover:bg-white hover:text-red"
                                    target="_blank">
                                    <span class="ph ph-instagram-logo text-xl"></span>
                                    <span class="blind">link instagram</span>
                                </a>
                            </li>
                        @endif
                        @if(!empty($web_settings['social_skype']))
                            <li class="social_item">
                                <a href="{{ $web_settings['social_skype'] }}"
                                    class="social_link flex items-center justify-center w-10 h-10 border border-white border-opacity-10 rounded-full text-white duration-400 hover:bg-white hover:text-red"
                                    target="_blank">
                                    <span class="ph ph-skype-logo text-xl"></span>
                                    <span class="blind">link skype</span>
                                </a>
                            </li>
                        @endif
                        @if(!empty($web_settings['social_telegram']))
                            <li class="social_item">
                                <a href="{{ $web_settings['social_telegram'] }}"
                                    class="social_link flex items-center justify-center w-10 h-10 border border-white border-opacity-10 rounded-full text-white duration-400 hover:bg-white hover:text-red"
                                    target="_blank">
                                    <span class="ph ph-telegram-logo text-xl"></span>
                                    <span class="blind">link telegram</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>

                {{-- Right Content Section --}}
                <div class="footer_content md:w-2/3 w-full">

                    {{-- Newsletter --}}
                    <div
                        class="footer_newsletter flex max-lg:flex-col gap-15 gap-y-6 pb-10 border-b border-white border-opacity-10">
                        <h4 class="heading4">Subscribe <br class="max-lg:hidden">Newsletter</h4>
                        <div class="w-full">
                            <form class='flex w-full' method="POST" action="#">
                                @csrf
                                <input type="email" name="email" placeholder='Enter your e-mail'
                                    class='caption1 w-full h-14 px-6 border border-white border-opacity-10 duration-300 focus:border-white'
                                    required />
                                <button type="submit"
                                    class='btn flex-shrink-0 h-fit bg-red hover:bg-white'>Subscribe</button>
                            </form>
                            <p class="mt-4 text-variant2">Sign up to get the latest news and events—we promise no spam.</p>
                        </div>
                    </div>

                    {{-- Footer Navigation --}}
                    <div class="footer_nav flex max-xl:flex-wrap justify-between gap-10 gap-y-6 mt-10">

                        {{-- About Menu --}}
                        <div class="footer_nav_area max-sm:w-full">
                            <strong class="footer_nav_heading txt-label max-sm:hidden">Pages</strong>
                            <ul class="footer_nav_list flex flex-col gap-2 mt-3">
                                @if ($footer_menu_1)
                                    @foreach ($footer_menu_1->items as $item)
                                        <li>
                                            <a href="{{ url($item->url) }}"
                                                class="footer_nav_link has_line line_white capitalize text-variant2 hover:text-white duration-300">
                                                {{ $item->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        {{-- Categories Menu (dynamic optional) --}}
                        <div class="footer_nav_area max-sm:w-full">
                            <strong class="footer_nav_heading txt-label max-sm:hidden">Categories</strong>
                            <ul class="footer_nav_list flex flex-col gap-2 mt-3">
                                <li>
                                    <a href="#"
                                        class="footer_nav_link has_line line_white capitalize text-variant2 hover:text-white duration-300">
                                        Belts
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="footer_nav_link has_line line_white capitalize text-variant2 hover:text-white duration-300">
                                        Tools
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="footer_nav_link has_line line_white capitalize text-variant2 hover:text-white duration-300">
                                        Safety & PPE
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="footer_nav_link has_line line_white capitalize text-variant2 hover:text-white duration-300">
                                        Packing Materials
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="footer_nav_link has_line line_white capitalize text-variant2 hover:text-white duration-300">
                                        Oil & Lubricants
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="footer_nav_link has_line line_white capitalize text-variant2 hover:text-white duration-300">
                                        Bearings
                                    </a>
                                </li>
                            </ul>
                        </div>


                        {{-- Extra Static Quick Links --}}
                        <div class="footer_nav_area max-sm:w-full">
                            <strong class="footer_nav_heading txt-label max-sm:hidden">Rules & Regulations</strong>
                            <ul class="footer_nav_list flex flex-col gap-2 mt-3">
                                @if ($footer_menu_2)
                                    @foreach ($footer_menu_2->items as $item)
                                        <li>
                                            <a href="{{ url($item->url) }}"
                                                class="footer_nav_link has_line line_white capitalize text-variant2 hover:text-white duration-300">
                                                {{ $item->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>


                        {{-- Contact Call To Action --}}
                        <div class="footer_nav_area max-md:w-full">
                            <strong class="footer_nav_heading txt-label">Get a Free Estimate Today!</strong>
                            <p class="footer_nav_desc mt-3 text-variant2">Call us for a cost estimate over the phone</p>
                            <h5 class="footer_nav_contact heading5 mt-4">{{ $web_settings['phone'] ?? '+966 53 231 3346' }}
                            </h5>
                            <a href="{{ url('/contact-us') }}" class="btn mt-4 bg-red hover:bg-white">Request an
                                estimate</a>
                        </div>
                    </div>
                </div>

                {{-- Bottom Bar --}}
                <div
                    class="footer_bottom flex items-center justify-between max-sm:flex-col gap-2 w-full mt-5 py-4 border-t border-white border-opacity-10">
                    <p class="copyright text-variant2 text-center">
                        Copyright © {{ date('Y') }} {{ $web_settings['site_name'] ?? 'One Global Solutions' }}.
                        All rights reserved
                    </p>
                    <div class="footer_bottom_link flex items-center gap-4">
                        <!-- Facebook -->
                        <a href="#" class="text-variant2 hover:text-white">
                            <span class="ph ph-facebook-logo text-2xl"></span>
                        </a>
                        <!-- Twitter -->
                        <a href="#" class="text-variant2 hover:text-white">
                            <span class="ph ph-twitter-logo text-2xl"></span>
                        </a>
                        <!-- Instagram -->
                        <a href="#" class="text-variant2 hover:text-white">
                            <span class="ph ph-instagram-logo text-2xl"></span>
                        </a>
                        <!-- LinkedIn -->
                        <a href="#" class="text-variant2 hover:text-white">
                            <span class="ph ph-linkedin-logo text-2xl"></span>
                        </a>
                    </div>


                </div>
            </div>
        </footer>
    @endunless

    <!--===== FOOTER AREA END =======-->
    <!-- Scroll to top -->
    <a class="scroll_to_top_btn bg-red" href="#header"><span class="ph-bold ph-caret-up"></span></a>

    <!-- Popup -->
    <div id="popup" class="popup">
        <!-- Menu mobile -->
        <div id="popup_menu_mobile"
            class="popup_item popup_menu_mobile absolute top-0 left-0 w-full h-full bg-white -translate-x-full duration-500">
            <div class="menu menu_mobile_inner style-red p-6 overflow-x-hidden max-h-full">

                <!-- Logo + Close -->
                <div class="heading flex justify-between">
                    <a href="{{ url('/') }}" class="logo flex items-center gap-3">
                        <img src="{{ asset($web_settings['logo'] ?? 'frontend/assets/images/logo_red.png') }}"
                            class="flex-shrink-0 w-12" alt="{{ $web_settings['site_name'] ?? 'Logo' }}">

                    </a>
                    <button
                        class="btn_close_popup js_btn_close_popup flex items-center justify-center w-7 h-7 rounded-full bg-black text-white">
                        <span class="ph ph-x text-lg"></span>
                        <span class="blind">button close popup</span>
                    </button>
                </div>

                <!-- Search -->
                <form class="form_search overflow-hidden relative w-full h-13 mt-8" action="{{ url('search') }}"
                    method="GET">
                    <input class="form_input py-3 pl-4 pr-16 w-full h-full border border-transparent bg-surface"
                        type="text" name="q" placeholder="Search..." required />
                    <button type="submit"
                        class="flex items-center justify-end absolute top-0 right-4 w-8 h-full aspect-square">
                        <span class="ph ph-magnifying-glass text-2xl"></span>
                    </button>
                </form>

                <!-- Dynamic Menu -->
                <ul class="menu_mobile_nav flex flex-col gap-3 mt-6">
                    @if (!empty($primary_menu))
                        @foreach ($primary_menu->items as $item)
                            @php
                                $itemUrl = trim($item->url, '/');
                                $isActive = request()->is($itemUrl) || request()->is($itemUrl . '/*') || ($item->url == '/' && request()->path() == '/');
                            @endphp

                            <li>
                                <a href="{{ $item->children->count() ? '#!' : url($item->url) }}"
                                    class="menu_link {{ $item->children->count() ? 'btn_toggle' : '' }} flex items-center justify-between w-full py-3 border-b border-outline {{ $isActive ? 'active' : '' }}">
                                    <strong class="heading6">{{ $item->title }}</strong>
                                    @if ($item->children->count())
                                        <span class="ph ph-caret-down text-xl"></span>
                                    @endif
                                </a>

                                @if ($item->children->count())
                                    <ul class="menu_sub_nav px-4 pt-2">
                                        @foreach ($item->children as $child)
                                            @php
                                                $childUrl = trim($child->url, '/');
                                                $childActive = request()->is($childUrl) || request()->is($childUrl . '/*');
                                            @endphp
                                            <li>
                                                <a href="{{ url($child->url) }}"
                                                    class="menu_sub_link py-2 txt-button {{ $childActive ? 'active' : '' }}">
                                                    {{ $child->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>

            </div>
        </div>


        <!-- Popup Search -->
        <div id="popup_search"
            class='popup_item popup_search absolute top-0 left-0 w-full h-full bg-black bg-opacity-90 duration-500 hidden'>
            <button class="btn_close_popup js_btn_close_popup absolute top-16 left-[87vw]">
                <span class="ph ph-x text-white text-5xl"></span>
                <span class="blind">button close popup</span>
            </button>
            <form
                class="form_search overflow-hidden absolute top-1/2 left-1/2 w-[80vw] -translate-x-1/2 -translate-y-1/2">
                <input
                    class="form_input py-5 lg:pr-28 pr-18 w-full h-full border-b-2 border-variant1 lg:text-6xl text-4xl text-white"
                    type="text" placeholder="Search..." required />
                <button
                    class="flex items-center justify-end absolute top-0 right-0 lg:w-20 w-14 h-full aspect-square text-white">
                    <span class="ph ph-magnifying-glass lg:text-6xl text-4xl"></span>
                </button>
            </form>
        </div>

        <!-- Popup Wishlist -->
        <div id="popup_wishlist"
            class='popup_item popup_wishlist absolute top-0 right-0 sm:w-[500px] w-[80vw] h-full bg-white translate-x-full duration-500'>
            <div class='popup_wishlist_inner flex flex-col h-full p-6'>
                <div class="heading flex flex-shrink-0 items-center justify-between w-full pb-5">
                    <h5 class="heading5">Wishlist</h5>
                    <button
                        class="btn_close_popup js_btn_close_popup flex items-center justify-center w-7 h-7 rounded-full bg-black text-white">
                        <span class="ph ph-x text-lg"></span>
                        <span class="blind">button close popup</span>
                    </button>
                </div>
                <ul class="wishlist_list overflow-x-hidden w-full h-full max-h-max">
                    <li class="product_item flex items-center justify-between mt-5 pb-5 border-b border-outline w-full">
                        <a href="product-detail.html" class="flex items-center gap-4">
                            <div class="bg-img flex-shrink-0 overflow-hidden md:w-[100px] w-20 aspect-square">
                                <img src="frontend/assets/images/products/1.jpg" alt="Real Steel Sledge Hammer"
                                    class='w-full h-full object-cover' />
                            </div>
                            <div class="pr-4">
                                <span class="product_name txt-button line-clamp-2 mb-1">Real Steel Sledge Hammer</span>
                                <span class="product_price txt-button">$<span>50</span>.00</span>
                            </div>
                        </a>
                        <button
                            class='btn_remove_product rounded-full bg-transparent text-xl max-md:text-base text-red duration-300 hover:bg-red hover:text-white'>
                            <span class="ph ph-x-circle text-xl"></span>
                            <span class="blind">button remove product</span>
                        </button>
                    </li>
                    <li class="product_item flex items-center justify-between mt-5 pb-5 border-b border-outline w-full">
                        <a href="product-detail.html" class="flex items-center gap-4">
                            <div class="bg-img flex-shrink-0 overflow-hidden md:w-[100px] w-20 aspect-square">
                                <img src="frontend/assets/images/products/2.jpg" alt="Dewalt Flooring Knee Pads"
                                    class='w-full h-full object-cover' />
                            </div>
                            <div class="pr-4">
                                <span class="product_name txt-button line-clamp-2 mb-1">Dewalt Flooring Knee Pads</span>
                                <span class="product_price txt-button">$<span>40</span>.00</span>
                            </div>
                        </a>
                        <button
                            class='btn_remove_product rounded-full bg-transparent text-xl max-md:text-base text-red duration-300 hover:bg-red hover:text-white'>
                            <span class="ph ph-x-circle text-xl"></span>
                            <span class="blind">button remove product</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Popup Cart -->
        <div id="popup_cart"
            class='popup_item popup_cart absolute top-0 right-0 sm:w-[500px] w-[80vw] h-full bg-white translate-x-full duration-500'>
            <div class='popup_cart_inner flex flex-col h-full p-6'>
                <div class="heading flex flex-shrink-0 items-center justify-between w-full pb-5">
                    <h5 class="heading5">Cart</h5>
                    <button
                        class="btn_close_popup js_btn_close_popup flex items-center justify-center w-7 h-7 rounded-full bg-black text-white">
                        <span class="ph ph-x text-lg"></span>
                        <span class="blind">button close popup</span>
                    </button>
                </div>
                <ul class="cart_list overflow-x-hidden w-full h-full max-h-max">
                    <li class="product_item flex items-center justify-between mt-5 pb-5 border-b border-outline w-full">
                        <div class="flex gap-4">
                            <a href="product-detail.html"
                                class="bg-img flex-shrink-0 overflow-hidden md:w-[100px] md:h-[100px] w-24 h-24">
                                <img src="frontend/assets/images/products/1.jpg" alt="Real Steel Sledge Hammer"
                                    class='w-full h-full object-cover' />
                            </a>
                            <div class="w-full">
                                <a href="product-detail.html" class="block pr-4">
                                    <span class="product_name txt-button line-clamp-2 mb-1">Real Steel Sledge
                                        Hammer</span>
                                    <span class="product_price txt-button">$<span>50</span>.00</span>
                                </a>
                                <div class="quantity_form flex items-center gap-5 w-fit mt-4 p-2 border border-outline">
                                    <button class="btn_decrease_quantity" disabled>
                                        <span class="ph ph-minus text-xl"></span>
                                        <span class="blind">button decrease quantity</span>
                                    </button>
                                    <span class="quantity -mt-0.5 sm:text-xl text-lg font-bold">1</span>
                                    <button class="btn_increase_quantity">
                                        <span class="ph ph-plus text-xl"></span>
                                        <span class="blind">button increase quantity</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button
                            class='btn_remove_product rounded-full bg-transparent text-xl max-md:text-base text-red duration-300 hover:bg-red hover:text-white'>
                            <span class="ph ph-x-circle text-xl"></span>
                            <span class="blind">button remove product</span>
                        </button>
                    </li>
                    <li class="product_item flex items-center justify-between mt-5 pb-5 border-b border-outline w-full">
                        <div class="flex gap-4">
                            <a href="product-detail.html"
                                class="bg-img flex-shrink-0 overflow-hidden md:w-[100px] md:h-[100px] w-24 h-24">
                                <img src="frontend/assets/images/products/2.jpg" alt="Dewalt Flooring Knee Pads"
                                    class='w-full h-full object-cover' />
                            </a>
                            <div class="w-full">
                                <a href="product-detail.html" class="block pr-4">
                                    <span class="product_name txt-button line-clamp-2 mb-1">Dewalt Flooring Knee
                                        Pads</span>
                                    <span class="product_price txt-button">$<span>40</span>.00</span>
                                </a>
                                <div class="quantity_form flex items-center gap-5 w-fit mt-4 p-2 border border-outline">
                                    <button class="btn_decrease_quantity" disabled>
                                        <span class="ph ph-minus text-xl"></span>
                                        <span class="blind">button decrease quantity</span>
                                    </button>
                                    <span class="quantity -mt-0.5 sm:text-xl text-lg font-bold">1</span>
                                    <button class="btn_increase_quantity">
                                        <span class="ph ph-plus text-xl"></span>
                                        <span class="blind">button increase quantity</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button
                            class='btn_remove_product rounded-full bg-transparent text-xl max-md:text-base text-red duration-300 hover:bg-red hover:text-white'>
                            <span class="ph ph-x-circle text-xl"></span>
                            <span class="blind">button remove product</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Popup Video -->
        <div id="popup_video"
            class='popup_item popup_video absolute md:w-[50vw] w-[90vw] aspect-[16/9] bg-white duration-500 hidden'>
            <iframe class="w-full h-full object-cover"
                src="https://www.youtube.com/embed/eoiRkkmg2NA?si=Q4WVpTusWMVT5Eej&amp;controls=1&amp;rel=0&amp;enablejsapi=1"
                title="YouTube video player"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>

    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/phosphor-icons.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scrollSmooth.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/countUp.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>