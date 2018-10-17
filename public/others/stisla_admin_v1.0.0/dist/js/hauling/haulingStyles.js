$(document).ready(function(){

  // Disable button
    // For Pending Cards
  if($('.pendingCards .btnStart').prop('disabled')){
    $('.pendingCards .btnStart').css('cursor','not-allowed');
  }else{
    $('.pendingCards .btnEnd').prop('disabled', true)
    $('.pendingCards .btnEnd').css('cursor','not-allowed');
    $('.pendingCards .btnUL').prop('disabled', true)
    $('.pendingCards .btnUL').css('cursor','not-allowed');
  }
  $('.pendingCards .btnStart').on('click',function(){
    $('.pendingCards .btnStart').prop('disabled', true)
    $('.pendingCards .btnStart').css('cursor','not-allowed');
    $('.pendingCards .btnEnd').prop('disabled', false)
    $('.pendingCards .btnEnd').css('cursor','pointer');
    $('.pendingCards .btnUL').prop('disabled', false)
    $('.pendingCards .btnUL').css('cursor','pointer');
  });
    // For Active Cards
    $('.activeCards .btnStart').prop('disabled', true);
  // Initialize Data Table
  var dtTitle = "Tugboat Services Management System"
  var table = $('.detailedTable').DataTable( {
  columnDefs: [
      { targets: 'noSortAction', orderable: false }
  ], 
  "language": {
    "lengthMenu": 'Display <select class="custom-select custom-select form-control form-control">'+
    '<option hidden>1000</option>'+
    '<option value="-1">All</option>'+
    '<option value="10">10</option>'+
    '<option value="20">25</option>'+
    '<option value="50">50</option>'+
    '<option value="100">100</option>'+
    '</select> records'},

  responsive: true,
  fade:true
});
  // Modal Close
  $('.modalClose').on('click',function() {
    $('#updateLoc').modal('hide');
    $('#moreInfoModal').modal('hide');
  });
  
  // $('#timeUpdated').datetimepicker({
  //   format:'HH:mm'
  // });
  // // Sweet Alerts
  // $('.btnUpdateLoc').on('click',function(){
  //   swal({
  //     title: "Location Update Added!",
  //     text: "Successfully added the Location Update.",
  //     type: "success",
  //     showCancelButton: false,
  //     confirmButtonClass: "btn-primary waves-effect",
  //     confirmButtonText: "Ok",
  //     closeOnConfirm: true
  //   });
  //   $('#updateLoc').modal('hide');
  // });
  $('.btnStart').on('click',function(){
    swal({
      title: "Hauling Started!",
      text: "Hauling Job Order #17 has been Started.",
      type: "success",
      showCancelButton: false,
      confirmButtonClass: "btn-primary waves-effect",
      confirmButtonText: "Ok",
      closeOnConfirm: true
    });
  });
  $('.btnEnd').on('click',function() {
    swal({
        title: "End Hauling Service.",
        text: "Are you sure to end the hauling of Job Order # 17?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger primary",
        confirmButtonText: "Yes, end it!",
        closeOnConfirm: false
    },
    function(){
        swal("Ended!", "Hauling of Job Order # 17 has been ended.", "success");
    });
  });
//   $('.startHauling').on('click',function(event){
// 	  event.preventDefault();
// 	$('.startHaulingContainer').css('display','block');
// 	$('.jobOrderList').css('display','none');
//   });
});