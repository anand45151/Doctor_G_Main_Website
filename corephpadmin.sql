-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 18, 2024 at 02:15 PM
-- Server version: 8.0.35
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corephpadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

DROP TABLE IF EXISTS `admin_accounts`;
CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `series_id` varchar(60) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `admin_type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `user_name`, `password`, `series_id`, `remember_token`, `expires`, `admin_type`) VALUES
(4, 'superadmin', '$2y$10$eo7.w0Ttuy8mOBMvDlGqDeewQERkXu//7qO3jXp5NC76LwfAZpNrO', 'rvuWJHMd5LTxLC2J', '$2y$10$LDUi4w/UAM2PgfMoKkLo4.igJX39G5/WQOEDHRaDy3y2KZeIxXggm', '2019-02-16 22:39:57', 'super'),
(7, 'anand', '$2y$10$OrQFRZdSUP3X2kvGZrg.zeplQkxcJAq1s6atRehyCpbEvOVPu8KPe', NULL, NULL, NULL, 'admin'),
(8, 'admin', '$2y$10$RnDwpen5c8.gtZLaxHEHDOKWY77t/20A4RRkWBsjlPuu7Wmy0HyBu', '9UFKxPkz13facKG0', '$2y$10$ERc/EH7ZpGZlxs4e3WxWgeVMIh4pnjoFuiPRaaMtpZnFmPim2gtpa', '2024-09-30 02:47:46', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `f_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `f_name`, `l_name`, `gender`, `address`, `city`, `state`, `phone`, `email`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(1, 'chetan', 'Shenai', 'female', 'waaw awf', NULL, 'Maharashtra', '99878', 'chetanshenai9@gmail.com', '2019-07-23', '2019-07-22 20:12:30', '2019-07-22 20:12:41'),
(3, 'SHANI ', 'PANDEY ', 'male', 'HARIDARSHAN SOCIETY A-11 AASPAAS TEEN RASTA SURAT\r\nGUJARAT', NULL, 'Maharashtra', '06352819486', 'shani123@gmail.com', '2003-12-25', '2024-08-10 04:05:22', NULL),
(4, 'RSP', 'RSP', 'male', 'HARIDARSHAN SOCIETY A-11 AASPAAS TEEN RASTA SURAT\r\nGUJARAT', NULL, 'Maharashtra', '06352819486', 'rsp@gmail.com', '2003-12-06', '2024-08-11 03:54:59', NULL),
(6, 'Anand', 'Yadav', 'Male', 'fjfjgj', 'jgjgjg', 'jgjgjg', '916352819486', 'ay7984267173@gmail.com', '2003-12-12', NULL, NULL),
(7, 'shanj', 'pandaya', 'Female', 'surat', 'surat', 'gujrata', '916352819486', 'shanj@gmaik.com', '2002-12-12', NULL, NULL),
(8, 'shanj', 'pandaya', 'Female', 'surat', 'surat', 'gujrata', '916352819486', 'ay798426717@gmail.com', '2002-12-12', NULL, NULL),
(9, 'Anand', 'Yadav', 'Male', 'sbdgdb', 'ebdhsb', 'dhdgsb', '916352819486', 'ay79842173@gmail.com', '2002-12-12', NULL, NULL),
(10, 'Akriti', 'Mishara', 'Male', 'Surat', 'Surat', 'Gujarat', '6352819486', 'akriti23@gmail.com', '2003-12-12', NULL, NULL),
(11, 'Shubham Kumar', 'Jha', 'male', 'dindoli', NULL, 'Maharashtra', '7874892635', 'shubhamjha23@gmail.com', '2000-01-01', '2024-08-30 09:18:51', '2024-08-30 09:19:28'),
(13, 'bbbb', 'cccc', 'Male', 'hhhh', 'kkkkk', 'gggg', '369258177', 'aaa@ggg.cc', '2002-12-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `Doctor_id` int NOT NULL AUTO_INCREMENT,
  `Doctor_Name` varchar(250) NOT NULL,
  `Doctor_Specialty` varchar(250) NOT NULL,
  `Doctor_Experiences` varchar(250) NOT NULL,
  `Doctor_Location` varchar(250) NOT NULL,
  `Doctor_Photo` blob,
  PRIMARY KEY (`Doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=565 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Doctor_id`, `Doctor_Name`, `Doctor_Specialty`, `Doctor_Experiences`, `Doctor_Location`, `Doctor_Photo`) VALUES
(21, 'NEHA', 'Kidney', '1.2', 'Surat', 0x64352e6a7067),
(41, 'Shaikh', 'Heart', '1.2', 'Haridarshn A-11 Surat ,Gujarat.', 0x64352e6a7067),
(45, 'SHIMA', 'HEART', '1.2', 'SURAT', 0x64342e6a7067),
(65, 'SHANI', 'LEG', '1.2', 'SURAT', 0x696d6167652e706e67),
(84, 'NEHA', 'HEART', '1.2', 'SURAT', 0x65646d6c612e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `medicalstores`
--

DROP TABLE IF EXISTS `medicalstores`;
CREATE TABLE IF NOT EXISTS `medicalstores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shopowername` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `opentime` varchar(100) NOT NULL,
  `closetime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medicalstores`
--

INSERT INTO `medicalstores` (`id`, `shopowername`, `address`, `contact`, `shopname`, `opentime`, `closetime`) VALUES
(1, 'oppo', 'opopo', '6352819486', 'lklkl', '12:05 AM', '9:10 PM'),
(2, 'opopo', 'opopo', '5656565565', 'popopop', '12:05 AM', '9:10 PM'),
(3, 'uiuiu', 'iuiuiuiui', '6352819487', 'klklk', '12:05 AM', '9:10 PM'),
(4, 'kjkj', 'kjkjkjk', '6352819486', 'ijjiji', '12:05 AM', '9:10 PM'),
(5, 'jkjkjkj', 'jkjkjk', '6352819486', 'KJKJK', '12:05 AM', '9:10 PM');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
