<div class="tab-pane animated slideInRight faster" id="fifthTab" role="tabpanel" aria-labelledby="navSecondTab">
    @if(count($cancelled) > 0)
        <div class="row">
            @foreach($cancelled as $cancelled)
                <div class="col-12 col-sm-12 col-lg-6 pendingCards">
                    <div class="card card-sm-2 card-primary border-primary">
                        <div class="card-icon">
                            <i class="ion ion-android-boat text-primary"></i>
                        </div>
                        <div class="card-header">
                            <h4 class="text-primary mb-2">Job Order # {{$cancelled->intJobOrderID}}</h4>
                        </div>
                        <div class="card-body">
                            <h3>{{$cancelled->strJODesc}}</h3>
                            <small style="font-size:15px;" class="float-left mt-2"> {{Auth::user()->name}} </small>
                            <h3 class="float-right mt-1" style="font-size: 15px;">
                                <span class="">STATUS : </span>
                                <button type="button" tab-index="-1" class="text-white btn btn-dark btn-sm disabled" style="font-size: 12px; border-radius: 3px; font-weight:bold; pointer-events: none;" aria-disabled="true">CANCELLED</button>
                            </h3>
                        </div>
                        <div class="card-footer mt-2">
                            <a href="#" data-id="{{$cancelled->intJobOrderID}}" class="cancelledJoborderDetails">More Info <i class="ion ion-ios-arrow-right"></i></a>
                            <button data-id="{{$cancelled->intJobOrderID}}" class="btn btn-danger btn-sm text-center float-right ml-2 waves-effect deleteJoborder">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
    @endif
</div>