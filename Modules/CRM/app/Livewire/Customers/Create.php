<?php

namespace Modules\CRM\Livewire\Customers;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\CRM\Models\Customer;
use App\Livewire\WithModalTrait;

class Create extends Component
{
    use WithFileUploads;

    public $name, $email, $phone, $company, $industry, $website, $trn;

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'email|nullable',
            'phone'=>'required',
            'company'=>'nullable',
            'industry'=>'nullable',
            'website'=>'nullable',
            'trn'=>'nullable',
        ];
    }

    public function store()
    {

        $this->validate();

        $customer = Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'company' => $this->company,
            'industry' => $this->industry,
            'website' => $this->website,
            'trn' => $this->trn,
        ]);
        return redirect()->route('crm.customers.show',$customer->id);

        session()->flash('message', 'Customer created successfully.');

    }

    public function render()
    {

        return view('crm::livewire.customers.create');
    }
}
