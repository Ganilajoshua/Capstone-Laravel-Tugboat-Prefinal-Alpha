var url = '/administrator/transactions/dispatchandhauling/teamassignment';

function appendTeamComposition(positions){
    console.log(positions);
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