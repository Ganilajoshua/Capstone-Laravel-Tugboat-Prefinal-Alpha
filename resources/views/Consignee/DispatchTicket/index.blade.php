@extends('Consignee.Templates.ConsigneeTemplate')

@section('styles')
    @include('Consignee.DispatchTicket.styles')
@endsection

@section('scripts')
    @include('Consignee.DispatchTicket.scripts')
@endsection

@section('content')
    <section class="section">
		<div class="container">
			<div class="dispatchTicketTable zoomIn animated fast">
				<div class="card card-primary">
					<div class="card-header">
						<h4> Dispatch Ticket List</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="detailedTable text-center table table-striped" style="width:100%">
								<thead class="bg-primary">
									<tr class="text-white">
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
													<i class="ion ion-ios-eye" style="font-size:25px;margin-top:2px;"></i>
												</button>
												<button class="btn btn-sm btn-success waves-circle waves-effect" data-toggle="tooltip" title="Print" role="button">
													<i class="fa fa-print" style="font-size:18px;margin-top:2px;"></i>
												</button>
											</div>
										</td>
									</tr>
									<tr>
										<td>13</td>
										<td>Energydfdfd Sun</td>
										<td>Baseco fdfdfPort Area</td>
										<td>Guadadfdfdlupe, Makati City</td>
										<td>15:00fdf dfdHRS</td>
										<td>Towed df Bulgy containing Oil and Kerosene</td>
										<td style="width:15%">
											<div class="ml-1 mr-1">
												<button class="btnView btn btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
													<i class="ion ion-ios-eye" style="font-size:25px;margin-top:2px;"></i>
												</button>
												<button class="btn btn-sm btn-success waves-circle waves-effect" data-toggle="tooltip" title="Print" role="button">
													<i class="fa fa-print" style="font-size:18px;margin-top:2px;"></i>
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
		</div>
	</section>
	@include('Consignee.DispatchTicket.info')
@endsection