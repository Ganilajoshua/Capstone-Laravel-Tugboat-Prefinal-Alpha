var url = '/administrator/maintenance/goods';

$(document).ready(function(){
    $('#maintenanceTree').addClass("active");
    $('#goodsMenu').addClass("active");
    $('#addGoodsButton').on('click',function(){
        $('#addGoodsModal').modal('show');
    });
    $('.modalClose').on('click',function(){
        $('#addGoodsModal').modal('hide');
        $('#editGoodsModal').modal('hide');
    });
    
    $(".goodsCheckbox").on('change',function(){
        var id = $(this).data('id');
        var mode = $(this).prop('checked');
        console.log(id)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : url + '/activate',
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
                window.location = url;
            },
            error : function(error){
                throw error;
            }
        });
    });
});

//Add new goods
function createGoods(){
    var name = $('#addGoodsName').val();
    var rate = $('#addGoodsRate').val(); 

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
            goodsName : name,    
            goodsRate : rate
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            console.log('success pota');
            $('#addGoodsModal').modal('hide');
            console.log(data);
            swal({
                title: "Success",
                text: "Goods Added",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = url ; 
                }
            });                       
        },
        error : function(error){
            console.log(error.responseText);
            toastr.error('Duplicate Data.', name + ' is already taken', {
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
            // console.log('title', error.errors.title);
            // console.log('body', error.errors.body);
        }

    });

}
//Edit goods
function editGoods(goodsID){
    $.ajax({
        url : url + '/' + goodsID + '/edit',
        type : 'GET',
        dataType: 'JSON',
        success : function(data){
            console.log('Data Received', data);
            $('#editGoodsName').val(data.goods.strGoodsName);
            $('#editGoodsRate').val(data.goods.fltRateperTon);
            $('#editIDhide').val(data.goods.intGoodsID);
            $('#editGoodsModal').modal('show');
        },
        error : function(error){
            throw error;
        }
    });
}
//Post Update Goods
function updateGoods(){
    var id = $('#editIDhide').val();
    var name = $('#editGoodsName').val();
    var rate = $('#editGoodsRate').val();

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
            goodsID : id,
            goodsName : name,    
            goodsRate : rate,
        }, 
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : function(data){
            $('#editGoodsModal').modal('hide');
            console.log('success pota');
            console.log(data);
            swal({
                title: "Success",
                text: "Goods Updated",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
                timer : 1500
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = url ; 
                }
              });                       
        },
        error : function(error){
            throw error;
        }

    });
}
//delete Goods
function deleteGoods(goodsID){
    $.ajax({
        url : url + '/' + goodsID + '/edit',
        type : 'GET',
        dataType: 'JSON',
        success : function(data){
            swal({
                title: "Are You Sure?",
                text: "You will not be able to recover " + data.goods.strGoodsName ,
                type: "error",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: true
            },function(){
                $.ajax({
                    url : url + '/' + goodsID + '/delete',
                    type : 'GET',
                    dataType : 'JSON',
                    success : function(response){
                        console.log('Data Deleted');
                        console.log(response);
                        swal({
                            title: "Success",
                            text: "Goods Deleted",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Ok",
                            closeOnConfirm: true,
                            timer : 1000
                        },
                        function(isConfirm){
                            if(isConfirm){
                                window.location = url ;
                            }
                        })
                    },
                    error : function(error){
                        throw error;
                    }
                });
            });
        },
        error : function(error){
            throw error;
        }
    });
}