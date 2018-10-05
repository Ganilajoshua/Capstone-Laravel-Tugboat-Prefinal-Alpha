var url = '/affiliates/transactions/dispatchandhauling/teamassignment';

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

var checkbox = $('.employeesCheckbox:checkbox');

// // Return Tugboats
// $('.returnTugboat').on('click',function(){
//     console.log('HI');
//     console.log($(this).data('id'));
//     var id = $(this).data('id');

//     swal({
//         title: "Are you Sure?",
//         text: "Return This Team?",
//         type: "info",
//         showCancelButton: true,
//         confirmButtonClass: "btn-info waves-effect",
//         confirmButtonText: "Ok",
//         closeOnConfirm: true
//     },(isConfirm)=>{
//         // return false;
//         $.ajax({
//             url : `${url}/returntugboat`,
//             type : 'POST',
//             data : { 
//                 "_token" : $('meta[name="csrf-token"]').attr('content'),    
//                 tugboatassignID : id,
//             }, 
//             beforeSend:  (request)=>{
//                 return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
//             },
//             success : (data, response)=>{
//                 console.log('success pota');
//                 console.log(data);
//                 console.log(response);
//                 swal({
//                     title: "Success",
//                     text: "Team Returned",
//                     type: "success",
//                     showCancelButton: false,
//                     confirmButtonClass: "btn-success",
//                     confirmButtonText: "Ok",
//                     closeOnConfirm: true,
//                     timer : 1500
//                 },(isConfirm)=>{
//                     if(isConfirm){
//                         window.location = url;
//                     }
//                 });                       
//             },
//             error : (error)=>{
//                 throw error;
//             }
//         });
//     });
// });

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