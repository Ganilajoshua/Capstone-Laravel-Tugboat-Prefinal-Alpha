@extends('Templates.newTemplate')
@section('assets')
    @include('TeamAssignment.style')
    @include('TeamAssignment.scripts')
@endsection

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>
                Team Builder
                <small class="smCat">
                    Dispatch &amp; Hauling
                </small>
            </div>
        </h1>
        <div class="teamAssignment animated fadeIn">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <section class="sectionDark">
                            <div class="container">
                                <h5 class="section-header text-center" style="text-transform: uppercase;">
                                Team List 
                                <button class="float-right btn-sm btn btn-primary waves-effect" data-toggle="modal" data-target="#addTeam" data-tooltip="tooltip" title="Add New Team">
                                  <i class="fas fa-plus"></i>
                                </button>
                              </h5>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pillsCreatedTeam-tab" data-toggle="pill" href="#pillsCreatedTeam" role="tab" aria-controls="pillsCreatedTeam" aria-selected="true">Created</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pillsReceivedTeam-tab" data-toggle="pill" href="#pillsReceivedTeam" role="tab" aria-controls="pillsReceivedTeam" aria-selected="false">Received</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pillsCreatedTeam" role="tabpanel" aria-labelledby="pillsCreatedTeam-tab">
                                        @if(count($team)>0)
                                            @foreach($team as $team)
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="#">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h6 class="float-left mt-2">{{$team->strTeamName}}</h6>
                                                                    <button type="button" class="delItem btn btn-sm btn-danger waves-effect waves-circle float-right" data-toggle="tooltip" title="Delete">
                                                                        <i class="miniIcon fas fa-trash"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-sm btn-secondary waves-effect waves-circle float-right mr-2" data-toggle="modal" data-target="#editTeam" data-tooltip="tooltip" title="Edit">
                                                                        <i class="miniIcon ion ion-edit"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="pillsReceivedTeam" role="tabpanel" aria-labelledby="pillsReceivedTeam-tab">
                                        <button class="float-right btn btn-block btn-primary waves-effect mb-3 btnRequestTeam"><i class="fas fa-plus mr-2"></i>Request Team</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <section class="sectionDark">
                            <div class="container">
                                <h5 class="section-header text-center" style="text-transform: uppercase;">
                                Tugboat List  
                              </h5>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pillsOwnedTugboat-tab" data-toggle="pill" href="#pillsOwnedTugboat" role="tab" aria-controls="pillsOwnedTugboat" aria-selected="true">Owned</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pillsReceivedTugboat-tab" data-toggle="pill" href="#pillsReceivedTugboat" role="tab" aria-controls="pillsReceivedTugboat" aria-selected="false">Received</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pillsOwnedTugboat" role="tabpanel" aria-labelledby="pillsOwnedTugboat-tab">
                                        <div class="card">
                                            <div class="card-header bg-success text-white">
                                                <div class="float-right">
                                                    <a data-collapse="#ownedAvailableT" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                                </div>
                                                <h4 class="text-center ml-5">Available</h4>
                                            </div>
                                            <div class="collapse show" id="ownedAvailableT">
                                                <div class="card-body">
                                                    <div class="card card-success">
                                                        <div class="card-header text-center">
                                                            <h4>Energy Sun</h4>
                                                        </div>
                                                        <div class="card-body text-white">
                                                            <div class="card bg-success" style="margin-top: 0px;">
                                                                <div style="margin-top: 10px;">
                                                                    @if(count($compliance)>0)
                                                                        @foreach($compliance as $compliance)
                                                                            <a href="#" onclick="selectTugboatTeam({{$compliance->intTAssignID}})"class="teamTugboat text-white">
                                                                                <div class="card-header" id="dismissTeam">
                                                                                    {{$compliance->strName}}
                                                                                    <div class="float-right">
                                                                                        <a data-dismiss="#dismissTeam" class="btn btn-icon"><i class="ion ion-close"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header bg-info text-white">
                                                <div class="float-right">
                                                    <a data-collapse="#ownedOccupiedT" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                                </div>
                                                <h4 class="text-center ml-5">Occupied</h4>
                                            </div>
                                            <div class="collapse show" id="ownedOccupiedT">
                                                @if(count($tugboatAvail)>0)
                                                    <div class="card-body text-white">
                                                        <div class="card bg-info" style="margin-top: 0px;">                                      
                                                            @foreach($tugboatAvail as $tugboatAvail)
                                                                <a href="#" onclick="selectTugboatTeam({{$tugboatAvail->intTAssignID}})"class="teamTugboat text-white">
                                                                    <div class="card-header" id="dismissTeam">
                                                                        {{$tugboatAvail->strName}}
                                                                        <div class="float-right">
                                                                            <a data-dismiss="#dismissTeam" class="btn btn-icon"><i class="ion ion-close"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="card-body">
                                                        <div class=" text-danger text-center">
                                                            <i class="fas fa-times mr-2"></i> No Occupied Tugboat <i class="fas fa-times ml-2"></i>
                                                        </div>
                                                    </div>
                                                @endif                                               
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header bg-danger text-white">
                                                <div class="float-right">
                                                    <a data-collapse="#ownedUnderRepairT" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                                </div>
                                                <h4 class="text-center ml-5">Disabled</h4>
                                            </div>
                                            <div class="collapse show" id="ownedUnderRepairT">
                                                <div class="card-body">
                                                    <div class=" text-danger text-center">
                                                        <i class="fas fa-times mr-2"></i> No Disabled Tugboat <i class="fas fa-times ml-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pillsReceivedTugboat" role="tabpanel" aria-labelledby="pillsReceivedTugboat-tab">
                                        <div class="row">
                                            <button class="float-right btn btn-block btn-primary waves-effect mb-3 mr-3 ml-3 btnRequestTugboat"><i class="fas fa-plus mr-2"></i>Request Tugboat</button>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="card">
                                                    <div class="card-header bg-success text-white">
                                                        <div class="float-right">
                                                            <a data-collapse="#receivedAvailableT" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                                        </div>
                                                        <h4 class="text-center ml-5">Available</h4>
                                                    </div>
                                                    <div class="collapse show" id="receivedAvailableT">
                                                        <div class="card-body">
                                                            <div class="card card-success">
                                                                <div class="card-header text-center">
                                                                    <h4>Energy Sun</h4>
                                                                </div>
                                                                <div class="card-body text-white">
                                                                    <div class="card bg-success">
                                                                        <div class="card-header" id="dismissTeam2">
                                                                            Team Energy Sun
                                                                            <div class="float-right">
                                                                                <a data-dismiss="#dismissTeam2" class="btn btn-icon"><i class="ion ion-close"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header bg-info text-white">
                                                        <div class="float-right">
                                                            <a data-collapse="#receivedOccupiedT" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                                        </div>
                                                        <h4 class="text-center ml-5">Occupied</h4>
                                                    </div>
                                                    <div class="collapse show" id="receivedOccupiedT">
                                                        <div class="card-body">
                                                            <div class=" text-danger text-center">
                                                                <i class="fas fa-times mr-2"></i> No Occupied Tugboat <i class="fas fa-times ml-2"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('TeamAssignment.createTeam')
    @include('TeamAssignment.create')
@endsection