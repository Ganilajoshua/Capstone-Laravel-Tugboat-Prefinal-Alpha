$(document).ready(function(){
    $('#menujobordersD').addClass('active');
    $('#menujobordersM').addClass('active');
    $('#breadPB').hide();
    $('#breadSlash').hide();
    $('#breadCurrent').text('Job Order');
    $('#submitJob').on('click',function(e){
        e.preventDefault(); 
    });

    $.ajaxSetup({   
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : `${url}/notifs`,
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
        },
        success : (data, response)=>{
            console.log(data);
            if((data.joborder).length > 0){
                $('.fifthTabAppend').empty();
                appendBadge = 
                `<span class="badge badge-danger">${(data.joborder).length}</span>`
                $(appendBadge).appendTo('.fifthTabAppend');
            }
        },
        error : (error, response)=>{
            console.log(error)
        },
    });


$(`#addTugAssistStartDate, #addHaulingStartDate`).datetimepicker({
    format: 'L',
    dateFormat: "yy-mm-dd",   
     minDate: new Date,
 
    });
    $(`#addTugAssistEndDate,#addHaulingEndDate`).datetimepicker({
    format: 'L',
    dateFormat: "yy-mm-dd",   
     minDate: new Date,
    });

    $('#haulingETA').datetimepicker({
        format:'HH:mm'
    });
    $(`#addTugAssistStartTime,#addHaulingStartTime`).datetimepicker({
        format:'HH:mm'
    });
    $(`#addTugAssistEndTime,#addHaulingEndTime`).datetimepicker({
        format:'HH:mm'
    });
    
    $('#addTransacDate').datetimepicker();
        $('#addHaulingETA').datetimepicker({
            useCurrent: false
        });
        $("#addTransacDate").on("change.datetimepicker", function (e) {
            $('#addHaulingETA').datetimepicker('minDate', e.date);
        });
        $("#addHaulingETA").on("change.datetimepicker", function (e) {
            $('#addTransacDate').datetimepicker('maxDate', e.date);
        });
    // console.log('PUTANG INA MO BOBO');
});

  
var url = '/consignee/joborders';


function submitJobOrderHauling(){
// $('.submitJobOrderHauling').on('click',function(){
    console.log('////////////////////////////');
    var title = $('#addHaulingTitle').val();
    var startDate = $('.addHaulingStartDate').val();
    var endDate = $('.addHaulingEndDate').val();
    var startTime = $('.addHaulingStartTime').val();
    var endTime = $('.addHaulingEndTime').val(); 
    var vesselName = $('#addHaulingVesselName').val();
    var vesselWeight = $('#addHaulingVesselWeight').val();
    var goods = $('#addHaulingGoods').val();
    // var vesselType = $('#').val();
    var details = $('#addExHaulingDetails').val();
    var serviceType = 'Hauling';
    var berth;
    var dLocation;
    var sLocation;
    console.log('Title',title);
    console.log('Service', serviceType);
    console.log(startDate);
    console.log(endDate);
    console.log(startTime);
    console.log(endTime);
    console.log(details);
    console.log('Vessel Name', vesselName);
    console.log('Vessel Weight', vesselWeight);
    console.log('Goods', goods);
    
    if($('#addHaulingRoute').val() == "LocPier"){
        console.log('Kiyuuuuub');
        sLocation = $('#startingLocationLP').val();
        berth = $('#addBerthLP').val();
        console.log('starting location', sLocation);
        console.log('Berth-Pier',berth);
    }
    else if($('#addHaulingRoute').val() == "PierLoc"){
        berth = $('#addBerthPL').val();
        dLocation = $('#destinationLocationPL').val();
        console.log('Berth-Pier', berth);
        console.log('Destination', dLocation);
    }else if($('#addHaulingRoute').val() == "LocLoc"){
        sLocation = $('#startingLocationLL').val();
        dLocation = $('#destinationLocationLL').val();
        console.log(sLocation);
        console.log(dLocation);
        // console.log("Kyaaaaaa", $('#addHaulingRoute').val());
    }
    console.log('///////////////////////');
    console.log(berth);
    console.log(sLocation);
    console.log(dLocation);
    // return false;
    $.ajax({
        url : `${url}/haulingservice`,
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            title : title,
            serviceType : serviceType,
            startDate : startDate,
            startTime : startTime,
            endDate : endDate,
            endTime : endTime,
            vesselName : vesselName,
            vesselWeight : vesselWeight,
            // vesselType : vesselType,
            goods, goods,
            berth : berth,
            sLocation : sLocation,
            dLocation : dLocation,
            details : details
        },
        success : (data, response)=>{
            console.log(data);
            swal({
                title: "Success",
                text: "Job Order Created",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            function(isConfirm){
                if(isConfirm){
                    location.reload();
                    console.log('Hi'); 
                }
            });
        },
        error : (error)=>{
            // toastr.error({
            //     "closeButton": false,
            //     "debug": false,
            //     "newestOnTop": false,
            //     "progressBar": false,
            //     "positionClass": "toast-top-right",
            //     "preventDuplicates": false,
            //     "onclick": null,
            //     "showDuration": "300",
            //     "hideDuration": "1000",
            //     "timeOut": "5000",
            //     "extendedTimeOut": "1000",
            //     "showEasing": "swing",
            //     "hideEasing": "linear",
            //     "showMethod": "fadeIn",
            //     "hideMethod": "fadeOut"
            //   });
            // toastr.error(`${error.statusText}`,`Error ${error.status}`, { 
            //     positionClass : 'toast-bottom-right', 
            //     preventDuplicates : true, 
            //     showDuration : "2000",
            //     hideDuration : "1000",
            //     timeOut : "5000",
            //     extendedTimeOut : "1000",
            //     showEasing : "swing",
            //     hideEasing : "swing",
            //     showMethod : "fadeIn",
            //     hideMethod : "fadeOut"
            // });
            swal({
                title: `Error ${error.status}`,
                text: `${error.statusText}`,
                type: "error",
                showCancelButton: false,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            });
            console.log(error);
            throw error;
        },
    });

// });
};
    // console.log(berth)
function submitJobOrderTugAssist(){
// $('.submitJobOrderTugAssist').on('click',function(){
    console.log($(this).data('service'));
    console.log($('#addTugAssistTitle').val());
    console.log($('.addTugAssistStartDate').val());
    console.log($('.addTugAssistStartTime').val());
    console.log($('.addTugAssistEndDate').val());
    console.log($('.addTugAssistEndTime').val());
    console.log($('#tugAssistVesselName').val());
    console.log($('#tugAssistVesselWeight').val());
    console.log($('.addTugAssistBerth').val());
    console.log($('#addTugAssistVesselType').val());
    console.log($('.addExDetails').val());
    var title = $('#addTugAssistTitle').val();
    var serviceType = 'Tug Assist';
    var startDate = $('.addTugAssistStartDate').val();
    var startTime = $('.addTugAssistStartTime').val();
    var endDate = $('.addTugAssistEndDate').val();
    var endTime = $('.addTugAssistEndTime').val();
    var berth = $('.addTugAssistBerth').val();
    var vesselName = $('#tugAssistVesselName').val();
    var vesselWeight = $('#tugAssistVesselWeight').val();
    var vesselType = $('#addTugAssistVesselType').val();
    var details = $('.addExDetails').val();

    console.log(berth);
    // return false;
    $.ajax({
        url : `${url}/create`,
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            title : title,
            serviceType : serviceType,
            startDate : startDate,
            startTime : startTime,
            endDate : endDate,
            endTime : endTime,
            vesselName : vesselName,
            vesselWeight : vesselWeight,
            vesselType : vesselType,
            berth : berth,
            details : details
        },
        success : (data, response)=>{
            console.log(data);
            swal({
                title: "Success",
                text: "Job Order Created",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            function(isConfirm){
                if(isConfirm){
                    location.reload(); 
                }
            });
            // location.reload();
        },
        error : (error, response)=>{
            throw error;
            var errors = data.responseJSON;
            console.log(errors);
            // console.log(error);
            // console.log(response);
            
        },
    });
// });
};
$('.submitJobOrderSalvage').on('click',function(){
    console.log($(this).data('service'));
});

function createJobOrder(){
    var title = $('#jobordertitle').val();
    var eta = $('#timeETA').val();
    var cargo = $('#cargoName1').val();
    var weight = $('#cargoWeight1').val();
    var goods = $('#addGoods1').val();
    var desc = $('#addExDetails').val();
    var etd = $('#timeETD').val();
    var location = $('#destinationLocation').val();
    var dtmETA = moment(eta).format("Y-MM-D HH:mm:ss");
    var dtmETD = moment(etd).format("Y-MM-D HH:mm:ss");
    var berth = $('#addBerth option:selected').text();
    var berthID = $('#addBerth').val();
    console.log(dtmETA, dtmETD, berth, berthID, title);
    console.log(location, eta, cargo, weight,goods,desc,etd);
    // return false;
    $.ajaxSetup({   
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : url + '/create',
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'),    
            jobTitle : title,
            jobDesc : desc,
            jobETA : dtmETA,
            jobETD : dtmETD,
            jobBerth : berthID,
            jobLocation : location,
            jobVesselName : cargo,
            jobWeight : weight,
            jobGoods : goods,
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
//request Job Orders

$('.requestJobOrder').on('click',function(){
});

function requestJoborder(requestID){
    console.log(requestID);
    swal({
        title: "Request Job Order?",
        text: "Do you want to request this Joborder?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Proceed",
        closeOnConfirm: true,
    },function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            url : url + '/' + requestID + '/store',
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
                swal({
                    title: "Success",
                    text: "Job Order Requested",
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

$('.closeButton').on('click',function(){
    $('.modal').modal('hide');
})

$('.cancelledJoborderDetails').on('click',function(){
    console.log($(this).data('id'));
    var joborderID = $(this).data('id');
    $.ajax({
        url : `${url}/${joborderID}/cancelleddetails`,
        type : 'GET',
        dataType : 'JSON',
        success : (data,response)=>{
            console.log(data);
            $('.joborderTitle').empty();
            var appendHeader = 
            `<h4>Job Order # ${data.joborder[0].intJobOrderID}
                <span class="badge badge-danger ml-4">CANCELLED</span>
            </h4>`;
            $(appendHeader).appendTo('.joborderTitle');
            locations = getLocation(data.joborder);
            appendJoborderBody(data.joborder,locations);
            $('.details').html(`${data.joborder[0].strRemarks}`);
            $('#cancelledJoborderModal').modal('show');
        },
        error : (error)=>{
            console.log(error);
        }
    });
});

$('.deleteJoborder').on('click',function(){
    console.log($(this).data('id'));
    swal({
        title: "Are You Sure?",
        text: "Delete this Job Order?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        closeOnConfirm: true,
    },(isConfirm)=>{
        if(isConfirm){
            $.ajax({
                url : `${url}/delete`,
                type : 'POST',
                data : {
                    "_token" : $('meta[name="csrf-token"]').attr('content'),
                    joborderID : $(this).data('id'),
                },
                success : (data, response)=>{
                    swal({
                        title: "Success",
                        text: "Job Order Deleted",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Ok",
                        closeOnConfirm: true,
                        timer : 1500
                    },
                    function(isConfirm){
                        if(isConfirm){
                            location.reload();
                        }
                    }); 
                },
                error : (error)=>{

                }
            });
        }
    });
});

function getLocation(joborders){
    console.log(joborders);
    var sLocation = [];
    var dLocation = [];

    if((joborders[0].intJOBerthID) == null){
        sLocation = joborders[0].strJOStartPoint;
        dLocation = joborders[0].strJODestination;
    }
    else if((joborders[0].strJOStartPoint) == null){
        sLocation = `${joborders[0].strPierName} - ${joborders[0].strBerthName}`;
        dLocation = joborders[0].strJODestination;
    }
    else if((joborders[0].strJODestination) == null){
        sLocation = joborders[0].strJOStartPoint;
        dLocation = `${joborders[0].strPierName} - ${joborders[0].strBerthName}`;
    }
    var locations = [
        {sLocation,dLocation}
    ];
    console.log(locations);
    return locations;
}

function appendJoborderBody(joborders,location){
    $('.cancelledModalBody').empty();
    console.log(location);
    if(joborders[0].enumServiceType == 'Tug Assist'){
        var appendBody =
        `<div class="row joborderDetailsContainer">
            <div class="col-6">
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Service Type : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">
                            ${joborders[0].enumServiceType}
                        </h6>
                    </li>
                </ul>
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Date of Transaction : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">
                            ${moment(joborders[0].datStartDate).format('MMMM D, YYYY')} - ${moment(joborders[0].datEndDate).format('MMMM D, YYYY')}
                        </h6>
                    </li>
                </ul>
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Estimated Time of Hauling : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">
                        ${joborders[0].tmStart} HRS - ${joborders[0].tmEnd} HRS 
                        </h6>
                    </li>
                </ul>
            </div>
            <div class="col-6">
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Location : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">${location[0].sLocation}</h6></li>
                </ul>
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Total Weight : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">${joborders[0].fltWeight} Tons</h6></li>
                </ul>
            </div>
        </div>`;
        $(appendBody).appendTo('.cancelledModalBody');

    }
    else if(joborders[0].enumServiceType == 'Hauling'){
        var appendBody =
        `<div class="row joborderDetailsContainer">
            <div class="col-6">
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Service Type : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">
                            ${joborders[0].enumServiceType}
                        </h6>
                    </li>
                </ul>
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Date of Transaction : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">
                            ${moment(joborders[0].datStartDate).format('MMMM D, YYYY')} - ${moment(joborders[0].datEndDate).format('MMMM D, YYYY')}
                        </h6>
                    </li>
                </ul>
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Estimated Time of Hauling : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">
                        ${joborders[0].tmStart} HRS - ${joborders[0].tmEnd} HRS 
                        </h6>
                    </li>
                </ul>
            </div>
            <div class="col-6">
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Starting Location : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">${location[0].sLocation}</h6></li>
                </ul>
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Destination : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">${location[0].dLocation}</h6></li>
                </ul>
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Goods to be delivered : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">${joborders[0].strGoodsName}</h6></li>
                </ul>
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Total Weight : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">${joborders[0].fltWeight} Tons</h6></li>
                </ul>
            </div>
        </div>`;
        $(appendBody).appendTo('.cancelledModalBody');
    }
}