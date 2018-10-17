<div class="row editContracts animated fadeIn" style="display:none;">
    <div class="col">
        <div class="card">
            <section class="sectionDark section">
                <div class="container">
                    <h5 class="section-header text-center" style="text-transform: uppercase;">
                        <a href="#" class="btnBack btn btn-link float-left" data-toggle="tooltip"  title="Back" role="button">
                            <i class="ion-chevron-left"></i>
                        </a>
                        Edit Contract For: 
                        <small class="ml-1 smCat companyNameHolder">
                        </small>
                </h5>
                </div>
                <div class="row ml-1 mr-1">
                    <div class="col">
                        <form class="needs-validation" novalidate="">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="editContractTitle">Title<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" name="editContractTitle" id="editContractTitle" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please fill in the title.
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="editContractValidity">Select Contract Validity <sup class="text-primary">&#10033;</sup></label>
                                                <select id="editContractValidity" name="editContractValidity" class="form-control form-control input-lg wide">
                                                    <option data-display="" value="0">Select Contract Validity</option>
                                                    <option data-display="" value="6">6 Months</option>
                                                    <option data-display="" value="1">1 year</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-3">
                                    <div class="text-center mb-4">
                                        <h6><strong>&mdash; QUOTATION FEES &mdash;</strong></h6>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <div class="form-group helpDelayFee">
                                                <label for="editStandardRate">Standard Rate(&#8369;)</label>
                                                <input type="number" name="editStandardRate" id="editStandardRate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group helpDelayFee">
                                                <label for="editDelayFee">Tugboat Delay Fee (&#8369;)</label>
                                                <input type="number" name="editDelayFee" id="editDelayFee" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group helpViolationFee">
                                                <label for="editViolationFee">Violation Fee (&#8369;)</label>
                                                <input type="number" name="editViolationFee" id="editViolationFee" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group helpLateFee">
                                                <label for="editLateFee">Consignee Late Fee (&#8369;)</label>
                                                <input type="number" name="editLateFee" id="editLateFee" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group helpDamageFee">
                                                <label for="addDamageFee">Damage Fee (&#8369;)</label>
                                                <div class="input-group">
                                                    <input type="number" id="editMinDamage" class="form-control" placeholder="Minimum">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">&amp;</span>
                                                    </div>
                                                    <input type="number" id="editMaxDamageFee" class="form-control" placeholder="Maximum">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group helpDiscount">
                                                <label for="editDiscountRange">Discount (&#37;)</label>
                                                <input type="number" id="editDiscountRange" name="editDiscountRange" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="summernoteContract" id="editContractDetails"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" id="hideCompanyID">
                                <input type="hidden" id="hideQuotationID">
                                <div class="card-footer">
                                    <button onclick="saveContracts()" type="button" class="float-right btn btn-primary waves-effect">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>