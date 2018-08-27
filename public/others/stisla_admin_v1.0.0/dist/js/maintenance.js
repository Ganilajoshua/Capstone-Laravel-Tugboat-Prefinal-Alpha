$(document).ready(function(){
    jQuery('.mainTable').DataTable({
        responsive : true,
    });

    jQuery('[data-toggle="tooltip"]').tooltip({
        placement:'top'
    });
    
    $('#editLayout').css('display', 'none');
    $('#addLayout').css('display', 'none');
    $('#detLayout').css('display','block');
    
    //Add Button ClickEvent
    $('#addButton').click(function(){
        $('#addLayout').css('display', 'block');
        $('#detLayout').css('display', 'none');
    });
    //Edit Button Click Event
    $('#editButton').click(function(){
        $('#editLayout').css('display', 'block');
        $('#detLayout').css('display', 'none');
        $('#detLayout').css('display','none');
    });
    //Add Button Back
    $('#backButton').click(function(){
        $('#editLayout').css('display', 'none');
        $('#detLayout').css('display', 'block');
        $('#addLayout').css('display','none');
    });
    //Edit Button Back
    $('#backButtonEdit').click(function(){
        $('#editLayout').css('display', 'none');
        $('#detLayout').css('display', 'block');
        $('#addLayout').css('display','none');
    });
});