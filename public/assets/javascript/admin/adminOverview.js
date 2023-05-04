
document.addEventListener("DOMContentLoaded",function(){
  test();
  
});
// Create AJAX request to retrieve data from server
function test(){
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "http://localhost:8080/admin/chart", true);

  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          // Parse JSON response from server
          var data = JSON.parse(this.responseText);
          console.log(data);

          const veh_count_array = [];
          const label_array = [];

for (let i = 0; i < data.length; i++) {
  veh_count_array.push(data[i].veh_count);
  label_array.push(data[i].veh_type);
}
          // Create pie chart using Chart.js
          var ctx = document.getElementById('myChart').getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'pie',
              data: {
                  labels: label_array,
                  datasets: [{
                      data:veh_count_array ,
                      backgroundColor: [
                          '#A4907C',
                          '#FAB84C',
                          '#F5F5DC',
                          '#1A0000',
                        //   'rgba(153, 102, 255, 0.2)',
                        //   'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                          '#393646',
                          '#393646',
                          '#393646',
                          '#393646',
                          
                      ],
                      borderWidth: 2
                  }]
              },
              options: {}
          });
      }
  };
  xhttp.send();
}


