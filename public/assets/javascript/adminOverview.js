var xValues = ["Car", "Van", "Motor-cycle", "Scooter"];
        var yValues = [55, 49, 44, 24];
        var barColors = [
          "#E14D2A",
          "#FFFF00",
          "#1363DF",
          "#3CCF4E",
          
        ];
        
        new Chart("myChart", {
          type: "pie",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            title: {
              display: true,
              text: "RENT-A-RIDE VEHICLES"
            }
          }
        });