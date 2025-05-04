<?php
// No PHP logic yet, but structure is now PHP ready
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="../css/dashboard.css?ver=<?php echo time(); ?>" />    
    <link rel="stylesheet" href="../css/header.css?ver=<?php echo time(); ?>" />
    <link rel="stylesheet" href="../css/footer.css?ver=<?php echo time(); ?>" />
    
</head>

<body>
    <!-- Header Placeholder -->
    <div id="header-placeholder"></div>

    <div id="content-container">
          <div class="dashboard">
          <h2>PAYROLL REPORTS</h2>
                  <!-- Line Chart Card -->
              <div class="card chart-card">
                    <canvas id="linegraph"></canvas>
                  </div>
                  <!-- Pie Chart Card -->
                  <div class="card pie-card">
                    <h3>MM/DD/YY - MM/DD/YY</h3>
                    <canvas id="piechart"></canvas>
                    <div class="legend">
                      <div><span class="legend-box present"></span> Present</div>
                      <div><span class="legend-box absent"></span> Absent</div>
                    </div>
                  </div>

                  <!-- Total Employees Card -->
                  <div class="card employee-card">
                    <h3>Total No. of Employees</h3>
                    <div class="employee-icon">👤</div>
                    <div class="employee-count">1,000</div>
                  </div>

                  <!-- Summary Report Card -->
                  <div class="card summary-card">
                <h3>MM/YYYY</h3>
                <div class="summary-grid">
                    <div class="summary-circle blue">Average Net Pay</div>
                    <div class="summary-circle blue">Total Tax Deductions</div>
                    <div class="summary-circle blue">Total Contribution Amounts</div>
                    <div class="summary-circle blue">No. of Generated Payslip</div>
                </div>
            </div>

      </div>
  </div>

    <!-- Footer Placeholder -->
    <div id="footer-placeholder"></div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/graphs.js?ver=<?php echo time(); ?>"></script>
    <script src="../js/header.js"></script>
    <script src="../js/footer.js"></script>
</body>
</html>
