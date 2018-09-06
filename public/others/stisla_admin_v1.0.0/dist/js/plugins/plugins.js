$(document).ready(function(){
    setInterval(clock, 1000);
});

function clock() {
    $('.clock').html(moment().format('dddd - MMMM D, YYYY h:mm:ss A'));
}