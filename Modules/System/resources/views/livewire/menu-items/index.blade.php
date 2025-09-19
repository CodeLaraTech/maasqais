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
                        <h6 class="text-white mx-3"><strong>MenuItem Management</strong></h6>
                    </div>
                </div>
                <div class="me-3 my-3 text-end">
                    <button wire:click="openModal" class="btn bg-gradient-dark mb-0"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New MenuItem</button>
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
                            <div>{{ $menuItems->links() }}</div>
                        </div>

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                            @include('components.table.sort', ['field' => 'id'])
                                        </th>
                                        <th>
                                            Title
                                            @include('components.table.sort', ['field' => 'title'])
                                        </th>
                                        <th>
                                            Prefix
                                            @include('components.table.sort', ['field' => 'prefix'])
                                        </th>
                                        <th>
                                            URL
                                            @include('components.table.sort', ['field' => 'url'])
                                        </th>
                                        <th>
                                            Icon
                                            @include('components.table.sort', ['field' => 'icon'])
                                        </th>
                                        <th>
                                            Order
                                            @include('components.table.sort', ['field' => 'order'])
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($menuItems as $index=>$menuItem)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $menuItem->title }}</td>
                                            <td>{{ $menuItem->prefix }}</td>
                                            <td>{{ $menuItem->url }}</td>
                                            <td>{{ $menuItem->icon }}</td>
                                            <td>{{ $menuItem->order }}</td>
                                            <td class="align-middle">
                                                <button wire:click="edit({{ $menuItem->id }})" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></button>
                                                <button wire:click="confirmDelete({{ $menuItem->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @foreach($menuItem->children as $index2=>$menuItem)
                                        <tr>
                                            <td>{{ $index+1 }}.{{ $index2+1 }}</td>
                                            <td>{{ $menuItem->title }}</td>
                                            <td>{{ $menuItem->prefix }}</td>
                                            <td>{{ $menuItem->url }}</td>
                                            <td>{{ $menuItem->icon }}</td>
                                            <td>{{ $menuItem->order }}</td>
                                            <td class="align-middle">
                                                <button wire:click="edit({{ $menuItem->id }})" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></button>
                                                <button wire:click="confirmDelete({{ $menuItem->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @foreach($menuItem->children as $index3=>$menuItem)
                                        <tr>
                                            <td>{{ $index+1 }}.{{ $index2+1 }}.{{ $index3+1 }}</td>
                                            <td>{{ $menuItem->title }}</td>
                                            <td>{{ $menuItem->prefix }}</td>
                                            <td>{{ $menuItem->url }}</td>
                                            <td>{{ $menuItem->icon }}</td>
                                            <td>{{ $menuItem->order }}</td>
                                            <td class="align-middle">
                                                <button wire:click="edit({{ $menuItem->id }})" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></button>
                                                <button wire:click="confirmDelete({{ $menuItem->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-3">
                        {{ $menuItems->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create/Update Modal -->
    <div class="modal fade @if($showModal) show d-block @endif" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);" @if($showModal) aria-modal="true" @else aria-hidden="true" @endif>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateMode ? 'Update' : 'Create' }} MenuItem</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" wire:model="title">
                                </div>
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="prefix">Prefix</label>
                                    <input type="text" class="form-control" id="prefix" wire:model="prefix">
                                </div>
                                @error('prefix')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control" id="url" wire:model="url">
                                </div>
                                @error('url')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="icon">Icon</label>
                                    <input type="text" class="form-control" id="icon" wire:model="icon">
                                </div>
                                @error('icon')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="order">Order</label>
                                    <input type="number" class="form-control" id="order" wire:model="order">
                                </div>
                                @error('order')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline @if ($updateMode) is-filled @endif">
                                    <label for="parentId">Parent MenuItem</label>
                                    <select class="form-control" id="parentId" wire:model="parentId">
                                        <option value="">Select Parent MenuItem</option>
                                        @foreach($allMenuItems as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('parentId')<span class="text-danger">{{ $message }}</span>@enderror
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
