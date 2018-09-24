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
                                @if(count($joborder) > 0)
                                    @foreach($joborder as $joborder)
                                        <div class="col-12 col-sm-12 col-lg-6">
                                            <div class="card card-sm-2 card-primary border-primary pendingCards">
                                                <div class="card-icon">
                                                    <i class="ion ion-android-boat text-primary"></i>
                                                </div>
                                                <div class="card-header">
                                                    <h4 class="text-primary mb-2">Job Order # {{$joborder->intJobOrderID}}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h3>{{$joborder->strJODesc}}</h3>
                                                    <h6>{{$joborder->strCompanyName}}</h6>
                                                </div>
                                                <div class="card-footer mt-2">
                                                    <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                    
                                                    <button onclick="terminateHauling({{$joborder->intJobOrderID}})" class="btn btn-danger btn-sm text-center float-right ml-2 waves-effect btnEnd">End</button>
                                                    <button onclick="startHauling({{$joborder->intJobOrderID}})"class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect btnStart">Start</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <div class="alert alert-danger text-center">
                                            <i class="fas fa-exclamation-triangle mr-2"></i>NO RESULTS FOUND!
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pillsActive" role="tabpanel" aria-labelledby="pillsActive-tab">
                            <div class="row">
                                @if(count($ongoingjob)>0)
                                    @foreach($ongoingjob as $ongoingjob)
                                        <div class="col-12 col-sm-12 col-lg-6">
                                            <div class="card card-sm-2 card-primary border-primary activeCards">
                                                <div class="card-icon">
                                                    <i class="ion ion-android-boat text-primary"></i>
                                                </div>
                                                <div class="card-header">
                                                    <h4 class="text-primary mb-2">Job Order # {{$ongoingjob->intJobOrderID}}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h5>{{$ongoingjob->strCompanyName}}</h5>
                                                    <h6>Time Started : 
                                                        <small>
                                                            {{$ongoingjob->dateStarted}} - {{$ongoingjob->tmStarted}}

                                                        </small> 
                                                    </h6>
                                                </div>
                                                <div class="card-footer mt-2">
                                                    <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                    <button onclick="terminateHauling({{$ongoingjob->intJobOrderID}})" class="btn btn-danger btn-sm text-center float-right ml-2 waves-effect btnEnd">End</button>
                                                    <button class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect" data-toggle="modal" data-target="#updateLoc">Update Location</button>
                                                    <button class="btn btn-primary btn-sm text-center float-right waves-effect btnStart">Start</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <div class="alert alert-danger text-center">
                                            <i class="fas fa-exclamation-triangle mr-2"></i>NO RESULTS FOUND!
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
