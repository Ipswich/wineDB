-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 11:07 AM
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

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `purchase_location`, `quantity`, `date_of_purchase`) VALUES
(1, 'Costo', 3, '2012-07-28'),
(2, 'Walmart', 2, '2007-02-28'),
(3, 'Liquor Outlet', 4, '2002-08-01'),
(4, 'Trader Joe\'s', 3, '2004-01-17'),
(5, 'Fred Meyer', 2, '1997-09-27'),
(6, 'Liquor Depot', 4, '1997-02-06'),
(7, 'Willamette Valley Vineyards', 2, '1998-02-18'),
(8, 'Uptown Liquor', 4, '2013-11-23'),
(9, 'Rose Town Beverage', 2, '2005-04-27'),
(10, 'Capital Market', 3, '2009-05-12'),
(11, 'Costo', 3, '1999-11-16'),
(12, 'Walmart', 2, '2013-12-27'),
(13, 'Liquor Outlet', 4, '2007-08-10'),
(14, 'Trader Joe\'s', 2, '2013-08-15'),
(15, 'Fred Meyer', 2, '2007-03-29'),
(16, 'Liquor Depot', 2, '2003-06-08'),
(17, 'Willamette Valley Vineyards', 3, '2008-05-26'),
(18, 'Uptown Liquor', 3, '2012-08-03'),
(19, 'Rose Town Beverage', 5, '2017-04-26'),
(20, 'Capital Market', 1, '2009-08-19'),
(21, 'Costo', 2, '2000-08-24'),
(22, 'Walmart', 4, '2004-04-15'),
(23, 'Liquor Outlet', 3, '2011-05-23'),
(24, 'Trader Joe\'s', 5, '2013-02-24'),
(25, 'Fred Meyer', 1, '2007-10-31'),
(26, 'Liquor Depot', 5, '2003-08-11'),
(27, 'Willamette Valley Vineyards', 3, '2017-09-18'),
(28, 'Uptown Liquor', 5, '2012-10-12'),
(29, 'Rose Town Beverage', 4, '2010-07-14'),
(30, 'Capital Market', 2, '2015-10-15');

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

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_item_number`, `bottle_price`, `wine_bottle_number`, `purchase_id`) VALUES
(1, '60.00', 38, 1),
(2, '68.00', 73, 1),
(3, '96.00', 75, 1),
(4, '9.00', 21, 2),
(5, '7.00', 115, 2),
(6, '5.00', 34, 3),
(7, '41.00', 25, 3),
(8, '88.00', 107, 3),
(9, '20.00', 39, 3),
(10, '45.00', 76, 4),
(11, '80.00', 50, 4),
(12, '22.00', 46, 4),
(13, '50.00', 56, 5),
(14, '99.00', 37, 5),
(15, '63.00', 102, 6),
(16, '23.00', 91, 6),
(17, '21.00', 69, 6),
(18, '45.00', 53, 6),
(19, '29.00', 57, 7),
(20, '96.00', 88, 7),
(21, '42.00', 29, 8),
(22, '72.00', 34, 8),
(23, '75.00', 81, 8),
(24, '39.00', 102, 8),
(25, '73.00', 79, 9),
(26, '73.00', 57, 9),
(27, '59.00', 109, 10),
(28, '87.00', 36, 10),
(29, '7.00', 41, 10),
(30, '87.00', 80, 11),
(31, '63.00', 48, 11),
(32, '61.00', 79, 11),
(33, '28.00', 58, 12),
(34, '22.00', 63, 12),
(35, '86.00', 37, 13),
(36, '82.00', 103, 13),
(37, '12.00', 108, 13),
(38, '100.00', 89, 13),
(39, '86.00', 98, 14),
(40, '98.00', 78, 14),
(41, '40.00', 68, 15),
(42, '60.00', 62, 15),
(43, '10.00', 87, 16),
(44, '1.00', 120, 16),
(45, '56.00', 79, 17),
(46, '31.00', 50, 17),
(47, '61.00', 74, 17),
(48, '10.00', 114, 18),
(49, '65.00', 82, 18),
(50, '37.00', 89, 18),
(51, '18.00', 79, 19),
(52, '93.00', 104, 19),
(53, '76.00', 59, 19),
(54, '98.00', 48, 19),
(55, '79.00', 38, 19),
(56, '66.00', 36, 20),
(57, '50.00', 65, 21),
(58, '61.00', 87, 21),
(59, '53.00', 37, 22),
(60, '63.00', 62, 22),
(61, '21.00', 84, 22),
(62, '74.00', 76, 22),
(63, '11.00', 90, 23),
(64, '46.00', 93, 23),
(65, '15.00', 55, 23),
(66, '14.00', 119, 24),
(67, '8.00', 43, 24),
(68, '22.00', 27, 24),
(69, '44.00', 116, 24),
(70, '56.00', 76, 24),
(71, '82.00', 88, 25),
(72, '78.00', 88, 26),
(73, '53.00', 114, 26),
(74, '91.00', 61, 26),
(75, '22.00', 44, 26),
(76, '49.00', 38, 26),
(77, '30.00', 74, 27),
(78, '41.00', 47, 27),
(79, '100.00', 60, 27),
(80, '29.00', 67, 28),
(81, '10.00', 82, 28),
(82, '1.00', 34, 28),
(83, '95.00', 61, 28),
(84, '88.00', 111, 28),
(85, '41.00', 77, 29),
(86, '48.00', 105, 29),
(87, '66.00', 92, 29),
(88, '83.00', 98, 29),
(89, '12.00', 43, 30),
(90, '51.00', 68, 30);

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `passphrase`, `email`, `permissions_level`, `password_reset_token`, `reset_token_timestamp`, `last_login`) VALUES
('admin', '$2y$10$/qT.vB4k0kGi.7LGbJi/v.Ct14imPmQN7KtfkoIKc9fBtdFuGNCJe', '', 5, NULL, NULL, NULL),
('alan', '$2y$10$0JPOtAAC3Ld0C/3aRw2U5.XqYslKEZZTVaZCOJIYSWvuiUSsb.AYW', '', 2, NULL, NULL, NULL),
('jack', '$2y$10$0Du.hjksvPEmR8kd2MXU7.bS2tDYLo9p7fWlfm3GLt/lSROy.VLKS', 'notarealemail@notarealdomain.com', 4, NULL, NULL, '2017-11-21 20:14:12'),
('jerry', '$2y$10$j6g.6E26qgxsnGY56Uxz6epJecJW3E6H89Kl2HstUDzvnpPYsHlmi', '', 1, NULL, NULL, '2017-11-23 04:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `varietals`
--

CREATE TABLE `varietals` (
  `varietal_description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `varietals`
--

INSERT INTO `varietals` (`varietal_description`) VALUES
('Barbera'),
('Cabernet Franc'),
('Cabernet Sauvignon'),
('Champagne '),
('Chardonnay'),
('Chenin Blanc'),
('Fume Blanc'),
('Gewurztraminer'),
('Malbec'),
('Merlot'),
('Petite Sirah'),
('Pinot Blanc'),
('Pinot Gris'),
('Pinot Noir'),
('Riesling'),
('Sangiovese'),
('Semi-Sparkling '),
('Sparkling'),
('Syrah'),
('Viognier'),
('Zinfandel');

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
-- Dumping data for table `wines`
--

INSERT INTO `wines` (`wine_bottle_number`, `wine_name`, `vintage`, `varietal_description`, `sweetness_level`, `storage_location`, `stopper`, `reserve`, `producer`, `notes`, `future`, `finish`, `estate_bottled`, `color`, `bottle_size`, `bottle_label_image`, `body`, `blended`, `alcohol_level`, `appellation`, `added_by`, `in_storage`, `removed_by`, `date_removed`) VALUES
(1, 'White Rose', 2017, 'Sparkling', 'very dry', '2-8-97-9-78', '', 0, 'A to Z Wineworks', '', 0, '', 0, 'red', '187ml', '', 'Medium', 0, '5%', 'Dundee', 'admin', 0, NULL, NULL),
(2, 'Red Rose', 1998, 'Fume Blanc', 'off dry', '8-3-06-6-72', '', 0, 'Aardvark Vineyard', '', 0, '', 0, 'rose', '375ml', '', 'Light to Medium', 0, '12%', 'Medford', 'admin', 1, NULL, NULL),
(3, 'Archery Summit', 2006, 'Chardonnay', 'medium', '1-8-44-9-57', '', 0, 'Bangsund Vineyards', '', 0, '', 0, 'pink', '750ml', '', 'Medium to Heavy', 0, '15%', 'The Dalles', 'admin', 1, NULL, NULL),
(4, 'Bethel Heights', 1998, 'Viognier', 'sweet', '4-1-78-4-48', '', 0, 'Barrett Hills Winery', '', 0, '', 0, 'dark red', '1.5L', '', 'Medium', 0, '7%', 'Salem', 'admin', 1, NULL, NULL),
(5, 'Abacela', 2013, 'Pinot Gris', 'very sweet', '1-1-16-7-38', '', 0, 'Cameron Winery', 'Good dessert wine.', 0, '', 0, 'gray', '2L', '', 'Light', 0, '13%', 'Dundee', 'admin', 1, NULL, NULL),
(6, 'Acrobat', 1999, 'Pinot Blanc', 'very dry', '9-4-94-3-22', '', 0, 'Canary Hill Vineyard', '', 0, '', 0, 'white', '187ml', '', 'Medium', 0, '20%', 'Salem', 'admin', 1, NULL, NULL),
(7, 'Brick House', 2017, 'Chenin Blanc', 'off dry', '8-2-62-8-52', '', 0, 'Dalla Vina Wines', '', 0, '', 0, 'tawny', '375ml', '', 'Light', 0, '9%', 'Wilsonville', 'admin', 0, NULL, NULL),
(8, 'Bricks', 2002, 'Gewurztraminer', 'medium', '9-5-60-1-42', '', 0, 'Davis Creek Vineyard', '', 0, '', 0, 'yellow', '750ml', '', 'Medium', 0, '18%', 'Silverton', 'admin', 0, NULL, NULL),
(9, 'Capitello', 2011, 'Riesling', 'sweet', '7-2-33-8-28', '', 0, 'EdenVale Winery', '', 0, '', 0, 'orange', '1.5L', '', 'Light', 0, '13%', 'Medford', 'admin', 0, NULL, NULL),
(10, 'Cardwell Hill', 1999, 'Pinot Noir', 'very sweet', '4-3-37-1-87', '', 0, 'Edgefield Winery', 'Good dessert wine. Even a small glass go', 0, '', 0, 'burgundy', '2L', '', 'Light to medium', 0, '9%', 'Troutdale', 'admin', 0, NULL, NULL),
(11, 'Cowhorn', 2006, 'Merlot', 'very dry', '4-8-19-5-43', '', 0, 'Fir Crest Vineyards', '', 0, '', 0, 'sangria', '187ml', '', 'Medium', 0, '16%', 'McMinnville', 'admin', 0, NULL, NULL),
(12, 'Cristom', 2017, 'Zinfandel', 'off dry', '6-1-86-5-91', '', 0, 'Firesteed Cellars', '', 0, '', 0, 'purple', '375ml', '', 'Medium to heavy', 0, '9%', 'Rickreall', 'admin', 0, NULL, NULL),
(13, 'de Lancellotti', 2005, 'Cabernet Sauvignon', 'medium', '5-4-43-7-45', '', 0, 'Garden Vineyards', '', 0, '', 0, 'green', '750ml', '', 'Heavy', 0, '5%', 'Hillsboro', 'admin', 0, NULL, NULL),
(14, 'De Ponte', 2015, 'Syrah', 'sweet', '3-9-02-3-86', '', 0, 'Gemini Vineyard', '', 0, '', 0, 'blue', '1.5L', '', 'Medium to heavy', 0, '11%', 'Sherwood', 'admin', 0, NULL, NULL),
(15, 'Dobbes Family', 2016, 'Petite Sirah', 'very sweet', '7-6-67-1-24', '', 0, 'Hauer of the Dauen', 'Would make a good Christmas gift/ for a ', 0, '', 0, 'coral', '2L', '', 'Heavy', 0, '13%', 'Dayton', 'admin', 0, NULL, NULL),
(16, 'Domaine Serene', 1997, 'Sangiovese', 'very dry', '9-1-67-1-81', '', 0, 'Hawks View Vineyard', '', 0, '', 0, 'light salmon', '187ml', '', 'Light to medium', 0, '6%', 'Sherwood', 'admin', 0, NULL, NULL),
(17, 'Elk Cove', 2005, 'Cabernet Franc', 'off dry', '8-9-71-6-56', '', 0, 'Indian River Vineyard', '', 0, '', 0, 'light yellow', '375ml', '', 'Medium', 0, '13%', 'Umatilla', 'admin', 0, NULL, NULL),
(18, 'Erath', 2004, 'Barbera', 'medium', '5-3-51-6-14', '', 0, 'Iris Hill Winery', '', 0, '', 0, 'light gray', '750ml', '', 'Medium', 0, '18%', 'Eugene', 'admin', 0, NULL, NULL),
(19, 'Et Fille', 2006, 'Malbec', 'sweet', '4-5-49-2-19', '', 0, 'Jacksonville Vineyards', '', 0, '', 0, 'violet', '1.5L', '', 'Medium', 0, '10%', 'Jacksonville', 'admin', 0, NULL, NULL),
(20, 'Evening Land', 2003, 'Sparkling', 'very sweet', '9-8-65-8-99', '', 0, 'Jacob Hart Vineyards', '', 0, '', 0, 'orchid', '2L', '', 'Medium', 0, '14%', 'Newberg', 'admin', 0, NULL, NULL),
(21, 'Eyrie Chardonnay', 2006, 'Fume Blanc', 'very dry', '7-9-93-3-48', '', 0, 'Kliewers Weinberg Vineyard', '', 0, '', 0, 'dark gray', '187ml', '', 'Light to Medium', 0, '16%', 'Cheshire', 'admin', 0, NULL, NULL),
(22, 'Ghost Hill', 1998, 'Chardonnay', 'off dry', '7-6-21-3-97', '', 0, 'Knudsen Vineyard', '', 0, '', 0, 'maroon', '375ml', '', 'Medium to Heavy', 0, '19%', 'Dundee', 'admin', 0, NULL, NULL),
(23, 'Iron Horse', 2016, 'Viognier', 'medium', '5-5-56-2-62', '', 0, 'Lazy River Vineyard', '', 0, '', 0, 'peach', '750ml', '', 'Medium', 0, '19%', 'Yamhill', 'admin', 0, NULL, NULL),
(24, 'Le Cadeau', 2011, 'Pinot Gris', 'sweet', '6-9-16-7-39', '', 0, 'Le Cadeau Vineyard', '', 0, '', 0, 'beige', '1.5L', '', 'Light', 0, '20%', 'Newberg', 'admin', 0, NULL, NULL),
(25, 'Loring', 2014, 'Pinot Blanc', 'very sweet', '4-4-35-8-79', '', 0, 'McKinlay Vineyard', '', 0, '', 0, 'red', '2L', '', 'Medium', 0, '14%', 'Newberg', 'admin', 0, NULL, NULL),
(26, 'Maysara', 2013, 'Chenin Blanc', 'very dry', '7-5-20-1-66', '', 0, 'Meadows Vineyard', '', 0, '', 0, 'rose', '187ml', '', 'Light', 0, '17%', 'Halsey', 'admin', 0, NULL, NULL),
(27, 'Oak Knoll', 2007, 'Gewurztraminer', 'off dry', '9-5-09-6-85', '', 0, 'Naked Grape Winery', '', 0, '', 0, 'pink', '375ml', '', 'Medium', 0, '12%', 'Sherwood', 'admin', 0, NULL, NULL),
(28, 'Owen Roe', 1998, 'Riesling', 'medium', '9-9-51-2-62', '', 0, 'Namaste Vineyards', '', 0, '', 0, 'dark red', '750ml', '', 'Light', 0, '20%', 'Dallas', 'admin', 0, NULL, NULL),
(29, 'Panther Creek', 2005, 'Pinot Noir', 'sweet', '6-6-09-3-64', '', 0, 'Oak Knoll Winery', '', 0, '', 0, 'gray', '1.5L', '', 'Light to medium', 0, '19%', 'Hillsboro', 'admin', 0, NULL, NULL),
(30, 'Patton Valley', 2001, 'Merlot', 'very sweet', '9-9-30-7-94', '', 0, 'OConnor Vineyards', '', 0, '', 0, 'white', '2L', '', 'Medium', 0, '9%', 'Salem', 'admin', 0, NULL, NULL),
(31, 'Ponzi', 2012, 'Zinfandel', 'very dry', '6-1-95-4-49', '', 0, 'Pine Grove Vineyards', '', 0, '', 0, 'tawny', '187ml', '', 'Medium to heavy', 0, '18%', 'Hood River', 'admin', 0, NULL, NULL),
(32, 'Quady', 2008, 'Cabernet Sauvignon', 'off dry', '1-1-91-1-77', '', 0, 'Pioneer Hopyard Vineyard', '', 0, '', 0, 'yellow', '375ml', '', 'Heavy', 0, '15%', 'Corvallis', 'admin', 0, NULL, NULL),
(33, 'Ransom', 1995, 'Syrah', 'medium', '5-3-69-5-39', '', 0, 'Red Hills Winery', '', 0, '', 0, 'orange', '750ml', '', 'Medium to heavy', 0, '18%', 'Dundee', 'admin', 0, NULL, NULL),
(34, 'Raptor Ridge', 2014, 'Petite Sirah', 'sweet', '8-9-25-5-96', '', 0, 'Redding Farm', '', 0, '', 0, 'burgundy', '1.5L', '', 'Heavy', 0, '16%', 'Portland', 'admin', 0, NULL, NULL),
(35, 'Rex Hill', 2011, 'Sangiovese', 'very sweet', '7-8-39-7-73', '', 0, 'Robinson Reserve', '', 0, '', 0, 'sangria', '2L', '', 'Light to medium', 0, '11%', 'Hillsboro', 'admin', 0, NULL, NULL),
(36, 'Rock Wall', 1996, 'Cabernet Franc', 'very dry', '9-1-41-3-79', '', 0, 'Rocky Knoll', '', 0, '', 0, 'purple', '187ml', '', 'Medium', 0, '20%', 'Medford', 'admin', 0, NULL, NULL),
(37, 'Roco', 2011, 'Barbera', 'off dry', '8-6-40-8-57', '', 0, 'Rogue Ales Brewery', '', 0, '', 0, 'green', '375ml', '', 'Medium', 0, '8%', 'Newport', 'admin', 0, NULL, NULL),
(38, 'RoxyAnn', 1995, 'Malbec', 'medium', '2-8-07-9-19', '', 0, 'Rogue River Vineyards', '', 0, '', 0, 'blue', '750ml', '', 'Medium', 0, '9%', 'Grants Pass', 'admin', 0, NULL, NULL),
(39, 'Shea', 1997, 'Sparkling', 'sweet', '4-2-58-2-23', '', 0, 'Rosella\'s Vineyard and Winery', '', 0, '', 0, 'coral', '1.5L', '', 'Medium', 0, '10%', 'Grants Pass', 'admin', 0, NULL, NULL),
(40, 'Siduri', 2010, 'Fume Blanc', 'very sweet', '6-1-81-8-58', '', 0, 'Ross Vineyards', '', 0, '', 0, 'light salmon', '2L', '', 'Light to Medium', 0, '18%', 'Sherwood', 'admin', 0, NULL, NULL),
(41, 'Soléna', 2011, 'Chardonnay', 'very dry', '6-8-40-8-71', '', 0, 'RoxyAnn Winery', '', 0, '', 0, 'light yellow', '187ml', '', 'Medium to Heavy', 0, '18%', 'Medford', 'admin', 0, NULL, NULL),
(42, 'Soter', 2001, 'Viognier', 'off dry', '4-4-13-8-26', '', 0, 'Salem Hills Vineyard and Winery', '', 0, '', 0, 'light gray', '375ml', '', 'Medium', 0, '6%', 'Salem', 'admin', 0, NULL, NULL),
(43, 'Spindrift', 2010, 'Pinot Gris', 'medium', '7-6-90-6-17', '', 0, 'Sass WineryWild Winds Winery', '', 0, '', 0, 'violet', '750ml', '', 'Light', 0, '12%', 'Salem', 'admin', 0, NULL, NULL),
(44, 'Tyrus Evan', 2005, 'Pinot Blanc', 'sweet', '9-5-83-1-17', '', 0, 'Schmidt Family Vineyards', '', 0, '', 0, 'orchid', '1.5L', '', 'Medium', 0, '15%', 'Grants Pass', 'admin', 0, NULL, NULL),
(45, 'Underwood', 1997, 'Chenin Blanc', 'very sweet', '8-3-34-1-81', '', 0, 'Scott Hamersly Vineyard', '', 0, '', 0, 'dark gray', '2L', '', 'Light', 0, '7%', 'West Linn', 'admin', 0, NULL, NULL),
(46, 'Van Duzer', 2017, 'Gewurztraminer', 'very dry', '1-2-88-9-67', '', 0, 'Scott Paul Wines', '', 0, '', 0, 'maroon', '187ml', '', 'Medium', 0, '9%', 'Carlton', 'admin', 0, NULL, NULL),
(47, 'Vidon', 2013, 'Riesling', 'off dry', '6-4-25-7-63', '', 0, 'Secret House Winery', '', 0, '', 0, 'peach', '375ml', '', 'Light', 0, '19%', 'Veneta', 'admin', 0, NULL, NULL),
(48, 'Volcano', 2002, 'Pinot Noir', 'medium', '2-4-99-9-26', '', 0, 'Seven Springs Vineyard Inc', '', 0, '', 0, 'beige', '750ml', '', 'Light to medium', 0, '8%', 'Salem', 'admin', 0, NULL, NULL),
(49, 'WillaKenzie', 1997, 'Merlot', 'sweet', '9-1-07-9-49', '', 0, 'Shadow Mountain Vineyards LLC', '', 0, '', 0, 'red', '1.5L', '', 'Medium', 0, '13%', 'Junction City', 'admin', 0, NULL, NULL),
(50, 'Youngberg', 2010, 'Zinfandel', 'very sweet', '6-8-66-1-83', '', 0, 'Shafer Vineyard Cellars', '', 0, '', 0, 'rose', '2L', '', 'Medium to heavy', 0, '16%', 'Forest Grove', 'admin', 0, NULL, NULL),
(51, 'White Rose', 2014, 'Cabernet Sauvignon', 'very dry', '8-4-80-2-61', '', 0, 'Shallon Winery', '', 0, '', 0, 'pink', '187ml', '', 'Heavy', 0, '12%', 'Astoria', 'admin', 0, NULL, NULL),
(52, 'Red Rose', 2001, 'Syrah', 'off dry', '6-4-38-3-93', '', 0, 'Shalvichris Vineyard', '', 0, '', 0, 'dark red', '375ml', '', 'Medium to heavy', 0, '8%', 'Eugene', 'admin', 0, NULL, NULL),
(53, 'Archery Summit', 2001, 'Petite Sirah', 'medium', '1-6-08-1-88', '', 0, 'Shea Vineyard Shea Wine Cellars', '', 0, '', 0, 'gray', '750ml', '', 'Heavy', 0, '7%', 'Portland', 'admin', 0, NULL, NULL),
(54, 'Bethel Heights', 2003, 'Sangiovese', 'sweet', '2-1-30-7-58', '', 0, 'Sheppard Vineyards', '', 0, '', 0, 'white', '1.5L', '', 'Light to medium', 0, '8%', 'Sherwood', 'admin', 0, NULL, NULL),
(55, 'Abacela', 2015, 'Cabernet Franc', 'very sweet', '9-5-70-6-87', '', 0, 'Sheppard Vineyards', '', 0, '', 0, 'tawny', '2L', '', 'Medium', 0, '6%', 'McMinnville', 'admin', 0, NULL, NULL),
(56, 'Acrobat', 2013, 'Barbera', 'very dry', '1-4-81-5-53', '', 0, 'Siltstone', '', 0, '', 0, 'yellow', '187ml', '', 'Medium', 0, '13%', 'McMinnville', 'admin', 0, NULL, NULL),
(57, 'Brick House', 2007, 'Malbec', 'off dry', '1-3-42-4-36', '', 0, 'Silvan Ridge/Hinman Vineyards', '', 0, '', 0, 'orange', '375ml', '', 'Medium', 0, '20%', 'Eugene', 'admin', 0, NULL, NULL),
(58, 'Bricks', 1995, 'Sparkling', 'medium', '6-8-64-1-84', '', 0, 'Silver Falls Vineyards', '', 0, '', 0, 'burgundy', '750ml', '', 'Medium', 0, '17%', 'Sublimity', 'admin', 0, NULL, NULL),
(59, 'Capitello', 2006, 'Fume Blanc', 'sweet', '3-5-61-8-99', '', 0, 'Silver Stars Vineyard', '', 0, '', 0, 'sangria', '1.5L', '', 'Light to Medium', 0, '16%', 'Grants Pass', 'admin', 0, NULL, NULL),
(60, 'Cardwell Hill', 1997, 'Chardonnay', 'very sweet', '8-3-17-6-62', '', 0, 'Simonds Vineyard', '', 0, '', 0, 'purple', '2L', '', 'Medium to Heavy', 0, '19%', 'Cheshire', 'admin', 0, NULL, NULL),
(61, 'Cowhorn', 2009, 'Viognier', 'very dry', '2-7-78-6-31', '', 0, 'Stonefield Vineyard', '', 0, '', 0, 'green', '187ml', '', 'Medium', 0, '10%', 'Cave Junction', 'admin', 0, NULL, NULL),
(62, 'Cristom', 2011, 'Pinot Gris', 'off dry', '2-1-37-4-76', '', 0, 'Stoneridge Vineyard', '', 0, '', 0, 'blue', '375ml', '', 'Light', 0, '5%', 'West LInn', 'admin', 0, NULL, NULL),
(63, 'de Lancellotti', 2006, 'Pinot Blanc', 'medium', '6-2-19-2-92', '', 0, 'Stony Mountain Vineyard', '', 0, '', 0, 'coral', '750ml', '', 'Medium', 0, '20%', 'McMinnville', 'admin', 0, NULL, NULL),
(64, 'De Ponte', 2008, 'Chenin Blanc', 'sweet', '5-3-66-8-55', '', 0, 'Sundeen Vineyards', '', 0, '', 0, 'light salmon', '1.5L', '', 'Light', 0, '14%', 'Dundee', 'admin', 0, NULL, NULL),
(65, 'Dobbes Family', 2013, 'Gewurztraminer', 'very sweet', '9-7-50-1-45', '', 0, 'Sunnyside Vineyard Inc', '', 0, '', 0, 'light yellow', '2L', '', 'Medium', 0, '10%', 'Salem', 'admin', 0, NULL, NULL),
(66, 'Domaine Serene', 2001, 'Riesling', 'very dry', '3-3-86-2-14', '', 0, 'Sunset Knoll Vineyard and Nursery', '', 0, '', 0, 'light gray', '187ml', '', 'Light', 0, '10%', 'Yamhill', 'admin', 0, NULL, NULL),
(67, 'Elk Cove', 2006, 'Pinot Noir', 'off dry', '2-5-63-4-58', '', 0, 'Sunset Ridge Farms', 'Was a little to dry for my licking. ', 0, '', 0, 'violet', '375ml', '', 'Light to medium', 0, '13%', 'Rickreall', 'admin', 0, NULL, NULL),
(68, 'Erath', 2009, 'Merlot', 'medium', '4-1-18-5-22', '', 0, 'Swan Estate', '', 0, '', 0, 'orchid', '750ml', '', 'Medium', 0, '6%', 'Molalla', 'admin', 0, NULL, NULL),
(69, 'Et Fille', 1995, 'Zinfandel', 'sweet', '9-4-88-8-88', '', 0, 'Sweet Cheeks Winery', '', 0, '', 0, 'dark gray', '1.5L', '', 'Medium to heavy', 0, '5%', 'Eugene', 'admin', 0, NULL, NULL),
(70, 'Evening Land', 2015, 'Cabernet Sauvignon', 'very sweet', '2-9-89-3-72', '', 0, 'Tempean View Vineyard', '', 0, '', 0, 'maroon', '2L', '', 'Heavy', 0, '16%', 'Oregon City', 'admin', 0, NULL, NULL),
(71, 'Eyrie Chardonnay', 1999, 'Syrah', 'very dry', '1-9-38-9-53', '', 0, 'Temperance Hill Vineyard', '', 0, '', 0, 'peach', '187ml', '', 'Medium to heavy', 0, '13%', 'Salem', 'admin', 0, NULL, NULL),
(72, 'Ghost Hill', 2013, 'Petite Sirah', 'off dry', '1-4-41-8-77', '', 0, 'Tempest Vineyards', '', 0, '', 0, 'beige', '375ml', '', 'Heavy', 0, '17%', 'Amity', 'admin', 0, NULL, NULL),
(73, 'Iron Horse', 2012, 'Sangiovese', 'medium', '3-4-70-2-72', '', 0, 'Temptress Wines', '', 0, '', 0, 'red', '750ml', '', 'Light to medium', 0, '6%', 'McMinnville', 'admin', 0, NULL, NULL),
(74, 'Le Cadeau', 1996, 'Cabernet Franc', 'sweet', '4-5-34-2-13', '', 0, 'Teresas Vineyard', '', 0, '', 0, 'rose', '1.5L', '', 'Medium', 0, '17%', 'West Linn', 'admin', 0, NULL, NULL),
(75, 'Loring', 1995, 'Barbera', 'very sweet', '4-5-20-3-84', '', 0, 'Terra Sogno', '', 0, '', 0, 'pink', '2L', '', 'Medium', 0, '12%', 'Oakland', 'admin', 0, NULL, NULL),
(76, 'Maysara', 1997, 'Malbec', 'very dry', '1-4-07-6-14', '', 0, 'Terrapin Cellars', '', 0, '', 0, 'dark red', '187ml', '', 'Medium', 0, '18%', 'Rickreall', 'admin', 0, NULL, NULL),
(77, 'Oak Knoll', 1997, 'Sparkling', 'off dry', '1-9-68-3-45', '', 0, 'Territorial Vineyards', '', 0, '', 0, 'gray', '375ml', '', 'Medium', 0, '18%', 'Eugene', 'admin', 0, NULL, NULL),
(78, 'Owen Roe', 1995, 'Fume Blanc', 'medium', '5-1-93-3-11', '', 0, 'The Academy Winery', '', 0, '', 0, 'white', '750ml', '', 'Light to Medium', 0, '14%', 'Grant Pass', 'admin', 0, NULL, NULL),
(79, 'Panther Creek', 2010, 'Chardonnay', 'sweet', '3-3-03-9-14', '', 0, 'Three Trees Vineyards', '', 0, '', 0, 'tawny', '1.5L', '', 'Medium to Heavy', 0, '19%', 'Amity', 'admin', 0, NULL, NULL),
(80, 'Patton Valley', 2008, 'Viognier', 'very sweet', '2-2-74-6-39', '', 0, 'Tonnelier Vineyard', '', 0, '', 0, 'yellow', '2L', '', 'Medium', 0, '17%', 'Yamhill', 'admin', 0, NULL, NULL),
(81, 'Ponzi', 2011, 'Pinot Gris', 'very dry', '2-9-06-2-42', '', 0, 'Umpqua Valley Winegrowers Association', 'Umpqua had a very nice tasting room and ', 0, '', 0, 'orange', '187ml', '', 'Light', 0, '7%', 'Roseburg', 'admin', 0, NULL, NULL),
(82, 'Quady', 2015, 'Pinot Blanc', 'off dry', '5-3-01-1-14', '', 0, 'Upper Five Vineyard', '', 0, '', 0, 'burgundy', '375ml', '', 'Medium', 0, '10%', 'Talent', 'admin', 0, NULL, NULL),
(83, 'Ransom', 1998, 'Chenin Blanc', 'medium', '5-4-32-3-62', '', 0, 'Urban Wineworks', '', 0, '', 0, 'sangria', '750ml', '', 'Light', 0, '5%', 'Portland', 'admin', 0, NULL, NULL),
(84, 'Raptor Ridge', 2006, 'Gewurztraminer', 'sweet', '9-8-72-4-86', '', 0, 'Valfontis Vineyards', '', 0, '', 0, 'purple', '1.5L', '', 'Medium', 0, '9%', 'Salem', 'admin', 0, NULL, NULL),
(85, 'Rex Hill', 2016, 'Riesling', 'very sweet', '5-7-22-4-53', '', 0, 'Valley View Winery', '', 0, '', 0, 'green', '2L', '', 'Light', 0, '19%', 'Jacksonville', 'admin', 0, NULL, NULL),
(86, 'Rock Wall', 1996, 'Pinot Noir', 'very dry', '8-6-36-6-34', '', 0, 'Van Duzer Vineyards', '', 0, '', 0, 'blue', '187ml', '', 'Light to medium', 0, '13%', 'Dallas', 'admin', 0, NULL, NULL),
(87, 'Roco', 2012, 'Merlot', 'off dry', '4-8-27-6-28', '', 0, 'Velocity Wine Cellars', '', 0, '', 0, 'coral', '375ml', '', 'Medium', 0, '20%', 'Medford', 'admin', 0, NULL, NULL),
(88, 'RoxyAnn', 2013, 'Zinfandel', 'medium', '2-4-61-6-93', '', 0, 'Venture Vineyards', '', 0, '', 0, 'light salmon', '750ml', '', 'Medium to heavy', 0, '11%', 'Rogue River', 'admin', 0, NULL, NULL),
(89, 'Shea', 1999, 'Cabernet Sauvignon', 'sweet', '9-9-12-3-22', '', 0, 'Veraison Vineyards', '', 0, '', 0, 'light yellow', '1.5L', '', 'Heavy', 0, '9%', 'Dundee', 'admin', 0, NULL, NULL),
(90, 'Siduri', 2001, 'Syrah', 'very sweet', '5-8-33-9-46', '', 0, 'Walnut City Wineworks', '', 0, '', 0, 'light gray', '2L', '', 'Medium to heavy', 0, '17%', 'McMinnville', 'admin', 0, NULL, NULL),
(91, 'Soléna', 2014, 'Petite Sirah', 'very dry', '4-3-55-4-65', '', 0, 'Walnut Ridge Vineyard', '', 0, '', 0, 'violet', '187ml', '', 'Heavy', 0, '18%', 'Junction City', 'admin', 0, NULL, NULL),
(92, 'Soter', 2004, 'Sangiovese', 'off dry', '1-5-93-6-61', '', 0, 'Wasson Brothers Winery', '', 0, '', 0, 'orchid', '375ml', '', 'Light to medium', 0, '13%', 'Sandy', 'admin', 0, NULL, NULL),
(93, 'Spindrift', 2013, 'Cabernet Franc', 'medium', '6-3-45-3-88', '', 0, 'White Rose Wines', '', 0, '', 0, 'dark gray', '750ml', '', 'Medium', 0, '13%', 'Dayton', 'admin', 0, NULL, NULL),
(94, 'Tyrus Evan', 2001, 'Barbera', 'sweet', '7-8-62-9-54', '', 0, 'Widmer Brothers Brewing', '', 0, '', 0, 'maroon', '1.5L', '', 'Medium', 0, '19%', 'Portland', 'admin', 0, NULL, NULL),
(95, 'Underwood', 2017, 'Malbec', 'very sweet', '1-3-65-5-66', '', 0, 'Wild Rose Vineyard', '', 0, '', 0, 'peach', '2L', '', 'Medium', 0, '10%', 'Winston', 'admin', 0, NULL, NULL),
(96, 'Van Duzer', 2014, 'Sparkling', 'very dry', '6-7-26-7-85', '', 0, 'Willakenzie Estate Inc', '', 0, '', 0, 'beige', '187ml', '', 'Light', 0, '5%', 'Yamhill', 'admin', 0, NULL, NULL),
(97, 'Vidon', 1995, 'Fume Blanc', 'off dry', '9-5-58-5-61', '', 0, 'Willamette Farms of Oregon', '', 0, '', 0, 'red', '375ml', '', 'Light to medium', 0, '19%', 'Newberg', 'admin', 0, NULL, NULL),
(98, 'Volcano', 2013, 'Chardonnay', 'medium', '5-9-22-9-63', '', 0, 'Willamette Valley Vineyards', '', 0, '', 0, 'dark red', '750ml', '', 'Medium', 0, '11%', 'Turner', 'admin', 0, NULL, NULL),
(99, 'WillaKenzie', 2013, 'Viognier', 'sweet', '9-2-86-8-59', '', 0, 'Yamhill Springs Vineyard', '', 0, '', 0, 'white', '1.5L', '', 'Medium to heavy', 0, '7%', 'Yamhill', 'admin', 0, NULL, NULL),
(100, 'Youngberg', 2004, 'Pinot Gris', 'very sweet', '9-6-21-2-58', '', 0, 'Yamhill Valley Vineyards', '', 0, '', 0, 'gray', '2L', '', 'Heavy', 0, '11%', 'McMinnville', 'admin', 0, NULL, NULL),
(101, 'Early Muscat', 2015, 'Semi-Sparkling ', 'sweet ', '9-6-21-2-59', '', 0, 'Silvan Ridge', 'One of the best wines I have had. ', 0, '', 0, 'white ', '750ml', '', 'Medium', 0, '13%', 'Eugene', 'admin', 0, NULL, NULL),
(102, 'Champagne Brut', 2017, 'Champagne ', 'very dry', '9-6-21-2-60', '', 0, 'Kirkland & Sas Janisson', '', 0, '', 0, 'white ', '750ml', '', 'Medium', 0, '12%', 'Champagne France ', 'admin', 0, NULL, NULL);

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
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_item_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `wines`
--
ALTER TABLE `wines`
  MODIFY `wine_bottle_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
