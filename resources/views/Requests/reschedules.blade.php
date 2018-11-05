<div class="card">
    <div class="card-header">
        <div class="mt-2"></div>
    </div>
    <div class="card-body">
            @if(count($reschedule)>0)
            @foreach($reschedule as $reschedule)
                @if($reschedule->enumStatus == 'Pending')
                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="card card-sm-2 card-primary border-primary active">
                            <div class="card-icon">
                                <i class="ion ion-android-boat text-primary"></i>
                            </div>
                            <div class="card-header">
                                <h4 class="text-primary mb-2">Job Order # {{$reschedule->intJobOrderID}}</h4>
                            </div>
                            <div class="card-body">
                                <h4 class="mt-2">{{$reschedule->strJOTitle}}</h4>
                                <ul class="list-inline mt-3">
                                    <li class="list-inline-item text-black">
                                        <p style="font-size: 18px;">{{$reschedule->strCompanyName}}</p>
                                    </li>
                                    <li class="list-inline-item text-black ml-5">
                                        <span style="font-weight: bold; font-size: 14px;">STATUS:&nbsp;</span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span class="badge badge-info" style="font-size: 12px; border-radius: 4px !important; font-weight: bold;">
                                            Pending
                                        </span>
                                    </li>
                                </ul>
                                {{-- <h6 class="mt-3">{{$reschedule->strCompanyName}}</h6> --}}
                            </div>
                            <div class="card-footer mt-2">
                                <a href="#" data-id="{{$reschedule->intJobOrderID}}" class="joborderMoreInfoButton" >More Info <i class="ion ion-ios-arrow-right"></i></a>
                                {{-- <button data-id="{{$reschedule->intJobOrderID}} "class="btn btn-danger btn-sm text-center float-right ml-2 waves-effect declineJoborder">Decline</button> 
                                <button data-id="{{$reschedule->intJobOrderID}} "class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect forwardJoborder">Forward</button>
                                <button data-id="{{$reschedule->intJobOrderID}}" class="btn btn-primary btn-sm text-center float-right waves-effect acceptJoborder">Accept</button>          --}}
                            </div>
                        </div>
                    </div>
                @elseif($reschedule->enumStatus == 'Accepted')
                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="card card-sm-2 card-primary border-primary active">
                            <div class="card-icon">
                                <i class="ion ion-android-boat text-primary"></i>
                            </div>
                            <div class="card-header">
                                <h4 class="text-primary mb-2">Job Order # {{$reschedule->intJobOrderID}}</h4>
                            </div>
                            <div class="card-body">
                                <h4 class="mt-2">{{$reschedule->strJOTitle}}</h4>
                                <ul class="list-inline mt-3">
                                    <li class="list-inline-item text-black">
                                        <p style="font-size: 18px;">{{$reschedule->strCompanyName}}</p>
                                    </li>
                                    <li class="list-inline-item text-black ml-5">
                                        <span style="font-weight: bold; font-size: 14px;">STATUS:&nbsp;</span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span class="badge badge-success" style="font-size: 12px; border-radius: 4px !important; font-weight: bold;">
                                            Accepted
                                        </span>
                                    </li>
                                </ul>
                                {{-- <h6 class="mt-3">{{$reschedule->strCompanyName}}</h6> --}}
                            </div>
                            <div class="card-footer mt-2">
                                <a href="#" data-id="{{$reschedule->intJobOrderID}}" class="joborderMoreInfoButton" >More Info <i class="ion ion-ios-arrow-right"></i></a>
                                <button data-id="{{$reschedule->intJobOrderID}} "class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect rescheduleJoborder">Reschedule</button>
                            </div>
                        </div>
                    </div>
                @elseif($reschedule->enumStatus == 'Declined')
                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="card card-sm-2 card-primary border-primary active">
                            <div class="card-icon">
                                <i class="ion ion-android-boat text-primary"></i>
                            </div>
                            <div class="card-header">
                                <h4 class="text-primary mb-2">Job Order # {{$reschedule->intJobOrderID}}</h4>
                            </div>
                            <div class="card-body">
                                <h4 class="mt-2">{{$reschedule->strJOTitle}}</h4>
                                <ul class="list-inline mt-3">
                                    <li class="list-inline-item text-black">
                                        <p style="font-size: 18px;">{{$reschedule->strCompanyName}}</p>
                                    </li>
                                    <li class="list-inline-item text-black ml-5">
                                        <span style="font-weight: bold; font-size: 14px;">STATUS:&nbsp;</span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span class="badge badge-danger" style="font-size: 12px; border-radius: 4px !important; font-weight: bold;">
                                            Declined
                                        </span>
                                    </li>
                                </ul>
                                {{-- <h6 class="mt-3">{{$reschedule->strCompanyName}}</h6> --}}
                            </div>
                            <div class="card-footer mt-2">
                                <a href="#" data-id="{{$reschedule->intJobOrderID}}" class="joborderMoreInfoButton" >More Info <i class="ion ion-ios-arrow-right"></i></a>
                                <button data-id="{{$reschedule->intJobOrderID}} "class="btn btn-danger btn-sm text-center float-right ml-2 waves-effect voidJoborder">Void</button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @elseif(count($reschedule) == 0)
            
        @endif
    </div>
</div>