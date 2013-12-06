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