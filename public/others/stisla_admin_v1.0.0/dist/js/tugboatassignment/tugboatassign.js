var url = '/administrator/transactions/tugboatassignment';

$(document).ready(function(){
    $('#transactionTree').addClass('active');
    $('#tDispatch').addClass('active');
    $('#menuForwardReq').addClass('inactive');
    $('#menuTugboatAssignment').addClass('active');
    $('#menuJobOrder').addClass('inactive');
    $('#menuTeamBuilder').addClass('inactive');
    $('#menuScheduling').addClass('inactive');
    $('#menuHauling').addClass('inactive');
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

$('.createTugboatAssignment').on('click',function(){
    console.clear();
    var joborderID = $(this).data('id');
    $('.createTugboatAssignSubmit').data('id',joborderID);
    $('.suggestedTugboatsContainer').empty();
    var appendBestTugContainer =
    `<div class="row">
        <div class="card-body card-success border-success">
            <div class="card border border-success">
                <div class="suggestedTugboats row ml-2" style="margin-top: 13px; margin-bottom: 13px;">
                </div>
            </div>          
        </div>
    </div>`;
    $(appendBestTugContainer).appendTo('.suggestedTugboatsContainer');

    console.log(joborderID);
    $.ajax({
        url : `${url}/${joborderID}/showjoborder`,
        type : 'GET',
        success : (data, response)=>{
            console.log(data);
            $('.availableTugboats').empty();
            // console.log(data.joborder.fltWeight);
            // console.log(data.tugboats);
            // var tugboatcombination = []; 
            // tugboatcombination = tugboatcombinations(data.tugboats,data.joborder);
            // console.log(tugboatcombination.best.length);
            // $('.suggestedTugboats').empty();
            // $('.joborder-weight').html(data.joborder.fltWeight + " tons");
            // console.log(tugboatcombination.best[0].strName , tugboatcombination.best[0].strBollardPull);
            // for(var count = 0; count < (tugboatcombination.best).length; count++){
            //     var appendBestTug = `
            //     <div class="col-auto mt-4">
            //         <div class="card bg-success">
            //             <div class="card-body mb-1">
            //             <h6>${tugboatcombination.best[count].strName}</h6>
            //             ${tugboatcombination.best[count].strBollardPull}
            //             ${tugboatcombination.best.total}
            //             </div>
            //         </div>
            //     </div>`;
            //     $(appendBestTug).appendTo('.suggestedTugboats');
            // }

            for(var counter = 0; counter < (data.tugboats.length); counter++){

                var appendAvailableTugboats = 
                    `<div class="col-auto">
                        <div class="card bg-success">
                            <div class="card-body">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" id="availableTugboat${data.tugboats[counter].intTAssignID}" data-id="${data.tugboats[counter].intTAssignID}" name="tugboatlist[]" class="custom-control-input tugboatCheckbox">
                                    <label class="custom-control-label" for="availableTugboat${data.tugboats[counter].intTAssignID}">
                                        <p class="card-text text-center ml-2">${data.tugboats[counter].strName}</p>
                                        <small>${data.tugboats[counter].strHorsePower}HP</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>`;
                $(appendAvailableTugboats).appendTo('.availableTugboats');    
            }
            $('#assignTugboatModal').modal('show');
        },
        error : (error)=>{
            throw error;
        }
    });
}); 
// function
$('.createTugboatAssignSubmit').on('click',function(){
    console.log($('#jobOrderID').val());
    $(this).data('id');
    var id = $(this).data('id');
    var tugboatsID = [];
    $('.tugboatCheckbox:checkbox:checked').each(function(checked){
        tugboatsID[checked] = parseInt($(this).data('id'));
        // parseInt($(this).val());
    }); 
    console.log(tugboatsID);
    console.log(id);
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

});

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