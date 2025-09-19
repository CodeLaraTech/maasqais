<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Recruitment\Models\JobApplication;

class JobApplicationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct(JobApplication $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        $mail = $this->subject('New Job Application Submitted')
            ->view('emails.job_application');

        // Attach resume if available
        if ($this->application->resume && file_exists(storage_path('app/public/' . $this->application->resume))) {
            $mail->attach(storage_path('app/public/' . $this->application->resume));
        }

        return $mail;
    }
}
