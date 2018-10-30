<div class="modal fade" id="addGoodsModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Goods</h5>
                <button type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col">    
                            <div class="form-group">
                                <label for="addGoodsName">Goods Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="addGoodsName" name="addGoodsName" placeholder="Goods Name" pattern="[a-zA-Z ]{1,}" required>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="Submit" onclick="createGoods()" class="btnAdd btn btn-primary waves-effect float-right">Add</button> -->
                    <button type="Submit"  class="btnAdd btn btn-primary waves-effect float-right">Add</button>
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
            return createGoods();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>