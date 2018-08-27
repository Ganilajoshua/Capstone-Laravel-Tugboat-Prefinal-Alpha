function submitTugboat(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var name = $('#sumName').text();
    var length = $('#sumLength').text();
    var breadth = $('#sumBreadth').text();
    var depth = $('#sumDepth').text();
    var hp = $('#sumHorsePower').text();
    var maxspeed = $('#sumMaxSpeed').text();
    var bpull = $('#sumBollardPull').text();
    var gton = $('#sumGrossTonnage').text();
    var nton = $('#sumNetTonnage').text();
    var drydocked = $('#sumDryDocked').text();
    var licensenum = $('#sumLicenseNum').text();
    var licenseexp = $('#sumLicenseExp').text();
    
    var tugboats = {
        name : name,
        length : length,
        breadth : breadth,
        depth : depth,
        horsepower : hp,
        maximumspeed : maxspeed,
        bollardpull : bpull,
        grosstonnage : gton,
        nettonnage : nton,
        lastdrydocked : drydocked,
        licensenumber : licensenum,
        licenseexpiration : licenseexp
    };
    
    console.log('Submission');
    console.log(name, length);
    console.log('Trying to Send Request');
    
    $.ajax({
        type : "POST",
        url : "/tugboat/store",
        dataType : 'JSON', 
        data : JSON.stringify(tugboats),
        contentType: 'application/json; charset=utf-8',
        
        success: function(data){
            console.log('Success Request Sent');
            console.log(tugboat);
            throw data;
        },
        error: function(error){
            console.log('Request Failed!');
            console.log(tugboats);
            alert('Server not Responded');
            throw error;
        }
    });
}