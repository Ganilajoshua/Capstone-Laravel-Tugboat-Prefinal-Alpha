<?php

namespace App\Http\Controllers\ConsigneeControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Contract;
use App\JobOrder;
use DB;
use Auth;

class ConsigneeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('consignee');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $ongoing = JobOrder::where('boolDeleted',0)
        // ->where('intJOCompanyID',Auth::user()->intUCompanyID)
        // ->where('enumStatus','Ongoing')
        // ->get();

        $ongoing = DB::table('tbljoborder as joborder')
        ->join('tbljobsched as jobsched','joborder.intJobOrderID','jobsched.intJSJobOrderID')
        ->where('intJOCompanyID',Auth::user()->intUCompanyID)
        ->where('jobsched.enumStatus','Ongoing')
        ->groupBy('joborder.intJobOrderID')
        ->get();
        $company = Company::where('intCompanyID', Auth::user()->intUCompanyID)->get();
        return view('Consignee.Dashboard.dashboard',compact('company','ongoing'));
        // return response()->json([$ongoing]);
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
    public function getnotifs(Request $request){
        $contractlist = DB::table('tblcompany as company')
        ->leftjoin('tblcontractlist as contracts','contracts.intCCompanyID','company.intCompanyID')
        ->join('users as user','user.intUCompanyID','company.intCompanyID')
        ->where('user.intUCompanyID',Auth::user()->intUCompanyID)
        ->orderBy('contracts.intContractListID','DESC')
        ->limit('1')
        ->get();

        $contract = Contract::where('intCCompanyID',Auth::user()->intUCompanyID)->get();
        // $contractexpire = Contract::findOrFail($contract[0]->intContractListID);
        // $contractexpire->timestamps = false;
        // $contractexpire->enumStatus = 'Expired';
        // $contractexpire->save();
        return response()->json(['contract'=>$contractlist,'contractlist'=>$contractlist]);
    }
    public function setcontractexpired(Request $request){
        $contract = Contract::findOrFail($request->contractID);
        $contract->timestamps = false;
        $contract->enumStatus = 'Expired';
        $contract->save();

        return response()->json(['contract'=>$contract]);
    }
}
