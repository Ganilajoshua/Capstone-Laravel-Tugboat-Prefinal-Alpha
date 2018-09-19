// Request Team Modal
$('.requestTeamButtonModal').on('click',function(){
    $('#requestTeamModal').modal('show');
});

// Request Team
$('.requestTeam').on('click',function(){
    var companyID = $('#selectCompany').val();
    var details = $('#exDetails').val();
    console.log(companyID, details);
    swal({
        title: "Are you sure?",
        text: "Request For Extra Team(s)?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,
    },(isConfirm)=>{
        // return false;
        $.ajax({
            url : `${url}/requestteam`,
            type : 'POST',
            data : { 
                "_token" : $('meta[name="csrf-token"]').attr('content'),
                requestForwardCompanyID : companyID,
                requestDetails : details,
            }, 
            beforeSend: (request)=>{
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : (data, response)=>{
                console.log('success pota');
                console.log(data);
                console.log(response);
                swal({
                    title: "Success",
                    text: "Team Requested",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                    timer : 1500
                },
                (isConfirm)=>{
                    if(isConfirm){
                        location.reload();
                    }
                });                       
            },
            error : function(error){
                throw error;
            }

        });
    });
});

// Return Team 
$('.returnTeam').on('click',function(){
    console.log('heyaaaa');
    console.log($(this).data('id'));
    var id = $(this).data('id')
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
            url : `${url}/returnteam`,
            type : 'POST',
            data : { 
                "_token" : $('meta[name="csrf-token"]').attr('content'),    
                teamID : id,
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
