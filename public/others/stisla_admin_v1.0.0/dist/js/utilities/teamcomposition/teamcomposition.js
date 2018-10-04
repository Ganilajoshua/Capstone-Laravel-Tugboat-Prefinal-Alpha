var url = '/administrator/utilities/teamcomposition';
$(document).ready(function(){
    
    // Define Ajax Setup Headers For CSRF Token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    console.log(JSON.parse($('#teamComposition').val()));
    var json = JSON.parse($('#teamComposition').val());

    console.log(json.length);
    for(var counter=0; counter < json.length; counter++){
        console.log(json[counter]);
        if(json[counter].strPositionName !== 'Captain' && json[counter].strPositionName !== 'Chief Engineer' && json[counter].strPositionName !== 'Crew'){
            var splitter = (json[counter].strPositionName).split(' ');
            console.log(splitter);
            for(var countsplit = 0; countsplit < 3; countsplit++){
                if(splitter[countsplit] !== undefined){
                    console.log(splitter[countsplit]);
                    console.log(((splitter[countsplit]).charAt(0)).toUpperCase());
                    var initial = ((splitter[countsplit]).charAt(0)).toUpperCase();
                    appendInitial =
                    `<span>${initial}</span>`;
                    $(appendInitial).appendTo(`.position${json[counter].intPositionID}`);
                }else{
                    console.log(undefined, 'si gago');
                }
                // ( (json[counter].strPositionName).charAt(0) ).toUpperCase()
            }
            // console.log(( (json[counter].strPositionName).charAt(0) ).toUpperCase());
            // $(`.position${json[counter].intPositionID}`).html(( (json[counter].strPositionName).charAt(0) ).toUpperCase());
            // break;
        }
    }
});

$('.saveChanges').on('click',function(){
    var teamcompID = [];
    var teamcompnumber = [];

    $('.teamComposition').each(function(teamcomp){
        teamcompID[teamcomp] = $(this).data('id');
        teamcompnumber[teamcomp] = $(this).val();
        console.log($(this).val(),$(this).data('id'),$(this).data('position'));
    });

    console.log(teamcompID);
    console.log(teamcompnumber);
    swal({
        title: "Save Changes?",
        text: "Apply All The Changes You Made To The Team Compositions",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,

    },(isConfirm)=>{
        if(isConfirm){
            $.ajax({
                url : `${url}/update`,
                type : 'POST',
                data : {
                    "_token" : $('meta[name="csrf-token"]').attr('content'),
                    teamcompID : teamcompID,
                    teamcompnumber : teamcompnumber,
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
                        text: "Team Composition Updated",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Ok",
                        closeOnConfirm: true,
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
        }
    });
});

