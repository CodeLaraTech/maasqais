
<div class="container-fluid py-4">
    <style>
        label, select{
            width: 100%;
        }

    </style>
    <div class="row">
        <div class="col-10 m-auto">
            <h3 class="mt-3 mb-0 text-center">Add Customer</h3>
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
                                    <label for="lead_id">Name</label>
                                    <input type="text" class="form-control" id="name" wire:model="name">
                                </div>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="title">Email</label>
                                    <input type="text" class="form-control" id="email" wire:model="email">
                                </div>
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="followup_date">Phone</label>
                                    <input type="text" class="form-control" id="phone" wire:model="phone">
                                </div>
                                @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="followup_date">Company</label>
                                    <input type="text" class="form-control" id="company" wire:model="company">
                                </div>
                                @error('company')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="followup_date">Industry</label>
                                    <input type="text" class="form-control" id="industry" wire:model="industry">
                                </div>
                                @error('industry')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="followup_date">Website</label>
                                    <input type="text" class="form-control" id="website" wire:model="website">
                                </div>
                                @error('website')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="followup_date">TRN</label>
                                    <input type="text" class="form-control" id="trn" wire:model="trn">
                                </div>
                                @error('trn')<span class="text-danger">{{ $message }}</span>@enderror
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
