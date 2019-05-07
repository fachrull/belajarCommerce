-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 06:12 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koliho_bcommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `mail_config`
--

DROP TABLE IF EXISTS `mail_config`;
CREATE TABLE IF NOT EXISTS `mail_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(50) NOT NULL,
  `host` varchar(45) NOT NULL,
  `port` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail_config`
--

INSERT INTO `mail_config` (`id`, `email`, `password`, `host`, `port`) VALUES
(6, 'adrian@keraton.co.id', 'QWRyaUBuMjMjQA==', 'mail.keraton.co.id', '587');

-- --------------------------------------------------------

--
-- Table structure for table `mail_queue`
--

DROP TABLE IF EXISTS `mail_queue`;
CREATE TABLE IF NOT EXISTS `mail_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_to` varchar(45) DEFAULT NULL,
  `mail_subject` varchar(45) DEFAULT NULL,
  `message` varchar(45) DEFAULT NULL,
  `template` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tm_agmpedia`
--

DROP TABLE IF EXISTS `tm_agmpedia`;
CREATE TABLE IF NOT EXISTS `tm_agmpedia` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `sub_content` varchar(125) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `thumbnail` blob NOT NULL,
  `photo` blob NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'active = 1, 2; inactive = 0',
  `user_id` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_agmpedia`
--

INSERT INTO `tm_agmpedia` (`id`, `title`, `sub_content`, `content`, `date`, `thumbnail`, `photo`, `status`, `user_id`, `deleted`) VALUES
(1, 'Cara Merawat Sprei', 'Sprei memiliki bahan yang unik sehingga cara perawatannya berbeda dengan bahan lainnya.', '<p>Bed linen atau sprei merupakan bahan yang unik serta memiliki karakteristik tersendiri yang tidak bisa disamakan cara perawatannya dengan bahan lain, untuk itu sangat disarankan untuk mengikuti tips cara merawat kain linen dibawah ini untuk menghindari kesalahan yang akan mengakibatkan kain linen anda rusak.</p>\r\n\r\n<ol>\r\n	<li>Perhatikan label yang tertera pada kain.</li>\r\n	<li>Gunakan Deterjen atau sabun pencuci yang memiliki tekstur lembut.</li>\r\n	<li>Gunakan air dengan suhu sedang tidak terlalu dingin dan juga tidak terlalu panas agar tidak merusak serat kain.</li>\r\n	<li>Pastikan tidak ada sabun atau busa yang masih menempel pada kain setelah pencucian. Karena jika tidak, dapat mengakibatkan oksidasi yang membuat kain kotor dan sulit dihilangkan.</li>\r\n	<li>Gunakan putaran <em>gentle cycle</em> atau putaran yang lembut jika mencuci menggunakan mesin.</li>\r\n	<li>Jangan mencampur kain sprei dengan bahan lain dan jangan direndam terlalu lama.</li>\r\n	<li>Keringkan kain di lokasi yang memiliki sinar matahari merata namun tidak terlalu terik dengan bagian dalam kain menghadap matahari.</li>\r\n	<li>Setrikalah kain linen pada suhu 204 &ndash; 218 derajat celcius (atau cari tombol khusus Linen pada setrika Anda) di bagian dalam terlebih dahulu, kemudian dilanjutkan dengan bagian luar agar kain terlihat berkilau, gantungkan selama lima menit sebelum dimasukkan ke lemari agar tidak mudah kusut.</li>\r\n	<li>Hindari penyimpanan di tempat yang dapat menimbulkan jamur.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dengan perawatan yang baik dan benar, bed linen akan memberikan kenyamanan tidur sempurna yang lebih lama untuk istirahat malam Anda. Selamat mencoba!&nbsp; :)</p>\r\n', '2019-01-23', 0x30315f616972656c6f6f6d5f696d70657269616c2d68657269746167652e6a7067, 0x70686f746f2d696d6167652d356361333239623261326365312e706e67, 1, 2, 0),
(2, 'New Article', 'Blablablabla', '<p>Coba ya</p>\r\n', '2019-04-10', 0x7468756d626e61696c2d696d6167652d356361646138376133626537362e6a7067, 0x41474d2d50454449412835303078323530292e6a7067, 1, 2, 1),
(3, 'Satu lagi', 'Kita coba lah ya', '<p>Dummy</p>\r\n', '2019-04-10', 0x41474d2d50454449412835303078323530292e6a7067, 0x41474d2d50454449415f2836373078323135292e6a7067, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_brands`
--

DROP TABLE IF EXISTS `tm_brands`;
CREATE TABLE IF NOT EXISTS `tm_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `logo` blob NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1; 0 = inactive',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_brands`
--

INSERT INTO `tm_brands` (`id`, `name`, `logo`, `description`, `status`, `deleted`) VALUES
(0, '-', '', '-', 1, 0),
(1, 'Aireloom', 0x6272616e642d6c6f676f2d616972656c6f6f6d2e706e67, '<p>Best brand</p>\r\n', 1, 0),
(2, 'Kingkoil', 0x6272616e642d6c6f676f2d6b696e676b6f696c2e737667, 'Best brand', 1, 0),
(3, 'Florence', 0x6272616e642d6c6f676f2d666c6f72656e63652e737667, 'Best brand', 1, 0),
(4, 'Serta', 0x6272616e642d6c6f676f2d73657274612e6a706567, '<p>Best Brand</p>\r\n', 1, 0),
(5, 'Tempur', 0x6272616e642d6c6f676f2d74656d7075722e737667, 'Best Brand', 1, 0),
(6, 'Stressless', 0x6272616e642d6c6f676f2d7374726573736c6573732e737667, 'Best Brand', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_category`
--

DROP TABLE IF EXISTS `tm_category`;
CREATE TABLE IF NOT EXISTS `tm_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1; inactive = 0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_category`
--

INSERT INTO `tm_category` (`id`, `name`, `description`, `status`, `deleted`) VALUES
(0, '-', '-', 1, 0),
(1, 'Mattress', 'Best Mattress', 1, 0),
(2, 'Bed Linen', 'Best bed linen', 1, 0),
(3, 'Pillow', 'Best Pillow', 1, 0),
(4, 'Bolster', 'Best bolster', 1, 0),
(5, 'Quilt', 'Best Quilt', 1, 0),
(6, 'Mattress Protector', 'Best Mattress Protector', 1, 0),
(7, 'Set', 'Best Set', 1, 0),
(8, 'Bed Set', 'Best Bed Set', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tm_cover`
--

DROP TABLE IF EXISTS `tm_cover`;
CREATE TABLE IF NOT EXISTS `tm_cover` (
  `id` int(11) NOT NULL,
  `slide` blob NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `cover` char(1) NOT NULL COMMENT '1 = header, 2 = best seller, 3 = special package, 4 = bed linen, 5 = bedding acc	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_cover`
--

INSERT INTO `tm_cover` (`id`, `slide`, `created_at`, `update_at`, `cover`) VALUES
(1, 0x312e6a7067, '2019-03-26 00:00:00', NULL, '1'),
(2, 0x626573742d73656c6c65722d636f7665722d356339613461623439653836652e6a7067, '2019-03-26 00:00:00', NULL, '2'),
(6, 0x7370656369616c2d7061636b6167652d636f7665722d356339613539353434633666362e6a7067, '2019-03-26 00:00:00', NULL, '3'),
(7, 0x6265642d6c696e656e2d636f7665722d356339613930393337623438322e6a7067, '2019-03-26 00:00:00', NULL, '4'),
(8, 0x62656464696e672d6163636573736f726965732d636f7665722d356339613934633761323632392e6a7067, '2019-03-26 00:00:00', NULL, '5');

-- --------------------------------------------------------

--
-- Table structure for table `tm_customer`
--

DROP TABLE IF EXISTS `tm_customer`;
CREATE TABLE IF NOT EXISTS `tm_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_userlogin` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` char(1) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_customer`
--

INSERT INTO `tm_customer` (`id`, `id_userlogin`, `first_name`, `last_name`, `gender`, `phone`) VALUES
(1, 15, 'dummy', 'customer2', 'm', '085712345678'),
(5, 40, 'fachrul', 'fandi', 'm', '085712345678');

-- --------------------------------------------------------

--
-- Table structure for table `tm_customer_detail`
--

DROP TABLE IF EXISTS `tm_customer_detail`;
CREATE TABLE IF NOT EXISTS `tm_customer_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_userlogin` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `province` char(2) NOT NULL,
  `city` char(4) NOT NULL,
  `sub_district` char(6) NOT NULL,
  `postcode` varchar(25) NOT NULL,
  `default_address` int(11) NOT NULL DEFAULT '0' COMMENT 'active = 1; inactive = 0',
  PRIMARY KEY (`id`),
  KEY `city` (`city`),
  KEY `id_userlogin` (`id_userlogin`),
  KEY `province` (`province`),
  KEY `sub_district` (`sub_district`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_customer_detail`
--

INSERT INTO `tm_customer_detail` (`id`, `id_userlogin`, `first_name`, `last_name`, `gender`, `email`, `phone`, `address`, `province`, `city`, `sub_district`, `postcode`, `default_address`) VALUES
(1, 15, 'dummy', 'customer2', 'm', '', '085712345678', 'Jl. Sesama No.123', '31', '3174', '317403', '12780', 1),
(2, 40, 'fachrul', 'fandi', 'm', 'fachrul@email.com', '085712345678', 'Jl. Sesama No.123', '31', '3175', '317509', '13730', 0),
(3, 40, 'fachrul', 'fandi', 'm', 'fachrulpaul@gmail.com', '085712345678', 'Jl. Tidak Sesama No.321', '31', '3174', '317403', '12780', 1),
(5, 40, 'fachrul', 'fandi', 'm', 'dummystr@koliho.com', '2188877665', 'Jl. Sesama No. 123', '31', '3174', '317403', '12345678', 0),
(8, 40, 'fachrul', 'fandiw', 'm', 'fachrul@email.com', '08571234567', 'Jl. Tidak Sesama No.321', '31', '3174', '317403', '12780', 0),
(13, 40, 'Fachrul', 'Fandi', 'm', 'fachrul@email.com', '085712345678', 'Jl. Sesama No. 123', '31', '3174', '317403', '12780', 0),
(14, 42, 'fandi', 'wiradhika', 'm', 'fandi@email.com', '085787654321', 'Jl. Sesama No. 123', '31', '3174', '317403', '12780', 1),
(15, 15, 'Adrian', 'Faisal', '', 'adrianfaisal@student.gunadarma.ac.id', '2178881112', 'Jl. Margonda Raya No.100, Pondok Cina, Beji', '31', '3174', '317401', '16424', 0),
(16, 15, 'Adrian', 'Faisal', '', 'adrianfaisal@aol.com', '2178881112', 'Jln. Sesama', '31', '3174', '317401', '12345', 0),
(17, 15, 'Adrian', 'Faisal', '', 'adrianfaisal@aol.com', '2178881112', 'Jl. Margonda Raya No.100, Pondok Cina, Beji', '31', '3174', '317401', '16424', 0),
(18, 40, 'Fachrul', 'Katob', '', 'fachrulpaul@gmail.com', '02112345678', 'Jl. Margonda Raya No.100, Pondok Cina, Beji', '31', '3174', '317402', '16424', 0),
(19, 15, 'Adrian', 'Faisal', '', 'adrianfaisal@aol.com', '2178881112', 'Jl. Margonda Raya No.100, Pondok Cina, Beji', '31', '3174', '317402', '16424', 0),
(20, 15, 'Adrian', 'Faisal', '', 'fachrulpaul@gmail.com', '2178881112', 'Jl. Margonda Raya No.100, Pondok Cina, Beji', '31', '3174', '317401', '16424', 0),
(21, 43, 'garry', 'devaldi', 'm', 'm9arryd2@gmail.com', '08129492011', 'Jl. Kapuk', '31', '3174', '317403', '15569', 1),
(22, 44, 'garry', 'kasparov', 'm', 'hahaha@email.com', '08119273822', 'Jl. Boulevard Artha Gading Selatan No. 1 Lantai 3F, Blok A2  No. 18 - 20 Kelapa Gading - Jakarta Utara', '32', '3210', '321014', '15572', 1),
(23, 46, 'Adrian', 'Faisal', 'm', 'adrianfaisal@student.gunadarma.ac.id', '2178881112', 'Jl. Margonda Raya No.100, Pondok Cina, Beji', '32', '3276', '327606', '16424', 1),
(24, 47, 'kelep', 'kelep', 'm', 'kelepkelep@email.com', '087783877824', 'Jalan Komjen.Pol.M.Jasin', '32', '3276', '327602', '16451', 1),
(25, 48, 'Adrian', 'Faisal', 'm', 'adrianfaisal@icloud.com', '2178881112', 'Jl. Margonda Raya No.100, Pondok Cina, Beji', '31', '3174', '317401', '16424', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_forgot_pass`
--

DROP TABLE IF EXISTS `tm_forgot_pass`;
CREATE TABLE IF NOT EXISTS `tm_forgot_pass` (
  `id` int(11) NOT NULL,
  `id_userLogin` int(11) NOT NULL,
  `uniqueCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tm_newsletter`
--

DROP TABLE IF EXISTS `tm_newsletter`;
CREATE TABLE IF NOT EXISTS `tm_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `subscribe_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_newsletter`
--

INSERT INTO `tm_newsletter` (`id`, `email`, `subscribe_date`) VALUES
(6, 'adrianfaisal@aol.com', '2019-04-15 02:31:59'),
(7, 'devaldi98@emil.com', '2019-04-16 09:44:59'),
(8, 'iasudha@email.com', '2019-04-16 09:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `tm_order`
--

DROP TABLE IF EXISTS `tm_order`;
CREATE TABLE IF NOT EXISTS `tm_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(100) NOT NULL,
  `id_userlogin` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address_detail` int(11) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `id_voucher` int(11) DEFAULT NULL,
  `number_item` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `adress_detail` (`address_detail`),
  KEY `id_userlogin` (`id_userlogin`),
  KEY `index_inv` (`order_number`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_order`
--

INSERT INTO `tm_order` (`id`, `order_number`, `id_userlogin`, `total`, `order_date`, `address_detail`, `status_order`, `id_voucher`, `number_item`) VALUES
(49, 'AGM080319125', 15, '1000000', '2019-03-08 15:46:48', 1, 3, NULL, 0),
(50, 'AGM130319922', 40, '1000000', '2019-03-13 16:14:44', 5, 4, NULL, 0),
(51, 'AGM150319549', 40, '1000000', '2019-03-15 15:36:50', 3, 2, NULL, 0),
(54, 'AGM180319857', 40, '3000000', '2019-03-18 00:51:11', 8, 2, NULL, 0),
(55, 'AGM050419271', 15, '2000000', '2019-04-05 04:28:16', 17, 2, NULL, 0),
(56, 'AGM050419664', 40, '2000000', '2019-04-05 06:40:01', 18, 2, NULL, 0),
(57, 'AGM060419761', 15, '1000000', '2019-04-06 08:22:57', 17, 3, NULL, 0),
(58, 'AGM060419793', 15, '2000000', '2019-04-06 08:32:43', 17, 1, NULL, 0),
(59, 'AGM060419656', 40, '22222222', '2019-04-06 08:38:27', 3, 4, NULL, 0),
(60, 'AGM060419813', 40, '2000000', '2019-04-06 08:49:15', 3, 1, NULL, 0),
(61, 'AGM060419313', 40, '1000000', '2019-04-06 09:42:00', 3, 4, NULL, 0),
(62, 'AGM060419926', 40, '22222222', '2019-04-06 09:44:25', 3, 2, NULL, 0),
(63, 'AGM060419121', 15, '2000000', '2019-04-06 14:00:43', 20, 3, NULL, 0),
(64, 'AGM060419907', 15, '1000000', '2019-04-06 14:24:43', 17, 3, NULL, 0),
(65, 'AGM060419774', 15, '1000000', '2019-04-06 15:12:47', 15, 3, NULL, 0),
(66, 'AGM060419984', 15, '2000000', '2019-04-06 15:41:01', 15, 3, NULL, 0),
(68, 'AGM220419170', 48, '126750000', '2019-04-22 02:26:08', 25, 4, NULL, 0),
(69, 'AGM220419224', 48, '139425000', '2019-04-22 02:26:49', 25, 3, NULL, 0),
(70, 'AGM220419977', 15, '2000000', '2019-04-22 05:09:12', 15, 2, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tm_product`
--

DROP TABLE IF EXISTS `tm_product`;
CREATE TABLE IF NOT EXISTS `tm_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stars` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `active` int(11) DEFAULT '1',
  `main_sp` int(11) NOT NULL DEFAULT '0' COMMENT 'specialPkg = 1; not specialPKG = 0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_product`
--

INSERT INTO `tm_product` (`id`, `brand_id`, `cat_id`, `name`, `description`, `image`, `created_at`, `updated_at`, `stars`, `position`, `active`, `main_sp`, `deleted`) VALUES
(1, 1, 1, 'Imperial Heritage', '<p>description</p>\r\n', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-05-06 01:49:18', 5, 1, 1, 1, 0),
(2, 1, 1, 'Royal Souvereign', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-29 13:07:12', 0, 2, 1, 0, 0),
(3, 1, 1, 'Coronation', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-29 13:07:23', 0, 3, 1, 0, 0),
(4, 1, 1, 'Baron', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-29 13:07:27', 0, 4, 1, 0, 0),
(5, 2, 1, 'Antoinette', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(6, 2, 1, 'Ernestine', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(7, 2, 1, 'Cordelia', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(8, 2, 1, 'Granville', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(9, 2, 1, 'Hariett', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(10, 2, 1, 'Ophelia', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(11, 2, 1, 'Suite Palais', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(12, 2, 1, 'Suite Ambassadeur', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(13, 2, 1, 'Suite Viceroy', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(14, 3, 1, 'Saveria', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(15, 3, 1, 'Amadore', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(16, 3, 1, 'Calvia', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(17, 3, 1, 'Isadore', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(18, 3, 1, 'Elista', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(19, 3, 1, 'Ellinor', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(20, 3, 1, 'Spine-X', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(21, 3, 1, 'Granada', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(22, 3, 1, 'Almeria', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(23, 5, 1, 'Medicci', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(24, 5, 1, 'Messina', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(25, 5, 1, 'Fossano', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(26, 5, 1, 'Riccione', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(27, 5, 1, 'Vinitto', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(28, 5, 1, 'Vecchia', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(29, 5, 1, 'Soft Cloud', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(30, 3, 7, 'Hermione', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(31, 5, 7, 'Eccitato', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(32, 5, 7, 'Castrociello', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(33, 2, 3, 'Royale Pillow', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(34, 2, 2, 'Royale Bolster', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(35, 2, 5, 'Light Quilt Dacron', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(36, 2, 4, 'Fitted Mattress Protector', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(37, 2, 3, 'Nano Pillow Soft', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(38, 2, 3, 'Nano Pillow Firm', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(39, 2, 2, 'Nano Bolster', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(40, 2, 3, 'Nano King Pillow', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(41, 2, 5, 'Nano Quilt', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(42, 2, 4, 'Pillow Protector', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(43, 2, 4, 'Bolster Protector', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(44, 2, 4, 'Waterproof Mattress Protector Jerse', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(45, 2, 3, 'Goose Down Pillow 90%', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(46, 2, 3, 'Goose Down Pillow Sandwich', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(47, 2, 3, 'Goose Down Pillow Soft Feather', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(48, 2, 2, 'Goose Down Bolster', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(49, 2, 5, 'Goose Down Quilt', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(50, 2, 3, 'Nano Down Chamber Pillow', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(51, 3, 3, 'Ball Fiber Pillow', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(52, 3, 2, 'Ball Fiber Bolster', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(53, 3, 3, 'Long Pillow', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(54, 3, 5, 'Light Quilt Dacron', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(55, 3, 4, 'Fitted Mattress Protector', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(56, 3, 3, 'Nano Gel Pillow', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(57, 3, 2, 'Nano Gel Bolster', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(58, 3, 5, 'Nano Gel Light Quilt', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(59, 3, 4, 'Pillow Protector', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(60, 3, 4, 'Bolster Protector', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(61, 3, 4, 'Waterproof Mattress Protector', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(62, 3, 3, 'Goose Down Pillow 30%', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(63, 3, 3, 'Goose Down Pillow Sandwich', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(64, 3, 3, 'Goose Down Pillow 50%', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(65, 3, 3, 'Goose Down Pillow 90%', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(66, 3, 2, 'Goose Down Bolster', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(67, 3, 5, 'Goose Down Quilt', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(68, 5, 3, 'Lyocell Embossed Pillow', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(69, 5, 2, 'Lyocell Embossed Bolster', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(70, 5, 3, 'Filler Pillow', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(71, 5, 2, 'Filler Bolster', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(72, 5, 5, 'Light Quilt Dacron', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(73, 5, 4, 'Fitted Mattress Protector', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(74, 5, 3, 'Fiber Gel Pillow', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(75, 5, 2, 'Fiber Gel Bolster', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(76, 5, 5, 'Fiber Gel Light Quilt', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(77, 5, 4, 'Pillow Protector', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(78, 5, 4, 'Waterproof Mattress Protector', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(79, 4, 1, 'Original Supreme', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(80, 4, 1, 'Original Elite', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(81, 4, 1, 'Sensation Supreme', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(82, 4, 1, 'Sensation Elite', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(83, 4, 3, 'Original Pillow', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(84, 4, 3, 'Original Pillow Queen', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(85, 4, 3, 'Millenium Pillow', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(86, 4, 3, 'Millenium Pillow Queen', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(87, 4, 3, 'Simphony', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(88, 4, 2, 'Tempur Flex 2000', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(89, 4, 2, 'PBC Bed Set', 'description', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-04-21 17:57:00', '2019-04-21 17:57:00', 0, 0, 1, 0, 0),
(90, 1, 1, 'Product Dummy', '<p>Dummy</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-21 17:00:00', '2019-04-29 13:08:00', 5, 5, 1, 0, 0),
(91, 1, 1, 'Dummy Product', '<p>DUmmy DUmmy DUmmy</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-21 17:00:00', '2019-04-29 13:08:03', 0, 6, 1, 0, 0),
(92, 0, 0, 'Special Package', '<p>Dummy</p>\r\n', '', '2019-04-22 04:35:03', '2019-04-22 13:36:54', 0, 0, 1, 0, 0),
(93, 0, 0, 'Test', '<p>Dummy</p>\r\n', '', '2019-04-22 15:29:14', '2019-04-22 15:29:14', 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tm_promotion`
--

DROP TABLE IF EXISTS `tm_promotion`;
CREATE TABLE IF NOT EXISTS `tm_promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` blob NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_promotion`
--

INSERT INTO `tm_promotion` (`id`, `name`, `description`, `image`, `start_date`, `end_date`, `status`, `deleted`) VALUES
(6, 'Some promotion', '<p>grass</p>\r\n', 0x70726f6d6f74696f6e2d696d6167652d356362633035663639333831622e6a7067, '2019-04-08', '2019-04-09', 1, 1),
(7, 'Promosi AGM Baru', '<p>Some promotion</p>\r\n', 0x70726f6d6f74696f6e2d696d6167652d356362636336303339336330632e6a7067, '2019-04-07', '2019-04-20', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tm_review`
--

DROP TABLE IF EXISTS `tm_review`;
CREATE TABLE IF NOT EXISTS `tm_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `stars` int(1) NOT NULL COMMENT 'give 1 -- 5',
  `date_attempt` datetime DEFAULT CURRENT_TIMESTAMP,
  `display` char(1) NOT NULL DEFAULT '0' COMMENT 'active = 1; inactive = 0',
  PRIMARY KEY (`id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_review`
--

INSERT INTO `tm_review` (`id`, `prod_id`, `name`, `email`, `comment`, `stars`, `date_attempt`, `display`) VALUES
(1, 37, 'Fachrul', 'fachrul@email.com', 'First comment', 2, '2019-03-21 16:39:11', '0'),
(2, 37, 'Kelep', 'kelep@email.com', 'Second Comment', 3, '2019-03-22 17:07:22', '0'),
(3, 37, 'awokawok', 'someother@company.com', 'Third Comment', 4, '2019-03-22 17:41:41', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tm_size`
--

DROP TABLE IF EXISTS `tm_size`;
CREATE TABLE IF NOT EXISTS `tm_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1; inactive =0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_size`
--

INSERT INTO `tm_size` (`id`, `name`, `size`, `created_at`, `updated_at`, `status`, `deleted`) VALUES
(0, 'Pkg', '-', '2019-01-14 10:00:00', '2019-01-15 03:38:15', 1, 0),
(1, 'Single', '100 cm × 200cm', '2019-01-14 10:00:00', '2019-01-15 03:38:15', 1, 0),
(2, 'Single XL', '120 cm × 200 cm', '2019-01-14 10:00:00', '2019-01-15 03:38:35', 1, 0),
(3, 'Queen', '160 cm × 200 cm', '2019-01-14 10:00:00', '2019-01-15 03:38:58', 1, 0),
(4, 'King', '180 cm × 200 cm', '2019-01-14 10:00:00', '2019-01-15 03:39:11', 1, 0),
(5, 'Super King', '200 cm × 200 cm', '2019-01-14 10:00:00', '2019-01-15 03:39:35', 1, 0),
(6, 'Single Quilt', '160 cm x  210 cm', '2019-04-11 01:34:49', '2019-04-11 01:34:49', 1, 0),
(7, 'Queen Quilt', '210 cm x 210 cm', '2019-04-11 01:34:49', '2019-04-11 01:34:49', 1, 0),
(8, 'King Quilt', '240 cm x 210 cm', '2019-04-11 01:34:49', '2019-04-11 01:34:49', 1, 0),
(9, 'Super King Quilt', '260 cm x 230 cm', '2019-04-11 01:34:49', '2019-04-11 01:34:49', 1, 0),
(10, 'Medium', 'M', '2019-04-11 01:34:49', '2019-04-11 01:34:49', 1, 0),
(11, 'Large', 'L', '2019-04-11 01:34:49', '2019-04-11 01:34:49', 1, 0),
(12, 'Extra Large', 'XL', '2019-04-11 01:34:49', '2019-04-11 01:34:49', 1, 0),
(13, 'Standard', 'Std', '2019-04-11 02:49:47', '2019-04-11 02:49:47', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tm_slide`
--

DROP TABLE IF EXISTS `tm_slide`;
CREATE TABLE IF NOT EXISTS `tm_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_slide`
--

INSERT INTO `tm_slide` (`id`, `slide`, `created_at`, `updated_at`) VALUES
(3, 0x312e6a7067, '2019-01-14 17:00:00', '2019-01-15 06:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `tm_spec`
--

DROP TABLE IF EXISTS `tm_spec`;
CREATE TABLE IF NOT EXISTS `tm_spec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1; inactive = 0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_spec`
--

INSERT INTO `tm_spec` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted`) VALUES
(1, '3D Mesh', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(2, '3-Zone Ortho Spring', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(3, '3-Zone Pocket Spring', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(4, '5-Zone Pocket Spring', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(5, '7 Zone System', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(6, 'Alpaca', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(7, 'Anti Bacterial', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(8, 'Anti Dust Mite', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(9, 'Anti Fungus', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(10, 'Anti Skid', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(11, 'Back Support Foam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(12, 'Belgium Knit', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(13, 'Buckskin Suede', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(14, 'Cashmere', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(15, 'Contour Zipper', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(16, 'Convoluted Foam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(17, 'Coolplush Viscotech', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(18, 'CoolTouch Plain', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(19, 'Double Euro Top', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(20, 'Double Latex Layer', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(21, 'Double Soft Touch Foam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(22, 'Euro Top', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(23, 'Evo Inner Spring', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(24, 'Firm Comfort Foam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(25, 'Firm Support Base', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(26, 'Firm Support Foam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(27, 'Firm Support Latex', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(28, 'Foam Encasement', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(29, 'Foam With Edge', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(30, 'Gold Series Coil', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(31, 'Hairlock', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(32, 'HD Gold Series Coil', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(33, 'High Density Support', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(34, 'Honeycomb Pocket Coil', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(35, 'Honeycomb Pocket on Pocket Coil', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(36, 'King Koil Knit', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(37, 'Knitted Upholstery', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(38, 'KoolComfort', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(39, 'Latex Layer', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(40, 'LFK Spring System', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(41, 'Luxurious Belgium Knit', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(42, 'Luxurious Belgium Knit with Adaptive Technology', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(43, 'Luxurious Knit', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(44, 'Luxurious Velour', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(45, 'Memory Foam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(46, 'M-Guard', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(47, 'Motion Absorption Comfort Layer', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(48, 'Motion Comfort Layer', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(49, 'Nano Comfort Fiber', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(50, 'Nano Fiber', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(51, 'NaturalFit Knit', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(52, 'Nested Pocket Spring', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(53, 'Ortho Spring', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(54, 'Pillow Top', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(55, 'Plush Foam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(56, 'Pocket Spring System', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(57, 'Power Coil', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(58, 'Premium Comfort Knit', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(59, 'Premium Knit', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(60, 'Sleep Protection', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(61, 'Smart Foam Guard', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(62, 'Soft Touch Foam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(63, 'Soft Touch Memory Foam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(64, 'Spine Support Foam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(65, 'Super Pillow Top', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(66, 'Super Pillow Top + Euro Top', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(67, 'Talalay', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(68, 'Talalay Embrace', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(69, 'Talalay Latex Core', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(70, 'Talalay Latex Layer', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(71, 'Tempur Viscoelastic foam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(72, 'Tufting', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(73, 'U-Beam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(74, 'Ultimate Comfort Foam', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0),
(75, 'Wool', 1, '2019-04-21 17:48:02', '2019-04-21 17:48:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tm_special_package`
--

DROP TABLE IF EXISTS `tm_special_package`;
CREATE TABLE IF NOT EXISTS `tm_special_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` blob NOT NULL,
  `description` text NOT NULL,
  `active` char(1) NOT NULL COMMENT 'active = 1; inactive = 0',
  `main_product` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `main_product` (`main_product`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_special_package`
--

INSERT INTO `tm_special_package` (`id`, `name`, `image`, `description`, `active`, `main_product`) VALUES
(17, 'Test Special Pacakge', 0x746573745f7370656369616c5f706163616b67652d31312e6a7067, '<p>Test description special package</p>\r\n', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_status_order`
--

DROP TABLE IF EXISTS `tm_status_order`;
CREATE TABLE IF NOT EXISTS `tm_status_order` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_status_order`
--

INSERT INTO `tm_status_order` (`id`, `class`, `status`) VALUES
(1, 'btn-success', 'Sampai Tujuan'),
(2, 'btn-warning', 'Menunggu Konfirmasi'),
(3, 'btn-danger', 'Dibatalkan'),
(4, 'btn-secondary', 'Order Belum Lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `tm_store_owner`
--

DROP TABLE IF EXISTS `tm_store_owner`;
CREATE TABLE IF NOT EXISTS `tm_store_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_userlogin` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `address2` text,
  `sub_district` char(6) NOT NULL,
  `city` char(4) NOT NULL,
  `province` char(2) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `postcode` varchar(25) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `id_super_admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_store_owner`
--

INSERT INTO `tm_store_owner` (`id`, `id_userlogin`, `company_name`, `address`, `address2`, `sub_district`, `city`, `province`, `latitude`, `longitude`, `postcode`, `phone1`, `fax`, `id_super_admin`) VALUES
(1, 36, 'AGM JDC', 'Jl. Gatot Subroto No. 53, Jakarta Design Center Lantai 4 - 4SR081', 'Jakarta Design Center Lantai 4 - 4SR081', '317403', '3174', '31', -6.201671, 106.80097, '12780', '0215720533', '', 2),
(2, 37, 'AGM Simpruk', 'Jl. Teuku Nyak Arief, Simpruk Garden Raya Blok G No.1, Permata Hijau', 'Jakarta Design Center Lantai 4 - 4SR081', '317405', '3174', '31', -6.234099, 106.786999, '12220', '0217254363', '', 2),
(3, 38, 'AGM Emporium Pluit Mall', 'Jl. Pluit Selatan Raya No.5', 'Emporim Mall Pluit Lantai 3-23, 3-25, 3-26', '317201', '3172', '31', -6.127242, 106.790272, '14440', '02166676278', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tm_super_admin`
--

DROP TABLE IF EXISTS `tm_super_admin`;
CREATE TABLE IF NOT EXISTS `tm_super_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_userlogin` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_super_admin`
--

INSERT INTO `tm_super_admin` (`id`, `id_userlogin`, `first_name`, `last_name`, `phone`) VALUES
(1, 5, 'First', 'Admin', '02198761234'),
(2, 2, 'Super', 'Admin', '02112345678'),
(5, 19, 'admin', 'dummy', '085812345678'),
(6, 20, 'Another', 'Super Admin', '081232456789'),
(7, 21, 'super', 'admin3', '081234566789'),
(8, 22, 'Kelep', 'Fredy', '08888888123'),
(9, 23, 'Fredy', 'Kelep', '088991122334'),
(10, 24, 'Try', 'Dummy', '088991122334'),
(11, 25, 'Try', 'Admin', '081234566789'),
(12, 26, 'some', 'one', '081122334455'),
(13, 27, 'some', 'other', '088991122334'),
(14, 29, 'dummy', 'superadmin', '088991122334'),
(15, 45, 'agm', 'admin', '08112233456');

-- --------------------------------------------------------

--
-- Table structure for table `tm_voucher`
--

DROP TABLE IF EXISTS `tm_voucher`;
CREATE TABLE IF NOT EXISTS `tm_voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_voucher` char(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `bonus` int(11) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_voucher`
--

INSERT INTO `tm_voucher` (`id`, `kode_voucher`, `name`, `description`, `bonus`, `discount`, `jumlah`, `active`) VALUES
(7, 'AGM_VCR0001', 'Voucher Pertama', '<p>Test Voucher Pertama</p>\r\n', 2, '0.70', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_bonus_voucher`
--

DROP TABLE IF EXISTS `tr_bonus_voucher`;
CREATE TABLE IF NOT EXISTS `tr_bonus_voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_voucher` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_voucher` (`id_voucher`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_bonus_voucher`
--

INSERT INTO `tr_bonus_voucher` (`id`, `id_voucher`, `bonus`) VALUES
(1, 10, 3),
(2, 10, 7),
(3, 10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tr_order_detail`
--

DROP TABLE IF EXISTS `tr_order_detail`;
CREATE TABLE IF NOT EXISTS `tr_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tm_order` int(11) DEFAULT NULL,
  `id_tr_product` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_order` (`id_tm_order`),
  KEY `index_product` (`id_tr_product`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_order_detail`
--

INSERT INTO `tr_order_detail` (`id`, `id_tm_order`, `id_tr_product`, `quantity`, `subtotal`) VALUES
(1, 49, 4, 1, 1000000),
(2, 50, 4, 1, 1000000),
(3, 51, 4, 1, 1000000),
(7, 54, 5, 3, 3000000),
(8, 55, 4, 2, 2000000),
(9, 56, 9, 1, 2000000),
(10, 57, 10, 1, 1000000),
(11, 58, 9, 1, 2000000),
(12, 59, 5, 1, 22222222),
(13, 60, 9, 1, 2000000),
(14, 61, 4, 1, 1000000),
(15, 62, 5, 1, 22222222),
(16, 63, 9, 1, 2000000),
(17, 64, 10, 1, 1000000),
(18, 65, 4, 1, 1000000),
(19, 66, 9, 1, 2000000),
(22, 68, 253, 1, 126750000),
(23, 69, 254, 1, 139425000),
(24, 70, 260, 1, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product`
--

DROP TABLE IF EXISTS `tr_product`;
CREATE TABLE IF NOT EXISTS `tr_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_store` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_product_size` int(11) NOT NULL,
  `quantity` int(11) DEFAULT '0',
  `new` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1; inactive = 0',
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  KEY `id_product_size` (`id_product_size`),
  KEY `id_store` (`id_store`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product`
--

INSERT INTO `tr_product` (`id`, `id_store`, `id_product`, `id_product_size`, `quantity`, `new`, `id_admin`) VALUES
(1, 1, 1, 253, 100, 1, 2),
(2, 1, 1, 254, 100, 1, 2),
(3, 1, 92, 260, 100, 0, 2),
(4, 1, 34, 144, 10, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_bedding_acc`
--

DROP TABLE IF EXISTS `tr_product_bedding_acc`;
CREATE TABLE IF NOT EXISTS `tr_product_bedding_acc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `stars` char(1) NOT NULL COMMENT 'give star 0 -- 5',
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product_bedding_acc`
--

INSERT INTO `tr_product_bedding_acc` (`id`, `prod_id`, `stars`, `position`) VALUES
(1, 21, '3', 1),
(2, 22, '5', 2),
(3, 23, '5', 3),
(4, 25, '5', 4),
(5, 26, '5', 5),
(6, 27, '5', 6),
(7, 28, '5', 7),
(8, 30, '5', 8),
(9, 59, '5', 9),
(10, 60, '5', 10),
(11, 61, '5', 11),
(12, 62, '5', 12),
(13, 81, '5', 13),
(14, 82, '5', 14),
(15, 83, '5', 15),
(16, 84, '5', 16),
(17, 93, '5', 17),
(18, 103, '5', 18),
(19, 104, '5', 19),
(20, 105, '5', 20),
(22, 31, '5', 22),
(23, 32, '5', 23),
(24, 66, '5', 24),
(25, 67, '5', 25),
(26, 106, '5', 26),
(27, 107, '5', 27),
(28, 108, '5', 28),
(29, 34, '5', 29),
(30, 35, '5', 30),
(31, 69, '5', 31),
(32, 70, '5', 32),
(33, 109, '5', 33),
(34, 110, '5', 34),
(35, 37, '5', 35),
(36, 38, '5', 36);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_bed_linen`
--

DROP TABLE IF EXISTS `tr_product_bed_linen`;
CREATE TABLE IF NOT EXISTS `tr_product_bed_linen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `stars` char(1) NOT NULL COMMENT 'give star 0 -- 5',
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tr_product_bed_linen_ibfk_1` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product_bed_linen`
--

INSERT INTO `tr_product_bed_linen` (`id`, `prod_id`, `stars`, `position`) VALUES
(1, 34, '0', 1),
(2, 39, '0', 2),
(3, 48, '0', 3),
(4, 52, '0', 1),
(5, 57, '0', 2),
(6, 66, '0', 3),
(7, 69, '0', 1),
(8, 71, '0', 2),
(9, 75, '0', 3),
(10, 88, '0', 1),
(11, 89, '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_best_seller`
--

DROP TABLE IF EXISTS `tr_product_best_seller`;
CREATE TABLE IF NOT EXISTS `tr_product_best_seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `stars` char(1) NOT NULL COMMENT 'give star 0 -- 5',
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product_best_seller`
--

INSERT INTO `tr_product_best_seller` (`id`, `prod_id`, `stars`, `position`) VALUES
(1, 1, '', 1),
(2, 7, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_image`
--

DROP TABLE IF EXISTS `tr_product_image`;
CREATE TABLE IF NOT EXISTS `tr_product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) NOT NULL,
  `image_1` blob NOT NULL,
  `image_2` blob,
  `image_3` blob,
  PRIMARY KEY (`id`),
  KEY `id_prod` (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tr_product_image`
--

INSERT INTO `tr_product_image` (`id`, `id_prod`, `image_1`, `image_2`, `image_3`) VALUES
(1, 1, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(2, 2, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(3, 3, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(4, 4, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(5, 5, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(6, 6, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(7, 7, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(8, 8, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(9, 9, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(10, 10, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(11, 11, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(12, 12, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(13, 13, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(14, 14, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(15, 15, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(16, 16, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(17, 17, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(18, 18, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(19, 19, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(20, 20, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(21, 21, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(22, 22, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(23, 23, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(24, 24, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(25, 25, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(26, 26, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(27, 27, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(28, 28, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(29, 29, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(30, 30, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(31, 31, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(32, 32, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(33, 33, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(34, 34, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(35, 35, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(36, 36, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(37, 37, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(38, 38, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(39, 39, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(40, 40, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(41, 41, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(42, 42, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(43, 43, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(44, 44, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(45, 45, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(46, 46, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(47, 47, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(48, 48, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(49, 49, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(50, 50, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(51, 51, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(52, 52, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(53, 53, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(54, 54, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(55, 55, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(56, 56, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(57, 57, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(58, 58, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(59, 59, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(60, 60, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(61, 61, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(62, 62, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(63, 63, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(64, 64, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(65, 65, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(66, 66, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(67, 67, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(68, 68, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(69, 69, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(70, 70, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(71, 71, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(72, 72, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(73, 73, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(74, 74, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(75, 75, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(76, 76, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(77, 77, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(78, 78, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(79, 79, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(80, 80, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(81, 81, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(82, 82, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(83, 83, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(84, 84, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(85, 85, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(86, 86, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(87, 87, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(88, 88, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(89, 89, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d302e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d312e6a7067, 0x73657274612d6265645f6c696e656e2d64756d6d795f70726f647563742d322e6a7067),
(90, 90, 0x616972656c6f6f6d2d6d617474726573732d70726f647563745f64756d6d792d302e6a7067, 0x616972656c6f6f6d2d6d617474726573732d70726f647563745f64756d6d792d312e6a7067, 0x616972656c6f6f6d2d6d617474726573732d70726f647563745f64756d6d792d322e6a7067),
(91, 91, 0x616972656c6f6f6d2d6d617474726573732d64756d6d795f70726f647563742d302e6a7067, 0x616972656c6f6f6d2d6d617474726573732d64756d6d795f70726f647563742d312e6a7067, 0x616972656c6f6f6d2d6d617474726573732d64756d6d795f70726f647563742d322e6a7067),
(92, 93, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_size`
--

DROP TABLE IF EXISTS `tr_product_size`;
CREATE TABLE IF NOT EXISTS `tr_product_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(20) DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  `size_id` int(11) DEFAULT NULL,
  `price` varchar(100) NOT NULL,
  `sub_price` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prod_id` (`prod_id`),
  KEY `size_id` (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product_size`
--

INSERT INTO `tr_product_size` (`id`, `sku`, `prod_id`, `size_id`, `price`, `sub_price`) VALUES
(3, '', 2, 6, '92625000', NULL),
(4, '', 2, 6, '101887500', NULL),
(5, '', 3, 6, '83850000', NULL),
(6, '', 3, 6, '92235000', NULL),
(7, '', 4, 6, '65325000', NULL),
(8, '', 4, 6, '71857500', NULL),
(9, '', 5, 1, '49725000', NULL),
(10, '', 5, 2, '57850000', NULL),
(11, '', 5, 6, '74490000', NULL),
(12, '', 5, 6, '82550000', NULL),
(13, '', 5, 6, '90675000', NULL),
(14, '', 6, 1, '25350000', NULL),
(15, '', 6, 2, '29250000', NULL),
(16, '', 6, 6, '38025000', NULL),
(17, '', 6, 6, '42250000', NULL),
(18, '', 6, 6, '46150000', NULL),
(19, '', 7, 1, '35555000', NULL),
(20, '', 7, 2, '39975000', NULL),
(21, '', 7, 6, '50440000', NULL),
(22, '', 7, 6, '55250000', NULL),
(23, '', 7, 6, '60190000', NULL),
(24, '', 8, 1, '26000000', NULL),
(25, '', 8, 2, '28925000', NULL),
(26, '', 8, 6, '34775000', NULL),
(27, '', 8, 6, '37700000', NULL),
(28, '', 8, 6, '40625000', NULL),
(29, '', 9, 1, '18590000', NULL),
(30, '', 9, 2, '20670000', NULL),
(31, '', 9, 6, '25675000', NULL),
(32, '', 9, 6, '27625000', NULL),
(33, '', 9, 6, '29575000', NULL),
(34, '', 10, 1, '13650000', NULL),
(35, '', 10, 2, '14950000', NULL),
(36, '', 10, 6, '18850000', NULL),
(37, '', 10, 6, '20475000', NULL),
(38, '', 10, 6, '21450000', NULL),
(39, '', 11, 1, '12350000', NULL),
(40, '', 11, 2, '13650000', NULL),
(41, '', 11, 6, '17225000', NULL),
(42, '', 11, 6, '18525000', NULL),
(43, '', 11, 6, '19500000', NULL),
(44, '', 12, 1, '11050000', NULL),
(45, '', 12, 2, '12025000', NULL),
(46, '', 12, 6, '15275000', NULL),
(47, '', 12, 6, '16380000', NULL),
(48, '', 12, 6, '17485000', NULL),
(49, '', 13, 1, '9100000', NULL),
(50, '', 13, 2, '10140000', NULL),
(51, '', 13, 6, '12675000', NULL),
(52, '', 13, 6, '13715000', NULL),
(53, '', 13, 6, '14755000', NULL),
(54, '', 14, 1, '15840000', NULL),
(55, '', 14, 2, '18700000', NULL),
(56, '', 14, 6, '23925000', NULL),
(57, '', 14, 6, '26290000', NULL),
(58, '', 14, 6, '29150000', NULL),
(59, '', 15, 1, '13805000', NULL),
(60, '', 15, 2, '15290000', NULL),
(61, '', 15, 6, '18260000', NULL),
(62, '', 15, 6, '20350000', NULL),
(63, '', 15, 6, '22440000', NULL),
(64, '', 16, 1, '11110000', NULL),
(65, '', 16, 2, '12375000', NULL),
(66, '', 16, 6, '15455000', NULL),
(67, '', 16, 6, '16720000', NULL),
(68, '', 16, 6, '17985000', NULL),
(69, '', 17, 1, '9900000', NULL),
(70, '', 17, 2, '11275000', NULL),
(71, '', 17, 6, '14190000', NULL),
(72, '', 17, 6, '15400000', NULL),
(73, '', 17, 6, '16500000', NULL),
(74, '', 18, 1, '9075000', NULL),
(75, '', 18, 2, '10340000', NULL),
(76, '', 18, 6, '12815000', NULL),
(77, '', 18, 6, '13640000', NULL),
(78, '', 18, 6, '14850000', NULL),
(79, '', 19, 1, '7425000', NULL),
(80, '', 19, 2, '8250000', NULL),
(81, '', 19, 6, '10450000', NULL),
(82, '', 19, 6, '11275000', NULL),
(83, '', 19, 6, '12100000', NULL),
(84, '', 20, 1, '7425000', NULL),
(85, '', 20, 2, '8525000', NULL),
(86, '', 20, 6, '10340000', NULL),
(87, '', 20, 6, '10890000', NULL),
(88, '', 20, 6, '12100000', NULL),
(89, '', 21, 1, '6121500', NULL),
(90, '', 21, 2, '6875000', NULL),
(91, '', 21, 6, '8580000', NULL),
(92, '', 21, 6, '9322500', NULL),
(93, '', 21, 6, '10340000', NULL),
(94, '', 22, 1, '5324000', NULL),
(95, '', 22, 2, '5885000', NULL),
(96, '', 22, 6, '7562500', NULL),
(97, '', 22, 6, '8151000', NULL),
(98, '', 22, 6, '8514000', NULL),
(99, '', 23, 1, '6820000', NULL),
(100, '', 23, 2, '7315000', NULL),
(101, '', 23, 6, '9350000', NULL),
(102, '', 23, 6, '10175000', NULL),
(103, '', 23, 6, '10945000', NULL),
(104, '', 25, 1, '6160000', NULL),
(105, '', 25, 2, '6985000', NULL),
(106, '', 25, 6, '8965000', NULL),
(107, '', 25, 6, '9790000', NULL),
(108, '', 25, 6, '10725000', NULL),
(109, '', 24, 1, '6490000', NULL),
(110, '', 24, 2, '7095000', NULL),
(111, '', 24, 6, '7700000', NULL),
(112, '', 24, 6, '8250000', NULL),
(113, '', 24, 6, '8800000', NULL),
(114, '', 26, 1, '4950000', NULL),
(115, '', 26, 2, '5555000', NULL),
(116, '', 26, 6, '6875000', NULL),
(117, '', 26, 6, '7315000', NULL),
(118, '', 26, 6, '7975000', NULL),
(119, '', 27, 1, '3410000', NULL),
(120, '', 27, 2, '3795000', NULL),
(121, '', 27, 6, '4730000', NULL),
(122, '', 27, 6, '5060000', NULL),
(123, '', 27, 6, '5445000', NULL),
(124, '', 28, 1, '2365000', NULL),
(125, '', 28, 2, '2695000', NULL),
(126, '', 28, 6, '3355000', NULL),
(127, '', 28, 6, '3630000', NULL),
(128, '', 28, 6, '3960000', NULL),
(129, '', 29, 1, '2860000', NULL),
(130, '', 29, 2, '3135000', NULL),
(131, '', 29, 6, '3740000', NULL),
(132, '', 29, 6, '4125000', NULL),
(133, '', 29, 6, '4455000', NULL),
(134, '', 30, 1, '7535000', NULL),
(135, '', 30, 2, '8140000', NULL),
(136, '', 30, 6, '22275000', NULL),
(137, '', 30, 6, '23650000', NULL),
(138, '', 30, 6, '25300000', NULL),
(139, '', 31, 1, '10945000', NULL),
(140, '', 31, 2, '11990000', NULL),
(141, '', 32, 1, '7205000', NULL),
(142, '', 32, 2, '7810000', NULL),
(143, '', 33, 11, '255000', NULL),
(144, '', 34, 11, '275000', NULL),
(145, '', 72, 11, '1400000', NULL),
(146, '', 73, 6, '1150000', NULL),
(147, '', 73, 6, '1200000', NULL),
(148, '', 73, 6, '1300000', NULL),
(149, '', 37, 11, '445000', NULL),
(150, '', 38, 11, '495000', NULL),
(151, '', 39, 11, '495000', NULL),
(152, '', 40, 11, '595000', NULL),
(153, '', 41, 11, '1750000', NULL),
(154, '', 77, 11, '185000', NULL),
(155, '', 60, 11, '205000', NULL),
(156, '', 44, 1, '525000', NULL),
(157, '', 44, 2, '555000', NULL),
(158, '', 44, 6, '715000', NULL),
(159, '', 44, 6, '745000', NULL),
(160, '', 44, 6, '775000', NULL),
(161, '', 65, 11, '2350000', NULL),
(162, '', 63, 11, '1300000', NULL),
(163, '', 47, 11, '895000', NULL),
(164, '', 66, 11, '1045000', NULL),
(165, '', 67, 11, '3700000', NULL),
(166, '', 50, 11, '528000', NULL),
(167, '', 51, 11, '215000', NULL),
(168, '', 52, 11, '235000', NULL),
(169, '', 53, 11, '385000', NULL),
(170, '', 72, 11, '1200000', NULL),
(171, '', 73, 1, '695000', NULL),
(172, '', 73, 2, '750000', NULL),
(173, '', 73, 6, '835000', NULL),
(174, '', 73, 6, '900000', NULL),
(175, '', 73, 6, '940000', NULL),
(176, '', 56, 11, '365000', NULL),
(177, '', 57, 11, '380000', NULL),
(178, '', 58, 11, '1480000', NULL),
(179, '', 77, 11, '160000', NULL),
(180, '', 60, 11, '170000', NULL),
(181, '', 78, 1, '490000', NULL),
(182, '', 78, 2, '520000', NULL),
(183, '', 78, 6, '600000', NULL),
(184, '', 78, 6, '640000', NULL),
(185, '', 78, 6, '660000', NULL),
(186, '', 62, 11, '685000', NULL),
(187, '', 63, 11, '850000', NULL),
(188, '', 64, 11, '900000', NULL),
(189, '', 65, 11, '1440000', NULL),
(190, '', 66, 11, '650000', NULL),
(191, '', 67, 11, '3175000', NULL),
(192, '', 68, 11, '118000', NULL),
(193, '', 69, 11, '122000', NULL),
(194, '', 70, 11, '172000', NULL),
(195, '', 71, 11, '188000', NULL),
(196, '', 72, 6, '640000', NULL),
(197, '', 72, 7, '740000', NULL),
(198, '', 72, 8, '800000', NULL),
(199, '', 72, 9, '950000', NULL),
(200, '', 73, 6, '605000', NULL),
(201, '', 73, 6, '655000', NULL),
(202, '', 73, 6, '715000', NULL),
(203, '', 74, 11, '280000', NULL),
(204, '', 75, 11, '300000', NULL),
(205, '', 76, 6, '1065000', NULL),
(206, '', 76, 7, '1175000', NULL),
(207, '', 76, 8, '1225000', NULL),
(208, '', 76, 9, '1275000', NULL),
(209, '', 77, 11, '140000', NULL),
(210, '', 78, 6, '470000', NULL),
(211, '', 78, 6, '490000', NULL),
(212, '', 78, 6, '510000', NULL),
(213, '', 79, 1, '32160000', NULL),
(214, '', 79, 2, '42240000', NULL),
(215, '', 79, 6, '49920000', NULL),
(216, '', 79, 6, '54720000', NULL),
(217, '', 79, 6, '64320000', NULL),
(218, '', 80, 1, '38880000', NULL),
(219, '', 80, 6, '60000000', NULL),
(220, '', 80, 6, '65760000', NULL),
(221, '', 80, 6, '77280000', NULL),
(222, '', 81, 1, '32160000', NULL),
(223, '', 81, 6, '49920000', NULL),
(224, '', 81, 6, '54720000', NULL),
(225, '', 81, 6, '64320000', NULL),
(226, '', 82, 1, '36480000', NULL),
(227, '', 82, 6, '56640000', NULL),
(228, '', 82, 6, '61920000', NULL),
(229, '', 82, 6, '72960000', NULL),
(230, '', 83, 11, '1800000', NULL),
(231, '', 83, 11, '2050000', NULL),
(232, '', 83, 12, '2200000', NULL),
(233, '', 84, 11, '2150000', NULL),
(234, '', 84, 11, '2250000', NULL),
(235, '', 84, 12, '2350000', NULL),
(236, '', 85, 11, '2000000', NULL),
(237, '', 85, 11, '2350000', NULL),
(238, '', 85, 12, '2500000', NULL),
(239, '', 86, 11, '2450000', NULL),
(240, '', 86, 11, '2550000', NULL),
(241, '', 86, 12, '2650000', NULL),
(242, '', 87, 11, '2150000', NULL),
(243, '', 87, 11, '2500000', NULL),
(244, '', 88, 1, '34080000', NULL),
(245, '', 88, 2, '42720000', NULL),
(246, '', 89, 1, '15360000', NULL),
(247, '', 89, 2, '15840000', NULL),
(248, '', 89, 6, '18720000', NULL),
(249, '', 89, 6, '19200000', NULL),
(250, '', 89, 6, '19680000', NULL),
(257, NULL, 90, 1, '3000000', NULL),
(258, NULL, 90, 1, '3000000', NULL),
(259, 'SKu', 91, 5, '400000000', NULL),
(260, 'SKUPKG', 92, 8, '2000000', NULL),
(261, NULL, 1, 4, '126750000', '0'),
(262, NULL, 1, 5, '139425000', '0'),
(263, 'SKUPKG', 93, 8, '105000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_spec`
--

DROP TABLE IF EXISTS `tr_product_spec`;
CREATE TABLE IF NOT EXISTS `tr_product_spec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `spec_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prod_id` (`prod_id`),
  KEY `spec_id` (`spec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product_spec`
--

INSERT INTO `tr_product_spec` (`id`, `prod_id`, `spec_id`) VALUES
(12, 2, 14),
(13, 2, 75),
(14, 2, 67),
(15, 2, 70),
(16, 2, 45),
(17, 2, 65),
(18, 2, 56),
(19, 2, 28),
(20, 2, 57),
(21, 3, 75),
(22, 3, 70),
(23, 3, 45),
(24, 3, 22),
(25, 3, 56),
(26, 3, 28),
(27, 3, 57),
(28, 4, 75),
(29, 4, 70),
(30, 4, 45),
(31, 4, 54),
(32, 4, 40),
(33, 4, 28),
(34, 4, 57),
(35, 5, 44),
(36, 5, 17),
(37, 5, 70),
(38, 5, 69),
(39, 5, 10),
(40, 6, 59),
(41, 6, 27),
(42, 6, 10),
(43, 7, 44),
(44, 7, 75),
(45, 7, 66),
(46, 7, 20),
(47, 7, 32),
(48, 7, 5),
(49, 7, 35),
(50, 7, 28),
(51, 7, 10),
(52, 8, 44),
(53, 8, 50),
(54, 8, 65),
(55, 8, 70),
(56, 8, 30),
(57, 8, 5),
(58, 8, 35),
(59, 8, 28),
(60, 8, 10),
(61, 9, 12),
(62, 9, 50),
(63, 9, 62),
(64, 9, 22),
(65, 9, 30),
(66, 9, 5),
(67, 9, 35),
(68, 9, 28),
(69, 9, 10),
(70, 10, 12),
(71, 10, 70),
(72, 10, 54),
(73, 10, 24),
(74, 10, 5),
(75, 10, 34),
(76, 10, 28),
(77, 10, 10),
(78, 11, 36),
(79, 11, 22),
(80, 11, 21),
(81, 11, 24),
(82, 11, 5),
(83, 11, 34),
(84, 11, 28),
(85, 12, 36),
(86, 12, 54),
(87, 12, 16),
(88, 12, 24),
(89, 12, 5),
(90, 12, 34),
(91, 12, 28),
(92, 13, 36),
(93, 13, 24),
(94, 13, 5),
(95, 13, 34),
(96, 13, 28),
(97, 14, 51),
(98, 14, 20),
(99, 14, 1),
(100, 14, 8),
(101, 14, 15),
(102, 14, 33),
(103, 15, 42),
(104, 15, 22),
(105, 15, 39),
(106, 15, 38),
(107, 15, 74),
(108, 15, 5),
(109, 15, 56),
(110, 15, 28),
(111, 16, 42),
(112, 16, 54),
(113, 16, 39),
(114, 16, 74),
(115, 16, 5),
(116, 16, 56),
(117, 16, 28),
(118, 17, 41),
(119, 17, 62),
(120, 17, 39),
(121, 17, 1),
(122, 17, 8),
(123, 17, 15),
(124, 17, 3),
(125, 17, 28),
(126, 18, 42),
(127, 18, 39),
(128, 18, 74),
(129, 18, 11),
(130, 18, 5),
(131, 18, 56),
(132, 18, 28),
(133, 19, 41),
(134, 19, 54),
(135, 19, 62),
(136, 19, 64),
(137, 19, 8),
(138, 19, 4),
(139, 19, 28),
(140, 20, 43),
(141, 20, 64),
(142, 20, 1),
(143, 20, 15),
(144, 20, 56),
(145, 20, 28),
(146, 21, 59),
(147, 21, 39),
(148, 21, 11),
(149, 21, 56),
(150, 21, 28),
(151, 22, 59),
(152, 22, 11),
(153, 22, 56),
(154, 22, 28),
(155, 23, 59),
(156, 23, 54),
(157, 23, 39),
(158, 23, 60),
(159, 23, 55),
(160, 23, 4),
(161, 23, 28),
(162, 24, 59),
(163, 24, 54),
(164, 24, 39),
(165, 24, 60),
(166, 24, 4),
(167, 24, 28),
(168, 25, 59),
(169, 25, 39),
(170, 25, 13),
(171, 25, 15),
(172, 25, 60),
(173, 25, 25),
(174, 26, 59),
(175, 26, 24),
(176, 26, 60),
(177, 26, 4),
(178, 26, 28),
(179, 27, 43),
(180, 27, 54),
(181, 27, 48),
(182, 27, 55),
(183, 27, 2),
(184, 27, 28),
(185, 28, 43),
(186, 28, 48),
(187, 28, 26),
(188, 28, 2),
(189, 29, 59),
(190, 29, 39),
(191, 30, 37),
(192, 30, 39),
(193, 30, 47),
(194, 30, 3),
(195, 30, 28),
(196, 31, 37),
(197, 31, 39),
(198, 31, 56),
(199, 31, 28),
(200, 32, 37),
(201, 32, 39),
(202, 32, 47),
(203, 32, 53),
(204, 32, 28),
(205, 79, 18),
(206, 79, 71),
(207, 80, 18),
(208, 80, 71),
(209, 81, 18),
(210, 81, 71),
(211, 82, 18),
(212, 82, 71),
(240, 90, 2),
(241, 90, 3),
(242, 91, 6),
(243, 1, 6),
(244, 1, 14),
(245, 1, 28),
(246, 1, 31),
(247, 1, 45),
(248, 1, 56),
(249, 1, 57),
(250, 1, 65),
(251, 1, 70),
(252, 1, 72),
(253, 1, 75);

-- --------------------------------------------------------

--
-- Table structure for table `tr_special_package`
--

DROP TABLE IF EXISTS `tr_special_package`;
CREATE TABLE IF NOT EXISTS `tr_special_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_specialPkg` int(11) NOT NULL,
  `id_prod_package` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_special_package` (`id_specialPkg`),
  KEY `id_tr_prod_size` (`id_prod_package`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_special_package`
--

INSERT INTO `tr_special_package` (`id`, `id_specialPkg`, `id_prod_package`, `quantity`) VALUES
(20, 17, 144, 3),
(21, 17, 260, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tr_storeowner_special_package`
--

DROP TABLE IF EXISTS `tr_storeowner_special_package`;
CREATE TABLE IF NOT EXISTS `tr_storeowner_special_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_special_package` int(11) NOT NULL,
  `id_store_owner` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_special_package` (`id_special_package`),
  KEY `id_store_owner` (`id_store_owner`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_storeowner_special_package`
--

INSERT INTO `tr_storeowner_special_package` (`id`, `id_special_package`, `id_store_owner`, `quantity`) VALUES
(1, 14, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_store_owner_cluster`
--

DROP TABLE IF EXISTS `tr_store_owner_cluster`;
CREATE TABLE IF NOT EXISTS `tr_store_owner_cluster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_store` int(11) NOT NULL,
  `province` char(2) NOT NULL,
  `city` char(4) NOT NULL,
  `sub_district` char(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_store` (`id_store`),
  KEY `province` (`province`),
  KEY `city` (`city`),
  KEY `sub_district` (`sub_district`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_store_owner_cluster`
--

INSERT INTO `tr_store_owner_cluster` (`id`, `id_store`, `province`, `city`, `sub_district`) VALUES
(4, 1, '31', '3174', '317403'),
(5, 1, '31', '3174', '317401'),
(6, 1, '31', '3174', '317402');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `user_type` int(11) DEFAULT NULL,
  `newer` int(11) NOT NULL,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `username`, `password`, `email`, `user_type`, `newer`, `created`) VALUES
(2, 'superAdmin', '$2y$10$qkLcTasok1mpvzBNP8B2YuJ9ULTtSnKM2CZVNyWXnLEiIOC0DZhpC', 'super.admin@keraton.com', 1, 0, NULL),
(5, 'admin', '$2y$10$qkLcTasok1mpvzBNP8B2YuJ9ULTtSnKM2CZVNyWXnLEiIOC0DZhpC', 'admin@keraton.com', 2, 0, NULL),
(15, 'dummyCS2', '$2y$10$uK1K9VVxRGhe0XWgpzoYw.YjE9ydEMD0pt63nTneTf2N/Dz8mrZ4y', 'adrianfaisal@aol.com', 4, 0, NULL),
(19, 'dummyAdmin', '$2y$10$W/sG5VErS3a0NfdusDEH4O8tX.cvnd8chHplNqkYGHEn1WQ3pHppa', 'dummy.admin@keraton.com', 2, 0, 2),
(20, 'superAdmin2', '$2y$10$UpBl3Zp.q4Iro9owkbQeuuvW.fzFKaxO99FBDeQLlGvxzUU8P9wuC', 'super.admin.dua@keraton.com', 1, 0, 2),
(21, 'superadmin3', '$2y$10$LiyCsq8jBT3X2ccWbxKdsOe7bOIxBdjXczSWoLbc9/K9WwrZ49jT6', 'superadmin3@koliho.com', 1, 0, 2),
(22, 'kelep', '$2y$10$Al17T0TO.VWgfZAQQWY8b.2GB.zoLeHA4uSjByl5O6s06OCPDlRUK', 'kelep@keraton.com', 1, 0, 2),
(23, 'kelep2', '$2y$10$4KP56.2EIm833067H5nMZOfPTFhz1pfmaSq2Hp.RJbEV05TQwGIuy', 'kelep2@keraton.com', 2, 0, 22),
(24, 'tryingDummy', '$2y$10$qkNJ3xb6DBDev.d/w8UrjelazqYhs0ZjmOFIVKL1NG02nesw2viTq', 'trying.dummy@keraton.com', 1, 0, 2),
(25, 'tryingAdmin', '$2y$10$UudgROaKmAMaBp41a20wzOWUUrFWdaJF7MMhu88rsn/.DWTZfnYma', 'trying.admin@keraton.com', 2, 0, 2),
(26, 'someone', '$2y$10$4VShPyleEsQDJbVnOLocvOwen3RlASKOcechDqfILD8Rqp3tQgVcC', 'someone@email.com', 1, 0, 2),
(27, 'someother', '$2y$10$JbV5GOIkW7j0EaI6n5FZ.e1tvwD2FIAcw5jrUvmdwdNxdlG2OZ9xu', 'someother@email.com', 2, 1, 26),
(29, 'dummy', '$2y$10$6OLUFwLTmS2maUqXsIG.FOH8//BUfe3zAxikWqzTNkqmFWtbfRmyq', 'dummySA@email.com', 1, 1, 2),
(36, 'agmJDC', '$2y$10$0JwOc/wJ81bQR5DDPjgBPuXFkFsGIk6g7JG8KKAN8RFxz7TFbZhG2', 'agm.jdc@email.com', 3, 0, 2),
(37, 'agmSimpruk', '$2y$10$lynTs3dNF.DR2RU2fWZ9l.OPf7p8GZIXTBdgDyk/054FWFpCM4uz6', 'agm.simpruk@email.com', 3, 1, 2),
(38, 'agmEmporiumPluitMall', '$2y$10$VONYYKftLV0CTxt2r7wBEesIlrAaVUA7Rt0KtaZAKvg7rrtW1Ii1S', 'agm.emporium@email.com', 3, 1, 2),
(40, 'fachrul', '$2y$10$dVMsMIUSpeYVmzKWsIIh2e2/VeaAP87wkDr4WvmshYDSdRxerodaO', 'fachrulpaul@gmail.com', 4, 0, NULL),
(42, 'fandi', '$2y$10$ib6SwmQ7CI3.ljYEa/QzR.XempU8pczfVU10dLUvM/nrXWhH/XTk2', 'fandi@email.com', 4, 0, NULL),
(43, 'garrydevaldi', '$2y$10$144lvRTGobtVlYL1xB4eEu.Kxirkp7zE2yMiAIcojtLPQ137tD4Ga', 'm9arryd2@gmail.com', 4, 0, NULL),
(44, 'garrygarry', '$2y$10$g4iHHRsmqyGGIrZvnt6FDe6llsIRnRVF/XBWtkr2pgzi7jxDlT.wW', 'hahaha@email.com', 4, 0, NULL),
(45, 'newadmin', '$2y$10$PksbGPJpoLO1aXqFlMSyUeXITxNIfCcQboO4fpJEjS3cOQlzhS/yC', 'newadmin@email.com', 1, 0, 2),
(46, 'adrianfaisal', '$2y$10$zba1T0noI7JjOrvS6eR9kOorUBoldxrT0NNrX5lHznNTURUxNdzQu', 'adrianfaisal@student.gunadarma.ac.id', 4, 0, NULL),
(47, 'kelepkelep', '$2y$10$6wnq/glvOMwRbROsjZV8UODHezO0l4DHP7IzJxAv3IcUqJjKMiavG', 'kelepkelep@email.com', 4, 0, NULL),
(48, 'faisaladrian', '$2y$10$d0nhQzuEPKSdPp.x1pJd8erx/BEKXurofKISmVyaAgoAEQ8LVSwTm', 'adrianfaisal@icloud.com', 4, 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tm_agmpedia`
--
ALTER TABLE `tm_agmpedia`
  ADD CONSTRAINT `tm_agmpedia_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`);

--
-- Constraints for table `tm_customer_detail`
--
ALTER TABLE `tm_customer_detail`
  ADD CONSTRAINT `tm_customer_detail_ibfk_1` FOREIGN KEY (`city`) REFERENCES `kabupaten` (`id_kab`),
  ADD CONSTRAINT `tm_customer_detail_ibfk_2` FOREIGN KEY (`id_userlogin`) REFERENCES `user_login` (`user_id`),
  ADD CONSTRAINT `tm_customer_detail_ibfk_3` FOREIGN KEY (`province`) REFERENCES `provinsi` (`id_prov`),
  ADD CONSTRAINT `tm_customer_detail_ibfk_4` FOREIGN KEY (`sub_district`) REFERENCES `kecamatan` (`id_kec`);

--
-- Constraints for table `tm_order`
--
ALTER TABLE `tm_order`
  ADD CONSTRAINT `tm_order_ibfk_1` FOREIGN KEY (`address_detail`) REFERENCES `tm_customer_detail` (`id`),
  ADD CONSTRAINT `tm_order_ibfk_4` FOREIGN KEY (`id_userlogin`) REFERENCES `user_login` (`user_id`);

--
-- Constraints for table `tm_product`
--
ALTER TABLE `tm_product`
  ADD CONSTRAINT `tm_product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `tm_brands` (`id`),
  ADD CONSTRAINT `tm_product_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `tm_category` (`id`);

--
-- Constraints for table `tm_review`
--
ALTER TABLE `tm_review`
  ADD CONSTRAINT `tm_review_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tm_product` (`id`);

--
-- Constraints for table `tm_special_package`
--
ALTER TABLE `tm_special_package`
  ADD CONSTRAINT `tm_special_package_ibfk_1` FOREIGN KEY (`main_product`) REFERENCES `tm_product` (`id`);

--
-- Constraints for table `tr_bonus_voucher`
--
ALTER TABLE `tr_bonus_voucher`
  ADD CONSTRAINT `tr_bonus_voucher_ibfk_1` FOREIGN KEY (`id_voucher`) REFERENCES `tm_voucher` (`id`);

--
-- Constraints for table `tr_order_detail`
--
ALTER TABLE `tr_order_detail`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`id_tm_order`) REFERENCES `tm_order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_tr_product`) REFERENCES `tr_product` (`id`);

--
-- Constraints for table `tr_product`
--
ALTER TABLE `tr_product`
  ADD CONSTRAINT `tr_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tm_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tr_product_ibfk_2` FOREIGN KEY (`id_product_size`) REFERENCES `tr_product_size` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tr_product_ibfk_3` FOREIGN KEY (`id_store`) REFERENCES `tm_store_owner` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tr_product_bedding_acc`
--
ALTER TABLE `tr_product_bedding_acc`
  ADD CONSTRAINT `tr_product_bedding_acc_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tm_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tr_product_bed_linen`
--
ALTER TABLE `tr_product_bed_linen`
  ADD CONSTRAINT `tr_product_bed_linen_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tm_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tr_product_best_seller`
--
ALTER TABLE `tr_product_best_seller`
  ADD CONSTRAINT `tr_product_best_seller_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tm_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tr_product_image`
--
ALTER TABLE `tr_product_image`
  ADD CONSTRAINT `tr_product_image_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `tm_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tr_product_size`
--
ALTER TABLE `tr_product_size`
  ADD CONSTRAINT `tr_product_size_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tm_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tr_product_size_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `tm_size` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tr_product_spec`
--
ALTER TABLE `tr_product_spec`
  ADD CONSTRAINT `tr_product_spec_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tm_product` (`id`),
  ADD CONSTRAINT `tr_product_spec_ibfk_2` FOREIGN KEY (`spec_id`) REFERENCES `tm_spec` (`id`);

--
-- Constraints for table `tr_special_package`
--
ALTER TABLE `tr_special_package`
  ADD CONSTRAINT `tr_special_package_ibfk_1` FOREIGN KEY (`id_specialPkg`) REFERENCES `tm_special_package` (`id`),
  ADD CONSTRAINT `tr_special_package_ibfk_2` FOREIGN KEY (`id_prod_package`) REFERENCES `tr_product_size` (`id`);

--
-- Constraints for table `tr_store_owner_cluster`
--
ALTER TABLE `tr_store_owner_cluster`
  ADD CONSTRAINT `tr_store_owner_cluster_ibfk_1` FOREIGN KEY (`id_store`) REFERENCES `tm_store_owner` (`id`),
  ADD CONSTRAINT `tr_store_owner_cluster_ibfk_2` FOREIGN KEY (`province`) REFERENCES `provinsi` (`id_prov`),
  ADD CONSTRAINT `tr_store_owner_cluster_ibfk_3` FOREIGN KEY (`city`) REFERENCES `kabupaten` (`id_kab`),
  ADD CONSTRAINT `tr_store_owner_cluster_ibfk_4` FOREIGN KEY (`sub_district`) REFERENCES `kecamatan` (`id_kec`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
