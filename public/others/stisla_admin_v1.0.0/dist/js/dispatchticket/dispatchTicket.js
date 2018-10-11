$(document).ready(function(){
  $(function() {
      var signConsignee = $('.signConsigneeCanvasDisplay').signature();
      var signAdmin = $('.signAdminCanvas').signature({
          syncField: '#signatureJSON'
        });
        
        $('.clearAdminCanvas').on('click',function(){
            signAdmin.signature('clear');
        });
        $('.btnBack').on('click',function() {
            signAdmin.signature('clear');
            signConsignee.signature('clear');
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
      $('.viewCharges').css('display','none');
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
        $('.viewCharges').css('display','none');

    });
    
    //finalize
    $('.finalize').on('click',function() {
        $('.dispatchTicketTable').css('display','none');
        $('.viewDetails').css('display','none');
        $('.viewCharges').css('display','block');
    });
    
    //finalize - back
    
    $('.btnFinalizeBack').on('click',function() {
        
            $('.dispatchTicketTable').css('display','none');
            $('.viewDetails').css('display','block');
            $('.viewCharges').css('display','none');
            
        });
        
    });
    var url = '/administrator/transactions/dispatchticket';
function getData(id){
    $.ajax({
        url : url + '/' + id + '/info',
        type : 'GET',
      dataType : 'JSON',
      aysnc : true,
      success : function(data){
          //clear canvas

            console.log('success', data);
            console.log(id);
            $('#viewDetails').empty();
            $('#viewCharges').empty();
            $('#tugboat').html(data.dispatch[0].strName);
            $('#to').html(data.dispatch[0].strCompanyName);
            $('#address').html(data.dispatch[0].strCompanyAddress);
            $('#dispatch').html(data.dispatch[0].intDispatchTicketID);
            $('#dispatch2').html(data.dispatch[0].intDispatchTicketID);
            $('#dispatch3').html(data.dispatch[0].intDispatchTicketID);
            $('#towed').html(data.dispatch[0].strJOVesselName);
            //date
            $('#start').html(data.dispatch[0].strJOStartPoint);
            $('#destination').html(data.dispatch[0].strJODestination);
            $('#service').html(data.dispatch[0].enumServiceType);
            $('#pNum').html(data.dispatch[0].strCompanyContactPNum);
            $('#eMail').html(data.dispatch[0].strCompanyEmail);
            $('#ID').html(data.dispatch[0].intCompanyID);
            $('#company').html(data.dispatch[0].intCompanyID);
            
            // <button id="forAdmin" onclick="ValidateAAccept()" class="btn btn-primary waves-effect float-left" >
            // Submit to Consignee
            // </button>
            `${data.dispatch}`
            
            $('.temp').empty();
            var appendData = 
            `
            <div class="viewCharges">
        <div class="card card-primary animated slideInDown fast">
            <div class="card-header">
                    <a href="#" class="btnFinalizeBack btn btn-lg btn-link float-left" data-toggle="tooltip" title="Back" role="button">
                        <i class="ion-chevron-left"></i>
                    </a>
                    <h4 class="float-right">Additional Charges for Bill # ${data.dispatch[0].intDispatchTicketID}</h4>
                </div>
        <form class="needs-validation" novalidate>
            <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="amount">Job Order Amount</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">&#8369; </span>
                                    </div>
                                    <input type="number" name="amount" id="amount" min="0" class="form-control">
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <div class="input-group">
                                    <input type="number" name="discount" id="discount" min="0" max="${data.dispatch[0].intFCFDiscountFee}" class="form-control" min="0">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="delay">Tugboat Delay Fee</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="delay" name="delay" placeholder="No. of Hour" min=0>
                                    <div class="input-group-append">
                                        <span class="input-group-text">x</span>
                                    </div>
                                    <input type="number" class="form-control" id="delayrate" name="delayrate"  value="${data.dispatch[0].fltFCFTugboatDelayFee}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="companydamagefee">Company Damage Fee</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">&#8369; </span>
                                    </div>
                                    <input type="number" name="companydamagefee" id="companydamagefee" class="form-control" min="${data.dispatch[0].fltFCFMinDamageFee}"  max="${data.dispatch[0].fltFCFMaxDamageFee}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="companyviolation">Company Violation Fee</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">&#8369; </span>
                                    </div>
                                    <input type="number" name="companyviolation" id="companyviolation" class="form-control" min="0"  max="${data.dispatch[0].fltFCFViolationFee}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="consigneelatefee">Consignee Late Fee</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="consigneelatefee" name="consigneelatefee" placeholder="No. of Hour" min="0">
                                <div class="input-group-append">
                                    <span class="input-group-text">x</span>
                                </div>
                                <input type="number" class="form-control" id="" name="" value="${data.dispatch[0].fltFCFConsigneeLateFee}" disabled>
                            </div>
                            <div class="invalid-feedback">
                                    Invalid Input.
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="consigneedamagefee">Consignee Damage Fee</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">&#8369; </span>
                                </div>
                                <input type="number" name="consigneedamagefee" id="consigneedamagefee"  class="form-control" min="${data.dispatch[0].fltFCFMinDamageFee}" max="${data.dispatch[0].fltFCFMaxDamageFee}">
                                <div class="invalid-feedback">
                                    Invalid Input.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="consigneeviolation">Consignee Violation Fee</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">&#8369; </span>
                                </div>
                                <input type="number" name="consigneeviolation" id="consigneeviolation" class="form-control" min="0" max="${data.dispatch[0].fltFCFViolationFee}">
                                </div>
                                <div class="invalid-feedback">
                                    Invalid Input.
                                </div>
                        </div>
                    </div>
                </div>
                <button type="Submit" class="btn btn-primary waves-effect float-right">Apply Charges</button>
            </div>
            </form>
            </div>
        </div>
            `;
            $(appendData).appendTo('.temp');

            if(data.dispatch[0].enumServiceType=='Hauling')
            {
                var amount = 20000;
                // $('#amount1') = amount;
                $('#standard1').html(data.dispatch[0].fltFCFStandardRate);
                $('#delay1').html(data.dispatch[0].fltFCFTugboatDelayFee);
                $('#violation1').html(data.dispatch[0].fltFCFViolationFee);
                $('#conlatefee1').html(data.dispatch[0].fltFCFConsigneeLateFee);
                $('#minDamage1').html(data.dispatch[0].fltFCFMinDamageFee);
                $('#maxDamage1').html(data.dispatch[0].fltFCFMaxDamageFee);
                $('#discount1').html(data.dispatch[0].intFCFDiscountFee);
            }
            else if(data.dispatch[0].enumServiceType=='Tug Assist')
            {
                var amount = 20000;
                // $('#amount1') = amount;
                $('#standard1').html(data.dispatch[1].fltFCFStandardRate);
                $('#delay1').html(data.dispatch[1].fltFCFTugboatDelayFee);
                $('#violation1').html(data.dispatch[1].fltFCFViolationFee);
                $('#conlatefee1').html(data.dispatch[1].fltFCFConsigneeLateFee);
                $('#minDamage1').html(data.dispatch[1].fltFCFMinDamageFee);
                $('#maxDamage1').html(data.dispatch[1].fltFCFMaxDamageFee);
                $('#discount1').html(data.dispatch[1].intFCFDiscountFee);
            }

            if(data.dispatch[0].strAdminSign!=null){
            $('.signAdminCanvas').signature('enable').signature('draw', data.dispatch[0].strAdminSign).signature('disable'); 
            }
            else{
            }
            if(data.dispatch[0].strConsigneeSign!=null){
            $('.signConsigneeCanvasDisplay').signature('enable').signature('draw', data.dispatch[0].strConsigneeSign).signature('disable'); 
            $('.alertConsigneeSign').addClass("d-none");
            }
            else{
                $('.alertConsigneeSign').removeClass("d-none");
            }
            var signConsignee = $('.signConsigneeCanvasDisplay').signature({
            syncField: '#signatureJSON'
            });
                signConsignee.signature('clear');
            
            $('#infoModal').modal('show');
          if(data.dispatch[0].boolAApprovedby==1)
          {
            $('.signAdminCanvas').signature(this ? 'disable' : 'disable');
            $('.clearAdminCanvas').addClass("d-none");
            $('#forAdmin').addClass("d-none");
          }
          else
          {
            $('.signAdminCanvas').signature(this ? 'enable' : 'enable');
            $('.clearAdminCanvas').removeClass("d-none");
            $('#forAdmin').removeClass("d-none");
          }

          if(data.dispatch[0].boolCApprovedby==1)
          {
            $('#forConsignee').addClass("d-none");
            $('#Consignee').removeClass("d-none");
          }
          else
          {
            $('#forConsignee').removeClass("d-none");
            $('#Consignee').addClass("d-none");
            
          }
            if (data.dispatch[0].boolCApprovedby == 1 && data.dispatch[0].boolAApprovedby == 1) {
                $('.btnFinalizeDT').attr('disabled', false);
                $('.btnFinalizeDT').css('cursor', 'pointer');
            }else {
                $('.btnFinalizeDT').attr('disabled', true);
                $('.btnFinalizeDT').css('cursor', 'not-allowed');
            }
      }
  });
  
  $('.dispatchTicketTable').css('display','none');
  $('.viewDetails').css('display','block');
}

function ValidateAAccept(){
    var sign = $('#signatureJSON').val();
        if(sign == '{"lines":[]}' || sign == null || sign == ''){
            toastr.error('Please provide a signature first.', 'No Signature!', {
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
        else
        {
            return AdminAccept();
        }
}
function AdminAccept(){
    // var id = document.getElementById("dispatch3").value;
    var id = $('#id').val();
    var sign = $('#signatureJSON').val();
    console.log(id);
    console.log(sign);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : url + '/AdminAccept',
        type : 'POST',
        data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
            dispatch : id,
            signature : sign,
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            swal({
                title: "Success",
                text: "Dispatch Ticket is Submitted",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = url;
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
function Void(){
    // var id = document.getElementById("dispatch3").value;
    var id = $('#id').val();
    console.log(id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : url + '/Void',
        type : 'POST',
        data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
            dispatch : id,
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            swal({
                title: "Dispatch Ticket Reconfirmation Sent",
                text: "Wait",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = url;
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
function finalize(){
    // var id = document.getElementById("dispatch3").value;
    var id = $('#id').val();

    var finalize = $('#compid').val();

    var consigneeviolation = $('#consigneeviolation').val();
    var consigneelatefee = $('#consigneelatefee').val();
    var consigneedamagefee = $('#consigneedamagefee').val();
    var consigneecharge = (Number(consigneeviolation) + Number(consigneelatefee) + Number(consigneedamagefee));

    var delay = $('#delay').val();
    var companydamagefee = $('#companydamagefee').val();
    var companyviolation = $('#companyviolation').val();  
    var companycharges = (Number(delay)+Number(companydamagefee)+Number(companyviolation))
    var discount = $('#discount').val();
    var amount = $('#amount').val(); 

    var total = ((Number(amount)-(Number(amount)*(Number(discount)*.01)))+Number(consigneecharge)-Number(companycharges));
    console.log(total);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : url + '/finalize',
        type : 'POST',
        data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
            amount : amount,  
            delay : delay,    
            discount : discount,
            companydamagefee : companydamagefee,
            consigneedamagefee : consigneedamagefee,
            consigneelatefee : consigneelatefee,
            companyviolation : companyviolation,
            consigneeviolation : consigneeviolation,
            dispatch : id,
            finalize : finalize,
            total : total,
            
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            swal({
                title: "Success",
                text: "Dispatch Ticket Finalized",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = url;
                }
            });                       
        },
        error : function(error){
            throw error;
        } 
    });
}


// function finalize(){
//     $.ajax({
//         url : url + '/info',
//         type : 'GET',
//       dataType : 'JSON',
//       aysnc : true,
//       success : function(data){
//           //clear canvas

//             console.log('success', data);
//             console.log(id);
//             $('#viewDetails').empty();
//             $('#viewCharges').empty();
//             $('#tugboat').html(data.dispatch[0].strName);
//             $('#to').html(data.dispatch[0].strCompanyName);
//             $('#address').html(data.dispatch[0].strCompanyAddress);
//             $('#dispatch').html(data.dispatch[0].intDispatchTicketID);
//             $('#dispatch2').html(data.dispatch[0].intDispatchTicketID);
//             $('#dispatch3').html(data.dispatch[0].intDispatchTicketID);
//             $('#towed').html(data.dispatch[0].strJOVesselName);
//             //date
//             $('#start').html(data.dispatch[0].strJOStartPoint);
//             $('#destination').html(data.dispatch[0].strJODestination);
//             $('#service').html(data.dispatch[0].enumServiceType);
//             $('#pNum').html(data.dispatch[0].strCompanyContactPNum);
//             $('#eMail').html(data.dispatch[0].strCompanyEmail);
//             $('#ID').html(data.dispatch[0].intCompanyID);
//             $('#company').html(data.dispatch[0].intCompanyID);
//             `${data.id}`
//             $('#infoModal').modal('show');

//       }
//   });
  
//   $('.dispatchTicketTable').css('display','none');
//   $('.viewDetails').css('display','block');
// }