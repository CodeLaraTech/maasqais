
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-10 m-auto">
            <h3 class="mt-3 mb-0 text-center">Create Job</h3>
            <p class="lead font-weight-normal opacity-8 mb-3 text-center">Fill in the details for the new job posting.</p>
            <div class="card">
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Employer (<a href="{{route('crm.customers.create')}}" target="_blank">+ Add New</a>)</label>
                                    <select class="form-control" wire:model.defer="job.customer_id">
                                        <option value="">Select Employer</option>
                                        @foreach ($customers as $id => $company)
                                            <option value="{{ $id }}">{{ $company }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('job.customer_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Location</label>
                                    <input type="text" class="form-control" wire:model.defer="job.location">
                                </div>
                                @error('job.location') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Job Title</label>
                                    <input type="text" class="form-control" wire:model.live="job.title" wire:blur="generateSlug">
                                </div>
                                @error('job.title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" wire:model.defer="job.slug" readonly>
                                </div>
                                @error('job.slug') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <div class="input-group d-block input-group-static mb-4" wire:ignore>
                                    <label class="ms-0">Description</label>
                                    <div id="description" style="min-height: 150px;"></div>
                                </div>
                                @error('job.description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>



                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Job Type</label>
                                    <select class="form-control" wire:model.defer="job.type">
                                        <option value="">Select Type</option>
                                        <option value="full-time">Full-time</option>
                                        <option value="part-time">Part-time</option>
                                        <option value="contract">Contract</option>
                                        <option value="internship">Internship</option>
                                        <option value="temporary">Temporary</option>
                                        <option value="freelance">Freelance</option>
                                    </select>
                                </div>
                                @error('job.type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline">
                                    <label>Expiry At</label>
                                    <input type="date" class="form-control" wire:model.defer="job.expiry_at">
                                </div>
                                @error('job.expiry_at') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-12 my-3">
                                <h5>Salary Breakdown</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3 d-none">
                                        <div class="input-group input-group-outline">
                                            <label>Basic Salary</label>
                                            <input type="number" step="0.01" class="form-control" wire:model.defer="job.basic_salary">
                                        </div>
                                        @error('job.basic_salary') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 d-none">
                                        <div class="input-group input-group-outline">
                                            <label>Transportation Allowance</label>
                                            <input type="number" step="0.01" class="form-control" wire:model.defer="job.transportation">
                                        </div>
                                        @error('job.transportation') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 d-none">
                                        <div class="input-group input-group-outline">
                                            <label>House Rent Allowance</label>
                                            <input type="number" step="0.01" class="form-control" wire:model.defer="job.house_rent">
                                        </div>
                                        @error('job.house_rent') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 d-none">
                                        <div class="input-group input-group-outline">
                                            <label>Other Allowances</label>
                                            <input type="number" step="0.01" class="form-control" wire:model.defer="job.other_allowances">
                                        </div>
                                        @error('job.others') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 d-none">
                                        <div class="input-group input-group-outline">
                                            <label>Accommodation Provided</label>
                                            <select class="form-control" wire:model.defer="job.accommodation_provided">
                                                <option value="">Select (Yes/No)</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        @error('job.accommodation_provided') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group input-group-outline">
                                            <label>Gross Salary</label>
                                            <input type="number" step="0.01" class="form-control" wire:model.defer="job.gross_salary">
                                        </div>
                                        @error('job.gross_salary') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary">Create Job</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            document.addEventListener('alpine:init', () => {
                setTimeout(() => {
                    const descElement = document.getElementById('description');
                    if (descElement) {
                        const quill = new Quill('#description', { theme: 'snow' });

                        quill.root.innerHTML = @js($job['description'] ?? '');

                        quill.on('text-change', function () {
                            @this.set('job.description', quill.root.innerHTML);
                        });
                    }
                }, 300);
            })
        </script>
    @endpush
</div>
