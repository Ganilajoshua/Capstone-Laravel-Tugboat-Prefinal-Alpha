$(document).ready(function(){
    // $('select').niceSelect();
    $('#AddType').niceSelect();
    $('#editType').niceSelect();
    $('#editLastDryDocked').datepicker();
    $('#AddLastDryDocked').datepicker();
    //Initialize Date Picker for Date Built
    $('#editDateBuilt').datepicker();
    $('#AddDateBuilt').datepicker();
    //Initialize Date Picker for License Expiration Date
    $('#editLicenseExpDate').datepicker();
    $('#AddLicenseExpDate').datepicker();
    // Country Picker
    // $("#country").countrySelect();

    // $(".niceCountryInputSelector").each(function(af,e){
    //     new NiceCountryInput(e).init(af);
    //     // console.log(i);
    //     console.log();
    // });
    // var country = 'PH';
    // onChangeCallback(country);
    $('.tugboatInfoModal').css('max-width','68%');
});

function onChangeCallback(ctr){
    console.log("The country was changed: " + ctr);
    // console.log(i);
    //$("#selectionSpan").text(ctr);
    console.log(ctr);
    
    $('#hideFlag').val(ctr);
}
    