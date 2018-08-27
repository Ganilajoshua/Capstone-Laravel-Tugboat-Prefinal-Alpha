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
                                        <a href="#" onclick="showContract({{$contract[0]->intContractListID}})" class="float-left mt-2" data-toggle="modal" data-target="#viewCContractInfo">
                                        More Info <i class="ion ion-ios-arrow-right"></i>
                                        </a>
                                        <button type="button" class="delItem btn btn-sm btn-danger waves-effect waves-circle float-right" data-toggle="tooltip" title="Delete">
                                            <i class="miniIcon fas fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-secondary waves-effect waves-circle float-right mr-2" data-tooltip="tooltip" title="Edit" data-toggle="modal" data-target="#editQuoteInfo">
                                            <i class="miniIcon ion ion-edit"></i>
                                        </button>
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
        @elseif(($contractList[0]->enumStatus) == 'Finalized')
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
                                <div class="card text-center">
                                    <div class="card-header bg-primary" style="border-radius:0px;">
                                        <h4 class=" text-white">{{$contract[0]->strContractListTitle}}</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="#" onclick="showContract({{$contract[0]->intContractListID}})" class="float-left mt-2" data-toggle="modal" data-target="#viewCContractInfo">
                                        More Info <i class="ion ion-ios-arrow-right"></i>
                                        </a>
                                        <button type="button" class="delItem btn btn-sm btn-danger waves-effect waves-circle float-right" data-toggle="tooltip" title="Delete">
                                            <i class="miniIcon fas fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-secondary waves-effect waves-circle float-right mr-2" data-tooltip="tooltip" title="Edit" data-toggle="modal" data-target="#editQuoteInfo">
                                            <i class="miniIcon ion ion-edit"></i>
                                        </button>
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
    @include('Consignee.Contracts.info')
@endsection