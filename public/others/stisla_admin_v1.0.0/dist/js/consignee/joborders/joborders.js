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

    
    $(`#addTugAssistStartDate,#addTugAssistEndDate,
    #addHaulingStartDate,#addHaulingEndDate`).datetimepicker({
        format: 'L'
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

$('.submitJobOrderHauling').on('click',function(){
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
    var serviceType = $(this).data('service');
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
        error : (error, response)=>{
            throw error;
            var errors = data.responseJSON;
            console.log(errors);        
        },
    });

});
    // console.log(berth)
$('.submitJobOrderTugAssist').on('click',function(){
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
    var serviceType = $(this).data('service');
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
});
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

