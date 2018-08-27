var url = '/administrator/transactions/consignee';

$(document).ready(function(){
    // $('.activate:input:checkbox').change(function(){
    //     var id = $(this).data('id');
    //     console.log(id);
    // }); 
    
    $(".checkbox").on('change',function(){
        var id = $(this).data('id');
        var mode = $(this).prop('checked');
        console.log(id)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : '/administrator/transactions/consignee/activate',
            type : 'POST',
            data : {
                "_token" : $('meta[name="csrf-token"]').attr('content'),
                activateID : id,
            },
            beforeSend : function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : function(data, response){
                console.log(response);
                console.log(data);
                console.log('Success');
                window.location = '/administrator/transactions/consignee';
            },
            error : function(error){
                throw error;
            }
        });
    });

    // Change Views
        $('.showCRequests').on('click',function(){
            $('.consigneeActive').css('display', 'none');
            $('.consigneeRequests').css('display','block');
        });
        $('.showCActive').on('click',function(){
            $('.consigneeActive').css('display', 'block');
            $('.consigneeRequests').css('display','none');
        });
        // var checked;
        // var ck_box = $('input[type="checkbox"]:checked').length;
        // if(ck_box > 0){
        //         console.log('Checked');
        //         var checked = 1;
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
    
        //         $.ajax({
        //             url : url + '/activate',
        //             type : 'POST',
        //             data : {
        //                 "_token" : $('meta[name="csrf-token"]').attr('content'),
        //                 activateID : id,
        //                 checked : checked,
        //             },
        //             beforeSend : function (request) {
        //                 return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        //             },
        //             success : function(data, response){
        //                 console.log(response);
        //                 console.log(data);
        //                 console.log('Success');
        //                 window.location = url;
        //             },
        //             error : function(error){
        //                 throw error;
        //             }
        //         });
        //     }else if(ck_box == 0){
        //         var checked = 0;
        //         console.log('Not Checked');
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
    
        //         $.ajax({
        //             url : url + '/activate',
        //             type : 'POST',
        //             data : {
        //                 "_token" : $('meta[name="csrf-token"]').attr('content'),
        //                 activateID : id,
        //                 checked : checked,
        //             },
        //             beforeSend : function (request) {
        //                 return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        //             },
        //             success : function(data, response){
        //                 console.log(response);
        //                 console.log(data);
        //                 console.log('Success');
        //                 window.location = url;
        //             },
        //             error : function(error){
        //                 throw error;
        //             }
        //         });
        //     }
        //     console.log(checked);
            
});