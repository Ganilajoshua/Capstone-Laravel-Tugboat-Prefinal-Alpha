@extends('Templates.newTemplate')

@section('assets')
    @include('Invoice.styles')
@endsection

@section('scripted')
    @include('Invoice.scripts')
@endsection
@section('content')
<section class="section">
        <h1 class="section-header">
                <div>
                    Billing
                    <small class="ml-1 smCat">
                        Transactions
                    </small>
                </div>
            </h1>
		<div class="container paymenttable">
			<div class="billingTable zoomIn animated fast">
				<div class="card card-primary">
					<div class="card-header"><h4>Invoice List</h4>
					</div>
					<div class="card-body">
                        <div class=" consigneeInvoices animated zoomIn fast">
                            <div class="table-responsive">
                                <table class="table detailedTable text-center" style="width:100%">
                                    <thead class="bg-primary">
                                            <tr>
                                                <th>Invoice #</th>
                                                <th>Company Name</th>
                                                <th>Service Type</th>
                                                <th class="noSortAction">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                    @if(count($invoice)>0)
                                        @foreach($invoice as $invoice)
                                                <tr>
                                                    <td>{{$invoice->intInvoiceID}}</td>
                                                    <td>{{$invoice->strCompanyName}}</td>
                                                    <td>{{$invoice->enumServiceType}}</td>
                                                    <td style="width:15%">
                                                        <span data-target="#infoModal">
                                                        <div class="ml-1 mr-1">
                                                            <button  onclick="infopayment({{$invoice->intInvoiceID}})" class="btnView btn btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
                                                                <i class="bigIcon ion ion-ios-eye"></i>
                                                            </button>
                                                            <button  onclick="pay({{$invoice->intInvoiceID}})" class="btn btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
                                                                <i class="bigIcon ion ion-ios-paid"></i>
                                                            </button>
                                                        </div>
                                                        </span>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>no data found</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    @include('Invoice.info')
    @include('Invoice.scripts')
@endsection