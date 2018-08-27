<div class="modal fade" id="viewContractInfo" tabindex="-1" role="dialog" aria-labelledby="viewContractInfoTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewContractInfoTitle">Contract Details</h5>
                <button type="button" class="close modalClose waves-effect" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody modalContractDetails">
                
                <h1 id="contractTitle">Terms and Conditions</h1>
                <p id="contractDate" >Last updated: July 19, 2018</p>
                <p id="contractDetails"></p>
            </div>
            <input type="hidden" id="contractsInfoID">
            <div class="modal-footer">
                <button onclick="storeContracts()" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#editContractInfo">Save Contract</button>
            </div>
        </div>
    </div>
</div>