@extends('layouts.main')
@include('partials.pages.title-meta-tags')
@section('content')
    <div class="common-hero"
        style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d'); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 100px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <div class="main-heading" style="color: white;">
                        <h1>Contact Us</h1>
                        <div class="pages-intro" style="color: white;">
                            <a href="index.html" style="color: white;">Home</a>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">Contact</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====HERO AREA END=======-->

    <!--=====CONTACT AREA START=======-->
    <div class="contact-page sp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="heading1">
                        <span class="span">Contact Information</span>
                        <h2>Connect With Our Leadership</h2>
                    </div>
                    <div class="contact-page-box">
                        <div class="row">
                            <!-- Phone Section -->
                            <div class="col-lg-2">
                                <div class="contact-box">
                                    <div class="icon">
                                        <i class="fas fa-phone-alt fa-2x"></i>
                                    </div>
                                    <div class="heading1">
                                        <p>Give Us a Call</p>
                                        <h4><a href="tel:123-456-7890">123-456-7890</a></h4>
                                    </div>
                                </div>
                            </div>

                            <!-- CEO Section -->
                            <div class="col-lg-5">
                                <div class="contact-box contact-box2">
                                    <div class="icon">
                                        <i class="fas fa-user-tie fa-2x"></i>
                                    </div>
                                    <div class="heading1">
                                        <p>Ammar Ahmed Khan</p>
                                        <h4><i class="fas fa-envelope"></i> <a
                                                href="mailto:ammarahmed.khan@1globalsolutions.com">ammarahmed.khan@1globalsolutions.com</a>
                                        </h4>
                                        <h5><i class="fas fa-briefcase"></i> CEO</h5>
                                    </div>
                                </div>
                            </div>

                            <!-- Director Section -->
                            <div class="col-lg-5">
                                <div class="contact-box contact-box2">
                                    <div class="icon">
                                        <i class="fas fa-user-tie fa-2x"></i>
                                    </div>
                                    <div class="heading1">
                                        <p>Mubeen Mohammed</p>
                                        <h4><i class="fas fa-envelope"></i> <a
                                                href="mailto:mubeen.mohammed@1globalsolutions.com">mubeen.mohammed@1globalsolutions.com</a>
                                        </h4>
                                        <h5><i class="fas fa-briefcase"></i> Director</h5>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- End row -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-page sp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="heading1">
                        <span class="span">Contact Us</span>
                        <h2>Get in Touch Let's Start the Conversation</h2>
                        <div class="space16"></div>
                        <p>We're here to help you find the right staffing solutions for your needs. Whether you're a company
                            looking to hire top talent or a candidate seeking your next career opportunity,</p>
                    </div>

                    <div class="contact-page-box ">
                        <div class="row">
                            <!-- Phone Section -->
                            <div class="col-lg-6">
                                <div class="contact-box">
                                    <div class="icon">
                                        <i class="fas fa-phone-alt fa-2x"></i>
                                    </div>
                                    <div class="heading1">
                                        <p>Give Us a Call</p>
                                        <h4><a href="tel:123-456-7890">123-456-7890</a></h4>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Section -->
                            <div class="col-lg-6">
                                <div class="contact-box contact-box2">
                                    <div class="icon">
                                        <i class="fas fa-envelope fa-2x"></i>
                                    </div>
                                    <div class="heading1">
                                        <p>Send Me Mail</p>
                                        <h4><a href="mailto:info@1globalsolutions.com">info@1globalsolutions.com</a></h4>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>


                <div class="col-lg-6">
                    <div class="contact1-form">
                        <div class="heading1">
                            <h3>Send us a Message</h3>
                            <div class="space16"></div>
                            <p>Feel free to reach out to us with any questions, inquiries, or staffing requirements you may
                                have. Our experienced</p>
                        </div>
                        <div class="space10"></div>

                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <input type="text" placeholder="First Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input">
                                        <input type="text" placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input">
                                        <input type="email" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input">
                                        <input type="number" placeholder="Phone">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="single-input">
                                        <input type="text" placeholder="Subject">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="single-input">
                                        <textarea rows="4" placeholder="Message"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="button">
                                        <button class="theme-btn1">Submit Now <span><i
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


    <!--=====CONTACT AREA END=======-->

    <div class="contact-map-page">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2996.4895796404458!2d-72.86862152446955!3d41.3199663001753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e7d73cf6964995%3A0xc978753d151780ee!2s135%20Old%20Foxon%20Rd%20%232%2C%20East%20Haven%2C%20CT%2006513%2C%20USA!5e0!3m2!1sen!2sin!4v1748959930120!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <!--===== CTA AREA START =======-->

    <div class="cta">
        <div class="container">
            <div class="row cta-border align-items-center">
                <div class="col-lg-6">
                    <div class="heading1-w">
                        <h2>Ready to Power up your Savings and Reliability?</h2>
                        <div class="space16"></div>
                        <p>Feel free to customize this paragraph to better reflect the <br> specific services offered by
                            your IT solution & the unique </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="subscribe-area">
                        <form action="#">
                            <input type="email" placeholder="Email Address">
                            <div class="button">
                                <button type="submit" class="theme-btn1">Subscribe Now <span><i
                                            class="fa-solid fa-arrow-right"></i></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===== CTA AREA START =======-->
@endsection
