-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2016 at 07:55 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orderingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblautonumber`
--

CREATE TABLE IF NOT EXISTS `tblautonumber` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `STRT` int(11) DEFAULT NULL,
  `END` int(11) DEFAULT NULL,
  `INCREMENT` int(11) DEFAULT NULL,
  `DESCRIPTION` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblautonumber`
--

INSERT INTO `tblautonumber` (`ID`, `STRT`, `END`, `INCREMENT`, `DESCRIPTION`) VALUES
(1, 1002001, 107, 1, 'customer'),
(2, 100200, 15, 1, 'user'),
(3, 102307655, 104, 1, 'verification code'),
(4, 1000, 1, 1, 'productid');

-- --------------------------------------------------------

--
-- Table structure for table `tblbranch`
--

CREATE TABLE IF NOT EXISTS `tblbranch` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ADDRESS` varchar(99) DEFAULT NULL,
  `TYPE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblbranch`
--

INSERT INTO `tblbranch` (`ID`, `ADDRESS`, `TYPE`) VALUES
(2, 'Binalbagan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE IF NOT EXISTS `tblcategory` (
  `CATEGORYID` int(11) NOT NULL AUTO_INCREMENT,
  `CATEGORY` varchar(90) NOT NULL,
  PRIMARY KEY (`CATEGORYID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGORYID`, `CATEGORY`) VALUES
(9, 'Fresh Bread'),
(10, 'Cakes'),
(11, 'Pastries');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE IF NOT EXISTS `tblcustomer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CUSTOMERID` varchar(90) DEFAULT NULL,
  `FIRSTNAME` varchar(90) DEFAULT NULL,
  `LASTNAME` varchar(90) DEFAULT NULL,
  `CITYADDRESS` varchar(90) DEFAULT NULL,
  `ADDRESS` varchar(90) DEFAULT NULL,
  `CONTACTNUMBER` varchar(30) DEFAULT NULL,
  `ZIPCODE` int(11) DEFAULT NULL,
  `IMAGE` varchar(90) NOT NULL,
  `cus_uname` varchar(90) NOT NULL,
  `cus_pass` varchar(90) NOT NULL,
  `DATEJOIN` datetime NOT NULL,
  `TERMS` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CUSID` (`CUSTOMERID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`ID`, `CUSTOMERID`, `FIRSTNAME`, `LASTNAME`, `CITYADDRESS`, `ADDRESS`, `CONTACTNUMBER`, `ZIPCODE`, `IMAGE`, `cus_uname`, `cus_pass`, `DATEJOIN`, `TERMS`) VALUES
(1, '100200157', 'Shermaine', 'Layam', 'Kabankalan', '29A Coloso  6 Kabankalan', '09123456789', 6111, 'customer_image/picture003.jpg', 'shermaine', '039cdbf1d72086c2b0a4ce3c537e108429ee2ed2', '2015-02-25 11:08:37', 1),
(2, '100200158', 'Zoie ', 'Omagap', 'Kabankalan City', '261 Teacher''s Village Barangay 1 Kabankalan City', '09123467213', 611, 'customer_image/', '', '', '2015-02-26 07:21:35', 1),
(4, '100200160', 'Leomie', 'Celestial', 'Cauyan, Negros Occidental', '16 16th street Isio Cauyan, Negros Occidental', '09334567824', 611, 'customer_image/', '', '', '2015-02-26 07:36:00', 1),
(6, '100200162', 'Riffy', 'Derecho', 'Kabankalan City', '156 Coloso street Barangay 6 Kabankalan City', '09155678921', 611, 'customer_image/', '', '', '2015-02-26 07:49:06', 1),
(7, '100200163', 'Hannah', 'Lopez', 'Kabankalan City', '231 Villa Socorro Village Barangay 1 Kabankalan City', '09126537985', 611, 'customer_image/', '', '', '2015-02-26 07:55:40', 1),
(8, '100200164', 'Xavier Jan', 'Gomez', 'Kabankalan City', '271 Texas Street Barangay 4 Kabankalan City', '091754678', 611, 'customer_image/', '', '', '2015-02-26 08:10:07', 1),
(9, '100200165', 'Reenah', 'Santos', 'Kabankalan City', '111 Las Vegas Street Barangay 6 Kabankalan City', '09206547659', 611, 'customer_image/', '', '', '2015-02-26 08:13:06', 1),
(10, '100200166', 'Kathy', 'Lee', NULL, 'Brgy. Dancalan, Kabankalan City', '09287654909', NULL, '', '', '', '0000-00-00 00:00:00', 0),
(11, '100200167', 'Jeanniebe', 'Nillos', 'Kabankalan City', '1313 Sitio Mojon Barangay 1 Kabankalan City', '09128255472', 6111, 'customer_image/', '', '', '2015-02-27 01:54:19', 1),
(13, '100200169', 'joean mar', 'genit', 'Kabankalan City', '123 j.y perez high way brgy 1 Kabankalan City', '09123456789', 6111, 'customer_image/dssdsd.jpg', '', '', '2015-02-27 02:10:23', 1),
(14, '100200170', 'joker', 'alas', 'Kabankalan City', ' kcpa brgy1 Kabankalan City', '09878765546', 6111, 'customer_image/', '', '', '2015-02-27 02:24:59', 1),
(16, '100200172', 'James', 'Benidecto', 'Kabankalan City', ' Coloso Street Brgy 6 Kabankalan City', '09087654321', 6111, 'customer_image/', '', '', '2015-02-27 02:31:10', 1),
(18, '100200174', 'Janry', 'Tan', NULL, 'Kabankalan City', '09087654321', NULL, '', '', '', '0000-00-00 00:00:00', 0),
(19, '100200175', 'Rafleen', 'Lim', 'Kabankalan City', ' Coloso Street 6 Kabankalan City', '09334567824', 611, 'customer_image/', '', '', '2015-02-27 03:01:08', 1),
(20, '100200176', 'Rena Ann', 'Palacios', 'Kabankalan City', ' Coloso Street 6 Kabankalan City', '09107253644', 611, 'customer_image/img-thing.jpg', '', '', '2015-02-27 03:36:53', 1),
(21, '100200177', 'Jimmy', 'Palmo', 'Kabankalan City', ' Borgos Street Brgy 8 Kabankalan City', '09282134345', 6111, 'customer_image/', '', '', '2015-02-27 03:48:20', 1),
(23, '100200179', 'Jimmy', 'Espra', 'Kabankalan City', ' KCPA Village Brgy 1 Kabankalan City', '094675466', 611, 'customer_image/img-thing.jpg', '', '', '2015-02-27 03:57:02', 1),
(25, '100200181', 'Giemar', 'Adolfo', 'Hinobaan ', '7 Overflow Hilamonan Kabankalan City', '09123467213', 6111, 'customer_image/', '', '', '2015-02-27 04:41:02', 1),
(27, '100200183', 'Jenny', 'Lyn', 'Kabankalan City', ' san lorenzo street Brgy 6 Kabankalan City', '0908123456', 611, 'customer_image/images (2).jpg', '', '', '2015-02-27 05:23:26', 1),
(28, '100200185', 'Janno', 'Palacios', 'Kabankalan City', '432 Coloso Street brgy 6 Kabankalan City', '0986584758', 6111, 'customer_image/306636_557992997562411_1740045400_n.jpg', '', '', '2015-03-11 08:23:10', 1),
(30, '100200187', 'Salvador', 'Palacios Sr', 'Kabankalan City', '3223 Sitio mojon brgy 1 Kabankalan City', '0986588654', 611, 'customer_image/', '', '', '2015-03-11 08:30:33', 1),
(32, '100200189', 'Jhen', 'Passis', 'Kabankalan City', '2131 Soccoro Village brgy 1 Kabankalan City', '0986584758', 6111, 'customer_image/', '', '', '2015-03-11 08:33:51', 1),
(34, '100200191', 'SAD', 'SAD', 'ASDASD', '213123 SiDASDA ASDASD ASDASD', '23423423', 611, 'customer_image/', '', '', '2015-03-11 08:35:25', 1),
(35, '100200192', 'ASD', 'ASD', 'ASDA', '213123 SADASD ASDAS ASDA', '1231231231', 12312, 'customer_image/', '', '', '2015-03-11 08:36:17', 1),
(36, '100200193', 'SADAS', 'ASDAS', 'ASDASDA', '2312312 SADASD ASDASD ASDASDA', '12312312', 1221, 'customer_image/', '', '', '2015-03-11 08:36:44', 1),
(37, '100200195', 'Janno', 'Palacios', 'Kabankalan City', '1232 Coloso Street brgy 6 Kabankalan City', '0986584758', 6111, 'customer_image/306636_557992997562411_1740045400_n.jpg', 'janobe', 'e9d85cf1141dac72613a14aca996f5163ccca4cd', '2015-05-03 07:18:15', 1),
(38, '100200197', 'Janry', 'Tan', 'Kabankalan City', '12312 COLOSO BRGY. 6 Kabankalan City', '091920212145', 611, 'customer_image/Saviour.jpeg', 'janry', '0cf901ff5659f901dfb6d2ae7aea373da83bfdfa', '2015-06-13 04:35:30', 1),
(39, '100200199', 'Biboy', 'Geasin', 'kabankaln', '21312 COLOSO dancalan kabankaln', '3654865413554165', 6111, 'customer_image/roxie.png', 'biboy', '3077d54580e0e69d20a85737e37094bec83b9289', '2015-06-21 03:56:07', 1),
(40, '1002001101', 'Kenji', 'Palacios', 'Kabankalan City', '123 Lacson St. brgy. 1 Kabankalan City', '09192355654', 6111, 'customer_image/', 'kenji', '0cf901ff5659f901dfb6d2ae7aea373da83bfdfa', '2015-08-20 09:07:30', 1),
(41, '1002001102', 'ASDASDA', 'ASDASDASD', 'Kabankalan City', '1231 ASDASD ASDASD Kabankalan City', '12213123123', 6111, 'customer_image/10329236_874204835938922_6636897990257224477_n.jpg', 'janobe', 'd472b8971244e6a949abc6f1cbe3686cd1fa0a75', '2015-11-25 05:36:22', 1),
(42, '1002001103', 'Janry', 'Malacapay', 'Kabankalan', '123 rizal brgy.1 Kabankalan', '123456987', 6111, 'customer_image/12494702_992376054179893_3335698136109679297_n.jpg', 'janjan', 'ad418bc61f8995e41c45a43cd36f2d485449ebd8', '2016-05-03 09:23:56', 1),
(43, '1002001105', 'Ricky', 'Palma', 'kabankalan City', '1233 Guanzon Street Brgy. 1 Santiago City', '091918272722', 6111, 'customer_image/download (3).jpg', 'ricky', 'b39f008e318efd2bb988d724a161b61c6909677f', '2016-10-03 08:54:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE IF NOT EXISTS `tblorder` (
  `ORDERID` int(11) NOT NULL AUTO_INCREMENT,
  `PRODUCTID` int(11) DEFAULT NULL,
  `DATEORDER` datetime NOT NULL,
  `O_QTY` int(11) DEFAULT NULL,
  `O_PRICE` int(11) DEFAULT NULL,
  `DATECLAIM` datetime NOT NULL,
  `ORDERTYPE` varchar(30) DEFAULT NULL,
  `STATS` varchar(30) DEFAULT NULL,
  `ORDERNUMBER` varchar(50) NOT NULL,
  `CUSTOMERID` int(11) NOT NULL,
  PRIMARY KEY (`ORDERID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`ORDERID`, `PRODUCTID`, `DATEORDER`, `O_QTY`, `O_PRICE`, `DATECLAIM`, `ORDERTYPE`, `STATS`, `ORDERNUMBER`, `CUSTOMERID`) VALUES
(1, 2, '2015-02-25 10:50:48', 1, 500, '2015-02-25 15:02:25', 'Cash on Delivery', 'Confirmed', '10230765561', 100200157),
(2, 6, '2015-02-25 10:50:48', 10, 100, '2015-02-25 15:02:25', 'Cash on Delivery', 'Confirmed', '10230765561', 100200157),
(3, 6, '2015-02-25 11:12:39', 5, 50, '2015-02-25 15:02:25', 'Cash on Delivery', 'Confirmed', '10230765562', 100200157),
(4, 5, '2015-02-25 11:12:39', 1, 375, '2015-02-25 15:02:25', 'Cash on Delivery', 'Confirmed', '10230765562', 100200157),
(5, 6, '2015-02-25 11:15:28', 5, 50, '2015-02-25 15:02:25', 'Cash on Pickup', 'Confirmed', '10230765563', 100200157),
(6, 15, '2015-02-26 07:22:59', 10, 50, '2015-02-26 15:02:26', 'Cash on Delivery', 'Confirmed', '10230765564', 100200158),
(7, 6, '2015-02-26 07:22:59', 5, 50, '2015-02-26 15:02:26', 'Cash on Delivery', 'Confirmed', '10230765564', 100200158),
(8, 11, '2015-02-26 07:26:55', 1, 270, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765565', 100200158),
(9, 3, '2015-02-26 07:37:47', 6, 78, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765566', 100200160),
(10, 32, '2015-02-26 07:37:47', 2, 66, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765566', 100200160),
(11, 7, '2015-02-26 07:41:20', 4, 52, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765567', 100200160),
(12, 31, '2015-02-26 07:44:38', 1, 80, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765568', 100200160),
(13, 5, '2015-02-26 07:51:26', 1, 375, '2015-02-26 15:02:26', 'Cash on Delivery', 'Confirmed', '10230765569', 100200162),
(14, 6, '2015-02-26 07:51:26', 5, 50, '2015-02-26 15:02:26', 'Cash on Delivery', 'Confirmed', '10230765569', 100200162),
(15, 7, '2015-02-26 07:51:26', 4, 52, '2015-02-26 15:02:26', 'Cash on Delivery', 'Confirmed', '10230765569', 100200162),
(16, 15, '2015-02-26 07:51:26', 10, 50, '2015-02-26 15:02:26', 'Cash on Delivery', 'Confirmed', '10230765569', 100200162),
(17, 23, '2015-02-26 07:52:06', 1, 170, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765570', 100200162),
(18, 16, '2015-02-26 07:52:06', 6, 48, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765570', 100200162),
(19, 4, '2015-02-26 07:57:24', 4, 52, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765571', 100200163),
(20, 6, '2015-02-26 07:57:24', 5, 50, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765571', 100200163),
(21, 11, '2015-02-26 07:58:16', 1, 270, '2015-02-26 15:02:26', 'Cash on Delivery', 'Confirmed', '10230765572', 100200163),
(22, 32, '2015-02-26 07:58:16', 2, 66, '2015-02-26 15:02:26', 'Cash on Delivery', 'Confirmed', '10230765572', 100200163),
(23, 7, '2015-02-26 08:00:24', 8, 104, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765573', 100200163),
(24, 31, '2015-02-26 08:00:24', 1, 80, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765573', 100200163),
(25, 7, '2015-02-26 08:11:02', 6, 78, '2015-02-26 15:02:26', 'Cash on Delivery', 'Confirmed', '10230765574', 100200164),
(26, 3, '2015-02-26 08:11:02', 5, 65, '2015-02-26 15:02:26', 'Cash on Delivery', 'Confirmed', '10230765574', 100200164),
(27, 5, '2015-02-26 08:13:43', 1, 375, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765575', 100200165),
(28, 15, '2015-02-26 08:13:43', 10, 50, '2015-02-26 15:02:26', 'Cash on Pickup', 'Confirmed', '10230765575', 100200165),
(29, 15, '2015-02-26 08:17:16', 5, 25, '2015-02-26 08:17:16', 'Cash on Pickup', 'Confirmed', '10230765576', 100200166),
(30, 2, '2015-02-27 02:03:59', 1, 500, '2015-02-27 15:02:27', 'Cash on Pickup', 'Confirmed', '10230765577', 100200167),
(31, 3, '2015-02-27 02:03:59', 4, 52, '2015-02-27 15:02:27', 'Cash on Pickup', 'Confirmed', '10230765577', 100200167),
(32, 3, '2015-02-27 02:19:32', 4, 52, '2015-02-27 15:02:27', 'Cash on Pickup', 'Confirmed', '10230765578', 100200169),
(33, 4, '2015-02-27 02:19:32', 4, 52, '2015-02-27 15:02:27', 'Cash on Pickup', 'Confirmed', '10230765578', 100200169),
(34, 2, '2015-02-27 02:27:00', 2, 1000, '2015-02-27 15:02:27', 'Cash on Delivery', 'Confirmed', '10230765579', 100200170),
(35, 3, '2015-02-27 02:27:00', 4, 52, '2015-02-27 15:02:27', 'Cash on Delivery', 'Confirmed', '10230765579', 100200170),
(36, 5, '2015-02-27 02:31:27', 1, 375, '2015-02-27 15:02:27', 'Cash on Delivery', 'Confirmed', '10230765580', 100200172),
(37, 2, '2015-02-27 02:42:04', 1, 500, '2015-02-27 02:42:04', 'Cash on Pickup', 'Confirmed', '10230765581', 100200174),
(38, 2, '2015-02-27 04:06:46', 1, 500, '2015-02-27 15:02:27', 'Cash on Pickup', 'Confirmed', '10230765582', 100200179),
(39, 15, '2015-02-27 04:06:46', 10, 50, '2015-02-27 15:02:27', 'Cash on Pickup', 'Confirmed', '10230765582', 100200179),
(40, 31, '2015-02-27 04:12:44', 1, 80, '2015-02-27 15:02:27', 'Cash on Delivery', 'Confirmed', '10230765583', 100200179),
(41, 32, '2015-02-27 04:12:44', 2, 66, '2015-02-27 15:02:27', 'Cash on Delivery', 'Confirmed', '10230765583', 100200179),
(42, 3, '2015-02-27 05:38:43', 6, 78, '2015-02-27 15:02:27', 'Cash on Delivery', 'Confirmed', '10230765584', 100200183),
(43, 11, '2015-02-27 06:05:54', 2, 540, '2015-02-27 15:02:27', 'Cash on Pickup', 'Confirmed', '10230765585', 100200179),
(44, 2, '2015-02-27 06:05:54', 1, 500, '2015-02-27 15:02:27', 'Cash on Pickup', 'Confirmed', '10230765585', 100200179),
(45, 4, '2015-03-11 08:28:39', 4, 52, '2015-03-11 15:03:11', 'Cash on Delivery', 'Confirmed', '10230765586', 100200185),
(46, 4, '2015-03-11 08:39:57', 4, 52, '2015-03-11 15:03:11', 'Cash on Delivery', 'Confirmed', '10230765587', 100200189),
(47, 3, '2015-03-11 09:12:14', 4, 52, '2015-03-11 15:03:11', 'Cash on Delivery', 'Confirmed', '10230765588', 100200185),
(48, 4, '2015-03-11 09:19:48', 4, 52, '2015-03-11 15:03:11', 'Cash on Delivery', 'Confirmed', '10230765589', 100200185),
(49, 11, '2015-03-11 09:20:01', 1, 270, '2015-03-11 15:03:11', 'Cash on Delivery', 'Confirmed', '10230765590', 100200185),
(50, 5, '2015-03-11 09:41:44', 1, 375, '2015-03-11 15:03:11', 'Cash on Pickup', 'Cancelled', '10230765591', 100200185),
(51, 5, '2015-03-11 09:45:57', 1, 375, '2015-03-11 15:03:11', 'Cash on Delivery', 'Confirmed', '10230765592', 100200185),
(52, 4, '2015-03-11 09:45:57', 4, 52, '2015-03-11 15:03:11', 'Cash on Delivery', 'Confirmed', '10230765592', 100200185),
(53, 11, '2015-03-11 09:45:57', 1, 270, '2015-03-11 15:03:11', 'Cash on Delivery', 'Confirmed', '10230765592', 100200185),
(54, 23, '2015-03-11 09:45:58', 1, 170, '2015-03-11 15:03:11', 'Cash on Delivery', 'Confirmed', '10230765592', 100200185),
(55, 4, '2015-03-11 09:48:07', 4, 52, '2015-03-11 15:03:11', 'Cash on Delivery', 'Confirmed', '10230765593', 100200185),
(56, 23, '2015-03-12 07:40:46', 1, 170, '2015-03-12 15:03:12', 'Cash on Delivery', 'Confirmed', '10230765594', 100200157),
(57, 3, '2015-03-12 07:45:21', 4, 52, '2015-03-12 15:03:12', 'Cash on Pickup', 'Confirmed', '10230765595', 100200157),
(58, 4, '2015-03-13 03:45:42', 4, 52, '2015-03-13 15:03:13', 'Cash on Delivery', 'Confirmed', '10230765596', 100200157),
(59, 5, '2015-03-13 03:45:42', 1, 375, '2015-03-13 15:03:13', 'Cash on Delivery', 'Confirmed', '10230765596', 100200157),
(60, 3, '2015-03-13 06:14:47', 4, 52, '2015-03-13 15:03:13', 'Cash on Delivery', 'Confirmed', '10230765597', 100200157),
(61, 3, '2015-05-03 07:18:35', 4, 52, '2015-05-03 15:05:03', 'Cash on Pickup', 'Pending', '10230765598', 100200195),
(62, 3, '2015-06-13 04:35:45', 6, 78, '2015-06-13 15:06:13', 'Cash on Pickup', 'Confirmed', '10230765599', 100200197),
(63, 5, '2015-06-21 03:56:42', 2, 750, '2015-06-21 15:06:21', 'Cash on Pickup', 'Confirmed', '102307655100', 100200199),
(64, 5, '2015-08-20 09:09:12', 5, 1875, '2015-08-20 15:08:20', 'Cash on Delivery', 'Pending', '102307655101', 1002001101),
(65, 4, '2015-11-25 05:36:48', 4, 52, '2015-11-25 15:11:25', 'Cash on Delivery', 'Confirmed', '102307655102', 1002001102),
(66, 5, '2015-11-25 05:36:49', 1, 375, '2015-11-25 15:11:25', 'Cash on Delivery', 'Confirmed', '102307655102', 1002001102),
(67, 5, '2016-05-03 09:24:13', 1, 375, '2016-05-03 16:05:03', 'Cash on Delivery', 'Pending', '102307655103', 1002001103);

-- --------------------------------------------------------

--
-- Table structure for table `tblorigin`
--

CREATE TABLE IF NOT EXISTS `tblorigin` (
  `ORIGINID` int(11) NOT NULL AUTO_INCREMENT,
  `ORIGIN` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`ORIGINID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tblorigin`
--

INSERT INTO `tblorigin` (`ORIGINID`, `ORIGIN`) VALUES
(1, 'United States (New England)'),
(7, 'French'),
(8, 'Spain');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE IF NOT EXISTS `tblpayment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ORDERNUMBER` varchar(50) NOT NULL,
  `CUSTOMERID` int(11) NOT NULL,
  `DATEORDER` datetime NOT NULL,
  `CLAIMDATE` datetime NOT NULL,
  `PAYMENTMETHOD` varchar(30) NOT NULL,
  `ALLQTY` int(11) NOT NULL,
  `TOTALPRICE` double NOT NULL,
  `STATS` varchar(30) NOT NULL,
  `REMARKS` text NOT NULL,
  `HVIEW` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`ID`, `ORDERNUMBER`, `CUSTOMERID`, `DATEORDER`, `CLAIMDATE`, `PAYMENTMETHOD`, `ALLQTY`, `TOTALPRICE`, `STATS`, `REMARKS`, `HVIEW`) VALUES
(1, '10230765561', 100200157, '2015-02-25 10:50:49', '2015-02-25 15:02:25', 'Cash on Delivery', 0, 625, 'Confirmed', 'Your order has been confirmed.', 1),
(2, '10230765562', 100200157, '2015-02-25 11:12:39', '2015-02-25 15:02:25', 'Cash on Delivery', 0, 450, 'Confirmed', 'Your order has been confirmed. The ordered products will be yours in the exact date and time that you have set.', 1),
(3, '10230765563', 100200157, '2015-02-25 11:15:28', '2015-02-25 15:02:25', 'Cash on Pickup', 0, 50, 'Confirmed', 'Your order has been confirmed. The ordered products will be yours in the exact date and time that you have set.', 1),
(4, '10230765564', 100200158, '2015-02-26 07:22:59', '2015-02-26 15:02:26', 'Cash on Delivery', 0, 125, 'Confirmed', 'Your order has been confirmed.', 0),
(5, '10230765565', 100200158, '2015-02-26 07:26:55', '2015-02-26 15:02:26', 'Cash on Pickup', 0, 270, 'Confirmed', 'Your order has been confirmed.', 0),
(6, '10230765566', 100200160, '2015-02-26 07:37:47', '2015-02-26 15:02:26', 'Cash on Pickup', 0, 144, 'Confirmed', 'Your order has been confirmed.', 0),
(7, '10230765567', 100200160, '2015-02-26 07:41:20', '2015-02-26 15:02:26', 'Cash on Pickup', 0, 52, 'Confirmed', 'Your order has been confirmed.', 0),
(8, '10230765568', 100200160, '2015-02-26 07:44:38', '2015-02-26 15:02:26', 'Cash on Pickup', 0, 80, 'Confirmed', 'Your order has been confirmed.', 0),
(9, '10230765569', 100200162, '2015-02-26 07:51:26', '2015-02-26 15:02:26', 'Cash on Delivery', 0, 552, 'Confirmed', 'Your order has been confirmed.', 0),
(10, '10230765570', 100200162, '2015-02-26 07:52:06', '2015-02-26 15:02:26', 'Cash on Pickup', 0, 218, 'Confirmed', 'Your order has been confirmed.', 0),
(11, '10230765571', 100200163, '2015-02-26 07:57:24', '2015-02-26 15:02:26', 'Cash on Pickup', 0, 102, 'Confirmed', 'Your order has been confirmed.', 0),
(12, '10230765572', 100200163, '2015-02-26 07:58:16', '2015-02-26 15:02:26', 'Cash on Delivery', 0, 361, 'Confirmed', 'Your order has been confirmed.', 0),
(13, '10230765573', 100200163, '2015-02-26 08:00:24', '2015-02-26 15:02:26', 'Cash on Pickup', 0, 184, 'Confirmed', 'Your order has been confirmed.', 0),
(14, '10230765574', 100200164, '2015-02-26 08:11:02', '2015-02-26 15:02:26', 'Cash on Delivery', 0, 0, 'Confirmed', 'Your order has been confirmed.', 0),
(15, '10230765575', 100200165, '2015-02-26 08:13:43', '2015-02-26 15:02:26', 'Cash on Pickup', 0, 425, 'Confirmed', 'Your order has been confirmed.', 0),
(16, '10230765576', 100200166, '2015-02-26 08:17:16', '2015-02-26 08:17:16', 'Cash on Pickup', 0, 25, 'Confirmed', 'Your order has been confirmed.', 0),
(17, '10230765577', 100200167, '2015-02-27 02:03:59', '2015-02-27 15:02:27', 'Cash on Pickup', 0, 552, 'Confirmed', 'Your order has been confirmed.', 0),
(18, '10230765578', 100200169, '2015-02-27 02:19:32', '2015-02-27 15:02:27', 'Cash on Pickup', 0, 104, 'Confirmed', 'Your order has been confirmed.', 1),
(19, '10230765579', 100200170, '2015-02-27 02:27:01', '2015-02-27 15:02:27', 'Cash on Delivery', 0, 1077, 'Confirmed', 'Your order has been confirmed.', 0),
(20, '10230765580', 100200172, '2015-02-27 02:31:27', '2015-02-27 15:02:27', 'Cash on Delivery', 0, 400, 'Confirmed', 'Your order has been confirmed.', 0),
(21, '10230765581', 100200174, '2015-02-27 02:42:04', '2015-02-27 02:42:04', 'Cash on Pickup', 0, 500, 'Confirmed', '', 0),
(22, '10230765582', 100200179, '2015-02-27 04:06:46', '2015-02-27 15:02:27', 'Cash on Pickup', 0, 550, 'Confirmed', 'Your order has been confirmed.', 1),
(23, '10230765583', 100200179, '2015-02-27 04:12:44', '2015-02-27 15:02:27', 'Cash on Delivery', 0, 171, 'Confirmed', 'Your order has been confirmed.', 1),
(24, '10230765584', 100200183, '2015-02-27 05:38:43', '2015-02-27 15:02:27', 'Cash on Delivery', 0, 103, 'Confirmed', 'Your order has been confirmed.', 0),
(25, '10230765585', 100200179, '2015-02-27 06:05:54', '2015-02-27 15:02:27', 'Cash on Pickup', 0, 1040, 'Confirmed', 'Your order has been confirmed.', 1),
(26, '10230765586', 100200185, '2015-03-11 08:28:39', '2015-03-11 15:03:11', 'Cash on Delivery', 0, 77, 'Confirmed', 'Your order has been confirmed.', 1),
(27, '10230765587', 100200189, '2015-03-11 08:39:57', '2015-03-11 15:03:11', 'Cash on Delivery', 0, 77, 'Confirmed', 'Your order has been confirmed.', 0),
(28, '10230765588', 100200185, '2015-03-11 09:12:14', '2015-03-11 15:03:11', 'Cash on Delivery', 0, 77, 'Confirmed', 'Your order has been confirmed.', 1),
(29, '10230765589', 100200185, '2015-03-11 09:19:49', '2015-03-11 15:03:11', 'Cash on Delivery', 0, 77, 'Confirmed', 'Your order has been confirmed.', 1),
(30, '10230765590', 100200185, '2015-03-11 09:20:02', '2015-03-11 15:03:11', 'Cash on Delivery', 0, 295, 'Confirmed', 'Your order has been confirmed.', 1),
(31, '10230765591', 100200185, '2015-03-11 09:41:45', '2015-03-11 15:03:11', 'Cash on Pickup', 0, 375, 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', 1),
(32, '10230765592', 100200185, '2015-03-11 09:45:58', '2015-03-11 15:03:11', 'Cash on Delivery', 0, 892, 'Confirmed', 'Your order has been confirmed.', 1),
(33, '10230765593', 100200185, '2015-03-11 09:48:08', '2015-03-11 15:03:11', 'Cash on Delivery', 0, 77, 'Confirmed', 'Your order has been confirmed.', 1),
(34, '10230765594', 100200157, '2015-03-12 07:40:47', '2015-03-12 15:03:12', 'Cash on Delivery', 0, 195, 'Confirmed', 'Your order has been confirmed.', 1),
(35, '10230765595', 100200157, '2015-03-12 07:45:21', '2015-03-12 15:03:12', 'Cash on Pickup', 0, 52, 'Confirmed', 'Your order has been confirmed.', 1),
(36, '10230765596', 100200157, '2015-03-13 03:45:42', '2015-03-13 15:03:13', 'Cash on Delivery', 0, 452, 'Confirmed', 'Your order has been confirmed.', 1),
(37, '10230765597', 100200157, '2015-03-13 06:14:48', '2015-03-13 15:03:13', 'Cash on Delivery', 0, 77, 'Confirmed', 'Your order has been confirmed.', 1),
(38, '10230765598', 100200195, '2015-05-03 07:18:35', '2015-05-03 15:05:03', 'Cash on Pickup', 0, 52, 'Pending', '', 0),
(39, '10230765599', 100200197, '2015-06-13 04:35:45', '2015-06-13 15:06:13', 'Cash on Pickup', 0, 78, 'Confirmed', 'Your order has been confirmed.', 0),
(40, '102307655100', 100200199, '2015-06-21 03:56:43', '2015-06-21 15:06:21', 'Cash on Pickup', 0, 750, 'Confirmed', 'Your order has been confirmed.', 1),
(41, '102307655101', 1002001101, '2015-08-20 09:09:13', '2015-08-20 15:08:20', 'Cash on Delivery', 0, 1900, 'Pending', '', 0),
(42, '102307655102', 1002001102, '2015-11-25 05:36:49', '2015-11-25 15:11:25', 'Cash on Delivery', 0, 452, 'Confirmed', 'Your order has been confirmed.', 1),
(43, '102307655103', 1002001103, '2016-05-03 09:24:13', '2016-05-03 16:05:03', 'Cash on Delivery', 0, 400, 'Pending', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE IF NOT EXISTS `tblproducts` (
  `PRODUCTID` int(11) NOT NULL AUTO_INCREMENT,
  `PRODUCTNAME` varchar(90) DEFAULT NULL,
  `IMAGES` varchar(90) DEFAULT NULL,
  `PRODUCTTYPE` varchar(90) DEFAULT NULL,
  `ORIGINID` int(11) DEFAULT NULL,
  `DESCRIPTION` text,
  `CATEGORYID` int(11) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL,
  `STATUS` varchar(30) NOT NULL,
  PRIMARY KEY (`PRODUCTID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`PRODUCTID`, `PRODUCTNAME`, `IMAGES`, `PRODUCTTYPE`, `ORIGINID`, `DESCRIPTION`, `CATEGORYID`, `QTY`, `PRICE`, `STATUS`) VALUES
(2, 'fresh cream cake with strawberries', 'uploaded_photos/fresh_cream_cake_with_strawberries-HD1.jpg', 'NONE', 1, 'NONE', 10, 120, 500, 'NotAvailable'),
(3, 'Brownies', 'uploaded_photos/brownies.jpg', 'NONE', 1, 'NONE', 11, 0, 13, 'Available'),
(4, 'Banana cake', 'uploaded_photos/45141_140190622685454_4153684_n.jpg', 'NONE', 1, 'NONE', 10, 16, 13, 'NotAvailable'),
(5, 'Caramel cake', 'uploaded_photos/CaramelLayerCakeR.jpg', 'NONE', 1, 'NONE', 10, 22, 375, 'Available'),
(6, 'Banana Nut Bar', 'uploaded_photos/banana-smore-nut-bar.jpg', 'NONE', 1, 'NONE', 11, 55, 10, 'Available'),
(7, 'Cheese Cupcake', 'uploaded_photos/index.jpg', 'NONE', 1, 'NONE', 11, 51, 13, 'Available'),
(11, 'Black Forest', 'uploaded_photos/blackforest-cake-bf-07.jpg', NULL, NULL, NULL, 10, 62, 270, 'Available'),
(15, 'Doughnut', 'uploaded_photos/sublime-doughnuts-atlanta-01.jpg', NULL, NULL, NULL, 9, 95, 5, 'Available'),
(16, 'Ensaimada (Special)', 'uploaded_photos/thumb_600.jpg', NULL, NULL, NULL, 9, 44, 8, 'NotAvailable'),
(23, 'Chocolate Cake', 'uploaded_photos/Raspberry_Chocolate_Cake.jpg', NULL, NULL, NULL, 10, 47, 170, 'Available'),
(31, 'Choco Cream', 'uploaded_photos/chocolate_cream_pie_01.jpg', NULL, NULL, NULL, 10, 47, 80, 'Available'),
(32, 'Chocolate Kringkles', 'uploaded_photos/filipino-food-chocolate-crinkles.jpg', NULL, NULL, NULL, 11, 94, 33, 'Available'),
(33, 'sad', 'uploaded_photos/Coca-Cola_1950.png', NULL, NULL, NULL, 9, 2, 11, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tblproductsin`
--

CREATE TABLE IF NOT EXISTS `tblproductsin` (
  `TRANSACTIONID` int(11) NOT NULL AUTO_INCREMENT,
  `PRODUCTID` int(11) NOT NULL,
  `QTY` int(11) NOT NULL,
  `UPDATEPRICE` double NOT NULL,
  `DATERECEIVE` datetime NOT NULL,
  PRIMARY KEY (`TRANSACTIONID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tblproductsin`
--

INSERT INTO `tblproductsin` (`TRANSACTIONID`, `PRODUCTID`, `QTY`, `UPDATEPRICE`, `DATERECEIVE`) VALUES
(1, 32, 50, 33, '2015-02-26 05:38:17'),
(2, 7, 50, 13, '2015-02-26 05:38:41'),
(3, 3, 50, 13, '2015-02-26 05:38:57'),
(4, 6, 50, 10, '2015-02-27 02:32:44'),
(5, 15, 100, 5, '2015-02-27 02:58:27'),
(6, 11, 50, 270, '2015-02-27 03:58:09'),
(7, 4, 30, 13, '2015-02-27 03:58:20'),
(8, 2, 20, 500, '2015-02-27 03:58:36'),
(9, 2, 30, 600, '2015-02-27 06:12:08'),
(10, 2, 60, 500, '2015-03-11 06:30:56'),
(11, 10001, 2, 11, '2016-10-02 06:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `tblsettings`
--

CREATE TABLE IF NOT EXISTS `tblsettings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` text NOT NULL,
  `TYPE` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblsettings`
--

INSERT INTO `tblsettings` (`ID`, `DESCRIPTION`, `TYPE`) VALUES
(1, '    Fix n Mix Inc. started in 1998 as a sole proprietorship owned by Mr. Felipe D. Gatoc, Jr. It started as a home-based bakeshop. Over the years, the bakeshop was able to capture the major market within the southern part. In 2010, the company became a corporation.\r\nToday, the company serves its local consumers with its array of intermediaries starting with six company-owned outlets in the city and several outlets in Binalbagan, Himamaylan, Sipalay, and the newly-opened outlet in Bago. Alongside with its own outlets, the company also caters to its consignments which reach around forty stores.\r\nThe company focuses on producing fresh and affordable breads at its maximum quality. Within the 25 years of its operation, the company is looking to be able to share its products to the growing consumer.\r\n           ', 'About'),
(2, 'To keep customers satisfied by serving them quality and freshly baked goods at reasonable prices.', 'Mission'),
(3, 'Fix n Mix envisions to maintain a safe, healthy and vibrant workplace for its employees in order to serve our customers best. ', 'Vision'),
(4, 'If you need any help please contact the <strong>Fix N Mix Main Branch or call on 4712-122</strong>.<br/>', 'Countact');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` int(11) DEFAULT NULL,
  `NAME` varchar(90) DEFAULT NULL,
  `UEMAIL` varchar(90) DEFAULT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASS` varchar(99) DEFAULT NULL,
  `TYPE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `USERID` (`USERID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`ID`, `USERID`, `NAME`, `UEMAIL`, `USERNAME`, `PASS`, `TYPE`) VALUES
(1, 1234, 'janno palacios', 'jans@gmail.com', 'jans', 'b3aca92c793ee0e9b1a9b0a5f5fc044e05140df3', 'Administrator'),
(9, 10020018, 'James yap', 'jamess@gmail.com', '', 'b39f008e318efd2bb988d724a161b61c6909677f', 'Customer'),
(12, 100200110, 'janry Tan', 'tan@gmail.com', '', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Customer'),
(21, 100200119, 'jamws palaosa', '100200119', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Customer'),
(22, 100200131, 'Jan Pal', '100200131', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Customer'),
(23, 10020014, 'John Craig Palacios', 'craig@gmail.com', '', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 'Staff'),
(29, 100200137, ' ', '', 'jans@gmail.com', '0cf901ff5659f901dfb6d2ae7aea373da83bfdfa', 'Customer'),
(30, 100200138, ' ', '', 'jans@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Customer'),
(31, 100200139, ' ', '', 'jans@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Customer'),
(32, 100200140, ' ', 'jans@gmail.com', 'jans@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Customer'),
(33, 100200141, ' ', '', 'jans@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Customer'),
(34, 100200142, ' ', '', 'jans@gmail.com', 'b55f6172a840644e5096e0a977e45fbaad7f54ca', 'Customer'),
(35, 100200143, ' ', 'jans@gmail.com', 'jans@gmail.com', 'ada946067de42dd62894b0f239c03d6ca8e71198', 'Customer'),
(36, 100200144, ' ', 'jans@gmail.com', 'asdsa', '955e0af55610183e7aafb19e08bf2c26a10fabd1', 'Customer'),
(37, 100200145, ' ', 'jans@gmail.com', 'jans@gmail.com', '110d83c59026f0c56f87da0bb38466c726acfb36', 'Customer'),
(38, 100200146, 'Airish sadas', 'jans@gmail.com', 'jans@gmail.com', 'fd682f04ea0a98e004042d9dac80041a83a687b7', 'Customer'),
(39, 100200147, 'qweqw wqeqw', 'jp@yahoo.com', 'jans@gmail.com', 'fd682f04ea0a98e004042d9dac80041a83a687b7', 'Customer'),
(40, 100200148, 'sadas saa', 'jans@gmail.com', 'sad', '39f09bae86c06839ce9d19bf7b3e0d50cf980994', 'Customer'),
(41, 100200149, 'Jame havar', 'james@yahoo.com', 'jame', '9eded0128d49c20648e824af1a8189c843ff5662', 'Customer'),
(42, 100200150, 'Renalyn  Del Rosario', 'ren@yahoo.com', 'rhen', '9fc55effc637e0336c56163cf9cf7978e32fb9ba', 'Customer'),
(43, 0, ' ', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Customer'),
(45, 100200153, 'junjun Palacios', 'jkatzuke@yahoo.com', 'palaciosjunjun', 'fab3cb5ea1a14db4086229f136ff44a627299328', 'Customer'),
(46, 100200155, 'areen delar', 'areen@yahoo.com', 'areen', 'b39f008e318efd2bb988d724a161b61c6909677f', 'Customer'),
(47, 100200157, 'Shermaine Layam', NULL, 'kacutesakon', 'cf3f82761e6c23b7118cc3f3d5580bc8abfff40a', 'Customer'),
(48, 100200158, 'Zoie  Omagap', NULL, 'zoie912', '2e1913aff212885cf60e91579dc27a800ea3c396', 'Customer'),
(50, 100200160, 'Leomie Celestial', NULL, 'leomie16', 'af8faef5796eaa956203b59068cdcc4f77f47946', 'Customer'),
(52, 100200162, 'Riffy Derecho', NULL, 'Riffy021615', 'a2cd520b0309d7b2afb5028a13764d9bf590f94e', 'Customer'),
(53, 100200163, 'Hannah Lopez', NULL, 'hannah202006', '8e8e9b95e2c211dc1d6b7a1b994c9cc0e75657e1', 'Customer'),
(54, 100200164, 'Xavier Jan Gomez', NULL, 'xavierjan11', '9dda84ca9d3ac971d64a44c97646b7d933624afc', 'Customer'),
(55, 100200165, 'Reenah Santos', NULL, 'reenah001', 'b31fb8d6748c120b488abb025cda06a71dbd0282', 'Customer'),
(56, 100200166, 'Kathy Lee', '100200166', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Customer'),
(57, 100200167, 'Jeanniebe Nillos', NULL, 'jeanniebe', 'c5c4e6fa2de14d57c49662abfd2e4f3e2afb8cc2', 'Customer'),
(59, 100200169, 'joean mar genit', NULL, 'jm', 'b6a63ce17c084241624cb31274ddeac0b389dc19', 'Customer'),
(60, 100200170, 'joker alas', NULL, 'pe', 'd99457d4a46a259bcbcb3c2797bb720b4f3baa98', 'Customer'),
(62, 100200172, 'James Benidecto', NULL, 'james', '29e7f8edd9a7b1169538173995db4cf2db338d78', 'Customer'),
(64, 100200174, 'Janry Tan', '100200174', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Customer'),
(65, 100200175, 'Rafleen Lim', NULL, 'Rafleen', 'bc709f7e464617e88d33c5526934e04ec39efe58', 'Customer'),
(66, 100200176, 'Rena Ann Palacios', NULL, 'rena', '4b462c9e310fc4af5fa1b8d2aafbae6340c51bb0', 'Customer'),
(67, 100200177, 'Jimmy Palmo', NULL, 'jimmy', 'd6694f49d2311065295e68f1259d1705b937ef6d', 'Customer'),
(69, 100200179, 'Jimmy Espra', NULL, 'jimz', 'ac0aec79c94d19cfffe615c8cbd36ef9a8605af4', 'Customer'),
(71, 100200181, 'Giemar Adolfo', NULL, 'giemar', '6463f40034559359f115e454ef275ac5c7abf00c', 'Customer'),
(73, 100200183, 'Jenny Lyn', NULL, 'jen', '6d393fcdf67f81613d6da990d7459565ff3c5225', 'Customer'),
(74, 100200185, 'Janno Palacios', NULL, 'janobe', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'Customer'),
(76, 100200187, 'Salvador Palacios Sr', NULL, 'salvador', '97ae9a46e3ae426a5d6f4f91fe0c8aabcb116451', 'Customer'),
(78, 100200189, 'Jhen Passis', NULL, 'jhen', 'b43999e64562c451dda2159f8a9651bfd0175f1f', 'Customer'),
(80, 100200191, 'SAD SAD', NULL, 'ASDAS', '0fc3505a262a3acd5d4160d6096ce131fba94170', 'Customer'),
(81, 100200192, 'ASD ASD', NULL, 'ASDASD', '74db52d9bf7505ba543285acd8061a29138f886c', 'Customer'),
(82, 100200193, 'SADAS ASDAS', NULL, 'ASDASD', '3262b5e0ca80db9d35f206862206e67ddd3b27f3', 'Customer'),
(83, 100200195, 'Janno Palacios', NULL, 'janobe', 'e9d85cf1141dac72613a14aca996f5163ccca4cd', 'Customer'),
(84, 100200197, 'Janry Tan', NULL, 'janry', '0cf901ff5659f901dfb6d2ae7aea373da83bfdfa', 'Customer'),
(85, 100200199, 'Biboy Geasin', NULL, 'biboy', '3077d54580e0e69d20a85737e37094bec83b9289', 'Customer'),
(86, 1002001101, 'Kenji Palacios', NULL, 'kenji', '0cf901ff5659f901dfb6d2ae7aea373da83bfdfa', 'Customer'),
(87, 1002001102, 'ASDASDA ASDASDASD', NULL, 'janobe', 'a38275bafb6e6d8dbe5e72aae88348d616b249b3', 'Customer'),
(88, 1002001103, 'Janry Malacapay', NULL, 'janjan', 'ad418bc61f8995e41c45a43cd36f2d485449ebd8', 'Customer'),
(89, 1002001105, 'Ricky Palma', NULL, 'ricky', 'b39f008e318efd2bb988d724a161b61c6909677f', 'Customer');
