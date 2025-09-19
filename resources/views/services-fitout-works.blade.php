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
                <h1>FITOUT
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
                     <div class="section-title"><span>OFFICE FITOUT</span></div>
                        <p class="mb-25">Our office interior design team are passionate about working with clients to design, build and create amazing new workplaces swiftly and within budget– It’s what we love doing!
                        </p>
                        <p class="mb-25">With over 12 years of experience in the industry, we have established trusted relationships with the very best suppliers, allows us to guarantee our clients a seamless, stress-free project in full knowledge that they will be receiving the very best-in-class service.
                        </p>
                        <p class="mb-25">What makes us different is our fast track in work and project management which make your choice working with us an accurate “hit target”.
                        </p>

                        <div class="col-md-12 gallery-item mb-20">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="{{url('img/services/f1.jpg')}}" class="img-fluid mx-auto d-block" alt=""> </div>
                                <div class="gallery-detail text-center"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Text Image  -->

                <section class="mt-10">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-12">
                                <div class="content">
                                    <div class="section-title"><span>HOTEL FIT OUT</span></div>
                                    <p>Whether your project is a refurbishment or new creation of a hotel, spa, restaurant or café, we provide the highest quality fit-out or refurbishment work to define your scheme using our extensive knowledge of contemporary and classic designs and products, we will pull on our expertise and will assist you to achieve economically flexible and sustainable outcomes.</p>
                                    <p>our services offer a range of hospitality fit out options for your specific design and develop a strong working partnership with all of our clients to ensure that the process becomes a well-organized team effort with all parties sharing a clear objective.</p>
                                    <p>Our renovation experienced teams make every attempt to work in harmony with the client’s own personnel to create minimal disruption and smooth running of the hotel whilst we are on site. </p>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 mt-30">
                                <div class="item"> <img src="{{url('img/services/f2.jpg')}}" class="img-fluid" alt="">
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-12 mt-30">
                                <div class="content">
                                    <div class="section-title"><span>HEALTHCARE
                                        FITOUT</span></div>
                                    <p>We work with healthcare services providers, from medical laboratories to clinics through to hospitals, knowing that working in this sector presents a number of challenges from the design to execution and furnishing. Our success is based on a commitment to excellence, with a clear understanding of what is required sharing our design and medical fit-out knowledge and expertise with our clients, ensuring they achieve the best of results.
                                    </p>

                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 mt-30">
                                <div class="item"> <img src="{{url('img/services/f3.jpg')}}" class="img-fluid" alt="">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 mt-30">
                                <div class="content">
                                    <div class="section-title"><span>RESTAURANT
                                        FITOUT</span></div>
                                    <p>We plan and run the entire restaurant refurbishment, manage your restaurant fit out costs and ensure the project is delivered on time. Together, we maximize the potential of your restaurant and bar fit out by analyzing your business needs from design to build, handling the finer details.
                                    </p>

                                </div>
                            </div>
                            <div class="col-lg-7 col-md-12 mt-30">
                                <div class="content">
                                    <div class="section-title"><span>RETAIL FITOUT</span></div>
                                    <p>Getting retail space “right” is a science and an art.  Visual impact, the quality of finishing, effective layout, lighting – they all make up a customer's experience and influences their buying behavior and future endorsement of your store. Our team will help you stand out from the crowd and deliver a finish that accurately reflects your brand with a space planning to make the most of the available space without hindering efficiency or functionality. <br> As a one-stop-shop fit out solutions, we provide an end-to-end services that include in house joinery production.
                                    </p>

                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 mt-30">
                                <div class="item"> <img src="{{url('img/services/f5.jpg')}}" class="img-fluid" alt="">
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-12 mt-30">
                                <div class="content">
                                    <div class="section-title"><span>RENOVATION
                                    </span></div>
                                    <h6 class="text-black">If you renovating your office or remodelling your hotel, CRC Fitout will be your best choice!
                                    </h6>
                                    <p>Interior design and your mood board would be an integral part of every renovation project, we provide the top organized renovation project that add value to your vision. We are proud of our teams, from design to fitout which represents innovative services tailored to your specific requirements. This is why we begins every project with inspiration channelled into portrait of art to be carefully handmade.
                                    </p>

                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 mt-30">
                                <div class="item"> <img src="{{url('img/services/f6.jpg')}}" class="img-fluid" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
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
<!-- Footer -->
@endsection
