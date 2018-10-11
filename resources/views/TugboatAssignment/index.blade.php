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
                    <div class="col-lg-5">
                        <div class="card">
                            <section class="sectionDark">
                                <div class="container">
                                    <h5 class="section-header text-center" style="text-transform: uppercase;">
                                    Tugboat List 
                                    <a href="/administrator/maintenance/tugboat" class="float-right btn-sm btn btn-primary waves-effect"data-toggle="tooltip" title="Add new Tugboat"><i class="fas fa-plus"></i></a>
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
                                            @if(count($tugboat)>0)
                                            @foreach($tugboat as $tugboat)
                                                @if($tugboat->enumStatus == 'Available') 
                                                    <div class="row">
                                                        <div class="col mr-3 ml-3">
                                                            <a href="#">
                                                                <div class="card bg-success text-white">
                                                                    <div class="card-header ">
                                                                        <h6 class="text-center mt-2">{{$tugboat->strName}}</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @elseif($tugboat->enumStatus == 'Occupied')
                                                    <div class="row">
                                                        <div class="col mr-3 ml-3">
                                                            <a href="#">
                                                                <div class="card bg-info text-white">
                                                                    <div class="card-header ">
                                                                        <h6 class="text-center mt-2">{{$tugboat->strName}}</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                        </div>
                                        <div class="tab-pane fade" id="pillsReceivedTugboat" role="tabpanel" aria-labelledby="pillsReceivedTugboat-tab">
                                            {{-- <button class="float-right btn btn-block btn-primary waves-effect mb-3 btnRequestTeam"><i class="fas fa-plus mr-2"></i>Request Team</button> --}}
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
                                                                        <button data-id="{{$notugboat->intJobOrderID}}" data-date="{{$notugboat->dtmETA}}" class="createTugboatAssignment btn btn-primary btn-sm text-center float-right ml-2 waves-effect">Assign Tugboat</button>
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
        </h1>
    </section>
    @include('TugboatAssignment.assignmodal')
    @include('TugboatAssignment.assignTugboat')
@endsection