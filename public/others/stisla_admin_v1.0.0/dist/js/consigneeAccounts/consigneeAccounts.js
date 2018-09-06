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
            var imageVar = (data.user[0].strCompanyName).charAt(0);
            console.log(imageVar);
            var appendProfile = 
            `<div class="box-body box-profile">
                <div class="text-center">
                    <img class="img-responsive" src="/others/stisla_admin_v1.0.0/dist/img/Alphabet/`+imageVar+`tbLogo.png" height="150px" width="150px" alt="User profile picture">
                </div>
            
                <h3 class="profile-username text-center mt-4">` + data.user[0].strCompanyName + `</h3>
            
                <h6 class="text-muted text-center">`+ data.user[0].enumUserType +`</h6>
            
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Address : </b> <a class="pull-right">` + data.user[0].strCompanyAddress + `</a>
                    </li>
                    <li class="list-group-item">
                        <b>User Name : </b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email : </b> <a class="pull-right">`+ data.user[0].email + `</a>
                    </li>
                    <li class="list-group-item">
                        <b>Telephone Number : </b> <a class="pull-right">`+ data.user[0].strCompanyContactTNum+`</a>
                    </li>
                    <li class="list-group-item">
                        <b>Mobile Number : </b><a class="pull-right">`+ data.user[0].strCompanyContactPNum +`</a>
                    </li>
                </ul>
            </div>`
            $(appendProfile).appendTo('#consigneeDetails');
            $('#accountInfoModal').modal('show');
        },
        error : function(error){
            console.log('Request Failed');
            throw error;
        }
    });
}