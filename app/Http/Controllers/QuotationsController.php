<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Quotations;
use App\QuotationFees;
use DB;

class QuotationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations = Quotations::where('boolDeleted',0)->get();
        return view('Quotations.newIndex')->with('quotations',$quotations);

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

        $maxID = Quotations::max('intQuotationID') + 1;
        $quotations = new Quotations;
        $quotations->timestamps = false;
        $quotations->intQuotationID = $maxID;
        $quotations->strQuotationTitle = $request->quotationTitle;
        $quotations->strQuotationDesc = $request->quotationDetails;
        $quotations->fltStandardRate  = $request->quotationStandardFees;
        $quotations->fltQuotationTDelayFee = $request->quotationDelayFee;
        $quotations->fltQuotationViolationFee = $request->quotationViolationFee;
        $quotations->fltQuotationConsigneeLateFee = $request->quotationLateFee;
        $quotations->fltMinDamageFee = $request->quotationMinDamage;
     
        $quotations->fltMaxDamageFee = $request->quotationMaxDamage;
        $quotations->intDiscount = $request->quotationDiscount;
     
        $quotations->save();

        // for($count=0; $count < count($request->quotationFeesDesc); $count++){
        //     $qfees = new QuotationFees;
        //     $qfees->timestamps = false;
        //     $qfees->strQuotationFeeDesc = $request->quotationFeesDesc[$count];
        //     $qfees->fltFees = $request->quotationFees[$count];
        //     $qfees->intQFQuotationID = $maxID;
        //     $qfees->save();
        // }
        return response()->json(['data'=> $quotations]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($intQuotationID)
    {
        $quotation = Quotations::findOrFail($intQuotationID);
        $fees = QuotationFees::where('intQFQuotationID',$intQuotationID)->get();
        return response()->json(['quotation'=>$quotation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($intQuotationID)
    {
        $quotations = Quotations::findOrFail($intQuotationID);
        
        // $qfees = DB::table('tblquotationfees as fees')
        // ->select('fees.*')
        // ->where('fees.intQFQuotationID',$intQuotationID)
        // ->get();
        $qfees = QuotationFees::where('intQFQuotationID',$intQuotationID)->get();
        $fees = Quotations::all();

        return response()->json(['q'=>$fees, 'quotations'=>$quotations, 'fees'=> $qfees]);
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
        $quotations = Quotations::findOrFail($request->quotationID);
        $quotations->timestamps = false;
        $quotations->strQuotationTitle = $request->quotationTitle;
        $quotations->strQuotationDesc = $request->quotationDetails;
        $quotations->save();
        for($count=0;$count < count($request->editQuotationDesc);$count++){
            $fees= QuotationFees::findOrFail($request->editQuotationFeeID[$count]);
            $fees->timestamps = false;
            $fees->strQuotationFeeDesc = $request->editQuotationDesc[$count];
            $fees->fltFees = $request->editQuotationFees[$count];
            $fees->save();  
        }
        if(empty($request->newquotationDesc))
        {
            return response()->json(['quotations'=>$quotations,'count'=> $request->newquotationDesc]);            
        }else{
            for($count=0;$count < count($request->newquotationDesc); $count++)
            {
                $new = new QuotationFees;
                $new->timestamps = false;
                $new->strQuotationFeeDesc = $request->newquotationDesc[$count];
                $new->fltFees = $request->newquotationFees[$count];
                $new->intQFQuotationID = $request->quotationID;
                $new->save();    
            }
            return response()->json(['quotations'=>$quotations,'count'=> $request->newquotationDesc]);
        }
        // $count = count($request->newquotationDesc);
        // $array = collect($request->newQuotationDesc)
        
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
    public function delete($intQuotationID)
    {
        $quotation = Quotations::findOrFail($intQuotationID);
        $quotation->timestamps = false;
        $quotation->boolDeleted = 1;
        $quotation->save();
        
        $fees = QuotationFees::where('intQFQuotationID',$intQuotationID)->get();
        if(empty($fees)){
            return response()->json(['fees' => $fees]);   
        }else{
            for($count=0; $count < count($fees); $count++){
                $qfees = QuotationFees::findOrFail($fees[$count]->intQuotationFeeID);
                $qfees->timestamps = false;     
                $qfees->boolDeleted = 1;
                $qfees->save();
            }
            return response()->json(['fees' => $fees]);   
        }
        return response()->json(['fees' => $fees]);  
    }
}
