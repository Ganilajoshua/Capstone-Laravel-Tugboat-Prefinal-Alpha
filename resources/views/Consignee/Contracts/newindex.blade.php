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
            @elseif($contractlist->enumStatus == 'Requesting For Changes')
            @elseif($contractlist->enumStatus == 'Finalized')
            @elseif($contractlist->enumStatus == 'Active')
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
@endsection

