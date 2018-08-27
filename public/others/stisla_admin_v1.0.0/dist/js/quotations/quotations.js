$(document).ready(function(){
    $('#maintenanceTree').addClass('active');
    $('#quotationsMenu').addClass('active');
    $('#showInfo').on('click',function(e){
        e.preventDefault();
    })
    $('#preventButton').on('click',function(e){
        e.preventDefault();
    })    
});
var url = '/administrator/maintenance/quotations';
var b ;

function postQuotation(e){
    
    // var title = $('#quotationTitle').val();
    // var details = $('#quotationDetails').val();
    // var quotationDesc = [];
    // var quotationFees = [];

    // var fields = document.getElementsByName('quotationDesc');
    // ?var count;
    // for(count=0;count < fields.length;count++){
    //     dynamic = fields[count];
    // }
    // $("input[name='quotationDesc[]']").each(function(desc){
    //     quotationDesc[desc] = $(this).val();
    //     desc++;
    // });
    // $("input[name='quotationFees[]']").each(function(fees){
    //     quotationFees[fees] = $(this).val();
    //     fees++;
    // });

    // console.log(title);
    // console.log(details);
    // console.log(quotationDesc);
    // console.log(quotationFees);
    console.log($('#addQuoteTitle').val());
    console.log($('.summernoteQuote').val());
    console.log($('#addDelayFee').val());
    console.log($('#addViolationFee').val());
    console.log($('#addLateFee').val());
    console.log($('#minDamageFee').val());
    console.log($('#maxDamageFee').val());
    console.log($('#discountRange').val());
    console.log($('#addStandardRate').val());

    var title = $('#addQuoteTitle').val();
    var desc = $('.summernoteQuote').val();
    var standard = $('#addStandardRate').val();
    var delayFee = $('#addDelayFee').val();
    var violationFee = $('#addViolationFee').val();
    var lateFee = $('#addLateFee').val();
    var minDamage = $('#minDamageFee').val();
    var maxDamage= $('#maxDamageFee').val();
    var discount = $('#discountRange').val();
    // return false;

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
            quotationTitle : title,
            quotationDetails : desc,
            quotationStandardFees : standard,
            quotationDelayFee : delayFee,
            quotationViolationFee : violationFee,
            quotationLateFee : lateFee,
            quotationMinDamage : minDamage,
            quotationMaxDamage : maxDamage,
            quotationDiscount : discount,
         
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data, response){
            console.log('success pota');
            console.log(data);
            console.log(response);
            swal({
                title: "Success",
                text: "Quotation Created",
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
            throw error;
        }

    });
}
function getQuotation(editID){
    $('#editfirstRow').empty();
    console.log(editID);
    console.log($("#card"+editID+""));
    $.ajax({
        url : url + '/' + editID + '/edit',
        type : 'GET',
        dataType : 'JSON',
        success : function(data){
                console.log(data);
                $('#editQuoteTitle').val(data.quotations.strQuotationTitle);
                $('#editQuoteDetails').summernote('code',data.quotations.strQuotationDesc);
                $('#editquotationID').val(data.quotations.intQuotationID);
                var a = [];
                console.log('length to: ', (data.fees).length);
                var a = JSON.parse(data.fees.length);
                // console.log(data.fees[0].strQuotationFeeDesc);
                // for(a=0; a < (data.fees).length; a++){
                //     console.log(data.fees[a]);
                //     var string = 'hi';
                //     console.log(a);
                //     // var datum = [];  
                //     // datum = data.fees[a].strQuotationFeeDesc;
                //     // console.log('datum :', datum[]);
                
                // $.each(data.fees, function(value){
                //     a[value] = $(this).val();
                // });
                // feeDesc = "hi putang ina mo ka ayaw mo mag render";
                
                for(b=0; b < (data.fees).length; b++){
                    // console.log(toString(data.fees[b]) );
                    // console.log('hey :', hey);
                    // console.log(str.quote(data.fees[b].strQuotationFeeDesc));
                    // feeDesc = JSON.stringify(data.fees);
                    // fee = JSON.parse(feeDesc);
                    // console.log(fee);

                    var appendFields = 
                    "<div class='row addContainer'>"+
                        "<div class='col-12 col-sm-12 col-lg-6'>" +
                            "<div class='form-group'>"+
                                "<label for='quoteDesc'>Quotation Description<sup class='text-primary'>&#10033;</sup></label>"+
                                "<input type='text' class='form-control' id='quoteDesc[" + data.fees[b].intQuotationFeeID + "]' value='" + data.fees[b].strQuotationFeeDesc + "' name='editQuoteDesc[]' placeholder='Description' required>"+
                                "<div class='invalid-feedback'>"+
                                    "Please fill in the Quotation Description."+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                        "<div class='col-12 col-sm-12 col-lg-6'>"+
                            "<div class='form-group'>"+
                                "<label for='quoteFee'>Quotation Fee<sup class='text-primary'>&#10033;</sup></label>"+
                                "<input type='text' class='form-control' id='quoteFees["+data.fees[b].intQuotationFeeID+"]' value='"+data.fees[b].fltFees+"' name='editQuoteFees[]' placeholder='Quotation Fee' required>"+
                                "<div class='invalid-feedback'>"+
                                    "Please fill in the Quotation Fee." +
                                "</div>"+
                                "<input type='hidden' name='editQuotationFeeID[]' value='"+data.fees[b].intQuotationFeeID+"'>"
                                // "<button type='button' class='btn btn-primary btn-sm text-center waves-effect btnRemoveFields mt-2 float-right' data-toggle='tooltip' title='Delete Fields'>"+
                                //     "<i class='fas fa-minus'></i>"+
                                // "</button>"+ 
                            "</div>"+ 
                        "</div>"+
                    "</div>";
                    $(appendFields).appendTo('#editfirstRow').addClass("animated fadeIn fast");
                    // console.log($("#quoteDesc["+data.fees[b].intQuotationFeeID+"]").printElement());
                    console.log($('.addContainer').text());
                    // if (b < 10) {
                    $("#quoteDesc[" + data.fees[b].intQuotationFeeID + "]").addClass('bg-success');  
                    // }
                }
                console.log(a);
                console.log(b);
                return b;
            
        },
        error : function(error){
            throw error;
        }
    });
    $('.editForm').addClass('animated fadeIn');
    $('.createForm').css('display','none');
    $('.editForm').css('display','block');
    // $('.quotationsList').css('display','block');
   
}
$('.addFields').on('click', function(event){
    event.stopImmediatePropagation();
    var appendFields = 
    `<div class="row addContainer">
        <div class="col-12 col-sm-12 col-lg-6">
            <div class="form-group">
                <label for="quoteDesc">Quotation Description<sup class="text-primary">&#10033;</sup></label>
                <input type="text" class="form-control" name="quotationDesc[]" placeholder="Description" required>
                <div class="invalid-feedback">
                    Please fill in the Quotation Description.
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-lg-6">
            <div class="form-group">
                <label for="quoteFee">Quotation Fee<sup class="text-primary">&#10033;</sup></label>
                <input type="text" class="form-control" name="quotationFees[]" placeholder="Quotation Fee" required>
                <div class="invalid-feedback">
                    Please fill in the Quotation Fee.
                </div>
                <button type="button" class="btn btn-primary btn-sm text-center waves-effect editbtnRemoveFields mt-2 float-right" data-toggle="tooltip" title="Delete Fields">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
    </div>`;
    console.log(b);
    if(b < 10){
        $(appendFields).appendTo('#editfirstRow').addClass("animated fadeIn fast");
        b++
    }else{
        swal({
            title: "Maximum of 10 Fields!",
            type: "info",
            confirmButtonClass: "btn-primary waves-effect",
            confirmButtonText: "Ok",
            closeOnConfirm: false
        });
    }
    $('#editfirstRow').on('click', ".editbtnRemoveFields", function(event) {
        $(this).closest('.addContainer').fadeOut(200, function() {
            $(this).remove();
            b--;
        });
        event.stopImmediatePropagation();
    });

    
});
function showQuotation(showID){
    console.log(showID);
    $('.quotationModalBody').empty();
    $.ajax({
        url : url + '/' + showID + '/show', 
        type : 'GET',
        dataType : 'JSON',
        success : function(data, response){
            console.log(data);
            var appendData =
            "<h3>"+ data.quotation.strQuotationTitle +"</h3>" +
            "<p>"+ data.quotation.strQuotationDesc +"</p>";
            $(appendData).appendTo('.quotationModalBody');
            for(var counter=0; counter < (data.fees).length; counter++){
                var appendFees = "<p><b>"+data.fees[counter].strQuotationFeeDesc+" : </b> "+data.fees[counter].fltFees+"</p>"
                console.log(data.fees[counter].strQuotationFeeDesc);
                $(appendFees).appendTo('.quotationModalBody');
                $('#viewQuotationInfo').modal('show');
            }
        },
        error : function(error){
            throw error;
        }
    });
}
function editQuotation(){
    var quotationID = $('#editquotationID').val();
    var title = $('#editQuoteTitle').val();
    var details = $('#editQuoteDetails').val();

    var editquotationDesc = [];
    var editquotationFees = [];
    var editquotationFeesID = [];

    var quotationDesc = []; 
    var quotationFees = [];
    $("input[name='editQuoteDesc[]']").each(function(desc){
        editquotationDesc[desc] = $(this).val();
        desc++;
    });
    $("input[name='editQuoteFees[]']").each(function(fees){
        editquotationFees[fees] = $(this).val();
        fees++;
    });
    $("input[name='editQuotationFeeID[]']").each(function(id){
        editquotationFeesID[id] = $(this).val();
        id++;
    });
    
    $("input[name='quotationDesc[]']").each(function(desc){
        quotationDesc[desc] = $(this).val();
        desc++;
    });
    $("input[name='quotationFees[]']").each(function(fees){
        quotationFees[fees] = $(this).val();
        fees++;
    });
    
    var data = {
        quotationID : quotationID,
        editQuotationFeeID : editquotationFeesID,
        editQuotationDesc : editquotationDesc,
        editQuotationFees : editquotationFees,
        quotationDesc : quotationDesc,
        quotationFees : quotationFees,
    };

    console.log(editquotationDesc);
    console.log(editquotationFees);
    console.log(quotationDesc);
    console.log(quotationFees);
    console.log(editquotationFeesID);
    console.log(title);
    console.log(details);
    console.log(data);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : url + '/update',
        type : 'POST',
        data : { 
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            quotationID : quotationID,
            quotationTitle : title,
            quotationDetails : details,
            editQuotationFeeID : editquotationFeesID,
            editQuotationDesc : editquotationDesc,
            editQuotationFees : editquotationFees,
            newquotationDesc : quotationDesc,
            newquotationFees : quotationFees,
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            console.log('success pota');
            console.log(data);
            if((data.errors)){
                console.log('title', data.errors.title);
                console.log('body', data.errors.body);
            }
            swal({
                title: "Success",
                text: "Data Submitted",
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
            throw error;
            console.log('title', error.errors.title);
            console.log('body', error.errors.body);
        }

    });

}
function updateQuotation(){

}
function deleteQuotation(deleteID){
    console.log(deleteID);
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this Quotation.",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },
    function() {
        $.ajax({
            url : url + '/' + deleteID + '/delete',
            type : 'GET',
            dataType : 'JSON',
            success : function(data, response){
                console.log(data);
                swal({
                    title: "Success",
                    text: "Quotation Deleted",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                    timer : 1500
                },function(isConfirm){
                    if(isConfirm){
                        window.location = url;
                    }
                })
            },
            error : function(error){
                throw error;
            }
        });
    });
}