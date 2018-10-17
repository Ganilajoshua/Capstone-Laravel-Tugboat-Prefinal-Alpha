$(document).ready(function(){

    $('#utilitiesTree').addClass('active');
    $('#menuContractFeesMatrix').addClass('active');
    $('#menuTeamComp').addClass('inactive');
    $('#menuTugboatMatrix').addClass('inactive');

    $('.btnEditHaulingMatrix').on('click', function(){
        console.log($(this).data('id'));
        $('.cardContractMatrix').hide();
        $('.cardTugAssistFee').hide();
        $('.cardHaulingFee').show();
    });
    $('.btnEditTugAssistMatrix').on('click', function(){
        console.log($(this).data('id'));
        $('.cardContractMatrix').hide();
        $('.cardHaulingFee').hide();
        $('.cardTugAssistFee').show();
    });
    $('.btnBack').on('click', function(){
        $('.cardContractMatrix').show();
        $('.cardHaulingFee').hide();
        $('.cardTugAssistFee').hide();
    });

});