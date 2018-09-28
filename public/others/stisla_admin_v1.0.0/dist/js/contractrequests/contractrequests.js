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
    $('#addSignatureButton').on('click',function(){
        $('#applySignatureModal').modal('show');
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
            $('.companyNameHolder').html(data.company.strCompanyName);
            console.log(data.company.intCompanyID);
            $('#hideCompanyID').val(data.contract.intContractListID);
            $('#hideCompanyID').val(data.contract.intContractListID);
            $('.consigneeTable').css('display','none');
            $('.createContracts').css('display','block');
            $('.createContracts').addClass('animated fadeIn');
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
    var delayFee = $('#addDelayFee').val();
    var violationFee = $('#addViolationFee').val();
    var lateFee = $('#addLateFee').val();
    var standardFee = $('#addStandardRate').val();
    var minDamage = $('#minDamageFee').val();
    var maxDamage= $('#maxDamageFee').val();
    var discount = $('#discountRange').val();
    console.log(discount);


    // return false;
    console.log(id);
    console.log(title, details);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });   
    $.ajax({
        url : url + '/store',
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            contractID : id,
            contractTitle : title,
            contractDetails : details,
            contractValidity : validity,
            contractDelayFee : delayFee,
            contractViolationFee : violationFee,
            contractLateFee : lateFee,
            contractStandardFee : standardFee,
            contractMinDamage : minDamage,
            contractMaxDamage : maxDamage,
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

            // if(data.standard == null){
                var appendData =
                "<h2>"+ title +"</h2>" +
                "<p>"+ details +"</p>" + 
                "<p> Standard Rate : "+ standardFee +"</p>" +
                "<p> Consignee Late Fee : "+ lateFee +"</p>" +
                "<p> Tugboat Delay Fee : "+ delayFee +"</p>" +
                "<p> Violation Fee : "+ violationFee +"</p>" +
                "<p> Minimum Damage Fee(s) : "+ minDamage +"</p>" +
                "<p> Maximum Damage Fee(s) : "+ maxDamage +"</p>" +
                "<p> Maximum Discount : "+ discount +"</p>";
                $(appendData).appendTo('.modalContractDetails');
                $('#viewContractInfo').modal('show');
                
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

    var contractID = $('#addSignatureButton').data('id')
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