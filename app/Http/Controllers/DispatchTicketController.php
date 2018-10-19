<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Response;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Invoice;
use App\DispatchTicket;
use PDF;
class DispatchTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispatch = DB::table('tbljoborder as joborder')
        // ->join('tblservices as service','joborder.intJOServiceTypeID','service.intServicesID')
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
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->leftjoin('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        // ->where('invoice.intIDispatchTicketID',null)
        // ->where('dispatch.boolAApprovedby',0)
        // ->orWhere('dispatch.boolAApprovedby',null)
        // ->where('dispatch.boolCApprovedby',0)
        // ->orWhere('dispatch.boolCApprovedby',null)
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        // ->where('invoice.enumstatus','Finished')
        ->get(); 

        $accept = DB::table('tbljoborder as joborder')
        // ->join('tblservices as service','joborder.intJOServiceTypeID','service.intServicesID')
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
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->leftjoin('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->where('invoice.intIDispatchTicketID',null)
        ->where('dispatch.boolAApprovedby',1)
        ->where('dispatch.boolCApprovedby',null)
        ->orWhere('dispatch.boolCApprovedby',0)
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        // ->where('invoice.enumstatus','Finished')
        ->get();

        $final = DB::table('tbljoborder as joborder')
        // ->join('tblservices as service','joborder.intJOServiceTypeID','service.intServicesID')
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
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        // ->join('tbldispatchticket as dispatch','dispatch.intDTJobSchedID','jobsched.intJobSchedID')
        ->leftjoin('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->where('invoice.intIDispatchTicketID',null)
        ->where('dispatch.boolAApprovedby',1)
        ->Where('dispatch.boolCApprovedby',1)
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        // ->where('invoice.enumstatus','Finished')
        ->get();
        return view('DispatchTicket.index')
        ->with('accept',$accept)
        ->with('dispatch',$dispatch)
        ->with('final',$final);
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
        $Dispatch = DispatchTicket::find($request->dispatch);
            error_log('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
            error_log($request->dispatch);
            $Dispatch->timestamps = false;
            $Dispatch->boolCApprovedby = 1;
            $Dispatch->strConsigneeSign = $request->signature;
            // return response()->json(['dispatch'=>$dispatch]);    
            $Dispatch->save();
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
    public function info($id)
        {
        $dispatch = DB::table('tbljoborder as joborder')
        // ->join('tblservices as service','joborder.intJOServiceTypeID','service.intServicesID')
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
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        // ->join('tbldispatchticket as dispatch','dispatch.intDTJobSchedID','jobsched.intJobSchedID')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        ->where('dispatch.intDispatchTicketID',$id)
        ->get(); 
        // return view('DispatchTicket.index')
        // ->with('dispatch',$dispatch);
        return response()->json(['dispatch'=>$dispatch]);    

        }
        public function AdminAccept(Request $request)
        {
        $Dispatch = DispatchTicket::find($request->dispatch);
        $Dispatch->timestamps = false;
        $Dispatch->boolAApprovedby = 1;
        $Dispatch->strAdminSign = $request->signature;
        // return response()->json(['dispatch'=>$dispatch]);    
        $Dispatch->save();
        }
        public function finalize(Request $request)
    {
        $Invoice = new Invoice;
        $Invoice->timestamps = false;
        $Invoice->intDTCompanyID = $request->finalize;
        $Invoice->intIDispatchTicketID = $request->dispatch;
        $Invoice->timestamps = false;
        $Invoice->strInvoiceDesc = 'processed';
        $Invoice->boolDeleted = 0;
        $Invoice->save();
    }
    public function Void(Request $request)
    {
        $Dispatch = DispatchTicket::find($request->dispatch);
        $Dispatch->timestamps = false;
        $Dispatch->boolCApprovedby = 0;
        $Dispatch->strConsigneeSign = null;
        // return response()->json(['dispatch'=>$dispatch]);    
        $Dispatch->save();
    }
    public function printDispatch()
    {
        $pdf = PDF::loadView('DispatchTicket.dispatchTicketPDF')->setPaper('letter', 'portrait');
        return $pdf->download('dispatchTicket.pdf');
    }
}
