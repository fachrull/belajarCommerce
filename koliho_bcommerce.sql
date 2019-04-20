-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2019 at 06:21 PM
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
CREATE DATABASE IF NOT EXISTS `koliho_bcommerce` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `koliho_bcommerce`;

-- --------------------------------------------------------

--
-- Table structure for table `mail_config`
--

CREATE TABLE `mail_config` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(50) NOT NULL,
  `host` varchar(45) NOT NULL,
  `port` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail_config`
--

INSERT INTO `mail_config` (`id`, `email`, `password`, `host`, `port`) VALUES
(6, 'adrian@keraton.co.id', 'QWRyaUBuMjMjQA==', 'mail.host.com', '587');

-- --------------------------------------------------------

--
-- Table structure for table `mail_queue`
--

CREATE TABLE `mail_queue` (
  `id` int(11) NOT NULL,
  `mail_to` varchar(45) DEFAULT NULL,
  `mail_subject` varchar(45) DEFAULT NULL,
  `message` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail_queue`
--

INSERT INTO `mail_queue` (`id`, `mail_to`, `mail_subject`, `message`) VALUES
(17, 'fachrulpaul@gmail.com', 'Forgot Password', '40/19264128595cbad0051de8f8.82380185'),
(18, 'fachrulpaul@gmail.com', 'Forgot Password', '40/1409184815cbad066b4e736.48598041'),
(19, 'fachrulpaul@gmail.com', 'Forgot Password', '40/17779865785cbad268523436.71131412');

-- --------------------------------------------------------

--
-- Table structure for table `tm_agmpedia`
--

CREATE TABLE `tm_agmpedia` (
  `id` int(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_content` varchar(125) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `thumbnail` blob NOT NULL,
  `photo` blob NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'active = 1, 2; inactive = 0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_agmpedia`
--

INSERT INTO `tm_agmpedia` (`id`, `title`, `sub_content`, `content`, `date`, `thumbnail`, `photo`, `status`, `user_id`) VALUES
(1, 'Cara Merawat Sprei', 'Sprei memiliki bahan yang unik sehingga cara perawatannya berbeda dengan bahan lainnya.', '<p>Bed linen atau sprei merupakan bahan yang unik serta memiliki karakteristik tersendiri yang tidak bisa disamakan cara perawatannya dengan bahan lain, untuk itu sangat disarankan untuk mengikuti tips cara merawat kain linen dibawah ini untuk menghindari kesalahan yang akan mengakibatkan kain linen anda rusak.</p>\r\n\r\n<ol>\r\n	<li>Perhatikan label yang tertera pada kain.</li>\r\n	<li>Gunakan Deterjen atau sabun pencuci yang memiliki tekstur lembut.</li>\r\n	<li>Gunakan air dengan suhu sedang tidak terlalu dingin dan juga tidak terlalu panas agar tidak merusak serat kain.</li>\r\n	<li>Pastikan tidak ada sabun atau busa yang masih menempel pada kain setelah pencucian. Karena jika tidak, dapat mengakibatkan oksidasi yang membuat kain kotor dan sulit dihilangkan.</li>\r\n	<li>Gunakan putaran <em>gentle cycle</em> atau putaran yang lembut jika mencuci menggunakan mesin.</li>\r\n	<li>Jangan mencampur kain sprei dengan bahan lain dan jangan direndam terlalu lama.</li>\r\n	<li>Keringkan kain di lokasi yang memiliki sinar matahari merata namun tidak terlalu terik dengan bagian dalam kain menghadap matahari.</li>\r\n	<li>Setrikalah kain linen pada suhu 204 &ndash; 218 derajat celcius (atau cari tombol khusus Linen pada setrika Anda) di bagian dalam terlebih dahulu, kemudian dilanjutkan dengan bagian luar agar kain terlihat berkilau, gantungkan selama lima menit sebelum dimasukkan ke lemari agar tidak mudah kusut.</li>\r\n	<li>Hindari penyimpanan di tempat yang dapat menimbulkan jamur.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dengan perawatan yang baik dan benar, bed linen akan memberikan kenyamanan tidur sempurna yang lebih lama untuk istirahat malam Anda. Selamat mencoba!&nbsp; :)</p>\r\n', '2019-01-23', 0x30315f616972656c6f6f6d5f696d70657269616c2d68657269746167652e6a7067, 0x70686f746f2d696d6167652d356361333239623261326365312e706e67, 1, 2),
(2, 'New Article', 'Blablablabla', '<p>Coba ya</p>\r\n', '2019-04-10', 0x7468756d626e61696c2d696d6167652d356361646138376133626537362e6a7067, 0x41474d2d50454449412835303078323530292e6a7067, 1, 2),
(3, 'Satu lagi', 'Kita coba lah ya', '<p>Dummy</p>\r\n', '2019-04-10', 0x41474d2d50454449412835303078323530292e6a7067, 0x41474d2d50454449415f2836373078323135292e6a7067, 1, 2);

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
-- Table structure for table `tm_cover`
--

CREATE TABLE `tm_cover` (
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

CREATE TABLE `tm_customer` (
  `id` int(11) NOT NULL,
  `id_userlogin` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` char(1) NOT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `tm_customer_detail` (
  `id` int(11) NOT NULL,
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
  `default_address` int(11) NOT NULL DEFAULT '0' COMMENT 'active = 1; inactive = 0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(22, 44, 'garry', 'kasparov', 'm', 'hahaha@email.com', '08119273822', 'Jl. Boulevard Artha Gading Selatan No. 1 Lantai 3F, Blok A2  No. 18 - 20 Kelapa Gading - Jakarta Utara', '32', '3210', '321014', '15572', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_forgot_pass`
--

CREATE TABLE `tm_forgot_pass` (
  `id` int(11) NOT NULL,
  `id_userLogin` int(11) NOT NULL,
  `uniqueCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_forgot_pass`
--

INSERT INTO `tm_forgot_pass` (`id`, `id_userLogin`, `uniqueCode`) VALUES
(4, 40, '19264128595cbad0051de8f8.82380185'),
(6, 40, '17779865785cbad268523436.71131412');

-- --------------------------------------------------------

--
-- Table structure for table `tm_newsletter`
--

CREATE TABLE `tm_newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subscribe_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tm_order` (
  `id` int(11) NOT NULL,
  `order_number` varchar(100) NOT NULL,
  `id_userlogin` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address_detail` int(11) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `id_voucher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_order`
--

INSERT INTO `tm_order` (`id`, `order_number`, `id_userlogin`, `total`, `order_date`, `address_detail`, `status_order`, `id_voucher`) VALUES
(49, 'AGM080319125', 15, '1000000', '2019-03-08 15:46:48', 1, 3, NULL),
(50, 'AGM130319922', 40, '1000000', '2019-03-13 16:14:44', 5, 4, NULL),
(51, 'AGM150319549', 40, '1000000', '2019-03-15 15:36:50', 3, 2, NULL),
(54, 'AGM180319857', 40, '3000000', '2019-03-18 00:51:11', 8, 2, NULL),
(55, 'AGM050419271', 15, '2000000', '2019-04-05 04:28:16', 17, 2, NULL),
(56, 'AGM050419664', 40, '2000000', '2019-04-05 06:40:01', 18, 2, NULL),
(57, 'AGM060419761', 15, '1000000', '2019-04-06 08:22:57', 17, 3, NULL),
(58, 'AGM060419793', 15, '2000000', '2019-04-06 08:32:43', 17, 1, NULL),
(59, 'AGM060419656', 40, '22222222', '2019-04-06 08:38:27', 3, 4, NULL),
(60, 'AGM060419813', 40, '2000000', '2019-04-06 08:49:15', 3, 1, NULL),
(61, 'AGM060419313', 40, '1000000', '2019-04-06 09:42:00', 3, 4, NULL),
(62, 'AGM060419926', 40, '22222222', '2019-04-06 09:44:25', 3, 2, NULL),
(63, 'AGM060419121', 15, '2000000', '2019-04-06 14:00:43', 20, 3, NULL),
(64, 'AGM060419907', 15, '1000000', '2019-04-06 14:24:43', 17, 3, NULL),
(65, 'AGM060419774', 15, '1000000', '2019-04-06 15:12:47', 15, 3, NULL),
(66, 'AGM060419984', 15, '2000000', '2019-04-06 15:41:01', 15, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_product`
--

CREATE TABLE `tm_product` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stars` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_product`
--

INSERT INTO `tm_product` (`id`, `brand_id`, `cat_id`, `name`, `description`, `image`, `created_at`, `updated_at`, `stars`, `position`, `active`) VALUES
(1, 1, 1, 'Imperial Heritage', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x616972656c6f6f6d2d6d617474726573732d696d70657269616c5f68657269746167652e6a7067, '2019-01-14 17:00:00', '2019-03-20 12:43:18', 0, 0, 1),
(2, 1, 1, 'Royal Souverign', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x616972656c6f6f6d2d6d617474726573732d726f79616c5f736f7576657269676e2e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:18', 0, 0, 1),
(3, 1, 1, 'Coronation', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x616972656c6f6f6d2d6d617474726573732d636f726f6e6174696f6e2e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:18', 0, 0, 1),
(4, 1, 1, 'Baron', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x616972656c6f6f6d2d6d617474726573732d6261726f6e2e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:18', 0, 0, 1),
(5, 2, 1, 'Antoinette', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d616e746f696e657474652e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:18', 0, 0, 1),
(6, 2, 1, 'Cordelia', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d636f7264656c69612e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:18', 0, 0, 1),
(7, 2, 1, 'Ernestine', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d65726e657374696e652e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19', 0, 0, 1),
(8, 2, 1, 'Harriett', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d68617272696574742e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19', 0, 0, 1),
(9, 2, 1, 'Granville', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d6772616e76696c6c652e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19', 0, 0, 1),
(10, 2, 1, 'Ophelia', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d6f7068656c69612e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19', 0, 0, 1),
(11, 2, 1, 'Suite Palais', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d73756974655f70616c6169732e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19', 0, 0, 1),
(12, 2, 1, 'Suite Ambassadeur', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d73756974655f616d6261737361646575722e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19', 0, 0, 1),
(13, 2, 1, 'Suite Viceroy', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d73756974655f76696365726f792e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19', 0, 0, 1),
(16, 2, 2, 'Harvey (Embroidery White)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6265645f6c696e656e2d6861727665795f28656d62726f69646572795f7768697465292e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:19', 0, 0, 1),
(17, 2, 2, 'Madolva White', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6265645f6c696e656e2d6d61646f6c76615f77686974652e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:19', 0, 0, 1),
(18, 2, 2, 'Madolva Red', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6265645f6c696e656e2d6d61646f6c76615f7265642e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:19', 0, 0, 1),
(19, 2, 2, 'Avecca Peach', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6265645f6c696e656e2d6176656363615f70656163682e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:19', 0, 0, 1),
(20, 2, 2, 'Avecca Ivory', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6265645f6c696e656e2d6176656363615f69766f72792e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20', 0, 0, 1),
(21, 2, 3, 'Royale Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d726f79616c655f70696c6c6f772e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20', 0, 0, 1),
(22, 2, 3, 'Nano Fiber Pillow Firm', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d6e616e6f5f66696265725f70696c6c6f775f6669726d2e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20', 0, 0, 1),
(23, 2, 3, 'Nano Fiber Pillow Soft', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d6e616e6f5f66696265725f70696c6c6f775f736f66742e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20', 0, 0, 1),
(24, 2, 2, 'Nano King Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6265645f6c696e656e2d6e616e6f5f6b696e675f70696c6c6f772e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20', 0, 0, 1),
(25, 2, 3, 'Aero Spring Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d6165726f5f737072696e675f70696c6c6f772e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20', 0, 0, 1),
(26, 2, 3, 'Nano Down Chamber Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d6e616e6f5f646f776e5f6368616d6265725f70696c6c6f772e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20', 0, 0, 1),
(27, 2, 3, 'Down Pillow Soft Feather', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d646f776e5f70696c6c6f775f736f66745f666561746865722e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20', 0, 0, 1),
(28, 2, 3, 'Down Pillow Sandwich', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d646f776e5f70696c6c6f775f73616e64776963682e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20', 0, 0, 1),
(30, 2, 3, 'Point To Point Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d706f696e745f746f5f706f696e745f70696c6c6f772e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20', 0, 0, 1),
(31, 2, 4, 'Royale Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d626f6c737465722d726f79616c655f626f6c737465722e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20', 0, 0, 1),
(32, 2, 4, 'Nano Fiber Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d626f6c737465722d6e616e6f5f66696265725f626f6c737465722e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20', 0, 0, 1),
(34, 2, 5, 'Light Quilt Dacron', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d7175696c742d6c696768745f7175696c745f646163726f6e2e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(35, 2, 5, 'Light Quilt Nano', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d7175696c742d6c696768745f7175696c745f6e616e6f2e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(37, 2, 6, 'Mattress Protector Dacron', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573735f70726f746563746f722d6d617474726573735f70726f746563746f725f646163726f6e2e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(38, 2, 6, 'Mattress Protector Waterproof', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573735f70726f746563746f722d6d617474726573735f70726f746563746f725f776174657270726f6f662e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(39, 4, 1, 'Grand Althea', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d6772616e645f616c746865612e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(40, 4, 1, 'Saveria', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d736176657269612e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(43, 4, 1, 'Isadore', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d697361646f72652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(44, 4, 1, 'Ellinor', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d656c6c696e6f722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(45, 4, 1, 'Spine-X (some)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign&reg; is made with Super Pillow Top&reg; and completed with cashmere, wool and 4cm Talalay&reg; latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>\r\n', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-01-30 17:00:00', '2019-04-15 04:25:24', 0, 0, 1),
(46, 4, 1, 'Eudocia Suite', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d6575646f6369615f73756974652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(47, 4, 1, 'Eudora Suite', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d6575646f72615f73756974652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(48, 4, 1, 'Hermione', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d6865726d696f6e652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(50, 4, 2, 'Pasquele (COT SILK)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d7061737175656c655f28636f745f73696c6b292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(51, 4, 2, 'Radcliff Grey (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d726164636c6966665f677265795f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(52, 4, 2, 'Radcliff Light Grey (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d726164636c6966665f6c696768745f677265795f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(53, 4, 2, 'Radcliff White (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d726164636c6966665f77686974655f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(54, 4, 2, 'Harnell Sand Rose (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d6861726e656c6c5f73616e645f726f73655f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(55, 4, 2, 'Harnell Raspberry Red (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d6861726e656c6c5f7261737062657272795f7265645f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(56, 4, 2, 'Marshall Turquoise (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d6d61727368616c6c5f74757271756f6973655f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(57, 4, 2, 'Marshall Silver (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d6d61727368616c6c5f73696c7665725f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(58, 4, 2, 'Marshall White (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d6d61727368616c6c5f77686974655f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(59, 4, 3, 'Ball Fiber Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d70696c6c6f772d62616c6c5f66696265725f70696c6c6f772e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(60, 4, 3, 'Long Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d70696c6c6f772d6c6f6e675f70696c6c6f772e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(61, 4, 3, 'Nano Gel Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d70696c6c6f772d6e616e6f5f67656c5f70696c6c6f772e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(62, 4, 3, 'Down Pillow Sandwich ', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d70696c6c6f772d646f776e5f70696c6c6f775f73616e64776963685f2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(66, 4, 4, 'Ball Fiber Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d626f6c737465722d62616c6c5f66696265725f626f6c737465722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(67, 4, 4, 'Nano Gel Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d626f6c737465722d6e616e6f5f67656c5f626f6c737465722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(69, 4, 5, 'Light Quilt Dacron', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d7175696c742d6c696768745f7175696c745f646163726f6e2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(70, 4, 5, 'Light Quilt Nano', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d7175696c742d6c696768745f7175696c745f6e616e6f2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(74, 5, 1, 'Contour Supreme with Cool Touch', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d636f6e746f75725f73757072656d655f776974685f636f6f6c5f746f7563682e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(75, 5, 1, 'Contour Elite with Cool Touch', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d636f6e746f75725f656c6974655f776974685f636f6f6c5f746f7563682e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(76, 5, 1, 'Sensation Supreme with Cool Touch', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d73656e736174696f6e5f73757072656d655f776974685f636f6f6c5f746f7563682e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(77, 5, 1, 'Sensation Elite with Cool Touch', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d73656e736174696f6e5f656c6974655f776974685f636f6f6c5f746f7563682e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(78, 5, 1, 'Tempur Flex 500', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d74656d7075725f666c65785f3530302e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(79, 5, 1, 'Tempur Flex 2000', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d74656d7075725f666c65785f323030302e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(80, 5, 1, 'Tempur Flex 4000', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d74656d7075725f666c65785f343030302e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(81, 5, 3, 'Original Pillow (S, M, L, XL)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d70696c6c6f772d6f726967696e616c5f70696c6c6f775f28732c5f6d2c5f6c2c5f786c292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(82, 5, 3, 'Original Pillow Queen (M, L, XL)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d70696c6c6f772d6f726967696e616c5f70696c6c6f775f717565656e5f286d2c5f6c2c5f786c292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(83, 5, 3, 'Millernium Pillow (S, M, L, XL)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d70696c6c6f772d6d696c6c65726e69756d5f70696c6c6f775f28732c5f6d2c5f6c2c5f786c292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(84, 5, 3, 'Millernium Pillow Queen (M, L, XL)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d70696c6c6f772d6d696c6c65726e69756d5f70696c6c6f775f717565656e5f286d2c5f6c2c5f786c292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(85, 3, 1, 'Medicci', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d6d6564696363692e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(86, 3, 1, 'Fossano', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d666f7373616e6f2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(87, 3, 1, 'Messina', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d6d657373696e612e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(88, 3, 1, 'Riccione', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d72696363696f6e652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(89, 3, 1, 'Vinitto', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d76696e6974746f2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(90, 3, 1, 'Vecchia', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d766563636869612e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(91, 3, 1, 'Soft Cloud', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d736f66745f636c6f75642e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(92, 3, 1, 'Ecicitato', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d65636963697461746f2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(93, 3, 3, 'Castrociello', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d70696c6c6f772d63617374726f6369656c6c6f2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(96, 3, 2, 'Bernadette Red (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d6265726e6164657474655f7265645f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(97, 3, 2, 'Bernadette Yellow (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d6265726e6164657474655f79656c6c6f775f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(98, 3, 2, 'Avery Aruba Blue (JQ TC)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d61766572795f61727562615f626c75655f286a715f7463292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(99, 3, 2, 'Avery White (JQ TC)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d61766572795f77686974655f286a715f7463292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(100, 3, 2, 'Milva (PRINT SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d6d696c76615f287072696e745f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(101, 3, 2, 'Leika (PRINT SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d6c65696b615f287072696e745f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21', 0, 0, 1),
(102, 3, 2, 'Jervois (PRINT SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d6a6572766f69735f287072696e745f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(103, 3, 3, 'Lyocel Embossed Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d70696c6c6f772d6c796f63656c5f656d626f737365645f70696c6c6f772e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(104, 3, 3, 'Filler Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d70696c6c6f772d66696c6c65725f70696c6c6f772e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(105, 3, 3, 'Fiber Gel Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d70696c6c6f772d66696265725f67656c5f70696c6c6f772e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(106, 3, 4, 'Lyocel Embossed Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign&reg; is made with Super Pillow Top&reg; and completed with cashmere, wool and 4cm Talalay&reg; latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>\r\n', 0x666c6f72656e63652d626f6c737465722d6c796f63656c5f656d626f737365645f626f6c737465722e6a7067, '2019-01-30 17:00:00', '2019-04-02 14:43:15', 0, 0, 1),
(107, 3, 4, 'Filler Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d626f6c737465722d66696c6c65725f626f6c737465722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(108, 5, 4, 'Fiber Gel Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign&reg; is made with Super Pillow Top&reg; and completed with cashmere, wool and 4cm Talalay&reg; latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>\r\n', 0x666c6f72656e63652d626f6c737465722d66696265725f67656c5f626f6c737465722e6a7067, '2019-01-30 17:00:00', '2019-04-02 09:27:18', 0, 0, 1),
(109, 3, 5, 'Light Quilt Dacron', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d7175696c742d6c696768745f7175696c745f646163726f6e2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(110, 3, 5, 'Light Quilt Fiber Gel', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d7175696c742d6c696768745f7175696c745f66696265725f67656c2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(115, 6, NULL, 'Consul Classic LegComfort', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d636f6e73756c5f636c61737369635f6c6567636f6d666f72742e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(116, 6, NULL, 'Reno Signature Chair', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d72656e6f5f7369676e61747572655f63686169722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(117, 6, NULL, 'Sunrise Classic LegComfort', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d73756e726973655f636c61737369635f6c6567636f6d666f72742e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(118, 3, NULL, 'View Signature Chair', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d2d766965775f7369676e61747572655f63686169722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22', 0, 0, 1);
INSERT INTO `tm_product` (`id`, `brand_id`, `cat_id`, `name`, `description`, `image`, `created_at`, `updated_at`, `stars`, `position`, `active`) VALUES
(119, 6, NULL, 'Magic Classic LegComfort', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d6d616769635f636c61737369635f6c6567636f6d666f72742e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(120, 6, NULL, 'Mayfair Signature Chair', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d6d6179666169725f7369676e61747572655f63686169722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(121, 6, NULL, 'Metro Chair High Back Std Base', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d6d6574726f5f63686169725f686967685f6261636b5f7374645f626173652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(122, 6, NULL, 'Metro Chair Low Back Std Base', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d6d6574726f5f63686169725f6c6f775f6261636b5f7374645f626173652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(123, 6, NULL, 'Skyline Classic Chair', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d736b796c696e655f636c61737369635f63686169722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(124, 6, NULL, 'City Chair High Back Std Base', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d636974795f63686169725f686967685f6261636b5f7374645f626173652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(125, 6, NULL, 'City Chair Low Back Standard Base', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d636974795f63686169725f6c6f775f6261636b5f7374616e646172645f626173652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24', 0, 0, 1),
(127, 4, 2, 'Dummy', '<p>Lorem Ipsum</p>\r\n', 0x73657274612d6265645f6c696e656e2d64756d6d792e706e67, '2019-02-11 17:00:00', '2019-03-20 12:43:23', 0, 0, 1),
(129, 3, 3, 'Test Product', '<p>Deskripsi Product Test</p>\r\n', 0x666c6f72656e63652d70696c6c6f772d746573745f70726f647563742e6a7067, '2019-02-26 17:00:00', '2019-03-20 12:43:22', 0, 0, 1),
(130, 1, 1, 'Test Product', '<p>Dummy</p>\r\n', 0x616972656c6f6f6d2d6d617474726573732d746573745f70726f647563742e6a7067, '2019-04-08 17:00:00', '2019-04-09 03:34:31', 0, 0, 1),
(131, 1, 1, 'Test Product', '<p>Dummy</p>\r\n', 0x616972656c6f6f6d2d6d617474726573732d746573745f70726f647563742e6a7067, '2019-04-08 17:00:00', '2019-04-09 03:35:49', 0, 0, 1),
(132, 1, 1, 'Matras baru', '<p>Dummy</p>\r\n', 0x616972656c6f6f6d2d6d617474726573732d6d61747261735f626172752e6a7067, '2019-04-08 17:00:00', '2019-04-09 03:36:54', 0, 0, 1),
(133, 1, 2, 'Spreinya Aireloom', '<p>Sprei</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 16:43:42', 0, 0, 1),
(134, 1, 1, 'Matrasnya Aireloom', '<p>Sprei</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 16:44:17', 0, 0, 1),
(135, 2, 1, 'Matrasnya Kingkoil', '<p>Dummy</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 16:45:07', 0, 0, 1),
(136, 2, 1, 'Matrasnya Kingkoil', '<p>Dummy</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 16:46:41', 0, 0, 1),
(137, 2, 1, 'Matrasnya Kingkoil', '<p>Dummy</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 16:46:56', 0, 0, 1),
(138, 2, 1, 'Matrasnya Kingkoil', '<p>Dummy</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 16:48:22', 0, 0, 1),
(139, 2, 1, 'Matrasnya Kingkoil', '<p>Dummy</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 16:49:18', 0, 0, 1),
(140, 2, 1, 'Matrasnya Kingkoil', '<p>Dummy</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 16:53:08', 0, 0, 1),
(141, 2, 1, 'Matrasnya Kingkoil', '<p>Dummy</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 16:53:44', 0, 0, 1),
(142, 2, 1, 'Matrasnya Aireloom', '<p>DUb</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 16:54:23', 0, 0, 1),
(143, 2, 1, 'Matrasnya Aireloom', '<p>DUb</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 16:56:21', 0, 0, 1),
(144, 2, 1, 'Matrasnya Aireloom', '<p>Dum</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 16:56:53', 0, 0, 1),
(145, 2, 1, 'Matrasnya Aireloom', '<p>Dum</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 17:38:32', 0, 0, 1),
(146, 2, 1, 'Matrasnya Aireloom', '<p>Dum</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 17:44:53', 0, 0, 1),
(147, 2, 1, 'Mat', '<p>Dum</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 17:57:20', 0, 0, 1),
(148, 1, 1, 'Ma', '<p>Du</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 18:14:37', 0, 0, 1),
(149, 1, 1, 'Matrasnya Aireloom', '<p>Dummy</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-08 17:00:00', '2019-04-09 18:15:50', 0, 0, 1),
(152, 4, 1, 'Test Product Image', '<p>Test</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-13 17:00:00', '2019-04-14 18:37:12', 0, 0, 1),
(153, 4, 2, 'Test Bed Linen', '<p>Test</p>\r\n', 0x2f706174682f746f2f66696c652f, '2019-04-14 17:00:00', '2019-04-17 15:51:34', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_promotion`
--

CREATE TABLE `tm_promotion` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` blob NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_promotion`
--

INSERT INTO `tm_promotion` (`id`, `name`, `description`, `image`, `start_date`, `end_date`, `status`) VALUES
(6, 'promotion1', '<p>grass</p>\r\n', 0x70726f6d6f74696f6e2d696d6167652d356361373836373634396662382e6a7067, '2019-04-08', '2019-04-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_review`
--

CREATE TABLE `tm_review` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `stars` int(1) NOT NULL COMMENT 'give 1 -- 5',
  `date_attempt` datetime DEFAULT CURRENT_TIMESTAMP,
  `display` char(1) NOT NULL DEFAULT '0' COMMENT 'active = 1; inactive = 0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 0x312e6a7067, '2019-01-14 17:00:00', '2019-01-15 06:04:20');

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
-- Table structure for table `tm_special_package`
--

CREATE TABLE `tm_special_package` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` blob NOT NULL,
  `description` text NOT NULL,
  `active` char(1) NOT NULL COMMENT 'active = 1; inactive = 0',
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_special_package`
--

INSERT INTO `tm_special_package` (`id`, `name`, `image`, `description`, `active`, `price`) VALUES
(13, 'Testing Special Package', 0x7370656369616c5f7061636b6167652d74657374696e675f7370656369616c5f7061636b6167652e6a7067, '<p>Special packge description</p>\r\n', '1', '22000000'),
(14, 'Second Special Package', 0x7370656369616c5f7061636b6167652d7365636f6e645f7370656369616c5f7061636b6167652e6a7067, '<p>Second description of special package</p>\r\n', '1', '21000000');

-- --------------------------------------------------------

--
-- Table structure for table `tm_status_order`
--

CREATE TABLE `tm_status_order` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
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

CREATE TABLE `tm_store_owner` (
  `id` int(11) NOT NULL,
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
  `id_super_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tm_super_admin` (
  `id` int(11) NOT NULL,
  `id_userlogin` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `tm_voucher` (
  `id` int(11) NOT NULL,
  `kode_voucher` char(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `bonus` int(11) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_voucher`
--

INSERT INTO `tm_voucher` (`id`, `kode_voucher`, `name`, `description`, `bonus`, `discount`, `jumlah`, `active`) VALUES
(7, 'AGM_VCR0001', 'Voucher Pertama', '<p>Test Voucher Pertama</p>\r\n', 2, '0.70', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_bonus_voucher`
--

CREATE TABLE `tr_bonus_voucher` (
  `id` int(11) NOT NULL,
  `id_voucher` int(11) NOT NULL,
  `bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tr_order_detail` (
  `id` int(11) NOT NULL,
  `id_tm_order` int(11) DEFAULT NULL,
  `id_tr_product` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(19, 66, 9, 1, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product`
--

CREATE TABLE `tr_product` (
  `id` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_product_size` int(11) NOT NULL,
  `quantity` int(11) DEFAULT '0',
  `new` int(11) NOT NULL DEFAULT '1' COMMENT 'active = 1; inactive = 0',
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product`
--

INSERT INTO `tr_product` (`id`, `id_store`, `id_product`, `id_product_size`, `quantity`, `new`, `id_admin`) VALUES
(4, 1, 45, 77, 1000, 0, 2),
(5, 1, 45, 78, 999, 0, 2),
(9, 1, 30, 46, 4, 0, 2),
(10, 1, 30, 45, 10002, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_bedding_acc`
--

CREATE TABLE `tr_product_bedding_acc` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stars` char(1) NOT NULL COMMENT 'give star 0 -- 5',
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(21, 129, '5', 21),
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

CREATE TABLE `tr_product_bed_linen` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stars` char(1) NOT NULL COMMENT 'give star 0 -- 5',
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product_bed_linen`
--

INSERT INTO `tr_product_bed_linen` (`id`, `prod_id`, `stars`, `position`) VALUES
(4, 16, '3', 24),
(5, 17, '5', 2),
(6, 18, '5', 3),
(7, 19, '5', 4),
(8, 20, '5', 5),
(9, 24, '5', 6),
(10, 50, '5', 7),
(11, 51, '5', 8),
(12, 52, '5', 9),
(13, 53, '5', 10),
(14, 54, '5', 11),
(15, 55, '5', 12),
(16, 56, '5', 13),
(17, 57, '5', 14),
(18, 58, '5', 15),
(19, 96, '5', 16),
(20, 97, '5', 17),
(21, 98, '5', 18),
(22, 99, '5', 19),
(23, 100, '5', 20),
(24, 101, '5', 21),
(25, 102, '5', 22),
(26, 127, '5', 23),
(27, 153, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_best_seller`
--

CREATE TABLE `tr_product_best_seller` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stars` char(1) NOT NULL COMMENT 'give star 0 -- 5',
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product_best_seller`
--

INSERT INTO `tr_product_best_seller` (`id`, `prod_id`, `stars`, `position`) VALUES
(1, 1, '3', 1),
(2, 2, '4', 2),
(3, 3, '5', 3),
(4, 4, '5', 4),
(5, 5, '5', 5),
(6, 6, '5', 6),
(7, 7, '5', 7),
(8, 8, '5', 8),
(9, 9, '5', 9),
(10, 10, '5', 10),
(11, 11, '5', 11),
(12, 12, '5', 12),
(13, 13, '5', 13),
(14, 16, '5', 14),
(15, 17, '5', 15),
(16, 18, '5', 16),
(17, 19, '5', 17),
(18, 20, '5', 18),
(19, 21, '5', 19),
(20, 22, '5', 20),
(21, 23, '5', 21),
(22, 24, '5', 22),
(23, 25, '5', 23),
(24, 26, '5', 24),
(25, 27, '5', 25),
(26, 28, '5', 26),
(27, 30, '5', 27),
(28, 31, '5', 28),
(29, 32, '5', 29),
(30, 34, '5', 30),
(31, 35, '5', 31),
(32, 37, '5', 32),
(33, 38, '5', 33),
(34, 85, '5', 34),
(35, 86, '5', 35),
(36, 87, '5', 36),
(37, 88, '5', 37),
(38, 89, '5', 38),
(39, 90, '5', 39),
(40, 91, '5', 40),
(41, 92, '5', 41),
(42, 93, '5', 42),
(43, 96, '5', 43),
(44, 97, '5', 44),
(45, 98, '5', 45),
(46, 99, '5', 46),
(47, 100, '5', 47),
(48, 101, '5', 48),
(49, 102, '5', 49),
(50, 103, '5', 50),
(51, 104, '5', 51),
(52, 105, '5', 52),
(53, 106, '5', 53),
(54, 107, '5', 54),
(55, 108, '5', 55),
(56, 109, '5', 56),
(57, 110, '5', 57),
(58, 118, '5', 58),
(59, 129, '5', 59),
(60, 39, '5', 60),
(61, 40, '5', 61),
(62, 43, '5', 62),
(63, 44, '5', 63),
(64, 45, '5', 64),
(65, 46, '5', 65),
(66, 47, '5', 66),
(67, 48, '5', 67),
(68, 50, '5', 68),
(69, 51, '5', 69),
(70, 52, '5', 70),
(71, 53, '5', 71),
(72, 54, '5', 72),
(73, 55, '5', 73),
(74, 56, '5', 74),
(75, 57, '5', 75),
(76, 58, '5', 76),
(77, 59, '5', 77),
(78, 60, '5', 78),
(79, 61, '5', 79),
(80, 62, '5', 80),
(81, 66, '5', 81),
(82, 67, '5', 82),
(83, 69, '5', 83),
(84, 70, '5', 84),
(85, 127, '5', 85),
(86, 74, '5', 86),
(87, 75, '5', 87),
(88, 76, '5', 88),
(89, 77, '5', 89),
(90, 78, '5', 90),
(91, 79, '5', 91),
(92, 80, '5', 92),
(93, 81, '5', 93),
(94, 82, '5', 94),
(95, 83, '5', 95),
(96, 84, '5', 96),
(97, 115, '5', 97),
(98, 116, '5', 98),
(99, 117, '5', 99),
(100, 119, '5', 100),
(101, 120, '5', 101),
(102, 121, '5', 102),
(103, 122, '5', 103),
(104, 123, '5', 104),
(105, 124, '5', 105),
(106, 125, '5', 106),
(107, 153, '', 107);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_image`
--

CREATE TABLE `tr_product_image` (
  `id` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `image_1` blob NOT NULL,
  `image_2` blob,
  `image_3` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tr_product_image`
--

INSERT INTO `tr_product_image` (`id`, `id_prod`, `image_1`, `image_2`, `image_3`) VALUES
(1, 149, 0x616972656c6f6f6d2d6d617474726573732d6d61747261736e79615f616972656c6f6f6d2d302e6a7067, 0x616972656c6f6f6d2d6d617474726573732d6d61747261736e79615f616972656c6f6f6d2d312e6a7067, 0x616972656c6f6f6d2d6d617474726573732d6d61747261736e79615f616972656c6f6f6d2d322e6a7067),
(2, 150, 0x73657274612d6d617474726573732d746573745f70726f647563745f696d6167652d302e6a7067, 0x73657274612d6d617474726573732d746573745f70726f647563745f696d6167652d312e6a7067, 0x73657274612d6d617474726573732d746573745f70726f647563745f696d6167652d322e6a7067),
(3, 152, 0x73657274612d6d617474726573732d746573745f70726f647563745f696d6167652d302e6a7067, 0x73657274612d6d617474726573732d746573745f70726f647563745f696d6167652d312e6a7067, 0x73657274612d6d617474726573732d746573745f70726f647563745f696d6167652d322e6a7067),
(4, 153, 0x73657274612d6265645f6c696e656e2d746573745f6265645f6c696e656e2d302e6a7067, 0x73657274612d6265645f6c696e656e2d746573745f6265645f6c696e656e2d312e6a7067, 0x73657274612d6265645f6c696e656e2d746573745f6265645f6c696e656e2d322e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_size`
--

CREATE TABLE `tr_product_size` (
  `id` int(11) NOT NULL,
  `sku` varchar(20) DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `sub_price` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product_size`
--

INSERT INTO `tr_product_size` (`id`, `sku`, `prod_id`, `size_id`, `price`, `sub_price`) VALUES
(1, NULL, 1, 4, '1000000', NULL),
(2, NULL, 2, 3, '1000000', NULL),
(3, NULL, 3, 5, '1000000', NULL),
(4, NULL, 4, 2, '1000000', NULL),
(5, NULL, 5, 1, '1000000', NULL),
(6, NULL, 6, 2, '1000000', NULL),
(7, NULL, 7, 5, '1000000', NULL),
(8, NULL, 8, 4, '1000000', NULL),
(9, NULL, 9, 2, '1000000', NULL),
(10, NULL, 10, 5, '1000000', NULL),
(11, NULL, 11, 3, '1000000', NULL),
(12, NULL, 12, 1, '1000000', NULL),
(13, NULL, 13, 5, '1000000', NULL),
(17, NULL, 16, 1, '1000000', NULL),
(18, NULL, 16, 3, '2000000', NULL),
(19, NULL, 17, 1, '1000000', NULL),
(20, NULL, 17, 3, '2000000', NULL),
(21, NULL, 18, 1, '1000000', NULL),
(22, NULL, 18, 3, '2000000', NULL),
(23, NULL, 19, 3, '1000000', NULL),
(24, NULL, 19, 5, '2000000', NULL),
(25, NULL, 20, 3, '1000000', NULL),
(26, NULL, 20, 4, '2000000', NULL),
(27, NULL, 21, 5, '1000000', NULL),
(28, NULL, 21, 5, '2000000', NULL),
(29, NULL, 22, 3, '1000000', NULL),
(30, NULL, 22, 4, '2000000', NULL),
(31, NULL, 23, 3, '1000000', NULL),
(32, NULL, 23, 4, '2000000', NULL),
(33, NULL, 24, 1, '1000000', NULL),
(34, NULL, 24, 2, '2000000', NULL),
(35, NULL, 25, 2, '1000000', NULL),
(36, NULL, 25, 4, '2000000', NULL),
(37, NULL, 26, 3, '1000000', NULL),
(38, NULL, 26, 5, '2000000', NULL),
(39, NULL, 27, 2, '1000000', NULL),
(40, NULL, 27, 5, '2000000', NULL),
(41, NULL, 28, 4, '1000000', NULL),
(42, NULL, 28, 5, '2000000', NULL),
(45, NULL, 30, 1, '1000000', NULL),
(46, NULL, 30, 4, '2000000', NULL),
(47, NULL, 31, 2, '1000000', NULL),
(48, NULL, 31, 4, '2000000', NULL),
(49, NULL, 32, 3, '1000000', NULL),
(50, NULL, 32, 2, '2000000', NULL),
(53, NULL, 34, 3, '1000000', NULL),
(54, NULL, 34, 2, '2000000', NULL),
(55, NULL, 35, 2, '1000000', NULL),
(56, NULL, 35, 3, '2000000', NULL),
(59, NULL, 37, 2, '1000000', NULL),
(60, NULL, 37, 3, '2000000', NULL),
(61, NULL, 38, 1, '1000000', NULL),
(62, NULL, 38, 3, '2000000', NULL),
(63, NULL, 39, 2, '1000000', NULL),
(64, NULL, 39, 3, '2000000', NULL),
(65, NULL, 40, 2, '1000000', NULL),
(66, NULL, 40, 4, '2000000', NULL),
(73, NULL, 43, 1, '1000000', NULL),
(74, NULL, 43, 3, '2000000', NULL),
(75, NULL, 44, 2, '1000000', NULL),
(76, NULL, 44, 3, '2000000', NULL),
(77, NULL, 45, 2, '1000000', NULL),
(78, NULL, 45, 4, '22222222', NULL),
(79, NULL, 46, 2, '1000000', NULL),
(80, NULL, 46, 4, '2000000', NULL),
(81, NULL, 47, 1, '1000000', NULL),
(82, NULL, 47, 4, '2000000', NULL),
(83, NULL, 48, 2, '1000000', NULL),
(84, NULL, 48, 4, '2000000', NULL),
(87, NULL, 50, 2, '1000000', NULL),
(88, NULL, 50, 4, '2000000', NULL),
(89, NULL, 51, 3, '1000000', NULL),
(90, NULL, 51, 5, '2000000', NULL),
(91, NULL, 52, 2, '10000000', NULL),
(92, NULL, 52, 5, '2000000', NULL),
(93, NULL, 53, 3, '1000000', NULL),
(94, NULL, 53, 4, '2000000', NULL),
(95, NULL, 54, 1, '1000000', NULL),
(96, NULL, 54, 4, '2000000', NULL),
(97, NULL, 55, 1, '1000000', NULL),
(98, NULL, 55, 3, '2000000', NULL),
(99, NULL, 56, 2, '1000000', NULL),
(100, NULL, 56, 1, '2000000', NULL),
(101, NULL, 57, 4, '1000000', NULL),
(102, NULL, 58, 2, '1000000', NULL),
(103, NULL, 58, 4, '2000000', NULL),
(104, NULL, 59, 2, '1000000', NULL),
(105, NULL, 59, 4, '2000000', NULL),
(106, NULL, 60, 4, '1000000', NULL),
(107, NULL, 60, 5, '2000000', NULL),
(108, NULL, 61, 4, '1000000', NULL),
(109, NULL, 61, 5, '2000000', NULL),
(110, NULL, 28, 2, '1000000', NULL),
(111, NULL, 28, 5, '2000000', NULL),
(118, NULL, 66, 2, '1000000', NULL),
(119, NULL, 66, 4, '2000000', NULL),
(120, NULL, 67, 3, '1000000', NULL),
(121, NULL, 67, 5, '2000000', NULL),
(124, NULL, 34, 2, '1000000', NULL),
(125, NULL, 34, 4, '2000000', NULL),
(126, NULL, 35, 4, '1000000', NULL),
(127, NULL, 35, 5, '2000000', NULL),
(130, NULL, 37, 4, '1000000', NULL),
(131, NULL, 37, 4, '2000000', NULL),
(132, NULL, 38, 4, '1000000', NULL),
(133, NULL, 38, 5, '2000000', NULL),
(134, NULL, 74, 4, '1000000', NULL),
(135, NULL, 74, 3, '2000000', NULL),
(136, NULL, 75, 3, '1000000', NULL),
(137, NULL, 75, 5, '2000000', NULL),
(138, NULL, 76, 4, '1000000', NULL),
(139, NULL, 76, 5, '2000000', NULL),
(140, NULL, 77, 4, '10000000', NULL),
(141, NULL, 77, 5, '20000000', NULL),
(142, NULL, 78, 3, '1000000', NULL),
(143, NULL, 78, 5, '2000000', NULL),
(144, NULL, 79, 3, '1000000', NULL),
(145, NULL, 79, 4, '4000000', NULL),
(146, NULL, 80, 3, '1000000', NULL),
(147, NULL, 80, 5, '2000000', NULL),
(148, NULL, 81, 4, '1000000', NULL),
(149, NULL, 81, 5, '2000000', NULL),
(150, NULL, 82, 3, '1000000', NULL),
(151, NULL, 82, 5, '2000000', NULL),
(152, NULL, 83, 4, '1000000', NULL),
(153, NULL, 83, 2, '2000000', NULL),
(154, NULL, 84, 4, '1000000', NULL),
(155, NULL, 84, 2, '2000000', NULL),
(156, NULL, 85, 1, '1000000', NULL),
(157, NULL, 85, 3, '2000000', NULL),
(158, NULL, 86, 3, '1000000', NULL),
(159, NULL, 86, 4, '2000000', NULL),
(160, NULL, 86, 3, '1000000', NULL),
(161, NULL, 86, 4, '2000000', NULL),
(162, NULL, 87, 2, '1000000', NULL),
(163, NULL, 87, 4, '2000000', NULL),
(164, NULL, 88, 2, '1000000', NULL),
(165, NULL, 88, 3, '2000000', NULL),
(166, NULL, 89, 4, '1000000', NULL),
(167, NULL, 89, 5, '2000000', NULL),
(168, NULL, 90, 3, '1000000', NULL),
(169, NULL, 90, 1, '2000000', NULL),
(170, NULL, 91, 2, '1000000', NULL),
(171, NULL, 91, 1, '2000000', NULL),
(172, NULL, 92, 2, '1000000', NULL),
(173, NULL, 92, 4, '2000000', NULL),
(174, NULL, 93, 1, '1000000', NULL),
(175, NULL, 93, 5, '2000000', NULL),
(182, NULL, 96, 1, '1000000', NULL),
(183, NULL, 96, 3, '2000000', NULL),
(184, NULL, 97, 2, '1000000', NULL),
(185, NULL, 97, 1, '2000000', NULL),
(186, NULL, 98, 1, '1000000', NULL),
(187, NULL, 98, 2, '2000000', NULL),
(188, NULL, 99, 2, '1000000', NULL),
(189, NULL, 99, 4, '2000000', NULL),
(190, NULL, 100, 3, '1000000', NULL),
(191, NULL, 100, 4, '2000000', NULL),
(192, NULL, 101, 2, '1000000', NULL),
(193, NULL, 101, 4, '2000000', NULL),
(194, NULL, 102, 2, '1000000', NULL),
(195, NULL, 102, 2, '2000000', NULL),
(196, NULL, 103, 1, '1000000', NULL),
(197, NULL, 103, 3, '2000000', NULL),
(198, NULL, 104, 1, '1000000', NULL),
(199, NULL, 104, 3, '2000000', NULL),
(200, NULL, 105, 3, '1000000', NULL),
(201, NULL, 105, 4, '2000000', NULL),
(204, NULL, 107, 2, '1000000', NULL),
(205, NULL, 107, 4, '2000000', NULL),
(208, NULL, 34, 2, '1000000', NULL),
(209, NULL, 34, 5, '2000000', NULL),
(210, NULL, 110, 3, '1000000', NULL),
(211, NULL, 110, 4, '2000000', NULL),
(212, NULL, 37, 1, '1000000', NULL),
(213, NULL, 37, 4, '2000000', NULL),
(214, NULL, 38, 4, '1000000', NULL),
(215, NULL, 38, 5, '2000000', NULL),
(219, NULL, 115, 3, '1000000', NULL),
(220, NULL, 115, 5, '2000000', NULL),
(221, NULL, 116, 1, '1000000', NULL),
(222, NULL, 116, 5, '2000000', NULL),
(223, NULL, 117, 2, '1000000', NULL),
(224, NULL, 117, 5, '2000000', NULL),
(225, NULL, 118, 2, '1000000', NULL),
(226, NULL, 118, 4, '2000000', NULL),
(227, NULL, 119, 3, '1000000', NULL),
(228, NULL, 119, 5, '2000000', NULL),
(229, NULL, 120, 2, '1000000', NULL),
(230, NULL, 120, 4, '2000000', NULL),
(231, NULL, 121, 3, '1000000', NULL),
(232, NULL, 121, 5, '2000000', NULL),
(233, NULL, 122, 3, '1000000', NULL),
(234, NULL, 122, 4, '2000000', NULL),
(235, NULL, 123, 2, '1000000', NULL),
(236, NULL, 123, 1, '2000000', NULL),
(237, NULL, 124, 4, '1000000', NULL),
(238, NULL, 124, 2, '2000000', NULL),
(239, NULL, 125, 3, '1000000', NULL),
(240, NULL, 125, 2, '2000000', NULL),
(243, NULL, 127, 1, '100', NULL),
(244, NULL, 127, 2, '1000', NULL),
(247, NULL, 129, 1, '1000000', NULL),
(253, NULL, 106, 3, '5000000', NULL),
(260, NULL, 108, 1, '1000000', NULL),
(261, NULL, 108, 3, '2000000', '500000'),
(262, '123456', 129, 1, '123455', NULL),
(263, 'SKU12345', 132, 1, '1000000', NULL),
(264, 'SKU', 135, 2, '300000', NULL),
(265, 'SKU', 135, 2, '300000', NULL),
(266, 'SKU', 135, 2, '300000', NULL),
(267, 'SKU', 134, 2, '10000000', NULL),
(268, 'SKU', 134, 2, '10000000', NULL),
(269, 'SKU', 134, 3, '122344', NULL),
(270, 'SKU', 134, 3, '122344', NULL),
(271, 'SKU', 134, 3, '122344', NULL),
(272, 'SKU', 147, 2, '100000', NULL),
(273, 'SKU', 148, 1, '10500', NULL),
(274, 'SKU', 134, 3, '100000', NULL),
(277, 'SKU1234', 152, 1, '100000', NULL),
(281, NULL, 153, 1, '10000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_spec`
--

CREATE TABLE `tr_product_spec` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `spec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product_spec`
--

INSERT INTO `tr_product_spec` (`id`, `prod_id`, `spec_id`) VALUES
(1, 1, 46),
(2, 2, 46),
(3, 3, 46),
(4, 4, 46),
(5, 5, 46),
(6, 6, 46),
(7, 7, 46),
(8, 8, 1),
(9, 9, 2),
(10, 10, 3),
(11, 11, 4),
(12, 12, 5),
(13, 13, 7),
(18, 16, 2),
(19, 16, 3),
(20, 16, 4),
(21, 17, 1),
(22, 17, 2),
(23, 17, 3),
(24, 17, 4),
(25, 18, 2),
(26, 18, 4),
(27, 18, 5),
(28, 18, 6),
(29, 19, 6),
(30, 19, 7),
(31, 19, 21),
(32, 19, 46),
(33, 20, 2),
(34, 20, 4),
(35, 20, 27),
(36, 20, 43),
(37, 21, 1),
(38, 21, 3),
(39, 21, 27),
(40, 22, 1),
(41, 22, 3),
(42, 22, 4),
(43, 23, 4),
(44, 24, 46),
(45, 24, 48),
(46, 25, 3),
(47, 25, 26),
(48, 25, 30),
(49, 26, 4),
(50, 27, 3),
(51, 28, 4),
(52, 28, 5),
(53, 28, 6),
(55, 30, 3),
(56, 30, 12),
(57, 30, 14),
(58, 31, 45),
(59, 31, 46),
(60, 32, 5),
(61, 32, 15),
(64, 34, 6),
(65, 34, 13),
(66, 35, 16),
(67, 35, 18),
(71, 37, 30),
(72, 37, 46),
(73, 38, 14),
(74, 38, 17),
(75, 39, 3),
(76, 39, 5),
(77, 40, 21),
(78, 40, 23),
(79, 40, 25),
(84, 43, 3),
(85, 43, 4),
(86, 44, 3),
(87, 44, 6),
(88, 44, 46),
(91, 46, 26),
(92, 46, 27),
(93, 46, 30),
(94, 47, 5),
(95, 47, 7),
(96, 47, 28),
(97, 48, 1),
(98, 48, 4),
(101, 50, 6),
(102, 50, 7),
(103, 50, 10),
(104, 51, 7),
(105, 51, 10),
(106, 51, 11),
(107, 52, 1),
(108, 52, 5),
(109, 53, 40),
(110, 53, 44),
(111, 54, 4),
(112, 54, 16),
(113, 55, 29),
(114, 55, 32),
(115, 56, 40),
(116, 56, 42),
(117, 57, 4),
(118, 58, 38),
(119, 58, 39),
(120, 59, 33),
(121, 59, 34),
(122, 59, 36),
(123, 60, 38),
(124, 60, 39),
(125, 61, 16),
(126, 61, 18),
(127, 61, 20),
(128, 28, 4),
(129, 28, 7),
(130, 28, 24),
(141, 66, 35),
(142, 66, 46),
(143, 67, 4),
(144, 67, 16),
(148, 34, 5),
(149, 34, 8),
(150, 34, 30),
(151, 35, 3),
(152, 35, 5),
(153, 35, 33),
(156, 37, 5),
(157, 37, 28),
(158, 37, 33),
(159, 38, 32),
(160, 38, 34),
(161, 38, 35),
(162, 74, 35),
(163, 74, 38),
(164, 74, 46),
(165, 74, 47),
(166, 75, 2),
(167, 75, 5),
(168, 76, 4),
(169, 76, 7),
(170, 76, 18),
(171, 77, 4),
(172, 77, 6),
(173, 77, 21),
(174, 78, 5),
(175, 78, 15),
(176, 78, 21),
(177, 79, 6),
(178, 79, 14),
(179, 79, 16),
(180, 80, 5),
(181, 80, 17),
(182, 80, 20),
(183, 81, 3),
(184, 81, 4),
(185, 81, 5),
(186, 82, 6),
(187, 83, 5),
(188, 83, 21),
(189, 83, 22),
(190, 84, 5),
(191, 84, 6),
(192, 85, 32),
(193, 85, 34),
(194, 85, 46),
(195, 86, 4),
(196, 86, 6),
(197, 87, 1),
(198, 87, 5),
(199, 88, 4),
(200, 88, 24),
(201, 89, 3),
(202, 89, 5),
(203, 90, 6),
(204, 90, 21),
(205, 91, 5),
(206, 91, 11),
(207, 92, 2),
(208, 92, 4),
(209, 93, 3),
(210, 93, 21),
(213, 96, 6),
(214, 96, 14),
(215, 97, 5),
(216, 98, 2),
(217, 98, 4),
(218, 99, 1),
(219, 99, 3),
(220, 100, 3),
(221, 100, 23),
(222, 101, 6),
(223, 102, 18),
(224, 102, 21),
(225, 103, 5),
(226, 103, 25),
(227, 104, 3),
(228, 104, 20),
(229, 105, 3),
(230, 105, 4),
(233, 107, 6),
(234, 107, 24),
(237, 34, 5),
(238, 110, 4),
(239, 110, 6),
(240, 37, 4),
(241, 37, 5),
(242, 38, 3),
(243, 38, 17),
(248, 115, 3),
(249, 115, 6),
(250, 115, 16),
(251, 116, 16),
(252, 116, 20),
(253, 117, 4),
(254, 117, 14),
(255, 118, 3),
(256, 118, 6),
(257, 118, 25),
(258, 119, 20),
(259, 119, 22),
(260, 120, 4),
(261, 120, 20),
(262, 120, 25),
(263, 121, 2),
(264, 121, 6),
(265, 122, 13),
(266, 122, 15),
(267, 122, 32),
(268, 123, 3),
(269, 123, 38),
(270, 124, 4),
(271, 124, 20),
(272, 125, 1),
(273, 125, 2),
(274, 125, 3),
(275, 125, 4),
(276, 125, 5),
(277, 125, 6),
(278, 125, 8),
(281, 127, 2),
(284, 129, 2),
(285, 129, 5),
(290, 106, 17),
(291, 106, 19),
(309, 108, 34),
(310, 129, 2),
(311, 129, 3),
(312, 129, 2),
(313, 129, 3),
(314, 132, 2),
(315, 132, 3),
(316, 135, 1),
(317, 135, 2),
(318, 135, 1),
(319, 135, 2),
(320, 135, 1),
(321, 135, 2),
(322, 134, 1),
(323, 134, 1),
(324, 134, 2),
(325, 134, 2),
(326, 134, 2),
(327, 147, 1),
(328, 147, 2),
(329, 148, 1),
(330, 148, 2),
(331, 134, 1),
(332, 134, 2),
(337, 152, 2),
(340, 45, 4),
(341, 45, 6),
(342, 153, 2),
(343, 153, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tr_special_package`
--

CREATE TABLE `tr_special_package` (
  `id` int(11) NOT NULL,
  `id_special_package` int(11) NOT NULL,
  `id_tr_prod_size` int(11) NOT NULL,
  `priceSpcl` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_special_package`
--

INSERT INTO `tr_special_package` (`id`, `id_special_package`, `id_tr_prod_size`, `priceSpcl`, `quantity`) VALUES
(8, 13, 41, '2000000', 2),
(9, 13, 78, '20000000', 1),
(10, 14, 9, '1000000', 2),
(11, 14, 75, '20000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_storeowner_special_package`
--

CREATE TABLE `tr_storeowner_special_package` (
  `id` int(11) NOT NULL,
  `id_special_package` int(11) NOT NULL,
  `id_store_owner` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_storeowner_special_package`
--

INSERT INTO `tr_storeowner_special_package` (`id`, `id_special_package`, `id_store_owner`, `quantity`) VALUES
(1, 14, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_store_owner_cluster`
--

CREATE TABLE `tr_store_owner_cluster` (
  `id` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `province` char(2) NOT NULL,
  `city` char(4) NOT NULL,
  `sub_district` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'superAdmin', '$2y$10$qkLcTasok1mpvzBNP8B2YuJ9ULTtSnKM2CZVNyWXnLEiIOC0DZhpC', 'super.admin@keraton.com', 1, 0, NULL),
(5, 'admin', '$2y$10$mQvf0Gt2XHJyC0pTYoGecOPwLzAuPJ8HN.cMlVA79lTywQRC9bzmS', 'admin@keraton.com', 2, 0, NULL),
(15, 'dummyCS2', '$2y$10$mQvf0Gt2XHJyC0pTYoGecOPwLzAuPJ8HN.cMlVA79lTywQRC9bzmS', 'dummycs2@koliho.com', 4, 0, NULL),
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
(40, 'fachrul', '$2y$10$7wPW8cG7JWXvhD/4sx5wSufLSbwqtFD4iXU.b2DKo.97ZRyFhUsUi', 'fachrulpaul@gmail.com', 4, 0, NULL),
(42, 'fandi', '$2y$10$ib6SwmQ7CI3.ljYEa/QzR.XempU8pczfVU10dLUvM/nrXWhH/XTk2', 'fandi@email.com', 4, 0, NULL),
(43, 'garrydevaldi', '$2y$10$144lvRTGobtVlYL1xB4eEu.Kxirkp7zE2yMiAIcojtLPQ137tD4Ga', 'm9arryd2@gmail.com', 4, 0, NULL),
(44, 'garrygarry', '$2y$10$g4iHHRsmqyGGIrZvnt6FDe6llsIRnRVF/XBWtkr2pgzi7jxDlT.wW', 'hahaha@email.com', 4, 0, NULL),
(45, 'newadmin', '$2y$10$vBqb/xtYieKJxZJ3l3cZ/uKI6w0qrXpjCqpO/04vMGztPdxYD2Dyq', 'newadmin@email.com', 1, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mail_config`
--
ALTER TABLE `mail_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_queue`
--
ALTER TABLE `mail_queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_agmpedia`
--
ALTER TABLE `tm_agmpedia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `tm_customer_detail`
--
ALTER TABLE `tm_customer_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`),
  ADD KEY `id_userlogin` (`id_userlogin`),
  ADD KEY `province` (`province`),
  ADD KEY `sub_district` (`sub_district`);

--
-- Indexes for table `tm_forgot_pass`
--
ALTER TABLE `tm_forgot_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_newsletter`
--
ALTER TABLE `tm_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_order`
--
ALTER TABLE `tm_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adress_detail` (`address_detail`),
  ADD KEY `id_userlogin` (`id_userlogin`),
  ADD KEY `index_inv` (`order_number`);

--
-- Indexes for table `tm_product`
--
ALTER TABLE `tm_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tm_promotion`
--
ALTER TABLE `tm_promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_review`
--
ALTER TABLE `tm_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`);

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
-- Indexes for table `tm_special_package`
--
ALTER TABLE `tm_special_package`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tm_status_order`
--
ALTER TABLE `tm_status_order`
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
-- Indexes for table `tm_voucher`
--
ALTER TABLE `tm_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_bonus_voucher`
--
ALTER TABLE `tr_bonus_voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_voucher` (`id_voucher`);

--
-- Indexes for table `tr_order_detail`
--
ALTER TABLE `tr_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_order` (`id_tm_order`),
  ADD KEY `index_product` (`id_tr_product`);

--
-- Indexes for table `tr_product`
--
ALTER TABLE `tr_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_product_size` (`id_product_size`),
  ADD KEY `id_store` (`id_store`);

--
-- Indexes for table `tr_product_bedding_acc`
--
ALTER TABLE `tr_product_bedding_acc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `tr_product_bed_linen`
--
ALTER TABLE `tr_product_bed_linen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tr_product_bed_linen_ibfk_1` (`prod_id`);

--
-- Indexes for table `tr_product_best_seller`
--
ALTER TABLE `tr_product_best_seller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `tr_product_image`
--
ALTER TABLE `tr_product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_product_size`
--
ALTER TABLE `tr_product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `tr_product_spec`
--
ALTER TABLE `tr_product_spec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `spec_id` (`spec_id`);

--
-- Indexes for table `tr_special_package`
--
ALTER TABLE `tr_special_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_special_package` (`id_special_package`),
  ADD KEY `id_tr_prod_size` (`id_tr_prod_size`);

--
-- Indexes for table `tr_storeowner_special_package`
--
ALTER TABLE `tr_storeowner_special_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_special_package` (`id_special_package`),
  ADD KEY `id_store_owner` (`id_store_owner`);

--
-- Indexes for table `tr_store_owner_cluster`
--
ALTER TABLE `tr_store_owner_cluster`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_store` (`id_store`),
  ADD KEY `province` (`province`),
  ADD KEY `city` (`city`),
  ADD KEY `sub_district` (`sub_district`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mail_config`
--
ALTER TABLE `mail_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mail_queue`
--
ALTER TABLE `mail_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tm_agmpedia`
--
ALTER TABLE `tm_agmpedia`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tm_customer_detail`
--
ALTER TABLE `tm_customer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tm_forgot_pass`
--
ALTER TABLE `tm_forgot_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tm_newsletter`
--
ALTER TABLE `tm_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tm_order`
--
ALTER TABLE `tm_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tm_product`
--
ALTER TABLE `tm_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `tm_promotion`
--
ALTER TABLE `tm_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tm_review`
--
ALTER TABLE `tm_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_size`
--
ALTER TABLE `tm_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tm_slide`
--
ALTER TABLE `tm_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_spec`
--
ALTER TABLE `tm_spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tm_special_package`
--
ALTER TABLE `tm_special_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tm_store_owner`
--
ALTER TABLE `tm_store_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_super_admin`
--
ALTER TABLE `tm_super_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tm_voucher`
--
ALTER TABLE `tm_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tr_bonus_voucher`
--
ALTER TABLE `tr_bonus_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_order_detail`
--
ALTER TABLE `tr_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tr_product`
--
ALTER TABLE `tr_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tr_product_bedding_acc`
--
ALTER TABLE `tr_product_bedding_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tr_product_bed_linen`
--
ALTER TABLE `tr_product_bed_linen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tr_product_best_seller`
--
ALTER TABLE `tr_product_best_seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tr_product_image`
--
ALTER TABLE `tr_product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tr_product_size`
--
ALTER TABLE `tr_product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `tr_product_spec`
--
ALTER TABLE `tr_product_spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `tr_special_package`
--
ALTER TABLE `tr_special_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tr_storeowner_special_package`
--
ALTER TABLE `tr_storeowner_special_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tr_store_owner_cluster`
--
ALTER TABLE `tr_store_owner_cluster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  ADD CONSTRAINT `tr_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tm_product` (`id`),
  ADD CONSTRAINT `tr_product_ibfk_2` FOREIGN KEY (`id_product_size`) REFERENCES `tr_product_size` (`id`),
  ADD CONSTRAINT `tr_product_ibfk_3` FOREIGN KEY (`id_store`) REFERENCES `tm_store_owner` (`id`);

--
-- Constraints for table `tr_product_bedding_acc`
--
ALTER TABLE `tr_product_bedding_acc`
  ADD CONSTRAINT `tr_product_bedding_acc_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tm_product` (`id`);

--
-- Constraints for table `tr_product_bed_linen`
--
ALTER TABLE `tr_product_bed_linen`
  ADD CONSTRAINT `tr_product_bed_linen_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tm_product` (`id`);

--
-- Constraints for table `tr_product_best_seller`
--
ALTER TABLE `tr_product_best_seller`
  ADD CONSTRAINT `tr_product_best_seller_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tm_product` (`id`);

--
-- Constraints for table `tr_product_size`
--
ALTER TABLE `tr_product_size`
  ADD CONSTRAINT `tr_product_size_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tm_product` (`id`),
  ADD CONSTRAINT `tr_product_size_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `tm_size` (`id`);

--
-- Constraints for table `tr_product_spec`
--
ALTER TABLE `tr_product_spec`
  ADD CONSTRAINT `tr_product_spec_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tm_product` (`id`),
  ADD CONSTRAINT `tr_product_spec_ibfk_2` FOREIGN KEY (`spec_id`) REFERENCES `tm_spec` (`id`);

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
