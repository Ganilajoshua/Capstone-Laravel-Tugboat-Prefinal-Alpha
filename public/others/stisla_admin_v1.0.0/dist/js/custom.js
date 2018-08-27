$(document).ready(function(){

// Smart Wizard

  // Step show event
  $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
    //alert("You are on step "+stepNumber+" now");
    if(stepPosition === 'first'){
        $("#prev-btn").addClass('disabled');
    }else if(stepPosition === 'final'){
        $("#next-btn").addClass('disabled'); 
    }else{
        $("#prev-btn").removeClass('disabled');
        $("#next-btn").removeClass('disabled');
    }
    if($('button.sw-btn-next').hasClass('disabled')){
      $('.sw-btn-group-extra').show();
      }else{
      $('.sw-btn-group-extra').hide();
      }
  });

  // Toolbar extra buttons
  var btnViewSummary = $('<button class="btn btn-primary" >View Summary</button>')
    .click(function(){
      var cyl = 'cylinder';
        var cyc = 'cycle';
        //Main Information
        var name = document.getElementById('AddName').value;
        var length = document.getElementById('AddLength').value;
        var breadth  = document.getElementById('AddBreadth').value;
        var depth = document.getElementById('AddDepth').value;
        var hp = document.getElementById('AddHorsePower').value;
        var maxspeed = document.getElementById('AddMaxSpeed').value;
        var bpull = document.getElementById('AddBollardPull').value;
        var gton = document.getElementById('AddGTonnage').value;
        var nton = document.getElementById('AddNTonnage').value;
        var drydocked = document.getElementById('AddLastDryDocked').value;
        var licensenum = document.getElementById('AddLicenseNum').value;
        var licenseexp = document.getElementById('AddLicenseExpDate').value;

        //Tugboat Specifications
        var locbuilt = document.getElementById('AddLocBuilt').value;
        var datebuilt = document.getElementById('AddDateBuilt').value;
        var builder = document.getElementById('AddBuilder').value;
        var makerpower = document.getElementById('AddMakerPower').value;
        var hullmaterial = document.getElementById('AddHullMaterial').value;
        var drive = document.getElementById('AddDrive').value;
        var cylinder = document.getElementById('AddCylinder').value;
        var cycle = document.getElementById('AddCycle').value;
        var auxengine = document.getElementById('AddAuxEngine').value;
         
        //Tugboat Class

        var classnum = document.getElementById('AddClassNum').value;
        var officialnum = document.getElementById('AddOfficialNum').value;
        var imonum = document.getElementById('AddIMONum').value;
        var flag2 = $('#AddFlag').val();
        console.log($("input[name='countryselector']").val());
        console.log('flag ?: ',flag2);
        var flag = document.getElementById('hideFlag').value;
        var type = document.getElementById('AddType').value;
        var tarea = document.getElementById('AddTradingArea').value;
        var type2 = $('#AddType :selected').text();
        var home = document.getElementById('AddHomePort').value;

        var ispscomp = $('input[name=addISPSCompliance]:checked').val();
        var ismsstandard = $('input[name=addCStandard]:checked').val();
        var insurances = document.getElementById('AddInsurance1').value;
        var bobo =  document.getElementsByName('AddInsurance[]');
        var insurancesvalues = [];
        $("input[name='AddInsurance[]']").each(function(insurances){
          insurancesvalues[insurances] = $(this).val();
          insurances++;
          
        })
        // console.log('ITO BA HANAP MO');  
        // console.log($(this).val());
        console.log(insurancesvalues);
        console.log(name,length, breadth, depth, hp, maxspeed, bpull, gton, nton, drydocked);
        console.log(locbuilt, datebuilt, builder, makerpower, hullmaterial, drive, cylinder, cycle, auxengine);
        console.log('ISPS:  ' + ispscomp + '  ISM:  ' + ismsstandard);
        console.log('ITO YUNG HINAHANAP MO');
        console.log('tugboat type : ',type , type2);
        console.log($('#hideFlag').val());
        $('#viewSummaryLabel').html(name);

        $('#sumName').html(name);$('#sumLength').html(length);
        $('#sumBreadth').html(breadth);$('#sumDepth').html(depth);
        $('#sumHorsePower').html(hp);$('#sumMaxSpeed').html(maxspeed);
        $('#sumBollardPull').html(bpull);$('#sumGrossTonnage').html(gton);
        $('#sumNetTonnage').html(nton);$('#sumDryDocked').html(drydocked);
        $('#sumLicenseNum').html(licensenum);$('#sumLicenseExp').html(licenseexp);

        $('#sumBuilt').html(locbuilt);$('#sumDateBuilt').html(datebuilt);
        $('#sumMakerPower').html(makerpower);
        $('#sumBuilder').html(builder);$('#sumHullMaterial').html(hullmaterial);
        $('#sumDrive').html(drive);
        $('#sumCylCycle').html(cylinder +' '+ cyl +'<br>'+ cycle +' per '+ cyc);
        $('#sumCylinder').val(cylinder);
        $('#sumCycle').val(cycle);
        $('#sumAuxEngine').html(auxengine);

        $('#sumClassNum').html(classnum);
        $('#sumOffNum').html(officialnum);
        $('#sumIMONum').html(imonum);
        $('#sumFlag').html(flag);
        $('#sumType').html(type2);
        $('#sumTradingArea').html(tarea);
        $('#sumHomeport').html(home);
        $('#sumISPS').html(ispscomp);
        $('#sumISMCode').html(ismsstandard);
        $('#sumInsurances').empty();
        for(var counter = 0; counter < insurancesvalues.length; counter++){
          appendFields = "<p> #"+(counter+1)+ "&nbsp;" + insurancesvalues[counter]+"</p>";
          $(appendFields).appendTo('#sumInsurances');
        }
        console.log(insurancesvalues[0]);
        // $('#sumInsurances').html(insurances);
        
        $('#viewSummaryModal').modal('show');
      });
  // Smart Wizard 
  $('#smartwizard').smartWizard({
          selected: 0,
          theme: 'arrows',
          transitionEffect:'fade',
          showStepURLhash: false,
          toolbarSettings: {
            toolbarButtonPosition: 'end',
            toolbarExtraButtons: [btnViewSummary]
          },
          enableFinishButton: false
          
        });
       
  //$('#addFinish').click(function() {
  //  swal({
  //    title: "New Tugboat Successfully Added!",
  //    type: "success",
  //    showCancelButton: false,
  //    confirmButtonClass: "btn-primary",
  //    confirmButtonText: "Ok",
  //    closeOnConfirm: false
  //},
  //  function(){
  //      window.location = "/tugboat/create"
  //  });
  //});
  });
// Validate if the pictures have the proper file extension
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
            confirmButtonClass: "btn-danger",
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