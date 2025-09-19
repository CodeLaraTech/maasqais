<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Job Applications Management</strong></h6>
                    </div>
                </div>

                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <div class="mt-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="input-group input-group-outline">
                                <input type="text" class="form-control" wire:model.live="search" placeholder="Search by candidate, email, subject or employer">
                            </div>
                            <div>{{ $applications->links() }}</div>
                        </div>

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Job</th>
                                        <th>Employer</th>
                                        <th>Candidate Name @include('components.table.sort', ['field' => 'first_name'])</th>
                                        <th>Email @include('components.table.sort', ['field' => 'email'])</th>
                                        <th>Subject @include('components.table.sort', ['field' => 'subject'])</th>
                                        <th>Submitted At @include('components.table.sort', ['field' => 'created_at'])</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applications as $key => $app)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>{{ $app->job->title ?? '-' }}</td>
                                        <td>{{ $app->job->customer->company ?? '-' }}</td>
                                        <td>{{ $app->first_name }} {{ $app->last_name }}</td>
                                        <td>{{ $app->email }}</td>
                                        <td>{{ $app->subject ?? '-' }}</td>
                                        <td>{{ $app->created_at ? $app->created_at->format('Y-m-d') : '-' }}</td>
                                        <td>
                                            <a href="{{ @$app->resume_url?$app->resume_url:'#' }}" target="_blank" class="btn btn-sm btn-info btn-link">
                                                <i class="material-icons">download</i>
                                            </a>
                                            <a href="{{ route('recruitment.jobs-applications.show',$app->id) }}" class="btn btn-sm btn-success btn-link">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button wire:click="confirmDelete({{ $app->id }})" class="btn btn-sm btn-danger btn-link">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $applications->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.partials.delete-confirmation-modal')
</div>
