<div class="modal fade" id="applySignatureModal" tabindex="-1" role="dialog" aria-labelledby="applySignatureModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applySignatureModalTitle"><div class="badge badge-warning">Finalizing...</div></h5>
                <button type="button" class="close waves-effect modalClose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info mt-2">
                    <i class="bigIcon fas fa-info-circle mr-2 mt-1"></i>
                    You must sign in the canvas first before finalizing the contract.
                </div>
                <div class="signCanvas"></div>
                <button class="clearCanvas btn btn-primary btn-sm waves-effect float-left">Clear Canvas</button> 
            </div>
            <div class="modal-footer">
                <button onclick="createActiveContract({{$companyAccepted->intContractListID}})" class="btn waves-effect btn-success">
                    Finalize Contract
                </button>
            </div>
        </div>
    </div>
</div>