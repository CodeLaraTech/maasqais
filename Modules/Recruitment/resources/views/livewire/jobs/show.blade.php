<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h4>{{ $job->title }}</h4>
                        <p class="text-sm text-muted mb-2">Slug: <code>{{ $job->slug }}</code></p>
                        <p class="mb-0"><strong>Employer:</strong> {{ $job->customer->company ?? '-' }}</p>
                        <p><strong>Location:</strong> {{ $job->location }}</p>
                        <p><strong>Type:</strong> {{ ucfirst($job->type) }}</p>
                        @if ($job->posted_at)
                            <p><strong>Posted At:</strong> {{ \Carbon\Carbon::parse($job->posted_at)->format('d M, Y') }}</p>
                        @endif
                        @if ($job->expiry_at)
                            <p><strong>Expiry At:</strong> {{ \Carbon\Carbon::parse($job->expiry_at)->format('d M, Y') }}</p>
                        @endif
                    </div>
                    <div class="col-lg-4 text-end">
                        <a class="btn btn-outline-success btn-sm" href="{{ route('recruitment.jobs.edit', $job->id) }}">Edit Job</a>
                    </div>
                </div>
                <hr class="horizontal dark">
                <div class="row">
                    <div class="col-12">
                        <h6>Job Description</h6>
                        <div class="border p-3 bg-light">
                            {!! $job->description ?: 'No description available.' !!}
                        </div>
                    </div>
                </div>

                {{-- Salary Breakdown --}}
                <hr class="horizontal dark mt-4 mb-4">
                <div class="row">
                    <div class="col-12">
                        <h6>Salary Details</h6>
                        <table class="table table-sm table-borderless">
                            <tr><th class="text-dark">Gross Salary</th><td>{{ $job->gross_salary ?? '-' }}</td></tr>
                        </table>
                    </div>
                </div>

                {{-- Applications Table --}}
                <hr class="horizontal dark mt-4 mb-4">
                <div class="row">
                    <div class="col-12 col-xl-12 mt-xl-0 mt-4">
                        <div class="card card-plain">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-0">Applications</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="card">
                                    <div class="">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Candidate</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Submitted At</th>
                                                    <th>Resume</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($job->applications as $key => $app)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $app->first_name }} {{ $app->last_name }}</td>
                                                        <td>{{ $app->email }}</td>
                                                        <td>{{ $app->subject ?? '-' }}</td>
                                                        <td>{{ $app->created_at ? $app->created_at->format('d M, Y') : '-' }}</td>
                                                        <td>
                                                            @if ($app->resume_url)
                                                                <a href="{{ $app->resume_url }}" target="_blank" class="btn btn-sm btn-info">Download</a>
                                                            @else
                                                                No resume
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{route('recruitment.jobs-applications.show',$app->id)}}" class="btn btn-sm btn-success">View</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @if ($job->applications->count() === 0)
                                                    <tr>
                                                        <td colspan="7" class="text-center">No applications found.</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
