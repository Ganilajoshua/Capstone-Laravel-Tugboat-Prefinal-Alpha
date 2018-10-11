<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Position;

use Auth;
use DB;

class TeamCompositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamcomp = Position::where('intPCompanyID',Auth::user()->intUCompanyID)
        ->where('boolDeleted',0)
        ->get();
        return view('Utilities.TeamComposition.index',compact('teamcomp'));
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
    public function update(Request $request)
    {
        try{
            DB::beginTransaction();
            for($counter = 0; $counter < count($request->teamcompID); $counter++){
                $teamcomp = Position::findOrFail($request->teamcompID[$counter]);
                $teamcomp->timestamps = false;
                $teamcomp->intPositionCompNum = $request->teamcompnumber[$counter];
                $teamcomp->save();
            }
            DB::commit();
        }catch(\Illuminate\Database\QueryException $errors){
            DB::rollback();
            $errorMessage = $errors->getMessage();
            return Redirect::back()->withErrors($errorMessage);
        }
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
}
