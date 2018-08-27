    {{-- @extends('Templates.newTemplate')

@section('content')

@endsection --}}

<div class="modal fade" id="viewTeamModal" tabindex="-1" role="dialog" aria-labelledby="addTeamLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content sectionDark">
            <div class="modal-header">
                <h4 class="modal-title" id="addTeamLabel">
                TEAM BUILDER
                <small class="smCat">Team Information</small>
            </h4>
                <button type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <div class="row">
                    <div class="col-12">
                        <div class="card text-center">
                            <div class="card-header">
                                <div class="float-right">
                                    <a data-collapse="#addEmployeeCard" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                </div>
                                <h5 class="text-center ml-5 cloneAppend">List of Teams</h5>
                            </div>
                            <div class="collapse show" id="addEmployeeCard">
                                <div class="card-body">
                                    <div class="row" id="addTeamCard">
                                        {{-- Team List --}}
                                        <div class="row">
                                            @if(count($teamlist)>0)
                                                @foreach($teamlist as $teamlist)
                                                    @if($teamlist->intTATugboatID == null)
                                                        <div class="addTeamComposition mr-3 ml-3">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <div class="card bg-primary">
                                                                        <div class="card-body">
                                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                                <input type="checkbox" id="addCheckTeam{{$teamlist->intTAssignID}}" name="teamlist[]" value="{{$teamlist->intTAssignID}}" class="custom-control-input teamListCheckbox">
                                                                                <label class="custom-control-label" for="addCheckTeam{{$teamlist->intTAssignID}}">
                                                                                    <p class="card-text text-center ml-2">{{$teamlist->strTeamName}}</p>
                                                                                    <small class="text-center float-right" style="text-transform: uppercase;">
                                                                                        {{$teamlist->strPositionName}} : {{$teamlist->strLName}}, {{$teamlist->strFName}}
                                                                                    </small>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        {{-- End of Team Builder Team List --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                <div class="float-right">
                                    <a data-collapse="#addSelectedCard" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                </div>
                                <h5 class="text-center ml-5">Selected</h5>
                            </div>
                            <div class="collapse show" id="addSelectedCard">
                                <div class="card-body">
                                    <div class="row" id="happiness">
                                        <div class="col-4">
                                            <div class="card bg-info" id="addDismissCard">
                                                <div class="card-header">
                                                    John Carlos Pagaduan
                                                    <div class="float-right">
                                                        <a data-dismiss="#addDismissCard" class="btn btn-icon"><i class="ion ion-close"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <input type="hidden" id="tugboatIDHide">
            <div class="modal-footer">
                <button onclick="submitTeamName()" type="button" class="btn btn-primary waves-effect">Add</button>
            </div>
        </div>
    </div>
</div>