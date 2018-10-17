@extends('Templates.newTemplate')

{{-- Local Styles --}}
@section('assets')
    @include('Reports.styles')
@endsection

{{-- Local Scripts --}}
@section('scripted')
    @include('Reports.scripts')
@endsection

@section('content')
<section class="section">
    <h1 class="section-header">
        <div>
            Reports
        </div>
    </h1>
    <div class="ReportsChoices">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card border-primary card-primary">
                    <div class="card-header text-center">
                        <div class="float-right">
                            <div class="btn-group">
                            <a href="{{ url('/administrator/reports/disabledTReport')}}" class="btnGeneratePDF1 btn active waves-effect">Generate PDF</a>
                            <a href="{{ url('/administrator/reports/jobOrderReport')}}" class="btnGeneratePDF2 btn active waves-effect">Generate PDF</a>
                            <a href="{{ url('/administrator/reports/salesReport')}}" class="btnGeneratePDF3 btn active waves-effect">Generate PDF</a>
                            <a href="{{ url('/administrator/reports/soaReport')}}" class="btnGeneratePDF4 btn active waves-effect">Generate PDF</a>
                            <a href="{{ url('/administrator/reports/serviceReport')}}" class="btnGeneratePDF5 btn active waves-effect">Generate PDF</a>
                            </div>
                        </div>
                        <h4 class="ml-5">Select Report</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <select class="selectReport js-states form-control" style="width:100%;">
                                    <option></option>
                                    <option value="disabledTugboats">Tugboat Details Reports</option>
                                    <option value="jobOrderReport">Job Order Report</option>
                                    <option value="salesReport">Sales Report</option>
                                    <option value="statementOfAccount">Consignee Details Report</option>
                                    <option value="serviceReport">Service Report</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <button type="button" class="btn btn-primary pull-right" id="daterange-btn">
                                            <span>
                                                <i class="fa fa-calendar"></i> Date range picker
                                            </span>
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-12">
                                <button class="submitReports btn btn-primary waves-effect float-right">Submit</button>
                            </div>
                        </div>
                        <div class="row viewChoice mb-5 animated fadeIn fast">
                            <div class="col-12">
                                <div class="float-left">
                                    <div class="btn-group btn-group-toggle" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="tableView btn btn-secondary active waves-effect"><i class="fas fa-table mr-1"></i>Table View</button>
                                        <button type="button" class="chartView btn btn-secondary waves-effect"><i class="fas fa-chart-area mr-1"></i>Chart View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('Reports.charts')
                        <div class="row mt-5 rowDisabledTugboats animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center border-primary" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Tugboat Name</th>
                                            <th class="width40">Remarks</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        @if(count($admintbs)>0)
                                            @foreach($admintbs as $admintb)
                                                <tr>
                                                    <td>{{$admintb->strName}}</td>
                                                    <td>{{$admintb->enumTStatus}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-5 rowJobOrderReport animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped border-primary" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr class="text-center">
                                            <th>Date &amp; Time</th>
                                            <th>Job Order No.</th>
                                            <th>Consignee Name</th>
                                            <th>Total Amount(&#8369;)</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        @if(count($joborders)>0)
                                            @foreach($joborders as $joborder)
                                                <tr>
                                                <td class="text-center">{{$joborder->datStartDate}} {{$joborder->tmStart}}</td>
                                                <td class="text-center">JO-{{$joborder->intJobOrderID}} </td>
                                                <td class="text-center">{{$joborder->strCompanyName}}</td>
                                                <td class="text-center">{{$joborder->totaljo}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-5 rowSalesReport animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center border-primary" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Invoice No.</th>
                                            <th>Consignee Name</th>
                                            <th>Status</th>
                                            <th>Total(&#8369;)</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                            @foreach ($sales as $sale)
                                                <tr>
                                                    <td>INV-{{$sale->intInvoiceID}}</td>
                                                    <td>{{$sale->strCompanyName}}</td>
                                                    <td>{{$sale->enumStatus}}</td>
                                                    <td>{{$sale->salessum}}</td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-5 rowSOA animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center border-primary" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Consignee Name</th>
                                            <th>Start of Contract</th>
                                            <th>End of Contract</th>
                                            <th>Contract Validity</th>
                                            <th>Contract Status</th>
                                            <th>Current Fund</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                            @if(count($consignees)>0)
                                            @foreach($consignees as $consignee)
                                        <tr>
                                                
                                                <td class="text-center">{{$consignee->strCompanyName}}</td>
                                                <td class="text-center">{{$consignee->datContractActive}}</td>
                                                <td class="text-center">{{$consignee->datContractExpire}}</td>
                                                @if($consignee->enumConValidity == '1')
                                                    <td class="text-center">{{$consignee->enumConValidity}} year</td>
                                                @else
                                                    <td class="text-center">{{$consignee->enumConValidity}} months</td>
                                                @endif
                                                <td class="text-center">{{$consignee->enumStatus}}</td>
                                                @if(($consignee->fund)!=null)
                                                <td class="text-center">{{$consignee->fund}}</td>
                                                @else
                                                <td class="text-center">0</td>
                                                @endif
                                        </tr>
                                            @endforeach
                                            @endif
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                        <div class="row mt-5 rowServiceReport animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center border-primary" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Service Name</th>
                                            <th>Number of Job Orders Catered</th>
                                            <th>Amount (&#8369;)</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        @if(count($services)>0)
                                            @foreach($services as $services)
                                                <tr>
                                                        <td>{{$services->enumServiceType}}</td>
                                                        <td>{{$services->Service_Count}}</td>
                                                        @if(($services->servicesum)!= null)
                                                            <td>{{$services->servicesum}}</td>
                                                        @else
                                                            <td class="text-center">0</td>
                                                        @endif
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
        </div>
    </div>
</section>
@endsection
