<div class="table-responsive">
        <table class="detailedTable text-center table table-striped" style="width:100%">
            <thead class="bg-primary">
                <tr class="text-white">
                    <th>Cheque #</th>
                    <th>Company</th>
                    <th>Date of Payment</th>
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
                        <td>{{$paid->strCompanyName}}</td>
                        <td>{{$paid->dtPayment}}</td>
                        <td>
                            <div class="badge badge-success">{{$paid->enumStatus}}</div>
                        </td>
                        <td>{{$paid->intAmount}}</td>
                        <td>
                            <div class="ml-1 mr-1">
                                <button onclick="pendinginfo({{$paid->intBillID}})" class="paidss btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
                                    <i class="bigIcon ion ion-ios-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-success waves-circle waves-effect" data-toggle="tooltip" title="Print" role="button">
                                        <a class="miniIcon fa fa-print" href="{{url('/administrator/transactions/payment/'.$paid->intBillID.'/pdf')}}"></a>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>