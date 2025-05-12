document.addEventListener("DOMContentLoaded", function () {
  const lineCanvas = document.getElementById('linegraph');
  const pieCanvas = document.getElementById('piechart');

//   ===================LINE GRAPH===================
  if (lineCanvas && window.Chart) {
      const lineChart = new Chart(lineCanvas.getContext('2d'), {
          type: 'line',
          data: {
              labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
              datasets: [{
                  label: 'Net Pay',
                  data: [12000, 15000, 13000, 17000, 16000, 18000],
                  borderColor: '#00BCD4',
                  backgroundColor: 'rgba(0, 188, 212, 0.2)',
                  fill: true,
                  tension: 0.3
              }]
          },
          options: {
              responsive: true,
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
  }

//   ===================PIE CHART===================
  if (pieCanvas && window.Chart) {
      const pieChart = new Chart(pieCanvas.getContext('2d'), {
          type: 'pie',
          data: {
              labels: ['Present', 'Absent'],
              datasets: [{
                  data: [85, 15],
                  backgroundColor: ['#4CAF50', '#F44336'],
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              plugins: {
                  legend: {
                      position: 'bottom'
                  }
              }
          }
      });
  }
});
