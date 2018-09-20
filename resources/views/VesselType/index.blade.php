@extends('Templates.newTemplate')

@section('scripted')
    @include('VesselType.scripts')
@endsection

@section('assets')
    @include('VesselType.styles')
@endsection

@section('content')
<section class="section">
    <h1 class="section-header">
        <div>
        Vessel Type
        <small class="ml-1 smCat">
            Maintenance
        </small>
        </div>
    </h1>
    <div id="detLayout" class="detLayout mt-3">
        <button class="createVesselType detAdd btn btn-primary text-center border-dark bounceIn animated">
            Add
        </button>
        <div class="mt-3">
            @if(count($vesseltype)>0)    
                <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                    <thead class="bg-primary">
                        <tr>
                            <th>Vessel Type</th>
                            <th>Status</th>
                            <th class="noSortAction">Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                        @foreach($vesseltype as $vesseltype)
                            <tr>
                                <td>{{$vesseltype->strVesselTypeName}}</td>
                                <td>
                                    @if($vesseltype->isActive == 1)
                                        <div class="tugboattypeCheckbox" data-id="{{$vesseltype->intVesselTypeID}}">
                                            <label>
                                                <input type="checkbox" checked data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$vesseltype->intVesselTypeID}}">
                                            </label>
                                        </div>
                                    @elseif($vesseltype->isActive == 0)
                                        <div class="tugboattypeCheckbox" data-id="{{$vesseltype->intVesselTypeID}}">
                                            <label> 
                                                <input type="checkbox" data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$vesseltype->intVesselTypeID}}">
                                            </label>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="ml-1 mr-1">
                                        <button data-id="{{$vesseltype->intVesselTypeID}}" class="editVesselType btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit" role="button">
                                            <i class="miniIcon fas fa-edit custSize"></i>
                                        </button>
                                        <button data-id="{{$vesseltype->intVesselTypeID}}" class="deleteVesselType btn btn-sm btn btn-danger" data-toggle="tooltip" title="Delete">
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
                            <th>Vessel Type</th>
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
    @include('VesselType.create')
    @include('VesselType.edit')
@endsection
