var url = '/administrator/transactions/teamassignment';

$(document).ready(function(){
    $('#transactionTree').addClass('active');
    $('#tDispatch').addClass('active');
    $('#menuTugboatAssignment').addClass('inactive');
    $('#menuJobOrder').addClass('inactive');
    $('#menuTeamBuilder').addClass('active');
    $('#menuScheduling').addClass('inactive');
    $('#menuHauling').addClass('inactive');;
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.captCheckbox').click(function(){
        if($(this).checked){
            console.log('hi checked');
        }
    });
    $('.teamTugboat').on('click',function(event){
        event.preventDefault();
        // console.log('eeek');
    });
    $('.modalCloseButton').on('click',function(event){
        $('#viewTeamCompositionModal').modal('hide');
    });
    //view Team Modal
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
                $('.viewTeamCard').empty();
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
            },
            error : function(error){
                throw error;
            }
        })

    });
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
});

var checkbox = $('.employeesCheckbox:checkbox');

$('.selectAll').on('click',function(){
    console.log('hi');    
    $('.employeesCheckbox').prop('checked',true);
    // $(checkbox).prop('checked',$(this).prop('checked'));
});
$('.deselectAll').on('click',function(){
    console.log('hi');    
    $('.employeesCheckbox').prop('checked',false);
    // $(checkbox).prop('checked',$(this).prop('checked'));
});

$('.closeInfoModal').on('click',function(){
    $('.modal').modal('hide');
});

$('.occupiedTugboats').on('click',function(event){
    event.preventDefault();
    console.log('kyaaa');
    var teamID = $(this).data('id');
    console.log(teamID);
    

    $.ajax({
        url : url + '/' + teamID + '/viewtugboatteam', 
        type : 'GET',
        dataType : 'JSON',
        success : function(data){
            $('.viewTeamInfo').empty();
            console.log(data)
            console.log();
            $('.tugboatname').html(data.team[0].strName);
            $('.teamname').html('Team Name :&nbsp;' + data.team[0].strTeamName);
            for(var counter=0; counter < (data.team).length; counter++){
                var colorString;
                if(data.team[counter].strPositionName == 'Captain'){
                    colorString = 'primary';
                }else if(data.team[counter].strPositionName == 'Chief Engineer'){
                    colorString = 'info';
                }else if(data.team[counter].strPositionName == 'Crew'){
                    colorString = 'dark';
                }else{
                    colorString = 'success';
                }
                console.log(data.team[counter].intEmployeeID);
                var appendData = 
                `
                    <div class="col-auto">
                        <div class="card bg-${colorString}">
                            <div class="card-body">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" id="addCheckEmployees${data.team[counter].intEmployeeID}" name="employees[]" value="${data.team[counter].intEmployeeID}" class="custom-control-input employeesCheckbox">
                                    <label class="custom-control-label" for="addCheckEmployees${data.team[counter].intEmployeeID}">
                                        <p class="card-text text-center ml-2">${data.team[counter].strLName},&nbsp;${data.team[counter].strFName}</p>
                                        <small class="text-center float-right" style="text-transform: uppercase;">
                                           ${data.team[counter].strPositionName}
                                        </small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                `;
                $(appendData).appendTo('.viewTeamInfo');
                // $('#viewTeamCompositionModal').modal('show');
                $('#viewTeamModal').modal('show');
            }
        },
        error : function(error){
            throw error;
        }
    })
});

function showTeamAssignment(teamID){
    var clone = $('.clonedTry').clone();
    $(clone).appendTo('.cloneAppend');
    
    console.log(teamID);
    $.ajax({
        url : url + '/' + teamID + '/show',
        type : 'GET',
        dataType : 'JSON',
        success : function(data){
            console.log(data);
        },
        error : function(error){
            throw error;
        }
    });
    $('#viewTeamModal').modal('show');
}
function selectTugboatTeam(id){
    console.log(id);
    $('#addTeamModal').modal('show');
    $('#tugboatIDHide').val(id);
}
function submitTeamName(){
    console.log('HI');
    var id = parseInt($('#tugboatIDHide').val());
    var team = [];
    $('.teamlistCheckboxes:checkbox:checked').each(function(checked){
        team[checked] = parseInt($(this).val());
    });
    console.log(team);
    console.log(id);
    team.validate;
    if(team.length == 0){
        swal({
            title: "Error",
            text: "Please Select a Team",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: "btn-danger waves-effect",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
        return false
    }else if(team.length > 1){
        swal({
            title: "Error",
            text: "Only 1 Team Can Be Assigned",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: "btn-danger waves-effect",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
        return false;
    }
    // return false;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : url + '/teamassignment',
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'),    
            tugboatID : id,
            teamID : team[0], 
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
                text: "Team Assigned",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500
            },
            function(){
                window.location = url + '/teamassignment';
            });                       
        },
        error : function(error){
            throw error;
        }

    });

}
function submitTeam(){
    console.log('hi');
    var title = $('#addTeamName').val(); 
    var captains = [];
    var chiefengineer = []; 
    var crew = [];
    $('.captCheckbox:checkbox:checked').each(function(checked){
        captains[checked] = parseInt($(this).val());

    });
    $('.chiefCheckbox:checkbox:checked').each(function(checked){
        chiefengineer[checked] = $(this).val();
    });
    $('.crewCheckbox:checkbox:checked').each(function(checked){
        crew[checked] = $(this).val();
    });
    // $('.captCheckbox:checkbox:checked').each(function(checked){
    //     captains[checked] = $(this).val();
    // });
    if(captains.length == 0 && chiefengineer.length == 0 && crew.length == 0)
    {
        swal({
            title: "Please Select The Team Members",
            text: "1 Captain, 1 Chief Engineer, 2 crews",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: "btn-danger waves-effect",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
        return false;
    }else{
        
        console.log(captains);
        console.log(chiefengineer);
        console.log(crew);
        console.log(title);
        
    }
    // for(var a=0; a<crew.length; a++)
    // {
    //     console.log('Peek a boo : ',crew[a]);
    // }
    // return false;
    console.log('final :',crew);
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
            teamName : title,
            teamCaptainID : captains,
            teamChiefEngineerID : chiefengineer,
            teamCrewID : crew, 
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
                text: "Employees Assigned",
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