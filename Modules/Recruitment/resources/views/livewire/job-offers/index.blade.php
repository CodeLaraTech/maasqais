<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-danger border-radius-lg pt-4 pb-3">
                        <h6 class="text-white mx-3"><strong>Job Offers Management</strong></h6>
                    </div>
                </div>

                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <div class="mt-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="input-group input-group-outline">
                                <input type="text" class="form-control" wire:model.live="search" placeholder="Search by employer, candidate, or status">
                            </div>
                            <div>{{ $offers->links() }}</div>
                        </div>

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Employer @include('components.table.sort', ['field' => 'employer_name'])</th>
                                        <th>Candidate @include('components.table.sort', ['field' => 'candidate_name'])</th>
                                        <th>Basic Salary @include('components.table.sort', ['field' => 'basic_salary'])</th>
                                        <th>Gross Salary @include('components.table.sort', ['field' => 'gross_salary'])</th>
                                        <th>Offer Date @include('components.table.sort', ['field' => 'offer_date'])</th>
                                        <th>Expiry Date @include('components.table.sort', ['field' => 'expiry_date'])</th>
                                        <th>Status @include('components.table.sort', ['field' => 'status'])</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($offers as $key => $offer)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>{{ $offer->employer_name }}</td>
                                        <td>{{ $offer->candidate_name }}</td>
                                        <td>{{ number_format($offer->basic_salary, 2) }}</td>
                                        <td>{{ number_format($offer->gross_salary, 2) }}</td>

                                        <td>{{ $offer->offer_date ?? '-' }}</td>
                                        <td>{{ $offer->expiry_date ?? '-' }}</td>
                                        <td>
                                            <span class="badge bg-primary text-capitalize">{{ $offer->status }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ @$offer->getFirstMediaUrl('offers')?$offer->getFirstMediaUrl('offers'):'#' }}" target="_blank" class="btn btn-sm btn-warning btn-link">
                                                <i class="material-icons">download</i>
                                            </a>
                                            <a href="{{ route('recruitment.jobs-offers.show', $offer->id) }}" target="_blank" class="btn btn-sm btn-info btn-link">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="{{ route('recruitment.jobs-offers.show', $offer->id) }}" target="_blank" class="btn btn-sm btn-success btn-link">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <button wire:click="confirmDelete({{ $offer->id }})" class="btn btn-sm btn-danger btn-link">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $offers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.partials.delete-confirmation-modal')
</div>
