@extends('Templates.newTemplate')

{{-- Local Styles --}}
@section('assets')
    @include('TeamAssignment.style')
@endsection

{{-- Local Scripts --}}
@section('scripted')
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
                                <button class="float-right btn-sm btn btn-primary waves-effect addNewTeamButton" data-tooltip="tooltip" title="Add New Team">
                                  <i class="fas fa-plus"></i>
                                </button>
                              </h5>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active border border-primary" id="pillsCreatedTeam-tab" data-toggle="pill" href="#pillsCreatedTeam" role="tab" aria-controls="pillsCreatedTeam" aria-selected="true">Created</a>
                                            </li>
                                            <li class="nav-item ml-1">
                                                <a class="nav-link border border-primary" id="pillsReceivedTeam-tab" data-toggle="pill" href="#pillsReceivedTeam" role="tab" aria-controls="pillsReceivedTeam" aria-selected="false">Received</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    {{-- Current Team --}}
                                    <div class="tab-pane fade show active" id="pillsCreatedTeam" role="tabpanel" aria-labelledby="pillsCreatedTeam-tab">
                                        @if(count($requestteam)>0)
                                            @foreach($requestteam as $requestteam)
                                                @if(($requestteam->intTForwardCompanyID) != null)
                                                    <div class="row">
                                                        <div class="col">
                                                            {{-- <a href="#" id="viewTeamButton"> --}}
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <a href="#" class="viewTeamButton" data-id="{{$requestteam->intTeamID}}"><h6 class="float-left mt-2">{{$requestteam->strTeamName}}</h6></a>
                                                                        <button disabled type="button" data-id="{{$requestteam->intTeamID}}" class="removeTeamEmployees btn btn-sm btn-danger waves-effect waves-circle float-right" data-tooltip="tooltip" title="Delete">
                                                                            <i class="miniIcon fas fa-times"></i>
                                                                        </button>
                                                                        <button disabled type="button" data-id="{{$requestteam->intTeamID}}" class="forwardTeamButtonModal btn btn-sm btn-primary waves-effect waves-circle float-right mr-2" data-tooltip="tooltip" title="Forward Team">
                                                                            <i class="miniIcon fas fa-paper-plane"></i>
                                                                        </button>
                                                                        <button disabled type="button" data-id="{{$requestteam->intTeamID}}" class="editButton btn btn-sm btn-secondary waves-effect waves-circle float-right mr-2" data-tooltip="tooltip" title="Edit">
                                                                            <i class="miniIcon ion ion-edit"></i>
                                                                        </button>
                                                                        
                                                                    </div>
                                                                </div>
                                                            {{-- </a> --}}
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row">
                                                        <div class="col">
                                                            {{-- <a href="#" id="viewTeamButton"> --}}
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <a href="#" class="viewTeamButton" data-id="{{$requestteam->intTeamID}}"><h6 class="float-left mt-2">{{$requestteam->strTeamName}}</h6></a>
                                                                        <button type="button" data-id="{{$requestteam->intTeamID}}" class="removeTeamEmployees btn btn-sm btn-danger waves-effect waves-circle float-right" data-tooltip="tooltip" title="Delete">
                                                                            <i class="miniIcon fas fa-times"></i>
                                                                        </button>
                                                                        <button type="button" data-id="{{$requestteam->intTeamID}}" class="forwardTeamButtonModal btn btn-sm btn-primary waves-effect waves-circle float-right mr-2" data-tooltip="tooltip" title="Forward Team">
                                                                            <i class="miniIcon fas fa-paper-plane"></i>
                                                                        </button>
                                                                        <button type="button" data-id="{{$requestteam->intTeamID}}" class="editButton btn btn-sm btn-secondary waves-effect waves-circle float-right mr-2" data-tooltip="tooltip" title="Edit">
                                                                            <i class="miniIcon ion ion-edit"></i>
                                                                        </button>
                                                                        
                                                                    </div>
                                                                </div>
                                                            {{-- </a> --}}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    {{-- Request Team --}}
                                    <div class="tab-pane fade" id="pillsReceivedTeam" role="tabpanel" aria-labelledby="pillsReceivedTeam-tab">
                                        <div class="row">
                                            <div class="col">
                                                <button class="float-right btn btn-block btn-primary waves-effect mb-3 requestTeamButtonModal"><i class="fas fa-plus mr-2"></i>Request Team</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                @if(count($teamsreceived)>0)
                                                    @foreach($teamsreceived as $teamsreceived)
                                                        <div class="row">
                                                            <div class="col">
                                                                {{-- <a href="#" id="viewTeamButton"> --}}
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row"></div><a href="#" class="viewTeamButton" data-id="{{$teamsreceived->intTeamID}}"><h4 class="float-left mt-2">{{$teamsreceived->strTeamName}}</h4></a>
                                                                            <button type="button" data-id="{{$teamsreceived->intTeamID}}" class="returnTeam btn btn-sm btn-info waves-effect waves-circle float-right mt-2" data-tooltip="tooltip" title="Return Team">
                                                                                <i class="miniIcon fas fa-undo"></i>
                                                                            </button>
                                                                            <small class="float-left" style="font-size: 12px;">FROM : {{$teamsreceived->strCompanyName}}</small>
                                                                            {{-- <button type="button" data-id="{{$teamsreceived->intTeamID}}" class="editButton btn btn-sm btn-secondary waves-effect waves-circle float-right mr-2" data-tooltip="tooltip" title="Edit">
                                                                                <i class="miniIcon ion ion-edit"></i>
                                                                            </button> --}}
                                                                        </div>
                                                                    </div>
                                                                {{-- </a> --}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="card card-danger border-danger">
                                                        <div class="card-body">
                                                            <h6>
                                                                <div class=" text-danger text-center">
                                                                    <i class="fas fa-times mr-2 mt-2"></i> No Teams Received <i class="fas fa-times ml-2"></i>
                                                                </div>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
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
                                <h5 class="section-header text-center tugboatListTitle" style="text-transform: uppercase;">
                                Job Order List  
                              </h5>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <ul class="nav nav-pills nav-fill mb-3 border-radius-x text-center" id="pills-tab" role="tablist">
                                            <li class="nav-item mr-1">
                                                <a class="nav-link mt-2 border border-primary active" id="pillsJobOrder-tab" data-toggle="pill" href="#pillsJobOrder" role="tab" aria-controls="pillsJobOrder" aria-selected="false">Job Order List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link mt-2 border border-primary" id="pillsOwnedTugboat-tab" data-toggle="pill" href="#pillsOwnedTugboat" role="tab" aria-controls="pillsOwnedTugboat" aria-selected="true">Owned</a>
                                            </li>
                                            <li class="nav-item pillsReceivedTugboatBadge ml-1">
                                                <a class="nav-link mt-2 border border-primary" id="pillsReceivedTugboat-tab" data-toggle="pill" href="#pillsReceivedTugboat" role="tab" aria-controls="pillsReceivedTugboat" aria-selected="false">Received</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade" id="pillsOwnedTugboat" role="tabpanel" aria-labelledby="pillsOwnedTugboat-tab">
                                        <div class="card">
                                            <div class="card-header bg-success text-white">
                                                <div class="float-right">
                                                    <a data-collapse="#ownedAvailableT" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                                </div>
                                                <h4 class="text-center ml-5">Available</h4>
                                            </div>
                                            <div class="collapse show" id="ownedAvailableT">
                                                
                                                @if(count($compliance)>0)
                                                    <div class="card-body text-white">
                                                        @foreach($compliance as $compliance)
                                                            <div class="card mb-2 border border-success text-center">
                                                                <div style="margin-top: 13px; margin-bottom: 13px;">
                                                                    <a href="#" data-id="{{$compliance->intTAssignID}}" onclick="selectTugboatTeam({{$compliance->intTAssignID}})"class="occupiedTugboats float-left text-black mt-2 mb-2 ml-4" data-tooltip="tooltip" title="Assign Team">
                                                                        {{$compliance->strName}}
                                                                    </a>
                                                                    <button type="button" data-id="{{$compliance->intTATugboatID}}" data-assign="{{$compliance->intTAssignID}}" class="forwardTugboat btn btn-sm btn-primary waves-effect waves-circle float-right mr-4" data-tooltip="tooltip" title="Forward Tugboat">                                                       
                                                                        <i class="ultraminicon fas fa-paper-plane"></i>                                                                        
                                                                    </button>
                                                                    <button type="button" data-id="{{$compliance->intTATugboatID}}" class="tugboatInformation btn btn-sm btn-info waves-effect waves-circle float-right mr-3" data-tooltip="tooltip" title="Tugboat Information">                                                                        
                                                                        <i class="ultraminicon fas fa-info"></i>                                                                    
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="card bg-success mb-2 text-center">
                                                                <div style="margin-top: 10px;">
                                                                    <a href="#" onclick="selectTugboatTeam({{$compliance->intTAssignID}})"class="teamTugboat text-white">
                                                                        <div class="card-header">
                                                                            {{$compliance->strName}}
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div> --}}
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="card-body">
                                                        <div class="alert alert-danger text-center">
                                                            <i class="fas fa-exclamation-triangle mr-2"></i>No Available Tugboats Found!
                                                        </div>
                                                    </div>
                                                @endif

                                                
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
                                                    {{$tugboatAvail}}
                                                    <div class="card-body text-white">
                                                        @foreach($tugboatAvail as $tugboatAvail)
                                                            <div class="card mb-2 border border-info text-center">
                                                                <div style="margin-top: 13px; margin-bottom: 13px;">
                                                                    <a href="#" data-id="{{$tugboatAvail->intTATeamID}}" class="occupiedTugboats float-left text-black mt-2 mb-2 ml-4" data-tooltip="tooltip" title="View Team">
                                                                        {{$tugboatAvail->strName}}
                                                                    </a>
                                                                    <button type="button" data-id="{{$tugboatAvail->intTAssignID}}" class="tugboatInformation btn btn-sm btn-danger waves-effect waves-circle float-right mr-4" data-tooltip="tooltip" title="Remove Team Assigned">                                                                        
                                                                        <i class="miniIcon fas fa-times"></i>                                                                    
                                                                    </button>
                                                                    <button type="button" data-id="{{$tugboatAvail->intTATugboatID}}" class="tugboatInformation btn btn-sm btn-info waves-effect waves-circle float-right mr-3" data-tooltip="tooltip" title="Tugboat Information">                                                                        
                                                                        <i class="ultraminicon fas fa-info"></i>                                                                    
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="card-body">
                                                        <div class="alert alert-danger text-center">
                                                            <i class="fas fa-exclamation-triangle mr-2"></i>
                                                            No Tugboats Found!
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
                                                        <div class="alert alert-danger text-center">
                                                            <i class="fas fa-exclamation-triangle mr-2"></i>No Tugboats Found!
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pillsReceivedTugboat" role="tabpanel" aria-labelledby="pillsReceivedTugboat-tab">
                                        <div class="row">
                                            <button class="float-right btn btn-block btn-primary waves-effect mb-3 mr-3 ml-3 requestTugboatButtonModal"><i class="fas fa-plus mr-2"></i>Request Tugboat</button>
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
                                                        @if(count($tugboatsreceived)>0)
                                                            <div class="card-body card-success border-success">
                                                                @foreach($tugboatsreceived as $tugboatsreceived)
                                                                    <div class="card mb-2 border border-success text-center">
                                                                        <div style="margin-top: 13px; margin-bottom: 13px;">
                                                                            <a href="#" data-id="{{$tugboatsreceived->intTAssignID}}" class="occupiedTugboats float-left text-black mt-2 mb-2 ml-4">
                                                                                {{$tugboatsreceived->strName}}
                                                                            </a>
                                                                            <button type="button" data-id="{{$tugboatsreceived->intTAssignID}}" class="returnTugboats tugboatsReturn btn btn-sm btn-info waves-effect waves-circle float-right mr-4" data-tooltip="tooltip" title="Return Tugboat">
                                                                                </span>
                                                                                    <i class="ultraminicon fas fa-undo"></i>
                                                                                <span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <div class="card-body">
                                                                <div class="alert alert-danger text-center">
                                                                    <i class="fas fa-exclamation-triangle mr-2"></i>NO RECEIVED TUGBOATS FOUND!
                                                                </div>
                                                            </div>
                                                        @endif
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
                                                            <div class="alert alert-danger text-center">
                                                                <i class="fas fa-exclamation-triangle mr-2"></i>NO RECEIVED OCCOUPIED TUGBOATS FOUND!
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active" id="pillsJobOrder" role="tabpanel" aria-labelledby="pillsJobOrder-tab">
                                        @if(count($notugboatteam) > 0)
                                            @foreach($notugboatteam as $notugboatteam)
                                                <div class="col-lg-12 joborder" data-id="{{$notugboatteam->intJobOrderID}}">
                                                    <div class="card card-sm-2 card-primary border-primary">
                                                        <div class="card-icon">
                                                            <i class="ion ion-android-boat text-primary"></i>
                                                        </div>
                                                        <div class="card-header">
                                                            <h4 class="text-primary mb-2">Job Order # {{$notugboatteam->intJobOrderID}}</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <h5>{{$notugboatteam->strCompanyName}}</h5>
                                                        </div>
                                                        <div class="card-footer mt-2">
                                                            <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                            <button data-id="{{$notugboatteam->intJobOrderID}}" data-date="{{$notugboatteam->dtmETA}}" class="assignTeam btn btn-primary btn-sm text-center float-right ml-2 waves-effect">Assign Team</button>
                                                            {{-- onclick="showTugboatModal({{$notugboat->intJobOrderID}})" --}}
                                                            {{-- onclick="showTugboatModal({{$notugboat->intJobOrderID}})" --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
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
    @include('TeamAssignment.edit')
    @include('TeamAssignment.info')
    @include('TeamAssignment.viewTeamModal')
    @include('TeamAssignment.requestTeamModal')
    @include('TeamAssignment.requestTugboatModal')
    @include('TeamAssignment.forwardTeamModal')
    @include('TeamAssignment.forwardTugboatModal')
    @include('TeamAssignment.tugboatInfoModal')
    @include('TeamAssignment.assignTeam')
    @include('TeamAssignment.defaultTeamsModal')
@endsection
