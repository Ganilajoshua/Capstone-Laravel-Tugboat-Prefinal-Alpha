<div class="modal fade" id="viewTeamModal" tabindex="-1" role="dialog" aria-labelledby="addTeamLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content sectionDark">
            <div class="modal-header">
                <h5 class="modal-title tugboatname" id="addTeamLabel"></h5>
                <button type="button" class="close closeInfoModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <div class="row">
                    <div class="col-12">
                        <div class="card text-center">
                            <div class="card-header">
                                <div class="float-right">
                                    <a data-collapse="#viewEmployees" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                </div>
                                <h5 class="text-center ml-5 teamname">List of Employees</h5>
                            </div>
                            <div class="collapse show" id="viewEmployees">
                                <div class="card-body">
                                    <div class="viewTeamInfo row">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="tugboatIDHide">
            <div class="modal-footer">
                <button type="button" class="closeInfoModal btn btn-primary waves-effect">Close</button>
            </div>
        </div>
    </div>
</div>