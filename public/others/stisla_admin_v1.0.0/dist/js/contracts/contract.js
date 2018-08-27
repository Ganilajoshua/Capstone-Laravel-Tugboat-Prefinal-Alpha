$(document).ready(function(){
    $('#transactionTree').addClass("active");
    $('#tConsignee').addClass("active");
    $('#contractsMenu').addClass("active");

    $('.btnadd2').on('click',function(){
        $('.addModal2').modal('show');
    });
    $.ajax({
        url : url + '/store',
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'),    
            companyID : companyID,
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            console.log('success pota');
            console.log(data);
        },
        error : function(error){
            throw error;
        }

    });
});

function tryfunc(){
    console.log('hi');
    $('#addModalITO').modal('show');
}
function createContract(){
    console.log('HI');
    var details = $('#addContractDetails').val();
    var title = $('#addContractTitle').val();
    console.log(details);
    console.log(title);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        url : '/contracts/store',
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            contractTitle : title,
            contractDetails : details,
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
                text: "Contract Created",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500
            },
            function(){
                setTimeout(window.location = '/contracts',2000);
            });
        },
        error : function(error){
            throw error;
        }
    })
}

function getContractDetails(showID){
    console.log('working');
    console.log(showID);

    $.ajax({
        url : '/contracts/'+ showID +'/show',
        type : 'GET',
        async : true,
        dataType : 'JSON',
        success : function(data){
            console.log(data);
            $('#contractTitle').html();
            $('#contractDate').html();
            $('#contractDetails').html(data.contracts.strContractListDesc);
            $('#contractsInfoID').val(data.contracts.intContractListID);   
        },
        error : function(error){
            throw error;
        }
    });
    $('#viewContractInfo').modal('show');
}
function editContractDetailsModal(){
    console.log($('#contractsInfoID').val());    
    var id = $('#contractsInfoID').val();
    $.ajax({
        url : '/contracts/'+id+'/edit',
        dataType : 'JSON',
        async : true,
        success : function(data, response)
        {
            console.log('Data Received',response);
            $('#editContractTitle').val(data.contracts.strContractListTitle);
            console.log(data.contracts.strContractListDesc);
            $('#editContractDetails').summernote('code',data.contracts.strContractListDesc);
            //$('#editContractDetails').text(data.cot);
            $('#hideContractsID').val(data.contracts.intContractListID);
            $('#editContractInfoTitle').html(data.contracts.strContractListTitle);
        }
    });
    $('#viewContractInfo').modal('hide');
    $('#editContractInfo').modal('show');
    
}
function editContractDetails(getID){
    console.log('Requesting Data');
    console.log(getID);
    $.ajax({
        url : '/contracts/'+getID+'/edit',
        dataType : 'JSON',
        async : true,
        success : function(data, response)
        {
            console.log('Data Received',response);
            $('#editContractTitle').val(data.contracts.strContractListTitle);
            console.log(data.contracts.strContractListDesc);
            $('#editContractDetails').summernote('code',data.contracts.strContractListDesc);
            //$('#editContractDetails').text(data.cot);
            $('#hideContractsID').val(data.contracts.intContractListID);
            $('#editContractInfoTitle').html(data.contracts.strContractListTitle);
        }
    });
    $('#viewContractInfo').modal('hide');
    $('#editContractInfo').modal('show');
}
function editContractSubmit(){
    console.log('Hi');
    console.log($('#hideContractsID').val());
    console.log($('#editContractDetails').val());

    var id = $('#hideContractsID').val();
    var title = $('#editContractTitle').val();
    var details = $('#editContractDetails').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : '/contracts/update',
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            contractID : id,
            title : title,
            details : details,
        },
        beforeSend : function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data, response){
            console.log(response);
            console.log(data);
            console.log('Success');
        },
        error : function(error){
            throw error;
        }
    })
}
function deleteContracts(deleteID){
    console.log('Trying to Delete Data');
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this Contract.",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },
    function(){
        console.log(deleteID);
        $.ajax({
            url : '/contracts/'+deleteID+'/delete',
            type : 'GET',
            dataType : 'JSON',
            success : function(response){
                console.log('Data Deleted');
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
                    setTimeout(window.location = '/contracts',2000);
                });
            },
            error : function(error){
                throw error;
            }
        })
        //swal("Deleted!", "Contract has been deleted.", "success");
    });   
}
