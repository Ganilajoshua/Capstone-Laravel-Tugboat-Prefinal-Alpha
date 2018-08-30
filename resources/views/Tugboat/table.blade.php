
<div class="detLayout mt-3">
    <table class="detailedTable table table-striped fadeIn animated" style="width:100%">
        <thead class="bg-primary">
            <tr>
                <th class="text-center">Classification Number</th>
                <th class="text-center">Name</th>
                <th class="text-center">Length (M)</th>
                <th class="text-center">Horse Power (HP)</th>
                <th class="text-center">Gross Tonnage (Tons)</th>
                <th class="noSortAction text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($tugboats)>0)
                @foreach($tugboats as $tugboats)
                    <tr class="text-center">
                        <td>{{$tugboats->strClassNum}}</td>
                        <td>{{$tugboats->strName}}</td>
                        <td>{{$tugboats->strLength}} Meters</td>
                        <td>{{$tugboats->strHorsePower}}</td>
                        <td>{{$tugboats->strGrossTonnage}}</td>
                        <td>
                            <div class="ml-1 mr-1">
                                <button onclick="editData({{$tugboats->intTugboatMainID}})" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit" role="button">
                                    <i class="miniIcon ion ion-edit"></i>
                                </button>
                                <button onclick="deleteTugboat({{$tugboats->intTugboatMainID}})"type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                    <i class="miniIcon fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>