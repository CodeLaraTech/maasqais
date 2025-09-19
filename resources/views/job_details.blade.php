@extends('layouts.main')
@section('content')
    <!-- Header Banner -->
    <section class="banner-header section-padding bg-img" data-overlay-dark="5"
        data-background="{{url('img/slider/1.jpg')}}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mt-30">
                        <h6>{{ $job->title }}</h6>
                        <h1>CRC. <span>career</span></h1>
                    </div>
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
                        <div class="col-lg-12 col-md-12">
                            <div class="content">
                                <div class="section-subtitle"><span>CRC.</span> career</div>
                                <div class="section-title">{{ $job->title }}</div>
                                <p>{!! $job->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="about mb-30">
                        <!-- Flash Messages -->
                        <div class="details-contact-form" id="apply">
                            <div class="heading1">
                                <h3>Apply for this Position</h3>
                                <p>Please fill out the form below to apply.</p>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('job.apply') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" name="first_name" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" name="last_name" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="email" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" name="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <input type="text" name="subject" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <textarea name="message" rows="4" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <label>Upload Resume (PDF/DOC)</label>
                                            <input type="file" name="resume" accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="button">
                                            <button class="theme-btn1" type="submit">Submit Now <i
                                                    class="fa-solid fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-lg-4 col-md-12">
                    <!-- All Services Section -->

                    <div class="sidebar-page">
                        <div class="title">
                            <h4>All Jobs</h4>
                        </div>
                        <div class="item">
                            @foreach ($allJobs as $item)
                                <div class="features {{ request()->route('id') == $item->id ? 'active' : '' }}">
                                    <a href="{{ route('job.show', $item->id) }}">
                                        <span>{{ $item->title }}</span>
                                    </a>
                                    <i class="ti-arrow-right"></i>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Project Details Section -->
                    <div class="sidebar-page mt-30">
                        <div class="container">
                            <div class="row">
                                <h3 class="text-black gallery-heading mt-4">Information</h3>
                                <div class="item">

                                    <div class="features d-flex align-items-center justify-content-between">
                                        <span><i class="ti-user"></i> Client</span>
                                        <p>Private</p>
                                    </div>
                                    <div class="features d-flex align-items-center justify-content-between">
                                        <span><i class="ti-calendar"></i> Project Year</span>
                                        <p>2020-2025</p>
                                    </div>
                                    <div class="features d-flex align-items-center justify-content-between">
                                        <span><i class="ti-world"></i> Company</span>
                                        <p>CRC</p>
                                    </div>
                                    <div class="features d-flex align-items-center justify-content-between">
                                        <span><i class="ti-folder"></i> Project Name</span>
                                        <p>Modern House</p>
                                    </div>
                                    <div class="features d-flex align-items-center justify-content-between">
                                        <span><i class="ti-location-pin"></i> Location</span>
                                        <p>Jeddah, Saudi Arabia</p>
                                    </div>
                                    <div class="features d-flex align-items-center justify-content-between">
                                        <span><i class=" ti-link"></i> Follow Us</span>
                                        <div class="wrap justify-content-between align-items-center centered mr-5">
                                            <div class="social d-flex gap-3">

                                                <a href="https://www.linkedin.com/company/crc-interiors-and-fitout/"
                                                    target="_blank" class="icon">
                                                    <i class="fa-brands fa-linkedin"></i>
                                                </a>
                                                <a href="https://wa.me/966542633443" target="_blank" class="icon">
                                                    <i class="fa-brands fa-whatsapp"></i>
                                                </a>
                                                <a href="#" target="_blank" class="icon">
                                                    <i class="fa-brands fa-twitter"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                                            href="{{url('contact-us')}}" class="button-4 mt-30">Contact Us <span
                                                class="ti-arrow-top-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-page mt-30 mb-30">
                        <div class="container">
                            <div class="row">
                                <h3 class="text-black gallery-heading mt-4">FAQ</h3>
                                <div class="item">
                                    <ul class="list-unstyled list mb-30">
                                        <li>
                                            <div class="list-icon"> <span class="ti-check"></span> </div>
                                            <div class="list-text">
                                                <p>13+ years of luxury interior excellence.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="list-icon"> <span class="ti-check"></span> </div>
                                            <div class="list-text">
                                                <p>Full fit-out: interior, MEP, IT, custom furniture.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="list-icon"> <span class="ti-check"></span> </div>
                                            <div class="list-text">
                                                <p>Supply high-quality commercial furniture for offices and hotels.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-page mt-30 mb-30">
                        <div class="container">
                            <div class="row">
                                <h3 class="text-black gallery-heading mt-4">Project Gallery</h3>
                                <div class="item">

                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div>
                                            <div class="img">
                                                <img src="{{url('img/services/1.jpg')}}" alt="Image 1"
                                                    class="img-fluid gallery-image" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div>
                                                <div class="img">
                                                    <img src="{{url('img/services/f1.jpg')}}" alt="Image 1"
                                                        class="img-fluid gallery-image" data-bs-toggle="modal"
                                                        data-bs-target="#imageModal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div>
                                                <div class="img">
                                                    <img src="{{url('img/services/jn1.jpg')}}" alt="Image 1"
                                                        class="img-fluid gallery-image" data-bs-toggle="modal"
                                                        data-bs-target="#imageModal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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