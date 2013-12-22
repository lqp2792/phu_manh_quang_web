
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2013 at 01:51 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

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
(26, 'Extrapolate', 'TOEIC', 'Vocabulary', 'Pretend', 'Contain', 'Discuss', 'Infer', 'D'),
(27, 'amelioration', 'TOEFL', 'Vocabulary', 'cancellation', 'consideration', 'bribe', 'worsening', 'D'),
(28, 'probity', 'TOEFL', 'Vocabulary', 'corruptibility', 'audit', 'philosophy', 'avidity', 'A'),
(29, 'turpitude', 'TOEFL', 'Vocabulary', 'clever', 'lucidity', 'lively imagination', 'saintly', 'D'),
(30, 'ostentatious', 'TOEFL', 'Vocabulary', 'niggardly', 'divine', 'noisome', 'plain', 'D'),
(31, 'postulate', 'TOEFL', 'Vocabulary', 'defame', 'reject', 'congregate', 'verify', 'D'),
(32, 'nil:\r\nHis mark for that question was nil', 'TOEIC', 'Vocabulary', 'nothing', 'very bad', 'very good', 'in the middle', 'A'),
(33, 'quiz:\r\nWe made a quiz', 'TOEIC', 'Grammar', 'set of questions', 'serious mistake', 'boz for birds to make nest in', 'thong to hold arrows', 'A'),
(34, 'figure:\r\nIs this the right figure?', 'TOEIC', 'Vocabulary', 'place', 'number', 'time', 'answer', 'A'),
(35, 'accessory:\r\nThey gave us some accessories.', 'TOEIC', 'Vocabulary', 'ideas to choose between', 'official orders', 'extra pieces', 'papers giving us the right to enter a country', 'B'),
(36, 'upset:\r\nI am upset.', 'TOEIC', 'Vocabulary', 'tired', 'famous', 'rich', 'unhappy', 'A'),
(37, 'kindergarten:\r\nThis a good kindergarten.', 'TOEIC', 'Vocabulary', 'place where you may borrow books', 'place of learning for children too young for school', 'strong, deep bag carried on the back', 'activity that follow you to forget your worries', 'B'),
(38, 'strangle:\r\nHe strangled her.', 'TOEIC', 'Vocabulary', 'gave her all the things she wanted', 'took her away by force', 'admired her greatly', 'killed her by pressing her thoat', 'B'),
(39, 'canonical:\r\nThese are canonical examples.', 'TOEIC', 'Vocabulary', 'examples which break the usual rules', 'examples discovered very recently', 'examples taken from a religious book', 'regular and widely accepted examples', 'B'),
(40, 'scrub:\r\nHe is scrubbing it.', 'TOEIC', 'Vocabulary', 'rubbing it hard to clean it', 'repairing it', 'drawing simple pictures of it', 'cutting shallow lines to it', 'C'),
(41, 'stealth:\r\nThey did it by stealth.', 'TOEIC', 'Vocabulary', 'taking no notice of problems they met', 'spending a large amount of money', 'hurting someone so much that they argreed to thier demands', 'moving secretly with extreme care and quietness', 'D'),
(42, 'puma:\r\nThey saw a puma.', 'TOEIC', 'Vocabulary', 'small house made of mud bricks', 'tree from hot, dry countries', 'large wild cat', 'very strong wind that sucks up anything in its path', 'C'),
(43, 'travail', 'TOEIC', 'Vocabulary', 'excitement', 'trouble', 'exaggeration', 'relaxation', 'D'),
(44, 'mannered', 'TOEIC', 'Vocabulary', 'infantile', 'progressive', 'natural', 'ignorant', 'C'),
(45, 'deposition', 'TOEIC', 'Vocabulary', 'process of eroding', 'process of congealing', 'process of condensing', 'process of evolving', 'A'),
(46, 'chasten', '', 'Vocabulary', 'refute', 'accept', 'avoid', 'reward', 'D'),
(47, 'convoke', '', 'Vocabulary', 'adjourn', 'forgive', 'omit', 'abridge', 'B');

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
(26, 'lqp2792', '2013-12-19'),
(27, 'shu0ku0chi', '2013-12-19'),
(28, 'shu0ku0chi', '2013-12-19'),
(29, 'shu0ku0chi', '2013-12-19'),
(30, 'shu0ku0chi', '2013-12-19'),
(31, 'shu0ku0chi', '2013-12-19'),
(32, 'lqp2792', '2013-12-20'),
(33, 'lqp2792', '2013-12-20'),
(0, 'lqp2792', '2013-12-20'),
(34, 'lqp2792', '2013-12-20'),
(35, 'lqp2792', '2013-12-20'),
(36, 'lqp2792', '2013-12-20'),
(37, 'lqp2792', '2013-12-20'),
(38, 'lqp2792', '2013-12-20'),
(39, 'lqp2792', '2013-12-20'),
(40, 'lqp2792', '2013-12-20'),
(41, 'lqp2792', '2013-12-20'),
(42, 'lqp2792', '2013-12-20'),
(43, 'shu0ku0chi', '2013-12-20'),
(44, 'shu0ku0chi', '2013-12-20'),
(45, 'shu0ku0chi', '2013-12-20'),
(46, 'shu0ku0chi', '2013-12-20'),
(47, 'shu0ku0chi', '2013-12-20');

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
(26, 'adv_inter', ''),
(27, 'inter', ''),
(28, 'inter', ''),
(29, 'inter', ''),
(30, 'inter', ''),
(31, 'inter', ''),
(32, 'pre_inter', ''),
(33, 'pre_inter', ''),
(0, 'pre_inter', ''),
(34, 'pre_inter', ''),
(35, 'pre_inter', ''),
(36, 'pre_inter', ''),
(37, 'pre_inter', ''),
(38, 'pre_inter', ''),
(39, 'pre_inter', ''),
(40, 'pre_inter', ''),
(41, 'pre_inter', ''),
(42, 'pre_inter', ''),
(43, 'pre_inter', ''),
(44, 'pre_inter', ''),
(45, 'pre_inter', ''),
(46, 'pre_inter', ''),
(47, 'pre_inter', '');

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
