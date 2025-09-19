<?php

namespace Modules\CRM\Livewire\Opportunities;

use Livewire\Component;
use Modules\CRM\Models\Opportunity;
use Modules\CRM\Models\Lead;
use App\Livewire\WithModalTrait;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithModalTrait,WithFileUploads;
    public $lead_id, $opportunity_id, $customer_id, $description, $title, $value, $status, $expected_close_date, $followup_date;
    public $opportunity;

    public function mount($opportunityId){
       
        $opportunity = Opportunity::findOrFail($opportunityId);
        $this->opportunity_id = $opportunity->id;
        $this->lead_id = $opportunity->lead_id;
        $this->customer_id = $opportunity->customer_id;
        $this->title = $opportunity->title;
        $this->description = $opportunity->description;
        $this->value = $opportunity->value;
        $this->expected_close_date = $opportunity->expected_close_date;
        $this->followup_date = $opportunity->followup_date;
       
    }
  
    public function update()
    {
        $validatedData = $this->validate();
        $opportunity = Opportunity::updateOrCreate(
            ['id' => $this->opportunity_id],
            $validatedData 
        );

        session()->flash('message', 'Opportunity saved successfully.');
    }
    protected function rules()
    {
        return [
            'lead_id' => 'required',
            'customer_id' => 'required',
            'title'=>'required',
            'description'=>'required',
            'value'=>'required',
            'expected_close_date'=>'required',
            'followup_date'=>'required'
        ];
    }

    public function render()
    {
        $leads = Lead::All();
        return view('crm::livewire.opportunities.edit', compact('leads'));
    }
}
