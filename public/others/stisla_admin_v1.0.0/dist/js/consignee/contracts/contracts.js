var url = '/consignee/contracts';

$(document).ready(function(){
    $('#menucontractsD').addClass('active');
    $('#menucontractsM').addClass('active');
    console.log($('#user').val());
    $('.btnRequest').on('click',function(e){
        e.preventDefault();
    });
    // para makuha mo yung value ng contract na kukunin 
    // nagdedefine ng || data-id="" || kasi wala namang click event
    // yung data id nilagyan ko din ng comment sa blade
    
    //PS ikaw nalang magbago ulit ng UI thankies
    var showID = $('#activeContract').data('id');
    
    console.log(showID);
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
    
});

function requestContracts(companyID){
    console.log(companyID);
    
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
                timer : 2000
            },
            function(isConfirm){
                if(isConfirm){
                }
            });                       
            setTimeout(window.location = url, 2000); 
        },
        error : function(error){
            throw error;
        }

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
    },function(isConfirm){
        if (isConfirm) {
            $('#viewCContractInfo').modal('hide');
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
                        text: "Contract Requested",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Ok",
                        closeOnConfirm: true,
                        timer : 2000
                    },
                    function(isConfirm){
                        if(isConfirm){
                        }
                    });                       
                    setTimeout(window.location = url, 2000); 
                },
                error : function(error){
                    throw error;
                }
    
            });
        } else {
            $('#viewCContractInfo').modal('show');
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
}
function acceptContractQuotation(){
    var contractID = $('#contractsID').val();
    swal({
        title: "Are You Sure?",
        text: "Accept Contract Quotation?",
        type: "info",
        showCancelButton: false,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
    },function(isConfirm){
        // alert('bobo');
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
    });
}