<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;

use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
   public function sendContact(Request $request)
{
    $validated = $request->validate([
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'number' => 'required|string',
        'email' => 'required|email',
        'date' => 'required|string',
        'services' => 'required|string',
        'message' => 'required|string',
    ]);

    // Prepare email data array
    $data = [
        'name'     => $validated['firstName'] . ' ' . $validated['lastName'],
        'email'    => $validated['email'],
        'phone'    => $validated['number'],
        'date'     => $validated['date'],
        'services' => $validated['services'],
        'message'  => $validated['message'],
    ];

    // ✅ Send the email
    Mail::send('emails.contact', $data, function ($m) use ($data) {
        $m->to(env('MAIL_TO_ADDRESS', 'mo.usama000@gmail.com'))
          ->subject('Service Inquiry: ' . $data['services'])
          ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME', 'Your Website'));
    });

    return back()->with('message', 'Your message has been sent successfully!');
}
}
