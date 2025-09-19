@extends('layouts.main')
@include('partials.pages.title-meta-tags')
@section('content')
<!-- Header Banner -->
<section class="banner-header section-padding bg-img" data-overlay-dark="5"
    data-background="{{url('img/slider/1.jpg')}}">
    <div class="v-middle">
        <div class="container">
            <div class="col-md-12 mt-30">
                <h6>Services</h6>
                <!-- HERE 1 -->
                <h1>JOINERY
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
                        <div class="section-title"><span>BESPOKE FURNITURE</span></div>

                        </h4>
                        <p>CRC Company is the best option in Saudi Arabia for wall panelling solutions when it comes to remodelling your interior spaces. Our magnificent wood panelling for walls transforms any place from ordinary to outstanding by adding a touch of warmth and refinement.</p>
                        <p class="mb-25">We reserve great expertise and meticulous attention to detail which creates all
                            our custom-made furniture, in order to satisfy highly demanding clients. You may completely
                            personalize your ideal selection of luxury furniture not just in terms of finishes, fabrics,
                            carved details, handmade decoration paintings, and dimensions but in exclusive design too.
                        </p>
                        <div class="col-md-12 gallery-item mb-20">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="{{url('img/services/jn1.jpg')}}"
                                        class="img-fluid mx-auto d-block" alt=""> </div>
                                <div class="gallery-detail text-center"></div>
                            </div>
                        </div>
                        <div class="section-title"><span>WOODEN CLADDING</span></div>

                        <p class="mb-25">Under this service, we supply and install doors, wall paneling, skirting,
                            kitchen cabinets, timber ceiling, etc. Fire-retardant materials and coatings are used to
                            guarantee client safety while complimenting aesthetic pleasure. We constantly enhance our
                            craftsmen's skills and ensure that this always translates into absolute quality control.
                        </p>
                        <p class="mb-25">With our workshop facility in Jeddah and our skilled craftsmen, are highly
                            qualified in producing wooden fittings both through custom-made handmade methods that are
                            passed down through generations and through state-of-the-art machinery. This combination of
                            skilled human resource and technology allows us to deliver all carpentry and joinery
                            projects with the greatest degree of efficiency and satisfaction.
                        </p>
                        <div class="col-md-12 gallery-item mb-20">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="{{url('img/services/jn2.png')}}"
                                        class="img-fluid mx-auto d-block" alt=""> </div>
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
