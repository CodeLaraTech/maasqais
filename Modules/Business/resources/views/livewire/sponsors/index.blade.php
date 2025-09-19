<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Sponsors</strong></h6>
                    </div>
                </div>
                <div class="me-3 my-3 text-end">
                    <button wire:click="openModal" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Sponsor
                    </button>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="mt-3">
                        <form wire:submit.prevent="filter">
                            <div class="input-group input-group-outline">
                                <input type="text" class="form-control" placeholder="Search sponsors..." wire:model.live="search">
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>ID @include('components.table.sort', ['field' => 'id'])</th>
                                    <th>Name @include('components.table.sort', ['field' => 'name'])</th>
                                    <th>Email @include('components.table.sort', ['field' => 'email'])</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sponsors as $sponsor)
                                    <tr>
                                        <td>{{ $sponsor->id }}</td>
                                        <td>{{ $sponsor->name }}</td>
                                        <td>{{ $sponsor->email }}</td>
                                        <td>
                                            <button wire:click="edit({{ $sponsor->id }})" class="btn btn-success btn-link">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button wire:click="confirmDelete({{ $sponsor->id }})" class="btn btn-danger btn-link">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $sponsors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade @if($showModal) show d-block @endif" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);" @if($showModal) aria-modal="true" @else aria-hidden="true" @endif>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateMode ? 'Edit Sponsor' : 'Add New Sponsor' }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" wire:model="name">
                                </div>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" wire:model="email">
                                </div>
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
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

    @include('livewire.partials.delete-confirmation-modal')
</div>

