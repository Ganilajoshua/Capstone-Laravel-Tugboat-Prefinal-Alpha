var url = '/administrator/transactions/dispatchandhauling/teamassignment';

$(document).ready(function(){
    $('#transactionTree').addClass('active');
    $('#tDispatch').addClass('active');
    $('#menuForwardReq').addClass('inactive');
    $('#menuTugboatAssignment').addClass('inactive');
    $('#menuJobOrder').addClass('inactive');
    $('#menuTeamBuilder').addClass('active');
    $('#menuScheduling').addClass('inactive');
    $('#menuHauling').addClass('inactive');;
    
    // Define Ajax Setup Headers For CSRF Token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.teamTugboat').on('click',function(event){
        event.preventDefault();
    });

    $.ajax({
        url : `${url}/notifications`,
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
        },
        beforeSend:(request)=>{
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : (data, response)=>{
            console.log('success pota');
            console.log(data);
            var tugboatnotifs = data.tugboatsreceived.length;
            var teamnotifs = data.teamsreceived.length;

            console.log(response);     
            if((data.teamsreceived).length != 0){
                var appendTeamBadge = 
                `<span class="badge badge-danger border-radius-x float-right badgeTeamNotif" data-tooltip="tooltip" title="You Have ${data.teamsreceived.length} Notifications">${data.teamsreceived.length}</span>`;
                $(appendTeamBadge).appendTo('#pillsReceivedTeam-tab');
            }
            if((data.tugboatsreceived).length != 0){  
                var appendTeamBadge = 
                `<span class="badge badge-danger border-radius-x float-right badgeTugboatNotif" data-tooltip="tooltip" title="You Have ${data.tugboatsreceived.length} Notifications">${data.tugboatsreceived.length}</span>`;
                $(appendTeamBadge).appendTo('#pillsReceivedTugboat-tab');
            }
            
        },
        error : function(error){
            throw error;
        }
    });
});
$('.backButton').on('click',function(){
    $('.teamAssignment').css('display','block');
    $('.teamAssignment').addClass('animated fadeIn');
    $('.assignTeamCard').css('display','none');
});

$('.assignTeam').on('click',function(){
    console.log($(this).data('id'));
    var joborderID = $(this).data('id')
    $.ajax({
        url : `${url}/${joborderID}/getjoborder`,
        type : 'GET',
        dataType : 'JSON',
        success : (data,response)=>{
            console.log(data);
            var location = getLocation(data.joborder);
            appendTugboatTeamDefaults(data.jobsched);
            appendJoborderHeader(data.joborder);
            appendJoborderBody(data.joborder,location);
            appendJoborderTeams(data.jobsched,data.teams);
            $('.assignDefaultTeams').data('id',`${data.jobsched[0].intJSJobOrderID}`);
            $('.teamAssignment').css('display','none');
            $('.assignTeamCard').css('display','block');
            // $('.assignTeamCard').addClass('animated fadeIn');
        },error : (error)=>{
            throw error;
        }
    })
});

$('.viewDefaultTeamsButton').on('click',function(event){
    event.preventDefault();
    console.log('Hey');
    console.log($(this).data('id'));
});

$('.assignTeams').on('click',function(){
    selected = [];
    tugboatID = [];
    $(".jobschedTugboats").each(function(key){
        tugboatID[key] = $(this).data('id');
    });
    $(".teamAssignmentSelect option:selected").each(function(select){
        selected[select ] = parseInt($(this).val());    
    });
    console.log(selected, tugboatID);
});
$('.assignDefaultTeams').on('click',function(){
    console.log('HI');
    console.log($(this).data('id'));
    var jobschedID = [];
    var tugboatID = [];
    var joborderID = $(this).data('id');
    $.ajax({
        url : `${url}/${joborderID}/showdefaultteams`,
        type : 'GET',
        dataType : 'JSON',
        success : (data,response)=>{
            console.log(data);
            for(var counter = 0; counter < data.jobsched.length; counter++){
                jobschedID[counter] = data.jobsched[counter].intJobSchedID;
                tugboatID[counter] = data.jobsched[counter].intTugboatID;
            }
            swal({
                title: "Are you Sure?",
                text: "Assign The Default Teams",
                type: "info",
                showCancelButton: true,
                confirmButtonClass: "btn-info waves-effect",
                confirmButtonText: "Ok",
                closeOnConfirm: true
            },(isConfirm)=>{
                if(isConfirm){
                    console.log('heyyyyyaaaa');
                    // $('#defaultTeamsModal').modal('show');
                    $.ajax({
                        url : `${url}/assigndefaultteams`,
                        type : 'POST',
                        data : {
                            "_token" : $('meta[name="csrf-token"]').attr('content'),
                            tugboatID : tugboatID,
                            jobschedID : jobschedID,
                        }, 
                        success : (data,response)=>{
                            console.log(data);
                            swal({
                                title: "Success",
                                text: "Teams Assigned",
                                type: "success",
                                showCancelButton: true,
                                confirmButtonClass: "btn-success waves-effect",
                                confirmButtonText: "Ok",
                                closeOnConfirm: true
                            },(isConfirm)=>{
                                if(isConfirm);{
                                    location.reload();
                                }
                            });
                        },
                        error : (error)=>{
                            throw error;    
                        }
                    });
                }
            });
        },
        error : (error)=>{
            throw error;    
        }
    });
});

$('.addNewTeamButton').on('click',function(){
    $.ajax({
        url : `${url}/getteamcompositions`,
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content')
        },
        success : (data,response)=>{
            console.log(data);
            appendTeamComposition(data.positions);

            $('#addTeam').modal('show');
        },
        error : (error)=>{

        }
    });
});
var checkbox = $('.employeesCheckbox:checkbox');

// Return Tugboats
// $('.tugboatsReturn').on('click',function(){
//     console.log('heyaaa');
// });

$('.returnTugboats').on('click',function(){
    console.log('HI');
    console.log($(this).data('id'));
    var id = $(this).data('id');

    swal({
        title: "Are you Sure?",
        text: "Return This Team?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info waves-effect",
        confirmButtonText: "Ok",
        closeOnConfirm: true
    },(isConfirm)=>{
        // return false;
        $.ajax({
            url : `${url}/returntugboat`,
            type : 'POST',
            data : { 
                "_token" : $('meta[name="csrf-token"]').attr('content'),    
                tugboatassignID : id,
            }, 
            beforeSend:  (request)=>{
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : (data, response)=>{
                console.log('success pota');
                console.log(data);
                console.log(response);
                swal({
                    title: "Success",
                    text: "Team Returned",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                    timer : 1500
                },(isConfirm)=>{
                    if(isConfirm){
                        window.location = url;
                    }
                });                       
            },
            error : (error)=>{
                throw error;
            }
        });
    });
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
                window.location = url;
            });                       
        },
        error : function(error){
            throw error;
        }

    });

}

$('.submitCreatedTeam').on('click',function(event){
    event.preventDefault();
    console.log('clicked');
    
    console.log('hi');
    var title = $('#addTeamName').val(); 
    var selectedmembers = [];

    $('.employeesCheckbox:checkbox:checked').each(function(checked){
        selectedmembers[checked] = {positionName : $(this).data('position'), employeeID : parseInt($(this).data('id'))};
    });

    $.ajax({
        url : `${url}/getteamcompositions`,
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),    
        },
        success : (data)=>{
            console.log(data);
            console.log(selectedmembers);
            var validationrule = [];
            for(let count = 0; count < (data.positions).length; count++){
                validationrule[count] = {positionName : data.positions[count].strPositionName, compositionNumber : 0};
            }

            for(let count = 0; count < selectedmembers.length; count++){
                for(let counter = 0; counter < validationrule.length; counter++){
                    if(selectedmembers[count].positionName === validationrule[counter].positionName){
                        validationrule.splice(counter,1,{positionName : validationrule[counter].positionName, compositionNumber : (validationrule[counter].compositionNumber + 1)});
                        console.log(validationrule[counter]);
                    }
                }
            }
            console.log(validationrule);
            var errorcounter = 0;
            for(let count=0; count < (data.positions.length); count++){
                for(let counter=0; counter < (validationrule).length; counter++){
                    if(data.positions[count].strPositionName === validationrule[counter].positionName){
                        if(data.positions[count].intPositionCompNum !== validationrule[counter].compositionNumber){
                            errorcounter =  errorcounter + 1;
                        }
                    }
                }
            }
            membersID = [];
            for(let count=0; count < selectedmembers.length; count++){
                membersID[count] = parseInt(selectedmembers[count].employeeID);
            }
            console.log(parseInt(membersID));
            
            if(errorcounter > 0){
                console.log('dami mong alam');
                event.stopPropagation();
                toastr.error("You did not meet the requirements needed for a team",'Team Creation Failed', { 
                    positionClass : 'toast-bottom-right', 
                    preventDuplicates : true, 
                    showDuration : "2000",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                });
            }else{
                console.log(errorcounter);
                console.log('eeey');
                console.log('nagpropagate');
                                
                $.ajax({
                    url : `${url}/store`,
                    type : 'POST',
                    data : { 
                        "_token" : $('meta[name="csrf-token"]').attr('content'),    
                        teamName : title,
                        membersID : membersID,
                    }, 
                    beforeSend:(request)=>{
                        return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                    },
                    success : (data, response)=>{
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
                        (isConfirm)=>{
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
        },
        error : (error)=>{

        }
    });
})
    
function submitTeam(event){
    event.preventDefault();
    console.log('hi');
    var title = $('#addTeamName').val(); 
    var captains = [];
    var chiefengineer = []; 
    var crew = [];
    var selectedmembers = [];
    var validationrule = [];
    $('.captCheckbox:checkbox:checked').each(function(checked){
        captains[checked] = parseInt($(this).val());    
    });
    $('.chiefCheckbox:checkbox:checked').each(function(checked){
        chiefengineer[checked] = $(this).val();
    });
    $('.crewCheckbox:checkbox:checked').each(function(checked){
        crew[checked] = $(this).val();
    });

    $('.employeesCheckbox:checkbox:checked').each(function(checked){
        selectedmembers[checked] = {positionName : $(this).data('position'), employeeID : $(this).data('id')};
    });
    
    $.ajax({
        url : `${url}/getteamcompositions`,
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),    
        },
        success : (data)=>{
            console.log(data);
            console.log(selectedmembers);
            var validationrule = [];
            for(let count = 0; count < (data.positions).length; count++){
                validationrule[count] = {positionName : data.positions[count].strPositionName, compositionNumber : 0};
            }

            for(let count = 0; count < selectedmembers.length; count++){
                for(let counter = 0; counter < validationrule.length; counter++){
                    if(selectedmembers[count].positionName === validationrule[counter].positionName){
                        validationrule.splice(counter,1,{positionName : validationrule[counter].positionName, compositionNumber : (validationrule[counter].compositionNumber + 1)});
                        console.log(validationrule[counter]);
                    }
                }
            }
            console.log(validationrule);
            var errorcounter = 0;
            for(let count=0; count < (data.positions.length); count++){
                for(let counter=0; counter < (validationrule).length; counter++){
                    if(data.positions[count].strPositionName === validationrule[counter].positionName){
                        if(data.positions[count].intPositionCompNum !== validationrule[counter].compositionNumber){
                            errorcounter =  errorcounter + 1;
                        }
                    }
                }
            }
            if(errorcounter > 0){
                console.log('dami mong alam');
                event.stopPropagation();

            }else{
                console.log(errorcounter);

                $.ajax({
                    url : url + '/store',
                    type : 'POST',
                    data : { 
                        "_token" : $('meta[name="csrf-token"]').attr('content'),    
                        teamName : title,
                        
                    }, 
                    beforeSend:(request)=>{
                        return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                    },
                    success : (data, response)=>{
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
                        (isConfirm)=>{
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
        },
        error : (error)=>{

        }
    })
    // return false;
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
        beforeSend:(request)=>{
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : (data, response)=>{
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
            (isConfirm)=>{
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