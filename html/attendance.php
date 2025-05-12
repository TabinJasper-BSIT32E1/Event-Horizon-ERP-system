<?php
include '../database/database.php';

// Fetch attendance data from the database
$sql = "SELECT * FROM tblattendance";
$result = mysqli_query($conn, $sql);

$attendanceData = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $attendanceData[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Attendance</title>

  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/attendance.css?ver=<?php echo time(); ?>" />    
  </head>

<body>
  <?php include '../includes/header.php'; ?>

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

        <!-- Attendance data will be populated here by JS -->
        <div id="attendanceContainer" class="attendance-data"></div>

        <div class="divider"></div>
      </div>
    </div>
  </div>

  <?php include '../includes/footer.php'; ?>

  <script>
    // Embed the attendance data in JSON format to be used by JavaScript
    const attendanceData = <?php echo json_encode($attendanceData); ?>;
  </script>

  <!-- External JS file to handle attendance rendering and pagination -->
  <script src="../js/attendance.js"></script>
</body>
</html>
