<div class="modal fade" id="requestTugboatModal" tabindex="-1" role="dialog" aria-labelledby="forwardModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" style="max-width: 68%;"role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forwardModalLabel">Request Tugboat</h5>
                <button type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <label for="selectTugboatCompany">Select Company To Forward To<sup class="text-primary">&#10033;</sup></label>
                        <select id="selectTugboatCompany" name="selectTugboatCompany" class="form-control form-control-lg wide">
                            <option>Select Company</option>
                            @foreach($affiliates as $affiliates)
                                <option value="{{$affiliates->intCompanyID}}">{{$affiliates->strCompanyName}}</option>
                            @endforeach                    
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <label for="exDetails">Extra Details</label>
                        <textarea class="form-control" id="exTugboatDetails" rows="5" placeholder="Message"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect requestTugboat">Request Tugboat</button>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-sm-12 col-lg-12">
    
</div>