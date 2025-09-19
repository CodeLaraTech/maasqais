@extends('layouts.main')
@section('title', $page->title ?? '')
@section('meta_description', $page->meta_description ?? '')
@section('meta_keywords', $page->meta_keywords ?? '')
@section('content')
@include('components.pages.breadcrumb')
<!-- About -->
<section class="about section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="content">
                    <div class="section-subtitle">About Us</div>
                    <div class="section-title"><span>CRC.</span> FitOut</div>
                    <p>Elevate your space to new heights of sophistication with CRC Interior Design & Fitout, Jeddah’s trusted leader in premium interiors across Saudi Arabia. Our expert team transforms your vision into reality, blending luxury with functionality to create a masterpiece tailored to you.</p>
                    <ul class="list-unstyled list">
                        <li>
                            <div class="list-icon"> <span class="ti-check"></span> </div>
                            <div class="list-text">
                                <p>Full fit-out: interior, MEP, IT, custom furniture.</p>
                            </div>
                        </li>
                        <li>
                            <div class="list-icon"> <span class="ti-check"></span> </div>
                            <div class="list-text">
                                <p>13+ years of luxury interior excellence.</p>
                            </div>
                        </li>
                    </ul> <a href="{{url('services')}}" class="button-4">Services<span class="ti-arrow-top-right"></span></a>
                    <a href="{{ url('profile') }}" class="button-4 offset-lg-2">Profile<span class="ti-arrow-top-right "></span></a>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 col-md-12 mt-30">
                <div class="item"> <img src="{{url('img/about.jpg')}}" class="img-fluid" alt="">
                    <div class="bottom-fade"></div>
                    <div class="icon"> <a href="{{url('services')}}" class="vid arrow"><span class="ti-arrow-top-right"></span></a> </div>
                    <div class="title">
                            <h4>Services</h4>
                        </div>
                </div>
            </div>
            </div>
            <!-- sidebar -->
        </div>
    </div>
</section>
<!-- divider line -->
<div class="line-vr-section"></div>
<!-- About More -->
<section class="about section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-30">
                <div class="img2"> <img src="{{url('img/about2.jpg')}}" alt="">
                    <div class="text">
                        <h6>Office</h6>
                        <div class="shap-left-bottom">
                            <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#fff"></path>
                            </svg>
                        </div>
                        <div class="shap-right-bottom">
                            <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#fff"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-12">
                <div class="content">
                    <div class="section-subtitle">Services</div>
                    <h4 class="text-black">TRANSFORMING SPACES, WHERE CLIENT VISION MEETS OUR FITOUT CRAFTSMANSHIP</h4>

                    <ul class="list-unstyled list mb-30">
                        <li>
                            <div class="list-icon"> <span class="ti-check"></span> </div>
                            <div class="list-text">
                                <p>Comprehensive commercial and hospitality Fitout services.</p>
                            </div>
                        </li>
                        <li>
                            <div class="list-icon"> <span class="ti-check"></span> </div>
                            <div class="list-text">
                                <p>Supply high-quality commercial furniture for offices and hotels.
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="list-icon"> <span class="ti-check"></span> </div>
                            <div class="list-text">
                                <p>Commercial joinery project delivering bespoke products.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- divider line -->
<div class="line-vr-section"></div>

<!-- Testimonials -->
<section class="testimonials section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-20">
                <div class="section-subtitle">Testimonials</div>
                <div class="section-title">What <span>Clients</span> Say</div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="item"> <i class="fa-solid fa-quote-left"></i>
                        <div class="text">
                            <p>"I'm grateful to CRC Interior Design & Fitout, my drab office has been transformed into a colourful, modern environment that our employees really love." They flawlessly carried out our strategy, paying great care to every little detail.Without a doubt, the greatest interior design firm in Jeddah."</p>
                        </div>
                        <div class="info mt-30">
                            <!-- <div class="img-curv">
                                <div class="img"> <img src="{{url('img/team/a.jpg')}}" alt=""> </div>
                                <div class="shap-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                        <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#fff"></path>
                                    </svg>
                                </div>
                                <div class="shap-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                        <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#fff"></path>
                                    </svg>
                                </div>
                            </div> -->
                            <div class="ml-30">
                                <h6>- Ali J</h6>
                                <p>Customer</p>
                            </div>
                        </div>
                    </div>
                    <div class="item"> <i class="fa-solid fa-quote-left"></i>
                        <div class="text">
                            <p>"Considering our prior bad experiences with other interior contractors, CRC exceeded all of our expectations for the fitout of our recently built hotel in Riyadh.Their group of gifted people made sure that their elaborate and carefully thought-out ideas were executed perfectly. We are thrilled to have chosen CRC as our interior design partner in Saudi Arabia."
                                </p>
                        </div>
                        <div class="info mt-30">
                            <!-- <div class="img-curv">
                                <div class="img"> <img src="{{url('img/team/b.jpg')}}" alt=""> </div>
                                <div class="shap-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                        <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#fff"></path>
                                    </svg>
                                </div>
                                <div class="shap-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                        <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#fff"></path>
                                    </svg>
                                </div>
                            </div> -->
                            <div class="ml-30">
                                <h6>- Sana R</h6>
                                <p>Customer</p>
                            </div>
                        </div>
                    </div>
                    <div class="item"> <i class="fa-solid fa-quote-left"></i>
                        <div class="text">
                            <p>"Finding the ideal contract for my interior design was difficult. Their modern pieces are the ideal match for the current look we were going for. They also manufactured custom furniture of the greatest calibre. I wholeheartedly recommend CRC as the best office supply supplier in Saudi Arabia."</p>
                        </div>
                       <!--  <div class="info mt-30">
                            <div class="img-curv">
                                <div class="img"> <img src="{{url('img/team/c.jpg')}}" alt=""> </div>
                                <div class="shap-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                        <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#fff"></path>
                                    </svg>
                                </div>
                                <div class="shap-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                        <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#fff"></path>
                                    </svg>
                                </div>
                            </div> -->
                            <div class="ml-30">
                                <h6>- Faisal M.</h6>
                                <p>Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Lets Talk -->
@include('partials.contact-section')
@endsection
