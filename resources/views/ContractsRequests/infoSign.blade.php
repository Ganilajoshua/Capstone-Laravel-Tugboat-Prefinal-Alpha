<div class="modal fade" id="applySignatureModal" tabindex="-1" role="dialog" aria-labelledby="applySignatureModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applySignatureModalTitle">Sign Contract</h5>
                <button type="button" class="close waves-effect modalClose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="alert alert-info mt-2">
                            <i class="bigIcon fas fa-info-circle mr-2 mt-1"></i>
                            Sign in the canvas before finalizing the contract.
                        </div>
                        <div class="signCanvas"></div>
                        <textarea id="signatureJSON" hidden rows="5"></textarea>
                    </div>
                </div>
                <button class="clearCanvas btn btn-primary btn-sm waves-effect float-left">Clear Canvas</button> 
            </div>
            <div class="modal-footer">
                <button class="finalizeContract btn waves-effect btn-primary"> 
                    {{-- {{$companyAccepted->intContractListID}} --}}
                    Finalize Contract
                </button>
            </div>
        </div>
    </div>
</div>