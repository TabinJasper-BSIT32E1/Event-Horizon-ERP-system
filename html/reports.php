<?php
// No PHP logic yet, but structure is now PHP ready
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>

    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/reports.css" /> 
</head>

<body>
    <div id="header-placeholder"></div>


    <div id="content-container">
        <div class="main-content">

            <div class="chart-container">
                <h2>PAYROLL REPORT</h2>
                <div class="chart-box">
                    <canvas id="linegraph"></canvas>
                </div>

                <!-- Summary Reports Section -->
                <h2>Summary Reports</h2>
                <div class="summary-reports">
                    <div class="summary-grid">
                        <div class="summary-item">
                            <span>Total Employees</span>
                            <span>0</span>
                        </div>
                        <div class="summary-item">
                            <span>Total Deductions</span>
                            <span>0</span>
                        </div>
                        <div class="summary-item">
                            <span>Total Payroll</span>
                            <span>0</span>
                        </div>
                        <div class="summary-item">
                            <span>Total Gross Pay</span>
                            <span>0</span>
                        </div>
                        <div class="summary-item">
                            <span>Net Pay</span>
                            <span>0</span>
                        </div>
                        <div class="summary-item">
                            <span>Total Contributions</span>
                            <span>0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/graphs.js"></script>

    <!-- Script for header & footer -->
    <script src="../js/header.js"></script>
    <script src="../js/footer.js"></script>

    <div id="footer-placeholder"></div>
</body>

</html>