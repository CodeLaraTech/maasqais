<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h4>Application for: {{ $application->job->title ?? '-' }}</h4>
                        <p class="text-sm text-muted mb-2">Job ID: <code>{{ $application->job_id }}</code></p>
                        <p class="mb-0"><strong>Employer:</strong> {{ $application->job->customer->company ?? '-' }}</p>
                        <p class="mb-0"><strong>Submitted At:</strong> {{ $application->created_at ? $application->created_at->format('d M, Y') : '-' }}</p>
                        <p><strong>Status:</strong> <span class="text-capitalize text-info">{{$application->status}}</span></p>
                    </div>
                    <div class="col-lg-4 text-end">
                        <a class="btn btn-outline-success btn-sm" href="{{ route('recruitment.jobs.show', $application->job_id) }}">View Job</a>

                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Change Status
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($statuses as $status)
                                    <li>
                                        <a class="dropdown-item" href="#" wire:click.prevent="changeStatus('{{ $status }}')">
                                            {{ ucfirst($status) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        @unless (@$application->offer)
                            <a class="btn btn-outline-warning btn-sm" href="#" wire:click="openOfferModal">
                                Create Offer
                            </a>
                        @else
                            <span class="btn btn-outline-warning btn-sm" href="#" wire:click="openOfferModal">Update Offer</span>
                        @endunless
                    </div>

                </div>
                <hr class="horizontal dark">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Candidate Details</h6>
                        <table class="table table-sm table-borderless">
                            <tr><th class="text-dark w-25">Name</th><td>{{ $application->first_name }} {{ $application->last_name }}</td></tr>
                            <tr><th class="text-dark">Email</th><td>{{ $application->email }}</td></tr>
                            <tr><th class="text-dark">Phone</th><td>{{ $application->phone ?? '-' }}</td></tr>
                            <tr><th class="text-dark">Subject</th><td>{{ $application->subject ?? '-' }}</td></tr>
                            <tr><th class="text-dark">Message</th><td>{{ $application->message ?? '-' }}</td></tr>
                            <tr><th class="text-dark">Resume</th>
                                <td>
                                    @if ($application->resume_url)
                                        <a href="{{ $application->resume_url }}" target="_blank" class="btn btn-sm btn-info">
                                            Download Resume
                                        </a>
                                    @else
                                        No resume uploaded.
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr class="horizontal dark">
                <div class="row">
                    <div class="col-12">
                        <h6>Submitted Message Content</h6>
                        <div class="border p-3 bg-light">
                            {!! nl2br(e($application->message)) ?: 'No additional message provided.' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade @if ($showModal) show d-block @endif" tabindex="-1" role="dialog"
        style="background: rgba(0, 0, 0, 0.5);"
        @if ($showModal) aria-modal="true" @else aria-hidden="true" @endif>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Offer</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeOffer">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="employer_name">Employer Name</label>
                                    <input type="text" id="employer_name" class="form-control" wire:model="jobOffer.employer_name">
                                </div>
                                @error('jobOffer.employer_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="candidate_name">Candidate Name</label>
                                    <input type="text" id="candidate_name" class="form-control" wire:model="jobOffer.candidate_name">
                                </div>
                                @error('jobOffer.candidate_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="basic_salary">Basic Salary</label>
                                    <input type="number" id="basic_salary" class="form-control" wire:model="jobOffer.basic_salary">
                                </div>
                                @error('jobOffer.basic_salary') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="transport_allowance">Transportation Allowance</label>
                                    <input type="number" id="transport_allowance" class="form-control" wire:model="jobOffer.transport_allowance">
                                </div>
                                @error('jobOffer.transport_allowance') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="house_rent">House Rent</label>
                                    <input type="number" id="house_rent" class="form-control" wire:model="jobOffer.house_rent">
                                </div>
                                @error('jobOffer.house_rent') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="other_allowance">Other Allowance</label>
                                    <input type="number" id="other_allowance" class="form-control" wire:model="jobOffer.other_allowance">
                                </div>
                                @error('jobOffer.other_allowance') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="gross_salary">Gross Salary</label>
                                    <input type="number" id="gross_salary" class="form-control" wire:model="jobOffer.gross_salary">
                                </div>
                                @error('jobOffer.gross_salary') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="currency">Currency (Ex: USD)</label>
                                    <input type="text" id="currency" class="form-control" wire:model="jobOffer.currency" maxlength="3">
                                </div>
                                @error('jobOffer.currency') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check mt-4">
                                    <input type="checkbox" id="accommodation_available" class="form-check-input" wire:model="jobOffer.accommodation_available">
                                    <label class="form-check-label" for="accommodation_available">Accommodation Available</label>
                                </div>
                                @error('jobOffer.accommodation_available') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="expiry_date">Expiry Date</label>
                                    <input type="date" id="expiry_date" class="form-control" wire:model="jobOffer.expiry_date">
                                </div>
                                @error('jobOffer.expiry_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline">
                                    <label for="offer_pdf">Attach Offer PDF</label>
                                    <input type="file" id="offer_pdf" class="form-control" wire:model="offer_pdf">
                                </div>
                                @error('offer_pdf') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                Save Offer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
