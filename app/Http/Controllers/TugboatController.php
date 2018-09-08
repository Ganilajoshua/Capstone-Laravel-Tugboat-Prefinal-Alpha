<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use Carbon\Carbon;    
use App\TeamAssignment;
use App\Tugboat;
use App\TugboatClass;
use App\TugboatMainSpecifications;
use App\TugboatSpecifications;
use App\TugboatType;
use App\TugboatInsurances;
use App\Company;

use Auth;
use DB;

class TugboatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugboat = DB::table('tbltugboat as tugboat')
        ->join('tbltugboatmain as main','tugboat.intTTugboatMainID','main.intTugboatMainID')
        ->join('tbltugboatclass as class','tugboat.intTTugboatClassID','class.intTugboatClassID')
        ->join('tbltugboatspecs as specs','tugboat.intTTugboatSpecsID','specs.intTugboatSpecsID')
        ->join('tblcompany as company','tugboat.intTCompanyID','company.intCompanyID')
        ->where('tugboat.boolDeleted',0)
        ->where('tugboat.intTCompanyID',Auth::user()->intUCompanyID)
        ->get();    
        // $tugboat = TugboatMainSpecifications::where('boolDeleted',0)
        // ->where('intTCompanyID',Auth::user()->intUCompanyID)
        // ->get();

        $tugboattype = TugboatType::where('boolDeleted',0)
        ->where('isActive',1)
        ->get();
        $maxMain = TugboatMainSpecifications::max('intTugboatMainID');
        $maxSpecs = TugboatSpecifications::max('intTugboatSpecsID');
        $maxClass = TugboatClass::max('intTugboatClassID');
        $maxTug = Tugboat::max('intTugboatID');
        
        return view('Tugboat.index')
        ->with('tugboats',$tugboat)
        ->with('maxClassID', $maxClass)
        ->with('maxSpecsID', $maxSpecs)
        ->with('maxMainID', $maxMain)
        ->with('maxTugboatID', $maxTug)
        ->with('tugboattype',$tugboattype);
        // return response()->json(['tugboat'=>$tugboat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tugboat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = Company::findOrFail(Auth::user()->intUCompanyID);
        $tugboat = Tugboat::max('intTugboatID')+1;
        $maxID = $tugboat;
        $assign = new TeamAssignment; 
        $class = new TugboatClass;
        $main = new TugboatMainSpecifications;
        $tugboat = new Tugboat;
        $specs = new TugboatSpecifications;
        //assignment of ID's    
        $tugboat->intTugboatID = $maxID;    
        $tugboat->intTTugboatClassID = $maxID;
        $tugboat->intTTugboatMainID = $maxID;
        $tugboat->intTTugboatSpecsID = $maxID;
        $tugboat->intTCompanyID = $company->intCompanyID;
        $class->intTugboatClassID = $maxID;
        $main->intTugboatMainID = $maxID;
        $specs->intTugboatSpecsID = $maxID;
        $assign->intTAssignID = $maxID; 
        //no Timestamps
        $main->timestamps = false;
        $class->timestamps = false;
        $tugboat->timestamps = false;
        $specs->timestamps = false;
        $assign->timestamps = false;
        //Class
        $class->strClassNum = $request->classNum;
        $class->strOfficialNum = $request->officialNum;
        $class->strOwner = $company->strCompanyName;
        $class->strTugboatFlag = $request->tugboatFlag;
        $class->intTCTugboatTypeID = $request->tugboatType;
        $class->strIMONum = $request->imoNum;
        $class->strTradingArea = $request->tradingArea;
        $class->strHomePort = $request->homePort;
        $class->enumISPSCodeCompliance = $request->ispsComp;
        $class->enumISMCodeStandard = $request->ismCode;
        //main Information
        $main->strName = $request->tugboatName;
        $main->strLength = $request->length;
        $main->strBreadth = $request->breadth;
        $main->strDepth = $request->depth;
        $main->strHorsePower = $request->horsePower;
        $main->strMaxSpeed = $request->maxSpeed;
        $main->strBollardPull = $request->bollardPull;
        $main->strGrossTonnage = $request->grossTonnage;
        $main->strNetTonnage = $request->netTonnage;
        $main->datLastDrydocked = Carbon::parse($request->lastDryDocked)->format('Y/m/d');
        //Specifications
        $specs->strLocationBuilt = $request->locationBuilt;
        $specs->datBuiltDate = Carbon::parse($request->dateBuilt)->format('Y/m/d');
        $specs->strMakerPower = $request->makerPower;
        $specs->strHullMaterial = $request->hullMaterial;
        $specs->strBuilder = $request->builder;
        $specs->strDrive = $request->drive;
        $specs->strCylinderperCycle = $request->cylinderpercycle;
        $specs->strAuxEngine = $request->auxEngine;
        $specs->enumAISGPSVHFRadar = $request->navEquipments;
        //Insurances 
        //tugboatassignment
        $assign->intTAssignID = $maxID;
        $assign->intTATugboatID = $maxID;
        
        $class->save();
        $specs->save();
        $main->save();
        $tugboat->save();
        $assign->save();
        
        for($count = 0; $count < count($request->insurances); $count++){
            $insurances = new TugboatInsurances;
            $insurances->timestamps = false;
            $insurances->strTugboatInsuranceDesc = $request->insurances[$count];
            $insurances->intTITugboatID = $maxID;
            $insurances->save();
        }
        return response()->json(['class' => $class,'main' => $main, 'specs' => $specs, 'tugboat' => $tugboat,'insurances'=>$insurances]);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePictures(Request $request)
    {

    }
    public function updateMain(Request $request)
    {
        $tugboat = TugboatMainSpecifications::findOrFail($request->mainID);
        $tugboat->timestamps = false;
        $tugboat->strName = $request->tugboatName;
        $tugboat->strDepth = $request->depth;
        $tugboat->strLength = $request->length;
        $tugboat->strBreadth = $request->breadth;
        $tugboat->strHorsePower = $request->horsePower;
        $tugboat->strMaxSpeed = $request->maxSpeed;
        $tugboat->strBollardPull = $request->bollardPull;
        $tugboat->strGrossTonnage = $request->grossTonnage;
        $tugboat->strNetTonnage = $request->netTonnage;
        $tugboat->datLastDrydocked = Carbon::parse($request->lastDryDocked)->format('Y/m/d');
        $tugboat->save();
        return response()->json(['tugboat' => $tugboat]);

    }
    public function updateSpecs(Request $request)
    {
        $specs = TugboatSpecifications::findOrFail($request->specsID);
        $specs->timestamps = false;
        $specs->strHullMaterial = $request->hullMaterial;
        $specs->strBuilder = $request->builder;
        $specs->strMakerPower = $request->makerPower;
        $specs->strDrive = $request->drive;
        $specs->strCylinderperCycle = $request->cylinderpercycle;
        $specs->strAuxEngine = $request->auxEngine;
        $specs->strLocationBuilt = $request->builtIn;
        $specs->save();
        return response()->json(['specs' => $specs]);

    }
    public function updateClass(Request $request)
    {
        $specs = TugboatSpecifications::findOrFail($request->classID);
        $specs->timestamps = false;
        $specs->enumAISGPSVHFRadar = $request->navigation;
        $specs->save();
        $class = Tugboatclass::findOrFail($request->classID);
        $class->timestamps = false;
        $class->intTCTugboatTypeID = $request->tugboatType;
        $class->strClassNum = $request->classNum;
        $class->strOfficialNum = $request->officialNum;
        $class->strIMONum = $request->imoNum;
        $class->strTugboatFlag = $request->tugboatFlag;
        $class->strTradingArea = $request->tradingArea;
        $class->strHomePort = $request->homePort;
        $class->enumISPSCodeCompliance = $request->ispsComp;
        $class->enumISMCodeStandard = $request->ismCode;
        $class->save(); 
        return response()->json(['class' => $class]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

     /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function please($intTugboatMainID)
    {
        $class = DB::table('tbltugboatclass as class')
        ->join('tbltugboattype as type','class.intTCTugboatTypeID','type.intTugboatTypeID')
        ->where('intTugboatClassID',$intTugboatMainID)
        ->get(); 
        // TugboatClass::findOrFail($intTugboatMainID);
        $main = TugboatMainSpecifications::findOrFail($intTugboatMainID);
        $specs = TugboatSpecifications::findOrFail($intTugboatMainID);
        $insurances = TugboatInsurances::where('intTITugboatID',$intTugboatMainID)->get();
        $maxMain = TugboatMainSpecifications::max('intTugboatMainID');
        $maxSpecs = TugboatSpecifications::max('intTugboatSpecsID');
        $maxClass = TugboatClass::max('intTugboatClassID');
        $maxTugboat = Tugboat::max('intTugboatID');
        $maxID = [
            'tugboatID' => $maxTugboat,
            'classID' => $maxClass,
            'mainID' => $maxMain,
            'specsID' => $maxSpecs
        ];
        $tugboat = TugboatMainSpecifications::findOrFail($intTugboatMainID);
        return response()->json(['class'=> $class,'main' => $main, 'specs' => $specs, 'insurances'=>$insurances, 'maxID' => $maxID]);    
    }

    public function maxid(Request $request){
        $maxMain = TugboatMainSpecifications::max('intTugboatMainID');
        $maxSpecs = TugboatSpecifications::max('intTugboatSpecsID');
        $maxClass = TugboatClass::max('intTugboatClassID');
        $maxTugboat = Tugboat::max('intTugboatID');

        $maxID = [
            'tugboatID' => $maxTugboat,
            'classID' => $maxClass,
            'mainID' => $maxMain,
            'specsID' => $maxSpecs
        ];
        return response()->json(['idList' => $maxID]);
    }
    public function delete($intTugboatMainID)
    {
        $class = TugboatClass::findOrFail($intTugboatMainID);
        $main = TugboatMainSpecifications::findOrFail($intTugboatMainID);
        $specs = TugboatSpecifications::findOrFail($intTugboatMainID);
        $tugboat = Tugboat::findOrFail($intTugboatMainID);
        
        $class->timestamps = false;
        $main->timestamps = false;
        $specs->timestamps = false;
        $tugboat->timestamps = false;
        
        $class->boolDeleted = 1;
        $main->boolDeleted = 1;
        $specs->boolDeleted = 1;
        $tugboat->boolDeleted = 1;
        
        $main->save();
        $class->save();
        $specs->save();
        $tugboat->save();
        return response()->json(['tugboat' => $tugboat]);
    }
    
}
