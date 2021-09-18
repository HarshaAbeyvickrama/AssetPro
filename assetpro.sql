-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2021 at 02:26 PM
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
  `DepartmentID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `DateCreated` datetime(6) NOT NULL,
  `LastModified` datetime(6) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`AssetID`, `CategoryID`, `TypeID`, `DepartmentID`, `EmployeeID`, `DateCreated`, `LastModified`, `Status`) VALUES
(1, 1, 1, 1, 1, '2021-08-27 21:10:13.000000', '2021-08-27 21:10:13.000000', 'Active'),
(4, 1, 2, 1, 1, '2021-08-27 21:16:02.000000', '2021-08-27 21:16:02.000000', 'Active');

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
  `PurchasedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assetdetails`
--

INSERT INTO `assetdetails` (`AssetID`, `Name`, `Cost`, `AssetCondition`, `ImageURL`, `Description`, `PurchasedDate`) VALUES
(1, 'Computer Chair', 6000, 'New', '', 'This is a computer chair', '2021-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `assetmanageruser`
--

CREATE TABLE `assetmanageruser` (
  `AssetManagerID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assetmanageruser`
--

INSERT INTO `assetmanageruser` (`AssetManagerID`, `UserID`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `assetwarranty`
--

CREATE TABLE `assetwarranty` (
  `AssetID` int(11) NOT NULL,
  `WarrantyPeriod` int(11) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `OtherInfo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Name`) VALUES
(1, 'Fixed'),
(2, 'Consumable'),
(3, 'Intangible');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `ContactNum` varchar(10) NOT NULL,
  `DateCreated` datetime(6) NOT NULL,
  `LastModified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `Name`, `ContactNum`, `DateCreated`, `LastModified`) VALUES
(1, 'Finance', '0452245696', '2021-08-27 20:52:38.000000', '2021-08-27 20:52:38.000000'),
(2, 'Operation', '0112345678', '2021-08-27 20:53:33.000000', '2021-08-27 20:53:33.000000'),
(3, 'Human Resource', '0573785647', '2021-08-27 20:53:33.000000', '2021-08-27 20:53:33.000000');

-- --------------------------------------------------------

--
-- Table structure for table `depreciation`
--

CREATE TABLE `depreciation` (
  `DepreciationID` int(11) NOT NULL,
  `AssetID` int(11) NOT NULL,
  `UsefulYears` date NOT NULL,
  `CurrentValue` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 3, 1),
(5, 6, 3),
(6, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `UserID` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UserID`, `Username`, `Password`) VALUES
(1, 'indunijd', 'indunijd'),
(2, 'VH', 'harsha'),
(3, 'mushrifa', 'mushrifa77'),
(4, 'ayishasj', 'ayishasj'),
(6, 'sashini', 'sashini');

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
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeID`, `CategoryID`, `Name`) VALUES
(1, 1, 'Furniture'),
(2, 1, 'Computers & Peripherals'),
(3, 2, 'Computers & Peripherals'),
(4, 2, 'Other'),
(5, 3, 'Software');

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
(6, 3),
(8, 3),
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
  `Gender` char(1) NOT NULL,
  `Age` int(3) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `ProfilePicURL` varchar(1000) NOT NULL,
  `CivilStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserID`, `fName`, `lName`, `Address`, `Gender`, `Age`, `PhoneNumber`, `DOB`, `ProfilePicURL`, `CivilStatus`) VALUES
(1, 'Induni', 'Dulanjalee', 'Badulla', 'F', 23, '0719598424', '1998-04-24', '', 'Single'),
(2, 'Harsha', 'Abeyvickrama', 'Rakwana', 'M', 23, '0711425085', '1998-08-29', '', 'Single'),
(3, 'Mushrifa', 'Mansoor', 'Mawanella', 'F', 22, '0775067556', '1999-07-07', '', 'Single'),
(4, 'Ayisha', 'Siddeequa', 'Kandy', 'F', 22, '0764243353', '1999-08-14', '', 'Single'),
(6, 'Sashini', 'Madushani', 'colombo', 'F', 23, '0714562389', '2021-08-31', '', 'Single'),
(8, 'Lalith', 'Gunasena', 'Polonnaruwa', 'M', 34, '0875612310', '1989-12-14', '', 'Married');

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
  MODIFY `AssetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assetmanageruser`
--
ALTER TABLE `assetmanageruser`
  MODIFY `AssetManagerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `depreciation`
--
ALTER TABLE `depreciation`
  MODIFY `DepreciationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeeuser`
--
ALTER TABLE `employeeuser`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `technicianuser`
--
ALTER TABLE `technicianuser`
  MODIFY `TechnicianID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technicianuserspec`
--
ALTER TABLE `technicianuserspec`
  MODIFY `TechnicianID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
