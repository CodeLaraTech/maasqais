<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Role: {{ $role->name }}</strong></h6>
                    </div>
                </div>
                <div class="me-3 my-3 text-end">
                    <button wire:click="toggleModal" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Assign Permissions
                    </button>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="mt-3">
                        <h5>Assigned Permissions</h5>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Group</th>
                                    <th>Permission</th>
                                </tr>
                                @foreach ($role_permissions as $permission)
                                    <tr>
                                        <td>{{$permission->id}}</td>
                                        <td>{{ $permission->group_name??'' }}</td>
                                        <td>{{ $permission->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                    <h5 class="modal-title">Assign Permissions to Role: {{ $role->name }}</h5>
                    <button type="button" class="btn-close" wire:click="toggleModal"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-outline mb-3">
                        <form wire:submit="filter">
                        <input type="text" class="form-control" placeholder="Search permissions..." wire:model="search">
                        </form>
                    </div>
                    <form>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <tbody>
                                    <tr>
                                        <th>
                                            <input type="checkbox" wire:model="selectAllPermissions">
                                        </th>
                                        <th>Group</th>
                                        <th>Permission</th>
                                    </tr>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>
                                                <input type="checkbox" wire:model="selectedPermissions" value="{{ $permission->name }}">
                                            </td>
                                            <td>{{ $permission->group->name??'' }}</td>
                                            <td>{{ $permission->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="toggleModal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="savePermissions">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
