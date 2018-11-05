<div class="modal fade" id="cancelJoborderModal" tabindex="-1" role="dialog" aria-labelledby="addTeamLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width : 70%;" role="document">
        <div class="modal-content sectionDark">
            <div class="modal-header">
                <h4 class="modal-title" id="addTeamLabel">
                Tugboat Assignment
                <small class="smCat">Cancel Job Order</small>
            </h4>
                <button type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="form-group">
                            <label for="exDetails">Extra Details</label>
                            <textarea class="form-control" id="exDetails" rows="5" placeholder="Message"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="jobOrderID">
            <div class="modal-footer">
                {{-- onclick="createTugboatAssignment()" --}}
                <button type="button" class="cancelButton btn btn-primary waves-effect">Submit</button>
            </div>
        </div>
    </div>
</div>


