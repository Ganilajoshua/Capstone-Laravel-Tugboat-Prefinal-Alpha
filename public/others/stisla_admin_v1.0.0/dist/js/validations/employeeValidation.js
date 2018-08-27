$(document).ready(function(){
    $('#AddFormInfo').bootstrapValidator({
        feedbackIcons: {
            valid : 'glyphicon glyphicon-ok',
            invalid : 'glyphicon glyphicon-remove',
            validating : 'glyphicon glyphicon-refresh',
        },
        fields : {
            AddNLastName : {
                validators : {
                    notEmpty : {
                        message :  'Please Enter A Value' 
                    }
                }
            },
            AddFirstName : {
                validators : {
                    notEmpty : {
                        message :  'Please Enter A Value' 
                    }
                } 
            }
        }
    });
})