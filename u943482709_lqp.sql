
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2013 at 01:53 PM
-- Server version: 5.1.66
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u943482709_lqp`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `content`, `exam`, `type`, `choice_a`, `choice_b`, `choice_c`, `choice_d`, `answer`) VALUES
(1, 'n. pedant', 'TOEFL', 'Reading', 'person who denies that God exists', 'stick; staff; wand', 'meticulous person; fastidious person; strict person; fussy person', ' increase; profit; growth; addition', 'C'),
(2, 'Nothing could ever ABASH him.', 'TOEFL', 'Vocabulary', ' please', 'delight', 'embarrass', 'infuriate', 'C'),
(3, 'The doctor gave him some medicine to ABATE his pain.', 'TOEFL', 'Vocabulary', 'increase', 'reduce', 'augment', 'revive', 'B'),
(4, 'The train from Madrid arrives ______ noon.', 'TOEIC', 'Vocabulary', 'in', 'on ', 'over ', 'at', 'D'),
(5, 'The company has quit ______ in that magazine.', 'TOEIC', 'Vocabulary', 'to advertise', 'advertise', 'advertising', 'advertisement', 'C'),
(6, 'Western Components, Inc. is ______ than Consolidated Electronics Company.', 'TOEIC', 'Vocabulary', ' as reliable', 'most reliable', 'the reliable', 'more reliable', 'D'),
(7, 'Perdition', 'TOEIC', 'Vocabulary', 'Disagreement', 'Form', 'Echo', 'Damnation', 'D'),
(8, 'Pedantic', 'TOEIC', 'Vocabulary', 'Related', 'Unusual', 'Terse', 'Unimaginative', 'D'),
(9, 'Amend', 'TOEIC', 'Vocabulary', 'Preserve', 'Correct', 'Evaluate', 'Create', 'B'),
(10, 'Pedagogy', 'TOEIC', 'Vocabulary', 'Passion', 'Education', 'Photography', 'Suffering', 'B'),
(11, 'Burgeoning', 'TOEIC', 'Vocabulary', 'Blazing', 'Daring', 'Growing', 'Aching', 'C'),
(12, 'Capitulate', 'TOEIC', 'Vocabulary', 'Reduce', 'Include', 'Surrender', 'Disturb', 'C'),
(13, 'Propitiate', 'TOEIC', 'Vocabulary', 'Practice', 'Appease', 'Follow', 'Begin', 'B'),
(14, 'Amiable', 'TOEIC', 'Vocabulary', 'Common', 'Friendly', 'Hardworking', 'Used', 'B'),
(15, 'Anecdote', 'TOEIC', 'Vocabulary', 'Story', 'Exam', 'Belief', 'Friendship', 'A'),
(16, 'Audacity', 'TOEIC', 'Vocabulary', 'Graciousness', 'Helpessness', 'Capacity', 'Nerve', 'D'),
(17, 'Obsolete', 'TOEIC', 'Vocabulary', 'Highbrow', 'Outdated', 'Superior', 'Severe', 'B'),
(18, 'Extol', 'TOEIC', 'Vocabulary', 'Praise', 'Create', 'Decide', 'Tighten', 'A'),
(19, 'Factotum', '', 'Vocabulary', 'Servant', 'Instructor', 'Technician', 'Lawyer', 'A'),
(20, 'Incite', 'TOEIC', 'Vocabulary', 'Read', 'Hurry', 'Provoke', 'Prepare', 'C'),
(21, 'Opaque', 'TOEIC', 'Vocabulary', 'Forceful', 'Unclear', 'Sticky', 'Disorganized', 'B'),
(22, 'Incessant', 'TOEIC', 'Vocabulary', 'Shiny', 'Constant', 'Late', 'Playful', 'B'),
(23, 'Pandemonium', 'TOEIC', 'Vocabulary', 'Nature', 'Fiction', 'Medal', 'Uproar', 'D'),
(24, 'Extant', 'TOEIC', 'Vocabulary', 'Inferior', 'Motionless', 'Blossoming', 'Existing', 'D'),
(25, 'Indemnify', 'TOEIC', 'Vocabulary', 'Produce', 'Insure', 'Wail', 'Unify', 'B'),
(26, 'Extrapolate', 'TOEIC', 'Vocabulary', 'Pretend', 'Contain', 'Discuss', 'Infer', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `questions_info`
--

CREATE TABLE IF NOT EXISTS `questions_info` (
  `qid` int(11) NOT NULL,
  `user_added` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions_info`
--

INSERT INTO `questions_info` (`qid`, `user_added`, `date_added`) VALUES
(1, 'shu0ku0chi', '2013-12-19'),
(2, 'shu0ku0chi', '2013-12-19'),
(3, 'shu0ku0chi', '2013-12-19'),
(4, 'shu0ku0chi', '2013-12-19'),
(5, 'shu0ku0chi', '2013-12-19'),
(6, 'shu0ku0chi', '2013-12-19'),
(7, 'lqp2792', '2013-12-19'),
(8, 'lqp2792', '2013-12-19'),
(9, 'lqp2792', '2013-12-19'),
(10, 'lqp2792', '2013-12-19'),
(11, 'lqp2792', '2013-12-19'),
(12, 'lqp2792', '2013-12-19'),
(13, 'lqp2792', '2013-12-19'),
(14, 'lqp2792', '2013-12-19'),
(15, 'lqp2792', '2013-12-19'),
(16, 'lqp2792', '2013-12-19'),
(17, 'lqp2792', '2013-12-19'),
(18, 'lqp2792', '2013-12-19'),
(19, 'lqp2792', '2013-12-19'),
(20, 'lqp2792', '2013-12-19'),
(21, 'lqp2792', '2013-12-19'),
(22, 'lqp2792', '2013-12-19'),
(23, 'lqp2792', '2013-12-19'),
(24, 'lqp2792', '2013-12-19'),
(25, 'lqp2792', '2013-12-19'),
(26, 'lqp2792', '2013-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `questions_level`
--

CREATE TABLE IF NOT EXISTS `questions_level` (
  `qid` int(11) NOT NULL,
  `level` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`qid`,`level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions_level`
--

INSERT INTO `questions_level` (`qid`, `level`, `comment`) VALUES
(1, 'pre_inter', ''),
(2, 'inter', ''),
(3, 'inter', ''),
(4, 'pre_inter', ''),
(5, 'inter', ''),
(6, 'inter', ''),
(7, 'adv_inter', ''),
(8, 'adv_inter', ''),
(9, 'pre_inter', ''),
(10, 'adv_inter', ''),
(11, 'inter', ''),
(12, 'inter', ''),
(13, 'adv_inter', ''),
(14, 'pre_inter', ''),
(15, 'pre_inter', ''),
(16, 'inter', ''),
(17, 'pre_inter', ''),
(18, 'adv_inter', ''),
(19, 'inter', ''),
(20, 'inter', ''),
(21, 'pre_inter', ''),
(22, 'inter', ''),
(23, 'pre_inter', ''),
(24, 'adv_inter', ''),
(25, 'inter', ''),
(26, 'adv_inter', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `first_name`, `last_name`, `email`, `phone_number`, `registration_date`) VALUES
(1, 'lqp2792', '5d60af90733013d4809fe4aaf62038cd64672710', 'phu', 'le', 'lqp.2792@gmail.com', '0984343032', '2013-12-19'),
(2, 'shu0ku0chi', 'c009f3e519975fe24fa2a5c93cbff8ac1c82b194', 'Quang', 'Đỗ', 'shu0ku0chi@gmail.com', '01676057121', '2013-12-19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
