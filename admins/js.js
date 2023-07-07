// chart.js

document.addEventListener('DOMContentLoaded', function() {
    // Sample data
    var data = {
        labels: ['Label 1', 'Label 2', 'Label 3'],
        datasets: [{
            data: [30, 50, 20],
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
        }]
    };

    // Chart configuration
    var options = {
        responsive: true,
        maintainAspectRatio: false
    };

    // Initialize the doughnut chart
    var doughnutChart = new Chart(document.getElementById('doughnutChart'), {
        type: 'doughnut',
        data: data,
        options: options
    });

    // Generate the chart legend
    var legend = doughnutChart.generateLegend();
    var legendContainer = document.getElementById('doughnut-chart-legend');
    legendContainer.innerHTML = legend;
});
