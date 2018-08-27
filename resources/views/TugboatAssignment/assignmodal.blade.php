<div class="modal fade" id="assignTugboatModal" tabindex="-1" role="dialog" aria-labelledby="addTeamLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content sectionDark">
            <div class="modal-header">
                <h4 class="modal-title" id="addTeamLabel">
                Tugboat Assignment
                <small class="smCat">Select Tugboat(s)</small>
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
                                <h5 class="text-center ml-5">List of Available Tugboats</h5>
                            </div>
                            <div class="collapse show" id="addEmployeeCard">
                                <div class="card-body">
                                    <div class="row" id="addTeamCard">
                                        {{-- Team List --}}
                                        <div class="row">
                                            @if(count($available)>0)
                                                @foreach($available as $available)
                                                    <div class="addTeamComposition mr-3 ml-3">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="card bg-success">
                                                                    <div class="card-body">
                                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                                            <input type="checkbox" id="addCheckTeam{{$available->intTAssignID}}" name="teamlist[]" value="{{$available->intTAssignID}}" class="custom-control-input tugboatCheckbox">
                                                                            <label class="custom-control-label" for="addCheckTeam{{$available->intTAssignID}}">
                                                                                <p class="card-text text-center ml-2">{{$available->strName}}</p>
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
                                        {{-- End of Team Builder Team List --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="jobOrderID">
            <div class="modal-footer">
                <button onclick="createTugboatAssignment()" type="button" class="btn btn-primary waves-effect">Add</button>
            </div>
        </div>
    </div>
</div>