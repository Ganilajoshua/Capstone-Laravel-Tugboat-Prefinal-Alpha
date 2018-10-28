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
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col">    
                            <div class="form-group">
                                <label for="addLastName">Last Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="addLastName" name="addLastName" placeholder="Last Name" min="2" max="45" required>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                        </div>
                        <div class="col">    
                            <div class="form-group">
                                <label for="addFirstName">First Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="addFirstName" name="addFirstName" placeholder="First Name" min="2" max="45" required>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                        </div>
                        <div class="col">    
                            <div class="form-group">
                                <label for="addMiddleName">Middle Name</label>
                                <input type="text" class="form-control" id="addMiddleName" name="addMiddleName" placeholder="Middle Name" min="2" max="45">
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="positionSelect">Position<sup class="text-primary">&#10033;</sup></label>
                                <select name="positionSelect" class="form-control" id="positionSelect" required>
                                    <option value="">Select Position</option>
                                    @foreach($positions as $positions)
                                        <option value="{{$positions->intPositionID}}">{{$positions->strPositionName}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Invalid Select</div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="addEmpType">Employee Type<sup class="text-primary">&#10033;</sup></label>
                            <select name="addEmpType" class="form-control" id="addEmpType" required>
                                <option value="">Select Type</option>
                                <option value="Regular">Regular</option>
                                <option value="Reserved">Reserved</option>
                                <option value="On Call">On Call</option>
                            </select>
                            <div class="invalid-feedback">Invalid Select</div>
                        </div>
                    </div>
                    <input type="hidden" id="editIDhide">
                    <!-- <button type="Submit" onclick="postEmployee()" class="btnAdd btn btn-primary waves-effect float-right">Add</button> -->
                    <button type="Submit" class="btnAdd btn btn-primary waves-effect float-right">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
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
            event.preventDefault();
            event.stopPropagation();
            return postEmployee();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>