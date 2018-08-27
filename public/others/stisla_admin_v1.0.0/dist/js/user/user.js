$(document).ready(function(){
    $('#maintenanceTree').addClass("active");
    $('#usertypeMenu').addClass("active");
});

var url = '/administrator/maintenance/usertype';

function getUserType(id){
    console.log('Requesting Data');

    $.ajax({
        url: url + '/' + id + '/edit',
        dataType : 'JSON',
        aysnc : true,
        success : function(data, response)
        {
            console.log('Data Received', data, response);
            $('#editIDhide').val(data.user.intUserTypeID);
            $('#editUserType').val(data.user.strUserTypeName);
        },
        error : function(error){
            throw error;
        }
    });
    $(document).ready(function(){
        $('#editLayout').css('display', 'block');
        $('#detLayout').css('display', 'none');
        $('#detLayout').css('display','none');
    });
}
function editUserTypeSubmit(){
    console.log('Trying to Submit Data');
    var id = $('#editIDhide').val();
    var usertype = $('#editUserType').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : url + '/update',
        type : 'POST',
        aysnc : true,
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            userTypeID : id,
            userTypeName : usertype
        },
        success : function(data,response){
            console.log(data);
            swal({
                title: "Success",
                text: "Data Submitted",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500

            },
            function(){
                window.location = url;
            })
        },
        error : function(error){
            throw error;
        }
    });
}
function postUserType(){
    console.log('Trying To Submit Data');
    var usertype = $('#addUserType').val();
    console.log(usertype);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : url + '/store',
        type : 'POST',
        aysnc : true,
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            userTypeName : usertype
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            console.log('success');
            swal({
                title: "Success",
                text: "Data Submitted",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500

            },
            function(){
                window.location = url;
            })
        },
        error : function(error){
            throw error;
        }
    })    
}
function deleteUserType(dataID){
    console.log('Trying To Delete');
    console.log(dataID);
    $.ajax({
        url : url + '/' + dataID + '/delete',
        type : 'GET',
        dataType : 'JSON',
        aysnc : true,
        success : function(response){
            console.log('Data Deleted');
            console.log(response);
            swal({
                title: "Success",
                text: "Data Submitted",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500

            },
            function(){
                window.location = url;
            })
        },
        error : function(error){
            throw error;
        }
    })
}