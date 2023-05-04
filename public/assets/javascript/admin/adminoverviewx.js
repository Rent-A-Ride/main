console.log("kalana");
document.addEventListener("DOMContentLoaded",function(){
    test2();
  });
  // Create AJAX request to retrieve data from server
  function test2(){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost:8080/admin/charts", true);
  
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Parse JSON response from server
            var data = JSON.parse(this.responseText);
            console.log(data);
  
//             const revenue_array = [];
//             const label_array = [];
  
//   for (let i = 0; i < data.length; i++) {
//     revenue_array.push(data[i].);
//     label_array.push(data[i].);
//   }
            // Create pie chart using Chart.js
            var ctx1 = document.getElementById('test1').getContext('2d');
            var myCharts = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: ['A','B','C'],
                    datasets: [{
                        label: 'Monthly Revenue',
                        data: [1000,500,3000],
                        backgroundColor: '#FAB84C',
                        borderColor: '#393646',
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