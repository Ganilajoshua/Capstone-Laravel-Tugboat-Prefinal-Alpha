var url = '/administrator/maintenance/pier';

$(document).ready(function(){
    $('#maintenanceTree').addClass("active");
    $('#pierMenu').addClass("active");

    $('#addPierButton').on('click',function(){
        $('#addPierModal').modal('show');
    });
    $('.modalClose').on('click',function(){
        $('#addPierModal').modal('hide');
        $('#editPierModal').modal('hide');
    });
    $(".pierCheckbox").on('change',function(){
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


function getPier(id){
    console.log('Requesting Data');
    $.ajax({
        url : url + '/' +id+'/edit',
        type : 'GET',
        dataType: 'JSON',
        success : function(data){
            console.log('Data Recieved', data);
            $('#editPierModal').modal('show')
            $('#editPier').val(data.piers.strPierName);
            $('#editIDhide').val(data.piers.intPierID);
        },
        error : function(error){
            console.log('Request Failed');
            throw error;
        }
    });
}

function postPier(){
    $(document).ready(function(){
        console.log('Trying to Submit Data');
        var name = $('#addPier').val();
        console.log(name);
        if(name == 0){
            appendFields = "<div class='text-danger'>This Fields is Empty</div>";
            $(appendFields).appendTo('#addPier');
            $('#addPier').addClass('border border-danger');

            return false;
        }

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
                pierName : name
            }, 
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : function(data){
                console.log('success pota');
                console.log(data);
                $('#addPierModal').modal('hide');
                if((data.errors)){
                    console.log('title', data.errors.title);
                    console.log('body', data.errors.body);
                }
                swal({
                    title: "Success",
                    text: "Pier Added",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                },
                function(isConfirm){
                    if(isConfirm){
                        window.location = url;
                    }
                });                       
            },
            error : function(error){
                console.log(error.responseText);
                toastr.error('Duplicate Data.', name + ' is already taken', {
                    closeButton: true,
                    debug: false,
                    timeOut: 2000,
                    positionClass: "toast-bottom-right",
                    preventDuplicates: true,
                    showDuration: 300,
                    hideDuration: 300,
                    showMethod: "slideDown",
                    hideMethod: "slideUp"
                });

                // console.log('title', error.errors.title);
                // console.log('body', error.errors.body);
            }

        });
    });
}

function editPierSubmit(){

    var id = $('#editIDhide').val();
    var name = $('#editPier').val();
    
    console.log(id);
    console.log(name);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : url + '/update',
        type : 'POST',
        data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
            pierName : name,
            pierID : id
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            $('#editPierModal').modal('hide');
            swal({
                title: "Success",
                text: "Pier Updated",
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
}
function deletePier(deleteID){
    console.log('Trying To Delete');
    console.log(deleteID);
    $.ajax({
        url : url + '/' + deleteID + '/edit',
        type : 'GET',
        dataType: 'JSON',
        success : function(data, response){
            swal({
                title: "Are You Sure?",
                text: "You will not be able to recover " + data.piers.strPierName ,
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
                            text: "Pier Deleted",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Ok",
                            closeOnConfirm: true,
                            timer : 1000
                        },
                        function(){
                            window.location = url ;
                        })
                    },
                    error : function(error){
                        throw error;
                    }
                })
            });
        },error : function(error){
            throw error;
        }
    });
}