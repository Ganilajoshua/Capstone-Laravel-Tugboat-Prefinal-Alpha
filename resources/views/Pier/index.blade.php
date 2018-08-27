@extends('Templates.newTemplate')

@section('assets')
    @include('Pier.scripts')
@endsection
@section('assets2')
    
@endsection
@section('content')
<section class="section">
    <h1 class="section-header">
        <div>
        Pier
        <small class="ml-1 smCat">
            Maintenance
        </small>
        </div>
    </h1>
    <div id="detLayout" class="detLayout mt-3">
        <button id="addPierButton" class="detAdd btn btn-primary text-center border-dark bounceIn animated">
            Add
        </button>
        <div class="mt-3">
            @if(count($piers)>0)    
                <table class="detailedTable table table-striped text-center table-bordered mainTable" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Pier</th>
                            <th class="noSortAction">Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                        @foreach($piers as $piers)
                            <tr>
                                <td>{{$piers->strPierName}}</td>
                                <td>
                                    <div class="ml-1 mr-1">
                                        <button onclick="getPier({{$piers->intPierID}})" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit" role="button">
                                            <i class="miniIcon fas fa-edit custSize"></i>
                                        </button>
                                        <button onclick="deletePier({{$piers->intPierID}})" class="btn btn-sm btn btn-danger" data-toggle="tooltip" title="Delete">
                                            <i class="miniIcon fas fa-trash custSize"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <table class="detailedTable table table-striped text-center table-bordered mainTable" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Pier</th>
                            <th class="noSortAction">Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</section>
@include('Pier.create')
@include('Pier.edit')
@endsection
