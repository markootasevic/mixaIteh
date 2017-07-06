-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 01:52 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mixaiteh`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE IF NOT EXISTS `exam` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `professor_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `profFk` (`professor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ID`, `name`, `professor_id`) VALUES
(2, 'RMT', 1),
(3, 'OIKT', 1),
(4, 'Kvalitet', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_period`
--

DROP TABLE IF EXISTS `exam_period`;
CREATE TABLE IF NOT EXISTS `exam_period` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_period`
--

INSERT INTO `exam_period` (`ID`, `date_from`, `date_to`, `name`) VALUES
(1, '2017-07-04', '2017-07-30', 'junsi rok'),
(2, '2017-08-01', '2017-08-22', 'julski rok');

-- --------------------------------------------------------

--
-- Table structure for table `exam_period_exam`
--

DROP TABLE IF EXISTS `exam_period_exam`;
CREATE TABLE IF NOT EXISTS `exam_period_exam` (
  `exam_period_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`exam_period_id`,`exam_id`),
  KEY `FK_exam` (`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_period_exam`
--

INSERT INTO `exam_period_exam` (`exam_period_id`, `exam_id`, `time`) VALUES
(1, 2, '2017-07-07 00:00:00'),
(1, 4, '2017-07-07 00:00:00'),
(2, 2, '2017-07-09 00:00:00'),
(2, 3, '2017-07-07 00:00:00'),
(2, 4, '2017-07-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `professor_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_period_exam_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classPK` (`exam_id`),
  KEY `studentPK` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`professor_id`, `student_id`, `exam_id`, `grade`, `id`, `exam_period_exam_id`) VALUES
(1, 1, 3, 8, 3, 0),
(1, 2, 2, 9, 4, 0),
(1, 2, 3, 10, 5, 0),
(6, 6, 3, 10, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`ID`, `name`, `pass`) VALUES
(1, 'profa', '123'),
(5, 'profa2', '123'),
(6, 'profa4', '123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `name`, `pass`) VALUES
(1, 'student', ''),
(2, 's2', '123'),
(3, 'marko', '123'),
(4, 'mixa', '123'),
(5, 'mixa', '123'),
(6, 'mixa2', '123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_period_exam`
--
ALTER TABLE `exam_period_exam`
  ADD CONSTRAINT `FK_exam` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_exam_period` FOREIGN KEY (`exam_period_id`) REFERENCES `exam_period` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
