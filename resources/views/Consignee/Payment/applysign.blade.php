<div class="modal fade" id="applyChequeSign" tabindex="-1" role="dialog" aria-labelledby="applyChequeSignLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="applyChequeSignLabel">
                    <h4>Signature</h4></div>
                <button type="button" class="mb-1 close modalClose waves-effect" aria-label="Close">
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
                            <div class="signChequeCanvas"></div>
                    </div>
                </div>
                <button class="clearChequeCanvas btn btn-primary btn-sm waves-effect float-left ml-2 mt-2">Clear Canvas</button> 
            </div>
            <div class="modal-footer">
                <button class="btnApplySign btn btn-primary waves-effect btnButtons" data-toggle="modal" data-target="#editContractInfo" disabled>Apply Sign</button>
            </div>
        </div>
    </div>
</div>