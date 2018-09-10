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
		<div class="dispatchTicketTable zoomIn animated fast">
			<div class="card card-primary">
				<div class="card-header">
					<h4> Dispatch Ticket List</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="detailedTable text-center table table-striped" style="width:100%">
							<thead class="bg-primary">
								<tr>
									<th>Ticket #</th>
									<th>Tugboat Used</th>
									<th>From</th>
									<th>To</th>
									<th>Time Arrived</th>
									<th>Purpose of Service</th>
									<th class="noSortAction">Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>72286</td>
									<td>Energy Sun</td>
									<td>Baseco Port Area</td>
									<td>Guadalupe, Makati City</td>
									<td>15:00 HRS</td>
									<td>Towed Barge Bulgy containing Oil and Kerosene</td>
									<td style="width:15%">
										<div class="ml-1 mr-1">
											<button class="btnView btn btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
												<i class="bigIcon ion ion-ios-eye"></i>
											</button>
											<button class="btn btn-sm btn-success waves-circle waves-effect" data-toggle="tooltip" title="Print" role="button">
												<i class="miniIcon fa fa-print"></i>
											</button>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </section>
    @include('DispatchTicket.info')
@endsection