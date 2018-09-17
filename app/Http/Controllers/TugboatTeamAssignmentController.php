<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

use Carbon\Carbon;

use App\Employees;
use App\ForwardRequest;
use App\Team;
use App\TeamAssignment;
use App\Tugboat;
use App\TugboatClass;
use App\TugboatMainSpecifications;
use App\TugboatSpecifications;
use App\TugboatAssignment;

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
        // $emp = Employees::all();
        $now = new Carbon();
        // $max = TugboatMainSpecifications::max('intTugboatMainID');
        $tugboatassign = DB::table('tbltugboatassign as assignment')
        ->join('tblteam as team','assignment.intTATeamID','team.intTeamID')
        ->where('assignment.boolDeleted',0)
        ->get();
        // ->paginate(5); 
        $employees = DB::table('tblemployee as employee')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('employee.boolDeleted',0)
        ->get();
        $captain = DB::table('tblemployee as employee')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('position.strPositionName','Captain')
        ->where('employee.intETeamID',null)
        ->where('employee.boolDeleted',0)
        ->where('employee.intECompanyID',Auth::user()->intUCompanyID)
        ->get();
        $ceng = DB::table('tblemployee as employee')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('position.strPositionName','Chief Engineer')
        ->where('employee.intETeamID',null)
        ->where('employee.boolDeleted',0)
        ->where('employee.intECompanyID',Auth::user()->intUCompanyID)
        ->get();
        $fmate = DB::table('tblemployee as employee')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('position.strPositionName','First Mate')
        ->where('employee.intETeamID',null)
        ->where('employee.boolDeleted',0)
        ->where('employee.intECompanyID',Auth::user()->intUCompanyID)
        ->get();
        $crew = DB::table('tblemployee as employee')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('position.strPositionName','Crew')
        ->where('employee.intETeamID',null)
        ->where('employee.boolDeleted',0)
        ->where('employee.intECompanyID',Auth::user()->intUCompanyID)
        ->get();
        $others = DB::table('tblemployee as employee')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('position.strPositionName','!=','Captain')
        ->where('position.strPositionName','!=','Chief Engineer')
        ->where('position.strPositionName','!=','Crew')
        ->where('employee.intETeamID',null)
        ->where('employee.intECompanyID',Auth::user()->intUCompanyID)
        // ->where('position.strPositionName','!=','First Mate')
        ->get();
        $noCompliance = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatclass as class','tugboat.intTTugboatClassID','class.intTugboatClassID')
        ->join('tbltugboatmain as main','main.intTugboatMainID','tugboat.intTTugboatMainID')
        ->where('class.enumISPSCodeCompliance','no')
        ->orWhere('class.enumISMCodeStandard','no')
        ->get();
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
        $requestTeam = Team::where('intTCompanyID',Auth::user()->intUCompanyID)
        ->where('boolDeleted',0)
        ->get();

        $tugboatnoAvail = TeamAssignment::where('boolDeleted',0)
        ->where('intTATeamID',null)
        ->get();
        $tugboatAvail = DB::table('tbltugboatassign as assign')
        ->join('tbltugboat as tugboat','assign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','main.intTugboatMainID','tugboat.intTTugboatMainID')
        ->where('intTATeamID','!=',null)
        // TeamAssignment::where('boolDeleted',0)
        // ->where('intTATeamID','!=',null)
        ->get();

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
        $teamsReceived = DB::Table('tblteam as team')
        ->join('tblcompany as company','team.intTCompanyID','company.intCompanyID')
        ->where('intTForwardCompanyID',Auth::user()->intUCompanyID)
        ->get();

        return view('TeamAssignment.newIndex')
        ->with('tugboatassign',$tugboatassign)
        ->with('employee',$employees)
        ->with('captains',$captain)
        ->with('chiefengineers',$ceng)
        ->with('crew',$crew)
        ->with('others',$others)
        ->with('nocompliance',$noCompliance)
        ->with('compliance',$compliance)
        ->with('team',$requestTeam)
        ->with('available',$available)
        ->with('teamavailable',$teamavailable)
        ->with('availtug',$availtug)
        ->with('teamlist',$teamlist)
        ->with('teamList',$teamList)
        ->with('tugboatnoAvail',$tugboatnoAvail)
        ->with('tugboatAvail',$tugboatAvail)
        ->with('affiliates',$affiliates)
        ->with('teamsrecieved',$teamsReceived);
        return response()->json(['teamsReceived' => $teamsReceived]);

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
        try{
            DB::beginTransaction();
            $teamID = Team::max('intTeamID')+1;
            $teamID2 = $teamID;
        
            $team = new Team;
            $team->timestamps = false;
            $team->strTeamName = $request->teamName;
            $team->intTCompanyID = Auth::user()->intUCompanyID;
            $team->save();
            
            if(!empty($request->teamCaptainID)){        
                for($count=0;$count < count($request->teamCaptainID); $count++){
                    $emp = Employees::findOrFail($request->teamCaptainID[$count]);
                    $emp->timestamps = false;
                    $emp->intETeamID = $teamID2;
                    $emp->save();
                }
            }
            if(!empty($request->teamCaptainID)){
                for($count=0;$count < count($request->teamChiefEngineerID); $count++){
                    $emp = Employees::findOrFail($request->teamChiefEngineerID[$count]);
                    $emp->timestamps = false;
                    $emp->intETeamID = $teamID2;
                    $emp->save();
                }
            }
            if(!empty($request->teamCrewID)){
                for($count=0;$count < count($request->teamCrewID); $count++){
                    $emp = Employees::findOrFail($request->teamCrewID[$count]);
                    $emp->timestamps = false;
                    $emp->intETeamID = $teamID2;
                    $emp->save();
                }
            }
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }
        return response()->json(['crew'=>$emp]);  
        
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

    public function viewteam($intTeamID)
    {
        $employees = DB::table('tblemployee as employee')
        ->join('tblteam as team','employee.intETeamID','team.intTeamID')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('employee.intETeamID',$intTeamID)
        ->get();
        return response()->json(['employees'=>$employees]);
    }

    public function viewtugboatteam($intTATeamID){
        $team = DB::table('tbltugboatassign as assign')
        ->join('tbltugboat as tugboat','assign.intTATugboatID','tugboat.intTugboatID')
        ->join('tbltugboatmain as main','main.intTugboatMainID','tugboat.intTTugboatMainID')
        ->join('tblteam as team','team.intTeamID','assign.intTATeamID')
        ->join('tblemployee as employee','employee.intETeamID','team.intTeamID')
        ->join('tblposition as position','position.intPositionID','employee.intEPositionID')
        // ->join('tbltugboat as tugboat','assign.intTATugboatID','tugboat.intTugboatID')
        // ->join('tbltugboatmain as main','tugboat.intTugboatID','main.intTugboatMainID')
        ->where('employee.intETeamID',$intTATeamID)

        ->get();

        return response()->json(['team'=>$team]);
    }

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
}
