{{-- New View for Edit (Modal) --}}
<div class="modal fade" id="editPierModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Pier</h5>
                <button id="closeEdit" type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="editPier">Pier Name<sup class="text-primary">&#10033;</sup></label>
                        <input type="text" class="form-control" id="editPier" name="editPier" placeholder="Pier Name" pattern="(Pier)\s*?[0-9]{1,40}" max="45" required>
                        <div class="invalid-feedback">
                            Invalid Input.
                        </div>
                    </div>
                    <input   type="hidden" id="editIDhide">
                    <!-- <button type="button" onclick="editPierSubmit()" class="btnAdd btn btn-primary waves-effect float-right">Update</button> -->
                    <button type="submit" class="btnAdd btn btn-primary waves-effect float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
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
            event.preventDefault();
            event.stopPropagation();
            return editPierSubmit(); 
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>