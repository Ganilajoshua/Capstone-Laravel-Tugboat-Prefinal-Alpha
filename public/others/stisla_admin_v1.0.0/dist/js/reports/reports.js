$(document).ready(function(){
    $('#reportsTree').addClass('active');
    $('.detailedTable').DataTable({columnDefs: [
        { targets: 'noSortAction', orderable: false }
    ] ,
    language: {
        "lengthMenu": 'Display <select class="custom-select custom-select form-control form-control">'+
        '<option hidden>1000</option>'+
        '<option value="10">10</option>'+
        '<option value="25">25</option>'+
        '<option value="50">50</option>'+
        '<option value="100">100</option>'+
        '<option value="-1">All</option>'+
        '</select> records'},
        responsive : true,
    });
    $('.selectReport').select2({
        width: 'resolve',
        placeholder: "Select a report",
        allowClear: false
    });
    
    $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )
  
      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })
    $('.submitReports').on('click',function(){
        if($('.selectReport').val() == "disabledTugboats"){
            $('.rowDisabledTugboats').show();
            $('.rowJobOrderReport').hide();
            $('.rowSalesReport').hide();
            $('.rowSOA').hide();
            $('.rowServiceReport').hide();
        }else if($('.selectReport').val() == "jobOrderReport"){
            $('.rowJobOrderReport').show();
            $('.rowDisabledTugboats').hide();
            $('.rowSalesReport').hide();
            $('.rowSOA').hide();
            $('.rowServiceReport').hide();
        }else if($('.selectReport').val() == "salesReport"){
            $('.rowSalesReport').show();
            $('.rowJobOrderReport').hide();
            $('.rowDisabledTugboats').hide();
            $('.rowSOA').hide();
            $('.rowServiceReport').hide();
        }else if($('.selectReport').val() == "statementOfAccount"){
            $('.rowSOA').show();
            $('.rowJobOrderReport').hide();
            $('.rowSalesReport').hide();
            $('.rowDisabledTugboats').hide();
            $('.rowServiceReport').hide();
        }else if($('.selectReport').val() == "serviceReport"){
            $('.rowServiceReport').show();
            $('.rowJobOrderReport').hide();
            $('.rowSalesReport').hide();
            $('.rowSOA').hide();
            $('.rowDisabledTugboats').hide();
        }else{
            toastr.error('Please select a report first.', 'Select A Report!', {
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
});