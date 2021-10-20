-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 05:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assetpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `AdminID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`AdminID`, `UserID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `AssetID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `LastModified` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`AssetID`, `CategoryID`, `TypeID`, `DepartmentID`, `EmployeeID`, `DateCreated`, `LastModified`, `Status`) VALUES
(1, 1, 2, NULL, NULL, '2021-10-20 10:21:20', '2021-10-20 10:21:20', 'Unassigned'),
(2, 1, 1, NULL, NULL, '2021-10-20 10:26:31', '2021-10-20 10:26:31', 'Unassigned'),
(3, 2, 5, NULL, NULL, '2021-10-20 10:30:46', '2021-10-20 10:30:46', 'Unassigned'),
(4, 2, 5, NULL, NULL, '2021-10-20 10:32:38', '2021-10-20 10:32:38', 'Unassigned'),
(5, 3, 6, NULL, NULL, '2021-10-20 10:34:02', '2021-10-20 10:34:02', 'Unassigned'),
(6, 3, 6, NULL, NULL, '2021-10-20 10:35:21', '2021-10-20 10:35:21', 'Unassigned'),
(7, 1, 2, NULL, NULL, '2021-10-20 10:38:07', '2021-10-20 10:38:07', 'Unassigned');

-- --------------------------------------------------------

--
-- Table structure for table `assetdetails`
--

CREATE TABLE `assetdetails` (
  `AssetID` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Cost` double(10,0) NOT NULL,
  `AssetCondition` varchar(100) NOT NULL,
  `ImageURL` varchar(1000) NOT NULL,
  `Description` longtext DEFAULT NULL,
  `PurchasedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assetdetails`
--

INSERT INTO `assetdetails` (`AssetID`, `Name`, `Cost`, `AssetCondition`, `ImageURL`, `Description`, `PurchasedDate`) VALUES
(1, 'Acer Nitro', 300000, 'Brand New', '/uploads/assets/1.jpg', 'Gaming Computer', '2021-10-20'),
(2, 'Sibosen Gaming Chair', 45000, 'Brand New', '/uploads/assets/2.jpg', 'Sibosen Gaming Chair | Office Chair | Computer Chair | High Back PU Leather Desk Chair Ergonomic Adjustable Reclining', '2021-10-18'),
(3, 'Key Board', 5000, 'Brand New', '/uploads/assets/3.png', 'Gaming Keyboard ESG K6 Mechanik', '2021-10-14'),
(4, 'Web Cam', 5000, 'Brand New', '/uploads/assets/4.png', 'Asus C3 1080p Webcam', '2021-10-05'),
(5, 'Windows 10', 4500, 'Brand New', '/uploads/assets/5.png', 'Windows 10 Pro', '2021-09-15'),
(6, 'Office 365', 30000, 'Brand New', '/uploads/assets/6.jpg', 'Microsoft 365 Services', '2021-09-18'),
(7, 'Printer', 90000, 'Used', '/uploads/assets/7.jfif', 'Epson WorkForce Wireless Printer w/ADF (WF-2850)', '2021-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `assetmanageruser`
--

CREATE TABLE `assetmanageruser` (
  `AssetManagerID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assetwarranty`
--

CREATE TABLE `assetwarranty` (
  `AssetID` int(11) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `OtherInfo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assetwarranty`
--

INSERT INTO `assetwarranty` (`AssetID`, `fromDate`, `toDate`, `OtherInfo`) VALUES
(1, '2021-10-20', '2025-10-20', '2 Years Service Warranty'),
(2, '2021-10-18', '2022-10-18', 'Very Comfortable'),
(3, '2021-10-14', '2022-02-14', 'Mechanical keyboard with backlit keys and several backlight effects'),
(4, '2021-10-17', '2022-02-17', 'Red Line Technologies');

-- --------------------------------------------------------

--
-- Table structure for table `breakdown`
--

CREATE TABLE `breakdown` (
  `BreakdownID` int(11) NOT NULL,
  `AssetID` int(11) NOT NULL,
  `TechnicianID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Date` datetime(6) NOT NULL,
  `Reason` longtext NOT NULL,
  `DefectedParts` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `CategoryCode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `CategoryCode`) VALUES
(1, 'Fixed', 'FA'),
(2, 'Consumable', 'CA'),
(3, 'Intangible', 'IA');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentCode` varchar(5) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `description` longtext DEFAULT NULL,
  `ContactNum` varchar(10) NOT NULL,
  `DateCreated` datetime(6) NOT NULL,
  `LastModified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentCode`, `Name`, `description`, `ContactNum`, `DateCreated`, `LastModified`) VALUES
(1, 'FN', 'Finance', 'This is the Finance Department', '0112345678', '2021-10-20 20:32:31.000000', '2021-10-20 20:32:31.000000'),
(2, 'MKT', 'Marketing', 'This is the Marketing Department', '0118878685', '2021-10-20 20:32:31.000000', '2021-10-20 20:32:31.000000');

-- --------------------------------------------------------

--
-- Table structure for table `depreciation`
--

CREATE TABLE `depreciation` (
  `DepreciationID` int(11) NOT NULL,
  `AssetID` int(11) NOT NULL,
  `UsefulYears` int(11) DEFAULT NULL,
  `DepriciaionRate` decimal(10,0) DEFAULT NULL,
  `ResidualValue` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `depreciation`
--

INSERT INTO `depreciation` (`DepreciationID`, `AssetID`, `UsefulYears`, `DepriciaionRate`, `ResidualValue`) VALUES
(1, 1, 10, '2', '50000'),
(2, 2, 3, '5', '5000'),
(3, 7, 3, '2', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `employeeuser`
--

CREATE TABLE `employeeuser` (
  `EmployeeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeeuser`
--

INSERT INTO `employeeuser` (`EmployeeID`, `UserID`, `DepartmentID`) VALUES
(14, 5, 1),
(15, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `UserID` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `verify_token` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UserID`, `Username`, `Password`, `verify_token`) VALUES
(1, 'indunijd', 'indunijd', NULL),
(2, 'VH', 'harsha', NULL),
(3, 'mushrifa', 'mushrifa77', NULL),
(4, 'ayishasj', 'ayishasj', NULL),
(5, 'namal_ranasinghe', '0fb35ef8274c519168b47d7ac21dda0c', ''),
(6, 'jithendra_prianjalee', '2d0262cb88fbd15738c6644ade982158', '');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(1) NOT NULL,
  `RoleName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'Asset Manager'),
(3, 'Employee'),
(4, 'Technician');

-- --------------------------------------------------------

--
-- Table structure for table `technicianuser`
--

CREATE TABLE `technicianuser` (
  `TechnicianID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `technicianuserspec`
--

CREATE TABLE `technicianuserspec` (
  `TechnicianID` int(11) NOT NULL,
  `Specialization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `techrepairbreak`
--

CREATE TABLE `techrepairbreak` (
  `BreakdownID` int(11) NOT NULL,
  `TechnicianID` int(11) NOT NULL,
  `StarDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `FoundIssue` longtext NOT NULL,
  `Feedback` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TypeID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `TypeCode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeID`, `CategoryID`, `Name`, `TypeCode`) VALUES
(1, 1, 'Furniture', 'FU'),
(2, 1, 'Computers & Computer Peripherals', 'CP'),
(3, 1, 'Electrical Appliances', 'EA'),
(4, 1, 'Machinery', 'MA'),
(5, 2, 'Computer Peripherals', 'PE'),
(6, 3, 'Software', 'SW');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `RoleID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(5, 3),
(6, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `UserID` int(11) NOT NULL,
  `fName` varchar(500) NOT NULL,
  `lName` varchar(500) NOT NULL,
  `Address` varchar(2000) NOT NULL,
  `Gender` char(6) NOT NULL,
  `Age` int(3) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `ProfilePicURL` varchar(1000) NOT NULL,
  `CivilStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserID`, `fName`, `lName`, `Address`, `Gender`, `Age`, `PhoneNumber`, `Email`, `DOB`, `ProfilePicURL`, `CivilStatus`) VALUES
(1, 'Induni', 'Dulanjalee', 'Badulla', 'Female', 23, '0719598424', 'indunijd@gmail.com', '1998-04-24', '', 'Single'),
(2, 'Harsha', 'Abeyvickrama', 'Rakwana', 'Male', 23, '0711425085', 'harshaabeyvickrama@gmail.com\r\n', '1998-08-29', '', 'Single'),
(3, 'Mushrifa', 'Mansoor', 'Mawanella', 'Female', 22, '0775067556', 'mushimmf7877@gmail.com', '1999-07-07', '', 'Single'),
(4, 'Ayisha', 'Siddeequa', 'Kandy', 'Female', 22, '0764243353', 'ayisha5siddeequa@gmail.com', '1999-08-14', '', 'Single'),
(5, 'Namal', 'Ranasinghe', 'Nugegoda', 'Male', 23, '0719989796', 'namalr@gmail.com', '1993-06-10', '/assetPro/uploads/employees/5.jpg', 'Married'),
(6, 'Jithendra', 'Prianjalee', 'Bandarawela', 'Female', 23, '0764352718', 'jithendra@gmail.com', '1991-08-23', '/assetPro/uploads/employees/6.jpg', 'Married');

-- --------------------------------------------------------

--
-- Table structure for table `useremergency`
--

CREATE TABLE `useremergency` (
  `UserID` int(11) NOT NULL,
  `Relationship` varchar(50) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `TelephoneNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useremergency`
--

INSERT INTO `useremergency` (`UserID`, `Relationship`, `fName`, `lName`, `TelephoneNumber`) VALUES
(5, 'Father', 'Amarapaala', '', '0719989799'),
(6, 'Mother', 'Sudeshika', '', '0764352719');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`AdminID`),
  ADD KEY `admin_fk` (`UserID`);

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`AssetID`),
  ADD KEY `ctg_fk` (`CategoryID`),
  ADD KEY `tp_fk` (`TypeID`),
  ADD KEY `dpt_fk` (`DepartmentID`),
  ADD KEY `empl_fk` (`EmployeeID`);

--
-- Indexes for table `assetdetails`
--
ALTER TABLE `assetdetails`
  ADD KEY `aset_fk` (`AssetID`);

--
-- Indexes for table `assetmanageruser`
--
ALTER TABLE `assetmanageruser`
  ADD PRIMARY KEY (`AssetManagerID`),
  ADD KEY `am_fk` (`UserID`);

--
-- Indexes for table `assetwarranty`
--
ALTER TABLE `assetwarranty`
  ADD PRIMARY KEY (`AssetID`);

--
-- Indexes for table `breakdown`
--
ALTER TABLE `breakdown`
  ADD PRIMARY KEY (`BreakdownID`),
  ADD KEY `bt_fk` (`TechnicianID`),
  ADD KEY `ast_fk` (`AssetID`),
  ADD KEY `bemp_fk` (`EmployeeID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `depreciation`
--
ALTER TABLE `depreciation`
  ADD PRIMARY KEY (`DepreciationID`),
  ADD KEY `dep_fk` (`AssetID`);

--
-- Indexes for table `employeeuser`
--
ALTER TABLE `employeeuser`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `user_fk` (`UserID`),
  ADD KEY `department_fk` (`DepartmentID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `technicianuser`
--
ALTER TABLE `technicianuser`
  ADD PRIMARY KEY (`TechnicianID`),
  ADD KEY `tech_fk` (`UserID`);

--
-- Indexes for table `technicianuserspec`
--
ALTER TABLE `technicianuserspec`
  ADD PRIMARY KEY (`TechnicianID`,`Specialization`);

--
-- Indexes for table `techrepairbreak`
--
ALTER TABLE `techrepairbreak`
  ADD PRIMARY KEY (`BreakdownID`),
  ADD KEY `tecb_fk` (`TechnicianID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TypeID`),
  ADD KEY `cat_fk` (`CategoryID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `role_fk` (`RoleID`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `useremergency`
--
ALTER TABLE `useremergency`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `AssetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assetmanageruser`
--
ALTER TABLE `assetmanageruser`
  MODIFY `AssetManagerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `breakdown`
--
ALTER TABLE `breakdown`
  MODIFY `BreakdownID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `depreciation`
--
ALTER TABLE `depreciation`
  MODIFY `DepreciationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employeeuser`
--
ALTER TABLE `employeeuser`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `technicianuser`
--
ALTER TABLE `technicianuser`
  MODIFY `TechnicianID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `technicianuserspec`
--
ALTER TABLE `technicianuserspec`
  MODIFY `TechnicianID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD CONSTRAINT `admin_fk` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asset`
--
ALTER TABLE `asset`
  ADD CONSTRAINT `ctg_fk` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dpt_fk` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empl_fk` FOREIGN KEY (`EmployeeID`) REFERENCES `employeeuser` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_fk` FOREIGN KEY (`TypeID`) REFERENCES `type` (`TypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assetdetails`
--
ALTER TABLE `assetdetails`
  ADD CONSTRAINT `aset_fk` FOREIGN KEY (`AssetID`) REFERENCES `asset` (`AssetID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assetmanageruser`
--
ALTER TABLE `assetmanageruser`
  ADD CONSTRAINT `am_fk` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assetwarranty`
--
ALTER TABLE `assetwarranty`
  ADD CONSTRAINT `asw_fk` FOREIGN KEY (`AssetID`) REFERENCES `asset` (`AssetID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `breakdown`
--
ALTER TABLE `breakdown`
  ADD CONSTRAINT `ast_fk` FOREIGN KEY (`AssetID`) REFERENCES `asset` (`AssetID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bemp_fk` FOREIGN KEY (`EmployeeID`) REFERENCES `employeeuser` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bt_fk` FOREIGN KEY (`TechnicianID`) REFERENCES `technicianuser` (`TechnicianID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `depreciation`
--
ALTER TABLE `depreciation`
  ADD CONSTRAINT `dep_fk` FOREIGN KEY (`AssetID`) REFERENCES `asset` (`AssetID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeeuser`
--
ALTER TABLE `employeeuser`
  ADD CONSTRAINT `department_fk` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_FK` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `technicianuser`
--
ALTER TABLE `technicianuser`
  ADD CONSTRAINT `tech_fk` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `technicianuserspec`
--
ALTER TABLE `technicianuserspec`
  ADD CONSTRAINT `tus_fk` FOREIGN KEY (`TechnicianID`) REFERENCES `technicianuser` (`TechnicianID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `techrepairbreak`
--
ALTER TABLE `techrepairbreak`
  ADD CONSTRAINT `brk_fk` FOREIGN KEY (`BreakdownID`) REFERENCES `breakdown` (`BreakdownID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tecb_fk` FOREIGN KEY (`TechnicianID`) REFERENCES `technicianuser` (`TechnicianID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `cat_fk` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_fk` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD CONSTRAINT `ud_FK` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `useremergency`
--
ALTER TABLE `useremergency`
  ADD CONSTRAINT `ue_fk` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
