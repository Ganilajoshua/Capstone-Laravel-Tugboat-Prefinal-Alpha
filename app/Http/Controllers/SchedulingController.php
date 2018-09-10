<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

use Carbon\Carbon;

use App\Schedules;
use Auth;
use Session;


class SchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $schedules = DB::table('tblschedule')
        ->select('tblschedule.*')
        ->where('boolDeleted',0)
        ->where('intScheduleCompanyID',Auth::user()->intUCompanyID)
        ->get();
        // return response(['schedules' => $schedules]);
        return view('Schedule.index',compact('schedules'));
        
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
    public function schedules(Request $request, Response $response)
    {
        $schedules = DB::table('tblschedule')
        ->select('tblschedule.*')
        ->where('boolDeleted',0)
        ->get();
        // $schedules->toArray();
        return json_encode($schedules);
    }

    public function tugboatsavailable(Request $request){
        $unavailable = DB::table('tbltugboatassign as assign')
        ->join('tbljobsched as jobsched','jobsched.intJSTugboatAssignID','assign.intTAssignID')
        ->join('tblschedule as schedule','jobsched.intJSSchedID','schedule.intScheduleID')
        ->join('tbltugboat as tugboat','assign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTugboatID','main.intTugboatMainID')
        ->whereDate('schedule.dttmETA',$request->date)
        ->where('assign.intTACompanyID',Auth::user()->intUCompanyID)
        ->get();
        
        $available = DB::table('tbltugboatassign as assign')
        ->leftjoin('tbljobsched as jobsched','jobsched.intJSTugboatAssignID','assign.intTAssignID')
        ->leftjoin('tblschedule as schedule','jobsched.intJSSchedID','schedule.intScheduleID')
        ->join('tbltugboat as tugboat','assign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->whereDate('schedule.dttmETA','!=',$request->date)
        ->where('assign.intTACompanyID',Auth::user()->intUCompanyID)
        ->orWhere('schedule.dttmETA',null)
        // ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->get();
        return response()->json(['unavailable'=>$unavailable,'available'=>$available]);
    }
}
