<?php
// No PHP logic yet, but structure is now PHP ready
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Summary Report</title>

    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/summaryreport.css">
</head>

<body>
    <div id="header-placeholder"></div>

    <div id="content-container" class="report-container"> 
        <h1 class="report-title">Monthly Summary Report</h1>
        <div class="report-card">
            <div class="top-section">
                <div class="employee-info">
                    <label for="employee-name">Employee Name:</label>
                    <input type="text" id="employee-name" class="employee-input" placeholder="Enter employee name">
                </div>
            
                <div class="search-container">
                    <label for="search-input">Search:</label>
                    <input type="text" id="search-input" class="search-input" placeholder="Search...">
                </div>
            </div>
            
            <div class="reporting-range">
                <label for="reporting-date">Reporting Range:</label>
                <div class="date-picker">
                    <input type="date" id="reporting-date" class="date-input">
                    <i class="fas fa-calendar"></i>
                </div>
            </div>

            <div class="summary-tables">
                <table class="small-table">
                    <thead>
                        <tr><th colspan="2">Avg. Daily Hrs. | 8 Hours</th> </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Total Regular Hours Worked</td>
                        </tr>
                        <tr>
                            <td>Total Overtime Hours Worked</td>
                        </tr>
                    </tbody>
                </table>

                <table class="small-table">
                    <thead>
                        <tr><th colspan="2">Pay Type | Hourly</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Rate</td>
                        </tr>
                        <tr>
                            <td>Total Wage</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="main-table-container">
                <table class="main-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Mon</th>
                            <th>Tues</th>
                            <th>Wed</th>
                            <th>Thurs</th>
                            <th>Fri</th>
                            <th>Total week Hours</th>
                            <th>Total Regular Hours</th>
                            <th>Total Overtime Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>March 1-7</td>
                            <td></td><td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td>March 8-21</td>
                            <td></td><td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td>March 21-28</td>
                            <td></td><td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td>March 28-31</td>
                            <td></td><td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr class="total-row">
                            <td>Total</td>
                            <td></td><td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <!-- Footer -->
    <div id="footer-placeholder"></div>

     <!-- Scripts -->
    <script src="../js/header.js" defer></script>
    <script src="../js/footer.js" defer></script>

</body>
</html>
