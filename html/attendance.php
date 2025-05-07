<?php
  include '../database/database.php';

  $sql = "SELECT * FROM tblattendance";
  $result = mysqli_query($conn, $sql);

  $attendanceData = [];

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $attendanceData[] = $row;
    }
  }
?>

<script>
  // Make PHP array available to JS
  const attendanceData = <?php echo json_encode($attendanceData); ?>;
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>

    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/attendance.css" />
</head>

<body>

  <script src="../js/header.js"></script>
  <script src="../js/footer.js"></script>
  
  <div id="header-placeholder"></div>

  <div id="content-container">
      <div class="main-content">
        <div class="top-part">
            <h2>Attendance Summary</h2>
            <div class="search-section">
                <div class="date-range-search">
                    <label>Search by date:</label>
                    <div class="date-inputs">
                        <input type="text" placeholder="mm/dd/yy">
                        <input type="text" placeholder="mm/dd/yy">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="attendance-container">
            <div class="attendance-header">
              <div class="employee-id-header">
                <div>Employee ID</div>
              </div>
              <div class="stats-header">
                <div>Attendance Date</div>
                <div>Time In</div>
                <div>Time Out</div>
                <div>Status</div>
              </div>
            </div>
            
            <!-- JAVASCRIPT NA MAY SILBI DITO -->

            <div id="attendanceContainer" class="attendance-data"></div>
            <div id="paginationControls" class="pagination-controls" style="margin-top: 20px;"></div>

          </div>
      </div>
  </div>

  <div id="footer-placeholder"></div>
  <script src="../js/attendance.js"></script>
</body>

</html>