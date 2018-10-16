<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Response;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Invoice;
use App\DispatchTicket;
use App\Charges;
use App\Bill;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $bill = DB::table('tbljoborder as joborder')
        // ->select(array('bill.intBillID','company.strCompanyName','joborder.enumServiceType'))
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->join('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->join('tblbill as bill','invoice.intIBillID','bill.intBillID')
        ->join('tblcharges as charges','charges.intChargeID','invoice.intInvoiceID')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->groupby('dispatch.intDispatchTicketID')
        ->get(); 

        $invoice = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->join('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        // ->where('company.intCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        ->where('invoice.enumstatus','Processing')
        ->groupby('dispatch.intDispatchTicketID')
        ->get();

        $pending = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->join('tblbill as bill','bill.intBillID','invoice.intIBillID')
        ->join('tblcheque as cheque','bill.intBillID','cheque.intCBillID')
        ->where('jobsched.enumstatus','Finished')
        ->where('bill.enumStatus','Pending')
        ->groupby('intBillID') 
        ->get();

        $paid = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->join('tblbill as bill','bill.intBillID','invoice.intIBillID')
        ->join('tblcheque as cheque','bill.intBillID','cheque.intCBillID')
        ->where('jobsched.enumstatus','Finished')
        ->where('bill.enumStatus','Accepted')
        ->groupby('intBillID') 
        ->get();

        $rejected = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->join('tblbill as bill','bill.intBillID','invoice.intIBillID')
        ->join('tblcheque as cheque','bill.intBillID','cheque.intCBillID')
        ->where('jobsched.enumstatus','Finished')
        ->where('bill.enumStatus','Rejected')
        ->groupby('intBillID') 
        ->get();

        return view('Payment.index')
        ->with('pending',$pending)
        ->with('paid',$paid)
        ->with('invoice',$invoice)
        ->with('rejected',$rejected)
        ->with('bill',$bill);
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

        // $a = $request->bill;
        // // $sum = $request->sum;
        // $balance = $request->bal;
        // $balance = $balance + $total;
        // $balance = $balance - $sum;

        $Invoice = Invoice::find($request->bill);
        $Invoice->enumStatus = 'Paid';
        $Invoice->save();
        $Bill = Bill::find($request->bill);
        $Bill->timestamps = false;
        $Bill->enumStatus = 'Accepted';
        $Bill->save();

    }
    public function reject(Request $request)
    {
        $Bill = Bill::find($request->bill);
        $Bill->timestamps = false;
        $Bill->enumStatus = 'Rejected';
        // return response()->json(['Bill'=>$Bill]);    
        $Bill->save();
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
        
    }
    public function infopayment($id)
    {
        $dispatch = DB::table('tbljoborder as joborder')
        // ->join('tblservices as service','joborder.intJOServiceTypeID','service.intServicesID')
        ->leftjoin('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->leftjoin('tblpier as pier','berth.intBPierID','pier.intPierID')
        // ->join('tblbarge as barge','joborder.intJOBargeID','barge.intBargeID')
        // ->leftjoin('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        // ->join('tblvessel as vessel','joborder.intJOeVesselID','vessel.intVesselID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->join('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->join('tblbill as bill','invoice.intIBillID','bill.intBillID')
        ->join('tblcharges as charges','charges.intChargeID','invoice.intInvoiceID')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('invoice.intInvoiceID',$id)
        ->groupby('dispatch.intDispatchTicketID')
        ->get();

        
        return response()->json(['dispatch'=>$dispatch]);   
    }
    public function pendinginfo($id)
    {

        $dispatch = DB::table('tbljoborder as joborder')
        ->leftjoin('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->leftjoin('tblpier as pier','berth.intBPierID','pier.intPierID')
        ->leftjoin('tblbarge as barge','joborder.intJOBargeID','barge.intBargeID')
        ->leftjoin('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->join('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->join('tblbill as bill','invoice.intIBillID','bill.intBillID')
        ->join('tblcharges as charges','charges.intChargeID','invoice.intInvoiceID')
        ->join('tblbalance as balance','balance.intBalanceID','company.intCompanyID')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('invoice.intInvoiceID',$id)
        ->groupby('dispatch.intDispatchTicketID')
        ->get();
        return response()->json(['dispatch'=>$dispatch]);   
    }
}
