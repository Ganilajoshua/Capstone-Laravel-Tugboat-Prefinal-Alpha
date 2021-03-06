{{-- New View for Employee Edit (Modal) --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Employee</h5>
                <button id="closeEdit" type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col">    
                            <div class="form-group">
                                <label for="editLastName">Last Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="editLastName" name="editLastName" placeholder="Last Name" min="2" max="45" required>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                        </div>
                        <div class="col">    
                            <div class="form-group">
                                <label for="editFirstName">First Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="editFirstName" name="editFirstName" placeholder="First Name" min="2" max="45" required>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                        </div>
                        <div class="col">    
                            <div class="form-group">
                                <label for="editMiddleName">Middle Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="editMiddleName" name="editMiddleName" placeholder="Middle Name" min="2" max="45">
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="editPositionSelect">Position<sup class="text-primary">&#10033;</sup></label>
                                <select name="editPositionSelect" class="form-control" id="editPositionSelect" required>
                                    <option>Select Position</option>
                                    @foreach($positions as $positions)
                                        <option value="{{$positions->intPositionID}}">{{$positions->strPositionName}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Invalid Select</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="editEmpType">Employee Type<sup class="text-primary">&#10033;</sup></label>
                                <select name="editEmpType" class="form-control" id="editEmpType" required>
                                    <option>Select Employee</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Reserved">Reserved</option>
                                    <option value="On Call">On Call</option>
                                </select>
                                <div class="invalid-feedback">Invalid Select</div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="editIDhide">
                    <!-- <button type="button" onclick="editEmployeeSubmit()" class="btnAdd btn btn-primary waves-effect float-right">Update</button> -->
                    <button type="submit" class="btnAdd btn btn-primary waves-effect float-right">Update</button>
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
            return editEmployeeSubmit();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>