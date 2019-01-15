-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2019 at 07:03 PM
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
-- Table structure for table `tm_agmpedia`
--

CREATE TABLE `tm_agmpedia` (
  `id` int(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `photo` blob NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'active = 1, 2; inactive = 0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tm_brands`
--

CREATE TABLE `tm_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `logo` blob NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1; 0 = inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_brands`
--

INSERT INTO `tm_brands` (`id`, `name`, `logo`, `description`, `status`) VALUES
(1, 'Aireloom', 0x6272616e642d6c6f676f2d616972656c6f6f6d2e737667, 'Best brand', 1),
(2, 'Kingkoil', 0x6272616e642d6c6f676f2d6b696e676b6f696c2e737667, 'Best brand', 1),
(3, 'Florence', 0x6272616e642d6c6f676f2d666c6f72656e63652e737667, 'Best brand', 1),
(4, 'Serta', 0x6272616e642d6c6f676f2d73657274612e737667, 'Best Brand', 1),
(5, 'Tempur', 0x6272616e642d6c6f676f2d74656d7075722e737667, 'Best Brand', 1),
(6, 'Stressless', 0x6272616e642d6c6f676f2d7374726573736c6573732e737667, 'Best Brand', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_category`
--

CREATE TABLE `tm_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1; inactive = 0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_category`
--

INSERT INTO `tm_category` (`id`, `name`, `description`, `status`) VALUES
(1, 'Mattress', 'Best Mattress', 1),
(2, 'Bed Linen', 'Best bed linen', 1),
(3, 'Pillow', 'Best Pillow', 1),
(4, 'Bolster', 'Best bolster', 1),
(5, 'Quilt', 'Best Quilt', 1),
(6, 'Mattress Protector', 'Best Mattress Protector', 1);

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
  `brand_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tm_size`
--

CREATE TABLE `tm_size` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1; inactive =0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_size`
--

INSERT INTO `tm_size` (`id`, `name`, `size`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Twin', '97 cm × 191 cm', '2019-01-14 17:00:00', '2019-01-15 10:38:15', 1),
(2, 'Double', '135 cm × 191 cm', '2019-01-14 17:00:00', '2019-01-15 10:38:35', 1),
(3, 'Queen', '152 cm × 203 cm', '2019-01-14 17:00:00', '2019-01-15 10:38:58', 1),
(4, 'King', '193 cm × 203 cm', '2019-01-14 17:00:00', '2019-01-15 10:39:11', 1),
(5, 'California king', '183 cm × 213 cm', '2019-01-14 17:00:00', '2019-01-15 10:39:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_slide`
--

CREATE TABLE `tm_slide` (
  `id` int(11) NOT NULL,
  `slide` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_slide`
--

INSERT INTO `tm_slide` (`id`, `slide`, `created_at`, `updated_at`) VALUES
(3, 0x312e6a7067, '2019-01-14 17:00:00', '2019-01-15 06:04:20'),
(4, 0x322e6a7067, '2019-01-14 17:00:00', '2019-01-15 06:04:33'),
(5, 0x332e6a7067, '2019-01-14 17:00:00', '2019-01-15 06:04:44'),
(6, 0x342e6a7067, '2019-01-14 17:00:00', '2019-01-15 06:04:53'),
(7, 0x352e6a7067, '2019-01-14 17:00:00', '2019-01-15 06:05:07'),
(8, 0x362e6a7067, '2019-01-14 17:00:00', '2019-01-15 06:05:16'),
(9, 0x372e6a7067, '2019-01-14 17:00:00', '2019-01-15 06:05:35'),
(10, 0x382e6a7067, '2019-01-14 17:00:00', '2019-01-15 06:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `tm_spec`
--

CREATE TABLE `tm_spec` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1; inactive = 0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_spec`
--

INSERT INTO `tm_spec` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Luxurious Velour', 1, '2019-01-14 17:00:00', '2019-01-15 09:15:10'),
(2, 'Double Euro Top', 1, '2019-01-14 17:00:00', '2019-01-15 09:16:00'),
(3, 'Latex Layer', 1, '2019-01-14 17:00:00', '2019-01-15 09:16:23'),
(4, 'Nano Comfort Fiber', 1, '2019-01-14 17:00:00', '2019-01-15 09:16:34'),
(5, 'Double Latex Layer', 1, '2019-01-14 17:00:00', '2019-01-15 09:16:56'),
(6, 'Spine Support Foam', 1, '2019-01-14 17:00:00', '2019-01-15 09:17:07'),
(7, 'Smart Foam Guard', 1, '2019-01-14 17:00:00', '2019-01-15 09:17:16'),
(8, 'Luxurious Belgium Knit', 1, '2019-01-14 17:00:00', '2019-01-15 09:17:35'),
(9, 'Soft Touch Foam', 1, '2019-01-14 17:00:00', '2019-01-15 09:17:59'),
(10, '3D Mesh', 1, '2019-01-14 17:00:00', '2019-01-15 09:18:11'),
(11, 'Anti Dust Mite', 1, '2019-01-14 17:00:00', '2019-01-15 09:18:18'),
(12, 'Anti Fungus', 1, '2019-01-14 17:00:00', '2019-01-15 09:18:22'),
(13, 'Anti Bacterial', 1, '2019-01-14 17:00:00', '2019-01-15 09:18:28'),
(14, 'Luxurious Knit', 1, '2019-01-14 17:00:00', '2019-01-15 09:18:45'),
(15, 'Contour Zipper', 1, '2019-01-14 17:00:00', '2019-01-15 09:18:53'),
(16, 'Pillow Top', 1, '2019-01-14 17:00:00', '2019-01-15 09:18:59'),
(17, 'Premium Comfort Knit', 1, '2019-01-14 17:00:00', '2019-01-15 09:19:43'),
(18, 'Wool', 1, '2019-01-14 17:00:00', '2019-01-15 09:19:47'),
(19, 'Super Pillow Top', 1, '2019-01-14 17:00:00', '2019-01-15 09:19:56'),
(20, 'Euro Top', 1, '2019-01-14 17:00:00', '2019-01-15 09:20:04'),
(21, 'Belgium Knit', 1, '2019-01-14 17:00:00', '2019-01-15 09:20:13'),
(22, 'King Koil Knit', 1, '2019-01-14 17:00:00', '2019-01-15 09:20:21'),
(23, 'Foam Encasement', 1, '2019-01-14 17:00:00', '2019-01-15 09:20:28'),
(24, '3-Zone Pocket Spring', 1, '2019-01-14 17:00:00', '2019-01-15 09:20:38'),
(25, '5-Zone Pocket Spring', 1, '2019-01-14 17:00:00', '2019-01-15 09:20:50'),
(26, 'Premium Knit', 1, '2019-01-14 17:00:00', '2019-01-15 09:21:12'),
(27, 'Memory Foam', 1, '2019-01-14 17:00:00', '2019-01-15 09:21:17'),
(28, 'M-Guard', 1, '2019-01-14 17:00:00', '2019-01-15 09:21:21'),
(29, 'U-Beam', 1, '2019-01-14 17:00:00', '2019-01-15 09:21:27'),
(30, '7 Zone System', 1, '2019-01-14 17:00:00', '2019-01-15 09:21:42'),
(31, 'Alpaca', 1, '2019-01-14 17:00:00', '2019-01-15 09:21:46'),
(32, 'Anti Skid', 1, '2019-01-14 17:00:00', '2019-01-15 09:21:53'),
(33, 'Cashmere', 1, '2019-01-14 17:00:00', '2019-01-15 09:21:57'),
(34, 'Convoluted Foam', 1, '2019-01-14 17:00:00', '2019-01-15 09:22:06'),
(35, 'Coolplush Viscotech', 1, '2019-01-14 17:00:00', '2019-01-15 09:22:17'),
(36, 'Evo Inner Spring', 1, '2019-01-14 17:00:00', '2019-01-15 09:22:24'),
(37, 'Firm Support Latex', 1, '2019-01-14 17:00:00', '2019-01-15 09:22:37'),
(38, 'Foam With Edge', 1, '2019-01-14 17:00:00', '2019-01-15 09:22:56'),
(39, 'Gold Series Coil', 1, '2019-01-14 17:00:00', '2019-01-15 09:23:05'),
(40, 'Hairlock', 1, '2019-01-14 17:00:00', '2019-01-15 09:23:15'),
(41, 'High Density Support', 1, '2019-01-14 17:00:00', '2019-01-15 09:23:27'),
(42, 'Nano Fiber', 1, '2019-01-14 17:00:00', '2019-01-15 09:23:36'),
(43, 'Nested Pocket Spring', 1, '2019-01-14 17:00:00', '2019-01-15 09:25:38'),
(44, 'Soft Touch Memory Foam', 1, '2019-01-14 17:00:00', '2019-01-15 09:25:59'),
(45, 'Talalay Embrace', 1, '2019-01-14 17:00:00', '2019-01-15 09:26:07'),
(46, 'Talalay Latex Core', 1, '2019-01-14 17:00:00', '2019-01-15 09:26:32'),
(47, 'Talalay', 1, '2019-01-14 17:00:00', '2019-01-15 09:26:36'),
(48, 'Tufting', 1, '2019-01-14 17:00:00', '2019-01-15 09:26:42');

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
-- Table structure for table `tr_product`
--

CREATE TABLE `tr_product` (
  `id` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product`
--

INSERT INTO `tr_product` (`id`, `id_store`, `id_product`, `quantity`, `id_admin`) VALUES
(1, 1, 1, 100, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_spec`
--

CREATE TABLE `tr_product_spec` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `spec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `tm_agmpedia`
--
ALTER TABLE `tm_agmpedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_brands`
--
ALTER TABLE `tm_brands`
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
-- Indexes for table `tm_size`
--
ALTER TABLE `tm_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_slide`
--
ALTER TABLE `tm_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_spec`
--
ALTER TABLE `tm_spec`
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
-- Indexes for table `tr_product`
--
ALTER TABLE `tr_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_product_spec`
--
ALTER TABLE `tr_product_spec`
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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tm_brands`
--
ALTER TABLE `tm_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tm_category`
--
ALTER TABLE `tm_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
-- AUTO_INCREMENT for table `tm_size`
--
ALTER TABLE `tm_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tm_slide`
--
ALTER TABLE `tm_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tm_spec`
--
ALTER TABLE `tm_spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
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
-- AUTO_INCREMENT for table `tr_product`
--
ALTER TABLE `tr_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tr_product_spec`
--
ALTER TABLE `tr_product_spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
