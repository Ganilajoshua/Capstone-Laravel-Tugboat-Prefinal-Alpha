
<div class="detLayout mt-3">
    <table id="detailedTable" class="table table-striped table-bordered fadeIn animated" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">Classification Number</th>
                <th class="text-center">Name</th>
                <th class="text-center">Length</th>
                <th class="text-center">Horse Power</th>
                <th class="text-center">Gross Tonnage</th>
                <th class="text-center">License Expiration Date</th>
                <th class="noSortAction text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($tugboats)>0)
                @foreach($tugboats as $tugboats)
                    <tr class="text-center border border-success">
                        <td></td>
                        <td>{{$tugboats->strName}}</td>
                        <td>{{$tugboats->strLength}} Meters</td>
                        <td>{{$tugboats->strHorsePower}}</td>
                        <td>{{$tugboats->strGrossTonnage}}</td>
                        <td>05/04/2021</td>
                        <td>
                            <div class="ml-1 mr-1">
                                <button onclick="editData({{$tugboats->intTugboatMainID}})" class="btn btn-secondary optCustom" data-toggle="tooltip" title="Edit" role="button">
                                    <i class="fas fa-edit iconcenter custSize"></i>
                                </button>
                                <button onclick="deleteTugboat({{$tugboats->intTugboatMainID}})"type="button" class="btn btn-danger optCustom" data-toggle="tooltip" title="Delete">
                                    <i class="fas fa-trash custSize"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>