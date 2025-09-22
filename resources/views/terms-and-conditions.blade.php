@extends('layouts.main')
@section('content')
    <!-- Breadcrumb Section -->
    <section class="section breadcrumb flex items-center h-[320px] relative">
        <div class="breadcrumb_bg absolute top-0 left-0 w-full h-full pointer-events-none">
            <img src="frontend/assets/images/breadcrumb/blog.jpg" alt="Terms & Conditions" class="h-full object-cover">
        </div>
        <div class="container relative text-white">
            <ul class="breadcrumb_nav flex items-center gap-1 animate">
                <li class="flex items-center">
                    <a href="{{ url('/') }}" class="breadcrumb_link caption1 duration-300 hover:underline">Home</a>
                </li>
                <li class="flex items-center">
                    <span class="ph ph-caret-right text-xs opacity-50"></span>
                    <span class="breadcrumb_link pl-1 caption1 opacity-50">Terms & Conditions</span>
                </li>
            </ul>
            <h2 class="section_tit mt-3 heading2 animate" style="--i: 2">Terms & Conditions</h2>
        </div>
    </section>

    <!-- Terms & Conditions Content -->
    <section class="section terms sm:py-25 py-15">
        <div class="container sm:w-5/6 w-full mx-auto flex flex-col gap-10">

            <!-- Introduction -->
            <div class="animate">
                <p class="text-variant1">
                    Welcome to <strong>Maas Qais Trading Est., Jeddah – Saudi Arabia</strong>. By using our website and services, you agree to comply with the following terms and conditions. Please read carefully.
                </p>
            </div>

            <!-- Collapsible Sections -->
            <ul class="faqs_list border border-outline">
                
                <!-- Use of Services -->
                <li class="faqs_item py-5 px-6 border-b border-outline animate">
                    <button class="faqs_btn heading flex items-center justify-between gap-4 w-full">
                        <strong class="title heading5 text-left">Use of Services</strong>
                        <span class="icon_arrow">
                            <span class="icon_arrow_plus ph ph-plus text-2xl duration-400"></span>
                            <span class="icon_arrow_minus ph ph-minus text-2xl duration-400 hidden"></span>
                        </span>
                    </button>
                    <div class="answer mt-4">
                        <p class="text-variant1">
                            Our products and services are for lawful industrial and business purposes only. Users must provide accurate information when placing orders or contacting us and must not misuse our website.
                        </p>
                    </div>
                </li>

                <!-- Orders & Payments -->
                <li class="faqs_item py-5 px-6 border-b border-outline animate">
                    <button class="faqs_btn heading flex items-center justify-between gap-4 w-full">
                        <strong class="title heading5 text-left">Orders & Payments</strong>
                        <span class="icon_arrow">
                            <span class="icon_arrow_plus ph ph-plus text-2xl duration-400"></span>
                            <span class="icon_arrow_minus ph ph-minus text-2xl duration-400 hidden"></span>
                        </span>
                    </button>
                    <div class="answer mt-4">
                        <ul class="list-disc pl-5 text-variant1">
                            <li>Orders are subject to acceptance by Maas Qais Trading Est.</li>
                            <li>Payments must follow methods specified on the website or agreed with our sales team.</li>
                            <li>We reserve the right to cancel or refuse orders at our discretion.</li>
                        </ul>
                    </div>
                </li>

                <!-- Delivery & Risk -->
                <li class="faqs_item py-5 px-6 border-b border-outline animate">
                    <button class="faqs_btn heading flex items-center justify-between gap-4 w-full">
                        <strong class="title heading5 text-left">Delivery & Risk</strong>
                        <span class="icon_arrow">
                            <span class="icon_arrow_plus ph ph-plus text-2xl duration-400"></span>
                            <span class="icon_arrow_minus ph ph-minus text-2xl duration-400 hidden"></span>
                        </span>
                    </button>
                    <div class="answer mt-4">
                        <p class="text-variant1">
                            Estimated delivery times may vary. Risk of loss or damage passes to the buyer upon delivery to the shipping carrier.
                        </p>
                    </div>
                </li>

                <!-- Returns & Cancellations -->
                <li class="faqs_item py-5 px-6 border-b border-outline animate">
                    <button class="faqs_btn heading flex items-center justify-between gap-4 w-full">
                        <strong class="title heading5 text-left">Returns & Cancellations</strong>
                        <span class="icon_arrow">
                            <span class="icon_arrow_plus ph ph-plus text-2xl duration-400"></span>
                            <span class="icon_arrow_minus ph ph-minus text-2xl duration-400 hidden"></span>
                        </span>
                    </button>
                    <div class="answer mt-4">
                        <p class="text-variant1">
                            Returns and cancellations follow our return policy. Items must be unused and in original condition. Contact customer service for assistance.
                        </p>
                    </div>
                </li>

                <!-- Intellectual Property -->
                <li class="faqs_item py-5 px-6 border-b border-outline animate">
                    <button class="faqs_btn heading flex items-center justify-between gap-4 w-full">
                        <strong class="title heading5 text-left">Intellectual Property</strong>
                        <span class="icon_arrow">
                            <span class="icon_arrow_plus ph ph-plus text-2xl duration-400"></span>
                            <span class="icon_arrow_minus ph ph-minus text-2xl duration-400 hidden"></span>
                        </span>
                    </button>
                    <div class="answer mt-4">
                        <p class="text-variant1">
                            All content on this website, including text, images, and logos, is the property of Maas Qais Trading Est. Unauthorized use is prohibited.
                        </p>
                    </div>
                </li>

                <!-- Limitation of Liability -->
                <li class="faqs_item py-5 px-6 border-b border-outline animate">
                    <button class="faqs_btn heading flex items-center justify-between gap-4 w-full">
                        <strong class="title heading5 text-left">Limitation of Liability</strong>
                        <span class="icon_arrow">
                            <span class="icon_arrow_plus ph ph-plus text-2xl duration-400"></span>
                            <span class="icon_arrow_minus ph ph-minus text-2xl duration-400 hidden"></span>
                        </span>
                    </button>
                    <div class="answer mt-4">
                        <p class="text-variant1">
                            Maas Qais Trading Est. is not liable for any direct, indirect, or consequential damages from the use of our website or products, except as required by law.
                        </p>
                    </div>
                </li>

                <!-- Changes to Terms -->
                <li class="faqs_item py-5 px-6 border-b border-outline animate">
                    <button class="faqs_btn heading flex items-center justify-between gap-4 w-full">
                        <strong class="title heading5 text-left">Changes to Terms</strong>
                        <span class="icon_arrow">
                            <span class="icon_arrow_plus ph ph-plus text-2xl duration-400"></span>
                            <span class="icon_arrow_minus ph ph-minus text-2xl duration-400 hidden"></span>
                        </span>
                    </button>
                    <div class="answer mt-4">
                        <p class="text-variant1">
                            We may update these terms occasionally. The latest version will always be available on this page. Continued use constitutes acceptance of changes.
                        </p>
                    </div>
                </li>

                <!-- Contact -->
                <li class="faqs_item py-5 px-6 border-b border-outline animate">
                    <button class="faqs_btn heading flex items-center justify-between gap-4 w-full">
                        <strong class="title heading5 text-left">Contact Us</strong>
                        <span class="icon_arrow">
                            <span class="icon_arrow_plus ph ph-plus text-2xl duration-400"></span>
                            <span class="icon_arrow_minus ph ph-minus text-2xl duration-400 hidden"></span>
                        </span>
                    </button>
                    <div class="answer mt-4">
                        <p class="text-variant1">
                            Questions regarding these terms can be sent to: <br>
                            <strong>Email:</strong> <a href="mailto:info@maasqais.com" class="text-variant2 underline">info@maasqais.com</a> <br>
                            <strong>Location:</strong> Jeddah, Saudi Arabia
                        </p>
                    </div>
                </li>

            </ul>

        </div>
    </section>
@endsection
