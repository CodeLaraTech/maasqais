<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Opportunities</strong></h6>
                    </div>
                </div>
                <div class="me-3 my-3 text-end">
                     <a href="{{url('crm/opportunities/create')}}" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add opportunity
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
                            <div>{{ $opportunities->links() }}</div>
                        </div>

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>ID @include('components.table.sort', ['field' => 'id'])</th>
                                        <th>From</th>
                                        <th>Title @include('components.table.sort', ['field' => 'title'])</th>
                                        <th>Value @include('components.table.sort', ['field' => 'value'])</th>
                                        <th>Followup Date @include('components.table.sort', ['field' => 'followup_date'])</th>
                                        <th>Expected Close Date @include('components.table.sort', ['field' => 'expected_close_date'])</th>
                                        <th>Status @include('components.table.sort', ['field' => 'status'])</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($opportunities as $opportunity)
                                        <tr>
                                            <td>{{ $opportunity->id }}</td>
                                            <td><a href="{{route('crm.opportunities.show', ['opportunity' => $opportunity->id])}}">{{$opportunity->reference}}</a></td>
                                            <td>
                                                @if ($opportunity->opp_from == 'Lead')
                                                {{ @$opportunity->lead->reference??'' }}
                                                @else
                                                {{ @$opportunity->customer->reference??'' }}
                                                @endif
                                            </td>
                                            <td>{{ $opportunity->customer_id }}</td>
                                            <td>{{ $opportunity->title }}</td>
                                            <td>{{ $opportunity->value }}</td>
                                            <td>{{ $opportunity->followup_date }}</td>
                                            <td>{{ @$opportunity->expected_close_date }}</td>
                                            <td>{{ $opportunity->status }}</td>

                                            <td class="align-middle">
                                                 <a href="{{route('crm.opportunities.edit', ['opportunity' => $opportunity->id])}}" class="btn btn-success btn-link">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button wire:click="confirmDelete({{ $opportunity->id }})" class="btn btn-danger btn-link">
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
