
--
-- Table structure for table `course_modules`
--

CREATE TABLE IF NOT EXISTS `course_modules` (
  `Course_ID` char(6) NOT NULL,
  `Module_ID` char(6) NOT NULL,
  `Year_of_Course` int(11) NOT NULL,
  PRIMARY KEY (`Course_ID`,`Module_ID`),
  KEY `Course_ID` (`Course_ID`),
  KEY `Module_ID` (`Module_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_modules`
--

INSERT INTO `course_modules` (`Course_ID`, `Module_ID`, `Year_of_Course`) VALUES
('CIM234', 'CM4025', 3),
('CNM898', 'CM4025', 2),
('IST876', 'CM4109', 4);

--
-- Constraints for table `course_modules`
--

ALTER TABLE `course_modules`
  ADD CONSTRAINT `course_modules_ibfk_2` FOREIGN KEY (`Module_ID`) REFERENCES `modules` (`Module_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_modules_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`Course_ID`) ON DELETE CASCADE ON UPDATE CASCADE;