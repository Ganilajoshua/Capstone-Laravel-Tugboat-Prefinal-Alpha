$(document).ready(function(){
  $(function() {
    var sig = $('.signCanvas').signature();
    $('.clearCanvas').click(function() {
        sig.signature('clear');
    });
  }); 
  $('.btnRequest').on('click',function(event) {
    event.preventDefault();
    swal({
        title: "Contract Request Sent!",
        text: "Contract Request has been submitted!",
        type: "success",
        showCancelButton: false,
        confirmButtonClass: "btn-primary waves-effect",
        confirmButtonText: "Ok",
        showConfirmButton: false,
        timer:1500
    });
  });
  $(".summernoteQuote").summernote({
    minHeight: 350,
    disableDragAndDrop: true,
    fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18','20','22','24','26','28', '36', '48' , '72'],
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['fontname'],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize'],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert',['link']],
      ['help']
    ]
  });
  ctr = 0;
  // Append and Remove
  $('.btnAddFields').on('click',function() {
    var appendFields = `<div class="row addContainer">
    <div class="col-12 col-sm-12 col-lg-6">
      <div class="form-group">
        <label for="quoteDesc">Quotation Description<sup class="text-primary">&#10033;</sup></label>
          <input type="text" class="form-control" id="quoteDesc" placeholder="Description" required>
          <div class="invalid-feedback">
            Please fill in the Quotation Description.
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-lg-6">
      <div class="form-group">
        <label for="quoteFee">Quotation Fee<sup class="text-primary">&#10033;</sup></label>
          <input type="text" class="form-control" id="quoteFee" placeholder="Quotation Fee" required>
          <div class="invalid-feedback">
            Please fill in the Quotation Fee.
          </div>
            <button type="button" class="btn btn-primary btn-sm text-center waves-effect btnRemoveFields mt-2 float-right" data-toggle="tooltip" title="Delete Fields">
              <i class="fas fa-minus"></i>
            </button>
        </div>
      </div>
    </div>`;
    if(ctr<10){
      $(appendFields).appendTo('#firstRow').addClass( "animated fadeIn fast" ) ;
      ctr++;
    }else{
      swal({
        title: "Maximum of 10 Additional Fields!",
        type: "info",
        confirmButtonClass: "btn-primary waves-effect",
        confirmButtonText: "Ok",
        closeOnConfirm: false
    });
    }
  });
  $('#firstRow').on('click',".btnRemoveFields",function(event){
    $(this).closest('.addContainer').fadeOut(200,function(){
      $(this).remove();
      ctr--;
    });
    event.stopImmediatePropagation();
  });

  // Sweet Alerts
  $('.delItem').on('click',function() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this Quotation.",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },
    function(){
        swal("Deleted!", "Quotation has been deleted.", "success");
    });
  });
});