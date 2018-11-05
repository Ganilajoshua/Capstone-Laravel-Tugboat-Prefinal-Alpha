@extends('Templates.newTemplate')

{{-- Local Styles --}}
@section('assets')
    @include('TugboatAssignment.styles')
@endsection

{{-- Local Scripts --}}
@section('scripted')
    @include('TugboatAssignment.scripts')
@endsection

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>
                Tugboat Assignment
                <small class="smCat">Dispatch &amp; Hauling</small>
            </div>
        </h1>
        <div class="tugboatAssignment animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
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
                                        <ul class="nav nav-pills nav-fill mb-3 border-radius-x text-center" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active mt-2 border border-primary" id="pillsOwnedTugboat-tab" data-toggle="pill" href="#pillsOwnedTugboat" role="tab" aria-controls="pillsOwnedTugboat" aria-selected="true">Owned</a>
                                            </li>
                                            <li class="nav-item pillsReceivedTugboatBadge ml-1">
                                                <a class="nav-link mt-2 border border-primary" id="pillsReceivedTugboat-tab" data-toggle="pill" href="#pillsReceivedTugboat" role="tab" aria-controls="pillsReceivedTugboat" aria-selected="false">Received</a>
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
                                                
                                                @if(count($availtugboat)>0)
                                                    <div class="card-body text-white">
                                                        @foreach($availtugboat as $availtugboat)
                                                            <div class="card mb-2 border border-success text-center">
                                                                <div style="margin-top: 13px; margin-bottom: 13px;" class="row">
                                                                    <div class="col-6">
                                                                        <a href="#" data-id="{{$availtugboat->intTugboatID}}" class="showJobOrdersAssigned float-left text-black mt-2 mb-2 ml-4" data-tooltip="tooltip" title="Assign Team">
                                                                            {{$availtugboat->strName}}
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <button type="button" data-id="{{$availtugboat->intTugboatID}}" data-assign="{{$availtugboat->intTugboatID}}" class="forwardTugboat btn btn-sm btn-primary waves-effect waves-circle float-right mr-4" data-tooltip="tooltip" title="Forward Tugboat">                                                       
                                                                            <i class="ultraminicon fas fa-paper-plane"></i>                                                                        
                                                                        </button>
                                                                        <button type="button" data-id="{{$availtugboat->intTugboatID}}" data-assign="{{$availtugboat->intTugboatID}}" class="forwardTugboat btn btn-sm btn-primary waves-effect waves-circle float-right mr-3" data-tooltip="tooltip" title="Forward Tugboat">                                                       
                                                                            <i class="ultraminicon fas fa-eye"></i>                                                                        
                                                                        </button>
                                                                        <button type="button" data-id="{{$availtugboat->intTugboatID}}" class="showTugboatInformation btn btn-sm btn-info waves-effect waves-circle float-right mr-3" data-tooltip="tooltip" title="Tugboat Information">                                                                        
                                                                            <i class="ultraminicon fas fa-info"></i>                                                                    
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="card bg-success mb-2 text-center">
                                                                <div style="margin-top: 10px;">
                                                                    <a href="#" onclick="selectTugboatTeam({{$compliance->intTugboatID}})"class="teamTugboat text-white">
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
                                            <div class="card-header bg-danger text-white">
                                                <div class="float-right">
                                                    <a data-collapse="#ownedOccupiedT" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                                </div>
                                                <h4 class="text-center ml-5">Disabled</h4>
                                            </div>
                                            <div class="collapse show" id="ownedOccupiedT">
                                                @if(count($distugboat)>0)
                                                    <div class="card-body text-white">
                                                        @foreach($distugboat as $distugboat)
                                                            <div class="card mb-2 border border-danger text-center">
                                                                <div style="margin-top: 13px; margin-bottom: 13px;">
                                                                    <a href="#" data-id="" class="occupiedTugboats float-left text-black mt-2 mb-2 ml-4" data-tooltip="tooltip" title="View Team">
                                                                        {{$distugboat->strName}}
                                                                    </a>
                                                                    <button type="button" data-id="{{$distugboat->intTugboatID}}" class="tugboatInformation btn btn-sm btn-danger waves-effect waves-circle float-right mr-4" data-tooltip="tooltip" title="Show Information About Disabled Tugboat">                                                                        
                                                                        <i class="miniIcon fas fa-times"></i>                                                                    
                                                                    </button>
                                                                    <button type="button" data-id="{{$distugboat->intTugboatID}}" class="tugboatInformation btn btn-sm btn-info waves-effect waves-circle float-right mr-3" data-tooltip="tooltip" title="Tugboat Information">                                                                        
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
                                                                            <button type="button" data-id="{{$tugboatsreceived->intTAssignID}}" class="returnTugboat btn btn-sm btn-info waves-effect waves-circle float-right mr-4" data-tooltip="tooltip" title="Return Tugboat">
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
                                                                    <i class="fas fa-exclamation-triangle mr-2"></i>No Received Tugboats Found!
                                                                </div>
                                                            </div>
                                                        @endif
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
                {{-- Right Column --}}
                <div class="col-lg-6">
                    <div class="card">
                        <section class="sectionDark">
                            <div class="container">
                                <h5 class="section-header text-center" style="text-transform: uppercase;">
                                Job Order  List  
                                </h5>
                            </div>
                            <div class="container">
                                <ul class="nav nav-pills nav-fill mb-2" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pillsAssignT-tab" data-toggle="pill" href="#pillsAssignT" role="tab" aria-controls="pillsAssignT" aria-selected="true">Assign Tugboat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pillsProceedH-tab" data-toggle="pill" href="#pillsProceedH" role="tab" aria-controls="pillsProceedH" aria-selected="false">Proceed To Hauling</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pillsAssignT" role="tabpanel" aria-labelledby="pillsAssignT-tab">
                                        
                                            @if(Auth::user()->enumUserType == 'Admin')
                                                @if(count($notugboat) > 0)
                                                    @foreach($notugboat as $notugboat)
                                                        <div class="col-lg-12 joborder" data-id="{{$notugboat->intJobOrderID}}">
                                                            <div class="card card-sm-2 card-primary border-primary">
                                                                <div class="card-icon">
                                                                    <i class="ion ion-android-boat text-primary"></i>
                                                                </div>
                                                                <div class="card-header">
                                                                    <h4 class="text-primary mb-2">Job Order # {{$notugboat->intJobOrderID}}</h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <h5>{{$notugboat->strCompanyName}}</h5>
                                                                </div>
                                                                <div class="card-footer mt-2">
                                                                    <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                                    <button data-id="{{$notugboat->intJobOrderID}}" data-date="{{$notugboat->datStartDate}}" class="createTugboatAssignment btn btn-primary btn-sm text-center float-right ml-2 waves-effect">Assign Tugboat</button>
                                                                    {{-- onclick="showTugboatModal({{$notugboat->intJobOrderID}})" --}}
                                                                    {{-- onclick="showTugboatModal({{$notugboat->intJobOrderID}})" --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @elseif(Auth::user()->enumUserType == 'Affiliates')
                                                @if(count($noftugboat) > 0)
                                                    @foreach($noftugboat as $noftugboat)
                                                        <div class="col-lg-12">
                                                            <div class="card card-sm-2 card-primary border-primary">
                                                                <div class="card-icon">
                                                                    <i class="ion ion-android-boat text-primary"></i>
                                                                </div>
                                                                <div class="card-header">
                                                                    <h4 class="text-primary mb-2">Job Order # {{$noftugboat->intJobOrderID}}</h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <h5>{{$noftugboat->strCompanyName}}</h5>
                                                                </div>
                                                                <div class="card-footer mt-2">
                                                                        <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                                        <button data-id="{{$noftugboat->intJOFRJobOrderID}}" data-date="{{$noftugboat->dtmETA}}" class="createTugboatAssignment btn btn-primary btn-sm text-center float-right ml-2 waves8-effect">Assign Tugboat</button>
                                                                    {{-- <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                                    <button onclick="showTugboatModal({{$noftugboat->intJobOrderID}})" class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect">Assign Tugboat</button> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @endif
                                    </div>
                                    <div class="tab-pane fade" id="pillsProceedH" role="tabpanel" aria-labelledby="pillsProceedH-tab">
                                        @if(Auth::user()->enumUserType == 'Admin')
                                            @if(count($jobschedule) > 0)
                                                @foreach($jobschedule as $jobschedule)
                                                    <div class="col-lg-12">
                                                        <div class="card card-sm-2 card-primary border-primary">
                                                            <div class="card-icon">
                                                                <i class="ion ion-android-boat text-primary"></i>
                                                            </div>
                                                            <div class="card-header">
                                                                <h4 class="text-primary mb-2">Job Order # {{$jobschedule->intJobOrderID}}</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5>{{$jobschedule->strCompanyName}}</h5>
                                                            </div>
                                                            <div class="card-footer mt-2">
                                                                <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                                <button onclick="proceedToHauling({{$jobschedule->intJobOrderID}})" class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect">Proceed To Hauling</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="alert alert-danger text-center">
                                                    <i class="fas fa-exclamation-triangle mr-2"></i>NO RESULTS FOUND!
                                                </div>
                                            @endif
                                        @elseif(Auth::user()->enumUserType == 'Affiliates')
                                            @foreach($jobschedulef as $jobschedulef)
                                                <div class="col-lg-12">
                                                    <div class="card card-sm-2 card-primary border-primary">
                                                        <div class="card-icon">
                                                            <i class="ion ion-android-boat text-primary"></i>
                                                        </div>
                                                        <div class="card-header">
                                                            <h4 class="text-primary mb-2">Job Order # {{$jobschedulef->intJobOrderID}}</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <h5>{{$jobschedulef->strCompanyName}}</h5>
                                                        </div>
                                                        <div class="card-footer mt-2">
                                                            <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                            <button onclick="proceedToHauling({{$jobschedulef->intJobOrderID}})" class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect">Proceed To Hauling</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>    
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('TugboatAssignment.assignmodal')
    @include('TugboatAssignment.assignTugboat')
    @include('TugboatAssignment.canceljoborderModal');
    @include('TugboatAssignment.tugboatJoborders')
    @include('TugboatAssignment.info')
@endsection