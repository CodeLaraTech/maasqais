<?php

namespace Modules\CRM\Livewire\Leads;

use Livewire\Component;
use Modules\CRM\Models\Lead;

class Show extends Component
{
   
    public $lead;

    public function mount($leadId)
    {
      
        $this->lead = Lead::findOrFail($leadId);
    }


    public function render()
    {
    
        return view('crm::livewire.leads.show');
    }
}
