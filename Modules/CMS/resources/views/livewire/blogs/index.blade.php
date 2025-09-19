<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">

                <!-- Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Blog Management</strong></h6>
                    </div>
                </div>

                <!-- Add New Button -->
                <div class="me-3 my-3 text-end">
                    <a href="{{ route('cms.blogs.create') }}" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Blog
                    </a>
                </div>

                <div class="card-body">

                    <!-- Success Message -->
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="mt-3">

                        <!-- Search & Pagination -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <!-- Search -->
                                    <div class="flex-grow-1 me-3">
                                        <form wire:submit.prevent="filter">
                                            <div class="input-group input-group-outline w-100">
                                                <input type="text" class="form-control" wire:model="search"
                                                    placeholder="Search blogs...">
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Pagination -->
                                    <div class="flex-shrink-0">
                                        {{ $blogs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Blogs Table -->
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title (EN)</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($blogs as $index => $blog)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $blog->getTranslation('title', 'en') ?? 'No Title' }}</td>
                                            <td>{{ ucfirst($blog->status) }}</td>
                                            <td class="align-middle">
                                                <a href="{{ route('cms.blogs.edit', $blog->id) }}" class="btn btn-success btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('cms.blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No blogs found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $blogs->links() }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
