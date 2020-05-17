-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 11:04 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demolol`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `purchase_location` varchar(40) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date_of_purchase` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_item_number` int(11) NOT NULL,
  `bottle_price` decimal(9,2) NOT NULL,
  `wine_bottle_number` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(40) NOT NULL,
  `passphrase` varchar(255) NOT NULL,
  `email` varchar(320) DEFAULT NULL,
  `permissions_level` tinyint(4) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `reset_token_timestamp` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `varietals`
--

CREATE TABLE `varietals` (
  `varietal_description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wines`
--

CREATE TABLE `wines` (
  `wine_bottle_number` int(11) NOT NULL,
  `wine_name` varchar(40) NOT NULL,
  `vintage` int(11) NOT NULL,
  `varietal_description` varchar(40) NOT NULL,
  `sweetness_level` varchar(40) DEFAULT NULL,
  `storage_location` varchar(40) NOT NULL,
  `stopper` varchar(40) DEFAULT NULL,
  `reserve` tinyint(1) DEFAULT NULL,
  `producer` varchar(40) DEFAULT NULL,
  `notes` varchar(40) DEFAULT NULL,
  `future` tinyint(1) DEFAULT NULL,
  `finish` varchar(40) DEFAULT NULL,
  `estate_bottled` tinyint(1) DEFAULT NULL,
  `color` varchar(40) DEFAULT NULL,
  `bottle_size` varchar(40) DEFAULT NULL,
  `bottle_label_image` varchar(255) DEFAULT NULL,
  `body` varchar(40) DEFAULT NULL,
  `blended` tinyint(1) DEFAULT NULL,
  `alcohol_level` varchar(40) DEFAULT NULL,
  `appellation` varchar(40) DEFAULT NULL,
  `added_by` varchar(40) DEFAULT NULL,
  `in_storage` tinyint(4) NOT NULL DEFAULT '1',
  `removed_by` varchar(40) DEFAULT NULL,
  `date_removed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_item_number`,`wine_bottle_number`,`purchase_id`),
  ADD KEY `WineBottleNumber_FK` (`wine_bottle_number`),
  ADD KEY `DateOfPurchase_FK` (`purchase_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `varietals`
--
ALTER TABLE `varietals`
  ADD PRIMARY KEY (`varietal_description`);

--
-- Indexes for table `wines`
--
ALTER TABLE `wines`
  ADD PRIMARY KEY (`wine_bottle_number`),
  ADD KEY `VarietalDescription_FK` (`varietal_description`),
  ADD KEY `AddedBy_FK` (`added_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_item_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `wines`
--
ALTER TABLE `wines`
  MODIFY `wine_bottle_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `DateOfPurchase_FK` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`purchase_id`),
  ADD CONSTRAINT `WineBottleNumber_FK` FOREIGN KEY (`wine_bottle_number`) REFERENCES `wines` (`wine_bottle_number`);

--
-- Constraints for table `wines`
--
ALTER TABLE `wines`
  ADD CONSTRAINT `AddedBy_FK` FOREIGN KEY (`added_by`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `VarietalDescription_FK` FOREIGN KEY (`varietal_description`) REFERENCES `varietals` (`varietal_description`);


  --
  -- Default login
  --

INSERT INTO `users` (`username`, `passphrase`, `email`, `permissions_level`, `password_reset_token`, `reset_token_timestamp`, `last_login`)
   VALUES ('admin', '$2y$10$/qT.vB4k0kGi.7LGbJi/v.Ct14imPmQN7KtfkoIKc9fBtdFuGNCJe', '', '5', '', '', '')
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
