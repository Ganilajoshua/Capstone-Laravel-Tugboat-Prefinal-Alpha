<div class="modal fade" id="editVesselTypeModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Vessel Type</h5>
                <button type="button" class="close closeButton" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col">    
                            <div class="form-group">
                                <label for="editVesselTypeName">Vessel Type Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="editVesselTypeName" name="editVesselTypeName" placeholder="Vessel Type Name" pattern="[a-zA-Z ]{1,}" required>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="Submit" onclick="createGoods()" class="btnAdd btn btn-primary waves-effect float-right">Add</button> -->
                    <button type="button" class="updateVesselType btn btn-primary waves-effect float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
    