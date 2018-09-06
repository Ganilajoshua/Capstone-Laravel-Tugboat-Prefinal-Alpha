@extends('Templates.newTemplate')

{{-- Local Styles --}}
@section('assets')
    @include('Position.styles')
@endsection

{{-- Local Scripts --}}
@section('scripted')
    @include('Position.scripts')
@endsection

@section('content')
<section class="section">
    <h1 class="section-header">
        <div>
        Position
        <small class="ml-1 smCat">
            Maintenance
        </small>
        </div>
    </h1>
    <div id="detLayout" class="detLayout mt-3">
        <button id="addPositionButton" class="detAdd btn btn-primary text-center border-dark bounceIn animated">
            Add
        </button>
        <div class="mt-3">
            @if(count($positions)>0)    
                <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                    <thead class="bg-primary">
                        <tr>
                            <th>Position</th>
                            <th>Status</th>
                            <th class="noSortAction">Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                        @foreach($positions as $positions)
                            <tr>
                                <td>{{$positions->strPositionName}}</td>
                                <td>
                                    @if($positions->isActive == 1)
                                        <div class="positionCheckbox" data-id="{{$positions->intPositionID}}">
                                            <label>
                                                <input type="checkbox" checked data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$positions->intPositionID}}">
                                            </label>
                                        </div>
                                    @elseif($positions->isActive == 0)
                                        <div class="positionCheckbox" data-id="{{$positions->intPositionID}}">
                                            <label> 
                                                <input type="checkbox" data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$positions->intPositionID}}">
                                            </label>
                                        </div>
                                    @endif
                                    
                                </td>
                                <td>
                                    <div class="ml-1 mr-1">
                                        <button onclick="getPosition({{$positions->intPositionID}})"class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit" role="button">
                                            <i class="miniIcon fas fa-edit custSize"></i>
                                        </button>
                                        <button onclick="deletePosition({{$positions->intPositionID}})"class="btn btn-sm btn btn-danger" data-toggle="tooltip" title="Delete">
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
                            <th>Position</th>
                            <th></th>
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
@include('Position.create')
@include('Position.edit')
@endsection
