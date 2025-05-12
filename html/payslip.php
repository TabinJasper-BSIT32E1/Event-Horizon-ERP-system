<?php
    // No PHP logic yet, but structure is now PHP ready
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip</title>

    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/payslip.css" />

</head>

<body>

    <script src="../js/header.js" defer></script>
    <script src="../js/footer.js" defer></script>

    <div id="header-placeholder"></div>

    <div id="content-container">

    <!-- First Section -->
    <div class="payslip-container">
        <div class="two-column-layout">
            <!-- Employee Payslip Details-->
            <div class="left-column">
                <table class="payslip-info-table">
                    <tr>
                        <th>Date of Joining</th>
                        <td>:2025-06-23</td>
                    </tr>
                    <tr>
                        <th>Pay Period</th>
                        <td>:July 2025</td>
                    </tr>
                    <tr>
                        <th>Worked Days</th>
                        <td>:26</td>
                    </tr>
                    
                </table>
            </div>

            <div class="right-column">
                <table class=payslip-info-table>
                    <th>Employee Name</th>
                        <td>:Valenzuela JM</td>
                    </tr>
                    <tr>
                        <th>Designation</th>
                        <td>:IT Helpdesk</td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td>:IT</td>
                </table>
            </div>
        </div>
    <!-- Second Section -->
        <!-- Earning Details Table -->
            <div class="earning-details">
                <table class="earning-info-table">
                    <tr>
                        <th>Earnings</th>
                        <th>Amount</th>
                    </tr>
                    <tr>
                        <td>Basic</td>
                        <td>10000</td>
                    </tr>
                    <tr>
                        <td>Incentive Pay</td>
                        <td>1000</td>
                    </tr>
                    <tr>
                        <td>House Rent Allowance</td>
                        <td>400</td>
                    </tr>
                    <tr>
                        <td>Meal Allowance</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>Total Earnings</td>
                        <td>11600</td>
                    </tr>
                </table>
            </div>

    <!-- Third Section -->
        <!-- Deduction Details Table -->
            <div class="deduction-details">
                <table class="deduction-info-table">
                    <tr>
                        <th>Deductions</th>
                        <th>Amount</th>
                    </tr>
                    <tr>
                        <td>Provident Fund</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>Professional Tax</td>
                        <td>500</td>
                    </tr>
                    <tr>
                        <td>Loan</td>
                        <td>400</td>
                    </tr>
                    <tr>
                        <td>Total Deductions</td>
                        <td>2100</td>
                    </tr>
                    <tr>
                        <td>Net Pay</td>
                        <td>9500</td>
                    </tr>
                </table>
            </div>
    <!-- Fourth Section -->
            <div class="netpay">
                9500 
                <br>
                Nine Thousand Five Hundred
            </div>
    <!-- Fifth Section -->
            <div class="signature">
                <div>
                    ___________________________ <br>
                    Employer's Signature
                </div>
                <div>
                    ___________________________ <br>
                    Employee's Signature
                </div>
            </div>

            <div class="note">
                <strong>This is a system generated Payslip</strong>
            </div>
            
        
    </div>

    <!-- Sixth Section -->

    <div class="back-button-container">
        <button class="btn-back">Back</button>
    </div>

    <div id="footer-placeholder"></div>


</body>
</html>