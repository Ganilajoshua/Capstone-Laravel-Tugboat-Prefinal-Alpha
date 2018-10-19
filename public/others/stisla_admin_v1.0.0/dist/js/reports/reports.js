$(document).ready(function(){
    $('#reportsTree').addClass('active');
    $('.detailedTable').DataTable({columnDefs: [
        { targets: 'noSortAction', orderable: false }
    ] ,
    language: {
        "lengthMenu": 'Display <select class="custom-select custom-select form-control form-control">'+
        '<option hidden>1000</option>'+
        '<option value="10">10</option>'+
        '<option value="25">25</option>'+
        '<option value="50">50</option>'+
        '<option value="100">100</option>'+
        '<option value="-1">All</option>'+
        '</select> records'},
        responsive : true,
    });
    $('.selectReport').select2({
        width: 'resolve',
        placeholder: "Select a report",
        allowClear: false
    });
    
    $('#dateRangePicker').daterangepicker();
      // Charts
      
        var ctxDTReport = document.getElementById("disabledTugboatChart").getContext('2d');
        var disabledTugboatChart = new Chart(ctxDTReport, {
            type: 'bar',
            data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
                label: 'DISABLED TUGBOAT TO',
                data: [460, 458, 330, 502, 430, 610, 488],
                borderWidth: 2,
                backgroundColor: 'rgb(87,75,144)',
                borderColor: 'rgb(87,75,144)',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            },
            {
                label: 'MT Energy Star',
                data: [1000, 200, 300, 200, 150, 25, 700],
                borderWidth: 2,
                backgroundColor: 'rgb(61, 199, 190)',
                borderColor: 'rgb(61, 199, 190)',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
            },
            options: {
            legend: {
                display: true
            },
            responsive: true,
            scales: {
                yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 150
                }
                }],
                xAxes: [{
                gridLines: {
                    display: false
                }
                }]
            },
            }
        });
      
        var ctxJOReport = document.getElementById("joReportChart").getContext('2d');
        var joReportChart = new Chart(ctxJOReport, {
            type: 'line',
            data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
                label: 'JOB ORDER TO',
                data: [430, 610, 488],
                borderWidth: 2,
                borderColor: 'rgb(87,75,144)',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            },
            {
                label: 'MT Energy Star',
                data: [1000, 200, 300, 200, 150, 25, 700],
                borderWidth: 2,
                borderColor: 'rgb(61, 199, 190)',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
            },
            options: {
            legend: {
                display: true
            },
            responsive: true,
            scales: {
                yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 150
                }
                }],
                xAxes: [{
                gridLines: {
                    display: false
                }
                }]
            },
            }
        });
      
        var ctxSalesReport = document.getElementById("salesReportChart").getContext('2d');
        var salesReportChart = new Chart(ctxSalesReport, {
            type: 'line',
            data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
                label: 'SALES TU',
                data: [460, 458, 610, 488],
                borderWidth: 2,
                borderColor: 'rgb(87,75,144)',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            },
            {
                label: 'MT Energy Star',
                data: [1000, 200, 300, 200, 150, 25, 700],
                borderWidth: 2,
                borderColor: 'rgb(61, 199, 190)',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
            },
            options: {
            legend: {
                display: true
            },
            responsive: true,
            scales: {
                yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 150
                }
                }],
                xAxes: [{
                gridLines: {
                    display: false
                }
                }]
            },
            }
        });
      
        var ctxSOAReport = document.getElementById("SOAReportChart").getContext('2d');
        var SOAReportChart = new Chart(ctxSOAReport, {
            type: 'line',
            data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
                label: 'SOA NAMAN TU',
                data: [460, 458, 0, 610, 488],
                borderWidth: 2,
                borderColor: 'rgb(87,75,144)',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            },
            {
                label: 'MT Energy Star',
                data: [1000, 200, 300, 200, 150, 25, 700],
                borderWidth: 2,
                borderColor: 'rgb(61, 199, 190)',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
            },
            options: {
            legend: {
                display: true
            },
            responsive: true,
            scales: {
                yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 150
                }
                }],
                xAxes: [{
                gridLines: {
                    display: false
                }
                }]
            },
            }
        });
      
        var ctsServiceReport = document.getElementById("serviceReportChart").getContext('2d');
        var serviceReportChart = new Chart(ctsServiceReport, {
            type: 'line',
            data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
                label: 'SERVICEEEE',
                data: [460, 430, 610, 488],
                borderWidth: 2,
                borderColor: 'rgb(87,75,144)',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            },
            {
                label: 'MT Energy Star',
                data: [1000, 200, 300, 200, 150, 25, 700],
                borderWidth: 2,
                borderColor: 'rgb(61, 199, 190)',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
            },
            options: {
            legend: {
                display: true
            },
            responsive: true,
            scales: {
                yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 150
                }
                }],
                xAxes: [{
                gridLines: {
                    display: false
                }
                }]
            },
            }
        });

    $('.submitReports').on('click',function(){
        if($('.selectReport').val() == "disabledTugboats"){
            $('.btnGeneratePDF2').hide();
            $('.btnGeneratePDF3').hide();
            $('.btnGeneratePDF4').hide();
            $('.btnGeneratePDF5').hide();
            $('.btnGeneratePDF1').show();
            $('.viewChoice').show();
            $('.rowJobOrderReport').hide();
            $('.rowSalesReport').hide();
            $('.rowSOA').hide();
            $('.rowServiceReport').hide();
            $('.joReportChartRow').hide();
            $('.salesReportChartRow').hide();
            $('.SOAReportChartRow').hide();
            $('.serviceReportChartRow').hide();
            if($('.tableView').hasClass('active')){
                $('.disabledTChartRow').hide();
                $('.rowDisabledTugboats').show();
            }else{
                $('.rowDisabledTugboats').hide();
                $('.disabledTChartRow').show();
            }
        }else if($('.selectReport').val() == "jobOrderReport"){
            $('.btnGeneratePDF1').hide();
            $('.btnGeneratePDF3').hide();
            $('.btnGeneratePDF4').hide();
            $('.btnGeneratePDF5').hide();
            $('.btnGeneratePDF2').show();
            $('.viewChoice').show();
            $('.rowDisabledTugboats').hide();
            $('.rowSalesReport').hide();
            $('.rowSOA').hide();
            $('.disabledTChartRow').hide();
            $('.salesReportChartRow').hide();
            $('.SOAReportChartRow').hide();
            $('.serviceReportChartRow').hide();
            if($('.tableView').hasClass('active')){
                $('.joReportChartRow').hide();
                $('.rowJobOrderReport').show();
            }else{
                $('.rowJobOrderReport').hide();
                $('.joReportChartRow').show();
            }
        }else if($('.selectReport').val() == "salesReport"){
            $('.btnGeneratePDF1').hide();
            $('.btnGeneratePDF2').hide();
            $('.btnGeneratePDF4').hide();
            $('.btnGeneratePDF5').hide();
            $('.btnGeneratePDF3').show();
            $('.viewChoice').show();
            $('.rowJobOrderReport').hide();
            $('.rowDisabledTugboats').hide();
            $('.rowSOA').hide();
            $('.rowServiceReport').hide();
            $('.joReportChartRow').hide();
            $('.disabledTChartRow').hide();
            $('.SOAReportChartRow').hide();
            $('.serviceReportChartRow').hide();
            if($('.tableView').hasClass('active')){
                $('.salesReportChartRow').hide();
                $('.rowSalesReport').show();
            }else{
                $('.rowSalesReport').hide();
                $('.salesReportChartRow').show();
            }
        }else if($('.selectReport').val() == "statementOfAccount"){
            $('.btnGeneratePDF1').hide();
            $('.btnGeneratePDF2').hide();
            $('.btnGeneratePDF3').hide();
            $('.btnGeneratePDF5').hide();
            $('.btnGeneratePDF4').show();
            $('.viewChoice').show();
            $('.rowJobOrderReport').hide();
            $('.rowSalesReport').hide();
            $('.rowDisabledTugboats').hide();
            $('.rowServiceReport').hide();
            $('.salesReportChartRow').hide();
            $('.joReportChartRow').hide();
            $('.disabledTChartRow').hide();
            $('.serviceReportChartRow').hide();
            if($('.tableView').hasClass('active')){
                $('.SOAReportChartRow').hide();
                $('.rowSOA').show();
            }else{
                $('.rowSOA').hide();
                $('.SOAReportChartRow').show();
            }
        }else if($('.selectReport').val() == "serviceReport"){
            $('.btnGeneratePDF1').hide();
            $('.btnGeneratePDF2').hide();
            $('.btnGeneratePDF3').hide();
            $('.btnGeneratePDF4').hide();
            $('.btnGeneratePDF5').show();
            $('.rowJobOrderReport').hide();
            $('.rowSalesReport').hide();
            $('.rowSOA').hide();
            $('.rowDisabledTugboats').hide();
            $('.SOAReportChartRow').hide();
            $('.salesReportChartRow').hide();
            $('.joReportChartRow').hide();
            $('.disabledTChartRow').hide();
            if($('.tableView').hasClass('active')){
                $('.serviceReportChartRow').hide();
                $('.rowServiceReport').show();
            }else{
                $('.rowServiceReport').hide();
                $('.serviceReportChartRow').show();
            }
        }else{
            $('.btnGeneratePDF1').hide();
            $('.btnGeneratePDF2').hide();
            $('.btnGeneratePDF3').hide();
            $('.btnGeneratePDF4').hide();
            $('.btnGeneratePDF5').hide();
            $('.viewChoice').hide();
            toastr.error('Please select a report first.', 'Select A Report!', {
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
        }
    });

    $('.tableView').on('click',function(){
        $('.chartView').removeClass('active');
        $('.tableView').addClass('active');
        $('.chartLayout').hide();
        $('.tableLayout').show();
        if($('.selectReport').val() == "disabledTugboats"){
            $('.rowJobOrderReport').hide();
            $('.joReportChartRow').hide();
            $('.rowSalesReport').hide();
            $('.salesReportChartRow').hide();
            $('.rowSOA').hide();
            $('.SOAReportChartRow').hide();
            $('.rowServiceReport').hide();
            $('.serviceReportChartRow').hide();
            $('.disabledTChartRow').hide();
            $('.rowDisabledTugboats').show();
        }else if($('.selectReport').val() == "jobOrderReport"){
            $('.disabledTChartRow').hide();
            $('.rowDisabledTugboats').hide();
            $('.rowSalesReport').hide();
            $('.salesReportChartRow').hide();
            $('.rowSOA').hide();
            $('.SOAReportChartRow').hide();
            $('.rowServiceReport').hide();
            $('.serviceReportChartRow').hide();
            $('.joReportChartRow').hide();
            $('.rowJobOrderReport').show();
        }else if($('.selectReport').val() == "salesReport"){
            $('.disabledTChartRow').hide();
            $('.rowDisabledTugboats').hide();
            $('.rowJobOrderReport').hide();
            $('.joReportChartRow').hide();
            $('.rowSOA').hide();
            $('.SOAReportChartRow').hide();
            $('.rowServiceReport').hide();
            $('.serviceReportChartRow').hide();
            $('.salesReportChartRow').hide();
            $('.rowSalesReport').show();
        }else if($('.selectReport').val() == "statementOfAccount"){
            $('.disabledTChartRow').hide();
            $('.rowDisabledTugboats').hide();
            $('.rowJobOrderReport').hide();
            $('.joReportChartRow').hide();
            $('.rowSalesReport').hide();
            $('.salesReportChartRow').hide();
            $('.rowServiceReport').hide();
            $('.serviceReportChartRow').hide();
            $('.SOAReportChartRow').hide();
            $('.rowSOA').show();
        }else if($('.selectReport').val() == "serviceReport"){
            $('.disabledTChartRow').hide();
            $('.rowDisabledTugboats').hide();
            $('.rowJobOrderReport').hide();
            $('.joReportChartRow').hide();
            $('.rowSalesReport').hide();
            $('.salesReportChartRow').hide();
            $('.rowSOA').hide();
            $('.SOAReportChartRow').hide();
            $('.serviceReportChartRow').hide();
            $('.rowServiceReport').show();
        }
    });
    $('.chartView').on('click',function(){
        $('.tableView').removeClass('active');
        $('.chartView').addClass('active');
        $('.tableLayout').hide();
        $('.chartLayout').show();
        if($('.selectReport').val() == "disabledTugboats"){
            $('.rowJobOrderReport').hide();
            $('.joReportChartRow').hide();
            $('.rowSalesReport').hide();
            $('.salesReportChartRow').hide();
            $('.rowSOA').hide();
            $('.SOAReportChartRow').hide();
            $('.rowServiceReport').hide();
            $('.serviceReportChartRow').hide();
            $('.rowDisabledTugboats').hide();
            $('.disabledTChartRow').show();
        }else if($('.selectReport').val() == "jobOrderReport"){
            $('.disabledTChartRow').hide();
            $('.rowDisabledTugboats').hide();
            $('.rowJobOrderReport').hide();
            $('.rowSalesReport').hide();
            $('.salesReportChartRow').hide();
            $('.rowSOA').hide();
            $('.rowServiceReport').hide();
            $('.serviceReportChartRow').hide();
            $('.SOAReportChartRow').hide();
            $('.joReportChartRow').show();
        }else if($('.selectReport').val() == "salesReport"){
            $('.disabledTChartRow').hide();
            $('.rowDisabledTugboats').hide();
            $('.rowJobOrderReport').hide();
            $('.joReportChartRow').hide();
            $('.rowSOA').hide();
            $('.SOAReportChartRow').hide();
            $('.rowServiceReport').hide();
            $('.serviceReportChartRow').hide();
            $('.rowSalesReport').hide();
            $('.salesReportChartRow').show();
        }else if($('.selectReport').val() == "statementOfAccount"){
            $('.disabledTChartRow').hide();
            $('.rowDisabledTugboats').hide();
            $('.rowJobOrderReport').hide();
            $('.joReportChartRow').hide();
            $('.rowSalesReport').hide();
            $('.salesReportChartRow').hide();
            $('.rowServiceReport').hide();
            $('.serviceReportChartRow').hide();
            $('.rowSOA').hide();
            $('.SOAReportChartRow').show();
        }else if($('.selectReport').val() == "serviceReport"){
            $('.disabledTChartRow').hide();
            $('.rowDisabledTugboats').hide();
            $('.rowJobOrderReport').hide();
            $('.joReportChartRow').hide();
            $('.rowSalesReport').hide();
            $('.salesReportChartRow').hide();
            $('.rowSOA').hide();
            $('.SOAReportChartRow').hide();
            $('.rowServiceReport').hide();
            $('.serviceReportChartRow').show();
        }
    });
});