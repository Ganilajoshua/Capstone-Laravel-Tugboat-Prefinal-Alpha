$(document).ready(function(){

// Initialize Tooltip
$('[data-toggle="tooltip"]').tooltip();

// Initialize Data Table
var dtTitle = "Tugboat Services Management System"
var table = $('.detailedTable').DataTable( {
columnDefs: [
    { targets: 'noSortAction', orderable: false }
], 
buttons: [
    {
        extend: 'copy',
        text: '&mdash; Copy &mdash;',
        title: dtTitle,
        className: 'btn btn-primary waves-effect',
        exportOptions: {
        columns: 'th:not(:last-child)',
        }
        },
        {
        extend: 'print',
        text: '&mdash; Print &mdash;',
        title: dtTitle,
        className: 'btn btn-primary waves-effect',
        exportOptions: {
        columns: 'th:not(:last-child)'
        }
        },
        {
        extend: 'pdf',
        text: '&mdash; PDF &mdash;',
        title: dtTitle,
        className: 'btn btn-primary waves-effect',
        exportOptions: {
        columns: 'th:not(:last-child)'
        }
        }
],
  "language": {
      "lengthMenu": 'Display <select class="custom-select custom-select form-control form-control">'+
      '<option hidden>1000</option>'+
      '<option value="10">10</option>'+
      '<option value="20">25</option>'+
      '<option value="50">50</option>'+
      '<option value="100">100</option>'+
      '<option value="-1">All</option>'+
      '</select> records'},

  responsive: true,
  fade:true
  });

  table.buttons().container().appendTo('.exportButtons');
  toastr.options = {
    "closeButton": true,
    "positionClass": "toast-top-right",
    "showDuration": "5000",
    "hideDuration": "1000",
    "timeOut": "2000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  $('.buttons-pdf').on('click',function() {
    toastr.success('PDF Downloaded!');
  });

  // Close Modal
  $('.modalClose').on('click',function() {
    $('#editModal, #addModal').modal('hide');
});
  $('.delItem').on('click',function(q) {
    q.preventDefault();
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover Energy Sun.",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger waves-effect",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },
    function(){
        swal("Deleted!", "Energy Sun has been deleted.", "success");
    });
  });
      
  $('.btnAdd').on('click',function(s) {
    $('#addModal').modal('hide');
    s.preventDefault();
    swal({
      title: "Are you sure?",
      text: "New Position will be added.",
      type: "info",
      showCancelButton: true,
      confirmButtonClass: "btn-primary waves-effect",
      confirmButtonText: "Ok",
      closeOnConfirm: false
  },
    function(isConfirm) {
      if (isConfirm) {
        swal("Added Successfully!", "New Position has been added!", "success");
      } else {
        $('#addModal').modal('show');
      }
    });
  });

  $('.btnEdit').on('click',function(e) {
    $('#editModal').modal('hide');
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
        swal("Updated!", "Position has been updated.", "success");
      } else {
        $('#editModal').modal('show');
      }
    });
  });
  
});