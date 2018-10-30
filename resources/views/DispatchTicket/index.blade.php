@extends('Templates.newTemplate')

@section('assets')
    @include('DispatchTicket.styles')
@endsection

@section('scripted')
    @include('DispatchTicket.scripts')
@endsection
@section('content')
    <section class="section">
		<h1 class="section-header">
			<div>
				Dispatch Ticket
                <small class="ml-1 smCat">
					Transactions
                </small>
            </div>
		</h1>
		<a href="{{ url('/administrator/transactions/dispatchticket/printPDF')}}" class="btn btn-primary waves-effect">Generate PDF</a>
		<div class="dispatchTicketTable zoomIn animated fast">
			<div class="card card-primary">
				<div class="card-header">
					<h4> Dispatch Ticket List</h4>
				</div>
				<div class="card-header">
						<ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pendingDispatch-tab" data-toggle="pill" href="#pendingDispatch" role="tab" aria-controls="pendingDispatch" aria-selected="true">Pending Dispatch Ticket</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="signed-tab" data-toggle="pill" href="#signed" role="tab" aria-controls="signed" aria-selected="true">Signed Dispatch Ticket</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="finalizeDispatch-tab" data-toggle="pill" href="#finalizeDispatch" role="tab" aria-controls="finalizeDispatch" aria-selected="false">Finalization of Dispatch Ticket</a>
							</li>
							<li class="nav-item">
									<a class="nav-link" id="doneDispatch-tab" data-toggle="pill" href="#doneDispatch" role="tab" aria-controls="doneDispatch" aria-selected="false">Finalized Dispatch Ticket</a>
							</li>
						</ul>
				</div>
			<div class="card-body">
				<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pendingDispatch" role="tabpanel" aria-labelledby="pendingDispatch-tab">
					<div class="consigneeInvoices animated zoomIn fast">
						<div class="table-responsive">
							<table class="detailedTable text-center table table-striped" style="width:100%">
								<thead class="bg-primary">
									<tr>
										<th>Ticket #</th>
										<th>Company Name</th>
										<th>Tugboat Used</th>
										<th>From</th>
										<th>To</th>
										<th>Time Arrived</th>
										<th>Purpose of Service</th>
										<th class="noSortAction">Actions</th>
									</tr>
								</thead>
								<tbody>
						@if(count($dispatch)>0)
							@foreach($dispatch as $dispatch)
									<tr>
										<td>{{$dispatch->intDispatchTicketID}}</td>
										<td>{{$dispatch->strCompanyName}}</td>
										<td>{{$dispatch->strName}}</td>
										@if($dispatch->strJOStartPoint == null)
											<td>
												{{$dispatch->strBerthName}} {{$dispatch->strPierName}}
											</td>
										@else
											<td>
												{{$dispatch->strJOStartPoint}}
											</td>
										@endif
										@if($dispatch->strJODestination == null)
											<td>
												{{$dispatch->strBerthName}} {{$dispatch->strPierName}}
											</td>
										@else
										<td>
											{{$dispatch->strJODestination}}
										</td>
										@endif
										<td>{{$dispatch->dateEnded}} {{$dispatch->tmEnded}}</td>
										<td>{{$dispatch->enumServiceType}}</td>
										<td style="width:15%">
											<span data-target="#infoModal">
											<div class="ml-1 mr-1">
												<button  onclick="getData({{$dispatch->intDispatchTicketID}})" class="btnView btn btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
													<i class="bigIcon ion ion-ios-eye"></i>
												</button>
												<button class="btn btn-sm btn-success waves-circle waves-effect" data-toggle="tooltip" title="Print" role="button">
													<i class="miniIcon fa fa-print"></i>
												</button>
											</div>
											</span>
										</td>
									</tr>
							@endforeach
						@else
									<tr>
										<td>no dispatch ticket found</td>
									</tr>
						@endif
								</tbody>
	{{--  --}}
							</table>
						</div>
					</div>
				</div>
				<div class="tab-pane fade show" id="signed" role="tabpanel" aria-labelledby="signed-tab">
					@include('DispatchTicket.signed')
				</div>
				<div class="tab-pane fade show" id="finalizeDispatch" role="tabpanel" aria-labelledby="finalizeDispatch-tab">
					@include('DispatchTicket.finalization')
				</div>
				<div class="tab-pane fade show" id="doneDispatch" role="tabpanel" aria-labelledby="doneDispatch-tab">
					@include('DispatchTicket.finalized')
				</div>
			</div>
		</div>
	</div>
    </section>
	@include('DispatchTicket.info')
	@include('DispatchTicket.charges')	
	{{-- @include('DispatchTicket.printPDF')	 --}}
	
@endsection

