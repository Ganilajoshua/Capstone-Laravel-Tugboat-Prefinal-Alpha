
<div class="table-responsive">
    <table class="detailedTable text-center table table-striped" style="width:100%">
        <thead class="bg-primary">
            <tr class="text-white">
                <th>#</th>
                <th>Date of Transaction</th>
                <th>Status</th>
                <th>Total Amount (&#8369;)</th>
                <th class="noSortAction">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(count($paid)>0)    
                @foreach($paid as $paid)
                    <tr class="tr-shadow">
                        <td>{{$paid->intChequeID}}</td>
                        <td></td>
                        <td>
                            <div class="badge badge-success">{{$paid->enumStatus}}</div>
                        </td>
                        <td>{{$paid->intAmount}}</td>
                        <td>
                            <div class="ml-1 mr-1">
                                {{-- <button onclick="validate({{$paid->intBillID}})" class="btn btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
                                    <i class="bigIcon ion ion-ios-approve"></i>
                                </button> --}}
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>