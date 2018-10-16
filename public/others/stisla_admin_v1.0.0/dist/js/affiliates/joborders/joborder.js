var url = '/affiliates/transactions/dispatchandhauling/joborders';

$(document).ready(function(){
    $('#transactionTree').addClass('active');
    $('#tDispatch').addClass('active');
    $('.menuTugboatAssignment').addClass('inactive');
    $('.menuJobOrder').addClass('active');
    $('.menuForwardReq').addClass('inactive');
    $('.menuTeamBuilder').addClass('inactive');
    $('.menuScheduling').addClass('inactive');
    $('.menuHauling').addClass('inactive');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});

// View Joborder Details
$('.joborderMoreInfoButton').on('click',function(event){
    event.preventDefault();
    console.log($(this).data('id'));
    var id = $(this).data('id');

    var sLocation;
    var dLocation;
    // return false;
    $.ajax({
        url : `${url}/${id}/viewdetails`,
        type : 'GET',
        dataType : 'JSON',
        success : (data , response)=>{
            console.log(data);
            $('.joborderinfo').empty();
            $('.joborderheader').empty();

            getServiceType(data.joborder);
            
            $('#moreInfoModal').modal('show');
        },
        error : (error)=>{
            throw error;
        }
    });

});

//Accept Job Order
$('.acceptJoborder').on('click',function(){
    var acceptID = $(this).data('id');
    console.log(acceptID);
    $.ajax({
        url : url + '/' + acceptID + '/accept',
        type : 'GET',
        dataType : 'JSON',
        success : function(data, response){
            console.log(data);
            swal({
                title: "Success",
                text: `Job Order # ${data.joborder.intJobOrderID} Accepted`,
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },(isConfirm)=>{
                if(isConfirm){
                    location.reload();
                }
            });
        },
        error : function(error){
            throw error;
        }
    });
});



//View Forward Request Modal
$('.forwardJoborder').on('click',function(){
    console.log('Hi CacaOOOOOOO');
    console.log($(this).data('id'));
    var joborderID = $(this).data('id');
    console.log(joborderID);
    $('.forwardRequestButton').data('id',joborderID);
});


function forwardRequest(forwardID){
    console.log(forwardID);
    $.ajax({
        url : url + '/' + forwardID + '/forwardrequest',
        type : 'GET',
        dataType : 'JSON',
        success : function(data, response){
            console.log(data);  
            $('.appendContent').empty();
            $('.forwardFooter').empty();
            $('#forwardModal').data('id',data.jobs[0].intJobOrderID);
            var append = 
                `<div class="card card-sm-2 card-primary border-primary">
                    <div class="card-icon">
                        <i class="ion ion-android-boat text-primary"></i>
                    </div>
                    <div class="card-header">
                        <h4 class="text-primary mb-2">Job Order # ${data.jobs[0].intJobOrderID}</h4>
                    </div>
                    <div class="card-body mt-2">
                        <h4>${data.jobs[0].strCompanyName}</h4>
                    </div>
                    <div class="card-body mt-2">
                        <div class="row">
                            <div class="col-6"> 
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Estimated Start Time of Hauling : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>${moment(data.joborder.dtmETA).format("DD/MM/YY HH:MM")} HRS</h6></li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Estimated End Time of Hauling : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>${moment(data.joborder.dtmETD).format("DD/MM/YY HH:MM")} HRS</h6></li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6> Vessel Name : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>${data.joborder.strJOVesselName}</h6></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Starting Location : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>`+ data.jobs[0].strPierName + ` - ` +  data.jobs[0].strBerthName +`</h6></li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Destination : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>`+ data.joborder.strJODestination +`</h6></li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Goods to be delivered : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>`+ data.jobs[0].strGoodsName +`</h6></li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Weight (Tons) : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>`+ data.jobs[0].fltWeight +`</h6></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>`;

                var appendFooter = 
                `
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <label for="exDetails">Extra Details</label>
                        <textarea class="form-control" id="exDetails" rows="5" placeholder="Message"></textarea>
                    </div>
                </div>
                `;
            $(append).appendTo('.appendContent');
            $(appendFooter).appendTo('.forwardFooter');
            $('#forwardModal').modal('show');
        },
        error : function(error){
            throw error;
        }
    });
}
//Forward Job Order
$('.forwardRequestButton').on('click',function(){
    var id = $(this).data('id');
    var company = $('#selectCompany').val();
    var details = $('#exDetails').val();

    console.log(id, company, details, 'Kikyaw');
    // return false;
    $.ajax({
        url : `${url}/forward`,
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'),    
            joborderID : id,
            joborderForwardCompany : company,
            joborderDetails : details,
        }, 
        beforeSend: (request) =>{
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : (data) =>{
            console.log('success pota');
            console.log(data);
            swal({
                title: "Success",
                text: "Job Order Forwarded",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            (isConfirm)=>{
                if(isConfirm){
                    location.reload();
                }
            });                       
        },
        error : function(error){
            throw error;
        }

    });
});

function forwardJobOrder()
{
    console.log($('#forwardModal').data('id'));
    var joborderID = $('#forwardModal').data('id')
    swal({
        title: "Are You Sure?",
        text: "Forward This Job Order?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,
    });
    return false;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : url + '/forward',
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'),    
            joborderID : joborderID
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            console.log('success pota');
            console.log(data);
            swal({
                title: "Success",
                text: "Job Order Forwarded",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = url ; 
                }
            });                       
        },
        error : function(error){
            throw error;
        }

    });
    
}
//Decline Job Order
$('.declineJoborder').on('click',function(){
    console.log($(this).data('id'));
    var joborderID = $(this).data('id');
    swal({
        title: "Are You Sure?",
        text: "Decline This Job Order?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,
    },(isConfirm)=>{
        if(isConfirm){
            $.ajax({
                url : `${url}/${joborderID}/decline`,
                type : 'GET',
                dataType : 'JSON', 
                success : (data)=>{
                    console.log('success pota');
                    console.log(data);
                    swal({
                        title: "Success",
                        text: "Job Order Succesfully Declined",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Ok",
                        closeOnConfirm: true,
                    },(isConfirm)=>{
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
//Create Job Schedule
function createJobsched(id){
    console.log(id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : url + '/store',
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'),    
            joborderID : id
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            console.log('success pota');
            console.log(data);
            swal({
                title: "Success",
                text: "Job Schedule Created",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = url ; 
                }
            });                       
        },
        error : function(error){
            throw error;
        }

    });
    
}
function createFJobsched(id){
    console.log(id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : url + '/store',
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'),    
            joborderID : id
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            console.log('success pota');
            console.log(data);
            swal({
                title: "Success",
                text: "Job Schedule Created",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = url ; 
                }
            });                       
        },
        error : function(error){
            throw error;
        }

    });
    
}