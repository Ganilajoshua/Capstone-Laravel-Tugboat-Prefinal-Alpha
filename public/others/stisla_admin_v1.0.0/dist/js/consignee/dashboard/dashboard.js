var url = '/consignee/dashboard';

$(document).ready(function(){
    $('#menudashboardD').addClass('active');
    $('#menudashboardM').addClass('active');
    console.log('hi');

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
        success : function(data,response){
            console.log(data);
            var currDate = moment().format('YYYY-MM-DD');
            var expire = data.contract[0].datContractExpire;
            var active = data.contract[0].datContractActive;
            var notifyMonth = moment(expire).subtract(1, 'M').format('YYYY-MM-DD');
            var startNotify = moment(active).add(1, 'd').format('YYYY-MM-DD');
            var endNotify = moment(active).add(2, 'd').format('YYYY-MM-DD');
            console.log(startNotify, endNotify);
            console.log(currDate);
            console.log(notifyMonth);
            console.log(data.contract[0].datContractExpire);
            if(currDate == expire){
                toastr.error('You Contract has Expired on &nbsp;' + data.contract[0].datContractExpire, "Contract Status", { positionClass: 'toast-bottom-right', preventDuplicates: true, "preventDuplicates": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "show",
                "hideMethod": "hide"});
            }else if(currDate == notifyMonth){
                toastr.warning('Your Contract will expire on ' + data.contract[0].datContractExpire, "Contract Status", { positionClass: 'toast-bottom-right', preventDuplicates: true, });
            }else if(currDate == startNotify || currDate == endNotify || currDate == active){
                toastr.success('Your Contract Will Expire on &nbsp;' + data.contract[0].datContractExpire, "Contract Status", { positionClass: 'toast-bottom-right', preventDuplicates: true, 
                "progressBar": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "show",
                "hideMethod": "hide"
            });
            }else{
                console.log('HI');
            }

        },
        error : function(error){

        }
    });

});
