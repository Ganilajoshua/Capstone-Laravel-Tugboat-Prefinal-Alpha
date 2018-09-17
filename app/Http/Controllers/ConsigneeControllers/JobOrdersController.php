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
        
        return view('Consignee.Joborders.joborder',
        compact('goods','createdjob','pendingjob','accepted','ongoing','finishedjob','contract','berth'));
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
            $joborder->strJOTitle = $request->jobTitle;
            $joborder->strJODesc = $request->jobDesc;
            $joborder->intJOCompanyID = Auth::user()->intUCompanyID;
            $joborder->dtmETA = Carbon::parse($request->jobETA)->format('Y/m/d H:i:s');
            $joborder->dtmETD = Carbon::parse($request->jobETD)->format('Y/m/d H:i:s');
            $joborder->intJOBerthID = $request->jobBerth;
            $joborder->strJODestination = $request->jobLocation;
            $joborder->strJOVesselName = $request->jobVesselName;
            $joborder->intJOGoodsID = $request->jobGoods;
            $joborder->fltWeight = $request->jobWeight;
            $joborder->enumStatus = 'Created';
            $joborder->save();
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }

        return response()->json(['joborder'=>'joborder']);
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
