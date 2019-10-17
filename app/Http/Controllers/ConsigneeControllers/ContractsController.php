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
        
        $contractListFinal = DB::table('users as users')
        ->leftjoin('tblcompany as company','users.intUCompanyID','company.intCompanyID')
        ->join('tblcontractlist as contracts','company.intCompanyID','contracts.intCCompanyID')
        ->join('tblfinalcontractfeesmatrix as matrix','contracts.intContractListID','matrix.intFCFContractListID')
        ->where('contracts.intCCompanyID',Auth::user()->intUCompanyID)
        ->select('company.*','contracts.*','users.*','matrix.*')
        // ->where('contracts.intCQuotationID',null)
        ->get();
        $fees = ContractFeesMatrix::all();
        return view('Consignee.Contracts.index',compact('company','contract','contractList','fees','contractListFinal'));
        // ->with('company',$company)
        // ->with('contract',$contract)
        // ->with('contractList',$contractList);
        // undefined offset[0] pag walang company na connected sa user
        return response()->json(['list'=>$contractList]);
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
    public function show()
    {
        $contract = Company::where('intCompanyID', Auth::user()->intUCompanyID)->get();
        // $contract = DB::table('tblcontractlist as contract');

        // ->join('tblquotation as quotation','contract.intContractListID','quotation.intQContractListID')
        // ->where('contracts.intCCompanyID',Auth::user()->intUCompanyID)
        // ->get();
        return response()->json(['contract'=>$contract]);
        

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
        $contract->strConsigneeSign = $request->sign;
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

    public function custommatrix(Request $request){
        $contract = new Contract;
        $contract->timestamps = false;
        $contract->intCCompanyID = Auth::user()->intUCompanyID;
        $contract->isDefault = 'No';
        $contract->save();
        // return response()->json(['contract'=>$contract]);

        for($count = 0; $count < count($request->serviceType); $count++){
            $quotation = new Quotations;
            $quotation->timestamps = false;
            $quotation->enumServiceType = $request->serviceType[$count];
            $quotation->intQContractListID = Contract::max('intContractListID');
            $quotation->fltStandardRate = $request->standardRate[$count];
            $quotation->fltQuotationTDelayFee = $request->delayFee[$count];
            $quotation->fltQuotationViolationFee = $request->violationFee[$count];
            $quotation->fltQuotationConsigneeLateFee = $request->lateFee[$count];
            $quotation->fltMinDamageFee = $request->minDamage[$count];
            $quotation->fltMaxDamageFee = $request->maxDamage[$count];
            $quotation->intDiscount = $request->discount[$count];
            $quotation->save();
        }
        return response()->json([$request->all()]);
    }
}
