// Request Additional Tugboats Modal
$('.requestTugboatButtonModal').on('click',function(){
    $('#requestTugboatModal').modal('show');
}); 

$('.requestTugboat').on('click',function(){
    var companyID = $('#selectTugboatCompany').val();
    var exTugboatDetails = $('#exTugboatDetails').val();
    console.log('Heyaaaa');
    console.log(companyID, exTugboatDetails);
    swal({
        title: "Are you sure?",
        text: "Request For Extra Tugboat(s)?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-info",
        confirmButtonText: "Ok",
        closeOnConfirm: true,
    },(isConfirm)=>{
        $.ajax({
            url : `${url}/requesttugboat`,
            type : 'POST',
            data : { 
                "_token" : $('meta[name="csrf-token"]').attr('content'),
                requestForwardCompanyID : companyID,
                requestDetails : exTugboatDetails,
            }, 
            beforeSend: (request)=>{
                return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            },
            success : (data, response)=>{
                console.log('success pota');
                console.log(data);
                console.log(response);
                swal({
                    title: "Success",
                    text: "Request Sent",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true,
                    timer : 1500
                },
                (isConfirm)=>{
                    if(isConfirm){
                        location.reload();
                    }
                });                       
            },
            error : function(error){
                throw error;
            }
        });
    });
});