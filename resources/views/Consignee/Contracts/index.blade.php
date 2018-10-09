@extends('Consignee.Templates.ConsigneeTemplate')

@section('styles')
    @include('Consignee.Contracts.styles')
@endsection

@section('scripts')
    @include('Consignee.Contracts.scripts')
@endsection

@section('content')
    <section>
        @if(count($contract) == 0 || null)
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
                                                        <th>Violation Fee</th>
                                                        <th>Minimum Damage Fee</th>
                                                        <th>Maximum Damage Fee</th>
                                                        <th>Maximum Discount (&#37;)</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbodyTD" style="font-size:13px;">
                                                    <tr>
                                                        <td>Hauling Service</td>
                                                        <td>2000</td>
                                                        <td>2000</td>
                                                        <td>250</td>
                                                        <td>1500</td>
                                                        <td>3000</td>
                                                        <td>20</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tug Assist Service</td>
                                                        <td>3000</td>
                                                        <td>2500</td>
                                                        <td>3000</td>
                                                        <td>2000</td>
                                                        <td>3000</td>
                                                        <td>20</td>
                                                    </tr>
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
                                </div>
                            </div>
                            <a href="#" onclick="requestContracts({{$company[0]->intCompanyID}})" id="requestContracts" class="mt-3 btn btn-primary float-right">
                                Request Contract
                            </a>
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
                    </div>
                </div>
            </div>
        @elseif(($contractList[0]->enumStatus) == 'Created')
            <div class="container" id="createdContract" data-id="{{$contract[0]->intContractListID}}">
                <div class="row">
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header bg-primary" style="border-radius:0px;">
                                <h4 class=" text-white"><span>{{$contract[0]->strContractListTitle}}</span><span><div class="badge badge-warning ml-2">NOT YET FINALIZED</div></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-black text-center" id="contractDetails"></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="list-inline" style="font-size:15px;">
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
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card card-primary text-center border-primary">
                                            <div class="card-header"><h4 class="text-black">Quotation Changes Comparison</h4></div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table-hover table-bordered" style="width:100%;">
                                                        <thead class="bg-primary thHeight text-white" style="font-size:15px;">
                                                            <tr>
                                                                <th style="width:20%;"></th>
                                                                <th style="width:40%;">Previous Quotation</th>
                                                                <th style="width:40%;">New Quotation</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="tbodyTD" style="font-size:13px;">
                                                            <tr>
                                                                <td class="text-black font-weight-bold">Standard Rate (&#8369;)</td>
                                                                <td class="text-black">2000</td>
                                                                <td class="text-primary font-weight-bold" id="standardRate">2000</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-black font-weight-bold">Delay Fee (&#8369;)</td>
                                                                <td class="text-black">3000</td>
                                                                <td class="text-success font-weight-bold" id="tugboatDelayFee">2500</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-black font-weight-bold">Violation Fee (&#8369;)</td>
                                                                <td class="text-black">3000</td>
                                                                <td class="text-danger font-weight-bold" id="violationFee">3500</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-black font-weight-bold">Late Fee (&#8369;)</td>
                                                                <td class="text-black">3000</td>
                                                                <td class="text-danger font-weight-bold" id="consigneeLateFee">3500</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-black font-weight-bold">Minimum Damage Fee (&#8369;)</td>
                                                                <td class="text-black">2000</td>
                                                                <td class="text-success font-weight-bold" id="minDamageFee">1500</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-black font-weight-bold">Maximum Damage Fee (&#8369;)</td>
                                                                <td class="text-black">4000</td>
                                                                <td class="text-primary font-weight-bold" id="maxDamageFee">4000</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-black font-weight-bold">Maximum Discount (&#37;)</td>
                                                                <td class="text-black">8</td>
                                                                <td class="text-danger font-weight-bold" id="discount">12</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-black font-weight-bold">Author</td>
                                                                <td class="text-black font-weight-bold">Hi-Energy</td>
                                                                <td class="text-black font-weight-bold">Tugmaster</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" id="contractsID">
                                <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#requestChangesModal">Request for Changes</button>
                                <button id="applySignatureButton" class="btn btn-success waves-effect" data-toggle="modal" data-target="#applySignatureModal">Sign and Accept Contract</button>
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
    @include('Consignee.Contracts.infoRChanges')
@endsection