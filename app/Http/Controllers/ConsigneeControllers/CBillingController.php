<?php

namespace App\Http\Controllers\ConsigneeControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use PDF;
use App\Invoice;
use App\Bill;
class CBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $contract = DB::table('tbljoborder as joborder')
        ->leftjoin('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->leftjoin('tblpier as pier','berth.intBPierID','pier.intPierID')
        ->leftjoin('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->join('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->leftjoin('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->join('tblcharges as charges','charges.intChargeID','invoice.intInvoiceID')
        ->where('invoice.intInvoiceID',$id)
        ->where('company.intCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')

        ->get(); 

        $pdf = PDF::loadView('Consignee.Billing.pdf', compact('contract'))->setPaper('letter', 'portrait');;
        return $pdf->download('Billing.pdf');
    }
    public function index()
    {
        $dispatch = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->leftjoin('tblbill as bill','invoice.intIBillID','bill.intBillID')
        ->where('company.intCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        ->where('invoice.enumstatus','Processing')
        ->where('bill.intBillID',null)
        
        ->groupby('dispatch.intDispatchTicketID')
        ->get();

        $pending = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->join('tblbill as bill','bill.intBillID','invoice.intIBillID')
        ->join('tblcheque as cheque','bill.intBillID','cheque.intCBillID')
        ->where('company.intCompanyID',Auth::user()->intUCompanyID)
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
        ->where('invoice.enumstatus','Pending')
        ->where('bill.enumStatus','Rejected')
        ->groupby('intBillID')
        ->get();

        return view('Consignee.Billing.index')
        // ->with('dispatch2',$dispatch2)
        ->with('rejected',$rejected)
        ->with('dispatch',$dispatch)
        ->with('paid',$paid)
        ->with('pending',$pending);
        
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
                    $Invoice->enumStatus = 'Processing';
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
