@extends('layouts.main')
@include('partials.pages.title-meta-tags')
@section('content')
<!-- Header Banner -->
<section class="banner-header section-padding bg-img bg-position-top" data-overlay-dark="3" data-background="{{url('img/slider/1.jpg')}}">
    <div class="v-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mt-30">
                    <h6>Profile</h6>
                    <h1>Our Portfolio</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Project -->

<div class="pdf-download">
    <a href="pdfs/project.pdf" download>
        <button>Download PDF</button>
    </a>
</div>
<div class="container mb-30">
    <div class="pdf-container">
        <iframe src="pdfs/project.pdf" frameborder="0"></iframe>
    </div>

</div>
<!-- Lets Talk -->
@include('partials.contact-section')
<!-- Footer -->
@endsection
