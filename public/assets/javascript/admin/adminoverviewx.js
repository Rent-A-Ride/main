document.addEventListener("DOMContentLoaded", function() {
  test2();
});

function test2() {
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "http://localhost:8080/admin/charts", true);

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var data = JSON.parse(this.responseText);
      const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
                          'July', 'August', 'September', 'October', 'November', 'December'];

      const labels = data.map(d => `${monthNames[d.month - 1]} ${d.year}`);
      const totals = data.map(d => +d.total);

      var ctx1 = document.getElementById('test1').getContext('2d');
      var myChart = new Chart(ctx1, {
        type: 'bar', // set chart type to bar
        data: {
          labels: labels,
          datasets: [{
            label: 'Monthly Revenue',
            data: totals,
            backgroundColor: '#FAB84C', // set background color for bars
            borderColor: '#393646', // set border color for bars
            borderWidth: 2
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    }
  };
  xhttp.send();
}
