$(document).ready(function(){
    $('#transactionTree').addClass("active");
    $('#menuTeamBuilder').addClass("active");

    $('.captCheckbox').click(function(){
        if($(this).checked){
            console.log('hi checked');
        }
    });
    $('.teamTugboat').on('click',function(event){
        event.preventDefault();
        
        // console.log('eeek');
    });
});

var url = '/administrator/transactions/teamassignment';

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
                // window.location = "/teamassignment";
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
// function booYa(lastName){
//     name =lastName;
//     namet = lastName.toString();
//     console.log(name);
//     if($(this).checked){
//         console.log('hi checked');
//     }
//     $('#happiness').append(
//         '<div class="col-4">' +
//             '<div class="card bg-info" id="addDismissCard'+name+'">' +
//                 '<div class="card-header">' +
//                     name +
//                     '<div class="float-right">' +
//                         '<a data-dismiss="#addDismissCard'+name+'" onclick="pots('+namet+')" class="btn btn-icon"><i class="ion ion-close"></i></a>'+
//                     '</div>'+
//                 '</div>'+
//             '</div>'+
//         '</div>'   
//     );
    
// }
// $('.removeThis').click(function(name){
//     console.log(name);
//     // $("#addDismisscard'++'");
// });
// function pots(){
//     $(this).remove();
// }
// $('.removeThis').on('click',function(e){
//     // e.stopPropagation();
//     var $target = $(this).parent('#rowOne');
//     $target.detach('slow', function(){$target.remove(); });
// })