
    <div class="modal fade" id="viewTugboatsModal" tabindex="-1" role="dialog" aria-labelledby="addTeamLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 60%">
            <div class="modal-content sectionDark">
                <div class="modal-header"> 
                    <small class="smCat">Tugboats Information</small>
                </h4>
                    <button type="button" class="close modalCloseButton" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modalBody">
                    <div class="row">
                        <div class="col-12">
                            <div class="card text-center">
                                <div class="card-header">
                                    <div class="float-right">
                                        <a data-collapse="#viewTugboatsCard" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                    </div>
                                    <h5 class="text-center ml-5 cloneAppend">List of Tugboats</h5>
                                </div>
                                <div class="collapse show" id="viewTugboatsCard">
                                    <div class="container">
                                        <div class="card card-success border-success tugboatsAvailableCard">
                                            {{-- <div class="card-header text-center">
                                                Available Tugboats
                                            </div>
                                            <div class="card-body">
                                                <div class="viewAvailableTugboatsCard row">

                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="card card-info border-info tugboatsUnavailableCard">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect modalCloseButton">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header text-center"></div>