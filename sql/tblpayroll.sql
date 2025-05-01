CREATE TABLE `tblpayroll` (
  `Payroll_ID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `PayrollStart` date NOT NULL,
  `PayrollEnd` date NOT NULL,
  `Total_Days_Worked` int(11) NOT NULL,
  `Total_Hours` decimal(10,2) NOT NULL,
  `Total_Deductions` decimal(10,2) NOT NULL,
  `GrossPay` decimal(10,2) NOT NULL,
  `NetPay` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='table structure for payroll';
