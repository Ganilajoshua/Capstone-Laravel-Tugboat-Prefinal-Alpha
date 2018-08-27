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
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="addQuotations">Select Quotations<sup class="text-primary">&#10033;</sup></label>
                                                <select id="addQuotations" name="addQuotations" class="form-control form-control input-lg wide">
                                                    <option data-display="" value="0">Select Quotations</option>
                                                    @foreach($quotations as $quotations)
                                                        <option value="{{$quotations->intQuotationID}}">{{$quotations->strQuotationTitle}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
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