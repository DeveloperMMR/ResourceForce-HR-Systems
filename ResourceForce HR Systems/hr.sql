-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 06:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` smallint(6) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `GroupName` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `Name`, `GroupName`) VALUES
(51, 'Leptop', 'Science'),
(50, 'computer', 'science');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `BusinessEntityID` int(11) NOT NULL,
  `LoginID` varchar(256) DEFAULT NULL,
  `OrganizationLevel` smallint(6) DEFAULT NULL,
  `JobTitle` varchar(50) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `MaritalStatus` char(1) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `HireDate` date DEFAULT NULL,
  `VacationHours` smallint(6) DEFAULT NULL,
  `SickLeaveHours` smallint(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`BusinessEntityID`, `LoginID`, `OrganizationLevel`, `JobTitle`, `BirthDate`, `MaritalStatus`, `Gender`, `HireDate`, `VacationHours`, `SickLeaveHours`) VALUES
(20, '3003', 200, 'Web developer', '2021-05-11', 'N', 'M', '2021-05-11', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employeedepartmenthistory`
--

CREATE TABLE `employeedepartmenthistory` (
  `BusinessEntityID` int(11) NOT NULL,
  `DepartmentID` smallint(6) NOT NULL,
  `ShiftID` tinyint(4) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeedepartmenthistory`
--

INSERT INTO `employeedepartmenthistory` (`BusinessEntityID`, `DepartmentID`, `ShiftID`, `StartDate`, `EndDate`) VALUES
(100, 1, 85, '2021-04-01', NULL),
(111, 2, 45, '2021-04-01', NULL),
(112, 3, 44, '2021-04-10', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `employeepayhistory`
--

CREATE TABLE `employeepayhistory` (
  `BusinessEntity` int(11) NOT NULL,
  `RateChangeDate` datetime NOT NULL,
  `Rate` int(11) DEFAULT NULL,
  `PayFrequency` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeepayhistory`
--

INSERT INTO `employeepayhistory` (`BusinessEntity`, `RateChangeDate`, `Rate`, `PayFrequency`) VALUES
(100, '2021-04-01 22:39:15', 100000, 2),
(111, '2021-04-01 22:39:15', 90000, 2),
(112, '2021-04-01 22:39:15', 80000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jobcandidate`
--

CREATE TABLE `jobcandidate` (
  `JobCandidateID` int(11) NOT NULL,
  `BusinessEntity` int(11) DEFAULT NULL,
  `ResumeSubmitted` varchar(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobcandidate`
--

INSERT INTO `jobcandidate` (`JobCandidateID`, `BusinessEntity`, `ResumeSubmitted`) VALUES
(1001, 100, 'Yes'),
(1003, 112, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `ShiftID` tinyint(4) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`ShiftID`, `Name`, `StartTime`, `EndTime`) VALUES
(85, 'John Martinez', '08:00:00', '05:00:00'),
(45, 'John Martinez', '01:00:00', '05:00:00'),
(44, 'Huan Cho', '01:00:00', '05:00:00'),
(84, 'Taijuan mothon', '07:00:00', '04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sponsorship`
--

CREATE TABLE `sponsorship` (
  `SponsorshipID` int(11) NOT NULL,
  `BusinessEntityID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsorship`
--

INSERT INTO `sponsorship` (`SponsorshipID`, `BusinessEntityID`) VALUES
(1100, 100),
(1, 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`BusinessEntityID`);

--
-- Indexes for table `employeedepartmenthistory`
--
ALTER TABLE `employeedepartmenthistory`
  ADD PRIMARY KEY (`StartDate`,`BusinessEntityID`,`DepartmentID`,`ShiftID`),
  ADD KEY `BusinessEntityID` (`BusinessEntityID`),
  ADD KEY `DepartmentID` (`DepartmentID`),
  ADD KEY `ShiftID` (`ShiftID`);

--
-- Indexes for table `employeepayhistory`
--
ALTER TABLE `employeepayhistory`
  ADD PRIMARY KEY (`RateChangeDate`,`BusinessEntity`),
  ADD KEY `BusinessEntityID` (`BusinessEntity`);

--
-- Indexes for table `jobcandidate`
--
ALTER TABLE `jobcandidate`
  ADD PRIMARY KEY (`JobCandidateID`),
  ADD KEY `BusinessEntityID` (`BusinessEntity`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`ShiftID`);

--
-- Indexes for table `sponsorship`
--
ALTER TABLE `sponsorship`
  ADD PRIMARY KEY (`SponsorshipID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
