<?php
    include '../database/database.php';

    $sql = "SELECT EmployeeID FROM tblemployees";
    $result = mysqli_query($conn, $sql);

    //fetch total employees
    $totalEmployees = mysqli_num_rows($result);
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
  <a href="../html/reports.php" class="card-link" data-target="../html/reports.php" onclick="notifySidebar(event, this)">
      <canvas id="linegraph"></canvas>
  </a>
</div>

<div class="card pie-card">
  <a href="../html/attendance.php" class="card-link" onclick="notifySidebar(event, this)">
    <h3>MM/DD/YY - MM/DD/YY</h3>
    <canvas id="piechart"></canvas>
    <div class="legend">
      <div><span class="legend-box present"></span> Present</div>
      <div><span class="legend-box absent"></span> Absent</div>
    </div>
  </a>
</div>

<div class="card employee-card">
  <a href="../html/employee.php" class="card-link" data-target="../html/employee.php" onclick="notifySidebar(event, this)">
      <h3>Total No. of Employees</h3>
      <div class="employee-icon">👤</div>
      <div class="employee-count"><?php echo$totalEmployees?></div>
  </a>
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

    <script>
function notifySidebar(event, link) {
  event.preventDefault(); // Prevent default navigation
  const url = link.getAttribute('href'); // Get the URL from the card link
  window.parent.postMessage({ type: 'navigate', target: url }, '*'); // Notify the parent (sidebar.js) to update the iframe and highlight the active link
}
</script>
</body>
</html>
