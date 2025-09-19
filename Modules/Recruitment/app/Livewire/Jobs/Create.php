<?php

namespace Modules\Recruitment\Livewire\Jobs;

use Carbon\Carbon;
use Livewire\Component;
use Modules\Recruitment\Models\Job;
use Modules\CRM\Models\Customer;
use Illuminate\Support\Str;

class Create extends Component
{
    public $job = [];
    public $customers = [];

    protected function rules()
    {
        return [
            'job.customer_id' => 'required|integer|exists:customers,id',
            'job.location' => 'required|string|max:255',
            'job.type' => 'required|string|max:100',
            'job.title' => 'required|string|max:255',
            'job.slug' => 'required|string|max:255|unique:jobs,slug',
            'job.description' => 'nullable|string',
            'job.image' => 'nullable|string|max:255',
            'job.posted_at' => 'nullable|date',
            'job.expiry_at' => 'nullable|date',

            // Salary breakdown
            'job.basic_salary' => 'nullable|numeric',
            'job.transportation_allowance' => 'nullable|numeric',
            'job.accommodation_provided' => 'nullable|boolean',
            'job.house_rent_allowance' => 'nullable|numeric',
            'job.other_allowances' => 'nullable|numeric',
            'job.gross_salary' => 'nullable|numeric',
        ];
    }

    public function save()
    {
        $this->validate();

        $customer = Customer::find($this->job['customer_id']);
        $this->job['employer_name'] = $customer->company ?? '';
        $this->job['posted_at'] = Carbon::now();

        Job::create($this->job);

        session()->flash('message', 'Job created successfully.');
        return redirect()->route('recruitment.jobs.index');
    }

    public function mount()
    {


        $this->customers = Customer::pluck('company', 'id')->toArray();
    }

    public function generateSlug()
    {
        if (!empty($this->job['title'])) {
            $this->job['slug'] = Str::slug($this->job['title']);
        }
    }

    public function render()
    {
        return view('recruitment::livewire.jobs.create', [
            'customers' => $this->customers,
        ]);
    }
}
