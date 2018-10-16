<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Tugboat;
use App\TugboatClass;
use App\TugboatInsurances;
use App\TugboatSpecifications;
use App\TugboatMainSpecifications;

use App\TeamAssignment;
use App\JobOrder;
use App\JoborderForwardRequests;
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
        // $tugboat = DB::table('tbltugboat as tugboat')
        // ->join('tbltugboatmain as main','tugboat.intTugboatID','main.intTugboatMainID')
        // ->join('tbltugboatassign as assign','tugboat.intTugboatID','assign.intTATugboatID')
        // ->where('assign.boolDeleted',0)
        // ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        // ->orderBy('assign.enumStatus','ASC')
        // ->get();
        // Get Available Tugboats
        $availtugboat = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbltugboatspecs as specs','tugboat.intTTugboatSpecsID','specs.intTugboatSpecsID')
        ->join('tbltugboatclass as class','tugboat.intTTugboatClassID','class.intTugboatClassID')
        ->leftjoin('tbltugboatinsurance as insurance','tugboat.intTugboatID','insurance.intTITugboatID')
        ->where('insurance.intTugboatInsuranceID','!=', NULL)
        ->where('class.enumISMCodeStandard','YES')
        ->where('class.enumISPSCodeCompliance','YES')
        ->where('specs.enumAISGPSVHFRadar','YES')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->groupBy('tugboat.intTugboatID')
        ->get();

        $distugboat = DB::table('tbltugboat as tugboat')
        // ->leftjoin('tbltugboatinsurance as insurance','tugboat.intTugboatID','insurance.intTITugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbltugboatspecs as specs','tugboat.intTTugboatSpecsID','specs.intTugboatSpecsID')
        ->join('tbltugboatclass as class','tugboat.intTTugboatClassID','class.intTugboatClassID')
        ->leftjoin('tbltugboatinsurance as insurance','tugboat.intTugboatID','insurance.intTITugboatID')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->where(function($query){
            $query->where('insurance.intTugboatInsuranceID',null)
            ->orWhere('specs.enumAISGPSVHFRadar','No')
            ->orWhere('class.enumISMCodeStandard','No')
            ->orWhere('class.enumISPSCodeCompliance','No');
        })
        ->groupBy('tugboat.intTugboatID')
        ->get();

        // $available = DB::table('tbltugboat as tugboat')
        // ->join('tbltugboatmain as main','tugboat.intTugboatID','main.intTugboatMainID')
        // ->join('tbltugboatassign as assign','tugboat.intTugboatID','assign.intTATugboatID')
        // ->where('assign.boolDeleted',0)
        // ->where('assign.enumStatus','Available')
        // ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        // ->get();
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
        ->groupBy('joborder.intJobOrderID')
        ->get();
        // $noftugboat = DB::table('tbljoborder as joborder')
        // ->get();
        $noftugboat = DB::table('tbljoborderforwardrequests as requests')
        ->join('tbljoborder as joborder','requests.intJOFRJobOrderID','joborder.intJobOrderID')
        ->leftjoin('tbljobsched as sched','sched.intJSJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','company.intCompanyID','joborder.intJOCompanyID')
        ->where('sched.intJobSchedID',null)
        ->where('requests.enumStatus','Scheduled')
        // ->leftjoin('tbljobsched as sched','sched.intJSJobOrderID','joborder.intJobOrderID'
        ->get();

        $joborder = DB::table('tbljobsched as sched')
        ->join('tbljoborder as joborder','sched.intJSJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('sched.intJSTugboatAssignID', null)
        ->get();
        // $jobschedule = JobOrder::where('enumStatus','Ready')->get();
        $jobschedule = DB::table('tbljoborder as joborder')
        ->join('tbljobsched as sched','sched.intJSJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('joborder.enumStatus','Ready')
        ->groupBy('sched.intJSJobOrderID')
        ->get(); 

        $jobschedulef = DB::table('tbljoborder as joborder')
        ->join('tbljobsched as sched','sched.intJSJobOrderID','joborder.intJobOrderID')
        ->join('tbljoborderforwardrequests as requests','joborder.intJobOrderID','requests.intJOFRJobOrderID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('requests.enumStatus','Ready')
        ->groupBy('requests.intJOFRJobOrderID')
        ->get(); 

        $tugboatsreceived = DB::table('tbltugboatassign as assign')
        ->join('tbltugboat as tugboat','assign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tblcompany as company','company.intCompanyID','assign.intTACompanyID')
        ->where('intTAForwardCompanyID',Auth::user()->intUCompanyID)
        ->get();

        return view('TugboatAssignment.index',
        compact('tugboat','availtugboat','joborder','scheduledjob','jobschedule','notugboat','noftugboat','jobschedulef','distugboat','tugboatsreceived'));
        return response()->json([$notugboat]);
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
            if(Auth::user()->enumUserType == 'Admin'){
                $joborder = JobOrder::findOrFail($request->jobOrderID);
                $jobID = $joborder->intJobOrderID;    
                $joborder->timestamps = false;
                $joborder->enumStatus = 'Ready';
                $joborder->save();
            }elseif(Auth::user()->enumUserType == 'Affiliates'){
                $joborder = JobOrder::findOrFail($request->jobOrderID);
                $getjoborder = JoborderForwardRequests::where('intJOFRJobOrderID',$request->jobOrderID)->get();
                $joborders = JoborderForwardRequests::findOrFail($getjoborder[0]->intJOForwardRequestsID);
                $jobID = $getjoborder[0]->intJOFRJobOrderID; 
                $joborders->timestamps = false;
                $joborders->enumStatus = 'Ready';
                $joborders->save();
            }
    
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
                
                // $tugboatassign = Tugboat::findOrFail($request->tugboatsID[$count]);
                // $tugboatassign->timestamps = false;
                // $tugboatassign->save();
                
                $jobsched = new JobSchedule;
                $jobsched->timestamps = false;
                $jobsched->intJSSchedID = $schedID;
                $jobsched->intJSJobOrderID = $jobID;
                $jobsched->intJSTugboatAssignID = $request->tugboatsID[$count];
                $jobsched->intJSTugboatID = $request->tugboatsID[$count];
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
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbltugboatspecs as specs','tugboat.intTTugboatSpecsID','specs.intTugboatSpecsID')
        ->join('tbltugboatclass as class','tugboat.intTTugboatClassID','class.intTugboatClassID')
        ->leftjoin('tbltugboatinsurance as insurance','tugboat.intTugboatID','insurance.intTITugboatID')
        ->where('insurance.intTugboatInsuranceID','!=', NULL)
        ->where('class.enumISMCodeStandard','YES')
        ->where('class.enumISPSCodeCompliance','YES')
        ->where('specs.enumAISGPSVHFRadar','YES')
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->groupBy('tugboat.intTugboatID')
        ->get();

        // $available 
        // $tugboats = DB::table('tbltugboat as tugboat')
        // ->join('tbltugboatmain as main','tugboat.intTugboatID','main.intTugboatMainID')
        // ->join('tbltugboatassign as assign','tugboat.intTugboatID','assign.intTATugboatID')
        // ->where('assign.boolDeleted',0)
        // ->where('assign.enumStatus')
        // ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        // ->get();
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

    public function showassignedjoborders($intTugboatID){
        $tugboat = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbltugboatspecs as specs','tugboat.intTTugboatSpecsID','specs.intTugboatSpecsID')
        ->join('tbltugboatclass as class','tugboat.intTTugboatClassID','class.intTugboatClassID')
        ->where('tugboat.intTugboatID',$intTugboatID)
        ->get();

        $assigned = DB::table('tbljobsched as jobsched')
        ->join('tblschedule as schedule','jobsched.intJSSchedID','schedule.intScheduleID')
        ->join('tbljoborder as joborder','jobsched.intJSJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('jobsched.intJSTugboatID',$intTugboatID)
        ->get();



        // DB::table('tbltugboat as tugboat')
        // ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        // ->join('tbltugboatspecs as specs','tugboat.intTTugboatSpecsID','specs.intTugboatSpecsID')
        // ->join('tbltugboatclass as class','tugboat.intTTugboatClassID','class.intTugboatClassID')
        // ->leftjoin('tbltugboatinsurance as insurance','tugboat.intTugboatID','insurance.intTITugboatID')
        // ->get();

        return response()->json(['tugboat'=>$tugboat,'assigned'=>$assigned]);
    }

    public function showtugboatinformation($intTugboatID){
        $tugboat = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbltugboatclass as class','tugboat.intTTugboatClassID','class.intTugboatClassID')
        ->join('tbltugboatspecs as specs','tugboat.intTTugboatSpecsID','specs.intTugboatSpecsID')
        ->join('tbltugboattype as type','class.intTCTugboatTypeID','type.intTugboatTypeID')
        ->join('tblcompany as company','tugboat.intTCompanyID','company.intCompanyID')
        ->where('tugboat.intTugboatID',$intTugboatID)
        ->get();

        $insurances = TugboatInsurances::where('intTITugboatID',$intTugboatID)->get();
        return response()->json(['tugboat'=>$tugboat,'insurances'=>$insurances]);
    }

}
