-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: db2119.perfora.net
-- Generation Time: Nov 06, 2009 at 03:59 AM
-- Server version: 5.0.81
-- PHP Version: 4.3.10-200.schlund.1
-- 
-- Database: `db302598722`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `shift`
-- 

CREATE TABLE `shift` (
  `ids` int(12) NOT NULL auto_increment,
  `clock_in` varchar(64) collate latin1_german2_ci NOT NULL,
  `clock_out` varchar(64) collate latin1_german2_ci NOT NULL,
  `date` varchar(64) collate latin1_german2_ci NOT NULL,
  `month` varchar(64) collate latin1_german2_ci NOT NULL,
  `year` varchar(128) collate latin1_german2_ci NOT NULL,
  `parent_id` varchar(64) collate latin1_german2_ci NOT NULL,
  `salary` varchar(64) collate latin1_german2_ci NOT NULL,
  `stats` varchar(16) collate latin1_german2_ci NOT NULL default '0',
  `total` decimal(15,2) NOT NULL,
  PRIMARY KEY  (`ids`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=29 ;

-- 
-- Dumping data for table `shift`
-- 

INSERT INTO `shift` VALUES (25, '11:09', '22:59', '05', '11', '2009', '8', '22', '1', '260.33');
INSERT INTO `shift` VALUES (24, '12:19', '22:59', '05', '11', '2009', '10', '22', '1', '234.67');
INSERT INTO `shift` VALUES (26, '00:27', '00:27', '06', '11', '2009', '10', '22', '1', '0.00');
INSERT INTO `shift` VALUES (27, '00:28', '01:13', '06', '11', '2009', '12', '44', '1', '33.00');
INSERT INTO `shift` VALUES (28, '00:28', '01:13', '06', '11', '2009', '8', '22', '1', '16.50');
