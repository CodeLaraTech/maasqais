<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Permission Group Management</strong></h6>
                    </div>
                </div>
                <div class="me-3 my-3 text-end">
                    <button wire:click="openModal" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Group
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
                                        <input type="text" class="form-control" wire:model="search">
                                    </div>
                                </form>
                            </div>
                            <div>{{ $groups->links() }}</div>
                        </div>

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>ID @include('components.table.sort', ['field' => 'id'])</th>
                                        <th>Name @include('components.table.sort', ['field' => 'name'])</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($groups as $group)
                                        <tr>
                                            <td>{{ $group->id }}</td>
                                            <td>{{ $group->name }}</td>
                                            <td class="align-middle">
                                                <button wire:click="edit({{ $group->id }})" class="btn btn-success btn-link">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button wire:click="confirmDelete({{ $group->id }})" class="btn btn-danger btn-link">
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateMode ? 'Edit Group' : 'Add New Group' }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="name" class="form-label">Group Name</label>
                                    <input type="text" class="form-control" id="name" wire:model="name">
                                </div>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
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
