<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Job Management</strong></h6>
                    </div>
                </div>

                <div class="me-3 my-3 text-end">
                    <a href="{{ route('recruitment.jobs.create') }}" class="btn bg-gradient-dark mb-0">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Job
                    </a>
                </div>

                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <div class="mt-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="input-group input-group-outline">
                                <input type="text" class="form-control" wire:model.live="search" placeholder="Search by position, type, or location">
                            </div>
                            <div>{{ $jobs->links() }}</div>
                        </div>

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title @include('components.table.sort', ['field' => 'title'])</th>
                                        <th>Type @include('components.table.sort', ['field' => 'type'])</th>
                                        <th>Employer</th>
                                        <th>Location @include('components.table.sort', ['field' => 'location'])</th>
                                        <th>Posted At @include('components.table.sort', ['field' => 'posted_at'])</th>
                                        <th>Expiry At @include('components.table.sort', ['field' => 'expiry_at'])</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobs as $key => $job)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $job->title }}</td>
                                            <td>{{ ucfirst($job->type) }}</td>
                                            <td>{{ $job->employer_name }}</td>
                                            <td>{{ $job->location }}</td>
                                            <td>{{ $job->posted_at ? $job->posted_at->format('Y-m-d') : '-' }}</td>
                                            <td>{{ $job->expiry_at ? $job->expiry_at->format('Y-m-d') : '-' }}</td>
                                            <td>
                                                <a href="{{ route('recruitment.jobs.show', $job->id) }}" target="_blank" class="btn btn-sm btn-info btn-link">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                                <a href="{{ route('recruitment.jobs.edit', $job->id) }}" target="_blank" class="btn btn-sm btn-success btn-link">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button wire:click="confirmDelete({{ $job->id }})" class="btn btn-sm btn-danger btn-link">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $jobs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.partials.delete-confirmation-modal')
</div>
