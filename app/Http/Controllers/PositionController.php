<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Position;
use Auth;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position = Position::where('boolDeleted',0)
        ->where('intPCompanyID',Auth::user()->intUCompanyID)->get();
        return view('Position.newIndex')->with('positions',$position);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Position.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $position = new Position;
        $position->timestamps = false;
        $position->intPCompanyID = Auth::user()->intUCompanyID;
        $position->strPositionName = $request->Name;
        $position->boolDeleted = 0;
        $position->save();
        
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
    public function edit($intPositionID)
    {
        $position = Position::find($intPositionID);
        return view('Position.edit')->with('positions',$position);
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
        $position = Position::findOrFail($request->positionID);
        $position->timestamps = false;
        $position->strPositionName = $request->positionName;
        $position->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Complete Deletion
    public function destroy($id)
    {
        //
    }
    //Soft Deletion
    public function delete($intPositionID)
    {
        $position = Position::findOrFail($intPositionID);
        $position->timestamps = false;
        $position->boolDeleted = 1;
        $position->save();
        return response()->json(['positions' => $position]);
    }
    public function get($intPositionID)
    {
        
        $positions = Position::findOrFail($intPositionID);
        return response()->json(['position' => $positions]);
    }

}
