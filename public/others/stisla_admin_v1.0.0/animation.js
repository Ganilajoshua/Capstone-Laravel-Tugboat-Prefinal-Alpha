var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
type: 'line',
data: {
    labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
    datasets: [{
    label: 'Statistics',
    data: [460, 458, 330, 502, 430, 610, 488],
    borderWidth: 2,
    backgroundColor: 'rgb(87,75,144)',
    borderColor: 'rgb(87,75,144)',
    borderWidth: 2.5,
    pointBackgroundColor: '#ffffff',
    pointRadius: 4
    }]
},
options: {
    legend: {
    display: false
    },
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