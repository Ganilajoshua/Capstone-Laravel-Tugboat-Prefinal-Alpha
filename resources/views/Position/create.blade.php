{{-- New View for Add Position (Modal) --}}
<div class="modal fade" id="addPositionModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Position</h5>
                <button id="closeEdit" type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form>
                    <div class="form-group">
                        <label for="addPosition">Position<sup class="text-primary">&#10033;</sup></label>
                        <input type="text" class="form-control" id="addPosition" name="addPosition" placeholder="Position Name">
                    </div> 
                    <input type="hidden" id="editIDhide">
                    <button type="button" onclick="postPosition()" class="btnAdd btn btn-primary waves-effect float-right">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add View -->
{{-- <div class="addLayout" id="addLayout">
    <div class="card animated bounceInLeft">
        <div class="card-header">
            <span>
                <button id="backButton" class="btn btn-lg btn-link float-left mt-1" data-toggle="tooltip"  title="Back" role="button">
                <i class="ion-chevron-left custSize"></i>
                </button>
                <button class="btn btn-lg btn-link float-right" disabled></button>
                <h3 class="text-center">ADD</h3>
            </span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="addPosition">Position<sup class="text-primary">&#10033;</sup></label>
                        <input type="text" class="form-control" id="addPosition" name="addPosition" placeholder="Position">
                    </div>
                </div>
            </div>
            <button onclick="postPosition()"class="btn btn-primary float-right font-weight-bold">Submit</button>
            <br>
        </div>
    </div>
</div> --}}