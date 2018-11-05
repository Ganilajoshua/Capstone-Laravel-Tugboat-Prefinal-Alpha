@extends('Consignee.Templates.ConsigneeTemplate')

@section('styles')
    @include('Consignee.Contracts.styles')
@endsection

@section('scripts')
    @include('Consignee.Contracts.scripts')
@endsection

@section('content')
    <section>
        @foreach($contractlist as $contractlist)
            @if($contractlist->intContractListID == null)
                <div class="container">
                    <div id="forecast"></div>
                    <div class="col-12 col-sm-12 col-lg">
                        <div class="card card-sm-2 card-primary border-primary">
                            <div class="card-icon">
                                <i class="ion ion-android-boat text-primary"></i>
                            </div>
                            <div class="card-header">
                                <h4 class="text-primary mb-2"> {{Auth::user()->name}} </h4>
                            </div>
                            <h3 class="text-danger text-center">YOU DON'T HAVE A CONTRACT!</h3>
                            <hr>
                            <div class="row ml-4 mr-4">
                                <div class="col-12">
                                    <div class="card card-primary text-center">
                                        <div class="card-header"><h4 class="text-black">Tugboat Services Matrix</h4></div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table-hover table-bordered" style="width:100%;">
                                                    <thead class="bg-primary text-white thHeight" style="font-size:15px;">
                                                        <tr>
                                                            <th>Service Type</th>
                                                            <th>Standard Rate</th>
                                                            <th>Delay Fee</th>
                                                            <th>Consignee Late Fee</th>
                                                            <th>Violation Fee</th>
                                                            <th>Minimum Damage Fee</th>
                                                            <th>Maximum Damage Fee</th>
                                                            <th>Maximum Discount (&#37;)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbodyTD" style="font-size:13px;">
                                                        @if(count($fees) > 0)
                                                            @foreach($fees as $fees)
                                                                <tr>
                                                                    <td>{{$fees->enumServiceType}}</td>
                                                                    <td>{{$fees->fltCFStandardRate}}</td>
                                                                    <td>{{$fees->fltCFTugboatDelayFee}}</td>
                                                                    <td>{{$fees->fltCFConsigneeLateFee}}</td>
                                                                    <td>{{$fees->fltCFViolationFee}}</td>
                                                                    <td>{{$fees->fltCFMinDamageFee}}</td>
                                                                    <td>{{$fees->fltCFMaxDamageFee}}</td>
                                                                    <td>{{$fees->intCFDiscount}}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <ul class="list-inline text-center text-black">
                                        <li class="list-inline-item">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input radioMatrix" id="quoteMatrix" name="matrixChoices" checked>
                                                <label class="custom-control-label lblquoteMatrix text-primary" for="quoteMatrix">Make quotations based on Matrix</label>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input radioMatrix" id="quoteCustom" class="suggestionsButton" name="matrixChoices">
                                                <label class="custom-control-label lblquoteCustom" for="quoteCustom">Create quotation suggestions</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row matrixBased">
                                    <div class="col-12">
                                        <div class="alert alert-primary"><h4 class="text-white">Make Quotations based on the Matrix above.</h4></div>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" id="requestContractsButton" data-id="{{Auth::user()->intUCompanyID}}" class="defaultMatrixButton mt-3 btn btn-primary float-right">
                                            Request Contract
                                        </a>
                                    </div>
                                </div>
                                <div class="row customMatrix">
                                    <div class="col-12">
                                        <form class="needs-validation" novalidate="">
                                            <div class="card border-primary">
                                                <div class="card-header bg-primary"><h4 class="text-white text-center mb-2">Hauling Service Custom Matrix</h4></div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="addHStandardRate">Hauling Standard Rate(&#8369;)</label>
                                                                <input type="number" name="addHStandardRate" id="addHStandardRate" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="addHDelayFee">Hauling Tugboat Delay Fee (&#8369;)</label>
                                                                <input type="number" name="addHDelayFee" id="addHDelayFee" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="addHViolationFee">Hauling Violation Fee (&#8369;)</label>
                                                                <input type="number" name="addHViolationFee" id="addHViolationFee" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="addHLateFee">Hauling Consignee Late Fee (&#8369;)</label>
                                                                <input type="number" name="addHLateFee" id="addHLateFee" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="addHMinDamageFee">Hauling Minimum Damage Fee (&#8369;)</label>
                                                                <input type="number" name="addHMinDamageFee" id="addHMinDamageFee" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="addHMaxDamageFee">Hauling Maximum Damage Fee (&#8369;)</label>
                                                                <input type="number" name="addHMaxDamageFee" id="addHMaxDamageFee" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="hideCompanyID">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-12">
                                        <form class="needs-validation" novalidate="">
                                            <div class="card border-primary">
                                                <div class="card-header bg-primary"><h4 class="text-white text-center mb-2">Tug Assist Service Custom Matrix</h4></div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="addTAStandardRate">Tug Assist Standard Rate(&#8369;)</label>
                                                                <input type="number" name="addTAStandardRate" id="addTAStandardRate" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="addTADelayFee">Tug Assist Tugboat Delay Fee (&#8369;)</label>
                                                                <input type="number" name="addTADelayFee" id="addTADelayFee" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="addTAViolationFee">Tug Assist Violation Fee (&#8369;)</label>
                                                                <input type="number" name="addTAViolationFee" id="addTAViolationFee" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="addTALateFee">Tug Assist Consignee Late Fee (&#8369;)</label>
                                                                <input type="number" name="addTALateFee" id="addTALateFee" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="addTAMinDamageFee">Tug Assist Minimum Damage Fee (&#8369;)</label>
                                                                <input type="number" name="addTAMinDamageFee" id="addTAMinDamageFee" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="addTAMaxDamageFee">Tug Assist Maximum Damage Fee (&#8369;)</label>
                                                                <input type="number" name="addTAMaxDamageFee" id="addTAMaxDamageFee" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="hideCompanyID">
                                            </div>
                                        </form>
                                        <a href="#" id="requestContractsButton" data-id="{{Auth::user()->intUCompanyID}}" class="customMatrixButton mt-3 btn btn-primary float-right">
                                            Request Contract
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($contractlist->enumStatus == 'Pending')
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
                                <div style="font-size: 18px;" class="responseBox mt-4 badge badge-warning text-black">
                                    Waiting for Response . . .
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($contractlist->enumStatus == 'Created')
                <div class="container" id="createdContract" data-id="{{$contractlist->intContractListID}}">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-primary text-center" style="border-radius:0px;">
                                    <h4 class=" text-white"><span>{{$contractlist->strContractListTitle}}</span><span><div class="badge badge-warning ml-2">NOT YET FINALIZED</div></h4>
                                </div>
                                <div class="card-body contractRequestsQuotes">
                                    <h3>You Have Received an Initial Quote</h3>
                                    {{-- <div style="font-size: 18px;" class="mt-4 badge badge-warning text-black">
                                    </div>     --}}
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <button class="btn btn-primary viewQuotesMatrix" data-id="{{$contractlist->intContractListID}}">
                                                View Details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body contractRequestsMatrix">
                                    <div class="row mt-2">
                                        <div class="col">
                                            <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pillsHauling-tab" data-toggle="pill" href="#pillsHauling" role="tab" aria-controls="pillsHauling" aria-selected="true">Hauling</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pillsTugAssist-tab" data-toggle="pill" href="#pillsTugAssist" role="tab" aria-controls="pillsTugAssist" aria-selected="false">Tug Assist</a>
                                                </li>
                                            </ul>
                                            <div class="row mt-5 text-center">
                                                <div class="col-12">
                                                    {{-- <ul class="list-inline" style="font-size:15px;">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Legend : </p>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <div class="badge badge-light badgeLegend border-primary">
                                                                <h6 class="text-primary">Same Amount</h6>
                                                            </div>
                                                            <div class="badge badge-light badgeLegend border-primary">
                                                                <h6 class="text-success font-weight-bold">New Amount is Lower</h6>
                                                            </div>
                                                            <div class="badge badge-light badgeLegend border-primary">
                                                                <h6 class="text-danger">New Amount is Higher</h6>
                                                            </div>
                                                        </li>
                                                    </ul> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pillsHauling" role="tabpanel" aria-labelledby="pillsHauling-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card card-primary text-center border-primary">
                                                        <div class="card-header"><h4 class="text-black">Hauling Rates</h4></div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table-hover table-bordered haulingTable" style="width:100%;">
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="pillsTugAssist" role="tabpanel" aria-labelledby="pillsTugAssist-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card card-primary text-center border-primary">
                                                        <div class="card-header"><h4 class="text-black">Tug Assist Rates</h4></div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table-hover table-bordered tugAssistTable" style="width:100%;">
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <input type="hidden" id="contractsID">
                                    {{-- <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#requestChangesModal">Request for Changes</button> --}}
                                    <button id="applySignatureButton" data-id="{{$contractlist->intContractListID}}" class="applySignatureButton btn btn-success waves-effect">Sign and Accept Contract</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($contractlist->enumStatus == 'Requesting For Changes') 
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
                        </div>
                    </div>
                </div>
            @elseif($contractlist->enumStatus == 'Accepted')
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
                        </div>
                    </div>
                </div>
            @elseif($contractlist->enumStatus == 'Finalized')
                <div class="container" id="activeContract" data-id="{{$contractlist->intContractListID}}">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-primary" style="border-radius:0px;">
                                    <h4 class="text-center text-white">{{$contractlist->strContractListTitle}}</h4>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-primary text-center">
                                        <span class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle mr-2"></i>This contract was finalized but not yet active!
                                        </span>
                                        <span class="float-right">
                                            <span class="text-black">Status : </span>
                                            <button type="button" tab-index="-1" class="text-white btn btn-secondary btn-sm" style="font-size: 12px; border-radius: 3px; font-weight:bold; pointer-events: none;" aria-disabled="true">Finalized</button>
                                        </span> 
                                    </h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="text-black text-center" id="contractDetails"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <ul class="nav nav-pills nav-fill">
                                                <li class="nav-item">
                                                    <a class="nav-link showPending active" data-toggle="pill" href="#pillsHaulingM" role="tab" aria-controls="pills-home" aria-selected="true">Hauling Service Matrix</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link showRChanges" data-toggle="pill" href="#pillsTugAssistM" role="tab" aria-selected="false">Tug Assist Service Matrix</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pillsHaulingM" role="tabpanel" aria-labelledby="pillsHaulingM-tab">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Standard Rate : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="standardRate">{{$contractListFinal[0]->fltFCFStandardRate}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Tugboat Delay Fee : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="tugboatDelayFee">{{$contractListFinal[0]->fltFCFTugboatDelayFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Violation Fee : </p></li>
                                                        <li class="list-inline-item"> 
                                                            <p class="text-black" id="violationFee">{{$contractListFinal[0]->fltFCFViolationFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Consignee Late Fee : </p></li>
                                                        <li class="list-inline-item">
                                                        <p class="text-black" id="consigneeLateFee">{{$contractListFinal[0]->fltFCFConsigneeLateFee}}</p></li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Minimum Damage Fee : </p></li>
                                                        <li class="list-inline-item">
                                                        <p class="text-black" id="minDamageFee">{{$contractListFinal[0]->fltFCFMinDamageFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Maximum Damage Fee : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="maxDamageFee">{{$contractListFinal[0]->fltFCFMaxDamageFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Discount : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="discount">{{$contractListFinal[0]->intFCFDiscountFee}}</p></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pillsTugAssistM" role="tabpanel" aria-labelledby="pillsTugAssistM-tab">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Standard Rate : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="standardRate">{{$contractListFinal[1]->fltFCFStandardRate}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Tugboat Delay Fee : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="tugboatDelayFee">{{$contractListFinal[1]->fltFCFTugboatDelayFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Violation Fee : </p></li>
                                                        <li class="list-inline-item"> 
                                                            <p class="text-black" id="violationFee">{{$contractListFinal[1]->fltFCFViolationFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Consignee Late Fee : </p></li>
                                                        <li class="list-inline-item">
                                                        <p class="text-black" id="consigneeLateFee">{{$contractListFinal[1]->fltFCFConsigneeLateFee}}</p></li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Minimum Damage Fee : </p></li>
                                                        <li class="list-inline-item">
                                                        <p class="text-black" id="minDamageFee">{{$contractListFinal[1]->fltFCFMinDamageFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Maximum Damage Fee : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="maxDamageFee">{{$contractListFinal[1]->fltFCFMaxDamageFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Discount : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="discount">{{$contractListFinal[1]->intFCFDiscountFee}}</p></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <textarea class="summernoteQuote" name="" id="" cols="30" rows="5"style="height: 50px; width: 90px;" disabled>
                                        @foreach($termscondition as $termscondition)
                                            {{ $termscondition->strTermsConditionTitle }}
                                            
                                            {{ $termscondition->strTermsConditionDesc }}
                                        @endforeach
                                    </textarea>    
                                    <div class="row">
                                        @foreach($termscondition as $termscondition)
                                            <div class="col">
                                                <div>
                                                    
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button data-id="{{$contractlist->intContractListID}}" class="activateContract btn btn-success waves-effect">Activate this Contract</button>     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($contractlist->enumStatus == 'For Activation')
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
                                <h3>WAITING FOR CONTRACT ACTIVATION</h3>
                                <div style="font-size: 18px;" class="mt-4 badge badge-warning text-black">
                                    Waiting for Response . . .
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($contractlist->enumStatus == 'Active')
                <div class="container" id="activeContract" data-id="{{$contractlist->intContractListID}}">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-primary" style="border-radius:0px;">
                                    <h4 class="text-center text-white">{{$contractlist->strContractListTitle}}</h4>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-primary text-center">
                                        {{-- <span class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle mr-2"></i>This contract was finalized but not yet active!
                                        </span> --}}
                                        <span class="float-right">
                                            <span class="text-black">Status : </span>
                                            <button type="button" tab-index="-1" class="text-white btn btn-success btn-sm" style="font-size: 12px; border-radius: 3px; font-weight:bold; pointer-events: none;" aria-disabled="true">Active</button>
                                        </span> 
                                    </h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="text-black text-center" id="contractDetails"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <ul class="nav nav-pills nav-fill">
                                                <li class="nav-item">
                                                    <a class="nav-link showPending active" data-toggle="pill" href="#pillsHaulingM" role="tab" aria-controls="pills-home" aria-selected="true">Hauling Service Matrix</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link showRChanges" data-toggle="pill" href="#pillsTugAssistM" role="tab" aria-selected="false">Tug Assist Service Matrix</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pillsHaulingM" role="tabpanel" aria-labelledby="pillsHaulingM-tab">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Standard Rate : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="standardRate">{{$contractListFinal[0]->fltFCFStandardRate}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Tugboat Delay Fee : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="tugboatDelayFee">{{$contractListFinal[0]->fltFCFTugboatDelayFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Violation Fee : </p></li>
                                                        <li class="list-inline-item"> 
                                                            <p class="text-black" id="violationFee">{{$contractListFinal[0]->fltFCFViolationFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Consignee Late Fee : </p></li>
                                                        <li class="list-inline-item">
                                                        <p class="text-black" id="consigneeLateFee">{{$contractListFinal[0]->fltFCFConsigneeLateFee}}</p></li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Minimum Damage Fee : </p></li>
                                                        <li class="list-inline-item">
                                                        <p class="text-black" id="minDamageFee">{{$contractListFinal[0]->fltFCFMinDamageFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Maximum Damage Fee : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="maxDamageFee">{{$contractListFinal[0]->fltFCFMaxDamageFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Discount : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="discount">{{$contractListFinal[0]->intFCFDiscountFee}}</p></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pillsTugAssistM" role="tabpanel" aria-labelledby="pillsTugAssistM-tab">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Standard Rate : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="standardRate">{{$contractListFinal[1]->fltFCFStandardRate}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Tugboat Delay Fee : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="tugboatDelayFee">{{$contractListFinal[1]->fltFCFTugboatDelayFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Violation Fee : </p></li>
                                                        <li class="list-inline-item"> 
                                                            <p class="text-black" id="violationFee">{{$contractListFinal[1]->fltFCFViolationFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Consignee Late Fee : </p></li>
                                                        <li class="list-inline-item">
                                                        <p class="text-black" id="consigneeLateFee">{{$contractListFinal[1]->fltFCFConsigneeLateFee}}</p></li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Minimum Damage Fee : </p></li>
                                                        <li class="list-inline-item">
                                                        <p class="text-black" id="minDamageFee">{{$contractListFinal[1]->fltFCFMinDamageFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Maximum Damage Fee : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="maxDamageFee">{{$contractListFinal[1]->fltFCFMaxDamageFee}}</p></li>
                                                    </ul>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item text-primary">
                                                            <p class="font-weight-bold">Discount : </p></li>
                                                        <li class="list-inline-item">
                                                            <p class="text-black" id="discount">{{$contractListFinal[1]->intFCFDiscountFee}}</p></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <textarea class="summernoteQuote" name="" id="" cols="30" rows="5"style="height: 50px; width: 90px;" disabled> --}}
                                        @foreach($termscondition as $termscondition)
                                        <br>
                                        <br>
                                        <hr>
                                            {!! $termscondition->strTermsConditionTitle !!}
                                            
                                            {!! $termscondition->strTermsConditionDesc !!}
                                        @endforeach
                                    {{-- </textarea>     --}}
                                    <a href="{{url('/consignee/contracts/'.$id.'/pdf')}}" class="btn active waves-effect">Generate PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($contractlist->enumStatus == 'Expired')
            <div class="container">
                <div id="forecast"></div>
                <div class="col-12 col-sm-12 col-lg">
                    <div class="card card-sm-2 card-primary border-primary">
                        <div class="card-icon">
                            <i class="ion ion-android-boat text-primary"></i>
                        </div>
                        <div class="card-header">
                            <h4 class="text-primary mb-2"> {{Auth::user()->name}} </h4>
                        </div>
                        <h3 class="text-danger text-center">Your Contract Has Expired!</h3>
                        <hr>
                        <div class="row ml-4 mr-4">
                            <div class="col-12">
                                <div class="card card-primary text-center">
                                    <div class="card-header"><h4 class="text-black">Tugboat Services Matrix</h4></div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table-hover table-bordered" style="width:100%;">
                                                <thead class="bg-primary text-white thHeight" style="font-size:15px;">
                                                    <tr>
                                                        <th>Service Type</th>
                                                        <th>Standard Rate</th>
                                                        <th>Delay Fee</th>
                                                        <th>Consignee Late Fee</th>
                                                        <th>Violation Fee</th>
                                                        <th>Minimum Damage Fee</th>
                                                        <th>Maximum Damage Fee</th>
                                                        <th>Maximum Discount (&#37;)</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbodyTD" style="font-size:13px;">
                                                    @if(count($fees) > 0)
                                                        @foreach($fees as $fees)
                                                            <tr>
                                                                <td>{{$fees->enumServiceType}}</td>
                                                                <td>{{$fees->fltCFStandardRate}}</td>
                                                                <td>{{$fees->fltCFTugboatDelayFee}}</td>
                                                                <td>{{$fees->fltCFConsigneeLateFee}}</td>
                                                                <td>{{$fees->fltCFViolationFee}}</td>
                                                                <td>{{$fees->fltCFMinDamageFee}}</td>
                                                                <td>{{$fees->fltCFMaxDamageFee}}</td>
                                                                <td>{{$fees->intCFDiscount}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-inline text-center text-black">
                                    <li class="list-inline-item">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input radioMatrix" id="quoteMatrix" name="matrixChoices" checked>
                                            <label class="custom-control-label lblquoteMatrix text-primary" for="quoteMatrix">Make quotations based on Matrix</label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input radioMatrix" id="quoteCustom" class="suggestionsButton" name="matrixChoices">
                                            <label class="custom-control-label lblquoteCustom" for="quoteCustom">Create quotation suggestions</label>
                                        </div>
                                    </li>
                                </ul>
                                <a href="#" onclick="requestContracts({{Auth::user()->intUCompanyID}})" id="requestContractsButton" class="defaultMatrixButton mt-3 btn btn-primary float-right">
                                    Request Contract
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row matrixBased">
                                <div class="col-12">
                                    <div class="alert alert-primary"><h4 class="text-white">Make Quotations based on the Matrix above.</h4></div>
                                </div>
                                <div class="col-12">
                                    <a href="#" id="requestContractsButton" data-id="{{Auth::user()->intUCompanyID}}" class="defaultMatrixButton mt-3 btn btn-primary float-right">
                                            {{-- onclick="requestContracts({{Auth::user()->intUCompanyID}})" --}}
                                        Request Contract
                                    </a>
                                </div>
                            </div>
                            <div class="row customMatrix">
                                <div class="col-12">
                                    <form class="needs-validation" novalidate="">
                                        <div class="card border-primary">
                                            <div class="card-header bg-primary"><h4 class="text-white text-center mb-2">Hauling Service Custom Matrix</h4></div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="addHStandardRate">Hauling Standard Rate(&#8369;)</label>
                                                            <input type="number" name="addHStandardRate" id="addHStandardRate" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="addHDelayFee">Hauling Tugboat Delay Fee (&#8369;)</label>
                                                            <input type="number" name="addHDelayFee" id="addHDelayFee" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="addHViolationFee">Hauling Violation Fee (&#8369;)</label>
                                                            <input type="number" name="addHViolationFee" id="addHViolationFee" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="addHLateFee">Hauling Consignee Late Fee (&#8369;)</label>
                                                            <input type="number" name="addHLateFee" id="addHLateFee" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="addHMinDamageFee">Hauling Minimum Damage Fee (&#8369;)</label>
                                                            <input type="number" name="addHMinDamageFee" id="addHMinDamageFee" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="addHMaxDamageFee">Hauling Maximum Damage Fee (&#8369;)</label>
                                                            <input type="number" name="addHMaxDamageFee" id="addHMaxDamageFee" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="hideCompanyID">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <form class="needs-validation" novalidate="">
                                        <div class="card border-primary">
                                            <div class="card-header bg-primary"><h4 class="text-white text-center mb-2">Tug Assist Service Custom Matrix</h4></div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="addTAStandardRate">Tug Assist Standard Rate(&#8369;)</label>
                                                            <input type="number" name="addTAStandardRate" id="addTAStandardRate" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="addTADelayFee">Tug Assist Tugboat Delay Fee (&#8369;)</label>
                                                            <input type="number" name="addTADelayFee" id="addTADelayFee" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="addTAViolationFee">Tug Assist Violation Fee (&#8369;)</label>
                                                            <input type="number" name="addTAViolationFee" id="addTAViolationFee" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="addTALateFee">Tug Assist Consignee Late Fee (&#8369;)</label>
                                                            <input type="number" name="addTALateFee" id="addTALateFee" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="addTAMinDamageFee">Tug Assist Minimum Damage Fee (&#8369;)</label>
                                                            <input type="number" name="addTAMinDamageFee" id="addTAMinDamageFee" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="addTAMaxDamageFee">Tug Assist Maximum Damage Fee (&#8369;)</label>
                                                            <input type="number" name="addTAMaxDamageFee" id="addTAMaxDamageFee" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="hideCompanyID">
                                        </div>
                                    </form>
                                    <a href="#" id="requestContractsButton" data-id="{{Auth::user()->intUCompanyID}}" class="customMatrixButton mt-3 btn btn-primary float-right">
                                            {{-- onclick="requestContracts({{Auth::user()->intUCompanyID}})"   --}}
                                        Request Contract
                                    </a>
                                </div>
                            </div>
                            {{-- <a href="#" onclick="requestContracts({{Auth::user()->intUCompanyID}})" id="requestContractsButton" class="defaultMatrixButton mt-3 btn btn-primary float-right">
                                Request Contract
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </section>
    @include('Consignee.Contracts.finalcontract')
    @include('Consignee.Contracts.info')
    @include('Consignee.Contracts.infoRChanges')
@endsection

