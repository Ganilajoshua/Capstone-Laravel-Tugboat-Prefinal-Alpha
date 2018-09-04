$(document).ready(function(){
    $('#menujobordersD').addClass('active');
    $('#menujobordersM').addClass('active');
    $('#submitJob').on('click',function(e){
        e.preventDefault(); 
    })  
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
    console.log('PUTANG INA MO BOBO');
});

var url = '/consignee/joborders';

function createJobOrder(){
    
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
    console.log(dtmETA, dtmETD, berth, berthID);
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
            jobETA : dtmETA,
            jobETD : dtmETD,
            jobVesselName : cargo,
            jobWeight : weight,
            jobGoods : goods,
            jobDesc : desc,
            jobBerth : berthID,
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
function requestJoborder(requestID){
    console.log(requestID);
    swal({
        title: "Request Job Order?",
        text: "Do you want to request this Joborder?",
        type: "info",
        showCancelButton: false,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Proceed",
        closeOnConfirm: true,
        timer : 1500
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

