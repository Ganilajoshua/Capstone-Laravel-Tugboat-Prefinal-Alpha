var url = '/administrator/transactions/tugboatassignment';

$(document).ready(function(){
    $('#transactionTree').addClass('active');
    $('#tDispatch').addClass('active');
    $('#menuForwardReq').addClass('inactive');
    $('#menuTugboatAssignment').addClass('active');
    $('#menuJobOrder').removeClass('active');
    $('#menuTeamBuilder').removeClass('active');
    $('#menuScheduling').removeClass('active');
    $('#menuHauling').removeClass('active');
    // $('#assignTugboatButton').on('click',function(){
    //     $('#assignTugboatModal').modal('show');
    // });
    toastr.options = {
        closeButton: true,
        debug: false,
        timeOut: 2000,
        positionClass: "toast-bottom-right",
        preventDuplicates: true,
        showDuration: 300,
        hideDuration: 300,
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "slideDown",
        hideMethod: "slideUp"
    }
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
<<<<<<< HEAD
                toastr.error("You Have No Tugboats Available",'All Tugboat have been Occupied', { 
                    positionClass : 'toast-bottom-right', 
                    preventDuplicates : true, 
                    showDuration : "300",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                });
            }else if((data.available).length == 1){
                toastr.warning(`You Have only &nbsp; ${(data.available).length} &nbsp; Tugboat Available`, "You're Almost out of Tugboats!", { positionClass: 'toast-bottom-right', preventDuplicates: true, });
            }else{
                toastr.success(`You Have &nbsp; ${(data.available).length} &nbsp; Tugboat(s) Available`, "Tugboats Left", { positionClass: 'toast-bottom-right', preventDuplicates: true, });
=======
                toastr.error("You Have No Tugboats Available",'All Tugboat have been Occupied');
            }else if((data.available).length == 1){
                toastr.warning('You Have only &nbsp;' + (data.available).length + '&nbsp; Tugboat Available', "You're Almost out of Tugboats!");
            }else{
                toastr.success('You Have &nbsp;' + (data.available).length + '&nbsp; Tugboat(s) Available', "Tugboats Left");
>>>>>>> 8648a27bddf770dd094663a34b430151a1ab644b
            }                  
        },
        error : function(error){
            throw error;
        }

    });
});

$('.assignTugboatButton').on('click', function(){    
    console.log($(this).data('id'));
    console.log($(this).data('date'));
    var date = moment($(this).data('date')).format('YYYY-MM-DD');
    console.log(date);
    $('#assignTugboatModal').modal('show');
    $.ajax({
        url : url + '/tugboatsavailable',
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            date : date,
        },
        success : (data)=>{
            console.log(data);
            
        },error : (error)=>{
            throw error;
        },

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