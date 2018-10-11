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
    var appendHeader = 
    `<div class="modal-title mt-2" id="moreInfoModalLabel"><b style="font-size: 16px;">Job Order # ${joborders[0].intJobOrderID}</b>
        <h3 class="mt-2" style="font-size: 14px;">${joborders[0].strCompanyName}</h3>
    </div>`;
    $(appendHeader).appendTo('.joborderHeader');
}

// Append Joborder Body
function appendJoborderBody(joborders,location){
    console.log(location);
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
}