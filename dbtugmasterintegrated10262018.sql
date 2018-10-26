-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2018 at 10:11 AM
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

--
-- Dumping data for table `tblbalance`
--

INSERT INTO `tblbalance` (`intBalanceID`, `fltBalance`, `dtUpdateBalance`) VALUES
(3, 50, '0000-00-00'),
(8, 1000, '0000-00-00');

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
  KEY `fk_tblBerth_tblPier1_idx` (`intBPierID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblberth`
--

INSERT INTO `tblberth` (`intBerthID`, `intBPierID`, `strBerthName`, `isActive`, `boolDeleted`) VALUES
(1, 1, 'Berth 3', 1, 0),
(2, 1, 'Berth 4', 1, 0),
(3, 3, 'Berth 1', 1, 0),
(4, 2, 'Berth 2', 1, 0),
(5, 4, 'Berth 5', 1, 0),
(6, 3, 'Berth 6', 1, 0),
(7, 6, 'Berth 7', 1, 0),
(8, 3, 'Berth 84', 1, 0),
(9, 2, 'Berth 100', 1, 1),
(10, 10, 'Berth 3', 1, 0),
(11, 1, 'Berth 5', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblberthhistory`
--

DROP TABLE IF EXISTS `tblberthhistory`;
CREATE TABLE IF NOT EXISTS `tblberthhistory` (
  `intBerthHistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `strBHBerthName` varchar(45) DEFAULT NULL,
  `intBHBerthID` int(11) DEFAULT NULL,
  `intBHPierID` int(11) DEFAULT NULL,
  PRIMARY KEY (`intBerthHistoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `tblbill`
--

INSERT INTO `tblbill` (`intBillID`, `strSignature`, `enumStatus`, `boolDeleted`) VALUES
(1, NULL, 'Accepted', 0),
(2, NULL, 'Rejected', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcharges`
--

INSERT INTO `tblcharges` (`intChargeID`, `fltJOAmount`, `fltTugboatDelayFee`, `fltConsigneeViolationFee`, `fltConsigneeLateFee`, `fltConsigneeDamageFee`, `fltCompanyDamageFee`, `fltCompanyViolationFee`, `intDiscount`) VALUES
(1, 10000, 0, NULL, 0, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcheque`
--

DROP TABLE IF EXISTS `tblcheque`;
CREATE TABLE IF NOT EXISTS `tblcheque` (
  `intChequeID` int(11) NOT NULL AUTO_INCREMENT,
  `intCBillID` int(11) NOT NULL,
  `dtPayment` int(11) NOT NULL,
  `intABANum` int(11) NOT NULL,
  `intAmount` int(11) NOT NULL,
  `strMemo` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`intCompanyID`, `intCGoodsID`, `intCPostBillingTicketID`, `strCompanyName`, `strCompanyAddress`, `strCompanyEmail`, `strCompanyContactPNum`, `strCompanyContactTNum`, `boolDeleted`, `strCompanyPermit`, `strCompanyPicture`) VALUES
(1, NULL, NULL, 'Hi Energy Marine Services INC.', 'Rm. 306 Velco Centre cr Sr. Oca & Delgado Sts., South Harbor, Port Area, Manila', 'hienergymarineservices@gmail.com', NULL, NULL, 0, NULL, NULL),
(2, NULL, NULL, 'Tugmaster & Barge Pool Inc.', '115 RM 202 J LUNA ST, BINONDO, Manila, Metro Manila,', 'tugmaster@gmail.com', NULL, NULL, 0, NULL, NULL),
(3, NULL, NULL, 'Black Pink', 'Pandacan, Manila', 'blackpinkyg@gmail.com', NULL, NULL, 0, NULL, NULL),
(4, NULL, NULL, 'TWICE JYPE', 'Seoul South Korea', 'twicejype@gmail.com', NULL, NULL, 0, NULL, NULL),
(5, NULL, NULL, 'TWICE JYPE', 'Seoul South Korea', 'twicesujype@gmail.com', NULL, NULL, 0, NULL, NULL),
(6, NULL, NULL, 'Isaac Tailoring Shop', 'Pureza, Manila', 'isaac@gmail.com', NULL, NULL, 0, NULL, NULL),
(7, NULL, NULL, 'M Eyenet Training', 'Cubao', 'marinaslevie@gmail.com', NULL, NULL, 0, NULL, NULL),
(8, NULL, NULL, 'Akari', '1985-A Interior 6 Carlos st. Pandacan, Manila', 'akari@gmail.com', NULL, NULL, 0, NULL, NULL),
(9, NULL, NULL, 'Timba Importer Inc.', 'Mexico Cubao', 'Timba@gmail.com', NULL, NULL, 0, NULL, NULL),
(10, NULL, NULL, 'Testing Company 1', 'Testing Company  Address 1', 'clumsyreigny@gmail.com', '09286519686', '3681590', 0, 'DTI-Permits.jpg', NULL),
(11, NULL, NULL, 'Testing Company 2', 'Testing Company Address 2', 'reignshirley@gmail.com', '09124907819', '2124418', 0, 'DTI-Permit.jpg', NULL),
(12, NULL, NULL, 'Testing # 2', 'Testing Address # 2', 'ganilajoshua@gmail.com', '09272783766', '12365498', 0, 'Permit.png', NULL),
(13, NULL, NULL, 'Testing Company # 2', 'Testing Company # 2', 'ermalto110@gmail.com', '09286516986', '12356489', 0, 'DTI-Permit.jpg', NULL),
(14, NULL, NULL, 'Pagaduan', '554 Paltoc St. Sampaloc Manila', 'johnpagaduan04@gmail.com', '09206267696', '5593759', 0, 'Permit.png', NULL),
(15, NULL, NULL, 'Dorm Fam', 'A120', 'dormfam@gmail.com', '231', '231', 0, 'DTI-Permit.jpg', NULL),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(17, NULL, NULL, 'HOMER', 'HOMER', 'ganilayow@gmail.com', '09102384071', '21224418', 0, 'DTI-Permits.jpg', NULL),
(18, NULL, NULL, 'Dorm Fam', 'A-120', 'johnpagaduan04@gmail.com', '09206267696', '5593759', 0, 'DTI-Permits.jpg', NULL),
(19, NULL, NULL, 'Dorm Fam', 'A-120', 'johncarlospagaduan@yahoo.com', '09206267696', '5593759', 0, 'DTI-Permits.jpg', NULL),
(20, NULL, NULL, 'Reign Shirley', 'Marikina City', 'reignexdummy@gmail.com', '09206267696', '5593759', 0, 'DTI-Permits.jpg', NULL),
(21, NULL, NULL, 'Reign Shirley', 'Marikina City', 'reignexdummy@gmail.com', '09206267696', '5593759', 0, 'DTI-Permits.jpg', NULL),
(22, NULL, NULL, 'Reign Shirley', 'Marikina City', 'reignshirley@gmail.com', '09206267696', '5593759', 0, 'DTI-Permits.jpg', NULL),
(23, NULL, NULL, 'Seonyo Sidae', 'Seoul South Korea', 'reignshirley@gmail.com', '123131', '231', 0, 'DTI-Permits.jpg', NULL),
(24, NULL, NULL, 'Seonyo Sidae', 'Seoul South Korea', 'johnpagaduan04@gmail.com', '123131', '231', 0, 'DTI-Permit.jpg', NULL),
(25, NULL, NULL, 'Testing Company 1', 'Testing Address 1', 'reignshirley@gmail.com', '09286519686', '3681590', 0, 'Permit.png', NULL),
(26, NULL, NULL, 'Testing Company Final Defense 1', 'Testing Company Final Defense Address 1', 'e_a_austria@yahoo.com', '09286548696', '21224481', 0, 'Permit.png', NULL),
(27, NULL, NULL, 'Testing Company Final Defense 2', 'Testing Company Final Defense Address 2', 'clumsyreigny@gmail.com', '0928158696', '3685109', 0, 'DTI-Permit.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontractclauses`
--

DROP TABLE IF EXISTS `tblcontractclauses`;
CREATE TABLE IF NOT EXISTS `tblcontractclauses` (
  `intContractClausesID` int(11) NOT NULL AUTO_INCREMENT,
  `strContractAgreements` text,
  `strContractTermsAndConditions` text,
  PRIMARY KEY (`intContractClausesID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcontractlist`
--

INSERT INTO `tblcontractlist` (`intContractListID`, `intCCompanyID`, `intCQuotationID`, `strContractListTitle`, `strContractListDesc`, `intCAttachmentsID`, `isFinalized`, `enumStatus`, `boolDeleted`, `datContractActive`, `datContractExpire`, `enumConValidity`, `strConsigneeSign`, `strAdminSign`, `isDefault`) VALUES
(1, 3, NULL, 'Contract Title 1', '<p>Contract Details 2</p>', NULL, NULL, 'Active', 0, '2018-10-26', '2019-04-26', '6', NULL, NULL, 'Yes');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldispatchticket`
--

INSERT INTO `tbldispatchticket` (`intDispatchTicketID`, `strDispatchTicketDesc`, `boolCApprovedby`, `boolAApprovedby`, `strConsigneeSign`, `strAdminSign`, `boolDeleted`) VALUES
(1, NULL, 1, 1, '{\"lines\":[[[24,94.4],[43,90.4],[183,57.4],[333,36.4],[403,31.4],[429,30.4],[445,30.4],[450,30.4],[451,30.4],[451,31.4],[449,32.4],[443,37.4],[427,48.4],[385,73.4],[359,88.4],[335,97.4],[317,107.4],[309,111.4],[305,112.4],[303,114.4],[303,116.4],[301,116.4],[303,116.4],[332,112.4],[352,108.4],[374,104.4],[383,104.4],[385,104.4],[386,104.4]]]}', '{\"lines\":[[[130,180.8],[144,168.8],[213,112.8],[261,64.8],[266,48.8],[262,33.8],[258,32.8],[248,30.8],[234,30.8],[218,44.8],[211,59.8],[209,68.8],[210,75.8],[222,80.8],[247,80.8],[306,75.8],[325,73.8],[335,73.8],[339,73.8],[342,76.8],[342,77.8],[341,91.8],[331,120.8],[325,136.8],[322,143.8],[321,145.8],[319,148.8]]]}', NULL),
(2, NULL, 0, 0, NULL, NULL, NULL),
(3, NULL, 0, 0, NULL, NULL, NULL),
(4, NULL, 0, 0, NULL, NULL, NULL),
(5, NULL, 1, 1, '{\"lines\":[[[93,125.8],[114,123.8],[167,118.8],[201,114.8],[215,111.8],[215,111.8],[215,107.8],[202,86.8],[181,74.8],[161,68.8],[136,66.8],[127,66.8],[124,69.8],[121,73.8],[122,83.8],[134,94.8],[173,105.8],[227,106.8],[253,104.8],[264,102.8],[271,99.8],[275,98.8],[279,96.8],[280,95.8]],[[274,70.8],[301,74.8],[331,78.8],[351,82.8],[352,82.8],[352,75.8],[341,58.8],[332,53.8],[329,50.8],[326,50.8],[325,50.8],[325,51.8],[326,55.8],[331,68.8],[334,74.8],[335,79.8],[340,83.8],[351,85.8],[355,85.8]]]}', '{\"lines\":[[[134,143.8],[148,130.8],[178,111.8],[218,82.8],[226,74.8],[228,72.8],[230,61.8],[230,55.8],[228,48.8],[224,40.8],[220,38.8],[219,38.8],[217,38.8],[216,38.8],[212,40.8],[206,48.8],[204,65.8],[204,74.8],[207,78.8],[220,84.8],[233,84.8],[248,79.8],[266,73.8],[275,69.8],[285,68.8],[292,68.8],[298,72.8],[300,74.8],[301,76.8],[303,79.8],[304,80.8]],[[112,79.8],[121,75.8],[128,69.8],[145,61.8],[177,45.8],[193,36.8],[204,32.8],[210,28.8],[211,27.8],[212,27.8],[214,28.8],[215,28.8]]]}', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`intEmployeeID`, `intECompanyID`, `intEPositionID`, `intETeamID`, `enumEmpType`, `strFName`, `strMName`, `strLName`, `isActive`, `boolDeleted`) VALUES
(1, 1, 1, 1, 'Regular', 'Reign Emmanuel', 'Orillosa', 'Malto', 1, 0),
(2, 1, 2, 1, 'Regular', 'Levie Anne', 'Tan', 'Mariñas', 1, 0),
(3, 1, 3, 1, 'Regular', 'John Carlos', 'Estrada', 'Pagaduan', 1, 0),
(4, 1, 3, 1, 'Regular', 'Joshua', 'Jamarolin', 'Ganila', 1, 0),
(5, 1, 1, 2, 'Regular', 'Ben Hur Adrian Raphael', 'Grita', 'Tolentino', 1, 0),
(6, 1, 2, 2, 'Regular', 'Kristine Mae', NULL, 'Gamayo', 1, 0),
(7, 1, 3, 2, 'Regular', 'Jerevon', NULL, 'Carreon', 1, 0),
(8, 1, 3, 2, 'Regular', 'Keynie Mae', NULL, 'Orial', 1, 0),
(9, 2, 6, 3, 'Regular', 'Shirley Anne', 'Valencia', 'Tianan', 1, 0),
(10, 2, 7, 3, 'Regular', 'Michael', 'Dion', 'Villanueva', 1, 0),
(11, 2, 8, 3, 'Regular', 'Daniel', 'Benitez', 'Suello', 1, 0),
(12, 2, 8, 3, 'Regular', 'Bern Paul', 'Dela Cruz', 'San Diego', 1, 0),
(13, 1, 6, 4, 'Regular', 'John Carlo', 'Sy', 'Doronila', 1, 0),
(14, 1, 7, 4, 'Regular', 'John Homer', NULL, 'Cadena', 1, 0),
(15, 1, 8, 4, 'Regular', 'Danielle Nicole', 'Jordan', 'Casadores', 1, 0),
(16, 1, 8, 4, 'Regular', 'Vince Miguel', NULL, 'Oreta', 1, 0),
(17, 2, 8, 5, 'Regular', 'Sherwin', NULL, 'Aydalla', 1, 0),
(18, 2, 8, 5, 'Regular', 'Fritz Jerold', NULL, 'Santuico', 1, 0),
(19, 2, 7, 5, 'Regular', 'Gramar', NULL, 'Lacsina', 1, 0),
(20, 2, 6, 5, 'Regular', 'Froilan Sam', NULL, 'Malibiran', 1, 0),
(21, 1, 1, 6, 'Regular', 'Princes Joi', NULL, 'Isaac', 1, 0),
(22, 1, 2, 6, 'Regular', 'Matthew James', NULL, 'Victore', 1, 0),
(23, 1, 3, 6, 'Regular', 'Angelito', NULL, 'Casasis', 1, 0),
(24, 1, 3, 6, 'Regular', 'Reannie Danielle', NULL, 'Exiomo', 1, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfinalcontractfeesmatrix`
--

INSERT INTO `tblfinalcontractfeesmatrix` (`intFinalContractFeesID`, `intFCFContractListID`, `enumFCFServiceType`, `fltFCFStandardRate`, `fltFCFTugboatDelayFee`, `fltFCFViolationFee`, `fltFCFConsigneeLateFee`, `fltFCFMinDamageFee`, `fltFCFMaxDamageFee`, `intFCFDiscountFee`) VALUES
(1, 1, 'Hauling', 2000, 1000, 1000, 1000, 3000, 5000, 20),
(2, 1, 'Tug Assist', 1000, 2000, 2000, 1000, 2000, 4000, 20);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblgoods`
--

INSERT INTO `tblgoods` (`intGoodsID`, `strGoodsName`, `fltRateperTon`, `fltGoodWeight`, `isActive`, `boolDeleted`) VALUES
(1, 'Cooking Oil', 500, NULL, 1, 0),
(2, 'Metal Rolls', 500, NULL, 1, 0),
(3, 'Gravel', 700, NULL, 1, 0),
(4, 'Diesel', 700, NULL, 1, 0),
(5, 'Red Sand', 200, NULL, 1, 0);

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
  `intIBillID` int(11) NOT NULL,
  `enumStatus` enum('Processing','Paid','Rejected','Pending') NOT NULL,
  `strInvoiceDesc` varchar(45) DEFAULT NULL,
  `fltBalanceRemain` float DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intInvoiceID`),
  KEY `fk_tblInvoice_tblDispatchTicket1_idx` (`intIDispatchTicketID`),
  KEY `fk_tblInvoice_tblCompany1_idx` (`intDTCompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`intInvoiceID`, `intIDispatchTicketID`, `intDTCompanyID`, `intIBillID`, `enumStatus`, `strInvoiceDesc`, `fltBalanceRemain`, `boolDeleted`) VALUES
(1, 1, 3, 0, 'Processing', 'processed', 10000, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbljoborder`
--

INSERT INTO `tbljoborder` (`intJobOrderID`, `strJOTitle`, `strJODesc`, `intJOBerthID`, `strJOStartPoint`, `strJODestination`, `intJOBargeID`, `intJOGoodsID`, `intJOCompanyID`, `intJOttachmentsID`, `strJOVesselName`, `dtmETA`, `dtmETD`, `enumStatus`, `fltWeight`, `intJOVesselTypeID`, `enumServiceType`, `datStartDate`, `datEndDate`, `tmStart`, `tmEnd`, `boolDeleted`, `created_at`, `updated_at`, `strRemarks`) VALUES
(1, 'Testing Job Order Hauling 1', 'Testing Hauling Details 1', 2, NULL, 'Sta. Mesa Shipyard, Sta. Mesa Manila', NULL, 1, 3, NULL, 'MT Space Orion', NULL, NULL, 'Ready', 3200, NULL, 'Hauling', '2018-10-17', '2018-10-17', '09:00:00', '11:00:00', 0, '2018-10-15 16:06:22', '2018-10-15 16:06:22', NULL),
(2, 'Testing Job Order Tug Assist 1', 'Testing Tug Assist 1', 1, NULL, NULL, NULL, NULL, 4, NULL, 'MT Space Betelgeuse', NULL, NULL, 'Ongoing', 4000, 2, 'Tug Assist', '2018-10-18', '2018-10-16', '09:00:00', '11:00:00', 0, '2018-10-15 16:08:43', '2018-10-15 16:08:43', NULL),
(3, 'Hauling Part 2', 'Haul BP Part 2', NULL, 'Pandacan, Manila', 'Makati', NULL, 1, 3, NULL, 'MT Alejandro', NULL, NULL, 'Ready', NULL, NULL, 'Hauling', '2018-10-17', '2018-10-18', '10:30:00', '14:30:00', 0, '2018-10-15 18:30:47', '2018-10-15 18:30:47', NULL),
(4, 'Testing Job Order Tug Assist 1', 'Tug Assist here pls', 2, NULL, NULL, NULL, NULL, 4, NULL, 'MT Everest', NULL, NULL, 'Ready To Haul', 20, 2, 'Tug Assist', '2018-10-17', '2018-10-16', '10:18:00', '23:38:00', 0, '2018-10-15 18:38:58', '2018-10-15 18:38:58', NULL),
(5, 'Try Hauling Job Order 1', 'Try Hauling Details', 1, NULL, 'Pandacan, Manila', NULL, 1, 3, NULL, 'MT Space Sun', NULL, NULL, 'Ongoing', 3200, NULL, 'Hauling', '2018-10-18', '2018-10-18', '04:00:00', '07:00:00', 0, '2018-10-16 12:39:26', '2018-10-16 12:41:51', NULL),
(6, 'order title job', 'asd', 5, NULL, 'Manila', NULL, 1, 5, NULL, 'wow', NULL, NULL, 'Ready', 20, NULL, 'Hauling', '2018-10-17', '2018-10-18', '05:00:00', '06:30:00', 0, '2018-10-16 13:53:04', '2018-10-16 13:53:04', NULL),
(7, 'Job Order Testing', 'Text Details', 1, NULL, 'Pandacan Manila', NULL, 1, 3, NULL, 'MT Space Sword', NULL, NULL, 'Forwarded', 3200, NULL, 'Hauling', '2018-10-17', '2018-10-17', '22:00:00', '00:00:00', 0, '2018-10-16 21:07:27', '2018-10-16 21:08:54', NULL),
(8, 'Heys', 'Tug Assist', 2, NULL, NULL, NULL, NULL, 4, NULL, 'MT Space Betelgeuse', NULL, NULL, 'Scheduled', 3200, 3, 'Tug Assist', '2018-10-18', '2018-10-17', '13:00:00', '15:00:00', 0, '2018-10-16 21:16:31', '2018-10-16 21:16:31', NULL),
(9, 'Testing Job Order 1', 'Testing Hauling Details 1', 10, NULL, 'Sta. Mesa Shipyard, Sta Mesa Manila', NULL, 5, 4, NULL, 'MT Space Betelgeuse', NULL, NULL, 'Scheduled', 3200, NULL, 'Hauling', '2018-10-18', '2018-10-19', '22:00:00', '03:30:00', 0, '2018-10-16 23:32:42', '2018-10-16 23:32:42', NULL),
(10, 'Job Order Testing 2', 'Testing Details', 1, NULL, 'Pandacan, Manila', NULL, 1, 5, NULL, 'MT Space Andromeda', NULL, NULL, 'Declined', 3200, NULL, 'Hauling', '2018-10-21', '2018-10-21', '10:00:00', '14:00:00', 0, '2018-10-19 08:29:17', '2018-10-19 08:29:17', 'Schedules are all Full'),
(11, 'Job Order Title Test 1', 'Details', 1, NULL, 'Pandacan, Manila', NULL, 1, 3, NULL, 'MT Space Sphinx', NULL, NULL, 'Ready', 3500, NULL, 'Hauling', '2018-10-26', '2018-10-26', '11:00:00', '15:00:00', 0, '2018-10-24 19:53:19', '2018-10-24 19:53:19', NULL),
(12, 'Job Order Testing 2', 'Details 2', 1, NULL, 'Pandacan Manila', NULL, 1, 3, NULL, 'MT Space Sirius', NULL, NULL, 'Scheduled', 4000, NULL, 'Hauling', '2018-10-26', '2018-10-26', '11:00:00', '14:30:00', 0, '2018-10-24 19:54:45', '2018-10-24 19:54:45', NULL),
(13, 'JO Oct 26 - 28 8AM - 10 AM', 'JO Oct 26 - 27 8AM - 10 AM', 1, 'Manil', NULL, NULL, 1, 3, NULL, 'Vessel 1', NULL, NULL, 'Scheduled', 20, NULL, 'Hauling', '2018-10-26', '2018-10-27', '08:00:00', '10:00:00', 0, '2018-10-24 21:48:41', '2018-10-24 21:48:41', NULL),
(14, 'JO Oct 27 - 28 8AM - 10 AM', 'JO Oct 27 - 28 8AM - 10 AM', NULL, 'Manila', 'Cebu', NULL, 2, 3, NULL, 'Vessel 2', NULL, NULL, 'Scheduled', 20, NULL, 'Hauling', '2018-10-27', '2018-10-28', '08:00:00', '10:00:00', 0, '2018-10-24 21:49:50', '2018-10-24 21:49:50', NULL),
(15, 'JO Oct 26 - 27 11AM - 1 PM', 'JO Oct 26 - 27 11AM - 1 PM', 2, 'Manila', NULL, NULL, 3, 3, NULL, 'Vessel 3', NULL, NULL, 'Scheduled', 20, NULL, 'Hauling', '2018-10-26', '2018-10-27', '11:00:00', '01:00:00', 0, '2018-10-24 21:51:27', '2018-10-24 21:51:27', NULL),
(16, 'JO Oct 26 - 27 9AM - 1 PM', 'JO Oct 26 - 27 9AM - 1 PM', NULL, 'Manila', 'Pandacan', NULL, 2, 3, NULL, 'Vessel 4', NULL, NULL, 'Ready', 20, NULL, 'Hauling', '2018-10-26', '2018-10-27', '09:00:00', '13:00:00', 0, '2018-10-24 21:54:50', '2018-10-24 21:54:50', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljoborderforwardrequests`
--

INSERT INTO `tbljoborderforwardrequests` (`intJOForwardRequestsID`, `intJOFRJobOrderID`, `intJOFRForwardCompanyID`, `strJOFRDescription`, `strRequestCompanyName`, `enumStatus`, `boolDeleted`) VALUES
(1, 5, 2, 'Forward Please', 'Hi Energy Marine Services INC.', 'Ready', 0),
(2, 7, 2, 'Heya', 'Hi Energy Marine Services INC.', 'Scheduled', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbljobsched`
--

INSERT INTO `tbljobsched` (`intJobSchedID`, `intJSJobOrderID`, `intJSSchedID`, `intJSTugboatAssignID`, `intJSTugboatID`, `intJSTeamID`, `enumStatus`, `tmStarted`, `tmEnded`, `dateStarted`, `dateEnded`, `boolDeleted`, `intJSDispatchTicketID`, `strJSCompanyAssigned`) VALUES
(1, 1, 1, 2, 2, NULL, 'Pending', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(2, 1, 1, 4, 4, NULL, 'Pending', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(3, 3, 2, 5, 5, NULL, 'Pending', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(4, 3, 2, 7, 7, NULL, 'Pending', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(5, 6, 3, 2, 2, NULL, 'Pending', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(6, 6, 3, 4, 4, NULL, 'Pending', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(7, 11, 4, 2, 2, NULL, 'Pending', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(8, 11, 4, 4, 4, NULL, 'Pending', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(9, 16, 5, 7, 7, NULL, 'Pending', NULL, NULL, NULL, NULL, 0, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbllocation`
--

INSERT INTO `tbllocation` (`intLocationID`, `intLDispatchTicketID`, `strLocationDesc`, `strLocation`, `tmLocationTime`, `boolDeleted`) VALUES
(3, 1, 'Waiting For Vessel to Enter the Bay', 'Manila Bay, Break Waters', '10:36:00', NULL),
(4, 1, 'Arriving to Pier 15', 'Inside South Harbor', '10:37:00', NULL),
(5, 2, 'asd', 'AAS', '06:14:00', NULL),
(6, 3, 'qwer', 'qwer', '09:26:00', NULL),
(7, 5, 'Waiting for Vessel to enter the bay', 'Manila Bay Break Waters', '15:52:00', NULL);

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
  PRIMARY KEY (`intPierID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpier`
--

INSERT INTO `tblpier` (`intPierID`, `strPierName`, `isActive`, `boolDeleted`) VALUES
(1, 'Pier 3', 1, 0),
(2, 'Pier 5', 1, 0),
(3, 'Pier 9', 1, 0),
(4, 'Pier 12', 1, 0),
(5, 'Pier 4', 1, 0),
(6, 'Pier 151', 1, 1),
(7, 'Pier 10', 1, 0),
(8, 'Pier 65', 1, 1),
(9, 'Pier 2', 1, 0),
(10, 'Pier 19', 1, 0),
(11, 'Pier 18', 1, 0);

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
  `intPositionCompNum` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intPositionID`),
  KEY `fk_tblPosition_tblCompany1_idx` (`intPCompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblposition`
--

INSERT INTO `tblposition` (`intPositionID`, `strPositionName`, `intPCompanyID`, `isActive`, `boolDeleted`, `intPositionCompNum`) VALUES
(1, 'Captain', 1, 1, 0, 1),
(2, 'Chief Engineer', 1, 1, 0, 1),
(3, 'Crew', 1, 1, 0, 2),
(4, 'First Mate', 1, 1, 0, 1),
(5, 'Second Mate', 1, 1, 0, 1),
(6, 'Captain', 2, 1, 0, 1),
(7, 'Chief Engineer', 2, 1, 0, 1),
(8, 'Crew', 2, 1, 0, 2),
(9, 'First Mate', 2, 1, 0, 0),
(10, 'Second Mate', 2, 1, 0, 0),
(11, 'Marine Engineer', 2, 1, 0, 0),
(12, 'Chief Marine Engineer', 1, 1, 0, 1),
(13, 'Marine Engineer', 1, 1, 0, NULL),
(14, 'Third Mate', 1, 1, 0, NULL),
(15, NULL, 1, 1, 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblquotation`
--

INSERT INTO `tblquotation` (`intQuotationID`, `strQuotationTitle`, `strQuotationDesc`, `intQContractListID`, `isAssigned`, `fltQuotationTDelayFee`, `fltQuotationViolationFee`, `fltQuotationConsigneeLateFee`, `fltMinDamageFee`, `fltMaxDamageFee`, `intDiscount`, `fltStandardRate`, `boolDeleted`, `enumServiceType`) VALUES
(1, NULL, NULL, 1, 0, 1000, 1000, 1000, 3000, 5000, 20, 2000, 0, 'Hauling'),
(2, NULL, NULL, 1, 0, 2000, 2000, 1000, 2000, 4000, 20, 1000, 0, 'Tug Assist');

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
-- Table structure for table `tblrequest`
--

DROP TABLE IF EXISTS `tblrequest`;
CREATE TABLE IF NOT EXISTS `tblrequest` (
  `intRequestID` int(11) NOT NULL AUTO_INCREMENT,
  `strRequestDescription` text,
  `enumRequestType` enum('Forward Joborder','Request Team','Request Tugboat') CHARACTER SET latin1 DEFAULT NULL,
  `intRJobOrderID` int(11) DEFAULT NULL,
  `intRCompanyID` int(11) DEFAULT NULL,
  `intRForwardCompanyID` int(11) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `enumRequestStatus` enum('Pending','Accepted','Declined') CHARACTER SET latin1 DEFAULT 'Pending',
  `boolDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`intRequestID`),
  KEY `fk_tblRequest_tblCompany1_idx` (`intRCompanyID`),
  KEY `fk_tblRequest_tblCompany2_idx` (`intRForwardCompanyID`),
  KEY `fk_tblRequest_tblJobOrder1_idx` (`intRJobOrderID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblrequest`
--

INSERT INTO `tblrequest` (`intRequestID`, `strRequestDescription`, `enumRequestType`, `intRJobOrderID`, `intRCompanyID`, `intRForwardCompanyID`, `updated_at`, `created_at`, `enumRequestStatus`, `boolDeleted`) VALUES
(1, '하는데', 'Request Team', NULL, 1, 2, '2018-09-16 04:55:47', '2018-09-15 20:55:47', 'Pending', 0),
(2, 'Send Heeeeeeeeeelp!', 'Request Tugboat', NULL, 1, 2, '2018-09-16 05:00:41', '2018-09-15 21:00:41', 'Pending', 0),
(3, 'need 4 employees of team only 1 captain 1 chief 2 crew', 'Request Team', NULL, 1, 2, '2018-09-17 05:13:17', '2018-09-16 21:13:17', 'Pending', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblschedule`
--

INSERT INTO `tblschedule` (`intScheduleID`, `strScheduleDesc`, `dttmETA`, `dttmETD`, `strColor`, `boolDeleted`, `datScheduleDate`, `intScheduleCompanyID`, `dateStart`, `dateEnd`, `tmEnd`, `tmStart`) VALUES
(1, 'Testing Hauling Details 1', NULL, NULL, '#0073b7', 0, NULL, 1, '2018-10-17', '2018-10-17', '11:00:00', '09:00:00'),
(2, 'Haul BP Part 2', NULL, NULL, NULL, 0, NULL, 1, '2018-10-17', '2018-10-18', '14:30:00', '10:30:00'),
(3, 'asd', NULL, NULL, NULL, 0, NULL, 1, '2018-10-17', '2018-10-18', '06:30:00', '05:00:00'),
(4, 'Details', NULL, NULL, NULL, 0, NULL, 1, '2018-10-26', '2018-10-26', '15:00:00', '11:00:00'),
(5, 'JO Oct 26 - 27 9AM - 1 PM', NULL, NULL, NULL, 0, NULL, 1, '2018-10-26', '2018-10-27', '13:00:00', '09:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblteam`
--

INSERT INTO `tblteam` (`intTeamID`, `strTeamName`, `intTCompanyID`, `intTForwardCompanyID`, `boolDeleted`, `enumStatus`) VALUES
(1, 'Team Energy Master', 1, NULL, 0, 'Available'),
(2, 'Team Energy Venus', 1, NULL, 0, 'Available'),
(3, 'Team Tugmaster Aleli', 2, 1, 0, 'Available'),
(4, 'Team Energy Pacific', 1, NULL, 0, 'Available'),
(5, 'Team Tugmaster Don Leon', 2, NULL, 0, 'Available'),
(6, 'Team Energy Andromeda', 1, NULL, 0, 'Available');

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
(3, 3, 3, 3, 2, NULL, 0, 'Working'),
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
(1, 1, NULL, 'Team Energy Venus', 1, NULL, 'Occupied', 0),
(2, 2, 4, 'Team Energy Pacific', 1, NULL, 'Occupied', 0),
(3, 3, 3, 'Team Tugmaster Aleli', 2, NULL, 'Occupied', 0),
(4, 4, 1, 'Team Energy Venus', 1, NULL, 'Occupied', 0),
(5, 5, 6, 'Team Energy New', 1, 2, 'Occupied', 0),
(6, 6, 5, 'Team Tugmaster Don Leon', 2, 1, 'Occupied', 0),
(7, 7, 2, 'Team Energy Venus', NULL, NULL, 'Available', 0);

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
(2, 'Hi Energy Marine Services INC.', 'Philippines', 2, 'ORS-16-0901', '04-0005098', '7912939', 'Coastwise', 'Batangas', 'Yes', 'Yes', 0),
(3, 'Hi Energy Marine Services INC.', 'Philippines', 2, 'ORS-16-0903', '04-0005092', '7912934', 'Coastwise', 'Manila', 'Yes', 'Yes', 0),
(4, 'Hi Energy Marine Services INC.', 'Philippines', 2, 'ORS-16-0904', '04-0005498', '7912573', 'Coastwise', 'Manila', 'Yes', 'Yes', 0),
(5, 'Hi Energy Marine Services INC.', 'Philippines', 1, 'ORS-16-0901', '04-0005098', '7912939', 'Coastwise', 'Batangas', 'Yes', 'Yes', 0),
(6, 'Tugmaster & Barge Pool Inc.', 'Philippines', 1, 'ORS-16-0901', '04-0005098', '7912939', 'Coastwise', 'Batangas', 'Yes', 'Yes', 0),
(7, 'Hi Energy Marine Services INC.', 'Philippines', 4, 'ORS-16-0902', '04-0005075', '04-0000089', 'Coastwise', 'Batangas City', 'Yes', 'Yes', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltugboattype`
--

INSERT INTO `tbltugboattype` (`intTugboatTypeID`, `strTugboatTypeName`, `isActive`, `boolDeleted`) VALUES
(1, 'Harbor Tug', 1, 0),
(2, 'River Tug', 1, 0),
(3, 'Deep Sea Tug', 1, 0),
(4, 'Harbor Tugs', 1, 0),
(5, 'Deep River Tug', 1, 0);

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
  PRIMARY KEY (`intVesselTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvesseltype`
--

INSERT INTO `tblvesseltype` (`intVesselTypeID`, `strVesselTypeName`, `boolDeleted`, `isActive`) VALUES
(1, 'Barge', 0, 1),
(2, 'Cargo Ship', 0, 1),
(3, 'Container Ship', 0, 1),
(4, 'Auto Carrier', 0, 1),
(5, 'Tanker', 0, 1),
(6, 'Fishing Vessel', 0, 1),
(7, 'Oil Industry Vessel', 0, 1),
(8, 'Passenger Ship', 0, 1),
(9, 'Ferry Boat', 0, 1),
(10, 'Cruise Ship', 0, 1),
(11, 'Motor Boat Tanker', 0, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `intUCompanyID`, `remember_token`, `created_at`, `updated_at`, `enumUserType`, `isVerified`, `isActive`, `boolDeleted`, `token`) VALUES
(1, 'HEMSI', 'hienergymarineservices@gmail.com', '$2y$10$EPf6MLFuhVXXVji1gE.vnONc2PdnoHSEkJ1H8wIPJcLbz2CE6.4de', 1, 'ZqMfbEldp6Oh6Z68bOM2PGc4vJI9TbsZkrY7F7RurcGQmKYnnDaSApp1pdPO', '2018-08-26 21:39:55', '2018-08-27 02:50:40', 'Admin', 0, 1, 0, NULL),
(2, 'Tugmasters', 'tugmaster@gmail.com', '$2y$10$uGDjz7KPIoaX5jCw/NN9NOC7AdruGebYbIYuIRn1xuSvss8vwA0l.', 2, 'niIPsGagSNPbRO0Pn1yj5LFRgNQr5tJrsovmokSFLtPDZT0aWWVqorrFEI4D', '2018-08-26 21:43:36', '2018-08-26 21:43:36', 'Affiliates', 0, 1, 0, NULL),
(3, 'Black Pink', 'blackpinkyg@gmail.com', '$2y$10$QeUnO0ypzktouf/19X6k3OEJkQ7iryv2Q24xrv7F1v.ohyQyLoYRW', 3, 'DuXf3Z9CPgSdYFqDQLmZmc7cDp0KTe0Tkhg4p5JvOFGMRsk1co2I5vt9e7Y9', '2018-08-26 22:08:35', '2018-09-30 22:38:43', 'Consignee', 0, 1, 0, NULL),
(4, 'TWICE', 'twicejype@gmail.com', '$2y$10$7pFLHptgmpu00ZO534rUE.UVQkVp9Vq.cFfPhzGt9REt4lmrOVTAy', 4, 'eF2aWBHWjDL7i3xgaWEpQWQyAluvtEUUz8GYp2ZvF7krNgIpODBijGCs23zR', '2018-08-27 02:46:55', '2018-10-12 11:15:07', 'Consignee', 0, 1, 0, NULL),
(5, 'TWICE', 'twicesujype@gmail.com', '$2y$10$q9nlpjUEfEOKVgzmMAuVJeTx4XbYvGBpKth22ZaVlXKnjJRS0gVie', 5, 'xJVLr2FlnEoZUsPTwne6RjTEhF7tJ6Tff607ubCuxhMUuum0tm4x4fRvmt2Y', '2018-08-27 02:47:56', '2018-10-12 11:15:10', 'Consignee', 0, 1, 0, NULL),
(6, 'Isaac Tailoring Shop', 'isaac@gmail.com', '$2y$10$j8z4HECOGsHqXiBa1J5EueWk/e9PNIapA4TRrKvpPL9I46AelTNRK', 6, '7ZN2sDcHi2QHVevs0Z993JvhTusfB3Of3YC7qZD3dMOzmOsmZIfRZJ7eu4Sr', '2018-08-27 04:41:35', '2018-08-27 05:47:58', 'Consignee', 0, 1, 0, NULL),
(7, 'Eyenet Training', 'marinaslevie@gmail.com', '$2y$10$YIo5rGen4jkUMlrUxbaaNed78mN92q7bg2r8IcOBE32k.PqacvEHm', 7, 'Pw5GitIwNMTJBRlaRUvXmm5wGkmgopnFKw7se6IeXpJXqF8ZZjrytOipYjDk', '2018-08-27 06:16:04', '2018-08-27 17:49:55', 'Consignee', 0, 1, 0, NULL),
(13, 'akari', 'akari@gmail.com', '$2y$10$EPf6MLFuhVXXVji1gE.vnONc2PdnoHSEkJ1H8wIPJcLbz2CE6.4de', 8, '7HZA8yZ5BCrUja1oNHsplXQLCBsPLxBTbS91ktVHR6sIKsKpY7XNeeteyBXy', '2018-08-27 20:45:30', '2018-08-27 20:46:38', 'Consignee', 0, 1, 0, NULL),
(14, 'Timba', 'Timba@gmail.com', '$2y$10$WhBrPXcF/tQBMhnhlcGA7eN8GDNym8AUpIO6J9AfqfY/KQabVXAoW', 9, 'pNZhkUy5qsREel823qsLLJnPBmQD9l8gAsqsennPW7E5ilfIQuehIMS0dTDa', '2018-08-27 22:56:57', '2018-08-27 22:57:19', 'Consignee', 0, 1, 0, NULL),
(15, 'cmrecto', 'cmrecto@gmail.com', '$2y$10$j4tDnh2dRkk5wfEotn0hkuNuoQQUAfJNkgwLU.P0m.OMfUX9u.uqG', 10, '9RmJ20YflA7dFB4e13zMdRoBvQSXbqIFEueh0oiywVaZgbBBg6qLoMdb3QrF', '2018-09-30 22:35:51', '2018-09-30 22:38:36', 'Consignee', 0, 1, 0, NULL),
(21, 'Emmanuel', 'reignshirley@gmail.com', '$2y$10$fUgf2R6iPpOmaB6v5b3WseMU69oCxUkDth./.dro4.YPBRePLbYQa', 25, NULL, '2018-10-16 22:32:18', '2018-10-16 22:33:19', 'Consignee', 0, 1, 0, NULL),
(22, 'Sir Eli', 'e_a_austria@yahoo.com', '$2y$10$QET0Zu5iLvIktPRXdX0LxuwnRgby6JZqRoqnibWDLX72QoZeCsdES', 26, NULL, '2018-10-16 23:16:39', '2018-10-16 23:16:39', 'Consignee', 0, 0, 0, 'mMwOS6htFdUhtmhcZDsDD8SuH'),
(23, 'EMReign', 'clumsyreigny@gmail.com', '$2y$10$Cxob/uNaW.O6IWEJX/b2gOD1w71b.ARpwnAp61sfwIG6WnJGjF4Aq', 27, '41JWw6kr0daEFudKMb6Tylg5AopTcjCYgp5iMS8rgg5nJXkXPZ3wgg1uTCV1', '2018-10-16 23:18:40', '2018-10-16 23:20:40', 'Consignee', 0, 1, 0, 'mdvavpgrzaX6V2NgqhQnWsqPT');

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
-- Constraints for table `tblrequest`
--
ALTER TABLE `tblrequest`
  ADD CONSTRAINT `fk_tblRequest_tblCompany1` FOREIGN KEY (`intRCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblRequest_tblCompany2` FOREIGN KEY (`intRForwardCompanyID`) REFERENCES `tblcompany` (`intCompanyID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblRequest_tblJobOrder1` FOREIGN KEY (`intRJobOrderID`) REFERENCES `tbljoborder` (`intJobOrderID`) ON UPDATE CASCADE;

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
