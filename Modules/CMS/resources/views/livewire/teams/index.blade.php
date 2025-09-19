<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">

                <!-- Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Team Members</strong></h6>
                    </div>
                </div>

                <!-- Add New Button -->
                <div class="me-3 my-3 text-end">
                    <a href="{{ route('cms.teams.create') }}" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Member
                    </a>
                </div>

                <div class="card-body">

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Search & Pagination -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <div class="flex-grow-1 me-3">
                                    <form wire:submit.prevent="filter">
                                        <div class="input-group input-group-outline w-100">
                                            <input type="text" class="form-control" wire:model="search"
                                                placeholder="Search team members...">
                                        </div>
                                    </form>
                                </div>

                                <div class="flex-shrink-0">
                                    {{ $teams->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($teams as $index => $team)
                                    <tr>
                                        <td>{{ $teams->firstItem() + $index }}</td>
                                        <td>
                                            @if($team->photo && \Storage::disk('public')->exists($team->photo))
                                                <img src="{{ asset('storage/' . $team->photo) }}" width="40" height="40"
                                                    class="rounded-circle">

                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>


                                        <td>{{ $team->getTranslation('name', app()->getLocale()) ?? '-' }}</td>
                                        <td>{{ $team->getTranslation('designation', app()->getLocale()) ?? '-' }}</td>
                                        <td>{{ $team->getTranslation('phone', app()->getLocale()) ?? '-' }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($team->getTranslation('message', app()->getLocale()), 40) ?? '-' }}
                                        </td>
                                        <td>
                                            <span class="badge {{ $team->status ? 'bg-success' : 'bg-danger' }}">
                                                {{ $team->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>{{ $team->created_at->format('d M Y') }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('cms.teams.edit', $team->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <button wire:click="delete({{ $team->id }})" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-muted">No team members found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $teams->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>