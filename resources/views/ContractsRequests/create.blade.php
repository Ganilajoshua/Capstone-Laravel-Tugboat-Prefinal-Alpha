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
                                <div class="defaultMatrix">
                                </div>
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
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="mt-3"><strong>&mdash; Contract Fees &mdash;</strong></h6>
                                                <ul class="nav nav-pills nav-fill mb-3 mt-5" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active border border-primary" id="pillsHauling-tab" data-toggle="pill" href="#pillsHauling" role="tab" aria-controls="pillsHauling" aria-selected="true">Hauling Rates</a>
                                                    </li>
                                                    <li class="nav-item ml-1">
                                                        <a class="nav-link border border-primary" id="pillsTugAssist-tab" data-toggle="pill" href="#pillsTugAssist" role="tab" aria-controls="pillsTugAssist" aria-selected="false">Tug Assist Rates</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pillsHauling" role="tabpanel" aria-labelledby="pillsHauling-tab">
                                            <div class="row mt-3">
                                                <div class="col-lg-4">
                                                    <div class="form-group helpDelayFee">
                                                        <label for="addHStandardRate">Standard Rate(&#8369;)</label>
                                                        <input type="number" name="addHStandardRate" id="addHStandardRate" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group helpDelayFee">
                                                        <label for="addHDelayFee">Tugboat Delay Fee (&#8369;)</label>
                                                        <input type="number" name="addHDelayFee" id="addHDelayFee" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group helpViolationFee">
                                                        <label for="addHViolationFee">Violation Fee (&#8369;)</label>
                                                        <input type="number" name="addHViolationFee" id="addHViolationFee" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group helpLateFee">
                                                        <label for="addHLateFee">Consignee Late Fee (&#8369;)</label>
                                                        <input type="number" name="addHLateFee" id="addHLateFee" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group helpDamageFee">
                                                        <label for="addHDamageFee">Damage Fee (&#8369;)</label>
                                                        <div class="input-group">
                                                            <input type="number" id="minHDamageFee" class="form-control" placeholder="Minimum">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="">&amp;</span>
                                                            </div>
                                                            <input type="number" id="maxHDamageFee" class="form-control" placeholder="Maximum">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group helpDiscount">
                                                        <label for="addHDiscount">Discount (&#37;)</label>
                                                        <input id="discountRange" name="addHDiscount" class="form-control" value="10" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pillsTugAssist" role="tabpanel" aria-labelledby="pillsHauling-tab">
                                            <div class="row mt-3">
                                                <div class="col-lg-4">
                                                    <div class="form-group helpDelayFee">
                                                        <label for="addTAStandardRate">Standard Rate(&#8369;)</label>
                                                        <input type="number" name="addTAStandardRate" id="addTAStandardRate" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group helpDelayFee">
                                                        <label for="addTADelayFee">Tugboat Delay Fee (&#8369;)</label>
                                                        <input type="number" name="addTADelayFee" id="addTADelayFee" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group helpViolationFee">
                                                        <label for="addTAViolationFee">Violation Fee (&#8369;)</label>
                                                        <input type="number" name="addTAViolationFee" id="addTAViolationFee" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group helpLateFee">
                                                        <label for="addTALateFee">Consignee Late Fee (&#8369;)</label>
                                                        <input type="number" name="addTALateFee" id="addTALateFee" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group helpDamageFee">
                                                        <label for="addTADamageFee">Damage Fee (&#8369;)</label>
                                                        <div class="input-group">
                                                            <input type="number" id="minTADamageFee" class="form-control" placeholder="Minimum">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="">&amp;</span>
                                                            </div>
                                                            <input type="number" id="maxTADamageFee" class="form-control" placeholder="Maximum">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group helpDiscount">
                                                        <label for="addTADiscount">Discount (&#37;)</label>
                                                        <input id="discountRange" name="addTADiscount" class="form-control" value="10" required>
                                                    </div>
                                                </div>
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