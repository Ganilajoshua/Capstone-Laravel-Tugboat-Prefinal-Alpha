<?php

namespace App\Http\Controllers\ConsigneeControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Tugboat;
use App\TugboatMainSpecifications;
use App\TeamAssignment;
use App\JobOrder;
use App\JobSchedule;
use App\Schedules;
use App\Bill;
use App\Company;
use App\Balance;
use App\Invoice;
use App\Cheque;
use Redirect;
use Auth;
use DB;
class CPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Bill = Bill::max('intBillID')+1;
        $dispatch = DB::table('tbljoborder as joborder')
        // ->join('tblservices as service','joborder.intJOServiceTypeID','service.intServicesID')
        ->leftjoin('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->leftjoin('tblpier as pier','berth.intBPierID','pier.intPierID')
        // ->join('tblbarge as barge','joborder.intJOBargeID','barge.intBargeID')
        ->leftjoin('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        // ->join('tblvessel as vessel','joborder.intJOeVesselID','vessel.intVesselID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->leftjoin('tblbalance as balance','balance.intBalanceID','company.intCompanyID')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->join('tbltugboatassign as tugboatassign','jobsched.intJSTugboatAssignID','tugboatassign.intTAssignID')
        ->join('tbltugboat as tugboat','tugboatassign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice','invoice.intIDispatchTicketID','dispatch.intDispatchTicketID')
        ->where('company.intCompanyID',Auth::user()->intUCompanyID)
        ->where('invoice.intIBillID',$Bill)
        ->groupby('dispatch.intDispatchTicketID')
        ->get();
        error_log($dispatch);
        error_log('$dispatch');
        // $Company = Company::findOrFail(Auth::user()->intUCompanyID);
        $Company = DB::table('tblcompany as company')
        ->join('tblbalance as balance','company.intCompanyID','balance.intBalanceID')
        ->where('company.intCompanyID',Auth::user()->intUCompanyID)
        ->get();
        error_log($Company);

        $amount = DB::table('tblinvoice')
        ->where('intIBillID',$Bill)
        ->sum('fltBalanceRemain');

        // $Bill = Invoice::findOrFail($intBillID);
        $Results = DB::table('tblinvoice as invoice')
        ->leftjoin('tblcharges as charges','invoice.intInvoiceID','charges.intChargeID')
        ->where('intIBillID',$Bill)
        ->get();
        $Counter = DB::table('tblinvoice as invoice')
        ->select(DB::raw('count(intIBillID) as counter'))
        ->join('tblcharges as charges','invoice.intInvoiceID','charges.intChargeID')
        ->where('intIBillID',$Bill)
        ->get();

        return view('Consignee.Payment.index')
        ->with('Bill',$Bill)
        ->with('dispatch',$dispatch)
        ->with('Company',$Company)
        ->with('amount',$amount)
        ->with('Counter',$Counter)
        ->with('Results',$Results);
        
        // return response()->json(['dispatch'=>$dispatch, 'dispatch2'=>$dispatch2]);  
        
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
        $Bill = new Bill;
        // $Bill = Bill::findOrFail($request->BillID);
        $Bill->intBillID = $request->BillID;
        $Bill->enumStatus = 'Pending';
        $Bill->timestamps = false;
        // Carbon::parse($request->ChequeDate)->format('Y/m/d');
        // $counter = $request->ChequeNum;
        // $counter = (array)$request->ChequeNum;

        $Bill->save();
        $a = $request->Balance;
        error_log(count($request->ChequeNum));
        for($count = 0; $count <= count($request->ChequeNum); $count++)
        {
                $Cheque = new Cheque;
                $Cheque->timestamps = false;
                $Cheque->intChequeID = $request->ChequeNum[$count];
                error_log($request->ChequeNum[$count]);  
                // $Cheque->strTugboatInsuranceDesc = $request->insurances[$count];
                $Cheque->intCBillID = $request->BillID;
                error_log($request->BillID);
                $Cheque->dtPayment = $request->ChequeDate;
                error_log($request->ChequeDate);
                $Cheque->intAmount = $request->ChequeAmount[$count];
                error_log($request->ChequeAmount[$count]);
                $Cheque->strMemo = $request->ChequeMemo[$count];
                // $a = $a + $request->ChequeAmount[$count];
                $Cheque->save();
        }
            
            // $remains = $a - $request->Fee;
            // $Balance = Balance::findOrFail(Auth::user()->intUCompanyID);
            // $Balance->fltBalance = $remains;
            // $Balance->timestamps = false;
            // error_log($Balance);
            // $Balance->save();
        // $Balance = 
        return response()->json(['Bill'=>$Bill,'Cheque'=>$Cheque,'Balance'=>$Balance]);  
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

    public function info($intBillID)
    {
        $Bill = Invoice::findOrFail($intBillID);
        $Results = DB::table('tblinvoice as invoice')
        ->join('tblcharges as charges','invoice.intInvoiceID','charges.intChargeID')
        ->where('intChargeID',$intBillID)
        ->get();
        // $Counter = DB::table('tblinvoice as invoice')
        // ->select(DB::raw('count(intIBillID) as counter'))
        // ->join('tblcharges as charges','invoice.intInvoiceID','charges.intChargeID')
        // ->where('intIBillID',$intBillID)
        // ->get();

        // $JOAmount = DB::table('tblinvoice as invoice')
        // ->join('tblcharges as charges','invoice.intInvoiceID','charges.intChargeID')
        // ->where('intIBillID',$intBillID)
        // ->sum('fltJOAmount');

        return response()->json(['Bill'=>$Bill, 
        'Results'=>$Results]);    
        
    }
}
