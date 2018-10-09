<?php

namespace App\Http\Controllers\AffiliatesControllers;

use Illuminate\Http\Request;
use Illuminate\Response;
use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;

use App\Company;
use App\ForwardRequest;
use App\JobOrder;
use App\JoborderForwardRequests;
use App\JobSchedule;
use App\Schedules;

use DB;
use Redirect;
use Auth;

class JobOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forwardrequest = DB::table('tbljoborderforwardrequests as requests')
        ->join('tbljoborder as joborder','requests.intJOFRJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('requests.enumStatus','Pending')
        ->get();
        
        $forwarda = DB::table('tbljoborderforwardrequests as requests')
        ->join('tbljoborder as joborder','requests.intJOFRJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('requests.enumStatus','Accepted')
        ->get();

        $forwarded = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('joborder.enumstatus','Forwarded')
        ->where('joborder.boolDeleted',0)
        ->get();
        
        return view('Affiliates.JobOrders.index',compact('forwardrequest','forwarda','forwarded'));
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
        $job = JobOrderForwardRequests::findOrFail($request->joborderID);
        $job->timestamps = false;
        $job->enumStatus = 'Scheduled';
        $job->save();

        return response()->json(['joborder'=>$job]);
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
    public function accept($intJobOrderID){
        $joborder = JoborderForwardRequests::findOrFail($intJobOrderID);
        $joborder->timestamps = false;
        $joborder->enumStatus = 'Accepted';
        $joborder->save();
        $job = JobOrder::findOrFail($joborder->intJOFRJobOrderID);
        return response()->json(['joborder'=>$job]);
    }
    public function viewdetails($intJobOrderID){
        // Find The Job Order First 
        $job = JobOrder::findOrFail($intJobOrderID);

        // Compare if the BerthID is Null and if It is Not
        if($job->enumServiceType == 'Hauling'){
            if($job->intJOBerthID == null){
                $joborder = DB::table('tbljoborder as joborder')
                ->join('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
                ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
                ->where('joborder.intJobOrderID',$intJobOrderID)
                ->get();
            }else{
                $joborder = DB::table('tbljoborder as joborder')
                ->join('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
                ->join('tblpier as pier','berth.intBPierID','intPierID')
                ->join('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
                ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
                ->where('joborder.intJobOrderID',$intJobOrderID)
                ->get();
            }
        }else if($job->enumServiceType == 'Tug Assist'){
            $joborder = DB::table('tbljoborder as joborder')
            ->join('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
            ->join('tblpier as pier','berth.intBPierID','intPierID')
            // ->join('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
            ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
            ->where('joborder.intJobOrderID',$intJobOrderID)
            ->get();   
        }

        return response()->json(['joborder'=>$joborder]);   
    }
}
