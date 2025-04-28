<?php
// No PHP logic yet, but structure is now PHP ready
?>

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
                <div>Leave Days</div>
                <div>Undertime</div>
              </div>
            </div>
            
            <!-- This part is a sample only for visual representation -->
            <div class="attendance-data">
              <div class="attendance-row">
                <div class="employee-info">
                  <div>EMP-1001</div>
                </div>
                <div class="employee-stats">
                  <div>2</div>
                  <div>1.5</div>
                </div>
              </div>         
            </div>

            <div class="attendance-data">
                <div class="attendance-row">
                  <div class="employee-info">
                    <div>EMP-1002</div>
                  </div>
                  <div class="employee-stats">
                    <div>2</div>
                    <div>1.5</div>
                  </div>
                </div>         
              </div>
            
            <div class="attendance-data">
                <div class="attendance-row">
                  <div class="employee-info">
                    <div>EMP-1003</div>
                  </div>
                  <div class="employee-stats">
                    <div>2</div>
                    <div>1.5</div>
                  </div>
                </div>         
              </div>

            <div class="attendance-data">
                <div class="attendance-row">
                  <div class="employee-info">
                    <div>EMP-1003</div>
                  </div>
                  <div class="employee-stats">
                    <div>2</div>
                    <div>1.5</div>
                  </div>
                </div>         
              </div>
          </div>
      </div>
  </div>

  <div id="footer-placeholder"></div>
</body>

</html>