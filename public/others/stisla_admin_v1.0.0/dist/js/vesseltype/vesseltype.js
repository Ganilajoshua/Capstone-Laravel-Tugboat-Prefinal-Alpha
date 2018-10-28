var url = '/administrator/maintenance/vesseltype';

$(document).ready(function(){
    $('#maintenanceTree').addClass("active");
    $('#vesselTypeMenu').addClass("active");

    // Define Ajax Setup Headers For CSRF Token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

// Close Modal
$('.closeButton').on('click',function(){
    $('.modal').modal('hide');
});

// Add Button 
$('.createVesselType').on('click',function(){
    $('#addVesselTypeModal').modal('show');
});

// Add Vessel Type Button Submit
function storeVesselType(){
// $('.storeVesselType').on('click',function(){
    console.log('hi');
    name = $('#addVesselTypeName').val();   
    console.log(name);
    $.ajax({
        url : `${url}/store`,
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            vesselTypeName : name,
        },
        beforeSend : (request)=>{
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : (data, response)=>{
            console.log(data);
            console.log(response);
            swal({
                title: "Success",
                text: "Vessel Type Created",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            function(isConfirm){
                if(isConfirm){
                    location.reload();
                }
            });
        },
        error : (error)=>{
            throw error;
        }
    });
// });
};
// Edit Vessel Type Button
// function editVesselType(){
$('.editVesselType').on('click',function(){
    var editID = $(this).data('id');
    console.log(editID);
    $.ajax({
        type : 'GET',
        url : `${url}/${editID}/edit`,
        dataType : 'JSON',
        success : (data , response)=>{
            console.log(data);
            console.log(response);
            $('.updateVesselType').data('id',data.vessel.intVesselTypeID);
            $('#editVesselTypeName').val(data.vessel.strVesselTypeName);
            $('#editVesselTypeModal').modal('show');
        },
        error : (error)=>{
            throw error;
        }
    })
});
// };

// Edit Vessel Type Button Submit
function updateVesselType(){
// $('.updateVesselType').on('click',function(){
    var vesselTypeID = $(this).data('id');
    var vesselTypeName = $('#editVesselTypeName').val();

    $.ajax({
        url : `${url}/update`,
        type : 'POST',
        data : {
            "_token" : $('meta[name="csrf-token"]').attr('content'),
            vesselTypeID : vesselTypeID,
            vesselTypeName : vesselTypeName,
        },
        beforeSend : (request)=>{
            return request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        },
        success : (data, response)=>{
            console.log(data);
            console.log(response);
            swal({
                title: "Success",
                text: "Vessel Type Updated",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: true,
            },
            function(isConfirm){
                if(isConfirm){
                    location.reload();
                }
            });
        },
        error : (error)=>{
            throw error;
        }
    });
// });
};
// Delete Vessel Type Button 
$('.deleteVesselType').on('click',function(){
    console.log($(this).data('id'));
    var vesselID = $(this).data('id');
    $.ajax({
        url : `${url}/${vesselID}/edit`,
        type : 'GET',
        dataType : 'JSON',
        success : (data, response)=>{
            swal({
                title: "Are You Sure?",
                text: "You will not be able to recover " + data.vessel.strVesselTypeName ,
                type: "error",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: true
            },()=>{
                $.ajax({
                    url : `${url}/${vesselID}/delete`,
                    type : 'GET',
                    dataType : 'JSON',
                    success : function(response){
                        console.log('Data Deleted');
                        console.log(response);
                        swal({
                            title: "Success",
                            text: "Vessel Type Deleted",
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
                })
            });
        },
        error : (error)=>{
            throw error;
        }
    });
});