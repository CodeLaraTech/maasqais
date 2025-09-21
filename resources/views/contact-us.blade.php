@extends('layouts.main')
@include('partials.pages.title-meta-tags')
@section('content')
    <section class="section breadcrumb flex items-center h-[320px] relative">
        <div class="breadcrumb_bg absolute top-0 left-0 w-full h-full pointer-events-none">
            <img src="frontend/assets/images/breadcrumb/blog.jpg" alt="Contact Us" class="h-full object-cover">
        </div>
        <div class="container relative text-white">
            <ul class="breadcrumb_nav flex items-center gap-1 animate">
                <li class="flex items-center">
                    <a href="index.html" class="breadcrumb_link caption1 duration-300 hover:underline">Home</a>
                </li>
                <li class="flex items-center">
                    <span class="ph ph-caret-right text-xs opacity-50"></span>
                    <a href="#!" class="breadcrumb_link pl-1 caption1 opacity-50">Contact Us</a>
                </li>
            </ul>
            <h2 class="section_tit mt-3 heading2 animate" style="--i: 2">Get in Touch with Us</h2>
            <p class="section_desc mt-2 body2 animate" style="--i: 3">
                Have questions or need assistance? Our team is ready to help you. Fill out the form below or reach us
                directly via email or phone.
            </p>
        </div>
    </section>


    <!-- FORM CONTACT -->
    <section class="section form_contact sm:py-25 py-15">
        <div class="container flex items-center max-xl:flex-col gap-[9.5rem] gap-y-14">
            <div class="form_contact_content w-full">
                <span class="section_tag tag animate">Contact Us</span>
                <h3 class="section_tit mt-4 heading3 animate">Get in Touch with Us</h3>
                <p class="section_desc lg:mt-5 mt-3 body2 text-variant1 animate">Reach out today for expert guidance,
                    service inquiries, or personalized solutions. We're here to support your project every step of the way!
                </p>
                <ul class="list_feature flex flex-col gap-3 mt-7 pt-7 border-t border-outline">
                    <li class="flex items-center gap-3 animate">
                        <span class="ph ph-map-pin text-2xl"></span>
                        <span>Jeddah, Saudi Arabic</span>
                    </li>
                    <li class="flex items-center gap-3 animate">
                        <span class="ph ph-envelope text-2xl"></span>
                        <span>info@maasqais.com</span>
                    </li>
                    <li class="flex items-center gap-3 animate">
                        <span class="ph ph-phone-call text-2xl"></span>
                        <span>+966 53 231 3346</span>
                    </li>
                </ul>
                <div class="btn_area animate">
                    <a href="https://maps.app.goo.gl/Z8zKdiKbpcEdV6MV8"
                        class="inline-flex gap-1 mt-7 duration-300 hover:text-orange" target="_blank">
                        <strong class="txt-button underline underline-offset-4">Google map</strong>
                        <span class="ph-bold ph-arrow-right text-xl"></span>
                    </a>
                </div>
            </div>
            <div class="form_contact_form flex-shrink-0 relative xl:w-1/2 w-full sm:p-10 p-7 bg-surface animate animate_left"
                style="--i: 2">
                <h4 class="heading4">Get a Free Consultation</h4>
                <p class="mt-3 text-variant1">Use the form below to get in touch with the sales team</p>
                @if (session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form grid sm:grid-cols-2 grid-cols-1 gap-5 w-full mt-6" method="POST"
                    action="{{ route('contact.send') }}">
                    @csrf

                    <div class="form_group w-full">
                        <input type="text" name="name" class="form_input w-full py-3 px-4 border border-outline bg-white"
                            placeholder="Your Name (public) *" required>
                    </div>
                    <div class="form_group w-full">
                        <input type="email" name="email" class="form_input w-full py-3 px-4 border border-outline bg-white"
                            placeholder="Your email (private) *" required>
                    </div>
                    <div class="form_group form_select col-span-full w-full">
                        <select name="services" class="w-full py-3 px-4 border border-outline bg-white" required>
                            <option selected disabled value>Choose Services</option>
                            <option value="HVAC Maintenance">HVAC Maintenance</option>
                            <option value="AC Installation">AC Installation</option>
                            <option value="Heating Repair">Heating Repair</option>
                            <option value="Emergency Repair">Emergency Repair</option>
                        </select>
                        <span class="ph ph-caret-down arrow_down text-xl"></span>
                    </div>
                    <div class="form_group sm:col-span-2 w-full">
                        <textarea name="message" class="form_input w-full py-3 px-4 border border-outline bg-white" rows="4"
                            placeholder="Write your comment here *" required></textarea>
                    </div>
                    <div class="form_group mt-2 w-full">
                        <button type="submit" class="btn">Make An Appointment</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- MAP -->
    <section class="section map h-[520px]">
        <h3 class="blind">Map</h3>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d475325.03137566603!2d38.881491443934955!3d21.44980016391344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59%3A0xe059579737b118db!2sJeddah%20Saudi%20Arabia!5e0!3m2!1sen!2sin!4v1758349470198!5m2!1sen!2sin"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection