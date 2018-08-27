$(document).ready(function(){
    $('#agreementsMenu').addClass("active");
    $('#maintenanceTree').addClass("active");
});

var url = '/administrator/maintenance/agreements';

function createAgreements(){
    var title = $('#addAgreementTitle').val();
    var details = $('#addContractDetails').val();
    console.log(title, details);
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
            agreementTitle : title,
            agreementDetails : details,
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
                text: "Agreement Created",
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
function getAgreements(getID){
    console.log('Trying to get Data');
    console.log(getID);
    $.ajax({
        url : url + '/' + getID + '/show',
        type : 'GET',
        dataType : 'JSON',
        success : function(data){
            console.log(data);
            $('#contractsInfoID').val(data.agreements.intAgreementID);
            appendFields = 
            "<h1>"+data.agreements.strAgreementTitle+"</h1>"+
            "<p id='holder1'>"+data.agreements.strAgreementDesc+"</p>";
            // $('#holder1').html(data.agreements.strAgreementDesc);
            $(appendFields).appendTo('.agreementInfoModalBody');
        },
        error : function(error){
            throw error;
        }
    })
    $('#viewAgreementInfo').modal('show');
}
function editAgreements(editID){
    
    console.log('Requesting Data');
    console.log(editID);
    $.ajax({
        url : url + '/' + editID + '/edit',
        type : 'GET',
        dataType : 'JSON',
        success : function(data,response){
            console.log('Success');
            console.log(response);
            console.log(data);
            $('#editAgreementTitle').val(data.agreements.strAgreementTitle);
            $('#editAgreementDetails').summernote('code',data.agreements.strAgreementDesc);
            $('#hideAgreementsID').val(data.agreements.intAgreementID);
            //need to update niceselect in order to view changes
        },
        error : function(error){
            throw error;
        }
    })
    // $('select').niceSelect('update');
    $('#editContractInfo').modal('show');
    $('#editContractInfo').modal('show');
}
function editAgreementSubmit(){
    // var terms = $('#editTermsCondition').val();
    var id = $('#hideAgreementsID').val();
    var title = $('#editAgreementTitle').val();
    var details = $('#editAgreementDetails').val();
    console.log(id);
    console.log(title,details, "ID");
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
            agreementsID : id,
            agreementsTitle : title,
            agreementsDetails : details
        },
        success : function(data,response){
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
function editAgreementsInfo(){
    var infoID = $('#contractsInfoID').val();
    console.log('Requesting Data');
    console.log(infoID);
    $.ajax({
        url : url + '/' + infoID + '/edit',
        type : 'GET',
        dataType : 'JSON',
        success : function(data,response){
            console.log('Success');
            console.log(response);
            console.log(data);
            $('#editAgreementTitle').val(data.agreements.strAgreementTitle);
            $('#editAgreementDetails').summernote('code',data.agreements.strAgreementDesc);
            $('#hideAgreementsID').val(data.agreements.intAgreementID);
            //need to update niceselect in order to view changes
        },
        error : function(error){
            throw error;
        }
    })
    // $('select').niceSelect('update');
    $('#viewAgreementInfo').modal('hide');
    $('#editContractInfo').modal('show');
}


function deleteAgreements(deleteID){
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this Agreement.",
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
                    text: "Agreement Deleted",
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

function validateData(a){
    if(a == '0' || a == null){
        console.log('error', null);
        alert('Must Select A Value from field(s)');
        return false;
    }else{
        console.log('No Errors');
        return a;
    }
}