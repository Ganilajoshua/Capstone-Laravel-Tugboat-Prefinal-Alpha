
$(document).ready(function(){
    console.log('hello');
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
            ['insert', [ 'link']],
            ['help']
        ]
    });
      });
var url = '/administrator/utilities/termscondition';

// function alert(){
//         toastr.success('Changes Saved.', 'Success!', {
//             closeButton: true,
//             debug: false,
//             timeOut: 2000,
//             positionClass: "toast-bottom-right",
//             preventDuplicates: true,
//             showDuration: 300,
//             hideDuration: 300,
//             showMethod: "slideDown",
//             hideMethod: "slideUp"
//         });
// }

function alert(id){
    console.log(id);

    var terms = $('#terms').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : url + '/store',
        type : 'POST',
        data : { "_token" : $('meta[name="csrf-token"]').attr('content'),
            id : id,
            terms : terms,
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            toastr.success('Changes Saved.', 'Success!', {
                closeButton: true,
                debug: false,
                timeOut: 2000,
                positionClass: "toast-bottom-right",
                preventDuplicates: true,
                showDuration: 300,
                hideDuration: 300,
                showMethod: "slideDown",
                hideMethod: "slideUp"
            },
            function(isConfirm){
                if(isConfirm){
                }
            });                       
        },
        error : function(error){
            throw error;
        } 
    });
}