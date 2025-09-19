<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruitment\Models\JobApplication;

class JobApplicationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $application;

    /**
     * Create a new notification instance.
     */
    public function __construct(JobApplication $application)
    {
        $this->application = $application;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database']; // Also logs in notifications table
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Job Application Received')
            ->greeting('Dear Admin,')
            ->line("A new job application has been submitted for the position: " . optional($this->application->job)->title)
            ->line("Candidate Name: {$this->application->first_name} {$this->application->last_name}")
            ->line("Email: {$this->application->email}")
            ->line("Phone: " . ($this->application->phone ?? 'N/A'))
            ->action('View Application', route('recruitment.job-applications.show', $this->application->id))
            ->line('Thank you.');
    }

    /**
     * Get the array representation of the notification (for database).
     */
    public function toArray(object $notifiable): array
    {
        return [
            'application_id'   => $this->application->id,
            'job_title'        => optional($this->application->job)->title,
            'candidate_name'   => "{$this->application->first_name} {$this->application->last_name}",
            'email'            => $this->application->email,
        ];
    }
}
