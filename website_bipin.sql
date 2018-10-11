-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2018 at 05:48 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `website_bipin`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
`car_id` int(11) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `fuel_type` varchar(10) NOT NULL,
  `mileage` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `car_name`, `fuel_type`, `mileage`, `description`, `image`) VALUES
(9, 'Mercedes Benz S Class', 'Petrol', 14, 'The Mercedes-Benz A-Class is a subcompact executive car (subcompact in its first two generations) produced by the German automobile manufacturer Mercedes-Benz.                                                                                 ', '640px-Mercedes-Benz_A_200_Monrepos_2018_IMG_0083.jpg'),
(10, 'Mercedes Benz A Class', 'Petrol', 10, 'The Mercedes-Benz A-Class is a subcompact executive car (subcompact in its first two generations) produced by the German automobile manufacturer Mercedes-Benz.', '1024px-Mercedes_A_160_Elegance_(W168)_front_20090926.jpg'),
(11, 'Mercedes Benz E Class', 'Petrol', 10, 'The Mercedes-Benz A-Class is a subcompact executive car (subcompact in its first two generations) produced by the German automobile manufacturer Mercedes-Benz.', '640px-Mercedes-Benz_A_200_Monrepos_2018_IMG_0083.jpg'),
(12, 'Mercedes Benz G Class', 'Petrol', 13, 'The Mercedes-Benz A-Class is a subcompact executive car (subcompact in its first two generations) produced by the German automobile manufacturer Mercedes-Benz.', '1024px-Mercedes_A_160_Elegance_(W168)_front_20090926.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `email`, `password`) VALUES
(1, 'Suresh', 'sureshrawal@gmail.com', 'suresh'),
(2, 'Ashish', 'ashishthapa@gmail.com', 'ashish'),
(3, 'Bipin', 'bipingoshali2527@gmail.com', 'bipin'),
(4, 'Parash', 'parashpaudel@gmail.com', 'parash'),
(5, 'Ashok', 'ashokthapa@gmail.com', 'ashok'),
(6, 'Keeras', 'keerasmhz@gmail.com', 'keeras'),
(7, 'Suraj', 'surajtajhya@gmail.com', 'suraj'),
(8, 'Bimal', 'bimalbasnet@gmail.com', 'bimal'),
(9, 'Bibek', 'bibekrawal@gmail.com', 'bibek'),
(10, 'Sudip', 'sudipgurung@gmail.com', 'sudip');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
 ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
