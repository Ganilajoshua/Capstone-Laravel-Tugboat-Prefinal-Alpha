<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Response;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Invoice;
use App\DispatchTicket;
use App\Charges;
use Carbon\Carbon;
use PDF;
use Redirect;
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
        ->leftjoin('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->leftjoin('tblpier as pier','berth.intBPierID','pier.intPierID')
        // ->join('tblbarge as barge','joborder.intJOBargeID','barge.intBargeID')
        ->leftjoin('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        // ->join('tblvessel as vessel','joborder.intJOeVesselID','vessel.intVesselID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->join('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->leftjoin('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->leftjoin('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->leftjoin('tblcontractlist as contract','company.intCompanyID','contract.intCCompanyID')
        ->leftjoin('tblfinalcontractfeesmatrix as finalmatrix','finalmatrix.intFCFContractListID','contract.intContractListID')
        // ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        ->where('dispatch.boolCApprovedby',0)
        ->where('dispatch.boolAApprovedby',0)
        // ->where('dispatch.boolDeleted',0)
        ->where('invoice.intIDispatchTicketID',null)
        ->groupby('dispatch.intDispatchTicketID')
        ->get(); 
        $dispatch2 = DB::table('tbljoborder as joborder')
        // ->join('tblservices as service','joborder.intJOServiceTypeID','service.intServicesID')
        ->leftjoin('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->leftjoin('tblpier as pier','berth.intBPierID','pier.intPierID')
        // ->join('tblbarge as barge','joborder.intJOBargeID','barge.intBargeID')
        ->leftjoin('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        // ->join('tblvessel as vessel','joborder.intJOeVesselID','vessel.intVesselID')
        ->leftjoin('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->leftjoin('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->leftjoin('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->leftjoin('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->leftjoin('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->leftjoin('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->leftjoin('tblcontractlist as contract','company.intCompanyID','contract.intCCompanyID')
        // ->join('tblfinalcontractfeesmatrix as finalmatrix','finalmatrix.intFCFContractListID','contract.intContractListID')
        ->leftjoin('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        ->where('dispatch.boolCApprovedby',1)
        ->where('dispatch.boolAApprovedby',1)
        ->where('invoice.intIDispatchTicketID',null)
        ->groupby('dispatch.intDispatchTicketID')
        ->get(); 

        $dispatch3 = DB::table('tbljoborder as joborder')
        // ->join('tblservices as service','joborder.intJOServiceTypeID','service.intServicesID')
        ->leftjoin('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->leftjoin('tblpier as pier','berth.intBPierID','pier.intPierID')
        // ->join('tblbarge as barge','joborder.intJOBargeID','barge.intBargeID')
        ->leftjoin('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        // ->join('tblvessel as vessel','joborder.intJOeVesselID','vessel.intVesselID')
        ->leftjoin('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->leftjoin('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->leftjoin('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->leftjoin('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->leftjoin('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->leftjoin('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->leftjoin('tblcontractlist as contract','company.intCompanyID','contract.intCCompanyID')
        ->leftjoin('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        // ->join('tblfinalcontractfeesmatrix as finalmatrix','finalmatrix.intFCFContractListID','contract.intContractListID')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        ->where('dispatch.boolCApprovedby',1)
        ->where('dispatch.boolAApprovedby',1)
        ->where('invoice.intIDispatchTicketID','!=',null)
        ->groupby('dispatch.intDispatchTicketID')
        ->get(); 

        $dispatch4 = DB::table('tbljoborder as joborder')
        // ->join('tblservices as service','joborder.intJOServiceTypeID','service.intServicesID')
        ->leftjoin('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->leftjoin('tblpier as pier','berth.intBPierID','pier.intPierID')
        // ->join('tblbarge as barge','joborder.intJOBargeID','barge.intBargeID')
        ->leftjoin('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        // ->join('tblvessel as vessel','joborder.intJOeVesselID','vessel.intVesselID')
        ->leftjoin('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->leftjoin('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->leftjoin('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->leftjoin('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->leftjoin('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->leftjoin('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->leftjoin('tblcontractlist as contract','company.intCompanyID','contract.intCCompanyID')
        // ->join('tblfinalcontractfeesmatrix as finalmatrix','finalmatrix.intFCFContractListID','contract.intContractListID')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        ->where('dispatch.boolCApprovedby',0)
        ->where('dispatch.boolAApprovedby',1)
        ->groupby('dispatch.intDispatchTicketID')
        ->get(); 

        return view('DispatchTicket.index')
        ->with('dispatch4',$dispatch4)
        ->with('dispatch2',$dispatch2)
        ->with('dispatch',$dispatch)
        ->with('dispatch3',$dispatch3);
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
    public function show(Request $request, $id)
    {
        $validate = DB::table('tbljoborder as joborder')
        ->leftjoin('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->leftjoin('tblpier as pier','berth.intBPierID','pier.intPierID')
        ->leftjoin('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->leftjoin('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->leftjoin('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->leftjoin('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->leftjoin('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->leftjoin('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->leftjoin('tblcontractlist as contract','company.intCompanyID','contract.intCCompanyID')
        // ->join('tblfinalcontractfeesmatrix as finalmatrix','finalmatrix.intFCFContractListID','contract.intContractListID')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        ->where('dispatch.intDispatchTicketID',$request->$id)
        ->groupby('dispatch.intDispatchTicketID')
        ->get();
        
        return view('DispatchTicket.applycharge');  
        
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
        ->leftjoin('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->leftjoin('tblpier as pier','berth.intBPierID','pier.intPierID')
        ->leftjoin('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        ->leftjoin('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->leftjoin('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->leftjoin('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->leftjoin('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->leftjoin('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->leftjoin('tblcontractlist as contract','company.intCompanyID','contract.intCCompanyID')
        ->leftjoin('tblfinalcontractfeesmatrix as finalmatrix','finalmatrix.intFCFContractListID','contract.intContractListID')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        ->where('dispatch.intDispatchTicketID',$id)
        ->groupby('dispatch.intDispatchTicketID')
        ->get();
        
        $sign = DB::table('tbldispatchticket as dispatch')
        ->where('intDispatchTicketID',$id)
        ->get();
        // DB::raw('COUNT(intJobOrderID) as counter')

        $dtStarted = DB::table('tbldispatchticket as dispatch')
        ->select(array(DB::raw('tmEnded-tmStarted as timetotal')))
        ->join('tbljobsched as jobsched','jobsched.intJSDispatchTicketID','dispatch.intDispatchTicketID')
        ->where('dispatch.intDispatchTicketID',$id)
        ->groupBy('dispatch.intDispatchTicketID')
        ->get();
        $date = DB::table('tbldispatchticket as dispatch')
        ->select(array(DB::raw('dateEnded-dateStarted as date')))
        ->join('tbljobsched as jobsched','jobsched.intJSDispatchTicketID','dispatch.intDispatchTicketID')
        ->where('dispatch.intDispatchTicketID',$id)
        ->groupBy('dispatch.intDispatchTicketID')
        ->get();

        return response()->json(['dispatch'=>$dispatch,'id'=>$id,'sign'=>$sign,'dtStarted'=>$dtStarted,'date'=>$date]);    

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
        $InvoiceMax = Invoice::max('intInvoiceID')+1;
        $Invoice = new Invoice;
        $Invoice->timestamps = false;
        $Invoice->intInvoiceID = $InvoiceMax;
        $Invoice->intDTCompanyID = $request->finalize;
        $Invoice->intIDispatchTicketID = $request->dispatch;
        $Invoice->timestamps = false;
        $Invoice->strInvoiceDesc = 'processed';
        $Invoice->enumStatus = 'Processing';
        $Invoice->fltBalanceRemain = $request->total;
        $Invoice->boolDeleted = 0;
        $Invoice->save();
        
        $Charges = new Charges;
        $Charges->timestamps = false;
        $Charges->intChargeID = $InvoiceMax;
        $Charges->fltJOAmount = $request->amount;
        $Charges->fltTugboatDelayFee = $request->delay;
        $Charges->fltConsigneeViolationFee = $request->consigneeviolation;
        $Charges->fltConsigneeLateFee = $request->consigneelatefee;
        $Charges->fltConsigneeDamageFee = $request->consigneedamagefee;
        $Charges->fltCompanyDamageFee = $request->companydamagefee;
        $Charges->fltCompanyViolationFee = $request->companyviolation;
        $Charges->intDiscount = $request->discount;
        $Charges->save();

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
    public function charges()
    {
        $validate = DB::table('tbljoborder as joborder')
        ->join('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->join('tblpier as pier','berth.intBPierID','pier.intPierID')
        ->join('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->join('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblcontractlist as contract','company.intCompanyID','contract.intCCompanyID')
        // ->join('tblfinalcontractfeesmatrix as finalmatrix','finalmatrix.intFCFContractListID','contract.intContractListID')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumstatus','Finished')
        ->groupby('dispatch.intDispatchTicketID')
        ->get();
        return response()->json(['validate'=>$validate]); 
    }
    public function printPDF()
    {
 
        // $admintbs = DB::table('tbltugboat as tugboat')
        // ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        // ->join('tblcompany as company','tugboat.intTCompanyID','company.intCompanyID')
        // ->where('tugboat.boolDeleted',0)
        // ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        // ->get();  
        // $admintbs = DB::table('tbltugboat as tugboat')
        // ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        // ->join('tblcompany as company','tugboat.intTCompanyID','company.intCompanyID')
        // ->where('tugboat.boolDeleted',0)
        // ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        // ->get();  
        $pdf = PDF::loadView('DispatchTicket.printPDF')->setPaper('letter', 'landscape');;
        return $pdf->download('printPDF.pdf');

        
        
    }

}
