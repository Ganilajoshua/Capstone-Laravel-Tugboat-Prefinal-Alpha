<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employees;
use App\Position;
use DB;
use Auth;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employee = Employees::where('boolDeleted', 0)->get();
        $employee = DB::table('tblemployee as employee')
        ->join('tblposition as position','employee.intEPositionID','position.intPositionID')
        ->where('employee.intECompanyID',Auth::user()->intUCompanyID)
        ->where('employee.boolDeleted',0)
        ->get();
        $position = Position::where('boolDeleted',0)
        ->where('intPCompanyID',Auth::user()->intUCompanyID)->get();
        return view('Employees.index')
        ->with('employees', $employee)
        ->with('positions', $position);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = Position::where('boolDeleted',0)->get();
        $employee = Employees::where('boolDeleted',0)->get();
        return view('Employees.create')->with('positions',$position)->with('employees',$employee);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $employee = new Employees;
        $employee->timestamps = false;
        $employee->intECompanyID = Auth::user()->intUCompanyID;
        $employee->intEPositionID = $request->position;
        $employee->strLName = $request->lastName;
        $employee->strFName = $request->firstName;
        $employee->strMName = $request->middleName;
        $employee->enumEmpType = $request->employeeType;
        $employee->boolDeleted = 0;
        $employee->save();
        return response()->json(["employee" => $employee]);
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
    public function edit($intEmployeeID)
    {
        $employee = Employees::find($intEmployeeID);
        return response()->json(['employee' => $employee]);
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

        $employee = Employees::findOrFail($request->positionID);
        $employee->timestamps = false;
        
        $employee->intEPositionID = $request->position;
        $employee->strLName = $request->lastName;
        $employee->strFName = $request->firstName;
        $employee->strMName = $request->middleName;
        $employee->enumEmpType = $request->employeeType;
        $employee->save();

        return response()->json(['employee' => $employee]);
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
    public function delete($intEmployeeID)
    {
        $employees = Employees::find($intEmployeeID);
        $employees->timestamps = false;
        $employees->boolDeleted = 1;
        $employees->save();

        return response()->json(['employees' => $employees]);
    }
}
