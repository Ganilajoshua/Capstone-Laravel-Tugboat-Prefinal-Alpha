var url = '/consignee/contracts';

$(document).ready(function(){
    $('#menucontractsD').addClass('active');
    $('#menucontractsM').addClass('active');
    $('#breadPB').hide();
    $('#breadSlash').hide();
    $('#breadCurrent').text('Contract');
    console.log($('#user').val());
    $('.btnRequest').on('click',function(e){
        e.preventDefault();
    });
    // para makuha mo yung value ng contract na kukunin 
    // nagdedefine ng || data-id="" || kasi wala namang click event
    // yung data id nilagyan ko din ng comment sa blade
    
    //PS ikaw nalang magbago ulit ng UI thankies

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var peso = ` &#8369; `;
    var percent = ` &#37;`;
    var activeContractID = $('#activeContract').data('id');
    var createdContractID = $('#createdContract').data('id');
    // $.ajax({
    //     url : url + '/' + activeContractID + '/show',
    //     type : 'GET',
    //     dataType : 'JSON',
    //     async: true,
    //     success : function(data){
    //         $('#contractsID').val(data.contract[0].intContractListID);
    //         console.log('aak');
    //         console.log('standard ID :', data.contract[0].intCStandardID);
    //         console.log('quotation ID : ', data.contract[0].intCQuotationID);
    //         $('#contractDetails').html(data.contract[0].strContractListDesc);
    //         $('#standardRate').html(peso + data.contract[0].fltStandardRate);
    //         $('#tugboatDelayFee').html(peso + data.contract[0].fltQuotationTDelayFee);
    //         $('#violationFee').html(peso + data.contract[0].fltQuotationViolationFee);
    //         $('#consigneeLateFee').html(peso + data.contract[0].fltQuotationConsigneeLateFee);
    //         $('#minDamageFee').html(peso + data.contract[0].fltMinDamageFee);
    //         $('#maxDamageFee').html(peso + data.contract[0].fltMaxDamageFee);
    //         $('#discount').html(data.contract[0].intDiscount + percent);
    //     },
    //     error : function(error){
    //         throw error;
    //     }
    // });
    // $.ajax({
    //     url : url + '/' + createdContractID + '/show',
    //     type : 'GET',
    //     dataType : 'JSON',
    //     async: true,
    //     success : function(data){
    //         $('#contractsID').val(data.contract[0].intContractListID);
    //         console.log('pwet mo may rocket');
    //         console.log('standard ID :', data.contract[0].intCStandardID);
    //         console.log('quotation ID : ', data.contract[0].intCQuotationID);
    //         $('#contractDetails').html(data.contract[0].strContractListDesc);
    //         $('#standardRate').html(peso + data.contract[0].fltStandardRate);
    //         $('#tugboatDelayFee').html(peso + data.contract[0].fltQuotationTDelayFee);
    //         $('#violationFee').html(peso + data.contract[0].fltQuotationViolationFee);
    //         $('#consigneeLateFee').html(peso + data.contract[0].fltQuotationConsigneeLateFee);
    //         $('#minDamageFee').html(peso + data.contract[0].fltMinDamageFee);
    //         $('#maxDamageFee').html(peso + data.contract[0].fltMaxDamageFee);
    //         $('#discount').html(data.contract[0].intDiscount + percent);    
    //     },
    //     error : function(error){
    //         throw error;
    //     }
    // });

    $('.signCanvas').mouseup(function(){
        if ($('.signCanvas').signature('isEmpty')) {
            $('.btnAcceptContract').attr('disabled', true);
            $('.btnAcceptContract').css('cursor', 'not-allowed');
          } else {
            $('.btnAcceptContract').attr('disabled', false);
            $('.btnAcceptContract').css('cursor', 'pointer');
          }
    });
});

$('#quoteCustom').on('click',function(){
    console.log('hey barbara');
    $('#requestContractsButton').removeClass('defaultMatrixButton');
    $('#requestContractsButton').addClass('customMatrixButton');
    $.ajax({
        url : `${url}/getdefaultmatrix`,
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'), 
        },
        success : (data, response)=>{
            console.log(data);
            // $('#contractDetails').html(data.contractfees [0].strContractListDesc);
            $('#addHStandardRate').attr('placeholder',data.contractfees[0].fltCFStandardRate);
            $('#addHDelayFee').attr('placeholder',data.contractfees[0].fltCFTugboatDelayFee);
            $('#addHViolationFee').attr('placeholder',data.contractfees[0].fltCFViolationFee);
            $('#addHLateFee').attr('placeholder',data.contractfees[0].fltCFConsigneeLateFee);
            $('#addHMinDamageFee').attr('placeholder',data.contractfees[0].fltCFMinDamageFee);
            $('#addHMaxDamageFee').attr('placeholder',data.contractfees[0].fltCFMaxDamageFee);
            
            $('#addTAStandardRate').attr('placeholder',data.contractfees[1].fltCFStandardRate);
            $('#addTADelayFee').attr('placeholder',data.contractfees[1].fltCFTugboatDelayFee);
            $('#addTAViolationFee').attr('placeholder',data.contractfees[1].fltCFViolationFee);
            $('#addTALateFee').attr('placeholder',data.contractfees[1].fltCFConsigneeLateFee);
            $('#addTAMinDamageFee').attr('placeholder',data.contractfees[1].fltCFMinDamageFee);
            $('#addTAMaxDamageFee').attr('placeholder',data.contractfees[1].fltCFMaxDamageFee);

            // $('#addTAStandardRate').attr('placeholder',data.contractfees[0].);
            // $('#addTADelayFee').attr('placeholder',data.contractfees[0].);
            // $('#addTAViolationFee').attr('placeholder',data.contractfees[0].);
            // $('#addTALateFee').attr('placeholder',data.contractfees[0].);
            // $('#addTAMinDamageFee').attr('placeholder',data.contractfees[0].);
            // $('#addTAMaxDamageFee').attr('placeholder',data.contractfees[0].);
            
            // $('#standardRate').html(data.contractfees[0].fltStandardRate);
            // $('#tugboatDelayFee').html(data.contractfees [0].fltQuotationTDelayFee);
            // $('#violationFee').html(data.contractfees[0].fltQuotationViolationFee);
            // $('#consigneeLateFee').html(data.contractfees[0].fltQuotationConsigneeLateFee);
            // $('#minDamageFee').html(data.contractfees[0].fltMinDamageFee);
            // $('#maxDamageFee').html(data.contractfees[0].fltMaxDamageFee);
            // $('#discount').html(data.contractfees[0].intDiscount);    
        },
        error : function(error){
            throw error;
        }
    });
    // $.ajax({
    //     url : url + '/' + createdContractID + '/show',
    //     type : 'GET',
    //     dataType : 'JSON',
    //     async: true,
    //     success : function(data){
    //         $('#contractsID').val(data.contract[0].intContractListID);
    //         console.log('pwet mo may rocket');
    //         console.log('standard ID :', data.contract[0].intCStandardID);
    //         console.log('quotation ID : ', data.contract[0].intCQuotationID);
    //         $('#contractDetails').html(data.contract[0].strContractListDesc);
    //         $('#standardRate').html(data.contract[0].fltStandardRate);
    //         $('#tugboatDelayFee').html(data.contract[0].fltQuotationTDelayFee);
    //         $('#violationFee').html(data.contract[0].fltQuotationViolationFee);
    //         $('#consigneeLateFee').html(data.contract[0].fltQuotationConsigneeLateFee);
    //         $('#minDamageFee').html(data.contract[0].fltMinDamageFee);
    //         $('#maxDamageFee').html(data.contract[0].fltMaxDamageFee);
    //         $('#discount').html(data.contract[0].intDiscount);    
    //     },
    //     error : (error)=>{
    //         throw error;
    //     }
    // });
});

$('.defaultMatrixButton').on('click',function(event){
    event.preventDefault();
    console.log('defaultMatrix');
    var companyID = $(this).data('id');
    swal({
        title: "Are You Sure?",
        text : "Request Contract Based on The Matrix?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
    },(isConfirm)=>{
        console.log('Ohyoohyo');
        $.ajax({
            url : `${url}/store`,
            type : 'POST',
            data : { 
                "_token" : $('meta[name="csrf-token"]').attr('content'),    
                companyID : companyID,
            }, 
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : function(data){
                console.log('success pota');
                console.log(data);
                swal({
                    title: "Success",
                    text: "Contract Requested",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                },
                function(){
                    window.location = url;
                });                       
            },
            error : function(error){
                throw error;
            }
    
        });
    });
});

$('.customMatrixButton').on('click',function(event){
    event.preventDefault();
    console.log('customMatrix');
    swal({
        title: "Submit These Suggestions?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
    },(isConfirm)=>{
        console.log('Hey');
    });
});

function requestContracts(companyID){
    console.log(companyID);
    swal({
        title: "Request an Initial Contract?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
    },function(){
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
                companyID : companyID,
            }, 
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : function(data){
                console.log('success pota');
                console.log(data);
                swal({
                    title: "Success",
                    text: "Contract Requested",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                },
                function(){
                    window.location = url;
                });                       
            },
            error : function(error){
                throw error;
            }
    
        });
    });
    
}
function requestForChanges(){
    var contractID = $('#contractsID').val();
    $('#requestChangesModal').modal('hide');
    console.log(contractID);
    swal({
        title: "Request for Change?",
        text: "Request changes for quotations",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
    },function(isConfirm){
        if(isConfirm){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                url : url + '/requestchanges',
                type : 'POST',
                data : { 
                    "_token" : $('meta[name="csrf-token"]').attr('content'),    
                    contractID : contractID,
                }, 
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                },
                success : function(data){
                    console.log('success pota');
                    console.log(data);
                    swal({
                        title: "Success",
                        text: "Quotation Changes Requested",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Ok",
                        closeOnConfirm: false,
                    },
                    function(){
                        window.location = url;
                    });                       
                },
                error : function(error){
                    throw error;
                }
    
            });
        }else{
            $('#requestChangesModal').modal('show');
        }
    });
}
function showContract(showID){
    console.log('contractlistID : ', showID);
    $.ajax({
        url : url + '/' + showID + '/show',
        type : 'GET',
        dataType : 'JSON',
        async: true,
        success : function(data){
            console.log(data);
            $('.viewcontractmodalBody').empty();
            $('#contractsID').val(data.contract[0].intContractListID);
            console.log('aak');
            console.log('standard ID :', data.contract[0].intCStandardID);
            console.log('quotation ID : ', data.contract[0].intCQuotationID);
            var appendData =
            "<h2>"+ data.contract[0].strContractListTitle +"</h2>" +
            "<p>"+ data.contract[0].strContractListDesc +"</p>" + 
            "<p> Standard Rate : "+ data.contract[0].fltStandardRate +"</p>" +
            "<p> Tugboat Delay Fee : "+ data.contract[0].fltQuotationTDelayFee +"</p>" +
            "<p> Violation Fee : "+ data.contract[0].fltQuotationViolationFee +"</p>" +
            "<p> Minimum Damage Fee(s) : "+ data.contract[0].fltQuotationConsigneeLateFee +"</p>" +
            "<p> Minimum Damage Fee(s) : "+ data.contract[0].fltMinDamageFee +"</p>" +
            "<p> Maximum Damage Fee(s) : "+ data.contract[0].fltMaxDamageFee +"</p>" +
            "<p> Maximum Discount : "+ data.contract[0].intDiscount +"</p>";
            $(appendData).appendTo('.viewcontractmodalBody');
            $('#viewCContractInfo').modal('show');
        },
        error : function(error){
            throw error;
        }
    });
}
function showFinalContract(showID){
    console.log('contractlistID : ', showID);
    $.ajax({
        url : url + '/' + showID + '/show',
        type : 'GET',
        dataType : 'JSON',
        success : function(data){
            console.log(data);
                $('.viewfinalcontractmodalBody').empty();
                $('#contractsID').val(data.contract[0].intContractListID);
                console.log('aak');
                console.log('standard ID :', data.contract[0].intCStandardID);
                console.log('quotation ID : ', data.contract[0].intCQuotationID);
                console.log(data.contract[0].strContractListTitle)
                $('#viewFinalContractInfoTitle').html(data.contract[0].strContractListTitle);
                var appendBadge = "<div class='badge badge-success ml-2'>ACTIVE</div>";
                var appendData =
                "<h2>"+ data.contract[0].strContractListTitle +"</h2>" +
                "<p>"+ data.contract[0].strContractListDesc +"</p>" +
                "<p> Contract Expiry : "+ moment(data.contract[0].datContractExpire).format("MM/DD/YYYY") +"</p>" + 
                "<p> Standard Rate : "+ data.contract[0].fltStandardRate +"</p>" +
                "<p> Tugboat Delay Fee : "+ data.contract[0].fltQuotationTDelayFee +"</p>" +
                "<p> Violation Fee : "+ data.contract[0].fltQuotationViolationFee +"</p>" +
                "<p> Minimum Damage Fee(s) : "+ data.contract[0].fltQuotationConsigneeLateFee +"</p>" +
                "<p> Minimum Damage Fee(s) : "+ data.contract[0].fltMinDamageFee +"</p>" +
                "<p> Maximum Damage Fee(s) : "+ data.contract[0].fltMaxDamageFee +"</p>" +
                "<p> Maximum Discount : "+ data.contract[0].intDiscount +"</p>";
                $(appendBadge).appendTo('#viewFinalContractInfoTitle');
                $(appendData).appendTo('.viewfinalcontractmodalBody');
                $('#finalContractInfo').modal('show');
                
        },
        error : function(error){
            throw error;
        }
    });
}function acceptContractQuotation(){
        $('#applySignatureModal').modal('hide');
        var contractID = $('#contractsID').val();
        swal({
            title: "Are You Sure?",
            text: "Accept Contract Quotation?",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-info",
            confirmButtonText: "Ok",
        },function(isConfirm){
            if(isConfirm){
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
                    contractID : contractID,
                }, 
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                },
                success : function(data){
                    console.log('success pota');
                    console.log(data);
                    swal({
                        title: "Success",
                        text: "Contract Request Accepted",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Ok",
                        closeOnConfirm: true,
                        timer : 2000
                    },
                    function(isConfirm){
                        if(isConfirm){
                            window.location = url; 
                        }
                    });                       
                },
                error : function(error){
                    throw error;
                }

            });
        }else{
            $('#applySignatureModal').modal('show');
        }
    });
}

$('.viewQuotesMatrix').on('click',function(){
    $('.contractRequestsMatrix').css('display','block');
    $('.contractRequestsQuotes').css('display','none');
    console.log('depppiii');
    console.log($(this).data('id'));
    var id = $(this).data('id');
    $.ajax({
        url : `${url}/${id}/getquoteexchanges`,
        type : 'GET',
        dataType : 'JSON',
        success : (data)=>{
            console.log(data);
            console.log('heyyyyy');
            appendQuotes(data.quotations);
        },
        error : (error)=>{
            throw error;
        },
    });
});

// function appendQuotes(quotations){
//     console.log(quotations);
//     for(var counter = 0; counter < quotations.length; counter++){
//         if(quotations[counter].enumServiceType == 'Hauling'){
//             console.log('Hauling');
//         }else if(quotations[counter].enumServiceType == 'Tug Assist'){
//             console.log('Tug Assist');
//         }
//     }
// }