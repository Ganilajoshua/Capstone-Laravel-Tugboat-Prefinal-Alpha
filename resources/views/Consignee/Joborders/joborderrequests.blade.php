<div class="tab-pane" id="thirdTab" role="tabpanel" aria-labelledby="navThirdTab">
    <div class="row">
        <div class="rs-select2--dark rs-select2--md mb-4 ml-3 sortCards">
            <select class="js-select2" name="selectSort">
                <option selected="selected">Date</option>
                <option value="">Job Order #</option>
                <option value="">Name</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
    </div>
    @if(count($pendingjob)>0)
        <div class="row">
            @foreach($pendingjob as $pendingjob)
                @if($pendingjob->enumStatus == 'Pending')
                    <div class="col-12 col-sm-12 col-lg-6 pendingCards">
                        <div class="card card-sm-2 card-primary border-primary">
                            <div class="card-icon">
                                <i class="ion ion-android-boat text-primary"></i>
                            </div>
                            <div class="card-header">
                                <h4 class="text-primary mb-2">Job Order # {{$pendingjob->intJobOrderID}}</h4>
                            </div>
                            <div class="card-body">
                                <h3>{{$pendingjob->strJODesc}}</h3>
                                <small class="float-left mt-2 mt-3" style="font-size:15px;"> {{Auth::user()->name}} </small>
                                <h3 class="float-right mt-3" style="font-size: 15px;">
                                    <span class="">STATUS : </span>
                                    <button type="button" tab-index="-1" class="text-white btn btn-danger btn-sm disabled" style="font-size: 10px; border-radius: 3px; font-weight:bold; pointer-events: none;" aria-disabled="true">{{$pendingjob->enumStatus}}</button>
                                </h3>
                                
                            </div>
                            <div class="card-footer mt-2">
                                <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @elseif($pendingjob->enumStatus == 'Forward Pending')
                    <div class="col-12 col-sm-12 col-lg-6 pendingCards">
                        <div class="card card-sm-2 card-primary border-primary">
                            <div class="card-icon">
                                <i class="ion ion-android-boat text-primary"></i>
                            </div>
                            <div class="card-header">
                                <h4 class="text-primary mb-2">Job Order # {{$pendingjob->intJobOrderID}}</h4>
                            </div>
                            <div class="card-body">
                                <h3>{{$pendingjob->strJODesc}}</h3>
                                <small class="float-left mt-2 mt-3" style="font-size:15px;"> {{Auth::user()->name}} </small>
                                <h3 class="float-right mt-3" style="font-size: 15px;">
                                    <span class="">STATUS : </span>
                                    <button type="button" tab-index="-1" class="text-white btn btn-dark btn-sm disabled" style="font-size: 10px; border-radius: 3px; font-weight:bold; pointer-events: none;" aria-disabled="true">{{$pendingjob->enumStatus}}</button>
                                </h3>
                                
                            </div>
                            <div class="card-footer mt-2">
                                <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @elseif($pendingjob->enumStatus == 'Accepted')
                    <div class="col-12 col-sm-12 col-lg-6 pendingCards">
                        <div class="card card-sm-2 card-primary border-primary">
                            <div class="card-icon">
                                <i class="ion ion-android-boat text-primary"></i>
                            </div>
                            <div class="card-header">
                                <h4 class="text-primary mb-2">Job Order # {{$pendingjob->intJobOrderID}}</h4>
                            </div>
                            <div class="card-body">
                                <h3>{{$pendingjob->strJODesc}}</h3>
                                <small class="float-left mt-2 mt-3" style="font-size:15px;"> {{Auth::user()->name}} </small>
                                <h3 class="float-right mt-3" style="font-size: 15px;">
                                    <span class="">STATUS : </span>
                                    <button type="button" tab-index="-1" class="text-white btn btn-info btn-sm disabled" style="font-size: 10px; border-radius: 3px; font-weight:bold; pointer-events: none;" aria-disabled="true">{{$pendingjob->enumStatus}}</button>
                                </h3>
                                
                            </div>
                            <div class="card-footer mt-2">
                                <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @elseif($pendingjob->enumStatus == 'Scheduled')
                    <div class="col-12 col-sm-12 col-lg-6 pendingCards">
                        <div class="card card-sm-2 card-primary border-primary">
                            <div class="card-icon">
                                <i class="ion ion-android-boat text-primary"></i>
                            </div>
                            <div class="card-header">
                                <h4 class="text-primary mb-2">Job Order # {{$pendingjob->intJobOrderID}}</h4>
                            </div>
                            <div class="card-body">
                                <h3>{{$pendingjob->strJODesc}}</h3>
                                <small class="float-left mt-2 mt-3" style="font-size:15px;"> {{Auth::user()->name}} </small>
                                <h3 class="float-right mt-3" style="font-size: 15px;">
                                    <span class="">STATUS : </span>
                                    <button type="button" tab-index="-1" class="text-white btn btn-success btn-sm disabled" style="font-size: 10px; border-radius: 3px; font-weight:bold; pointer-events: none;" aria-disabled="true">{{$pendingjob->enumStatus}}</button>
                                </h3>
                                
                            </div>
                            <div class="card-footer mt-2">
                                <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @else
    
        <div class="col-12">
            <div class="alert alert-danger text-center">
                <i class="fas fa-exclamation-triangle mr-2"></i>NO PENDING JOB ORDERS!
            </div>
        </div>
    @endif
</div>