$(document).ready(function(){
    $('#maintenanceTree').addClass("active");
    $('#positionMenu').addClass("active");
    $('#addPositionButton').on('click',function(){
        $('#addPositionModal').modal('show');
    });
    $('.modalClose').on('click',function(){
        $('#addPositionModal').modal('hide');
        $('#editPositionModal').modal('hide');
    });
});

var url = '/administrator/maintenance/position';

function getPosition(id){

    console.log('Requesting Data');
    console.log(id);
    $.ajax({
        url : url + '/' + id + '/get',
        type : 'GET',
        dataType: 'JSON',
        success : function(data){
            console.log('Data Recieved', data);
            $('#editPosition').val(data.position.strPositionName);
            $('#editIDhide').val(data.position.intPositionID);
            $('#editPositionModal').modal('show');
        },
        error : function(error)
        {
            console.log('failed');
            throw error;
        }
        
    });
      
}

function postPosition(e)
{
    $(document).ready(function(){     
        console.log('trying to submit data');
        var name = $('#addPosition').val();
        var position = {
            "name" : name 
        }
        console.log(position);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url : url + '/store',
            type : 'POST',
            data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
                    Name : name}, 
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : function(data){
                $('#addPositionModal').modal('hide');
                console.log('success pota');
                console.log(position);
                if((data.errors)){
                    console.log('title', data.errors.title);
                    console.log('body', data.errors.body);
                }
                swal({
                    title: "Success",
                    text: "Position Added",
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
    });
}
function editPositionSubmit(){
    var id  = document.getElementById("editIDhide").value;
    var name = $('#editPosition').val();
    console.log(id);
    console.log(name);

    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url : url + '/update',
            type : 'POST',
            data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
                    positionName : name,
                    positionID : id
                }, 
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : function(data){
                $('#editPositionModal').modal('hide');
                console.log('success pota');
                console.log(data);
                swal({
                    title: "Success",
                    text: "Position Updated",
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

    });
}
function deletePosition(deleteID)
{
    console.log('Trying To Delete Data');
    console.log(deleteID);
    $.ajax({
        url : url + '/' + deleteID + '/get',
        type : 'GET',
        dataType: 'JSON',
        success : function(data){
            swal({
                title: "Are You Sure?",
                text: "You will not be able to recover " + data.position.strPositionName ,
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
                        console.log('data deleted');
                        console.log(response);
                        swal({
                            title: "Success",
                            text: "Position Deleted",
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
                        });
                    },
                    error : function(error)
                    {
                        throw error;
                    }
                });
            });
        },
        error : function(error)
        {
            console.log('failed');
            throw error;
        }
        
    });

}