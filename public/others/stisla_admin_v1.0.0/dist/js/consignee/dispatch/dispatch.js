var url = '/consignee/dispatchticket';
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
});
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
                //date
                $('#start').html(data.dispatch[0].strJOStartPoint);
                $('#destination').html(data.dispatch[0].strJODestination);
                $('#service').html(data.dispatch[0].strServicesName);
                $('#pNum').html(data.dispatch[0].strCompanyContactPNum);
                $('#eMail').html(data.dispatch[0].strCompanyEmail);
                $('#ID').html(data.dispatch[0].intCompanyID);
                $('#infoModal').modal('show');
                
                console.log(data.dispatch[0].boolAApprovedby);
                if(data.dispatch[0].boolAApprovedby==1)
                {
                    $('#forAdmin').addClass("d-none");
                    $('#Admin').removeClass("d-none");
                }
                else
                {
                    $('#forAdmin').removeClass("d-none");
                    $('#Admin').addClass("d-none");
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
                //   $('.signConsigneeCanvasDisplay').signature(this ? 'disable' : 'disable'); 
                if (data.dispatch[0].boolCApprovedby == 1 && data.dispatch[0].boolAApprovedby == 1) {
                    $('.btnFinalizeDT').attr('disabled', false);
                    $('.btnFinalizeDT').css('cursor', 'pointer');
                }else {
                    $('.btnFinalizeDT').attr('disabled', true);
                    $('.btnFinalizeDT').css('cursor', 'not-allowed');
                }
            }
        });
  }
  function Accept(){
      // var id = document.getElementById("dispatch3").value;
      var id = $('#dispatch3').val();
      console.log(id);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url : url + '/store',
          type : 'POST',
          data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
              dispatch : id
          },
          beforeSend: function (request) {
              return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
          },
          success : function(data){
              swal({
                  title: "Success",
                  text: "Dispatch Ticket Accepted",
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