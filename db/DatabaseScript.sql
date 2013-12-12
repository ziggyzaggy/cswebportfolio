-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: 10.12.13.14
-- Generation Time: Dec 11, 2013 at 01:01 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db1207569_coursework`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `Book_ID` char(5) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `First_Author` varchar(30) NOT NULL,
  `Second_Author` varchar(30) DEFAULT NULL,
  `Publisher` varchar(50) NOT NULL,
  `Year` year(4) NOT NULL,
  `Content_Summary` varchar(100) NOT NULL,
  PRIMARY KEY (`Book_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_ID`, `Title`, `First_Author`, `Second_Author`, `Publisher`, `Year`, `Content_Summary`) VALUES
('BK001', 'Database design for mere mortals', 'Hernandez, Michael J.', NULL, 'Addison-Wesley,', 2013, 'Database, Design, Beginners, DBMS'),
('BK055', 'Digital media primer', 'Wong, Yue-Ling', 'Banks, Carlton', 'Addison-Wesley,', 2013, 'Database, Design, Beginners, DBMS'),
('BK212', 'Technology for education and learning ', 'Tan, Honghua', NULL, 'Springer', 2012, 'Technology, DBMS, Coding, Business'),
('BK313', 'PHP solutions : dynamic web design made easy', 'Powers, David', 'Jess, Eion', 'friends of ED', 2010, 'PHP, Script, Coding, Web Applications');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `Course_ID` char(6) NOT NULL,
  `Course_Title` varchar(150) NOT NULL,
  `Year_of_Entry` enum('1','3') NOT NULL,
  `Course_duration` enum('1','2','4') NOT NULL,
  PRIMARY KEY (`Course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_ID`, `Course_Title`, `Year_of_Entry`, `Course_duration`) VALUES
('BIT567', 'Business Information Technology', '1', '4'),
('CIM234', 'Computing for Internet and Multimedia', '1', '4'),
('CNM898', 'Computer Network Management', '1', '4'),
('CSC231', 'BSc Computer Science', '1', '4'),
('INF672', 'BSc Information Systems', '1', '4'),
('IST876', 'Information Systems Technology(D)', '3', '2'),
('JAN234', 'MSc Javascript ninja', '3', '2'),
('RSC555', 'MSc Rocket Science', '1', '4'),
('SEN993', 'MSc Software engineering', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course_modules`
--

CREATE TABLE IF NOT EXISTS `course_modules` (
  `Course_ID` char(6) NOT NULL,
  `Module_ID` char(6) NOT NULL,
  `Year_of_Course` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`Course_ID`,`Module_ID`),
  KEY `Course_ID` (`Course_ID`),
  KEY `Module_ID` (`Module_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_modules`
--

INSERT INTO `course_modules` (`Course_ID`, `Module_ID`, `Year_of_Course`) VALUES
('CIM234', 'CM4025', '3'),
('CNM898', 'CM4025', '2'),
('IST876', 'CM4109', '4');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `Module_ID` char(6) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`Module_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`Module_ID`, `Title`, `Description`) VALUES
('CM3028', 'Web Application Development', 'To provide students with experience in developing  web applications with non-trivial functionality.'),
('CM4025', 'Enterprise Web Systems', 'Enterprise applications on the web designed to interface with other enterprise applications'),
('CM4109', 'Business Intelligence', 'The main concepts and benefits associated with data management and warehousing.');

-- --------------------------------------------------------

--
-- Table structure for table `reading_list`
--

CREATE TABLE IF NOT EXISTS `reading_list` (
  `Module_ID` char(6) NOT NULL,
  `Book_ID` char(5) NOT NULL,
  PRIMARY KEY (`Module_ID`,`Book_ID`),
  KEY `Book_ID` (`Book_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reading_list`
--

INSERT INTO `reading_list` (`Module_ID`, `Book_ID`) VALUES
('CM4109', 'BK001'),
('CM4109', 'BK055'),
('CM3028', 'BK212');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_modules`
--
ALTER TABLE `course_modules`
  ADD CONSTRAINT `course_modules_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`Course_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_modules_ibfk_2` FOREIGN KEY (`Module_ID`) REFERENCES `modules` (`Module_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reading_list`
--
ALTER TABLE `reading_list`
  ADD CONSTRAINT `reading list_ibfk_2` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`Book_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading list_ibfk_1` FOREIGN KEY (`Module_ID`) REFERENCES `modules` (`Module_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
