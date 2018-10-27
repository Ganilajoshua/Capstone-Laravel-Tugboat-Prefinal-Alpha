// Team Builder Team List

// View Team Composition Modal
$('.viewTeamButton').on('click',function(event){
    event.preventDefault();
    console.log($(this).data('id'));
    var viewID = $(this).data('id');
    console.log('aaaaaaaak');
    $.ajax({
        url : url + '/' + viewID + '/viewteam', 
        type : 'GET',
        dataType : 'JSON',
        success : function(data){
            console.log(data);
            console.log(data);
            $('.viewTeamCard').empty();
            if((data.employees).length == 0){
                $('#viewTeamCompositionModal').modal('show');
            }else{
                for(var counter=0; counter < (data.employees).length; counter++){
                    var colorString;
                    if(data.employees[counter].strPositionName == 'Captain'){
                        colorString = 'primary';
                    }else if(data.employees[counter].strPositionName == 'Chief Engineer'){
                        colorString = 'info';
                    }else if(data.employees[counter].strPositionName == 'Crew'){
                        colorString = 'dark';
                    }else{
                        colorString = 'success';
                    }
                    console.log(data.employees[counter]);
                    var appendData = 
                    `
                        <div class="col-auto">
                            <div class="card bg-${colorString}">
                                <div class="card-body">
                                    <p class="card-text text-center ml-2">${data.employees[counter].strLName},&nbsp;${data.employees[counter].strFName}</p>
                                    <small class="text-center float-left" style="text-transform: uppercase;">
                                        ${data.employees[counter].strPositionName}
                                    </small>    
                                </div>
                            </div>
                        </div>
                    `;
                    $(appendData).appendTo('.viewTeamCard');
                    $('#viewTeamCompositionModal').modal('show');
                }
            }
        },
        error : function(error){
            throw error;
        }
    })

});

// Team Card Edit Button 
$('.editButton').on('click',function(){
    console.log($(this).data('id'));
    var viewID = $(this).data('id')
    $.ajax({
        url : url + '/' + viewID + '/viewteam', 
        type : 'GET',
        dataType : 'JSON',
        success : function(data){
            $('.editTeam').empty();
            console.log(data)
            console.log();
            for(var counter=0; counter < (data.employees).length; counter++){
                var colorString;
                if(data.employees[counter].strPositionName == 'Captain'){
                    colorString = 'primary';
                }else if(data.employees[counter].strPositionName == 'Chief Engineer'){
                    colorString = 'info';
                }else if(data.employees[counter].strPositionName == 'Crew'){
                    colorString = 'dark';
                }else{
                    colorString = 'success';
                }
                console.log(data.employees[counter].intEmployeeID);
                var appendData = 
                `
                
                    <div class="col-auto">
                        <div class="card bg-${colorString}">
                            <div class="card-body">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" id="addCheckEmployees${data.employees[counter].intEmployeeID}" name="employees[]" value="${data.employees[counter].intEmployeeID}" class="custom-control-input employeesCheckbox">
                                    <label class="custom-control-label" for="addCheckEmployees${data.employees[counter].intEmployeeID}">
                                        <p class="card-text text-center ml-2">${data.employees[counter].strLName},&nbsp;${data.employees[counter].strFName}</p>
                                        <small class="text-center float-right" style="text-transform: uppercase;">
                                           ${data.employees[counter].strPositionName}
                                        </small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                `;
                $(appendData).appendTo('.editTeam');
                // $('#viewTeamCompositionModal').modal('show');
                $('#editTeamModal').modal('show');
            }
        },
        error : function(error){
            throw error;
        }
    })
});

// Remove Employees From Team
$('.removeTeamEmployees').on('click',function(){
    id = $(this).data('id');
    console.log(id);
    swal({
        title: "Are You Sure?",
        text: "Remove Employees From This Team",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ok",
        closeOnConfirm: true,
    },(isConfirm)=>{
        $.ajax({
            url : url + '/removeteamemployees',
            type : 'POST',
            data : { 
                "_token" : $('meta[name="csrf-token"]').attr('content'),    
                teamID : id,
            }, 
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : function(data, response){
                console.log('success pota');
                console.log(data);
                console.log(response);
                swal({
                    title: "Success",
                    text: "Employees Removed",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                },
                function(){
                    window.location = url;
                });                       
            },
            error : function(error){
                throw error;
            }
    
        });
    });
});

// Forward Team Modal
$('.forwardTeamButtonModal').on('click',function(){
    console.log('Forwaaard');

    console.log($(this).data('id'));
    var id = $(this).data('id')
    // return false;
    swal({
        title: "Are you sure?",
        text: "Forward This Team?, If this team is assigned the assignment will be removed",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,
    },(isConfirm)=>{
        $.ajax({
            url : `${url}/${id}/viewteam`, 
            type : 'GET',
            dataType : 'JSON',
            success : function(data){
                $('.viewTeamInfo').empty();
                $('.teamname').empty();
                $('.teamname').html(data.employees[0].strTeamName);
                $('#forwardModal').data('id',id);
                console.log(data)
                console.log();
                if((data.employees).length == 0){
                    // $('#viewTeamCompositionModal').modal('show');
                }else{
                    for(var counter=0; counter < (data.employees).length; counter++){
                        var colorString;
                        if(data.employees[counter].strPositionName == 'Captain'){
                            colorString = 'primary';
                        }else if(data.employees[counter].strPositionName == 'Chief Engineer'){
                            colorString = 'info';
                        }else if(data.employees[counter].strPositionName == 'Crew'){
                            colorString = 'dark';
                        }else{
                            colorString = 'success';
                        }
                        console.log(data.employees[counter]);
                        var appendData = 
                        `
                            <div class="col-auto">
                                <div class="card bg-${colorString}">
                                    <div class="card-body">
                                        <p class="card-text text-center ml-2">${data.employees[counter].strLName},&nbsp;${data.employees[counter].strFName}</p>
                                        <small class="text-center float-left" style="text-transform: uppercase;">
                                            ${data.employees[counter].strPositionName}
                                        </small>    
                                    </div>
                                </div>
                            </div>
                        `;
                        $(appendData).appendTo('.viewTeamInfo');
                        $('#forwardModal').modal('show');
                    }
                }
            },
            error : function(error){
                throw error;
            }
        })
    });
});

// Forward Team
$('.forwardTeamButton').on('click',function(){
    console.log($('#forwardModal').data('id'));
    id = $('#forwardModal').data('id');
    company = $('#selectForwardCompany').val();

    console.log(id, company);
    // return false;
    $.ajax({
        url : `${url}/forwardteam`,
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'),    
            teamID : id, 
            companyID : company,
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data, response){
            console.log('success pota');
            console.log(data);
            console.log(response);
            swal({
                title: "Success",
                text: "Team Forwarded",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500
            },
            function(){
                window.location = url;
            });                       
        },
        error : function(error){
            throw error;
        }

    });
});
