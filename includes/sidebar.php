<?php
// No PHP logic yet, but structure is now PHP ready
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- CSS STYLESHEET -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="../css/sidebar.css?ver=<?php echo time(); ?>" />
</head>
<body>
    <nav class="sidebar-nav">
        <button id="toggle-sidebar-btn" class="sidebar-toggle-btn">
            <i class="fas fa-chevron-left"></i>
        </button>
        <ul class="menu-list">    
            <!-- Logo -->
            <li class="logo-container">
                <div class="logo-text">
                    <span class="main-text">EVENT <strong>HORIZON</strong></span>
                    <span class="tagline">PUSHING BOUNDARIES, BUILDING FUTURES</span>
                </div>
                <div class="divider"><hr /></div>
            </li>
            
            <!-- Menu Items -->
            <li class="menu-item"><a href="#" data-target="../html/dashboard.php"><i class="fas fa-home"></i><span class="nav-text">Dashboard</span></a></li>
            <li class="menu-item"><a href="#" data-target="../html/attendance.php"><i class="fas fa-calendar-check"></i><span class="nav-text">Attendance</span></a></li>
            <li class="menu-item"><a href="#" data-target="../html/employee.php"><i class="fas fa-users"></i><span class="nav-text">Employee</span></a></li>
            <li class="menu-item"><a href="#" data-target="../html/payroll.php"><i class="fas fa-money-bill-wave"></i><span class="nav-text">Payroll</span></a></li>
            <li class="menu-item has-submenu">
                <a href="#" class="toggle-submenu">
                    <i class="fas fa-chart-bar"></i> 
                    <span class="nav-text">Reports</span>
                    <i class="fas fa-chevron-down arrow-icon"></i>
                </a>
                <ul class="submenu">
                    <li><a href="#" data-target="../html/reports.php"><i class="fas fa-file-alt"></i> Reports</a></li>
                    <li><a href="#" data-target="../html/summaryreport.php"><i class="fas fa-chart-pie"></i> Monthly Report</a></li>
                    <li><a href="#" data-target="../html/deduction.php"><i class="fas fa-chart-pie"></i> Deduction</a></li>
                </ul>
            </li>

            <!-- Logout -->
            <li class="logout-container">
                <div class="divider"><hr /></div>
                <a href="#" class="logout">
                    <i class="fas fa-sign-out-alt"></i><span class="nav-text">Log out</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Content Container -->
    <div id="content-container">
    </div>

    <!-- Include External JavaScript -->
    <script src="../js/sidebar.js?ver=<?php echo time(); ?>"></script>
</body>
</html>