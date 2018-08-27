$(document).ready(function(){
    $('#maintenanceTree').addClass('active');
    $('#insurancesMenu').addClass('active');

    $('#addInsurance').on('click',function(){
        $('#addInsuranceModal').modal('show');
    });
});

var url = '/administrator/maintenance/insurances';

function postInsurance(){
    var name = $('#addInsuranceName').val();
    var details = $('#addInsuranceDescription').val();

    console.log(name,details);
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
            insuranceName : name,
            insuranceDesc : details,
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            console.log('success pota');
            console.log(data);
            if((data.errors)){
                console.log('title', data.errors.title);
                console.log('body', data.errors.body);
            }
            swal({
                title: "Success",
                text: "Insurance Added",
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
            console.log('title', error.errors.title);
            console.log('body', error.errors.body);
        }
    });
    $('#addInsuranceModal').modal('hide');
}
function editInsurance(editID){
    console.log(editID);
    $.ajax({
        url : url + '/' + editID + '/edit',
        type : 'GET',
        dataType : 'JSON',
        success : function(data){
            $('#editInsuranceID').val(data.insurances.intInsuranceID);
            $('#editInsuranceName').val(data.insurances.strInsuranceName);
            $('#editInsuranceDescription').val(data.insurances.strInsuranceDesc);
        },
        error : function(error){
            throw error;
        }
    });
    $('#editInsuranceModal').modal('show');
}
function updateInsurance(){
    var id = $('#editInsuranceID').val();
    var name = $('#editInsuranceName').val();
    var desc = $('#editInsuranceDescription').val();
    console.log(id, name, desc);

    $.ajax({
        url : url + '/update',
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            insuranceID : id,
            insuranceName : name,
            insuranceDesc : desc,
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            console.log('success pota');
            console.log(data);
            if((data.errors)){
                console.log('title', data.errors.title);
                console.log('body', data.errors.body);
            }
            swal({
                title: "Success",
                text: "Insurance Updated",
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
            console.log('title', error.errors.title);
            console.log('body', error.errors.body);
        }
    });
    $('#editInsuranceModal').modal('hide');
}
function deleteInsurance(deleteID){
    console.log(deleteID);
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this Insurance.",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },function(){
        $.ajax({
            url : url + '/' + deleteID + '/delete',
            type : 'GET',
            dataType : 'JSON',
            success : function(data){
                swal({
                    title: "Success",
                    text: "Data Deleted",
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
    })
}