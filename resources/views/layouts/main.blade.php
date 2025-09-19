<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title ?? 'Page' }} | {{ $web_settings['site_name'] ?? 'Global Solutions - Staffing Agency' }}
    </title>


    @yield('meta')

    <!--=====FAB ICON=======-->
    <link rel="shortcut icon" href="{{ $web_settings['favicon_url'] ?? url('frontend/img/logo/titel2.png') }}"
        type="image/x-icon">

    <!--=====CSS=======-->
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/slick-slider.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/mobile-menu.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/main.css') }}">

    <!--=====JQUERY=======-->
    <script src="{{ url('frontend/js/jquery-3-6-0.min.js') }}"></script>
    <style>
        .common-hero>div>div>div>div>h1,
        .common-hero>div>div>div>div>div>a,
        .common-hero>div>div>div>div>div>span,
        .common-hero>div>div>div>div>div>p {
            color: white !important;
        }
    </style>
</head>

<body class="body">

    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loading-container">
            <div class="loading loading"></div>
            <div id="loading-icon">
                <img src="{{ $web_settings['favicon_url'] ?? url('frontend/img/logo/titel2.png') }}" alt="">
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    <!--=====progress END=======-->
    <div class="paginacontainer">
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </div>
    <!--=====progress END=======-->

    <header>
        <div class="header-area header-area2 header-area-all d-none d-lg-block" id="header">
            <div class="container">
                <div class="row header-bg">
                    <div class="col-12">
                        <div class="header-elements">
                            <div class="site-logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ $web_settings['header_logo_url'] ?? url('frontend/img/logo/header-logo5.png') }}"
                                        alt="{{ $web_settings['web_title'] ?? 'One Global Solutions' }}">
                                </a>
                            </div>

                            <div class="main-menu-ex main-menu-ex1">
                                <ul>
                                    @if (@$primary_menu)
                                        @foreach ($primary_menu->items as $item)
                                            @include('partials.menu-item', ['item' => $item])
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="header2-buttons d-flex align-items-center gap-2">
                                <!-- Contact Us Button -->
                                <div class="button">
                                    <a class="theme-btn1" href="{{ url('/contact-us') }}">Contact Us</a>
                                </div>

                                <!-- Login / Sign Up Dropdown Button -->
                                <div class="dropdown">
                                    <a class="btn btn-sm theme-btn1 dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                        Login / Sign Up <i class="fas fa-caret-down ms-1"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ url('/login') }}">Login</a></li>
                                        <li><a class="dropdown-item" href="{{ url('/register') }}">Sign Up</a></li>
                                    </ul>
                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--=====HEADER END=======-->

    <!--=====Mobile header start=======-->
    <div class="mobile-header mobile-header-main d-block d-lg-none">
        <div class="container-fluid">
            <div class="col-12">
                <div class="mobile-header-elements">
                    <div class="mobile-logo">
                        <a href="{{ url('/') }}"><img
                                src="{{ $web_settings['header_logo_url'] ?? url('frontend/img/logo/header-logo5.png') }}"
                                alt=""></a>
                    </div>
                    <div class="mobile-nav-icon">
                        <i class="fa-duotone fa-bars-staggered"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-sidebar d-block d-lg-none">
        <div class="logo-m">
            <a href="{{ url('/') }}"><img src="{{ url('frontend/img/logo/header-logo5.png') }}" alt=""></a>
        </div>
        <div class="menu-close">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="mobile-nav">
            <ul>
                @if (@$primary_menu)
                    @foreach ($primary_menu->items as $item)
                        <li><a href="{{ url($item->url) }}">{{ $item->title }}</a></li>
                    @endforeach
                @endif
            </ul>

            <div class="mobile-button">
                <a class="theme-btn10" href="#">Learn More <span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>

            <div class="single-footer-items">
                <h3>Contact Us</h3>
                <div class="contact-box">
                    <div class="icon">
                        <img src="{{ url('frontend/img/icons/footer-icon1.png') }}" alt="">
                    </div>
                    <div class="pera">
                        <a
                            href="tel:{{ $web_settings['phone'] ?? '+1 (555) 123-4567' }}">{{ $web_settings['phone'] ?? '+1 (555) 123-4567' }}</a>
                    </div>
                </div>
                <div class="contact-box">
                    <div class="icon">
                        <img src="{{ url('frontend/img/icons/footer-icon2.png') }}" alt="">
                    </div>
                    <div class="pera">
                        <a href="mailto:{{ $web_settings['email'] ?? 'contact@globaloverseas.com' }}">{{
                            $web_settings['email'] ?? 'contact@globaloverseas.com' }}</a>
                    </div>
                </div>
                <div class="contact-box">
                    <div class="icon">
                        <img src="{{ url('frontend/img/icons/footer-icon3.png') }}" alt="">
                    </div>
                    <div class="pera">
                        <a href="#">{{ $web_settings['address'] ?? '123 Business Plaza<br>New York, NY 10001' }}</a>
                    </div>
                </div>
            </div>

            <div class="contact-infos">
                <h3>Our Location</h3>
                <ul class="social-icon">
                    <li><a href="{{ $web_settings['social_linkedin'] ?? '#' }}"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                    </li>
<<<<<<< Updated upstream
                    <li><a href="{{ $web_settings['social_twitter'] ?? '#' }}"><i class="fa-brands fa-x-twitter"></i></a></li>

                    <li><a href="{{ $web_settings['social_instagram'] ?? '#' }}"><i class="fa-brands fa-instagram"></i></a>
=======
                    <li><a href="{{ $web_settings['social_twitter'] ?? '#' }}"><i
                                class="fa-brands fa-x-twitter"></i></a></li>

                    <li><a href="{{ $web_settings['social_instagram'] ?? '#' }}"><i
                                class="fa-brands fa-instagram"></i></a>
>>>>>>> Stashed changes
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--=====Mobile header end=======-->

    <main class="main-wrapper" id="page-content">
        @yield('content')
    </main>

    @unless (isset($no_footer))
        <footer>
            <div class="footer10 _relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-footer-items footer-logo-area">
                                <div class="footer-logo">
                                    <a href="{{ url('/') }}"><img
                                            src="{{ $web_settings['footer_logo_url'] ?? url('frontend/img/logo/footer-logo1.png') }}"
                                            alt=""></a>
                                </div>
                                <div class="space20"></div>
                                <div class="heading1-w">
                                    <p>{{ $web_settings['footer_about'] ?? 'At 1 Global Solutions is a premier staffing agency dedicated to connecting exceptional talent with leading organizations worldwide across healthcare, technology, and engineering sectors.' }}
                                    </p>
                                </div>
                                <ul class="social-icon">
                                    <li><a href="{{ $web_settings['social_linkedin'] ?? '#' }}"><i
                                                class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="{{ $web_settings['social_twitter'] ?? '#' }}"><i
                                                class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="{{ $web_settings['social_youtube'] ?? '#' }}"><i
                                                class="fa-brands fa-youtube"></i></a></li>
                                    <li><a href="{{ $web_settings['social_instagram'] ?? '#' }}"><i
                                                class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg col-md-6 col-12">
                            <div class="single-footer-items">
                                <h3>Our Services</h3>
                                <ul class="menu-list">
                                    @if ($footer_menu_1)
                                        @foreach ($footer_menu_1->items as $item)
                                            <li><a href="{{ url($item->url) }}">{{ $item->title }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg col-md-6 col-12">
                            <div class="single-footer-items pl-5">
                                <h3>Quick Links</h3>
                                <ul class="menu-list">
                                    @if ($footer_menu_2)
                                        @foreach ($footer_menu_2->items as $item)
                                            <li><a href="{{ url($item->url) }}">{{ $item->title }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer-items">
                                <h3>Global Headquarters</h3>
                                <div class="contact-box">
                                    <div class="icon">
                                        <img src="{{ url('frontend/img/icons/footer6-icon1.svg') }}" alt="">
                                    </div>
                                    <div class="pera">
                                        <a
                                            href="tel:{{ $web_settings['phone'] ?? '+1 (555) 123-4567' }}">{{ $web_settings['phone'] ?? '+1 (555) 123-4567' }}</a>
                                    </div>
                                </div>

                                <div class="contact-box">
                                    <div class="icon">
                                        <img src="{{ url('frontend/img/icons/footer6-icon2.svg') }}" alt="">
                                    </div>
                                    <div class="pera">
                                        <a
                                            href="#">{!! $web_settings['address'] ?? '135 Old Foxon Rd, 2, East Haven, <br> CT, 06513, United States.' !!}</a>
                                    </div>
                                </div>

                                <div class="contact-box">
                                    <div class="icon">
                                        <img src="{{ url('frontend/img/icons/footer6-icon3.svg') }}" alt="">
                                    </div>
                                    <div class="pera">
                                        <a
                                            href="mailto:{{ $web_settings['email'] ?? 'info@globaloverseas.com' }}">{{ $web_settings['email'] ?? 'info@1globaloverseas.com' }}</a>
                                    </div>
                                </div>

                                <div class="contact-box">
                                    <div class="icon">
                                        <img src="{{ url('frontend/img/icons/footer6-icon4.svg') }}" alt="">
                                    </div>
                                    <div class="pera">
                                        <a href="#">{{ $web_settings['website'] ?? 'www.1globalsolutions.com' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space70"></div>
                </div>

                <div class="copyright-area _relative">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="coppyright">
                                    <p>© Copyright {{ date('Y') }} -
                                        {{ $web_settings['site_name'] ?? 'One Global Solutions' }}. All Rights Reserved
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @endunless
    <!--===== FOOTER AREA END =======-->

    <!-- Popup Contact Form -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @if (session('message'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: "{{ session('message') }}",
                                timer: 3000,
                                showConfirmButton: false
                            });
                        });
                    </script>
                @endif

                <div class="modal-body">
                    <div class="modal-box">
                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input name="name" type="text" placeholder="Your Name *" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="email" type="email" placeholder="Your Email *" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="phone" type="text" placeholder="Your Phone">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="subject" type="text" placeholder="Subject *" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <textarea name="message" id="message" cols="30" rows="4" placeholder="Message *"
                                        required></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="modal-button">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend/js/aos.js') }}"></script>
    <script src="{{ url('frontend/js/fontawesome.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.countup.js') }}"></script>
    <script src="{{ url('frontend/js/mobile-menu.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('frontend/js/slick-slider.js') }}"></script>
    <script src="{{ url('frontend/js/gsap.min.js') }}"></script>
    <script src="{{ url('frontend/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ url('frontend/js/Splitetext.js') }}"></script>
    <script src="{{ url('frontend/js/SmoothScroll.js') }}"></script>
    <script src="{{ url('frontend/js/text-animation.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.lineProgressbar.js') }}"></script>
    <script src="{{ url('frontend/js/tilt.jquery.js') }}"></script>
    <script src="{{ url('frontend/js/main.js') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
</body>

</html>
