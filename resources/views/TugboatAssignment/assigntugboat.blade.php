<!-- Job Order List -->
<div class="animated fadeIn assignTugboat">
    <div class="row">
        <div class="col-lg-9">
            <div class="card card-primary">
                <div class="card-header joborderHeader">
                </div>
                <div class="card-body joborderBody">
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h4 class="card-title text-center">Select Schedule Color Indicator</h4>
                </div>
                <div class="card-body">
                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                        <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                        <ul class="fc-color-picker" id="color-chooser">
                            <li><a class="colorIndicator text-sapphire" data-color="#0F52BA" data-colortext="Sapphire" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-blue" data-color="#0073b7" data-colortext="Blue" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-light-blue" data-color="#3c8dbc" data-colortext="Light Blue" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-teal" data-color="#39cccc" data-colortext="Teal" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-chestnut" data-color="#954535" data-colortext="Chestnut" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-red" data-color="#f01c00" data-colortext="Red" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-goldenrod" data-color="#DAA520" data-colortext="Goldenrod" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-green" data-color="#00a65a" data-colortext="Green" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-lime" data-color="#28db76" data-colortext="Lime" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-ruby" data-color="#E0115F" data-colortext="Ruby" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-purple" data-color="#605ca8" data-colortext="Purple" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-bluebell" data-color="#A2A2D0" data-colortext="Blue Bell" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-muted" data-color="#868e96" data-colortext="Gray" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-navy" data-color="#003366" data-colortext="Navy" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                            <li><a class="colorIndicator text-black" data-color="#000000" data-colortext="Black" href="#"><i class="fa fa-square extremelyHugeIcon"></i></a></li>
                        </ul>
                    </div>
                    <!-- /btn-group -->
                    {{-- <div class="input-group mb-3"> --}}
                        {{-- <input id="new-event" type="text" class="form-control" placeholder="Event Title"> --}}
                        {{-- <div class="input-group-append"> --}}
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <button id="add-new-event" type="button" class="colorIndicatorButton btn waves-effect col-lg-12">Select Color</button>
                        </div>
                    </div>
                        {{-- </div> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header startHaulingHeader">
                        <h4 class="card-title text-center">Tugboats List</h4>
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
                <div class="card-body tugboatAssignmentBody">
                    <div class="row availableTugboatsContainer">
                        <div class="col-6">
                            <div class="card card-success">
                                <div class="card-header bg-success text-white text-center">
                                    <h4> Available </h4>
                                </div>
                                <div class="card-body availableTugs" style="max-height: 500px; overflow-y: auto;">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card card-danger">
                                <div class="card-header bg-danger text-white text-center">
                                    <h4> Unavailable </h4>
                                </div>
                                <div class="card-body unavailableTugs" style="max-height: 500px; overflow-y: auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer startHaulingFooter">
                    <div class="float-right mr-1 mb-3">
                        <button type="button" class="btn btn-primary waves-effect mr-2 backButton">Back</button>
                        <button type="button" class="btn btn-primary waves-effect mr-2 cancelJoborder">Cancel / Void</button>
                        <button type="button" class="btn btn-primary waves-effect assignTugboatsButton">Assign Tugboats</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
