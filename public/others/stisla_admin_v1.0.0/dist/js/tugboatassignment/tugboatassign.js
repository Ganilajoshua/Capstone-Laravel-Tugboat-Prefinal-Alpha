var url = '/administrator/transactions/dispatchandhauling/tugboatassignment';

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

    // $.ajax({
    //     url : url + '/available',
    //     type : 'POST',
    //     data : { 
    //         "_token" : $('meta[name="csrf-token"]').attr('content'), 
    //     }, 
    //     beforeSend: function (request) {
    //         return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
    //     },
    //     success : function(data, response){
    //         console.log('success pota');
    //         console.log(data);
    //         console.log(response);
    //         if((data.available).length == 0 || null){   
    //             toastr.error("You Have No Tugboats Available",'All Tugboat have been Occupied', { 
    //                 positionClass : 'toast-bottom-right', 
    //                 preventDuplicates : true, 
    //                 showDuration : "300",
    //                 "showMethod": "fadeIn",
    //                 "hideMethod": "fadeOut"
    //             });
    //         }else if((data.available).length == 1){
    //             toastr.warning(`You Have only &nbsp; ${(data.available).length} &nbsp; Tugboat Available`, "You're Almost out of Tugboats!", { positionClass: 'toast-bottom-right', preventDuplicates: true, });
    //         }else{
    //             toastr.success(`You Have &nbsp; ${(data.available).length} &nbsp; Tugboat(s) Available`, "Tugboats Left", { positionClass: 'toast-bottom-right', preventDuplicates: true, });
    //         }                  
    //     },
    //     error : function(error){
    //         throw error;
    //     }

    // });

    $('.backButton').on('click',function(){
        $('.assignTugboat').css('display','none');
        $('.tugboatAssignment').css('display','block');
    });
});

// Select Color Indicator
$('.colorIndicator').on('click',function(event){
    event.preventDefault();
    console.log('hi');
    var color = $(this).data('color');
    console.log(color);
    console.log($('.colorIndicatorButton').attr('class'));
    $('.colorIndicatorButton').css(`background-color`,color);
    $('.colorIndicatorButton').css(`color`,'#fff');
    $('.colorIndicatorButton').css('border','none');
    // $('.colorIndicatorButton').empty();
    $('.colorIndicatorButton').html("");
    $('.colorIndicatorButton').data('color',color);
    $('.colorIndicatorButton').html($(this).data('colortext'));
});

$('.assignTugboatButton').on('click', function(){    
    console.log($(this).data('id'));
    console.log($(this).data('date'));
    var date = moment($(this).data('date')).format('YYYY-MM-DD');
    $('.assignTugboat').css('display','block');
    $('.tugboatAssignment').css('display','none');
    // console.log(date);   
    // $('#assignTugboatModal').modal('show');
    // $.ajax({
    //     url : url + '/tugboatsavailable',
    //     type : 'POST',
    //     data : {
    //         "_token" : $('meta[name="csrf-token"]').attr('content'),
    //         date : date,
    //     },
    //     success : (data)=>{
    //         console.log(data);
            
    //     },error : (error)=>{
    //         throw error;
    //     },

    // });
});

// function showTugboatModal(jobOrderID){
//     console.log(jobOrderID);
//     $('#jobOrderID').val(jobOrderID);
//     $('#assignTugboatModal').modal('show');
// }

$('.showJobOrdersAssigned').on('click',function(event){
    event.preventDefault();
    console.log($(this).data('id'));
    var tugboatID = $(this).data('id');
    console.log('HI');
    $.ajax({
        url : `${url}/${tugboatID}/showassignedjoborders`,
        type : 'GET',
        dataType : 'JSON',
        success : (data,response)=>{
            console.log(data);
            $('#viewTugboatJobOrders').modal('show'); 
            $('.tugboatName').html(`${data.tugboat[0].strName} List of Assigned Job Orders`);
            appendAssignedJobOrders(data.assigned);       
        },
        error : (error)=>{
            throw error;
        }
    })

});

$('.showTugboatInformation').on('click',function(event){
    event.preventDefault();
    console.log($(this).data('id'));
    var tugboatID = $(this).data('id');

    $.ajax({
        url : `${url}/${tugboatID}/showtugboatinformation`,
        type : 'GET',
        dataType : 'JSON',
        success : (data, response)=>{
            console.log(data);
            $('#titleTugboatName').html(data.tugboat[0].strName);
            console.log(data.tugboat[0].strName);
            var figures = (data.tugboat[0].strCylinderperCycle).split('/');

            // Tugboat Main Information
            $('#tugboatInfoName').html(data.tugboat[0].strName);
            $('#tugboatInfoLength').html(data.tugboat[0].strLength);
            $('#tugboatInfoBreadth').html(data.tugboat[0].strBreadth);
            $('#tugboatInfoDepth').html(data.tugboat[0].strDepth);
            $('#tugboatInfoHorsePower').html(data.tugboat[0].strHorsePower);
            $('#tugboatInfoMaxSpeed').html(data.tugboat[0].strMaxSpeed);
            $('#tugboatInfoBollardPull').html(data.tugboat[0].strBollardPull);
            $('#tugboatInfoGrossTonnage').html(data.tugboat[0].strGrossTonnage);
            $('#tugboatInfoNetTonnage').html(data.tugboat[0].strNetTonnage);
            $('#tugboatInfoDryDocked').html(data.tugboat[0].datLastDrydocked);
            // Tugboat Specifications
            $('#tugboatInfoLocationBuilt').html(data.tugboat[0].strLocationBuilt);
            $('#tugboatInfoDateBuilt').html(data.tugboat[0].datBuiltDate);
            $('#tugboatInfoBuilder').html(data.tugboat[0].strBuilder);
            $('#tugboatInfoMakerPower').html(data.tugboat[0].strMakerPower);
            $('#tugboatInfoHullMaterial').html(data.tugboat[0].strHullMaterial);
            $('#tugboatInfoDrive').html(data.tugboat[0].strDrive);
            $('#tugboatInfoCylCycle').html(`${figures[0]} cylinder <br> ${figures[1]} per cycle`);
            $('#tugboatInfoAuxEngine').html(data.tugboat[0].strAuxEngine);
            // Tugboat Classifications
            $('#tugboatInfoClassNum').html(data.tugboat[0].strClassNum);
            $('#tugboatInfoOfficialNum').html(data.tugboat[0].strOfficialNum);
            $('#tugboatInfoIMONum').html(data.tugboat[0].strIMONum);
            $('#tugboatInfoFlag').html(data.tugboat[0].strTugboatFlag);
            $('#tugboatInfoType').html(data.tugboat[0].strTugboatTypeName);
            $('#tugboatInfoTradingArea').html(data.tugboat[0].strTradingArea);
            $('#tugboatInfoHomePort').html(data.tugboat[0].strHomePort);
            $('#tugboatInfoISPSCode').html(data.tugboat[0].enumISPSCodeCompliance);
            $('#tugboatInfoISMCode').html(data.tugboat[0].enumISMCodeStandard);
            $('#tugboatInfoNavEquipments').html(data.tugboat[0].enumAISGPSVHFRadar);
            //Tugboat Insurances
            $('#tugboatInfoInsurances').empty();
            console.log(response);
            for(var counter = 0; counter < data.insurances.length; counter++){
                var appendInsurances = `<p>${data.insurances[counter].strTugboatInsuranceDesc}</p>`
                $(appendInsurances).appendTo('#tugboatInfoInsurances');
            }
            console.log(data.insurances);
            $('#tugboatInfoModal').modal('show');
            
        },
        error : (error)=>{
            throw error;
        }

    });
});

$('.createTugboatAssignment').on('click',function(){
    console.clear();
    // return false;
    console.log('hi');
    var joborderID = $(this).data('id');
    console.log(joborderID);
    $('.assignTugboatsButton').data('id',joborderID);
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
            // Get Locations of Joborder
            var location = getLocation(data.joborder);
            console.log(location,'heyaaaaaaaaaaaa');
            // Append Job Order Header
            appendJoborderHeader(data.joborder);
            // Append Job Order Content(Body);
            appendJoborderBody(data.joborder,location);
            
            // tugboatcombinations = tugboatcombinations(data.tugboats,data.joborder);
            // 
            // console.log(data.joborder.fltWeight);
            // console.log(data.tugboats);
            // var tugboatcombination = []; 
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
            // var appendAvailableTugboats = 
            //     `<div class="col-auto">
            //         <div class="card bg-success">
            //             <div class="card-body">
            //                 <div class="custom-control custom-checkbox custom-control-inline">
            //                     <input type="checkbox" id="availableTugboatList" data-id="" name="tugboatlist[]" class="custom-control-input tugboatsCheckbox">
            //                     <label class="custom-control-label" for="availableTugboat">
            //                         <p class="card-text text-center ml-2">Heya</p>
            //                         <small>HP</small>
            //                     </label>
            //                 </div>
            //             </div>
            //         </div>
            //     </div>`;
            // $(appendAvailableTugboats).appendTo('.availableTugboats');
               
            
            for(var counter = 0; counter < (data.tugboats.length); counter++){

                var appendAvailableTugboats = 
                    `<div class="col-auto">
                        <div class="card bg-success">
                            <div class="card-body">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" id="availableTugboat${data.tugboats[counter].intTugboatID}" data-id="${data.tugboats[counter].intTugboatID}" name="tugboatlist[]" class="custom-control-input tugboatsCheckbox">
                                    <label class="custom-control-label" for="availableTugboat${data.tugboats[counter].intTugboatID}">
                                        <p class="card-text text-center ml-2">${data.tugboats[counter].strName}</p>
                                        <small>${data.tugboats[counter].strHorsePower}HP</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>`;
                $(appendAvailableTugboats).appendTo('.availableTugboatsContainer');    
            }
            // $('#assignTugboatModal').modal('show');
            $('.assignTugboat').css('display','block');
            $('.tugboatAssignment').css('display','none');
        },
        error : (error)=>{
            throw error;
        }
    });
}); 
// function
$('.assignTugboatsButton').on('click',function(){
    console.log($(this).data('id'));
    $(this).data('id');
    var id = $(this).data('id');
    var colorIndicator = $('.colorIndicatorButton').data('color');
    var tugboatsID = [];
    $('.tugboatsCheckbox:checkbox:checked').each(function(checked){
        tugboatsID[checked] = parseInt($(this).data('id'));
        // parseInt($(this).val());
    }); 
    console.log(colorIndicator);
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
            colorIndicator : colorIndicator,
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

$('.createTugboatAssignSubmit').on('click',function(){
    console.log($('#jobOrderID').val());
    $(this).data('id');
    var id = $(this).data('id');
    var tugboatsID = [];
    $('.tugboatsCheckbox:checkbox:checked').each(function(checked){
        tugboatsID[checked] = parseInt($(this).data('id'));
        // parseInt($(this).val());
    }); 
    console.log(tugboatsID);
    console.log(id);
    return false;
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