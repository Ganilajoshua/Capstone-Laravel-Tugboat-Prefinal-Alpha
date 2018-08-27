
$(document).ready(function(){
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
  $('#btnExportSelected').click(function(e){
    e.preventDefault();
    var ck_box = $('input[type="checkbox"]:checked').length;
    if(ck_box > 0){
      swal({
        title: "You'll proceed to Payment & Billing.",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-primary waves-effect",
        confirmButtonText: "Proceed",
        closeOnConfirm: false
    },
    function(){
        swal("Success!", "", "success");
    });
    }else if(ck_box == 0){
      swal({
        title: "You must select at least 1 checkbox!",
        type: "error",
        showCancelButton: false,
        confirmButtonClass: "btn btn-danger waves-effect",
        confirmButtonText: "Ok",
        closeOnConfirm: false
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
  // Go to Invoices
  $('.gotoInvoices').on('click',function(e) {
    e.preventDefault();
    $('.smCat').text('Invoice List');
    $('.consigneeList').css('display','none');
    $('.consigneeInvoices').css('display','block');
  });
  $('.btnView').on('click',function() {
    $('.smCat').text('Invoice #');
    $('.consigneeInvoices').css('display','none');
    $('.viewDetails').css('display','block');
  });
  // Back 
  $('.btnBack').on('click',function() {
    $('.smCat').text('Consignee List');
    $('.consigneeList').css('display','block');
    $('.consigneeInvoices').css('display','none');
  });
  // Back 
  $('.btnBack2').on('click',function() {
    $('.smCat').text('Invoice List');
    $('.consigneeInvoices').css('display','block');
    $('.viewDetails').css('display','none');
  });
});