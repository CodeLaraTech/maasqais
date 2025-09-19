<?php

namespace Modules\Recruitment\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruitment\Models\JobOffer;

class JobOfferNotification extends Notification
{
    use Queueable;

    protected $jobOffer;
    protected $event;

    public function __construct(JobOffer $jobOffer, $event = 'created')
    {
        $this->jobOffer = $jobOffer;
        $this->event = $event;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $mail = (new MailMessage)
            ->subject($this->event === 'created'
                ? optional($this->jobOffer->job)->title . ' - New Job Offer'
                : 'Job Offer Update'
            )
            ->greeting('Dear ' . $this->jobOffer->candidate_name . ',')
            ->line("We are pleased to send your job offer.")
            ->line('Position: ' . optional($this->jobOffer->job)->title)
            ->line('Employer: ' . $this->jobOffer->employer_name)
            ->line('Gross Salary: ' . $this->jobOffer->gross_salary . ' ' . $this->jobOffer->currency)
            ->line('Please find the attached offer letter.')
            ->line('Thank you for your interest!');

        // ✅ Attach offer PDF
        $media = $this->jobOffer->getFirstMedia('offers');
        if ($media && file_exists($media->getPath())) {
            $mail->attach($media->getPath(), [
                'as' => 'Job_Offer.pdf',
                'mime' => 'application/pdf',
            ]);
        }

        return $mail;
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
