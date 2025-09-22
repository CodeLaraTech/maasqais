@extends('layouts.main')
@section('content')
    <!-- Breadcrumb Section -->
    <section class="section breadcrumb flex items-center h-[320px] relative">
        <div class="breadcrumb_bg absolute top-0 left-0 w-full h-full pointer-events-none">
            <img src="frontend/assets/images/breadcrumb/blog.jpg" alt="Privacy Policy" class="h-full object-cover">
        </div>
        <div class="container relative text-white">
            <ul class="breadcrumb_nav flex items-center gap-1 animate">
                <li class="flex items-center">
                    <a href="{{ url('/') }}" class="breadcrumb_link caption1 duration-300 hover:underline">Home</a>
                </li>
                <li class="flex items-center">
                    <span class="ph ph-caret-right text-xs opacity-50"></span>
                    <span class="breadcrumb_link pl-1 caption1 opacity-50">Privacy Policy</span>
                </li>
            </ul>
            <h2 class="section_tit mt-3 heading2 animate" style="--i: 2">Privacy Policy</h2>
        </div>
    </section>

    <!-- Privacy Policy Content -->
    <section class="section privacy sm:py-25 py-15">
        <div class="container sm:w-5/6 w-full mx-auto flex flex-col gap-8">
            <p class="text-variant1">
                At <strong>Maas Qais Trading Est., Jeddah – Saudi Arabia</strong>, your privacy is important to us. We are committed to protecting the personal information you share with us and ensuring transparency in how we use it.
            </p>

            <h3 class="heading3 animate">Information We Collect</h3>
            <p class="text-variant1">
                We may collect personal information such as your name, email address, phone number, and company details when you contact us, place orders, or subscribe to our updates. This information helps us provide timely and efficient services.
            </p>

            <h3 class="heading3 animate">How We Use Your Information</h3>
            <ul class="list-disc pl-5 text-variant1">
                <li>To fulfill your orders and provide products and services.</li>
                <li>To respond to inquiries and communicate important updates.</li>
                <li>To improve our website, products, and customer experience.</li>
                <li>To send promotional materials only if you have opted in.</li>
            </ul>

            <h3 class="heading3 animate">Data Sharing & Security</h3>
            <p class="text-variant1">
                We do not sell or rent your personal information to third parties. Your data is stored securely, and access is restricted to authorized personnel only. We may share information with trusted service providers strictly for operational purposes, such as order fulfillment and website hosting.
            </p>

            <h3 class="heading3 animate">Cookies & Tracking</h3>
            <p class="text-variant1">
                Our website may use cookies to enhance user experience, analyze site traffic, and personalize content. You can manage your cookie preferences through your browser settings.
            </p>

            <h3 class="heading3 animate">Your Rights</h3>
            <p class="text-variant1">
                You have the right to access, correct, or delete your personal data. You may also unsubscribe from marketing communications at any time. To exercise these rights, please contact us at <a href="mailto:info@maasqais.com" class="text-variant2 underline">info@maasqais.com</a>.
            </p>

            <h3 class="heading3 animate">Changes to this Privacy Policy</h3>
            <p class="text-variant1">
                We may update our Privacy Policy from time to time. Changes will be posted on this page with the date of the latest revision. We encourage you to review this page periodically for updates.
            </p>

            <h3 class="heading3 animate">Contact Us</h3>
            <p class="text-variant1">
                For any questions or concerns regarding this Privacy Policy or our data practices, please contact us at: <br>
                <strong>Email:</strong> <a href="mailto:info@maasqais.com" class="text-variant2 underline">info@maasqais.com</a> <br>
                <strong>Location:</strong> Jeddah, Saudi Arabia
            </p>
        </div>
    </section>
@endsection
