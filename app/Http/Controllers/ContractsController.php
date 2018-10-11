<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Response;
use Illuminate\Support\Facades\DB;

use App\Contractlist;
use App\Company;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = DB::table('tblcontractlist as contracts')
        ->join('tblcompany as company','contracts.intCCompanyID','company.intCompanyID')
        ->where('contracts.boolDeleted', 0)
        ->get();
        return view ('Contracts.index')->with('company',$company);
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
        $contract->strContractListTitle = $request->contractTitle;
        $contract->intCAgreementID = $request->contractAgreements;
        $contract->intCTermsConditionID = $request->contractTermsCondition;
        $contract->strContractListDesc = $request->contractDetails;
        $contract->boolDeleted = 0;
        $contract->save();
        return response()->json(['contracts'=>$contract]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($intContractListID)
    {
        $contract = Contract::findOrFail($intContractListID);
        return response()->json(['contracts' => $contract]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($intContractListID)
    {
        $contract = Contract::findOrFail($intContractListID);
        return response()->json(['contracts' => $contract]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $contract = Contract::findOrFail($request->contractID);
        $contract->timestamps = false;
        $contract->strContractListTitle = $request->title;
        $contract->strContractListDesc = $request->details;
        $contract->save();
        return response()->json(['contracts' => $contract]);
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
    public function delete($intContractListID)
    {
        $contract = Contract::findOrFail($intContractListID);
        $contract->timestamps = false;
        $contract->boolDeleted = 1;
        $contract->save();
        return response()->json(['contracts' => $contract]);
    }
}
