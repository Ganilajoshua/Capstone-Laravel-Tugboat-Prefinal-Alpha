$(document).ready(function(){
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
    // View Dispatch Ticket Info
    $('.btnView').on('click',function() {
      $('.dispatchTicketTable').css('display','none');
      $('.viewDetails').css('display','block');
    });
    // Back 
    $('.btnBack').on('click',function() {
      $('.dispatchTicketTable').css('display','block');
      $('.viewDetails').css('display','none');
    });
    
});