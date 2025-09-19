<div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white mx-3"><strong>Manage Menu Items for {{ $menu->name }}</strong></h6>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form wire:submit.prevent="addMenuItems">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Select</th>
                                            <th scope="col">SN</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">URL</th>
                                            <th scope="col">Order</th>
                                            <th scope="col">Parent</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($menuItems as $key => $menuItem)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" wire:model="selectedMenuItems" value="{{ $menuItem->id }}">
                                                </td>
                                                <td>{{ $key + 1 }}</td>
                                                <td><b>{{ $menuItem->title }}</b></td>
                                                <td>{{ $menuItem->url }}</td>
                                                <td>{{ $menuItem->order }}</td>
                                                <td>{{ $menuItem->parent ? $menuItem->parent->title : 'N/A' }}</td>
                                            </tr>
                                            @foreach ($menuItem->children as $subkey => $childItem)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" wire:model="selectedMenuItems" value="{{ $childItem->id }}">
                                                </td>
                                                <td>{{ ($key + 1) . '.' . ($subkey + 1) }}</td>
                                                <td>{{ $childItem->title }}</td>
                                                <td>{{ $childItem->url }}</td>
                                                <td>{{ $childItem->order }}</td>
                                                <td>{{ $childItem->parent ? $childItem->parent->title : 'N/A' }}</td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Add Selected Items</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
