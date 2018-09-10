@extends('Templates.newTemplate')

{{-- Local Styles --}}
@section('assets')
@endsection

{{-- Local Scripts --}}
@section('scripted')
    @include('Pier.scripts')
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
                <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                    <thead class="bg-primary">
                        <tr>
                            <th>Pier</th>
                            <th>Status</th>
                            <th class="noSortAction">Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                        @foreach($piers as $piers)
                            <tr>
                                <td>{{$piers->strPierName}}</td>

                                <td>
                                    @if(($piers->isActive) == 1)
                                        <div class="pierCheckbox" data-id="{{$piers->intPierID}}">
                                            <label>
                                                <input type="checkbox" checked id="" data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$piers->intPierID}}">
                                            </label>
                                        </div>    
                                    @elseif(($piers->isActive) == 0)
                                        <div class="pierCheckbox" data-id="{{$piers->intPierID}}">
                                            <label>
                                                <input type="checkbox" id="" data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$piers->intPierID}}">
                                            </label>
                                        </div>    
                                    @endif
                                </td>
                                </td>
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
                <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                    <thead class="bg-primary">
                        <tr>
                            <th>Pier</th>
                            <th>Status</th>
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
