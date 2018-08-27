{{-- New View for Add Employee(Modal) --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Employee</h5>
                <button id="closeEdit" type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form>
                    <div class="row">
                        <div class="col">    
                            <div class="form-group">
                                <label for="addLastName">Last Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="addLastName" name="addLastName" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col">    
                            <div class="form-group">
                                <label for="addFirstName">First Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="addFirstName" name="addFirstName" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col">    
                            <div class="form-group">
                                <label for="addMiddleName">Middle Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="addMiddleName" name="addMiddleName" placeholder="Middle Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="positionSelect">Position<sup class="text-primary">&#10033;</sup></label>
                                <select name="positionSelect" class="form-control" id="positionSelect">
                                    <option>Select Position</option>
                                    @foreach($positions as $positions)
                                        <option value="{{$positions->intPositionID}}">{{$positions->strPositionName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label for="addEmpType">Employee Type<sup class="text-primary">&#10033;</sup></label>
                            <select name="addEmpType" class="form-control" id="addEmpType">
                                <option disabled>Select Type</option>
                                <option value="Regular">Regular</option>
                                <option value="Reserved">Reserved</option>
                                <option value="On Call">On Call</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="editIDhide">
                    <button type="button" onclick="postEmployee()" class="btnAdd btn btn-primary waves-effect float-right">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
<!-- Add View -->
{{-- <div class="addLayout" id="addLayout">
    <form id="employeeForm">
        <div class="card animated bounceInLeft">
            <div class="card-header">
                <span>
                    <button id="backButton" class="btn btn-lg btn-link float-left mt-1" data-toggle="tooltip"  title="Back" type="button">
                    <i class="ion-chevron-left custSize"></i>
                    </button>
                    <button class="btn btn-lg btn-link float-right" disabled></button>
                    <h3 class="text-center">ADD</h3>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">    
                        <div class="form-group">
                            <label for="addLastName">Last Name<sup class="text-primary">&#10033;</sup></label>
                            <input type="text" class="form-control" id="addLastName" name="addLastName" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="addFirstName">First Name<sup class="text-primary">&#10033;</sup></label>
                            <input type="text" class="form-control" id="addFirstName" name="addFirstName" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col">    
                        <div class="form-group">
                            <label for="addMiddleName">Middle Name<sup class="text-primary">&#10033;</sup></label>
                            <input type="text" class="form-control" id="addMiddleName" name="addMiddleName" placeholder="Middle Name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="positionSelect">Position<sup class="text-primary">&#10033;</sup></label>
                            <select name="positionSelect" class="form-control" id="positionSelect">
                                <option>Select Position</option>
                                @foreach($positions as $positions)
                                    <option value="{{$positions->intPositionID}}">{{$positions->strPositionName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="addEmpType">Employee Type<sup class="text-primary">&#10033;</sup></label>
                            <input type="text" class="form-control" id="addEmpType" name="addEmpType" placeholder="Employee Type">
                        </div>
                    </div>
                </div>
                <br>
                <button onclick="postEmployee()" role="button" class="btn btn-primary float-right font-weight-bold">Submit</button>
            </div>
        </div>
    </form>
</div>   --}}