<div class="viewDetails container">
    <div class="card card-primary animated slideInDown fast">
        <div class="card-header">
            <a href="#" class="btnBack btn btn-lg btn-link float-left" data-toggle="tooltip" title="Back" role="button">
                <i class="ion-chevron-left"></i>
            </a>
            <h4 class="float-right">Date: March 17, 2018</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-4 col-lg-4">
                    <h5 class="mb-2">From</h5>
                    <div class="mb-1 font-weight-bold">
                        ek
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
                    <div class="mb-1 font-weight-bold">
                        Account of North Star
                    </div>
                    <div class="mb-1">
                        795 Folsom Ave. Suite 600
                    </div>
                    <div class="mb-1">
                        San Francisco, CA 91407
                    </div>
                    <div class="mb-1">
                        Phone: (555) 539-1037
                    </div>
                    <div class="mb-1">
                        Email: northstar@email.com
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-lg-4">
                    <div class="mb-1 font-weight-bold">
                        Ticket Number: #007612
                    </div>
                    <div class="mb-1">
                        <strong>Towed:</strong> B/ Bulgy
                    </div>
                    <div class="mb-1">
                        <strong>Date:</strong> 2/22/2014
                    </div>
                    <div class="mb-1">
                        <strong>Account:</strong> 968-34567
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
                                <td>72286</td>
                                <td>Energy Sun</td>
                                <td>Baseco Port Area</td>
                                <td>Guadalupe, Makati City</td>
                                <td>15:00 HRS</td>
                                <td>Towed Barge Bulgy containing Oil and Kerosene</td>
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
                                    <div class="alert alert-danger alertAdminSign"><i class="fas fa-exclamation-circle mr-3"></i>No Administrator Signature!</div>
                                    <div class="signAdminCanvas"></div>
                                    <textarea id="signatureJSON" hidden rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header"><h4 class="text-center">Consignee Signature</h4></div>
                        <div class="card-body rowOverflow">
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-danger alertConsigneeSign"><i class="fas fa-exclamation-circle mr-3"></i>No Consignee Signature!</div>
                                    <div class="signConsigneeCanvas"></div>
                                </div>
                            </div>
                            <button class="clearConsigneeCanvas btn btn-secondary btn-sm waves-effect ml-2">Clear Canvas</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button onclick="submitSignature()" class="btnSubmitSign btn btn-primary waves-effect float-right">Submit Signature</button>
        </div>
    </div>
</div>