<div class="addLayout">
    <div class="card animated bounceInLeft">
        <div class="card-header bg-primary">
            <span>
                  <a href="#" class="btnBack btn btn-lg btn-link float-left mt-2 text-white" data-toggle="tooltip"  title="Back" role="button">
                    <i class="ion-chevron-left"></i>
                  </a>
                  <h3 class="text-center mr-5 mt-2 text-white">ADD</h3>
                </span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong> Fields with <sup class="text-white">&#10033;</sup> are required.</strong>
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="smartwizard">
                <ul>
                    <li><a href="#step-1">Main Information<br/><small>First Step</small></a></li>                    
                    <li><a href="#step-2">Tugboat Specification<br/><small>Second Step</small></a></li>
                    <li><a href="#step-3">Tugboat Classification<br/><small>Third Step</small></a></li>
                    <li><a href="#step-4">Tugboat Picture<br/><small>Fourth Step</small></a></li>
                </ul>
                <div> 
                    <div id="step-1" class="ml-3 mt-3 mr-3">
                        <form id="AddformInfo">
                            <!-- First Row w/ 2 Columns-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddName">Name<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddName" name="AddName" placeholder="Tugboat Name">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddLength">Length<sup class="text-primary">&#10033;</sup></label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" id="AddLength" name="AddLength" placeholder="Tugboat Length">
                                            <div class="input-group-append">
                                                <span class="input-group-text">m</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Second Row w/ 2 Columns-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddBreadth">Breadth<sup class="text-primary">&#10033;</sup></label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" id="AddBreadth" name="AddBreadth" placeholder="Tugboat Breadth">
                                            <div class="input-group-append">
                                                <span class="input-group-text">m</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddDepth">Depth<sup class="text-primary">&#10033;</sup></label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" id="AddDepth" name="AddDepth" placeholder="Tugboat Depth">
                                            <div class="input-group-append">
                                                <span class="input-group-text">m</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Third Row w/ 2 Columns-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddHorsePower">Horse Power<sup class="text-primary">&#10033;</sup></label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" id="AddHorsePower" name="AddHorsePower" placeholder="Tugboat Horse Power">
                                            <div class="input-group-append">
                                                <span class="input-group-text">HP</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddMaxSpeed">Maximum Speed<sup class="text-primary">&#10033;</sup></label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" id="AddMaxSpeed" name="AddMaxSpeed" placeholder="Tugboat Max Speed">
                                            <div class="input-group-append">
                                                <span class="input-group-text">knots</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fourth Row w/ 2 Columns-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddBollardPull">Bollard Pull<sup class="text-primary">&#10033;</sup></label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" id="AddBollardPull" name="AddBollardPull" placeholder="Tugboat Bollard Pull">
                                            <div class="input-group-append">
                                                <span class="input-group-text">tons</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddGrossTonnage">Gross Tonnage<sup class="text-primary">&#10033;</sup></label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" id="AddGTonnage" name="AddGTonnage" placeholder="Tugboat Gross Tonnage">
                                            <div class="input-group-append">
                                                <span class="input-group-text">tons</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fifth Row w/ 2 Columns-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddNetTonnage">Net Tonnage<sup class="text-primary">&#10033;</sup></label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" id="AddNTonnage" name="AddNTonnage" placeholder="Tugboat Net Tonnage">
                                            <div class="input-group-append">
                                                <span class="input-group-text">tons</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddLastDryDocked">Last Dry Docked<sup class="text-primary">&#10033;</sup></label>
                                        <div class="input-group date" id="AddLastDryDocked" data-target-input="nearest">
                                            <input type="number" class="form-control datetimepicker-input" id="AddDryDocked" data-target="#AddLastDryDocked" placeholder="MM-DD-YYYY">
                                            <div class="input-group-append" data-target="#AddLastDryDocked" data-toggle="datetimepicker">
                                                <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-calendar"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="step-2" class="ml-3 mt-3 mr-3">
                        <form id="AddformSpec">
                            <!-- First Row w/ 4 Columns-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddLocBuilt">Location Built<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddLocBuilt" name="AddLocBuilt" placeholder="Tugboat Location Built">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddDateBuilt">Date Built<sup class="text-primary">&#10033;</sup></label>
                                        <div class="input-group date" id="AddDateBuilt" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="AddDateBuiltIn" data-target="#AddDateBuilt" placeholder="MM-DD-YYYY">
                                            <div class="input-group-append" data-target="#AddDateBuilt" data-toggle="datetimepicker">
                                                <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-calendar"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Second Row w/ 2 Columns-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddBuilder">Builder<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddBuilder" name="AddBuilder" placeholder="Tugboat Builder">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddMakerPower">Maker Power<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddMakerPower" name="AddMakerPower" placeholder="Tugboat Maker Power">
                                    </div>
                                </div>
                            </div>
                            <!-- Third Row w/ 2 Columns-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="HullMaterial">Hull Material<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddHullMaterial" name="AddHullMaterial" placeholder="Tugboat Hull Material">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddDrive">Drive<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddDrive" name="AddDrive" placeholder="Tugboat Drive">
                                    </div>
                                </div>
                            </div>
                            <!-- Fourth Row w/ 2 Columns-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddCylperCycle">Cylinder per Cycle<sup class="text-primary">&#10033;</sup></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="AddCylinder" name="AddCylinder" placeholder="Cylinder">
                                            <div class="input-group-append">
                                                <span class="input-group-text">/</span>
                                            </div>
                                            <input type="text" class="form-control" id="AddCycle" name="AddCycle" placeholder="Cycle">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="AddAuxEngine">Auxiliary Engine<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddAuxEngine" name="AddAuxEngine" placeholder="Tugboat Auxiliary Engine">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="step-3" class="ml-3 mt-3 mr-3">
                        <form id="AddformClass">
                            <!-- First Row w/ 3 Columns-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="AddClassNum">Classification Number<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddClassNum" name="AddClassNum" placeholder="Tugboat Classification Number">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="AddOfficialNum">Official Number<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddOfficialNum" name="AddOfficialNum" placeholder="Tugboat Official Number">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="AddIMONum">IMO Number<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddIMONum" name="AddIMONum" placeholder="Tugboat IMO Number">
                                    </div>
                                </div>
                            </div>
                            <!-- Second Row w/ 3 Columns-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label>Flag<sup class="text-primary">&#10033;</sup></label>
                                        {{-- <input type="text" id="country" />
                                        <input type="hidden" id="country_code" /> --}}
 
                                        @include('Tugboat.select')
                                        {{-- <div class="niceCountryInputSelector form-control" id="AddFlag" data-selectedcountry="PH" data-showspecial="false" data-showflags="true" data-i18nall="All selected" data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallback">
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="AddType">Type<sup class="text-primary">&#10033;</sup></label>
                                        <select id="AddType" name="AddType" class="form-control form-control input-lg wide">
                                            <option data-display="" value="0">Select Tugboat Type</option>
                                            @foreach($tugboattype as $tugboattype)
                                                <option value="{{$tugboattype->intTugboatTypeID}}">{{$tugboattype->strTugboatTypeName}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="AddTradingArea">Trading Area<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddTradingArea" name="AddTradingArea" placeholder="Tugboat Trading Area">
                                    </div>
                                </div>
                            </div>
                            <!-- Third Row w/ 3 Columns-->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-3">
                                    <div class="form-group">
                                        <label for="AddHomePort">Home Port<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddHomePort" name="AddHomePort" placeholder="Tugboat Home Port">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-3">
                                    <div class="form-group">
                                        <label>ISPS Code Compliance<sup class="text-primary">&#10033;</sup></label>
                                        <br>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="addISPSComplianceYes" name="addISPSCompliance" value="yes" class="custom-control-input">
                                            <label class="custom-control-label" for="addISPSComplianceYes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="addISPSComplianceNo" name="addISPSCompliance" value="no" class="custom-control-input">
                                            <label class="custom-control-label" for="addISPSComplianceNo">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-3">
                                    <div class="form-group">
                                        <label>ISM Code Standard<sup class="text-primary">&#10033;</sup></label>
                                        <br>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="addCStandardYes" name="addCStandard" value="yes" class="custom-control-input">
                                            <label class="custom-control-label" for="addCStandardYes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="addCStandardNo" name="addCStandard" value="no" class="custom-control-input">
                                            <label class="custom-control-label" for="addCStandardNo">No</label>
                                        </div>
                                        {{-- <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="addCStandardYes" name="addCStandard" value="yes" class="custom-control-input">
                                            <label class="custom-control-label" for="AddCStandardYes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="addCStandardNo" name="AddCStandard" value="no" class="custom-control-input">
                                            <label class="custom-control-label" for="addCStandardNo">No</label>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-3">
                                    <div class="form-group">
                                        <label>AIS, GPS, VHF, RADAR<sup class="text-primary">&#10033;</sup></label>
                                        <br>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="addNavigationEquipmentsYes" name="addNavigationEquipments" value="yes" class="custom-control-input">
                                            <label class="custom-control-label" for="addNavigationEquipmentsYes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="addNavigationEquipmentsNo" name="addNavigationEquipments" value="no" class="custom-control-input">
                                            <label class="custom-control-label" for="addNavigationEquipmentsNo">No</label>
                                        </div>
                                        {{-- <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="addAISGPSVHFRadarYes" name="AddNavigationEquipments" value="yes" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="addAISGPSVHFRadarYes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="addAISGPSVHFRadarNo" name="AddNavigationEquiptments" value="no" class="custom-control-input">
                                            <label class="custom-control-label" for="addAISGPSVHFRadarNo">No</label>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="firstRow">
                                <div class="col-12 col-lg-3">
                                    <div class="form-group">
                                        <label for="AddInsurance">Insurance<sup class="text-primary">&#10033;</sup></label>
                                        <input type="text" class="form-control" id="AddInsurance" name="AddInsurance[]" placeholder="Tugboat Insurance">
                                        <button type="button" id="btnAddInsuranceAdd" class="btn btn-primary btn-sm float-right mt-2 btn-lg waves-effect" data-toggle="tooltip" title="Add field for another Insurance"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="step-4" class="ml-3 mt-3 mr-3">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <img src="/others/stisla_admin_v1.0.0/dist/img/example-image.jpeg" class="img-thumbnail" id="AddfPic">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" accept='image/*' id="AddfirstPic" onchange="ValidateSingleInput(this);">
                                        <label class="custom-file-label" for="AddfirstPic" id="addLblfirstPic">Tugboat Picture</label>
                                        <small id="AddfirstFileChosen" class="form-text text-muted lblifValid">No Picture chosen.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>