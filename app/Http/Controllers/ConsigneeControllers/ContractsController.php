<?php

namespace App\Http\Controllers\ConsigneeControllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;
use App\Company;
use App\Contract;
use App\Quotations;
use App\QuotationFees;
use App\ContractFeesMatrix;

use Auth;
use DB;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::where('intCompanyID', Auth::user()->intUCompanyID)->get();
        $contract = DB::table('tblcontractlist as contract')
        // ->join('tblquotation as quotation','contract.intCQuotationID','quotation.intQuotationID')
        ->where('contract.intCCompanyID',Auth::user()->intUCompanyID)->get();
        // Contract::where('intCCompanyID',Auth::user()->intUCompanyID)->get();
        $contractList = DB::table('users as users')
        ->leftjoin('tblcompany as company','users.intUCompanyID','company.intCompanyID')
        ->join('tblcontractlist as contracts','company.intCompanyID','contracts.intCCompanyID')
        
        ->where('contracts.intCCompanyID',Auth::user()->intUCompanyID)
        ->select('company.*','contracts.*','users.*')
        // ->where('contracts.intCQuotationID',null)
        ->get();
        return view('Consignee.Contracts.index')
        ->with('company',$company)
        ->with('contract',$contract)
        ->with('contractList',$contractList);
        // undefined offset[0] pag walang company na connected sa user
        // return response()->json(['contract'=>$contract,'list'=>$contractList]);
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
        $contract = new Contract;
        $contract->timestamps = false;
        $contract->intCCompanyID = $request->companyID;
        $contract->save();
        return response()->json(['contract'=>$contract]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($intContractListID)
    {
        $contractList = Contract::findOrFail($intContractListID);    
        $quotation = Quotations::where('intQContractListID',$intContractListID)->get();
        $contract = DB::table('tblcontractlist as contract')
        ->join('tblquotation as quotation','contract.intContractListID','quotation.intQContractListID')
        ->where('contract.intContractListID',$intContractListID)
        ->where('quotation.intQContractListID',$intContractListID)
        ->get();
        return response()->json(['contract'=>$contract,'quotation'=>$quotation]);
        

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
    public function getdefaultmatrix(Request $request){
        $contractfees = ContractFeesMatrix::all();
        return response()->json(['contractfees'=>$contractfees]);
    }
    public function requestchanges(Request $request){
        $contract = Contract::findOrFail($request->contractID);
        $contract->timestamps = false;
        $contract->enumStatus = 'Requesting For Changes';
        $contract->save();
        return response()->json(['contract'=>$contract]);
    }
    public function activate(Request $request){
        $contract = Contract::findOrFail($request->contractID);
        $contract->timestamps = false;
        $contract->enumStatus = 'Accepted';
        $contract->save();
        return response()->json(['contract'=>$contract]);
    }

    public function getquoteexchanges($intContractListID){
        $quotations = DB::table('tblquotation as quotation')
        ->leftjoin('tblquotationshistory as history','quotation.intQuotationID','intQHQuotationID')
        ->where('quotation.intQContractListID',$intContractListID)
        ->get();

        return response()->json(['quotations'=>$quotations]);
    }
}
