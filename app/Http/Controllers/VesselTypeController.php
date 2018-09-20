<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use App\VesselType;

use Redirect;
use Auth;
use DB;

class VesselTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vesseltype = VesselType::where('boolDeleted',0)->get();
        return view('VesselType.index',compact('vesseltype'));
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
        try{
            DB::beginTransaction();
            $vessel = new VesselType;
            $vessel->timestamps = false;
            $vessel->strVesselTypeName = $request->vesselTypeName;
            $vessel->save();
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }
        return response()->json(['vessel'=>$vessel]);
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
    public function edit($intVesselTypeID)
    {
        $vessel = VesselType::findOrFail($intVesselTypeID);
        return response()->json(['vessel'=>$vessel]);
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
        try{
            DB::beginTransaction();
            $vessel = VesselType::findOrFail($request->vesselTypeID);
            $vessel->timestamps = false;
            $vessel->strVesselTypeName = $request->vesselTypeName;
            $vessel->save();
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }
        return response()->json(['vessel'=>$vessel]);
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

    public function delete($intVesselTypeID){
        $vessel = VesselType::findOrFail($intVesselTypeID);
        $vessel->timestamps = false;
        $vessel->boolDeleted = 1;
        $vessel->save();
        return response()->json(['vessel'=>$vessel]);
    }
}
