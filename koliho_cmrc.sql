-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2019 at 07:33 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `relation_brand_category`
--

CREATE TABLE `relation_brand_category` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation_brand_category`
--

INSERT INTO `relation_brand_category` (`id`, `brand_id`, `cat_id`, `user_id`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 2),
(3, 2, 2, 2),
(4, 2, 3, 2),
(5, 2, 4, 2),
(6, 2, 5, 2),
(7, 2, 6, 2),
(8, 3, 1, 2),
(9, 3, 2, 2),
(10, 3, 3, 2),
(11, 3, 4, 2),
(12, 3, 5, 2),
(13, 3, 6, 2),
(14, 4, 1, 2),
(15, 4, 3, 2),
(16, 5, 1, 2),
(17, 5, 2, 2),
(18, 5, 3, 2),
(19, 5, 4, 2),
(20, 5, 5, 2),
(21, 5, 6, 2),
(22, 9, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tm_agmpedia`
--

CREATE TABLE `tm_agmpedia` (
  `id` int(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `photo` blob NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_agmpedia`
--

INSERT INTO `tm_agmpedia` (`id`, `title`, `content`, `date`, `photo`, `user_id`) VALUES
(0, 'Test Pedia', 'Testing content agm pedia', '2019-01-12', 0x61676d5f70656469612d746573745f70656469612e706e67, 2),
(0, 'Test Pedia Dua', 'Test new pedia dua for agm pedia', '2019-01-12', 0x61676d5f70656469612d746573745f70656469615f6475612e706e67, 2);

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
(1, 'Aireloom', 2),
(2, 'Kingkoil', 2),
(3, 'Serta', 2),
(4, 'Tempur', 2),
(5, 'Florence', 2),
(6, 'Stressless', 2),
(7, 'dummy', 2),
(8, 'dummy2', 2),
(9, 'dummy3', 2);

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
(1, 'Mattress', 2),
(2, 'Bed Linen', 2),
(3, 'Pillow', 2),
(4, 'Bolster', 2),
(5, 'Quilt', 2),
(6, 'Mattress Protector', 2),
(7, 'dummy', 2),
(8, 'dummy2', 2),
(9, 'dummy3', 2);

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
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `comfort_lvl` varchar(100) NOT NULL,
  `tickness` varchar(50) NOT NULL,
  `headboard` varchar(100) NOT NULL,
  `foundation` varchar(100) NOT NULL,
  `size` varchar(150) NOT NULL,
  `pict` blob NOT NULL,
  `status` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_product`
--

INSERT INTO `tm_product` (`id`, `name`, `price`, `sub_price`, `quantity`, `description`, `comfort_lvl`, `tickness`, `headboard`, `foundation`, `size`, `pict`, `status`, `id_super_admin`) VALUES
(1, 'dummyProduct', '200000', '150000', 1000, 'This is a good mattress', 'Palatial Firm', '40 cm', 'Berkhampsted', 'Berkhampsted', '160x200, 180x200, 200x200', 0x616972656c6f6f6d2d6d617474726573732d64756d6d7970726f647563742e706e67, 1, 0),
(2, 'Kingkoil Bed Linen', '300000', '350000', 1500, 'This is a good Bed Linen', 'Palatial Firm', '30 cm', 'Berkhampsted', 'Berkhampsted', '160x200, 180x200, 200x200', 0x6b696e676b6f696c2d6265645f6c696e656e2d6b696e676b6f696c5f6265645f6c696e656e2e706e67, 3, 0),
(3, 'dummy product', '123435', '135599', 20000, 'this feels so good', 'Palatial Firm', '40 cm', 'Berkhampsted', 'Berkhampsted', '160x200, 180x200, 200x200', 0x73657274612d70696c6c6f772d64756d6d795f70726f647563742e706e67, 10, 0);

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
(2, 28, 'PT Someone', 'Somewhere', 'Ciracas', 'Ciracas', 'DKI', '13730', 0, 0, NULL, 5),
(3, 30, 'PT Someone Other', 'Somewhere', 'Ciracas', 'Ciracas', 'DKI', '13730', 0, 0, NULL, 5),
(4, 31, 'PT Test', 'test address', 'Ciracas', 'Ciracas', 'DKI', '13730', 0, 0, 'test owner', 5);

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
(4, 18, NULL, NULL, '088991122334'),
(5, 19, 'admin', 'dummy', '085812345678'),
(6, 20, 'Another', 'Super Admin', '081232456789'),
(7, 21, 'super', 'admin3', '081234566789'),
(8, 22, 'Kelep', 'Fredy', '08888888123'),
(9, 23, 'Fredy', 'Kelep', '088991122334'),
(10, 24, 'Try', 'Dummy', '088991122334'),
(11, 25, 'Try', 'Admin', '081234566789'),
(12, 26, 'some', 'one', '081122334455'),
(13, 27, 'some', 'other', '088991122334'),
(14, 29, 'dummy', 'superadmin', '088991122334');

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
  `created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `username`, `password`, `email`, `user_type`, `newer`, `created`) VALUES
(2, 'superAdmin', '$2y$10$mQvf0Gt2XHJyC0pTYoGecOPwLzAuPJ8HN.cMlVA79lTywQRC9bzmS', 'super.admin@keraton.com', 1, 0, NULL),
(3, 'dummyCS', '$2y$10$mQvf0Gt2XHJyC0pTYoGecOPwLzAuPJ8HN.cMlVA79lTywQRC9bzmS', 'dummy@koliho.com', 4, 0, NULL),
(4, 'dummyStr', '$2y$10$mQvf0Gt2XHJyC0pTYoGecOPwLzAuPJ8HN.cMlVA79lTywQRC9bzmS', 'dummystr@koliho.com', 3, 0, NULL),
(5, 'admin', '$2y$10$mQvf0Gt2XHJyC0pTYoGecOPwLzAuPJ8HN.cMlVA79lTywQRC9bzmS', 'admin@keraton.com', 2, 0, NULL),
(15, 'dummyCS2', '$2y$10$mQvf0Gt2XHJyC0pTYoGecOPwLzAuPJ8HN.cMlVA79lTywQRC9bzmS', 'dummycs2@koliho.com', 4, 0, NULL),
(16, 'customer', '$2y$10$mQvf0Gt2XHJyC0pTYoGecOPwLzAuPJ8HN.cMlVA79lTywQRC9bzmS', 'customer@koliho.com', 4, 0, NULL),
(18, 'admin2', '$2y$10$mQvf0Gt2XHJyC0pTYoGecOPwLzAuPJ8HN.cMlVA79lTywQRC9bzmS', 'admin.dua@koliho.com', 2, 1, 2),
(19, 'dummyAdmin', '$2y$10$W/sG5VErS3a0NfdusDEH4O8tX.cvnd8chHplNqkYGHEn1WQ3pHppa', 'dummy.admin@keraton.com', 2, 0, 2),
(20, 'superAdmin2', '$2y$10$UpBl3Zp.q4Iro9owkbQeuuvW.fzFKaxO99FBDeQLlGvxzUU8P9wuC', 'super.admin.dua@keraton.com', 1, 0, 2),
(21, 'superadmin3', '$2y$10$LiyCsq8jBT3X2ccWbxKdsOe7bOIxBdjXczSWoLbc9/K9WwrZ49jT6', 'superadmin3@koliho.com', 1, 0, 2),
(22, 'kelep', '$2y$10$Al17T0TO.VWgfZAQQWY8b.2GB.zoLeHA4uSjByl5O6s06OCPDlRUK', 'kelep@keraton.com', 1, 0, 2),
(23, 'kelep2', '$2y$10$4KP56.2EIm833067H5nMZOfPTFhz1pfmaSq2Hp.RJbEV05TQwGIuy', 'kelep2@keraton.com', 2, 0, 22),
(24, 'tryingDummy', '$2y$10$qkNJ3xb6DBDev.d/w8UrjelazqYhs0ZjmOFIVKL1NG02nesw2viTq', 'trying.dummy@keraton.com', 1, 0, 2),
(25, 'tryingAdmin', '$2y$10$UudgROaKmAMaBp41a20wzOWUUrFWdaJF7MMhu88rsn/.DWTZfnYma', 'trying.admin@keraton.com', 2, 0, 2),
(26, 'someone', '$2y$10$4VShPyleEsQDJbVnOLocvOwen3RlASKOcechDqfILD8Rqp3tQgVcC', 'someone@email.com', 1, 0, 2),
(27, 'someother', '$2y$10$JbV5GOIkW7j0EaI6n5FZ.e1tvwD2FIAcw5jrUvmdwdNxdlG2OZ9xu', 'someother@email.com', 2, 1, 26),
(28, 'somoneOwner', '$2y$10$2IoAxbWpzrBRjDte0tHoKezhsAncspVD6QKFHXHdKnWQTk2mUTqtq', 'someone@company.com', 3, 1, 5),
(29, 'dummy', '$2y$10$6OLUFwLTmS2maUqXsIG.FOH8//BUfe3zAxikWqzTNkqmFWtbfRmyq', 'dummySA@email.com', 1, 1, 2),
(30, 'someothers', '$2y$10$VBJeDcIHB/CgOYyJGRnYhuEA8l1jzCEEUI5Wwq2U9E61f4jBnbG12', 'someother@company.com', 3, 1, 5),
(31, 'test', '$2y$10$qDBPMNBlYgeLlJtfLZdlhe1ueK74epemLph/ciTt5naze4R5/GD.q', 'testSO@storeowner.com', 3, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `relation_brand_category`
--
ALTER TABLE `relation_brand_category`
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
-- AUTO_INCREMENT for table `relation_brand_category`
--
ALTER TABLE `relation_brand_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tm_brand`
--
ALTER TABLE `tm_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tm_category`
--
ALTER TABLE `tm_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tm_customer`
--
ALTER TABLE `tm_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tm_product`
--
ALTER TABLE `tm_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tm_store_owner`
--
ALTER TABLE `tm_store_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tm_super_admin`
--
ALTER TABLE `tm_super_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
