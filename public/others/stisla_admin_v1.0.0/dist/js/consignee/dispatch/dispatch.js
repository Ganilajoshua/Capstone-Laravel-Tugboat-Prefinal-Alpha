$(document).ready(function(){
    $('.btnView').on('click',function() {
        $('.dispatchTicketTable').css('display','none');
        $('.viewDetails').css('display','block');
    });
    $('.modalClose').on('click',function() {
        $('#applyAdminSignModal').modal('hide');
    });
    // Back 
    $('.btnBack').on('click',function() {
        $('.dispatchTicketTable').css('display','block');
        $('.viewDetails').css('display','none');
    });
    
    var signConsignee = $('.signConsigneeCanvasDisplay').signature({
        syncField: '#signatureJSON'
    });
    
    $('.clearConsigneeCanvas').on('click',function(){
        signConsignee.signature('clear');
    });
    
    // $('.signConsigneeCanvasDisplay').signature(this ? 'disable' : 'disable'); 
    // if ($('.signConsigneeCanvasDisplay').signature('isEmpty')) {
        // $('.btnFinalizeDT').attr('disabled', true);
        // $('.btnFinalizeDT').css('cursor', 'not-allowed');
        
        // }else {
            //     $('.btnFinalizeDT').attr('disabled', false);
            //     $('.btnFinalizeDT').css('cursor', 'pointer');
            // }
        });
        var url = '/consignee/dispatchticket';
        function get(id){
            console.log('hi');
    $.ajax({
        url : url + '/' + id + '/info',
        type : 'GET',
        dataType : 'JSON',
        aysnc : true,
        success : function(data){
            
            console.log('success', data);
            $('#viewDetails').empty();
            $('#tugboat').html(data.dispatch[0].strName);
            $('#to').html(data.dispatch[0].strCompanyName);
                $('#address').html(data.dispatch[0].strCompanyAddress);
                $('#dispatch').html(data.dispatch[0].intDispatchTicketID);
                $('#dispatch2').html(data.dispatch[0].intDispatchTicketID);
                $('#dispatch3').html(data.dispatch[0].intDispatchTicketID);
                $('#towed').html(data.dispatch[0].strJOVesselName);
                $('#date').html(data.dispatch[0].dateEnded);
                $('#time').html(data.dispatch[0].tmEnded);   

            if(data.dispatch[0].strJOStartPoint==null){
                $('#start').html(data.dispatch[0].strPierName+' '+data.dispatch[0].strBerthName);
                }
            else{   
                $('#start').html(data.dispatch[0].strJOStartPoint);
                }

            if(data.dispatch[0].strJODestination==null){
                $('#destination').html(data.dispatch[0].strPierName+' '+data.dispatch[0].strBerthName);
                }
            else{   
                $('#destination').html(data.dispatch[0].strJODestination);
                }
                
                $('#service').html(data.dispatch[0].enumServiceType);
                $('#pNum').html(data.dispatch[0].strCompanyContactPNum);
                $('#eMail').html(data.dispatch[0].strCompanyEmail);
                $('#ID').html(data.dispatch[0].intCompanyID);
                console.log(data.dispatch[0].strConsigneeSign);


                if(data.dispatch[0].strConsigneeSign!=null && data.dispatch[0].strCApprovedby!=2){
                    $('.signConsigneeCanvasDisplay')
                    .signature('enable')
                    .signature('draw', data.dispatch[0].strConsigneeSign)
                    .signature('disable')
                    ; 
                    $('.signConsigneeCanvasDisplay').signature(this ? 'disable' : 'disable');
                }
                else{
                    $('.signConsigneeCanvasDisplay').signature(this ? 'enable' : 'enable');
                }

                console.log(data.dispatch[0].boolAApprovedby);
                if(data.dispatch[0].boolCApprovedby==1){
                    $('#finalize').addClass("d-none");
                    $('#wait').removeClass("d-none");
                    $('#submit').addClass("d-none");
                }
                else if(data.dispatch[0].boolCApprovedby==0 || data.dispatch[0].boolCApprovedby==null){
                    $('#finalize').removeClass("d-none");
                    $('#wait').addClass("d-none");
                    $('#submit').addClass("d-none");
                }
                else if(data.dispatch[0].boolCApprovedby==2){
                    $('#finalize').addClass("d-none");
                    $('#wait').addClass("d-none");
                    $('#submit').removeClass("d-none");

                    toastr.error('Re-Enter Your Signature', 'Invalid Signature!', {
                        closeButton: true,
                        debug: false,
                        timeOut: 2000,
                        positionClass: "toast-bottom-right",
                        preventDuplicates: true,
                        showDuration: 300,
                        showMethod: "slideDown",
                    });
                }
                $('#infoModal').modal('show');
            }
        });
  }
//   function Accept(){
//       // var id = document.getElementById("dispatch3").value;
//       var id = $('#dispatch3').val();
//       console.log(id);
//       $.ajaxSetup({
//           headers: {
//               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           }
//       });
//       $.ajax({
//           url : url + '/store',
//           type : 'POST',
//           data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
//               dispatch : id
//           },
//           beforeSend: function (request) {
//               return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
//           },
//           success : function(data){
//               swal({
//                   title: "Success",
//                   text: "Dispatch Ticket Accepted",
//                   type: "success",
//                   showCancelButton: false,
//                   confirmButtonClass: "btn-success",
//                   confirmButtonText: "Ok",
//                   closeOnConfirm: true,
//                   timer : 1500
//               },
//               function(isConfirm){
//                   if(isConfirm){
//                       window.location = url;
//                   }
//               });                       
//           },
//           error : function(error){
//               throw error;
//               console.log('title', error.errors.title);
//               console.log('body', error.errors.body);
//           } 
//       });
//   }
function ValidateCAccept(){
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
            return ConsigneeAccept();
        }
}
function ConsigneeAccept(){
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
        url : '/administrator/transactions/dispatchticket/store',
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
                title: "Dispatch Ticket Accepted",
                text: "Wait for the finalization of Dispatch Ticket to Receive the Billing",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500
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
