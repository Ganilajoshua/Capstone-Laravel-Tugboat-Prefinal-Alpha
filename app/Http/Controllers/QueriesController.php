<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class QueriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mtugboat = DB::table('tbltugboatmain as m')
        ->select(array('m.strName', DB::raw('COUNT(j.intJobOrderID) as counter')))
        ->join('tbltugboat as t', 'm.intTugboatMainID', 't.intTTugboatMainID')
        ->join('tblcompany as c', 't.intTCompanyID', 'c.intCompanyID')
        ->join('tbltugboatassign as a', 'a.intTATugboatID', 't.intTugboatID')
        ->join('tbljobsched as s','a.intTAssignID','s.intJSTugboatAssignID')
        ->join('tbljoborder as j','s.intJSJobOrderID','j.intJobOrderID')
        ->where('s.enumStatus', '=', 'Finished')
        ->groupBy('m.strName')
        ->get();

        $joborder = DB::table('tbljoborder')
        ->select(array('enumServiceType', DB::raw('COUNT(intJobOrderID) as counter')))
        ->groupBy('enumServiceTYpe')
        ->get();
        // :SELECT enumServiceType,
        // COUNT(intJobOrderID)
        // FROM tbljoborder
        // GROUP BY enumServiceTYpe;

        $paidjo = DB::table('tblcompany')
        ->select(array('strCompanyName', DB::raw('SUM(fltBalanceRemain) as counter')))
        ->join('tblinvoice','intCompanyID','intDTCompanyID')
        ->where('enumStatus','Pending')
        ->groupBy('intDTCompanyID')
        ->get();
        
        $cpending = DB::table('tblcompany')
        ->select(array('strCompanyName', DB::raw('SUM(fltBalanceRemain) as counter')))
        ->join('tblinvoice','intCompanyID','intDTCompanyID')
        ->where('enumStatus','Pending')
        ->groupBy('intDTCompanyID')
        ->get();

        
        $activeconsignee = DB::table('tblcompany as c')
        ->select(array('c.intCompanyID','strCompanyName', DB::raw('COUNT(intJobOrderID) as counter')))
        ->join('users as u','c.intCompanyID','u.intUCompanyID')
        ->join('tbljoborder as j','c.intCompanyID','j.intJOCompanyID')
        ->where('enumUserType','=','Consignee')
        ->groupBy('c.intCompanyID')
        ->get();

        $balance = DB::table('tblcompany as c')
        ->join('tblbalance as b','c.intCompanyID','b.intBalanceID')
        ->where('fltBalance','>',0)
        ->get();

        $renew = DB::table('tblcompany as c')
        ->select(array('c.strCompanyName', DB::raw('COUNT(cl.intCCompanyID) as counter')))
        ->join('tblcontractlist as cl','c.intCompanyID','cl.intCCompanyID')
        ->groupBy('cl.intCCompanyID')
        ->get();

        $cpaid = DB::table('tbljoborder as jo')
        ->select(array('jo.intJobOrderID','c.strCompanyName','jo.enumServiceType', 'i.fltBalanceRemain'))
        ->join('tbljobsched as js','js.intJSJobOrderID','jo.intJobOrderID')
        // ->join('tbldispatchticket as dt','dt.intDTJobSchedID','js.intJobSchedID')
        ->join('tbldispatchticket as dt','dt.intDispatchTicketID','js.intJSDispatchTicketID')
        ->join('tblinvoice as i','i.intIDispatchTicketID','dt.intDispatchTicketID')
        ->join('tblcompany as c','c.intCompanyID','jo.intJOCompanyID')
        ->where('i.enumStatus','Paid')
        ->get();

        $cunpaid = DB::table('tbljoborder as jo')
        ->select(array('jo.intJobOrderID','c.strCompanyName','jo.enumServiceType', 'i.fltBalanceRemain'))
        ->join('tbljobsched as js','js.intJSJobOrderID','jo.intJobOrderID')
        ->join('tbldispatchticket as dt','dt.intDispatchTicketID','js.intJSDispatchTicketID')
        ->join('tblinvoice as i','i.intIDispatchTicketID','dt.intDispatchTicketID')
        ->join('tblcompany as c','c.intCompanyID','jo.intJOCompanyID')
        ->where('i.enumStatus','Pending')
        ->get();
        // return response()->json(['dispatch'=>$dispatch]); 
        return view('Queries.index')
        ->with('mtugboat',$mtugboat)
        ->with('paidjo',$paidjo)
        ->with('cpending',$cpending)
        ->with('balance',$balance)
        ->with('activeconsignee',$activeconsignee)
        ->with('renew',$renew)
        ->with('cpaid',$cpaid)
        ->with('cunpaid',$cunpaid)
        ->with('joborder',$joborder);
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
}
