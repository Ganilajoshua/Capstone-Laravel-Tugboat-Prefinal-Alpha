<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\TugboatType; 

use DB;
class TugboatTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugtype = TugboatType::where('boolDeleted',0)->get();
        return view('TugboatType.index')->with('tugboattype',$tugtype);
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
        $type = new TugboatType;
        $type->timestamps = false;
        $type->strTugboatTypeName = $request->tugboatType;
        $type->save();
        return response()->json(['type'=>$type]);
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
    public function edit($intTugboatTypeID)
    {
        $type = TugboatType::findOrFail($intTugboatTypeID);
        return response()->json(['type'=>$type]);
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
        $type = TugboatType::findOrFail($request->tugboatTypeID);
        $type->timestamps = false;
        $type->strTugboatTypeName = $request->tugboatType;
        $type->save();
        return response()->json(['type'=>$type]);
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
    public function delete($intTugboatTypeID)
    {
        $type = TugboatType::findOrFail($intTugboatTypeID);
        $type->timestamps = false;
        $type->boolDeleted = 1;
        $type->save();
        return response()->json(['type'=>$type]);
    }
    public function activate(Request $request)
    {
        $tugboattype = TugboatType::findOrFail($request->activateID);
        if($tugboattype->isActive == 0){
            $tugboattype->timestamps = false;
            $tugboattype->isActive = 1;
            $tugboattype->save();
        }else{
            $tugboattype->timestamps = false;
            $tugboattype->isActive = 0;
            $tugboattype->save();
        }
        return response(['goods'=>$tugboattype]);
    }
}
