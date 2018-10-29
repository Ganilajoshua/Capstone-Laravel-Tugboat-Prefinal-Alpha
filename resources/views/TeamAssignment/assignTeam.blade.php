<!-- Job Order List -->
<div class="animated fadeIn assignTeamCard">
    <div class="row">
        <div class="col-lg-7">
            <div class="card card-primary">
                <div class="card-header joborderHeader">
                </div>
                <div class="card-body joborderBody">
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card card-primary" style="height:310px;">
                <div class="card-header with-border">
                    <h4 class="card-title text-center">Default Teams For Selected Tugboats</h4>
                </div>
                <div class="card-body defaultTeamsContainer">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-success">
                <div class="card-header text-black">
                    <div class="float-right">
                        <a data-collapse="#availableTeams" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                    </div>
                    <h4 class="text-center ml-5">Show Teams Available</h4>
                </div>
                <div class="collapse" id="availableTeams">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="card card-success">
                                    <div class="card-header bg-success text-white text-center">
                                        <h4> Available For This Day and Time </h4>
                                    </div>
                                    <div class="card-body availableTugs" style="max-height: 500px; overflow-y: auto;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card card-danger">
                                    <div class="card-header bg-danger text-white text-center">
                                        <h4> Unavailable For This Day and Time</h4>
                                    </div>
                                    <div class="card-body unavailableTugs" style="max-height: 500px; overflow-y: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header startHaulingHeader">
                        <h4 class="card-title text-center">Teams Available</h4>
                    {{-- <div class="col">
                        <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pillsPending-tab" data-toggle="pill" href="#pillsPending" role="tab" aria-controls="pillsPending" aria-selected="true">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pillsActive-tab" data-toggle="pill" href="#pillsActive" role="tab" aria-controls="pillsActive" aria-selected="false">Active</a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
                <div class="card-body availableTeams">

                </div>
                <div class="card-footer startHaulingFooter">

                    <div class="float-right mr-1 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary waves-effect mr-2 backButton">Back</button>
                                <button type="button" class="btn btn-primary waves-effect assignDefaultTeams mr-2">Assign Default Teams</button>
                                <button type="button" class="btn btn-primary waves-effect assignTeams">Assign Selected Teams</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
