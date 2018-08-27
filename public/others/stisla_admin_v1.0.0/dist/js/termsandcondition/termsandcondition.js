$(document).ready(function(){
    $('#maintenanceTree').addClass("active");
    $('#termsconditionMenu').addClass("active");
    $('#termsconditionModal').on('click',function(e){
        e.preventDefault(); 
    });

    $('.summernoteContract').summernote({
        minHeight: 350,
        disableDragAndDrop: true,
        fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '26', '28', '36', '48', '72'],
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontname'],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize'],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['table', 'link']],
            ['help']
        ]
    });
});

var url = '/administrator/maintenance/termsandcondition';

function createTermsCondition(){
    var title = $('#addTermsConditionTitle').val();
    var details = $('#addTermsConditionDetails').val();
    console.log(title, details);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        url : url + '/store',
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            termsconditionTitle : title,
            termsconditionDetails : details,
        },
        beforeSend : function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data, response){
            console.log(response);
            console.log(data);
            console.log('Success');
            swal({
                title: "Success",
                text: "Terms and Conditions Created",
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

function showTermsCondition(showID){
   
    $('.termsconditionInfoModalBody').empty();
    console.log('Trying to get Data');
    console.log(showID);
    $.ajax({
        url : url + '/' + showID + '/show',
        type : 'GET',
        dataType : 'JSON',
        // async : true,
        success : function(data, response){
            console.log(data);
            $('#termsID').val(data.terms.intTermsConditionID);
            appendFields = 
            "<h2>"+data.terms.strTermsConditionTitle+"</h3>"+
            "<p>"+data.terms.strTermsConditionDesc+"</p>";   
            $(appendFields).appendTo('.termsconditionInfoModalBody');
            $('#viewTermsInfo').modal('show');
        },
        error : function(error){
            // console.log('reach');
            throw error;
        }
    });
    
}
