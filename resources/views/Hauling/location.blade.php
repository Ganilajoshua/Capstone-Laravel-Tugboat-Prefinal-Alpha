<!-- Update Location Modal -->
<div class="modal fade" id="updateLocationModal" tabindex="-1" role="dialog" aria-labelledby="updateLocLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="updateLocLabel">Update Location</h5>
                <button type="button" class="close modalClose text-white" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Location<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" id="location" class="form-control" placeholder="Location">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="form-group">
                                <label>Remarks<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" id="remarks" class="form-control" placeholder="Location">
                            </div>
                        </div>
                        {{-- <div class="col-12 col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="timeUpdated">Time Updated<sup class="text-primary">&#10033;</sup></label>
                                <div class="input-group date" id="timeUpdated" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#timeUpdated" placeholder="MM/DD/YYYY" required>
                                    <div class="input-group-append" data-target="#timeUpdated" data-toggle="datetimepicker">
                                        <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-calendar"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="updateLocationSubmit btnUpdateLoc btn btn-primary waves-effect">Update Location</button>
            </div>
        </div>
    </div>
</div>