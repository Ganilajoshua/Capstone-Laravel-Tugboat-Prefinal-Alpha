<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Response;
use Illuminate\Response\JsonResponse;

use Auth;
use DB;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reschedule = DB::table('tbljoborder as joborder')
        ->join('tblreschedule as resched','joborder.intJobOrderID','resched.intRJobOrderID')
        ->join('tblcompany as company','joborder.intJOCompanyID','company.intCompanyID')
        ->where('joborder.enumStatus','For Rescheduling')
        ->get();

        return view('Requests.index',compact('reschedule'));
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
        //
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

    public function reschedule(Request $request){
        
    }

    public function voidjoborder(Request $request){
        
    }
}
