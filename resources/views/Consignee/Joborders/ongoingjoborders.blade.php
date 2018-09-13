<!-- Ongoing Job Orders -->
<div class="tab-pane" id="fourthTab" role="tabpanel" aria-labelledby="navFourthTab">
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
    @if(count($ongoing) > 0)
        <div class="row">
            @foreach($ongoing as $ongoing)
                <div class="col-12 col-sm-12 col-lg-6 pendingCards">
                    <div class="card card-sm-2 card-primary border-primary">
                        <div class="card-icon">
                            <i class="ion ion-android-boat text-primary"></i>
                        </div>
                        <div class="card-header">
                            <h4 class="text-primary mb-2">Job Order # {{$ongoing->intJobOrderID}}</h4>
                        </div>
                        <div class="card-body">
                            <h3>{{$ongoing->strJODesc}}</h3>
                            <small style="font-size:15px;" class="float-left mt-2"> {{Auth::user()->name}} </small>
                            <h3 class="float-right mt-1" style="font-size: 15px;">
                                <span class="">STATUS : </span>
                                <button type="button" tab-index="-1" class="text-white btn btn-success btn-sm disabled" style="font-size: 12px; border-radius: 3px; font-weight:bold; pointer-events: none;" aria-disabled="true">ONGOING</button>
                            </h3>
                        </div>
                        <div class="card-footer mt-2">
                            <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="col-12">
            <div class="alert alert-danger text-center">
                <i class="fas fa-exclamation-triangle mr-2"></i>NO ONGOING JOB ORDERS!
            </div>
        </div>
    @endif
</div>