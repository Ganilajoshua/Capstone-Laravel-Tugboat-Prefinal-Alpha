<!-- Job Order Edit Modal -->
<div class="modal fade" id="JOeditModal" tabindex="-1" role="dialog" aria-labelledby="JOeditModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="JOeditModalTitle">Edit Job Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="editTransacDate">Transaction Date<sup class="text-primary">&#10033;</sup></label>
                                    <div class="input-group date" id="editTransacDate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#editTransacDate" placeholder="MM/DD/YYYY" required>
                                        <div class="input-group-append" data-target="#editTransacDate" data-toggle="datetimepicker">
                                            <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-calendar"></i></button>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill in the Transaction Date.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="editHaulingETA">Estimated Time of Hauling<sup class="text-primary">&#10033;</sup></label>
                                    <div class="input-group date" id="editHaulingETA" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#editHaulingETA" placeholder="21:00" required>
                                        <div class="input-group-append" data-target="#editHaulingETA" data-toggle="datetimepicker">
                                            <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-clock"></i></button>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill in the Estimated Time of Hauling.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="firstRow">
                            <div class="col-12 col-sm-12 col-lg-4">
                                <div class="form-group">
                                    <label for="cargoName1">Cargo Name 1<sup class="text-primary">&#10033;</sup></label>
                                    <input type="text" class="form-control" id="cargoName1" placeholder="Energy Moon" autofocus required>
                                    <div class="invalid-feedback">
                                        Please fill in the Cargo Name.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-4">
                                <div class="form-group">
                                    <label for="cargoWeight1">Cargo Weight 1<sup class="text-primary">&#10033;</sup></label>
                                    <div class="input-group">
                                        <input id="cargoWeight1" type="number" class="form-control" placeholder="20" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Tons</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill in the Cargo Weight.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-4">
                                <div class="form-group">
                                    <label for="addGoods1">Goods to be delivered 1<sup class="text-primary">&#10033;</sup></label>
                                    <input type="text" class="form-control" id="addGoods1" placeholder="Very Good" required>
                                    <div class="invalid-feedback">
                                        Please fill in the Estimated Goods to be delivered.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary btn-sm text-center waves-effect btnRemoveFields" data-toggle="tooltip" title="Delete Fields">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm text-center waves-effect btnAddFields" data-toggle="tooltip" title="Add Fields">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="addExDetails">Extra Details</label>
                            <textarea class="form-control" id="addExDetails" rows="5"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect btnCloseEditJO" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>