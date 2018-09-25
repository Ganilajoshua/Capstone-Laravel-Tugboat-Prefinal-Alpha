<div class="viewDetails">
    <div class="card card-primary animated slideInDown fast">
        <div class="card-header">
            <a href="#" class="btnBack btn btn-lg btn-link float-left" data-toggle="tooltip" title="Back" role="button">
                <i class="ion-chevron-left"></i>
            </a>
            <h4 class="float-right">Date: ????</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-4 col-lg-4">
                    <h5 class="mb-2">From</h5>
                    <div class="mb-1 font-weight-bold">
                        Tugmasters Bargepool INC.
                    </div>
                    <div class="mb-1">
                        404 San Fernando St.
                    </div>
                    <div class="mb-1">
                        Binondo, Manila
                    </div>
                    <div class="mb-1">
                        Phone: (02) 710-59-80
                    </div>
                    <div class="mb-1">
                        Email: tugmaster@email.com
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-lg-4">
                    <h5 class="mb-2">To</h5>
                    <div id="to" class="mb-1 font-weight-bold">
                        {{-- <p id="to"></p> --}}
                    </div>
                    <div id="address" class="mb-1">
                    </div>
                    <div class="mb-1">
                    </div>
                    <div class="mb-1">
                        Phone: <span id="pNum"></span>
                    </div>
                    <div class="mb-1">
                        Email: <span id="eMail"></span>
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-lg-4">
                    <div class="mb-1 font-weight-bold">
                        Ticket # <span id="dispatch"></span>
                    </div>
                    <div class="mb-1">
                        <strong>Towed:</strong> <span id="towed"></span>
                    </div>
                    <div class="mb-1">
                        <strong>Date:</strong> ????
                    </div>
                    <div class="mb-1">
                        <strong>Account:</strong> <span id="ID"></span>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="table-responsive">
                    <table class="text-center table table-striped border-primary" style="width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-white">Ticket #</th>
                                <th class="text-white">Tugboat Used</th>
                                <th class="text-white">From</th>
                                <th class="text-white">To</th>
                                <th class="text-white">Time Arrived</th>
                                <th class="text-white">Purpose of Service</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="dispatch2"></td>
                                <td id="tugboat"></td>
                                <td id="start"></td>
                                <td id="destination"></td>
                                <td>??</td>
                                <td id="service"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-lg-6 adminSign">
                        <div class="card card-primary">
                            <div class="card-header"><h4 class="text-center">Administrator Signature</h4></div>
                            <div class="card-body rowOverflow">
                                <div class="row">
                                    <div class="col-12">
                                        {{-- <div class="alert alert-danger alertAdminSign"><i class="fas fa-exclamation-circle mr-3"></i>No Administrator Signature!</div> --}}
                                        <div class="signAdminCanvas"></div>
                                        <textarea id="signatureJSON"
                                        hidden rows="5"
                                        ></textarea>
                                    </div>
                                </div>
                                <button class="clearAdminCanvas btn btn-secondary btn-sm waves-effect">Clear</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="card card-primary">
                            <div class="card-header"><h4 class="text-center">Consignee Signature</h4></div>
                            <div class="card-body rowOverflow">
                                <div class="signConsigneeCanvasDisplay"></div>
                                <div class="alert alert-danger alertConsigneeSign"><i class="fas fa-exclamation-circle mr-3"></i>No Consignee Signature!</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                        <button id="Consignee" onclick="Void()" class="btn btn-primary waves-effect float-right" >Return</button>
                        <select name="" class="d-none" id="id">
                            <option id="dispatch3"></option>
                        </select>
                        <select name="" class="d-none" id="compid">
                                <option id="company"></option>
                            </select>
                        <button id="forAdmin" onclick="ValidateAAccept()" class="btn btn-primary waves-effect float-left" >Submit to Consignee</button>
                        {{-- <button id="forConsignee" class="btnFinalizeDT btn btn-primary waves-effect float-right"> Consignee ACCEPT</button> --}}
                    </div>
        </div>
        <div class="card-footer">
            {{-- <button onclick="finalizeDispatch()" id="finalize" class="btnFinalizeDT btn btn-primary waves-effect float-right">Finalize Dispatch Ticket</button> --}}
            <button onclick="finalize()" class="btnFinalizeDT btn btn-primary waves-effect float-right">Finalize Dispatch Ticket</button>
        </div>
    </div>
</div>

