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
                    <div class="card-header text-center"style="border-bottom:1px solid !important;">
                            <div class="float-right">
                                <div class="btn-group">
                                    <a href="#" class="btn active waves-effect">Generate PDF</a>
                                </div>
                            </div>
                            <h4 class="ml-5">Select Report</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <select class="selectReport js-states form-control" style="width:100%;">
                                    <option></option>
                                    <option value="disabledTugboats">Disabled Tugboat Reports</option>
                                    <option value="jobOrderReport">Job Order Report</option>
                                    <option value="salesReport">Sales Report</option>
                                    <option value="statementOfAccount">Statement of Account</option>
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
                        <div class="row mt-3 rowDisabledTugboats animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center border-primary" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Tugboat Name</th>
                                            <th class="width40">Remarks</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <tr>
                                            <td>Energy Master</td>
                                            <td>Under Repair</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowJobOrderReport animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped border-primary" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr class="text-center">
                                            <th>Date &amp; Time</th>
                                            <th>Consignee Name</th>
                                            <th>Tugboats Used</th>
                                            <th>Paid</th>
                                            <th>Unpaid</th>
                                            <th>Subtotal (&#8369;)</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <tr>
                                            <td class="text-center">05-04-2018 17:00</td>
                                            <td class="text-center">Akari</td>
                                            <td>
                                                <ul>
                                                    <li>Energy Master</li>
                                                    <li>Energy Sun</li>
                                                    <li>MT Moon</li>
                                                </ul>
                                            </td>
                                            <td class="text-center text-success">25000</td>
                                            <td class="text-center text-danger">10000</td>
                                            <td class="text-center">35000</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">05-04-2018 17:00</td>
                                            <td class="text-center">Bootsy</td>
                                            <td>
                                                <ul>
                                                    <li>Energy Moon</li>
                                                    <li>Energy Jupiter</li>
                                                    <li>MT Mars</li>
                                                </ul>
                                            </td>
                                            <td class="text-center text-success">25000</td>
                                            <td class="text-center text-danger">0</td>
                                            <td class="text-center ">25000</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-primary">
                                            <td><h6>Subtotal (&#8369;)</h6></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">50000</td>
                                            <td class="text-center">10000</td>
                                            <td></td>
                                        </tr>
                                        <tr class="border-primary">
                                            <td><h5>Total Amount (&#8369;)</h5></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center"><h5 class="text-primary font-weight-bold">65000</h5></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowSalesReport animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center border-primary" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Consignee Name</th>
                                            <th>Total Number of Job Orders</th>
                                            <th>Amount (&#8369;)</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <tr>
                                            <td>Akari</td>
                                            <td>6</td>
                                            <td>166000</td>
                                        </tr>
                                        <tr>
                                            <td>Bootsy</td>
                                            <td>3</td>
                                            <td>90000</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-primary">
                                            <td><h5>Total Amount (&#8369;)</h5></td>
                                            <td></td>
                                            <td class="text-center"><h5 class="text-primary font-weight-bold">55000</h5></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowSOA animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center border-primary" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Date &amp; Time</th>
                                            <th>Consignee Name</th>
                                            <th>Original Amount</th>
                                            <th>Amount Added</th>
                                            <th>Amount Refunded</th>
                                            <th>Subtotal (&#8369;)</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <tr>
                                            <td>01-03-2018 17:00</td>
                                            <td>Akari</td>
                                            <td class="text-primary font-weight-bold">11000</td>
                                            <td class="text-success">10000</td>
                                            <td>0</td>
                                            <td>21000</td>
                                        </tr>
                                        <tr>
                                            <td>05-04-2018 17:00</td>
                                            <td>Bootsy</td>
                                            <td class="text-primary font-weight-bold">21000</td>
                                            <td>0</td>
                                            <td class="text-danger">5000</td>
                                            <td>16000</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-primary">
                                            <td class="text-center"><h5>Total Amount (&#8369;)</h5></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center"><h5 class="text-primary font-weight-bold">37000</h5></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowServiceReport animated fadeIn fast">
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
                                        <tr>
                                            <td>Hauling Service</td>
                                            <td>3</td>
                                            <td>45000</td>
                                        </tr>
                                        <tr>
                                            <td>Tug Assist Service</td>
                                            <td>1</td>
                                            <td>10000</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-primary">
                                            <td class="text-center"><h5>Total Amount (&#8369;)</h5></td>
                                            <td></td>
                                            <td class="text-center"><h5 class="text-primary font-weight-bold">55000</h5></td>
                                        </tr>
                                    </tfoot>
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
