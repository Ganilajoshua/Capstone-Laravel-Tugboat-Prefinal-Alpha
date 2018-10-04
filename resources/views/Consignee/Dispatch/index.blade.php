@extends('Consignee.Templates.ConsigneeTemplate')

@section('styles')
    @include('Consignee.Dispatch.styles')
@endsection

@section('scripts')
    @include('Consignee.Dispatch.scripts')
@endsection

@section('content')
    <section class="p-t-20">
        <h1 class="section-header">
            <div>
                Dispatch Ticket
            </div>
		</h1>
		<div class="dispatchTicketTable zoomIn animated fast">
			<div class="card card-primary">
				<div class="card-header">
						<h4> Dispatch Ticket List</h4> <small class="ml-1 smCat">
								To be accepted
							</small>
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
					@if(count($accept)>0)
						@foreach($accept as $accept)
								<tr>
									<td>
                                        {{$accept->intDispatchTicketID}}
                                    </td>
									<td>
                                        {{$accept->strName}}
                                    </td>
									<td>
                                        {{$accept->strJOStartPoint}}
                                    </td>
									<td>
                                        {{$accept->strJODestination}}
                                    </td>
									<td>san kukunin?</td>
									<td>
                                        {{$accept->strServicesName}}
                                    </td>
									<td style="width:15%">
										<span data-target="#infoModal">
										<div class="ml-1 mr-1">
											<button  onclick="get({{$accept->intDispatchTicketID}})" class="btnView btn btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
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
		</div>
		@include('Consignee.Dispatch.info')
    </section>
@endsection