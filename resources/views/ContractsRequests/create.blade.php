<div class="row createContracts">
    <div class="col">
        <div class="card">
            <section class="sectionDark section">
                <div class="container">
                    <h5 class="section-header text-center" style="text-transform: uppercase;">
                        <a href="" class="btnBack btn btn-link float-left" data-toggle="tooltip"  title="Back" role="button">
                            <i class="ion-chevron-left"></i>
                        </a>
                        Create Contract For: 
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
                                        <label for="addContractTitle">Title<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" name="addContractTitle" id="addContractTitle" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please fill in the title.
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contractValidity">Select Contract Validity <sup class="text-primary">&#10033;</sup></label>
                                                <select id="contractValidity" name="contractValidity" class="form-control form-control input-lg wide">
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
                                                <label for="addStandardRate">Standard Rate(&#8369;)</label>
                                                <input type="number" name="addStandardRate" id="addStandardRate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group helpDelayFee">
                                                <label for="addDelayFee">Tugboat Delay Fee (&#8369;)</label>
                                                <input type="number" name="addDelayFee" id="addDelayFee" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group helpViolationFee">
                                                <label for="addViolationFee">Violation Fee (&#8369;)</label>
                                                <input type="number" name="addViolationFee" id="addViolationFee" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group helpLateFee">
                                                <label for="addLateFee">Consignee Late Fee (&#8369;)</label>
                                                <input type="number" name="addLateFee" id="addLateFee" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group helpDamageFee">
                                                <label for="addDamageFee">Damage Fee (&#8369;)</label>
                                                <div class="input-group">
                                                    <input type="number" id="minDamageFee" class="form-control" placeholder="Minimum">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">&amp;</span>
                                                    </div>
                                                    <input type="number" id="maxDamageFee" class="form-control" placeholder="Maximum">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group helpDiscount">
                                                <label for="addDiscount">Discount (&#37;)</label>
                                                <input id="discountRange" name="addDiscount" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Content<sup class="text-primary">&#10033;</sup></label>
                                        <textarea class="summernoteContract" id="addContractDetails"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" id="hideCompanyID">
                                <div class="card-footer">
                                    <button onclick="showContracts()" type="button" class="float-right btn btn-primary waves-effect">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>