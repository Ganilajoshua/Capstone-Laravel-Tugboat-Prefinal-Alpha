<div class="haulingTab">
    <form class="needs-validation" novalidate="">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
                <div class="form-group">
                    <label for="addHaulingDate">Hauling Date<sup class="text-primary">&#10033;</sup></label>
                    <div class="input-group date" id="addHaulingDate" data-target-input="nearest">
                        <input type="text" class="addHaulingDate form-control datetimepicker-input" data-target="#addHaulingDate" placeholder="MM/DD/YYYY" required>
                        <div class="input-group-append" data-target="#addHaulingDate" data-toggle="datetimepicker">
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
                    <label for="addHaulingTime">Hauling Time<sup class="text-primary">&#10033;</sup></label>
                    <div class="input-group date" id="addHaulingTime" data-target-input="nearest">
                        <input type="text" class="addHaulingTime form-control datetimepicker-input" data-target="#addHaulingTime" placeholder="21:00" required>
                        <div class="input-group-append" data-target="#addHaulingTime" data-toggle="datetimepicker">
                            <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-clock"></i></button>
                        </div>
                        <div class="invalid-feedback">
                            Please fill in the Estimated Time of Hauling.
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
            {{-- <div class="col-12">
                <div class="float-right">
                    <button type="button" class="btn btn-primary btn-sm text-center waves-effect btnRemoveFields" data-toggle="tooltip" title="Delete Fields">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm text-center waves-effect btnAddFields" data-toggle="tooltip" title="Add Fields">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
                <div class="form-group">
                    <label for="addGoods1">Goods to be delivered<sup class="text-primary">&#10033;</sup></label>
                    {{-- <input type="text" class="form-control" id="addGoods1" placeholder="Very Good" required> --}}
                    <select id="addGoods1" name="addGoods1" class="form-control">
                        <option>Select Goods</option>
                        @foreach($goods as $goods)
                            <option value="{{$goods->intGoodsID}}">{{$goods->strGoodsName}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please fill in the Estimated Goods to be delivered.
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
                <div class="form-group">
                    <label for="addHaulingRoute">Select Route<sup class="text-primary">&#10033;</sup></label>
                    {{-- <input type="text" class="form-control" id="addHaulingRoute" placeholder="Route" required> --}}
                    <select id="addHaulingRoute" name="addHaulingRoute" class="form-control">
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