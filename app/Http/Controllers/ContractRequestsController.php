<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Contract;
use App\Company;
use App\Quotations;
use App\TermsandCondition;
use App\Agreements;
use App\Standard;
use App\QuotationFees;
use App\ContractFeesMatrix;
use App\FinalContractFeesMatrix;

class ContractRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $companyPending = DB::table('tblcontractlist as contracts')
        ->join('tblcompany as company','contracts.intCCompanyID','company.intCompanyID')
        ->where('contracts.boolDeleted',0)
        ->where('contracts.enumStatus','!=','Finalized')
        ->get();

        $companyRChanges = DB::table('tblcontractlist as contracts')
        ->join('tblcompany as company','contracts.intCCompanyID','company.intCompanyID')
        ->where('contracts.boolDeleted',0)
        ->where('contracts.enumStatus','!=','Finalized')
        ->get();
        
        $companyAccepted = DB::table('tblcontractlist as contracts')
        ->join('tblcompany as company','contracts.intCCompanyID','company.intCompanyID')
        ->where('contracts.boolDeleted',0)
        ->where('contracts.enumStatus','!=','Finalized') 
        ->get();
        
        $company2 = DB::table('tblcontractlist')
        ->join('tblcompany','tblcontractlist.intCCompanyID','tblcompany.intCompanyID')
        ->where('tblcompany.boolDeleted', 0)
        ->get();
        
        $activation = DB::table('tblcontractlist as contracts')
        ->join('tblcompany as company','company.intCompanyID','contracts.intCCompanyID')
        ->where('contracts.enumStatus','For Activation')
        ->get();

        $quotations = Quotations::where('boolDeleted',0)->get();
       
        return view('ContractsRequests.index',
        compact('companyPending','company2','companyRChanges','companyAccepted','quotations','activation'));
        // ->with('companyPending',$companyPending)
        // ->with('company2',$company2)
        // ->with('companyRChanges',$companyRChanges)
        // ->with('companyAccepted',$companyAccepted)
        // ->with('quotations',$quotations);
        // return response()->json(['company'=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($intContractID)
    {
        $contract = Contract::findOrFail($intContractID);
        $contracts = $contract->intCCompanyID;
        $company = Company::findOrFail($contracts);
        $contractsfees = ContractFeesMatrix::all();
        return response()->json(['company'=>$company,'contract'=>$contract,'contractfees'=>$contractsfees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $contract = Contract::findOrFail($request->contractID);
        $quotationID = $contract->intContractListID;
        $contract->timestamps = false;
        $contract->strContractListTitle = $request->contractTitle;
        $contract->strContractListDesc = $request->contractDetails;
        $contract->enumConValidity = $request->contractValidity;
        
        $contract->enumStatus = 'Created';
        $contract->save();

        for($count = 0; $count < count($request->servicetype); $count++){
            $quotation = new Quotations;
            $quotation->timestamps = false;
            $quotation->enumServiceType = $request->servicetype[$count];
            $quotation->intQContractListID = $quotationID;
            $quotation->fltStandardRate = $request->standardFee[$count];
            $quotation->fltQuotationTDelayFee = $request->delayFee[$count];
            $quotation->fltQuotationViolationFee = $request->violationFee[$count];
            $quotation->fltQuotationConsigneeLateFee = $request->latefee[$count];
            $quotation->fltMinDamageFee = $request->minDamage[$count];
            $quotation->fltMaxDamageFee = $request->maxDamage[$count];
            $quotation->intDiscount = $request->discount[$count];
            $quotation->save();
        }
        // $quotation = new Quotations; 
        // $quotation->timestamps = false;
        // $quotation->fltQuotationTDelayFee = $request->contractDelayFee;
        // $quotation->fltQuotationViolationFee = $request->contractViolationFee;
        // $quotation->fltQuotationConsigneeLateFee = $request->contractLateFee;
        // $quotation->fltMinDamageFee = $request->contractMinDamage;
        // $quotation->fltMaxDamageFee = $request->contractMaxDamage;
        // $quotation->fltStandardRate = $request->contractStandardFee;
        // $quotation->intDiscount = $request->contractDiscount;
        // $quotation->intQContractListID = $quotationID;
        
        $quotation->save();
        return response()->json(['contract'=>$contract]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        // if($request->standardID ==null || $request->termsID ==null || $request->agreementID ==null $request->quotationsID ==null){
        //     return response()->json(['null'=>'null']);
        // }`
        // if(empty($request->standardID)||empty($request->termsID)||empty($request->agreementID)||empty($request->quotationsID)){
        //     return response([]);
        // }else{
            
            $quotations = Quotations::findOrFail($request->quotationsID);
            // $terms = TermsandCondition::findOrFail($request->termsID);
            // $agreements = Agreements::findOrFail($request->agreementID);
            
            
            return response()->json([
                'quotations'=>$quotations,
                ]);
        
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
    public function finalizecontract(Request $request){
        $contract = Contract::findOrFail($request->contractID);
        $contract->strAdminSign = $request->sign;
        $contract->timestamps = false;
        $contract->enumStatus = 'Finalized';
        $contract->save();

        $quotations = Quotations::where('intQContractListID',$request->contractID)->get();

        for($count = 0; $count < count($quotations); $count++){
            $finalfees = new FinalContractFeesMatrix;
            $finalfees->timestamps = false;
            $finalfees->intFCFContractListID = $quotations[$count]->intQContractListID;
            $finalfees->enumFCFServiceType = $quotations[$count]->enumServiceType;
            $finalfees->fltFCFStandardRate = $quotations[$count]->fltStandardRate;
            $finalfees->fltFCFConsigneeLateFee = $quotations[$count]->fltQuotationConsigneeLateFee;
            $finalfees->fltFCFTugboatDelayFee = $quotations[$count]->fltQuotationTDelayFee;
            $finalfees->fltFCFViolationFee = $quotations[$count]->fltQuotationViolationFee;
            $finalfees->fltFCFMinDamageFee = $quotations[$count]->fltMinDamageFee;
            $finalfees->fltFCFMaxDamageFee = $quotations[$count]->fltMaxDamageFee;
            $finalfees->intFCFDiscountFee = $quotations[$count]->intDiscount;
            $finalfees->save();
        }

        return response()->json(['contract'=>$contract,'finalfees'=>$finalfees]);

    }

    public function activate(Request $request){
        $contract = Contract::findOrFail($request->contractID);
        $contract->strAdminSign = $request->sign;
        $contract->timestamps = false;
        $contract->enumStatus = 'Active';
        $contract->datContractActive = $request->contractActive;
        $contract->datContractExpire = $request->contractExpire;
        $contract->save();
        
        return response()->json(['contract'=>$contract]);
    }
    public function requestchanges($intContractListID)
    {
        $contractList = Contract::findOrFail($intContractListID);
        $quotation = Quotations::where('intQContractListID',$intContractListID)->get();
        $company = Company::where('intCompanyID',$contractList->intCCompanyID)->get();
        // $contract = DB::table('tblcontractlist as contract')
        // ->join('tblquotation as quotation','contract.intContractListID','quotation.intQContractListID')
        // ->where('contra')
        // ->get();
        // $compname = $contract->intCCompanyID;
        // Contract::findOrFail($intContractID);
        // $contracts = $contract->intCCompanyID;
        // $company = Company::findOrFail($contracts);
        return response()->json(['company'=>$company,'quotation'=>$quotation,'contract'=>$contractList]);
    }
    public function getactive($intContractListID)
    {
        $contract = Contract::findOrFail($intContractListID);
        return response()->json(['contract'=>$contract]);
    }

    public function getnotifs(Request $request){
        $contract = Contract::where('enumStatus','!=','Finalized')
        ->where('enumStatus','!=','Created')
        ->get();
        return response()->json(['contract'=>$contract]);
    }
    public function saverequestchanges(Request $request){
        $contract = Contract::findOrFail($request->editHCompany);
        $quotationID = $contract->intContractListID;
        $contract->timestamps = false;
        $contract->strContractListTitle = $request->editContractTitle;
        $contract->strContractListDesc = $request->editContractD;
        $contract->enumConValidity = $request->editContractV;
        
        $contract->enumStatus = 'Created';
        $contract->save();
        // $quotes = Quotations::where('intQContractListID',$quotationID)->get();
        // $quotation = new Quotations; 
        $quotation = Quotations::findOrFail($request->editHQuote);
        $quotation->timestamps = false;
        $quotation->fltQuotationTDelayFee = $request->editDelayFee;
        $quotation->fltQuotationViolationFee = $request->editViolationFee;
        $quotation->fltQuotationConsigneeLateFee = $request->editLateFee;
        $quotation->fltMinDamageFee = $request->editMinDamage;
        $quotation->fltMaxDamageFee = $request->editMaxDamage;
        $quotation->fltStandardRate = $request->editStandardFee;
        $quotation->intDiscount = $request->editD;
        $quotation->intQContractListID = $quotationID;
        
        $quotation->save();
        return response()->json(['contract'=>$contract, 'quotation'=> $quotation]);
    }
}
