var url = '/consignee/paymentbilling/payment';
$(document).ready(function(){
    $('.btnApplySign').attr('disabled',true);
    $('.btnApplySign').css('cursor','not-allowed');
    $('.cardCheque').css('cursor','pointer');
    $('.cardCash').css('cursor','pointer');
    $('.breadTemplate').hide();
    $('#chequeDate').datetimepicker({
      format: 'L'
    });
    $(function() {
        var sig = $('.signChequeCanvas').signature();
        $('.clearChequeCanvas').click(function() {
            sig.signature('clear');
            $('.btnApplySign').attr('disabled',true);
            $('.btnApplySign').css('cursor','not-allowed');
        });
    });
    $('.signChequeCanvas').mouseup(function() {
        $('.btnApplySign').attr('disabled',false);
        $('.btnApplySign').css('cursor','pointer');
    });
    $('.btnApplySign').mouseup(function() {
        $('#applyChequeSign').modal('hide');
        swal({
            title: "Success!",
            text: "Signature Applied.",
            type: "success",
            showCancelButton: false,
            confirmButtonClass: "btn-success waves-effect",
            confirmButtonText: "Confirm"
        });
    });
    $('.cardCheque').click(function() {
        $('.cardCheque').addClass('border-primary2');
        $('.iconCheque').addClass('text-primary');
        $('.cardCheque').removeClass('border-secondary2');
        $('.iconCheque').removeClass('text-black');
        $('.cardCash').removeClass('border-primary2');
        $('.iconCash').removeClass('text-primary');
        $('.cardCash').addClass('border-secondary2');
        $('.iconCash').addClass('text-black');
        $('.txtCheque').removeClass('text-black');
        $('.txtCheque').addClass('text-primary');
        $('.txtCash').removeClass('text-black');
        $('.txtCash').addClass('text-black');
        $('.cashDetails').hide();
        $('.chequeDetails').show();
    });
    $('.cardCash').click(function() {
        $('.cardCash').addClass('border-primary2');
        $('.iconCash').addClass('text-primary');
        $('.cardCash').removeClass('border-secondary2');
        $('.iconCash').removeClass('text-black');
        $('.cardCheque').removeClass('border-primary2');
        $('.iconCheque').removeClass('text-primary');
        $('.cardCheque').addClass('border-secondary2');
        $('.iconCheque').addClass('text-black');
        $('.txtCash').removeClass('text-black');
        $('.txtCash').addClass('text-primary');
        $('.txtCheque').removeClass('text-black');
        $('.txtCheque').addClass('text-black');
        $('.chequeDetails').hide();
        $('.cashDetails').show();
    });
    // $('.btnBillInfo').on('click',function(e){
    //     e.preventDefault();
    //     $('#billInfoModal').modal('show');
    // });
    $('.btnChequeSign').on('click',function(e){
        e.preventDefault();
        $('#applyChequeSign').modal('show');
    });
    $('.modalClose').on('click',function(){
        $('#billInfoModal').modal('hide');
        $('#applyChequeSign').modal('hide');
    });
});


function billinfo(id){
    console.log('hi');
    console.log(id); 

    $.ajax({
        url : '/consignee/paymentbilling/payment/' + id + '/info',
        type : 'GET',
        dataType : 'JSON',
        aysnc : true,
        success : function(data){
            console.log('success', data);
                $('#JOAmount').html(data.JOAmount);
                $('#TBDelayFee').html(data.TBDelayFee);
                $('#ViolationFee').html(data.ViolationFee);
                $('#CLateFee').html(data.CLateFee);
                $('#DamageFee').html(data.DamageFee);
                $('#intBillID').html(data.intBillID);
                $('#Total').html(data.Total);
                $('#billInfoModal').modal('show');           
                                }
        });
  }

  function Finalize(id){
    
    var ChequeNum = $('#chequeNum').val();
    var ChequeDate = $('#cDate').val();
    var AbaNum = $('#abaNum').val();
    var ChequeAmount = $('#chequeAmount').val();
    var RouteNum = $('#routeNum').val();
    var ChequeMemo = $('#chequeMemo').val();

    console.log(ChequeDate);
    console.log(id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : '/consignee/paymentbilling/payment/store',
        type : 'POST',
        data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
            ChequeNum : ChequeNum,
            ChequeDate : ChequeDate,
            AbaNum : AbaNum,
            ChequeAmount : ChequeAmount,
            RouteNum : RouteNum,
            ChequeMemo : ChequeMemo,
            BillID : id,

        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            swal({
                title: "The Billing has been Finalize",
                text: "Sent",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = '/consignee/paymentbilling/billing';
                }
            });                       
        },
        error : function(error){
            throw error;
        } 
    });
}
