-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2016 at 03:44 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kangamph_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_confiram`
--

CREATE TABLE IF NOT EXISTS `tb_confiram` (
  `cid` int(12) NOT NULL,
  `confir` varchar(40) NOT NULL,
  `lfname` varchar(40) NOT NULL,
  `cemail` varchar(40) NOT NULL,
  `bank` varchar(40) NOT NULL,
  `cprice` varchar(40) NOT NULL,
  `cday` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE IF NOT EXISTS `tb_member` (
  `memberID` int(15) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`memberID`, `firstname`, `lastname`, `email`, `contact_number`, `address`) VALUES
(120, 'เฉลิมชัย', 'วีระเดช', 'bossyasbt@gmail.com', '0892423111', '11/1 หมู่ 7'),
(121, 'ทดสอบ', 'ได้ไหม', 'bossyasbt@gmail.com', '0892423187', '222'),
(122, 'ทดสอบ', 'รอบ2', 'bossyasbt@gmail.com', '0892423187', '248 หมู่ 1'),
(123, 'ทดสอบ', 'รอบ3', 'bossyasbt@gmail.com', '0892423187', '248 หมู่ 7'),
(124, 'ทดสอบ', 'รอบ4', 'bybossza@msn.com', '0891111111', '222'),
(125, 'ทดสอบ', 'รอบ5', 'bossyasbt@gmail.com', '1111111111', '111'),
(126, 'ทดสอบ', 'รอบ6', 'bossyasbt@gmail.com', '1111111111', '112');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reserve`
--

CREATE TABLE IF NOT EXISTS `tb_reserve` (
  `reserveID` int(15) NOT NULL,
  `memberID` varchar(50) NOT NULL,
  `roomID` int(30) NOT NULL,
  `days_no` varchar(40) NOT NULL,
  `total` int(10) NOT NULL,
  `totalamount` varchar(40) NOT NULL,
  `arrival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `transaction_code` varchar(30) NOT NULL,
  `Date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_reserve`
--

INSERT INTO `tb_reserve` (`reserveID`, `memberID`, `roomID`, `days_no`, `total`, `totalamount`, `arrival`, `departure`, `status`, `transaction_code`, `Date`) VALUES
(81, '120', 24, '2', 800, '', '04/03/2016', '06/03/2016', 'checkout', 'uh5efo7svyfr', '2016-03-06 14:25:00'),
(82, '121', 26, '1', 400, '', '05/03/2016', '06/03/2016', 'reserved', 'yg53kwt5qjo0', '2016-03-06 05:23:00'),
(83, '122', 25, '1', 400, '', '05/03/2016', '06/03/2016', 'checkout', '2dfaxr0gmbph', '2016-03-06 08:00:00'),
(84, '123', 24, '2', 800, '', '06/03/2016', '08/03/2016', 'checkout', 'osgksdwac8vt', '2016-03-08 12:00:00'),
(85, '124', 26, '2', 800, '', '08/03/2016', '10/03/2016', 'checkout', 's2fmvtmd64fi', '2016-03-10 10:00:00'),
(86, '125', 24, '1', 400, '', '08/03/2016', '09/03/2016', 'checkout', '5zmmjigvfrth', '2016-03-09 15:20:00'),
(87, '126', 23, '1', 400, '', '08/03/2016', '09/03/2016', 'checkout', 'sy7p803jqzwf', '2016-03-09 20:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rooms`
--

CREATE TABLE IF NOT EXISTS `tb_rooms` (
  `roomID` int(11) NOT NULL,
  `name` varchar(5) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rooms`
--

INSERT INTO `tb_rooms` (`roomID`, `name`, `description`, `price`, `status`) VALUES
(19, '1', 'ห้องน้ำ 1 เตียงนอน 2 มีเฟอร์นิเจอร์ครบ แอร์ ทีวี ตู้เย็น Wifi', 400, 'Available'),
(20, '2', 'ห้องน้ำ 1 เตียงนอน 2 มีเฟอร์นิเจอร์ครบ แอร์ ทีวี ตู้เย็น Wifi', 400, 'Available'),
(21, '3', 'ห้องน้ำ 1 เตียงนอน 2 มีเฟอร์นิเจอร์ครบ แอร์ ทีวี ตู้เย็น Wifi', 400, 'Available'),
(22, '4', 'ห้องน้ำ 1 เตียงนอน 2 มีเฟอร์นิเจอร์ครบ แอร์ ทีวี ตู้เย็น Wifi', 400, 'Available'),
(23, '5', 'ห้องน้ำ 1 เตียงนอน 2 มีเฟอร์นิเจอร์ครบ แอร์ ทีวี ตู้เย็น Wifi', 400, 'Available'),
(24, '6', 'ห้องน้ำ 1 เตียงนอน 2 มีเฟอร์นิเจอร์ครบ แอร์ ทีวี ตู้เย็น Wifi', 400, 'Available'),
(25, '7', 'ห้องน้ำ 1 เตียงนอน 2 มีเฟอร์นิเจอร์ครบ แอร์ ทีวี ตู้เย็น Wifi', 400, 'Available'),
(26, '8', 'ห้องน้ำ 1 เตียงนอน 2 มีเฟอร์นิเจอร์ครบ แอร์ ทีวี ตู้เย็น Wifi', 400, 'Available');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view1`
--
CREATE TABLE IF NOT EXISTS `view1` (
`name` varchar(5)
,`firstname` varchar(40)
,`lastname` varchar(40)
,`arrival` varchar(30)
,`departure` varchar(30)
,`status` varchar(30)
,`Date` datetime
,`total` int(10)
);

-- --------------------------------------------------------

--
-- Structure for view `view1`
--
DROP TABLE IF EXISTS `view1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kangamph_db`@`localhost` SQL SECURITY DEFINER VIEW `view1` AS select `tb_rooms`.`name` AS `name`,`tb_member`.`firstname` AS `firstname`,`tb_member`.`lastname` AS `lastname`,`tb_reserve`.`arrival` AS `arrival`,`tb_reserve`.`departure` AS `departure`,`tb_reserve`.`status` AS `status`,`tb_reserve`.`Date` AS `Date`,`tb_reserve`.`total` AS `total` from ((`tb_reserve` join `tb_member` on((`tb_member`.`memberID` = `tb_reserve`.`memberID`))) join `tb_rooms` on((`tb_rooms`.`roomID` = `tb_reserve`.`roomID`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_confiram`
--
ALTER TABLE `tb_confiram`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `tb_reserve`
--
ALTER TABLE `tb_reserve`
  ADD PRIMARY KEY (`reserveID`);

--
-- Indexes for table `tb_rooms`
--
ALTER TABLE `tb_rooms`
  ADD PRIMARY KEY (`roomID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_confiram`
--
ALTER TABLE `tb_confiram`
  MODIFY `cid` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `memberID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `tb_reserve`
--
ALTER TABLE `tb_reserve`
  MODIFY `reserveID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `tb_rooms`
--
ALTER TABLE `tb_rooms`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
