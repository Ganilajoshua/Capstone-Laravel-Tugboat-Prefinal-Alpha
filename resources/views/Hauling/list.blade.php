<!-- Job Order List -->
<div class="animated fadeIn jobOrderList">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="col">
                        <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pillsPending-tab" data-toggle="pill" href="#pillsPending" role="tab" aria-controls="pillsPending" aria-selected="true">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pillsActive-tab" data-toggle="pill" href="#pillsActive" role="tab" aria-controls="pillsActive" aria-selected="false">Active</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pillsPending" role="tabpanel" aria-labelledby="pillsPending-tab">
                            <div class="row">
                                <input type="hidden" class="pendingJobsNotifs" value="{{$pendingjobs}}">
                                @if(count($pendingjobs) > 0)
                                    @foreach($pendingjobs as $pendingjobs)
                                        <div class="col-12 col-sm-12 col-lg-6">
                                            <div class="card card-sm-2 card-primary border-primary pendingCards">
                                                <div class="card-icon">
                                                    <i class="ion ion-android-boat text-primary"></i>
                                                </div>
                                                <div class="card-header">
                                                    <h4 class="text-primary mb-2">Job Order # {{$pendingjobs->intJobOrderID}} <span id="joborder{{$pendingjobs->intJobOrderID}}"></span></h4>
                                                </div>
                                                <div class="card-body">
                                                    <h3>{{$pendingjobs->strJOTitle}}</h3>
                                                    <h6>{{$pendingjobs->strCompanyName}}</h6>
                                                </div>
                                                <div class="card-footer mt-2">
                                                    {{$pendingjobs->intJobOrderID}}
                                                    <a href="#" class="joborderHaulingInfo" data-id="{{$pendingjobs->intJobOrderID}}">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                    {{-- <button data-id="{{$pendingjobs->intJobOrderID}}" class="terminateHauling btn btn-danger btn-sm text-center float-right ml-2 waves-effect">End</button> --}}
                                                    <button data-id="{{$pendingjobs->intJobOrderID}}" id="joborder{{$pendingjobs->intJobOrderID}}Button" class="viewStartHauling btn btn-primary btn-sm text-center float-right ml-2 waves-effect">Start</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <div class="alert alert-danger text-center">
                                            <i class="fas fa-exclamation-triangle mr-2"></i>No Job Orders Found!
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pillsActive" role="tabpanel" aria-labelledby="pillsActive-tab">
                            <div class="row">
                                @if(count($ongoingjobs)>0)
                                    @foreach($ongoingjobs as $ongoingjobs)
                                        <div class="col-12 col-sm-12 col-lg-6">
                                            <div class="card card-sm-2 card-primary border-primary activeCards">
                                                <div class="card-icon">
                                                    <i class="ion ion-android-boat text-primary"></i>
                                                </div>
                                                <div class="card-header">
                                                    <h4 class="text-primary mb-2">Job Order # {{$ongoingjobs->intJobOrderID}}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h5>{{$ongoingjobs->strCompanyName}}</h5>
                                                    <h6>Time Started : 
                                                        <small>
                                                            {{$ongoingjobs->dateStarted}} - {{$ongoingjobs->tmStarted}}

                                                        </small> 
                                                    </h6>
                                                </div>
                                                <div class="card-footer mt-2">
                                                    <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                    <button data-id="{{$ongoingjobs->intJobOrderID}}" class="terminateHauling btn btn-danger btn-sm text-center float-right ml-2 waves-effect">End</button>
                                                    <button data-id="{{$ongoingjobs->intJSDispatchTicketID}}" class="updateLocation btn btn-primary btn-sm text-center float-right ml-2 waves-effect">Update Location</button>
                                                    <button data-id="{{$ongoingjobs->intJSDispatchTicketID}}" class="showUpdates btn btn-primary btn-sm text-center float-right waves-effect">Show Updates</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <div class="alert alert-danger text-center">
                                            <i class="fas fa-exclamation-triangle mr-2"></i>No Job Orders Found!
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
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
