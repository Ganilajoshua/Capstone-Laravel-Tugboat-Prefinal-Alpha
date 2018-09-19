// On Click Show Selected CheckBoxes on Create Team Modal

// Captains
$('.captCheckbox').on('change',function(){
    
    var id = $(this).data('id');
    var name = $(this).data('name');
    var position = $(this).data('position');    
    if($(this).prop('checked') == true){
        console.log('HI');
        console.log(id , name);
        appendSelected =
        `<div class="col-lg-4 col-md-12 col-sm-12"  id="addCaptain${id}">
            <div class="card bg-primary">
                <div class="card-header">
                    <h4>${name}</h4>
                    <small>${position}</small>
                </div>
            </div>
        </div>`;
        $(appendSelected).appendTo('.viewSelected');                                
    }else{
        console.log('PAYAMAN');
        console.log(id, name);
        $(`#addCaptain${id}`).fadeOut(200,function(){
            $(this).remove();
        });
    }
});

// Chief Engineers Checkbox
$('.chiefCheckbox').on('change',function(){
    var id = $(this).data('id');
    var name = $(this).data('name');
    var position = $(this).data('position');
    if($(this).prop('checked') == true){
        console.log('HI');
        console.log(id , name);
        appendSelected =
        `<div class="col-lg-4 col-md-12 col-sm-12" id="addChief${id}">
            <div class="card bg-info" id="addDismissChiefCard${id}">
                <div class="card-header">
                    <h4>${name}</h4>
                    <small>${position}</small>
                </div>
            </div>
        </div>`;
        $(appendSelected).appendTo('.viewSelected');                                
    }else{
        console.log('PAYAMAN');
        console.log(id, name);
        $(`#addChief${id}`).fadeOut(200,function(event){
            $(this).remove();
        });
    }
});

// Crew Checkbox
$('.crewCheckbox').on('change',function(){
    var id = $(this).data('id');
    var name = $(this).data('name');
    var position = $(this).data('position');
    if($(this).prop('checked') == true){
        console.log('HI');
        console.log(id , name);
        appendSelected =
        `<div class="col-lg-4 col-md-12 col-sm-12" id="addCrew${id}">
            <div class="card bg-dark">
                <div class="card-header">
                    <h4>${name}</h4>
                    <small>${position}</small>
                </div>
            </div>
        </div>`;
        $(appendSelected).appendTo('.viewSelected');                                
    }else{
        console.log('PAYAMAN');
        console.log(id, name);
        $(`#addCrew${id}`).fadeOut(200,function(event){
            $(this).remove();
        });
    }
});

// Edit Modal  

// Edit Select All Employees
$('.selectAll').on('click',function(){
    console.log('hi');    
    $('.employeesCheckbox').prop('checked',true);
});

// Edit Deselect All Employees
$('.deselectAll').on('click',function(){
    console.log('hi');    
    $('.employeesCheckbox').prop('checked',false);
});

// Close Any Modal
$('.closeInfoModal').on('click',function(){
    $('.modal').modal('hide');
});
