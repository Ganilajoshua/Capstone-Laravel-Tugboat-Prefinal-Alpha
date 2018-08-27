<div class="col-lg-8 editForm">
    <div class="card">
        <section class="sectionDark">
            <div class="container">
                <h5 class="section-header text-center" style="text-transform: uppercase; display:inline-block;">
                    <a id="btnAddgoBack" href="/administrator/maintenance/quotations" class="btn-link float-left mt-1" data-toggle="tooltip" title="Back" role="button">
                        <i class="ion-chevron-left"></i>
                    </a>
                    <button class="btn btn-lg btn-link float-right" disabled></button>
                    EDIT
                </h5>
            </div>
            <div class="row ml-1 mr-1">
                <div class="col">
                    <form class="needs-validation" novalidate="">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="editQuoteTitle">Title<sup class="text-primary">&#10033;</sup></label>
                                    <input type="text" name="editQuoteTitle" class="form-control" id="editQuoteTitle" required>
                                    <div class="invalid-feedback">
                                        Please fill in the title.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Content<sup class="text-primary">&#10033;</sup></label>
                                            <textarea class="summernoteQuote" id="editQuoteDetails"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary btn-block text-center waves-effect addFields" data-toggle="tooltip" title="Add Quotation Fields">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" id="editquotationID">
                                <div class="mt-3" id="editfirstRow"></div>
                            </div>
                            <div class="card-footer">
                                <button type="button" onclick="editQuotation()" class="float-right btn btn-primary waves-effect">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
