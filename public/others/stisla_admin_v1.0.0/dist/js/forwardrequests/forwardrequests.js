$(document).ready(function(){
    $('#transactionTree').addClass('active');
    $('#menuForwardReq').addClass('active');
    $('#menuHauling').addClass('active');
    $('#tDispatch').addClass('active');
    $('#menuJobOrder').addClass('inactive');
    $('#menuTeamBuilder').addClass('inactive');
    $('#menuTugboatAssignment').addClass('inactive');
    $('#menuHauling').addClass('inactive');
    $('#menuScheduling').addClass('inactive');
});

$('.voidJoborder').on('click',function(){
    console.log($(this).data('id'));
    swal({
        title: "Are you Sure?",
        text: "Disregard the Whole Job Order?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,
    });
});

$('.rescheduleJoborder').on('click',function(){
    var joborderid = 
    swal({
        title: "Are you Sure?",
        text: "Reschedule this Job Order?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,
    },(isConfirm)=>{
        if(isConfirm){
            $('#rescheduleModal').modal('show');
            $('.rescheduleButton').data
        }
    });
});