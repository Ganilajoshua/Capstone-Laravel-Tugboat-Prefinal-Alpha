    $(document).ready(function(){
    $('#maintenanceTree').addClass("active");
    $('#berthMenu').addClass("active");

    contract = JSON.parse($('#contract').val());
    user = $('#userData').val();
    console.log(contract);
    console.log(user);

    $('#addBerthButton').on('click',function(){
        $('#addBerthModal').modal('show');
    });
    // $('.table-fit').css();
    // $('#pierSelect').niceSelect();

});
var url = '/administrator/maintenance/berth';

function getBerth(id){
    $.ajax({
        url : url + '/' + id + '/edit',
        type : 'GET',
        dataType: 'JSON',
        success : function(data){
            console.log('Data Received', data);
            $('#editBerth').val(data.berths.strBerthName);
            $('#editPierSelect').val(data.berths.intBPierID);
            $('#editIDhide').val(data.berths.intBerthID);
            $('#editBerthModal').modal('show');
        },
        error : function(error){
            throw error;
        }
    })
    // $(document).ready(function(){
    //     $('#editLayout').css('display', 'block');
    //     $('#detLayout').css('display', 'none');
    //     $('#detLayout').css('display','none');
    // });
}
function editBerthSubmit(){
    console.log('Trying to Submit Data');
    var berth = $('#editBerth').val();
    var pier = $('#editPierSelect').val();
    var id = $('#editIDhide').val();
    
    console.log(pier, berth);
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
            berthID : id,
            berthName : berth,    
            pier : pier
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            $('#editBerthModal').modal('hide');
            console.log('success pota');
            console.log(data);
            swal({
                title: "Success",
                text: "Berth Updated",
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

function postBerth(){
    $(document).ready(function(){
        console.log('Trying to Submit Data');
        var berth = $('#addBerth').val();
        var pier = $('#pierSelect').val();
        
        console.log(pier, berth);

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
                berthName : berth,    
                pier : pier
            }, 
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : function(data){
                console.log('success pota');
                $('#addBerthModal').modal('hide');
                console.log(data);
                swal({
                    title: "Success",
                    text: "Berth Created",
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
    });
}

function deleteBerth(deleteID){
    console.log('Trying to Delete');
    console.log(deleteID);

    $.ajax({
        url : url + '/' + deleteID + '/edit',
        type : 'GET',
        dataType: 'JSON',
        success : function(data, response){
            console.log('Data Recieved', data, response);
            swal({
                title: "Are You Sure?",
                text: "You will not be able to recover " + data.berths.strBerthName ,
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
                            text: "Berth Deleted",
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

