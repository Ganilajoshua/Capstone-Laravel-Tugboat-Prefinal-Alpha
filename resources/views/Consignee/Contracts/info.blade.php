<div class="modal fade" id="applySignatureModal" tabindex="-1" role="dialog" aria-labelledby="applySignatureModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applySignatureModalTitle">Sign Contract</h5>
                <button type="button" class="close waves-effect" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info mt-2 text-center">
                            <i class="bigIcon fas fa-info-circle mr-2 mt-1"></i>
                            Sign in the canvas before accepting the contract.
                        </div>
                            <div class="signCanvas"></div>
                            <textarea id="signatureJSON" hidden rows="5"></textarea>
                    </div>
                </div>
                <button class="clearCanvas btn btn-primary btn-sm waves-effect float-left ml-2">Clear Canvas</button> 
            </div>
            <div class="modal-footer">
                <button class="acceptContract btnAcceptContract btn btn-primary waves-effect btnButtons" data-toggle="modal" data-target="#editContractInfo" disabled>Accept Contract</button>
            </div>
        </div>
    </div>
</div>