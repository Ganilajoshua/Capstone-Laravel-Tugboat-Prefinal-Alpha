    <div class="modal fade" id="editTeamModal" tabindex="-1" role="dialog" aria-labelledby="addTeamLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content sectionDark">
                <div class="modal-header">
                    <h4 class="modal-title" id="addTeamLabel">
                    TEAM BUILDER
                    <small class="smCat">Edit Team</small>
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
                                        <a data-collapse="#editEmployees" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                    </div>
                                    <h5 class="text-center ml-5 cloneAppend">List of Employees</h5>
                                </div>
                                <div class="collapse show" id="editEmployees">
                                    <div class="card-body">
                                        <div class="row editTeam">
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="tugboatIDHide">
                <div class="modal-footer">
                    <button onclick="submitTeamName()" type="button" class="btn btn-primary waves-effect">Add</button>
                    <button type="button" class="selectAll btn btn-primary waves-effect">Select All</button>
                    <button type="button" class="deselectAll btn btn-primary waves-effect">Deselect All</button>
                </div>
            </div>
        </div>
    </div>