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
                        <strong>Date:</strong> <span id="dateEnded"></span>
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
                                <td id="1tugboat"></td>
                                <td id="start"></td>
                                <td id="destination"></td>
                                <td>??</td>
                                <td id="service"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <div class="row">
                <div class="table-responsive">
                        {{-- @foreach(count($Counter)>0) --}}
                        <table class="table table-striped border-primary text-center">
                            <thead class="bg-primary text-black">
                                <th class="">Particulars</th>
                                <th class="">Add ( &#8369; )</th>
                                <th class="">Less ( &#8369; )</th>
                            </thead>
                            <tbody>
    
                            <tr>
                                <td class="tdBorderLeft">Job Order Amount</td>
                                <td class="tdBorderLeft" id="amount"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="tdBorderLeft">Tugboat Delay Fee</td>
                                <td class="tdBorderLeft"></td>
                                <td id="delayfee"></td>
                            </tr>
                            <tr>
                                <td class="tdBorderLeft">Violation Fee</td>
                                <td class="tdBorderLeft" id="conviolationfee"></td>
                                <td id="comviolationfee"></td>
                            </tr>
                            <tr>
                                <td class="tdBorderLeft">Late Fee</td>
                                <td class="tdBorderLeft" id="conlatefee"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="tdBorderLeft">Damage Fee</td>
                                <td class="tdBorderLeft" id="condamagefee"></td>
                                <td id="comdamagefee"></td>
                            </tr>
                            <tr>
                                    <td class="tdBorderLeft">Discounts</td>
                                    <td class="tdBorderLeft" ><span id="discount"></span>%</td>
                                    <td></td>
                                </tr>
                                <tr style="background:white;">
                                        <td class="tdBorderLeft"><h6>TOTAL ( &#8369; )</h6></td>
                                        <td colspan="2" id="total"></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
        </div>
    </div>
</div>
</div>