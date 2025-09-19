<?php

namespace Modules\CRM\Livewire\Customers;

use Livewire\Component;
use Modules\CRM\Models\Customer;
use App\Livewire\WithModalTrait;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithModalTrait,WithFileUploads;
    public $name, $email, $phone, $company, $industry, $website, $trn, $customer_id;


    public function mount($customerId){
       
        $customer = Customer::findOrFail($customerId);
        $this->customer_id = $customer->id;
        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
        $this->company = $customer->company;
        $this->industry = $customer->industry;
        $this->website = $customer->website;
        $this->trn = $customer->trn;
       
    }
  
    public function update()
    {
        $validatedData = $this->validate();
        $customer = Customer::updateOrCreate(
            ['id' => $this->customer_id],
            $validatedData 
        );

        session()->flash('message', 'Customer saved successfully.');
    }
    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'phone'=>'required',
            'company'=>'nullable',
            'industry'=>'nullable',
            'website'=>'nullable',
            'trn'=>'nullable',
        ];
    }

    public function render()
    {
      
        return view('crm::livewire.customers.edit');
    }
}
