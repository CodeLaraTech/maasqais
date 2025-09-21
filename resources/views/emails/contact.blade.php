<div class="bg-gray-100 min-h-screen p-6 font-sans text-gray-800">
    <!-- Container -->
    <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Header with Logo -->
        <div class="bg-blue-600 p-6 flex items-center gap-4">
            <img src="frontend/assets/images/logo_red.png" alt="Company Logo" class="w-16 h-16 object-contain">
            <h1 class="text-white text-2xl font-bold">New Contact Form Submission</h1>
        </div>

        <!-- Body -->
        <div class="p-6 space-y-4">
            <p class="text-gray-700">You have received a new message from your website contact form:</p>

            <div class="bg-gray-50 p-4 rounded-md space-y-2 border border-gray-200">
                <p><span class="font-semibold">Name:</span> {{ $details['name'] }}</p>
                <p><span class="font-semibold">Email:</span> {{ $details['email'] }}</p>
                <p><span class="font-semibold">Service Interested In:</span> {{ $details['services'] }}</p>
                <p><span class="font-semibold">Message:</span></p>
                <p class="whitespace-pre-line">{{ $details['message'] }}</p>
            </div>

            <p class="text-gray-500 text-sm">
                This message was sent from your website contact form. Please respond to the user promptly.
            </p>
        </div>

        <!-- Footer -->
        <div class="bg-gray-100 p-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Maasqais. All rights reserved.
        </div>
    </div>
</div>
