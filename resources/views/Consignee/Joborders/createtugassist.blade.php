<div class="tugAssistTab">
        <form class="needs-validation" novalidate="">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="addAssistDate">Tug Assist Date<sup class="text-primary">&#10033;</sup></label>
                        <div class="input-group date" id="addAssistDate" data-target-input="nearest">
                            <input type="text" class="addAssistDate form-control datetimepicker-input" data-target="#addAssistDate" placeholder="MM/DD/YYYY" required>
                            <div class="input-group-append" data-target="#addAssistDate" data-toggle="datetimepicker">
                                <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-calendar"></i></button>
                            </div>
                            <div class="invalid-feedback">
                                Please fill in the Transaction Date.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="addAssistTime">Tug Assist Time<sup class="text-primary">&#10033;</sup></label>
                        <div class="input-group date" id="addAssistTime" data-target-input="nearest">
                            <input type="text" class="addAssistTime form-control datetimepicker-input" data-target="#addAssistTime" placeholder="21:00" required>
                            <div class="input-group-append" data-target="#addAssistTime" data-toggle="datetimepicker">
                                <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-clock"></i></button>
                            </div>
                            <div class="invalid-feedback">
                                Please fill in the Estimated Time of Tug Assist.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="firstRow">
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="cargoName1">Cargo Name 1<sup class="text-primary">&#10033;</sup></label>
                        <input type="text" class="form-control" id="cargoName1" placeholder="Energy Moon" required>
                        <div class="invalid-feedback">
                            Please fill in the Cargo Name.
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="cargoWeight1">Cargo Weight 1<sup class="text-primary">&#10033;</sup></label>
                        <div class="input-group">
                            <input id="cargoWeight1" type="number" class="form-control" placeholder="20" required>
                            <div class="input-group-append">
                                <span class="input-group-text">Tons</span>
                            </div>
                            <div class="invalid-feedback">
                                Please fill in the Cargo Weight.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="addTugAssistRoute">Select Route<sup class="text-primary">&#10033;</sup></label>
                        {{-- <input type="text" class="form-control" id="addTugAssistRoute" placeholder="Route" required> --}}
                        <select id="addTugAssistRoute" name="addTugAssistRoute" class="form-control">
                            <option value="LocPier">Location to Pier</option>
                            <option value="PierLoc">Pier to Location</option>
                            <option value="LocLoc">Location to Location</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="LocPier">
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
                            <label for="addBerth">Select Berth<sup class="text-primary">&#10033;</sup></label><select id="addBerth" name="addBerth" class="form-control">
                                <option>Select Berth</option>
                                @foreach($berth as $berths)
                                    <option value="{{$berths->intBerthID}}">{{$berths->strPierName}} - {{$berths->strBerthName}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please fill in the Estimated Goods to be delivered.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="PierLoc">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="addBerth">Select Berth<sup class="text-primary">&#10033;</sup></label>
                            <select id="addBerth" name="addBerth" class="form-control">
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
                <textarea class="form-control" id="addExDetails" rows="5"></textarea>
            </div>
            <button id="submitJob" class="btn btn-primary float-right waves-effect" onclick="createJobOrder()">Submit</button>
        </form>
    </div>