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
    $('.btnBillInfo').on('click',function(e){
        e.preventDefault();
        $('#billInfoModal').modal('show');
    });
    $('.btnChequeSign').on('click',function(e){
        e.preventDefault();
        $('#applyChequeSign').modal('show');
    });
    $('.modalClose').on('click',function(){
        $('#billInfoModal').modal('hide');
        $('#applyChequeSign').modal('hide');
    });
});