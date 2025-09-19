<?php

namespace Modules\CRM\Livewire\Opportunities;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\CRM\Models\Opportunity;
use Modules\CRM\Models\Lead;
use Modules\CRM\Models\Customer;
use App\Livewire\WithModalTrait;

class Create extends Component
{
    use WithFileUploads;

    public $opp_from = "Lead", $lead_id, $customer_id, $description, $title, $value, $status, $expected_close_date, $followup_date;

    protected function rules()
    {
        return [
            'lead_id' => 'required_if:opp_from,Lead',
            'customer_id' => 'required:opp_from,Customer',
            'title'=>'required',
            'description'=>'required',
            'value'=>'required',
            'expected_close_date'=>'required',
            'followup_date'=>'required',
            'opp_from'=>'required'
        ];
    }

    public function store()
    {

        $this->validate();

        $opportunity = Opportunity::create([
            'opp_from'=>$this->opp_from,
            'lead_id' => $this->lead_id,
            'customer_id' => $this->customer_id,
            'title' => $this->title,
            'description' => $this->description,
            'value' => $this->value,
            'expected_close_date' => $this->expected_close_date,
            'followup_date' => $this->followup_date,
        ]);

        return redirect()->route('crm.opportunities.show',$opportunity->id);

        session()->flash('message', 'Opportunity created successfully.');

    }

    public function render()
    {
        $leads = Lead::All();
        $customers = Customer::All();
        return view('crm::livewire.opportunities.create', compact('leads','customers'));
    }
}
