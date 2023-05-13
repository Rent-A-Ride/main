// console.log("Kalana");
document.addEventListener("DOMContentLoaded", function() {
    test2();
  });
  
  function test2() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost:8080/admin/chart2", true);
  
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
                            'July', 'August', 'September', 'October', 'November', 'December'];
        console.log(data);
        const labels = data.map(d => `${monthNames[d.month - 1]} ${d.year}`);
        const totals = data.map(d => +d.total);
  
        var ctx2 = document.getElementById('test3').getContext('2d');
        const myChart = new Chart(ctx2, {
            type: 'line', // Set the type of chart to be a line chart
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Bookings', // Set the label for the dataset
                    data: totals, // Set the data for the dataset
                    borderColor: 'blue', // Set the border color for the line
                    borderWidth: 1 // Set the border width for the line
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Start the y-axis at zero
                    }
                }
            }
        });
       
        
        
        
        
        
        
        
      }
    };
    xhttp.send();
  }
  







