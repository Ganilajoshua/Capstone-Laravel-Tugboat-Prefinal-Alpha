<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Tugboat;
use App\TugboatMainSpecifications;
use App\TeamAssignment;
use App\JobOrder;
use App\JobSchedule;
use App\Schedules;
use Redirect;
use Auth;
use DB;

class TugboatAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugboat = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatmain as main','tugboat.intTugboatID','main.intTugboatMainID')
        ->join('tbltugboatassign as assign','tugboat.intTugboatID','assign.intTATugboatID')
        ->where('assign.boolDeleted',0)
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->orderBy('assign.enumStatus','ASC')
        ->get();
        $available = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatmain as main','tugboat.intTugboatID','main.intTugboatMainID')
        ->join('tbltugboatassign as assign','tugboat.intTugboatID','assign.intTATugboatID')
        ->where('assign.boolDeleted',0)
        ->where('assign.enumStatus','Available')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->get();
        $scheduledjob = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('enumStatus','Scheduled')
        ->get();
        $scheduledfjob = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('enumStatus','Scheduled')
        ->get();
        $notugboat = DB::table('tbljoborder as joborder')
        ->leftjoin('tbljobsched as sched','sched.intJSJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','company.intCompanyID','joborder.intJOCompanyID')
        ->where('joborder.enumStatus','Scheduled')
        ->where('sched.intJobSchedID',null)
        ->get();
        $noftugboat = DB::table('tbljoborder as joborder')
        ->leftjoin('tbljobsched as sched','sched.intJSJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','company.intCompanyID','joborder.intJOCompanyID')
        ->where('joborder.enumStatus','Forward Scheduled')
        ->where('sched.intJobSchedID',null)
        ->get();
        $joborder = DB::table('tbljobsched as sched')
        ->join('tbljoborder as joborder','sched.intJSJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('sched.intJSTugboatAssignID', null)
        ->get();
        // $jobschedule = JobOrder::where('enumStatus','Ready')->get();
        $jobschedule = DB::table('tbljoborder as joborder','sched.intJSJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        // ->select('joborder.')
        ->where('joborder.enumStatus','Ready')
        ->get(); 
        return view('TugboatAssignment.index',
        compact('tugboat','available','joborder','scheduledjob','jobschedule','notugboat','noftugboat'));
        // return response()->json([$notugboat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Request
     */
    public function create(Request $request)
    {
        try{
            DB::beginTransaction();
            $joborder = JobOrder::findOrFail($request->jobOrderID);
            $jobID = $joborder->intJobOrderID;
            
            $joborder->timestamps = false;
            if(Auth::user()->enumUserType == 'Admin'){
                $joborder->enumStatus = 'Ready';
            }elseif(Auth::user()->enumUserType == 'Affiliates'){
                $joborder->enumStatus = 'Forward Ready';
            }
            $joborder->save();
    
            $scheduleID = Schedules::max('intScheduleID') + 1 ;
            $schedID = $scheduleID;     
            
            $schedule = new Schedules;
            $schedule->timestamps = false;
            $schedule->intScheduleID = $schedID;
            $schedule->intScheduleCompanyID = Auth::user()->intUCompanyID;
            $schedule->strScheduleDesc = $joborder->strJODesc;
            $schedule->dateStart = $joborder->datStartDate;
            $schedule->dateEnd = $joborder->datEndDate;
            $schedule->tmStart = $joborder->tmStart;
            $schedule->tmEnd = $joborder->tmEnd;
            $schedule->strColor = $request->colorIndicator;
            $schedule->save();
            
            for($count=0; $count < count($request->tugboatsID); $count++){
                
                $tugboatassign = TeamAssignment::findOrFail($request->tugboatsID[$count]);
                $tugboatassign->timestamps = false;
                $tugboatassign->save();
                
                $jobsched = new JobSchedule;
                $jobsched->timestamps = false;
                $jobsched->intJSSchedID = $schedID;
                $jobsched->intJSJobOrderID = $jobID;
                $jobsched->intJSTugboatAssignID = $request->tugboatsID[$count];
                $jobsched->enumStatus = 'Pending';
                $jobsched->save();
            }
            DB::commit();
           
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        } 
        return response()->json([$joborder]);
        
    
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
    public function hauling(Request $request){
        if(Auth::user()->enumUserType == 'Admin'){
            $joborder = JobOrder::findOrFail($request->joborderID);
            $joborder->timestamps = false;
            $joborder->enumStatus = 'Ready To Haul';
            $joborder->save();
            return response()->json(['joborder'=>$joborder]);

            $jobsched = JobSchedule::where('intJSJobOrderID',$request->joborderID)->get();

            for($count = 0; $count < count($jobsched); $count++){
                $job = JobSchedule::findOrFail($jobsched[$counter]->intJobSchedID);
                $job->enumStatus = 'Pending';
                $job->save(); 
            }
        }elseif(Auth::user()->enumUserType == 'Affiliates'){
            $joborder = JobOrder::findOrFail($request->joborderID);
            $joborder->timestamps = false;
            $joborder->enumStatus = 'Forward Ready To Haul';
            $joborder->save();
            return response()->json(['joborder'=>$joborder]);
        }

    }
    public function showjoborder($intJobOrderID){
        // Find Job Order ID
        $job = JobOrder::findOrFail($intJobOrderID);
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
        // Get All Tugboats Available 
        $tugboats = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatmain as main','tugboat.intTugboatID','main.intTugboatMainID')
        ->join('tbltugboatassign as assign','tugboat.intTugboatID','assign.intTATugboatID')
        ->where('assign.boolDeleted',0)
        // ->where('assign.enumStatus')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->get();
        return response()->json(['joborder'=>$joborder,'tugboats'=>$tugboats]);
        
    }
    public function available(Request $request)
    {
        $available = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatmain as main','tugboat.intTugboatID','main.intTugboatMainID')
        ->join('tbltugboatassign as assign','tugboat.intTugboatID','assign.intTATugboatID')
        ->where('assign.boolDeleted',0)
        ->where('assign.enumStatus','Available')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->get();
        
        return response()->json(['available'=>$available]);
    }

    public function tugboatsavailable(Request $request){
        $unavailable = DB::table('tbljobsched as jobsched')
        ->join('tbltugboatassign as assign','jobsched.intJSTugboatAssignID','assign.intTAssignID')
        ->join('tblschedule as schedule','jobsched.intJSSchedID','schedule.intScheduleID')
        ->join('tbltugboat as tugboat','assign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTugboatID','main.intTugboatMainID')
        ->where('schedule.datScheduleDate',$request->date)
        ->get();
        
        $available = DB::table('tbljobsched as jobsched')
        ->join('tbltugboatassign as assign','jobsched.intJSTugboatAssignID','assign.intTAssignID')
        ->join('tblschedule as schedule','jobsched.intJSSchedID','schedule.intScheduleID')
        ->join('tbltugboat as tugboat','assign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->where('schedule.datScheduleDate','!=',$request->date)
        ->where('assign.intTACompanyID',Auth::user()->intUCompanyID)
        ->get();
        return response()->json(['unavailable'=>$unavailable,'available'=>$available]);
    }

}
