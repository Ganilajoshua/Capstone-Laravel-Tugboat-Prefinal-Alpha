<?php

namespace App\Http\Controllers\ConsigneeControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Invoice;
use App\Bill;
class CBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispatch = DB::table('tbljoborder as joborder')
        ->join('tblservices as service','joborder.intJOServiceTypeID','service.intServicesID')
        ->join('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->join('tblpier as pier','berth.intBPierID','pier.intPierID')
        // ->join('tblbarge as barge','joborder.intJOBargeID','barge.intBargeID')
        ->join('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        // ->join('tblvessel as vessel','joborder.intJOeVesselID','vessel.intVesselID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->join('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbldispatchticket as dispatch','dispatch.intDTJobSchedID','jobsched.intJobSchedID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->where('company.intCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        ->where('invoice.enumstatus','Pending')
        ->get();
        // $dispatch2 = DB::table('tbldispatchticket as dispatch')
        // ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        // ->join('tblcompany as company','company.intCompanyID','invoice.intDTCompanyID')
        // ->join('tblbill as bill','bill.intBillID','invoice.intInvoiceID')
        // ->where('company.intCompanyID',Auth::user()->intUCompanyID)
        // ->where('invoice.enumstatus','Paid')
        // ->groupBy('intIBillID')
        // ->sum('fltBalanceRemain');
        // $dispatch2 = DB::table('tblinvoice as invoice')
        // ->join('tblcharges as charges','invoice.intInvoiceID','charges.intChargeID')
        // ->join('tblbill as bill','bill.intBillID','invoice.intInvoiceID') 
        // ->groupBy('intIBillID')
        // ->sum('fltBalanceRemain');
        // error_log($dispatch2);
        return view('Consignee.Billing.index')
        // ->with('dispatch2',$dispatch2)
        ->with('dispatch',$dispatch);
        
        // return response()->json(['dispatch'=>$dispatch]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

        $Bill = Bill::max('intBillID')+1;
        error_log($Bill);

        if(!empty($request->bill))
            {        
                for($count=0;$count < count($request->bill); $count++)
                {
                    $Invoice = Invoice::findOrFail($request->bill[$count]);
                    error_log($Invoice);
                    $Invoice->timestamps = false;
                    $Invoice->enumStatus = 'Paid';
                    $Invoice->intIBillID = $Bill;
                    $Invoice->save();
                }
            }
        return response()->json(['Bill'=>$Bill,'Invoice'=>$Invoice]);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function cheque()
    {
  
    }
}
