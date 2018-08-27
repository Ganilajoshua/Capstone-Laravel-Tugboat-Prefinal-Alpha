<div class="modal fade" id="addTeamModal" tabindex="-1" role="dialog" aria-labelledby="addTeamLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content sectionDark">
            <div class="modal-header">
                <h4 class="modal-title" id="addTeamLabel">
                TEAM BUILDER
                <small class="smCat">Select Team</small>
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
                                <h5 class="text-center ml-5">List of Teams</h5>
                            </div>
                            <div class="collapse show" id="addEmployeeCard">
                                <div class="card-body">
                                    <div class="row" id="addTeamCard">
                                        {{-- Team List --}}
                                        <div class="row">
                                            @if(count($teamList)>0)
                                                @foreach($teamList as $teamList)
                                                    @if($teamList->intTATugboatID == null)
                                                        <div class="addTeamComposition mr-3 ml-3">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <div class="card bg-primary">
                                                                        <div class="card-body">
                                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                                <input type="checkbox" id="addCheckTeam{{$teamList->intTeamID}}" name="teamlist[]" value="{{$teamList->intTeamID}}" class="custom-control-input teamlistCheckboxes">
                                                                                <label class="custom-control-label" for="addCheckTeam{{$teamList->intTeamID}}">
                                                                                    {{-- <p class="card-text text-center ml-2">{{$teamlist}}</p>
                                                                                    <small class="text-center float-right" style="text-transform: uppercase;">
                                                                                        {{$teamList->strPositionName}} : {{$teamList->strLName}}, {{$teamList->strFName}}
                                                                                    </small> --}}
                                                                                    {{$teamList->strTeamName}}
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