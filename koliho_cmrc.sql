-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 11:30 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koliho_cmrc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_agmpedia`
--

CREATE TABLE `tm_agmpedia` (
  `id` int(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_agmpedia`
--

INSERT INTO `tm_agmpedia` (`id`, `title`, `content`, `date`, `photo`) VALUES
(2, 'test lagi', 'Test juga', '2019-01-09', '04.jpg'),
(3, 'test', 'test                                        ', '2019-01-09', 'san.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tm_brand`
--

CREATE TABLE `tm_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_super_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_brand`
--

INSERT INTO `tm_brand` (`id`, `name`, `id_super_admin`) VALUES
(1, 'qq', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tm_category`
--

CREATE TABLE `tm_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_super_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_category`
--

INSERT INTO `tm_category` (`id`, `name`, `id_super_admin`) VALUES
(1, 'qq', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tm_customer`
--

CREATE TABLE `tm_customer` (
  `id` int(11) NOT NULL,
  `id_userlogin` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` text,
  `sub_district` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `postcode` varchar(25) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_customer`
--

INSERT INTO `tm_customer` (`id`, `id_userlogin`, `first_name`, `last_name`, `address`, `sub_district`, `city`, `province`, `postcode`, `gender`, `phone`) VALUES
(1, 15, 'dummy', 'customer2', NULL, '', NULL, NULL, NULL, 'm', NULL),
(2, 3, 'Frist', 'Customer', 'Jl. Durian No. H23 RT003/003 Kelapa Dua Wetan, Ciracas', '', 'Jakarta Timur', 'DKI Jakarta', '13730', 'm', '02187701150'),
(3, 16, 'customer', 'coba', NULL, '', NULL, NULL, NULL, 'm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_product`
--

CREATE TABLE `tm_product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `sub_price` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tm_store_owner`
--

CREATE TABLE `tm_store_owner` (
  `id` int(11) NOT NULL,
  `id_userlogin` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` text,
  `sub_district` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `postcode` varchar(25) DEFAULT NULL,
  `phone1` int(20) DEFAULT NULL,
  `phone2` int(20) DEFAULT NULL,
  `owner_name` varchar(50) DEFAULT NULL,
  `id_super_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_store_owner`
--

INSERT INTO `tm_store_owner` (`id`, `id_userlogin`, `company_name`, `address`, `sub_district`, `city`, `province`, `postcode`, `phone1`, `phone2`, `owner_name`, `id_super_admin`) VALUES
(1, 4, 'PT First Company', 'JL. Akses UI No.123', 'Kelapa Dua', 'Depok', 'Jawa Barat', '16451', NULL, NULL, 'First', 0),
(4, 31, 'PT Gua', 'Jalan Gua', 'District Gua', 'Kota Gua', 'Provinsi Gua', '95093', 93128, 95580, 'Gua H', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tm_super_admin`
--

CREATE TABLE `tm_super_admin` (
  `id` int(11) NOT NULL,
  `id_userlogin` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_super_admin`
--

INSERT INTO `tm_super_admin` (`id`, `id_userlogin`, `first_name`, `last_name`, `phone`) VALUES
(1, 5, 'First', 'Admin', '02198761234'),
(2, 2, 'Super', 'Admin', '02112345678'),
(9, 27, 'Admin', 'Super', '123098456');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `user_type` int(11) DEFAULT NULL,
  `newer` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `forgot_pass_identity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `username`, `password`, `email`, `user_type`, `newer`, `created`, `forgot_pass_identity`) VALUES
(2, 'superAdmin', '$2y$10$3YRswITgyZZYpwgxLc3ZN.emGdYMtrCmwKAoePPKSo6tBWl8hDWEK', 'super.admin@keraton.com', 1, 0, 0, ''),
(3, 'dummyCS', '$2y$10$3YRswITgyZZYpwgxLc3ZN.emGdYMtrCmwKAoePPKSo6tBWl8hDWEK', 'dummy@koliho.com', 4, 0, 0, ''),
(4, 'dummyStr', '$2y$10$3YRswITgyZZYpwgxLc3ZN.emGdYMtrCmwKAoePPKSo6tBWl8hDWEK', 'dummystr@koliho.com', 3, 0, 0, ''),
(5, 'admin', '$2y$10$3YRswITgyZZYpwgxLc3ZN.emGdYMtrCmwKAoePPKSo6tBWl8hDWEK', 'admin@keraton.com', 2, 0, 0, ''),
(15, 'dummyCS2', '$2y$10$3YRswITgyZZYpwgxLc3ZN.emGdYMtrCmwKAoePPKSo6tBWl8hDWEK', 'dummycs2@koliho.com', 4, 0, 0, ''),
(16, 'customer', '$2y$10$3YRswITgyZZYpwgxLc3ZN.emGdYMtrCmwKAoePPKSo6tBWl8hDWEK', 'customer@koliho.com', 4, 0, 0, ''),
(27, 'superadmin1', '$2y$10$Sml3Vrlm2jBC5KWirJZZzezUG939cuP0iBHOP94kUKxAwK7nDn58K', 'adminsuper@keraton.com', 1, 0, 2, ''),
(31, 'guastore', '$2y$10$ukYl5HoTONW77kJWh6EGIOHh5ZNrlzafJs7TT9sazJ4Rqh88CbkbS', 'gua@gmail.com', 3, 0, 5, ''),
(32, 'test123', '$2y$10$gqOLXykDi449W2bn8TifN.rNA5xlrvtuIGJ6wbQ.jil.pPol.ljYq', 'test123@gmail.com', 3, 1, 5, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_agmpedia`
--
ALTER TABLE `tm_agmpedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_brand`
--
ALTER TABLE `tm_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_category`
--
ALTER TABLE `tm_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_customer`
--
ALTER TABLE `tm_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_product`
--
ALTER TABLE `tm_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_store_owner`
--
ALTER TABLE `tm_store_owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_super_admin`
--
ALTER TABLE `tm_super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_agmpedia`
--
ALTER TABLE `tm_agmpedia`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_brand`
--
ALTER TABLE `tm_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tm_category`
--
ALTER TABLE `tm_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tm_customer`
--
ALTER TABLE `tm_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_product`
--
ALTER TABLE `tm_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tm_store_owner`
--
ALTER TABLE `tm_store_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tm_super_admin`
--
ALTER TABLE `tm_super_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
