<link href="{{ public_path('/others/stisla_admin_v1.0.0/dist/modules/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ public_path('/others/stisla_admin_v1.0.0/dist/css/domPDF.css') }}" rel="stylesheet">
<style>
    body{
        font-size:11px;
    }
    .smallP{
        font-size:8px !important;
        text-align: justify !important;
    }
    .pdfTitle{
        margin-right:100px !important;
    }
    .marginTable{
        margin-top:400px !important;
    } 
    @page { 
        margin-bottom: 0px;
    }
    .marginTop{
        margin-top:23rem!important;
    }
    .marginBot{
        margin-bottom:28rem!important;
    }
    .textLine{
        width: 80%;
        margin: auto;
        margin-top: 5%;
        margin-bottom: 5%;
        border-color: black;
    }
    .textLine2{
        width: 20%;
        margin: auto;
        margin-top: 5%;
        margin-bottom: 5%;
        border-color: black;
    }
    footer { 
        position: fixed; 
        bottom:100px; 
        left: 0px; 
        right: 0px;
        height: -50px; 
    }
    </style>
<body>
    {{-- <h4 class="text-center mb-1 pdfTitle">Tugmaster Bargepool Inc</h4>
    <h5 class="text-center mb-1 pdfTitle">Anonas St. Sta Mesa Manila</h5>
    <h6 class="text-center mb-4 pdfTitle">Tel Nos. 710-59-80 / 925-91-81</h6>
    <h6 class="float-right mb-2 mt-2 font-weight-bold">BILL INVOICE:</h6>
    <div class="row">
        <div class="col-6 float-left">
            <h5 style="margin-top:3rem;">BILL TO</h5>
        </div>
        <div class="col-6 float-right">
        </div>
    </div> --}}
    <div class="row mb-2">
        <div class="col-12">
            <h4 class="text-center mb-2">Tugmaster Bargepool Inc</h4>
            <h6 class="text-center mb-2">404 San Fernando St., Binondo, Metro Manila</h6>
            <h6 class="text-center mb-4">Tel Nos. 710-59-80 / 925-91-81</h6>
        </div>
    </div>
    <div class="row marginBot mb-3">
        <div class="col-7 float-left">
            <div class="mb-1 font-weight-bold">
                BILL TO : asfdasfas
            </div>
        </div>
        <div class="col-5 float-right" style="text-align:right;">
            <div class="mb-2 font-weight-bold">
                BILL INVOICE NO :
            </div>
            <div class="mb-1">
                Date :
            </div>
        </div>
    </div>
    <div class="marginTable">
        <table class="table table-bordered text-center border-primary mt-5" style="width:100%;font-size:12px;">
            <thead style="background:#00aeff;border:0%;" class="text-white">
                <tr class="text-center">
                    <th>Dispatch Ticket #</th>
                    <th>Tugboats Used</th>
                    <th># of Hours</th>
                    <th>Additional Charges</th>
                    <th>Amount</th>
                </tr>
            </thead>  
            <tbody>
                <tr>
                    <td class="text-center">05-04-2018 17:00</td>
                    <td>
                        <ul>
                            <li>Energy Master</li>
                            <li>Energy Sun</li>
                            <li>MT Moon</li>
                        </ul>
                    </td>
                    <td class="text-center">4 & 30</td>
                    <td class="text-center text-success"></td>
                    <td class="text-center text-danger">10000</td>
                </tr>
                <tr>
                    <td class="text-center">05-04-2018 17:00</td>
                    <td>
                        <ul>
                            <li>Energy Moon</li>
                            <li>Energy Jupiter</li>
                            <li>MT Mars</li>
                        </ul>
                    </td>
                    <td class="text-center">10</td>
                    <td class="text-center text-success"></td>
                    <td class="text-center ">25000</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-center font-weight-bold" colspan="3">TOTAL</td>
                    <td class="text-center" colspan="2">25000</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <hr class="marginTop">
        <div class="row">
            <div class="col-1 float-left">
                <p class="smallP font-weight-bold">IMPORTANT : </p>
            </div>
            <div class="col-5 float-left">
                <p class="smallP">This is a bill for services rendred and not a receipt. It will not be recognized as paid without collector's receipt. Interest of one percent ( 1% ) per month will be charged on all overdue accounts. In case of litigation, 25% will be collected as attorney's fee and legal expenses. Parties expressly submit themselves to the jurisdiction of the courts of Manila</p>
            </div>
            <div class="col-4 float-right">
                <div style="margin-top:3rem!important;">
                    <hr class="textLine">
                    <p class="text-center">Authorized Signature</p>
                </div>
            </div>
        </div>
</body>
        