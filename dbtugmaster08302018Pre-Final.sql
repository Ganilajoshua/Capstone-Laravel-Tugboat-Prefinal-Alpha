-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2018 at 02:08 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtugmasterprefinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_13_040127_create_job_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblattachments`
--

DROP TABLE IF EXISTS `tblattachments`;
CREATE TABLE IF NOT EXISTS `tblattachments` (
  `intAttachmentsID` int(11) NOT NULL AUTO_INCREMENT,
  `strAttachmentsDesc` varchar(45) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intAttachmentsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblbarge`
--

DROP TABLE IF EXISTS `tblbarge`;
CREATE TABLE IF NOT EXISTS `tblbarge` (
  `intBargeID` int(11) NOT NULL AUTO_INCREMENT,
  `intBGoodsID` int(11) DEFAULT NULL,
  `strBargeName` varchar(45) DEFAULT NULL,
  `fltBargeWeight` float DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intBargeID`),
  KEY `fk_tblBarge_tblGoods1_idx` (`intBGoodsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblberth`
--

DROP TABLE IF EXISTS `tblberth`;
CREATE TABLE IF NOT EXISTS `tblberth` (
  `intBerthID` int(11) NOT NULL AUTO_INCREMENT,
  `intBPierID` int(11) DEFAULT NULL,
  `strBerthName` varchar(45) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intBerthID`),
  KEY `fk_tblBerth_tblPier1_idx` (`intBPierID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblberth`
--

INSERT INTO `tblberth` (`intBerthID`, `intBPierID`, `strBerthName`, `isActive`, `boolDeleted`) VALUES
(1, 1, 'Berth 3', 1, 0),
(2, 1, 'Berth 4', 1, 0),
(3, 3, 'Berth 1', 1, 0),
(4, 2, 'Berth 2', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

DROP TABLE IF EXISTS `tblcompany`;
CREATE TABLE IF NOT EXISTS `tblcompany` (
  `intCompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `intCGoodsID` int(11) DEFAULT NULL,
  `intCPostBillingTicketID` int(11) DEFAULT NULL,
  `strCompanyName` varchar(45) DEFAULT NULL,
  `strCompanyAddress` text,
  `strCompanyEmail` varchar(45) DEFAULT NULL,
  `strCompanyContactPNum` varchar(13) DEFAULT NULL,
  `strCompanyContactTNum` varchar(9) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intCompanyID`),
  KEY `fk_tblCompany_tblGoods1_idx` (`intCGoodsID`),
  KEY `fk_tblCompany_tblPostBillingTicket1_idx` (`intCPostBillingTicketID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`intCompanyID`, `intCGoodsID`, `intCPostBillingTicketID`, `strCompanyName`, `strCompanyAddress`, `strCompanyEmail`, `strCompanyContactPNum`, `strCompanyContactTNum`, `boolDeleted`) VALUES
(1, NULL, NULL, 'Hi Energy Marine Services INC.', 'Rm. 306 Velco Centre cr Sr. Oca & Delgado Sts., South Harbor, Port Area, Manila', 'hienergymarineservices@gmail.com', NULL, NULL, 0),
(2, NULL, NULL, 'Tugmaster & Barge Pool Inc.', '115 RM 202 J LUNA ST, BINONDO, Manila, Metro Manila,', 'tugmaster@gmail.com', NULL, NULL, 0),
(3, NULL, NULL, 'Black Pink', 'Pandacan, Manila', 'blackpinkyg@gmail.com', NULL, NULL, 0),
(4, NULL, NULL, 'TWICE JYPE', 'Seoul South Korea', 'twicejype@gmail.com', NULL, NULL, 0),
(5, NULL, NULL, 'TWICE JYPE', 'Seoul South Korea', 'twicesujype@gmail.com', NULL, NULL, 0),
(6, NULL, NULL, 'Isaac Tailoring Shop', 'Pureza, Manila', 'isaac@gmail.com', NULL, NULL, 0),
(7, NULL, NULL, 'Eyenet Training', 'Cubao', 'marinaslevie@gmail.com', NULL, NULL, 0),
(8, NULL, NULL, 'CJJ JCCC', 'pureza manila', 'cjj@gmail.com', NULL, NULL, 0),
(9, NULL, NULL, 'Amoeba and Company', 'Interstellar Galaxy Big Bang Theory', 'amoebiasis@gmail.com', NULL, NULL, 0),
(10, NULL, NULL, 'WNS', 'Eastwood City', 'wns@gmail.com', NULL, NULL, 0),
(11, NULL, NULL, 'Baboy and Company', 'Mataba St, Baboy City, Babuyan Group of Islands', 'annetianan@gmail.com', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontractlist`
--

DROP TABLE IF EXISTS `tblcontractlist`;
CREATE TABLE IF NOT EXISTS `tblcontractlist` (
  `intContractListID` int(11) NOT NULL AUTO_INCREMENT,
  `intCCompanyID` int(11) DEFAULT NULL,
  `strContractListTitle` varchar(191) DEFAULT NULL,
  `strContractListDesc` text,
  `intCAttachmentsID` int(11) DEFAULT NULL,
  `isFinalized` tinyint(1) DEFAULT NULL,
  `enumStatus` enum('Pending','Created','Requesting For Changes','Accepted','Active','Expired') DEFAULT 'Pending',
  `boolDeleted` tinyint(1) DEFAULT '0',
  `datContractActive` date DEFAULT NULL,
  `datContractExpire` date DEFAULT NULL,
  `enumConValidity` enum('6','1') DEFAULT NULL,
  PRIMARY KEY (`intContractListID`),
  KEY `fk_tblContractList_tblWaiver1_idx` (`intCAttachmentsID`),
  KEY `fk_tblContractList_tblCompany1_idx` (`intCCompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcontractlist`
--

INSERT INTO `tblcontractlist` (`intContractListID`, `intCCompanyID`, `strContractListTitle`, `strContractListDesc`, `intCAttachmentsID`, `isFinalized`, `enumStatus`, `boolDeleted`, `datContractActive`, `datContractExpire`, `enumConValidity`) VALUES
(1, 3, 'Hays', '<p>heys</p>', NULL, NULL, 'Expired', 0, NULL, NULL, '1'),
(2, 11, 'Contract', '<p>Contract Details</p>', NULL, NULL, 'Active', 0, '2018-08-30', '2019-08-30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbldispatchticket`
--

DROP TABLE IF EXISTS `tbldispatchticket`;
CREATE TABLE IF NOT EXISTS `tbldispatchticket` (
  `intDispatchTicketID` int(11) NOT NULL AUTO_INCREMENT,
  `strDispatchTicketDesc` varchar(45) DEFAULT NULL,
  `intDTTugboatAssignID` int(11) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intDispatchTicketID`),
  KEY `fk_tblDispatchTicket_tblTugboatAssign1_idx` (`intDTTugboatAssignID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

DROP TABLE IF EXISTS `tblemployee`;
CREATE TABLE IF NOT EXISTS `tblemployee` (
  `intEmployeeID` int(11) NOT NULL AUTO_INCREMENT,
  `intECompanyID` int(11) DEFAULT NULL,
  `intEPositionID` int(11) NOT NULL,
  `intETeamID` int(11) DEFAULT NULL,
  `enumEmpType` enum('Regular','Reserved','On Call') DEFAULT NULL,
  `strFName` varchar(45) NOT NULL,
  `strMName` varchar(45) DEFAULT NULL,
  `strLName` varchar(45) NOT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intEmployeeID`),
  KEY `fk_tblEmployee_tblPosition1_idx` (`intEPositionID`),
  KEY `fk_tblEmployee_tblTeam1_idx` (`intETeamID`),
  KEY `fk_tblemployee_tblcompany1_idx` (`intECompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`intEmployeeID`, `intECompanyID`, `intEPositionID`, `intETeamID`, `enumEmpType`, `strFName`, `strMName`, `strLName`, `isActive`, `boolDeleted`) VALUES
(1, 1, 1, 1, 'Regular', 'Reign Emmanuel', 'Orillosa', 'Malto', 1, 0),
(2, 1, 2, 1, 'Regular', 'Levie Anne', 'Tan', 'Mariñas', 1, 0),
(3, 1, 3, 1, 'Regular', 'John Carlos', 'Estrada', 'Pagaduan', 1, 0),
(4, 1, 3, 1, 'Regular', 'Joshua', 'Jamarolin', 'Ganila', 1, 0),
(5, 2, 4, NULL, 'Regular', 'Shirley Anne', 'Valencia', 'Tianan', 1, 0),
(6, 2, 5, NULL, 'Regular', 'Daniel', 'Benitez', 'Suello', 1, 0),
(7, 2, 6, NULL, 'Regular', 'Michael', 'Dion', 'Villanueva', 1, 0),
(8, 2, 6, NULL, 'Regular', 'Bern Paul', 'Dela Cruz', 'San Diego', 1, 0),
(9, 1, 2, NULL, 'Regular', 'Hannah', 'Lim', 'Ong', 1, 0),
(10, 1, 1, NULL, 'Regular', 'Mariecar', 'Salazar', 'Almonia', 1, 0),
(11, 1, 3, NULL, 'Regular', 'Stephanie Claire', 'Roquez', 'Gonzales', 1, 0),
(12, 1, 3, NULL, 'Regular', 'Daryl Elaine', 'Omlas', 'Abuel', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblgoods`
--

DROP TABLE IF EXISTS `tblgoods`;
CREATE TABLE IF NOT EXISTS `tblgoods` (
  `intGoodsID` int(11) NOT NULL AUTO_INCREMENT,
  `strGoodsName` varchar(45) DEFAULT NULL,
  `fltRateperTon` float DEFAULT NULL,
  `fltGoodWeight` float DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intGoodsID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblgoods`
--

INSERT INTO `tblgoods` (`intGoodsID`, `strGoodsName`, `fltRateperTon`, `fltGoodWeight`, `isActive`, `boolDeleted`) VALUES
(1, 'Cooking Oil', 500, NULL, 1, 0),
(2, 'Metal Rolls', 500, NULL, 1, 0),
(3, 'Gravel', 700, NULL, 1, 0),
(4, 'Diesel', 700, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblhauling`
--

DROP TABLE IF EXISTS `tblhauling`;
CREATE TABLE IF NOT EXISTS `tblhauling` (
  `intHaulingID` int(11) NOT NULL AUTO_INCREMENT,
  `intHJobSchedID` int(11) DEFAULT NULL,
  `intHLocationID` int(11) DEFAULT NULL,
  `intHServicesID` int(11) DEFAULT NULL,
  `intHAttachmentsID` int(11) DEFAULT NULL,
  `strHaulingDesc` varchar(45) DEFAULT NULL,
  `strDestinationPoint` varchar(45) DEFAULT NULL,
  `enumStatus` enum('Ongoing','Finished','Cancelled') DEFAULT NULL,
  `strPermitsAttachments` varchar(45) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intHaulingID`),
  KEY `fk_tblDelivery_tblServices1_idx` (`intHServicesID`),
  KEY `fk_tblHauling_tblLocation1_idx` (`intHLocationID`),
  KEY `fk_tblHauling_tblAttachments1_idx` (`intHAttachmentsID`),
  KEY `fk_tblhauling_tbljobsched` (`intHJobSchedID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

DROP TABLE IF EXISTS `tblinvoice`;
CREATE TABLE IF NOT EXISTS `tblinvoice` (
  `intInvoiceID` int(11) NOT NULL,
  `intIDispatchTicketID` int(11) DEFAULT NULL,
  `intDTCompanyID` int(11) DEFAULT NULL,
  `strInvoiceDesc` varchar(45) DEFAULT NULL,
  `fltBalanceRemain` float DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intInvoiceID`),
  KEY `fk_tblInvoice_tblDispatchTicket1_idx` (`intIDispatchTicketID`),
  KEY `fk_tblInvoice_tblCompany1_idx` (`intDTCompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbljoborder`
--

DROP TABLE IF EXISTS `tbljoborder`;
CREATE TABLE IF NOT EXISTS `tbljoborder` (
  `intJobOrderID` int(11) NOT NULL AUTO_INCREMENT,
  `intJOBerthID` int(11) DEFAULT NULL,
  `strJODestination` varchar(45) DEFAULT NULL,
  `intJOBargeID` int(11) DEFAULT NULL,
  `intJOGoodsID` int(11) DEFAULT NULL,
  `intJOeVesselID` int(11) DEFAULT NULL,
  `intJOCompanyID` int(11) DEFAULT NULL,
  `intJOttachmentsID` int(11) DEFAULT NULL,
  `strJODesc` varchar(45) DEFAULT NULL,
  `strJOVesselName` varchar(45) DEFAULT NULL,
  `dtmETA` datetime DEFAULT NULL,
  `dtmETD` datetime DEFAULT NULL,
  `enumStatus` enum('Created','Pending','Accepted','Forward Pending','Forward Scheduled','Forward Accepted','ForwardDeclined','Declined','Scheduled','Ongoing') DEFAULT NULL,
  `fltWeight` float DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intJobOrderID`),
  KEY `fk_tblSchedule_tblAttachments1_idx` (`intJOttachmentsID`),
  KEY `fk_tblSchedule_tblBarge1_idx` (`intJOBargeID`),
  KEY `fk_tblSchedule_tblVessel1_idx` (`intJOeVesselID`),
  KEY `fk_tblSchedule_tblCompany1_idx` (`intJOCompanyID`),
  KEY `fk_tblSchedule_tblBerth1` (`intJOBerthID`),
  KEY `fk_tblJoborder_tblGoods1_idx` (`intJOGoodsID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbljoborder`
--

INSERT INTO `tbljoborder` (`intJobOrderID`, `intJOBerthID`, `strJODestination`, `intJOBargeID`, `intJOGoodsID`, `intJOeVesselID`, `intJOCompanyID`, `intJOttachmentsID`, `strJODesc`, `strJOVesselName`, `dtmETA`, `dtmETD`, `enumStatus`, `fltWeight`, `boolDeleted`) VALUES
(1, NULL, NULL, NULL, 1, NULL, 3, NULL, 'Det', 'MT Space Sun', '2018-08-27 06:19:00', '2018-08-27 06:19:00', 'Scheduled', 200, 0),
(2, NULL, NULL, NULL, 2, NULL, 3, NULL, 'Hey', 'MT Space Star', '2018-08-27 06:20:00', '2018-08-27 06:20:00', 'Scheduled', 160, 0),
(3, NULL, NULL, NULL, 1, NULL, 3, NULL, 'Details', 'MT Space Orion', '2018-09-01 10:00:00', '2018-09-01 06:25:00', 'Scheduled', 150, 0),
(4, NULL, NULL, NULL, 1, NULL, 3, NULL, NULL, NULL, '2018-08-27 15:09:00', '2018-08-27 07:10:04', 'Accepted', NULL, 0),
(5, NULL, NULL, NULL, 1, NULL, 3, NULL, NULL, NULL, '2018-08-27 16:00:00', '2018-08-27 18:00:00', 'Pending', NULL, 0),
(6, NULL, NULL, NULL, 3, NULL, 4, NULL, 'EEEEEEEEK', 'MT Space Orion', '2018-09-01 12:00:00', '2018-08-27 18:59:00', 'Scheduled', 150, 0),
(7, 1, NULL, NULL, 2, NULL, 9, NULL, 'Please Haul Please', 'MT Space Orion', '2018-08-30 13:00:00', '2018-08-28 16:00:00', 'Pending', 120, 0),
(8, 4, NULL, NULL, 1, NULL, 11, NULL, 'Please Haul Please', 'MT Space Orion', '2018-08-31 12:00:00', '2018-08-30 15:00:00', 'Scheduled', 1500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbljobsched`
--

DROP TABLE IF EXISTS `tbljobsched`;
CREATE TABLE IF NOT EXISTS `tbljobsched` (
  `intJobSchedID` int(11) NOT NULL AUTO_INCREMENT,
  `intJSJobOrderID` int(11) DEFAULT NULL,
  `intJSSchedID` int(11) DEFAULT NULL,
  `intJSTugboatAssignID` int(11) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  `enumStatus` enum('Pending','Ongoing','Delayed','Finished') DEFAULT NULL,
  PRIMARY KEY (`intJobSchedID`),
  KEY `fk_jobsched_joborder` (`intJSJobOrderID`),
  KEY `fk_jobsched_schedule` (`intJSSchedID`),
  KEY `fk_tbljobsched_tugboatassign` (`intJSTugboatAssignID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbljobsched`
--

INSERT INTO `tbljobsched` (`intJobSchedID`, `intJSJobOrderID`, `intJSSchedID`, `intJSTugboatAssignID`, `boolDeleted`, `enumStatus`) VALUES
(1, 3, 1, 1, 0, NULL),
(2, 1, 2, 1, 0, NULL),
(3, 1, 3, 2, 0, NULL),
(4, 1, 3, 3, 0, NULL),
(5, 8, 4, 4, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation`
--

DROP TABLE IF EXISTS `tbllocation`;
CREATE TABLE IF NOT EXISTS `tbllocation` (
  `intLocationID` int(11) NOT NULL AUTO_INCREMENT,
  `strLocationDesc` varchar(45) DEFAULT NULL,
  `strLocation` varchar(45) DEFAULT NULL,
  `tmLocationTime` time DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intLocationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

DROP TABLE IF EXISTS `tblpayment`;
CREATE TABLE IF NOT EXISTS `tblpayment` (
  `intPaymentID` int(11) NOT NULL AUTO_INCREMENT,
  `intPCompanyID` int(11) DEFAULT NULL,
  `enumPaymentType` enum('Cash','Cheque','Bank Deposit') DEFAULT NULL,
  `strPaymentDesc` varchar(45) DEFAULT NULL,
  `strBankName` varchar(45) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intPaymentID`),
  KEY `fk_tblPayment_tblCompany1_idx` (`intPCompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblpier`
--

DROP TABLE IF EXISTS `tblpier`;
CREATE TABLE IF NOT EXISTS `tblpier` (
  `intPierID` int(11) NOT NULL AUTO_INCREMENT,
  `strPierName` varchar(45) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intPierID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpier`
--

INSERT INTO `tblpier` (`intPierID`, `strPierName`, `isActive`, `boolDeleted`) VALUES
(1, 'Pier 3', 1, 0),
(2, 'Pier 5', 1, 0),
(3, 'Pier 9', 1, 0),
(4, 'Pier 13', 1, 0),
(5, 'Nyoooooooooork', 1, 0),
(6, 'nyork', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblposition`
--

DROP TABLE IF EXISTS `tblposition`;
CREATE TABLE IF NOT EXISTS `tblposition` (
  `intPositionID` int(11) NOT NULL AUTO_INCREMENT,
  `strPositionName` varchar(45) DEFAULT NULL,
  `intPCompanyID` int(11) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intPositionID`),
  KEY `fk_tblPosition_tblCompany1_idx` (`intPCompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblposition`
--

INSERT INTO `tblposition` (`intPositionID`, `strPositionName`, `intPCompanyID`, `isActive`, `boolDeleted`) VALUES
(1, 'Captain', 1, 1, 0),
(2, 'Chief Engineer', 1, 1, 0),
(3, 'Crew', 1, 1, 0),
(4, 'Captain', 2, 1, 0),
(5, 'Chief Engineer', 2, 1, 0),
(6, 'Crew', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpostbillingticket`
--

DROP TABLE IF EXISTS `tblpostbillingticket`;
CREATE TABLE IF NOT EXISTS `tblpostbillingticket` (
  `intPostBillingTicketID` int(11) NOT NULL AUTO_INCREMENT,
  `intPBTAgreementID` int(11) DEFAULT NULL,
  `intPBTGoodsID` int(11) DEFAULT NULL,
  `intPBTDispatchTicketID` int(11) DEFAULT NULL,
  `intPBTPaymentID` int(11) DEFAULT NULL,
  `intPBTInvoiceID` int(11) DEFAULT NULL,
  `fltAdditionalCharges` float DEFAULT NULL,
  `strBillingHistory` varchar(45) DEFAULT NULL,
  `strPostBillingTicketDesc` varchar(45) DEFAULT NULL,
  `strPBTSOA` varchar(45) DEFAULT NULL,
  `enumStatus` enum('Pending','Finalized') DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intPostBillingTicketID`),
  KEY `fk_tblPostBillingTicket_tblGoods1_idx` (`intPBTGoodsID`),
  KEY `fk_tblPostBillingTicket_tblDispatchTicket1_idx` (`intPBTDispatchTicketID`),
  KEY `fk_tblPostBillingTicket_tblInvoice1_idx` (`intPBTInvoiceID`),
  KEY `fk_tblPostBillingTicket_tblPayment1_idx` (`intPBTPaymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblquotation`
--

DROP TABLE IF EXISTS `tblquotation`;
CREATE TABLE IF NOT EXISTS `tblquotation` (
  `intQuotationID` int(11) NOT NULL AUTO_INCREMENT,
  `intQContractListID` int(11) DEFAULT NULL,
  `fltQuotationTDelayFee` float DEFAULT NULL,
  `fltQuotationViolationFee` float DEFAULT NULL,
  `fltQuotationConsigneeLateFee` float DEFAULT NULL,
  `fltMinDamageFee` float DEFAULT NULL,
  `fltMaxDamageFee` float DEFAULT NULL,
  `intDiscount` int(11) DEFAULT NULL,
  `fltStandardRate` float DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intQuotationID`),
  UNIQUE KEY `intQuotationID_UNIQUE` (`intQuotationID`),
  KEY `fk_tblquotation_tblcontractlist1_idx` (`intQContractListID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblquotation`
--

INSERT INTO `tblquotation` (`intQuotationID`, `intQContractListID`, `fltQuotationTDelayFee`, `fltQuotationViolationFee`, `fltQuotationConsigneeLateFee`, `fltMinDamageFee`, `fltMaxDamageFee`, `intDiscount`, `fltStandardRate`, `boolDeleted`) VALUES
(1, 1, 2000, 1000, 1000, 1000, 2000, NULL, 1000, 0),
(2, 2, 2000, 3000, 4000, 1000, 2000, 20, 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblrequest`
--

DROP TABLE IF EXISTS `tblrequest`;
CREATE TABLE IF NOT EXISTS `tblrequest` (
  `intRequestID` int(11) NOT NULL AUTO_INCREMENT,
  `intRequestDescription` text CHARACTER SET latin1,
  `enumRequestType` enum('Forward Joborder','Request Team','Request Tugboat') CHARACTER SET latin1 DEFAULT NULL,
  `intRCompanyID` int(11) DEFAULT NULL,
  `intRForwardCompanyID` int(11) DEFAULT NULL,
  `enumRequestStatus` enum('Pending','Accepted','Declined') CHARACTER SET latin1 DEFAULT 'Pending',
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intRequestID`),
  KEY `fk_tblRequest_tblCompany1_idx` (`intRCompanyID`),
  KEY `fk_tblRequest_tblCompany2_idx` (`intRForwardCompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

DROP TABLE IF EXISTS `tblschedule`;
CREATE TABLE IF NOT EXISTS `tblschedule` (
  `intScheduleID` int(11) NOT NULL AUTO_INCREMENT,
  `strScheduleDesc` varchar(60) NOT NULL,
  `dttmETA` datetime DEFAULT NULL,
  `dttmETD` datetime DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intScheduleID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblschedule`
--

INSERT INTO `tblschedule` (`intScheduleID`, `strScheduleDesc`, `dttmETA`, `dttmETD`, `boolDeleted`) VALUES
(1, 'Details', '2018-09-01 10:00:00', '2018-09-01 06:25:00', 0),
(2, 'Det', '2018-08-27 06:19:00', '2018-08-27 15:20:00', 0),
(3, 'Det', '2018-08-27 06:19:00', '2018-08-27 06:19:00', 0),
(4, 'Please Haul Please', '2018-08-31 12:00:00', '2018-08-30 15:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

DROP TABLE IF EXISTS `tblservices`;
CREATE TABLE IF NOT EXISTS `tblservices` (
  `intServicesID` int(11) NOT NULL AUTO_INCREMENT,
  `strServicesName` varchar(45) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intServicesID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`intServicesID`, `strServicesName`, `boolDeleted`) VALUES
(1, 'Assisting', 0),
(2, 'Tugging', 0),
(3, 'Towing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblteam`
--

DROP TABLE IF EXISTS `tblteam`;
CREATE TABLE IF NOT EXISTS `tblteam` (
  `intTeamID` int(11) NOT NULL AUTO_INCREMENT,
  `strTeamName` varchar(45) DEFAULT NULL,
  `intTCompanyID` int(11) DEFAULT NULL,
  `intTForwardCompanyID` int(11) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intTeamID`),
  KEY `fK_tblTeam_tblCompany1_idx` (`intTCompanyID`),
  KEY `fk_tblTeam_tblCompany2_idx` (`intTForwardCompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblteam`
--

INSERT INTO `tblteam` (`intTeamID`, `strTeamName`, `intTCompanyID`, `intTForwardCompanyID`, `boolDeleted`) VALUES
(1, NULL, 1, NULL, 0),
(2, 'MaiTeam', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblteamcomp`
--

DROP TABLE IF EXISTS `tblteamcomp`;
CREATE TABLE IF NOT EXISTS `tblteamcomp` (
  `intTeamCompositionID` int(11) NOT NULL,
  `intTCCaptainNumber` int(11) DEFAULT '1',
  `intTCChiefEngineerNumber` int(11) DEFAULT '1',
  `intTCCrewNumber` int(11) DEFAULT '2',
  `intTCOthersNumber` int(11) DEFAULT '0',
  `intTCCompanyID` int(11) DEFAULT NULL,
  PRIMARY KEY (`intTeamCompositionID`),
  KEY `fk_tblTeamComp_tblCompany_idx` (`intTCCompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbltugboat`
--

DROP TABLE IF EXISTS `tbltugboat`;
CREATE TABLE IF NOT EXISTS `tbltugboat` (
  `intTugboatID` int(11) NOT NULL AUTO_INCREMENT,
  `intTTugboatMainID` int(11) DEFAULT NULL,
  `intTTugboatSpecsID` int(11) DEFAULT NULL,
  `intTTugboatClassID` int(11) DEFAULT NULL,
  `intTCompanyID` int(11) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intTugboatID`),
  KEY `fk_tblTugboat_tblTugboatClass1_idx` (`intTTugboatClassID`),
  KEY `fk_tblTugboat_tblTugboatSpecs1_idx` (`intTTugboatSpecsID`),
  KEY `fk_tblTugboat_tblTugboatMain1_idx` (`intTTugboatMainID`),
  KEY `fk_tblTugboat_tblCompany1_idx` (`intTCompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboat`
--

INSERT INTO `tbltugboat` (`intTugboatID`, `intTTugboatMainID`, `intTTugboatSpecsID`, `intTTugboatClassID`, `intTCompanyID`, `boolDeleted`) VALUES
(1, 1, 1, 1, 1, 0),
(2, 2, 2, 2, 1, 0),
(3, 3, 3, 3, 1, 0),
(4, 4, 4, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltugboatassign`
--

DROP TABLE IF EXISTS `tbltugboatassign`;
CREATE TABLE IF NOT EXISTS `tbltugboatassign` (
  `intTAssignID` int(11) NOT NULL AUTO_INCREMENT,
  `intTATugboatID` int(11) DEFAULT NULL,
  `intTATeamID` int(11) DEFAULT NULL,
  `strTADesc` varchar(45) DEFAULT NULL,
  `intTACompanyID` int(11) DEFAULT NULL,
  `intTAForwardCompanyID` int(11) DEFAULT NULL,
  `enumStatus` enum('Available','Occupied') DEFAULT 'Available',
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intTAssignID`),
  KEY `fk_tblTugboatAssign_tblTugboat1_idx` (`intTATugboatID`),
  KEY `fk_tblTugboatAssign_tblTeam1_idx` (`intTATeamID`),
  KEY `fk_tblTugboatAssign_tblCompany1_idx` (`intTACompanyID`),
  KEY `fk_tblTugboatAssign_tblCompany2_idx` (`intTAForwardCompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboatassign`
--

INSERT INTO `tbltugboatassign` (`intTAssignID`, `intTATugboatID`, `intTATeamID`, `strTADesc`, `intTACompanyID`, `intTAForwardCompanyID`, `enumStatus`, `boolDeleted`) VALUES
(1, 1, 1, NULL, NULL, NULL, 'Occupied', 0),
(2, 2, NULL, NULL, NULL, NULL, 'Occupied', 0),
(3, 3, NULL, NULL, NULL, NULL, 'Occupied', 0),
(4, 4, 2, 'MaiTeam', NULL, NULL, 'Occupied', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltugboatclass`
--

DROP TABLE IF EXISTS `tbltugboatclass`;
CREATE TABLE IF NOT EXISTS `tbltugboatclass` (
  `intTugboatClassID` int(11) NOT NULL AUTO_INCREMENT,
  `strOwner` varchar(45) DEFAULT NULL,
  `strTugboatFlag` varchar(45) DEFAULT NULL,
  `intTCTugboatTypeID` int(11) DEFAULT NULL,
  `strClassNum` varchar(45) DEFAULT NULL,
  `strOfficialNum` varchar(45) DEFAULT NULL,
  `strIMONum` varchar(45) DEFAULT NULL,
  `strTradingArea` varchar(45) DEFAULT NULL,
  `strHomePort` varchar(45) DEFAULT NULL,
  `enumISPSCodeCompliance` enum('Yes','No') DEFAULT NULL,
  `enumISMCodeStandard` enum('Yes','No') DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intTugboatClassID`),
  KEY `fk_tugboatclass_tugboattype` (`intTCTugboatTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboatclass`
--

INSERT INTO `tbltugboatclass` (`intTugboatClassID`, `strOwner`, `strTugboatFlag`, `intTCTugboatTypeID`, `strClassNum`, `strOfficialNum`, `strIMONum`, `strTradingArea`, `strHomePort`, `enumISPSCodeCompliance`, `enumISMCodeStandard`, `boolDeleted`) VALUES
(1, 'Hi Energy Marine Services INC.', 'Phillipines', 1, 'ORS-12-0804', '10 0000746', '7419573', 'Coastwise', 'Cagayan De Oro', 'Yes', 'Yes', 0),
(2, 'Hi Energy Marine Services INC.', 'American Samoa', 1, '2332', '22123', '32131', '23', '23', 'Yes', 'Yes', 0),
(3, 'Hi Energy Marine Services INC.', 'Azerbaijan', 1, '2131', '222sf', '214t6', 'Luzon', 'Marawi', 'Yes', 'Yes', 0),
(4, 'Hi Energy Marine Services INC.', 'Phillipines', 1, 'ORS-16-0901', '04-0005098', '7912939', 'Coastwise', 'Batangas', 'Yes', 'Yes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltugboatequip`
--

DROP TABLE IF EXISTS `tbltugboatequip`;
CREATE TABLE IF NOT EXISTS `tbltugboatequip` (
  `intTugboatEquipmentID` int(11) NOT NULL AUTO_INCREMENT,
  `strTugboatEquipmentDesc` int(11) DEFAULT NULL,
  `intTETugboatID` int(11) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intTugboatEquipmentID`),
  KEY `fk_tblTugboatEquip_tblTugboat1_idx` (`intTETugboatID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbltugboatinsurance`
--

DROP TABLE IF EXISTS `tbltugboatinsurance`;
CREATE TABLE IF NOT EXISTS `tbltugboatinsurance` (
  `intTugboatInsuranceID` int(11) NOT NULL AUTO_INCREMENT,
  `strTugboatInsuranceDesc` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `intTITugboatID` int(11) DEFAULT NULL,
  `boolDeleted` varchar(45) CHARACTER SET latin1 DEFAULT '0',
  PRIMARY KEY (`intTugboatInsuranceID`),
  KEY `fk_tblTugboatInsurance_tbTugboat1l_idx` (`intTITugboatID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboatinsurance`
--

INSERT INTO `tbltugboatinsurance` (`intTugboatInsuranceID`, `strTugboatInsuranceDesc`, `intTITugboatID`, `boolDeleted`) VALUES
(3, 'Hull (Pioneer Insurance)', 1, '0'),
(4, 'P & I (Protective & Indemnity)', 1, '0'),
(5, 'Insurance1', 2, '0'),
(6, 'Insurance2', 2, '0'),
(7, 'Insurance3', 2, '0'),
(8, 'Insurance3', 2, '0'),
(9, 'sa nguso', 3, '0'),
(10, 'Pioneer', 4, '0'),
(11, 'P & I', 4, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbltugboatmain`
--

DROP TABLE IF EXISTS `tbltugboatmain`;
CREATE TABLE IF NOT EXISTS `tbltugboatmain` (
  `intTugboatMainID` int(11) NOT NULL AUTO_INCREMENT,
  `strName` varchar(45) DEFAULT NULL,
  `strLength` varchar(45) DEFAULT NULL,
  `strBreadth` varchar(45) DEFAULT NULL,
  `strDepth` varchar(45) DEFAULT NULL,
  `strHorsePower` varchar(45) DEFAULT NULL,
  `strMaxSpeed` varchar(45) DEFAULT NULL,
  `strBollardPull` varchar(45) DEFAULT NULL,
  `strGrossTonnage` varchar(45) DEFAULT NULL,
  `strNetTonnage` varchar(45) DEFAULT NULL,
  `datLastDrydocked` date DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intTugboatMainID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboatmain`
--

INSERT INTO `tbltugboatmain` (`intTugboatMainID`, `strName`, `strLength`, `strBreadth`, `strDepth`, `strHorsePower`, `strMaxSpeed`, `strBollardPull`, `strGrossTonnage`, `strNetTonnage`, `datLastDrydocked`, `boolDeleted`) VALUES
(1, 'MT Energy Master', '29.43', '8.20', '3.59', '1318.42x2 - 2636.84', '13.5', '36.931', '185.97', '55.79', '2015-08-06', 0),
(2, 'Mountain', '200', '21', '20', '1023', '120', '200', '200', '123', '2018-08-11', 0),
(3, 'Enierga Son', '300', '1', '2', '123', '70', '12', '23', '12', '2018-08-29', 0),
(4, 'MT Energy Galaxy', '12.5', '15', '4.00', '1622.67 x 2 - 3245.34', '15', '43.63', '45', '55.79', '2018-08-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltugboatspecs`
--

DROP TABLE IF EXISTS `tbltugboatspecs`;
CREATE TABLE IF NOT EXISTS `tbltugboatspecs` (
  `intTugboatSpecsID` int(11) NOT NULL AUTO_INCREMENT,
  `strHullMaterial` varchar(45) DEFAULT NULL,
  `strBuilder` varchar(45) DEFAULT NULL,
  `strMakerPower` varchar(45) DEFAULT NULL,
  `strDrive` varchar(45) DEFAULT NULL,
  `strCylinderperCycle` varchar(45) DEFAULT NULL,
  `strAuxEngine` varchar(45) DEFAULT NULL,
  `strLocationBuilt` varchar(70) DEFAULT NULL,
  `datBuiltDate` date DEFAULT NULL,
  `enumAISGPSVHFRadar` enum('Yes','No') DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intTugboatSpecsID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboatspecs`
--

INSERT INTO `tbltugboatspecs` (`intTugboatSpecsID`, `strHullMaterial`, `strBuilder`, `strMakerPower`, `strDrive`, `strCylinderperCycle`, `strAuxEngine`, `strLocationBuilt`, `datBuiltDate`, `enumAISGPSVHFRadar`, `boolDeleted`) VALUES
(1, 'Steel', 'Kanagahazosen', '2 Units Niigata Model 6L25BX', 'Niigata ZP-2', '8/ 4', '2 Units Yanmar 60 KVA 225 Volts', 'Japan', '1974-10-01', 'Yes', 0),
(2, 'Metal', 'Koreans', 'Power', 'Google', '13/3', 'Engine', 'Korea', '2018-07-31', 'Yes', 0),
(3, 'waze', 'Breadboard', 'CCIS', 'google', '12/4', 'aux 1', 'PUP', '2018-08-20', 'Yes', 0),
(4, 'Steel', 'Kanagahazosen', 'Niigata', 'Niigata ZP-2', '8 /4', 'Yanmar', 'Japan', '1970-10-01', 'Yes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltugboattype`
--

DROP TABLE IF EXISTS `tbltugboattype`;
CREATE TABLE IF NOT EXISTS `tbltugboattype` (
  `intTugboatTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `strTugboatTypeName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`intTugboatTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboattype`
--

INSERT INTO `tbltugboattype` (`intTugboatTypeID`, `strTugboatTypeName`, `isActive`, `boolDeleted`) VALUES
(1, 'Harbor Tug', 1, 0),
(2, 'River Tug', 0, 0),
(3, 'Deep Sea Tug', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblvessel`
--

DROP TABLE IF EXISTS `tblvessel`;
CREATE TABLE IF NOT EXISTS `tblvessel` (
  `intVesselID` int(11) NOT NULL AUTO_INCREMENT,
  `intVGoodsID` int(11) DEFAULT NULL,
  `strVesselName` varchar(45) DEFAULT NULL,
  `strVesselDesc` varchar(45) DEFAULT NULL,
  `fltVesselWeight` float DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intVesselID`),
  KEY `fk_tblVessel_tblGoods1_idx` (`intVGoodsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intUCompanyID` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `boolDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `enumUserType` enum('Admin','Affiliates','Captain','Consignee') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `intUCompanyID`, `remember_token`, `created_at`, `updated_at`, `isActive`, `boolDeleted`, `enumUserType`) VALUES
(1, 'HEMSI', 'hienergymarineservices@gmail.com', '$2y$10$EPf6MLFuhVXXVji1gE.vnONc2PdnoHSEkJ1H8wIPJcLbz2CE6.4de', 1, '31JJvJNRhqiXn4oq8nSBw02Hiyn0KuSNAkvc5L3RhcUOOWJMyoBpdAhrp0N8', '2018-08-26 21:39:55', '2018-08-28 21:41:34', 1, 0, 'Admin'),
(2, 'Tugmasters', 'tugmaster@gmail.com', '$2y$10$uGDjz7KPIoaX5jCw/NN9NOC7AdruGebYbIYuIRn1xuSvss8vwA0l.', 2, 'ldW5gYPfcfI4i0ihEQ5SLYvgxUfAQHDLOUxckfBq9G4srvg74MUKujbncLPe', '2018-08-26 21:43:36', '2018-08-26 21:43:36', 0, 0, 'Affiliates'),
(3, 'Black Pink', 'blackpinkyg@gmail.com', '$2y$10$QeUnO0ypzktouf/19X6k3OEJkQ7iryv2Q24xrv7F1v.ohyQyLoYRW', 3, '1caxBlgbMR2cyIjZYpl2ftSR0TQ5hSXiD86fyTat9IiQZ96MxW5LbIb1IL07', '2018-08-26 22:08:35', '2018-08-29 01:01:04', 1, 0, 'Consignee'),
(4, 'TWICE', 'twicejype@gmail.com', '$2y$10$7pFLHptgmpu00ZO534rUE.UVQkVp9Vq.cFfPhzGt9REt4lmrOVTAy', 4, 'eF2aWBHWjDL7i3xgaWEpQWQyAluvtEUUz8GYp2ZvF7krNgIpODBijGCs23zR', '2018-08-27 02:46:55', '2018-08-28 22:13:14', 1, 0, 'Consignee'),
(5, 'TWICE', 'twicesujype@gmail.com', '$2y$10$q9nlpjUEfEOKVgzmMAuVJeTx4XbYvGBpKth22ZaVlXKnjJRS0gVie', 5, 'rJyW6dmSaZbLOw6prgfLeqkUT6OqnXuyKcoUZoY7H6U8nFbrIjbHcghmmxF3', '2018-08-27 02:47:56', '2018-08-28 22:12:47', 0, 0, 'Consignee'),
(6, 'Isaac Tailoring Shop', 'isaac@gmail.com', '$2y$10$j8z4HECOGsHqXiBa1J5EueWk/e9PNIapA4TRrKvpPL9I46AelTNRK', 6, 'Z7XxlxIck6MHr9OCWwJh5OFJZIPL8ueXWTN7C3YMZ9LIGYwinHsQSOCkqZtQ', '2018-08-27 04:41:35', '2018-08-28 22:13:52', 0, 0, 'Consignee'),
(7, 'Eyenet Training', 'marinaslevie@gmail.com', '$2y$10$YIo5rGen4jkUMlrUxbaaNed78mN92q7bg2r8IcOBE32k.PqacvEHm', 7, 'Pw5GitIwNMTJBRlaRUvXmm5wGkmgopnFKw7se6IeXpJXqF8ZZjrytOipYjDk', '2018-08-27 06:16:04', '2018-08-30 02:41:32', 0, 0, 'Consignee'),
(8, 'CJJ Printing', 'cjj@gmail.com', '$2y$10$wcgm2UxW1uqCN7daW9sbdOXc8/EEK9i/PTF/6B5CrRELExJ236XV2', 8, 'qQOEAj1sErt35yFaWEldT3VZBpYYgB3HVCKNZWq0ugpp1evk0HROYvDm328x', '2018-08-27 20:23:06', '2018-08-27 20:23:38', 1, 0, 'Consignee'),
(9, 'Amoeba', 'amoebiasis@gmail.com', '$2y$10$YgI2/fS/WRPnLWnevwBCgOdr5no34RoKw.Th8h/Ok6VB0255G5Kmy', 9, 'pPhRJNXXhSdesVgQTGzhqWyEiN6Dp08fysWuVzSi9atRdLlmbYbnD4wgyMUc', '2018-08-27 20:47:10', '2018-08-30 02:47:23', 1, 0, 'Consignee'),
(10, 'WNS', 'wns@gmail.com', '$2y$10$Om81.l4Ukk8RLLnySF2r0OHFguZntZeY5o3bWjlpF/UOsu36BcXsi', 10, '6l6RaOcijJ0FWvBqHs48DH4ivJgyKwAutFrnqi442ymyCRcQywdLYfG0AHBF', '2018-08-29 01:10:03', '2018-08-29 01:10:26', 1, 0, 'Consignee'),
(11, 'Anne Tianan', 'annetianan@gmail.com', '$2y$10$FNs6YMmLctedGn8iBIPWiOB1EatOfJ05xBocZWaUooAIx4Zb2RQem', 11, NULL, '2018-08-30 02:32:35', '2018-08-30 02:48:48', 1, 0, 'Consignee');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbarge`
--
ALTER TABLE `tblbarge`
  ADD CONSTRAINT `fk_tblBarge_tblGoods1` FOREIGN KEY (`intBGoodsID`) REFERENCES `tblgoods` (`intGoodsID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblberth`
--
ALTER TABLE `tblberth`
  ADD CONSTRAINT `fk_tblBerth_tblPier1` FOREIGN KEY (`intBPierID`) REFERENCES `tblpier` (`intPierID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD CONSTRAINT `fk_tblCompany_tblGoods1` FOREIGN KEY (`intCGoodsID`) REFERENCES `tblgoods` (`intGoodsID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblCompany_tblPostBillingTicket1` FOREIGN KEY (`intCPostBillingTicketID`) REFERENCES `tblpostbillingticket` (`intPostBillingTicketID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblcontractlist`
--
ALTER TABLE `tblcontractlist`
  ADD CONSTRAINT `fk_tblContractList_tblCompany1` FOREIGN KEY (`intCCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblContractList_tblWaiver1` FOREIGN KEY (`intCAttachmentsID`) REFERENCES `tblattachments` (`intAttachmentsID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbldispatchticket`
--
ALTER TABLE `tbldispatchticket`
  ADD CONSTRAINT `fk_tblDispatchTicket_tblTugboatAssign1` FOREIGN KEY (`intDTTugboatAssignID`) REFERENCES `tbltugboatassign` (`intTAssignID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD CONSTRAINT `fk_tblEmployee_tblPosition1` FOREIGN KEY (`intEPositionID`) REFERENCES `tblposition` (`intPositionID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblEmployee_tblTeam1` FOREIGN KEY (`intETeamID`) REFERENCES `tblteam` (`intTeamID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblemployee_tblcompany1` FOREIGN KEY (`intECompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblhauling`
--
ALTER TABLE `tblhauling`
  ADD CONSTRAINT `fk_tblDelivery_tblServices1` FOREIGN KEY (`intHServicesID`) REFERENCES `tblservices` (`intServicesID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblHauling_tblAttachments1` FOREIGN KEY (`intHAttachmentsID`) REFERENCES `tblattachments` (`intAttachmentsID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblHauling_tblLocation1` FOREIGN KEY (`intHLocationID`) REFERENCES `tbllocation` (`intLocationID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblhauling_tbljobsched` FOREIGN KEY (`intHJobSchedID`) REFERENCES `tbljobsched` (`intJobSchedID`);

--
-- Constraints for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD CONSTRAINT `fk_tblInvoice_tblCompany1` FOREIGN KEY (`intDTCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblInvoice_tblDispatchTicket1` FOREIGN KEY (`intIDispatchTicketID`) REFERENCES `tbldispatchticket` (`intDispatchTicketID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbljoborder`
--
ALTER TABLE `tbljoborder`
  ADD CONSTRAINT `fk_tblJoborder_tblGoods1` FOREIGN KEY (`intJOGoodsID`) REFERENCES `tblgoods` (`intGoodsID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbljobsched`
--
ALTER TABLE `tbljobsched`
  ADD CONSTRAINT `fk_jobsched_joborder` FOREIGN KEY (`intJSJobOrderID`) REFERENCES `tbljoborder` (`intJobOrderID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jobsched_schedule` FOREIGN KEY (`intJSSchedID`) REFERENCES `tblschedule` (`intScheduleID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbljobsched_tugboatassign` FOREIGN KEY (`intJSTugboatAssignID`) REFERENCES `tbltugboatassign` (`intTAssignID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD CONSTRAINT `fk_tblPayment_tblCompany1` FOREIGN KEY (`intPCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblposition`
--
ALTER TABLE `tblposition`
  ADD CONSTRAINT `fk_tblPosition_tblCompany1` FOREIGN KEY (`intPCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblpostbillingticket`
--
ALTER TABLE `tblpostbillingticket`
  ADD CONSTRAINT `fk_tblPostBillingTicket_tblDispatchTicket1` FOREIGN KEY (`intPBTDispatchTicketID`) REFERENCES `tbldispatchticket` (`intDispatchTicketID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblPostBillingTicket_tblGoods1` FOREIGN KEY (`intPBTGoodsID`) REFERENCES `tblgoods` (`intGoodsID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblPostBillingTicket_tblInvoice1` FOREIGN KEY (`intPBTInvoiceID`) REFERENCES `tblinvoice` (`intInvoiceID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblPostBillingTicket_tblPayment1` FOREIGN KEY (`intPBTPaymentID`) REFERENCES `tblpayment` (`intPaymentID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblquotation`
--
ALTER TABLE `tblquotation`
  ADD CONSTRAINT `fk_tblquotation_tblcontractlist1` FOREIGN KEY (`intQContractListID`) REFERENCES `tblcontractlist` (`intContractListID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblrequest`
--
ALTER TABLE `tblrequest`
  ADD CONSTRAINT `fk_tblRequest_tblCompany1` FOREIGN KEY (`intRCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblRequest_tblCompany2` FOREIGN KEY (`intRForwardCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblteam`
--
ALTER TABLE `tblteam`
  ADD CONSTRAINT `fK_tblTeam_tblCompany1` FOREIGN KEY (`intTCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblTeam_tblCompany2` FOREIGN KEY (`intTForwardCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblteamcomp`
--
ALTER TABLE `tblteamcomp`
  ADD CONSTRAINT `fk_tblTeamComp_tblCompany` FOREIGN KEY (`intTCCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbltugboat`
--
ALTER TABLE `tbltugboat`
  ADD CONSTRAINT `fk_tblTugboat_tblCompany1` FOREIGN KEY (`intTCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblTugboat_tblTugboatClass1` FOREIGN KEY (`intTTugboatClassID`) REFERENCES `tbltugboatclass` (`intTugboatClassID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblTugboat_tblTugboatMain1` FOREIGN KEY (`intTTugboatMainID`) REFERENCES `tbltugboatmain` (`intTugboatMainID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblTugboat_tblTugboatSpecs1` FOREIGN KEY (`intTTugboatSpecsID`) REFERENCES `tbltugboatspecs` (`intTugboatSpecsID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbltugboatassign`
--
ALTER TABLE `tbltugboatassign`
  ADD CONSTRAINT `fk_tblTugboatAssign_tblCompany1` FOREIGN KEY (`intTACompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblTugboatAssign_tblCompany2` FOREIGN KEY (`intTAForwardCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblTugboatAssign_tblTeam1` FOREIGN KEY (`intTATeamID`) REFERENCES `tblteam` (`intTeamID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblTugboatAssign_tblTugboat1` FOREIGN KEY (`intTATugboatID`) REFERENCES `tbltugboat` (`intTugboatID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbltugboatclass`
--
ALTER TABLE `tbltugboatclass`
  ADD CONSTRAINT `fk_tugboatclass_tugboattype` FOREIGN KEY (`intTCTugboatTypeID`) REFERENCES `tbltugboattype` (`intTugboatTypeID`);

--
-- Constraints for table `tbltugboatequip`
--
ALTER TABLE `tbltugboatequip`
  ADD CONSTRAINT `fk_tblTugboatEquip_tblTugboat1` FOREIGN KEY (`intTETugboatID`) REFERENCES `tbltugboat` (`intTugboatID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbltugboatinsurance`
--
ALTER TABLE `tbltugboatinsurance`
  ADD CONSTRAINT `fk_tblTugboatInsurance_tbTugboat1l` FOREIGN KEY (`intTITugboatID`) REFERENCES `tbltugboat` (`intTugboatID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblvessel`
--
ALTER TABLE `tblvessel`
  ADD CONSTRAINT `fk_tblVessel_tblGoods1` FOREIGN KEY (`intVGoodsID`) REFERENCES `tblgoods` (`intGoodsID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
