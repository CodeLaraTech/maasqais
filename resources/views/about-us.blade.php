@extends('layouts.main')
@section('content')
    <!--=====HERO AREA START =======-->

    <div class="common-hero"
        style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d'); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 100px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <div class="main-heading">
                        <h1  style="color: white;">About Us</h1>
                        <div class="pages-intro">
                            <a href="{{url('/')}}" style="color: white;">Home</a>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;" >About Us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====HERO AREA END=======-->

    <!--=====ABOUT AREA START=======-->

    <div class="about-page-sec1 sp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about3-images">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image overlay-anim">
                                    <img src="frontend/img/about/about3-img1.png" alt="">
                                </div>
                                <div class="conter-box conter-box1">
                                    <h3><span class="counter">3500</span>+</h3>
                                    <p>Candidate hired</p>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="conter-box conter-box2">
                                    <h3><span class="counter">50</span>+</h3>
                                    <p>Companies</p>
                                </div>
                                <div class="image overlay-anim">
                                    <img src="frontend/img/about/about3-img2.png" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="heading1 about3-heading">
                        <span class="span">About Us</span>
                        <h2>Our Story Connecting Talent, Powering Success</h2>
                        <div class="space16"></div>
                        <p>Our team of industry experts is dedicated to understanding your unique needs and delivering
                            tailored
                            solutions that propel your business forward.</p>

                        <div class="about3-icon-box">
                            <div class="">
                                <div class="icon">
                                    <img src="frontend/img/icons/about3-icon1.png" alt="">
                                </div>
                            </div>
                            <div class="heading1">
                                <h5><a href="#">Empowering Careers, Driving Growth</a></h5>
                                <p>we are your strategic partner in talent acquisition. With a steadfast commitment to
                                    excellence</p>
                            </div>
                        </div>

                        <div class="about3-icon-box">
                            <div class="">
                                <div class="icon">
                                    <img src="frontend/img/icons/about3-icon2.png" alt="">
                                </div>
                            </div>
                            <div class="heading1">
                                <h5><a href="#">Leaders in Staffing Excellence</a></h5>
                                <p>Discover the difference with Your Agency Name and unlock new possibilities for growth
                                </p>
                            </div>
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
                        <span class="span">Our Service </span>
                        <h2>Tailored Solutions for Your Hiring Needs</h2>
                        <div class="space16"></div>
                        <p> With our proven track record and commitment to excellence, we're here to support your <br>
                            organization's growth and help you achieve your hiring goals.</p>
                    </div>
                </div>
            </div>

            <div class="space30"></div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service1-box">
                        <div class="image overlay-anim">
                            <img src="frontend/img/service/service1-img1.png" alt="">
                        </div>
                        <div class="hover-area">
                            <div class="icon">
                                <img src="frontend/img/icons/service1-icon1.png" alt="">
                            </div>
                            <div class="space16"></div>
                            <div class="heading1-w">
                                <h4><a href="service-details.html">Executive Search Services</a></h4>
                                <div class="space16"></div>
                                <p>Whether you're looking for temporary staffing, direct hire placements, </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service1-box active">
                        <div class="image overlay-anim">
                            <img src="frontend/img/service/service1-img2.png" alt="">
                        </div>
                        <div class="hover-area">
                            <div class="icon">
                                <img src="frontend/img/icons/service1-icon2.png" alt="">
                            </div>
                            <div class="space16"></div>
                            <div class="heading1-w">
                                <h4><a href="service-details.html">HR Consulting & Staffing</a></h4>
                                <div class="space16"></div>
                                <p>Whether you're looking for temporary staffing, direct hire placements, </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service1-box">
                        <div class="image overlay-anim">
                            <img src="frontend/img/service/service1-img3.png" alt="">
                        </div>
                        <div class="hover-area">
                            <div class="icon">
                                <img src="frontend/img/icons/service1-icon3.png" alt="">
                            </div>
                            <div class="space16"></div>
                            <div class="heading1-w">
                                <h4><a href="service-details.html">Temporary Staffing Services</a></h4>
                                <div class="space16"></div>
                                <p>Whether you're looking for temporary staffing, direct hire placements, </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space50"></div>
                <div class="col-lg-12">
                    <div class="text-center">
                        <a class="theme-btn3" href="service.html">Let’s get started <span><i
                                    class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--=====SERVICE AREA END=======-->

    <!--=====OUR MISSION AREA START=======-->

    <div class="mission sp">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-auto text-center">
                    <div class="heading1">
                        <span class="span">Our Mission</span>
                        <h2>Success Our Guiding Mission</h2>
                        <div class="space16"></div>
                        <p> We believe that by connecting talented professionals with leading companies, we can create
                            opportunities
                            for growth, innovation</p>
                    </div>
                </div>
            </div>

            <div class="space30"></div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="mission-box">
                        <div class="icon">
                            <img src="frontend/img/icons/mission-icon1.png" alt="">
                        </div>
                        <div class="heading1">
                            <h5><a href="#">Connecting Talent Opportunity</a></h5>
                            <div class="space16"></div>
                            <p>With a focus integrity, collaboration, and personalized service, we strive</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="mission-box">
                        <div class="icon">
                            <img src="frontend/img/icons/mission-icon2.png" alt="">
                        </div>
                        <div class="heading1">
                            <h5><a href="#">Careers, Elevating Businesses</a></h5>
                            <div class="space16"></div>
                            <p>Our commitment excellence guides everything we do ,understanding </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="mission-box">
                        <div class="icon">
                            <img src="frontend/img/icons/mission-icon1.png" alt="">
                        </div>
                        <div class="heading1">
                            <h5><a href="#"> Driving Success Together</a></h5>
                            <div class="space16"></div>
                            <p> DWe believe that connecting talented professionals leading companies</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--=====OUR MISSION AREA END=======-->


    <!--=====ABOUT AREA START=======-->

    <div class="chosse1 sp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="">
                        <div class="icon-box">
                            <div class="icon">
                                <img src="frontend/img/icons/choose1-icon1.png" alt="">
                            </div>
                            <div class="heading1">
                                <h3>98%</h3>
                                <div class="space10"></div>
                                <p>Successful Client</p>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="icon-box">
                            <div class="icon">
                                <img src="frontend/img/icons/choose1-icon2.png" alt="">
                            </div>
                            <div class="heading1">
                                <h3>79%</h3>
                                <div class="space10"></div>
                                <p>Team Advisors</p>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="icon-box icon-box2">
                            <div class="icon">
                                <img src="frontend/img/icons/choose1-icon3.png" alt="">
                            </div>
                            <div class="heading1">
                                <h3>12+</h3>
                                <div class="space10"></div>
                                <p>Years Experience</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="image overlay-anim">
                        <img src="frontend/img/others/choose1-img.png" alt="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="heading1 choose1-heading">
                        <span class="span">Why Choose Us</span>
                        <h2>Choose Excellence Elevate Your Hiring Experience</h2>
                        <div class="space16"></div>
                        <p>Our team of industry experts is dedicated to understanding your unique needs and delivering
                            tailored
                            solutions that propel your business forward.</p>

                        <div class="space10"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="icon-list">
                                    <li><span><i class="fa-solid fa-check"></i></span> Range Of Services</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="icon-list">
                                    <li><span><i class="fa-solid fa-check"></i></span> Professional Expertise</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="icon-list">
                                    <li><span><i class="fa-solid fa-check"></i></span> Online Recourses</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="icon-list">
                                    <li><span><i class="fa-solid fa-check"></i></span> Client Success Stories</li>
                                </ul>
                            </div>
                        </div>
                        <div class="space30"></div>
                        <div class="">
                            <a class="theme-btn1" href="#">About US <span><i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====ABOUT AREA END=======-->

    <!--=====TESTIMONIAL AREA START=======-->

    <div class="tes1 about-page-testimonial sp">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="heading1">
                        <span class="span">Testimonial</span>
                        <h2>Real Stories, Real Results </h2>
                        <div class="space16"></div>
                        <p>Discover why businesses trust us to find the right talent and candidates trust us to find the
                            perfect
                            fit.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="tes7-buttons">
                        <button class="testimonial-prev-arrow1"><i class="fa-regular fa-arrow-left"></i></button>
                        <button class="testimonial-next-arrow1"><i class="fa-regular fa-arrow-right"></i></button>
                    </div>
                </div>

            </div>

            <div class="space30"></div>
            <div class="row">
                <div class="tes1-slider">
                    <div class="single-slider">
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="stars">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <div class="pera">
                                    <p>“But don't just take our word for it—hear what our satisfied clients have to say.
                                        From Fortune 500
                                        companies to small”</p>
                                </div>
                                <div class="bottom-heading">
                                    <h4><a href="#">Amir Jamil</a></h4>
                                    <p>Vp,Daily Naws</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="tes1-image">
                                    <img src="frontend/img/testimonial/tes1-img1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-slider">
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="stars">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <div class="pera">
                                    <p>“Our dedication to excellence, and commitment to building long-lasting partnerships
                                        have”</p>
                                </div>
                                <div class="bottom-heading">
                                    <h4><a href="#">Usman Khan</a></h4>
                                    <p>Co Funder</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="tes1-image">
                                    <img src="frontend/img/testimonial/tes1-img2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="single-slider">
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="stars">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <div class="pera">
                                    <p>“But don't just take our word for it—hear what our satisfied clients have to say.
                                        From Fortune 500
                                        companies to small”</p>
                                </div>
                                <div class="bottom-heading">
                                    <h4><a href="#">Amir Jamil</a></h4>
                                    <p>Vp,Daily Naws</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="tes1-image">
                                    <img src="frontend/img/testimonial/tes1-img1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-slider">
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="stars">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <div class="pera">
                                    <p>“Our dedication to excellence, and commitment to building long-lasting partnerships
                                        have”</p>
                                </div>
                                <div class="bottom-heading">
                                    <h4><a href="#">Usman Khan</a></h4>
                                    <p>Co Funder</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="tes1-image">
                                    <img src="frontend/img/testimonial/tes1-img2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--=====TESTIMONIAL AREA END=======-->

    <!--=====TEAM AREA START=======-->

    <div class="team1 about-page-team sp">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-auto text-center">
                    <div class="heading1">
                        <span class="span">Our Team</span>
                        <h2>Get to Know Our Professionals</h2>
                        <div class="space16"></div>
                        <p>We take pride in fostering a collaborative environment where innovation <br> thrives and clients
                            receive
                            personalized attention at every step </p>
                    </div>
                </div>
            </div>

            <div class="space30"></div>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4 col-md-6">
                    <div class="team1-box overlay-anim">
                        <div class="image">
                            <img src="frontend/img/team/team1-img1.png" alt="">
                        </div>
                        <div class="heading-area">
                            <div class="heading1">
                                <h4><a href="mailto:ammarahmed.khan@1globalsolutions.com">Ammar Ahmed Khan</a></h4>
                                <p>CEO</p>
                            </div>

                            <div class="icons">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="team1-box overlay-anim">
                        <div class="image">
                            <img src="frontend/img/team/team1-img2.png" alt="">
                        </div>
                        <div class="heading-area">
                            <div class="heading1">
                                <h4><a href="mailto:mubeen.mohammed@1globalsolutions.com">Mubeen Mohammed</a></h4>
                                <p>Director</p>
                            </div>

                            <div class="icons">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====TEAM AREA END=======-->


    <!--===== CTA AREA START =======-->

    @include('partials.cta')

    <!--===== CTA AREA START =======-->
@endsection
