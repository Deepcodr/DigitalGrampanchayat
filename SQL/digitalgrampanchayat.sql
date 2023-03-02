-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 10:30 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalgrampanchayat`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `applicationid` int(11) NOT NULL,
  `applicationname` varchar(255) NOT NULL,
  `applicationdate` datetime NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`applicationid`, `applicationname`, `applicationdate`, `userid`, `status`) VALUES
(1, 'watertankerapplication', '2023-03-02 00:04:53', 6, 0),
(2, 'watertankerapplication', '2023-03-02 00:08:24', 6, 0),
(3, 'birthregistrationapplication', '2023-03-02 12:24:27', 6, 0),
(4, 'birthregistrationapplication', '2023-03-02 12:25:45', 6, 0),
(5, 'birthregistrationapplication', '2023-03-02 12:26:17', 6, 0),
(6, 'birthregistrationapplication', '2023-03-02 12:26:33', 6, 0),
(7, 'birthregistrationapplication', '2023-03-02 12:29:06', 6, 0),
(8, 'birthregistrationapplication', '2023-03-02 12:29:54', 6, 0),
(9, 'residentregistrationapplication', '2023-03-02 12:47:58', 6, 0),
(10, 'marriageregistrationapplication', '2023-03-02 13:03:56', 6, 0),
(11, 'marriageregistrationapplication', '2023-03-02 13:05:17', 6, 0),
(12, 'businessnocregistrationapplication', '2023-03-02 14:17:28', 6, 0),
(13, 'businessnocregistrationapplication', '2023-03-02 14:18:33', 6, 0),
(14, 'businessnocregistrationapplication', '2023-03-02 14:42:01', 6, 0),
(15, 'businessnocregistrationapplication', '2023-03-02 14:42:23', 6, 0),
(16, 'electricitynocregistrationapplication', '2023-03-02 14:52:04', 6, 0),
(17, 'electricitynocregistrationapplication', '2023-03-02 14:52:42', 6, 0),
(18, 'electricitynocregistrationapplication', '2023-03-02 14:53:13', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `approvalid` int(11) NOT NULL,
  `applicationid` int(11) NOT NULL,
  `approvaldate` datetime NOT NULL DEFAULT current_timestamp(),
  `validity` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `birthcert`
--

CREATE TABLE `birthcert` (
  `id` int(11) NOT NULL,
  `applicationid` int(11) NOT NULL,
  `applicationname` varchar(255) NOT NULL,
  `applicantname` varchar(255) NOT NULL,
  `applicantemail` varchar(50) NOT NULL,
  `applicantmobile` int(10) NOT NULL,
  `applicantaddress` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `personname` varchar(255) NOT NULL,
  `dateofevent` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `personperadd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birthcert`
--

INSERT INTO `birthcert` (`id`, `applicationid`, `applicationname`, `applicantname`, `applicantemail`, `applicantmobile`, `applicantaddress`, `type`, `personname`, `dateofevent`, `fname`, `mname`, `personperadd`) VALUES
(1, 11, 'marriageregistrationapplication', 'fasdf', 'dsfasdf', 12333, 'adfasdf', 'marriage', 'dfasdf', 'dfasdf', 'dsafasdf', 'sdfsd', 'dfasd');

-- --------------------------------------------------------

--
-- Table structure for table `busnoc`
--

CREATE TABLE `busnoc` (
  `id` int(11) NOT NULL,
  `applicationid` int(11) NOT NULL,
  `applicantname` varchar(255) NOT NULL,
  `applicantemail` varchar(50) NOT NULL,
  `applicantmobile` int(10) NOT NULL,
  `applicantaddress` text NOT NULL,
  `certificatename` varchar(255) NOT NULL,
  `gno` int(11) NOT NULL,
  `applicationname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `busnoc`
--

INSERT INTO `busnoc` (`id`, `applicationid`, `applicantname`, `applicantemail`, `applicantmobile`, `applicantaddress`, `certificatename`, `gno`, `applicationname`) VALUES
(1, 12, 'erqwer', 'reqerq', 23423, 'fdgsdfg', 'qerqe', 43234, 'businessnocregistrationapplication'),
(2, 13, 'erqwer', 'reqerq', 23423, 'fdgsdfg', 'qerqe', 43234, 'businessnocregistrationapplication');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `certificateid` int(11) NOT NULL,
  `certificatename` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `applicationid` int(11) NOT NULL,
  `validity` date NOT NULL DEFAULT current_timestamp(),
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cnstpermit`
--

CREATE TABLE `cnstpermit` (
  `id` int(11) NOT NULL,
  `applicationid` int(11) NOT NULL,
  `applicationname` varchar(255) NOT NULL,
  `applicantname` varchar(255) NOT NULL,
  `applicantemail` varchar(50) NOT NULL,
  `applicantmobile` int(10) NOT NULL,
  `applicantaddress` text NOT NULL,
  `gno` int(11) NOT NULL,
  `lengthofp` int(11) NOT NULL,
  `widthofp` int(11) NOT NULL,
  `cnsttype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cnstpermit`
--

INSERT INTO `cnstpermit` (`id`, `applicationid`, `applicationname`, `applicantname`, `applicantemail`, `applicantmobile`, `applicantaddress`, `gno`, `lengthofp`, `widthofp`, `cnsttype`) VALUES
(1, 15, 'businessnocregistrationapplication', 'wetwet', 'wertwe', 423, 'fgdfg', 23423, 23423, 234234, 'RCC');

-- --------------------------------------------------------

--
-- Table structure for table `deathbirthreg`
--

CREATE TABLE `deathbirthreg` (
  `id` int(11) NOT NULL,
  `applicationid` int(11) NOT NULL,
  `applicationname` varchar(255) NOT NULL,
  `applicantname` varchar(255) NOT NULL,
  `applicantemail` varchar(50) NOT NULL,
  `applicantmobile` int(10) NOT NULL,
  `applicantaddress` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `personname` varchar(255) NOT NULL,
  `dateofevent` varchar(50) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `reasonofdeath` text DEFAULT NULL,
  `permanantadd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deathbirthreg`
--

INSERT INTO `deathbirthreg` (`id`, `applicationid`, `applicationname`, `applicantname`, `applicantemail`, `applicantmobile`, `applicantaddress`, `type`, `personname`, `dateofevent`, `Age`, `fname`, `mname`, `reasonofdeath`, `permanantadd`) VALUES
(0, 8, 'birthregistrationapplication', 'deepak', 'deeap', 1234234, 'dafdlsfjl', 'birth', 'dsfda', 'adfa', 0, 'asdfas', 'adfadf', 'dsfas', 'adfads');

-- --------------------------------------------------------

--
-- Table structure for table `elecnoc`
--

CREATE TABLE `elecnoc` (
  `id` int(11) NOT NULL,
  `applicationid` int(11) NOT NULL,
  `applicationname` varchar(255) NOT NULL,
  `applicantname` varchar(255) NOT NULL,
  `applicantemail` varchar(50) NOT NULL,
  `applicantmobile` int(10) NOT NULL,
  `applicantaddress` text NOT NULL,
  `gno` int(11) NOT NULL,
  `typeofelec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elecnoc`
--

INSERT INTO `elecnoc` (`id`, `applicationid`, `applicationname`, `applicantname`, `applicantemail`, `applicantmobile`, `applicantaddress`, `gno`, `typeofelec`) VALUES
(1, 17, 'electricitynocregistrationapplication', 'dafads', 'afddf', 23423, 'sgfgf', 324, 'Residential'),
(2, 18, 'electricitynocregistrationapplication', 'dafads', 'afddf', 23423, 'sgfgf', 324, 'Residential');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fileid` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `fileurl` varchar(255) NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `filesize` int(11) NOT NULL,
  `applicationid` int(11) NOT NULL,
  `certificateid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileid`, `filename`, `filepath`, `fileurl`, `filetype`, `filesize`, `applicationid`, `certificateid`) VALUES
(1, '20233275954.jpg', '../files/deathreg/20233275954.jpg', '../files/deathreg/', 'image/jpeg', 43939, 8, NULL),
(2, '202332759541.jpg', '../files/deathreg/202332759541.jpg', '../files/deathreg/', 'image/jpeg', 184188, 8, NULL),
(3, '20233281758.jpg', '../files/domicile/20233281758.jpg', '../files/domicile/', 'image/jpeg', 245394, 9, NULL),
(4, '202332817581.jpg', '../files/domicile/202332817581.jpg', '../files/domicile/', 'image/jpeg', 253778, 9, NULL),
(5, '20233294728.jpg', '../files/businessnoc/20233294728.jpg', '../files/businessnoc/', 'image/jpeg', 60251, 12, NULL),
(6, '202332947281.jpg', '../files/businessnoc/202332947281.jpg', '../files/businessnoc/', 'image/jpeg', 43939, 12, NULL),
(7, '202332947282.jpg', '../files/businessnoc/202332947282.jpg', '../files/businessnoc/', 'image/jpeg', 43939, 12, NULL),
(8, '20233294833.jpg', '../files/businessnoc/20233294833.jpg', '../files/businessnoc/', 'image/jpeg', 60251, 13, NULL),
(9, '202332948331.jpg', '../files/businessnoc/202332948331.jpg', '../files/businessnoc/', 'image/jpeg', 43939, 13, NULL),
(10, '202332948332.jpg', '../files/businessnoc/202332948332.jpg', '../files/businessnoc/', 'image/jpeg', 43939, 13, NULL),
(11, '20233210121.jpg', '../files/constpermit/20233210121.jpg', '../files/constpermit/', 'image/jpeg', 60251, 14, NULL),
(12, '202332101211.jpg', '../files/constpermit/202332101211.jpg', '../files/constpermit/', 'image/jpeg', 60251, 14, NULL),
(13, '202332101212.jpg', '../files/constpermit/202332101212.jpg', '../files/constpermit/', 'image/jpeg', 60251, 14, NULL),
(14, '202332101213.jpg', '../files/constpermit/202332101213.jpg', '../files/constpermit/', 'image/jpeg', 60251, 14, NULL),
(15, '202332101223.jpg', '../files/constpermit/202332101223.jpg', '../files/constpermit/', 'image/jpeg', 60251, 15, NULL),
(16, '2023321012231.jpg', '../files/constpermit/2023321012231.jpg', '../files/constpermit/', 'image/jpeg', 60251, 15, NULL),
(17, '2023321012232.jpg', '../files/constpermit/2023321012232.jpg', '../files/constpermit/', 'image/jpeg', 60251, 15, NULL),
(18, '2023321012233.jpg', '../files/constpermit/2023321012233.jpg', '../files/constpermit/', 'image/jpeg', 60251, 15, NULL),
(19, '2023321012234.jpg', '../files/constpermit/2023321012234.jpg', '../files/constpermit/', 'image/jpeg', 60251, 15, NULL),
(20, '2023321012235.jpg', '../files/constpermit/2023321012235.jpg', '../files/constpermit/', 'image/jpeg', 60251, 15, NULL),
(21, '20233210224.jpg', '../files/businessnoc/20233210224.jpg', '../files/businessnoc/', 'image/jpeg', 60251, 16, NULL),
(22, '202332102241.jpg', '../files/businessnoc/202332102241.jpg', '../files/businessnoc/', 'image/jpeg', 60251, 16, NULL),
(23, '202332102242.jpg', '../files/businessnoc/202332102242.jpg', '../files/businessnoc/', 'image/jpeg', 60251, 16, NULL),
(24, '202332102242.jpg', '../files/businessnoc/202332102242.jpg', '../files/businessnoc/', 'image/jpeg', 60251, 17, NULL),
(25, '2023321022421.jpg', '../files/businessnoc/2023321022421.jpg', '../files/businessnoc/', 'image/jpeg', 60251, 17, NULL),
(26, '2023321022422.jpg', '../files/businessnoc/2023321022422.jpg', '../files/businessnoc/', 'image/jpeg', 60251, 17, NULL),
(27, '202332102313.jpg', '../files/elecnoc/202332102313.jpg', '../files/elecnoc/', 'image/jpeg', 60251, 18, NULL),
(28, '2023321023131.jpg', '../files/elecnoc/2023321023131.jpg', '../files/elecnoc/', 'image/jpeg', 60251, 18, NULL),
(29, '2023321023132.jpg', '../files/elecnoc/2023321023132.jpg', '../files/elecnoc/', 'image/jpeg', 60251, 18, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `queryid` int(11) NOT NULL,
  `applicationid` int(11) NOT NULL,
  `queryname` varchar(255) NOT NULL,
  `querycontent` varchar(255) NOT NULL,
  `querycreationtime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `id` int(11) NOT NULL,
  `applicationid` int(11) NOT NULL,
  `applicationname` varchar(255) NOT NULL,
  `applicantname` varchar(255) NOT NULL,
  `applicantemail` varchar(50) NOT NULL,
  `applicantmobile` int(10) NOT NULL,
  `applicantaddress` text NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`id`, `applicationid`, `applicationname`, `applicantname`, `applicantemail`, `applicantmobile`, `applicantaddress`, `type`) VALUES
(1, 9, 'residentregistrationapplication', 'adfasd', 'sdfas', 34324, 'dafsd', 'resident');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `usertype` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `usertype`, `username`, `phone`, `email`, `password`, `name`) VALUES
(1, 0, 'deepak', '8828364418', 'deepak@email.com', 'abcd@1234', 'Deepak Patil'),
(6, 0, 'deepak@abcd.com', '123456789', 'deepak@abcd.com', 'deepak', 'deepak patil');

-- --------------------------------------------------------

--
-- Table structure for table `watertanker`
--

CREATE TABLE `watertanker` (
  `id` int(11) NOT NULL,
  `applicationid` int(11) NOT NULL,
  `applicantname` varchar(255) NOT NULL,
  `applicantemail` varchar(50) NOT NULL,
  `applicantmobile` int(10) NOT NULL,
  `applicantaddress` varchar(255) NOT NULL,
  `socialamount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watertanker`
--

INSERT INTO `watertanker` (`id`, `applicationid`, `applicantname`, `applicantemail`, `applicantmobile`, `applicantaddress`, `socialamount`) VALUES
(1, 2, 'deepak', 'deepak', 1234, 'deepak', 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applicationid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`approvalid`),
  ADD KEY `applicationid` (`applicationid`);

--
-- Indexes for table `birthcert`
--
ALTER TABLE `birthcert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicationid` (`applicationid`);

--
-- Indexes for table `busnoc`
--
ALTER TABLE `busnoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicationid` (`applicationid`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`certificateid`),
  ADD KEY `applicationid` (`applicationid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `cnstpermit`
--
ALTER TABLE `cnstpermit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicationid` (`applicationid`);

--
-- Indexes for table `deathbirthreg`
--
ALTER TABLE `deathbirthreg`
  ADD KEY `applicationid` (`applicationid`);

--
-- Indexes for table `elecnoc`
--
ALTER TABLE `elecnoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicationid` (`applicationid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileid`),
  ADD KEY `applicationid` (`applicationid`),
  ADD KEY `certificateid` (`certificateid`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`queryid`),
  ADD KEY `applicationid` (`applicationid`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicationid` (`applicationid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `watertanker`
--
ALTER TABLE `watertanker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicationid` (`applicationid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `applicationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `approvalid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `birthcert`
--
ALTER TABLE `birthcert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `busnoc`
--
ALTER TABLE `busnoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `certificateid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cnstpermit`
--
ALTER TABLE `cnstpermit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `elecnoc`
--
ALTER TABLE `elecnoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `queryid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `watertanker`
--
ALTER TABLE `watertanker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `approvals`
--
ALTER TABLE `approvals`
  ADD CONSTRAINT `approvals_ibfk_1` FOREIGN KEY (`applicationid`) REFERENCES `applications` (`applicationid`);

--
-- Constraints for table `birthcert`
--
ALTER TABLE `birthcert`
  ADD CONSTRAINT `birthcert_ibfk_1` FOREIGN KEY (`applicationid`) REFERENCES `applications` (`applicationid`);

--
-- Constraints for table `busnoc`
--
ALTER TABLE `busnoc`
  ADD CONSTRAINT `busnoc_ibfk_1` FOREIGN KEY (`applicationid`) REFERENCES `applications` (`applicationid`);

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`applicationid`) REFERENCES `applications` (`applicationid`),
  ADD CONSTRAINT `certificates_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `cnstpermit`
--
ALTER TABLE `cnstpermit`
  ADD CONSTRAINT `cnstpermit_ibfk_1` FOREIGN KEY (`applicationid`) REFERENCES `applications` (`applicationid`);

--
-- Constraints for table `deathbirthreg`
--
ALTER TABLE `deathbirthreg`
  ADD CONSTRAINT `deathbirthreg_ibfk_1` FOREIGN KEY (`applicationid`) REFERENCES `applications` (`applicationid`);

--
-- Constraints for table `elecnoc`
--
ALTER TABLE `elecnoc`
  ADD CONSTRAINT `elecnoc_ibfk_1` FOREIGN KEY (`applicationid`) REFERENCES `applications` (`applicationid`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`applicationid`) REFERENCES `applications` (`applicationid`),
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`certificateid`) REFERENCES `certificates` (`certificateid`);

--
-- Constraints for table `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `queries_ibfk_1` FOREIGN KEY (`applicationid`) REFERENCES `applications` (`applicationid`);

--
-- Constraints for table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`applicationid`) REFERENCES `applications` (`applicationid`);

--
-- Constraints for table `watertanker`
--
ALTER TABLE `watertanker`
  ADD CONSTRAINT `watertanker_ibfk_1` FOREIGN KEY (`applicationid`) REFERENCES `applications` (`applicationid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
