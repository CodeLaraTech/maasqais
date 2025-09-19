<?php

namespace Modules\Recruitment\Livewire\JobApplications;

use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Modules\Recruitment\Models\JobApplication;
use Modules\Recruitment\Models\JobOffer;
use Modules\Recruitment\Notifications\JobOfferNotification;

class Show extends Component
{   use WithFileUploads;
    public $application;
    public $offer_pdf;
    public $showModal = false;

    public $jobOffer = [];
    public function mount($id)
    {
        $this->application = JobApplication::with(['job', 'job.customer', 'media'])->findOrFail($id);
    }



    public function openOfferModal()
    {
        $this->reset('jobOffer', 'offer_pdf');

        $this->jobOffer['candidate_name'] = $this->application->first_name . ' ' . $this->application->last_name;
        $this->jobOffer['employer_name']  = optional($this->application->job->customer)->name;

        if ($this->application->offer) {
            $existing = $this->application->offer;

            $this->jobOffer = array_merge($this->jobOffer, $existing->only([
                'basic_salary', 'transport_allowance', 'house_rent',
                'other_allowance', 'gross_salary', 'currency',
                'accommodation_available', 'expiry_date',
            ]));
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function storeOffer()
    {
        $this->validate([
            'jobOffer.employer_name'            => 'required|string|max:255',
            'jobOffer.candidate_name'           => 'required|string|max:255',
            'jobOffer.basic_salary'             => 'required|numeric',
            'jobOffer.transport_allowance' => 'nullable|numeric',
            'jobOffer.house_rent'               => 'nullable|numeric',
            'jobOffer.other_allowance'          => 'nullable|numeric',
            'jobOffer.gross_salary'             => 'required|numeric',
            'jobOffer.accommodation_available'  => 'boolean',
            'jobOffer.currency'                 => ['required', 'string', 'size:3', 'regex:/^[A-Za-z]+$/'],
            'jobOffer.expiry_date'                => 'nullable|date',
        ]);

        $offer = JobOffer::updateOrCreate(
        [
            'job_application_id' => $this->application->id,
        ],
        [
            'job_id'                   => $this->application->job_id,
            'employer_name'            => $this->jobOffer['employer_name'],
            'candidate_name'           => $this->jobOffer['candidate_name'],
            'basic_salary'             => $this->jobOffer['basic_salary'],
            'transport_allowance'      => $this->jobOffer['transport_allowance'] ?? 0,
            'house_rent'               => $this->jobOffer['house_rent'] ?? 0,
            'other_allowance'          => $this->jobOffer['other_allowance'] ?? 0,
            'gross_salary'             => $this->jobOffer['gross_salary'],
            'currency'                 => strtoupper($this->jobOffer['currency']),
            'accommodation_available' => $this->jobOffer['accommodation_available'] ?? false,
            'status'                   => 'offered',
            'offer_date'               => now()->toDateString(),
            'expiry_date'              => $this->jobOffer['expiry_date'] ?? null,
        ]);

        // ✅ Attach uploaded PDF
        if ($this->offer_pdf) {
            $offer->clearMediaCollection('offers'); // optional: remove old file
            $offer->addMedia($this->offer_pdf->getRealPath())
                ->usingFileName('offer_' . uniqid() . '.pdf')
                ->toMediaCollection('offers');
        }

        $email = $this->application->email;
        if ($email) {
            Notification::route('mail', $email)
                ->notify(new JobOfferNotification($offer, 'created'));
        }

        $this->closeModal();

        session()->flash('message', 'Offer created successfully!');
    }

    public function changeStatus($status)
    {
        $this->application->status = $status;
        $this->application->save();

        // Refresh application from DB to reflect changes
        $this->application->refresh();

        session()->flash('message', 'Application status updated successfully!');
    }

    public function render()
    {
        return view('recruitment::livewire.job-applications.show',[
            'statuses' => JobApplication::STATUS_SELECT,
        ]);
    }
}
