// Team Builder Tugboat List

// Show Tugboat Team
$('.occupiedTugboats').on('click',function(event){
    event.preventDefault();
    console.log('kyaaa');
    var teamID = $(this).data('id');
    console.log(teamID);

    $.ajax({
        url : url + '/' + teamID + '/viewtugboatteam', 
        type : 'GET',
        dataType : 'JSON',
        success : function(data){
            $('.viewTeamInfo').empty();
            console.log(data)
            console.log();
            $('.tugboatname').html(data.team[0].strName);
            $('.removeTugboatTeam').data('id',data.team[0].intTAssignID);
            $('.teamname').html('Team Name :&nbsp;' + data.team[0].strTeamName);
            for(var counter=0; counter < (data.team).length; counter++){
                var colorString;
                if(data.team[counter].strPositionName == 'Captain'){
                    colorString = 'primary';
                }else if(data.team[counter].strPositionName == 'Chief Engineer'){
                    colorString = 'info';
                }else if(data.team[counter].strPositionName == 'Crew'){
                    colorString = 'dark';
                }else{
                    colorString = 'success';
                }
                console.log(data.team[counter].intEmployeeID);
                var appendData = 
                `
                    <div class="col-auto">
                        <div class="card bg-${colorString}">
                            <div class="card-body">
                                <p class="card-text text-center ml-2">${data.team[counter].strLName},&nbsp;${data.team[counter].strFName}</p>
                                <small class="text-center float-left" style="text-transform: uppercase;">
                                    ${data.team[counter].strPositionName}
                                </small>
                            </div>
                        </div>
                    </div>
                  
                `;
                $(appendData).appendTo('.viewTeamInfo');
                // $('#viewTeamCompositionModal').modal('show');
                $('#viewTeamModal').modal('show');
            }
        },
        error : function(error){
            throw error;
        }
    })
});

// Remove Team From Selected Tugboat
$('.removeTugboatTeam').on('click',function(event){
    var id = $('.removeTugboatTeam').data('id');
    console.log(id);
    swal({
        title: "Are You Sure?",
        text: "Do you want to remove the Team Assigned for this Tugboat?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ok",
        closeOnConfirm: true,
        timer : 1500

    },(isConfirm)=>{
        if(isConfirm){
            console.log('heyaaaa');
            $.ajax({
                url : url + '/cleartugboatteam',
                type : 'POST',
                data : { 
                    "_token" : $('meta[name="csrf-token"]').attr('content'),    
                    tugboatassignID : id
                }, 
                beforeSend : (request)=>{
                    return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                },
                success : (data, response) =>{
                    console.log('success pota');
                    console.log(data);
                    console.log(response);
                    swal({
                        title: "Success",
                        text: "Team Removed",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Ok",
                        closeOnConfirm: true,
                        timer : 1500
                    },(isConfirm)=>{
                        window.location = url;
                    });                       
                },
                error : function(error){
                    throw error;
                }
        
            });
        }
    });
});

$('.forwardTugboat').on('click',function(){
    console.log($(this).data('id'));
    var tugboatID = $(this).data('id')
    var assignID = $(this).data('assign');
    $('#forwardTugboatModal').data('id',assignID);

    console.log(assignID);
    swal({
        title: "Are you sure?",
        text: "Forward This Tugboat?, If this Tugboat has and assigned Team the assignment will be removed",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,
    },function(isConfirm){
        $.ajax({
            url : `${url}/${tugboatID}/showtugboatinformation`,
            type : 'GET',
            dataType : 'JSON',
            success : (data, response)=>{
                console.log(data);
                $('#titleTugboatName').html('HI');
                // console.log(data.tugboat[0].strName);
                var figures = (data.tugboat[0].strCylinderperCycle).split('/');
                // Tugboat Main Information
                $('#tugboatForwardInfoName').html(data.tugboat[0].strName);
                $('#tugboatForwardInfoLength').html(data.tugboat[0].strLength);
                $('#tugboatForwardInfoBreadth').html(data.tugboat[0].strBreadth);
                $('#tugboatForwardInfoDepth').html(data.tugboat[0].strDepth);
                $('#tugboatForwardInfoHorsePower').html(data.tugboat[0].strHorsePower);
                $('#tugboatForwardInfoMaxSpeed').html(data.tugboat[0].strMaxSpeed);
                $('#tugboatForwardInfoBollardPull').html(data.tugboat[0].strBollardPull);
                $('#tugboatForwardInfoGrossTonnage').html(data.tugboat[0].strGrossTonnage);
                $('#tugboatForwardInfoNetTonnage').html(data.tugboat[0].strNetTonnage);
                $('#tugboatForwardInfoDryDocked').html(data.tugboat[0].datLastDrydocked);
                // Tugboat Specifications
                $('#tugboatForwardInfoLocationBuilt').html(data.tugboat[0].strLocationBuilt);
                $('#tugboatForwardInfoDateBuilt').html(data.tugboat[0].datBuiltDate);
                $('#tugboatForwardInfoBuilder').html(data.tugboat[0].strBuilder);
                $('#tugboatForwardInfoMakerPower').html(data.tugboat[0].strMakerPower);
                $('#tugboatForwardInfoHullMaterial').html(data.tugboat[0].strHullMaterial);
                $('#tugboatForwardInfoDrive').html(data.tugboat[0].strDrive);
                $('#tugboatForwardInfoCylCycle').html(`${figures[0]} cylinder <br> ${figures[1]} per cycle`);
                $('#tugboatForwardInfoAuxEngine').html(data.tugboat[0].strAuxEngine);
                // Tugboat Classifications
                $('#tugboatForwardInfoClassNum').html(data.tugboat[0].strClassNum);
                $('#tugboatForwardInfoOfficialNum').html(data.tugboat[0].strOfficialNum);
                $('#tugboatForwardInfoIMONum').html(data.tugboat[0].strIMONum);
                $('#tugboatForwardInfoFlag').html(data.tugboat[0].strTugboatFlag);
                $('#tugboatForwardInfoType').html(data.tugboat[0].strTugboatTypeName);
                $('#tugboatForwardInfoTradingArea').html(data.tugboat[0].strTradingArea);
                $('#tugboatForwardInfoHomePort').html(data.tugboat[0].strHomePort);
                $('#tugboatForwardInfoISPSCode').html(data.tugboat[0].enumISPSCodeCompliance);
                $('#tugboatForwardInfoISMCode').html(data.tugboat[0].enumISMCodeStandard);
                $('#tugboatForwardInfoNavEquipments').html(data.tugboat[0].enumAISGPSVHFRadar);
                //Tugboat Insurances
                $('#tugboatForwardInfoInsurances').empty();
                console.log(response);
                for(var counter = 0; counter < data.insurances.length; counter++){
                    var appendInsurances = `<p>${data.insurances[counter].strTugboatInsuranceDesc}</p>`
                    $(appendInsurances).appendTo('#tugboatForwardInfoInsurances');
                }
                console.log(data.insurances);
                // $('#tugboatInfoModal').modal('show');
                
            },
            error : (error)=>{
                throw error;
            }
    
        });
        $('#forwardTugboatModal').modal('show');
    }); 
});

$('.tugboatInformation').on('click',function(){
    var tugboatID = $(this).data('id');
    $('#forwardTugboatModal').data('id',tugboatID);
    console.log(tugboatID);
    // return false;
    $.ajax({
        url : `${url}/${tugboatID}/showtugboatinformation`,
        type : 'GET',
        dataType : 'JSON',
        success : (data, response)=>{
            console.log(data);
            $('#titleTugboatName').html('HI');
            console.log(data.tugboat[0].strName);
            var figures = (data.tugboat[0].strCylinderperCycle).split('/');

            // Tugboat Main Information
            $('#tugboatInfoName').html(data.tugboat[0].strName);
            $('#tugboatInfoLength').html(data.tugboat[0].strLength);
            $('#tugboatInfoBreadth').html(data.tugboat[0].strBreadth);
            $('#tugboatInfoDepth').html(data.tugboat[0].strDepth);
            $('#tugboatInfoHorsePower').html(data.tugboat[0].strHorsePower);
            $('#tugboatInfoMaxSpeed').html(data.tugboat[0].strMaxSpeed);
            $('#tugboatInfoBollardPull').html(data.tugboat[0].strBollardPull);
            $('#tugboatInfoGrossTonnage').html(data.tugboat[0].strGrossTonnage);
            $('#tugboatInfoNetTonnage').html(data.tugboat[0].strNetTonnage);
            $('#tugboatInfoDryDocked').html(data.tugboat[0].datLastDrydocked);
            // Tugboat Specifications
            $('#tugboatInfoLocationBuilt').html(data.tugboat[0].strLocationBuilt);
            $('#tugboatInfoDateBuilt').html(data.tugboat[0].datBuiltDate);
            $('#tugboatInfoBuilder').html(data.tugboat[0].strBuilder);
            $('#tugboatInfoMakerPower').html(data.tugboat[0].strMakerPower);
            $('#tugboatInfoHullMaterial').html(data.tugboat[0].strHullMaterial);
            $('#tugboatInfoDrive').html(data.tugboat[0].strDrive);
            $('#tugboatInfoCylCycle').html(`${figures[0]} cylinder <br> ${figures[1]} per cycle`);
            $('#tugboatInfoAuxEngine').html(data.tugboat[0].strAuxEngine);
            // Tugboat Classifications
            $('#tugboatInfoClassNum').html(data.tugboat[0].strClassNum);
            $('#tugboatInfoOfficialNum').html(data.tugboat[0].strOfficialNum);
            $('#tugboatInfoIMONum').html(data.tugboat[0].strIMONum);
            $('#tugboatInfoFlag').html(data.tugboat[0].strTugboatFlag);
            $('#tugboatInfoType').html(data.tugboat[0].strTugboatTypeName);
            $('#tugboatInfoTradingArea').html(data.tugboat[0].strTradingArea);
            $('#tugboatInfoHomePort').html(data.tugboat[0].strHomePort);
            $('#tugboatInfoISPSCode').html(data.tugboat[0].enumISPSCodeCompliance);
            $('#tugboatInfoISMCode').html(data.tugboat[0].enumISMCodeStandard);
            $('#tugboatInfoNavEquipments').html(data.tugboat[0].enumAISGPSVHFRadar);
            //Tugboat Insurances
            $('#tugboatInfoInsurances').empty();
            console.log(response);
            for(var counter = 0; counter < data.insurances.length; counter++){
                var appendInsurances = `<p>${data.insurances[counter].strTugboatInsuranceDesc}</p>`
                $(appendInsurances).appendTo('#tugboatInfoInsurances');
            }
            console.log(data.insurances);
            $('#tugboatInfoModal').modal('show');
            
        },
        error : (error)=>{
            throw error;
        }

    });
});

// Forward Tugboat Button
$('.forwardTugboatButton').on('click',function(){
    var id = $('#forwardTugboatModal').data('id');
    var companyID = $('#selectTugboatRecipientCompany').val();
    console.log(id, companyID);
    $.ajax({
        url : `${url}/forwardtugboat`,
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            tugboatassignID : id,
            recipientCompanyID : companyID,
        },
        beforeSend : (request)=>{
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : (data, response)=>{
            console.log(data);
            console.log(response);
            swal({
                title: "Success",
                text: "Tugboat Sent",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500
            },(isConfirm)=>{
                if(isConfirm){
                    window.location = url;
                }
            });
        },error : (error)=>{
            throw error;
        }
    });
});