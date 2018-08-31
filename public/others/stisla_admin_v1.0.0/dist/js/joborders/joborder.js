$(document).ready(function(){
    $('#transactionTree').addClass('active');
    $('#tDispatch').addClass('active');
    $('#menuTugboatAssignment').addClass('inactive');
    $('#menuJobOrder').addClass('active');
    $('#menuTeamBuilder').addClass('inactive');
    $('#menuScheduling').addClass('inactive');
    $('#menuHauling').addClass('inactive');;
});
var url = '/administrator/transactions/joborders';
//Accept Job Order
function acceptJobOrder(acceptID)
{
    $.ajax({
        url : url + '/' + acceptID + '/accept',
        type : 'GET',
        dataType : 'JSON',
        success : function(data, response){
            toastr.success('Accepted!','Job Order #'+ data.joborder.intJobOrderID,{ closeButton: true, preventDuplicates: true });
            setTimeout(function(){window.location = url},2500);   
        },
        error : function(error){
            throw error;
        }
    });

}
//View Forward Request Modal
function forwardRequest(forwardID){
    console.log(forwardID);
    $.ajax({
        url : url + '/' + forwardID + '/forwardrequest',
        type : 'GET',
        dataType : 'JSON',
        success : function(data, response){
            console.log(data);  
            $('.modalBody').empty();
            var append = 
                `<div class="card card-sm-2 card-primary border-primary">
                    <div class="card-icon">
                        <i class="ion ion-android-boat text-primary"></i>
                    </div>
                    <div class="card-header">
                        <h4 class="text-primary mb-2">Job Order # 4</h4>
                    </div>
                    <div class="card-body">
                        <h5>`+ data.jobs[0].strCompanyName +`</h5>
                    </div>
                    <div class="card-footer mt-2">
                        <div class="row">
                            <div class="col-6"> 
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Estimated Start Time of Hauling : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>`+ moment(data.joborder.dtmETA).format("DD/MM/YY HH:MM") +` HRS</h6></li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Estimated End Time of Hauling : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>`+ moment(data.joborder.dtmETD).format("DD/MM/YY HH:MM") +` HRS</h6></li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Estimated End Time of Hauling : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>`+ data.joborder.strJOVesselName + `</h6></li>
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
            var appendBody = 
            "<div class='row mt-2'>" +  
                "<div class='col-12'>" +
                    "<ul class='list-inline'> " + 
                        "<li class='list-inline-item text-primary'>" +
                            "<h6>Estimated Start Time of Hauling  : </h6></li>" + 
                        "<li class='list-inline-item'>" + 
                            "<h6>"+ data.joborder.dtmETA +"</h6></li>" +
                    "</ul>" +
                "</div>"+
                "<div class='col-12'>" +
                    "<ul class='list-inline'> " + 
                        "<li class='list-inline-item text-primary'>" +
                            "<h6>Estimated Start Time of Hauling : </h6></li>" + 
                        "<li class='list-inline-item'>" + 
                            "<h6>"+ data.joborder.dtmETD +"</h6></li>" +
                    "</ul>" +
                    "<ul class='list-inline'> " + 
                        "<li class='list-inline-item text-primary'>" +
                            "<h6>Estimated Start Time of Hauling : </h6></li>" + 
                        "<li class='list-inline-item'>" + 
                            "<h6>"+  +"</h6></li>" +
                    "</ul>" +
                    "<ul class='list-inline'> " + 
                        "<li class='list-inline-item text-primary'>" +
                            "<h6>User Name : </h6></li>" + 
                        "<li class='list-inline-item'>" + 
                            "<h6>"+  +"</h6></li>" +
                    "</ul>" +
                    "<ul class='list-inline'> " + 
                        "<li class='list-inline-item text-primary'>" +
                            "<h6>Email : </h6></li>" + 
                        "<li class='list-inline-item'>" + 
                            "<h6>"+  +"</h6></li>" +
                    "</ul>" +
                "</div>"+
            "<div>";  
            $(append).appendTo('.modalBody');
            $('#forwardModal').modal('show');
        },
        error : function(error){
            throw error;
        }
    });
}
//Forward Job Order
function forwardJobOrder()
{

}
//Decline Job Order
function declineJobOrder()
{

}
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