$(document).ready(function() {
    // Initialize Tooltip
    $('[data-toggle="tooltip"]').tooltip({
        placement:'top'
    });

    // //Initialize Date Picker for Last Dry Docked
    // $('#editLastDryDocked').datepicker({
    //     format: 'yyyy-dd-mm',
    //     uiLibrary: 'bootstrap4',
    //     iconsLibrary: 'fontawesome'
    // });
    // var editlddpicker= $('#editLastDryDocked').datepicker();
    
    // //Initialize Date Picker for Date Built
    // $('#editDateBuilt').datepicker({
    //     format: 'yyyy-dd-mm',
    //     uiLibrary: 'bootstrap4',
    //     iconsLibrary: 'fontawesome'
    // });
    // var editldbpicker= $('#editDateBuilt').datepicker();

    // //Initialize Date Picker for License Expiration Date
    // $('#editLicenseExpDate').datepicker({
    //     format: 'yyyy-dd-mm',
    //     uiLibrary: 'bootstrap4',
    //     iconsLibrary: 'fontawesome'
    // });
    // var editlcxppicker= $('#editLicenseExpDate').datepicker();


    //Append another field for insurance
    var EditctrAdd = 2;
    var EditTClassCtr = 1;
    $("#btnEditInsuranceAdd").click(function () {
        
    if(EditctrAdd>4 && EditTClassCtr > 3){
        swal({
            title: "Only 3 Additional Insurance Fields are allowed",
            type: "info",
            showCancelButton: false,
            confirmButtonClass: "btn-primary",
            confirmButtonText: "Ok",
            closeOnConfirm: false
        });
            return false;
    }   
        
    var txtTbInsurance = $(document.createElement('div'))
        .attr("id", 'TextBoxDiv' + EditctrAdd);
    txtTbInsurance.after().html('<label>Insurance #'+ EditctrAdd + ' </label>' +
        '<input class="form-control" type="text" name="editInsurance[]'+ EditctrAdd +'"  placeholder="Tugboat Insurance # ' + EditctrAdd + 
        '" id="editInsurance' + EditctrAdd + '" value="" >');
            
    txtTbInsurance.appendTo('#editTClassInsurance' + EditTClassCtr);

        EditTClassCtr++;	
        EditctrAdd++;
    });

    ////////////////////////////////////////////

    // Sweet Alerts 
    $('#btnEditgoBack').click(function(s) {
        s.preventDefault();
        swal({
            title: "You haven't saved your changes",
            text: "Are you sure you want to go back?",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        },
        function(){
            window.location = '/tugboat';
        });
    });
    $('#btnEItemPics').click(function(s) {
        s.preventDefault();
        swal({
            title: "Changes won't be undone.",
            text: "Save changes?",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-primary",
            confirmButtonText: "Confirm",
            closeOnConfirm: false
        },
        function(){
            swal("Updated!", "Energy Sun's Pictures has been updated.", "success");
        });
    });
    $('#btnEmInfoSubmit').click(function(s) {
        s.preventDefault();
        swal({
            title: "Changes won't be undone.",
            text: "Save changes?",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-primary",
            confirmButtonText: "Confirm",
            closeOnConfirm: false
        },
        function(){
            swal("Updated!", "Energy Sun's Main Information has been updated.", "success");
        });
    });
    $(document).ready(function() {
        $('#btnETSpecSubmit').click(function(s) {
            s.preventDefault();
            swal({
                title: "Changes won't be undone.",
                text: "Save changes?",
                type: "info",
                showCancelButton: true,
                confirmButtonClass: "btn-primary",
                confirmButtonText: "Confirm",
                closeOnConfirm: false
            },
            function(){
                swal("Updated!", "Energy Sun's Tugboat Specification has been updated.", "success");
            });
        });
    });
    $('#btnETClassSubmit').click(function(s) {
        s.preventDefault();
        swal({
            title: "Changes won't be undone.",
            text: "Save changes?",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-primary",
            confirmButtonText: "Confirm",
            closeOnConfirm: false
        },
        function(){
            swal("Updated!", "Energy Sun's Tugboat Classication has been updated.", "success");
        });
    });

    ///////////////////////////////////

   // Prepare the preview for profile picture
   $("#editFirstPic").change(function(){
    editfPictureUpload(this);
    });

    $("#editSecPic").change(function(){
        editsPictureUpload(this);
    });

    $("#editThirdPic").change(function(){
        edittPictureUpload(this);
    });

});
    // Get Image Name 
    $('#editFirstPic').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("editFirstFileChosen").innerHTML = fileName;
    });
    $('#editSecPic').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("editSecFileChosen").innerHTML = fileName;
    });
    $('#editThirdPic').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("editThirdFileChosen").innerHTML = fileName;
    });

//Function to show image before upload
function editfPictureUpload(input) {
    if (input.files && input.files[0]) {
        var editfPicReader = new FileReader();

        editfPicReader.onload = function (e) {
            $('#editfPic').attr('src', e.target.result).fadeIn('slow');
        }
        editfPicReader.readAsDataURL(input.files[0]);
    }
}
function editsPictureUpload(input) {
    if (input.files && input.files[0]) {
        var editsPicReader = new FileReader();

        editsPicReader.onload = function (e) {
            $('#editsPic').attr('src', e.target.result).fadeIn('slow');
        }
        editsPicReader.readAsDataURL(input.files[0]);
    }
}
function edittPictureUpload(input) {
    if (input.files && input.files[0]) {
        var edittPicReader = new FileReader();

        edittPicReader.onload = function (e) {
            $('#edittPic').attr('src', e.target.result).fadeIn('slow');
        }
        edittPicReader.readAsDataURL(input.files[0]);
    }
}