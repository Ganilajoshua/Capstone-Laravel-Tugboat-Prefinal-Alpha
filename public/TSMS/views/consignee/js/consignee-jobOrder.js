$(document).ready(function(){
  // Add Date Pickers
  $('#addTransacDate').datetimepicker({
    format: 'L'
  });
  $('#addHaulingETA').datetimepicker({
    format:'HH:mm'
  });
  // Edit Date Pickers
  $('#editTransacDate').datetimepicker({
    format: 'L'
  });
  $('#editHaulingETA').datetimepicker({
    format:'HH:mm'
  });
  // Add Job Order
  $('#navFirstTab').on('click', function(){
    document.getElementById("titleJO").innerHTML = "Add Job Order";
    $('.paginateJO').css('display','none');
  });
  // Created Job Orders
  $('#navSecondTab').on('click', function(){
    document.getElementById("titleJO").innerHTML = "Created Job Orders";
    $('.createdCards').addClass('animated zoomIn faster');
    $('.paginateJO').css('display','block');
    $('.show-on-created').show();
  });
  // Pending Job Orders
  $('#navThirdTab').on('click', function(){
    document.getElementById("titleJO").innerHTML = "Pending Job Orders";
    $('.pendingCards').addClass('animated zoomIn faster');
    $('.paginateJO').css('display','block');
    $('.show-on-created').hide();
  });
  // Ongoing Job Orders
  $('#navFourthTab').on('click', function(){
    document.getElementById("titleJO").innerHTML = "Ongoing Job Order /s";
    $('.pendingCards').addClass('animated zoomIn faster');
    $('.paginateJO').css('display','block');
    $('.show-on-created').hide();
  });
  // Job Order History
  $('#navFifthTab').on('click', function(){
    document.getElementById("titleJO").innerHTML = "Job Order History";
    $('.paginateJO').css('display','none');
  });
  
  // Initialize Datatable
  $('.detailedTable').DataTable( {
    columnDefs: [
        { targets: 'noSortAction', orderable: false }
    ], 
    fade:true,
    "language": {
      "lengthMenu": 'Display <select class="custom-select custom-select form-control form-control">'+
      '<option hidden>1000</option>'+
      '<option value="-1">All</option>'+
      '<option value="10">10</option>'+
      '<option value="20">25</option>'+
      '<option value="50">50</option>'+
      '<option value="100">100</option>'+
      '</select> records'},
  });

  // Add Fields
  $('.btnAddFields').on('click',function() { 
    var appendFields = `<div class="row addContainer">
    <div class="col-12 col-sm-12 col-lg-4 ">
      <div class="form-group">
        <label for="cargoName">Cargo Name<sup class="text-primary">&#10033;</sup></label>
        <input type="text" class="form-control" id="cargoName" placeholder="Energy Moon" required>
        <div class="invalid-feedback">
          Please fill in the Cargo Name.
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-lg-4">
      <div class="form-group">
        <label for="cargoWeight">Cargo Weight <sup class="text-primary">&#10033;</sup></label>
        <div class="input-group">
          <input id="cargoWeight" type="number" class="form-control" placeholder="20" required>
          <div class="input-group-append">
            <span class="input-group-text">Tons</span>
          </div>
          <div class="invalid-feedback">
            Please fill in the Cargo Weight.
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-lg-4">
      <div class="form-group">
        <label for="addGoods">Goods to be delivered <sup class="text-primary">&#10033;</sup></label>
          <input type="text" class="form-control" id="addGoods" placeholder="Cooking Oil" required>
          <div class="invalid-feedback">
            Please fill in the Estimated Goods to be delivered.
          </div>
          <button type="button" class="btn btn-primary btn-sm text-center waves-effect btnRemoveFields mt-2 float-right" data-toggle="tooltip" title="Delete Fields">
            <i class="fas fa-minus"></i>
          </button>
      </div>
    </div>
  </div>`;
    $(appendFields).appendTo('#firstRow').fadeIn(500);
  });
  $('#firstRow').on('click',".btnRemoveFields",function(event){
    $(this).closest('.addContainer').fadeOut(200,function(){
      $(this).remove();
    });
    event.stopPropagation();
  });
  // Sweet Alerts
  $('.btnDeleteJO').on('click',function(event) {
    event.preventDefault();
    swal({
        title: "Are you sure?",
        text: "You will not be able to this Job Order.",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger waves-effect",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },
    function(){
        swal("Deleted!", "Job Order has been deleted.", "success");
    });
  });
  $('.btnRequestJO').on('click',function(event) {
    event.preventDefault();
    swal({
        title: "Are you sure?",
        text: "Submit Job Order Request.",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-primary waves-effect",
        confirmButtonText: "Submit",
        closeOnConfirm: false
    },
    function(){
        swal("Submitted!", "Job Order Request has been submitted.", "success");
    });
  });
  $('.btnEditJO').on('click',function() {
    $('#moreInfoModal').modal('hide');
  });
  $('.btnSubmitEditJO').on('click',function() {
    $('#JOeditModal').modal('hide');
    swal({
        title: "Are you sure?",
        text: "Submit Job Order Request.",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-primary waves-effect",
        confirmButtonText: "Submit",
        closeOnConfirm: false
    },
    function(isConfirm){ 
      if(isConfirm){
        swal("Submitted!", "Job Order Request has been submitted.", "success");
      }else{
        $('#JOeditModal').modal('show');
      }
    });
  });
  // $('form#formAddJO').submit(function(e){
  //   e.preventDefault();
  //   $.ajax({
  //     url: '/consignee/joborder',
  //     method: 'post',
  //     data: $('form#formAddJO').serialize(),
  //     success: function(){
  //       swal(
  //         'Added!',
  //         'Job Order Requested.',
  //         'success'
  //       );
  //       location.reload();
  //     }
  //   })
  // })
});