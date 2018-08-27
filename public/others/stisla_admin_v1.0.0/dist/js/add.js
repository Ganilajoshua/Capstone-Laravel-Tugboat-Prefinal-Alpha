$(document).ready(function() {
    // Initialize Tooltip
    $('[data-toggle="tooltip"]').tooltip({
        placement:'top'
    });

    // // Initialize Date Picker for Last Dry Docked
    
    // $('#AddLastDryDocked').datepicker({
    //     format: 'yyyy-dd-mm',
    //     uiLibrary: 'bootstrap4',
    //     iconsLibrary: 'fontawesome'
    // });
    // var addlddpicker= $('#AddLastDryDocked').datepicker();

    // // Initialize Date Picker for Date Built
    // $('#AddDateBuilt').datepicker({
    //     format: 'yyyy-dd-mm',
    //     uiLibrary: 'bootstrap4',
    //     iconsLibrary: 'fontawesome'
    // });
    // var addldbpicker= $('#AddDateBuilt').datepicker();

    // // Initialize Date Picker for License Expiration Date
    // $('#AddLicenseExpDate').datepicker({
    //     format: 'yyyy-dd-mm',
    //     uiLibrary: 'bootstrap4',
    //     iconsLibrary: 'fontawesome'
    // });
    // var addlcxppicker= $('#AddLicenseExpDate').datepicker();

    // Custom Dropdown
    // var dropdown = $('#AddFlag').dropdown({
    //     uiLibrary: 'bootstrap4',
    //     iconsLibrary: 'fontawesome',
    //     valueField: 'id'
    // });

    // Go to Add View
    //$('#addCard').click(function() {
        
    //});
    // Append another field for insurance
        var AddctrAdd = 2;
        var AddtClassCtr = 1;
    $("#btnAddInsuranceAdd").click(function () {
		
	if(AddctrAdd>4 && AddtClassCtr > 3){
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
	     .attr("id", 'TextBoxDiv' + AddctrAdd);
	txtTbInsurance.after().html('<label>Insurance #'+ AddctrAdd + ' </label>' +
	      '<input class="form-control" type="text" name="AddInsurance[]"  placeholder="Tugboat Insurance # ' + AddctrAdd + 
	      '" id="AddInsurance' + AddctrAdd + '" value="" >');
            
	txtTbInsurance.appendTo('#AddTClassInsurance' + AddtClassCtr);

        AddtClassCtr++;	
        AddctrAdd++;
    });
    // Go back
    $('#btnAddgoBack').click(function(s) {
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
            
            //$('#cardView').addClass('active');
            //$('#addLayout').css('display', 'none');
            //$('#cardLayout').css('display', 'block');
            //$('#editLayout').css('display', 'none');
            //$('#cardLayout').css('display', 'block');
            //$('#detLayout').css('display', 'none');
            //$('#searchBar').css('display', 'none');
            //$('#selectViews').css('display', 'block');
            window.location = "/tugboat";
        });
    });
    // Prepare the preview for profile picture
    $("#AddfirstPic").change(function(){
        addfPictureUpload(this);
    });

    $("#AddsecPic").change(function(){
        addsPictureUpload(this);
    });

    $("#AddthirdPic").change(function(){
        addtPictureUpload(this);
    });

    // Get Image Name 
    $('#AddfirstPic').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("AddfirstFileChosen").innerHTML = fileName;
    });
    $('#AddsecPic').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("AddsecFileChosen").innerHTML = fileName;
    });
    $('#AddthirdPic').change(function(e){
        var fileName = e.target.files[0].name;
        document.getElementById("AddthirdFileChosen").innerHTML = fileName;
    });

    //Main Info Form Validation

    // bootstrapValidate('#AddName', 'min:8:Enter atleast 8 characters!|max:20:Do not enter more than 20 characters!|alpha: You can only input alpabhetic characters!');
    // bootstrapValidate(['#AddLength','#AddBreadth','#AddDepth','#AddHorsePower','#AddMaxSpeed','#AddBollardPull','#AddGTonnage','#AddNTonnage','#AddIMONum'],'numeric: You can only input numeric characters!');
    // bootstrapValidate(['#AddCyl','#AddCircle'],'integer: You can only input integers!');
    // bootstrapValidate('#AddBuilder','alpha: You can only input alphabetic characters!');
    // bootstrapValidate('#AddBuilder','alpha: You can only input alphabetic characters!');
    // bootstrapValidate(['#AddLastDryDocked','#AddLicenseExpDate','#AddDateBuilt'], 'ISO8601:Invalid Input! YYYY-MM-DD format must be used.');
});

  
      

 //Function to show image before upload
    function addfPictureUpload(input) {
        if (input.files && input.files[0]) {
            var addfPicReader = new FileReader();

            addfPicReader.onload = function (e) {
                $('#AddfPic').attr('src', e.target.result).fadeIn('slow');
            }
            addfPicReader.readAsDataURL(input.files[0]);
        }
    }
    function addsPictureUpload(input) {
        if (input.files && input.files[0]) {
            var addsPicReader = new FileReader();

            addsPicReader.onload = function (e) {
                $('#AddsPic').attr('src', e.target.result).fadeIn('slow');
            }
            addsPicReader.readAsDataURL(input.files[0]);
        }
    }
    function addtPictureUpload(input) {
        if (input.files && input.files[0]) {
            var addtPicReader = new FileReader();

            addtPicReader.onload = function (e) {
                $('#AddtPic').attr('src', e.target.result).fadeIn('slow');
            }
            addtPicReader.readAsDataURL(input.files[0]);
        }
    }