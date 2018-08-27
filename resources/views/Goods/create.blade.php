<div class="modal fade" id="addGoodsModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Goods</h5>
                <button type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="addGoodsName">Goods Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="addGoodsName" name="addGoodsName" placeholder="Goods Name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="addGoodsRate">Rate Per Ton<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="addGoodsRate" name="addGoodsRate" placeholder="Rate per Ton">
                            </div>
                        </div>
                    </div>
                    <button type="button" onclick="createGoods()" class="btnAdd btn btn-primary waves-effect float-right">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
    