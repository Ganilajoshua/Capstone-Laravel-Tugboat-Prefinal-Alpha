-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2018 at 01:06 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblattachments`
--

CREATE TABLE `tblattachments` (
  `intAttachmentsID` int(11) NOT NULL,
  `strAttachmentsDesc` varchar(45) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblbalance`
--

CREATE TABLE `tblbalance` (
  `intBalanceID` int(11) NOT NULL,
  `fltBalance` float NOT NULL DEFAULT '0',
  `dtUpdateBalance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbalance`
--

INSERT INTO `tblbalance` (`intBalanceID`, `fltBalance`, `dtUpdateBalance`) VALUES
(3, 6200, '0000-00-00'),
(8, 1000, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblbarge`
--

CREATE TABLE `tblbarge` (
  `intBargeID` int(11) NOT NULL,
  `intBGoodsID` int(11) DEFAULT NULL,
  `strBargeName` varchar(45) DEFAULT NULL,
  `fltBargeWeight` float DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblberth`
--

CREATE TABLE `tblberth` (
  `intBerthID` int(11) NOT NULL,
  `intBPierID` int(11) DEFAULT NULL,
  `strBerthName` varchar(45) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tblberthhistory` (
  `intBerthHistoryID` int(11) NOT NULL,
  `strBHBerthName` varchar(45) DEFAULT NULL,
  `intBHBerthID` int(11) DEFAULT NULL,
  `intBHPierID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbill`
--

CREATE TABLE `tblbill` (
  `intBillID` int(11) NOT NULL,
  `strSignature` text,
  `enumStatus` enum('Pending','Accepted','Rejected','Processing') NOT NULL,
  `boolDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbill`
--

INSERT INTO `tblbill` (`intBillID`, `strSignature`, `enumStatus`, `boolDeleted`) VALUES
(1, NULL, 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcharges`
--

CREATE TABLE `tblcharges` (
  `intChargeID` int(11) NOT NULL,
  `fltJOAmount` float DEFAULT '0',
  `fltTugboatDelayFee` float DEFAULT '0',
  `fltConsigneeViolationFee` float DEFAULT '0',
  `fltConsigneeLateFee` float DEFAULT '0',
  `fltConsigneeDamageFee` float DEFAULT '0',
  `fltCompanyDamageFee` float DEFAULT '0',
  `fltCompanyViolationFee` float DEFAULT '0',
  `intDiscount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcharges`
--

INSERT INTO `tblcharges` (`intChargeID`, `fltJOAmount`, `fltTugboatDelayFee`, `fltConsigneeViolationFee`, `fltConsigneeLateFee`, `fltConsigneeDamageFee`, `fltCompanyDamageFee`, `fltCompanyViolationFee`, `intDiscount`) VALUES
(1, 66000, 2000, NULL, 0, 3000, NULL, NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tblcheque`
--

CREATE TABLE `tblcheque` (
  `intChequeID` int(11) NOT NULL,
  `intCBillID` int(11) DEFAULT NULL,
  `dtPayment` date DEFAULT NULL,
  `intABANum` int(11) DEFAULT NULL,
  `intAmount` int(11) DEFAULT NULL,
  `strMemo` varchar(11) DEFAULT NULL,
  `intRouteNum` int(11) DEFAULT NULL,
  `intAccountNum` int(11) DEFAULT NULL,
  `boolDeleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `intCompanyID` int(11) NOT NULL,
  `intCGoodsID` int(11) DEFAULT NULL,
  `intCPostBillingTicketID` int(11) DEFAULT NULL,
  `strCompanyName` varchar(45) DEFAULT NULL,
  `strCompanyAddress` text,
  `strCompanyEmail` varchar(45) DEFAULT NULL,
  `strCompanyContactPNum` varchar(13) DEFAULT NULL,
  `strCompanyContactTNum` varchar(9) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  `strCompanyPermit` text,
  `strCompanyPicture` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(27, NULL, NULL, 'Testing Company Final Defense 2', 'Testing Company Final Defense Address 2', 'clumsyreigny@gmail.com', '0928158696', '3685109', 0, 'DTI-Permit.jpg', NULL),
(28, NULL, NULL, 'qwerty', 'qwerty', 'qwerty@gmail.com', '574212', '01444', 0, 'galaxy-wallpaper-green.jpg', NULL),
(29, NULL, NULL, 'zxcv', 'zxcv', 'zxc@gmail.com', '3242', '34234', 0, NULL, NULL),
(30, NULL, NULL, 'zxcv', 'zxcv', 'zxc@gmail.com', '3242', '34234', 0, NULL, NULL),
(31, NULL, NULL, 'zxcv', 'zxcv', 'zxc@gmail.com', '3242', '34234', 0, NULL, NULL),
(32, NULL, NULL, 'new', 'new', 'new@gmail.com', '23232', '02932', 0, '2D_Game_Character_Sprite_Sheets-_Featured-Image1.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontractclauses`
--

CREATE TABLE `tblcontractclauses` (
  `intContractClausesID` int(11) NOT NULL,
  `strContractAgreements` text,
  `strContractTermsAndConditions` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontractfeesmatrix`
--

CREATE TABLE `tblcontractfeesmatrix` (
  `intContractFeesID` int(11) NOT NULL,
  `enumServiceType` enum('Hauling','Tug Assist') DEFAULT NULL,
  `fltCFStandardRate` float DEFAULT NULL,
  `fltCFTugboatDelayFee` float DEFAULT NULL,
  `fltCFConsigneeLateFee` float DEFAULT NULL,
  `fltCFViolationFee` float DEFAULT NULL,
  `fltCFMinDamageFee` float DEFAULT NULL,
  `fltCFMaxDamageFee` float DEFAULT NULL,
  `intCFDiscount` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tblcontractlist` (
  `intContractListID` int(11) NOT NULL,
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
  `isDefault` enum('Yes','No') DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcontractlist`
--

INSERT INTO `tblcontractlist` (`intContractListID`, `intCCompanyID`, `intCQuotationID`, `strContractListTitle`, `strContractListDesc`, `intCAttachmentsID`, `isFinalized`, `enumStatus`, `boolDeleted`, `datContractActive`, `datContractExpire`, `enumConValidity`, `strConsigneeSign`, `strAdminSign`, `isDefault`) VALUES
(1, 3, NULL, 'Contract Title 1', '<p>Contract Details 2</p>', NULL, NULL, 'Expired', 0, '2018-10-26', '2019-04-26', '6', NULL, NULL, 'Yes'),
(2, 3, NULL, 'Contract Title Renewal 1', '<p>Contract Details Renewal 1<br></p>', NULL, NULL, 'Expired', 0, '2018-10-26', '2019-10-26', '1', NULL, NULL, 'Yes'),
(3, 3, NULL, 'Contract Renewal 2', '<p>Contract Renewal Details 2</p>', NULL, NULL, 'Active', 0, '2018-10-28', '2019-10-28', '1', NULL, NULL, 'Yes'),
(4, 28, NULL, NULL, '<p>All shipments to or from the Customer, which term shall include the exporter, importer, sender, receiver, owner, consignor, consignee, transferor or transferee of the shipments, will be handled by Unitrans Worldwide, Inc, herein called the “Company”) on the following terms and conditions:</p><p>•1.&nbsp;<span style=\"font-weight: bolder;\">Services by Third Parties</span>. Unless the Company carries, stores or otherwise physically handles the shipment, and loss, damage, expense or delay occurs during such activity, the Company assumes no liability as a carrier and is not to be held responsible for any loss, damage, expense or delay to the goods to be forwarded or imported except as provided in paragraph 8 and subject to the limitations of paragraph 9 below, but undertakes only to use reasonable care in the selection of carriers, truck men, lightermen, forwarders, customs brokers, agents, warehousemen and others to whom it may entrust the goods for transportation, cartage, handling and/or delivery and/or storage or otherwise. When the company carries, stores or otherwise physically handles the shipment, it does so subject to the limitation of liability set forth in paragraph 8 below unless a separate bill of lading, air waybill or other contract of carriage is issued by the Company, in which event the terms thereof shall govern.</p><p>•2.&nbsp;<span style=\"font-weight: bolder;\">Liability Limitations of Third Parties</span>. The Company is authorized to select and engage carriers, truck men, lightermen, forwarders, customs brokers, agents, warehousemen and others, as required, to transport, store, deal with and deliver the goods, all of whom shall be considered as the agents of the Customer, and the goods may be entrusted to such agencies subject to all conditions as to limitation of liability for loss, damage, expense or delay and to all rules, regulations, requirements and conditions, whether printed, written or stamped, appearing in bills of lading, receipts or tariffs issued by such carriers, truck men, lightermen, forwarders, customs brokers, agents, warehousemen and others. The Company shall under no circumstances be liable for any loss, damage, expense or delay to the goods for any reason whatsoever when said goods are in custody, possession or control of third parties selected by the Company to forward, enter and clear, transport or render other services with respect to such goods.</p><p>•3.&nbsp;<span style=\"font-weight: bolder;\">Choosing Routes or Agents</span>. Unless express instructions in writing are received from the Customer, the Company has complete freedom in choosing the means, route and procedure to be followed in the handling, transportation and delivery of the goods. Advice by the Company to the Customer that a particular person or firm has been selected to render services with respect to the goods shall not be construed to mean that the Company warrants or represents that such person or firm will render such services.</p><p>•4.&nbsp;<span style=\"font-weight: bolder;\">Quotations Not Binding</span>. Quotations as to fees, rates of duty, freight charges, insurance premiums or other charges given by the Company to the Customer are for informational purposes only and are subject to change without notice and shall not under any circumstances be binding upon the Company unless the Company in writing specifically undertakes the handling or transportation of the shipment at a specific rate.</p><p>•5.&nbsp;<span style=\"font-weight: bolder;\">Duty to Furnish Information</span>.</p><p>(<span style=\"font-weight: bolder;\">a</span>) On an import at a reasonable time prior to entering of the goods for U.S. Customs, the Customer shall furnish to the Company invoices in proper form and other documents necessary or useful in the preparation of the U. S. Customs entry and, also, such further information as may be sufficient to establish, inter alia, the dutiable value, the classification, the country of origin, the genuineness of the merchandise and any mark or symbol associated with it, the Customer’s right to import and/or distribute the merchandise, and the merchandise’s admissibility, pursuant to U. S. law or regulation. If the Customer fails in a timely manner to furnish such information or documents, in whole or in part, as may be required to complete U. S. Customs entry or comply with U.S. laws or regulations, or if the information or documents furnished are inaccurate or incomplete, the Company shall be obligated only to use its best judgment in connection with the shipment and in no instance shall be charged with knowledge by the Customer of the true circumstances to which such inaccurate, incomplete, or omitted information or document pertains. Where a bond is required by U.S. Customs to be given for the production of any document or the performance of any act, the Customer shall be deemed bound by the terms of the bond notwithstanding the fact that the bond has been executed by the Company as principal, it being understood that the Company entered into such undertaking at the instance and on behalf of the Customer, and the Customer shall indemnify and hold the Company harmless for the consequences of any breach of the terms of the bond.</p><p>(<span style=\"font-weight: bolder;\">b</span>) On an export at a reasonable time prior to the exportation of the shipment the Customer shall furnish to the Company the commercial invoice in proper form and number, a proper consular declaration, weights, measures, values and other information in the language of and as may be required by the laws and regulations of U. S. and the country of destination of the goods.</p><p>(<span style=\"font-weight: bolder;\">c</span>) On an export or import the Company shall not in any way be responsible or liable for increased duty, penalty, fine or expense unless caused by the negligence or other fault of the Company, in which event its liability to the Customer shall be governed by the provisions of paragraphs 8-10 below. The Customer shall be bound by and warrant the accuracy of all invoices, documents and information furnished to the Company by the Customer or its agent for export, entry or other purposes and the Customer agrees to indemnify and hold harmless the Company against any increased duty, penalty, fine or expense including attorneys’ fees, resulting from any inaccuracy, incomplete statement, omission or any failure to make timely presentation, even if not due to any negligence of the Customer.</p><p>•6.&nbsp;<span style=\"font-weight: bolder;\">Declaring Higher Valuation</span>. Inasmuch as truckers, carriers, warehousemen and others to whom the goods are entrusted usually limit their liability for loss or damage unless a higher value is declared and a charge based on such higher value is agreed to by said truckers, etc., the Company must receive specific written instructions from the Customer to pay such higher charge based on valuation and the trucker, etc. must accept such higher declared value; otherwise the valuation placed by the Customer on the goods shall be considered solely for export or customs purposes and the goods will be delivered to the truckers, etc. subject to the limitation of liability set forth herein in paragraphs 8-10 below with respect to any claim against the Company and subject to the provisions of paragraph 2 above.</p><p>7.&nbsp;<span style=\"font-weight: bolder;\">Insurance</span>. The Company will make reasonable efforts to effect marine, fire, theft and other insurance upon the goods only after specific written instructions have been received by the Company in sufficient time prior to shipment from point of origin, and the Customer at the same time states specifically the kind and amount of insurance to be placed. The Company does not undertake or warrant that such insurance can or will be placed. Unless the Customer has its own open marine policy and instructs the Company to effect insurance under such policy, insurance is to be effected with one or more insurance companies or other underwriters to be selected by the Company. Any insurance placed shall be governed by the certificate or policy issued and will only be effective when accepted by such insurance companies or underwriters. Should an insurer dispute its liability for any reason, the insured shall have recourse against the insurer only and the Company shall not be under any responsibility or liability in relation thereto, notwithstanding that the premium upon the policy may not be at the same rates as that charged or paid to the Company by the Customer, or that the shipment was insured under a policy in the name of the Company. Insurance premiums and the charge of the Company for arranging the same shall be at the Customer’s expense. If for any reason the goods are held in warehouse, or elsewhere, the same will not be covered by any insurance, unless the Company receives written instructions from the Customer. Unless specifically agreed in writing, the Company assumes no responsibility to effect insurance on any export or import shipment which it does not handle.</p><p>•8.&nbsp;<span style=\"font-weight: bolder;\">Limitation of Liability for Loss, etc</span>.</p><p>(<span style=\"font-weight: bolder;\">a</span>) The Customer agrees that the Company shall only be liable for any loss, damage expense or delay to the goods resulting from the negligence or other fault of the Company; such liability shall be limited to an amount equal to the lesser of fifty dollars ($50.00) per entry or shipment or the fee(s) charged for services, provided that, in the case of partial loss, such amount will be adjusted, pro rata;</p><p>(<span style=\"font-weight: bolder;\">b</span>) Where the Company issues its own bill of lading and receives freight charges as its compensation, Customer has the option of paying a special compensation and increasing the limit of Company’s liability up to the shipment’s actual value; however, such option must be exercised by written agreement, entered into prior to any covered transaction(s),setting forth the limit of the Company’s liability and the compensation received;</p><p>(<span style=\"font-weight: bolder;\">c</span>) In instances other than in (b) above, unless the Customer makes specific written arrangements with the Company to pay special compensation and declare a higher value and Company agrees in writing, liability is limited to the amount set forth in (a) above;</p><p>(<span style=\"font-weight: bolder;\">d</span>) Customer agrees that the Company shall, in no event, be liable for consequential, punitive, statutory or special damages in excess of the monetary limit provided for above.</p><p>•9.&nbsp;<span style=\"font-weight: bolder;\">Presenting Claims</span>. Company shall not be liable under paragraph 8 for any claims not presented to it in writing within 90 days of either the date of loss or incident giving rise to the claim; no suit to recover for any claim or demand here under shall be maintained against the Company unless instituted within six (6) months after the presentation of the said claim or such longer period provided for under statute(s) of the State having jurisdiction of the matter.</p><p>•10.&nbsp;<span style=\"font-weight: bolder;\">Advancing Money</span>. The Company shall not be obliged to incur any expense, guarantee payment or advance any money in connection with the importing, forwarding, transporting, insuring, storing or coopering of the goods, unless the same is previously provided to the Company by the Customer on demand. The Company shall be under no obligation to advance freight charges, customs duties or taxes on any shipment, nor shall any advance by the Company be construed as a waiver of the provisions hereof.</p><p>•11.<span style=\"font-weight: bolder;\">&nbsp;Indemnification for Freight, Duties</span>. In the event that a carrier, other person or any governmental agency makes a claim or institutes legal action against the company for ocean or other freight, duties, fines, penalties, liquidated damages or other money due rising from a shipment of goods of the Customer, the Customer agrees to indemnify and hold harmless the Company for any amount the Company may be required to pay such carrier, other person or governmental agency together with reasonable expenses, including attorneys’ fees, incurred by the Company in connection with defending such claim or legal action and obtaining reimbursement from the Customer. The confiscation or detention of the goods by any governmental authority shall not affect or diminish the liability of the Customer to the Company to pay all charges or other money due promptly on demand.</p><p>•12.&nbsp;<span style=\"font-weight: bolder;\">C.O.D. Shipments</span>. Goods received with Customer’s or other person’s instructions to “Collect on Delivery” (C.O.D.) by drafts or otherwise, or to collect on any specified terms by time drafts or otherwise, are accepted by the Company only upon the express understanding that it will exercise reasonable care in the selection of a bank, correspondent, carrier or agent to whom it will send such item for collection, and the Company will not be responsible for any act, omission, default, suspension, insolvency or want of care, negligence, or fault of such bank, correspondent, carrier or agent, nor for any delay in remittance lost in exchange, or during transmission, or while in the course of collection.</p><p>•13.&nbsp;<span style=\"font-weight: bolder;\">General Lien on Any Property</span>. The Company shall have a general lien on any and all property (and documents relating thereto) of the customer, in its possession, custody or control or en route, for all claims for charges, expenses or advances incurred by the Company in connection with any shipments of the Customer and if such claim remains unsatisfied for thirty (30) days after demand for its payment is made, the Company may sell at public auction or private sale, upon ten (10) days written notice, registered mail(R.R.R.), to the Customer, the goods, wares and/or merchandise, or so much thereof as may be necessary to satisfy such lien, and apply the net proceeds of such sale to the payment of the amount due to the Company. Any surplus from such sale shall be transmitted to the Customer, and the Customer shall be liable for any deficiency in the sale.</p><p>•14.&nbsp;<span style=\"font-weight: bolder;\">Compensation of Company</span>. The compensation of the Company for its services shall be included with and is in addition to the rates and charges of all carriers and other agencies selected by the Company to transport and deal with the goods and such compensation shall be exclusive of any brokerage, commissions, dividends or other revenue received by the Company from carriers, insurers and others in connection with the shipment. On ocean exports, upon request, the Company shall provide a detailed breakout of the components of all charges assessed and a true copy of each pertinent document relating to these charges. In any referral for collection or action against the Customer for monies due the Company, upon recovery by the Company, the Customer shall pay the expenses of collection and/or litigation, including a reasonable attorney fee.</p><p>•15.&nbsp;<span style=\"font-weight: bolder;\">No Responsibility for Governmental Requirements</span>. It is the responsibility of the Customer to know and comply with the marking requirements of the U. S. Customs Service, the regulations of the U. S. Food and Drug Administration, and all other requirements, including regulations of Federal, state and/or local agencies pertaining to the merchandise. The Company shall not be responsible for action taken or fines or penalties assessed by any governmental agency against the shipment because of the failure of the Customer to comply with the law or the requirements or regulations of any governmental agency or with a notification issued to the Customer by any such agency.</p><p>•16.&nbsp;<span style=\"font-weight: bolder;\">Indemnity Against Liability Arising from the Importation of Merchandise</span>. The Customer agrees to indemnify and hold the Company harmless from any claims and/or liability arising from the importation of merchandise which violates any Federal, state and/or other laws or regulations and further agrees to indemnify and hold the Company harmless against any and all liability, loss, damages, costs, claims and/or expenses, including but not limited to attorney’s fees, which the Company may hereafter incur, suffer or be required to pay by reason of claims by any government agency or private party. In the event that any action, suit or proceeding is brought against the Company by any government agency or any private party, the Company shall give notice in writing to the Customer by mail at its address on file with the Company. Upon receipt of such notice, the Customer at its own expense shall defend against such action and take all steps as may be necessary or proper to prevent the obtaining of a judgment and/or order against the Company.</p><p>•17.&nbsp;<span style=\"font-weight: bolder;\">Loss, Damage or Expense Due to Delay</span>. Unless the services to be performed by the Company on behalf of the Customer are delayed by reason of the negligence or other fault of the Company, the Company shall not be responsible for any loss, damage or expense incurred by the Customer because of such delay. In the event the Company is at fault, as aforesaid, its liability is limited in accordance with the provisions of paragraphs 8-9 above.</p><p>18.<span style=\"font-weight: bolder;\">&nbsp;Construction of Terms and Venue</span>. The foregoing terms and conditions shall be construed according to the laws of the State shown on the reverse side hereof. Unless otherwise consented to in writing by the Company, no legal proceeding against the Company may be instituted by the Customer, its assigns, or subrogee except in the City shown on the reverse side</p>', NULL, NULL, 'Created', 0, NULL, NULL, '', NULL, NULL, 'Yes'),
(6, 32, NULL, 'Titlee', '<p><br></p><p>All shipments to or from the Customer, which term shall include the exporter, importer, sender, receiver, owner, consignor, consignee, transferor or transferee of the shipments, will be handled by Unitrans Worldwide, Inc, herein called the “Company”) on the following terms and conditions:</p><p>•1.&nbsp;<span style=\"font-weight: bolder;\">Services by Third Parties</span>. Unless the Company carries, stores or otherwise physically handles the shipment, and loss, damage, expense or delay occurs during such activity, the Company assumes no liability as a carrier and is not to be held responsible for any loss, damage, expense or delay to the goods to be forwarded or imported except as provided in paragraph 8 and subject to the limitations of paragraph 9 below, but undertakes only to use reasonable care in the selection of carriers, truck men, lightermen, forwarders, customs brokers, agents, warehousemen and others to whom it may entrust the goods for transportation, cartage, handling and/or delivery and/or storage or otherwise. When the company carries, stores or otherwise physically handles the shipment, it does so subject to the limitation of liability set forth in paragraph 8 below unless a separate bill of lading, air waybill or other contract of carriage is issued by the Company, in which event the terms thereof shall govern.</p><p>•2.&nbsp;<span style=\"font-weight: bolder;\">Liability Limitations of Third Parties</span>. The Company is authorized to select and engage carriers, truck men, lightermen, forwarders, customs brokers, agents, warehousemen and others, as required, to transport, store, deal with and deliver the goods, all of whom shall be considered as the agents of the Customer, and the goods may be entrusted to such agencies subject to all conditions as to limitation of liability for loss, damage, expense or delay and to all rules, regulations, requirements and conditions, whether printed, written or stamped, appearing in bills of lading, receipts or tariffs issued by such carriers, truck men, lightermen, forwarders, customs brokers, agents, warehousemen and others. The Company shall under no circumstances be liable for any loss, damage, expense or delay to the goods for any reason whatsoever when said goods are in custody, possession or control of third parties selected by the Company to forward, enter and clear, transport or render other services with respect to such goods.</p><p>•3.&nbsp;<span style=\"font-weight: bolder;\">Choosing Routes or Agents</span>. Unless express instructions in writing are received from the Customer, the Company has complete freedom in choosing the means, route and procedure to be followed in the handling, transportation and delivery of the goods. Advice by the Company to the Customer that a particular person or firm has been selected to render services with respect to the goods shall not be construed to mean that the Company warrants or represents that such person or firm will render such services.</p><p>•4.&nbsp;<span style=\"font-weight: bolder;\">Quotations Not Binding</span>. Quotations as to fees, rates of duty, freight charges, insurance premiums or other charges given by the Company to the Customer are for informational purposes only and are subject to change without notice and shall not under any circumstances be binding upon the Company unless the Company in writing specifically undertakes the handling or transportation of the shipment at a specific rate.</p><p>•5.&nbsp;<span style=\"font-weight: bolder;\">Duty to Furnish Information</span>.</p><p>(<span style=\"font-weight: bolder;\">a</span>) On an import at a reasonable time prior to entering of the goods for U.S. Customs, the Customer shall furnish to the Company invoices in proper form and other documents necessary or useful in the preparation of the U. S. Customs entry and, also, such further information as may be sufficient to establish, inter alia, the dutiable value, the classification, the country of origin, the genuineness of the merchandise and any mark or symbol associated with it, the Customer’s right to import and/or distribute the merchandise, and the merchandise’s admissibility, pursuant to U. S. law or regulation. If the Customer fails in a timely manner to furnish such information or documents, in whole or in part, as may be required to complete U. S. Customs entry or comply with U.S. laws or regulations, or if the information or documents furnished are inaccurate or incomplete, the Company shall be obligated only to use its best judgment in connection with the shipment and in no instance shall be charged with knowledge by the Customer of the true circumstances to which such inaccurate, incomplete, or omitted information or document pertains. Where a bond is required by U.S. Customs to be given for the production of any document or the performance of any act, the Customer shall be deemed bound by the terms of the bond notwithstanding the fact that the bond has been executed by the Company as principal, it being understood that the Company entered into such undertaking at the instance and on behalf of the Customer, and the Customer shall indemnify and hold the Company harmless for the consequences of any breach of the terms of the bond.</p><p>(<span style=\"font-weight: bolder;\">b</span>) On an export at a reasonable time prior to the exportation of the shipment the Customer shall furnish to the Company the commercial invoice in proper form and number, a proper consular declaration, weights, measures, values and other information in the language of and as may be required by the laws and regulations of U. S. and the country of destination of the goods.</p><p>(<span style=\"font-weight: bolder;\">c</span>) On an export or import the Company shall not in any way be responsible or liable for increased duty, penalty, fine or expense unless caused by the negligence or other fault of the Company, in which event its liability to the Customer shall be governed by the provisions of paragraphs 8-10 below. The Customer shall be bound by and warrant the accuracy of all invoices, documents and information furnished to the Company by the Customer or its agent for export, entry or other purposes and the Customer agrees to indemnify and hold harmless the Company against any increased duty, penalty, fine or expense including attorneys’ fees, resulting from any inaccuracy, incomplete statement, omission or any failure to make timely presentation, even if not due to any negligence of the Customer.</p><p>•6.&nbsp;<span style=\"font-weight: bolder;\">Declaring Higher Valuation</span>. Inasmuch as truckers, carriers, warehousemen and others to whom the goods are entrusted usually limit their liability for loss or damage unless a higher value is declared and a charge based on such higher value is agreed to by said truckers, etc., the Company must receive specific written instructions from the Customer to pay such higher charge based on valuation and the trucker, etc. must accept such higher declared value; otherwise the valuation placed by the Customer on the goods shall be considered solely for export or customs purposes and the goods will be delivered to the truckers, etc. subject to the limitation of liability set forth herein in paragraphs 8-10 below with respect to any claim against the Company and subject to the provisions of paragraph 2 above.</p><p>7.&nbsp;<span style=\"font-weight: bolder;\">Insurance</span>. The Company will make reasonable efforts to effect marine, fire, theft and other insurance upon the goods only after specific written instructions have been received by the Company in sufficient time prior to shipment from point of origin, and the Customer at the same time states specifically the kind and amount of insurance to be placed. The Company does not undertake or warrant that such insurance can or will be placed. Unless the Customer has its own open marine policy and instructs the Company to effect insurance under such policy, insurance is to be effected with one or more insurance companies or other underwriters to be selected by the Company. Any insurance placed shall be governed by the certificate or policy issued and will only be effective when accepted by such insurance companies or underwriters. Should an insurer dispute its liability for any reason, the insured shall have recourse against the insurer only and the Company shall not be under any responsibility or liability in relation thereto, notwithstanding that the premium upon the policy may not be at the same rates as that charged or paid to the Company by the Customer, or that the shipment was insured under a policy in the name of the Company. Insurance premiums and the charge of the Company for arranging the same shall be at the Customer’s expense. If for any reason the goods are held in warehouse, or elsewhere, the same will not be covered by any insurance, unless the Company receives written instructions from the Customer. Unless specifically agreed in writing, the Company assumes no responsibility to effect insurance on any export or import shipment which it does not handle.</p><p>•8.&nbsp;<span style=\"font-weight: bolder;\">Limitation of Liability for Loss, etc</span>.</p><p>(<span style=\"font-weight: bolder;\">a</span>) The Customer agrees that the Company shall only be liable for any loss, damage expense or delay to the goods resulting from the negligence or other fault of the Company; such liability shall be limited to an amount equal to the lesser of fifty dollars ($50.00) per entry or shipment or the fee(s) charged for services, provided that, in the case of partial loss, such amount will be adjusted, pro rata;</p><p>(<span style=\"font-weight: bolder;\">b</span>) Where the Company issues its own bill of lading and receives freight charges as its compensation, Customer has the option of paying a special compensation and increasing the limit of Company’s liability up to the shipment’s actual value; however, such option must be exercised by written agreement, entered into prior to any covered transaction(s),setting forth the limit of the Company’s liability and the compensation received;</p><p>(<span style=\"font-weight: bolder;\">c</span>) In instances other than in (b) above, unless the Customer makes specific written arrangements with the Company to pay special compensation and declare a higher value and Company agrees in writing, liability is limited to the amount set forth in (a) above;</p><p>(<span style=\"font-weight: bolder;\">d</span>) Customer agrees that the Company shall, in no event, be liable for consequential, punitive, statutory or special damages in excess of the monetary limit provided for above.</p><p>•9.&nbsp;<span style=\"font-weight: bolder;\">Presenting Claims</span>. Company shall not be liable under paragraph 8 for any claims not presented to it in writing within 90 days of either the date of loss or incident giving rise to the claim; no suit to recover for any claim or demand here under shall be maintained against the Company unless instituted within six (6) months after the presentation of the said claim or such longer period provided for under statute(s) of the State having jurisdiction of the matter.</p><p>•10.&nbsp;<span style=\"font-weight: bolder;\">Advancing Money</span>. The Company shall not be obliged to incur any expense, guarantee payment or advance any money in connection with the importing, forwarding, transporting, insuring, storing or coopering of the goods, unless the same is previously provided to the Company by the Customer on demand. The Company shall be under no obligation to advance freight charges, customs duties or taxes on any shipment, nor shall any advance by the Company be construed as a waiver of the provisions hereof.</p><p>•11.<span style=\"font-weight: bolder;\">&nbsp;Indemnification for Freight, Duties</span>. In the event that a carrier, other person or any governmental agency makes a claim or institutes legal action against the company for ocean or other freight, duties, fines, penalties, liquidated damages or other money due rising from a shipment of goods of the Customer, the Customer agrees to indemnify and hold harmless the Company for any amount the Company may be required to pay such carrier, other person or governmental agency together with reasonable expenses, including attorneys’ fees, incurred by the Company in connection with defending such claim or legal action and obtaining reimbursement from the Customer. The confiscation or detention of the goods by any governmental authority shall not affect or diminish the liability of the Customer to the Company to pay all charges or other money due promptly on demand.</p><p>•12.&nbsp;<span style=\"font-weight: bolder;\">C.O.D. Shipments</span>. Goods received with Customer’s or other person’s instructions to “Collect on Delivery” (C.O.D.) by drafts or otherwise, or to collect on any specified terms by time drafts or otherwise, are accepted by the Company only upon the express understanding that it will exercise reasonable care in the selection of a bank, correspondent, carrier or agent to whom it will send such item for collection, and the Company will not be responsible for any act, omission, default, suspension, insolvency or want of care, negligence, or fault of such bank, correspondent, carrier or agent, nor for any delay in remittance lost in exchange, or during transmission, or while in the course of collection.</p><p>•13.&nbsp;<span style=\"font-weight: bolder;\">General Lien on Any Property</span>. The Company shall have a general lien on any and all property (and documents relating thereto) of the customer, in its possession, custody or control or en route, for all claims for charges, expenses or advances incurred by the Company in connection with any shipments of the Customer and if such claim remains unsatisfied for thirty (30) days after demand for its payment is made, the Company may sell at public auction or private sale, upon ten (10) days written notice, registered mail(R.R.R.), to the Customer, the goods, wares and/or merchandise, or so much thereof as may be necessary to satisfy such lien, and apply the net proceeds of such sale to the payment of the amount due to the Company. Any surplus from such sale shall be transmitted to the Customer, and the Customer shall be liable for any deficiency in the sale.</p><p>•14.&nbsp;<span style=\"font-weight: bolder;\">Compensation of Company</span>. The compensation of the Company for its services shall be included with and is in addition to the rates and charges of all carriers and other agencies selected by the Company to transport and deal with the goods and such compensation shall be exclusive of any brokerage, commissions, dividends or other revenue received by the Company from carriers, insurers and others in connection with the shipment. On ocean exports, upon request, the Company shall provide a detailed breakout of the components of all charges assessed and a true copy of each pertinent document relating to these charges. In any referral for collection or action against the Customer for monies due the Company, upon recovery by the Company, the Customer shall pay the expenses of collection and/or litigation, including a reasonable attorney fee.</p><p>•15.&nbsp;<span style=\"font-weight: bolder;\">No Responsibility for Governmental Requirements</span>. It is the responsibility of the Customer to know and comply with the marking requirements of the U. S. Customs Service, the regulations of the U. S. Food and Drug Administration, and all other requirements, including regulations of Federal, state and/or local agencies pertaining to the merchandise. The Company shall not be responsible for action taken or fines or penalties assessed by any governmental agency against the shipment because of the failure of the Customer to comply with the law or the requirements or regulations of any governmental agency or with a notification issued to the Customer by any such agency.</p><p>•16.&nbsp;<span style=\"font-weight: bolder;\">Indemnity Against Liability Arising from the Importation of Merchandise</span>. The Customer agrees to indemnify and hold the Company harmless from any claims and/or liability arising from the importation of merchandise which violates any Federal, state and/or other laws or regulations and further agrees to indemnify and hold the Company harmless against any and all liability, loss, damages, costs, claims and/or expenses, including but not limited to attorney’s fees, which the Company may hereafter incur, suffer or be required to pay by reason of claims by any government agency or private party. In the event that any action, suit or proceeding is brought against the Company by any government agency or any private party, the Company shall give notice in writing to the Customer by mail at its address on file with the Company. Upon receipt of such notice, the Customer at its own expense shall defend against such action and take all steps as may be necessary or proper to prevent the obtaining of a judgment and/or order against the Company.</p><p>•17.&nbsp;<span style=\"font-weight: bolder;\">Loss, Damage or Expense Due to Delay</span>. Unless the services to be performed by the Company on behalf of the Customer are delayed by reason of the negligence or other fault of the Company, the Company shall not be responsible for any loss, damage or expense incurred by the Customer because of such delay. In the event the Company is at fault, as aforesaid, itsaa liability is limited in accordance with the provisions of paragraphs 8-9 above.</p><p>18.<span style=\"font-weight: bolder;\">&nbsp;Construction of Terms and Venue</span>. The foregoing terms and conditions shall be construed according to the laws of the State shown on the reverse side hereof. Unless otherwise consented to in writing by the Company, no legal proceeding against the Company may be instituted by the Customer, its assigns, or subrogee except in the City shown on the reverse side</p>', NULL, NULL, 'Active', 0, '2018-10-27', '2019-10-27', '1', NULL, NULL, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbldispatchticket`
--

CREATE TABLE `tbldispatchticket` (
  `intDispatchTicketID` int(11) NOT NULL,
  `strDispatchTicketDesc` varchar(45) DEFAULT NULL,
  `boolCApprovedby` tinyint(4) NOT NULL,
  `boolAApprovedby` tinyint(4) NOT NULL,
  `strConsigneeSign` text,
  `strAdminSign` text,
  `boolDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldispatchticket`
--

INSERT INTO `tbldispatchticket` (`intDispatchTicketID`, `strDispatchTicketDesc`, `boolCApprovedby`, `boolAApprovedby`, `strConsigneeSign`, `strAdminSign`, `boolDeleted`) VALUES
(6, NULL, 1, 1, '{\"lines\":[[[108,144],[109,144],[146,133],[168,127],[247,101],[246,98],[225,91],[187,87],[151,88],[136,93],[130,98],[130,99],[152,107],[197,115],[243,118],[279,119],[297,119],[299,119],[297,119],[264,126],[228,135],[182,151],[175,156],[175,157],[200,157],[240,157],[279,155],[286,155],[284,155],[276,155],[262,161],[260,161],[261,161],[267,161],[290,159],[300,155],[302,153],[305,151],[306,151],[311,152]]]}', '{\"lines\":[[[80,176],[81,176],[168,144],[177,135],[183,127],[189,115],[189,109],[185,108],[180,106],[172,105],[156,105],[146,105],[136,106],[134,108],[134,111],[137,114],[145,119],[178,134],[188,136],[201,138],[207,139],[215,139],[220,139],[226,138],[230,135],[234,132],[240,127],[245,122],[247,120],[247,118],[247,117],[247,116],[245,115],[242,114],[231,114],[226,114],[219,114],[213,115],[207,118],[204,121],[202,126],[202,127],[205,129],[217,130],[231,130],[260,130],[286,125],[306,121],[315,120],[318,119]]]}', NULL),
(7, NULL, 1, 1, '{\"lines\":[[[69,111],[86,96],[155,69],[303,40],[312,41],[314,43],[314,44],[306,49],[270,69],[237,103],[190,130],[163,153],[161,155],[166,155],[183,152],[225,145],[282,137],[333,126],[366,119],[368,119],[369,119],[352,131],[295,147],[284,149],[280,150],[281,150],[282,150],[285,146],[313,87],[340,55],[355,29],[359,22],[361,20],[362,21],[363,23],[379,62],[391,87],[414,152],[439,203],[454,228]]]}', '{\"lines\":[[[104,183],[107,173],[112,168],[148,113],[151,106],[149,101],[139,96],[127,92],[124,92],[122,94],[121,94],[121,96],[121,100],[121,109],[125,117],[135,124],[159,121],[175,105],[205,82],[232,32],[234,24],[234,21],[233,21],[231,21],[226,21],[217,27],[205,54],[200,83],[200,101],[208,113],[223,114],[241,101],[273,80],[296,56],[307,36],[307,31],[304,28],[292,24],[278,23],[266,27],[257,37],[250,70],[249,85],[249,106],[253,109],[325,74],[363,52]]]}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `intEmployeeID` int(11) NOT NULL,
  `intECompanyID` int(11) DEFAULT NULL,
  `intEPositionID` int(11) NOT NULL,
  `intETeamID` int(11) DEFAULT NULL,
  `enumEmpType` enum('Regular','Reserved','On Call') DEFAULT NULL,
  `strFName` varchar(45) NOT NULL,
  `strMName` varchar(45) DEFAULT NULL,
  `strLName` varchar(45) NOT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(24, 1, 3, 6, 'Regular', 'Reannie Danielle', NULL, 'Exiomo', 1, 0),
(25, 1, 1, NULL, 'Regular', 'Gloria', 'de Leon', 'Orillosa', 1, 0),
(26, 1, 2, NULL, 'Regular', 'Amalia', 'Orillosa', 'Bacar', 1, 0),
(28, 1, 13, NULL, 'Regular', 'Maria Cristina', 'Orillosa', 'Traballo', 1, 0),
(29, 1, 4, NULL, 'Regular', 'Ma. Lourdes', 'Orillosa', 'Mustapha', 1, 0),
(30, 1, 5, NULL, 'Regular', 'Marina', 'de Leon', 'Orillosa', 1, 0),
(31, 1, 3, NULL, 'Regular', 'Esperanza', 'Orillosa', 'Malto', 1, 0),
(32, 1, 3, NULL, 'Regular', 'Virginia', 'Orillosa', 'Madria', 1, 0),
(33, 1, 1, NULL, 'Regular', 'Algien', 'Orillosa', 'Orillosa', 1, 0),
(34, 1, 2, NULL, 'Regular', 'Aleksei Nikholai', 'Orillosa', 'Bacar', 1, 0),
(35, 1, 13, NULL, 'Regular', 'Esther Ma. Chronicles', 'Orillosa', 'Traballo', 1, 0),
(36, 1, 4, NULL, 'Regular', 'Aeshiera Nedriane', 'Orillosa', 'Bacar', 1, 0),
(37, 1, 5, NULL, 'Regular', 'Rhegynna', 'Orillosa', 'Mustapha', 1, 0),
(38, 1, 12, NULL, 'Regular', 'Rheigñer', 'Orillosa', 'Mustapha', 1, 0),
(39, 1, 3, NULL, 'Regular', 'Vince Ace', 'Orillosa', 'Madria', 1, 0),
(40, 1, 3, NULL, 'Regular', 'Chrysdane', 'Orillosa', 'Madria', 1, 0),
(41, 2, 7, 8, 'Regular', 'Mariecar', NULL, 'Oriel', 1, 0),
(42, 2, 6, 8, 'Regular', 'Jillmarie', NULL, 'Inocencio', 1, 0),
(43, 2, 8, 8, 'Regular', 'Jenhel', NULL, 'Santos', 1, 0),
(44, 2, 8, 8, 'Regular', 'Abigail', NULL, 'Del Rosario', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblfinalcontractfeesmatrix`
--

CREATE TABLE `tblfinalcontractfeesmatrix` (
  `intFinalContractFeesID` int(11) NOT NULL,
  `intFCFContractListID` int(11) DEFAULT NULL,
  `enumFCFServiceType` enum('Hauling','Tug Assist') CHARACTER SET latin1 DEFAULT NULL,
  `fltFCFStandardRate` float DEFAULT NULL,
  `fltFCFTugboatDelayFee` float DEFAULT NULL,
  `fltFCFViolationFee` float DEFAULT NULL,
  `fltFCFConsigneeLateFee` float DEFAULT NULL,
  `fltFCFMinDamageFee` float DEFAULT NULL,
  `fltFCFMaxDamageFee` float DEFAULT NULL,
  `intFCFDiscountFee` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfinalcontractfeesmatrix`
--

INSERT INTO `tblfinalcontractfeesmatrix` (`intFinalContractFeesID`, `intFCFContractListID`, `enumFCFServiceType`, `fltFCFStandardRate`, `fltFCFTugboatDelayFee`, `fltFCFViolationFee`, `fltFCFConsigneeLateFee`, `fltFCFMinDamageFee`, `fltFCFMaxDamageFee`, `intFCFDiscountFee`) VALUES
(1, 1, 'Hauling', 2000, 1000, 1000, 1000, 3000, 5000, 20),
(2, 1, 'Tug Assist', 1000, 2000, 2000, 1000, 2000, 4000, 20),
(3, 2, 'Hauling', 2000, 1000, 1000, 1000, 3000, 5000, 1),
(4, 2, 'Tug Assist', 1000, 2000, 2000, 1000, 2000, 4000, 1),
(5, 3, 'Hauling', 2000, 1000, 1000, 1000, 3000, 5000, 20),
(6, 3, 'Tug Assist', 1000, 2000, 2000, 1000, 2000, 4000, 20),
(7, 6, 'Hauling', 2000, 1000, 1000, 1000, 3000, 5000, 10),
(8, 6, 'Tug Assist', 2000, 2000, 2000, 1000, 2000, 4000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tblgoods`
--

CREATE TABLE `tblgoods` (
  `intGoodsID` int(11) NOT NULL,
  `strGoodsName` varchar(45) DEFAULT NULL,
  `fltRateperTon` float DEFAULT NULL,
  `fltGoodWeight` float DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tblhauling` (
  `intHaulingID` int(11) NOT NULL,
  `intHJobSchedID` int(11) DEFAULT NULL,
  `intHLocationID` int(11) DEFAULT NULL,
  `intHServicesID` int(11) DEFAULT NULL,
  `intHAttachmentsID` int(11) DEFAULT NULL,
  `strHaulingDesc` varchar(45) DEFAULT NULL,
  `strDestinationPoint` varchar(45) DEFAULT NULL,
  `enumStatus` enum('Ongoing','Finished','Cancelled') DEFAULT NULL,
  `strPermitsAttachments` varchar(45) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `intInvoiceID` int(11) NOT NULL,
  `intIDispatchTicketID` int(11) DEFAULT NULL,
  `intDTCompanyID` int(11) DEFAULT NULL,
  `intIBillID` int(11) NOT NULL,
  `enumStatus` enum('Processing','Paid','Rejected','Pending') NOT NULL,
  `strInvoiceDesc` varchar(45) DEFAULT NULL,
  `fltBalanceRemain` float DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`intInvoiceID`, `intIDispatchTicketID`, `intDTCompanyID`, `intIBillID`, `enumStatus`, `strInvoiceDesc`, `fltBalanceRemain`, `boolDeleted`) VALUES
(1, 6, 3, 1, 'Processing', 'processed', 53800, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbljoborder`
--

CREATE TABLE `tbljoborder` (
  `intJobOrderID` int(11) NOT NULL,
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
  `strRemarks` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbljoborder`
--

INSERT INTO `tbljoborder` (`intJobOrderID`, `strJOTitle`, `strJODesc`, `intJOBerthID`, `strJOStartPoint`, `strJODestination`, `intJOBargeID`, `intJOGoodsID`, `intJOCompanyID`, `intJOttachmentsID`, `strJOVesselName`, `dtmETA`, `dtmETD`, `enumStatus`, `fltWeight`, `intJOVesselTypeID`, `enumServiceType`, `datStartDate`, `datEndDate`, `tmStart`, `tmEnd`, `boolDeleted`, `created_at`, `updated_at`, `strRemarks`) VALUES
(1, 'Donn JO', NULL, 3, 'Sta. Mesa, Manila', NULL, NULL, 2, 3, NULL, 'MT Alejandro', NULL, NULL, '', 300, NULL, 'Hauling', '2018-10-26', '2018-10-27', '08:00:00', '10:00:00', 0, '2018-10-26 23:06:05', '2018-10-26 23:06:05', NULL),
(2, 'Homie JO', 'nye', 1, '', 'Pandacan Manila', NULL, 1, 3, NULL, 'MT Buko', NULL, NULL, 'Ongoing', 500, NULL, 'Hauling', '2018-10-26', '2018-10-27', '15:00:00', '06:00:00', 0, '2018-10-26 23:08:07', '2018-10-26 23:08:07', NULL),
(4, 'Testing JO', 'Testing mo to', 5, 'asd', NULL, NULL, NULL, 3, NULL, 'MT Everest', NULL, NULL, '', 17, 2, 'Hauling', '2018-10-29', '2018-10-29', '03:15:00', '10:15:00', 0, '2018-10-26 23:18:06', '2018-10-26 23:18:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbljoborderforwardrequests`
--

CREATE TABLE `tbljoborderforwardrequests` (
  `intJOForwardRequestsID` int(11) NOT NULL,
  `intJOFRJobOrderID` int(11) DEFAULT NULL,
  `intJOFRForwardCompanyID` int(11) DEFAULT NULL,
  `strJOFRDescription` text,
  `strRequestCompanyName` varchar(45) DEFAULT NULL,
  `enumStatus` enum('Pending','Accepted','Scheduled','Ready','Ready To Haul','Declined') DEFAULT 'Pending',
  `boolDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbljobsched`
--

CREATE TABLE `tbljobsched` (
  `intJobSchedID` int(11) NOT NULL,
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
  `strJSCompanyAssigned` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbljobsched`
--

INSERT INTO `tbljobsched` (`intJobSchedID`, `intJSJobOrderID`, `intJSSchedID`, `intJSTugboatAssignID`, `intJSTugboatID`, `intJSTeamID`, `enumStatus`, `tmStarted`, `tmEnded`, `dateStarted`, `dateEnded`, `boolDeleted`, `intJSDispatchTicketID`, `strJSCompanyAssigned`) VALUES
(1, 1, 1, 2, 2, 8, 'Finished', '08:37:00', '09:03:00', '2018-10-27', '2018-10-27', 0, 7, NULL),
(2, 4, 2, 2, 2, 4, 'Finished', '08:26:00', '17:29:00', '2018-10-28', '2018-10-29', 0, 6, NULL),
(3, 4, 2, 4, 4, 1, 'Finished', '08:26:00', '17:29:00', '2018-10-28', '2018-10-29', 0, 6, NULL),
(4, 2, 3, 5, 5, NULL, 'Ongoing', '08:48:00', NULL, '2018-10-27', NULL, 0, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation`
--

CREATE TABLE `tbllocation` (
  `intLocationID` int(11) NOT NULL,
  `intLDispatchTicketID` int(11) DEFAULT NULL,
  `strLocationDesc` text,
  `strLocation` varchar(45) DEFAULT NULL,
  `tmLocationTime` time DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbllocation`
--

INSERT INTO `tbllocation` (`intLocationID`, `intLDispatchTicketID`, `strLocationDesc`, `strLocation`, `tmLocationTime`, `boolDeleted`) VALUES
(3, 1, 'Waiting For Vessel to Enter the Bay', 'Manila Bay, Break Waters', '10:36:00', NULL),
(4, 1, 'Arriving to Pier 15', 'Inside South Harbor', '10:37:00', NULL),
(5, 2, 'asd', 'AAS', '06:14:00', NULL),
(6, 3, 'qwer', 'qwer', '09:26:00', NULL),
(7, 5, 'Waiting for Vessel to enter the bay', 'Manila Bay Break Waters', '15:52:00', NULL),
(8, 6, NULL, 'Manila', '08:27:00', NULL),
(9, 6, 'asd', 'Here at seashore atm', '17:29:00', NULL),
(10, 7, 'sample', 'Location 1', '08:37:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblothersteamcomp`
--

CREATE TABLE `tblothersteamcomp` (
  `intOTeamCompID` int(11) NOT NULL,
  `intOTeamCompPositionID` int(11) DEFAULT NULL,
  `intOTCTeamCompID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `intPaymentID` int(11) NOT NULL,
  `intPCompanyID` int(11) DEFAULT NULL,
  `enumPaymentType` enum('Cash','Cheque','Bank Deposit') DEFAULT NULL,
  `strPaymentDesc` varchar(45) DEFAULT NULL,
  `strBankName` varchar(45) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblpier`
--

CREATE TABLE `tblpier` (
  `intPierID` int(11) NOT NULL,
  `strPierName` varchar(45) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tblpierhistory` (
  `intPierHistoryID` int(11) NOT NULL,
  `strPHPierName` varchar(45) DEFAULT NULL,
  `intPHPierID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblposition`
--

CREATE TABLE `tblposition` (
  `intPositionID` int(11) NOT NULL,
  `strPositionName` varchar(45) DEFAULT NULL,
  `intPCompanyID` int(11) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) DEFAULT '0',
  `intPositionCompNum` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblposition`
--

INSERT INTO `tblposition` (`intPositionID`, `strPositionName`, `intPCompanyID`, `isActive`, `boolDeleted`, `intPositionCompNum`) VALUES
(1, 'Captain', 1, 1, 0, 1),
(2, 'Chief Engineer', 1, 1, 0, 1),
(3, 'Crew', 1, 1, 0, 2),
(4, 'First Mate', 1, 1, 0, 1),
(5, 'Second Mate', 1, 1, 0, 0),
(6, 'Captain', 2, 1, 0, 1),
(7, 'Chief Engineer', 2, 1, 0, 1),
(8, 'Crew', 2, 1, 0, 2),
(9, 'First Mate', 2, 1, 0, 0),
(10, 'Second Mate', 2, 1, 0, 0),
(11, 'Marine Engineer', 2, 1, 0, 0),
(12, 'Chief Marine Engineer', 1, 1, 0, 0),
(13, 'Marine Engineer', 1, 1, 0, 0),
(14, 'Third Mate', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpostbillingticket`
--

CREATE TABLE `tblpostbillingticket` (
  `intPostBillingTicketID` int(11) NOT NULL,
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
  `boolDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblquotation`
--

CREATE TABLE `tblquotation` (
  `intQuotationID` int(11) NOT NULL,
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
  `enumServiceType` enum('Hauling','Tug Assist') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblquotation`
--

INSERT INTO `tblquotation` (`intQuotationID`, `strQuotationTitle`, `strQuotationDesc`, `intQContractListID`, `isAssigned`, `fltQuotationTDelayFee`, `fltQuotationViolationFee`, `fltQuotationConsigneeLateFee`, `fltMinDamageFee`, `fltMaxDamageFee`, `intDiscount`, `fltStandardRate`, `boolDeleted`, `enumServiceType`) VALUES
(1, NULL, NULL, 1, 0, 1000, 1000, 1000, 3000, 5000, 20, 2000, 0, 'Hauling'),
(2, NULL, NULL, 1, 0, 2000, 2000, 1000, 2000, 4000, 20, 1000, 0, 'Tug Assist'),
(3, NULL, NULL, 2, 0, 1000, 1000, 1000, 3000, 5000, 1, 2000, 0, 'Hauling'),
(4, NULL, NULL, 2, 0, 2000, 2000, 1000, 2000, 4000, 1, 1000, 0, 'Tug Assist'),
(5, NULL, NULL, 3, 0, 1000, 1000, 1000, 3000, 5000, 20, 2000, 0, 'Hauling'),
(6, NULL, NULL, 3, 0, 2000, 2000, 1000, 2000, 4000, 20, 1000, 0, 'Tug Assist'),
(7, NULL, NULL, 4, 0, 1000, 1000, 1000, 3000, 5000, 1, 2000, 0, 'Hauling'),
(8, NULL, NULL, 4, 0, 2000, 2000, 1000, 2000, 4000, 1, 1000, 0, 'Tug Assist'),
(9, NULL, NULL, 6, 0, 1000, 1000, 1000, 3000, 5000, 10, 2000, 0, 'Hauling'),
(10, NULL, NULL, 6, 0, 2000, 2000, 1000, 2000, 4000, 10, 2000, 0, 'Tug Assist');

-- --------------------------------------------------------

--
-- Table structure for table `tblquotationhistory`
--

CREATE TABLE `tblquotationhistory` (
  `intQuotationHistoryID` int(11) NOT NULL,
  `fltQHStandardRate` float NOT NULL,
  `fltQHTugboatDelayFee` float NOT NULL,
  `fltQHViolationFee` float NOT NULL,
  `fltQHConsigneeLateFee` float NOT NULL,
  `fltQHMinDamageFee` float NOT NULL,
  `fltQHMaxDamageFee` float NOT NULL,
  `intQHDiscount` int(11) NOT NULL,
  `intQHQuotationID` int(11) NOT NULL,
  `strChangesAuthor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblquotationshistory`
--

CREATE TABLE `tblquotationshistory` (
  `intQuotationHistoryID` int(11) NOT NULL,
  `fltQHStandardRate` float DEFAULT NULL,
  `fltQHTugboatDelayFee` float DEFAULT NULL,
  `fltQHViolationFee` float DEFAULT NULL,
  `fltQHConsigneeLateFee` float DEFAULT NULL,
  `fltQHMinDamageFee` float DEFAULT NULL,
  `fltQHMaxDamageFee` float DEFAULT NULL,
  `intQHDiscount` tinyint(3) DEFAULT NULL,
  `intQHQuotationID` int(11) DEFAULT NULL,
  `strChangesAuthor` text,
  `enumQHServiceType` enum('Tug Assist','Hauling') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblrequest`
--

CREATE TABLE `tblrequest` (
  `intRequestID` int(11) NOT NULL,
  `strRequestDescription` text,
  `enumRequestType` enum('Forward Joborder','Request Team','Request Tugboat') CHARACTER SET latin1 DEFAULT NULL,
  `intRJobOrderID` int(11) DEFAULT NULL,
  `intRCompanyID` int(11) DEFAULT NULL,
  `intRForwardCompanyID` int(11) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `enumRequestStatus` enum('Pending','Accepted','Declined') CHARACTER SET latin1 DEFAULT 'Pending',
  `boolDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tblschedule` (
  `intScheduleID` int(11) NOT NULL,
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
  `tmStart` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblschedule`
--

INSERT INTO `tblschedule` (`intScheduleID`, `strScheduleDesc`, `dttmETA`, `dttmETD`, `strColor`, `boolDeleted`, `datScheduleDate`, `intScheduleCompanyID`, `dateStart`, `dateEnd`, `tmEnd`, `tmStart`) VALUES
(1, 'Donn JO', NULL, NULL, NULL, 0, NULL, 1, '2018-10-26', '2018-10-27', '10:00:00', '08:00:00'),
(2, 'Testing JO', NULL, NULL, NULL, 0, NULL, 1, '2018-10-29', '2018-10-29', '10:15:00', '03:15:00'),
(3, 'Homie JO', NULL, NULL, NULL, 0, NULL, 1, '2018-10-26', '2018-10-27', '06:00:00', '15:00:00'),
(4, 'Ben JO', NULL, NULL, NULL, 0, NULL, 1, '2018-10-26', '2018-10-27', '19:00:00', '15:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `intServicesID` int(11) NOT NULL,
  `strServicesName` varchar(45) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tblteam` (
  `intTeamID` int(11) NOT NULL,
  `strTeamName` varchar(45) DEFAULT NULL,
  `intTCompanyID` int(11) DEFAULT NULL,
  `intTForwardCompanyID` int(11) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  `enumStatus` enum('Available','Assigned','Forwarded') DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblteam`
--

INSERT INTO `tblteam` (`intTeamID`, `strTeamName`, `intTCompanyID`, `intTForwardCompanyID`, `boolDeleted`, `enumStatus`) VALUES
(1, 'Team Energy Master', 1, NULL, 0, 'Available'),
(2, 'Team Energy Venus', 1, NULL, 0, 'Available'),
(3, 'Team Tugmaster Aleli', 2, 1, 0, 'Available'),
(4, 'Team Energy Pacific', 1, NULL, 0, 'Available'),
(5, 'Team Tugmaster Don Leon', 2, NULL, 0, 'Available'),
(6, 'Team Energy Andromeda', 1, NULL, 0, 'Available'),
(7, 'Team Energy Virgo', 1, NULL, 0, 'Available'),
(8, 'Team Tugmaster Oliver', 2, NULL, 0, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tblteamcomp`
--

CREATE TABLE `tblteamcomp` (
  `intTeamCompositionID` int(11) NOT NULL,
  `intTCCaptainNumber` int(11) DEFAULT '1',
  `intTCChiefEngineerNumber` int(11) DEFAULT '1',
  `intTCCrewNumber` int(11) DEFAULT '2',
  `intTCOthersNumber` int(11) DEFAULT '0',
  `intTCCompanyID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbltermscondition`
--

CREATE TABLE `tbltermscondition` (
  `intTermsConditionID` int(11) NOT NULL,
  `strTermsConditionTitle` varchar(45) NOT NULL,
  `strTermsConditionDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltermscondition`
--

INSERT INTO `tbltermscondition` (`intTermsConditionID`, `strTermsConditionTitle`, `strTermsConditionDesc`) VALUES
(1, '<h4>Terms and Condition </h4>', '<p><br></p><p>All shipments to or from the Customer, which term shall include the exporter, importer, sender, receiver, owner, consignor, consignee, transferor or transferee of the shipments, will be handled by Unitrans Worldwide, Inc, herein called the “Company”) on the following terms and conditions:</p><p>•1.&nbsp;<span style=\"font-weight: bolder;\">Services by Third Parties</span>. Unless the Company carries, stores or otherwise physically handles the shipment, and loss, damage, expense or delay occurs during such activity, the Company assumes no liability as a carrier and is not to be held responsible for any loss, damage, expense or delay to the goods to be forwarded or imported except as provided in paragraph 8 and subject to the limitations of paragraph 9 below, but undertakes only to use reasonable care in the selection of carriers, truck men, lightermen, forwarders, customs brokers, agents, warehousemen and others to whom it may entrust the goods for transportation, cartage, handling and/or delivery and/or storage or otherwise. When the company carries, stores or otherwise physically handles the shipment, it does so subject to the limitation of liability set forth in paragraph 8 below unless a separate bill of lading, air waybill or other contract of carriage is issued by the Company, in which event the terms thereof shall govern.</p><p>•2.&nbsp;<span style=\"font-weight: bolder;\">Liability Limitations of Third Parties</span>. The Company is authorized to select and engage carriers, truck men, lightermen, forwarders, customs brokers, agents, warehousemen and others, as required, to transport, store, deal with and deliver the goods, all of whom shall be considered as the agents of the Customer, and the goods may be entrusted to such agencies subject to all conditions as to limitation of liability for loss, damage, expense or delay and to all rules, regulations, requirements and conditions, whether printed, written or stamped, appearing in bills of lading, receipts or tariffs issued by such carriers, truck men, lightermen, forwarders, customs brokers, agents, warehousemen and others. The Company shall under no circumstances be liable for any loss, damage, expense or delay to the goods for any reason whatsoever when said goods are in custody, possession or control of third parties selected by the Company to forward, enter and clear, transport or render other services with respect to such goods.</p><p>•3.&nbsp;<span style=\"font-weight: bolder;\">Choosing Routes or Agents</span>. Unless express instructions in writing are received from the Customer, the Company has complete freedom in choosing the means, route and procedure to be followed in the handling, transportation and delivery of the goods. Advice by the Company to the Customer that a particular person or firm has been selected to render services with respect to the goods shall not be construed to mean that the Company warrants or represents that such person or firm will render such services.</p><p>•4.&nbsp;<span style=\"font-weight: bolder;\">Quotations Not Binding</span>. Quotations as to fees, rates of duty, freight charges, insurance premiums or other charges given by the Company to the Customer are for informational purposes only and are subject to change without notice and shall not under any circumstances be binding upon the Company unless the Company in writing specifically undertakes the handling or transportation of the shipment at a specific rate.</p><p>•5.&nbsp;<span style=\"font-weight: bolder;\">Duty to Furnish Information</span>.</p><p>(<span style=\"font-weight: bolder;\">a</span>) On an import at a reasonable time prior to entering of the goods for U.S. Customs, the Customer shall furnish to the Company invoices in proper form and other documents necessary or useful in the preparation of the U. S. Customs entry and, also, such further information as may be sufficient to establish, inter alia, the dutiable value, the classification, the country of origin, the genuineness of the merchandise and any mark or symbol associated with it, the Customer’s right to import and/or distribute the merchandise, and the merchandise’s admissibility, pursuant to U. S. law or regulation. If the Customer fails in a timely manner to furnish such information or documents, in whole or in part, as may be required to complete U. S. Customs entry or comply with U.S. laws or regulations, or if the information or documents furnished are inaccurate or incomplete, the Company shall be obligated only to use its best judgment in connection with the shipment and in no instance shall be charged with knowledge by the Customer of the true circumstances to which such inaccurate, incomplete, or omitted information or document pertains. Where a bond is required by U.S. Customs to be given for the production of any document or the performance of any act, the Customer shall be deemed bound by the terms of the bond notwithstanding the fact that the bond has been executed by the Company as principal, it being understood that the Company entered into such undertaking at the instance and on behalf of the Customer, and the Customer shall indemnify and hold the Company harmless for the consequences of any breach of the terms of the bond.</p><p>(<span style=\"font-weight: bolder;\">b</span>) On an export at a reasonable time prior to the exportation of the shipment the Customer shall furnish to the Company the commercial invoice in proper form and number, a proper consular declaration, weights, measures, values and other information in the language of and as may be required by the laws and regulations of U. S. and the country of destination of the goods.</p><p>(<span style=\"font-weight: bolder;\">c</span>) On an export or import the Company shall not in any way be responsible or liable for increased duty, penalty, fine or expense unless caused by the negligence or other fault of the Company, in which event its liability to the Customer shall be governed by the provisions of paragraphs 8-10 below. The Customer shall be bound by and warrant the accuracy of all invoices, documents and information furnished to the Company by the Customer or its agent for export, entry or other purposes and the Customer agrees to indemnify and hold harmless the Company against any increased duty, penalty, fine or expense including attorneys’ fees, resulting from any inaccuracy, incomplete statement, omission or any failure to make timely presentation, even if not due to any negligence of the Customer.</p><p>•6.&nbsp;<span style=\"font-weight: bolder;\">Declaring Higher Valuation</span>. Inasmuch as truckers, carriers, warehousemen and others to whom the goods are entrusted usually limit their liability for loss or damage unless a higher value is declared and a charge based on such higher value is agreed to by said truckers, etc., the Company must receive specific written instructions from the Customer to pay such higher charge based on valuation and the trucker, etc. must accept such higher declared value; otherwise the valuation placed by the Customer on the goods shall be considered solely for export or customs purposes and the goods will be delivered to the truckers, etc. subject to the limitation of liability set forth herein in paragraphs 8-10 below with respect to any claim against the Company and subject to the provisions of paragraph 2 above.</p><p>7.&nbsp;<span style=\"font-weight: bolder;\">Insurance</span>. The Company will make reasonable efforts to effect marine, fire, theft and other insurance upon the goods only after specific written instructions have been received by the Company in sufficient time prior to shipment from point of origin, and the Customer at the same time states specifically the kind and amount of insurance to be placed. The Company does not undertake or warrant that such insurance can or will be placed. Unless the Customer has its own open marine policy and instructs the Company to effect insurance under such policy, insurance is to be effected with one or more insurance companies or other underwriters to be selected by the Company. Any insurance placed shall be governed by the certificate or policy issued and will only be effective when accepted by such insurance companies or underwriters. Should an insurer dispute its liability for any reason, the insured shall have recourse against the insurer only and the Company shall not be under any responsibility or liability in relation thereto, notwithstanding that the premium upon the policy may not be at the same rates as that charged or paid to the Company by the Customer, or that the shipment was insured under a policy in the name of the Company. Insurance premiums and the charge of the Company for arranging the same shall be at the Customer’s expense. If for any reason the goods are held in warehouse, or elsewhere, the same will not be covered by any insurance, unless the Company receives written instructions from the Customer. Unless specifically agreed in writing, the Company assumes no responsibility to effect insurance on any export or import shipment which it does not handle.</p><p>•8.&nbsp;<span style=\"font-weight: bolder;\">Limitation of Liability for Loss, etc</span>.</p><p>(<span style=\"font-weight: bolder;\">a</span>) The Customer agrees that the Company shall only be liable for any loss, damage expense or delay to the goods resulting from the negligence or other fault of the Company; such liability shall be limited to an amount equal to the lesser of fifty dollars ($50.00) per entry or shipment or the fee(s) charged for services, provided that, in the case of partial loss, such amount will be adjusted, pro rata;</p><p>(<span style=\"font-weight: bolder;\">b</span>) Where the Company issues its own bill of lading and receives freight charges as its compensation, Customer has the option of paying a special compensation and increasing the limit of Company’s liability up to the shipment’s actual value; however, such option must be exercised by written agreement, entered into prior to any covered transaction(s),setting forth the limit of the Company’s liability and the compensation received;</p><p>(<span style=\"font-weight: bolder;\">c</span>) In instances other than in (b) above, unless the Customer makes specific written arrangements with the Company to pay special compensation and declare a higher value and Company agrees in writing, liability is limited to the amount set forth in (a) above;</p><p>(<span style=\"font-weight: bolder;\">d</span>) Customer agrees that the Company shall, in no event, be liable for consequential, punitive, statutory or special damages in excess of the monetary limit provided for above.</p><p>•9.&nbsp;<span style=\"font-weight: bolder;\">Presenting Claims</span>. Company shall not be liable under paragraph 8 for any claims not presented to it in writing within 90 days of either the date of loss or incident giving rise to the claim; no suit to recover for any claim or demand here under shall be maintained against the Company unless instituted within six (6) months after the presentation of the said claim or such longer period provided for under statute(s) of the State having jurisdiction of the matter.</p><p>•10.&nbsp;<span style=\"font-weight: bolder;\">Advancing Money</span>. The Company shall not be obliged to incur any expense, guarantee payment or advance any money in connection with the importing, forwarding, transporting, insuring, storing or coopering of the goods, unless the same is previously provided to the Company by the Customer on demand. The Company shall be under no obligation to advance freight charges, customs duties or taxes on any shipment, nor shall any advance by the Company be construed as a waiver of the provisions hereof.</p><p>•11.<span style=\"font-weight: bolder;\">&nbsp;Indemnification for Freight, Duties</span>. In the event that a carrier, other person or any governmental agency makes a claim or institutes legal action against the company for ocean or other freight, duties, fines, penalties, liquidated damages or other money due rising from a shipment of goods of the Customer, the Customer agrees to indemnify and hold harmless the Company for any amount the Company may be required to pay such carrier, other person or governmental agency together with reasonable expenses, including attorneys’ fees, incurred by the Company in connection with defending such claim or legal action and obtaining reimbursement from the Customer. The confiscation or detention of the goods by any governmental authority shall not affect or diminish the liability of the Customer to the Company to pay all charges or other money due promptly on demand.</p><p>•12.&nbsp;<span style=\"font-weight: bolder;\">C.O.D. Shipments</span>. Goods received with Customer’s or other person’s instructions to “Collect on Delivery” (C.O.D.) by drafts or otherwise, or to collect on any specified terms by time drafts or otherwise, are accepted by the Company only upon the express understanding that it will exercise reasonable care in the selection of a bank, correspondent, carrier or agent to whom it will send such item for collection, and the Company will not be responsible for any act, omission, default, suspension, insolvency or want of care, negligence, or fault of such bank, correspondent, carrier or agent, nor for any delay in remittance lost in exchange, or during transmission, or while in the course of collection.</p><p>•13.&nbsp;<span style=\"font-weight: bolder;\">General Lien on Any Property</span>. The Company shall have a general lien on any and all property (and documents relating thereto) of the customer, in its possession, custody or control or en route, for all claims for charges, expenses or advances incurred by the Company in connection with any shipments of the Customer and if such claim remains unsatisfied for thirty (30) days after demand for its payment is made, the Company may sell at public auction or private sale, upon ten (10) days written notice, registered mail(R.R.R.), to the Customer, the goods, wares and/or merchandise, or so much thereof as may be necessary to satisfy such lien, and apply the net proceeds of such sale to the payment of the amount due to the Company. Any surplus from such sale shall be transmitted to the Customer, and the Customer shall be liable for any deficiency in the sale.</p><p>•14.&nbsp;<span style=\"font-weight: bolder;\">Compensation of Company</span>. The compensation of the Company for its services shall be included with and is in addition to the rates and charges of all carriers and other agencies selected by the Company to transport and deal with the goods and such compensation shall be exclusive of any brokerage, commissions, dividends or other revenue received by the Company from carriers, insurers and others in connection with the shipment. On ocean exports, upon request, the Company shall provide a detailed breakout of the components of all charges assessed and a true copy of each pertinent document relating to these charges. In any referral for collection or action against the Customer for monies due the Company, upon recovery by the Company, the Customer shall pay the expenses of collection and/or litigation, including a reasonable attorney fee.</p><p>•15.&nbsp;<span style=\"font-weight: bolder;\">No Responsibility for Governmental Requirements</span>. It is the responsibility of the Customer to know and comply with the marking requirements of the U. S. Customs Service, the regulations of the U. S. Food and Drug Administration, and all other requirements, including regulations of Federal, state and/or local agencies pertaining to the merchandise. The Company shall not be responsible for action taken or fines or penalties assessed by any governmental agency against the shipment because of the failure of the Customer to comply with the law or the requirements or regulations of any governmental agency or with a notification issued to the Customer by any such agency.</p><p>•16.&nbsp;<span style=\"font-weight: bolder;\">Indemnity Against Liability Arising from the Importation of Merchandise</span>. The Customer agrees to indemnify and hold the Company harmless from any claims and/or liability arising from the importation of merchandise which violates any Federal, state and/or other laws or regulations and further agrees to indemnify and hold the Company harmless against any and all liability, loss, damages, costs, claims and/or expenses, including but not limited to attorney’s fees, which the Company may hereafter incur, suffer or be required to pay by reason of claims by any government agency or private party. In the event that any action, suit or proceeding is brought against the Company by any government agency or any private party, the Company shall give notice in writing to the Customer by mail at its address on file with the Company. Upon receipt of such notice, the Customer at its own expense shall defend against such action and take all steps as may be necessary or proper to prevent the obtaining of a judgment and/or order against the Company.</p><p>•17.&nbsp;<span style=\"font-weight: bolder;\">Loss, Damage or Expense Due to Delay</span>. Unless the services to be performed by the Company on behalf of the Customer are delayed by reason of the negligence or other fault of the Company, the Company shall not be responsible for any loss, damage or expense incurred by the Customer because of such delay. In the event the Company is at fault, as aforesaid, itsaa liability is limited in accordance with the provisions of paragraphs 8-9 above.</p><p>18.<span style=\"font-weight: bolder;\">&nbsp;Construction of Terms and Venue</span>. The foregoing terms and conditions shall be construed according to the laws of the State shown on the reverse side hereof. Unless otherwise consented to in writing by the Company, no legal proceeding against the Company may be instituted by the Customer, its assigns, or subrogee except in the City shown on the reverse side</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbltugboat`
--

CREATE TABLE `tbltugboat` (
  `intTugboatID` int(11) NOT NULL,
  `intTTugboatMainID` int(11) DEFAULT NULL,
  `intTTugboatSpecsID` int(11) DEFAULT NULL,
  `intTTugboatClassID` int(11) DEFAULT NULL,
  `intTCompanyID` int(11) DEFAULT NULL,
  `intForwardCompanyID` int(11) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  `enumTStatus` enum('Working','Under Repair') DEFAULT 'Working'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbltugboatassign` (
  `intTAssignID` int(11) NOT NULL,
  `intTATugboatID` int(11) DEFAULT NULL,
  `intTATeamID` int(11) DEFAULT NULL,
  `strTADesc` varchar(45) DEFAULT NULL,
  `intTACompanyID` int(11) DEFAULT NULL,
  `intTAForwardCompanyID` int(11) DEFAULT NULL,
  `enumStatus` enum('Available','Occupied') DEFAULT 'Available',
  `boolDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbltugboatclass` (
  `intTugboatClassID` int(11) NOT NULL,
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
  `boolDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbltugboatequip` (
  `intTugboatEquipmentID` int(11) NOT NULL,
  `strTugboatEquipmentDesc` int(11) DEFAULT NULL,
  `intTETugboatID` int(11) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbltugboatinsurance`
--

CREATE TABLE `tbltugboatinsurance` (
  `intTugboatInsuranceID` int(11) NOT NULL,
  `strTugboatInsuranceDesc` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `intTITugboatID` int(11) DEFAULT NULL,
  `boolDeleted` varchar(45) CHARACTER SET latin1 DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbltugboatmain` (
  `intTugboatMainID` int(11) NOT NULL,
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
  `boolDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbltugboatmatrix` (
  `intTugboatMatrixID` int(11) NOT NULL,
  `fltTMMinRange` float DEFAULT NULL,
  `fltTMMaxRange` float DEFAULT NULL,
  `intTMNumberofTugs` tinyint(1) DEFAULT NULL,
  `fltTMCapacityHorsePower` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbltugboatspecs`
--

CREATE TABLE `tbltugboatspecs` (
  `intTugboatSpecsID` int(11) NOT NULL,
  `strHullMaterial` varchar(45) DEFAULT NULL,
  `strBuilder` varchar(45) DEFAULT NULL,
  `strMakerPower` varchar(45) DEFAULT NULL,
  `strDrive` varchar(45) DEFAULT NULL,
  `strCylinderperCycle` varchar(45) DEFAULT NULL,
  `strAuxEngine` varchar(45) DEFAULT NULL,
  `strLocationBuilt` varchar(70) DEFAULT NULL,
  `datBuiltDate` date DEFAULT NULL,
  `enumAISGPSVHFRadar` enum('Yes','No') DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbltugboattype` (
  `intTugboatTypeID` int(11) NOT NULL,
  `strTugboatTypeName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `boolDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tblvessel` (
  `intVesselID` int(11) NOT NULL,
  `intVGoodsID` int(11) DEFAULT NULL,
  `strVesselName` varchar(45) DEFAULT NULL,
  `strVesselDesc` varchar(45) DEFAULT NULL,
  `fltVesselWeight` float DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblvesseltype`
--

CREATE TABLE `tblvesseltype` (
  `intVesselTypeID` int(11) NOT NULL,
  `strVesselTypeName` varchar(45) DEFAULT NULL,
  `boolDeleted` tinyint(1) DEFAULT '0',
  `isActive` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `intUCompanyID`, `remember_token`, `created_at`, `updated_at`, `enumUserType`, `isVerified`, `isActive`, `boolDeleted`, `token`) VALUES
(1, 'HEMSI', 'hienergymarineservices@gmail.com', '$2y$10$EPf6MLFuhVXXVji1gE.vnONc2PdnoHSEkJ1H8wIPJcLbz2CE6.4de', 1, 'uXV6Ri4KZ9GY8shtLiVKwqBa3a8I8fTtNbe5iEvAZWqDXlMYziKFsKRm1OSS', '2018-08-26 21:39:55', '2018-08-27 02:50:40', 'Admin', 0, 1, 0, NULL),
(2, 'Tugmasters', 'tugmaster@gmail.com', '$2y$10$uGDjz7KPIoaX5jCw/NN9NOC7AdruGebYbIYuIRn1xuSvss8vwA0l.', 2, 'niIPsGagSNPbRO0Pn1yj5LFRgNQr5tJrsovmokSFLtPDZT0aWWVqorrFEI4D', '2018-08-26 21:43:36', '2018-08-26 21:43:36', 'Affiliates', 0, 1, 0, NULL),
(3, 'Black Pink', 'blackpinkyg@gmail.com', '$2y$10$QeUnO0ypzktouf/19X6k3OEJkQ7iryv2Q24xrv7F1v.ohyQyLoYRW', 3, 'FEtunl9jBrQkbRn9lXqVPhkpYvnI3TmmnMNLTiqxd8KvYn72sHwwvXGRzX4w', '2018-08-26 22:08:35', '2018-09-30 22:38:43', 'Consignee', 0, 1, 0, NULL),
(4, 'TWICE', 'twicejype@gmail.com', '$2y$10$7pFLHptgmpu00ZO534rUE.UVQkVp9Vq.cFfPhzGt9REt4lmrOVTAy', 4, 'eF2aWBHWjDL7i3xgaWEpQWQyAluvtEUUz8GYp2ZvF7krNgIpODBijGCs23zR', '2018-08-27 02:46:55', '2018-10-12 11:15:07', 'Consignee', 0, 1, 0, NULL),
(5, 'TWICE', 'twicesujype@gmail.com', '$2y$10$q9nlpjUEfEOKVgzmMAuVJeTx4XbYvGBpKth22ZaVlXKnjJRS0gVie', 5, 'xJVLr2FlnEoZUsPTwne6RjTEhF7tJ6Tff607ubCuxhMUuum0tm4x4fRvmt2Y', '2018-08-27 02:47:56', '2018-10-12 11:15:10', 'Consignee', 0, 1, 0, NULL),
(6, 'Isaac Tailoring Shop', 'isaac@gmail.com', '$2y$10$j8z4HECOGsHqXiBa1J5EueWk/e9PNIapA4TRrKvpPL9I46AelTNRK', 6, '7ZN2sDcHi2QHVevs0Z993JvhTusfB3Of3YC7qZD3dMOzmOsmZIfRZJ7eu4Sr', '2018-08-27 04:41:35', '2018-08-27 05:47:58', 'Consignee', 0, 1, 0, NULL),
(7, 'Eyenet Training', 'marinaslevie@gmail.com', '$2y$10$YIo5rGen4jkUMlrUxbaaNed78mN92q7bg2r8IcOBE32k.PqacvEHm', 7, 'Pw5GitIwNMTJBRlaRUvXmm5wGkmgopnFKw7se6IeXpJXqF8ZZjrytOipYjDk', '2018-08-27 06:16:04', '2018-08-27 17:49:55', 'Consignee', 0, 1, 0, NULL),
(13, 'akari', 'akari@gmail.com', '$2y$10$EPf6MLFuhVXXVji1gE.vnONc2PdnoHSEkJ1H8wIPJcLbz2CE6.4de', 8, '7HZA8yZ5BCrUja1oNHsplXQLCBsPLxBTbS91ktVHR6sIKsKpY7XNeeteyBXy', '2018-08-27 20:45:30', '2018-08-27 20:46:38', 'Consignee', 0, 1, 0, NULL),
(14, 'Timba', 'Timba@gmail.com', '$2y$10$WhBrPXcF/tQBMhnhlcGA7eN8GDNym8AUpIO6J9AfqfY/KQabVXAoW', 9, 'pNZhkUy5qsREel823qsLLJnPBmQD9l8gAsqsennPW7E5ilfIQuehIMS0dTDa', '2018-08-27 22:56:57', '2018-08-27 22:57:19', 'Consignee', 0, 1, 0, NULL),
(15, 'cmrecto', 'cmrecto@gmail.com', '$2y$10$j4tDnh2dRkk5wfEotn0hkuNuoQQUAfJNkgwLU.P0m.OMfUX9u.uqG', 10, '9RmJ20YflA7dFB4e13zMdRoBvQSXbqIFEueh0oiywVaZgbBBg6qLoMdb3QrF', '2018-09-30 22:35:51', '2018-09-30 22:38:36', 'Consignee', 0, 1, 0, NULL),
(21, 'Emmanuel', 'reignshirley@gmail.com', '$2y$10$fUgf2R6iPpOmaB6v5b3WseMU69oCxUkDth./.dro4.YPBRePLbYQa', 25, NULL, '2018-10-16 22:32:18', '2018-10-16 22:33:19', 'Consignee', 0, 1, 0, NULL),
(22, 'Sir Eli', 'e_a_austria@yahoo.com', '$2y$10$QET0Zu5iLvIktPRXdX0LxuwnRgby6JZqRoqnibWDLX72QoZeCsdES', 26, NULL, '2018-10-16 23:16:39', '2018-10-26 21:51:53', 'Consignee', 0, 1, 0, 'mMwOS6htFdUhtmhcZDsDD8SuH'),
(23, 'EMReign', 'clumsyreigny@gmail.com', '$2y$10$Cxob/uNaW.O6IWEJX/b2gOD1w71b.ARpwnAp61sfwIG6WnJGjF4Aq', 27, '41JWw6kr0daEFudKMb6Tylg5AopTcjCYgp5iMS8rgg5nJXkXPZ3wgg1uTCV1', '2018-10-16 23:18:40', '2018-10-16 23:20:40', 'Consignee', 0, 1, 0, 'mdvavpgrzaX6V2NgqhQnWsqPT'),
(24, 'qwerty', 'qwerty@gmail.com', '$2y$10$9DG8iRy35aSPWm.fbYR3y.mXvH4yvp7LnTe4/i9djz4ytkkAEi/oW', 28, 's7j8tNyevgrz5qg44Lpb0OanQ049zJAvBMUs0JaSNvowRq1JNXQ9fZP0r0eM', '2018-10-26 21:50:43', '2018-10-26 21:51:56', 'Consignee', 0, 1, 0, 'kQZ8OcnE27BYVfRTq7FXv9OxX'),
(25, 'zxc', 'zxc@gmail.com', '$2y$10$sc8RlC92MedxTTbiw2IO.e4QyYfmg/Bd.NDhbH.ehwM5yDLDwfJEC', 29, NULL, '2018-10-26 22:16:25', '2018-10-26 22:16:25', 'Consignee', 0, 0, 0, 'PUvzXSLjrINtxP4foAFNllXuj'),
(26, 'new', 'new@gmail.com', '$2y$10$tRjI.0yomDM/MdqQEyPH6uC4Dpal8nuqY0v1rPInokzP19MzmGFIS', 32, 'kWgB0ONGl9eX2JJnVxKZLuB1FTYWlQB6TPfQnOwPo3v7XUElAr03ZZtOyhqj', '2018-10-27 22:51:10', '2018-10-27 22:51:53', 'Consignee', 0, 1, 0, 'jb9GodsiQOMI3ICPLjgv8SFFC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tblattachments`
--
ALTER TABLE `tblattachments`
  ADD PRIMARY KEY (`intAttachmentsID`);

--
-- Indexes for table `tblbalance`
--
ALTER TABLE `tblbalance`
  ADD PRIMARY KEY (`intBalanceID`);

--
-- Indexes for table `tblbarge`
--
ALTER TABLE `tblbarge`
  ADD PRIMARY KEY (`intBargeID`),
  ADD KEY `fk_tblBarge_tblGoods1_idx` (`intBGoodsID`);

--
-- Indexes for table `tblberth`
--
ALTER TABLE `tblberth`
  ADD PRIMARY KEY (`intBerthID`),
  ADD UNIQUE KEY `intBPierID` (`intBPierID`,`strBerthName`),
  ADD KEY `fk_tblBerth_tblPier1_idx` (`intBPierID`);

--
-- Indexes for table `tblberthhistory`
--
ALTER TABLE `tblberthhistory`
  ADD PRIMARY KEY (`intBerthHistoryID`);

--
-- Indexes for table `tblbill`
--
ALTER TABLE `tblbill`
  ADD PRIMARY KEY (`intBillID`);

--
-- Indexes for table `tblcharges`
--
ALTER TABLE `tblcharges`
  ADD PRIMARY KEY (`intChargeID`);

--
-- Indexes for table `tblcheque`
--
ALTER TABLE `tblcheque`
  ADD PRIMARY KEY (`intChequeID`),
  ADD KEY `fk_tblcheque_tblbill` (`intCBillID`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`intCompanyID`),
  ADD KEY `fk_tblCompany_tblGoods1_idx` (`intCGoodsID`),
  ADD KEY `fk_tblCompany_tblPostBillingTicket1_idx` (`intCPostBillingTicketID`);

--
-- Indexes for table `tblcontractclauses`
--
ALTER TABLE `tblcontractclauses`
  ADD PRIMARY KEY (`intContractClausesID`);

--
-- Indexes for table `tblcontractfeesmatrix`
--
ALTER TABLE `tblcontractfeesmatrix`
  ADD PRIMARY KEY (`intContractFeesID`);

--
-- Indexes for table `tblcontractlist`
--
ALTER TABLE `tblcontractlist`
  ADD PRIMARY KEY (`intContractListID`),
  ADD KEY `fk_tblContractList_tblAgreement1_idx` (`intCQuotationID`),
  ADD KEY `fk_tblContractList_tblWaiver1_idx` (`intCAttachmentsID`),
  ADD KEY `fk_tblContractList_tblCompany1_idx` (`intCCompanyID`);

--
-- Indexes for table `tbldispatchticket`
--
ALTER TABLE `tbldispatchticket`
  ADD PRIMARY KEY (`intDispatchTicketID`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`intEmployeeID`),
  ADD KEY `fk_tblEmployee_tblPosition1_idx` (`intEPositionID`),
  ADD KEY `fk_tblEmployee_tblTeam1_idx` (`intETeamID`),
  ADD KEY `fk_tblemployee_tblcompany1_idx` (`intECompanyID`);

--
-- Indexes for table `tblfinalcontractfeesmatrix`
--
ALTER TABLE `tblfinalcontractfeesmatrix`
  ADD PRIMARY KEY (`intFinalContractFeesID`);

--
-- Indexes for table `tblgoods`
--
ALTER TABLE `tblgoods`
  ADD PRIMARY KEY (`intGoodsID`),
  ADD UNIQUE KEY `strGoodsName` (`strGoodsName`);

--
-- Indexes for table `tblhauling`
--
ALTER TABLE `tblhauling`
  ADD PRIMARY KEY (`intHaulingID`),
  ADD KEY `fk_tblDelivery_tblServices1_idx` (`intHServicesID`),
  ADD KEY `fk_tblHauling_tblLocation1_idx` (`intHLocationID`),
  ADD KEY `fk_tblHauling_tblAttachments1_idx` (`intHAttachmentsID`),
  ADD KEY `fk_tblhauling_tbljobsched` (`intHJobSchedID`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`intInvoiceID`),
  ADD KEY `fk_tblInvoice_tblDispatchTicket1_idx` (`intIDispatchTicketID`),
  ADD KEY `fk_tblInvoice_tblCompany1_idx` (`intDTCompanyID`);

--
-- Indexes for table `tbljoborder`
--
ALTER TABLE `tbljoborder`
  ADD PRIMARY KEY (`intJobOrderID`,`strJOVesselName`),
  ADD KEY `fk_tblSchedule_tblAttachments1_idx` (`intJOttachmentsID`),
  ADD KEY `fk_tblSchedule_tblBarge1_idx` (`intJOBargeID`),
  ADD KEY `fk_tblSchedule_tblCompany1_idx` (`intJOCompanyID`),
  ADD KEY `fk_tblSchedule_tblBerth1` (`intJOBerthID`),
  ADD KEY `fk_tblJoborder_tblGoods1_idx` (`intJOGoodsID`),
  ADD KEY `fk_tblJoborder_tblVesselType1_idx` (`intJOVesselTypeID`);

--
-- Indexes for table `tbljoborderforwardrequests`
--
ALTER TABLE `tbljoborderforwardrequests`
  ADD PRIMARY KEY (`intJOForwardRequestsID`),
  ADD KEY `fk_tblJOForwardRequests_tblJobOrder1_idx` (`intJOFRJobOrderID`),
  ADD KEY `fk_tblJOForwardRequests_tblCompany1_idx` (`intJOFRForwardCompanyID`);

--
-- Indexes for table `tbljobsched`
--
ALTER TABLE `tbljobsched`
  ADD PRIMARY KEY (`intJobSchedID`),
  ADD KEY `fk_tbljobsched_tbljoborder` (`intJSJobOrderID`),
  ADD KEY `fk_tbljobsched_tblschedule` (`intJSSchedID`),
  ADD KEY `fk_tbljobsched_tbltugboatassign` (`intJSTugboatAssignID`),
  ADD KEY `fk_tbljobsched_tbltugboat_idx` (`intJSTugboatID`),
  ADD KEY `fk_tbljobsched_tblteam_idx` (`intJSTeamID`),
  ADD KEY `fk_tbljobsched_tbldispatchticket1_idx` (`intJSDispatchTicketID`);

--
-- Indexes for table `tbllocation`
--
ALTER TABLE `tbllocation`
  ADD PRIMARY KEY (`intLocationID`),
  ADD KEY `fk_tbllocation_tbldispatchticket1_idx` (`intLDispatchTicketID`);

--
-- Indexes for table `tblothersteamcomp`
--
ALTER TABLE `tblothersteamcomp`
  ADD PRIMARY KEY (`intOTeamCompID`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`intPaymentID`),
  ADD KEY `fk_tblPayment_tblCompany1_idx` (`intPCompanyID`);

--
-- Indexes for table `tblpier`
--
ALTER TABLE `tblpier`
  ADD PRIMARY KEY (`intPierID`),
  ADD UNIQUE KEY `strPierName` (`strPierName`);

--
-- Indexes for table `tblpierhistory`
--
ALTER TABLE `tblpierhistory`
  ADD PRIMARY KEY (`intPierHistoryID`);

--
-- Indexes for table `tblposition`
--
ALTER TABLE `tblposition`
  ADD PRIMARY KEY (`intPositionID`),
  ADD UNIQUE KEY `strPositionName` (`strPositionName`,`intPCompanyID`),
  ADD KEY `fk_tblPosition_tblCompany1_idx` (`intPCompanyID`);

--
-- Indexes for table `tblpostbillingticket`
--
ALTER TABLE `tblpostbillingticket`
  ADD PRIMARY KEY (`intPostBillingTicketID`),
  ADD KEY `fk_tblPostBillingTicket_tblGoods1_idx` (`intPBTGoodsID`),
  ADD KEY `fk_tblPostBillingTicket_tblDispatchTicket1_idx` (`intPBTDispatchTicketID`),
  ADD KEY `fk_tblPostBillingTicket_tblInvoice1_idx` (`intPBTInvoiceID`),
  ADD KEY `fk_tblPostBillingTicket_tblPayment1_idx` (`intPBTPaymentID`);

--
-- Indexes for table `tblquotation`
--
ALTER TABLE `tblquotation`
  ADD PRIMARY KEY (`intQuotationID`),
  ADD KEY `fk_tblQuotation_tblContractList1_idx` (`intQContractListID`);

--
-- Indexes for table `tblquotationhistory`
--
ALTER TABLE `tblquotationhistory`
  ADD PRIMARY KEY (`intQuotationHistoryID`);

--
-- Indexes for table `tblquotationshistory`
--
ALTER TABLE `tblquotationshistory`
  ADD PRIMARY KEY (`intQuotationHistoryID`);

--
-- Indexes for table `tblrequest`
--
ALTER TABLE `tblrequest`
  ADD PRIMARY KEY (`intRequestID`),
  ADD KEY `fk_tblRequest_tblCompany1_idx` (`intRCompanyID`),
  ADD KEY `fk_tblRequest_tblCompany2_idx` (`intRForwardCompanyID`),
  ADD KEY `fk_tblRequest_tblJobOrder1_idx` (`intRJobOrderID`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD PRIMARY KEY (`intScheduleID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`intServicesID`);

--
-- Indexes for table `tblteam`
--
ALTER TABLE `tblteam`
  ADD PRIMARY KEY (`intTeamID`),
  ADD KEY `fK_tblTeam_tblCompany1_idx` (`intTCompanyID`),
  ADD KEY `fk_tblTeam_tblCompany2_idx` (`intTForwardCompanyID`);

--
-- Indexes for table `tblteamcomp`
--
ALTER TABLE `tblteamcomp`
  ADD PRIMARY KEY (`intTeamCompositionID`),
  ADD KEY `fk_tblTeamComp_tblCompany_idx` (`intTCCompanyID`);

--
-- Indexes for table `tbltermscondition`
--
ALTER TABLE `tbltermscondition`
  ADD PRIMARY KEY (`intTermsConditionID`);

--
-- Indexes for table `tbltugboat`
--
ALTER TABLE `tbltugboat`
  ADD PRIMARY KEY (`intTugboatID`),
  ADD KEY `fk_tblTugboat_tblTugboatClass1_idx` (`intTTugboatClassID`),
  ADD KEY `fk_tblTugboat_tblTugboatSpecs1_idx` (`intTTugboatSpecsID`),
  ADD KEY `fk_tblTugboat_tblTugboatMain1_idx` (`intTTugboatMainID`),
  ADD KEY `fk_tblTugboat_tblCompany1_idx` (`intTCompanyID`),
  ADD KEY `fk_tblTugboat_tblCompany2_idx` (`intForwardCompanyID`);

--
-- Indexes for table `tbltugboatassign`
--
ALTER TABLE `tbltugboatassign`
  ADD PRIMARY KEY (`intTAssignID`),
  ADD KEY `fk_tblTugboatAssign_tblTugboat1_idx` (`intTATugboatID`),
  ADD KEY `fk_tblTugboatAssign_tblTeam1_idx` (`intTATeamID`),
  ADD KEY `fk_tblTugboatAssign_tblCompany1_idx` (`intTACompanyID`),
  ADD KEY `fk_tblTugboatAssign_tblCompany2_idx` (`intTAForwardCompanyID`);

--
-- Indexes for table `tbltugboatclass`
--
ALTER TABLE `tbltugboatclass`
  ADD PRIMARY KEY (`intTugboatClassID`),
  ADD KEY `fk_tugboatclass_tugboattype` (`intTCTugboatTypeID`);

--
-- Indexes for table `tbltugboatequip`
--
ALTER TABLE `tbltugboatequip`
  ADD PRIMARY KEY (`intTugboatEquipmentID`),
  ADD KEY `fk_tblTugboatEquip_tblTugboat1_idx` (`intTETugboatID`);

--
-- Indexes for table `tbltugboatinsurance`
--
ALTER TABLE `tbltugboatinsurance`
  ADD PRIMARY KEY (`intTugboatInsuranceID`),
  ADD KEY `fk_tblTugboatInsurance_tbTugboat1l_idx` (`intTITugboatID`);

--
-- Indexes for table `tbltugboatmain`
--
ALTER TABLE `tbltugboatmain`
  ADD PRIMARY KEY (`intTugboatMainID`);

--
-- Indexes for table `tbltugboatmatrix`
--
ALTER TABLE `tbltugboatmatrix`
  ADD PRIMARY KEY (`intTugboatMatrixID`);

--
-- Indexes for table `tbltugboatspecs`
--
ALTER TABLE `tbltugboatspecs`
  ADD PRIMARY KEY (`intTugboatSpecsID`);

--
-- Indexes for table `tbltugboattype`
--
ALTER TABLE `tbltugboattype`
  ADD PRIMARY KEY (`intTugboatTypeID`);

--
-- Indexes for table `tblvessel`
--
ALTER TABLE `tblvessel`
  ADD PRIMARY KEY (`intVesselID`),
  ADD KEY `fk_tblVessel_tblGoods1_idx` (`intVGoodsID`);

--
-- Indexes for table `tblvesseltype`
--
ALTER TABLE `tblvesseltype`
  ADD PRIMARY KEY (`intVesselTypeID`),
  ADD UNIQUE KEY `strVesselTypeName` (`strVesselTypeName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblattachments`
--
ALTER TABLE `tblattachments`
  MODIFY `intAttachmentsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbarge`
--
ALTER TABLE `tblbarge`
  MODIFY `intBargeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblberth`
--
ALTER TABLE `tblberth`
  MODIFY `intBerthID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblberthhistory`
--
ALTER TABLE `tblberthhistory`
  MODIFY `intBerthHistoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbill`
--
ALTER TABLE `tblbill`
  MODIFY `intBillID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcharges`
--
ALTER TABLE `tblcharges`
  MODIFY `intChargeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcheque`
--
ALTER TABLE `tblcheque`
  MODIFY `intChequeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234124;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `intCompanyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblcontractclauses`
--
ALTER TABLE `tblcontractclauses`
  MODIFY `intContractClausesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcontractfeesmatrix`
--
ALTER TABLE `tblcontractfeesmatrix`
  MODIFY `intContractFeesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcontractlist`
--
ALTER TABLE `tblcontractlist`
  MODIFY `intContractListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbldispatchticket`
--
ALTER TABLE `tbldispatchticket`
  MODIFY `intDispatchTicketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `intEmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblfinalcontractfeesmatrix`
--
ALTER TABLE `tblfinalcontractfeesmatrix`
  MODIFY `intFinalContractFeesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblgoods`
--
ALTER TABLE `tblgoods`
  MODIFY `intGoodsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblhauling`
--
ALTER TABLE `tblhauling`
  MODIFY `intHaulingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbljoborder`
--
ALTER TABLE `tbljoborder`
  MODIFY `intJobOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbljoborderforwardrequests`
--
ALTER TABLE `tbljoborderforwardrequests`
  MODIFY `intJOForwardRequestsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbljobsched`
--
ALTER TABLE `tbljobsched`
  MODIFY `intJobSchedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbllocation`
--
ALTER TABLE `tbllocation`
  MODIFY `intLocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `intPaymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpier`
--
ALTER TABLE `tblpier`
  MODIFY `intPierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblposition`
--
ALTER TABLE `tblposition`
  MODIFY `intPositionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblpostbillingticket`
--
ALTER TABLE `tblpostbillingticket`
  MODIFY `intPostBillingTicketID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblquotation`
--
ALTER TABLE `tblquotation`
  MODIFY `intQuotationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblquotationhistory`
--
ALTER TABLE `tblquotationhistory`
  MODIFY `intQuotationHistoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblquotationshistory`
--
ALTER TABLE `tblquotationshistory`
  MODIFY `intQuotationHistoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrequest`
--
ALTER TABLE `tblrequest`
  MODIFY `intRequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `intScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `intServicesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblteam`
--
ALTER TABLE `tblteam`
  MODIFY `intTeamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbltermscondition`
--
ALTER TABLE `tbltermscondition`
  MODIFY `intTermsConditionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbltugboat`
--
ALTER TABLE `tbltugboat`
  MODIFY `intTugboatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbltugboatassign`
--
ALTER TABLE `tbltugboatassign`
  MODIFY `intTAssignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbltugboatclass`
--
ALTER TABLE `tbltugboatclass`
  MODIFY `intTugboatClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbltugboatequip`
--
ALTER TABLE `tbltugboatequip`
  MODIFY `intTugboatEquipmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbltugboatinsurance`
--
ALTER TABLE `tbltugboatinsurance`
  MODIFY `intTugboatInsuranceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbltugboatmain`
--
ALTER TABLE `tbltugboatmain`
  MODIFY `intTugboatMainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbltugboatspecs`
--
ALTER TABLE `tbltugboatspecs`
  MODIFY `intTugboatSpecsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbltugboattype`
--
ALTER TABLE `tbltugboattype`
  MODIFY `intTugboatTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblvessel`
--
ALTER TABLE `tblvessel`
  MODIFY `intVesselID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblvesseltype`
--
ALTER TABLE `tblvesseltype`
  MODIFY `intVesselTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
