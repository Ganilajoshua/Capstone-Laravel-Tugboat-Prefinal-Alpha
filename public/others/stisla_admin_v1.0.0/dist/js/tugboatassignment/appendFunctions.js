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
}

// Append Joborder Body
function appendJoborderBody(joborders,location){
    $('.joborderBody').empty();
    console.log(location);
    if(joborders[0].enumServiceType == 'Tug Assist'){
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
                        <h6 style="font-size: 15.5px;">Location : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">${location[0].sLocation}</h6></li>
                </ul>
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Total Weight : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">${joborders[0].fltWeight} Tons</h6></li>
                </ul>
            </div>
        </div>`;
        $(appendBody).appendTo('.joborderBody');

    }
    else if(joborders[0].enumServiceType == 'Hauling'){
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
                <ul class="list-inline">
                    <li class="list-inline-item text-primary">
                        <h6 style="font-size: 15.5px;">Total Weight : </h6></li>
                    <li class="list-inline-item">
                        <h6 style="font-size: 15.5px;">${joborders[0].fltWeight} Tons</h6></li>
                </ul>
            </div>
        </div>`;
        $(appendBody).appendTo('.joborderBody');
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