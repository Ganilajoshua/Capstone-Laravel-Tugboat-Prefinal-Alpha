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
    @if(count($dispatch4)>0)
        @foreach($dispatch4 as $dispatch4)
                <tr>
                    <td>{{$dispatch4->intDispatchTicketID}}</td>
                    <td>{{$dispatch4->strCompanyName}}</td>
                    <td>{{$dispatch4->strName}}</td>
                    @if($dispatch4->strJOStartPoint == null)
                        <td>
                            {{$dispatch4->strBerthName}} {{$dispatch4->strPierName}}
                        </td>
                    @else
                        <td>
                            {{$dispatch4->strJOStartPoint}}
                        </td>
                    @endif
                    @if($dispatch4->strJODestination == null)
                        <td>
                            {{$dispatch4->strBerthName}} {{$dispatch4->strPierName}}
                        </td>
                    @else
                    <td>
                        {{$dispatch4->strJODestination}}
                    </td>
                    @endif
                    <td>{{$dispatch4->dateEnded}} {{$dispatch4->tmEnded}}</td>
                    <td>{{$dispatch4->enumServiceType}}</td>
                    <td style="width:15%">
                        <span data-target="#infoModal">
                        <div class="ml-1 mr-1">
                            <button  onclick="getData({{$dispatch4->intDispatchTicketID}})" class="btnView btn btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
                                <i class="bigIcon ion ion-ios-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-success waves-circle waves-effect" data-toggle="tooltip" title="Print" role="button">
                                <a class="miniIcon fa fa-print" href="{{url('/administrator/transactions/dispatchticket/'.$dispatch4->intDispatchTicketID.'/pdf')}}"></a>
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