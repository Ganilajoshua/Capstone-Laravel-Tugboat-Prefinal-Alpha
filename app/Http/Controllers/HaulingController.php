<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Hauling;    
use App\JobOrder;
use App\JobSchedule;
use App\Schedule;
use App\Employees;
use DB;
use Auth;

class HaulingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joborder = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','company.intCompanyID','joborder.intJOCompanyID')
        ->where('joborder.enumStatus','Ready to Haul')
        ->where('joborder.boolDeleted',0)
        ->get();
        $ongoingjob = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','company.intCompanyID','joborder.intJOCompanyID')
        ->join('tbljobsched as jobsched','jobsched.intJSJobOrderID','intJobOrderID')
        ->where('joborder.enumStatus','Ongoing')
        ->where('joborder.boolDeleted',0)
        ->get();
        $joborderf = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','company.intCompanyID','joborder.intJOCompanyID')
        ->where('joborder.enumStatus','Forward Ready to Haul')
        ->where('joborder.boolDeleted',0)
        ->get();
        $ongoingjobf = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','company.intCompanyID','joborder.intJOCompanyID')
        ->where('joborder.enumStatus','Forward Ongoing')
        ->where('joborder.boolDeleted',0)
        ->get(); 
        $pendingjobs = DB::table('tbljobsched as jobsched')
        ->join('tbljoborder as joborder','joborder.intJobOrderID','intJSJobOrderID')
        ->join('tblcompany as company','company.intCompanyID','joborder.intJOCompanyID')
        ->where('jobsched.enumStatus','Pending')
        ->groupBy('jobsched.intJSJobOrderID')
        ->get();
        $ongoingjobs = DB::table('tbljobsched as jobsched')
        ->join('tbljoborder as joborder','joborder.intJobOrderID','intJSJobOrderID')
        ->join('tblcompany as company','company.intCompanyID','joborder.intJOCompanyID')
        ->where('jobsched.enumStatus','Ongoing')
        ->groupBy('jobsched.intJSJobOrderID')
        ->get();
        // JobOrder::where('boolDeleted',0)
        
        // ->where('enumStatus','Ready To Haul')
        // ->get();
        return view ('Hauling.index',compact('joborder','ongoingjob','joborderf','ongoingjobf','pendingjobs','ongoingjobs'));
        // return response()->json(['pendingjobs'=>$pendingjobs]);
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
    public function show($intJobOrderID)
    {
        $jobscheds = DB::table('tbljobsched as jobsched')
        ->join('tbljoborder as joborder','joborder.intJobOrderID','intJSJobOrderID')
        ->join('tbltugboatassign as assign','jobsched.intJSTugboatAssignID','assign.intTAssignID')
        ->join('tbltugboat as tugboat','tugboat.intTugboatID','intTATugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tblcompany as company','company.intCompanyID','joborder.intJOCompanyID')
        ->leftjoin('tblteam as team','team.intTeamID','assign.intTATeamID')
        ->where('jobsched.intJSJobOrderID',$intJobOrderID)
        ->get();
        $job = JobOrder::findOrFail($intJobOrderID);

        // if($job->intJOGoodsID != null){
        //     $joborder = DB::table('tbljoborder as joborder')
        //     ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        //     ->join('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
        //     ->where('intJobOrderID',$intJobOrderID)
        //     ->get();
        
        // }else{
        //     $joborder = DB::table('tbljoborder as joborder')
        //     ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        //     ->where('intJobOrderID',$intJobOrderID)
        //     ->get();
        // }
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
        
        return response()->json(['jobsched'=>$jobscheds,'joborder'=>$joborder]);
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
    public function start(Request $request){
        $joborder = JobOrder::findOrFail($request->joborderID);
        $joborder->timestamps = false;
        if(Auth::user()->enumUserType == 'Admin'){
            $joborder->enumStatus = 'Ongoing';
        }elseif(Auth::user()->enumUserType == 'Affiliates'){
            $joborder->enumStatus = 'Forward Ongoing';
        }
        $joborder->save();

        $jobsched = JobSchedule::where('intJSJobOrderID',$request->joborderID)->get();
        for($count = 0; $count < count ($jobsched); $count++){
            $jobschedule = JobSchedule::findOrFail($jobsched[$count]->intJobSchedID);
            $jobschedule->timestamps = false;
            $jobschedule->dateStarted = $request->startDate;
            $jobschedule->tmStarted = $request->startTime;
            $jobschedule->enumStatus = 'Ongoing';
            $jobschedule->save();
        }
    }
    public function terminate(Request $request){

        $joborder = JobOrder::findOrFail($request->joborderID);
        $joborder->timestamps = false;
        if(Auth::user()->enumUserType == 'Admin'){
            $joborder->enumStatus = 'Finished';
        }elseif(Auth::user()->enumUserType == 'Affiliates'){
            $joborder->enumStatus = 'Forward Finished';
        }
        $joborder->save();
        
        $jobsched = JobSchedule::where('intJSJobOrderID',$request->joborderID)->get();
        for($count = 0; $count < count ($jobsched); $count++){
            $jobschedule = JobSchedule::findOrFail($jobsched[$count]->intJobSchedID);
            $jobschedule->timestamps = false;
            $jobschedule->dateEnded = $request->endDate;
            $jobschedule->tmEnded = $request->endTime;
            $jobschedule->enumStatus = 'Finished';
            $jobschedule->save();
        }
    }
    public function showteam(Request $request){
        $teams = [];
        for($counter = 0; $counter < count($request->teamID); $counter++){
            $employees = DB::table('tblemployee as employee')
            ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
            ->where('intETeamID',$request->teamID[$counter])
            ->get();
            // Employees::where('intETeamID',$request->teamID[$counter])->get();
            $teams[$counter] = $employees;
        }
        return response()->json(['teams'=>$teams]);
    }
}
