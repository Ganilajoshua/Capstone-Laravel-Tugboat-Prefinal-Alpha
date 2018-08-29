//Display Info modal
var url = '/affiliates/maintenance/tugboat';

$(document).ready(function(){
    $('#maintenanceTree').addClass("active");
    $('#tugboatMenu').addClass("active");
});
var maincounter;

var appendIcon = `<i class="fas fa-ship mr-3"></i>`;
function getData(id){
    console.log('hi');
    $.ajax({
        url : url + '/' + id + '/please',
        type : 'GET',
        dataType : 'JSON',
        aysnc : true,
        success : function(data){
            console.log('success', data);
            $('#tugboatInfoModal').empty();
            console.log(data.main.datLastDrydocked);
            $('#tugboatName').html(data.main.strName);
            $('#infoModalLabel').html(appendIcon + data.main.strName);      
            $('#tugboatLength').html(data.main.strLength);
            $('#tugboatBreadth').html(data.main.strBreadth);
            $('#tugboatDepth').html(data.main.strDepth);
            $('#tugboatHorsePower').html(data.main.strDepth);
            $('#tugboatMaxSpeed').html(data.main.strMaxSpeed);
            $('#tugboatBollardPull').html(data.main.strBollardPull);
            $('#tugboatGrossTonnage').html(data.main.strGrossTonnage);
            $('#tugboatNetTonnage').html(data.main.strNetTonnage);
            $('#tugboatDryDocked').html(data.main.datLastDrydocked);
            $('#tugboatLicenseNum').html(data.class.strClassNum);
            $('#tugboatLocationBuilt').html(data.specs.strLocationBuilt);
            $('#tugboatDateBuilt').html(data.specs.datBuiltDate);
            $('#tugboatBuilder').html(data.specs.strBuilder);
            $('#tugboatMakerPower').html(data.specs.strMakerPower);
            $('#tugboatHullMaterial').html(data.specs.strHullMaterial);
            $('#tugboatDrive').html(data.specs.strDrive);
            $('#tugboatCylCycle').html(data.specs.strCylinderperCycle);
            $('#tugboatAuxEngine').html(data.specs.strAuxEngine);
            $('#tugboatNavEquipments').html(data.specs.enumAISGPSVHFRadar);
            $('#tugboatClassNum').html(data.class[0].strClassNum);
            $('#tugboatOfficialNum').html(data.class[0].strOfficialNum);
            $('#tugboatIMONum').html(data.class[0].strIMONum);
            $('#tugboatFlag').html(data.class[0].strTugboatFlag);
            $('#tugboatType').html(data.class[0].strTugboatTypeName);
            $('#tugboatType').html(data.class[0].strTugboatType);
            $('#tugboatTradingArea').html(data.class[0].strTradingArea);
            $('#tugboatHomePort').html(data.class[0].strHomePort);
            $('#tugboatISPSCode').html(data.class[0].enumISPSCodeCompliance);
            $('#tugboatISMCode').html(data.class[0].enumISMCodeStandard);
            
            $('#tugboatID').val(data.main.intTugboatMainID);
            for(var count = 0; count < (data.insurances).length; count++){
                appendFields = "<p> #"+(count+1)+ "&nbsp;" + data.insurances[count].strTugboatInsuranceDesc+"</p>";
                $(appendFields).appendTo('#tugboatInsurances');
            }
            var cylcyc = data.specs.strCylinderperCycle;
            console.log(cylcyc.length);
            var split = cylcyc.split('/');
            var cylinder = split[0];
            var cycle = split[1];
               
            console.log('cylinder', cylinder);
            console.log('cycle', cycle);
            console.log(data.maxID.classID, 'incremented ID : ', data.maxID.classID + 1);
            console.log(data.maxID.mainID,'incremented ID : ',  data.maxID.mainID + 1);
            console.log(data.maxID.specsID, 'incremented ID : ', data.maxID.specsID + 1);
            console.log(data.maxID.tugboatID, 'incremented ID : ', data.maxID.tugboatID + 1);
            $('#infoModal').modal('show');
        }
    });
    
}


//Edit from Information Modal
function infoEdit(){
    console.log('HI');
    console.log($('#tugboatID').val());
    var id = $('#tugboatID').val();

    console.log('Requesting Data');
    console.log('Data Sent');

    $.ajax({
        url : url + '/' + id + '/please',
        type : 'GET',
        dataType : 'JSON',
        success : function(data){
            console.log('Data Recieved',data);
            console.log('Drydocked',data.main.datLastDrydocked);
            console.log('classnum',data.class.strClassNum);
            console.log(data.class.strHomePort);
            $('#tugboatID').val(data.tugboat.intTugboatID);
            $('#editName').val(data.main.strName);
            $('#infoModalLabel').val(data.main.strName);      
            $('#editLength').val(data.main.strLength);
            $('#editBreadth').val(data.main.strBreadth);
            $('#editDepth').val(data.main.strDepth);
            $('#editHorsePower').val(data.main.strDepth);
            $('#editMaxSpeed').val(data.main.strMaxSpeed);
            $('#editBollardPull').val(data.main.strBollardPull);
            $('#editGrossTonnage').val(data.main.strGrossTonnage);
            $('#editNetTonnage').val(data.main.strNetTonnage);
            $('#editLastDryDocked').val(data.main.datLastDrydocked);
            $('#editLicenseNumber').val(data.class.strClassNum);
            $('#editTugID').val(data.main.intTugboatMainID);
            
            $('#editLocBuilt').val(data.specs.strBuiltIn);
            $('#editDateBuilt').val(data.specs.strBuiltIn);
            $('#editBuilder').val(data.specs.strBuilder);
            $('#editMakerPower').val(data.specs.strMakerPower);
            $('#editHullMaterial').val(data.specs.strHullMaterial);
            $('#editDrive').val(data.specs.strDrive);
            $('#editAuxEngine').val(data.specs.strAuxEngine);
            var split = data.specs.strCylinderperCycle;
            splitted = split.split('/');
            cylinder = splitted[0];
            cycle = splitted[1];
            var a = cylinder.split(' ');
            var b = cycle.split(' ');
            cyl = a[0];
            cyc = b[0];
            console.log(cylinder);
            console.log(cycle);
            console.log(cyl);
            console.log(cyc);
            console.log(data.specs.strCylinderperCycle);
            $('#editCylinder').val(cylinder);
            $('#editCycle').val(cycle);
            $('#editClassNum').val(data.class.strClassNum);
            $('#editOfficialNum').val(data.class.strOfficialNum);
            $('#editIMONum').val(data.class.strIMONum);
            $('#editTradingArea').val(data.class.strTradingArea);
            $('#editType').val(data.class.strTugboatType);
            $('#editHomePort').val(data.class.strHomePort);
            $('#editIS')
            //$('input[name=addISPSCompliance]:checked').val(data.class.enumISPSCodeCompliance);
            
        }
    });
    $(document).ready(function(){
        $('#cardView').removeClass('active');
        $('#detView').addClass('active');
        $('.editLayout').css('display', 'block');
        $('.cardLayout').css('display', 'none');
        $('#detLayout').css('display', 'none');
        $('#searchBar').css('display', 'none');
        $('.selectViews').css('display', 'none');
        $('#infoModal').modal('hide');
    });
}

//Edit from card and table
function editData(findid){
    console.log('Requesting Data');
    console.log('Data Sent');
    $.ajax({
        url : url + '/' + findid + '/please',
        type : 'GET',
        dataType : 'JSON',
        success : function(data){
            console.log('Data Recieved',data);
            console.log('Drydocked',data.main.datLastDrydocked);
            console.log('classnum',data.class.strClassNum);
            console.log(data.class.strHomePort);
            
            $('#editName').val(data.main.strName);
            $('#infoModalLabel').val(data.main.strName);      
            $('#editLength').val(data.main.strLength);
            $('#editBreadth').val(data.main.strBreadth);
            $('#editDepth').val(data.main.strDepth);
            $('#editHorsePower').val(data.main.strDepth);
            $('#editMaxSpeed').val(data.main.strMaxSpeed);
            $('#editBollardPull').val(data.main.strBollardPull);
            $('#editGrossTonnage').val(data.main.strGrossTonnage);
            $('#editNetTonnage').val(data.main.strNetTonnage);
            $('#editLastDrydocked').val(data.main.datLastDrydocked);
            // $('#editLicenseNumber').val(data.class.strClassNum);
            $('#editTugID').val(data.main.intTugboatMainID);
            
            $('#editLocBuilt').val(data.specs.strLocationBuilt);
            $('#editDatebuilt').val(data.specs.datBuiltDate);
            $('#editBuilder').val(data.specs.strBuilder);
            $('#editMakerPower').val(data.specs.strMakerPower);
            $('#editHullMaterial').val(data.specs.strHullMaterial);
            $('#editDrive').val(data.specs.strDrive);
            $('#editAuxEngine').val(data.specs.strAuxEngine);

            var split = data.specs.strCylinderperCycle;
            splitted = split.split('/');
            cylinder = splitted[0];
            cycle = splitted[1];
            var a = cylinder.split(' ');
            var b = cycle.split(' ');
            cyl = a[0];
            cyc = b[0];
            console.log(cylinder);
            console.log(cycle);
            console.log(cyl);
            console.log(cyc);
            console.log(data.specs.strCylinderperCycle);
            var a = console.log(data.class[0].strClassNum);
          
            $('#editCylinder').val(cylinder);
            $('#editCycle').val(cycle);
            $('#editClassNum').val(data.class[0].strClassNum);
            $('#editOfficialNum').val(data.class[0].strOfficialNum);
            $('#editIMONum').val(data.class[0].strIMONum);
            $('#editTradingArea').val(data.class[0].strTradingArea);
            $('#editType').val(data.class[0].intTugboatTypeID).niceSelect('update');
            $('#editHomePort').val(data.class[0].strHomePort);
            var checked = 'no';
            $('.editISPSForm').find($('input[value="'+data.class[0].enumISPSCodeCompliance+'"]')).attr('checked',true);
            $('.editISMForm').find($('input[value="'+data.class[0].enumISMCodeStandard+'"]')).attr('checked',true);
            $('.editNavigationForm').find($('input[value="'+data.specs.enumAISGPSVHFRadar+'"]')).attr('checked',true);
            $('.editLayout').data('id',data.main.intTugboatMainID);
            //$('input[name=addISPSCompliance]:checked').val(data.class.enumISPSCodeCompliance);
            console.log((data.insurances).length);
            var additioncount;
            for(var counter = 0; counter < (data.insurances).length; counter++){
                if(counter == 0){
                    var appendFields = 
                    "<div class='col-12 col-lg-6 addContainer'>" + 
                        "<div class='form-group'>" + 
                            "<label for='editInsurance'>Insurance<sup class='text-primary'>&#10033;</sup></label>" +
                            "<input type='text' class='form-control' id='editInsurance' name='editInsurance[]' value='"+data.insurances[counter].strTugboatInsuranceDesc+"' placeholder='Tugboat Insurance'>" +
                            "<button type='button' class='btn btn-primary btn-sm float-right mt-2 btn-lg waves-effect addInsuranceFields' data-toggle='tooltip' title='Add field for another Insurance'><i class='fas fa-plus'></i></button>" +
                        "</div>" + 
                    "</div>";
                    $(appendFields).appendTo('#secondRow');
                    console.log(counter);
                }else{
                    var appendFields2 = 
                    "<div class='col-12 col-lg-6 addContainer'>" + 
                        "<div class='form-group'>" + 
                            "<label for='editInsurance'>Insurance<sup class='text-primary'>&#10033;</sup></label>" +
                            "<input type='text' class='form-control' id='editInsurance' name='editInsurance[]' value='"+data.insurances[counter].strTugboatInsuranceDesc+"' placeholder='Tugboat Insurance'>" +
                        "</div>" + 
                    "</div>";
                    console.log(counter);
                    $(appendFields2).appendTo('#secondRow');
                }
                additioncount = counter;
                console.log(additioncount);
            }

            $('.addInsuranceFields').on('click',function(e){
                console.log('hi', additioncount);
                if(additioncount < 3){
                    var appendFields = 
                    "<div class='col-12 col-lg-6 addContainer'>" + 
                        "<div class='form-group'>" + 
                            "<label for='editInsurance'>Insurance<sup class='text-primary'>&#10033;</sup></label>" +
                            "<input type='text' class='form-control' id='editInsurance' name='editInsuranceAdded[]' placeholder='Tugboat Insurance'>" +
                            "<button type='button' class='btn btn-primary btn-sm float-right mt-2 btn-lg waves-effect removeInsuranceFields' data-toggle='tooltip' title='Delete Fields'><i class='fas fa-minus'></i></button>"    
                        "</div>"+ 
                    "</div>";
                    $(appendFields).appendTo('#secondRow');
                    additioncount++;
                }else{
                    swal({
                        title: "Maximum of 4 Insurances!",
                        type: "error",
                        confirmButtonClass: "btn-danger waves-effect",
                        confirmButtonText: "Ok",
                        closeOnConfirm: false
                    });
                }
                
                $('#secondRow').on('click','.removeInsuranceFields',function(e){
                    console.log('hi');
                    $(this).closest('.addContainer').fadeOut(200,function(){
                        $(this).remove();
                        additioncount--;
                        console.log(additioncount);
                    });
                    event.stopImmediatePropagation();
                });
            });
            // console.log($('.removeInsuranceFields'));
            // $('.removeInsuranceFields').on('click',function(e){
            //     console.log(hi);
            // })  
            // $('#secondRow').on('click','removeInsurance', function(event){
            //     $(this).closest('.addContainer').fadeOut(200, function() {
            //         $(this).remove();
            //         additioncount--;
            //         console.log(additioncount);
            //     });
            //     event.stopImmediatePropagation();
            // }); 

        }
    });
    

    $(document).ready(function(){
        $('.cardView').removeClass('active');
        $('#detView').addClass('active');
        $('.editLayout').css('display', 'block');
        $('.cardLayout').css('display', 'none');
        $('.detLayout').css('display', 'none');
        $('.searchBar').css('display', 'none');
        $('.selectViews').css('display', 'none');
    });
}

//Create Tugboat
function postData(){
    $(document).ready(function(){     
        console.log('trying to submit data');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        console.clear();
        var classID = parseInt($('#classID').val());
        var mainID = parseInt($('#mainID').val());
        var specsID = parseInt($('#specsID').val());
        var tugboatID = parseInt($('#tugboatsID').val());
        console.log('Class ID : ', classID ,'incremented ID : ', classID+1);
        console.log('Main ID : ', mainID ,'incremented ID : ', mainID+1 );
        console.log('Specs ID : ', specsID ,'incremented ID : ', specsID+1);
        console.log('Tugboat ID : ', tugboatID ,'incremented ID : ', tugboatID+1);
        
        classID = classID + 1 ;
        mainID = mainID + 1;
        specsID = specsID + 1;
        tugboatID = tugboatID + 1;
        var insurancesvalues = [];
        console.log(classID, mainID, specsID, tugboatID);
        $("input[name='AddInsurance[]']").each(function(insurances){
            insurancesvalues[insurances] = $(this).val();
            insurances++;
        })
        
        
        // var tugboatName = $('#sumName').html();
        // var breadth = $('#sumBreadth').html();
        // var depth = $('#sumDepth').html();
        // var hp = $('#sumHorsePower').html();
        // var maxspeed = $('#sumMaxSpeed').html();
        // var bpull = $('#sumBollardPull').html();
        // var gton = $('#sumGrossTonnage').html();
        // var nton = $('#sumNetTonnage').html();
        // var drydocked = $('#sumDryDocked').html();
        // var licensenum = $('#sumLicenseNum').html();
        // var licenseexp = $('#sumLicenseExp').html();
        var tugboatName = $('#AddName').val();
        var length = $('#AddLength').val();
        var breadth = $('#AddBreadth').val();
        var depth = $('#AddDepth').val();
        var hp = $('#AddHorsePower').val();
        var maxspeed = $('#AddMaxSpeed').val();
        var bpull = $('#AddBollardPull').val();
        var gton = $('#AddGTonnage').val();
        var nton = $('#AddNTonnage').val();
        var drydocked = $('#AddDryDocked').val();
        // var licensenum = $('#AddLicenseNum').val();
        // var licenseexp = $('#AddLicenseExpDate').val();

        console.log('name : ', tugboatName);
        console.log('length :', length);
        console.log('/breadth : ',  breadth); 
        console.log('/depth : ', depth); 
        console.log('/horsepower : ' , hp); 
        console.log('/maxspeed : ', maxspeed);
        console.log('/bollardpull',  bpull);
        console.log('/gross ton :', gton);
        console.log('/net ton : ', nton);
        console.log('/drydocked :', drydocked);
            // 'license : ', licensenum,
            // 'exp : ', licenseexp
        console.log();
        var locbuilt = $('#AddLocBuilt').val();
        var datebuilt = $('#AddDateBuiltIn').val();
        var makerpower = $('#AddMakerPower').val();
        var builder = $('#AddBuilder').val();
        var hullmaterial = $('#AddHullMaterial').val();
        var drive = $('#AddDrive').val();
        //$('#sumCylCycle').html(cylinder +' '+ cyl +'<br>'+ cycle +' per '+ cyc;
        var cylinder = $('#AddCylinder').val();
        var cycle = $('#AddCycle').val();
        var auxengine = $('#AddAuxEngine').val();
        var cylcycle = cylinder + '/' + cycle ;
        console.log('/loc', locbuilt); 
        console.log('/date', datebuilt); 
        console.log('/builder', builder);
        console.log('/maker', makerpower); 
        console.log('/hull', hullmaterial); 
        console.log('/drive', drive);
        console.log('/cylinder per Cycle', cylinder + '/' + cycle); 
        // console.log('/cycle', cycle);
        console.log('/aux', auxengine);

        var classnum = $('#AddClassNum').val();
        var officialnum = $('#AddOfficialNum').val();
        var imonum = $('#AddIMONum').val();
        var flag = $('#AddFlag').val();
        var type = $('#AddType :selected').text();
        var typeval = $('#AddType').val();
        var tarea = $('#AddTradingArea').val();
        var home = $('#AddHomePort').val();
        var ispscomp = $('input[name=addISPSCompliance]:checked').val();
        var ismcode = $('input[name=addCStandard]:checked').val();
        var navigation = $('input[name=addNavigationEquipments]:checked').val();
        var insurances = []
        $("input[name='AddInsurance[]']").each(function(insurance){
            insurances[insurance] = $(this).val();
            // console.log(insurances[insurance]);
            insurance++; 
        });
        console.log('/classnum', classnum);
        console.log('/offnum', officialnum);
        console.log('/imonum', imonum);
        console.log('/flag', flag);
        console.log('/type', type);
        console.log('/typeval', typeval);
        console.log('/tarea', tarea);
        console.log('/ispscomp', ispscomp);
        console.log('/ismcode', ismcode);
        console.log('/navigation', navigation);
        console.log('/insurances',insurances);
        
        $.ajax({
            url : url + '/store',
            type : 'POST',
            aysnc : true,
            data : {"_token" : $('meta[name=_token]').attr('content'), 
                //Increment ID's
                tugboatID : tugboatID,
                classID : classID,                
                mainID : mainID,
                specsID : specsID,
                //TugboatMain
                tugboatName : tugboatName,
                length : length,
                breadth : breadth,
                depth : depth,
                horsePower : hp,
                maxSpeed : maxspeed,
                bollardPull : bpull,
                grossTonnage : gton,
                netTonnage : nton,
                lastDryDocked : drydocked,
                //class
                classNum : classnum,
                officialNum : officialnum,
                tugboatFlag : flag,
                tugboatType : typeval,
                imoNum : imonum,
                tradingArea : tarea,
                homePort : home, 
                ispsComp : ispscomp,
                ismCode : ismcode,
                navEquipments : navigation,
                insurances : insurances,
                //specs
                locationBuilt : locbuilt,
                dateBuilt : datebuilt,
                makerPower : makerpower,
                builder : builder,
                hullMaterial : hullmaterial,
                drive : drive,
                cylinderpercycle : cylcycle,
                auxEngine : auxengine,
                //builtIn : builtIn,
                
            },
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success : function(data){
                console.log('success pota');
                
                swal({
                    title: "Success",
                    text: "Data Submitted",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                    timer : 1000
                },
                function (){
                    window.location = url;
                });
                
            },
            error : function(error){
                throw error;
                swal({
                    title: "Error",
                    text: "Data submission error",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true
                  });
            }

        }); 
    });
}

// Edit Picture 
function editPictureSubmit(){
    console.log('Trying to submit Data');
}

//Edit Main Information
function editMainInformationSubmit(){
    console.log('Trying to submit Data');
    
    var name = $('#editName').val();    
    var length = $('#editLength').val();
    var breadth= $('#editBreadth').val();
    var depth = $('#editDepth').val();
    var hp = $('#editHorsePower').val();
    var maxspeed = $('#editMaxSpeed').val();
    var bpull = $('#editBollardPull').val();
    var gton = $('#editGrossTonnage').val();
    var nton = $('#editNetTonnage').val();
    var drydocked = $('#editLastDrydocked').val();
    
    var id = parseInt($('#editTugID').val());
    var dataID = $('.editLayout').data('id');
    
    console.log(dataID);
    console.log ('The ID is : ' , id);
    
    console.log(name, '|' ,length, '|', breadth, '|',depth, '|', hp , '|', maxspeed,'|',bpull,'|',gton,'|',nton,'|',drydocked,'|');
    // return false;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : url + '/maininfo',
        type : 'POST',
        aysnc : true,
        data : {
            "_token" : $('meta[name=_token]').attr('content'),
            mainID : dataID,
            tugboatName : name,
            length : length,
            breadth : breadth,
            depth : depth,
            horsePower : hp,
            maxSpeed : maxspeed,
            bollardPull : bpull,
            grossTonnage : gton,
            netTonnage : nton,
            lastDryDocked : drydocked
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success : function(data,response){
            toastr.success(name +"'s Main Information was Updated",'Success', { positionClass: 'toast-top-right', preventDuplicates: true, });    
            //window.location.reload(true);
        },
        error : function(error){
            throw error;
        }
    })
}

//Edit Specifications
function editSpecificationSubmit(){
    console.log('Trying to submit Data');
    var name = $('#editName').val();
    var datebuilt = $('#editLocBuilt').val();
    var locbuilt = $('#editDateBuilt').val();
    var builder = $('#editBuilder').val();
    var makerpower = $('#editMakerPower').val();
    var hullmaterial = $('#editHullMaterial').val();
    var cylinder = $('#editCylinder').val();
    var cycle = $('#editCycle').val();
    var drive = $('#editDrive').val();
    var auxengine = $('#editAuxEngine').val();
    var id = ($('#editTugID').val());
    var cylcycle = cylinder +'/'+ cycle ;
    console.log(cylcycle);
    console.log(id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : url + '/specifications',
        type : 'POST',
        aysnc : true,
        data : {
            "_token" : $('meta[name=_token]').attr('content'),
            specsID : id,
            builtIn : datebuilt,
            hullMaterial : hullmaterial,
            builder : builder,
            makerPower : makerpower,
            drive : drive,
            cylinderpercycle : cylcycle,
            auxEngine : auxengine,
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success : function(data,response){
            toastr.success(name +"'s Specifications was Updated",'Success', { positionClass: 'toast-top-right', preventDuplicates: true, });    
            //window.location.reload(true);
        },
        error : function(error){
            throw error;
        }
    })
}

//Edit Classification
function editClassificationSubmit(){
    console.log('Trying to submit Data');
    var id = parseInt($('#editTugID').val());
    var officialnum = $('#editOfficialNum').val();
    var classnum = $('#editClassNum').val();
    var imonum = $('#editIMONum').val();
    var tarea = $('#editTradingArea').val();
    var type = $('#editType').val();
    var home = $('#editHomePort').val();
    var name = $('#editName').val();
    var ispscomp = $('input[name=editISPSCompliance]:checked').val();
    var ismcode = $('input[name=editCStandard]:checked').val();
    console.log(id, ispscomp, ismcode);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : url + '/classification',
        type : 'POST',
        aysnc : true,
        data : {
            "_token" : $('meta[name=_token]').attr('content'),
            classID : id,
            // tugboatFlag : flag,
            tugboatType : type,
            classNum : classnum,
            officialNum : officialnum,
            imoNum : imonum,
            tradingArea : tarea,
            homePort : home, 
            ispsComp : ispscomp,
            ismCode : ismcode  
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success : function(data,response){
            toastr.success(name +"'s Specifications was Updated",'Success', { positionClass: 'toast-top-right', preventDuplicates: true, });    
            //window.location.reload(true);
        },
        error : function(error){
            throw error;
        }
    })

}
function deleteTugboat(deleteID){
    console.log('hi');
    console.log('Trying to Delete Data');
    console.log(deleteID);
    $.ajax({
        url : url + '/' + deleteID + '/delete',
        type : 'GET',
        dataType : 'JSON',
        success : function(response){
            console.log('Data Deleted');
            console.log(response);
            swal({
                title: "Success",
                text: "Data Deleted",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1000
            },
            function(){
                window.location = url;  
            })
        },
        error : function(error){
            throw error;
        }
    })

}