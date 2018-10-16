<div class="table-responsive">
        <table class="detailedTable text-center table table-striped" style="width:100%">
            <thead class="bg-primary">
                <tr class="text-white">
                    <th>Cheque ID:</th>
                    <th>Date of Payment</th>
                    <th>Status</th>
                    <th>Total Amount (&#8369;)</th>
                    <th class="noSortAction">Actions</th>
                </tr>
            </thead>
            <tbody>
            @if(count($pending)>0)    
                @foreach($pending as $pending)
                    <tr class="tr-shadow">
                        <td>{{$pending->intChequeID}}</td>
                        <td></td>
                        <td>
                            <div class="badge badge-success">{{$pending->enumStatus}}</div>
                        </td>
                        <td>{{$pending->intAmount}}</td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item waves-effect btnView" data-toggle="tooltip" data-placement="top" title="More">
                                    <i class="zmdi zmdi-more"></i>
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