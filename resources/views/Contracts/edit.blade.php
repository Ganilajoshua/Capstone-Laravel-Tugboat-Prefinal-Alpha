{{-- <div class="modal fade" id="editContractInfo" tabindex="-1" role="dialog" aria-labelledby="editContractInfoTitle" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editContractInfoTitle"><small class="smCat2">Edit Contract</small></h5>
                <button type="button" class="close modalClose waves-effect" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <div class="form-group">
                    <label for="editContractTitle">Title<sup class="text-primary">&#10033;</sup></label>
                    <input type="text" id="editContractTitle" name="editContractTitle" class="form-control" required>
                    <div class="invalid-feedback">
                        Please fill in the title.
                    </div>
                </div>
                <div>{{$terms}}</div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group">
                            <label>Terms &amp; Conditions<sup class="text-primary">&#10033;</sup></label>
                            <div>
                                <select class="wide" id="editTermsCondition">
                                    <option>Select Terms and Condition</option>
                                    @foreach($contracts as $contracts)
                                        <option value="{{$contracts->intContractListID}}"></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Quotations<sup class="text-primary">&#10033;</sup></label>
                            <div>
                                <select class="wide">
                                    <option value="1">20% Discount</option>
                                    <option value="2">Quotation 2</option>
                                    <option value="3">Discount 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Content<sup class="text-primary">&#10033;</sup></label>
                    <textarea class="summernoteContract" name="editContractDetails" id="editContractDetails"></textarea>
                </div>
                <input type="hidden" id="hideContractsID">
            </div>
            <div class="modal-footer">
                <button onclick="editContractSubmit()" type="button" class="btn btn-primary waves-effect">Save Changes</button>
            </div>
        </div>
    </div>
</div> --}}