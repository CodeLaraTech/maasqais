<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Page Management</strong></h6>
                    </div>
                </div>
                <div class="me-3 my-3 text-end">
                    <a href="{{route('cms.pages.create')}}" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Page
                    </a>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <div class="mt-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="input-group input-group-outline">
                                <input type="text" class="form-control" wire:model.live="search" placeholder="Search by title or slug">
                            </div>
                            <div>{{ $pages->links() }}</div>
                        </div>

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title @include('components.table.sort', ['field' => 'title'])</th>
                                        <th>Slug @include('components.table.sort', ['field' => 'slug'])</th>
                                        <th>Status @include('components.table.sort', ['field' => 'status'])</th>
                                        <th>Template</th>
                                        <th>Published At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pages as $key=>$page)
                                        <tr>
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td>{{ $page->title }}</td>
                                            <td>{{ $page->slug }}</td>
                                            <td>{{ ucfirst($page->status) }}</td>
                                            <td>{{ $page->template_type == 'custom' ? $page->template_name : 'Default' }}</td>
                                            <td>{{ $page->published_at ? $page->published_at: '-' }}</td>
                                            <td>
                                                <a href="{{route('cms.pages.show',$page->id)}}" class="btn btn-sm btn-info btn-link">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                                <a href="{{route('cms.pages.edit',$page->id)}}" class="btn btn-sm btn-success btn-link">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button wire:click="confirmDelete({{ $page->id }})" class="btn btn-sm btn-danger btn-link">
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
