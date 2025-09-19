
<div class="container-fluid py-4">
    <style>
        label, select{
            width: 100%;
        }

    </style>
    <div class="row">
        <div class="col-10 m-auto">
            <h3 class="mt-3 mb-0 text-center">Add Opportunity</h3>
            <p class="lead font-weight-normal opacity-8 mb-5 text-center">This information will let us know more about you.</p>
            <div class="card">

                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!---- Setp 1 -->

                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="opp_from">Opportunity From</label>
                                    <select id="opp_from" wire:model.live="opp_from" class="form-control">
                                        <option value="">Select One</option>
                                        <option value="Lead">Lead</option>
                                        <option value="Customer">Customer</option>
                                    </select>
                                </div>
                                @error('lead_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            @if (@$opp_from == 'Lead')
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="lead_id">Lead</label>
                                    <select id="lead_id" wire:model="lead_id" class="form-control">
                                        <option value="">Select Lead</option>
                                        @foreach($leads as $lead)
                                            <option value="{{ $lead->id }}">{{ $lead->reference }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('lead_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            @endif
                            @if (@$opp_from == 'Customer')
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="customer_id">Customer</label>
                                    <select id="customer_id" wire:model="customer_id" class="form-control">
                                        <option value="">Select Customer</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->reference }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('customer_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            @endif
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" wire:model="title">
                                </div>
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="followup_date">Next Followup Date</label>
                                    <input type="date" class="form-control" id="followup_date" wire:model="followup_date">
                                </div>
                                @error('followup_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="expected_close_date">Expected Close Date</label>
                                    <input type="date" class="form-control" id="expected_close_date" wire:model="expected_close_date">
                                </div>
                                @error('expected_close_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="expected_close_date">Value</label>
                                    <input type="text" class="form-control" id="value" wire:model="value">
                                </div>
                                @error('value')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="title">Description</label>
                                    <textarea type="text" class="form-control" id="description" wire:model="description"></textarea>
                                </div>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-loading"
                                wire:loading.attr="disabled"
                                wire:loading.class="loading-active"
                                wire:target="primary_photo, saveStep1">
                                Save & Next
                                <!-- Spinner with Dynamic Space -->
                                <img wire:loading wire:target="primary_photo, saveStep1"
                                    src="{{ url('assets/img/loading.gif') }}"
                                    class="loading" alt="Loading...">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@push('js')
@endpush
