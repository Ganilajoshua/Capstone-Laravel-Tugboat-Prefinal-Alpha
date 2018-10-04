<div class="modal fade" id="assignTugboatModal" tabindex="-1" role="dialog" aria-labelledby="addTeamLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width : 70%;" role="document">
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
                                <h5 class="text-center ml-5">List of Available Tugboats
                                </h5>
                            </div>
                            <div class="collapse show" id="addEmployeeCard">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-primary">
                                                <div class="card-header bg-primary text-white">Job Order Vessel Weight</div>
                                                <div class="card-body"><h6 class="joborder-weight"></h6></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="addTeamCard">
                                        {{-- Team List --}}
                                        <div class="row availableTugboats">
                                        </div>
                                        {{-- End of Team Builder Team List --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="card text-center">
                            <div class="card-header">
                                <div class="float-right">
                                    <a data-collapse="#tugboatSuggestionsCard" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                </div>
                                <h5 class="text-center ml-5">Tugboat Suggestions</h5>
                            </div>
                            <div class="collapse show" id="tugboatSuggestionsCard">
                                <div class="card-body suggestedTugboatsContainer">
                                    
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="jobOrderID">
            <div class="modal-footer">
                {{-- onclick="createTugboatAssignment()" --}}
                <button  type="button" class="createTugboatAssignSubmit btn btn-primary waves-effect">Add</button>
            </div>
        </div>
    </div>
</div>


{{-- <div class="col-auto">
    ${tugboatcombination.best[count].strName} : ${tugboatcombination.best[count].strBollardPull}
</div> --}}
{{-- <div class="border border-success text-center">
    <div class="card">
        ${tugboatcombination.best[count].strName} : ${tugboatcombination.best[count].strBollardPull}
    </div>
</div> --}}