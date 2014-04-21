-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2010 at 08:08 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `activesearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `numeric`
--

CREATE TABLE IF NOT EXISTS `numeric` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` text CHARACTER SET latin1 COLLATE latin1_general_cs,
  `answer` text CHARACTER SET latin1 COLLATE latin1_general_cs,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `numeric`
--


-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET latin1 COLLATE latin1_general_cs,
  `title` text CHARACTER SET latin1 COLLATE latin1_general_cs,
  `link` text CHARACTER SET latin1 COLLATE latin1_general_cs,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `description`, `title`, `link`) VALUES
(71, 'da9c10d24ad18a63e74ee9ece5301dc7', 'kuntau', 'http://#'),
(67, '76a158c55e157499bd3a62f281f86c6e', 'kentut', 'http://#'),
(37, '870f669e4bbbfa8a6fde65549826d1c4', 'kepala', 'http://#'),
(36, '1fc78cb0aba792302f1c0dc7195c1c76', 'unta', 'http://#'),
(38, 'feb43cd263bae6df3446e41a643f1a92', 'hensem', 'http://#'),
