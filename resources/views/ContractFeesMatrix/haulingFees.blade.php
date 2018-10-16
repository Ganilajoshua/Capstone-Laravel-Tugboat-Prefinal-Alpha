<div class="cardHaulingFee">
    <div class="card card-primary animated fadeIn fast">
        <div class="card-header bg-primary">
            <a href="#" class="btnBack btn btn-lg btn-link float-left text-white" data-toggle="tooltip" title="Back" role="button">
                <i class="ion-chevron-left"></i>
            </a>
            <h4 class="text-white text-center">Edit Hauling Service Matrix</h4>
        </div>
        <div class="card-body">
            <div class="col-12">
                <form class="needs-validation" novalidate="">
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
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary waves-effect float-right">Save Changes</button>
                        </div>
                    </div>
                    <input type="hidden" id="hideCompanyID">
                </form>
            </div>
        </div>
    </div>
</div>