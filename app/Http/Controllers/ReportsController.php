<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Tugboat;
use App\TugboatClass;
use App\TugboatMainSpecifications;
use App\TugboatSpecifications;
use App\Company;
use App\JobOrder;
use App\JobSchedule;
use App\User;
use PDF;
use Redirect;

date_default_timezone_set('Asia/Manila');
class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admintbs = DB::select(DB::raw('
        SELECT strCompanyName,strCompanyAddress, strName, tbltugboat.enumTStatus as enumTStatus from tbltugboat 
        JOIN tbltugboatmain on tbltugboat.intTTugboatMainID = tbltugboatmain.intTugboatMainID
        JOIN tblcompany on tbltugboat.intTCompanyID= tblcompany.intCompanyID
        WHERE tbltugboat.boolDeleted = 0 AND tbltugboat.intTCompanyID ='.Auth::user()->intUCompanyID.'
        '));

        // $admintbs = DB::table('tbltugboat as tugboat')
        // ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        // ->join('tblcompany as company','tugboat.intTCompanyID','company.intCompanyID')
        // ->where('tugboat.boolDeleted',0)
        // ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        // ->get(); 

        $services = DB::select(DB::raw('
        SELECT distinct enumServiceType,count(distinct intJobOrderID) as Service_Count, sum(fltBalanceRemain) as servicesum from tbljoborder
        JOIN tblcompany on tbljoborder.intJOCompanyID = tblcompany.intCompanyID
        JOIN tbljobsched on tbljoborder.intJobOrderID=tbljobsched.intJSJobOrderID
        JOIN tbldispatchticket on tbljobsched.intJSDispatchTicketID=tbldispatchticket.intDispatchTicketID
        LEFT JOIN tblinvoice on tbldispatchticket.intDispatchTicketID=tblinvoice.intIDispatchTicketID
        WHERE tbljobsched.enumStatus= "Finished"
        GROUP BY tbljoborder.enumServiceType'));

        // $services = DB::table('tbljoborder as joborder')
        // ->select(DB::raw('distinct enumServiceType,count(distinct intJobOrderID) as Service_Count, sum(fltBalanceRemain) as servicesum ') )
        // ->join('tbljobsched as jobsched', 'joborder.intJobOrderID', 'jobsched.intJSJobOrderID')
        // ->join('tbldispatchticket as dispatchticket','jobsched.intJSDispatchTicketID','dispatchticket.intDispatchTicketID')
        // ->leftJoin('tblinvoice as invoice', 'dispatchticket.intDispatchTicketID', 'invoice.intIDispatchTicketID')
        // ->where('jobsched.enumStatus','Finished')
        // ->groupBy('joborder.enumServiceType')
        // ->get();

        $joborders = DB::select(DB::raw('
        SELECT intJobOrderID, strCompanyName, datStartDate,tmStart, datEndDate, tmEnd, dateStarted, tmStarted, dateEnded, tmEnded, tbljobsched.enumStatus as enumStatus from tbljoborder 
        JOIN tblcompany on tbljoborder.intJOCompanyID=tblcompany.intCompanyID
        JOIN tbljobsched on tbljoborder.intJobOrderID=tbljobsched.intJSJobOrderID
        LEFT JOIN tbldispatchticket on tbljobsched.intJSDispatchTicketID=tbldispatchticket.intDispatchTicketID
        LEFT JOIN tblinvoice on tbldispatchticket.intDispatchTicketID=tblinvoice.intIDispatchTicketID
        GROUP BY intJobOrderID'));
        

        // $joborders = DB::table('tbljoborder as joborder')
        // ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        // ->join('tbljobsched as jobsched', 'joborder.intJobOrderID', 'jobsched.intJSJobOrderID') 
        // ->join('tbldispatchticket as dispatchticket','jobsched.intJSDispatchTicketID','dispatchticket.intDispatchTicketID')
        // ->join('tblinvoice as invoice', 'dispatchticket.intDispatchTicketID', 'invoice.intIDispatchTicketID')
        // ->groupBy('joborder.intJobOrderID')
        // ->select(DB::raw('intJobOrderID, strCompanyName, datStartDate,tmStart, datEndDate, tmEnd, dateStarted, tmStarted, dateEnded, tmEnded, jobsched.enumStatus as enumStatus, sum(fltBalanceRemain) as totaljo'))
        // ->get();

        // $tugboats = DB::table('tbltugboat as tugboat')
        // ->select('strName')
        // ->join('tbltugboatmain as tbmain', 'tugboat.intTugboatID','=', 'tbmain.intTugboatMainID')
        // ->join('tbltugboatassign as assign', 'assign.intTATugboatID','=', 'tugboat.intTugboatID')
        // ->join('tbljobsched as jobsched', 'jobsched.intJSTugboatAssignID','=', 'assign.intTAssignID')
        // ->join('tbljoborder as joborder', 'joborder.intJobOrderID','=', 'jobsched.intJSJobOrderID')
        // ->where('jobsched.enumStatus','Finished')
        // ->get();   

        $sales = DB::select(DB::raw('
        SELECT strCompanyName, intInvoiceID, tblinvoice.enumStatus, sum(fltBalanceRemain) as salessum from tblcompany
        JOIN tbljoborder on tbljoborder.intJOCompanyID = tblcompany.intCompanyID
        JOIN tbljobsched on tbljoborder.intJobOrderID=tbljobsched.intJSJobOrderID
        JOIN tbldispatchticket on tbljobsched.intJSDispatchTicketID=tbldispatchticket.intDispatchTicketID
        LEFT JOIN tblinvoice on tbldispatchticket.intDispatchTicketID = tblinvoice.intIDispatchTicketID
        WHERE tbljobsched.enumStatus= "Finished" AND tblinvoice.intInvoiceID <> NULL 
        GROUP BY tblinvoice.intInvoiceID'));

        // $sales = DB::table('tblcompany as company')
        // ->join('tbljoborder as joborder', 'joborder.intJOCompanyID', 'company.intCompanyID')
        // ->join('tbljobsched as jobsched', 'joborder.intJobOrderID', 'jobsched.intJSJobOrderID')
        // ->join('tbldispatchticket as dispatchticket','jobsched.intJSDispatchTicketID','dispatchticket.intDispatchTicketID')
        // ->leftJoin('tblinvoice as invoice', 'dispatchticket.intDispatchTicketID', 'invoice.intIDispatchTicketID')
        // ->where('jobsched.enumStatus','Finished')
        // ->where('invoice.intInvoiceID', '<>', null)
        // ->groupBy('invoice.intInvoiceID')
        // ->select(DB::raw('strCompanyName, intInvoiceID, invoice.enumStatus, sum(fltBalanceRemain) as salessum'))
        // ->get();

        $consignees = DB::select(DB::raw('
        SELECT strCompanyName, datContractActive, datContractExpire, enumConValidity, enumStatus, sum(fltBalance) as fund FROM tblcompany
        JOIN tblcontractlist on tblcompany.intCompanyID=tblcontractlist.intCCompanyID
        LEFT JOIN tblbalance on tblbalance.intBalanceID=tblcompany.intCompanyID
        WHERE tblcontractlist.enumStatus="Active"
        GROUP BY tblcompany.intCompanyID'));


        // $consignees = DB::table('tblcompany as company')
        // ->join('tblcontractlist as contractlist', 'company.intCompanyID', 'contractlist.intCCompanyID')
        // ->leftJoin('tblbalance as balance', 'balance.intBalanceID', 'company.intCompanyID')
        // ->where('contractlist.enumStatus', 'Active')
        // ->groupBy('company.intCompanyID')
        // ->select(DB::raw('strCompanyName, datContractActive, datContractExpire, enumConValidity, enumStatus, sum(fltBalance) as fund'))
        // ->get();
        
        // $consigneefunds = DB::table('tblcompany as company')
        // ->leftJoin('tblbalance as balance', 'balance.intBalanceID', 'company.intCompanyID')
        // ->get();

        return view('Reports.index', compact('admintbs', 'services', 'joborders', 'sales', 'consignees'));
        // ->with('admintbs', $admintbs)
        // ->with('services', $services)
        // ->with('joborders', $joborders)
        // // ->with('tugboats', $tugboats)
        // ->with('sales', $sales)
        // ->with('consignees', $consignees);
        // ->with('consigneefunds', $consigneefunds);
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
        //
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

    public function datepick(Request $request)
    {
        $id = $request->id;
        $dates = explode(' - ',$request->date); // two dates MM/DD/YYYY-MM/DD/YYYY
        $startDate = explode('/',$dates[0]); // MM[0] DD[1] YYYY[2]
        $minus = $startDate[1]-1;
        $dateEnd = "$startDate[2]-$startDate[0]-$minus 23:59:59";
        $finalStartDate = "$startDate[2]-$startDate[0]-$startDate[1] 00:00:00";
        $endDate = explode('/',$dates[1]); // MM[0] DD[1] YYYY[2] 
        $finalEndDate = "$endDate[2]-$endDate[0]-$endDate[1] 23:59:59";
        
        if($id == "disabledTugboats")
    {
        $admintbs = DB::select(DB::raw('
        SELECT strCompanyName,strCompanyAddress, strName, tbltugboat.enumTStatus as enumTStatus from tbltugboat 
        JOIN tbltugboatmain on tbltugboat.intTTugboatMainID = tbltugboatmain.intTugboatMainID
        JOIN tblcompany on tbltugboat.intTCompanyID= tblcompany.intCompanyID
        WHERE tbltugboat.boolDeleted = 0 AND tbltugboat.updated_at IS NULL OR tbltugboat.updated_at BETWEEN "'.$finalStartDate.'" AND "'.$finalEndDate.'" AND tbltugboat.intTCompanyID ='.Auth::user()->intUCompanyID.'
        '));
        return response()->json(['data'=>$admintbs]);
    }
    if($id =="jobOrderReport")
    {
        $joborders = DB::select(DB::raw('
        SELECT intJobOrderID, strCompanyName, strCompanyAddress, datStartDate,tmStart, datEndDate, tmEnd, dateStarted, tmStarted, dateEnded, tmEnded, tbljobsched.enumStatus as enumStatus from tbljoborder 
        JOIN tblcompany on tbljoborder.intJOCompanyID=tblcompany.intCompanyID
        JOIN tbljobsched on tbljoborder.intJobOrderID=tbljobsched.intJSJobOrderID
        LEFT JOIN tbldispatchticket on tbljobsched.intJSDispatchTicketID=tbldispatchticket.intDispatchTicketID
        LEFT JOIN tblinvoice on tbldispatchticket.intDispatchTicketID=tblinvoice.intIDispatchTicketID
        WHERE datStartDate BETWEEN "'.$finalStartDate.'" AND "'.$finalEndDate.'"
        GROUP BY intJobOrderID'));

        return response()->json(['data'=>$joborders]);
    }
    if($id == "salesReport")
    {
        $sales = DB::select(DB::raw('
        SELECT strCompanyName, strCompanyAddress, intInvoiceID, tblinvoice.enumStatus, sum(fltBalanceRemain) as salessum from tblcompany
        JOIN tbljoborder on tbljoborder.intJOCompanyID = tblcompany.intCompanyID
        JOIN tbljobsched on tbljoborder.intJobOrderID=tbljobsched.intJSJobOrderID
        JOIN tbldispatchticket on tbljobsched.intJSDispatchTicketID=tbldispatchticket.intDispatchTicketID
        LEFT JOIN tblinvoice on tbldispatchticket.intDispatchTicketID = tblinvoice.intIDispatchTicketID
        WHERE tbljobsched.enumStatus= "Finished" AND tblinvoice.intInvoiceID <> NULL AND tblinvoice.created_at BETWEEN "'.$finalStartDate.'" AND "'.$finalEndDate.'"
        GROUP BY tblinvoice.intInvoiceID'));

        return response()->json(['data'=>$sales]);
    }
    if($id == "statementOfAccount")
    {
        $consignees = DB::select(DB::raw('
        SELECT strCompanyName, strCompanyAddress, datContractActive, datContractExpire, enumConValidity, enumStatus, sum(fltBalance) as fund FROM tblcompany
        JOIN tblcontractlist on tblcompany.intCompanyID=tblcontractlist.intCCompanyID
        LEFT JOIN tblbalance on tblbalance.intBalanceID=tblcompany.intCompanyID
        WHERE tblcontractlist.enumStatus="Active" AND datContractActive BETWEEN "'.$finalStartDate.'" AND "'.$finalEndDate.'"
        GROUP BY tblcompany.intCompanyID'));

        return response()->json(['data'=>$consignees]);
    }
    if($id == "serviceReport")
    {
        $services = DB::select(DB::raw('
        SELECT distinct enumServiceType,count(distinct intJobOrderID) as Service_Count, sum(fltBalanceRemain) as servicesum from tbljoborder
        JOIN tblcompany on tbljoborder.intJOCompanyID = tblcompany.intCompanyID
        JOIN tbljobsched on tbljoborder.intJobOrderID=tbljobsched.intJSJobOrderID
        JOIN tbldispatchticket on tbljobsched.intJSDispatchTicketID=tbldispatchticket.intDispatchTicketID
        LEFT JOIN tblinvoice on tbldispatchticket.intDispatchTicketID=tblinvoice.intIDispatchTicketID
        WHERE tbljobsched.enumStatus= "Finished" AND tbljoborder.datStartDate BETWEEN "'.$finalStartDate.'" AND "'.$finalEndDate.'"
        GROUP BY tbljoborder.enumServiceType'));

        return response()->json(['data'=>$services]);
    }

    }

    public function printPDF1(Request $request)
    {
        $id = $request->id;
        $timestamp = time();
        $mytime = date("F d, Y h:i:s A", $timestamp);

        $admintbs = DB::select(DB::raw('
        SELECT strCompanyName,strCompanyAddress, strName, tbltugboat.enumTStatus as enumTStatus from tbltugboat 
        JOIN tbltugboatmain on tbltugboat.intTTugboatMainID = tbltugboatmain.intTugboatMainID
        JOIN tblcompany on tbltugboat.intTCompanyID= tblcompany.intCompanyID
        WHERE tbltugboat.boolDeleted = 0 AND tbltugboat.intTCompanyID ='.Auth::user()->intUCompanyID.'
        '));
        

        $pdf = PDF::loadView('Reports.disabledTReportPDF', compact('mytime','admintbs'))->setPaper('letter', 'landscape');;
        return $pdf->download('disabledtugboatreport.pdf');
    }
    public function printPDF2(Request $request)
    {
        $id = $request->id;
        $timestamp = time();
        $mytime = date("F d, Y h:i:s A", $timestamp);

        $admintbs = DB::select(DB::raw('
        SELECT strCompanyName,strCompanyAddress, strName, tbltugboat.enumTStatus as enumTStatus from tbltugboat 
        JOIN tbltugboatmain on tbltugboat.intTTugboatMainID = tbltugboatmain.intTugboatMainID
        JOIN tblcompany on tbltugboat.intTCompanyID= tblcompany.intCompanyID
        WHERE tbltugboat.boolDeleted = 0 AND tbltugboat.intTCompanyID ='.Auth::user()->intUCompanyID.'
        '));

        $joborders = DB::select(DB::raw('
        SELECT intJobOrderID, strCompanyName, strCompanyAddress, datStartDate,tmStart, datEndDate, tmEnd, dateStarted, tmStarted, dateEnded, tmEnded, tbljobsched.enumStatus as enumStatus from tbljoborder 
        JOIN tblcompany on tbljoborder.intJOCompanyID=tblcompany.intCompanyID
        JOIN tbljobsched on tbljoborder.intJobOrderID=tbljobsched.intJSJobOrderID
        LEFT JOIN tbldispatchticket on tbljobsched.intJSDispatchTicketID=tbldispatchticket.intDispatchTicketID
        LEFT JOIN tblinvoice on tbldispatchticket.intDispatchTicketID=tblinvoice.intIDispatchTicketID
        GROUP BY intJobOrderID'));

        $pdf = PDF::loadView('Reports.jobOrderReportPDF', compact('mytime','admintbs','joborders'))->setPaper('letter', 'landscape');;
        return $pdf->download('jobOrderReport.pdf');
    }
    public function printPDF3(Request $request)
    {
        $id = $request->id;
        $timestamp = time();
        $mytime = date("F d, Y h:i:s A", $timestamp);

        $admintbs = DB::select(DB::raw('
        SELECT strCompanyName,strCompanyAddress, strName, tbltugboat.enumTStatus as enumTStatus from tbltugboat 
        JOIN tbltugboatmain on tbltugboat.intTTugboatMainID = tbltugboatmain.intTugboatMainID
        JOIN tblcompany on tbltugboat.intTCompanyID= tblcompany.intCompanyID
        WHERE tbltugboat.boolDeleted = 0 AND tbltugboat.intTCompanyID ='.Auth::user()->intUCompanyID.'
        '));

        $sales = DB::select(DB::raw('
        SELECT strCompanyName, strCompanyAddress, intInvoiceID, tblinvoice.enumStatus, sum(fltBalanceRemain) as salessum from tblcompany
        JOIN tbljoborder on tbljoborder.intJOCompanyID = tblcompany.intCompanyID
        JOIN tbljobsched on tbljoborder.intJobOrderID=tbljobsched.intJSJobOrderID
        JOIN tbldispatchticket on tbljobsched.intJSDispatchTicketID=tbldispatchticket.intDispatchTicketID
        LEFT JOIN tblinvoice on tbldispatchticket.intDispatchTicketID = tblinvoice.intIDispatchTicketID
        WHERE tbljobsched.enumStatus= "Finished" AND tblinvoice.intInvoiceID <> NULL 
        GROUP BY tblinvoice.intInvoiceID'));

        $pdf = PDF::loadView('Reports.salesReportPDF', compact('mytime','admintbs','sales'))->setPaper('letter', 'landscape');;
        return $pdf->download('salesReport.pdf');
    }
    public function printPDF4(Request $request)
    {
        $id = $request->id;
        $timestamp = time();
        $mytime = date("F d, Y h:i:s A", $timestamp);
        
        $admintbs = DB::select(DB::raw('
        SELECT strCompanyName,strCompanyAddress, strName, tbltugboat.enumTStatus as enumTStatus from tbltugboat 
        JOIN tbltugboatmain on tbltugboat.intTTugboatMainID = tbltugboatmain.intTugboatMainID
        JOIN tblcompany on tbltugboat.intTCompanyID= tblcompany.intCompanyID
        WHERE tbltugboat.boolDeleted = 0 AND tbltugboat.intTCompanyID ='.Auth::user()->intUCompanyID.'
        '));

        $consignees = DB::select(DB::raw('
        SELECT strCompanyName, strCompanyAddress, datContractActive, datContractExpire, enumConValidity, enumStatus, sum(fltBalance) as fund FROM tblcompany
        JOIN tblcontractlist on tblcompany.intCompanyID=tblcontractlist.intCCompanyID
        LEFT JOIN tblbalance on tblbalance.intBalanceID=tblcompany.intCompanyID
        WHERE tblcontractlist.enumStatus="Active"
        GROUP BY tblcompany.intCompanyID'));

        $pdf = PDF::loadView('Reports.soaPDF', compact('mytime','admintbs','consignees'))->setPaper('letter', 'landscape');
        return $pdf->download('soa.pdf');
    }
    public function printPDF5(Request $request)
    {   
        $id = $request->id;
        $timestamp = time();
        $mytime = date("F d, Y h:i:s A", $timestamp);
        
        $admintbs = DB::select(DB::raw('
        SELECT strCompanyName,strCompanyAddress, strName, tbltugboat.enumTStatus as enumTStatus from tbltugboat 
        JOIN tbltugboatmain on tbltugboat.intTTugboatMainID = tbltugboatmain.intTugboatMainID
        JOIN tblcompany on tbltugboat.intTCompanyID= tblcompany.intCompanyID
        WHERE tbltugboat.boolDeleted = 0 AND tbltugboat.intTCompanyID ='.Auth::user()->intUCompanyID.'
        '));

        $services = DB::select(DB::raw('
        SELECT distinct enumServiceType,count(distinct intJobOrderID) as Service_Count, sum(fltBalanceRemain) as servicesum from tbljoborder
        JOIN tblcompany on tbljoborder.intJOCompanyID = tblcompany.intCompanyID
        JOIN tbljobsched on tbljoborder.intJobOrderID=tbljobsched.intJSJobOrderID
        JOIN tbldispatchticket on tbljobsched.intJSDispatchTicketID=tbldispatchticket.intDispatchTicketID
        LEFT JOIN tblinvoice on tbldispatchticket.intDispatchTicketID=tblinvoice.intIDispatchTicketID
        WHERE tbljobsched.enumStatus= "Finished"
        GROUP BY tbljoborder.enumServiceType'));

        $pdf = PDF::loadView('Reports.serviceReportPDF', compact('mytime','admintbs','services'))->setPaper('letter', 'landscape');;
        return $pdf->download('serviceReport.pdf');
    }
}
