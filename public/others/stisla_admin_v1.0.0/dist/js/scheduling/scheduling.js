$(document).ready(function(){
    $('#transactionTree').addClass('active');
    $('#tDispatch').addClass('active');
    $('#menuTugboatAssignment').addClass('inactive');
    $('#menuJobOrder').addClass('inactive');
    $('#menuTeamBuilder').addClass('inactive');
    $('#menuScheduling').addClass('active');
    $('#menuHauling').addClass('inactive');;
    
    // $.ajax({
    //     url : '/scheduling/schedules',
    //     type : 'GET',
    //     dataType : 'JSON',
    //     success : function(data, response){
    //         console.log('HI success siya');
    //         console.log(data);
    //     },
    //     error : function(error){
    //         throw error;
    //     }
    // });
    // console.log($('#sched').val());
    // a = $('#sched').val()
    // var schedules = JSON.parse(a);
    // var events = [];
    // for(var count=0; count<schedules.length; count++){
    //     events.push({
    //         title : schedules[count].strSchedDesc,
    //         start : schedules[count].datTransactionDate
    //     });
    // }
    // console.log('length :' , schedules.length); 
    // console.log(schedules[0].intScheduleID);
    // console.log(schedules);
    console.log('HI');
});