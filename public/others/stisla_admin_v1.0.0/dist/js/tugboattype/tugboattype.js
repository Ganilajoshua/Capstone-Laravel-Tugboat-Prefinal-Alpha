var url = '/administrator/maintenance/tugboattype';

$(document).ready(function(){
    $('#maintenanceTree').addClass("active");
    $('#tugboatTypeMenu').addClass("active");
    
    $('#add').on('click',function(){
        $('#addTugboatTypeModal').modal('show');
    });
    $('#closeAdd').on('click',function(){
        $('#addTugboatTypeModal').modal('hide');
    });
    $('#closeEdit').on('click',function(){
        $('#editTugboatTypeModal').modal('hide');
    });

    $(".tugboattypeCheckbox").on('change',function(){
        var id = $(this).data('id');
        var mode = $(this).prop('checked');
        console.log(id)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : url + '/activate',
            type : 'POST',
            data : {
                "_token" : $('meta[name="csrf-token"]').attr('content'),
                activateID : id,
            },
            beforeSend : function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : function(data, response){
                console.log(response);
                console.log(data);
                console.log('Success');
                window.location = url;
            },
            error : function(error){
                throw error;
            }
        });
    });
});


function postTugboatType(){
    console.log('Trying To Submit Data');
    var type = $('#addTugboatType').val();

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
            tugboatType : type
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            console.log(data);
            swal({
                title: "Success",
                text: "Tugboat Type Added",
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
            throw error;
        }
    });
    $('#addTugboatTypeModal').modal('hide');
}
function getTugboatType(id){
    console.log('Requesting Data'); 

    $.ajax({
        url : url + '/' + id + '/edit',
        type : 'GET',
        dataType: 'JSON',
        success : function(data, response){
            console.log('Data Recieved', data, response);
            $('#editTugboatType').val(data.type.strTugboatTypeName);
            $('#editIDhide').val(data.type.intTugboatTypeID);
        },
        error : function(error){
            console.log('Request Failed');
            throw error;
        }
    });
    $('#editTugboatTypeModal').modal('show');
}
function updateTugboatType(){

    var type = $('#editTugboatType').val();
    var id = $('#editIDhide').val();

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
            tugboatTypeID : id,
            tugboatType : type
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            console.log(data);
            swal({
                title: "Success",
                text: "Tugboat Type Updated",
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
            throw error;
        }
    });
    $('#editTugboatTypeModal').modal('hide');
}
function deleteTugboatType(deleteID){
    $.ajax({
        url : url + '/' + deleteID + '/edit',
        type : 'GET',
        dataType: 'JSON',
        success : function(data, response){
            console.log('Data Recieved', data, response);
            swal({
                title: "Are You Sure?",
                text: "You will not be able to recover " + data.type.strTugboatTypeName ,
                type: "error",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: true
            },function(){
                $.ajax({
                    url : url + '/' + deleteID + '/delete',
                    type : 'GET',
                    dataType : 'JSON',
                    success : function(response){
                        console.log('Data Deleted');
                        console.log(response);
                        swal({
                            title: "Success",
                            text: "Tugboat Type Deleted",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Ok",
                            closeOnConfirm: true,
                            timer : 1000
                        },
                        function(isConfirm){
                            if(isConfirm){
                                window.location = url ;
                            }
                        })
                    },
                    error : function(error){
                        throw error;
                    }
                });
            });
        },
        error : function(error){
            console.log('Request Failed');
            throw error;
        }
    });
}
