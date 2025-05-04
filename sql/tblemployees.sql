-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2025 at 06:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tblemployees`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

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
  `TIN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblemployees`
--

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
(1014, 'Jayjay ', 'De Luna', 'jaydeluna@yahoo.com', '09876543321', 'Villa Carolina 2 Muntinlupa City', 'Marketing Staff', 'Marketing Department', '2025-05-05', 'Active', 5, 14, '14014'),
(1015, 'Bren', 'Vargas', 'brenvargas01@gmail.com', '09994563321', 'Batangas City', 'Network Admin', 'IT Department', '2024-05-30', 'Active', 5, 15, '15015'),
(1016, 'Mart', 'Sasi', 'martsasi11@yahoo.com', '09123456778', 'Sto. Tomas Laguna', 'Computer Technician', 'IT Department', '2025-05-06', 'Active', 5, 16, '16016'),
(1017, 'Rodolfo ', 'Cresencio', 'rodcresencio@gmail.com', '09075543321', 'Davao City', 'IT Support', 'IT Department', '2025-05-06', 'Active', 5, 17, '17017'),
(1018, 'Jasper', 'Tabin', 'jastabin@gmail.com', '090988766532', 'Pacita San Pedro City', 'Front End Developer', 'IT Department', '2025-05-15', 'Active', 5, 18, '18018'),
(1019, 'Tristan', 'Ragiles', 'tristanragiles@gmail.com', '09887654321', 'Villa Carolina 1 Muntinlupa City', 'Machine Operator', 'Production Department', '2024-06-12', 'Active', 5, 19, '19019'),
(1020, 'Gabriel', 'San Andres', 'gabsanandres@gmail.com', '09087765432', 'Victoria Muntinlupa City', 'Accounting Clerk', 'Accounting Department', '2025-05-07', 'Active', 5, 20, '20020');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
