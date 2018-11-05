var url = '/consignee/dashboard';

$(document).ready(function(){
    $('#menudashboardD').addClass('active');
    $('#menudashboardM').addClass('active');
    $('#breadPB').hide();
    $('#breadSlash').hide();
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
            console.log(data.contract[0].intContractListID);
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
                $.ajax({
                    url : `${url}/setcontractexpired`,
                    type : 'POST',
                    data : {
                        "_token" : $('meta[name="csrf-token"]').attr('content'),
                        contractID : data.contract[0].intContractListID,
                    },
                    success : (data, response)=>{
                        toastr.error('You Contract has Expired &nbsp;', "Contract Status", { positionClass: 'toast-bottom-right', preventDuplicates: true, "preventDuplicates": true,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "show",
                        "hideMethod": "hide"});
                    },
                    error : (error)=>{
                        throw error;
                    }
                });
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
    $.simpleWeather({
        location: 'Manila, Philippines',
        unit: 'c',
        success: function(weather) {
          html = '<h2>'+weather.temp+'&deg;'+weather.units.temp+'</h2>';
          html += '<ul><li>'+weather.city+', '+weather.region+'</li>';
          html += '<li class="currently">'+weather.currently+'</li>';
          html += '<li>'+weather.alt.temp+'&deg;F</li></ul>';
          
      
          $("#weather").html(html);
        },
        error: function(error) {
          console.log(error);
        }
      });
});
