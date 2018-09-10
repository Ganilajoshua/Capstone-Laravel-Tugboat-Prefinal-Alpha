$(document).ready(function(){
  $(function() {
    var signConsigneeDisplay = $('.signConsigneeCanvasDisplay').signature();
    var signAdmin = $('.signAdminCanvas').signature({
      syncField: '#signatureJSON'
      });
    
    $('.clearAdminCanvas').on('click',function(){
      signAdmin.signature('clear');
    });
    
    $('.signConsigneeCanvasDisplay').signature(this ? 'disable' : 'disable'); 
    if ($('.signConsigneeCanvasDisplay').signature('isEmpty')) {
      $('.btnFinalizeDT').attr('disabled', true);
      $('.btnFinalizeDT').css('cursor', 'not-allowed');
  }else {
    $('.btnFinalizeDT').attr('disabled', false);
    $('.btnFinalizeDT').css('cursor', 'pointer');
  }
});

  $('#transactionTree').addClass('active');
  $('#tPaymentBilling').addClass('active');
  $('#menuDispatchTicket').addClass('active');
  $('#menuInvoice').addClass('inactive');
  $('#menuPayment').addClass('inactive');
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
      
      if ($('.signConsigneeCanvasDisplay').signature('isEmpty')) {
        
      }else{
        return false;  
      }
    });
    $('.signAdminCanvasDisplay').on('click',function() {
      $('#applyAdminSignModal').modal('show');
    });
    $('.btnSubmitSign').click(function() { 
      $('.signAdminCanvasDisplay').signature('enable'). 
        signature('draw', $('#signatureJSON').val());
    }); 
   
    $('.modalClose').on('click',function() {
      $('#applyAdminSignModal').modal('hide');
    });
    // Back 
    $('.btnBack').on('click',function() {
      $('.dispatchTicketTable').css('display','block');
      $('.viewDetails').css('display','none');
    });
    
});
function finalizeDispatch(){
  if ($('.signConsigneeCanvasDisplay').signature('isEmpty') && $('.signAdminCanvas').signature('isEmpty')) {
      toastr.error('Please provide a signature first.', 'Signature Pad Empty!', {
          closeButton: true,
          debug: false,
          timeOut: 2000,
          positionClass: "toast-bottom-right",
          preventDuplicates: true,
          showDuration: 300,
          hideDuration: 300,
          showMethod: "slideDown",
          hideMethod: "slideUp"
      });
  }else {
      alert('eekkk');
  }
}