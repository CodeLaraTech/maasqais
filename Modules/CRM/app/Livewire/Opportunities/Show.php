<?php

namespace Modules\CRM\Livewire\Opportunities;

use Livewire\Component;
use Modules\CRM\Models\Opportunity;

class Show extends Component
{
   
    public $opportunity;

    public function mount($opportunityId)
    {
      
        $this->opportunity = Opportunity::findOrFail($opportunityId);
    }


    public function render()
    {
    
        return view('crm::livewire.opportunities.show');
    }
}
