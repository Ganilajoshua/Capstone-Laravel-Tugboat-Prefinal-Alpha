var url = '/administrator/transactions/dispatchandhauling/teamassignment';

function appendTeamComposition(positions){
    console.log(positions);
    $('.teamcompositionContainer').empty();
    for(var counter = 0; counter < (positions).length; counter++){

        var appendIcon = getPositionIcons(positions[counter]);
        appendTeamComp =

        `
        <div class="col-lg-4">
            <div class="card card-sm-3 border-primary card-primary">
                ${appendIcon}
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>${positions[counter].strPositionName}</h4>
                    </div>
                    <div class="card-body">
                        <h4>${positions[counter].intPositionCompNum}</h4>
                    </div>
                </div>
            </div>
        </div>`;
        $(appendTeamComp).appendTo('.teamcompositionContainer');
    }
}

function getPositionIcons(position){
    console.log(position.strPositionName);
    var appendIcon;
    if(position.strPositionName == 'Captain'){
        appendIcon = 
        `<div class="card-icon bg-primary">
            <i class="fas fa-anchor"></i>
        </div>`;
 
    }else if(position.strPositionName == 'Chief Engineer'){
        appendIcon = 
        `<div class="card-icon bg-primary">
            CE
        </div>`;
    }else if(position.strPositionName == 'Crew'){
        appendIcon =
        `<div class="card-icon bg-primary">
            C
        </div>`;
    }else{
        var appendIcon = `
        <div class="card-icon bg-primary">
            ${((position.strPositionName).charAt(0)).toUpperCase()}
        </div>`;
    }
    return appendIcon;
}

// Get Locations of Joborders
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

// Append Joborder Header
function appendJoborderHeader(joborders){
    $('.joborderHeader').empty();
    var appendHeader = 
    `<div class="modal-title mt-2" id="moreInfoModalLabel"><b style="font-size: 16px;">Job Order # ${joborders[0].intJobOrderID}</b>
        <h3 class="mt-2" style="font-size: 14px;">${joborders[0].strCompanyName}</h3>
    </div>`;
    $(appendHeader).appendTo('.joborderHeader');
    $('.joborderHeader').addClass('animated fadeIn');
}

// Append Joborder Body
function appendJoborderBody(joborders,location){
    $('.joborderBody').empty();
    console.log(location);
    switch (joborders[0].enumServiceType) {
        case ('Tug Assist') :
            var appendBody =
            `<div class="row joborderDetailsContainer">
                <div class="col-6">
                    <ul class="list-inline">
                        <li class="list-inline-item text-primary">
                            <h6 style="font-size: 15.5px;">Service Type : </h6></li>
                        <li class="list-inline-item">
                            <h6 style="font-size: 15.5px;">
                                ${joborders[0].enumServiceType}
                            </h6>
                        </li>
                    </ul>
                    <ul class="list-inline">
                        <li class="list-inline-item text-primary">
                            <h6 style="font-size: 15.5px;">Date of Transaction : </h6></li>
                        <li class="list-inline-item">
                            <h6 style="font-size: 15.5px;">
                                ${moment(joborders[0].datStartDate).format('MMMM D, YYYY')} - ${moment(joborders[0].datEndDate).format('MMMM D, YYYY')}
                            </h6>
                        </li>
                    </ul>
                    <ul class="list-inline">
                        <li class="list-inline-item text-primary">
                            <h6 style="font-size: 15.5px;">Estimated Time of Hauling : </h6></li>
                        <li class="list-inline-item">
                            <h6 style="font-size: 15.5px;">
                            ${joborders[0].tmStart} HRS - ${joborders[0].tmEnd} HRS 
                            </h6>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="list-inline">
                        <li class="list-inline-item text-primary">
                            <h6 style="font-size: 15.5px;">Starting Location : </h6></li>
                        <li class="list-inline-item">
                            <h6 style="font-size: 15.5px;">${location[0].sLocation}</h6></li>
                    </ul>
                </div>
            </div>`;
            $(appendBody).appendTo('.joborderBody');
            $('.joborderBody').addClass('animated fadeIn');
        break;
        case ('Hauling') :
            var appendBody =
            `<div class="row joborderDetailsContainer">
                <div class="col-6">
                    <ul class="list-inline">
                        <li class="list-inline-item text-primary">
                            <h6 style="font-size: 15.5px;">Service Type : </h6></li>
                        <li class="list-inline-item">
                            <h6 style="font-size: 15.5px;">
                                ${joborders[0].enumServiceType}
                            </h6>
                        </li>
                    </ul>
                    <ul class="list-inline">
                        <li class="list-inline-item text-primary">
                            <h6 style="font-size: 15.5px;">Date of Transaction : </h6></li>
                        <li class="list-inline-item">
                            <h6 style="font-size: 15.5px;">
                                ${moment(joborders[0].datStartDate).format('MMMM D, YYYY')} - ${moment(joborders[0].datEndDate).format('MMMM D, YYYY')}
                            </h6>
                        </li>
                    </ul>
                    <ul class="list-inline">
                        <li class="list-inline-item text-primary">
                            <h6 style="font-size: 15.5px;">Estimated Time of Hauling : </h6></li>
                        <li class="list-inline-item">
                            <h6 style="font-size: 15.5px;">
                            ${joborders[0].tmStart} HRS - ${joborders[0].tmEnd} HRS 
                            </h6>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="list-inline">
                        <li class="list-inline-item text-primary">
                            <h6 style="font-size: 15.5px;">Starting Location : </h6></li>
                        <li class="list-inline-item">
                            <h6 style="font-size: 15.5px;">${location[0].sLocation}</h6></li>
                    </ul>
                    <ul class="list-inline">
                        <li class="list-inline-item text-primary">
                            <h6 style="font-size: 15.5px;">Destination : </h6></li>
                        <li class="list-inline-item">
                            <h6 style="font-size: 15.5px;">${location[0].dLocation}</h6></li>
                    </ul>
                    <ul class="list-inline">
                        <li class="list-inline-item text-primary">
                            <h6 style="font-size: 15.5px;">Goods to be delivered : </h6></li>
                        <li class="list-inline-item">
                            <h6 style="font-size: 15.5px;">${joborders[0].strGoodsName}</h6></li>
                    </ul>
                </div>
            </div>`;
            $(appendBody).appendTo('.joborderBody');
            $('.joborderBody').addClass('animated fadeIn');
        break;
    }
}

// Append Assigned Job Orders 

function appendAssignedJobOrders(joborders){
    console.log(joborders.length);
    $('.appendJobOrderContainer').empty();
    if(joborders.length == 0){
        console.log('hi');

    }else{
        console.log('greater than 1');

        for(var counter = 0; counter < joborders.length; counter++){
            appendJobOrder = 
            `
            <div class="col-6">
                <div class="card card-sm-2 card-primary border-primary">
                    <div class="card-icon">
                        <i class="ion ion-android-boat text-primary"></i>
                    </div>
                    <div class="card-header">
                        <h4 class="text-primary mb-2">Job Order # ${joborders[counter].intJobOrderID}</h4>
                    </div>
                    <div class="card-body">
                        <h5>${joborders[counter].strCompanyName}</h5>
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6 style="font-size: 14px;">Service Type : </h6></li>
                                    <li class="list-inline-item">
                                        <h6 style="font-size: 14px;">
                                            ${joborders[counter].enumServiceType}
                                        </h6>
                                    </li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6 style="font-size: 14px;">Date of Transaction : </h6></li>
                                    <li class="list-inline-item">
                                        <h6 style="font-size: 14px;">
                                            ${moment(joborders[counter].datStartDate).format('MMMM D, YYYY')} - ${moment(joborders[counter].datEndDate).format('MMMM D, YYYY')}
                                        </h6>
                                    </li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6 style="font-size: 14px;">Estimated Time of Hauling : </h6></li>
                                    <li class="list-inline-item">
                                        <h6 style="font-size: 14px;">
                                        ${joborders[counter].tmStart} HRS - ${joborders[counter].tmEnd} HRS 
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <div>`;
            
            $(appendJobOrder).appendTo('.appendJobOrderContainer');
        }
    }
}

function appendTugboatTeamDefaults(jobsched){
    console.log(jobsched);
    $('.defaultTeamsContainer').empty();
    for(var counter = 0; counter < jobsched.length; counter++){
        switch(jobsched[counter].intTeamID == null){
            case (true) :
                console.log('no team');
                var appendDefaultTeam = 
                `<div class="row">
                    <div class="col-12">
                
                        <div class="row">
                            <div class=" text-primary col-5">
                                <h6 style="font-size: 14px;">${jobsched[counter].strName} : 
                                </h6>
                            </div>
                            <div class=" col-7">
                                <h6 style="font-size: 14px;">
                                    No Default Team for this Tugboat
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>`;
                $(appendDefaultTeam).appendTo('.defaultTeamsContainer');
            break;

            case (false) :
                console.log('eyy');
                var appendDefaultTeam = 
                `<div class="row">
                    <div class="col-12">
                        <ul class="list-inline">
                            <li class="list-inline-item text-primary">
                                <h6 style="font-size: 14px;">${jobsched[counter].strName} : </h6></li>
                            <li class="list-inline-item">
                                <a href="#" class="viewDefaultTeam text-black" data-id="${jobsched[counter].intTeamID}" data-tooltip="tooltip" title="View Team Composition">
                                    <h6 style="font-size: 14px;">
                                            ${jobsched[counter].strTeamName}
                                    </h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>`;
                $(appendDefaultTeam).appendTo('.defaultTeamsContainer');
            break;
        }
    }
}

function appendJoborderTeams(jobsched,teams){
    console.log(teams[1].length);
    // return false;
    $('.availableTeams').empty();
    for(var counter = 0; counter < jobsched.length;counter++){
        console.log(jobsched[counter].intJobSchedID);
        console.log(jobsched[counter].strName);
        var appendTugboatName = 
        `
        <div class="row tugboatTeam${jobsched[counter].intJobSchedID}">
            <div class="col-12 col-sm-12 col-lg-6">
                <div class="form-group">
                    <label for="tugboatName${jobsched[counter].intJobSchedID}">Assigned Tugboat # ${counter + 1}</sup></label>
                    <div class="input-group mb-3">
                        <input type="text" class="jobschedTugboats form-control" data-id="${jobsched[counter].intJobSchedID}" id="tugboatName${jobsched[counter].intJobSchedID}" name="tugboatName[]" placeholder="${jobsched[counter].strName}" readonly>
                    </div>
                </div>
            </div>
        </div>`;
        $(appendTugboatName).appendTo('.availableTeams');

        var appendSelectTeam = 
        `<div class="col-12 col-sm-12 col-lg-6">
            <div class="form-group">
                <label for="addTeamSelect">Select Team # ${counter + 1}</sup></label>
                <select id="addTeamSelect" style="background-color:transparent !important;" name="addTeam[]" class="addTeamSelect${counter + 1} teamAssignmentSelect form-control form-control input-lg wide">
                </select> 
            </div>
        </div>`;
        $(appendSelectTeam).appendTo(`.tugboatTeam${jobsched[counter].intJobSchedID}`);

       for(var count =0; count < teams[1].length; count++){
           console.log(teams[1][count].strTeamName);
           var appendTeamOption = 
           `<option value="${teams[1][count].intTeamID}" data-subtext="Available">${teams[1][count].strTeamName}</option>`;
           $(appendTeamOption).appendTo(`.addTeamSelect${counter + 1}`);
       }
    }
}