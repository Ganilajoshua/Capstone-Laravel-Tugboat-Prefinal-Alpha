<div class="viewDetails">
    <div class="card card-primary animated slideInDown fast">
        <div class="card-header">
            <a href="#" class="btnBack btn btn-lg btn-link float-left" data-toggle="tooltip" title="Back" role="button">
                <i class="ion-chevron-left"></i>
            </a>
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
                        <strong>Date:</strong> <span id="date"></span>
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
            <div class="col-12 col-sm-12 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header"><h4 class="text-center">Consignee Signature</h4></div>
                        <div class="card-body rowOverflow">
                            <div class="signConsigneeCanvasDisplay"></div>
                            <textarea id="signatureJSON"
                            hidden rows="5"
                            ></textarea>
                        </div>
                        <button class="clearConsigneeCanvas btn btn-secondary btn-sm waves-effect">Clear</button>
                    </div>
                </div>
                <div>
                        <select name="" class="d-none" id="id">
                            <option id="dispatch3"></option>
                        </select>
                        <br>
                        <button onclick="ValidateCAccept()" class="btn btn-primary waves-effect float-right" id="finalize">Approve</button>
                        <button class="btn btn-secondary float-right disabled" id="wait"> Wait for the Response</button>
                        <button onclick="ValidateCAccept()" class="btn btn-primary float-right" id="submit">Submit</button>
                    </div>
        </div>
    </div>
</div>

