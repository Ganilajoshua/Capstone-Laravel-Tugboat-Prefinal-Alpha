<div class="modal fade" id="addTeam" tabindex="-1" role="dialog" aria-labelledby="addTeamLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg createTeam" style="max-width: 70%" role="document">
        <div class="modal-content sectionDark">
            <div class="modal-header">
                <h4 class="modal-title" id="addTeamLabel">
                TEAM BUILDER
                <small class="smCat">Add Team</small>
            </h4>
                <button type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form class=" mb-3">
                    <label for="addTeamName">Team Name<sup class="text-primary">&#10033;</sup></label>
                    <input type="text" class="form-control" id="addTeamName" placeholder="Team 1">
                </form>
                <div class="row">
                    <div class="col">
                        <div class="card text center">
                            <div class="card-header bg-info text-white text-center">
                                <h4>
                                    <i class="fas fa-exclamation-triangle mr-2 bigIcon"></i>
                                    <span class="ml-3" style="font-size: 12px;">
                                        You Need a Team Composing of :
                                    </span>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row teamcompositionContainer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="pierSelect">Pier<sup class="text-primary">&#10033;</sup></label>
                    <select id="pierSelect" name="pierSelect" class="form-control form-control-lg">
                        <option>Select Color</option>
                        <option value="" style="background-color: #001f3f;" class="text-white">Navy</option>
                    </select>
                </div> --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card text-center">
                            <div class="card-header">
                                <div class="float-right">
                                    <a data-collapse="#addEmployeeCard" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                </div>
                                <h5 class="text-center ml-5">Employees</h5>
                            </div>
                            <div class="collapse show" id="addEmployeeCard">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-inline">
                                                <div class="dropdown mr-4" id="addTeamChoices">
                                                    <button class="btn btn-primary dropdown-toggle waves-effect" type="button" id="addDdChoices" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        All
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="addDdChoices">
                                                        <a id="addDdAll" class="waves-effect dropdown-item active" href="#">All</a>
                                                        <a id="addDdCapt" class="waves-effect dropdown-item" href="#">Captain</a>
                                                        <a id="addDdChiefEng" class="waves-effect dropdown-item" href="#">Chief Engineer</a>
                                                        <a id="addDdCrew" class="waves-effect dropdown-item" href="#">Crew</a>
                                                        <a id="addDdOthers" class="waves-effect dropdown-item" href="#">Others</a>
                                                    </div>
                                                </div>
                                                <h6 class="mt-2 mr-2">Filter:<h6 class="mt-2 text-primary" id="addFilterName">All</h6></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="addTeamCompostionCard">
                                        <div class="row">
                                            @if(count($captains)>0)
                                                @foreach($captains as $captains)
                                                    <div class="addTeamCaptain mr-3 ml-3">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="card bg-primary">
                                                                    <div class="card-body">
                                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                                            <input type="checkbox" id="addCheckCapt{{$captains->intEmployeeID}}" name="captains[]" data-id="{{$captains->intEmployeeID}}" data-position="{{$captains->strPositionName}}" data-name="{{$captains->strLName}}, {{$captains->strFName}}" value="{{$captains->intEmployeeID}}" class="custom-control-input captCheckbox">
                                                                            <label class="custom-control-label" for="addCheckCapt{{$captains->intEmployeeID}}">
                                                                                <p class="card-text text-center ml-2">{{$captains->strLName}}, {{$captains->strFName}}</p>
                                                                                <small class="text-center float-right" style="text-transform: uppercase;">
                                                                                    {{$captains->strPositionName}}
                                                                                </small>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="row">
                                            @if(count($chiefengineers)>0)
                                                @foreach($chiefengineers as $chiefengineers)
                                                    <div class="addTeamChiefEng mr-3 ml-3">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="card bg-info">
                                                                    <div class="card-body">
                                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                                            <input type="checkbox" id="addCheckChief{{$chiefengineers->intEmployeeID}}" value="{{$chiefengineers->intEmployeeID}}" data-id="{{$chiefengineers->intEmployeeID}}" data-position="{{$chiefengineers->strPositionName}}" data-name="{{$chiefengineers->strLName}}, {{$chiefengineers->strFName}}" class="custom-control-input chiefCheckbox">
                                                                            <label class="custom-control-label" for="addCheckChief{{$chiefengineers->intEmployeeID}}">
                                                                                <p class="card-text text-center ml-2">{{$chiefengineers->strLName}}, {{$chiefengineers->strFName}}</p>
                                                                                <small class="text-center float-right" style="text-transform: uppercase;">
                                                                                    {{$chiefengineers->strPositionName}}
                                                                                </small>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="row">
                                            @if(count($crew)>0)
                                                @foreach($crew as $crew)
                                                    <div class="addTeamCrew mr-3 ml-3">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="card bg-dark">
                                                                    <div class="card-body">
                                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                                            <input type="checkbox" id="addCheckCrews{{$crew->intEmployeeID}}" value="{{$crew->intEmployeeID}}" data-id="{{$crew->intEmployeeID}}" data-position="{{$crew->strPositionName}}" data-name="{{$crew->strLName}}, {{$crew->strFName}}" class="custom-control-input crewCheckbox">
                                                                            <label class="custom-control-label" for="addCheckCrews{{$crew->intEmployeeID}}">
                                                                                <p class="card-text text-center ml-2">{{$crew->strLName}}, {{$crew->strFName}}</p>
                                                                                <small class="text-center float-right" style="text-transform: uppercase;">
                                                                                    {{$crew->strPositionName}}
                                                                                </small>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>        
                                                    </div>
                                                @endforeach
                                            @endif       
                                        </div>
                                        <div class="row">
                                            @if(count($others)>0)
                                                @foreach($others as $others)
                                                    <div class="addTeamOthers mr-3 ml-3">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="card bg-success">
                                                                    <div class="card-body">
                                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                                            <input type="checkbox" id="addCheckCapt{{$others->intEmployeeID}}" class="custom-control-input">
                                                                            <label class="custom-control-label" for="addCheckCapt{{$others->intEmployeeID}}">
                                                                                <p class="card-text text-center ml-2">{{$others->strLName}}, {{$others->strFName}}</p>
                                                                                <small class="text-center float-right" style="text-transform: uppercase;">
                                                                                    {{$others->strPositionName}}
                                                                                </small>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>     
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card text-center">
                            <div class="card-header">
                                <div class="float-right">
                                    <a data-collapse="#addSelectedCard" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                </div>
                                <h5 class="text-center ml-5">Selected</h5>
                            </div>
                            <div class="collapse show" id="addSelectedCard">
                                <div class="card-body">
                                    <div class="row viewSelected">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button onclick="submitTeam()" type="button" class="btn btn-primary waves-effect">Add</button>
            </div>
        </div>
    </div>
</div>