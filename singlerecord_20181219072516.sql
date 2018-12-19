-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2018 at 07:17 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `singlerecord`
--

-- --------------------------------------------------------

--
-- Table structure for table `datum`
--

CREATE TABLE `datum` (
	  `id` int(11) NOT NULL,
	  `user_id` int(255) NOT NULL,
	  `name` varchar(128) NOT NULL,
	  `value` varchar(1000) NOT NULL,
	  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datum_request`
--

CREATE TABLE `datum_request` (
	  `id` int(255) NOT NULL,
	  `accessed_id` int(255) NOT NULL,
	  `accessor_id` int(255) NOT NULL,
	  `datum_id` int(255) NOT NULL,
	  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
	  `id` int(32) NOT NULL,
	  `username` varchar(100) NOT NULL,
	  `hashed_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datum`
--
ALTER TABLE `datum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datum_request`
--
ALTER TABLE `datum_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datum`
--
ALTER TABLE `datum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;
COMMIT;

