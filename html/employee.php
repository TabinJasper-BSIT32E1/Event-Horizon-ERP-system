<?php

    //limited data for table is 5. ibahin const limit variable sa employee.js kung gusto ibahin limit ng table.

    //added previous and next button sa javascript (employee.js). 
    
    //nagana searchbar sa employee ID nga lang.

    //[bug]dko ma limit yung next button pag wala ng data mapapakita. so bali makakapagnext ng infinite yung user pag spinam next btn

    //feature kulang, select sa table then mag didisplay info sa baba (Tax Information, Bank Account Information, Compensation Details) [wala pang db kaya pa magawan]


    include '../database/database.php'; // Includes the correct database connection

    $search = isset($_GET['query']) ? mysqli_real_escape_string($conn, $_GET['query']) : '';

    if (isset($_GET['api']) && $_GET['api'] == '1') {
        $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 5;
        $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

        $sql = "SELECT * FROM tblemployees WHERE EmployeeID LIKE '%$search%' LIMIT $limit OFFSET $offset";
        $result = mysqli_query($conn, $sql);

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>

    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/employee.css">

</head>
<body>

    <script src="../js/header.js"></script>
    <script src="../js/footer.js"></script>

    <div id="header-placeholder"></div>
    
    <div id="content-container">
        <div class="main-content">
            <div class="employee-container">        
                <div class="header-row">
                    <h1 class="employee-title">Employee Details</h1>
                    <div class="search-container">
                        <input type="text" placeholder="Search..." />
                    </div>
                </div>
        
                <!-- Added Fake Data for visual representation -->
                <table>
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Email Address</th>
                            <th>Job Title/Position</th>
                            <th>Department</th>
                            <th>Employment Status</th>
                            <th>Employee Type</th>
                            <th>Date Hired</th>
                        </tr>
                    </thead>

                    <tbody id="employee-table-body">
                    <!-- Employee data will be inserted here via JavaScript -->
                    </tbody>

                </table>



                <div class="divider"></div>
        
                <!-- Split layout container for the 2-column layout -->
                <div class="split-layout">
                    <div class="left-column">
                        <div class="info-section">
                            <h3 class="section-title">Tax Information</h3>
                            <ul>
                                <li>SSS:</li>
                                <li>Pag-ibig:</li>
                                <li>Philhealth:</li>
                                <li>Tin ID No:</li>
                            </ul>
                        </div>
        
                        <div class="info-section">
                            <h3 class="section-title">Bank Account Information</h3>
                            <ul>
                                <li>Bank Name:</li>
                                <li>Account Name:</li>
                                <li>Account Number:</li>
                                <li>Bank Routing Number/Branch Code:</li>
                            </ul>
                        </div>
                    </div>
        
                    <div class="right-column">
                        <div class="info-section">
                            <h3 class="section-title">Compensation Details</h3>
                            <ul>
                                <li>Salary/Wage Rate:</li>
                                <li>Standard Hours per Pay Period:</li>
                                <li>Overtime Rules:</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="footer-placeholder"></div>


    <script src="../js/employee.js"></script>
</body>
</html>
