<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

use App\Company;
use App\ForwardRequest;
use App\JobOrder;
use App\JobSchedule;
use App\Schedules;

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
        $accepted = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('joborder.enumstatus','Accepted')
        ->where('joborder.boolDeleted',0)
        ->get();
        $joborders = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('joborder.enumstatus','Pending')
        ->where('joborder.boolDeleted',0)
        ->get();
        $forwarded = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('joborder.enumstatus','Forward Pending')
        ->where('joborder.boolDeleted',0)
        ->get();
        $forwardp = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('joborder.enumstatus','Forward Pending')
        ->where('joborder.boolDeleted',0)
        ->get();
        $forwardrequest = DB::table('tblrequest as request')
        ->join('tbljoborder as joborder','request.intRJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','request.intRCompanyID','company.intCompanyID')
        ->join('tblcompany as comp','comp.intCompanyID','joborder.intJOCompanyID')
        ->where('request.intRForwardCompanyID',Auth::user()->intUCompanyID)
        ->get();
        $forwarda = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('joborder.enumstatus','Forward Accepted')
        ->where('joborder.boolDeleted',0)
        ->get();
        $declined = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('joborder.enumstatus','Declined')
        ->where('joborder.boolDeleted',0)
        ->get();
        $affiliates = DB::table('users as user')
        ->join('tblcompany as company','user.intUCompanyID','company.intCompanyID')
        ->where('user.enumUserType','Affiliates')
        ->get();


        return view('Joborder.index',compact('accepted','forwarded','joborders','declined','forwardp','forwarda','affiliates','forwardrequest'));
        // ->with('joborders',$joborder)
        // ->with('forwarded',$forwarded);
        // return response()->json(['job'=>$accepted]);    
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
        // $joborder = JobOrder::findOrFail($request->joborderID);
        if(Auth::user()->enumUserType == 'Admin'){
            $job = JobOrder::findOrFail($request->joborderID);
            $job->timestamps = false;
            $job->enumStatus = 'Scheduled';
            $job->save();
        }elseif(Auth::user()->enumUserType == 'Affiliates'){
            $job = JobOrder::findOrFail($request->joborderID);
            $job->timestamps = false;
            $job->enumStatus = 'Forward Scheduled';
            $job->save();
        }
        
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

    public function accept($intJobOrderID)
    {
        if(Auth::user()->enumUserType == 'Admin'){
            $joborder = JobOrder::findOrFail($intJobOrderID);
            $joborder->timestamps = false;
            $joborder->enumStatus = 'Accepted';
            $joborder->save();
            return response()->json(['joborder'=>$joborder]);

        }elseif(Auth::user()->enumUserType == 'Affiliates'){
            $joborder = JobOrder::findOrFail($intJobOrderID);
            $joborder->timestamps = false;
            $joborder->enumStatus = 'Forward Accepted';
            $joborder->save();
            return response()->json(['joborder'=>$joborder]);
        }
        
    }
    public function forwardRequest($intJobOrderID)
    {
        $joborder = JobOrder::findOrFail($intJobOrderID);
        $jobs = DB::table('tbljoborder as joborder')
        ->join('tblberth as berth','berth.intBerthID','joborder.intJOBerthID')
        ->join('tblpier as pier','pier.intPierID','berth.intBPierID')
        ->join('tblgoods as goods','goods.intGoodsID','joborder.intJOGoodsID')
        ->join('tblcompany as company','company.intCompanyID','joborder.intJOCompanyID')
        ->where('joborder.boolDeleted',0)
        ->where('joborder.intJobOrderID',$intJobOrderID)
        ->get();
        $affiliates = DB::table('users as user')
        ->join('tblcompany as company','user.intUCompanyID','company.intCompanyID')
        ->where('user.enumUserType','Affiliates')
        ->get();
        $forwardrequest = DB::table('tblrequest as request')
        ->join('tbljoborder as joborder','request.intRJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','request.intRCompanyID','company.intCompanyID')
        ->where('request.intRForwardCompanyID',2)   
        ->get();
        return response()->json(['joborder'=>$joborder,'jobs'=>$jobs,'affiliates'=>$affiliates,'forwardrequest'=>$forwardrequest]);
    }
    public function forward(Request $request)
    {
        try{
            DB::beginTransaction();

            $forward = new ForwardRequest;
            $forward->strRequestDescription = $request->joborderDetails;
            $forward->enumRequestType = 'Forward JobOrder';
            $forward->intRJobOrderID = $request->joborderID;
            $forward->intRCompanyID = Auth::user()->intUCompanyID;
            $forward->intRForwardCompanyID = $request->joborderForwardCompany;
            $forward->save();

            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }
        return response()->json(['forward'=>$forward]);
    }
    public function viewdetails($intJobOrderID){
        $joborder = DB::table('tbljoborder as joborder')
        ->join('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
        ->join('tblpier as pier','berth.intBPierID','intPierID')
        ->join('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('jobOrder.intJobOrderID',$intJobOrderID)
        ->get();

        return response()->json(['joborder'=>$joborder]);
    }
    public function decline($intJobOrderID)
    {

    }
}
