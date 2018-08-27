$(document).ready(function(){

  // Custom tooltip selector
  $('[data-tooltip="tooltip"]').tooltip();
  
  // Ion Sliders
  $("#discountRange").ionRangeSlider({
    min: 0,
    max: 20,
    from: 0
  });
  
  // Initialize Summernote
  $(".summernoteQuote").summernote({
    minHeight: 350,
    disableDragAndDrop: true,
    placeholder: "Remarks / Other Details",
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
  // Close Modal
  $('.modalClose').on('click',function() {
    $('#viewQuoteInfo').modal('hide');
    $('#editQuoteInfo').modal('hide');
  });
  // Modal Edit
  $('#modalEdit').on('click',function() {
    $('#viewQuoteInfo').modal('hide');
    $('#editQuoteInfo').modal('show');
  });
  // Tooltips
  $('.helpDelayFee').tooltip({
    title: "This is the fee when the tugboat encountered some problems during the service that brought delay to the estimated time of arrival. ",
    placement: "top"
  }); 
  $('.helpViolationFee').tooltip({
    title: "This is when the consignee violates the details that are stated in the contract. ",
    placement: "top"
  }); 
  $('.helpLateFee').tooltip({
    title: "This is when a tugboat is late at the arrival point where it will pick the barge.",
    placement: "top"
  }); 
  $('.helpDamageFee').tooltip({
    title: " If a damage is done through the service that may be from the goods that is being hauled, then a damage fee is the one to handle that.",
    placement: "top"
  }); 
  $('.helpDiscount').tooltip({
    title: "Are given to the clients as a means of being grateful for letting the company do the hauling. service for them",
    placement: "top"
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
  $('#editSave').on('click',function(e) {
    $('#editQuoteInfo').modal('hide');
    e.preventDefault();
    swal({
      title: "Changes won't be undone.",
      text: "Save Changes?",
      type: "info",
      showCancelButton: true,
      confirmButtonClass: "btn-primary waves-effect",
      confirmButtonText: "Ok",
      closeOnConfirm: false
  },
    function(isConfirm) {
      if (isConfirm) {
        swal("Updated!", "Quotation has been updated.", "success");
      } else {
        $('#editQuoteInfo').modal('show');
      }
    });
  });

});