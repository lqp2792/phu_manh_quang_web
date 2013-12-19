-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2013 at 02:50 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `english_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `exam` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `choice_a` text COLLATE utf8_unicode_ci NOT NULL,
  `choice_b` text COLLATE utf8_unicode_ci NOT NULL,
  `choice_c` text COLLATE utf8_unicode_ci NOT NULL,
  `choice_d` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions_info`
--

CREATE TABLE IF NOT EXISTS `questions_info` (
  `qid` int(11) NOT NULL,
  `user_added` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions_level`
--

CREATE TABLE IF NOT EXISTS `questions_level` (
  `qid` int(11) NOT NULL,
  `level` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`qid`,`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_date` date NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `first_name`, `last_name`, `email`, `phone_number`, `registration_date`) VALUES
(1, 'lqp2792', '5d60af90733013d4809fe4aaf62038cd64672710', 'phu', 'le', 'lqp.2792@gmail.com', '0984343032', '2013-12-15'),
(3, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test', 'manh', 'test@gmail.com', '0984343032', '2013-12-16'),
(4, 'test1', 'b444ac06613fc8d63795be9ad0beaf55011936ac', 'test', 'phu', 'test@gmail.com', '0984343032', '2013-12-16');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions_info`
--
ALTER TABLE `questions_info`
  ADD CONSTRAINT `questions_info_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions_level`
--
ALTER TABLE `questions_level`
  ADD CONSTRAINT `questions_level_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
