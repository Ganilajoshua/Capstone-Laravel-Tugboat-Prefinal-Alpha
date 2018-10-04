    <div class="tugAssistTab getService" data-service="Tug Assist">
        <form class="needs-validation" novalidate="">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <label for="addTugAssistTitle">Job Order Title<sup class="text-primary">&#10033;</sup></label>
                        <input id="addTugAssistTitle" type="text" class="form-control" placeholder="Job Order Title" required>
                        <div class="invalid-feedback">
                            Please Type Job Order Title
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="addTugAssistStartDate">Tug Assist Date<sup class="text-primary">&#10033;</sup></label>
                        <div class="input-group date" id="addTugAssistStartDate" data-target-input="nearest">
                            <input type="text" class="addTugAssistStartDate form-control datetimepicker-input" data-target="#addTugAssistStartDate" placeholder="MM/DD/YYYY" required>
                            <div class="input-group-append" data-target="#addTugAssistStartDate" data-toggle="datetimepicker">
                                <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-calendar"></i></button>
                            </div>
                            <div class="invalid-feedback">
                                Please fill in the Starting Transaction Date.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="addTugAssistStartTime">Tug Assist Time<sup class="text-primary">&#10033;</sup></label>
                        <div class="input-group date" id="addTugAssistStartTime" data-target-input="nearest">
                            <input type="text" class="addTugAssistStartTime form-control datetimepicker-input" data-target="#addTugAssistStartTime" placeholder="21:00" required>
                            <div class="input-group-append" data-target="#addTugAssistStartTime" data-toggle="datetimepicker">
                                <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-clock"></i></button>
                            </div>
                            <div class="invalid-feedback">
                                Please fill in the Estimated Starting Time of Tug Assist.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="addTugAssistEndDate">Tug Assist End Date<sup class="text-primary">&#10033;</sup></label>
                        <div class="input-group date" id="addTugAssistEndDate" data-target-input="nearest">
                            <input type="text" class="addTugAssistEndDate form-control datetimepicker-input" data-target="#addTugAssistEndDate" placeholder="MM/DD/YYYY" required>
                            <div class="input-group-append" data-target="#addTugAssistEndDate" data-toggle="datetimepicker">
                                <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-calendar"></i></button>
                            </div>
                            <div class="invalid-feedback">
                                Please fill in the Ending Transaction Date.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="addTugAssistEndTime">Tug Assist End Time<sup class="text-primary">&#10033;</sup></label>
                        <div class="input-group date" id="addTugAssistEndTime" data-target-input="nearest">
                            <input type="text" class="addTugAssistEndTime form-control datetimepicker-input" data-target="#addTugAssistEndTime" placeholder="21:00" required>
                            <div class="input-group-append" data-target="#addTugAssistEndTime" data-toggle="datetimepicker">
                                <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-clock"></i></button>
                            </div>
                            <div class="invalid-feedback">
                                Please fill in the Estimated End Time of Tug Assist.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="firstRow">
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="tugAssistVesselName">Vessel Name<sup class="text-primary">&#10033;</sup></label>
                        <input type="text" class="form-control" id="tugAssistVesselName" placeholder="Energy Moon" required>
                        <div class="invalid-feedback">
                            Please fill in the Vessel Name.
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="tugAssistVesselWeight">Vessel Weight<sup class="text-primary">&#10033;</sup></label>
                        <div class="input-group">
                            <input id="tugAssistVesselWeight" type="number" class="form-control" placeholder="20" required>
                            <div class="input-group-append">
                                <span class="input-group-text">Tons</span>
                            </div>
                            <div class="invalid-feedback">
                                Please fill in the Vessel Weight.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="addTugAssistRoute">Select Route<sup class="text-primary">&#10033;</sup></label>
                        <input type="text" class="form-control" id="addTugAssistRoute" placeholder="Route" required>
                        <select id="addTugAssistRoute" name="addTugAssistRoute" class="form-control">
                            <option value="LocPier">Location to Pier</option>
                            <option value="PierLoc">Pier to Location</option>
                            <option value="LocLoc">Location to Location</option>
                        </select>
                    </div>
                </div>
            </div> --}}
            <div class="LocPier">
                <div class="row">
                    {{-- <div class="col-12 col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="startingLocation">Starting Location<sup class="text-primary">&#10033;</sup></label>
                            <input id="startingLocation" type="text" class="form-control" placeholder="Pandacan, Manila" required>
                            <div class="invalid-feedback">
                                Please Type The Starting Location
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="addBerth">Select Berth<sup class="text-primary">&#10033;</sup></label>
                            <select name="addBerth" class="form-control addBerth" required>
                                <option value="">Select Berth</option>
                                @foreach($berth as $berths)
                                    <option value="{{$berths->intBerthID}}">{{$berths->strPierName}} - {{$berths->strBerthName}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please fill in the The Corresponding Berth and Pier
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PierLoc">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="addTugAssistVesselType">Select Vessel Type<sup class="text-primary">&#10033;</sup></label><select id="addTugAssistVesselType" name="addBerth" class="form-control" required>
                                <option value="">Select Vessel Type</option>
                                @foreach($vesseltype as $vesseltype)
                                    <option value="{{$vesseltype->intVesselTypeID}}">{{$vesseltype->strVesselTypeName}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please Select Vessel Type.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="addTugAssistBerth">Select Berth<sup class="text-primary">&#10033;</sup></label>
                            <select name="addTugAssistBerth" class="addTugAssistBerth form-control">
                                <option>Select Berth</option>
                                @foreach($berth as $berth)
                                    <option value="{{$berth->intBerthID}}">{{$berth->strPierName}} - {{$berth->strBerthName}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please fill in the Estimated Goods to be delivered.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="LocLoc">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="startingLocation">Starting Location<sup class="text-primary">&#10033;</sup></label>
                            <input id="startingLocation" type="text" class="form-control" placeholder="Pandacan, Manila" required>
                            <div class="invalid-feedback">
                                Please Type The Starting Location
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="destinationLocation">Destination Location<sup class="text-primary">&#10033;</sup></label>
                            <input id="destinationLocation" type="text" class="form-control" placeholder="Pandacan, Manila" required>
                            <div class="invalid-feedback">
                                Please Type The Destination Location
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="addExDetails">Extra Details</label>
                <textarea class="form-control addExDetails" rows="5" required></textarea>
                <div class="invalid-feedback">
                    Please Add Details
                </div>
            </div>
            <button id="submitJob" role="button" class="submitJobOrderTugAssist btn btn-primary float-right waves-effect" data-service="Tug Assist">Submit</button>
        </form>
    </div>