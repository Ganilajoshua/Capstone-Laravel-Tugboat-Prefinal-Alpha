console.log('nye');

function validateForm() {
    var x = document.forms["form"]["email"].value;
    if (x == "") {
        $(".emptyfield").remove();
        $("#valmail").append(" <p class='emptyfield'>Empty Field</p>");
        return false;
    }

}