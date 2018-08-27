<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Standard;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $standard = Standard::where('boolDeleted',0)->get();
        return view ('Standard.index')->with('standard',$standard);
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
        $standard = new Standard;
        $standard->timestamps = false;
        $standard->strStandardDesc = $request->standardDesc;
        $standard->fltSDeliveryRate = $request->standardFees;
        $standard->save();
        return response()->json(['standard'=>$standard]); 
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
    public function edit($intStandardID)
    {
        $standard = Standard::findOrFail($intStandardID);
        return response()->json(['standard'=>$standard]);
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
        $standard = Standard::findOrFail($request->standardID);
        $standard->timestamps = false;
        $standard->strStandardDesc = $request->standardDesc;
        $standard->fltSDeliveryRate = $request->standardFees;
        $standard->save();
        return response()->json(['standard'=>$standard]); 
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
    public function delete($intStandardID)
    {
        $standard = Standard::findOrFail($intStandardID);
        $standard->timestamps = false;
        $standard->boolDeleted = 1;
        $standard->save();
        return response()->json(['standard'=>$standard]); 
    }
}
