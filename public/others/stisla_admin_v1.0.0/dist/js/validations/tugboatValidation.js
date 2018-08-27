$(document).ready(function(){
    $('#AddFormInfo').bootstrapValidator({
        feedbackIcons: {
            valid : 'glyphicon glyphicon-ok',
            invalid : 'glyphicon glyphicon-remove',
            validating : 'glyphicon glyphicon-refresh',
        },
        fields : {
            AddName : {
                validators : {
                    notEmpty : {
                        message :  'Please Enter A Value' 
                    }
                }
            },
            AddLength : {
                validators : {
                    notEmpty : {
                        message :  'Please Enter A Value' 
                    }
                } 
            }
        }
    });
});