<div class="modal fade" id="addTugboatTypeModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Tugboat Type</h5>
                <button id="closeAdd" type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form>
                    <div class="form-group">
                        <label for="addTugboatType">Tugboat Type<sup class="text-primary">&#10033;</sup></label>
                        <input type="text" class="form-control" id="addTugboatType" name="addTugboatType" placeholder="Tugboat Type">
                    </div>
                    <button type="button" onclick="postTugboatType()" class="btnAdd btn btn-primary waves-effect float-right">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>