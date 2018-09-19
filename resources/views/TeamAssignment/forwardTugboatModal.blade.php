<div class="modal fade" id="forwardTugboatModal" tabindex="-1" role="dialog" aria-labelledby="forwardModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" style="max-width: 68%;"role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forwardModalLabel">Forward Tugboat</h5>
                <button type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-right">
                                    <a data-collapse="#viewForwardTugboat" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                </div>
                                <h5 class="text-center ml-5 teamname">Tugboat Information</h5>
                            </div>
                            <div class="collapse show" id="viewForwardTugboat">
                                <div class="card-body">
                                    <!-- Carousel -->
                                    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#imageCarousel" data-slide-to="1"></li>
                                            <li data-target="#imageCarousel" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="/others/stisla_admin_v1.0.0/dist/img/tb1.JPG" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="/others/stisla_admin_v1.0.0/dist/img/tb2.jpg" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="/others/stisla_admin_v1.0.0/dist/img/tb3.jpg" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col align-self-center">
                                                <table class="table table-striped">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th scope="col">Main Information</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Name</th>
                                                            <td id="tugboatForwardInfoName"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Length</th>
                                                            <td id="tugboatForwardInfoLength"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Breadth</th>
                                                            <td id="tugboatForwardInfoBreadth"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Depth</th>
                                                            <td id="tugboatForwardInfoDepth"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Horse Power</th>
                                                            <td id="tugboatForwardInfoHorsePower"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Maximum Speed</th>
                                                            <td id="tugboatForwardInfoMaxSpeed"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Bollard Pull</th>
                                                            <td id="tugboatForwardInfoBollardPull"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Gross Tonnage</th>
                                                            <td id="tugboatForwardInfoGrossTonnage"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Net Tonnage</th>
                                                            <td id="tugboatForwardInfoNetTonnage"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Last Dry Docked</th>
                                                            <td id="tugboatForwardInfoDryDocked"></td>
                                                        </tr>
                                                        {{-- <tr>
                                                            <th scope="row">License Number</th>
                                                            <td id="tugboatForwardInfoLicenseNum"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">License Expiration Date</th>
                                                            <td id="tugboatForwardInfoLicenseExp"></td>
                                                        </tr> --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <table class="table table-striped">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">Boat Specification</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Location Built</th>
                                                            <td id="tugboatForwardInfoLocationBuilt"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Date Built</th>
                                                            <td id="tugboatForwardInfoDateBuilt"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Builder</th>
                                                            <td id="tugboatForwardInfoBuilder"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Maker Power</th>
                                                            <td id="tugboatForwardInfoMakerPower"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Hull Material</th>
                                                            <td id="tugboatForwardInfoHullMaterial"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Drive</th>
                                                            <td id="tugboatForwardInfoDrive"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Cylinder per Cycle</th>
                                                            <td id="tugboatForwardInfoCylCycle"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Auxiliary Engine</th>
                                                            <td id="tugboatForwardInfoAuxEngine"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col">
                                                <table class="table table-striped">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">Boat Classification</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Classification Number</th>
                                                            <td id="tugboatForwardInfoClassNum"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Official Number</th>
                                                            <td id="tugboatForwardInfoOfficialNum"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">IMO Number</th>
                                                            <td id="tugboatForwardInfoIMONum"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Flag</th>
                                                            <td id="tugboatForwardInfoFlag"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Type</th>
                                                            <td id="tugboatForwardInfoType"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Trading Area</th>
                                                            <td id="tugboatForwardInfoTradingArea"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Home Port</th>
                                                            <td id="tugboatForwardInfoHomePort"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">ISPS Code Compliance</th>
                                                            <td id="tugboatForwardInfoISPSCode"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">ISM Code Standard</th>
                                                            <td id="tugboatForwardInfoISMCode"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">AIS,GPS,VHF,Radar</th>
                                                            <td id="tugboatForwardInfoNavEquipments"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Insurances</th>
                                                            <td id="tugboatForwardInfoInsurances"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <input type="hidden" id="tugboatID">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <label for="selectTugboatRecipientCompany">Select Recipient of Tugboat<sup class="text-primary">&#10033;</sup></label>
                        <select id="selectTugboatRecipientCompany" name="selectTugboatRecipientCompany" class="form-control form-control-lg">
                            <option>Select Company</option>
                            @foreach($affiliates as $affiliates)
                                <option value="{{$affiliates->intCompanyID}}">{{$affiliates->strCompanyName}}</option>
                            @endforeach                    
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect forwardTugboatButton">Forward Tugboat</button>
            </div>
        </div>
    </div>
</div>