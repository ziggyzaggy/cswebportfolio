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
('BIT567', 'Business Information Technology', 1, 4),
('CIM234', 'Computing for Internet and Multimedia', 1, 4),
('CNM898', 'Computer Network Management', 1, 4),
('IST876', 'Information Systems Technology(D)', 3, 2),
('CSC231', 'BSc Computer Science', 1, 5),
('INF672', 'BSc Information Systems', 1, 4),
('SEN993', 'MSc Software engineering', 1, 1),
('JAN234', 'MSc Javascript ninja', 3, 2),
('RSC555', 'MSc Rocket Science', 1, 5);
