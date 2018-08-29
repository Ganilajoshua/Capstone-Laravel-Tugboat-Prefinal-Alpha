@extends('Templates.newTemplate')

@section('assets')
    @include('Berth.scripts')
@endsection
@section('assets2')
    
@endsection
@section('content')
<section class="section">
    <h1 class="section-header">
        <div>
        Berths
        <small class="ml-1 smCat">
            Maintenance
        </small>
        </div>
    </h1>
    <div id="detLayout" class="detLayout mt-3">
        <button id="addBerthButton" class="detAdd btn btn-primary text-center border-dark bounceIn animated">
            Add
        </button>
        <input type="hidden" id="contract" value="{{$noContract}}">
        <input type="hidden" id="userData" value="{{$user}}">
        <div class="mt-3">
            @if(count($berths)>0)    
                <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                    <thead class="bg-primary">
                        <tr>
                            <th>Berths</th>
                            <th>Pier</th>
                            <th>Status</th>
                            <th class="noSortAction">Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                        @foreach($berths as $berths)
                            <tr>
                                <td>{{$berths->strBerthName}}</td>
                                <td>{{$berths->strPierName}}</td>
                                <td>
                                    @if($berths->isActive == 1)
                                        <div class="berthCheckbox" data-id="{{$berths->intBerthID}}">
                                            <label>
                                                <input type="checkbox" checked data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$berths->intBerthID}}">
                                            </label>
                                        </div>
                                    @elseif($berths->isActive == 0)
                                        <div class="berthCheckbox" data-id="{{$berths->intBerthID}}">
                                            <label>
                                                <input type="checkbox" data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$berths->intBerthID}}">
                                            </label>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="ml-1 mr-1">
                                        <button onclick="getBerth({{$berths->intBerthID}})" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit" role="button">
                                            <i class="miniIcon fas fa-edit custSize"></i>
                                        </button>
                                        <button onclick="deleteBerth({{$berths->intBerthID}})" class="btn btn-sm btn btn-danger" data-toggle="tooltip" title="Delete">
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
                            <th>Berth</th>
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
@include('Berth.edit')
@include('Berth.create')
@include('Berth.create2')
@endsection
