@extends('Templates.newTemplate')

{{-- Local Styles --}}
@section('assets')
    @include('Queries.styles')
@endsection

{{-- Local Scripts --}}
@section('scripted')
    @include('Queries.scripts')
@endsection

@section('content')
<section class="section">
    <h1 class="section-header">
        <div>
            Queries
        </div>
    </h1>
    <div class="queriesChoices">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Select Query</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <select class="selectQuery js-states form-control" style="width:100%;">
                                    <option></option>
                                    <option value="mostUsedT">Most Used Tugboats</option>
                                    <option value="serviceJO">Number of Job Order per Service</option>
                                    <option value="consigneePendingPayment">Consignees with Pending Payment</option>
                                    <option value="mostActiveCJO">Most Active Consignee (Job Orders)</option>
                                    <option value="mostActiveCContractRenew">Most Active Consignee (Contract Renewal)</option>
                                    <option value="mostActiveAffiliatesJO">Most Active Affiliate (Job Orders)</option>
                                    <option value="mostActiveAffiliatesTeam">Most Active Affiliate (Team Requests)</option>
                                    <option value="mostActiveAffiliatesTugboat">Most Active Affiliate (Tugboat Requests)</option>
                                    <option value="paidCateredJO">Paid Catered Job Orders</option>
                                    <option value="unpaidCateredJO">Unpaid Catered Job Orders</option>
                                    <option value="consigneeExtraCredit">Consignee with Extra Credit</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3 rowMostUsedT animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Tugboat Name</th>
                                            <th class="width40">Number of Job Orders Catered</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                @if(count($mtugboat)>0)    
                                    @foreach($mtugboat as $mtugboat)
                                        <tr>
                                            <td>{{$mtugboat->strName}}</td>
                                            <td>{{$mtugboat->counter}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowServiceJO animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Service Name</th>
                                            <th class="width40">Number of Job Orders Catered</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        @if(count($joborder)>0)    
                                            @foreach($joborder as $joborder)
                                                <tr>
                                                    <td>{{$joborder->enumServiceType}}</td>
                                                    <td>{{$joborder->counter}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowCPendingPayment animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Consignee Name</th>
                                            <th class="width40">Total Pending Payment (&#8369;)</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                            @if(count($cpending)>0)    
                                            @foreach($cpending as $cpending)
                                                <tr>
                                                    <td>{{$cpending->strCompanyName}}</td>
                                                    <td>{{$cpending->counter}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowMostActiveCJO animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Consignee Name</th>
                                            <th class="width40">Number of Job Orders</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                            @if(count($activeconsignee)>0)    
                                            @foreach($activeconsignee as $activeconsignee)
                                                <tr>
                                                    <td>{{$activeconsignee->strCompanyName}}</td>
                                                    <td>{{$activeconsignee->counter}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowMostActiveCContractRenew animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Consignee Name</th>
                                            <th class="width40">Number of Contract Renewals</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        @if(count($renew)>0)    
                                            @foreach($renew as $renew)
                                                <tr>
                                                    <td>{{$renew->strCompanyName}}</td>
                                                    <td>{{$renew->counter}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowMostActiveAffiliatesJO animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Affiliate Name</th>
                                            <th>Number of Job Order Forward Requests Catered</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <tr>
                                            <td>None</td>
                                            <td>10</td>
                                        </tr>
                                        <tr>
                                            <td>Tugmaster Bargepool</td>
                                            <td>5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowMostActiveAffiliatesTeam animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center" style="width:100%">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>Affiliate Name</th>
                                                <th>Number of Teams Forwarded</th>
                                            </tr>
                                        </thead>  
                                        <tbody>
                                            <tr>
                                                <td>None</td>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <td>Tugmaster Bargepool</td>
                                                <td>5</td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowMostActiveAffiliatesTugboat animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center" style="width:100%">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>Affiliate Name</th>
                                                <th>Number of Tugboats Forwarded</th>
                                            </tr>
                                        </thead>  
                                        <tbody>
                                            <tr>
                                                <td>None</td>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <td>Tugmaster Bargepool</td>
                                                <td>5</td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowPaidCateredJO animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Job Order #</th>
                                            <th>Consignee Name</th>
                                            <th>Service Type</th>
                                            <th class="noSortAction">Amount</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                            @if(count($cpaid)>0)    
                                            @foreach($cpaid as $cpaid)
                                                <tr>
                                                    <td>{{$cpaid->intJobOrderID}}</td>
                                                    <td>{{$cpaid->strCompanyName}}</td>
                                                    <td>{{$cpaid->enumServiceType}}</td>
                                                    <td>{{$cpaid->fltBalanceRemain}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowUnpaidCateredJO animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Job Order #</th>
                                            <th>Consignee Name</th>
                                            <th>Service Type</th>
                                            <th class="noSortAction">Amount</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                            @if(count($cunpaid)>0)    
                                            @foreach($cunpaid as $cunpaid)
                                                <tr>
                                                    <td>{{$cunpaid->intJobOrderID}}</td>
                                                    <td>{{$cunpaid->strCompanyName}}</td>
                                                    <td>{{$cunpaid->enumServiceType}}</td>
                                                    <td>{{$cunpaid->fltBalanceRemain}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3 rowConsigneeExtraCredit animated fadeIn fast">
                            <div class="col-12">
                                <table class="detailedTable table table-striped text-center" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Consignee Name</th>
                                            <th class="width40">Account Balance (&#8369;)</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        @if(count($balance)>0)    
                                            @foreach($balance as $balance)
                                                <tr>
                                                    <td>{{$balance->strCompanyName}}</td>
                                                    <td>{{$balance->fltBalance}}</td>
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
