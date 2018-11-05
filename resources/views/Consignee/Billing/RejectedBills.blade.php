
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
                @if(count($rejected)>0)    
                    @foreach($rejected as $rejected)
                        <tr class="tr-shadow">
                            <td>{{$rejected->intChequeID}}</td>
                            <td>{{$rejected->dateEnded}}</td>
                            <td>
                                <div class="badge badge-success">{{$rejected->enumStatus}}</div>
                            </td>
                            <td>{{$rejected->intAmount}}</td>
                            <td>
                                <div class="ml-1 mr-1">
                                    <button class="item waves-effect btnView" data-toggle="tooltip" data-placement="top" title="More">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                    <button class="item waves-effect" data-toggle="tooltip" data-placement="top" title="Print">
                                        <a class="miniIcon fa fa-print" href="{{url('/consignee/paymentbilling/billing/'.$pending->intInvoiceID.'/pdf')}}"></a>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>