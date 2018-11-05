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
    @if(count($dispatch2)>0)
        @foreach($dispatch2 as $dispatch2)
                <tr>
                    <td>{{$dispatch2->intDispatchTicketID}}</td>
                    <td>{{$dispatch2->strCompanyName}}</td>
                    <td>{{$dispatch2->strName}}</td>
                    @if($dispatch2->strJOStartPoint == null)
                        <td>
                            {{$dispatch2->strBerthName}} {{$dispatch2->strPierName}}
                        </td>
                    @else
                        <td>
                            {{$dispatch2->strJOStartPoint}}
                        </td>
                    @endif
                    @if($dispatch2->strJODestination == null)
                        <td>
                            {{$dispatch2->strBerthName}} {{$dispatch2->strPierName}}
                        </td>
                    @else
                    <td>
                        {{$dispatch2->strJODestination}}
                    </td>
                    @endif
                    <td>{{$dispatch2->dateEnded}} {{$dispatch2->tmEnded}}</td>
                    <td>{{$dispatch2->enumServiceType}}</td>
                    <td style="width:15%">
                        <span data-target="#infoModal">
                        <div class="ml-1 mr-1">
                            <button  onclick="getData({{$dispatch2->intDispatchTicketID}})" class="btnView btn btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
                                <i class="bigIcon ion ion-ios-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-success waves-circle waves-effect" data-toggle="tooltip" title="Print" role="button">
                                    <a class="miniIcon fa fa-print" href="{{url('/administrator/transactions/dispatchticket/'.$dispatch2->intDispatchTicketID.'/pdf')}}"></a>
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
