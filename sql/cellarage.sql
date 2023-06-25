-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Creation time: 2023. Jún 24. 16:44
-- Server version: 10.4.11-MariaDB
-- PHP version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cellarage`
--
CREATE DATABASE IF NOT EXISTS `cellarage` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cellarage`;

-- --------------------------------------------------------

--
-- Table structure for this table `commodity`
--

CREATE TABLE `commodity` (
  `commodity_id` int(11) NOT NULL,
  `commodity_name` varchar(50) NOT NULL,
  `amount_unit` varchar(8) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for this table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(8) NOT NULL DEFAULT '',
  `full_name` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(250) NOT NULL DEFAULT '',
  `entry_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for this table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `messages` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for out written tables
--

--
-- Indexes of the table `commodity`
--
ALTER TABLE `commodity`
  ADD PRIMARY KEY (`commodity_id`);

--
-- Indexes of the table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes of the table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- The out written tables AUTO_INCREMENT value
--

--
-- AUTO_INCREMENT to the board `commodity`
--
ALTER TABLE `commodity`
  MODIFY `commodity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT to the board `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
