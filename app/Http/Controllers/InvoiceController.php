<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Invoice;
use App\DispatchTicket;
use App\Charges;
use App\Bill;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->join('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        // ->where('company.intCompanyID',Auth::user()->intUCompanyID)
        ->where('invoice.enumstatus','Processing')
        ->where('jobsched.enumstatus','Finished')
        ->groupby('dispatch.intDispatchTicketID')
        ->get();

        return view('Invoice.index')->with('invoice',$invoice);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fhhf = '1';
        return $fhhf;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        // ->join('tblbill as bill','invoice.intIBillID','bill.intBillID')
        ->join('tblcharges as charges','charges.intChargeID','invoice.intInvoiceID')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('invoice.intInvoiceID',$id)
        ->groupby('dispatch.intDispatchTicketID')
        ->get(); 
        error_log($dispatch);
        return response()->json(['dispatch'=>$dispatch]);   
    
    }

    public function pay()
    {
        $Count = Bill::max('intBillID')+1;
        $Invoice = Invoice::where('intInvoiceID',$request->id3);
        $Invoice->enumStatus = 'Paid';
        $Invoice->intIBillID = $Count;
        $Invoice->timestamps = false;
        $Invoice->save();

        $Bill = new Bill;
        $Bill->intBillID = $Count;
        $Bill->enumStatus = 'Accepted';
        $Bill->timestamps = false;
        $Bill->save();

        // return response()->json(['Invoice'=>$Invoice,'Bill'=>$Bill]); 
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
}
