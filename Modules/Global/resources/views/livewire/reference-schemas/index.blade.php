<div class="container-fluid py-4">
    <style>
        label, select{
            width: 100%;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Reference Schema Management</strong></h6>
                    </div>
                </div>
                <div class="me-3 my-3 text-end">
                    <button wire:click="openModal" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Schema
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
                                <form wire:submit="filter">
                                    <div class="input-group input-group-outline">
                                        <input type="text" class="form-control" wire:model="search" placeholder="Search by Type">
                                    </div>
                                </form>
                            </div>
                            <div>{{ $schemas->links() }}</div>
                        </div>

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>ID @include('components.table.sort', ['field' => 'id'])</th>
                                        <th>Type @include('components.table.sort', ['field' => 'type'])</th>
                                        <th>Prefix</th>
                                        <th>Initial Value</th>
                                        <th>Increment</th>
                                        <th>Next Value</th>
                                        <th>Digits</th>
                                        <th>Status @include('components.table.sort', ['field' => 'status'])</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schemas as $schema)
                                        <tr>
                                            <td>{{ $schema->id }}</td>
                                            <td>{{ $schema->type }}</td>
                                            <td>{{ $schema->prefix }}</td>
                                            <td>{{ $schema->initial_value }}</td>
                                            <td>{{ $schema->increment }}</td>
                                            <td>{{ $schema->next_value }}</td>
                                            <td>{{ $schema->digits }}</td>
                                            <td>{{ $schema->status }}</td>
                                            <td class="align-middle">
                                                <button wire:click="edit({{ $schema->id }})" class="btn btn-success btn-link">
                                                    <i class="material-icons">edit</i>
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

    {{-- Modal for Add/Edit --}}
    <div class="modal fade @if($showModal) show d-block @endif" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);" @if($showModal) aria-modal="true" @else aria-hidden="true" @endif>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateMode ? 'Edit Schema' : 'Add New Schema' }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="type">Type</label>
                                    <input type="text" class="form-control" id="type" wire:model="type">
                                </div>
                                @error('type')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="prefix">Prefix</label>
                                    <input type="text" class="form-control" id="prefix" wire:model="prefix">
                                </div>
                                @error('prefix')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="initial_value">Initial Value</label>
                                    <input type="number" class="form-control" id="initial_value" wire:model="initial_value">
                                </div>
                                @error('initial_value')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="increment">Increment</label>
                                    <input type="number" class="form-control" id="increment" wire:model="increment">
                                </div>
                                @error('increment')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="next_value">Next Value</label>
                                    <input type="number" class="form-control" id="next_value" wire:model="next_value">
                                </div>
                                @error('next_value')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="digits">No. of Digits</label>
                                    <input type="number" class="form-control" id="digits" wire:model="digits">
                                </div>
                                @error('next_value')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" wire:model="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                                @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                    @if ($updateMode)
                        <button type="button" class="btn btn-primary" wire:click="update">Save changes</button>
                    @else
                        <button type="button" class="btn btn-primary" wire:click="store">Save</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    @include('livewire.partials.delete-confirmation-modal')
</div>
