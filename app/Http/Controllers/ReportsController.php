<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Reports.index');
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
    public function printPDF1()
    {
        $pdf = PDF::loadView('Reports.disabledTReportPDF');
        return $pdf->download('disabledtugboatreport.pdf');
    }
    public function printPDF2()
    {
        $pdf = PDF::loadView('Reports.jobOrderReportPDF');
        return $pdf->download('jobOrderReport.pdf');
    }
    public function printPDF3()
    {
        $pdf = PDF::loadView('Reports.salesReportPDF');
        return $pdf->download('salesReport.pdf');
    }
    public function printPDF4()
    {
        $pdf = PDF::loadView('Reports.soaPDF');
        return $pdf->download('soa.pdf');
    }
    public function printPDF5()
    {
        $pdf = PDF::loadView('Reports.serviceReportPDF');
        return $pdf->download('serviceReport.pdf');
    }
}
