--
-- Table structure for table `reading list`
--

CREATE TABLE IF NOT EXISTS `reading_list` (
  `Module_ID` char(6) NOT NULL,
  `Book_ID` char(5) NOT NULL,
  PRIMARY KEY (`Module_ID`,`Book_ID`),
  KEY `Book_ID` (`Book_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Constraints for table `reading list`
--

ALTER TABLE `reading list`
  ADD CONSTRAINT `reading@0020list_ibfk_2` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`Book_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reading@0020list_ibfk_1` FOREIGN KEY (`Module_ID`) REFERENCES `modules` (`Module_ID`) ON DELETE CASCADE ON UPDATE CASCADE;