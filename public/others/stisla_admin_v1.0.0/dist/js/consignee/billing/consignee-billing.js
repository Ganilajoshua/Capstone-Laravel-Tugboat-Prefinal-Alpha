var url = '/consignee/paymentbilling/billing';
$(document).ready(function(){
    $('.btnSubmitSign').attr('disabled', true);
    $('.btnSubmitSign').css('cursor', 'not-allowed');
    $('#tPaymentBillingD').addClass('active');
    $('#menuBillingD').addClass('active');
    $('#tPaymentBillingM').addClass('active');
    $('#menuBillingM').addClass('active');
    $('#breadPB').show();
    $('#breadSlash').show();
    $('#breadCurrent').text('Billing');
    (function ($) {
        // USE STRICT
        "use strict";
    
        // Select 2
        try {
    
          $(".js-select2").each(function () {
            $(this).select2({
              minimumResultsForSearch: 20,
              dropdownParent: $(this).next('.dropDownSelect2')
            });
          });
    
        } catch (error) {
          console.log(error);
        }
    
    
      })(jQuery);
      $('#btnPaySelected').click(function(e){
        e.preventDefault();
        var ck_box = $('input[type="checkbox"]:checked').length;
        if(ck_box > 0){
          window.location = "/consignee/paymentbilling/payment"
        }else if(ck_box == 0){
            toastr.error('You must select atleast one bill to proceed.', 'No Bill Selected!', {
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
        }
    });
     // Changing state of checkall checkbox 
     $(".checkbox").click(function(){
    
      if($(".checkbox").length == $(".checkbox:checked").length) {
        $("#checkall").prop("checked", true);
      }else {
        $("#checkall").prop("checked", false);
      }
    
    });
       // Check or Uncheck All checkboxes
       $("#checkall").change(function(){
        var checked = $(this).is(':checked');
        if(checked){
          $(".checkbox").each(function(){
            $(this).prop("checked",true);
          });
        }else{
          $(".checkbox").each(function(){
            $(this).prop("checked",false);
          });
        }
      });


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
    $('.btnView').on('click',function() {
        $('.billingTable').css('display','none');
        $('.viewDetails').css('display','block');
    });
      // Back 
    $('.btnBack').on('click',function() {
        $('.billingTable').css('display','block');
        $('.viewDetails').css('display','none');
    });
      
});

function payselected(){
//   console.log($('#jobOrderID').val());
//   var id = $('#jobOrderID').val();
  var bill = [];
  $('.billcheckbox:checkbox:checked').each(function(checked){
      bill[checked] = parseInt($(this).val());
      // parseInt($(this).val());
      console.log(bill);
  }); 

//   return false;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
    url : url + '/store',
    type : 'POST',
    data : { 
        "_token" : $('meta[name="csrf-token"]').attr('content'),
        bill : bill, 
    }, 
    beforeSend: function (request) {
        return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
    },

});
}
