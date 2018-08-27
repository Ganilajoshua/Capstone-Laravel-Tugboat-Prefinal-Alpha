$(document).ready(function(){
    $('#transactionTree').addClass("active");
    $('#menuJobOrder').addClass("active");
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