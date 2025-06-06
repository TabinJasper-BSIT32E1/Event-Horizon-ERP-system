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
                        <input type="text" placeholder="Search ID" />
                    </div>
                </div>
        
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
            </div>
        </div>
    </div>

    <script src="../js/employee.js"></script>

    <div id="footer-placeholder"></div>

</body>
</html>
