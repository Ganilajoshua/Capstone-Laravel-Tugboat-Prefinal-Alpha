{{-- New View For Berth Create (Modal) --}}
<div class="modal fade" id="addBerthModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Berth</h5>
                <button id="closeEdit" type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="addBerth">Add Berth<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="addBerth" name="addBerth" placeholder="Berth Name" pattern="(Berth)\s*?[0-9]{1,39}" max="45" required>
                                <div class="invalid-feedback">Invalid Input.</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="pierSelect">Pier<sup class="text-primary">&#10033;</sup></label>
                                <select id="pierSelect" name="pierSelect" class="form-control form-control-lg" required>
                                    <option value="">Select Pier</option>
                                    @foreach($piers as $piers)
                                        <option value="{{$piers->intPierID}}">{{$piers->strPierName}}</option>
                                    @endforeach                    
                                </select>
                                <div class="invalid-feedback">Invalid Select</div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="editIDhide">
                    <!-- <button type="Submit" onclick="postBerth()" class="btnAdd btn btn-primary waves-effect float-right">Add</button> -->
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
            return postBerth();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>