var url = '/affiliates/maintenance/employees';

$(document).ready(function(){
    $('#maintenanceTree').addClass("active");
    $('#employeesMenu').addClass("active");
    $('#addEmployeeButton').on('click',function(){
        $('#addEmployeeModal').modal('show');
    })
    $('.modal-lg').css('max-width','68%');
    $('.modalClose').on('click',function(){
        $('#addEmployeeModal').modal('hide');
        $('#editEmployeeModal').modal('hide');
    });

    $(".employeeCheckbox").on('change',function(){
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


function getEmployees(id)
{
    console.log('Requesting Data');
    console.log($('#empID').val());
    $.ajax({
        url: url + '/' + id + '/edit',
        dataType : 'JSON',
        success : function(data, response)
        {
            console.log('Data Received', data, response);
            var posID = data.employee.intEPositionID;
            console.log(data.employee.enumEmpType);
            console.log(posID);
            $('#editPositionSelect').val(posID);
            $('#editLastName').val(data.employee.strLName);
            $('#editFirstName').val(data.employee.strFName);
            $('#editMiddleName').val(data.employee.strMName);
            $('#editEmpType').val(data.employee.enumEmpType);
            //document.getElementById("editPositionSelect").value = posID;
            $('#editIDhide').val(data.employee.intEmployeeID);
            $('#editEmployeeModal').modal('show');
        }
        
    });
}
function editEmployeeSubmit(){
    console.log($('#editIDhide').val());
    var id = $('#editIDhide').val();
    var  position = $('#editPositionSelect').val();
    var lname = $('#editLastName').val();
    var fname = $('#editFirstName').val();
    var mname = $('#editMiddleName').val();
    var emptype = $('#editEmpType').val();
    console.log(emptype);       
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
            positionID : id,
            lastName : lname,
            firstName : fname,
            middleName : mname,
            position : position,
            employeeType : emptype
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            $('#editEmployeeModal').modal('hide');
            console.log(data);
            swal({
                title: "Success",
                text: "Employee Updated",
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
}
function postEmployee(){
    var position = parseInt($('#positionSelect').val());
    var lname = $('#addLastName').val();
    var fname = $('#addFirstName').val();
    var mname = $('#addMiddleName').val();
    var emptype = $('#addEmpType').val();
    console.log(position, lname, fname, mname, emptype);
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
            lastName : lname,
            firstName : fname,
            middleName : mname,
            position : position,
            employeeType : emptype
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data, response){
            $('#addEmployeeModal').modal('hide');
            console.log(response);
            swal({
                title: "Success",
                text: "Employee Added",
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
}
function deleteEmployees(deleteID){
    console.log('Trying to Delete Data');
    console.log(deleteID);

    $.ajax({
        url: url + '/' + deleteID + '/edit',
        dataType : 'JSON',
        success : function(data, response)
        {
            swal({
                title: "Do you Want to delete this Employee?",
                text: data.employee.strLName + ', ' + data.employee.strFName,
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
                            text: "Employee Deleted",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Ok",
                            closeOnConfirm: true,
                            timer : 1000
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
            });
        }
        
    });
}