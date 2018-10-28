{{-- New View for Add Position (Modal) --}}
<div class="modal fade" id="addPositionModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Position</h5>
                <button id="closeEdit" type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="addPosition">Position<sup class="text-primary">&#10033;</sup></label>
                        <input type="text" class="form-control" id="addPosition" name="addPosition" placeholder="Position Name" required>
                        <div class="invalid-feedback">Invalid Select</div>
                    </div> 
                    <input type="hidden" id="editIDhide">
                    <!-- <button type="Submit" onclick="postPosition()" class="btnAdd btn btn-primary waves-effect float-right">Add</button> -->
                    <!-- <button type="Submit" class="btnAdd btn btn-primary waves-effect float-right">Add</button> -->
                    <button type="submit" class="btnAdd btn btn-primary waves-effect float-right">Add</button>
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
            return postPosition();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
