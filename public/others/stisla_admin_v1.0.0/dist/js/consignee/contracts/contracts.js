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
    var peso = ` &#8369; `;
    var percent = ` &#37;`;
    var activeContractID = $('#activeContract').data('id');
    var createdContractID = $('#createdContract').data('id');
    $.ajax({
        url : url + '/' + activeContractID + '/show',
        type : 'GET',
        dataType : 'JSON',
        async: true,
        success : function(data){
            $('#contractsID').val(data.contract[0].intContractListID);
            console.log('aak');
            console.log('standard ID :', data.contract[0].intCStandardID);
            console.log('quotation ID : ', data.contract[0].intCQuotationID);
            $('#contractDetails').html(data.contract[0].strContractListDesc);
            $('#standardRate').html(peso + data.contract[0].fltStandardRate);
            $('#tugboatDelayFee').html(peso + data.contract[0].fltQuotationTDelayFee);
            $('#violationFee').html(peso + data.contract[0].fltQuotationViolationFee);
            $('#consigneeLateFee').html(peso + data.contract[0].fltQuotationConsigneeLateFee);
            $('#minDamageFee').html(peso + data.contract[0].fltMinDamageFee);
            $('#maxDamageFee').html(peso + data.contract[0].fltMaxDamageFee);
            $('#discount').html(data.contract[0].intDiscount + percent);
        },
        error : function(error){
            throw error;
        }
    });
    $.ajax({
        url : url + '/' + createdContractID + '/show',
        type : 'GET',
        dataType : 'JSON',
        async: true,
        success : function(data){
            $('#contractsID').val(data.contract[0].intContractListID);
            console.log('aak');
            console.log('standard ID :', data.contract[0].intCStandardID);
            console.log('quotation ID : ', data.contract[0].intCQuotationID);
            $('#contractDetails').html(data.contract[0].strContractListDesc);
            $('#standardRate').html(peso + data.contract[0].fltStandardRate);
            $('#tugboatDelayFee').html(peso + data.contract[0].fltQuotationTDelayFee);
            $('#violationFee').html(peso + data.contract[0].fltQuotationViolationFee);
            $('#consigneeLateFee').html(peso + data.contract[0].fltQuotationConsigneeLateFee);
            $('#minDamageFee').html(peso + data.contract[0].fltMinDamageFee);
            $('#maxDamageFee').html(peso + data.contract[0].fltMaxDamageFee);
            $('#discount').html(data.contract[0].intDiscount + percent);
        },
        error : function(error){
            throw error;
        }
    });
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
    console.log(contractID);
    swal({
        title: "Request for Change?",
        text: "Request changes for quotations",
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