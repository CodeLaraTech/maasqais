<?php

namespace Modules\CRM\Livewire\Customers;

use Livewire\Component;
use App\Livewire\WithCountryStateCityTrait;
use App\Livewire\WithModalTrait;
use Modules\CRM\Models\Customer;
use Modules\Global\Models\Address;

class Show extends Component
{
    use WithCountryStateCityTrait, WithModalTrait;

    use WithModalTrait;

    public $customer;
    public $address_type, $line1, $line2, $postal_code;
    public $addresses;

    public function mount($customerId)
    {
        $this->initializeWithCountryStateCityTrait(); // Initialize countries
        $this->customer = Customer::findOrFail($customerId);
    }

    public function storeAddress(){
        $address = $this->customer->addresses()->create([
            'address_type'=>$this->address_type,
            'country'=>$this->country,
            'state'=>$this->state,
            'city'=>$this->city,
            'line1'=>$this->line1,
            'line2'=>$this->line2,
            'postal_code'=>$this->postal_code,
        ]);
    }

    public function render()
    {


        return view('crm::livewire.customers.show');
    }
}
