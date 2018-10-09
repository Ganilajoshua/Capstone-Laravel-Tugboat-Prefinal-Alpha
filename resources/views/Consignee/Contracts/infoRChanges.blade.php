<div class="modal fade" id="requestChangesModal" tabindex="-1" role="dialog" aria-labelledby="requestChangesModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="requestChangesModalTitle">Request Changes</h5>
                <button type="button" class="close waves-effect text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="alert alert-info mt-2 text-center">
                            <i class="bigIcon fas fa-info-circle mr-2 mt-1"></i>
                            You are only requesting for changes. Final Quotation is always up to the Administrator. 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form class="needs-validation" novalidate="">
                            <div class="card border-primary">
                                <div class="card-header bg-primary" style="border-radius:0%;"><h4 class="text-white text-center mb-2">Hauling Service Custom Matrix</h4></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="addHStandardRate">Standard Rate</label>
                                                <input type="number" name="addHStandardRate" id="addHStandardRate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="addHDelayFee">Tugboat Delay Fee</label>
                                                <input type="number" name="addHDelayFee" id="addHDelayFee" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="addHViolationFee">Violation Fee</label>
                                                <input type="number" name="addHViolationFee" id="addHViolationFee" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="addHLateFee">Consignee Late Fee</label>
                                                <input type="number" name="addHLateFee" id="addHLateFee" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="addHMinDamageFee">Minimum Damage Fee</label>
                                                <input type="number" name="addHMinDamageFee" id="addHMinDamageFee" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="addHMaxDamageFee">Maximum Damage Fee</label>
                                                <input type="number" name="addHMaxDamageFee" id="addHMaxDamageFee" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="hideCompanyID">
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <form class="needs-validation" novalidate="">
                            <div class="card border-primary">
                                <div class="card-header bg-primary" style="border-radius:0%;"><h4 class="text-white text-center mb-2">Tug Assist Service Custom Matrix</h4></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="addTAStandardRate">Standard Rate</label>
                                                <input type="number" name="addTAStandardRate" id="addTAStandardRate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="addTADelayFee">Tugboat Delay Fee</label>
                                                <input type="number" name="addTADelayFee" id="addTADelayFee" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="addTAViolationFee">Violation Fee</label>
                                                <input type="number" name="addTAViolationFee" id="addTAViolationFee" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="addTALateFee">Consignee Late Fee</label>
                                                <input type="number" name="addTALateFee" id="addTALateFee" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="addTAMinDamageFee">Minimum Damage Fee</label>
                                                <input type="number" name="addTAMinDamageFee" id="addTAMinDamageFee" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="addTAMaxDamageFee">Maximum Damage Fee</label>
                                                <input type="number" name="addTAMaxDamageFee" id="addTAMaxDamageFee" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="hideCompanyID">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="requestForChanges()" class="btnFInalizeContract btn waves-effect btn-primary"> 
                    Submit Request
                </button>
            </div>
        </div>
    </div>
</div>