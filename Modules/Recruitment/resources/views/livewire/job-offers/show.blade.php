<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h4>Offer for: {{ $offer->candidate_name }}</h4>
                        <p class="text-sm text-muted mb-2">Job Title: <strong>{{ $offer->job->title ?? '-' }}</strong></p>
                        <p class="mb-0"><strong>Employer:</strong> {{ $offer->employer_name }}</p>
                        <p class="mb-0"><strong>Currency:</strong> {{ $offer->currency }}</p>
                        <p class="mb-0"><strong>Status:</strong> <span class="text-capitalize text-info">{{ $offer->status }}</span></p>
                        <p><strong>Offer Date:</strong> {{ $offer->offer_date }}</p>
                    </div>
                    <div class="col-lg-4 text-end">

                        <a class="btn btn-outline-success btn-sm" href="{{ route('recruitment.jobs.show', $offer->job_id) }}">View Job</a>

                        @if ($offer->getFirstMediaUrl('offers'))
                            <a class="btn btn-outline-warning btn-sm" href="{{ $offer->getFirstMediaUrl('offers') }}" target="_blank">Download Offer</a>
                        @else
                            <span class="text-muted small">No offer PDF uploaded.</span>
                        @endif

                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Change Status
                            </button>
                            <ul class="dropdown-menu">
                                @foreach (['offered', 'accepted', 'rejected', 'expired'] as $status)
                                    <li>
                                        <a class="dropdown-item" href="#" wire:click.prevent="changeStatus('{{ $status }}')">
                                            {{ ucfirst($status) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <hr class="horizontal dark">

                <div class="row">
                    <div class="col-md-12">
                        <h6>Offer Details</h6>
                        <table class="table table-sm table-borderless">
                            <tr><th class="text-dark w-25">Candidate Name</th><td>{{ $offer->candidate_name }}</td></tr>
                            <tr><th class="text-dark">Employer</th><td>{{ $offer->employer_name }}</td></tr>
                            <tr><th class="text-dark">Basic Salary</th><td>{{ number_format($offer->basic_salary, 2) }}</td></tr>
                            <tr><th class="text-dark">Transport Allowance</th><td>{{ number_format($offer->transport_allowance, 2) }}</td></tr>
                            <tr><th class="text-dark">House Rent</th><td>{{ number_format($offer->house_rent, 2) }}</td></tr>
                            <tr><th class="text-dark">Other Allowance</th><td>{{ number_format($offer->other_allowance, 2) }}</td></tr>
                            <tr><th class="text-dark">Gross Salary</th><td><strong>{{ number_format($offer->gross_salary, 2) }}</strong></td></tr>
                            <tr><th class="text-dark">Accommodation Available</th><td>{{ $offer->accommodation_available ? 'Yes' : 'No' }}</td></tr>
                            <tr><th class="text-dark">Expiry Date</th><td>{{ $offer->expiry_date ? $offer->expiry_date->format('d M Y') : '-' }}</td></tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
