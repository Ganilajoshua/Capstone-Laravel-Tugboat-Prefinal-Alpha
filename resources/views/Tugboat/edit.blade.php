<div class="editLayout">
    <div class="card animated bounceInLeft">
        <div class="card-header">
            <span style="height:50px;">
                <a href="tugboat.html" class="btnBack btn btn-lg btn-link float-left mt-2" data-toggle="tooltip"  title="Back" role="button">
                    <i class="ion-chevron-left"></i>
                </a>
                <h3 class="text-center mr-5 mt-2">EDIT</h3>
            </span>
        </div>  
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4">
                    <ul class="nav nav-pills flex-column" id="editTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active tabEdit" id="navFirstTab" data-toggle="tab" href="#firstTab" role="tab" aria-controls="picAControl" aria-selected="true">Pictures</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tabEdit" id="navSecondTab" data-toggle="tab" href="#secondTab" role="tab" aria-controls="minfoAControl" aria-selected="false">Main Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tabEdit" id="navThirdTab" data-toggle="tab" href="#thirdTab" role="tab" aria-controls="tSpecAControl" aria-selected="false">Tugboat Specification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tabEdit" id="navFourthTab" data-toggle="tab" href="#fourthTab" role="tab" aria-controls="tClassAControl" aria-selected="false">Tugboat Classification</a>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-sm-12 col-md-8">
                    <div class="tab-content" id="editTabContent">
                        <!-- Picture tab -->
                        <div class="tab-pane fade show active" id="firstTab" role="tabpanel" aria-labelledby="navFirstTab">
                            <form>
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <img src="../dist/img/example-image.jpeg" class="img-thumbnail" id="editfPic">
                                            <br>
                                            <br>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" accept='image/*' id="editFirstPic" onchange="ValidateSingleInput(this);">
                                                <label class="custom-file-label" for="editFirstPic" id="editLblfirstPic">First Picture<sup class="text-primary">&#10033;</sup></label>
                                                <small id="editFirstFileChosen" class="form-text text-muted">No First Picture chosen.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <img src="../dist/img/example-image.jpeg" class="img-thumbnail" id="editsPic">
                                            <br>
                                            <br>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" accept='image/*' id="editSecPic" onchange="ValidateSingleInput(this);">
                                                <label class="custom-file-label" for="editSecPic" id="editLblsecPic">Second Picture<sup class="text-primary">&#10033;</sup></label>
                                                <small id="editSecFileChosen" class="form-text text-muted">No Second Picture chosen.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <img src="../dist/img/example-image.jpeg" class="img-thumbnail" id="edittPic">
                                            <br>
                                            <br>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" accept='image/*' id="editThirdPic" onchange="ValidateSingleInput(this);">
                                                <label class="custom-file-label" for="editThirdPic" id="editLblthirdPic">Third Picture<sup class="text-primary">&#10033;</sup></label>
                                                <small id="editThirdFileChosen" class="form-text text-muted">No Third Picture chosen.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button id="btnEItemPics" type="submit" class="btn btn-primary float-right font-weight-bold waves-effect">Save Changes</button>
                                <br>
                            </form>
                        </div>
                        <!-- Main Info Tab -->
                        <div class="tab-pane fade" id="secondTab" role="tabpanel" aria-labelledby="navSecondTab">
                            <form id="editFormInfo" class="needs-validation" novalidate>
                                <!-- First Row w/ 2 Columns-->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editName">Name<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editName" placeholder="Tugboat Name" required>
                                            <div class="invalid-feedback">
                                                Please enter a Name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editLength">Length<sup class="text-primary">&#10033;</sup></label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="editLength" placeholder="Tugboat Length" required>
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
                                            <label for="editBreadth">Breadth<sup class="text-primary">&#10033;</sup></label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="editBreadth" placeholder="Tugboat Breadth" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">m</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editDepth">Depth<sup class="text-primary">&#10033;</sup></label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="editDepth" placeholder="Tugboat Depth" required>
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
                                            <label for="editHorsePower">Horse Power<sup class="text-primary">&#10033;</sup></label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="editHorsePower" placeholder="Tugboat Horse Power" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">HP</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editMaxSpeed">Maximum Speed<sup class="text-primary">&#10033;</sup></label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="editMaxSpeed" placeholder="Tugboat Max Speed" required>
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
                                            <label for="editBollardPull">Bollard Pull<sup class="text-primary">&#10033;</sup></label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="editBollardPull" placeholder="Tugboat Bollard Pull" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">tons</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editGrossTonnage">Gross Tonnage<sup class="text-primary">&#10033;</sup></label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="editGrossTonnage" placeholder="Tugboat Gross Tonnage" required>
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
                                            <label for="editNetTonnage">Net Tonnage<sup class="text-primary">&#10033;</sup></label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="editNetTonnage" placeholder="Tugboat Net Tonnage" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">tons</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editLastDryDocked">Last Dry Docked<sup class="text-primary">&#10033;</sup></label>
                                            <div class="input-group date" id="editLastDryDocked" data-target-input="nearest">
                                                <input id="editLastDrydocked" type="text" class="form-control datetimepicker-input" data-target="#editLastDryDocked" placeholder="MM-DD-YYYY">
                                                <div class="input-group-append" data-target="#editLastDryDocked" data-toggle="datetimepicker">
                                                    <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-calendar"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button onclick="editMainInformationSubmit()" type="button" class="btn btn-primary float-right font-weight-bold waves-effect">Save Changes</button>
                            </form>
                        </div>
                        <!-- Tug Spec Tab -->
                        <div class="tab-pane fade" id="thirdTab" role="tabpanel" aria-labelledby="navThirdTab">
                            <form id="editFormSpec">
                                <!-- First Row w/ 2 Columns-->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editLocBuilt">Location Built<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editLocBuilt" placeholder="Tugboat Location Built">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editDateBuilt">Date Built<sup class="text-primary">&#10033;</sup></label>
                                            <div class="input-group date" id="editDateBuilt" data-target-input="nearest">
                                                <input type="text" id="editDatebuilt" class="form-control datetimepicker-input" data-target="#editDateBuilt" placeholder="MM-DD-YYYY">
                                                <div class="input-group-append" data-target="#editDateBuilt" data-toggle="datetimepicker">
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
                                            <label for="editBuilder">Builder<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editBuilder" placeholder="Tugboat Builder">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editMakerPower">Maker Power<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editMakerPower" placeholder="Tugboat Maker Power">
                                        </div>
                                    </div>
                                </div>
                                <!-- Third Row w/ 2 Columns-->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editHullMaterial">Hull Material<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editHullMaterial" placeholder="Tugboat Hull Material">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editDrive">Drive<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editDrive" placeholder="Tugboat Drive">
                                        </div>
                                    </div>
                                </div>
                                <!-- Fourth Row w/ 2 Columns-->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Cylinder per Cycle<sup class="text-primary">&#10033;</sup></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="editCylinder" name="editCylinder" placeholder="Cylinder">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">/</span>
                                                </div>
                                                <input type="text" class="form-control" id="editCycle" name="editCycle" placeholder="Cycle">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editAuxEngine">Auxiliary Engine<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editAuxEngine" placeholder="Tugboat Auxiliary Engine">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="btnETSpecSubmit" class=" btn btn-primary float-right font-weight-bold waves-effect">Save Changes</button>
                            </form>
                        </div>
                        <!-- Tug Class Tab -->
                        <div class="tab-pane fade" id="fourthTab" role="tabpanel" aria-labelledby="navFourthTab">
                            <form id="editFormClass">
                                <!-- First Row w/ 2 Columns-->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editClassNum">Classification Number<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editClassNum" placeholder="Tugboat Classification Number">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editOfficialNum">Official Number<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editOfficialNum" placeholder="Tugboat Official Number">
                                        </div>
                                    </div>
                                </div>
                                <!-- Second Row w/ 2 Columns-->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editIMONum">IMO Number<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editIMONum" placeholder="Tugboat IMO Number">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Flag<sup class="text-primary">&#10033;</sup></label>
                                            <br>
                                            <div class="niceCountryInputSelector form-control" data-selectedcountry="PH" data-showspecial="false" data-showflags="true" data-i18nall="All selected" data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallback">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Third Row w/ 2 Columns-->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editType">Type<sup class="text-primary">&#10033;</sup></label>
                                            <div>
                                                <select id="editType" name="editType" class="form-control form-control input-lg wide">
                                                    <option data-display="" value="0">Select Tugboat Type</option>
                                                    @foreach($tugboattype as $tugboattype)
                                                        <option value="{{$tugboattype->intTugboatTypeID}}">{{$tugboattype->strTugboatTypeName}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editTradingArea">Trading Area<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editTradingArea" placeholder="Tugboat Trading Area">
                                        </div>
                                    </div>
                                </div>
                                <!-- Fourth Row w/ 2 Columns-->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editHomePort">Home Port<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editHomePort" placeholder="Tugboat Home Port">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group editISPSForm">
                                            <label>ISPS Code Compliance<sup class="text-primary">&#10033;</sup></label>
                                            <br>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="editISPSComplianceYes" name="editISPSCompliance" value="Yes" class="custom-control-input">
                                                <label class="custom-control-label" for="editISPSComplianceYes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="editISPSComplianceNo" name="editISPSCompliance" value="No" class="custom-control-input">
                                                <label class="custom-control-label" for="editISPSComplianceNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fifth Row w/ 2 Columns-->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <div class="form-group editISMForm">
                                            <label>ISM Code Standard<sup class="text-primary">&#10033;</sup></label>
                                            <br>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="editCStandardYes" name="editCStandard" value="Yes" class="custom-control-input">
                                                <label class="custom-control-label" for="editCStandardYes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="editCStandardNo" name="editCStandard" value="No" class="custom-control-input">
                                                <label class="custom-control-label" for="editCStandardNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-3">
                                        <div class="form-group editNavigationForm">
                                            <label>AIS, GPS, VHF, RADAR<sup class="text-primary">&#10033;</sup></label>
                                            <br>
                                            <div class="custom-control custom-radio custom-control-inline mt-2">
                                                <input type="radio" id="editAISGPSVHFRadarYes" name="editAISGPSVHFRadar" value="Yes" class="custom-control-input">
                                                <label class="custom-control-label" for="editAISGPSVHFRadarYes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline mt-2">
                                                <input type="radio" id="editAISGPSVHFRadarNo" name="editAISGPSVHFRadar" value="No" class="custom-control-input">
                                                <label class="custom-control-label" for="editAISGPSVHFRadarNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sixth Row w/ 2 Columns-->
                                <div class="row" id="secondRow">
                                    <div class="addContainer">
                                    {{-- <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="editInsurance">Insurance<sup class="text-primary">&#10033;</sup></label>
                                            <input type="text" class="form-control" id="editInsurance" name="editInsurance" placeholder="Tugboat Insurance">
                                            <button type="button" id="btnEditInsuranceAdd" class="btn btn-primary btn-sm float-right mt-2 btn-lg waves-effect" data-toggle="tooltip" title="Add field for another Insurance"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div> --}}
                                    </div>
                                </div>
                                <button type="submit" id="btnETClassSubmit" class="btn btn-primary float-right font-weight-bold waves-effect mt-3">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>