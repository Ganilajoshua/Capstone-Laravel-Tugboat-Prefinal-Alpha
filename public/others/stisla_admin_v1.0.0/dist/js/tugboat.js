$(document).unbind("keypress.key37");
$(document).unbind("keypress.key39");

$(document).ready(function() {
    $(document).unbind("keypress.key37");
    $(document).unbind("keypress.key39");

    $('#maintenanceTree').addClass("active");
    $('#tugboatMenu').addClass("active");
    $(document).unbind("keypress.key37");
    $(document).unbind("keypress.key39");

    // Data Table
    jQuery('#detailedTable').DataTable({
        columnDefs: [
            { targets: 'noSortAction', orderable: true }
          ],
        responsive: true
    });
    // Carousel Change Image Speed
    jQuery(function(){
        jQuery('.carousel').carousel({
            interval: 1800
        });
    });

    // Tooltip
    jQuery('[data-toggle="tooltip"]').tooltip({
        placement:'top'
    });

    // Change Sort Text
    $('#sortName').click(function() {
        document.getElementById("sortDdown").innerHTML = "Name";
        $('#sortName').addClass('active');
        $('#sortHP').removeClass('active');
    });
    $('#sortHP').click(function() {
        document.getElementById("sortDdown").innerHTML = "Horse Power";
        $('#sortHP').addClass('active');
        $('#sortName').removeClass('active');
    });

    // Change to Data Table View
    $('#detView').click(function(e) {
    
        $('#cardView').removeClass('active');
        $('#detView').addClass('active');
        $('#detLayout').css('display', 'block');
        $('#editLayout').css('display', 'none');
        $('#cardLayout').css('display', 'none');
        $('#searchBar').css('display', 'none');
        $('#sortSelect').css('display', 'none');
    });
    // Change to Card View
    $('#cardView').click(function(g) {
    
        $('#detView').removeClass('active');
        $('#cardView').addClass('active');
        $('#cardLayout').css('display', 'block');
        $('#editLayout').css('display', 'none');
        $('#searchBar').css('display', 'block');
        $('#detLayout').css('display', 'none');
        $('#sortSelect').css('display', 'block');
    });
    // Open Edit from Card
    $('#editCard').click(function(e) {
    
        $('#cardView').removeClass('active');
        $('#detView').addClass('active');
        $('#editLayout').css('display', 'block');
        $('#cardLayout').css('display', 'none');
        $('#detLayout').css('display', 'none');
        $('#searchBar').css('display', 'none');
        $('#selectViews').css('display', 'none');
    });
    // Open Edit from Modal
    $('#modalEdit').click(function(e) {
    
        $('#cardView').removeClass('active');
        $('#detView').addClass('active');
        $('#infoModal').modal('toggle');
        $('#editLayout').css('display', 'block');
        $('#cardLayout').css('display', 'none');
        $('#detLayout').css('display', 'none');
        $('#searchBar').css('display', 'none');
        $('#selectViews').css('display', 'none');
    });
    // Open Edit from Data Table
    $('#detEdit').click(function() {
        $('#editLayout').css('display', 'block');
        $('#cardLayout').css('display', 'none');
        $('#detLayout').css('display', 'none');
        $('#searchBar').css('display', 'none');
        $('#selectViews').css('display', 'none');
    });
    // Close Modal
    $('#closeModal').click(function() {
        $('#infoModal').modal('hide');
    });
    
    $('#addCard').click(function(e) { 
    
        console.log('start here');
        var classID = parseInt($('#classID').val());
        var mainID = parseInt($('#mainID').val());
        var specsID = parseInt($('#specsID').val());
        var tugboatID = parseInt($('#tugboatsID').val());
        console.log('Class ID : ', classID ,'incremented ID : ', classID+1);
        console.log('Main ID : ', mainID ,'incremented ID : ', mainID+1 );
        console.log('Specs ID : ', specsID ,'incremented ID : ', specsID+1);
        console.log('Tugboat ID : ', tugboatID ,'incremented ID : ', tugboatID+1);
        
        classID = classID + 1;
        mainID = mainID + 1;
        specsID = specsID + 1;
        tugboatID = tugboatID + 1;
        
        console.log(classID , mainID , specsID , tugboatID);
        $('#addLayout').css('display', 'block');
        $('#editLayout').css('display', 'none');
        $('#cardLayout').css('display', 'none');
        $('#detLayout').css('display', 'none');
        $('#selectViews').css('display', 'none');
    });
    $('#delDet').click(function(s) {
    
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover Energy Sun.",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){
            swal("Deleted!", "Energy Sun has been deleted.", "success");
        });
    });
    $('#delCard').click(function(q) {
    
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover Energy Sun.",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){
            swal("Deleted!", "Energy Sun has been deleted.", "success");
        });
    });
});