<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">

                <!-- Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Testimonials Management</strong></h6>
                    </div>
                </div>

                <!-- Add New Button -->
                <div class="me-3 my-3 text-end">
                    <a href="{{ route('cms.testimonials.create') }}" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Testimonial
                    </a>
                </div>

                <div class="card-body">

                    <!-- Success Message -->
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Search -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <div class="flex-grow-1 me-3">
                                    <input type="text" class="form-control" wire:model="search" placeholder="Search testimonials...">
                                </div>
                                <div class="flex-shrink-0">
                                    {{ $testimonials->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonials Table -->
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name (EN)</th>
                                    <th>Designation (EN)</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $index => $testimonial)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if($testimonial->image)
                                                <img src="{{ asset('storage/'.$testimonial->image) }}" width="50" class="rounded circle">
                                            @endif
                                        </td>
                                        <td>{{ $testimonial->getTranslation('name', 'en') ?? '-' }}</td>
                                        <td>{{ $testimonial->getTranslation('designation', 'en') ?? '-' }}</td>
                                        <td>{{ $testimonial->rating ?? '-' }}</td>
                                        <td>{{ $testimonial->status ? 'Active' : 'Inactive' }}</td>
                                        <td class="align-middle">
                                            <a href="{{ route('cms.testimonials.edit', $testimonial->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button wire:click="delete({{ $testimonial->id }})" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
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
