<div class="tab-pane show active animated slideInRight faster getService" data-service="Hauling" id="firstTab" role="tabpanel" aria-labelledby="navFirstTab">
    <form class="needs-validation" novalidate="">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="form-group">
                    <label for="jobordertitle">Job Order Title<sup class="text-primary">&#10033;</sup></label>
                    <input id="jobordertitle" type="text" class="form-control" placeholder="Job Order Title" required>
                    <div class="invalid-feedback">
                        Please Type Job Order Title
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
                <div class="form-group">
                    <label for="addTransacDate">Hauling Date and Start Time<sup class="text-primary">&#10033;</sup></label>
                    <div class="input-group date" id="addTransacDate" data-target-input="nearest">
                        <input id="timeETA" type="text" class="form-control datetimepicker-input" data-target="#addTransacDate" placeholder="MM/DD/YYYY" required>
                        <div class="input-group-append" data-target="#addTransacDate" data-toggle="datetimepicker">
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
                    <label for="addHaulingETA">Hauling Date and End Time<sup class="text-primary">&#10033;</sup></label>
                    <div class="input-group date" id="addHaulingETA" data-target-input="nearest">
                        <input id="timeETD" type="text" class="form-control datetimepicker-input" data-target="#addHaulingETA" placeholder="21:00" required>
                        <div class="input-group-append" data-target="#addHaulingETA" data-toggle="datetimepicker">
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
            <div class="col-12 col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="destinationLocation">Destination Location<sup class="text-primary">&#10033;</sup></label>
                    <input id="destinationLocation" type="text" class="form-control" placeholder="Pandacan, Manila" required>
                    <div class="invalid-feedback">
                        Please Type The Destination Location
                    </div>
                    
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4">
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
            <div class="col-12 col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="addBerth">Select Berth<sup class="text-primary">&#10033;</sup></label>
                    {{-- <input type="text" class="form-control" id="addBerth" placeholder="Berth" required> --}}
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
        </div>
        <div class="form-group">
            <label for="addExDetails">Extra Details</label>
            <textarea class="form-control" id="addExDetails" rows="5"></textarea>
        </div>
        <button id="submitJob" class="btn btn-primary float-right waves-effect" onclick="createJobOrder()">Submit</button>
    </form>
</div>