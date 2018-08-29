<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Response;

use App\Pier;

class PierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piers = Pier::where('boolDeleted',0)
        ->orderBy('intPierID','Desc')
        ->get();
        return view('Pier.index')->with('piers',$piers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'pierName' => 'required'
        ]);

        $Pier = new Pier;
        $Pier->timestamps = false;
        $Pier->strPierName = $request->pierName;
        $Pier->boolDeleted = 0;
        $Pier->save();

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
    public function edit($intPierID)
    {
        $piers = Pier::findOrFail($intPierID);
        return response()->json(['piers' => $piers]);
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
        
        $pier = Pier::findOrFail($request->pierID);
        $pier->timestamps = false;
        $pier->strPierName = $request->pierName;
        $pier->save();
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

    public function delete($intPierID)
    {
        $pier = Pier::findOrFail($intPierID);
        $pier->timestamps = false;
        $pier->boolDeleted = 1;
        $pier->save();
        return response()->json(['pier' => $pier]);
    }
    public function activate(Request $request)
    {
        $pier = Pier::findOrFail($request->activateID);
        if($pier->isActive == 0){
            $pier->timestamps = false;
            $pier->isActive = 1;
            $pier->save();
        }else{
            $pier->timestamps = false;
            $pier->isActive = 0;
            $pier->save();
        }
        return response(['pier'=>$pier]);
        
    }
}
