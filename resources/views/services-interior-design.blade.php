@extends('layouts.main')
@include('partials.pages.title-meta-tags')
@section('content')
<!-- Header Banner -->
<section class="banner-header section-padding bg-img" data-overlay-dark="5" data-background="{{url('img/slider/1.jpg')}}">
    <div class="v-middle">
        <div class="container">
            <div class="col-md-12 mt-30">
                <h6>Services</h6>
                <!-- HERE 1 -->
                <h1>INTERIOR DESIGN
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- Services Details -->
<section class="service-details mt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-60">
                        <div class="section-title"><span>INTERIOR DESIGN</span></div>
                        <p class="mb-25">Enhance your home or Office space with the top interior design company in Saudi Arabia, CRC . Our talented design tech team creates rooms that are not only aesthetically pleasing but also incredibly strong by fusing creativity, innovation, and subtleties of the local culture. CRC, the best interior design company in  jeddah, has the skills to realise your idea whether you’ve decided to remodel your house, place of business, or workplace.</p>
                        <p class="mb-25">We are your expert partner to implement your project according to your wishes and needs. We design in a realistic and cost-efficient way to make your vision come true, an extension or enlargement, or the reconstruction, conversion & refurbishment of an existing building. we provide for the on-schedule and top-quality execution of your custom project.
                        </p>
                        <p><strong>“WE AIM DESIGN TO BE THE PERFECT SETTING FOR YOUR DAILY ACTIVITY SPACE“</strong></p>

                        <div class="col-md-12 gallery-item mb-20">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="{{url('img/services/1.jpg')}}" class="img-fluid mx-auto d-block" alt=""> </div>
                                <div class="gallery-detail text-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-12">
                @include('partials.services-nav')
            </div>
        </div>
    </div>
</section>
<!-- Lets Talk -->
@include('partials.contact-section')
@endsection
