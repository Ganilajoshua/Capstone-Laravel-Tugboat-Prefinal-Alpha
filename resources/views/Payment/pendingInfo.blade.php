
<div class="viewPendingInfo">
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
                        <div id="to1" class="mb-1 font-weight-bold">
                            {{-- <p id="to"></p> --}}
                        </div>
                        <div id="address1" class="mb-1">
                        </div>
                        <div class="mb-1">
                        </div>
                        <div class="mb-1">
                            Phone: <span id="pNum1"></span>
                        </div>
                        <div class="mb-1">
                            Email: <span id="eMail1"></span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-lg-4">
                        <div class="mb-1 font-weight-bold">
                            Ticket # <span id="dispatch1"></span>
                        </div>
                        <div class="mb-1">
                            <strong>Towed:</strong> <span id="towed1"></span>
                        </div>
                        <div class="mb-1">
                            <strong>Account:</strong> <span id="ID1"></span>
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
                                    <td id="dispatch21"></td>
                                    <td id="tugboat1"></td>
                                    <td id="start1"></td>
                                    <td id="destination1"></td>
                                    <td>??</td>
                                    <td id="service1"></td>
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
                                    <td class="tdBorderLeft" id="amount1"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="tdBorderLeft">Tugboat Delay Fee</td>
                                    <td class="tdBorderLeft"></td>
                                    <td id="delayfee1"></td>
                                </tr>
                                <tr>
                                    <td class="tdBorderLeft">Violation Fee</td>
                                    <td class="tdBorderLeft" id="conviolationfee1"></td>
                                    <td id="comviolationfee1"></td>
                                </tr>
                                <tr>
                                    <td class="tdBorderLeft">Late Fee</td>
                                    <td class="tdBorderLeft" id="conlatefee1"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="tdBorderLeft">Damage Fee</td>
                                    <td class="tdBorderLeft" id="condamagefee1"></td>
                                    <td id="comdamagefee1"></td>
                                </tr>
                                <tr>
                                        <td class="tdBorderLeft">Discounts</td>
                                        <td class="tdBorderLeft" ><span id="discount1"></span>%</td>
                                        <td></td>
                                    </tr>
                                    <tr style="background:white;">
                                            <td class="tdBorderLeft"><h6>TOTAL ( &#8369; )</h6></td>
                                            <td colspan="2" id="total1"></td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
            </div class="float-right">
            <select name="" id="new" hidden>
                <option id="bill"></option>
            </select>
            <select name="" id="sum" hidden>
                <option id="total2"></option>
            </select>
            <select name="" id="bal" hidden>
                    <option id="balance"></option>
                </select>
            <select name="" id="bal" hidden>
                <option id="balance"></option>
            </select>
            <button onclick="validate()" class="app btn-sm btn-primary waves-effect" data-toggle="tooltip" title="Accept" role="button">
                    Approve
            </button>
            <button onclick="reject()" class="rem btn-sm btn-primary waves-effect" data-toggle="tooltip" title="Reject" role="button">
                    Reject
            </button>  
            
        </div>
    </div>
</div>
</div>