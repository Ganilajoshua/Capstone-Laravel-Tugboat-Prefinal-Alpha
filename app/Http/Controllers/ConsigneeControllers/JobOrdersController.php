<?php

namespace App\Http\Controllers\ConsigneeControllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use Carbon\Carbon;
use App\Http\Controllers\Controller;

use App\Company;
use App\Contract;
use App\JobOrder;
use App\Goods;
use App\Berth;
use App\VesselType;

use Redirect;
use Auth;
use DB;

class JobOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods =  Goods::where('boolDeleted',0)
        ->where('isActive',1)
        ->get();
        $contract = Contract::where('intCCompanyID',Auth::user()->intUCompanyID)->get();
        $berth = DB::table('tblberth as berth')
        ->join('tblpier as pier','berth.intBPierID','pier.intPierID')
        ->where('berth.isActive',1)
        ->get();
        
        $createdjob = JobOrder::where('boolDeleted',0)
        ->where('intJOCompanyID',Auth::user()->intUCompanyID)
        ->where('enumStatus','Created')
        ->get();
        $pendingjob = JobOrder::where('boolDeleted',0)
        ->where('intJOCompanyID',Auth::user()->intUCompanyID)
        ->where('enumStatus','!=', 'Created')
        ->orderBy('enumStatus','Asc')
        ->get();
        $ongoing = JobOrder::where('boolDeleted',0)
        ->where('intJOCompanyID',Auth::user()->intUCompanyID)
        ->where('enumStatus','Ongoing')
        ->get();
        $accepted = JobOrder::where('boolDeleted',0)
        ->where('intJOCompanyID',Auth::user()->intUCompanyID)
        ->where('enumStatus','Accepted')
        ->get();
        $finishedjob = JobOrder::where('boolDeleted',0)
        ->where('intJOCompanyID',Auth::user()->intUCompanyID)
        ->where('enumStatus','Finished')
        ->get();
        $vesseltype = VesselType::all();
        return view('Consignee.Joborders.joborder',
        compact('goods','createdjob','pendingjob','accepted','ongoing','finishedjob','contract','berth','vesseltype'));
        // return response()->json(['joborder'=>$goods,Auth::user(),'berth'=>$berth]);
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
            $joborder = new JobOrder;
            $joborder->strJOTitle = $request->title;
            $joborder->strJODesc = $request->details;
            $joborder->intJOCompanyID = Auth::user()->intUCompanyID;
            $joborder->datStartDate = Carbon::parse($request->startDate)->format('Y/m/d');
            $joborder->datEndDate = Carbon::parse($request->EndDate)->format('Y/m/d');
            $joborder->tmStart = Carbon::parse($request->startTime);
            $joborder->tmEnd = Carbon::parse($request->endTime);
            $joborder->intJOBerthID = $request->berth;
            $joborder->strJOVesselName = $request->vesselName;
            $joborder->intJOVesselTypeID = $request->vesselType;
            $joborder->fltWeight = $request->vesselWeight;
            $joborder->enumServiceType = $request->serviceType;
            $joborder->enumStatus = 'Created';
            $joborder->save();
            DB::commit();
            return response()->json(['joborder'=>$joborder]);
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return response()->json(['message'=>$errorMessage,'inputs'=>$request->all()]);
            // return Redirect::back()->withErrors($errorMessage);
        }
    

    }
    public function haulingservice(Request $request){
        $id = JobOrder::max('intJobOrderID');
        if(count($request->all()) == null){
            return response()->json([],204);
        }else{
            try{
                DB::beginTransaction();
                $joborder = new JobOrder;
                $joborder->strJOTitle = $request->title;
                $joborder->strJODesc = $request->details;
                $joborder->intJOCompanyID = Auth::user()->intUCompanyID;
                $joborder->datStartDate = Carbon::parse($request->startDate)->format('Y/m/d');
                $joborder->datEndDate = Carbon::parse($request->endDate)->format('Y/m/d');
                $joborder->tmStart = Carbon::parse($request->startTime);
                $joborder->tmEnd = Carbon::parse($request->endTime);
                $joborder->intJOGoodsID = $request->goods;
                if(!empty($request->berth)){
                    $joborder->intJOBerthID = $request->berth;
                }
                if(!empty($request->sLocation)){
                    $joborder->strJOStartPoint = $request->sLocation;
                }
                if(!empty($request->dLocation)){
                    $joborder->strJODestination = $request->dLocation;
                }
                $joborder->strJOVesselName = $request->vesselName;
                // $joborder->intJOVesselTypeID = $request->vesselType;
                $joborder->fltWeight = $request->vesselWeight;
                $joborder->enumServiceType = $request->serviceType;
                $joborder->enumStatus = 'Created';
                $joborder->save();
                DB::commit();
                return response()->json(['joborder'=>$joborder]);
            }catch(\Illuminate\Database\QueryException $errors){
                // DB::statement('ALTER TABLE tbljoborder AUTO_INCREMENT=:$id');
                // DB::commit();
                DB::rollBack();
                $errorMessage = $errors->getMessage();
                return response()->json(['errorMessage'=>$errorMessage,'inputs'=>$request->all()],500);
                // return response()->json('hi');
                // return Redirect::back()->withErrors($errorMessage);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($intJobOrderID)
    {
        $joborder = JobOrder::findOrFail($intJobOrderID);
        $joborder->timestamps = false;
        $joborder->enumStatus = 'Pending';
        $joborder->save();
        return response()->json(['joborder'=>$joborder]);    
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
}
