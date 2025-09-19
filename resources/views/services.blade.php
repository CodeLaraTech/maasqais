@extends('layouts.main')
@include('partials.pages.title-meta-tags')
@section('content')
    <div class="common-hero"
        style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d'); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 100px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <div class="main-heading" style="color: white;">
                        <h1>Services</h1>
                        <div class="pages-intro" style="color: white;">
                            <a href="index.html" style="color: white;">Home</a>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">Services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====HERO AREA END=======-->

    <!--=====SERVICE DETAILS START=======-->

    <div class="service1 service-page-service sp">
        <div class="container">
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
                                <h4><a href="{{url('/services/ar-billing-services')}}">AR Billing Services</a></h4>
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
                                <h4><a href="{{url('/services/partnering-with-ar-billing-companies')}}">Partnering with AR Billing Companies</a></h4>
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
                                <h4><a href="{{url('/services/training-and-placement')}}">Training and Placement</a></h4>
                                <div class="space16"></div>
                                <p>
                                    Offering customized training programs and placement services to prepare candidates
                                    for success in various staffing roles.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space60"></div>
                <div class="row">
                    <div class="col-12 m-auto">
                        <div class="theme-pagination text-center">
                            <ul>
                                <li><a href="#"><i class="fa-solid fa-angle-left"></i></a></li>
                                <li><a class="active" href="#">01</a></li>
                                <li><a href="#">02</a></li>
                                <li>...</li>
                                <li><a href="#">12</a></li>
                                <li><a href="#"><i class="fa-solid fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space60"></div>


        <!--=====SERVICE AREA END=======-->

        <!--===== CTA AREA START =======-->

        @include('partials.cta')
@endsection