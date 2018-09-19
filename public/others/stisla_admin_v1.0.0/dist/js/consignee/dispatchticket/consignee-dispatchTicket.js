$(document).ready(function(){
    $('.btnSubmitSign').attr('disabled', true);
    $('.btnSubmitSign').css('cursor', 'not-allowed');
    $('#tPaymentBillingD').addClass('active');
    $('#menuDispatchTicketD').addClass('active');
    $('#tPaymentBillingM').addClass('active');
    $('#menuDispatchTicketM').addClass('active');
    $('#breadPB').show();
    $('#breadSlash').show();
    $('#breadCurrent').text('Dispatch Ticket');
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
    // View Dispatch Ticket Info$(function() {
    var signConsigneeDisplay = $('.signConsigneeCanvas').signature();
    var signAdmin = $('.signAdminCanvas').signature({
      syncField: '#signatureJSON'
      });
    
    $('.clearConsigneeCanvas').on('click',function(){
      $('.btnSubmitSign').attr('disabled', true);
      $('.btnSubmitSign').css('cursor', 'not-allowed');
      signConsigneeDisplay.signature('clear');
    });
    
    $('.signAdminCanvas').signature(this ? 'disable' : 'disable'); 
  //   if ($('.signConsigneeCanvas').signature('isEmpty')) {
  //     $('.btnSubmitSign').attr('disabled', true);
  //     $('.btnSubmitSign').css('cursor', 'not-allowed');
  // }else {
  //   $('.btnSubmitSign').attr('disabled', false);
  //   $('.btnSubmitSign').css('cursor', 'pointer');
  // }
  
    $('.signConsigneeCanvas').mouseup(function(){
      if ($('.signConsigneeCanvas').signature('isEmpty')) {
          $('.btnSubmitSign').attr('disabled', true);
          $('.btnSubmitSign').css('cursor', 'not-allowed');
        } else {
          $('.btnSubmitSign').attr('disabled', false);
          $('.btnSubmitSign').css('cursor', 'pointer');
        }
    });
    $('.btnView').on('click',function() {
        $('.dispatchTicketTable').css('display','none');
        $('.viewDetails').css('display','block');
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
function submitSignature(){
  if ($('.signConsigneeCanvas').signature('isEmpty') && $('.signAdminCanvas').signature('isEmpty')) {
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