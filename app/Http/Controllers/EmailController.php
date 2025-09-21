<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendContactForm(Request $request)
{
    try {
        // Validate form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'services' => 'required|string',
            'message' => 'required|string',
        ]);

        // Prepare email data
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'services' => $request->services,
            'message' => $request->message,
        ];

        // Send email
        Mail::to('mo.usama000@gmail.com')->send(new \App\Mail\ContactFormMail($details));

        return back()->with('success', 'Your message has been sent successfully!');
    } catch (\Exception $e) {
        \Log::error('Contact Form Error: ' . $e->getMessage());
        return back()->with('error', 'An error occurred while sending your message. Please try again.');
    }
}

}
