$(document).ready(function(){
    $('.step2').css('cursor','not-allowed');
    $('#dtiPermit').css('cursor','pointer');

    $('.btnNext,.step2').on('click',function(){
        $('.step1').removeClass('active');
        $('.step2').addClass('active');
        $('.step2').css('cursor','pointer');
        $('.step2').attr('disabled',false);
        $('.companyDet').hide();
        $('.accountDet').show();
    });

    $('.btnBack,.step1').on('click',function(){
        $('.step2').removeClass('active');
        $('.step1').addClass('active');
        $('.step1').css('cursor','pointer');
        $('.step1').attr('disabled',false);
        $('.accountDet').hide();
        $('.companyDet').show();
    });

    $("#dtiPermit").change(function(){
        uploadDTIPermit(this);
      });
      // Get Image Name 
      $('#dtiPermit').change(function(e){
          var fileName = e.target.files[0].name;
          $('#dtiPermitLabel').text(fileName);
      });
    
});
var _validFileExtensions = [".jpg", ".jpeg", ".png"];    
function ValidateSingleInput(oInput) {
if (oInput.type == "file") {
  var sFileName = oInput.files[0].name; ;
    if (sFileName.length > 0) {
      var blnValid = false;
      for (var j = 0; j < _validFileExtensions.length; j++) {
        var sCurExtension = _validFileExtensions[j];
        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
            blnValid = true;
            break;
        }
      }
      
      if (!blnValid) {
        swal({
          title: "Invalid File Extension!",
          text:"Sorry, " + sFileName + " is invalid. \n Allowed extensions are: " + _validFileExtensions.join(", "),
          type: "error",
          showCancelButton: false,
          confirmButtonClass: "btn-danger waves-effect",
          confirmButtonText: "Ok",
          closeOnConfirm: false
        });
          oInput.value = "";
          return false;
      }
  }
}
  return true;
}
function uploadDTIPermit(input) {
    if (input.files && input.files[0]) {
        var dtiPermitReader = new FileReader();
  
        dtiPermitReader.onload = function (e) {
            $('#dtiPermitPic').attr('src', e.target.result).fadeIn('slow');
        }
        dtiPermitReader.readAsDataURL(input.files[0]);
    }
  }