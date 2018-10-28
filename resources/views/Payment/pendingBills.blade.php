<div class="table-responsive">
    <table class="text-center table detailedTable table-striped" style="width:100%">
            <thead class="bg-primary">
            <tr class="text-white">
                <th>Cheque #</th>
                <th>Company</th>
                <th>Date of Payment</th>
                <th>Status</th>
                <th>Cheque Amount (&#8369;)</th>
                <th class="noSortAction">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(count($pending)>0)    
            @foreach($pending as $pending)
            <tr class="tr-shadow">
                <td>{{$pending->intChequeID}}</td>
                <td>{{$pending->strCompanyName}}</td>
                <td>{{$pending->dateEnded}}</td>
                    <td>
                        <div class="badge badge-success">{{$pending->enumStatus}}</div>
                    </td>
                    <td>{{$pending->intAmount}}</td>
                    <td>
                        <div class="ml-1 mr-1">
                            <button onclick="pendinginfo({{$pending->intBillID}})" class="info btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
                                    <i class="bigIcon ion ion-ios-eye"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
        @endif
    </tbody>
</table>
</div>      