$(document).ready(function(){
  // Add Date Pickers
  $('#addHaulingDate').datetimepicker({
    format: 'L'
  }); 
  $('#addHaulingTime').datetimepicker({
    format: 'LT'
  });
  $('#addAssistDate').datetimepicker({
    format: 'L'
  }); 
  $('#addAssistTime').datetimepicker({
    format: 'LT'
  });
  $('#addSalvageDate').datetimepicker({
    format: 'L'
  }); 
  $('#addSalvageTime').datetimepicker({
    format: 'LT'
  });
  // Edit Date Pickers
  // $('#editTransacDate').datetimepicker({
  //   format: 'L'
  // });
  // $('#editHaulingETA').datetimepicker({
  //   format:'HH:mm'
  // });
  // Route Change
  $('#addHaulingRoute').change(function(){
    if(this.value == "LocPier"){
      $('.LocPier').show().addClass('animated fadeIn fast');
      $('.PierLoc').hide();
      $('.LocLoc').hide();
    }else if(this.value == "PierLoc"){
      $('.PierLoc').show().addClass('animated fadeIn fast');
      $('.LocPier').hide();
      $('.LocLoc').hide();
    }else if(this.value == "LocLoc"){
      $('.LocLoc').show().addClass('animated fadeIn fast');
      $('.PierLoc').hide();
      $('.LocPier').hide();
    }
  });
  $('#addTugAssistRoute').change(function(){
    if(this.value == "LocPier"){
      $('.LocPier').show().addClass('animated fadeIn fast');
      $('.PierLoc').hide();
      $('.LocLoc').hide();
    }else if(this.value == "PierLoc"){
      $('.PierLoc').show().addClass('animated fadeIn fast');
      $('.LocPier').hide();
      $('.LocLoc').hide();
    }else if(this.value == "LocLoc"){
      $('.LocLoc').show().addClass('animated fadeIn fast');
      $('.PierLoc').hide();
      $('.LocPier').hide();
    }
  });

  // Choose Service Type
  $('.btnGoToChoices').on('click', function(e){
    e.preventDefault();
    $('.chooseServiceTab').show();
    $('.haulingTab').hide();
    $('.tugAssistTab').hide();
    $('.salvageTab').hide();
    $('.btnGoToChoices').hide();
  });
  $('#showHaulingTab').on('click', function(e){
    e.preventDefault();
    $('.haulingTab').show();
    $('.haulingTab').addClass('animated fadeIn fast');
    $('.btnGoToChoices').show();
    $('.chooseServiceTab').hide();
  });
  $('#showTugAssistTab').on('click', function(e){
    e.preventDefault();
    $('.tugAssistTab').show();
    $('.tugAssistTab').addClass('animated fadeIn fast');
    $('.btnGoToChoices').show();
    $('.chooseServiceTab').hide();
  });
  $('#showSalvageTab').on('click', function(e){
    e.preventDefault();
    $('.salvageTab').show();
    $('.salvageTab').addClass('animated fadeIn fast');
    $('.btnGoToChoices').show();
    $('.chooseServiceTab').hide();
  });
  // Add Job Order
  $('#navFirstTab').on('click', function(){
    $('#titleJO').text("Add Job Order");
    $('.paginateJO').hide();
    $('.btnGoToChoices').show();
  });
  // Created Job Orders
  $('#navSecondTab').on('click', function(){
    $('#titleJO').text("Created Job Orders");
    $('.createdCards').addClass('animated zoomIn faster');
    $('.paginateJO').show();
    $('.show-on-created').show();
    $('.btnGoToChoices').hide();
  });
  // Pending Job Orders
  $('#navThirdTab').on('click', function(){
    $('#titleJO').text("Pending Job Orders");
    $('.pendingCards').addClass('animated zoomIn faster');
    $('.paginateJO').show();
    $('.btnGoToChoices').hide();
    $('.show-on-created').hide();
  });
  // Ongoing Job Orders
  $('#navFourthTab').on('click', function(){
    $('#titleJO').text("Ongoing Job Order /s");
    $('.pendingCards').addClass('animated zoomIn faster');
    $('.paginateJO').show();
    $('.btnGoToChoices').hide();
    $('.show-on-created').hide();
  });
  // Job Order History
  $('#navFifthTab').on('click', function(){
    $('#titleJO').text("Job Order History");
    $('.btnGoToChoices').hide();
    $('.paginateJO').hide();
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
          <input type="text" class="form-control" id="addGoods" placeholder="BAD" required>
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
      $('.submitJO').on('click',function(){
        if($('#formAddJO').hasClass('validated')){
          swal({
            title: "Are you sure?",
            text: "Submit Job Order Request.",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-primary waves-effect",
            confirmButtonText: "Submit",
            closeOnConfirm: false
          }).then(function(){
            $('#formAddJO').submit();
          });
      }
      });
});