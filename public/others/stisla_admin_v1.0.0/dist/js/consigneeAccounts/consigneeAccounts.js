var url = '/administrator/transactions/consignee';

$(document).ready(function(){
    // $('.activate:input:checkbox').change(function(){
    //     var id = $(this).data('id');
    //     console.log(id);
    // }); 
    $('.closeModalButton').on('click',function(){
        $('#accountInfoModal').modal('hide');
    });
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
function viewConsigneeDetails(companyID){
    console.log(companyID);
    $.ajax({
        url : url + '/' + companyID + '/show',
        type : 'GET',
        dataType: 'JSON',
        success : function(data){
            console.log('Data Recieved', data);
            $('#consigneeDetails').empty();
            $('#consigneeName').html(data.user[0].strCompanyName)
            var appendBody = 
                "<div class='row mt-2'>" +  
                    "<div class='col-12'>" +
                        "<ul class='list-inline'> " + 
                            "<li class='list-inline-item text-primary'>" +
                                "<h6>Company Address : </h6></li>" + 
                            "<li class='list-inline-item'>" + 
                                "<h6>"+ data.user[0].strCompanyAddress +"</h6></li>" +
                        "</ul>" +
                    "</div>"+
                    "<div class='col-6'>" +
                        "<ul class='list-inline'> " + 
                            "<li class='list-inline-item text-primary'>" +
                                "<h6>Telephone Number : </h6></li>" + 
                            "<li class='list-inline-item'>" + 
                                "<h6>"+ data.user[0].strCompanyContactTNum +"</h6></li>" +
                        "</ul>" +
                        "<ul class='list-inline'> " + 
                            "<li class='list-inline-item text-primary'>" +
                                "<h6>Mobile Number : </h6></li>" + 
                            "<li class='list-inline-item'>" + 
                                "<h6>"+ data.user[0].strCompanyContactPNum +"</h6></li>" +
                        "</ul>" +
                        "<ul class='list-inline'> " + 
                            "<li class='list-inline-item text-primary'>" +
                                "<h6>User Name : </h6></li>" + 
                            "<li class='list-inline-item'>" + 
                                "<h6>"+ data.user[0].name +"</h6></li>" +
                        "</ul>" +
                        "<ul class='list-inline'> " + 
                            "<li class='list-inline-item text-primary'>" +
                                "<h6>Email : </h6></li>" + 
                            "<li class='list-inline-item'>" + 
                                "<h6>"+ data.user[0].strCompanyEmail +"</h6></li>" +
                        "</ul>" +
                    "</div>"+
                "<div>";
                //     <div class='col-6'>
                //         <ul class='list-inline'>
                //             <li class='list-inline-item text-primary'>
                //                 <h6>Starting Location : </h6></li>
                //             <li class='list-inline-item'>
                //                 <h6>PUP</h6></li>
                //         </ul>
                //         <ul class='list-inline'>
                //             <li class='list-inline-item text-primary'>
                //                 <h6>Destination : </h6></li>
                //             <li class='list-inline-item'>
                //                 <h6>Pureza</h6></li>
                //         </ul>
                //         <ul class='list-inline'>
                //             <li class='list-inline-item text-primary'>
                //                 <h6>Goods to be delivered : </h6></li>
                //             <li class='list-inline-item'>
                //                 <h6>Very Good</h6></li>
                //         </ul>
                //     </div>
                // </div>
            $(appendBody).appendTo('#consigneeDetails');
            $('#accountInfoModal').modal('show');
        },
        error : function(error){
            console.log('Request Failed');
            throw error;
        }
    });
}