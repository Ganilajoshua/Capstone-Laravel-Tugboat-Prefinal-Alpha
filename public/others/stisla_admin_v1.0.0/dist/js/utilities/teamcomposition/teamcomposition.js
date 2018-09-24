$(document).ready(function(){
    console.log(JSON.parse($('#teamComposition').val()));
    var json = JSON.parse($('#teamComposition').val());

    console.log(json.length);
    for(var counter=0; counter < json.length; counter++){
        console.log(json[counter]);
        if(json[counter].strPositionName != 'Captain' || json[counter].strPositionName != 'Chief Engineer' || json[counter].strPositionName != 'Crew'){
            console.log(( (json[counter].strPositionName).charAt(0) ).toUpperCase());
            $(`.position${json[counter].intPositionID}`).html(( (json[counter].strPositionName).charAt(0) ).toUpperCase());
            break;
        }
    }
});