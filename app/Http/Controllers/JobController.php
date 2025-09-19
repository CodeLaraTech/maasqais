<?php

namespace App\Http\Controllers;

use App\Mail\JobApplicationSubmitted;
use App\Models\User;
use Modules\Recruitment\Models\JobApplication;
use Modules\Recruitment\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Notifications\JobApplicationNotification;

class JobController extends Controller
{
    public function index()
    {
        // Fetch all jobs from the database
        $jobs = Job::orderBy('id', 'desc')->paginate(12);

        // Pass jobs to the view
        return view('jobs', compact('jobs'));
    }

   public function showBySlug($slug)
    {
        $job = Job::where('slug', $slug)->firstOrFail();
        $allJobs = Job::orderBy('id', 'desc')->get();

        return view('job_details', compact('job', 'allJobs'));
    }


    public function apply(Request $request, $id)
    {
        $validated = $request->validate([
            'job_id'     => 'required|exists:jobs,id',
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'nullable|string|max:20',
            'subject'    => 'nullable|string|max:255',
            'message'    => 'nullable|string|max:2000',
            'resume'     => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Check if already applied
        $existing = JobApplication::where('job_id', $validated['job_id'])
            ->where('email', $validated['email'])
            ->first();

        if ($existing) {
            return back()->withErrors(['email' => 'You have already applied for this job with this email.']);
        }

        // Save application
        $application = JobApplication::create([
            'job_id'     => $validated['job_id'],
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'phone'      => $validated['phone'] ?? null,
            'subject'    => $validated['subject'] ?? null,
            'message'    => $validated['message'] ?? null,
        ]);

        // Upload resume
        if ($request->hasFile('resume')) {
            $application
                ->addMediaFromRequest('resume')
                ->usingName("{$application->first_name} {$application->last_name} Resume")
                ->toMediaCollection('resumes');
        }

        // Send notification to admin(s)
        $admins = User::whereIn('email', ['m.maseeh@hotmail.com'])->get(); // Add more emails if needed

        foreach ($admins as $admin) {
            $admin->notify(new JobApplicationNotification($application));
        }


        return back()->with('success', 'Your application has been submitted!');
    }


}
