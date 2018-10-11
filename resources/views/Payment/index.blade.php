@extends('Templates.newTemplate')

@section('assets')
    @include('Payment.styles')
@endsection

@section('scripted')
    @include('Payment.scripts')
@endsection
@section('content')
<section class="section">
        <h1 class="section-header">
                <div>
                    Payment
                    <small class="ml-1 smCat">
                        Transactions
                    </small>
                </div>
            </h1>
		<div class="container paymenttable">
			<div class="billingTable zoomIn animated fast">
				<div class="card card-primary">
					<div class="card-header">
						<ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pillsPendingforPayment-tab" data-toggle="pill" href="#pillsPendingforPayment" role="tab" aria-controls="pillsPendingforPayment" aria-selected="true">Pending for Payment</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pillsPending-tab" data-toggle="pill" href="#pillsPending" role="tab" aria-controls="pillsPending" aria-selected="false">Pending Bills</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pillsPaid-tab" data-toggle="pill" href="#pillsPaid" role="tab" aria-controls="pillsPaid" aria-selected="false">Paid Bills</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pillsRejected-tab" data-toggle="pill" href="#pillsRejected" role="tab" aria-controls="pillsRejected" aria-selected="false">Rejected Bills</a>
							</li>
						</ul>
					</div>
					<div class="card-body">
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pillsPendingforPayment" role="tabpanel" aria-labelledby="pillsPendingforPayment-tab">
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
                            <div class="tab-pane fade" id="pillsPaid" role="tabpanel" aria-labelledby="pillsPaid-tab">
                                @include('Payment.paidBills')
                            </div>
                            <div class="tab-pane fade" id="pillsPending" role="tabpanel" aria-labelledby="pillsPending-tab">
                                @include('Payment.pendingBills')
                            </div>
                            <div class="tab-pane fade" id="pillsRejected" role="tabpanel" aria-labelledby="pillsRejected-tab">
                                @include('Payment.rejectedBills')
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    @include('Payment.info')
    @include('Payment.infopayment')
    @include('Payment.scripts')
@endsection