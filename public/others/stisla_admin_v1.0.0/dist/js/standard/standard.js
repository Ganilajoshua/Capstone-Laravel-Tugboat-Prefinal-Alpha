$(document).ready(function(){
    $('#maintenanceTree').addClass('active');
    $('#standardMenu').addClass('active');

    $('#addStandardButton').on('click',function(){
        $('#addStandardModal').modal('show');
    }); 
});
var url = '/administrator/maintenance/standard';

function createStandard(){
    var desc = $('#addStandardDesc').val();
    var fees = $('#addStandardFees').val();
    console.log(desc, fees);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        url : url + '/store',
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            standardDesc : desc,
            standardFees : fees,
        },
        beforeSend : function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data, response){
            console.log(response);
            console.log(data);
            console.log('Success');
            swal({
                title: "Success",
                text: "Standard Rate Created",
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
}
function editStandard(editID){
    $.ajax({
        url : url + '/' + editID +  '/edit',
        type : 'GET',
        dataType : 'JSON',
        success : function(data){
            $('#editStandardFees').val(data.standard.fltSDeliveryRate);
            $('#editStandardDesc').val(data.standard.strStandardDesc);
            $('#editStandardID').val(data.standard.intStandardID);
        },
        error : function(error){
            throw error;
        }
    });
    $('#editStandardModal').modal('show');
}
function updateStandard(){
    var id = $('#editStandardID').val();
    var desc = $('#editStandardDesc').val();
    var fees = $('#editStandardFees').val();

    console.log(id, desc, fees);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });   
    $.ajax({
        url : url + '/update',
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            standardID : id,
            standardDesc : desc,
            standardFees : fees,
        },
        success : function(data,response){
            $('#editStandardModal').modal('hide');   
            console.log('Success');
            swal({
                title: "Success",
                text: "Agreement Updated",
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
            })
        },
        error : function(error){

        }
    });
}
function deleteStandard(deleteID){
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this Standard Rate.",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },
    function() {
        $.ajax({
            url : url + '/' + deleteID + '/delete',
            type : 'GET',
            dataType : 'JSON',
            success : function(data, response){
                console.log(data);
                swal({
                    title: "Success",
                    text: "Standard Rate Deleted",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                    timer : 1500
                },function(isConfirm){
                    if(isConfirm){
                        window.location = url;
                    }
                })
            },
            error : function(error){
                throw error;
            }
        });
    });
}