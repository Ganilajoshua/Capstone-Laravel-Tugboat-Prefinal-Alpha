@extends('Consignee.Templates.ConsigneeTemplate')

@section('styles')
    @include('Consignee.Contracts.styles')
@endsection

@section('scripts')
    @include('Consignee.Contracts.scripts')
@endsection

@section('content')
    <section class="p-t-20">
        @if(count($contract) == 0 || null)
            <div class="container">
                <div class="col-12 col-sm-12 col-lg">
                    <div class="card card-sm-2 card-primary border-primary">
                        <div class="card-icon">
                            <i class="ion ion-android-boat text-primary"></i>
                        </div>
                        <div class="card-header">
                            <h4 class="text-primary mb-2"> {{Auth::user()->name}} </h4>
                        </div>
                        <div class="card-body">
                            <h3>YOU DON'T HAVE ANY CONTRACTS</h3>
                            <span><a href="#" onclick="requestContracts({{$company[0]->intCompanyID}})" id="requestContracts" class="mt-3">
                                    Request Contract<span><i class="fas fa-chevron-right ml-2 mt-2"></i></span>
                            </a></span>

                        </div>
                    </div>
                </div>
            </div>
        @elseif(($contractList[0]->enumStatus) == 'Pending')
            <div class="container">
                <div class="col">
                    <div class="card card-sm-2 card-primary border-primary">
                        <div class="card-icon">
                            <i class="ion ion-android-boat text-primary"></i>
                        </div>
                        <div class="card-header">
                            <h4 class="text-primary mb-2"> {{Auth::user()->name}} </h4>
                        </div>
                        <div class="card-body">
                            <h3>CONTRACT REQUEST PENDING</h3>
                            <div style="font-size: 18px;" class="mt-4 badge badge-warning text-black">
                                Waiting for Response . . .
                            </div>

                        </div>
                        <div class="card-footer mt-2">
                            <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(($contractList[0]->enumStatus) == 'Created')
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="section-header text-center" style="text-transform: uppercase;">
                                    Quotation List
                                    </h5>
                            </div>
                            <div class="container mt-3">
                                <div class="card text-center">
                                    <div class="card-header bg-primary" style="border-radius:0px;">
                                        <h4 class=" text-white"><span>{{$contract[0]->strContractListTitle}}</span><span><div class="badge badge-warning ml-2">NOT YET FINALIZED</div></h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="#" onclick="showContract({{$contract[0]->intContractListID}})" class="float-left mt-2">
                                        More Info <i class="ion ion-ios-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(($contractList[0]->enumStatus) == 'Requesting For Changes')
            <div class="container">
                <div class="col">
                    <div class="card card-sm-2 card-primary border-primary">
                        <div class="card-icon">
                            <i class="ion ion-android-boat text-primary"></i>
                        </div>
                        <div class="card-header">
                            <h4 class="text-primary mb-2"> {{Auth::user()->name}} </h4>
                        </div>
                        <div class="card-body">
                            <h3>CONTRACT CHANGE REQUEST PENDING</h3>
                            <div style="font-size: 18px;" class="mt-4 badge badge-warning text-black">
                                Waiting for Response . . .
                            </div>

                        </div>
                        <div class="card-footer mt-2">
                            <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(($contractList[0]->enumStatus) == 'Accepted')
            <div class="container">
                <div class="col">
                    <div class="card card-sm-2 card-primary border-primary">
                        <div class="card-icon">
                            <i class="ion ion-android-boat text-primary"></i>
                        </div>
                        <div class="card-header">
                            <h4 class="text-primary mb-2"> {{Auth::user()->name}} </h4>
                        </div>
                        <div class="card-body">
                            <h3>WAITING FOR FINALIZATION OF CONTRACT</h3>
                            <div style="font-size: 18px;" class="mt-4 badge badge-warning text-black">
                                Waiting for Response . . .
                            </div>
                            
                        </div>
                        <div class="card-footer mt-2">
                            <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(($contractList[0]->enumStatus) == 'Active')
            <!-- Since Hindi Mo I Bibind sa button yung id para makuha yung contract ilagay natin siya sa || data-id="" || -->
            <div class="container" id="activeContract" data-id="{{$contract[0]->intContractListID}}">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-primary" style="border-radius:0px;">
                                <h4 class="text-center text-white">{{$contract[0]->strContractListTitle}}</h4>
                            </div>
                            <div class="card-body">
                                <h4 class="text-primary">
                                    Contract Expiry : 
                                    <small class="ml-2 text-black">{{$contract[0]->datContractExpire}}</small>
                                    <span class="float-right">
                                        <span class="text-black">Status : </span>
                                        <button type="button" tab-index="-1" class="text-white btn btn-success btn-sm" style="font-size: 12px; border-radius: 3px; font-weight:bold; pointer-events: none;" aria-disabled="true">ACTIVE</button>
                                    </span> 
                                </h4>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-black text-center" id="contractDetails"></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="list-inline">
                                            <li class="list-inline-item text-primary">
                                                <p class="font-weight-bold">Standard Rate : </p></li>
                                            <li class="list-inline-item">
                                                <p class="text-black" id="standardRate"></p></li>
                                        </ul>
                                        <ul class="list-inline">
                                            <li class="list-inline-item text-primary">
                                                <p class="font-weight-bold">Tugboat Delay Fee : </p></li>
                                            <li class="list-inline-item">
                                                <p class="text-black" id="tugboatDelayFee"></p></li>
                                        </ul>
                                        <ul class="list-inline">
                                            <li class="list-inline-item text-primary">
                                                <p class="font-weight-bold">Violation Fee : </p></li>
                                            <li class="list-inline-item"> 
                                                <p class="text-black" id="violationFee"></p></li>
                                        </ul>
                                        <ul class="list-inline">
                                            <li class="list-inline-item text-primary">
                                                <p class="font-weight-bold">Consignee Late Fee : </p></li>
                                            <li class="list-inline-item">
                                            <p class="text-black" id="consigneeLateFee"></p></li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-inline">
                                            <li class="list-inline-item text-primary">
                                                <p class="font-weight-bold">Minimum Damage Fee : </p></li>
                                            <li class="list-inline-item">
                                            <p class="text-black" id="minDamageFee"></p></li>
                                        </ul>
                                        <ul class="list-inline">
                                            <li class="list-inline-item text-primary">
                                                <p class="font-weight-bold">Maximum Damage Fee : </p></li>
                                            <li class="list-inline-item">
                                                <p class="text-black" id="maxDamageFee"></p></li>
                                        </ul>
                                        <ul class="list-inline">
                                            <li class="list-inline-item text-primary">
                                                <p class="font-weight-bold">Discount : </p></li>
                                            <li class="list-inline-item">
                                                <p class="text-black" id="discount"></p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        
        @endif

    </section>
    @include('Consignee.Contracts.finalcontract')
    @include('Consignee.Contracts.info')
@endsection