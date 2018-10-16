$(document).ready(function(){

    $('#transactionTree').addClass('active');
    $('#tPaymentBilling').addClass('active');
    $('#menuPayment').addClass('active');
    $('#menuDispatchTicket').addClass('inactive');
    $('#menuInvoice').addClass('inactive');
    
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
});

$('.btnView').on('click',function(){
    $('.billingTable').hide();
    $('.viewDetails').show();
});

$('.btnBack').on('click',function(){
    $('.viewDetails').hide();
    $('.billingTable').show();
});
var url = '/administrator/transactions/payment';
function validate(id){
    // var id = document.getElementById("dispatch3").value;
    // var id = $('#id').val();
    // console.log(id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : '/administrator/transactions/payment/store',
        type : 'POST',
        data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
            bill : id,
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            swal({
                title: "The Bill has been accepted",
                text: "",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = '/administrator/transactions/payment';
                }
            });                       
        },
        error : function(error){
            throw error;
            console.log('title', error.errors.title);
            console.log('body', error.errors.body);
        } 
    });
}


function reject(id){
    // var id = document.getElementById("dispatch3").value;
    // var id = $('#id').val();
    // console.log(id);
    console.log('reject');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : '/administrator/transactions/payment/reject',
        type : 'POST',
        data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
            bill : id,
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            swal({
                title: "The Bill has been rejected",
                text: "",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = '/administrator/transactions/payment';
                }
            });                       
        },
        error : function(error){
            throw error;
            console.log('title', error.errors.title);
            console.log('body', error.errors.body);
        } 
    });
}

function infopayment(id){
    $.ajax({
        url : url + '/' + id + '/infopayment',
        type : 'GET',
        dataType : 'JSON',
        aysnc : true,
        success : function(data){
            //clear canvas
              
  
                console.log('success', data);
                console.log(id);
                $('#tugboat').html(data.dispatch[0].strName);
                $('#to').html(data.dispatch[0].strCompanyName);
                $('#address').html(data.dispatch[0].strCompanyAddress);
                $('#dispatch').html(data.dispatch[0].intDispatchTicketID);
                $('#dispatch2').html(data.dispatch[0].intDispatchTicketID);
                $('#dispatch3').html(data.dispatch[0].intDispatchTicketID);
                $('#towed').html(data.dispatch[0].strJOVesselName);
                console.log(data.dispatch[0].strName);
                $('#start').html(data.dispatch[0].strJOStartPoint);
                $('#destination').html(data.dispatch[0].strJODestination);
                $('#service').html(data.dispatch[0].enumServiceType);
                $('#pNum').html(data.dispatch[0].strCompanyContactPNum);
                $('#eMail').html(data.dispatch[0].strCompanyEmail);
                $('#ID').html(data.dispatch[0].intCompanyID);
                $('#company').html(data.dispatch[0].intCompanyID);
                $('#amount').html(data.dispatch[0].fltJOAmount);
                $('#delayfee').html(data.dispatch[0].fltTugboatDelayFee);
                $('#conviolationfee').html(data.dispatch[0].fltConsigneeViolationFee);
                $('#conlatefee').html(data.dispatch[0].fltConsigneeLateFee);
                $('#condamagefee').html(data.dispatch[0].fltConsigneeDamageFee);
                $('#comdamagefee').html(data.dispatch[0].fltCompanyDamageFee);
                $('#comviolationfee').html(data.dispatch[0].fltCompanyViolationFee);
                $('#discount').html(data.dispatch[0].intDiscount);
                $('#total').html(data.dispatch[0].fltBalanceRemain);
                
                $('#viewDetails').modal('show');
        }
    });
  }
