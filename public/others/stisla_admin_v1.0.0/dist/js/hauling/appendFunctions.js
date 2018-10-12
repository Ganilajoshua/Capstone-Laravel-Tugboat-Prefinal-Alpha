

var url = '/administrator/transactions/dispatchandhauling/hauling';
function getLocation(joborders){
    console.log(joborders);
    var sLocation = [];
    var dLocation = [];

    if((joborders[0].intJOBerthID) == null){
        sLocation = joborders[0].strJOStartPoint;
        dLocation = joborders[0].strJODestination;
    }
    else if((joborders[0].strJOStartPoint) == null){
        sLocation = `${joborders[0].strPierName} - ${joborders[0].strBerthName}`;
        dLocation = joborders[0].strJODestination;
    }
    else if((joborders[0].strJODestination) == null){
        sLocation = joborders[0].strJOStartPoint;
        dLocation = `${joborders[0].strPierName} - ${joborders[0].strBerthName}`;
    }
    var locations = [
        {sLocation,dLocation}
    ];
    console.log(locations);
    return locations;
}

// Append Data To Header
function appendHeader(joborders){
    var appendHeader = 
    `<div class="modal-title mt-2" id="moreInfoModalLabel"><b style="font-size: 18px;">Job Order # ${joborders[0].intJobOrderID}</b>
        <h3 class="mt-2" style="font-size: 15px;">${joborders[0].strCompanyName}</h3>
    </div>`;
    $(appendHeader).appendTo('.startHaulingHeader');
    
}

function appendJoborder(joborders,location){
    console.log(joborders);
    console.log(location[0].sLocation);
    // console.log(sLocation, dLocation);
    $('.startHaulingBody').empty();
    // return false;
    var appendJobOrder = 
    `<div class="row joborderDetailsContainer">
        <div class="col-6">
            <ul class="list-inline">
                <li class="list-inline-item text-primary">
                    <h6>Date of Transaction : </h6></li>
                <li class="list-inline-item">
                    <h6>
                        ${moment(joborders[0].datStartDate).format('MMMM D, YYYY')} - ${moment(joborders[0].datEndDate).format('MMMM D, YYYY')}
                    </h6>
                </li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item text-primary">
                    <h6>Estimated Time of Hauling : </h6></li>
                <li class="list-inline-item">
                    <h6>
                    ${joborders[0].tmStart} HRS - ${joborders[0].tmStart} HRS 
                    </h6>
                </li>
            </ul>
        </div>
        <div class="col-6">
            <ul class="list-inline">
                <li class="list-inline-item text-primary">
                    <h6>Starting Location : </h6></li>
                <li class="list-inline-item">
                    <h6>${location[0].sLocation}</h6></li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item text-primary">
                    <h6>Destination : </h6></li>
                <li class="list-inline-item">
                    <h6>${location[0].dLocation}</h6></li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item text-primary">
                    <h6>Goods to be delivered : </h6></li>
                <li class="list-inline-item">
                    <h6>${joborders[0].strGoodsName}</h6></li>
            </ul>
        </div>
    </div>`;
    $(appendJobOrder).appendTo('.startHaulingBody');
}
// Append Tugboats Container
function appendContainer(){
    var appendTugboatContainer = 
    `<div class="text-center mt-2 mb-2"><h4>Tugboats Assigned</h4></div>
        <div class="row jobschedTugboats mt-4">
    </div>`;
    $(appendTugboatContainer).appendTo('.startHaulingBody');
}

// Append Body To Tugboat Container
function appendBody(jobsched){
    console.log(jobsched);
    for(var counter = 0; counter < (jobsched).length; counter++){
        console.log(jobsched[counter].intTATeamID);
        if(jobsched[counter].intTATeamID == null){
            var appendTugboats =
            `<div class="col-12 col-sm-12 col-lg-4 animated fadeIn">
                <div class="card card-sm-2 card-primary border-primary pendingCards">
                    <div class="card-icon miniIcon">
                        <i class="ion ion-android-boat text-primary"></i>
                    </div>
                    <div class="card-header">
                        <p style="font-size:15px; font-weight: bold;" class="text-primary mb-2">${jobsched[counter].strName}</p>
                    </div>
                    <div class="card-body mt-1">
                        <h3 style="font-size: 16px;">No Team is Assigned For This Tugboat!</h3>
                        <a href="/administrator/transactions/dispatchandhauling/teamassignment" style="font-size: 14px;">Click here to Assign a Tugboat</a>
                    </div>
                    <div class="card-footer mt-2">
                    </div>
                </div>
            </div>`;
        }else{
            console.log(jobsched[counter].intTATeamID);
            // team = jobsched[counter].intTATeamID;
            var appendTugboats =
            `<div class="col-12 col-sm-12 col-lg-4 animated fadeIn">
                <div class="card card-sm-2 card-primary border-primary pendingCards">
                    <div class="card-icon">
                        <i class="ion ion-android-boat text-primary"></i>
                    </div>
                    <div class="card-header">
                        <p style="font-size:15px; font-weight: bold;" class="text-primary mb-2">${jobsched[counter].strName}</p>
                    </div>
                    <div class="card-body mt-1 appendEmployees${jobsched[counter].intTATeamID}">
                        <h3 style="font-size: 16px;">
                            <span class="text-primary" style="font-weight: bold;">
                                Team Assigned :
                            </span>
                            <span class="ml-2" style="font-size: 15px;">
                            ${jobsched[counter].strTeamName}
                            </span>    
                        </h3>
                        
                    </div>
                    <div class="card-footer mt-2">
                    </div>
                </div>
            </div>`;
        }
        $(appendTugboats).appendTo('.jobschedTugboats');
    }
}

function getTeam(jobsched){
    var team = [];
    for(var counter = 0; counter < (jobsched).length; counter++){
        if(jobsched[counter].intTATeamID != null){
            team.push(jobsched[counter].intTATeamID);
        }
    }
    return team;
}
function getEmptyTeams(jobsched){
    var teams = [];
    for(var counter = 0; counter < (jobsched).length; counter++){
        if(jobsched[counter].intTATeamID == null){
            teams.push(jobsched[counter]);
        }
    }
    if((teams).length > 0){
        $('.startHaulingProcess').addClass('disabled');
        // $('.startHaulingProcess').data('toogle','tooltip');
        // $('.startHaulingProcess').tooltip({title : 'Cannot Start Hauling Process'});
        // 'Cannot Start the Hauling Process');
        $('.startHaulingProcess').prop('disabled', true);
    }
    $('.startHaulingContainer').css('display','block');
    $('.jobOrderList').css('display','none');
}

// function 
function appendEmployees(teams){
    console.log(teams);
    // return false;
    $.ajax({
        url : `${url}/showteam`,
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            teamID : teams
        },
        success : (data,response)=>{
            console.log(data);
            for(var counter = 0; counter < (data.teams).length; counter++){
                console.log((data.teams).length);
                for(var count = 0; count < (data.teams[counter]).length; count++){

                    console.log(counter + 1,data.teams[counter][count].strFName, data.teams[counter][count].strLName);
                    // console.log(counter + 1);
                    console.log(data.teams[counter][count].intETeamID);

                    var appendTeam =
                    `<div class="row">
                        <div class="col">
                            <span class="text-primary" style="font-size: 15px;">${data.teams[counter][count].strPositionName} : </span>
                            <span style="font-size: 14px;">${data.teams[counter][count].strLName}, ${data.teams[counter][count].strFName}<span>
                        </div>
                    </div>`;
                    $(appendTeam).appendTo(`.appendEmployees${data.teams[counter][count].intETeamID}`);
                }
            }
            $('.startHaulingContainer').css('display','block');
            $('.jobOrderList').css('display','none');
            
            // setTimeout($('.startHaulingContainer').css('display','block'),500);
	        // setTimeout($('.jobOrderList').css('display','none'),500);
        },
        error : (error)=>{
            throw error;
        }
    });
}