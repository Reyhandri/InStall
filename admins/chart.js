$(function() {
    //parfum
      if ($("#doughnutChart").length) {
        var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
  
        // Fetch data from PHP endpoint using AJAX
        $.ajax({
          url: "pieChart.php",
          type: "GET",
          dataType: "json",
          success: function(response) {
            var labels = response.labels;
            var data = response.data;
  
            var doughnutPieData = {
              datasets: [{
                data:data,
                backgroundColor: [
                  "#1F3BB3",
                  "#FDD0C7",
                  "#52CDFF",
                  "#81DADA"
                ],
                borderColor: [
                  "#1F3BB3",
                  "#FDD0C7",
                  "#52CDFF",
                  "#81DADA"
                ],
              }],
              labels: labels,
            };
  
            var doughnutPieOptions = {
              cutoutPercentage: 50,
              animationEasing: "easeOutBounce",
              animateRotate: true,
              animateScale: false,
              responsive: true,
              maintainAspectRatio: true,
              showScale: true,
              legend: false,
              legendCallback: function(chart) {
                var text = [];
                text.push('<div class="chartjs-legend"><ul class="justify-content-center">');
                var data = chart.data;
                var datasets = data.datasets;
                var labels = data.labels;
                if (datasets.length) {
                  for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                      text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
                      text.push('</span>');
                      if (chart.data.labels[i]) {
                        text.push(chart.data.labels[i]);
                      }
                      text.push('</li>');
                    }
                }
                text.push('</div></ul>');
                return text.join("");
              },
              layout: {
                padding: {
                  left: 0,
                  right: 0,
                  top: 0,
                  bottom: 0
                }
              },
              tooltips: {
                callbacks: {
                  title: function(tooltipItem, data) {
                    return data['labels'][tooltipItem[0]['index']];
                  },
                  label: function(tooltipItem, data) {
                    return data['datasets'][0]['data'][tooltipItem['index']];
                  }
                },
                backgroundColor: '#fff',
                titleFontSize: 14,
                titleFontColor: '#0B0F32',
                bodyFontColor: '#737F8B',
                bodyFontSize: 11,
                displayColors: false
              }
            };
  
            var doughnutChart = new Chart(doughnutChartCanvas, {
              type: 'doughnut',
              data: doughnutPieData,
              options: doughnutPieOptions
            });
  
            document.getElementById('doughnut-chart-legend').innerHTML = doughnutChart.generateLegend();
          },
          error: function(error) {
            console.log(error);
          }
        });
      }   
});