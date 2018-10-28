<div class="haulingTab">
    <form class="needs-validation" novalidate=""  name="form">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="form-group">
                    <label for="addHaulingTitle">Job Order Title<sup class="text-primary">&#10033;</sup></label>
                    <input id="addHaulingTitle" type="text" class="form-control" placeholder="Job Order Title" required>
                    <div class="invalid-feedback">
                        Please Type Job Order Title
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
                <div class="form-group">
                    <label for="addHaulingStartDate">Hauling Start Date<sup class="text-primary">&#10033;</sup></label>
                    <div class="input-group date" id="addHaulingStartDate" data-target-input="nearest">
                        <input type="text" class="addHaulingStartDate form-control datetimepicker-input" data-target="#addHaulingStartDate" placeholder="MM/DD/YYYY" required>
                        <div class="input-group-append" data-target="#addHaulingStartDate" data-toggle="datetimepicker">
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
                    <label for="addHaulingStartTime">Hauling Start Time<sup class="text-primary">&#10033;</sup></label>
                    <div class="input-group date" id="addHaulingStartTime" data-target-input="nearest">
                        <input type="text" class="addHaulingStartTime form-control datetimepicker-input" data-target="#addHaulingStartTime" placeholder="21:00" required>
                        <div class="input-group-append" data-target="#addHaulingStartTime" data-toggle="datetimepicker">
                            <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-clock"></i></button>
                        </div>
                        <div class="invalid-feedback">
                            Please fill in the Estimated Time of Hauling.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
                <div class="form-group">
                    <label for="addHaulingEndDate">Hauling End Date<sup class="text-primary">&#10033;</sup></label>
                    <div class="input-group date" id="addHaulingEndDate" data-target-input="nearest">
                        <input type="text" class="addHaulingEndDate form-control datetimepicker-input" data-target="#addHaulingEndDate" placeholder="MM/DD/YYYY" required>
                        <div class="input-group-append" data-target="#addHaulingEndDate" data-toggle="datetimepicker">
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
                    <label for="addHaulingEndTime">Hauling End Time<sup class="text-primary">&#10033;</sup></label>
                    <div class="input-group date" id="addHaulingEndTime" data-target-input="nearest">
                        <input type="text" class="addHaulingEndTime form-control datetimepicker-input" data-target="#addHaulingEndTime" placeholder="21:00" required>
                        <div class="input-group-append" data-target="#addHaulingEndTime" data-toggle="datetimepicker">
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
                    <label for="addHaulingVesselName">Vessel Name<sup class="text-primary">&#10033;</sup></label>
                    <input type="text" class="form-control" id="addHaulingVesselName" placeholder="Energy Moon" required>
                    <div class="invalid-feedback">
                        Please fill in the Cargo Name.
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
                <div class="form-group">
                    <label for="addHaulingVesselWeight">Vessel Weight<sup class="text-primary">&#10033;</sup></label>
                    <div class="input-group">
                        <input id="addHaulingVesselWeight" type="number" class="form-control" placeholder="20" required>
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
                    <label for="addHaulingGoods">Goods to be delivered<sup class="text-primary">&#10033;</sup></label>
                    {{-- <input type="text" class="form-control" id="addHaulingGoods" placeholder="Very Good" required> --}}
                    <select id="addHaulingGoods" name="addHaulingGoods" class="form-control" required>
                        <option value="" disabled="disabled" selected="selected">Select Goods</option>
                        @foreach($goods as $goods)
                            <option value="{{$goods->intGoodsID}}">{{$goods->strGoodsName}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                       Select goods.
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
                <div class="form-group">
                    <label for="addHaulingRoute">Select Route<sup class="text-primary">&#10033;</sup></label>
                    {{-- <input type="text" class="form-control" id="addHaulingRoute" placeholder="Route" required> --}}
                    <select id="addHaulingRoute" name="addHaulingRoute" class="form-control">
                        <option value="PierLoc">Pier to Location</option>
                        <option value="LocPier">Location to Pier</option>
                        <option value="LocLoc">Location to Location</option>
                    </select>
                </div> 
            </div>
        </div>
        <div class="LocPier">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="#startingLocationLP">Starting Location<sup class="text-primary">&#10033;</sup></label>
                        <input id="startingLocationLP" type="text" class="form-control" placeholder="Pandacan, Manila">
                        <div class="invalid-feedback">
                            Please Type The Starting Location
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="addBerthLP">Select Berth<sup class="text-primary">&#10033;</sup></label>
                        <select id="addBerthLP" name="addBerthLP" class="form-control">
                            <option disabled="disabled" selected="selected">Select Berth</option>
                            @foreach($berth as $berths)
                                <option value="{{$berths->intBerthID}}">{{$berths->strPierName}} - {{$berths->strBerthName}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a Berth.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="PierLoc">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="addBerthPL">Select Berth<sup class="text-primary">&#10033;</sup></label>
                        <select id="addBerthPL" name="addBerthPL" class="form-control">
                            <option value="" disabled="disabled" selected="selected">Select Berth</option>
                            @foreach($berth as $berth)
                                <option value="{{$berth->intBerthID}}">{{$berth->strPierName}} - {{$berth->strBerthName}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a Berth.
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="destinationLocationPL">Destination Location<sup class="text-primary">&#10033;</sup></label>
                        <input id="destinationLocationPL" type="text" class="form-control" placeholder="Pandacan, Manila">
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
                        <label for="startingLocationLL">Starting Location<sup class="text-primary">&#10033;</sup></label>
                        <input id="startingLocationLL" type="text" class="form-control" placeholder="Pandacan, Manila">
                        <div class="invalid-feedback">
                            Please Type The Starting Location
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="destinationLocationLL">Destination Location<sup class="text-primary">&#10033;</sup></label>
                        <input id="destinationLocationLL" type="text" class="form-control" placeholder="Pandacan, Manila">
                        <div class="invalid-feedback">
                            Please Type The Destination Location
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="addExHaulingDetails">Extra Details</label>
            <textarea class="form-control" id="addExHaulingDetails" rows="5"></textarea>
        </div>
        {{-- <button id="submitJob" type="Submit" class="submitJobOrderHauling btn btn-primary float-right waves-effect" data-service="Hauling">Submit</button> --}}
        <button type="submit" class="btn btn-primary float-right waves-effect" data-service="Hauling">Submit</button>
    
    </form>
</div>

<script>
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          else{
              //   return postPier(); 
              event.preventDefault();
              event.stopPropagation();
            return submitJobOrderHauling();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

</script>