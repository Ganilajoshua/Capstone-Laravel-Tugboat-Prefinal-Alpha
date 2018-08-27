<div class="modal fade" id="editGoodsModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Goods</h5>
                <button type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="editGoodsName">Goods Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="editGoodsName" name="editGoodsName" placeholder="Goods Name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="editGoodsRate">Rate Per Ton<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="editGoodsRate" name="editGoodsRate" placeholder="Rate per Ton">
                            </div>
                        </div>     
                    </div>
                    <input type="hidden" id="editIDhide">
                    <button type="button" onclick="updateGoods()" class="btnAdd btn btn-primary waves-effect float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
    