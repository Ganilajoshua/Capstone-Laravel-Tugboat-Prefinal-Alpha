var url = '/administrator/transactions/contractrequests';

$(document).ready(function(){
    $('.btnFInalizeContract').attr('disabled',true);
    $('.btnFInalizeContract').css('cursor','not-allowed');
    
    $('#transactionTree').addClass("active");
    $('#tConsignee').addClass("active");
    $('#activeconsigneeMenu').addClass("inactive");
    $('#contractsMenu').addClass("inactive");
    $('#contractRequestsMenu').addClass("active");
    $('.createContracts').addClass('animated fadeIn');
    // $('select').niceSelect();
    $('#detLayout','.detailedTable').addClass('animated fadeIn');
    $('.summernoteContract').summernote({
        minHeight: 350,
        disableDragAndDrop: true,
        fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '26', '28', '36', '48', '72'],
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontname'],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize'],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', [ 'link']],
            ['help']
        ]
    });

    var signCanvas = $('.signCanvas').signature({
        syncField: '#signatureJSON'
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    $.ajax({
        url : url + '/getnotifs',
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'),    
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){ 
            console.log(data);
            var results = (data.contract).length;
            
            // console.log(results);
            // var appendNotifs = "<span class='badge badge-primary float-right'>"+results+"</span>";
            // $(appendNotifs).appendTo('#notifs');  
        },
        error : function(error){
            throw error;
        }

    });
    $('.addSignatureButton').on('click',function(){
        $('#applySignatureModal').modal('show');
        $('.finalizeContract').data('id',$(this).data('id'));
        console.log($(this).data('id'));
    });
});


function createContracts(contractID){
    console.log(contractID);
    $.ajax({
        url : url + '/' + contractID + '/create',
        type : 'GET',   
        dataType : 'JSON',
        success : function(data, response){
            console.log(data);
            if(data.contract.isDefault == 'Yes'){
                console.log('YEY');
                var appendWarning = `<div style="font-size: 15px; border-radius: 0px !important;" class="mt-3 ml-4 badge badge-warning text-black">
                    This Consignee Wants the Default Matrix To Be Applied in The Contract
                </div>`;
                $(appendWarning).appendTo('.defaultMatrix');
                $('.companyNameHolder').html(data.company.strCompanyName);
                console.log(data.company.intCompanyID);
                $('#hideCompanyID').val(data.contract.intContractListID);
                $('#hideCompanyID').val(data.contract.intContractListID);
                $('.consigneeTable').css('display','none');
                $('.createContracts').css('display','block');
                $('.createContracts').addClass('animated fadeIn');

                $('#addHStandardRate').val(data.contractfees[0].fltCFStandardRate);
                $('#addHDelayFee').val(data.contractfees[0].fltCFTugboatDelayFee);
                $('#addHViolationFee').val(data.contractfees[0].fltCFViolationFee);
                $('#addHLateFee').val(data.contractfees[0].fltCFConsigneeLateFee);
                $('#minHDamageFee').val(data.contractfees[0].fltCFMinDamageFee);
                $('#maxHDamageFee').val(data.contractfees[0].fltCFMaxDamageFee);

                $('#addTAStandardRate').val(data.contractfees[1].fltCFStandardRate);
                $('#addTADelayFee').val(data.contractfees[1].fltCFTugboatDelayFee);
                $('#addTAViolationFee').val(data.contractfees[1].fltCFViolationFee);
                $('#addTALateFee').val(data.contractfees[1].fltCFConsigneeLateFee);
                $('#minTADamageFee').val(data.contractfees[1].fltCFMinDamageFee);
                $('#maxTADamageFee').val(data.contractfees[1].fltCFMaxDamageFee);
                // $('#discountRange').val();

            }
            // else{
            //     var appendWarning = 
            //     `<div style="font-size: 15px; border-radius: 0px !important;" class="mt-3 ml-4 badge badge-warning text-black">
            //         This 
            //     </div>`;
            //     $(appendWarning).appendTo('.defaultMatrix');
            // }
        },
        error : function(error){
            throw error;
        }
    });
}
function storeContracts(){
    var id = $('#hideCompanyID').val();
    var validity = $('#contractValidity').val();
    var title = $('#addContractTitle').val();
    var details = $('#addContractDetails').val();
    var servicetype = ["Hauling","Tug Assist"];
    var standardFee = [];
    var delayFee = [];
    var violationFee = [];
    var latefee = [];
    var minDamage = [];
    var maxDamage = [];
    var discount = [];

    standardFee[0] = $('#addHStandardRate').val();
    delayFee[0] = $('#addHDelayFee').val();
    violationFee[0] = $('#addHViolationFee').val();
    latefee[0] = $('#addHLateFee').val();
    minDamage[0] = $('#minHDamageFee').val();
    maxDamage[0] = $('#maxHDamageFee').val();
    discount[0] = $('#discountRange').val();

    standardFee[1] = $('#addTAStandardRate').val();
    delayFee[1] = $('#addTADelayFee').val();
    violationFee[1] = $('#addTAViolationFee').val();
    latefee[1] = $('#addTALateFee').val();
    minDamage[1] = $('#minTADamageFee').val();
    maxDamage[1] = $('#maxTADamageFee').val();
    discount[1] = $('#discountRange').val();

     
    console.log(discount);

    console.log(servicetype, standardFee, delayFee);
    console.log(violationFee, latefee);
    console.log(minDamage, maxDamage);
    
    // return false;
    console.log(id);
    console.log(validity);
    console.log(title, details);
    // return false;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });   
    swal({
        title: "Initial Contract",
        text: "Create Initial contract?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-primary",
        confirmButtonText: "Ok",
        closeOnConfirm: true
    },
    function(isConfirm){
        if(isConfirm){
            $.ajax({
                url : url + '/store',
                type : 'POST',
                data : {
                    "_token" : $('meta[name="csrf-token"]').attr('content'),
                    contractTitle : title,
                    contractDetails : details,
                    contractValidity : validity,
                    contractID : id,
                    servicetype : servicetype,
                    standardFee : standardFee,
                    delayFee : delayFee,
                    violationFee : violationFee,
                    latefee : latefee,
                    minDamage : minDamage,
                    maxDamage : maxDamage,
                    discount : discount,
                    // contractDelayFee : delayFee,
                    // contractViolationFee : violationFee,
                    // contractLateFee : lateFee,
                    // contractStandardFee : standardFee,
                    // contractMinDamage : minDamage,
                    // contractMaxDamage : maxDamage,
                    contractDiscount : discount,
                },
                success : function(data,response){
                    console.log(data);
                    swal({
                        title: "Success",
                        text: "Initial Contract Created",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Ok",
                        closeOnConfirm: true,
                        timer : 1500
                    },
                    function(isConfirm){
                        if(isConfirm){
                            window.location = url;
                        }
                    });           
                },
                error : function(error){
        
                }
            });  
        }
    });   
}

function showContracts(){
    var id = $('#hideCompanyID').val();
    $('#hideCompanyID').val(id);
    var validity = $('#contractValidity').val();
    
    var title = $('#addContractTitle').val();
    var details = $('#addContractDetails').val();
    var delayFee = $('#addDelayFee').val();
    var violationFee = $('#addViolationFee').val();
    var lateFee = $('#addLateFee').val();
    var standardFee = $('#addStandardRate').val();
    var minDamage = $('#minDamageFee').val();
    var maxDamage= $('#maxDamageFee').val();
    var discount = $('#discountRange').val();
    var contractID = $('#hideCompanyID').val();
    if(validity == 6){
        var currDate = moment().add(validity, 'M').format('YYYY-MM-DD');
    }else{
        var currDate = moment().add(validity, 'Y').format('YYYY-MM-DD');
    }
    console.log(currDate);
    // return false;
    $('.modalContractDetails').empty();

            // // if(data.standard == null){
            // var appendData =
            // "<h2>"+ title +"</h2>" +
            // "<p>"+ details +"</p>" + 
            // "<p> Standard Rate : "+ standardFee +"</p>" +
            // "<p> Consignee Late Fee : "+ lateFee +"</p>" +
            // "<p> Tugboat Delay Fee : "+ delayFee +"</p>" +
            // "<p> Violation Fee : "+ violationFee +"</p>" +
            // "<p> Minimum Damage Fee(s) : "+ minDamage +"</p>" +
            // "<p> Maximum Damage Fee(s) : "+ maxDamage +"</p>" +
            // "<p> Maximum Discount : "+ discount +"</p>";
            // $(appendData).appendTo('.modalContractDetails');
            // // $('#viewContractInfo').modal('show');
                
            //     console.log((data.quotationfees).length);
            //     $(appendData).appendTo('.modalContractDetails');
            //     for(var counter=0; counter < (data.quotationfees).length; counter++){
            //         var appendFees = "<p><b>"+data.quotationfees[counter].strQuotationFeeDesc+" : </b> "+data.quotationfees[counter].fltFees+"</p>"
            //         console.log(data.quotationfees[counter].strQuotationFeeDesc);
            //         $(appendFees).appendTo('.modalContractDetails');
            //     }
            // }else if(data.quotations == null && data.quotationfees == null){
                // var appendData =
                // "<h2>"+ title +"</h2>" +
                // "<p>"+ details +"</p>" + 
                // "<h3>"+ data.agreements.strAgreementTitle +"</h3>" +
                // "<p>"+ data.agreements.strAgreementDesc +"</p>" +
                // "<h3>"+ data.terms.strTermsConditionTitle +"</h3>" +
                // "<p>"+ data.terms.strTermsConditionDesc +"</p>" +
                // "<P>"+ data.standard.strStandardDesc +":  PHP "+ data.standard.fltSDeliveryRate + "</p>";
                // $('#viewContractInfo').modal('show');
            // }else{
            //     var appendData =
            //     "<h2>"+ title +"</h2>" +
            //     "<p>"+ details +"</p>" + 
            //     "<h3>"+ data.agreements.strAgreementTitle +"</h3>" +
            //     "<p>"+ data.agreements.strAgreementDesc +"</p>" +
            //     "<h3>"+ data.terms.strTermsConditionTitle +"</h3>" +
            //     "<p>"+ data.terms.strTermsConditionDesc +"</p>" +
            //     "<h3>"+ data.standard.strStandardDesc +"</h3>" + 
            //     "<h3>"+ data.quotations.strQuotationTitle +"</h3>";
            //     console.log((data.quotationfees).length);
            //     $(appendData).appendTo('.modalContractDetails');
            //     for(var counter=0; counter < (data.quotationfees).length; counter++){
            //         var appendFees = "<p><b>"+data.quotationfees[counter].strQuotationFeeDesc+" : </b> "+data.quotationfees[counter].fltFees+"</p>"
            //         console.log(data.quotationfees[counter].strQuotationFeeDesc);
            //         $(appendFees).appendTo('.modalContractDetails');
            //     }
            //     $('#viewContractInfo').modal('show');
            // }
            
}


function createActiveContract(){
    //Comment
    // Tinanggal ko yung contractID nag eerror yun kasi bag empty yung table sa DB
    // Ginawa ko nalang data ID
    console.log($('#addSignatureButton').data('id'));
    var sign = $('#signatureJSON').val();
    var contractID = $('#addSignatureButton').data('id');
        $('#applySignatureModal').modal('hide');
        $.ajax({
            url : url + '/' + contractID + '/getactive',
            type : 'GET',
            dataType : 'JSON',
            success : function(data, response){
                console.log(data);
                swal({
                    title: "Create Active Contract?",
                    text: "Finalized This Quotation as A Contract",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonClass: "btn-info",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,

                },function(isConfirm){
                    if (isConfirm) {
                        var currDate = moment().format('YYYY-MM-DD');
                        console.log(data.contract.enumConValidity);
                        console.log(data.contract.intContractListID);
                        var id = data.contract.intContractListID;
                        var a = parseInt(data.contract.enumConValidity);
                        console.log(a);
                        // currDate = moment().add(data.contract.enumConValidity, 'Y').format('YYYY-MM-DD');
                        if(a == 6){
                            var expireContract = moment().add(a, 'M').format('YYYY-MM-DD');
                            console.log(expireContract);
                        }else if(a == 1){
                            var expireContract = moment().add(a, 'Y').format('YYYY-MM-DD');
                            console.log(expireContract);
                        }
                        console.log(currDate);
                        console.log(id);
                        // return false;
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });   
                        $.ajax({
                            url : url + '/activate',
                            type : 'POST',
                            data : {
                                "_token" : $('meta[name="csrf-token"]').attr('content'),
                                contractID : id,
                                contractActive : currDate,
                                contractExpire : expireContract,
                                sign : sign,
                            },
                            success : function(data,response){
                                console.log(data);
                                swal({
                                    title: "Success!",
                                    text: "Contract Finalized and is now Active.",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Ok",
                                    closeOnConfirm: true,
                                    timer : 1500
                                },
                                function(isConfirm){
                                    if(isConfirm){
                                        window.location = url;
                                    }
                                });    
                            },
                            error : function(error){
                    
                            }
                        });
                    } else {
                        $('#applySignatureModal').modal('show');
                    }
                    
                });
            },
            error : function(error){
                throw error;
            }
        });
}

$('.finalizeContract').on('click',function(){
    console.log($(this).data('id'));
    var contractID = $(this).data('id');
    var sign = $('#signatureJSON').val();
    swal({
        title: "Are You Sure?",
        text: "Finalize This Contract?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,
    },(isConfirm)=>{
        $.ajax({
            url : `${url}/finalizecontract`,
            type : 'POST',
            data : {
                "_token" : $('meta[name="csrf-token"]').attr('content'),
                contractID : contractID,
                sign : sign,
            },
            success : (data, response)=>{
                swal({
                    title: "Success",
                    text: "Selected Contract Was Finalized",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonClass: "btn-info",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                },(isConfirm)=>{
                    if(isConfirm){
                        location.reload();
                    }
                });
            },
            error : (error)=>{
                throw error;
            }
        })
    });
});

$('.activateContract').on('click',function(){
    console.log($(this).data('id'));
    contractID = $(this).data('id');
    $.ajax({
        url : `${url}/${contractID}/getactive`,
        type : 'GET',
        dataType : 'JSON',
        success : function(data, response){
            console.log(data);
            swal({
                title: "Are You Sure?",
                text: "Activate This Contract?",
                type: "info",
                showCancelButton: true,
                confirmButtonClass: "btn-info",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },(isConfirm)=>{
                var currDate = moment().format('YYYY-MM-DD');
                console.log(data.contract.enumConValidity);
                console.log(data.contract.intContractListID);
                var id = data.contract.intContractListID;
                var a = parseInt(data.contract.enumConValidity);
                console.log(a);
                // currDate = moment().add(data.contract.enumConValidity, 'Y').format('YYYY-MM-DD');
                switch (a){
                    case 6 :
                        var expireContract = moment().add(a, 'M').format('YYYY-MM-DD');
                        console.log('Switch 6 months', expireContract);
                        break; 
                    case 1 :
                        var expireContract = moment().add(a, 'Y').format('YYYY-MM-DD');
                        console.log('Switch 1 year', expireContract);
                        break;
                }
                console.log('contract Expiry', expireContract);
                console.log(currDate);
                console.log(id);

                $.ajax({
                    url : `${url}/activate`,
                    type : 'POST',
                    data : {
                        "_token" : $('meta[name="csrf-token"]').attr('content'),
                        contractID : id,
                        contractActive : currDate,
                        contractExpire : expireContract,
                    },
                    success : function(data,response){
                        console.log(data);
                        swal({
                            title: "Success!",
                            text: "Selected Contract is now Active.",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Ok",
                            closeOnConfirm: true,
                            timer : 1500
                        },
                        function(isConfirm){
                            if(isConfirm){
                                location.reload();
                            }
                        });    
                    },
                    error : function(error){
            
                    }
                });
            });
        },
        error : (error)=>{
            throw error;
        }
    });
    // swal({
    //     title: "Are You Sure?",
    //     text: "Activate this contract?",
    //     type: "info",
    //     showCancelButton: true,
    //     confirmButtonClass: "btn-info",
    //     confirmButtonText: "Ok",
    //     closeOnConfirm: true,

    // },(isConfirm)=>{
    //     console.log('hey');
    // });
});

function requestingForChanges(contractID){
    console.log(contractID);
    $.ajax({
        url : url + '/' + contractID + '/requestchanges',
        type : 'GET',
        dataType : 'JSON',
        success : function(data, response){
            console.log(data);
            $('.companyNameHolder').html(data.company[0].strCompanyName);
            console.log(data.company.intCompanyID);
            $('#hideCompanyID').val(data.contract.intContractListID);
            $('#hideQuotationID').val(data.quotation[0].intQuotationID);
            $('#editContractTitle').val(data.contract.strContractListTitle);
            $('#editContractValidity').val(data.contract.enumConValidity);
            $('#editContractDetails').summernote('code',data.contract.strContractListDesc);
            $('#editDelayFee').val(data.quotation[0].fltQuotationTDelayFee);
            $('#editViolationFee').val(data.quotation[0].fltQuotationViolationFee);
            $('#editLateFee').val(data.quotation[0].fltQuotationConsigneeLateFee);
            $('#editStandardRate').val(data.quotation[0].fltStandardRate);
            $('#editMinDamage').val(data.quotation[0].fltMinDamageFee);
            $('#editMaxDamageFee').val(data.quotation[0].fltMaxDamageFee);
            $('#editDiscountRange').val(data.quotation[0].intDiscount);
            // $('#hideCompanyID').val(data.contract.intContractListID);
            $('.editContracts').css('display','block');
            $('.detLayout').css('display','none');
        },
        error : function(error){
            throw error;
        }
    });
}
function saveContracts(){
    var editHideCompany = $('#hideCompanyID').val();
    var editHideQuotation = $('#hideQuotationID').val();
    var editContractTitle = $('#editContractTitle').val();
    var editContractValid = $('#editContractValidity').val();
    var editContractDet = $('#editContractDetails').val();
    var editDelay = $('#editDelayFee').val();
    var editViolation = $('#editViolationFee').val();
    var editLate = $('#editLateFee').val();
    var editStandard = $('#editStandardRate').val();
    var editMinD = $('#editMinDamage').val();
    var editMaxD = $('#editMaxDamageFee').val();
    var editDiscount = $('#editDiscountRange').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });   
    $.ajax({
        url : url + '/saverequestchanges',
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            editHCompany : editHideCompany,
            editHQuote : editHideQuotation,
            editContractTitle : editContractTitle,
            editContractV : editContractValid,
            editContractD : editContractDet,
            editDelayFee : editDelay,
            editViolationFee : editViolation,
            editLateFee : editLate,
            editStandardFee : editStandard,
            editMinDamage : editMinD,
            editMaxDamage : editMaxD,
            editD : editDiscount,
        },
        success : function(data,response){
            console.log(data);
            swal({
                title: "Success",
                text: "Contract Changes sent!",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = url;
                }
            });    
        },
        error : function(error){

        }
    });
}

    $('.viewQuotesMatrix').on('click',function(){
        console.log('hi');
    });