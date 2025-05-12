<?php
    include '../database/database.php';

    // Initialize variables
    $empID = '';
    $name = ''; 
    $jobTitle = ''; 
    $deptType = ''; 
    $dateHired = ''; 
    $basicSalary = 0.00;

    //taxes; wala pa switch statement
    $sss = .1;
    $pagibig = .05;
    $philhealth = .05;

    // for calculation overtime
    // will be moved to db soon

    $overtimePay = 0;
    $total = 0;
    $totalEarnings = 0;
    $totalDeductions = 0;
    $absentDeductions = 0;
    $sssDeduction = 0;
    $pagibigDeduction = 0;
    $philhealthDeduction = 0;

    //fetch sa db
    $standardHours = 8;
    $overtimeHours = 3;
    $overtimeRate = .1; 
    $pay = 500;
    $absentFee = 500;
    $allowance = 200;
    $absent = 2;
    $absentRate = 0.1;




    $search = isset($_GET['query']) ? mysqli_real_escape_string($conn, $_GET['query']) : '';

    if (!empty($search)) 
    {
        // First, fetch employee basic details
        $sql = "SELECT * FROM tblemployees WHERE EmployeeID LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $empID = $row["EmployeeID"];
            $name = $row["FirstName"] . ' ' . $row["LastName"];
            $jobTitle = $row["JobPosition"]; 
            $deptType = $row["Department"]; 
            $dateHired = $row["HireDate"]; 

            // Now fetch the salary based on the JobPosition (joined by JobTitle)
            $salaryQuery = "
                SELECT s.Salary_Amount 
                FROM tblsalary s 
                WHERE s.JobPosition = '$jobTitle'
                LIMIT 1
            ";
            $salaryResult = mysqli_query($conn, $salaryQuery);
            if (mysqli_num_rows($salaryResult) > 0) {
                $salaryRow = mysqli_fetch_assoc($salaryResult);
                $basicSalary = $salaryRow["Salary_Amount"];

                //CALCULATIONS; dummy var muna since wala pang db 
                $sssDeduction = $basicSalary * $sss;
                $pagibigDeduction = $basicSalary * $pagibig;
                $philhealthDeduction = $basicSalary * $philhealth;
                $absentDeductions = $absentFee - (($absentFee * $absentRate) * $absent); //absent fee

                $overtimePay = $pay + ($pay * ($overtimeHours * $overtimeRate));
                $totalEarnings = $basicSalary + $allowance + $overtimePay;
                $total = ($overtimePay + $allowance) + ($basicSalary - ($sssDeduction + $pagibigDeduction + $philhealthDeduction + $absentDeductions));
                $totalDeductions = ($sssDeduction) + ($pagibigDeduction) + ($philhealthDeduction) + ($absentDeductions);
            }

        } else {
            echo '<script>alert("No employee found with that ID.");</script>';
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payroll</title>

  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/payroll.css" />
</head>

<body>
    <!-- Header -->
    <div id="header-placeholder"></div>

    <div id="content-container">
      <div class="employee-card">
          <img src="../assets/img/test image.jpg" alt="Employee Avatar" class="employee-avatar">
  
        <!-- First Section -->
        <div class="employee-info">
          <div class="employee-name-id">
            <span class="employee-id">1001</span>
            <span class="employee-name">Posa</span>
          </div>
          <div class="employee-position">HR Officer</div>
          <div class="employee-tags">
            <span class="tag blue">POSA</span>
            <span class="tag yellow">Hired: Jun 15, 2023</span>
          </div>
        </div>

        <!-- Search  -->
        <div class="search-container">
          <form method="GET" action="">
            <input type="text" name="query" autocomplete="off" autofocus placeholder="Search by Employee ID..." value="<?php echo htmlspecialchars($search); ?>" />
            <button type="submit">Search</button>
          </form>
        </div>
      </div>

        <!-- Second Section -->
        <div class="summary-cards">
          <div class="card highlight">
            <?php echo 'PHP ' . number_format($basicSalary, 2); ?><br>
            <small>Basic Salary</small>
          </div>
          <div class="card highlight">
            <?php echo $overtimePay ?><br>
            <small>Overtime Pay</small></div>
          <div class="card highlight">
            <?php echo $totalEarnings ?><br>
            <small>Total Earnings</small></div>
          <div class="card highlight">
            <?php echo $totalDeductions ?><br>
            <small> Deductions</small></div>
        </div>  

        <!-- Third Section -->
        <div class="payslip-container">
          <div class="three-column-layout">
              <!-- Employee Information Column -->
            <div class="column">
              <h3>Employee Information</h3>
              <table class="info-table">
                <tr>
                  <th>Employee ID</th>
                  <td><?php echo $empID;?></td>
                </tr>
                <tr>
                  <th>Name</th>
                  <td><?php echo $name;?></td>
                </tr>
                <tr>
                  <th>Job Title</th>
                  <td><?php echo $jobTitle;?></td>
                </tr>
                <tr>
                  <th>Department Type</th>
                  <td><?php echo $deptType;?></td>
                </tr>
                <tr>
                  <th>Date Hired</th>
                  <td><?php echo $dateHired;?></td>
                </tr>
              </table>
            </div>


            <!-- Fourth Section Details -->
            <div class="column">
              <h3>Compensation Details</h3>
              <table class="info-table">
                <tr>
                  <th>Basic Salary</th>
                  <td><?php echo 'PHP ' . number_format($basicSalary, 2); ?></td>
                </tr>
                <tr>
                  <th>Standard Hours</th>
                  <td><?php echo $standardHours ?></td>
                </tr>
                <tr>
                  <th>Overtime Hours</th>
                  <td><?php echo $overtimeHours ?></td>
                </tr>
                <tr>
                  <th>Overtime Rate</th>
                  <td><?php echo $overtimeRate ?></td>
                </tr>
              </table>
            </div>
  
          <!-- Earnings & Deductions Column -->
          <div class="column">
            <h3>Earnings & Deductions</h3>
            <table class="earnings-table">
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Earnings (P)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Basic Salary</td>
                  <td><?php echo 'PHP ' . number_format($basicSalary, 2); ?></td>
                </tr>
                <tr>
                  <td>Overtime Pay</td>
                  <td><?php echo $overtimePay ?></td>
                </tr>
                <tr>
                  <td>Allowances</td>
                  <td><?php echo $allowance ?></td>
                </tr>
                <thead>
                <tr>
                  <th>Description</th>
                  <th>Deductions (P)</th>
                </tr>
              </thead>
                <tr>
                  <td>SSS</td>
                  <td><?php echo $sssDeduction ?></td>
                </tr>
                <tr>
                  <td>Pag-IBIG</td>
                  <td><?php echo $pagibigDeduction ?></td>
                </tr>
                <tr>
                  <td>PhilHealth</td>
                  <td><?php echo $philhealthDeduction ?></td>
                </tr>
                <tr>
                  <td>Absent</td>
                  <td><?php echo $absentDeductions ?></td>
                </tr>
                <tr class="total-row">
                  <td><strong>Total</strong></td>
                  <td><strong><?php echo $total ?></strong></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

  
    <!-- Fifth Section -->
    <div class="generate-button-container">
  <button class="btn-generate" onclick="openPayslipPopup()">Generate Payslip</button>
</div>

      </div>
    </div>
           

    <!-- Footer -->
    <div id="footer-placeholder"></div>


    <!-- Scripts -->
    <script>
      function openPayslipPopup() {
        const popupWidth  = 900;  
        const popupHeight = 900; 

        const left = Math.floor((window.screen.availWidth  - popupWidth)  / 2);
        const top  = Math.floor((window.screen.availHeight - popupHeight) / 2);

        window.open(
          'payslip.php',
          'PayslipPopup',
          `width=${popupWidth},height=${popupHeight},` +
          `top=${top},left=${left},` +
          `resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,status=no`
        );
      }
    </script>



    <script src="../js/header.js" defer></script>
    <script src="../js/footer.js" defer></script>
    <!-- <script src="../js/payroll.js"></script> -->
</body>
</html>

