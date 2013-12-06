
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