-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2017 at 10:49 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `camphostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocatelist`
--

CREATE TABLE IF NOT EXISTS `allocatelist` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mat_number` varchar(50) NOT NULL,
  `allocatedhostel` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocatelist`
--

INSERT INTO `allocatelist` (`firstname`, `lastname`, `email`, `mat_number`, `allocatedhostel`) VALUES
('a', 'b', 'daakwuru@gmail.com', 'u2013/5570059', 'Mandela A'),
('c', 'h', 'da@yahoo.com', 'u2013/5570098', 'Mandela B'),
('v', 'v', 'k@yahoo.com', 'mmm', 'Mandela A'),
('v', 'z', 'daakwuru@gmail.com', 'u2013/5570014', 'Mandela A'),
('DR UGWU', 'CHIDERE', 'daakwuru@gmail.com', 'U2013/5570012', 'Mandela A'),
('Ugbari', 'peterson', 'daakwuru@gmail.com', 'u2013/5570001', 'Mandela A'),
('victor ', 'Nwauwa', 'daakwuru@gmail.com', 'u2013/5570009', 'Mandela D'),
('samuel', 'ikpeme', 'samuelsees2@gmail.com', 'u2013/55777041', 'Mandela D');

-- --------------------------------------------------------

--
-- Table structure for table `create_hostel`
--

CREATE TABLE IF NOT EXISTS `create_hostel` (
  `hostelid` int(11) NOT NULL AUTO_INCREMENT,
  `hostelname` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `hosteltype` varchar(255) NOT NULL,
  `capacity2` int(11) NOT NULL,
  PRIMARY KEY (`hostelid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `create_hostel`
--

INSERT INTO `create_hostel` (`hostelid`, `hostelname`, `capacity`, `hosteltype`, `capacity2`) VALUES
(1, 'Mandela A', 0, 'Male', 5),
(2, 'Mandela B', 4, 'Female', 5),
(3, 'Mandela C', 5, 'Female', 5),
(4, 'Mandela D', 0, 'Male', 5),
(5, 'Mandela H', 8, 'Female', 8);

-- --------------------------------------------------------

--
-- Table structure for table `registeration`
--

CREATE TABLE IF NOT EXISTS `registeration` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `sex` char(6) NOT NULL,
  `level` int(3) NOT NULL,
  `handicap` char(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `uploadPhoto` varchar(255) DEFAULT NULL,
  `matnum` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `age` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `registeration`
--

INSERT INTO `registeration` (`firstname`, `lastname`, `dept`, `sex`, `level`, `handicap`, `email`, `password`, `uploadPhoto`, `matnum`, `id`, `age`) VALUES
('DR UGWU', 'CHIDERE', 'COMPUTER SCIENCE', 'Male', 100, 'No', 'daakwuru@gmail.com', '875838bc1ce27b2a0d00c94640b61b24a612b1fa', 'department.png', 'U2013/5570012', 16, 34),
('c', 'h', 'comp', 'Female', 400, 'No', 'da@yahoo.com', 'dd359640ce83a5d5525a4cd98eda285f25e82d08', '159.JPG', 'u2013/5570098', 13, 32),
('v', 'v', 'mm', 'Male', 100, 'No', 'k@yahoo.com', 'dd359640ce83a5d5525a4cd98eda285f25e82d08', '143.JPG', 'mmm', 14, 56),
('v', 'z', 'Maths', 'Male', 200, 'Yes', 'daakwuru@gmail.com', '5c1cab542e06b5ddca1dc90d2679a44c2c7fc5aa', 'alloc.png', 'u2013/5570014', 15, 34),
('a', 'b', 'com', 'Male', 400, 'Yes', 'daakwuru@gmail.com', 'dd359640ce83a5d5525a4cd98eda285f25e82d08', '167.jpg', 'u2013/5570059', 12, 32),
('b', 'b', 'computer science', 'Male', 400, 'No', 'daakwuru@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '172.JPG', 'u/0000/0000000', 9, 32),
('Ugbari', 'peterson', 'Computer science', 'Male', 100, 'Yes', 'daakwuru@gmail.com', 'ae2deb7bde8a24f6ebe913ee49cecfdd00c601f9', 'acc.png', 'u2013/5570001', 17, 32),
('victor ', 'Nwauwa', 'computer science', 'Male', 400, 'No', 'daakwuru@gmail.com', '88fa846e5f8aa198848be76e1abdcb7d7a42d292', 'IMG_5022.JPG', 'u2013/5570009', 18, 24),
('samuel', 'ikpeme', 'computer science', 'Male', 400, 'No', 'samuelsees2@gmail.com', '35782e220ed54928c23143934da0ff3ed8e49bf4', 'db.png', 'u2013/55777041', 19, 24);
