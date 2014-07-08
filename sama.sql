-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 07, 2014 at 02:24 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sama`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `entekhabi`
--

CREATE TABLE IF NOT EXISTS `entekhabi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lessonid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `entekhabi`
--

INSERT INTO `entekhabi` (`id`, `username`, `lessonid`) VALUES
(9, '999888', 659814556);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `time` varchar(25) CHARACTER SET utf8 NOT NULL,
  `teacher` varchar(255) CHARACTER SET utf8 NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat` varchar(255) CHARACTER SET utf8 NOT NULL,
  `serial` int(11) NOT NULL,
  `head` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `time`, `teacher`, `class`, `cat`, `serial`, `head`) VALUES
(3, 'فناوری اطلاعات', 'سه شنبه و پنج شنبه ها 3 ت', 'فرهاد خوشرو', 'ساختمان بی کلاس 11', 'اختصاصی', 659814556, 19),
(4, 'ادبیات', 'سه شنبه و جمعه ها ساعت 3 ', 'خیالی', 'مجازی پردیس', 'عمومی', 6598744, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vorodi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `lastname`, `email`, `password`, `vorodi`, `address`) VALUES
(2, '111222', 'یکی', 'دیگری', 'test@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '88', 'تبرییییز خیابان کردستان'),
(3, '999888', 'مهسا', 'سنمی', 'test2@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '89', 'تهران خ مدنی');
