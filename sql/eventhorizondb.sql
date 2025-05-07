-- Database: `tblemployees`
-- Full SQL Dump with Corrected Table Names and Syntax

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- ----------------------------------------
-- Table: tblemployees
-- ----------------------------------------

CREATE TABLE `tblemployees` (
  `EmployeeID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `EmailAdd` varchar(100) DEFAULT NULL,
  `PhoneNum` varchar(20) DEFAULT NULL,
  `HAddress` text DEFAULT NULL,
  `JobPosition` varchar(100) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL,
  `HireDate` date DEFAULT NULL,
  `Status` enum('Active','Inactive','On Leave') DEFAULT 'Active',
  `LeaveBalance` int(11) DEFAULT 5,
  `RecruitmentID` int(11) DEFAULT NULL,
  `TIN` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Sample Data for tblemployees

INSERT INTO `tblemployees` (`EmployeeID`, `FirstName`, `LastName`, `EmailAdd`, `PhoneNum`, `HAddress`, `JobPosition`, `Department`, `HireDate`, `Status`, `LeaveBalance`, `RecruitmentID`, `TIN`) VALUES
(1000, 'Johnmar', 'Mantal', 'it.dept@gmail.com', '09123456789', 'Muntinlupa City', 'IT Support', 'IT Department', '2025-05-01', 'Active', 5, 1, '111'),
(1001, 'Jasper', 'Cresencio', 'it.dept05@gmail.com', '09987654321', 'San Pedro City', 'IT Support', 'IT Department', '2025-04-01', 'Active', 5, 1, '111'),
(1002, 'Gab', 'Gerolia', 'hrdept03@gmail.com', '09435423421', 'Carmona CIty', 'Hr', 'HR Department', '2025-05-28', 'Active', 5, 2, '222'),
(1003, 'Hayb', 'Fed', 'Fed0@gmail.com', '09683928367', 'Manila City', 'Sales Clerk', 'Sales', '2025-03-20', 'Active', 5, 3, '333'),
(1004, 'Celi', 'Pofe', 'Pofe@gmail.com', '09245893736', 'Biñan City', 'Accounting Clerk', 'Accounting Department', '2025-02-11', 'Active', 5, 4, '444'),
(1005, 'Jamie', 'Recto', 'Jam14@gmail.com', '09946853453', 'Tarlac City', 'Hr', 'HR Department', '2025-01-08', 'Active', 5, 5, '555'),
(1006, 'Ray', 'Gune', 'Rayray@gmail.com', '07674756756', 'Kidapawan City', 'Machine Operator', 'Production Department', '2024-11-22', 'Active', 5, 6, '656'),
(1007, 'Troy', 'Relph', 'Troyroy@gmail.com', '09874562116', 'GMA Cavite City', 'Machine Operator', 'Production Department', '2025-01-13', 'Active', 5, 7, '777'),
(1008, 'Warren', 'Dale', 'Warend5@gmail.com', '09446788254', 'Pacita San Pedro City', 'Engineer 2', 'Engineering Department', '2023-09-07', 'Active', 5, 8, '878'),
(1009, 'Abby', 'Faid', 'Abbey@gmail.com', '09947810254', 'Muntinlupa City', 'Purchasing', 'Purchasing Department', '2018-10-10', 'Active', 5, 9, '989'),
(1010, 'Ferl', 'Vome', 'Ferl14@gmail.com', '09788566732', 'Sta.Rosa City', 'QA Officer', 'QA Department', '2017-04-16', 'Active', 5, 10, '010'),
(1011, 'Dexter', 'San Andres', 'dexsanandres@gmail.com', '09082224446', 'San Pedro Laguna', 'IT Support', 'IT Department', '2025-05-02', 'Active', 5, 11, '11011'),
(1012, 'Gasper', 'Tambin', 'gastambin@gmail.com', '09123456789', 'Rosario San Pedro', 'Intern', 'HR Department', '2025-05-03', 'Active', 5, 12, '12012'),
(1013, 'Miguel', 'Carreon', 'miguelcarreon@gmail.com', '09076698123', 'Poblacion Muntinlupa', 'HR Assistant', 'HR Department', '2025-05-03', 'Active', 5, 13, '13013'),
(1014, 'Jayjay', 'De Luna', 'jaydeluna@yahoo.com', '09876543321', 'Villa Carolina 2 Muntinlupa City', 'Marketing Staff', 'Marketing Department', '2025-05-05', 'Active', 5, 14, '14014'),
(1015, 'Bren', 'Vargas', 'brenvargas01@gmail.com', '09994563321', 'Batangas City', 'Network Admin', 'IT Department', '2024-05-30', 'Active', 5, 15, '15015'),
(1016, 'Mart', 'Sasi', 'martsasi11@yahoo.com', '09123456778', 'Sto. Tomas Laguna', 'Computer Technician', 'IT Department', '2025-05-06', 'Active', 5, 16, '16016'),
(1017, 'Rodolfo', 'Cresencio', 'rodcresencio@gmail.com', '09075543321', 'Davao City', 'IT Support', 'IT Department', '2025-05-06', 'Active', 5, 17, '17017'),
(1018, 'Jasper', 'Tabin', 'jastabin@gmail.com', '090988766532', 'Pacita San Pedro City', 'Front End Developer', 'IT Department', '2025-05-15', 'Active', 5, 18, '18018'),
(1019, 'Tristan', 'Ragiles', 'tristanragiles@gmail.com', '09887654321', 'Villa Carolina 1 Muntinlupa City', 'Machine Operator', 'Production Department', '2024-06-12', 'Active', 5, 19, '19019'),
(1020, 'Gabriel', 'San Andres', 'gabsanandres@gmail.com', '09087765432', 'Victoria Muntinlupa City', 'Accounting Clerk', 'Accounting Department', '2025-05-07', 'Active', 5, 20, '20020');

-- ----------------------------------------
-- Table: tblpayroll
-- ----------------------------------------

CREATE TABLE `tblpayroll` (
  `Payroll_ID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `PayrollStart` date NOT NULL,
  `PayrollEnd` date NOT NULL,
  `Total_Days_Worked` int(11) NOT NULL,
  `Total_Hours` decimal(10,2) NOT NULL,
  `Total_Deductions` decimal(10,2) NOT NULL,
  `GrossPay` decimal(10,2) NOT NULL,
  `NetPay` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Payroll_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='table structure for payroll';

-- ----------------------------------------
-- Table: tblusers
-- ----------------------------------------

CREATE TABLE `tblusers` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` int(11) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------------------
-- Table: tblattendance
-- ----------------------------------------

CREATE TABLE `tblattendance` (
  `AttendanceID` int(11) NOT NULL AUTO_INCREMENT,
  `EmployeeID` int(11) NOT NULL,
  `AttendanceDate` date NOT NULL,
  `TimeIn` time NOT NULL,
  `TimeOut` time NOT NULL,
  `AttendanceStatus` varchar(255) NOT NULL,
  PRIMARY KEY (`AttendanceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Sample Data for tblattendance

INSERT INTO `tblattendance` (`AttendanceID`, `EmployeeID`, `AttendanceDate`, `TimeIn`, `TimeOut`, `AttendanceStatus`) VALUES
(1, 1000, '2025-05-03', '08:00:00', '17:00:00', 'Present'),
(2, 1001, '2025-05-03', '08:00:00', '17:00:00', 'Present'),
(3, 1002, '2025-05-05', '08:00:00', '17:00:00', 'Present'),
(4, 1003, '2025-05-05', '09:30:00', '17:00:00', 'Present'),
(5, 1004, '2025-05-05', '08:34:15', '16:30:00', 'Present'),
(6, 1005, '2025-05-07', '10:35:00', '19:00:00', 'Present'),
(7, 1006, '2025-05-07', '09:00:00', '18:00:00', 'Present'),
(8, 1007, '2025-05-08', '13:00:00', '20:00:00', 'Present'),
(9, 1008, '2025-05-08', '08:15:00', '15:00:00', 'Present'),
(10, 1009, '2025-05-08', '11:00:00', '17:00:00', 'Present');
(11, 1010, '2025-05-08', '08:00:00', '17:00:00', 'Present'),
(12, 1011, '2025-05-08', '08:15:00', '17:00:00', 'Present'),
(13, 1012, '2025-05-08', '07:50:00', '16:30:00', 'Present'),
(14, 1013, '2025-05-08', '09:00:00', '17:30:00', 'Present'),
(15, 1014, '2025-05-08', '08:00:00', '16:00:00', 'Present'),
(16, 1015, '2025-05-08', '08:45:00', '17:15:00', 'Present'),
(17, 1016, '2025-05-08', '10:00:00', '19:00:00', 'Present'),
(18, 1017, '2025-05-08', '08:10:00', '17:00:00', 'Present'),
(19, 1018, '2025-05-08', '08:05:00', '17:10:00', 'Present'),
(20, 1019, '2025-05-08', '08:30:00', '17:30:00', 'Present'),
(21, 1020, '2025-05-08', '08:00:00', '17:00:00', 'Present'),
(22, 1021, '2025-05-09', '08:15:00', '17:00:00', 'Present'),
(23, 1022, '2025-05-09', '08:00:00', '17:00:00', 'Present'),
(24, 1023, '2025-05-09', '09:00:00', '18:00:00', 'Present'),
(25, 1024, '2025-05-09', '08:20:00', '17:10:00', 'Present'),
(26, 1025, '2025-05-09', '08:00:00', '17:00:00', 'Present'),
(27, 1026, '2025-05-09', '08:45:00', '16:45:00', 'Present'),
(28, 1027, '2025-05-09', '08:30:00', '17:30:00', 'Present'),
(29, 1028, '2025-05-09', '08:50:00', '17:20:00', 'Present'),
(30, 1029, '2025-05-09', '09:10:00', '18:00:00', 'Present'),
(31, 1030, '2025-05-09', '08:00:00', '17:00:00', 'Present'),
(32, 1031, '2025-05-10', '08:15:00', '17:15:00', 'Present'),
(33, 1032, '2025-05-10', '08:05:00', '16:55:00', 'Present'),
(34, 1033, '2025-05-10', '08:00:00', '17:00:00', 'Present'),
(35, 1034, '2025-05-10', '08:30:00', '17:30:00', 'Present'),
(36, 1035, '2025-05-10', '09:00:00', '18:00:00', 'Present'),
(37, 1036, '2025-05-10', '08:10:00', '17:00:00', 'Present'),
(38, 1037, '2025-05-10', '07:50:00', '16:45:00', 'Present'),
(39, 1038, '2025-05-10', '08:00:00', '17:00:00', 'Present'),
(40, 1039, '2025-05-10', '08:00:00', '17:00:00', 'Present'),
(41, 1040, '2025-05-10', '08:25:00', '17:10:00', 'Present'),
(42, 1041, '2025-05-10', '08:15:00', '17:15:00', 'Present'),
(43, 1042, '2025-05-11', '08:00:00', '17:00:00', 'Present'),
(44, 1043, '2025-05-11', '08:35:00', '17:35:00', 'Present'),
(45, 1044, '2025-05-11', '09:00:00', '18:00:00', 'Present'),
(46, 1045, '2025-05-11', '08:00:00', '16:00:00', 'Present'),
(47, 1046, '2025-05-11', '08:40:00', '17:40:00', 'Present'),
(48, 1047, '2025-05-11', '08:00:00', '17:00:00', 'Present'),
(49, 1048, '2025-05-11', '08:00:00', '17:00:00', 'Present'),
(50, 1049, '2025-05-11', '08:10:00', '17:00:00', 'Present');

-- ----------------------------------------
-- Table: tblsalary
-- ----------------------------------------

CREATE TABLE `tblsalary` (
  `Salary_ID` int(11) NOT NULL,
  `DepartmentID` varchar(100) NOT NULL,
  `JobPosition` varchar(255) NOT NULL,
  `Salary_Amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Sample Data for tblsalary

INSERT INTO `tblsalary` (`Salary_ID`, `DepartmentID`, `JobPosition`, `Salary_Amount`) VALUES
(1, 'IT Department', 'IT Support', 20000.00),
(2, 'HR Department', 'Hr', 18500.00),
(3, 'Sales', 'Sales Clerk', 19000.00),
(4, 'Accounting Department', 'Accounting Clerk', 21000.00),
(5, 'Purchasing Department', 'Purchasing', 18000.00),
(6, 'Marketing Department', 'Marketing Staff', 21600.00),
(7, 'QA Department', 'QA Officer', 17800.00),
(8, 'IT Department', 'Front End Developer', 25000.00),
(9, 'IT Department', 'Computer Technician', 23000.00),
(10, 'IT Department', 'Network Admin', 22300.00),
(11, 'Production Department', 'Machine Operator', 26600.00),
(12, 'HR Department', 'HR Assistant', 16000.00),
(13, 'Engineering Department', 'Engineer 2', 28000.00),
(14, 'HR Department', 'Intern', 5000.00);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
