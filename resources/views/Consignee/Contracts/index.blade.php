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
                            <span><a href="#" onclick="requestContracts({{$company[0]->intCompanyID}})" id="requestContracts" class="mt-3 text-black btnRequest">
                                    Request Contract<span><i class="fas fa-chevron-right ml-2 mt-2"></i></span>
                            </a></span>

                        </div>
                        <div class="card-footer mt-2">
                            <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
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
                            <div style="font-size: 18px;" class="mt-4 badge badge-warning text-black disabled">
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
                            <div style="font-size: 18px;" class="mt-4 badge badge-warning text-black disabled">
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
                            <div style="font-size: 18px;" class="mt-4 badge badge-warning text-black disabled">
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
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="section-header text-center" style="text-transform: uppercase;">
                                    Contracts
                                </h5>
                            </div>
                            <div class="container mt-3">
                                <div class="card">
                                    <div class="card-header bg-primary" style="border-radius:0px;">
                                        <h4 class="text-center text-white">{{$contract[0]->strContractListTitle}}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mt-2">
                                            <h3 class="mt-2">
                                                <span>Consignee Name :&nbsp;</span>
                                                <small style="font-size: 25px;">{{Auth::user()->name}}</small>
                                            </h3>
                                            <h4 class="mt-3">
                                                Contract Expiry : 
                                                <small class="ml-2">{{$contract[0]->datContractExpire}}</small>
                                                <span class="float-right">
                                                    <span class="">STATUS : </span>
                                                    <button type="button" tab-index="-1" class="text-white btn btn-success btn-sm disabled" style="font-size: 12px; border-radius: 3px; font-weight:bold; pointer-events: none;" aria-disabled="true">ACTIVE</button>
                                                </span> 
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" onclick="showFinalContract({{$contract[0]->intContractListID}})" class="float-left mt-2" style="display: block;" data-toggle="tooltip" title="View Details">
                                            More Info <i class="ion ion-ios-arrow-right"></i>
                                        </a>
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