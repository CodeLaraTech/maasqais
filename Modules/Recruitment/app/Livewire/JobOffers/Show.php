<?php

namespace Modules\Recruitment\Livewire\JobOffers;

use Livewire\Component;
use Modules\Recruitment\Models\JobOffer;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;

    public $offer;
    public $showModal = false;
    public $offer_pdf;

    public function mount($id)
    {
        $this->offer = JobOffer::with(['media', 'job', 'job.customer', 'application'])->findOrFail($id);
    }

    public function changeStatus($status)
    {
        $this->offer->status = $status;
        $this->offer->save();

        // Refresh to reflect changes
        $this->offer->refresh();

        session()->flash('message', 'Offer status updated successfully!');
    }

    public function downloadOffer()
    {
        $media = $this->offer->getFirstMedia('offers');

        if ($media) {
            return response()->download($media->getPath(), $media->file_name);
        }

        session()->flash('error', 'Offer PDF not found.');
    }

    public function render()
    {
        return view('recruitment::livewire.job-offers.show');
    }
}
