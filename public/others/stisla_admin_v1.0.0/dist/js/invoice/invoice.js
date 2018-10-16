var url = '/administrator/transactions/invoice';

$('.btnView').on('click',function(){
    $('.billingTable').hide();
    $('.viewDetails').show();
});

$('.btnBack').on('click',function(){
    $('.viewDetails').hide();
    $('.billingTable').show();
});

function infopayment(id){
console.log(id);
    // return false;
    $.ajax({
        url : url + '/' + id + '/show',
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