// Job Orders

// Get Service Type 
function getServiceType(joborders){
    console.log('Joborders',joborders);
    console.log(joborders[0].enumServiceType);

    switch(joborders[0].enumServiceType){
        case 'Hauling':
            var location = getLocation(joborders);
            appendHeaderHA(joborders);
            appendBodyHA(joborders,location);
        break;

        case 'Tug Assist':
            console.log('Tug Assist');
            appendHeaderTA(joborders);
            appendBodyTA(joborders);
        break;
    }
}

function getLocation(joborders){
    console.log(joborders);

    var sLocation ;
    var dLocation ;

    if((joborders[0].intJOBerthID) == null){
        console.log('Empty Berth');
        console.log('eeeey');
        sLocation = joborders[0].strJOStartPoint;
        dLocation = joborders[0].strJODestination;
    }
    else if((joborders[0].strJOStartPoint) == null){
        console.log('Empty Start Point');
        console.log(joborders[0].strJOStartPoint);
        sLocation = `${joborders[0].strPierName} - ${joborders[0].strBerthName}`;
        dLocation = joborders[0].strJODestination;
    }
    else if((joborders[0].strJODestination) == null){
        console.log('Empty End Point');
        console.log('akkkk');
        sLocation = joborders[0].strJOStartPoint;
        dLocation = `${joborders[0].strPierName} - ${joborders[0].strBerthName}`;
    }
    var locations = [{
        sLocation,
        dLocation
    }];

    return locations;
}

// Append Header To Job Order Card Tug-Assist
function appendHeaderTA(joborders){

    console.log('Tug Assist Header');

    var appendHeader = 
    `<div class="modal-title" id="moreInfoModalLabel">Job Order #&nbsp ${joborders[0].intJobOrderID} 
        <h4>${joborders[0].strCompanyName}</h4>
    </div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>`;
    $(appendHeader).appendTo('.joborderheader');
}

// Append Body To Job Order Card Tug-Assist
function appendBodyTA(joborders){

    console.log('Tug Assist Body');

    var appendBody = 
    `<div class="row mt-2">
        <div class="col-6">
            <ul class="list-inline">
                <li class="list-inline-item text-primary">
                    <h6>Service Type :&nbsp;</h6></li>
                <li class="list-inline-item">
                    <h6> ${joborders[0].enumServiceType}</h6>
                </li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item text-primary">
                    <h6>Date of Transaction : </h6></li>
                <li class="list-inline-item">
                    <h6> ${joborders[0].datStartDate} - ${joborders[0].datEndDate} </h6></li>
            </ul>
        </div>
        <div class="col-6">
            <ul class="list-inline">
                <li class="list-inline-item text-primary">
                    <h6>Estimated Time of Berthing & Unberthing : </h6></li>
                <li class="list-inline-item">
                    <h6>0730 HRS</h6></li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item text-primary">
                    <h6>Pier Location : </h6></li>
                <li class="list-inline-item">
                    <h6>${joborders[0].strPierName} - ${joborders[0].strBerthName}</h6></li>
            </ul>
        </div>
        <div class="col-6">
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-2 text-center">
            <div class="text-primary mb-2">
                <h4>Extra Details</h4></div>
            <div class="border-primary">
                <div class="mr-2 ml-2 mt-2 mb-2">
                    <p>
                        ${joborders[0].strJODesc}
                    </p>
                </div>
            </div>
        </div>
    </div>`;
    $(appendBody).appendTo('.joborderinfo');
}

// Append Header to Job Order Card Hauling
function appendHeaderHA(joborders){
    console.log('Hauling Header');

    var appendHeader = 
    `<div class="modal-title" id="moreInfoModalLabel">Job Order #&nbsp ${joborders[0].intJobOrderID}; 
        <h4>${joborders[0].strCompanyName}</h4>
    </div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>`;
    $(appendHeader).appendTo('.joborderheader');
}

// Append Body To Job Order Card Hauling 
function appendBodyHA(joborders,location){

    console.log('Hauling Body');
    var appendBody = 
    `<div class="row mt-2">
        <div class="col-6">
            <ul class="list-inline">
                <li class="list-inline-item text-primary">
                    <h6>Service Type :&nbsp;</h6></li>
                <li class="list-inline-item">
                    <h6> ${joborders[0].enumServiceType}</h6>
                </li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item text-primary">
                    <h6>Date of Transaction : </h6></li>
                <li class="list-inline-item">
                    <h6> ${moment(joborders[0].datStartDate).format('MMM D, YYYY')} - ${moment(joborders[0].datEndDate).format('MMM D, YYYY')}</h6></li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item text-primary">
                    <h6>Estimated Time of Hauling : </h6></li>
                <li class="list-inline-item">
                    <h6> ${joborders[0].tmStart} - ${joborders[0].tmEnd} HRS</h6></li>
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
    </div>
    <div class="row">
        <div class="col-12 mt-2 text-center">
            <div class="text-primary mb-2">
                <h4>Extra Details</h4></div>
            <div class="border-primary">
                <div class="mr-2 ml-2 mt-2 mb-2">
                    <p>
                        ${joborders[0].strJODesc}
                    </p>
                </div>
            </div>
        </div>
    </div>`;
    $(appendBody).appendTo('.joborderinfo');
}
