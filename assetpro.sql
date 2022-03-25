-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 06:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
  `assignedUser` int(11) DEFAULT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `LastModified` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(20) NOT NULL,
  `LocationID` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`AssetID`, `CategoryID`, `TypeID`, `DepartmentID`, `assignedUser`, `DateCreated`, `LastModified`, `Status`, `LocationID`) VALUES
(1, 1, 2, NULL, 2, '2022-01-01 06:54:48', '2021-10-20 04:51:20', 'Unassigned', 1),
(2, 1, 1, NULL, 2, '2022-01-01 06:54:51', '2021-10-20 04:56:31', 'Unassigned', 1),
(3, 2, 5, 1, 3, '2022-01-05 07:13:40', '2021-10-20 05:00:46', 'Assigned', 1),
(4, 2, 5, NULL, 3, '2022-01-01 06:53:33', '2021-10-20 05:02:38', 'Assigned', 1),
(5, 3, 6, 1, 3, '2022-01-01 09:51:52', '2021-10-20 05:04:02', 'Assigned', 1),
(6, 3, 6, 1, 1, '2022-01-01 06:55:00', '2021-10-20 05:05:21', 'Shared', 1),
(7, 1, 2, 1, 1, '2022-01-01 06:55:03', '2021-10-20 05:08:07', 'Shared', 1),
(8, 2, 5, NULL, 1, '2022-01-01 06:55:06', '2021-10-21 07:13:31', 'Unassigned', 1),
(13, 2, 5, NULL, 4, '2022-01-01 06:55:10', '2021-10-21 10:45:18', 'Unassigned', 1),
(14, 1, 2, NULL, 4, '2022-01-01 06:55:15', '2021-10-21 18:51:51', 'Unassigned', 1),
(15, 1, 2, 1, 5, '2022-01-01 08:14:19', '2021-10-21 20:00:14', 'Unassigned', 1);

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
  `PurchasedDate` date NOT NULL DEFAULT current_timestamp(),
  `hasWarranty` tinyint(1) NOT NULL DEFAULT 0,
  `hasDepriciation` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assetdetails`
--

INSERT INTO `assetdetails` (`AssetID`, `Name`, `Cost`, `AssetCondition`, `ImageURL`, `Description`, `PurchasedDate`, `hasWarranty`, `hasDepriciation`) VALUES
(1, 'Acer Nitro', 300000, 'Brand New', '/uploads/assets/1.jpg', 'Gaming Computer', '2021-10-20', 1, 1),
(2, 'Sibosen Gaming Chair', 45000, 'Brand New', '/uploads/assets/2.jpg', 'Sibosen Gaming Chair | Office Chair | Computer Chair | High Back PU Leather Desk Chair Ergonomic Adjustable Reclining', '2021-10-18', 1, 1),
(3, 'Key Board', 5000, 'Brand New', '/uploads/assets/3.png', 'Gaming Keyboard ESG K6 Mechanik', '2021-10-14', 1, 0),
(4, 'Web Cam', 5000, 'Brand New', '/uploads/assets/4.png', 'Asus C3 1080p Webcam', '2021-10-05', 1, 0),
(5, 'Windows 10', 4500, 'Brand New', '/uploads/assets/5.png', 'Windows 10 Pro', '2021-09-15', 0, 0),
(6, 'Office 365', 30000, 'Brand New', '/uploads/assets/6.jpg', 'Microsoft 365 Services', '2021-09-18', 0, 0),
(7, 'Printer', 90000, 'Used', '/uploads/assets/7.jfif', 'Epson WorkForce Wireless Printer w/ADF (WF-2850)', '2021-09-16', 0, 1),
(8, 'Key Board', 2000, 'Brand New', '/uploads/assets/8.jpg', 'Gaming Keyboard ESG K6 Mechanik', '2021-10-21', 1, 0),
(13, 'Logitech C505 HD Webcam', 15400, 'Brand New', '/uploads/assets/13.png', 'Web Cam', '2021-10-22', 1, 0),
(14, 'HP LaserJet', 20000, 'Brand New', '/uploads/assets/14.jpeg', 'Printer', '2021-10-22', 1, 1),
(15, 'HP 1102 InkJet', 30000, 'Brand New', '/uploads/assets/15.jpeg', 'Printer', '2021-10-22', 1, 1);

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
(4, '2021-10-17', '2022-02-17', 'Red Line Technologies'),
(8, '2021-10-21', '2021-12-31', 'none'),
(13, '2021-10-22', '2022-10-22', 'Long Range Microphone'),
(14, '2021-10-22', '2022-10-22', 'none'),
(15, '2021-10-22', '2021-10-22', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `breakdown`
--

CREATE TABLE `breakdown` (
  `BreakdownID` int(11) NOT NULL,
  `AssetID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Date` datetime(6) NOT NULL,
  `Reason` longtext NOT NULL,
  `DefectedParts` longtext NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Reported'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breakdown`
--

INSERT INTO `breakdown` (`BreakdownID`, `AssetID`, `EmployeeID`, `Date`, `Reason`, `DefectedParts`, `Status`) VALUES
(1, 4, 3, '2021-10-21 21:47:48.000000', 'Cannot get a clear view', 'Display Fickering', 'Reported'),
(2, 5, 3, '2021-10-21 22:51:40.000000', 'not working', 'Keyboard keys', 'Reported'),
(3, 4, 3, '2021-10-22 09:16:07.000000', 'Lense Damaged', 'Camera lense', 'Reported'),
(4, 5, 3, '2021-10-22 10:26:41.000000', 'Keys are not working', 'Keyboard', 'Reported'),
(15, 3, 3, '2022-01-01 19:32:28.000000', 'broken by fall', 'keyboard,window and touch pad', 'Reported'),
(16, 3, 3, '2022-01-04 15:52:39.000000', 'improper usage', 'touch pad', 'Reported');

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
  `HeadID` int(11) NOT NULL,
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

INSERT INTO `department` (`DepartmentID`, `HeadID`, `DepartmentCode`, `Name`, `description`, `ContactNum`, `DateCreated`, `LastModified`) VALUES
(1, 1, 'FIN', 'Finance', 'This is the Finance Department', '0112345678', '2021-10-20 20:32:31.000000', '2021-10-20 20:32:31.000000'),
(2, 1, 'MKT', 'Marketing', 'This is the Marketing Department', '0118878685', '2021-10-20 20:32:31.000000', '2021-10-20 20:32:31.000000'),
(3, 1, 'PRD', 'Production', 'This is the Production department', '0116789121', '2021-10-20 21:32:00.000000', '2021-10-20 21:32:00.000000'),
(4, 1, 'TCD', 'Technical', 'This is the department of all the technicians', '0112345680', '2021-12-27 12:01:31.000000', '2021-12-27 12:01:31.000000');

-- --------------------------------------------------------

--
-- Table structure for table `departmentheaduser`
--

CREATE TABLE `departmentheaduser` (
  `HeadID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departmentheaduser`
--

INSERT INTO `departmentheaduser` (`HeadID`, `UserID`) VALUES
(1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `depreciation`
--

CREATE TABLE `depreciation` (
  `DepreciationID` int(11) NOT NULL,
  `AssetID` int(11) NOT NULL,
  `UsefulYears` int(11) DEFAULT NULL,
  `DepriciaionRate` decimal(10,0) DEFAULT NULL,
  `ResidualValue` decimal(10,0) DEFAULT NULL,
  `isDepriciated` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `depreciation`
--

INSERT INTO `depreciation` (`DepreciationID`, `AssetID`, `UsefulYears`, `DepriciaionRate`, `ResidualValue`, `isDepriciated`) VALUES
(1, 1, 10, '2', '50000', 0),
(2, 2, 3, '5', '5000', 0),
(3, 7, 3, '2', '2000', 0),
(4, 14, 5, '2', '5000', 0),
(5, 15, 5, '2', '2000', 0);

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
(3, 3, 1),
(14, 5, 1),
(15, 6, 2),
(17, 8, 3),
(18, 9, 2),
(19, 10, 1),
(20, 18, 1),
(21, 19, 1),
(22, 20, 1),
(23, 22, 1),
(24, 23, 1),
(25, 24, 1),
(26, 25, 1),
(27, 26, 1),
(28, 27, 1),
(29, 37, 2);

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
(1, 'indunijd', 'c8570278255fb9bfae19e45c9bdc420f', '27f9319ec884a678b29c38d202a28434'),
(2, 'VH', '226280c5dd9b1bd4e67c72ff2c94bf1b', NULL),
(3, 'mushrifa', '3eeb6fd7cbd23574cdcafad11e3f4ef3', NULL),
(4, 'ayishasj', '3ac8a3088d3f1c205f4f6b40fe7db7ea', NULL),
(5, 'namal_ranasinghe', '0fb35ef8274c519168b47d7ac21dda0c', ''),
(6, 'jithendra_prianjalee', '2d0262cb88fbd15738c6644ade982158', ''),
(8, 'sara_desapriyan', '8f68e6e318085d3b4c3fd35801c15857', ''),
(9, 'lakshman_kumar', '334404bdc07f5c601baafa0620061d67', ''),
(10, 'muzni_ahamed', '45a7516ef909b86b3f48a1c3309a20e3', ''),
(11, 'douglas_kumar', 'f3fb1e622dd3836affc83b92ca4fb315', ''),
(12, 'andrew_dias', 'c4e86837f92bb6a3e1d646dcbea5729d', ''),
(13, 'pavani_kumari', '08e43bb72810489c016a403bb00fd750', ''),
(14, 'samanali_perea', '76eedd02cf177f45d5638873deaf920d', ''),
(15, 'farhan_ahamed', '6b0e04a3322f25c4d4815604dbcdec3d', ''),
(18, 'charuni_kumari', 'fdc382409ba979e1d71ad6de9ed0a94d', ''),
(19, 'jeewanthi_gunaratne', 'cae5c5e6b6ee4dec14ef2528318d2459', ''),
(20, 'aruna_kumara', 'e1576e51ad1b3ec06eae6a5dc6bd98a6', ''),
(21, 'amanda_dineshiya', 'ed80d65580bd79c60fd07691139e84ad', ''),
(22, 'thusitha_dissanayake', '446cdefc33df511b277ac4d88d8f9c3a', ''),
(23, 'prasanna_ranathunge', 'ae17d2cc7ba92b4d74019be05ca0c34d', ''),
(24, 'herath_bandara', 'fb3d3f4a6298b90312dde1ef4b40df2c', ''),
(25, 'sachini_thennakoon', 'c26d007adce5c991f21e43d8baf76d98', ''),
(26, 'herath_thennakoon', 'b9e28ac44f43f0f0895f2b70ea45a378', ''),
(27, 'dinithi_perera', 'c0f03fb6b7d747efd399833ff8a79d8a', ''),
(28, 'AshenS', 'caf551e6ca8f6b485e13c0de50b0c838', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `message` text NOT NULL,
  `assetId` int(11) DEFAULT NULL,
  `addedUser` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notificationusers`
--

CREATE TABLE `notificationusers` (
  `notificationId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'Technician'),
(5, 'Department Head');

-- --------------------------------------------------------

--
-- Table structure for table `technicianuser`
--

CREATE TABLE `technicianuser` (
  `TechnicianID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technicianuser`
--

INSERT INTO `technicianuser` (`TechnicianID`, `UserID`, `DepartmentID`) VALUES
(6, 11, 4),
(7, 12, 4),
(8, 13, 4),
(9, 14, 4),
(10, 15, 4),
(11, 21, 4),
(12, 4, 4),
(13, 36, 4);

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
(8, 3),
(9, 3),
(10, 3),
(18, 3),
(19, 3),
(20, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(37, 3),
(4, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(21, 4),
(36, 4),
(28, 5);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `UserID` int(11) NOT NULL,
  `fName` varchar(500) NOT NULL,
  `lName` varchar(500) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `Address` varchar(2000) NOT NULL,
  `Gender` char(6) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `ProfilePicURL` varchar(1000) NOT NULL,
  `jobTitle` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserID`, `fName`, `lName`, `NIC`, `Address`, `Gender`, `PhoneNumber`, `Email`, `DOB`, `ProfilePicURL`, `jobTitle`) VALUES
(1, 'Induni', 'Dulanjalee', '986151010V', 'Badulla', 'Female', '0719598424', 'indunijd@gmail.com', '1998-04-24', '', 'Admin'),
(2, 'Harsha', 'Abeyvickrama', '199824200890', 'Rakwana', 'Male', '0711425085', 'harshaabeyvickrama@gmail.com\r\n', '1998-08-29', '', 'Asset Manager'),
(3, 'Mushrifa', 'Mansoor', '996893758V', 'Mawanella', 'Female', '0775067556', 'mushimmf7877@gmail.com', '1999-07-07', '/uploads/employees/3.jpg', 'Accountant'),
(4, 'Ayisha', 'Siddeequa', '997271386V', 'Kandy', 'Female', '0764243353', 'ayisha5siddeequa@gmail.com', '1999-08-14', '/uploads/technicians/4.jpg', 'Electrician'),
(5, 'Namal', 'Ranasinghe', '936987123V', 'Nugegoda', 'Male', '0719989796', 'namalr@gmail.com', '1993-06-10', '/uploads/employees/5.jpg', 'Analyst'),
(6, 'Jithendra', 'Prianjalee', '913456770V', 'Bandarawela', 'Female', '0764352718', 'jithendra@gmail.com', '1991-08-23', '/uploads/employees/6.jpg', 'sales Manager'),
(8, 'Sara', 'Desapriyan', '200323045691', 'Kurunegala', 'Female', '0775081822', 'sara@gmail.com', '2003-02-20', '/uploads/employees/8.jpg', 'Clerk'),
(9, 'Lakshman', 'Kumar', '958123456X', 'Galle', 'Male', '0756789211', 'lakshman@gmail.com', '1995-02-20', '/uploads/employees/9.jpg', 'Logistic Supervisor'),
(10, 'Muzni', 'Ahamed', '', 'Galle', 'Male', '0765667891', 'ahamed@gmail.com', '1998-01-20', '/uploads/employees/10.jpg', 'Production Planner'),
(11, 'Douglas', 'Kumar', '', 'Kuruwita', 'Male', '0782234789', 'douglas@gmail.com', '1994-03-20', '/uploads/technicians/11.jpg', 'Carpenter'),
(12, 'Andrew', 'Dias', '', 'Panadura', 'Male', '0776545611', 'andrew@gmail,com', '1990-01-20', '/uploads/technicians/12.jpg', 'Carpenter'),
(13, 'Pavani', 'Kumari', '', 'Kuliyapitiya', 'Female', '0777345678', 'pavani@gmail.com', '1989-01-20', '/uploads/technicians/13.jpg', 'Carpenter'),
(14, 'Samanali', 'Perea', '', 'Peradeniya', 'Female', '0774563211', 'samanali@gmail.com', '1975-12-20', '/uploads/technicians/14.jpg', 'Electrician'),
(15, 'Farhan', 'Ahamed', '', 'Mawanella', 'Male', '0775067551', 'farhan@gmail.com', '1992-07-20', '/uploads/technicians/15.jpg', 'Electrician'),
(18, 'Charuni', 'Kumari', '987456190V', 'Polonnaruwa', 'Female', '0712348790', 'charunik@gmail.com', '1998-08-13', '/uploads/employees/18.jpeg', 'SEO Specialist'),
(19, 'Jeewanthi', 'Gunaratne', '796345678V', 'Anuradhapura', 'Female', '0712348790', 'jeewanthi@gmail.com', '1979-07-18', '/uploads/employees/19.jpg', 'Brand Manager'),
(20, 'Aruna', 'Kumara', '798345780V', 'Kuruwita', 'Male', '0712348790', 'aruna@gmail.com', '1979-10-17', '/uploads/employees/20.jpg', 'Clerk'),
(21, 'Amanda', 'Dineshiya', '956345123V', 'Matara', 'Female', '0777412112', 'amandad@gmail.com', '1995-06-15', '/uploads/technicians/21.jpg', 'Electrician'),
(22, 'Thusitha', 'Dissanayake', '836567900V', 'Battaramulla', 'Male', '0713454545', 'thusithad@gmail.com', '1983-05-19', '/uploads/employees/22.jpg', 'Analyst'),
(23, 'Prasanna', 'Ranathunge', '987234567V', 'Polonnaruwa', 'Male', '0711234567', 'prasanna@gmail.com', '1998-08-10', '/uploads/employees/23.jpg', 'Team Leader'),
(24, 'Herath', 'Bandara', '987234678V', 'Polonnaruwa', 'Male', '0764352718', 'herath@gmail.com', '1998-07-16', '/uploads/employees/24.jpg', 'Clerk'),
(25, 'Sachini', 'Thennakoon', '854123678V', 'Bandarawela', 'Female', '0712348790', 'delegates.revolux@gmail.com', '1985-05-20', '/uploads/employees/25.jpg', 'Analyst'),
(26, 'Herath', 'Thennakoon', '765234789V', 'Anuradhapura', 'Male', '0764352718', 'delegates.revolux@gmail.com', '1976-05-16', '/uploads/employees/26.jpg', 'Production PLanner'),
(27, 'Dinithi', 'Perera', '987123678V', 'Polonnaruwa', 'Female', '0712348790', 'dinithi@gmail.com', '1998-04-17', '/uploads/employees/27.jpeg', 'SEO Specialist'),
(28, 'Ashen', 'Senadheera', '692876108V', 'Kurunegala', 'Male', '0774462819', 'ashenS@gmail.com', '1969-01-14', '', 'Department Head'),
(36, 'Bhanuka', 'Supun', '976345190V', 'Galle', 'Male', '0764352715', 'bhanuka@gmail.co', '1997-09-10', '/uploads/technicians/6239888f56e97.jpg', NULL),
(37, 'Nethmini', 'Kumari', '987856190V', 'Walasmulla', 'Female', '0761234718', 'nethmini@gmail.com', '1998-03-11', '/uploads/employees/623989195c6d3.png', 'Software Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `useremergency`
--

CREATE TABLE `useremergency` (
  `UserID` int(11) NOT NULL,
  `Relationship` varchar(50) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `TelephoneNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useremergency`
--

INSERT INTO `useremergency` (`UserID`, `Relationship`, `fName`, `TelephoneNumber`) VALUES
(3, 'Mother', 'zeenathul\r\n', '0775564712'),
(4, 'Mother', 'Shiyana', '0775564700'),
(5, 'Father', 'Amarapaala', '0719989799'),
(6, 'Mother', 'Sudeshika', '0764352719'),
(8, 'Father', 'Desapriyan', '0775081800'),
(9, 'wife', 'Harini', '0756789240'),
(10, 'Father', 'Rashid', '0765667894'),
(11, 'Father', 'Robert', '0782234789'),
(12, 'Brother', 'Kapila', '0776545616'),
(13, 'Mother', 'Kumari', '0777345671'),
(14, 'Husband', 'Jhonson', '0774563212'),
(15, 'wife', 'Ayesha', '0775067556'),
(18, 'Mother', 'Sithara', '0712348799'),
(19, 'Husband', 'Darshana', '0712348791'),
(20, 'Wife', 'Sudeshika', '0712348791'),
(21, 'Mother', 'Helena', '0777412113'),
(22, 'Wife', 'Ayesha', '0713454545'),
(23, 'Wife', 'Damayanthi', '0711234566'),
(24, 'Wife', 'Wasana', '0764352719'),
(25, 'Father', 'Amarapaala', '0712348796'),
(26, 'Wife', 'Damayanthi', '0764352710'),
(27, 'Mother', 'Hema', '0712348723'),
(28, 'Wife', 'Sangeetha', '0775564718'),
(36, 'Mother', 'Wasana', '0764352345'),
(37, 'Father', 'Amarapaala', '0776542718');

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
  ADD KEY `empl_fk` (`assignedUser`),
  ADD KEY `LocationID` (`LocationID`);

--
-- Indexes for table `assetdetails`
--
ALTER TABLE `assetdetails`
  ADD UNIQUE KEY `AssetID` (`AssetID`),
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
  ADD PRIMARY KEY (`DepartmentID`),
  ADD KEY `departmentHeadID` (`HeadID`);

--
-- Indexes for table `departmentheaduser`
--
ALTER TABLE `departmentheaduser`
  ADD PRIMARY KEY (`HeadID`),
  ADD KEY `departmentheaduser_ibfk_2` (`UserID`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_ibfk_1` (`createdBy`),
  ADD KEY `notification_ibfk_2` (`assetId`),
  ADD KEY `addedUser` (`addedUser`);

--
-- Indexes for table `notificationusers`
--
ALTER TABLE `notificationusers`
  ADD PRIMARY KEY (`notificationId`,`userId`),
  ADD KEY `userId` (`userId`);

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
  ADD KEY `tech_fk` (`UserID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

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
  MODIFY `AssetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `assetmanageruser`
--
ALTER TABLE `assetmanageruser`
  MODIFY `AssetManagerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `breakdown`
--
ALTER TABLE `breakdown`
  MODIFY `BreakdownID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departmentheaduser`
--
ALTER TABLE `departmentheaduser`
  MODIFY `HeadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `depreciation`
--
ALTER TABLE `depreciation`
  MODIFY `DepreciationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employeeuser`
--
ALTER TABLE `employeeuser`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `technicianuser`
--
ALTER TABLE `technicianuser`
  MODIFY `TechnicianID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  ADD CONSTRAINT `asset_ibfk_1` FOREIGN KEY (`LocationID`) REFERENCES `department` (`DepartmentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctg_fk` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dpt_fk` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empl_fk` FOREIGN KEY (`assignedUser`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `bemp_fk` FOREIGN KEY (`EmployeeID`) REFERENCES `employeeuser` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`HeadID`) REFERENCES `departmentheaduser` (`HeadID`);

--
-- Constraints for table `departmentheaduser`
--
ALTER TABLE `departmentheaduser`
  ADD CONSTRAINT `departmentheaduser_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

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
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`createdBy`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`assetId`) REFERENCES `asset` (`AssetID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_ibfk_3` FOREIGN KEY (`addedUser`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `notificationusers`
--
ALTER TABLE `notificationusers`
  ADD CONSTRAINT `notificationusers_ibfk_1` FOREIGN KEY (`notificationId`) REFERENCES `notification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notificationusers_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `technicianuser`
--
ALTER TABLE `technicianuser`
  ADD CONSTRAINT `tech_fk` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `technicianuser_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
