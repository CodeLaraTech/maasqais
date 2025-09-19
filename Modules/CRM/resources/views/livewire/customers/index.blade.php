<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Customers</strong></h6>
                    </div>
                </div>
                <div class="me-3 my-3 text-end">
                     <a href="{{url('crm/customers/create')}}" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Customer
                    </a>

                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="mt-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <form wire:submit.prevent="filter">
                                    <div class="input-group input-group-outline">
                                        <input type="text" class="form-control" wire:model="search" placeholder="Search">
                                    </div>
                                </form>
                            </div>
                            <div>{{ $customers->links() }}</div>
                        </div>

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>ID @include('components.table.sort', ['field' => 'id'])</th>
                                        <th>Reference @include('components.table.sort', ['field' => 'reference'])</th>
                                        <th>Name @include('components.table.sort', ['field' => 'name'])</th>
                                        <th>Email @include('components.table.sort', ['field' => 'email'])</th>
                                        <th>Phone @include('components.table.sort', ['field' => 'phone'])</th>
                                        <th>TRN</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->id }}</td>
                                            <td> <a href="{{route('crm.customers.show', ['customer' => $customer->id])}}">{{ $customer->reference }}</a></td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->trn }}</td>
                                            <td class="align-middle">
                                                 <a href="{{route('crm.customers.edit', ['customer' => $customer->id])}}" class="btn btn-success btn-link">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button wire:click="confirmDelete({{ $customer->id }})" class="btn btn-danger btn-link">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.partials.delete-confirmation-modal')
</div>
