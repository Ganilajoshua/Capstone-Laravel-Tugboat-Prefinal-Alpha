var url = '/administrator/transactions/contractrequests';

$(document).ready(function(){
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
    var title = $('#addContractTitle').val();
    var details = $('#addContractDetails').val();
    // var standard = $('#addStandard').val();
    // var agreements = $('#addAgreements').val();
    // var termscondition = $('#addTermsandCondition').val();
    var quotation = $('#addQuotations').val();
    console.log(id);
    console.log(title, details);
    // console.log(standard, agreements);
    console.log(quotation);
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
            // standardID : standard,
            // agreementID : agreements,
            // termsID : termscondition,
            quotationsID : quotation
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
    // var standard = $('#addStandard').val();
    // var agreements = $('#addAgreements').val();
    // var termscondition = $('#addTermsandCondition').val();
    var quotation = $('#addQuotations').val();
    var contractID = $('#hideCompanyID').val();
    console.log(quotation);
    console.log(id);
    console.log(validity);
    if(validity == 6){
        var currDate = moment().add(validity, 'M').format('YYYY-MM-DD');
    }else{
        var currDate = moment().add(validity, 'Y').format('YYYY-MM-DD');
    }
    // var exp =(validity, 'M').format('YYYY-MM-DD');
    console.log(currDate);
    // return false;

    // if(quotation == 0 && standard == 0){
    //     swal({
    //         title: "Must Select A Value",
    //         text: "Please Select a Quotation or a Standard Rate",
    //         type: "error",
    //         showCancelButton: true,
    //         confirmButtonClass: "btn-danger waves-effect",
    //         confirmButtonText: "Ok",
    //         closeOnConfirm: true
    //     });
    //     return false;
    // }
    console.log(contractID);
    // return false;
    $('.modalContractDetails').empty();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });   
    $.ajax({
        url : url + '/show',
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            // standardID : standard,
            quotationsID : quotation
        },
        success : function(data,response){
            console.log(data);
            // if(data.standard == null){
                var appendData =
                "<h2>"+ title +"</h2>" +
                "<p>"+ details +"</p>" + 
                "<h3>"+ data.quotations.strQuotationTitle +"</h3>"+
                "<p>"+ data.quotations.strQuotationDesc +"</p>" +
                "<p> Standard Rate : "+ data.quotations.fltStandardRate +"</p>" +
                "<p> Tugboat Delay Fee : "+ data.quotations.fltQuotationTDelayFee +"</p>" +
                "<p> Violation Fee : "+ data.quotations.fltQuotationViolationFee +"</p>" +
                "<p> Minimum Damage Fee(s) : "+ data.quotations.fltQuotationConsigneeLateFee +"</p>" +
                "<p> Minimum Damage Fee(s) : "+ data.quotations.fltMinDamageFee +"</p>" +
                "<p> Maximum Damage Fee(s) : "+ data.quotations.fltMaxDamageFee +"</p>" +
                "<p> Maximum Discount : "+ data.quotations.intDiscount +"</p>";
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
            
        },
        error : function(error){

        }
    });
}
function createActiveContract(contractID){

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

            },function(){
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
                    expireContract = moment().add(a, 'Y').format('YYYY-MM-DD');
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
                            title: "Success",
                            text: "Contract Activate",
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
            });
        },
        error : function(error){
            throw error;
        }
    });
}