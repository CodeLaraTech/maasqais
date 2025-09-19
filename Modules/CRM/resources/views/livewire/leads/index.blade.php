<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Leads</strong></h6>
                    </div>
                </div>
                <div class="me-3 my-3 text-end">
                    <button wire:click="openModal" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Lead
                    </button>
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
                            <div>{{ $leads->links() }}</div>
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
                                        <th>Followup Date @include('components.table.sort', ['field' => 'followup_date'])</th>
                                        <th>Source @include('components.table.sort', ['field' => 'source'])</th>
                                        <th>Status @include('components.table.sort', ['field' => 'status'])</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leads as $lead)
                                        <tr>
                                            <td>{{ $lead->id }}</td>
                                            <td><a href="{{route('crm.leads.show', ['lead' => $lead->id])}}">{{ $lead->reference }}</a></td>
                                            <td>{{ $lead->name }}</td>
                                            <td>{{ $lead->email }}</td>
                                            <td>{{ $lead->phone }}</td>
                                            <td>{{ $lead->followup_date }}</td>
                                            <td>{{ @$lead->source->name }}</td>
                                            <td>{{ $lead->status }}</td>

                                            <td class="align-middle">
                                                <button wire:click="edit({{ $lead->id }})" class="btn btn-success btn-link">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button wire:click="confirmDelete({{ $lead->id }})" class="btn btn-danger btn-link">
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

    {{-- Modal --}}
    <div class="modal fade @if($showModal) show d-block @endif" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);" @if($showModal) aria-modal="true" @else aria-hidden="true" @endif>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateMode ? 'Edit Lead' : 'Add New Lead' }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="@if($updateMode) update @else store @endif">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" wire:model="name">
                                </div>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" wire:model="email">
                                </div>
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" wire:model="phone">
                                </div>
                                @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="followup_date">Followup Date</label>
                                    <input type="date" class="form-control" id="followup_date" wire:model="followup_date">
                                </div>
                                @error('followup_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="source_id">Source</label>
                                    <select id="source_id" wire:model="source_id" class="form-control">
                                        <option value="">Select Source</option>
                                        @foreach($sources as $source)
                                            <option value="{{ $source->id }}">{{ $source->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('source_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <!-- Add another input here for the second column if needed -->
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                @if ($updateMode)
                                <button type="submit" class="btn btn-primary btn-loading"
                                    wire:loading.attr="disabled"
                                    wire:loading.class="loading-active"
                                    wire:target="avatar, update">
                                    Save & Next
                                    <!-- Spinner with Dynamic Space -->
                                    <img wire:loading wire:target="avatar, update"
                                        src="{{ url('assets/img/loading.gif') }}"
                                        class="loading" alt="Loading...">
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary btn-loading"
                                    wire:loading.attr="disabled"
                                    wire:loading.class="loading-active"
                                    wire:target="avatar, store">
                                    Save & Next
                                    <!-- Spinner with Dynamic Space -->
                                    <img wire:loading wire:target="avatar, store"
                                        src="{{ url('assets/img/loading.gif') }}"
                                        class="loading" alt="Loading...">
                                </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.partials.delete-confirmation-modal')
</div>
