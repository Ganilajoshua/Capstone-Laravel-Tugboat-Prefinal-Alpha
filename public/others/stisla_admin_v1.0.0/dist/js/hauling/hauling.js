var url = '/administrator/transactions/dispatchandhauling/hauling';
var url2 = '/administrator/transactions/dispatchandhauling/hauling'
$(document).ready(function(){
    $('#transactionTree').addClass('active');
    $('#tDispatch').addClass('active');
    $('#menuHauling').addClass('active');
    $('#menuForwardReq').addClass('inactive');
    $('#menuJobOrder').addClass('inactive');
    $('#menuTeamBuilder').addClass('inactive');
    $('#menuTugboatAssignment').addClass('inactive');
    $('#menuScheduling').addClass('inactive');

    // Define Ajax Setup Headers For CSRF Token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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
            error : function(data,error){
                console.log(data);
                console.log(error);
            }
        });
    });
}

$('.joborderHaulingInfo').on('click',function(event){
    event.preventDefault();
    console.log($(this).data('id'));
    var joborderID = $(this).data('id');
    console.log('HEYAA');
    $.ajax({
        url : `${url}/${joborderID}/show`,
        type : 'GET',
        dataType : 'JSON',
        success : (data, response)=>{
            $('#jobscheduleTitle').empty();
            $('.tugboatAssignments').empty();
            console.log(data);
            appendJobSchedTitle = 
            `<small class="">Job Order # ${joborderID}</small>
            <h4 class="mt-2">${data.joborder[0].strCompanyName}</h4>`;
            $(appendJobSchedTitle).appendTo('#jobscheduleTitle');
            $('#jobschedInfoModal').modal('show');
        },
        error : (error)=>{
            throw error;
        }
    });
});
$('.backButton').on('click',function(){
    $('.startHaulingContainer').css('display','none');
    $('.jobOrderList').css('display','block');
});

$('.viewStartHauling').on('click',function(event){
    console.log('HEYAA');
    var joborderID = $(this).data('id');
    event.preventDefault();
    $.ajax({
        url : `${url}/${joborderID}/show`,
        type : 'GET',
        dataType : 'JSON',
        success : (data, response)=>{
            console.log(data);
            console.log(data.joborder);
            $('.startHaulingHeader').empty();
            $('.startHaulingBody').empty();
            $('.startHaulingProcess').data('id',data.joborder[0].intJobOrderID)
            // var dLocation ;
            // var sLocation ;
            var team = [];

            // Get Starting and Ending Location
            var location = getLocation(data.joborder);
            console.log(location);
            // Append Header Details
            appendHeader(data.joborder);
            // Append Joborder Details
            appendJoborder(data.joborder,location);
            // Append Tugboat Assignment Container
            appendContainer();
            // Append Tugboat Assignments
            appendBody(data.jobsched);
            // Get Empty Teams
            getEmptyTeams(data.jobsched);
            // Get Teams
            team = getTeam(data.jobsched);
            console.log(team);
            appendEmployees(team);

            // $('.startHaulingContainer').css('display','block');
	        // $('.jobOrderList').css('display','none');
        },
        error : (error)=>{
            throw error;
        }
    });
        
	// $('.startHaulingContainer').css('display','block');
	// $('.jobOrderList').css('display','none');
});

$('.startHaulingProcess').on('click',function(){
    console.log($(this).data('id'));
    var joborderID = $(this).data('id');
    var startDate = moment().format("Y-MM-D");
    var startTime = moment().format("HH:mm");
    swal({
        title: "Start Hauling?",
        text: "Deploy Tugboats on Job Orders",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,

    },(isConfirm)=>{
        if(isConfirm){
            console.log('confirmed');
            
            $.ajax({
                url : `${url}/start`,
                type : 'POST',
                data : {
                    "_token" : $('meta[name="csrf-token"]').attr('content'),
                    joborderID : joborderID,
                    startDate : startDate,
                    startTime : startTime,
                },
                success : (data,response) =>{
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
                        (isConfirm) =>{
                        if(isConfirm){
                            location.reload();
                            // window.location = url;
                        }
                    });           
                },
                error : (error)=>{
                    throw error;
                }
            });    
        }
    });
});

$('.terminateHauling').on('click',function(){
    console.log($(this).data('id'));
    var joborderID = $(this).data('id');
    var endDate = moment().format("Y-MM-D");
    var endTime = moment().format("HH:mm");
    // return false;
    swal({
        title: "Terminate Hauling?",
        text: "Transaction Will End",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,

    },(isConfirm)=>{
        if(isConfirm){
            $.ajax({
                url : `${url}/terminate`,
                type : 'POST',
                data : {
                    "_token" : $('meta[name="csrf-token"]').attr('content'),
                    joborderID : joborderID,
                    endDate : endDate,
                    endTime : endTime,
                },
                success : (data,response)=>{
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
                        (isConfirm)=>{
                        if(isConfirm){
                            location.reload();
                        }
                    });           
                },
                error : (error)=>{
                    throw error;
                }
            });
        }
    });
});

function startHaulingProcess(joborderID){
    console.log(joborderID);
    console.log(moment().format("Y-MM-D HH:mm"));   
    var startDate = moment().format("Y-MM-D");
    var startTime = moment().format("HH:mm");
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
                startDate : startDate,
                startTime : startTime,
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

    var endDate = moment().format("Y-MM-D");
    var endTime = moment().format("HH:mm");
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
                endDate : endDate,
                endTime : endTime,
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
