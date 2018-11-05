@extends('Consignee.Templates.ConsigneeTemplate')

@section('styles')
    @include('Consignee.Billing.styles')
@endsection

@section('scripts')
    @include('Consignee.Billing.scripts')
@endsection

@section('content')
    <section class="section">
		<div class="container">
			<div class="billingTable zoomIn animated fast">
				<div class="card">
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
								<div class=" consigneeInvoices animated slideInLeft fast">
									<div class="card card-primary">
										<div class="card-header">
											<div class="float-right">
												<button id="btnPaySelected" onclick="payselected()" class="btn btn-primary waves-effect animated zoomIn faster">
													Pay Selected
												</button>
											</div>
										</div>
										<div class="card-body p-0">
											<div class="table-responsive">
												<table class="table table-data2 text-center" style="width:100%">
													<thead>
														<tr>
															<th>
																<label class="au-checkbox">
																	<input type="checkbox" id="checkall">
																	<span class="au-checkmark"></span>
																</label>
															</th>
															<th>#</th>
															<th>Date of Transaction</th>
															<th>Total Amount
																{{-- (&#8369;) --}}
															</th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody>
													@if(count($dispatch)>0)    
															@foreach($dispatch as $dispatch)
														<tr class="tr-shadow">
															<td>
																<label class="au-checkbox">
																	<input type="checkbox" value="{{$dispatch->intInvoiceID}}" id="" class="checkbox billcheckbox">
																	<span class="au-checkmark"></span>
																</label>
															</td>
															<td>{{$dispatch->intInvoiceID}}</td>
															<td>{{$dispatch->created_at}}</td>
															<td>{{$dispatch->fltBalanceRemain}}</td>
															<td>
																<div class="table-data-feature">
																	<button class="item waves-effect btnView" data-toggle="tooltip" data-placement="top" title="More">
																		<i class="zmdi zmdi-more"></i>
																	</button>
																	<button class="item waves-effect" data-toggle="tooltip" data-placement="top" title="Print">
																		{{-- <i class="miniIcon fa fa-print"></i> --}}
																		{{-- <a class="miniIcon fa fa-print" href="{{url('/consignee/contracts/'.$id.'/pdf')}}"></a> --}}
																		<a class="miniIcon fa fa-print" target="_blank" href="{{url('/consignee/paymentbilling/billing/'.$dispatch->intInvoiceID.'/pdf')}}"></a>
																	</button>
																</div>
															</td>
														</tr>
														<tr class="spacer"></tr>
														@endforeach
													@endif
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="pillsPaid" role="tabpanel" aria-labelledby="pillsPaid-tab">
								@include('Consignee.Billing.paidBills')
							</div>
							<div class="tab-pane fade" id="pillsPending" role="tabpanel" aria-labelledby="pillsPending-tab">
								@include('Consignee.Billing.pendingBills')
							</div>
							<div class="tab-pane fade" id="pillsRejected" role="tabpanel" aria-labelledby="pillsRejected-tab">
									@include('Consignee.Billing.RejectedBills')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@include('Consignee.Billing.info')
@endsection