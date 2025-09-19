<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendAttachmentMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    public function uploadCv(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'subject' => 'required|string',
                'phone' => 'required|string',
                'jtitle' => 'required|string',
                'cv' => 'required|mimes:pdf,doc,docx|max:5120', // Max 5MB
                'consent' => 'accepted', // Ensure consent checkbox is ticked
            ], [
                'consent.accepted' => 'You must agree to the storage and handling of your data by this website.',
            ]
        );

            // Prepare email details
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'phone' => $request->phone,
                'jtitle' => $request->jtitle,
                'file' => $request->file('cv')->getRealPath(),
                'filename' => $request->file('cv')->getClientOriginalName(),
                'mime' => $request->file('cv')->getMimeType(),
            ];

            // Send email with attachment
            Mail::to('mo.usama000@gmail.com')->send(new SendAttachmentMail($details));

            // Return success response
            return back()->with('success', 'Your CV has been submitted successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error sending CV email: ' . $e->getMessage());

            // Return error message to the user
            return back()->with('error', 'An error occurred while submitting your CV. Please try again.');
        }
    }
}
