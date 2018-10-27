<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

use Carbon\Carbon;

use App\Employees;
use App\Position;
use App\JobOrder;
use App\JobSchedule;
use App\ForwardRequest;
use App\Team;
use App\TeamAssignment;
use App\Tugboat;
use App\TugboatClass;
use App\TugboatMainSpecifications;
use App\TugboatSpecifications;
use App\TugboatAssignment;
use App\TugboatInsurances; 

use Redirect;
use Auth;


class TugboatTeamAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // List of Employees in Create Modal
        $employee = DB::table('tblemployee as employee')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('employee.boolDeleted',0)
        ->get();
        // List of Captains in Create Modal
        $captains = DB::table('tblemployee as employee')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('position.strPositionName','Captain')
        ->where('employee.intETeamID',null)
        ->where('employee.boolDeleted',0)
        ->where('employee.intECompanyID',Auth::user()->intUCompanyID)
        ->get();
        // List of Chief Engineer in Create Modal
        $chiefengineers = DB::table('tblemployee as employee')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('position.strPositionName','Chief Engineer')
        ->where('employee.intETeamID',null)
        ->where('employee.boolDeleted',0)
        ->where('employee.intECompanyID',Auth::user()->intUCompanyID)
        ->get();
        // List of Crew in Create Modal
        $crew = DB::table('tblemployee as employee')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('position.strPositionName','Crew')
        ->where('employee.intETeamID',null)
        ->where('employee.boolDeleted',0)
        ->where('employee.intECompanyID',Auth::user()->intUCompanyID)
        ->get();
        // List of Other Employees in Create Modal
        $others = DB::table('tblemployee as employee')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('position.strPositionName','!=','Captain')
        ->where('position.strPositionName','!=','Chief Engineer')
        ->where('position.strPositionName','!=','Crew')
        ->where('employee.intETeamID',null)
        ->where('employee.intECompanyID',Auth::user()->intUCompanyID)
        // ->where('position.strPositionName','!=','First Mate')
        ->get();

        // List of Unavailable Tugboats
        $noCompliance = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatclass as class','tugboat.intTTugboatClassID','class.intTugboatClassID')
        ->join('tbltugboatmain as main','main.intTugboatMainID','tugboat.intTTugboatMainID')
        ->where('class.enumISPSCodeCompliance','no')
        ->orWhere('class.enumISMCodeStandard','no')
        ->get();
        // List of Available Tugboats
        $compliance = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatclass as class','tugboat.intTTugboatClassID','class.intTugboatClassID')
        ->join('tbltugboatmain as main','main.intTugboatMainID','tugboat.intTTugboatMainID')
        ->join('tbltugboatassign as assign','tugboat.intTugboatID','assign.intTATugboatID')
        ->where('assign.intTATeamID',null)
        ->where('class.enumISPSCodeCompliance','yes')
        ->where('class.enumISMCodeStandard','yes')
        ->where('intTCompanyID',Auth::user()->intUCompanyID)
        ->get(); 

        $available = DB::table('tbltugboat as tugboat')
        ->leftjoin('tbltugboatassign as assign','tugboat.intTugboatID','assign.intTATugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->get();
        // ->paginate(5);
        $teamList = DB::table('tblteam as team')
        ->leftjoin('tbltugboatassign as assign','team.intTeamID','assign.intTATeamID')
        ->where('team.boolDeleted',0)
        ->where('team.intTCompanyID',Auth::user()->intUCompanyID)   
        ->where('assign.intTATeamID',null)
        ->orWhere('team.intTForwardCompanyID',Auth::user()->intUCompanyID)
        ->get();

        $teamavailable = DB::table('tbltugboat as tugboat')
        ->leftjoin('tbltugboatassign as assign','tugboat.intTugboatID','assign.intTATugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->get();
        $availtug = DB::table('tbltugboat as tugboat')
        ->leftjoin('tbltugboatassign as assign','tugboat.intTugboatID','assign.intTATugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->get();
        $teamlist = DB::table('tbltugboatassign as assign')
        ->join('tblteam as team','assign.intTATeamID','team.intTeamID')
        ->join('tblemployee as employee','team.intTeamID','employee.intETeamID')
        ->join('tblposition as position','position.intPositionID','employee.intEPositionID')
        ->where('position.strPositionName','Captain')
        ->get();
        $requestteam = Team::where('intTCompanyID',Auth::user()->intUCompanyID)
        ->where('boolDeleted',0)
        ->get();
        // Available Tugboats
        $tugboatnoAvail = TeamAssignment::where('boolDeleted',0)
        ->where('intTATeamID',null)
        ->get();
        // Not Available
        $tugboatAvail = DB::table('tbltugboatassign as assign')
        ->join('tbltugboat as tugboat','assign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','main.intTugboatMainID','tugboat.intTTugboatMainID')
        ->where('assign.intTATeamID','!=',null)
        ->where('assign.intTACompanyID',Auth::user()->intUCompanyID)
        // TeamAssignment::where('boolDeleted',0)
        // ->where('intTATeamID','!=',null)
        ->get();

        // Request Company Dropdown
        if(Auth::user()->enumUserType == 'Admin'){
            $affiliates = DB::table('users as user')
            ->join('tblcompany as company','user.intUCompanyID','company.intCompanyID')
            ->where('user.enumUserType','Affiliates')
            ->get();
        }else if(Auth::user()->enumUserType == 'Affiliates'){
            $affiliates = DB::table('users as user')
            ->join('tblcompany as company','user.intUCompanyID','company.intCompanyID')
            ->where('user.enumUserType','!=','Consignee')
            ->where('user.enumUserType','!=','Captain')
            ->where('user.intUCompanyID','!=',Auth::user()->intUCompanyID)
            ->get();
        
        }
        // Teams Received
        $teamsreceived = DB::table('tblteam as team')
        ->join('tblcompany as company','team.intTCompanyID','company.intCompanyID')
        ->where('intTForwardCompanyID',Auth::user()->intUCompanyID)
        ->get();

        // Tugboats Received
        $tugboatsreceived = DB::table('tbltugboatassign as assign')
        ->join('tbltugboat as tugboat','assign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tblcompany as company','company.intCompanyID','assign.intTACompanyID')
        ->where('intTAForwardCompanyID',Auth::user()->intUCompanyID)
        ->get();

        $notugboatteam = DB::table('tbljobsched as jobsched')
        ->join('tblschedule as schedule','jobsched.intJSSchedID','schedule.intScheduleID')
        ->join('tbljoborder as joborder','jobsched.intJSJobOrderID','joborder.intJobOrderID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('jobsched.intJSTeamID',null)
        ->groupBy('jobsched.intJSJobOrderID')
        ->get();

        return view('TeamAssignment.index',
        compact('tugboatassign','employee','captains','chiefengineers','crew','others','nocompliance','compliance','requestteam',
        'available','teamavailable','availtug','teamlist','teamList','tugboatnoAvail','tugboatAvail','affiliates','teamsreceived','tugboatsreceived','notugboatteam'));
        return response()->json(['nottugboatteam'=>$notugboatteam]);
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
    
        $teamID = Team::max('intTeamID')+1;
        $teamID2 = $teamID;
    
        $team = new Team;
        $team->timestamps = false;
        $team->intTeamID = $teamID2;
        $team->strTeamName = $request->teamName;
        $team->intTCompanyID = Auth::user()->intUCompanyID;
        $team->save();

        for($counter = 0; $counter < count($request->membersID); $counter++){
            $emp = Employees::findOrFail($request->membersID[$counter]);
            $emp->timestamps = false;
            $emp->intETeamID = $teamID2;
            $emp->save();
        }   

        return response()->json([$emp]);
        
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function teamassignment(Request $request)
    {   
        try{
            DB::beginTransaction();
            $team = Team::findOrFail($request->teamID);
            $teamassign = TeamAssignment::findOrFail($request->tugboatID);
            $teamassign->timestamps = false;
            $teamassign->intTATeamID = $request->teamID;
            $teamassign->strTADesc = $team->strTeamName;
            $teamassign->save();
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return response()->json(['error'=>$errorMessage]);
            // return Redirect::back()->withErrors($errorMessage);
        }
        return response()->json(['team'=>$team,'teamassign'=>$teamassign]);

    }
    public function cleartugboatteam(Request $request)
    {
        try{
            DB::beginTransaction();

            $teamassign = TeamAssignment::findOrFail($request->tugboatassignID);
            $teamassign->timestamps = false;
            $teamassign->intTATeamID = null;
            $teamassign->save();

            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }
        return response()->json(['teamassign'=>$teamassign]);
    }

    public function removeteamemployees(Request $request)
    {
        try{
            DB::beginTransaction();
            $employees = Employees::where('intETeamID',$request->teamID)->get();
            
            for($count = 0; $count < count($employees); $count++){
                $employee = Employees::findOrFail($employees[$count]->intEmployeeID);
                $employee->timestamps = false;
                $employee->intETeamID = null;
                $employee->save();
            }
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }
        return response()->json(['employee'=>$employee]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($intTeamID)
    {   
        $team = Employees::where('intETeamID',$intTeamID)->get();
        return response()->json(['team'=>$team]);
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

    // View Employees on Team
    public function viewteam($intTeamID)
    {
        $employees = DB::table('tblemployee as employee')
        ->join('tblteam as team','employee.intETeamID','team.intTeamID')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('employee.intETeamID',$intTeamID)
        ->get();
        return response()->json(['employees'=>$employees]);
    }

    // View Team on Occupied Tugboat
    public function viewtugboatteam($intTATeamID){
        $team = DB::table('tbltugboatassign as assign')
        ->join('tbltugboat as tugboat','assign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','main.intTugboatMainID','tugboat.intTTugboatMainID')
        ->join('tblteam as team','team.intTeamID','assign.intTATeamID')
        ->join('tblemployee as employee','employee.intETeamID','team.intTeamID')
        ->join('tblposition as position','position.intPositionID','employee.intEPositionID')
        ->where('employee.intETeamID',$intTATeamID)
        ->get();    

        return response()->json(['team'=>$team]);
    }

    // Request Team
    public function requestteam(Request $request){
        try{
            DB::beginTransaction();
            $forward = new ForwardRequest;
            $forward->strRequestDescription = $request->requestDetails;
            $forward->enumRequestType = 'Request Team';
            $forward->intRCompanyID = Auth::user()->intUCompanyID;
            $forward->intRForwardCompanyID = $request->requestForwardCompanyID;
            $forward->save();
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }
    }

    // Request Tugboat
    public function requesttugboat(Request $request){
        try{
            DB::beginTransaction();
            $forward = new ForwardRequest;
            $forward->strRequestDescription = $request->requestDetails;
            $forward->enumRequestType = 'Request Tugboat';
            $forward->intRCompanyID = Auth::user()->intUCompanyID;
            $forward->intRForwardCompanyID = $request->requestForwardCompanyID;
            $forward->save();
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }
    }

    public function forwardteam(Request $request){
        try{
            DB::beginTransaction();
            $team = Team::findOrFail($request->teamID);
            $team->timestamps = false;
            $team->intTForwardCompanyID = $request->companyID;
            $team->save();
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }
        return response()->json(['team'=>$team]);
    }
    
    public function returnteam(Request $request){
        try{
            DB::beginTransaction();
            $team = Team::findOrFail($request->teamID);
            $team->timestamps = false;
            $team->intTForwardCompanyID = null;
            $team->save();
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }
        return response()->json(['team'=>$team]);
    }

    public function forwardtugboat(Request $request){
        try{
            DB::beginTransaction();
            $tugboatassign = TeamAssignment::findOrFail($request->tugboatassignID);
            $tugboatassign->timestamps = false;
            $tugboatassign->intTATeamID = null;
            $tugboatassign->strTADesc = null;
            $tugboatassign->intTAForwardCompanyID = $request->recipientCompanyID;
            $tugboatassign->save();
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }
        return response()->json(['tugboatassign'=>$tugboatassign]);
    }
    public function returntugboat(Request $request){
        try{
            DB::beginTransaction();            
            $tugboatassign = TeamAssignment::findOrFail($request->tugboatassignID);
            $tugboatassign->timestamps = false;
            $tugboatassign->intTATeamID = null;
            $tugboatassign->intTAForwardCompanyID = null;
            $tugboatassign->save();
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }


        return response()->json(['tugboatassign'=>$tugboatassign]);
    }

    public function showtugboatinformation($intTATugboatID)
    {
        $tugboat = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbltugboatclass as class','tugboat.intTTugboatClassID','class.intTugboatClassID')
        ->join('tbltugboatspecs as specs','tugboat.intTTugboatSpecsID','specs.intTugboatSpecsID')
        ->join('tbltugboattype as type','class.intTCTugboatTypeID','type.intTugboatTypeID')
        ->join('tblcompany as company','tugboat.intTCompanyID','company.intCompanyID')
        ->where('tugboat.intTugboatID',$intTATugboatID)
        ->get();

        $insurances = TugboatInsurances::where('intTITugboatID',$intTATugboatID)->get();
        return response()->json(['tugboat'=>$tugboat,'insurances'=>$insurances]);
    }
    public function notifications(Request $request)
    {
        // Teams Received
        $teamsreceived = DB::table('tblteam as team')
        ->join('tblcompany as company','team.intTCompanyID','company.intCompanyID')
        ->where('intTForwardCompanyID',Auth::user()->intUCompanyID)
        ->get();

        // Tugboats Received
        $tugboatsreceived = DB::table('tbltugboatassign as assign')
        ->join('tbltugboat as tugboat','assign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tblcompany as company','company.intCompanyID','assign.intTACompanyID')
        ->where('intTAForwardCompanyID',Auth::user()->intUCompanyID)
        ->get();

        return response()->json(['teamsreceived'=>$teamsreceived,'tugboatsreceived'=>$tugboatsreceived]);
    }
    public function getteamcompositions(Request $request){
        $positions = Position::where('intPCompanyID',Auth::user()->intUCompanyID)->get();
        return response()->json(['positions'=>$positions]);
    }

    public function getjoborder($intJobOrderID){
        $job = JobOrder::findOrFail($intJobOrderID);
        $tugboats = [];

        if($job->enumServiceType == 'Hauling'){
            if($job->intJOBerthID == null){
                $joborder = DB::table('tbljoborder as joborder')
                ->join('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
                ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
                ->where('joborder.intJobOrderID',$job->intJobOrderID)
                ->get();
            }else{
                $joborder = DB::table('tbljoborder as joborder')
                ->join('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
                ->join('tblpier as pier','berth.intBPierID','intPierID')
                ->join('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
                ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
                ->where('joborder.intJobOrderID',$job->intJobOrderID)
                ->get();
            }
        }else if($job->enumServiceType == 'Tug Assist'){
            $joborder = DB::table('tbljoborder as joborder')
            ->join('tblberth as berth','joborder.intJOBerthID','berth.intBerthID')
            ->join('tblpier as pier','berth.intBPierID','intPierID')
            // ->join('tblgoods as goods','joborder.intJOGoodsID','goods.intGoodsID')
            ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
            ->where('joborder.intJobOrderID',$job->intJobOrderID)
            ->get();    
        }

        $jobsched = DB::table('tbljobsched as jobsched')
        ->join('tbljoborder as joborder','jobsched.intJSJobOrderID','joborder.intJobOrderID')
        ->join('tbltugboat as tugboat','jobsched.intJSTugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbltugboatassign as assign','jobsched.intJSTugboatAssignID','assign.intTAssignID')
        ->join('tblteam as team','assign.intTATeamID','team.intTeamID')
        ->where('jobsched.intJSJobOrderID',$intJobOrderID)
        ->get();

        $team = DB::table('tblteam as team')
        ->where('team.intTCompanyID', Auth::user()->intUCompanyID)
        ->orWhere('team.intTForwardCompanyID', Auth::user()->intUCompanyID)
        ->get();
        // $tugboatassign = DB::table('tbltugboatassign as assign')
        // ->join('tbltugboat as tugboat','tugboat s')
        return response()->json(['joborder'=>$joborder,'jobsched'=>$jobsched,'teams'=>$team,$intJobOrderID]);
    }

    public function showdefaultteams($intJobOrderID){
        $teams = [];
        $employees = [];
        $jobsched = DB::table('tbljobsched as jobsched')
        ->join('tbljoborder as joborder','jobsched.intJSJobOrderID','joborder.intJobOrderID')
        ->join('tbltugboat as tugboat','jobsched.intJSTugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        // ->join('tbltugboatassign as assign','jobsched.intJSTugboatAssignID','assign.intTAssignID')
        // ->leftjoin('tblteam as team','assign.intTATeamID','team.intTeamID')
        ->where('jobsched.intJSJobOrderID',$intJobOrderID)
        ->get();

        for($count = 0; $count < count($jobsched); $count++){
            
            $tugboatassign = DB::table('tbltugboatassign as assign')
            ->join('tbltugboat as tugboat','jobsched.intJSTugboatID','tugboat.intTugboatID')
            ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
            ->join('tbltugboatassign as assign','jobsched.intJSTugboatAssignID','assign.intTAssignID')
            ->leftjoin('tblteam as team','assign.intTATeamID','team.intTeamID')
            ;
            // $employee[$count] = Employees::where('intETeamID',$jobsched[$count]->intTeamID)->get();
            // for($counter = 0; $counter < count($employee); $counter++){
            //     $employees[$counter] = $employee[$counter];
            // }
        }
        

        return response()->json(['jobsched'=>$jobsched,'teams'=>$teams,'employees'=>$employees]);
    }

    public function assigndefaultteams(Request $request){
        $teams = [];
        for($counter = 0; $counter < count($request->tugboatID); $counter++){
            $team = TeamAssignment::findOrFail($request->tugboatID[$counter]);
            $teams[$counter] = $team->intTATeamID;
        }
        
        for($count = 0; $count < count($request->jobschedID); $count++){
            $jobsched = JobSchedule::findOrFail($request->jobschedID[$count]);
            $jobsched->timestamps = false;
            $jobsched->intJSTeamID = $teams[$count];
            $jobsched->save();
        }
        return response()->json(['teams'=>$teams]);
    }

}
