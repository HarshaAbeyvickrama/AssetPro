-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 02:46 PM
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
(1, 1, 1, 1, 1, '2021-08-27 15:40:13', '2021-08-27 15:40:13', 'Active'),
(4, 1, 2, 1, 1, '2021-08-27 15:46:02', '2021-08-27 15:46:02', 'Active'),
(38, 1, 1, NULL, NULL, '2021-09-19 14:33:22', '2021-09-19 14:33:22', 'Unassigned'),
(39, 1, 1, NULL, NULL, '2021-09-19 14:35:04', '2021-09-19 14:35:04', 'Unassigned'),
(40, 1, 1, NULL, NULL, '2021-09-19 14:38:34', '2021-09-19 14:38:34', 'Unassigned'),
(41, 1, 1, NULL, NULL, '2021-09-19 14:39:59', '2021-09-19 14:39:59', 'Unassigned'),
(42, 1, 1, NULL, NULL, '2021-09-19 15:03:16', '2021-09-19 15:03:16', 'Unassigned'),
(43, 1, 1, NULL, NULL, '2021-09-19 16:12:10', '2021-09-19 16:12:10', 'Unassigned');

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
(1, 'Computer Chair', 6000, 'New', '', 'This is a computer chair', '2021-08-25'),
(38, 'Mobile Phone 5', 50000, 'Brand New', 'google', 'Poco', '2021-09-19'),
(39, 'Mobile Phone 5', 50000, 'Brand New', 'google', 'Poco', '2021-09-19'),
(40, 'Mobile Phone 5', 50000, 'Brand New', 'google', 'Poco', '2021-09-20'),
(41, 'Mobile Phone 5', 50000, 'Brand New', 'google', 'Poco', '2021-09-22'),
(42, 'Computer 2', 25000, 'Brand New', 'google', 'x', '2021-09-01'),
(43, 'Computer 3', 50000, 'Brand New', 'google', 'Poco', '2021-09-28');

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
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `OtherInfo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assetwarranty`
--

INSERT INTO `assetwarranty` (`AssetID`, `fromDate`, `toDate`, `OtherInfo`) VALUES
(38, '2021-09-01', '2021-09-30', 'none'),
(39, '2021-09-01', '2021-09-30', 'none'),
(40, '2021-09-01', '2021-09-30', 'none'),
(41, '2021-09-01', '2021-09-30', 'none'),
(42, '2021-08-31', '2021-09-07', 'sssss'),
(43, '2021-09-07', '2021-09-23', '');

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
(1, 'Fixed', ''),
(2, 'Consumable', ''),
(3, 'Intangible', '');

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
(1, 'FN', 'Finance', NULL, '0452245696', '2021-08-27 20:52:38.000000', '2021-08-27 20:52:38.000000'),
(2, 'OP', 'Operation', NULL, '0112345678', '2021-08-27 20:53:33.000000', '2021-08-27 20:53:33.000000'),
(3, 'HR', 'Human Resource', NULL, '0573785647', '2021-08-27 20:53:33.000000', '2021-08-27 20:53:33.000000'),
(4, 'MKT', 'Marketing Department', 'This is the Marketing department', '0454564545', '2021-09-20 20:05:14.000000', '2021-09-20 20:05:14.000000'),
(5, 'MNG', 'Management', 'Management', '0113454545', '2021-09-25 09:20:03.000000', '2021-09-25 09:20:03.000000'),
(70, 'SLS', 'Sales Department', 'This is the Sales Department', '0111121212', '2021-09-28 19:24:36.000000', '2021-09-28 19:24:36.000000');

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
(14, 38, 0, '5', '25000'),
(15, 39, 10, '5', '25000'),
(16, 40, 10, '5', '25000'),
(17, 41, 10, '5', '25000');

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
(6, 8, 3),
(12, 15, 2),
(16, 19, 1),
(17, 21, 1),
(18, 22, 3),
(21, 25, 1),
(22, 26, 4),
(23, 27, 3),
(24, 29, 3),
(25, 31, 4),
(30, 36, 2),
(31, 39, 1);

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
(1, 'indunijd', 'indunijd', '3d5b1e003897505cb762bd9c6ba3e27a'),
(2, 'VH', 'harsha', '29c1cde725ddba7236dd913bc68957fe'),
(3, 'mushrifa', 'mushrifa77', '725941e6384cea4cda9ef81db3700c44'),
(4, 'ayishasj', 'ayishasj', '238377b18affc8d952f1a1e9b225e9e3'),
(6, 'sashini', 'sashini', '1'),
(19, 'piyumi_perera', 'rU7e1Spq', '1'),
(20, 'kumud_bandara', '0a66425d8dfe23a3b4e4c51ca0e3b6f7', '1'),
(21, 'hansini_perera', 'f25d7348f8d3b0edd99aebc35dddc7fb', '1'),
(22, 'prasadi_gunaratne', '5eddb6baccd0ab8c02cba211c29b84f2', '1'),
(23, 'gayathri_kumari', '039a812c956020f28557d2b3b5d802cd', '1'),
(24, 'pradeep_dissanayaka', 'bf8918f8ee29a7f47638dad8d780e703', '1'),
(25, 'pradeep_gunaratne', '2a8070b2f957156be7842d71ac0b248b', '1'),
(26, 'sameera_dissanaya', '42d1bc14cff251c8ea21488de2d7a0cd', '1'),
(27, 'palitha_dias', 'c370afd09a9c4a57686454425beba2c7', '1'),
(28, 'aloka_ediriweera', 'a743789b534861757bf63ebd26ad61f5', '1'),
(29, 'akila_dilshan', '1b2fed12803ede6932b16e7dbc304ae9', '1'),
(30, 'ravindu_bhagya', 'b5cd2a7e5a76d15d751791bc3f6f1827', '1'),
(31, 'sachini_nisansala', '6bf3156766989ea663e4da167877b45f', '1'),
(36, 'hasara_perera', '362e400e9497897e3886cd7c1b821077', '1'),
(37, 'prasanna_jayathilake', 'd7946be0433b9d03216db7ceb5449c16', '1'),
(38, 'darshani_kariyawasam', '4cddbc163198af7a0370c48f8f6d4a4e', '1'),
(39, 'keshani_perera', 'c830225164d2177747539fd92ff8bcae', '1'),
(40, 'sithara_wijepala', '0c5cbe44415c02e4ef9136aa3e0f2af9', '1');

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

--
-- Dumping data for table `technicianuser`
--

INSERT INTO `technicianuser` (`TechnicianID`, `UserID`) VALUES
(2, 4),
(1, 20),
(3, 28),
(4, 30),
(5, 37),
(6, 38),
(7, 40);

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
(1, 1, 'Furniture', ''),
(2, 1, 'Computers & Peripherals', ''),
(3, 2, 'Computers & Peripherals', ''),
(4, 2, 'Other', ''),
(5, 3, 'Software', '');

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
(15, 3),
(19, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(29, 3),
(31, 3),
(36, 3),
(39, 3),
(4, 4),
(16, 4),
(20, 4),
(28, 4),
(30, 4),
(37, 4),
(38, 4),
(40, 4);

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
  `Email` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `ProfilePicURL` varchar(1000) NOT NULL,
  `CivilStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserID`, `fName`, `lName`, `Address`, `Gender`, `Age`, `PhoneNumber`, `Email`, `DOB`, `ProfilePicURL`, `CivilStatus`) VALUES
(1, 'Induni', 'Dulanjalee', 'Badulla', 'F', 23, '0719598424', 'indunijd@gmail.com', '1998-04-24', '/assetPro/uploads/employees/1.jpg', 'Single'),
(2, 'Harsha', 'Abeyvickrama', 'Rakwana', 'M', 23, '0711425085', 'harshaabeyvickrama@gmail.com', '1998-08-29', '/assetPro/uploads/employees/2.jpg', 'Single'),
(3, 'Mushrifa', 'Mansoor', 'Mawanella', 'F', 22, '0775067556', 'mushimmf7877@gmail.com', '1999-07-07', '/assetPro/uploads/employees/3.jpg', 'Single'),
(4, 'Ayisha', 'Siddeequa', 'Kandy', 'F', 22, '0764243353', 'ayisha5siddeequa@gmail.com', '1999-08-14', '/assetPro/uploads/technicians/4.jpg', 'Single'),
(6, 'Sashini', 'Madushani', 'colombo', 'F', 23, '0714562389', '', '2021-08-31', '', 'Single'),
(8, 'Lalith', 'Gunasena', 'Polonnaruwa', 'M', 34, '0875612310', '', '1989-12-14', '', 'Married'),
(15, 'Kasun', 'Perera', 'Polonnaruwa', 'm', 23, '0719989796', 'kasunp@gmail.com', '2021-09-27', 'url', 'Married'),
(19, 'Piyumi', 'Perera', 'Kegalle', 'f', 23, '0713353563', 'piyumip@gmail.com', '1998-07-07', 'url', 'Unmarried'),
(20, 'Kumud', 'Bandara', 'Chillaw', 'm', 23, '0717783736', 'kumudbandara@gmail.com', '1992-07-11', 'url', 'Married'),
(21, 'Hansini', 'Perera', 'Matale', 'f', 23, '0711234567', 'hansiniperera@gmail.com', '1988-02-17', 'url', 'Married'),
(22, 'Prasadi', 'Gunaratne', 'Haputale', 'f', 23, '0773455656', 'prasadigunaratne@gmail.com', '1984-11-27', 'url', 'Married'),
(23, 'Gayathri', 'Kumari', 'Colombo', 'f', 23, '0774563412', 'gayakumari5@gmail.com', '2000-05-17', 'url', 'Married'),
(24, 'Pradeep', 'Dissanayaka', 'Bandarawela', 'm', 23, '0711121213', 'pradeep@yahoo.com', '1989-03-10', 'url', 'Married'),
(25, 'Pradeep', 'Gunaratne', 'Bandarawela', 'm', 23, '0711234567', 'pradeep@yahoo.com', '1991-04-05', 'url', 'Married'),
(26, 'Sameera', 'Dissanaya', 'Jaffna', 'm', 23, '0779909090', 'sameera@yahoo.com', '1998-12-31', 'url', 'Married'),
(27, 'Palitha', 'Dias', 'Wauniya', 'm', 23, '0787767675', 'palithadias@gmail.com', '1992-07-22', 'url', 'Married'),
(28, 'Aloka', 'Ediriweera', 'Matale', 'F', 23, '0663457867', 'alokaedi@yahoo.com', '1994-05-10', 'url', 'Married'),
(29, 'Akila', 'Dilshan', 'Passara', 'm', 23, '0743443536', 'akiladil@yahoo.com', '1996-08-07', 'url', 'Unmarried'),
(30, 'Ravindu', 'Bhagya', 'Monaragala', 'm', 23, '0764456767', 'ravindu05@gmail.com', '1993-05-17', 'url', 'Married'),
(31, 'Sachini', 'Nisansala', 'Walasmulla', 'f', 23, '0718894545', 'sachinisansala@gmail.com', '1991-02-12', 'url', 'Married'),
(36, 'Hasara', 'Perera', 'Anuradhapura', 'f', 23, '0764352718', 'hasara@gmail.com', '1996-03-06', '/assetPro/uploads/employees/36.jpg', 'Married'),
(37, 'Prasanna', 'Jayathilake', 'Negombo', 'm', 23, '0713455790', 'prasannaj@gmail.com', '1969-10-09', 'url', 'Married'),
(38, 'Darshani', 'Kariyawasam', 'Nugegoda', 'F', 23, '0775565657', 'darshanik@gmail.com', '1987-08-13', 'url', 'Married'),
(39, 'Keshani', 'Perera', 'Nugegoda', 'f', 23, '0778867545', 'keshanip@gmail.com', '2000-01-03', '/assetPro/uploads/employees/39.jpg', 'Married'),
(40, 'Sithara', 'Wijepala', 'Dabulla', 'f', 23, '0712235656', 'sitharaw@gmail.com', '1985-09-08', 'url', 'Unmarried');

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
(15, 'Father', 'Amarapaala', 'blah', '0418764500'),
(19, 'Father', 'Thennakoon', 'blah', '0776676765'),
(20, 'Father', 'Danapala', '', '0719983020'),
(21, 'Mother', 'Gayani', 'blah', '0716676869'),
(22, 'Mother', 'Sudeshika', 'blah', '0116675645'),
(23, 'Father', 'Prasanna', 'blah', '0776675757'),
(24, 'Father', 'Hasitha', 'blah', '0788888980'),
(25, 'Father', 'Hasitha', 'blah', ''),
(26, 'Mother', 'Priyangika', 'blah', '0455565657'),
(27, 'Father', 'Dissanayaka', 'blah', '0712342323'),
(28, 'Mother', 'Sumana', '', '0714565656'),
(29, 'Father', 'Darshana', 'blah', '0553454545'),
(30, 'Mother', 'Kusum', '', '0556767554'),
(31, 'Mother', 'Geetha', 'blah', '0716676869'),
(36, 'Mother', 'Malka', 'blah', '0716676869'),
(37, 'Wife', 'Damayanthi', '', '0713455791'),
(38, 'Mother', 'Malika', '', '0775565658'),
(39, 'Mother', 'Maleesha', 'blah', '0778867544'),
(40, 'Mother', 'Swarnalatha', '', '0712235657');

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
  MODIFY `AssetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `assetmanageruser`
--
ALTER TABLE `assetmanageruser`
  MODIFY `AssetManagerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `breakdown`
--
ALTER TABLE `breakdown`
  MODIFY `BreakdownID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `depreciation`
--
ALTER TABLE `depreciation`
  MODIFY `DepreciationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employeeuser`
--
ALTER TABLE `employeeuser`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `technicianuser`
--
ALTER TABLE `technicianuser`
  MODIFY `TechnicianID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
