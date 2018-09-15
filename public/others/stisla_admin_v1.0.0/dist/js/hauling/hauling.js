var url = '/administrator/transactions/hauling';

$(document).ready(function(){
    $('#transactionTree').addClass('active');
    $('#tDispatch').addClass('active');
    $('#menuHauling').addClass('active');
    $('#menuForwardReq').addClass('inactive');
    $('#menuJobOrder').addClass('inactive');
    $('#menuTeamBuilder').addClass('inactive');
    $('#menuTugboatAssignment').addClass('inactive');
    $('#menuScheduling').addClass('inactive');
});


function prepareHauling(joborderID){
    console.log(joborderID);
    console.log(moment().format("Y-MM-D HH:mm"));
    var pdatetime = moment().format("Y-MM-D HH:mm");
    // return false;
    swal({
        title: "Prepare for Hauling?",
        text: "Perform Maintenances for Tugboats",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,

    },function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });   

        $.ajax({
            url : url + '/start',
            type : 'POST',
            data : {
                "_token" : $('meta[name="csrf-token"]').attr('content'),
                joborderID : joborderID,
                prepareTime : pdatetime,
            },
            success : function(data,response){
                console.log(data);
                swal({
                    title: "Success",
                    text: "Initial Contract Created",
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
    
            }
        });
    });
}

function startHauling(joborderID){
    console.log(joborderID);
    console.log(moment().format("Y-MM-D HH:mm"));
    var startTime = moment().format("Y-MM-D HH:mm");
    // return false;
    swal({
        title: "Start Hauling?",
        text: "Deploy Tugboats on Job Orders",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,

    },function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });   

        $.ajax({
            url : url + '/start',
            type : 'POST',
            data : {
                "_token" : $('meta[name="csrf-token"]').attr('content'),
                joborderID : joborderID,
                haulingStart : startTime,
            },
            success : function(data,response){
                console.log(data);
                swal({
                    title: "Success",
                    text: "Hauling Started",
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
    
            }
        });
    });
}

function terminateHauling(joborderID){
    console.log(joborderID);
    console.log(moment().format("Y-MM-D HH:mm"));

    var terminateTime = moment().format("Y-MM-D HH:mm");
    // return false;
    swal({
        title: "Terminate Hauling?",
        text: "Transaction Will End",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,

    },function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });   

        $.ajax({
            url : url + '/terminate',
            type : 'POST',
            data : {
                "_token" : $('meta[name="csrf-token"]').attr('content'),
                joborderID : joborderID,
                haulingEnd : terminateTime,
            },
            success : function(data,response){
                console.log(data);
                swal({
                    title: "Success",
                    text: "Hauling Terminated",
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
    
            }
        });
    });
}
