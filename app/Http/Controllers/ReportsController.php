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

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admintbs = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tblcompany as company','tugboat.intTCompanyID','company.intCompanyID')
        ->where('tugboat.boolDeleted',0)
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->get(); 

        $services = DB::table('tbljoborder as joborder')
        ->select(DB::raw('distinct enumServiceType,count(distinct intJobOrderID) as Service_Count, sum(fltBalanceRemain) as servicesum ') )
        ->join('tbljobsched as jobsched', 'joborder.intJobOrderID', 'jobsched.intJSJobOrderID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->leftJoin('tblinvoice as invoice', 'dispatch.intDispatchTicketID', 'invoice.intIDispatchTicketID')
        ->where('jobsched.enumStatus','Finished')
        ->groupBy('joborder.enumServiceType')
        ->get();

        $joborders = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->join('tbljobsched as jobsched', 'joborder.intJobOrderID', 'jobsched.intJSJobOrderID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->join('tblinvoice as invoice', 'dispatch.intDispatchTicketID', 'invoice.intIDispatchTicketID')
        ->where('jobsched.enumStatus','Finished')
        ->groupBy('joborder.intJobOrderID')
        ->select(DB::raw('intJobOrderID, strCompanyName, datStartDate,tmStart, sum(fltBalanceRemain) as totaljo'))
        ->get();

        // $tugboats = DB::table('tbltugboat as tugboat')
        // ->select('strName')
        // ->join('tbltugboatmain as tbmain', 'tugboat.intTugboatID','=', 'tbmain.intTugboatMainID')
        // ->join('tbltugboatassign as assign', 'assign.intTATugboatID','=', 'tugboat.intTugboatID')
        // ->join('tbljobsched as jobsched', 'jobsched.intJSTugboatAssignID','=', 'assign.intTAssignID')
        // ->join('tbljoborder as joborder', 'joborder.intJobOrderID','=', 'jobsched.intJSJobOrderID')
        // ->where('jobsched.enumStatus','Finished')
        // ->get();

        $sales = DB::table('tblcompany as company')
        ->join('tbljoborder as joborder', 'joborder.intJOCompanyID', 'company.intCompanyID')
        ->join('tbljobsched as jobsched', 'joborder.intJobOrderID', 'jobsched.intJSJobOrderID')
        ->join('tbldispatchticket as dispatch','dispatch.intDispatchTicketID','jobsched.intJSDispatchTicketID')
        ->leftJoin('tblinvoice as invoice', 'dispatch.intDispatchTicketID', 'invoice.intIDispatchTicketID')
        ->where('jobsched.enumStatus','Finished')
        ->where('invoice.intInvoiceID', '<>', null)
        ->groupBy('invoice.intInvoiceID')
        ->select(DB::raw('strCompanyName, intInvoiceID, invoice.enumStatus, sum(fltBalanceRemain) as salessum'))
        ->get();

        $consignees = DB::table('tblcompany as company')
        ->join('tblcontractlist as contractlist', 'company.intCompanyID', 'contractlist.intCCompanyID')
        ->leftJoin('tblbalance as balance', 'balance.intBalanceID', 'company.intCompanyID')
        ->where('contractlist.enumStatus', 'Active')
        ->groupBy('company.intCompanyID')
        ->select(DB::raw('strCompanyName, datContractActive, datContractExpire, enumConValidity, enumStatus, sum(fltBalance) as fund'))
        ->get();

        // $consigneefunds = DB::table('tblcompany as company')
        // ->leftJoin('tblbalance as balance', 'balance.intBalanceID', 'company.intCompanyID')
        // ->get();

        return view('Reports.index')
        ->with('admintbs', $admintbs)
        ->with('services', $services)
        ->with('joborders', $joborders)
        // ->with('tugboats', $tugboats)
        ->with('sales', $sales)
        ->with('consignees', $consignees);
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
        $dates = explode('-',$request->date); // two dates MM/DD/YYYY-MM/DD/YYYY
        $startDate = explode('/',$dates[0]); // MM[0] DD[1] YYYY[2] 
        $finalStartDate = "$startDate[2]-$startDate[0]-$startDate[1]";
        $endDate = explode('/',$dates[1]); // MM[0] DD[1] YYYY[2] 
        $finalEndDate = "$endDate[2]-$endDate[0]-$endDate[1]";
        
        if($id == "disabledTugboats")
    {
        $data = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tblcompany as company','tugboat.intTCompanyID','company.intCompanyID')
        ->where('tugboat.updated_at', '>=', $finalEndDate)
        ->get();
        return response()->json(['data'=>$data]);
    }

    }

    public function printPDF1()
    {
        $admintbs = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tblcompany as company','tugboat.intTCompanyID','company.intCompanyID')
        ->where('tugboat.boolDeleted',0)
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->get();  

        $pdf = PDF::loadView('Reports.disabledTReportPDF', $admintbs)->setPaper('letter', 'landscape');;
        return $pdf->download('disabledtugboatreport.pdf');
    }
    public function printPDF2()
    {
        $pdf = PDF::loadView('Reports.jobOrderReportPDF')->setPaper('letter', 'landscape');;
        return $pdf->download('jobOrderReport.pdf');
    }
    public function printPDF3()
    {
        $pdf = PDF::loadView('Reports.salesReportPDF')->setPaper('letter', 'landscape');;
        return $pdf->download('salesReport.pdf');
    }
    public function printPDF4()
    {
        $pdf = PDF::loadView('Reports.soaPDF')->setPaper('letter', 'landscape');
        return $pdf->download('soa.pdf');
    }
    public function printPDF5()
    {
        $pdf = PDF::loadView('Reports.serviceReportPDF')->setPaper('letter', 'landscape');;
        return $pdf->download('serviceReport.pdf');
    }
}
