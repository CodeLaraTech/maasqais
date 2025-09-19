<div class="container-fluid py-4 bg-gray-200">


    <div class="row mt-4">
        <div class="col-8">
            <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1" id="nav-home-tab" role="tablist" wire:ignore="">
                    <li class="nav-item  active">
                        <a class="nav-link mb-0 px-0 py-1  active" id="nav-home-tab" href="" role="tab" aria-controls="nav-home" aria-selected="true">
                            <i class="material-icons text-lg">home</i>
                            <span class="ms-1">Details</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link mb-0 px-0 py-1  " id="nav-documents-tab" href="" role="tab" aria-controls="nav-documents" aria-selected="false">
                            <i class="fa fa-file-alt" aria-hidden="true"></i>
                            <span class="ms-1">Gen. Docs</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link mb-0 px-0 py-1  " id="nav-documents-tab" href="" role="tab" aria-controls="nav-documents" aria-selected="false">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span class="ms-1">Projects</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link mb-0 px-0 py-1  " id="nav-documents-tab" href="" role="tab" aria-controls="nav-documents" aria-selected="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="ms-1">Contact Persons</span>
                        </a>
                    </li>
            <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: 0.5s; transform: translate3d(0px, 0px, 0px); width: 170px;"><a class="nav-link mb-0 px-0 py-1  active " id="nav-home-tab" href="https://erp.opeco.org/crm/clients/1/details" role="tab" aria-controls="nav-home" aria-selected="true">-</a></div></ul>

            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header p-3 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="w-50">
                            <h6> {{$customer->name}}</h6>
                            <div class="d-flex mb-3">
                                <i class="material-icons text-primary text-sm my-auto me-1">email</i>
                                <span class="mb-0 text-sm"> {{$customer->name}}  </span>
                                 <i class="material-icons  text-primary text-sm my-auto me-1">phone</i>
                                <span class="mb-0 text-sm"> {{$customer->phone}} </span>
                            </div>
                        </div>
                        <div class="text-sm mb-1"><span class="badge badge-md bg-gradient-success">{{$customer->status}}</span> </div>
                        <button class="btn btn-sm bg-gradient-primary mb-0 mt-0 mt-md-n9 mt-lg-0" data-bs-toggle="modal" data-bs-target="#update_status_modal">
                            <i class="material-icons text-white position-relative text-md pe-2">edit</i> Update status
                        </button>
                    </div>
                </div>
                <div class="card-body p-3 pt-0">
                    <hr class="horizontal dark mt-0 mb-4">
                    <div class="row">
                        <div class="col-md-6 task-content">
                            <div class="text-sm mb-1"><b>Company: </b> {{$customer->company}} </div>

                            <div class="text-sm mb-1"><b>Industry: </b> {{$customer->industry}} </div>
                            <div class="text-sm mb-1"><b>Website: </b> {{$customer->website}} </div>
                            <div class="text-sm mb-1"><b>TRN: </b> {{$customer->trn}} </div>
                        </div>
                        <div class="col-md-6 task-content text-end">



                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark mt-4 mb-4">
					<div class="row">
						<div class="col-12 col-xl-12 mt-xl-0 mt-4">
							<div class="card card-plain">
								<div class="card-header pb-0 p-3">
									<div class="row">
										<div class="col-md-6">
											<h6 class="mb-0">Address(s)</h6>
										</div>
										<div class="col-md-6 text-end">
											<button class="btn btn-sm bg-gradient-primary mb-0 mt-0 mt-md-n9 mt-lg-0" wire:click="openModal">
												<i class="material-icons text-white position-relative text-md pe-2">add</i>Add New Address </button>
										</div>
									</div>

								</div>
								<div class="card-body p-3">
									<div class="card">
										<div class="">
											<table class="table align-items-center mb-0">
												<thead>
												<tr>
													<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">S.No</th>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Type</th>
													<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Country</th>
													<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">State</th>
													<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">City</th>
													<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Address</th>
													<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Zip</th>
													<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Action</th>
												</tr>
												</thead>
												<tbody>
                                                    @foreach ($customer->addresses as $key=>$address)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{ ucwords(str_replace('_', ' ', $address->address_type)) }}</td>
                                                        <td>{{$address->country}}</td>
                                                        <td>{{$address->state}}</td>
                                                        <td>{{$address->city}}</td>
                                                        <td>{{$address->line1}}</td>
                                                        <td>{{$address->line2}}</td>
                                                        <td>{{$address->postal_code}}</td>
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
                </div>
            </div>
        </div>
		{{-- Modal --}}
    <div class="modal fade @if($showModal) show d-block @endif" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);" @if($showModal) aria-modal="true" @else aria-hidden="true" @endif>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Address</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeAddress">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline ">
                                    <label for="address_type">Type of Address</label>
                                    <select id="address_type" wire:model="address_type" class="form-control">
                                        <option value="">Select One</option>
                                        <option value="billing_address">Billing Address</option>
                                        <option value="shipping_address">Shipping Address</option>
                                    </select>
                                </div>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline ">
                                    <label for="name">Country</label>
                                    <select id="country" wire:model.live="country" class="form-control">
                                        <option value="">Select One</option>
                                        @foreach ($countries as $country)
                                        <option value="{{$country->name}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline ">
                                    <label for="state">State</label>
                                    <select id="state" wire:model.live="state" class="form-control">
                                        <option value="">Select One</option>
                                        @foreach ($states as $state)
                                        <option value="{{$state->name}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('state')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline ">
                                    <label for="city">City</label>
                                    <select id="city" wire:model="city" class="form-control">
                                        <option value="">Select One</option>
                                        @foreach ($cities as $city)
                                        <option value="{{$city->name}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('city')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline ">
                                    <label for="line1">Address Line 1</label>
                                    <input type="line1" class="form-control" id="line1" wire:model="line1">
                                </div>
                                @error('line1')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline ">
                                    <label for="line2">Address Line 2</label>
                                    <input type="line2" class="form-control" id="line2" wire:model="line2">
                                </div>
                                @error('line2')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group input-group-outline ">
                                    <label for="postal_code">Postal Code</label>
                                    <input type="text" class="form-control" id="postal_code" wire:model="postal_code">
                                </div>
                                @error('postal_code')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">

                                <button type="submit" class="btn btn-primary btn-loading"
                                    wire:loading.attr="disabled"
                                    wire:loading.class="loading-active"
                                    wire:target="avatar, update">
                                    Save & Next
                                    <!-- Spinner with Dynamic Space -->
                                    <img wire:loading wire:target="avatar, update"
                                        src="{{ url('assets/img/loading.gif') }}"
                                        class="loading" alt="Loading...">
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                </div>
            </div>
        </div>
    </div>

    </div>
