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
        margin-bottom:35rem!important;
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
            <h6 class="text-center mb-3">Tel Nos. 710-59-80 / 925-91-81</h6>
            <h5 class="text-center mb-4 font-weight-bold">OFFICIAL RECEIPT</h5>
        </div>
    </div>
    <div class="row marginBot mb-3">
        <div class="col-7 float-left">
            <div class="mb-1 font-weight-bold">
                Consignee Name : asfdasfas
            </div>
        </div>
        <div class="col-5 float-right" style="text-align:right;">
            <div class="mb-2 font-weight-bold">
                Mode of Payment :
            </div>
            <div class="mb-5">
                Date :
            </div>
        </div>
    </div>
    <div class="marginTable mt-5">
        <table class="table table-bordered text-center border-primary mt-5" style="width:100%">
            <thead style="background:#00aeff;" class="text-white">
                <tr class="text-center">
                    <th>Bill #</th>
                    <th># of Hours</th>
                    <th>Amount</th>
                </tr>
            </thead>  
            <tbody>
                <tr>
                    <td class="text-center">23</td>
                    <td class="text-center">4 & 30</td>
                    <td class="text-center">30000</td>
                </tr>
                <tr>
                    <td class="text-center">24</td>
                    <td class="text-center">5</td>
                    <td class="text-center">35000</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="border-primary">
                    <td colspan="2"><h5 class="font-weight-bold">Total Amount</h5></td>
                    <td class="text-center"><h5 class="font-weight-bold">65000</h5></td>
                </tr>
            </tfoot>
        </table>
        <table class="table table-bordered text-center border-primary mt-5" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th colspan="3" class="text-center">Cheque Details</th>
                </tr>
                <tr class="text-center text-white" style="background:#00aeff;">
                    <th>Bank</th>
                    <th>Cheque #</th>
                    <th>Amount</th>
                </tr>
            </thead>  
            <tbody style="border-bottom:1px;">
                <tr>
                    <td class="text-center">Landbank</td>
                    <td class="text-center">586931</td>
                    <td class="text-center">65000</td>
                </tr>
                <tr>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="row mt-4">
        <div class="col-6"></div>
        <div class="col-6 float-right" style="text-align:left;">
            <h6 class="mb-2">Payment Method :</h6>
            <h6 class="mb-2">Receipt Total :</h6>
            <h6 class="mb-2">Payment Received :</h6>
            <h6 class="mb-2">Balance :</h6>
        </div>
    </div>
    <footer class="text-center">Generated by TSMS</footer>
</body>
        