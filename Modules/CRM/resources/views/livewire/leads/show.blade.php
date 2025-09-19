<div class="container-fluid py-4 bg-gray-200">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header p-3 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="w-50">
                            <h6> {{$lead->name}}</h6>
                            <div class="d-flex mb-3">
                                <i class="material-icons text-primary text-sm my-auto me-1">email</i>
                                <span class="mb-0 text-sm"> {{$lead->name}} </span>
                                 <i class="material-icons  text-primary text-sm my-auto me-1">phone</i>
                                <span class="mb-0 text-sm"> {{$lead->phone}} </span>
                            </div>
                        </div>
                        <button class="btn btn-sm bg-gradient-dark mb-0 mt-0 mt-md-n9 mt-lg-0" data-bs-toggle="modal" data-bs-target="#assigned_user_modal">
                            <i class="material-icons text-white position-relative text-md pe-2">add</i>Assign User </button>
                        <button class="btn btn-sm bg-gradient-primary mb-0 mt-0 mt-md-n9 mt-lg-0" data-bs-toggle="modal" data-bs-target="#update_status_modal">
                            <i class="material-icons text-white position-relative text-md pe-2">edit</i> Opportunity
                        </button>
                    </div>
                </div>
                <div class="card-body p-3 pt-0">
                    <hr class="horizontal dark mt-0 mb-4">
                    <div class="row">
                        <div class="col-md-6 task-content">
                            <div class="text-sm mb-1"><b>Reference: </b> {{$lead->reference}} </div>
                            
                            <div class="text-sm mb-1"><b>Source: </b> {{@$lead->source->name}} </div>
                            <div class="text-sm mb-1"><b>Status: </b> {{$lead->status}} </div>
                        </div>
                        <div class="col-md-6 task-content">
                           
                            <div class="text-sm mb-1"><b>Next Followup Date: </b>{{$lead->followup_date}} </div>
                            <div class="text-sm mb-1"><b>Created At: </b> {{$lead->created_at}} </div>
                            <div class="text-sm mb-1"><b>Current Assignee: </b>
                                                                 
                            </div>
                        </div>
                    </div>
                   
                    <hr class="horizontal dark mt-4 mb-4">
                   <div class="row">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item ">
                                    <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="#history" role="tab" aria-controls="history-tab" aria-selected="true">
                                        Lead History
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#assignees" role="tab" aria-controls="assignees-tab" aria-selected="false">
                                        Assigned History
                                    </a>
                                </li>
                            <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: 0.5s; transform: translate3d(0px, 0px, 0px); width: 324px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#history" role="tab" aria-controls="history-tab" aria-selected="true">-</a></div></ul>
                            <div class="tab-content task-details" id="lead-tabs">
                                <div class="tab-pane fade active show" id="history" role="tabpanel" aria-labelledby="history-tab">
                                    <div class="mt-4">
                                        <div class="table-responsive mt-4">
                                        <table class="table align-items-center mb-0">
                                                <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SN</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Comment</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            <span>2024-02-14</span>
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            <span>Mohammad Maseeh</span>
                                                        </td>

                                                    </tr>
                                                                                                    <tr>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>
                                                            <span>2024-02-14</span>
                                                        </td>
                                                        <td>
                                                            opportunity
                                                        </td>
                                                        <td>
                                                            Apologize
                                                        </td>
                                                        <td>
                                                            <span>Mohammad Maseeh</span>
                                                        </td>

                                                    </tr>
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
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <h6 class="mb-0">Comments</h6>
                        </div>
                        <div class="col-lg-6 col-md-6 my-auto text-end">
                            <button class="btn btn-sm bg-gradient-dark mb-0 mt-0 mt-md-n9 mt-lg-0" data-bs-toggle="modal" data-bs-target="#comment_modal">
                                <i class="material-icons text-white position-relative text-md pe-2">add</i>Add Comment </button>
                        </div>
                    </div>

                </div>
                <div class="card-body p-3">
                     <ul class="list-group">
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
 </div>