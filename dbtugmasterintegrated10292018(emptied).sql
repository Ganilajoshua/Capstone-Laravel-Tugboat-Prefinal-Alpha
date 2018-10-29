-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2018 at 05:54 AM
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
-- Database: `dbtugmasterintegrated`
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
-- Table structure for table `tblbalance`
--

DROP TABLE IF EXISTS `tblbalance`;
CREATE TABLE IF NOT EXISTS `tblbalance` (
  `intBalanceID` int(11) NOT NULL,
  `fltBalance` float NOT NULL DEFAULT '0',
  `dtUpdateBalance` date NOT NULL,
  PRIMARY KEY (`intBalanceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intBerthID`),
  UNIQUE KEY `intBPierID` (`intBPierID`,`strBerthName`),
  KEY `fk_tblBerth_tblPier1_idx` (`intBPierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblbill`
--

DROP TABLE IF EXISTS `tblbill`;
CREATE TABLE IF NOT EXISTS `tblbill` (
  `intBillID` int(11) NOT NULL AUTO_INCREMENT,
  `strSignature` text,
  `enumStatus` enum('Pending','Accepted','Rejected','Processing') NOT NULL,
  `boolDeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`intBillID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcharges`
--

DROP TABLE IF EXISTS `tblcharges`;
CREATE TABLE IF NOT EXISTS `tblcharges` (
  `intChargeID` int(11) NOT NULL AUTO_INCREMENT,
  `fltJOAmount` float DEFAULT '0',
  `fltTugboatDelayFee` float DEFAULT '0',
  `fltConsigneeViolationFee` float DEFAULT '0',
  `fltConsigneeLateFee` float DEFAULT '0',
  `fltConsigneeDamageFee` float DEFAULT '0',
  `fltCompanyDamageFee` float DEFAULT '0',
  `fltCompanyViolationFee` float DEFAULT '0',
  `intDiscount` int(11) NOT NULL,
  PRIMARY KEY (`intChargeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcheque`
--

DROP TABLE IF EXISTS `tblcheque`;
CREATE TABLE IF NOT EXISTS `tblcheque` (
  `intChequeID` int(11) NOT NULL AUTO_INCREMENT,
  `intCBillID` int(11) NOT NULL,
  `dtPayment` date NOT NULL,
  `intABANum` int(11) NOT NULL,
  `intAmount` int(11) NOT NULL,
  `strMemo` varchar(100) NOT NULL,
  `intRouteNum` int(11) NOT NULL,
  `intAccountNum` int(11) NOT NULL,
  `boolDeleted` int(11) NOT NULL,
  PRIMARY KEY (`intChequeID`),
  KEY `fk_tblcheque_tblbill` (`intCBillID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `strCompanyPermit` text,
  `strCompanyPicture` text,
  PRIMARY KEY (`intCompanyID`),
  KEY `fk_tblCompany_tblGoods1_idx` (`intCGoodsID`),
  KEY `fk_tblCompany_tblPostBillingTicket1_idx` (`intCPostBillingTicketID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`intCompanyID`, `intCGoodsID`, `intCPostBillingTicketID`, `strCompanyName`, `strCompanyAddress`, `strCompanyEmail`, `strCompanyContactPNum`, `strCompanyContactTNum`, `boolDeleted`, `strCompanyPermit`, `strCompanyPicture`) VALUES
(1, NULL, NULL, 'Hi Energy Marine Services INC.', 'Rm. 306 Velco Centre cr Sr. Oca & Delgado Sts., South Harbor, Port Area, Manila', 'hienergymarineservices@gmail.com', NULL, NULL, 0, NULL, NULL),
(2, NULL, NULL, 'Tugmaster & Barge Pool Inc.', '115 RM 202 J LUNA ST, BINONDO, Manila, Metro Manila,', 'tugmaster@gmail.com', NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontractfeesmatrix`
--

DROP TABLE IF EXISTS `tblcontractfeesmatrix`;
CREATE TABLE IF NOT EXISTS `tblcontractfeesmatrix` (
  `intContractFeesID` int(11) NOT NULL AUTO_INCREMENT,
  `enumServiceType` enum('Hauling','Tug Assist') DEFAULT NULL,
  `fltCFStandardRate` float DEFAULT NULL,
  `fltCFTugboatDelayFee` float DEFAULT NULL,
  `fltCFConsigneeLateFee` float DEFAULT NULL,
  `fltCFViolationFee` float DEFAULT NULL,
  `fltCFMinDamageFee` float DEFAULT NULL,
  `fltCFMaxDamageFee` float DEFAULT NULL,
  `intCFDiscount` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`intContractFeesID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcontractfeesmatrix`
--

INSERT INTO `tblcontractfeesmatrix` (`intContractFeesID`, `enumServiceType`, `fltCFStandardRate`, `fltCFTugboatDelayFee`, `fltCFConsigneeLateFee`, `fltCFViolationFee`, `fltCFMinDamageFee`, `fltCFMaxDamageFee`, `intCFDiscount`) VALUES
(1, 'Hauling', 2000, 1000, 1000, 1000, 3000, 5000, 20),
(2, 'Tug Assist', 1000, 2000, 1000, 2000, 2000, 4000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontractlist`
--

DROP TABLE IF EXISTS `tblcontractlist`;
CREATE TABLE IF NOT EXISTS `tblcontractlist` (
  `intContractListID` int(11) NOT NULL AUTO_INCREMENT,
  `intCCompanyID` int(11) DEFAULT NULL,
  `intCQuotationID` int(11) DEFAULT NULL,
  `strContractListTitle` varchar(191) DEFAULT NULL,
  `strContractListDesc` text,
  `intCAttachmentsID` int(11) DEFAULT NULL,
  `isFinalized` tinyint(1) DEFAULT NULL,
  `enumStatus` enum('Pending','Created','Requesting For Changes','Accepted','Finalized','For Activation','Active','Expired') DEFAULT 'Pending',
  `boolDeleted` tinyint(1) DEFAULT '0',
  `datContractActive` date DEFAULT NULL,
  `datContractExpire` date DEFAULT NULL,
  `enumConValidity` enum('6','1') DEFAULT NULL,
  `strConsigneeSign` text,
  `strAdminSign` text,
  `isDefault` enum('Yes','No') DEFAULT 'Yes',
  PRIMARY KEY (`intContractListID`),
  KEY `fk_tblContractList_tblAgreement1_idx` (`intCQuotationID`),
  KEY `fk_tblContractList_tblWaiver1_idx` (`intCAttachmentsID`),
  KEY `fk_tblContractList_tblCompany1_idx` (`intCCompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbldispatchticket`
--

DROP TABLE IF EXISTS `tbldispatchticket`;
CREATE TABLE IF NOT EXISTS `tbldispatchticket` (
  `intDispatchTicketID` int(11) NOT NULL AUTO_INCREMENT,
  `strDispatchTicketDesc` varchar(45) DEFAULT NULL,
  `boolCApprovedby` tinyint(4) NOT NULL,
  `boolAApprovedby` tinyint(4) NOT NULL,
  `strConsigneeSign` text,
  `strAdminSign` text,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intDispatchTicketID`)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblfinalcontractfeesmatrix`
--

DROP TABLE IF EXISTS `tblfinalcontractfeesmatrix`;
CREATE TABLE IF NOT EXISTS `tblfinalcontractfeesmatrix` (
  `intFinalContractFeesID` int(11) NOT NULL AUTO_INCREMENT,
  `intFCFContractListID` int(11) DEFAULT NULL,
  `enumFCFServiceType` enum('Hauling','Tug Assist') CHARACTER SET latin1 DEFAULT NULL,
  `fltFCFStandardRate` float DEFAULT NULL,
  `fltFCFTugboatDelayFee` float DEFAULT NULL,
  `fltFCFViolationFee` float DEFAULT NULL,
  `fltFCFConsigneeLateFee` float DEFAULT NULL,
  `fltFCFMinDamageFee` float DEFAULT NULL,
  `fltFCFMaxDamageFee` float DEFAULT NULL,
  `intFCFDiscountFee` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`intFinalContractFeesID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblgoods`
--

DROP TABLE IF EXISTS `tblgoods`;
CREATE TABLE IF NOT EXISTS `tblgoods` (
  `intGoodsID` int(11) NOT NULL AUTO_INCREMENT,
  `strGoodsName` varchar(45) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intGoodsID`),
  UNIQUE KEY `strGoodsName_UNIQUE` (`strGoodsName`)
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
  `intIBillID` int(11) NOT NULL,
  `enumStatus` enum('Processing','Paid','Rejected','Pending') NOT NULL,
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
  `strJOTitle` text,
  `strJODesc` varchar(45) DEFAULT NULL,
  `intJOBerthID` int(11) DEFAULT NULL,
  `strJOStartPoint` varchar(45) DEFAULT NULL,
  `strJODestination` varchar(45) DEFAULT NULL,
  `intJOBargeID` int(11) DEFAULT NULL,
  `intJOGoodsID` int(11) DEFAULT NULL,
  `intJOCompanyID` int(11) DEFAULT NULL,
  `intJOttachmentsID` int(11) DEFAULT NULL,
  `strJOVesselName` varchar(45) NOT NULL,
  `dtmETA` datetime DEFAULT NULL,
  `dtmETD` datetime DEFAULT NULL,
  `enumStatus` enum('Created','Pending','Accepted','Ready','Ready To Haul','Forwarded','Declined','Scheduled','Ongoing') DEFAULT NULL,
  `fltWeight` float DEFAULT NULL,
  `intJOVesselTypeID` int(11) DEFAULT NULL,
  `enumServiceType` enum('Hauling','Tug Assist','Salvage') DEFAULT NULL,
  `datStartDate` date DEFAULT NULL,
  `datEndDate` date DEFAULT NULL,
  `tmStart` time DEFAULT NULL,
  `tmEnd` time DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `strRemarks` text,
  PRIMARY KEY (`intJobOrderID`,`strJOVesselName`),
  KEY `fk_tblSchedule_tblAttachments1_idx` (`intJOttachmentsID`),
  KEY `fk_tblSchedule_tblBarge1_idx` (`intJOBargeID`),
  KEY `fk_tblSchedule_tblCompany1_idx` (`intJOCompanyID`),
  KEY `fk_tblSchedule_tblBerth1` (`intJOBerthID`),
  KEY `fk_tblJoborder_tblGoods1_idx` (`intJOGoodsID`),
  KEY `fk_tblJoborder_tblVesselType1_idx` (`intJOVesselTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbljoborderforwardrequests`
--

DROP TABLE IF EXISTS `tbljoborderforwardrequests`;
CREATE TABLE IF NOT EXISTS `tbljoborderforwardrequests` (
  `intJOForwardRequestsID` int(11) NOT NULL AUTO_INCREMENT,
  `intJOFRJobOrderID` int(11) DEFAULT NULL,
  `intJOFRForwardCompanyID` int(11) DEFAULT NULL,
  `strJOFRDescription` text,
  `strRequestCompanyName` varchar(45) DEFAULT NULL,
  `enumStatus` enum('Pending','Accepted','Scheduled','Ready','Ready To Haul','Declined') DEFAULT 'Pending',
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intJOForwardRequestsID`),
  KEY `fk_tblJOForwardRequests_tblJobOrder1_idx` (`intJOFRJobOrderID`),
  KEY `fk_tblJOForwardRequests_tblCompany1_idx` (`intJOFRForwardCompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `intJSTugboatID` int(11) DEFAULT NULL,
  `intJSTeamID` int(11) DEFAULT NULL,
  `enumStatus` enum('Pending','Ongoing','Delayed','Finished') DEFAULT 'Pending',
  `tmStarted` time DEFAULT NULL,
  `tmEnded` time DEFAULT NULL,
  `dateStarted` date DEFAULT NULL,
  `dateEnded` date DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  `intJSDispatchTicketID` int(11) DEFAULT NULL,
  `strJSCompanyAssigned` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`intJobSchedID`),
  KEY `fk_tbljobsched_tbljoborder` (`intJSJobOrderID`),
  KEY `fk_tbljobsched_tblschedule` (`intJSSchedID`),
  KEY `fk_tbljobsched_tbltugboatassign` (`intJSTugboatAssignID`),
  KEY `fk_tbljobsched_tbltugboat_idx` (`intJSTugboatID`),
  KEY `fk_tbljobsched_tblteam_idx` (`intJSTeamID`),
  KEY `fk_tbljobsched_tbldispatchticket1_idx` (`intJSDispatchTicketID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation`
--

DROP TABLE IF EXISTS `tbllocation`;
CREATE TABLE IF NOT EXISTS `tbllocation` (
  `intLocationID` int(11) NOT NULL AUTO_INCREMENT,
  `intLDispatchTicketID` int(11) DEFAULT NULL,
  `strLocationDesc` text,
  `strLocation` varchar(45) DEFAULT NULL,
  `tmLocationTime` time DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intLocationID`),
  KEY `fk_tbllocation_tbldispatchticket1_idx` (`intLDispatchTicketID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblothersteamcomp`
--

DROP TABLE IF EXISTS `tblothersteamcomp`;
CREATE TABLE IF NOT EXISTS `tblothersteamcomp` (
  `intOTeamCompID` int(11) NOT NULL,
  `intOTeamCompPositionID` int(11) DEFAULT NULL,
  `intOTCTeamCompID` int(11) DEFAULT NULL,
  PRIMARY KEY (`intOTeamCompID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`intPierID`),
  UNIQUE KEY `strPierName_UNIQUE` (`strPierName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblpierhistory`
--

DROP TABLE IF EXISTS `tblpierhistory`;
CREATE TABLE IF NOT EXISTS `tblpierhistory` (
  `intPierHistoryID` int(11) NOT NULL,
  `strPHPierName` varchar(45) DEFAULT NULL,
  `intPHPierID` int(11) DEFAULT NULL,
  PRIMARY KEY (`intPierHistoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `intPositionCompNum` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intPositionID`),
  KEY `fk_tblPosition_tblCompany1_idx` (`intPCompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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
  `strQuotationTitle` varchar(45) DEFAULT NULL,
  `strQuotationDesc` text,
  `intQContractListID` int(11) DEFAULT NULL,
  `isAssigned` tinyint(1) DEFAULT '0',
  `fltQuotationTDelayFee` float DEFAULT NULL,
  `fltQuotationViolationFee` float DEFAULT NULL,
  `fltQuotationConsigneeLateFee` float DEFAULT NULL,
  `fltMinDamageFee` float DEFAULT NULL,
  `fltMaxDamageFee` float DEFAULT NULL,
  `intDiscount` int(11) DEFAULT NULL,
  `fltStandardRate` float DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  `enumServiceType` enum('Hauling','Tug Assist') DEFAULT NULL,
  PRIMARY KEY (`intQuotationID`),
  KEY `fk_tblQuotation_tblContractList1_idx` (`intQContractListID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblquotationhistory`
--

DROP TABLE IF EXISTS `tblquotationhistory`;
CREATE TABLE IF NOT EXISTS `tblquotationhistory` (
  `intQuotationHistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `fltQHStandardRate` float NOT NULL,
  `fltQHTugboatDelayFee` float NOT NULL,
  `fltQHViolationFee` float NOT NULL,
  `fltQHConsigneeLateFee` float NOT NULL,
  `fltQHMinDamageFee` float NOT NULL,
  `fltQHMaxDamageFee` float NOT NULL,
  `intQHDiscount` int(11) NOT NULL,
  `intQHQuotationID` int(11) NOT NULL,
  `strChangesAuthor` varchar(45) NOT NULL,
  PRIMARY KEY (`intQuotationHistoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblquotationshistory`
--

DROP TABLE IF EXISTS `tblquotationshistory`;
CREATE TABLE IF NOT EXISTS `tblquotationshistory` (
  `intQuotationHistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `fltQHStandardRate` float DEFAULT NULL,
  `fltQHTugboatDelayFee` float DEFAULT NULL,
  `fltQHViolationFee` float DEFAULT NULL,
  `fltQHConsigneeLateFee` float DEFAULT NULL,
  `fltQHMinDamageFee` float DEFAULT NULL,
  `fltQHMaxDamageFee` float DEFAULT NULL,
  `intQHDiscount` tinyint(3) DEFAULT NULL,
  `intQHQuotationID` int(11) DEFAULT NULL,
  `strChangesAuthor` text,
  `enumQHServiceType` enum('Tug Assist','Hauling') DEFAULT NULL,
  PRIMARY KEY (`intQuotationHistoryID`)
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
  `strColor` varchar(45) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  `datScheduleDate` date DEFAULT NULL,
  `intScheduleCompanyID` int(11) DEFAULT NULL,
  `dateStart` date DEFAULT NULL,
  `dateEnd` date DEFAULT NULL,
  `tmEnd` time DEFAULT NULL,
  `tmStart` time DEFAULT NULL,
  PRIMARY KEY (`intScheduleID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
  `enumStatus` enum('Available','Assigned','Forwarded') DEFAULT 'Available',
  PRIMARY KEY (`intTeamID`),
  KEY `fK_tblTeam_tblCompany1_idx` (`intTCompanyID`),
  KEY `fk_tblTeam_tblCompany2_idx` (`intTForwardCompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `tbltermscondition`
--

DROP TABLE IF EXISTS `tbltermscondition`;
CREATE TABLE IF NOT EXISTS `tbltermscondition` (
  `intTermsConditionID` int(11) NOT NULL AUTO_INCREMENT,
  `strTermsConditionTitle` varchar(45) NOT NULL,
  `strTermsConditionDesc` text NOT NULL,
  PRIMARY KEY (`intTermsConditionID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltermscondition`
--

INSERT INTO `tbltermscondition` (`intTermsConditionID`, `strTermsConditionTitle`, `strTermsConditionDesc`) VALUES
(1, '<h4>Terms and Condition </h4>', '<p><br></p><p>All shipments to or from the Customer, which term shall include the exporter, importer, sender, receiver, owner, consignor, consignee, transferor or transferee of the shipments, will be handled by Unitrans Worldwide, Inc, herein called the “Company”) on the following terms and conditions:</p><p>•1.&nbsp;<span style=\"font-weight: bolder;\">Services by Third Parties</span>. Unless the Company carries, stores or otherwise physically handles the shipment, and loss, damage, expense or delay occurs during such activity, the Company assumes no liability as a carrier and is not to be held responsible for any loss, damage, expense or delay to the goods to be forwarded or imported except as provided in paragraph 8 and subject to the limitations of paragraph 9 below, but undertakes only to use reasonable care in the selection of carriers, truck men, lightermen, forwarders, customs brokers, agents, warehousemen and others to whom it may entrust the goods for transportation, cartage, handling and/or delivery and/or storage or otherwise. When the company carries, stores or otherwise physically handles the shipment, it does so subject to the limitation of liability set forth in paragraph 8 below unless a separate bill of lading, air waybill or other contract of carriage is issued by the Company, in which event the terms thereof shall govern.</p><p>•2.&nbsp;<span style=\"font-weight: bolder;\">Liability Limitations of Third Parties</span>. The Company is authorized to select and engage carriers, truck men, lightermen, forwarders, customs brokers, agents, warehousemen and others, as required, to transport, store, deal with and deliver the goods, all of whom shall be considered as the agents of the Customer, and the goods may be entrusted to such agencies subject to all conditions as to limitation of liability for loss, damage, expense or delay and to all rules, regulations, requirements and conditions, whether printed, written or stamped, appearing in bills of lading, receipts or tariffs issued by such carriers, truck men, lightermen, forwarders, customs brokers, agents, warehousemen and others. The Company shall under no circumstances be liable for any loss, damage, expense or delay to the goods for any reason whatsoever when said goods are in custody, possession or control of third parties selected by the Company to forward, enter and clear, transport or render other services with respect to such goods.</p><p>•3.&nbsp;<span style=\"font-weight: bolder;\">Choosing Routes or Agents</span>. Unless express instructions in writing are received from the Customer, the Company has complete freedom in choosing the means, route and procedure to be followed in the handling, transportation and delivery of the goods. Advice by the Company to the Customer that a particular person or firm has been selected to render services with respect to the goods shall not be construed to mean that the Company warrants or represents that such person or firm will render such services.</p><p>•4.&nbsp;<span style=\"font-weight: bolder;\">Quotations Not Binding</span>. Quotations as to fees, rates of duty, freight charges, insurance premiums or other charges given by the Company to the Customer are for informational purposes only and are subject to change without notice and shall not under any circumstances be binding upon the Company unless the Company in writing specifically undertakes the handling or transportation of the shipment at a specific rate.</p><p>•5.&nbsp;<span style=\"font-weight: bolder;\">Duty to Furnish Information</span>.</p><p>(<span style=\"font-weight: bolder;\">a</span>) On an import at a reasonable time prior to entering of the goods for U.S. Customs, the Customer shall furnish to the Company invoices in proper form and other documents necessary or useful in the preparation of the U. S. Customs entry and, also, such further information as may be sufficient to establish, inter alia, the dutiable value, the classification, the country of origin, the genuineness of the merchandise and any mark or symbol associated with it, the Customer’s right to import and/or distribute the merchandise, and the merchandise’s admissibility, pursuant to U. S. law or regulation. If the Customer fails in a timely manner to furnish such information or documents, in whole or in part, as may be required to complete U. S. Customs entry or comply with U.S. laws or regulations, or if the information or documents furnished are inaccurate or incomplete, the Company shall be obligated only to use its best judgment in connection with the shipment and in no instance shall be charged with knowledge by the Customer of the true circumstances to which such inaccurate, incomplete, or omitted information or document pertains. Where a bond is required by U.S. Customs to be given for the production of any document or the performance of any act, the Customer shall be deemed bound by the terms of the bond notwithstanding the fact that the bond has been executed by the Company as principal, it being understood that the Company entered into such undertaking at the instance and on behalf of the Customer, and the Customer shall indemnify and hold the Company harmless for the consequences of any breach of the terms of the bond.</p><p>(<span style=\"font-weight: bolder;\">b</span>) On an export at a reasonable time prior to the exportation of the shipment the Customer shall furnish to the Company the commercial invoice in proper form and number, a proper consular declaration, weights, measures, values and other information in the language of and as may be required by the laws and regulations of U. S. and the country of destination of the goods.</p><p>(<span style=\"font-weight: bolder;\">c</span>) On an export or import the Company shall not in any way be responsible or liable for increased duty, penalty, fine or expense unless caused by the negligence or other fault of the Company, in which event its liability to the Customer shall be governed by the provisions of paragraphs 8-10 below. The Customer shall be bound by and warrant the accuracy of all invoices, documents and information furnished to the Company by the Customer or its agent for export, entry or other purposes and the Customer agrees to indemnify and hold harmless the Company against any increased duty, penalty, fine or expense including attorneys’ fees, resulting from any inaccuracy, incomplete statement, omission or any failure to make timely presentation, even if not due to any negligence of the Customer.</p><p>•6.&nbsp;<span style=\"font-weight: bolder;\">Declaring Higher Valuation</span>. Inasmuch as truckers, carriers, warehousemen and others to whom the goods are entrusted usually limit their liability for loss or damage unless a higher value is declared and a charge based on such higher value is agreed to by said truckers, etc., the Company must receive specific written instructions from the Customer to pay such higher charge based on valuation and the trucker, etc. must accept such higher declared value; otherwise the valuation placed by the Customer on the goods shall be considered solely for export or customs purposes and the goods will be delivered to the truckers, etc. subject to the limitation of liability set forth herein in paragraphs 8-10 below with respect to any claim against the Company and subject to the provisions of paragraph 2 above.</p><p>7.&nbsp;<span style=\"font-weight: bolder;\">Insurance</span>. The Company will make reasonable efforts to effect marine, fire, theft and other insurance upon the goods only after specific written instructions have been received by the Company in sufficient time prior to shipment from point of origin, and the Customer at the same time states specifically the kind and amount of insurance to be placed. The Company does not undertake or warrant that such insurance can or will be placed. Unless the Customer has its own open marine policy and instructs the Company to effect insurance under such policy, insurance is to be effected with one or more insurance companies or other underwriters to be selected by the Company. Any insurance placed shall be governed by the certificate or policy issued and will only be effective when accepted by such insurance companies or underwriters. Should an insurer dispute its liability for any reason, the insured shall have recourse against the insurer only and the Company shall not be under any responsibility or liability in relation thereto, notwithstanding that the premium upon the policy may not be at the same rates as that charged or paid to the Company by the Customer, or that the shipment was insured under a policy in the name of the Company. Insurance premiums and the charge of the Company for arranging the same shall be at the Customer’s expense. If for any reason the goods are held in warehouse, or elsewhere, the same will not be covered by any insurance, unless the Company receives written instructions from the Customer. Unless specifically agreed in writing, the Company assumes no responsibility to effect insurance on any export or import shipment which it does not handle.</p><p>•8.&nbsp;<span style=\"font-weight: bolder;\">Limitation of Liability for Loss, etc</span>.</p><p>(<span style=\"font-weight: bolder;\">a</span>) The Customer agrees that the Company shall only be liable for any loss, damage expense or delay to the goods resulting from the negligence or other fault of the Company; such liability shall be limited to an amount equal to the lesser of fifty dollars ($50.00) per entry or shipment or the fee(s) charged for services, provided that, in the case of partial loss, such amount will be adjusted, pro rata;</p><p>(<span style=\"font-weight: bolder;\">b</span>) Where the Company issues its own bill of lading and receives freight charges as its compensation, Customer has the option of paying a special compensation and increasing the limit of Company’s liability up to the shipment’s actual value; however, such option must be exercised by written agreement, entered into prior to any covered transaction(s),setting forth the limit of the Company’s liability and the compensation received;</p><p>(<span style=\"font-weight: bolder;\">c</span>) In instances other than in (b) above, unless the Customer makes specific written arrangements with the Company to pay special compensation and declare a higher value and Company agrees in writing, liability is limited to the amount set forth in (a) above;</p><p>(<span style=\"font-weight: bolder;\">d</span>) Customer agrees that the Company shall, in no event, be liable for consequential, punitive, statutory or special damages in excess of the monetary limit provided for above.</p><p>•9.&nbsp;<span style=\"font-weight: bolder;\">Presenting Claims</span>. Company shall not be liable under paragraph 8 for any claims not presented to it in writing within 90 days of either the date of loss or incident giving rise to the claim; no suit to recover for any claim or demand here under shall be maintained against the Company unless instituted within six (6) months after the presentation of the said claim or such longer period provided for under statute(s) of the State having jurisdiction of the matter.</p><p>•10.&nbsp;<span style=\"font-weight: bolder;\">Advancing Money</span>. The Company shall not be obliged to incur any expense, guarantee payment or advance any money in connection with the importing, forwarding, transporting, insuring, storing or coopering of the goods, unless the same is previously provided to the Company by the Customer on demand. The Company shall be under no obligation to advance freight charges, customs duties or taxes on any shipment, nor shall any advance by the Company be construed as a waiver of the provisions hereof.</p><p>•11.<span style=\"font-weight: bolder;\">&nbsp;Indemnification for Freight, Duties</span>. In the event that a carrier, other person or any governmental agency makes a claim or institutes legal action against the company for ocean or other freight, duties, fines, penalties, liquidated damages or other money due rising from a shipment of goods of the Customer, the Customer agrees to indemnify and hold harmless the Company for any amount the Company may be required to pay such carrier, other person or governmental agency together with reasonable expenses, including attorneys’ fees, incurred by the Company in connection with defending such claim or legal action and obtaining reimbursement from the Customer. The confiscation or detention of the goods by any governmental authority shall not affect or diminish the liability of the Customer to the Company to pay all charges or other money due promptly on demand.</p><p>•12.&nbsp;<span style=\"font-weight: bolder;\">C.O.D. Shipments</span>. Goods received with Customer’s or other person’s instructions to “Collect on Delivery” (C.O.D.) by drafts or otherwise, or to collect on any specified terms by time drafts or otherwise, are accepted by the Company only upon the express understanding that it will exercise reasonable care in the selection of a bank, correspondent, carrier or agent to whom it will send such item for collection, and the Company will not be responsible for any act, omission, default, suspension, insolvency or want of care, negligence, or fault of such bank, correspondent, carrier or agent, nor for any delay in remittance lost in exchange, or during transmission, or while in the course of collection.</p><p>•13.&nbsp;<span style=\"font-weight: bolder;\">General Lien on Any Property</span>. The Company shall have a general lien on any and all property (and documents relating thereto) of the customer, in its possession, custody or control or en route, for all claims for charges, expenses or advances incurred by the Company in connection with any shipments of the Customer and if such claim remains unsatisfied for thirty (30) days after demand for its payment is made, the Company may sell at public auction or private sale, upon ten (10) days written notice, registered mail(R.R.R.), to the Customer, the goods, wares and/or merchandise, or so much thereof as may be necessary to satisfy such lien, and apply the net proceeds of such sale to the payment of the amount due to the Company. Any surplus from such sale shall be transmitted to the Customer, and the Customer shall be liable for any deficiency in the sale.</p><p>•14.&nbsp;<span style=\"font-weight: bolder;\">Compensation of Company</span>. The compensation of the Company for its services shall be included with and is in addition to the rates and charges of all carriers and other agencies selected by the Company to transport and deal with the goods and such compensation shall be exclusive of any brokerage, commissions, dividends or other revenue received by the Company from carriers, insurers and others in connection with the shipment. On ocean exports, upon request, the Company shall provide a detailed breakout of the components of all charges assessed and a true copy of each pertinent document relating to these charges. In any referral for collection or action against the Customer for monies due the Company, upon recovery by the Company, the Customer shall pay the expenses of collection and/or litigation, including a reasonable attorney fee.</p><p>•15.&nbsp;<span style=\"font-weight: bolder;\">No Responsibility for Governmental Requirements</span>. It is the responsibility of the Customer to know and comply with the marking requirements of the U. S. Customs Service, the regulations of the U. S. Food and Drug Administration, and all other requirements, including regulations of Federal, state and/or local agencies pertaining to the merchandise. The Company shall not be responsible for action taken or fines or penalties assessed by any governmental agency against the shipment because of the failure of the Customer to comply with the law or the requirements or regulations of any governmental agency or with a notification issued to the Customer by any such agency.</p><p>•16.&nbsp;<span style=\"font-weight: bolder;\">Indemnity Against Liability Arising from the Importation of Merchandise</span>. The Customer agrees to indemnify and hold the Company harmless from any claims and/or liability arising from the importation of merchandise which violates any Federal, state and/or other laws or regulations and further agrees to indemnify and hold the Company harmless against any and all liability, loss, damages, costs, claims and/or expenses, including but not limited to attorney’s fees, which the Company may hereafter incur, suffer or be required to pay by reason of claims by any government agency or private party. In the event that any action, suit or proceeding is brought against the Company by any government agency or any private party, the Company shall give notice in writing to the Customer by mail at its address on file with the Company. Upon receipt of such notice, the Customer at its own expense shall defend against such action and take all steps as may be necessary or proper to prevent the obtaining of a judgment and/or order against the Company.</p><p>•17.&nbsp;<span style=\"font-weight: bolder;\">Loss, Damage or Expense Due to Delay</span>. Unless the services to be performed by the Company on behalf of the Customer are delayed by reason of the negligence or other fault of the Company, the Company shall not be responsible for any loss, damage or expense incurred by the Customer because of such delay. In the event the Company is at fault, as aforesaid, itsaa liability is limited in accordance with the provisions of paragraphs 8-9 above.</p><p>18.<span style=\"font-weight: bolder;\">&nbsp;Construction of Terms and Venue</span>. The foregoing terms and conditions shall be construed according to the laws of the State shown on the reverse side hereof. Unless otherwise consented to in writing by the Company, no legal proceeding against the Company may be instituted by the Customer, its assigns, or subrogee except in the City shown on the reverse side</p>');

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
  `intForwardCompanyID` int(11) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  `enumTStatus` enum('Working','Under Repair') DEFAULT 'Working',
  PRIMARY KEY (`intTugboatID`),
  KEY `fk_tblTugboat_tblTugboatClass1_idx` (`intTTugboatClassID`),
  KEY `fk_tblTugboat_tblTugboatSpecs1_idx` (`intTTugboatSpecsID`),
  KEY `fk_tblTugboat_tblTugboatMain1_idx` (`intTTugboatMainID`),
  KEY `fk_tblTugboat_tblCompany1_idx` (`intTCompanyID`),
  KEY `fk_tblTugboat_tblCompany2_idx` (`intForwardCompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboat`
--

INSERT INTO `tbltugboat` (`intTugboatID`, `intTTugboatMainID`, `intTTugboatSpecsID`, `intTTugboatClassID`, `intTCompanyID`, `intForwardCompanyID`, `boolDeleted`, `enumTStatus`) VALUES
(1, 1, 1, 1, 1, NULL, 0, 'Working'),
(2, 2, 2, 2, 1, NULL, 0, 'Working'),
(3, 3, 3, 3, 2, 1, 0, 'Working'),
(4, 4, 4, 4, 1, NULL, 0, 'Working'),
(5, 5, 5, 5, 1, NULL, 0, 'Working'),
(6, 6, 6, 6, 2, NULL, 0, 'Working'),
(7, 7, 7, 7, 1, NULL, 0, 'Working');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboatassign`
--

INSERT INTO `tbltugboatassign` (`intTAssignID`, `intTATugboatID`, `intTATeamID`, `strTADesc`, `intTACompanyID`, `intTAForwardCompanyID`, `enumStatus`, `boolDeleted`) VALUES
(1, 1, NULL, NULL, 1, NULL, 'Available', 0),
(2, 2, NULL, NULL, 1, NULL, 'Available', 0),
(3, 3, NULL, NULL, 2, NULL, 'Available', 0),
(4, 4, NULL, NULL, 1, NULL, 'Available', 0),
(5, 5, NULL, NULL, 1, NULL, 'Available', 0),
(6, 6, NULL, NULL, 2, NULL, 'Available', 0),
(7, 7, NULL, NULL, 1, NULL, 'Available', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboatclass`
--

INSERT INTO `tbltugboatclass` (`intTugboatClassID`, `strOwner`, `strTugboatFlag`, `intTCTugboatTypeID`, `strClassNum`, `strOfficialNum`, `strIMONum`, `strTradingArea`, `strHomePort`, `enumISPSCodeCompliance`, `enumISMCodeStandard`, `boolDeleted`) VALUES
(1, 'Hi Energy Marine Services INC.', 'Philippines', 1, 'ORS-12-0804', '10 0000746', '7419573', 'Coastwise', 'Cagayan De Oro', 'Yes', 'Yes', 0),
(2, 'Hi Energy Marine Services INC.', 'Philippines', 1, 'ORS-16-0901', '04-0005098', '7912939', 'Coastwise', 'Batangas', 'Yes', 'Yes', 0),
(3, 'Hi Energy Marine Services INC.', 'Philippines', 1, 'ORS-16-0903', '04-0005092', '7912934', 'Coastwise', 'Manila', 'Yes', 'Yes', 0),
(4, 'Hi Energy Marine Services INC.', 'Philippines', 1, 'ORS-16-0904', '04-0005498', '7912573', 'Coastwise', 'Manila', 'Yes', 'Yes', 0),
(5, 'Hi Energy Marine Services INC.', 'Philippines', 1, 'ORS-16-0901', '04-0005098', '7912939', 'Coastwise', 'Batangas', 'Yes', 'Yes', 0),
(6, 'Tugmaster & Barge Pool Inc.', 'Philippines', 1, 'ORS-16-0901', '04-0005098', '7912939', 'Coastwise', 'Batangas', 'Yes', 'Yes', 0),
(7, 'Hi Energy Marine Services INC.', 'Philippines', 1, 'ORS-16-0902', '04-0005075', '04-0000089', 'Coastwise', 'Batangas City', 'Yes', 'Yes', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboatinsurance`
--

INSERT INTO `tbltugboatinsurance` (`intTugboatInsuranceID`, `strTugboatInsuranceDesc`, `intTITugboatID`, `boolDeleted`) VALUES
(3, 'Hull (Pioneer Insurance)', 1, '0'),
(4, 'P & I (Protective & Indemnity)', 1, '0'),
(5, 'Insurance 1', 2, '0'),
(6, 'Insurance 2', 2, '0'),
(7, 'Insurance 1', 3, '0'),
(8, 'Insurance 2', 3, '0'),
(9, 'Insurances', 4, '0'),
(10, 'Pioneer', 5, '0'),
(11, 'P & I', 5, '0'),
(12, 'P & I', 6, '0'),
(13, 'Pioneer', 6, '0'),
(14, 'P & I', 7, '0'),
(15, 'Pioneer Insurance', 7, '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboatmain`
--

INSERT INTO `tbltugboatmain` (`intTugboatMainID`, `strName`, `strLength`, `strBreadth`, `strDepth`, `strHorsePower`, `strMaxSpeed`, `strBollardPull`, `strGrossTonnage`, `strNetTonnage`, `datLastDrydocked`, `boolDeleted`) VALUES
(1, 'MT Energy Masters', '29.43', '8.20', '3.59', '2200.38', '13.5', '36.931', '188', '55.79', '2015-08-06', 0),
(2, 'MT Energy Galaxy', '20', '9', '4', '3123.00', '20', '20', '20', '20', '2018-06-19', 0),
(3, 'MT Tugmaster Aleli ', '22', '20', '21', '2636.84', '200', '200', '200', '200', '2018-06-10', 0),
(4, 'MT Energy Venus', '15', '15', '3.59 M', '2636.84', '13.40 Knots', '43.63 Tons', '188.00 Tons', '56.00 Tons', '2018-03-12', 0),
(5, 'MT Energy Pacific', '12.5', '12', '4.00', '2403.86', '15', '45', '188.00', '55.79', '2015-10-20', 0),
(6, 'MT Tugmaster Don Leon', '12', '12', '4.00', '2636.84', '15', '45', '188.00', '45', '2015-10-01', 0),
(7, 'MT Energy Andromeda', '12.0', '8.00', '4.0', '3200.23', '15.23', '16.54', '155.54', '122.20', '2018-10-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltugboatmatrix`
--

DROP TABLE IF EXISTS `tbltugboatmatrix`;
CREATE TABLE IF NOT EXISTS `tbltugboatmatrix` (
  `intTugboatMatrixID` int(11) NOT NULL,
  `fltTMMinRange` float DEFAULT NULL,
  `fltTMMaxRange` float DEFAULT NULL,
  `intTMNumberofTugs` tinyint(1) DEFAULT NULL,
  `fltTMCapacityHorsePower` float DEFAULT NULL,
  PRIMARY KEY (`intTugboatMatrixID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboatspecs`
--

INSERT INTO `tbltugboatspecs` (`intTugboatSpecsID`, `strHullMaterial`, `strBuilder`, `strMakerPower`, `strDrive`, `strCylinderperCycle`, `strAuxEngine`, `strLocationBuilt`, `datBuiltDate`, `enumAISGPSVHFRadar`, `boolDeleted`) VALUES
(1, 'Steel', 'Kanagahazosen', '2 Units Niigata Model 6L25BX', 'Niigata ZP-2', '9/4', '2 Units Yanmar 60 KVA 225 Volts', 'Japanaaaaaaaa', '1974-10-01', 'No', 0),
(2, 'Metal', 'Koreans', 'Korean Gold', 'Drive Thru', '2/5', 'Engine', 'Korea', '2017-11-23', 'Yes', 0),
(3, 'Metal', 'Russian', 'Power', 'Drive', '3/2', 'Engine', 'Russia', '2016-12-30', 'Yes', 0),
(4, 'Steel', 'Kanagahazosen', 'Niigata', 'Niigata ZP-2', '2/4', 'Yanmar', 'Philippines', '2017-11-07', 'Yes', 0),
(5, 'Steel', 'Kanagahazosen', 'Niigata', 'Niigata ZP-2', '8/4', 'Yanmar', 'Japan', '1970-10-30', 'Yes', 0),
(6, 'Steel', 'Kanagahazosen', 'Niigata', 'Niigata ZP-2', '8/4', 'Yanmar', 'Japan', '1970-08-10', 'Yes', 0),
(7, 'Steel', 'Kanagahazosen', 'Niigata', '7419573', '8/4', 'Yanmar Auxillary Engine 2', 'Japan', '2018-10-02', 'Yes', 0);

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
(2, 'River Tug', 1, 0),
(3, 'Deep Sea Tug', 1, 0);

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
-- Table structure for table `tblvesseltype`
--

DROP TABLE IF EXISTS `tblvesseltype`;
CREATE TABLE IF NOT EXISTS `tblvesseltype` (
  `intVesselTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `strVesselTypeName` varchar(45) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  `isActive` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`intVesselTypeID`),
  UNIQUE KEY `strVesselTypeName_UNIQUE` (`strVesselTypeName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `enumUserType` enum('Admin','Affiliates','Captain','Consignee') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(1) DEFAULT '0',
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `boolDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `intUCompanyID`, `remember_token`, `created_at`, `updated_at`, `enumUserType`, `isVerified`, `isActive`, `boolDeleted`, `token`) VALUES
(1, 'HEMSI', 'hienergymarineservices@gmail.com', '$2y$10$EPf6MLFuhVXXVji1gE.vnONc2PdnoHSEkJ1H8wIPJcLbz2CE6.4de', 1, 'ZynJerxN0nFRE0TuqvAthbesB30lilGCo9mUXuPuQm7m35MLovrBosHTS4um', '2018-08-26 21:39:55', '2018-08-27 02:50:40', 'Admin', 0, 1, 0, NULL),
(2, 'Tugmasters', 'tugmaster@gmail.com', '$2y$10$uGDjz7KPIoaX5jCw/NN9NOC7AdruGebYbIYuIRn1xuSvss8vwA0l.', 2, 'lo5fRaj1t8CqbtWMtK5kSVA0ZIDecXQwAVO79vU4ikKRimwp1VY9pSfNx8I3', '2018-08-26 21:43:36', '2018-08-26 21:43:36', 'Affiliates', 0, 1, 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbalance`
--
ALTER TABLE `tblbalance`
  ADD CONSTRAINT `fk_tblbalance_tblcompany` FOREIGN KEY (`intBalanceID`) REFERENCES `tblcompany` (`intCompanyID`);

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
-- Constraints for table `tblcharges`
--
ALTER TABLE `tblcharges`
  ADD CONSTRAINT `fk_tblcharges_tblinvoice` FOREIGN KEY (`intChargeID`) REFERENCES `tblinvoice` (`intInvoiceID`);

--
-- Constraints for table `tblcheque`
--
ALTER TABLE `tblcheque`
  ADD CONSTRAINT `fk_tblcheque_tblbill` FOREIGN KEY (`intCBillID`) REFERENCES `tblbill` (`intBillID`);

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
  ADD CONSTRAINT `fk_tblContractList_tblWaiver1` FOREIGN KEY (`intCAttachmentsID`) REFERENCES `tblattachments` (`intAttachmentsID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblContractList_tbquotation` FOREIGN KEY (`intCQuotationID`) REFERENCES `tblquotation` (`intQuotationID`) ON UPDATE CASCADE;

--
-- Constraints for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD CONSTRAINT `fk_tblEmployee_tblPosition1` FOREIGN KEY (`intEPositionID`) REFERENCES `tblposition` (`intPositionID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblEmployee_tblTeam1` FOREIGN KEY (`intETeamID`) REFERENCES `tblteam` (`intTeamID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblemployee_tblcompany1` FOREIGN KEY (`intECompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_tblJoborder_tblGoods1` FOREIGN KEY (`intJOGoodsID`) REFERENCES `tblgoods` (`intGoodsID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblJoborder_tblVesselType1` FOREIGN KEY (`intJOVesselTypeID`) REFERENCES `tblvesseltype` (`intVesselTypeID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbljoborder_tblcompany` FOREIGN KEY (`intJOCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbljoborderforwardrequests`
--
ALTER TABLE `tbljoborderforwardrequests`
  ADD CONSTRAINT `fk_tblJOForwardRequests_tblCompany1` FOREIGN KEY (`intJOFRForwardCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblJOForwardRequests_tblJobOrder1` FOREIGN KEY (`intJOFRJobOrderID`) REFERENCES `tbljoborder` (`intJobOrderID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbljobsched`
--
ALTER TABLE `tbljobsched`
  ADD CONSTRAINT `fk_tbljobsched_tbldispatchticket1` FOREIGN KEY (`intJSDispatchTicketID`) REFERENCES `tbldispatchticket` (`intDispatchTicketID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbljobsched_tbljoborder` FOREIGN KEY (`intJSJobOrderID`) REFERENCES `tbljoborder` (`intJobOrderID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbljobsched_tblschedule` FOREIGN KEY (`intJSSchedID`) REFERENCES `tblschedule` (`intScheduleID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbljobsched_tblteam` FOREIGN KEY (`intJSTeamID`) REFERENCES `tblteam` (`intTeamID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbljobsched_tbltugboat` FOREIGN KEY (`intJSTugboatID`) REFERENCES `tbltugboat` (`intTugboatID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbljobsched_tbltugboatassign` FOREIGN KEY (`intJSTugboatAssignID`) REFERENCES `tbltugboatassign` (`intTAssignID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbllocation`
--
ALTER TABLE `tbllocation`
  ADD CONSTRAINT `fk_tbllocation_tbldispatchticket1` FOREIGN KEY (`intLDispatchTicketID`) REFERENCES `tbldispatchticket` (`intDispatchTicketID`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_tblQuotation_tblContractList1` FOREIGN KEY (`intQContractListID`) REFERENCES `tblcontractlist` (`intContractListID`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_tblTugboat_tblCompany2` FOREIGN KEY (`intForwardCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE,
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
