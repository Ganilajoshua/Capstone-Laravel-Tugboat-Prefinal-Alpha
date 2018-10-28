{{-- New View for Edit Position (Modal) --}}
<div class="modal fade" id="editPositionModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Position</h5>
                <button id="closeEdit" type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="editPosition">Position<sup class="text-primary">&#10033;</sup></label>
                        <input type="text" class="form-control" id="editPosition" name="editPosition" placeholder="Position Name" min="2" max="45" required>
                        <div class="invalid-feedback">Invalid Select</div>
                    </div> 
                    <input type="hidden" id="editIDhide">
                    <!-- <button type="button" onclick="editPositionSubmit()" class="btnAdd btn btn-primary waves-effect float-right">Update</button> -->
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
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        else{
            event.preventDefault();
            event.stopPropagation();
            return editPositionSubmit();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
