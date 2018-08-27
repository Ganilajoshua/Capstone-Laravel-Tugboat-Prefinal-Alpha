{{-- New View for Edit (Modal) --}}
<div class="modal fade" id="editPierModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Pier</h5>
                <button id="closeEdit" type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form>
                    <div class="form-group">
                        <label for="editPier">Pier Name<sup class="text-primary">&#10033;</sup></label>
                        <input type="text" class="form-control" id="editPier" name="editPier" placeholder="Pier Name">
                    </div>
                    <input   type="hidden" id="editIDhide">
                    <button type="button" onclick="editPierSubmit()" class="btnAdd btn btn-primary waves-effect float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
<!-- Edit View -->
{{-- <div id="editLayout" class="editLayout">
    <div class="card animated bounceInLeft">
        <div class="card-header">
            <spanstyle="height:50px;">
                <button id="backButtonEdit" class="btn btn-lg btn-link float-left mt-1" data-toggle="tooltip" title="Back" role="button">
                    <i class="ion-chevron-left custSize"></i>
                </button>
                <button class="btn btn-lg btn-link float-right"></button>
                <h3 class="text-center">EDIT</h3>
            </span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="editPier">Pier<sup class="text-primary">&#10033;</sup></label>
                        <input type="text" class="form-control" id="editPier" name="editPier" placeholder="Pier Name">
                        <p id="editID"></p>
                        <input type="hidden" id="editIDhide">
                    </div>
                </div>
            </div>
            <button onclick="editPierSubmit()" class="btn btn-primary float-right font-weight-bold">Submit</button>
            <br>
        </div>
    </div>
</div> --}}