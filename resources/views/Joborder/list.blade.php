<div class="animated fadeIn jobOrderList">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="float-left">
                        <div class="dropdown" id="jobOrderChoices">
                            <button class="btn btn-primary dropdown-toggle waves-effect" type="button" id="ddJobOrder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Created Job Orders
                            </button>
                            <div class="dropdown-menu text-center" aria-labelledby="ddJobOrder">
                                <a id="createdJO" class="dropdown-item waves-effect active" href="#">Created</a>
                                <a id="pendingJO" class="dropdown-item waves-effect" href="#">Pending</a>
                                <a id="forwardJO" class="dropdown-item waves-effect" href="#">Forwarded</a>
                                <a id="declinedJO" class="dropdown-item waves-effect" href="#">Declined</a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="float-right">
                        <button class="btn btn-primary text-center waves-effect btnAddJO">
                            Add Job Order
                        </button>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        @if(count($accepted)>0)
                            @foreach($accepted as $accepted)
                                <div class="col-12 col-sm-12 col-lg-6 createdCards">
                                    <div class="card card-sm-2 card-primary border-primary">
                                        <div class="card-icon">
                                            <i class="ion ion-android-boat text-primary"></i>
                                        </div>
                                        <div class="card-header">
                                            <h4 class="text-primary mb-2">Job Order # {{$accepted->intJobOrderID}}</h4>
                                        </div>
                                        <div class="card-body">
                                            <h5>{{$accepted->strCompanyName}}</h5>
                                        </div>
                                        <div class="card-footer mt-2">
                                            <a href="#" data-id="{{$accepted->intJobOrderID}}" class="joborderMoreInfoButton">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                            <button class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect" data-toggle="modal" data-target="#forwardModal">Forward</button>
                                            <button onclick="createJobsched({{$accepted->intJobOrderID}})" class="btn btn-primary btn-sm text-center float-right waves-effect">Make Job Schedule</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @elseif(count($accepted) == 'null' || 0)
                        @endif
                        @if(count($forwarded)>0)
                            @foreach($forwarded as $forwarded)
                                <div class="col-12 col-sm-12 col-lg-6 forwardedCards">
                                    <div class="card card-sm-2 card-primary border-primary">
                                        <div class="card-icon">
                                            <i class="ion ion-android-boat text-primary"></i>
                                        </div>
                                        <div class="card-header">
                                            <h4 class="text-primary mb-2">Job Order # {{$forwarded->intJobOrderID}}</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4>{{$forwarded->strJODesc}}</h4>
                                            <h5>{{$forwarded->strCompanyName}}</h5>
                                        </div>
                                        <div class="card-footer mt-2">
                                            <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                            <button class="btn btn-danger btn-sm text-center float-right ml-2 waves-effect btnDeclineJO">Cancel</button>
                                            {{-- <button class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect" data-toggle="modal" data-target="#forwardModal">Forward</button>
                                            <button class="btn btn-primary btn-sm text-center float-right waves-effect btnAcceptJO">Accept</button> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @elseif(count($forwarded) == 'null' || 0)
                            
                        @endif
                        {{-- pending cards  --}}
                        @if(count($joborders)>0)
                            @foreach($joborders as $joborders)
                                <div class="col-12 col-sm-12 col-lg-6 pendingCards">
                                    <div class="card card-sm-2 card-primary border-primary active">
                                        <div class="card-icon">
                                            <i class="ion ion-android-boat text-primary"></i>
                                        </div>
                                        <div class="card-header">
                                            <h4 class="text-primary mb-2">Job Order # {{$joborders->intJobOrderID}}</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="mt-2">{{$joborders->strJOTitle}}</h4>
                                            <h6 class="mt-3">{{$joborders->strCompanyName}}</h6>
                                        </div>
                                        <div class="card-footer mt-2">
                                            <a href="#" data-id="{{$joborders->intJobOrderID}}" class="joborderMoreInfoButton" >More Info <i class="ion ion-ios-arrow-right"></i></a>
                                            <button data-id="{{$joborders->intJobOrderID}} "class="btn btn-danger btn-sm text-center float-right ml-2 waves-effect declineJoborder">Decline</button> 
                                            <button data-id="{{$joborders->intJobOrderID}} "class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect forwardJoborder">Forward</button>
                                            <button data-id="{{$joborders->intJobOrderID}}" class="btn btn-primary btn-sm text-center float-right waves-effect acceptJoborder">Accept</button>         
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @elseif(count($joborders) == 0)
                        @endif
                        @if(count($declined)>0)
                            @foreach($declined as $declined)
                                <div class="col-12 col-sm-12 col-lg-6 declinedCards">
                                    <div class="card card-sm-2 card-primary border-primary active">
                                        <div class="card-icon">
                                            <i class="ion ion-android-boat text-primary"></i>
                                        </div>
                                        <div class="card-header">
                                            <h4 class="text-primary mb-2">Job Order #{{$declined->intJobOrderID}}</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="mt-2">{{$declined->strJOTitle}}</h4>
                                            <h6 class="mt-3">{{$declined->strCompanyName}}</h6>
                                        </div>
                                        <div class="card-footer mt-2">
                                                {{$declined->intJobOrderID}}
                                            <a href="#" data-id="{{$declined->intJobOrderID}}" class="joborderMoreInfoButton" >More Info <i class="ion ion-ios-arrow-right"></i></a>
                                            {{-- <button data-id="{{$declined->intJobOrderID}} "class="btn btn-danger btn-sm text-center float-right ml-2 waves-effect declineJoborder">Decline</button> 
                                            <button data-id="{{$declined->intJobOrderID}} "class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect forwardJoborder">Forward</button>
                                            <button data-id="{{$declined->intJobOrderID}}" class="btn btn-primary btn-sm text-center float-right waves-effect acceptJoborder">Accept</button>          --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @elseif(count($declined) == 0)
                        @endif
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i class="ion ion-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="ion ion-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="forwardfooter">
    
</div>