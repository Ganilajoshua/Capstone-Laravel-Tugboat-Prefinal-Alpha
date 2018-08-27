<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

use App\Company;
use App\JobOrder;
use App\JobSchedule;
use App\Schedules;

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
        ->where('joborder.enumstatus','Forwarded')
        ->where('joborder.boolDeleted',0)
        ->get();
        $declined = DB::table('tbljoborder as joborder')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('joborder.enumstatus','Declined')
        ->where('joborder.boolDeleted',0)
        ->get();
        return view('Joborder.index',compact('accepted','forwarded','joborders','declined'));
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
        $job = JobOrder::findOrFail($request->joborderID);
        $job->timestamps = false;
        $job->enumStatus = 'Scheduled';
        $job->save();
        // $scheduleID = Schedules::max('intScheduleID') + 1 ;
        // $schedID = $scheduleID;     
        
        // $schedule = new Schedules;
        // $schedule->timestamps = false;
        // $schedule->intScheduleID = $scheduleID;
        // $schedule->strScheduleDesc = $joborder->strJODesc;
        // $schedule->dttmETA = $joborder->dtmETA;
        // $schedule->dttmETD = $joborder->dtmETD;
        // $schedule->save();
        
        // $jobschedule = new JobSchedule;
        // $jobschedule->timestamps = false;
        // $jobschedule->intJSJobOrderID = $joborder->intJobOrderID;
        // $jobschedule->intJSSchedID = $schedID; 
        // $jobschedule->save();   
        // $jobschedule->intJSScheduleID = $scheduleID; 
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
        $joborder = JobOrder::findOrFail($intJobOrderID);
        $joborder->timestamps = false;
        $joborder->enumStatus = 'Accepted';
        $joborder->save();
        return response()->json(['joborder'=>$joborder]);
    }
    public function forwardRequest($intJobOrderID)
    {
        $joborder = JobOrder::findOrFail($intJobOrderID);
        return response()->json(['joborder'=>$joborder]);
    }
    public function forward(Request $request)
    {

    }
    public function decline($intJobOrderID)
    {

    }
}
