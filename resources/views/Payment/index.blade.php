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
								<a class="nav-link active" id="pillsPending-tab" data-toggle="pill" href="#pillsPending" role="tab" aria-controls="pillsPending" aria-selected="false">Pending Bills</a>
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
                            <div class="tab-pane fade" id="pillsPaid" role="tabpanel" aria-labelledby="pillsPaid-tab">
                                @include('Payment.paidBills')
                            </div>
                            <div class="tab-pane fade show active" id="pillsPending" role="tabpanel" aria-labelledby="pillsPending-tab">
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
	@include('Payment.pendingInfo')
    @include('Payment.scripts')
@endsection