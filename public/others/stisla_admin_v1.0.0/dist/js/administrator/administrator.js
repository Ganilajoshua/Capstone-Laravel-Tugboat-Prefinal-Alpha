$(document).ready(function(){
  $('#dashboardMenu').addClass("active");
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      datasets: [{
        label: 'MT Energy Pacific',
        data: [460, 458, 330, 502, 430, 610, 488],
        borderWidth: 2,
        borderColor: 'rgb(87,75,144)',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      },
      {
        label: 'MT Energy Masters',
        data: [1000, 200, 300, 200, 150, 25, 700],
        borderWidth: 2,
        borderColor: '#00aeff',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      },
      {
        label: 'MT Energy Venus',
        data: [1231, 223, 2331, 34, 123, 1123, 131],
        borderWidth: 2,
        borderColor: 'rgb(61, 199, 190)',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      },
      {
        label: 'MT Super Tugs',
        data: [1000, 988, 655, 945, 1236, 765, 1988],
        borderWidth: 2,
        borderColor: 'rgb(61, 120, 178)',
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
  
  $.simpleWeather({
    location: 'Manila, Philippines',
    unit: 'c',
    success: function(weather) {
      html = '<h2>'+weather.temp+'&deg;'+weather.units.temp+'</h2>';
      html += '<ul><li>'+weather.city+', '+weather.region+'</li>';
      html += '<li class="currently">'+weather.currently+'</li>';
      html += '<li>'+weather.alt.temp+'&deg;F</li></ul>';
      
  
      $("#weather").html(html);
    },
    error: function(error) {
      console.log(error);
    }
  });
});