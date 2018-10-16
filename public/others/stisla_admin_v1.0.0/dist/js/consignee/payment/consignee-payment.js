$(document).ready(function(){
    $('.btnApplySign').attr('disabled',true);
    $('.btnApplySign').css('cursor','not-allowed');
    $('.cardCheque').css('cursor','pointer');
    $('.cardCash').css('cursor','pointer');
    $('.breadTemplate').hide();
    $('#chequeDate').datetimepicker({
        format: 'L'
    });
    $(function() {
        var sig = $('.signChequeCanvas').signature();
        $('.clearChequeCanvas').click(function() {
            sig.signature('clear');
            $('.btnApplySign').attr('disabled',true);
            $('.btnApplySign').css('cursor','not-allowed');
        });
    });
    $('.signChequeCanvas').mouseup(function() {
        $('.btnApplySign').attr('disabled',false);
        $('.btnApplySign').css('cursor','pointer');
    });
    $('.btnApplySign').mouseup(function() {
        $('#applyChequeSign').modal('hide');
        swal({
            title: "Success!",
            text: "Signature Applied.",
            type: "success",
            showCancelButton: false,
            confirmButtonClass: "btn-success waves-effect",
            confirmButtonText: "Confirm"
        });
    });
    $('.cardCheque').click(function() {
        $('.cardCheque').addClass('border-primary2');
        $('.iconCheque').addClass('text-primary');
        $('.cardCheque').removeClass('border-secondary2');
        $('.iconCheque').removeClass('text-black');
        $('.cardCash').removeClass('border-primary2');
        $('.iconCash').removeClass('text-primary');
        $('.cardCash').addClass('border-secondary2');
        $('.iconCash').addClass('text-black');
        $('.txtCheque').removeClass('text-black');
        $('.txtCheque').addClass('text-primary');
        $('.txtCash').removeClass('text-black');
        $('.txtCash').addClass('text-black');
        $('.cashDetails').hide();
        $('.chequeDetails').show();
    });
    $('.cardCash').click(function() {
        $('.cardCash').addClass('border-primary2');
        $('.iconCash').addClass('text-primary');
        $('.cardCash').removeClass('border-secondary2');
        $('.iconCash').removeClass('text-black');
        $('.cardCheque').removeClass('border-primary2');
        $('.iconCheque').removeClass('text-primary');
        $('.cardCheque').addClass('border-secondary2');
        $('.iconCheque').addClass('text-black');
        $('.txtCash').removeClass('text-black');
        $('.txtCash').addClass('text-primary');
        $('.txtCheque').removeClass('text-black');
        $('.txtCheque').addClass('text-black');
        $('.chequeDetails').hide();
        $('.cashDetails').show();
    });
    // $('.btnBillInfo').on('click',function(e){
        //     e.preventDefault();
        //     $('#billInfoModal').modal('show');
        // });
        $('.btnChequeSign').on('click',function(e){
            e.preventDefault();
            $('#applyChequeSign').modal('show');
        });
        $('.modalClose').on('click',function(){
            $('#billInfoModal').modal('hide');
            $('#applyChequeSign').modal('hide');
        });

        $('#addCheque').on('click',function(){
            var append = 
                `
                <br>
                <hr>
                <br>
                </div>
                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-lg-8">
                        <div class="form-group">
                            <label for="">Cheuqe Number</label>
                            <input type="number" name="chequeNum[]"class="form-control" id="chequeNum" placeholder="0790" required>
                            <label for="payeeLine">Pay to the Order Of<sup class="text-primary">&#10033;</sup></label>
                            <input type="text" class="form-control" id="payeeLine" value="Tugmaster Bargepool" placeholder="Tugmaster Bargepool" disabled>
                            <div class="invalid-feedback">
                                Please fill in the Payee.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-4">
                        <div class="form-group">
                            <label for="chequeAmount">Amount<sup class="text-primary">&#10033;</sup></label>
                            <div class="input-group">
                                <input id="chequeAmount" name="chequeAmount[]" type="number" class="form-control" placeholder="12000" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">&#8369;</span>
                                </div>
                                <div class="invalid-feedback">
                                    Please fill in the Amount.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="amountWords" placeholder="Twelve Thousand" required readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6 class="text-primary">Bank of the Philippine Islands</h6>
                            </li>
                        </ul>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Bank Location</h6>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6 col-sm-6 col-lg-6">
                        <ul class="list-inline">
                            <li class="list-inline-item text-primary">
                                <h5>Memo : </h5>
                            </li>
                            <li class="list-inline-item">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="chequeMemo[]" id="chequeMemo">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>`;
            console.log('append');
            $(append).appendTo('#append');
        });
    });
    var url = '/consignee/paymentbilling/payment';
    
    
    function billinfo(id){
        console.log('hi');
        console.log(id); 
        
        $.ajax({
            url : '/consignee/paymentbilling/payment/' + id + '/info',
            type : 'GET',
        dataType : 'JSON',
        aysnc : true,
        success : function(data){
            console.log('success', data);
            var counter = (data.Results[0]);
            
            $('#amount').html(data.Results[0].fltJOAmount);
            $('#delayfee').html(data.Results[0].fltTugboatDelayFee);
            $('#conviolationfee').html(data.Results[0].fltConsigneeViolationFee);
            $('#conlatefee').html(data.Results[0].fltConsigneeLateFee);
            $('#condamagefee').html(data.Results[0].fltConsigneeDamageFee);
            $('#comdamagefee').html(data.Results[0].fltCompanyDamageFee);
            $('#comviolationfee').html(data.Results[0].fltCompanyViolationFee);
            $('#discount').html(data.Results[0].intDiscount);
            $('#total').html(data.Results[0].fltBalanceRemain);
            $('#billInfoModal').modal('show');  
        }
        });
  }

  function validate(amount){
      console.log(amount);
      var counter = 0;
      var balance = $('#balance').val();
      var ChequeAmount = [];
        $("input[name='chequeAmount[]']").each(function(ctr){
            ChequeAmount[ctr] = $(this).val();
            ctr++;
            counter = Number(counter) + Number($(this).val());
        })
        counter = Number(counter) + Number(balance);
        console.log(counter);
        if(amount > counter){
            toastr.error('KULANG!!', 'DAGDAGAN MO PA!', {
                closeButton: true,
                debug: false,
                timeOut: 2000,
                positionClass: "toast-bottom-right",
                preventDuplicates: true,
                showDuration: 300,
                hideDuration: 300,
                showMethod: "slideDown",
                hideMethod: "slideUp"
            });
        }
        else
        {
            return Finalize();
        }
    
  }
  function Finalize(){
    var Fee = $('#fee').val();
    var Balance = $('#balance').val();
    var ChequeDate = $('#cDate').val();
    var id = $('#idBill').val();
        
    var ChequeMemo = [];
    $("input[name='chequeMemo[]").each(function(memo){
        ChequeMemo[memo] = $(this).val();
        memo++;
    })

    var ChequeNum = [];
        $("input[name='chequeNum[]").each(function(num){
            ChequeNum[num] = $(this).val();
            num++;
        })
    var counter;
    var ChequeAmount = [];
        $("input[name='chequeAmount[]").each(function(amount){
            ChequeAmount[amount] = $(this).val();
            amount++;
        counter = Number(counter) + Number($(this).val() + Number(balance));
        console.log(counter);
        })
    console.log(ChequeDate);
    console.log(id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        url : '/consignee/paymentbilling/payment/store',
        type : 'POST',
        data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
            ChequeNum : ChequeNum,
            ChequeDate : ChequeDate,
            ChequeAmount : ChequeAmount,
            ChequeMemo : ChequeMemo,
            BillID : id,
            Balance : Balance,
            Fee : Fee,

        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            swal({
                title: "The Billing has been Finalize",
                text: "Sent",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = '/consignee/paymentbilling/billing';
                }
            });                       
        },
        error : function(error){
            console.log(error)
            swal({
                title: "The Billing has been Finalize",
                text: "Sent",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = '/consignee/paymentbilling/billing';
                }
            });        
        } 
    });
}
