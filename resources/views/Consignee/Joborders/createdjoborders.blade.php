<div class="tab-pane" id="secondTab" role="tabpanel" aria-labelledby="navSecondTab">
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
    <div class="row">
        @if(count($createdjob)>0)
            @foreach($createdjob as $createdjob)
                <div class="col-12 col-sm-12 col-lg-6 createdCards">
                    <div class="card card-sm-2 card-primary border-primary">
                        <div class="card-icon">
                            <i class="ion ion-android-boat text-primary"></i>
                        </div>
                        <div class="card-header">
                            <h4 class="text-primary mb-2">Job Order # {{$createdjob->intJobOrderID}}</h4>
                        </div>
                        <div class="card-body">
                            <h3>{{$createdjob->strJODesc}}</h3>
                            <small style="font-size:15px;"> {{Auth::user()->name}} </small>
                        </div>
                        <div class="card-footer mt-2">
                            <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                            <button onclick=""class="btn btn-danger btn-sm text-center float-right ml-2 waves-effect btnDeleteJO">Delete</button>
                            <button class="btn btn-secondary btn-sm text-center float-right ml-2 waves-effect" data-toggle="modal" data-target="#JOeditModal">Edit</button>
                            <button onclick="requestJoborder({{$createdjob->intJobOrderID}})" class="btn btn-primary btn-sm text-center float-right waves-effect">Request</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-danger text-center">
                    <i class="fas fa-exclamation-triangle mr-2"></i>NO CREATED JOB ORDERS!
                </div>
            </div>
        @endif
    </div>
</div>