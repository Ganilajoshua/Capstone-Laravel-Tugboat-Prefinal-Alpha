var url = '/administrator/transactions/tugboatassignment';

$(document).ready(function(){
    $('#transactionTree').addClass('active');
    $('#tDispatch').addClass('active');
    $('#menuTugboatAssignment').addClass('active');
    $('#menuJobOrder').addClass('inactive');
    $('#menuTeamBuilder').addClass('inactive');
    $('#menuScheduling').addClass('inactive');
    $('#menuHauling').addClass('inactive');
    // $('#assignTugboatButton').on('click',function(){
    //     $('#assignTugboatModal').modal('show');
    // });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : url + '/available',
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'), 
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data, response){
            console.log('success pota');
            console.log(data);
            console.log(response);
            if((data.available).length == 0 || null){   
                toastr.error("You Have No Tugboats Available",'All Tugboat have been Occupied', { 
                    positionClass : 'toast-bottom-right', 
                    preventDuplicates : true, 
                    showDuration : "300",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut !important"
                });
            }else if((data.available).length == 1){
                toastr.warning('You Have only &nbsp;' + (data.available).length + '&nbsp; Tugboat Available', "You're Almost out of Tugboats!", { positionClass: 'toast-bottom-right', preventDuplicates: true, });
            }else{
                toastr.success('You Have &nbsp;' + (data.available).length + '&nbsp; Tugboat(s) Available', "Tugboats Left", { positionClass: 'toast-bottom-right', preventDuplicates: true, });
            }                  
        },
        error : function(error){
            throw error;
        }

    });

});


function showTugboatModal(jobOrderID){
    console.log(jobOrderID);
    $('#jobOrderID').val(jobOrderID);
    $('#assignTugboatModal').modal('show');
}
function createTugboatAssignment(){
    console.log($('#jobOrderID').val());
    var id = $('#jobOrderID').val();
    var tugboatsID = [];
    $('.tugboatCheckbox:checkbox:checked').each(function(checked){
        tugboatsID[checked] = parseInt($(this).val());
        // parseInt($(this).val());
    }); 
    console.log(tugboatsID);
    // return false;
    $.ajax({
        url : url + '/create',
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'), 
            jobOrderID : id,
            tugboatsID : tugboatsID,
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data, response){
            console.log('success pota');
            console.log(data);
            console.log(response);
            swal({
                title: "Success",
                text: "Tugboat Assigned",
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
        }

    });

}
function proceedToHauling(jobOrderID){

    swal({
        title: "Proceed To Hauling?",
        text: "Move This Job Order To Hauling",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,

    },function(){

        $.ajax({
            url : url + '/hauling',
            type : 'POST',
            data : { 
                "_token" : $('meta[name="csrf-token"]').attr('content'), 
                joborderID : jobOrderID
            }, 
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : function(data, response){
                console.log('success pota');
                console.log(data);
                console.log(response);
                swal({
                    title: "Success",
                    text: "Job Order Ready To Haul",
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
            }
    
        });
    
    });
}