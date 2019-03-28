-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 04:25 PM
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
-- Table structure for table `tm_agmpedia`
--

DROP TABLE IF EXISTS `tm_agmpedia`;
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
(1, 'Cara Merawat Bed Linen', 'Bed linen memiliki bahan yang unik sehingga cara perawatannya berbeda dengan bahan lainnya.', '<p style=\"text-align: justify;\">Bed linen atau sprei merupakan bahan yang unik serta memiliki karakteristik tersendiri yang tidak bisa disamakan cara perawatannya dengan bahan lain, untuk itu sangat disarankan untuk mengikuti tips cara merawat kain linen dibawah ini untuk menghindari kesalahan yang akan mengakibatkan kain linen anda rusak.</p>\n<ol style=\"text-align: justify;\">\n<li>Perhatikan label yang tertera pada kain.</li>\n<li>Gunakan Deterjen atau sabun pencuci yang memiliki tekstur lembut.</li>\n<li>Gunakan air dengan suhu sedang tidak terlalu dingin dan juga tidak terlalu panas agar tidak merusak serat kain.</li>\n<li>Pastikan tidak ada sabun atau busa yang masih menempel pada kain setelah pencucian. Karena jika tidak, dapat mengakibatkan oksidasi yang membuat kain kotor dan sulit dihilangkan.</li>\n<li>Gunakan putaran <em>gentle cycle</em> atau putaran yang lembut jika mencuci menggunakan mesin.</li>\n<li>Jangan mencampur kain sprei dengan bahan lain dan jangan direndam terlalu lama.</li>\n<li>Keringkan kain di lokasi yang memiliki sinar matahari merata namun tidak terlalu terik dengan bagian dalam kain menghadap matahari.</li>\n<li>Setrikalah kain linen pada suhu 204 – 218 derajat celcius (atau cari tombol khusus Linen pada setrika Anda) di bagian dalam terlebih dahulu, kemudian dilanjutkan dengan bagian luar agar kain terlihat berkilau, gantungkan selama lima menit sebelum dimasukkan ke lemari agar tidak mudah kusut.</li>\n<li>Hindari penyimpanan di tempat yang dapat menimbulkan jamur.</li>\n</ol>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">Dengan perawatan yang baik dan benar, bed linen akan memberikan kenyamanan tidur sempurna yang lebih lama untuk istirahat malam Anda. Selamat mencoba! .</p>', '2019-01-23', 0x30315f616972656c6f6f6d5f696d70657269616c2d68657269746167652e6a7067, 0x312e6a7067, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tm_brands`
--

DROP TABLE IF EXISTS `tm_brands`;
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

DROP TABLE IF EXISTS `tm_category`;
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

DROP TABLE IF EXISTS `tm_customer`;
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

DROP TABLE IF EXISTS `tm_customer_detail`;
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
(3, 40, 'fachrul', 'fandi', 'm', 'fachrul@email.com', '085712345678', 'Jl. Tidak Sesama No.321', '31', '3174', '317403', '12780', 1),
(5, 40, 'fachrul', 'fandi', 'm', 'dummystr@koliho.com', '2188877665', 'Jl. Sesama No. 123', '31', '3174', '317403', '12345678', 0),
(8, 40, 'fachrul', 'fandiw', 'm', 'fachrul@email.com', '08571234567', 'Jl. Tidak Sesama No.321', '31', '3174', '317403', '12780', 0),
(13, 40, 'Fachrul', 'Fandi', 'm', 'fachrul@email.com', '085712345678', 'Jl. Sesama No. 123', '31', '3174', '317403', '12780', 0),
(14, 42, 'fandi', 'wiradhika', 'm', 'fandi@email.com', '085787654321', 'Jl. Sesama No. 123', '31', '3174', '317403', '12780', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_order`
--

DROP TABLE IF EXISTS `tm_order`;
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
(49, 'AGM080319125', 15, '1000000', '2019-03-08 15:46:48', 1, 2, NULL),
(50, 'AGM130319922', 40, '1000000', '2019-03-13 16:14:44', 5, 2, NULL),
(51, 'AGM150319549', 40, '1000000', '2019-03-15 15:36:50', 3, 2, NULL),
(54, 'AGM180319857', 40, '3000000', '2019-03-18 00:51:11', 8, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_product`
--

DROP TABLE IF EXISTS `tm_product`;
CREATE TABLE `tm_product` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_product`
--

INSERT INTO `tm_product` (`id`, `brand_id`, `cat_id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Imperial Heritage', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x616972656c6f6f6d2d6d617474726573732d696d70657269616c5f68657269746167652e6a7067, '2019-01-14 17:00:00', '2019-03-20 12:43:18'),
(2, 1, 1, 'Royal Souverign', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x616972656c6f6f6d2d6d617474726573732d726f79616c5f736f7576657269676e2e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:18'),
(3, 1, 1, 'Coronation', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x616972656c6f6f6d2d6d617474726573732d636f726f6e6174696f6e2e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:18'),
(4, 1, 1, 'Baron', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x616972656c6f6f6d2d6d617474726573732d6261726f6e2e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:18'),
(5, 2, 1, 'Antoinette', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d616e746f696e657474652e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:18'),
(6, 2, 1, 'Cordelia', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d636f7264656c69612e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:18'),
(7, 2, 1, 'Ernestine', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d65726e657374696e652e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19'),
(8, 2, 1, 'Harriett', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d68617272696574742e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19'),
(9, 2, 1, 'Granville', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d6772616e76696c6c652e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19'),
(10, 2, 1, 'Ophelia', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d6f7068656c69612e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19'),
(11, 2, 1, 'Suite Palais', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d73756974655f70616c6169732e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19'),
(12, 2, 1, 'Suite Ambassadeur', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d73756974655f616d6261737361646575722e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19'),
(13, 2, 1, 'Suite Viceroy', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573732d73756974655f76696365726f792e6a7067, '2019-01-15 17:00:00', '2019-03-20 12:43:19'),
(16, 2, 2, 'Harvey (Embroidery White)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6265645f6c696e656e2d6861727665795f28656d62726f69646572795f7768697465292e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:19'),
(17, 2, 2, 'Madolva White', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6265645f6c696e656e2d6d61646f6c76615f77686974652e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:19'),
(18, 2, 2, 'Madolva Red', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6265645f6c696e656e2d6d61646f6c76615f7265642e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:19'),
(19, 2, 2, 'Avecca Peach', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6265645f6c696e656e2d6176656363615f70656163682e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:19'),
(20, 2, 2, 'Avecca Ivory', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6265645f6c696e656e2d6176656363615f69766f72792e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20'),
(21, 2, 3, 'Royale Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d726f79616c655f70696c6c6f772e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20'),
(22, 2, 3, 'Nano Fiber Pillow Firm', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d6e616e6f5f66696265725f70696c6c6f775f6669726d2e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20'),
(23, 2, 3, 'Nano Fiber Pillow Soft', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d6e616e6f5f66696265725f70696c6c6f775f736f66742e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20'),
(24, 2, 2, 'Nano King Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6265645f6c696e656e2d6e616e6f5f6b696e675f70696c6c6f772e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20'),
(25, 2, 3, 'Aero Spring Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d6165726f5f737072696e675f70696c6c6f772e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20'),
(26, 2, 3, 'Nano Down Chamber Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d6e616e6f5f646f776e5f6368616d6265725f70696c6c6f772e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20'),
(27, 2, 3, 'Down Pillow Soft Feather', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d646f776e5f70696c6c6f775f736f66745f666561746865722e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20'),
(28, 2, 3, 'Down Pillow Sandwich', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d646f776e5f70696c6c6f775f73616e64776963682e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20'),
(30, 2, 3, 'Point To Point Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d70696c6c6f772d706f696e745f746f5f706f696e745f70696c6c6f772e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20'),
(31, 2, 4, 'Royale Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d626f6c737465722d726f79616c655f626f6c737465722e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20'),
(32, 2, 4, 'Nano Fiber Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d626f6c737465722d6e616e6f5f66696265725f626f6c737465722e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:20'),
(34, 2, 5, 'Light Quilt Dacron', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d7175696c742d6c696768745f7175696c745f646163726f6e2e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:21'),
(35, 2, 5, 'Light Quilt Nano', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d7175696c742d6c696768745f7175696c745f6e616e6f2e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:21'),
(37, 2, 6, 'Mattress Protector Dacron', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573735f70726f746563746f722d6d617474726573735f70726f746563746f725f646163726f6e2e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:21'),
(38, 2, 6, 'Mattress Protector Waterproof', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x6b696e676b6f696c2d6d617474726573735f70726f746563746f722d6d617474726573735f70726f746563746f725f776174657270726f6f662e6a7067, '2019-01-29 17:00:00', '2019-03-20 12:43:21'),
(39, 4, 1, 'Grand Althea', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d6772616e645f616c746865612e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(40, 4, 1, 'Saveria', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d736176657269612e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(43, 4, 1, 'Isadore', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d697361646f72652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(44, 4, 1, 'Ellinor', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d656c6c696e6f722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(45, 4, 1, 'Spine-X', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d7370696e652d782e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(46, 4, 1, 'Eudocia Suite', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d6575646f6369615f73756974652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(47, 4, 1, 'Eudora Suite', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d6575646f72615f73756974652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(48, 4, 1, 'Hermione', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6d617474726573732d6865726d696f6e652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(50, 4, 2, 'Pasquele (COT SILK)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d7061737175656c655f28636f745f73696c6b292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(51, 4, 2, 'Radcliff Grey (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d726164636c6966665f677265795f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(52, 4, 2, 'Radcliff Light Grey (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d726164636c6966665f6c696768745f677265795f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(53, 4, 2, 'Radcliff White (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d726164636c6966665f77686974655f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(54, 4, 2, 'Harnell Sand Rose (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d6861726e656c6c5f73616e645f726f73655f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(55, 4, 2, 'Harnell Raspberry Red (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d6861726e656c6c5f7261737062657272795f7265645f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(56, 4, 2, 'Marshall Turquoise (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d6d61727368616c6c5f74757271756f6973655f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(57, 4, 2, 'Marshall Silver (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d6d61727368616c6c5f73696c7665725f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(58, 4, 2, 'Marshall White (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d6265645f6c696e656e2d6d61727368616c6c5f77686974655f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(59, 4, 3, 'Ball Fiber Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d70696c6c6f772d62616c6c5f66696265725f70696c6c6f772e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(60, 4, 3, 'Long Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d70696c6c6f772d6c6f6e675f70696c6c6f772e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(61, 4, 3, 'Nano Gel Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d70696c6c6f772d6e616e6f5f67656c5f70696c6c6f772e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(62, 4, 3, 'Down Pillow Sandwich ', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d70696c6c6f772d646f776e5f70696c6c6f775f73616e64776963685f2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(66, 4, 4, 'Ball Fiber Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d626f6c737465722d62616c6c5f66696265725f626f6c737465722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(67, 4, 4, 'Nano Gel Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d626f6c737465722d6e616e6f5f67656c5f626f6c737465722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(69, 4, 5, 'Light Quilt Dacron', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d7175696c742d6c696768745f7175696c745f646163726f6e2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(70, 4, 5, 'Light Quilt Nano', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x73657274612d7175696c742d6c696768745f7175696c745f6e616e6f2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(74, 5, 1, 'Contour Supreme with Cool Touch', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d636f6e746f75725f73757072656d655f776974685f636f6f6c5f746f7563682e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(75, 5, 1, 'Contour Elite with Cool Touch', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d636f6e746f75725f656c6974655f776974685f636f6f6c5f746f7563682e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(76, 5, 1, 'Sensation Supreme with Cool Touch', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d73656e736174696f6e5f73757072656d655f776974685f636f6f6c5f746f7563682e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(77, 5, 1, 'Sensation Elite with Cool Touch', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d73656e736174696f6e5f656c6974655f776974685f636f6f6c5f746f7563682e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(78, 5, 1, 'Tempur Flex 500', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d74656d7075725f666c65785f3530302e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:23'),
(79, 5, 1, 'Tempur Flex 2000', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d74656d7075725f666c65785f323030302e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(80, 5, 1, 'Tempur Flex 4000', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d6d617474726573732d74656d7075725f666c65785f343030302e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(81, 5, 3, 'Original Pillow (S, M, L, XL)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d70696c6c6f772d6f726967696e616c5f70696c6c6f775f28732c5f6d2c5f6c2c5f786c292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(82, 5, 3, 'Original Pillow Queen (M, L, XL)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d70696c6c6f772d6f726967696e616c5f70696c6c6f775f717565656e5f286d2c5f6c2c5f786c292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(83, 5, 3, 'Millernium Pillow (S, M, L, XL)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d70696c6c6f772d6d696c6c65726e69756d5f70696c6c6f775f28732c5f6d2c5f6c2c5f786c292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(84, 5, 3, 'Millernium Pillow Queen (M, L, XL)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x74656d7075722d70696c6c6f772d6d696c6c65726e69756d5f70696c6c6f775f717565656e5f286d2c5f6c2c5f786c292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(85, 3, 1, 'Medicci', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d6d6564696363692e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(86, 3, 1, 'Fossano', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d666f7373616e6f2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(87, 3, 1, 'Messina', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d6d657373696e612e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(88, 3, 1, 'Riccione', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d72696363696f6e652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(89, 3, 1, 'Vinitto', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d76696e6974746f2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(90, 3, 1, 'Vecchia', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d766563636869612e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(91, 3, 1, 'Soft Cloud', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d736f66745f636c6f75642e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(92, 3, 1, 'Ecicitato', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6d617474726573732d65636963697461746f2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(93, 3, 3, 'Castrociello', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d70696c6c6f772d63617374726f6369656c6c6f2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(96, 3, 2, 'Bernadette Red (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d6265726e6164657474655f7265645f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(97, 3, 2, 'Bernadette Yellow (JQ SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d6265726e6164657474655f79656c6c6f775f286a715f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(98, 3, 2, 'Avery Aruba Blue (JQ TC)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d61766572795f61727562615f626c75655f286a715f7463292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(99, 3, 2, 'Avery White (JQ TC)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d61766572795f77686974655f286a715f7463292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(100, 3, 2, 'Milva (PRINT SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d6d696c76615f287072696e745f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(101, 3, 2, 'Leika (PRINT SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d6c65696b615f287072696e745f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:21'),
(102, 3, 2, 'Jervois (PRINT SATEEN)', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d6265645f6c696e656e2d6a6572766f69735f287072696e745f73617465656e292e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(103, 3, 3, 'Lyocel Embossed Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d70696c6c6f772d6c796f63656c5f656d626f737365645f70696c6c6f772e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(104, 3, 3, 'Filler Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d70696c6c6f772d66696c6c65725f70696c6c6f772e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(105, 3, 3, 'Fiber Gel Pillow', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d70696c6c6f772d66696265725f67656c5f70696c6c6f772e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(106, 3, 4, 'Lyocel Embossed Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d626f6c737465722d6c796f63656c5f656d626f737365645f626f6c737465722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(107, 3, 4, 'Filler Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d626f6c737465722d66696c6c65725f626f6c737465722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(108, 3, 4, 'Fiber Gel Bolster', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d626f6c737465722d66696265725f67656c5f626f6c737465722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(109, 3, 5, 'Light Quilt Dacron', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d7175696c742d6c696768745f7175696c745f646163726f6e2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(110, 3, 5, 'Light Quilt Fiber Gel', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d7175696c742d6c696768745f7175696c745f66696265725f67656c2e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(115, 6, NULL, 'Consul Classic LegComfort', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d636f6e73756c5f636c61737369635f6c6567636f6d666f72742e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(116, 6, NULL, 'Reno Signature Chair', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d72656e6f5f7369676e61747572655f63686169722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(117, 6, NULL, 'Sunrise Classic LegComfort', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d73756e726973655f636c61737369635f6c6567636f6d666f72742e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(118, 3, NULL, 'View Signature Chair', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x666c6f72656e63652d2d766965775f7369676e61747572655f63686169722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:22'),
(119, 6, NULL, 'Magic Classic LegComfort', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d6d616769635f636c61737369635f6c6567636f6d666f72742e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(120, 6, NULL, 'Mayfair Signature Chair', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d6d6179666169725f7369676e61747572655f63686169722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24');
INSERT INTO `tm_product` (`id`, `brand_id`, `cat_id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(121, 6, NULL, 'Metro Chair High Back Std Base', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d6d6574726f5f63686169725f686967685f6261636b5f7374645f626173652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(122, 6, NULL, 'Metro Chair Low Back Std Base', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d6d6574726f5f63686169725f6c6f775f6261636b5f7374645f626173652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(123, 6, NULL, 'Skyline Classic Chair', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d736b796c696e655f636c61737369635f63686169722e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(124, 6, NULL, 'City Chair High Back Std Base', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d636974795f63686169725f686967685f6261636b5f7374645f626173652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(125, 6, NULL, 'City Chair Low Back Standard Base', '<p>This elegant mattress is a symbol of perfection. Royal Sovereign® is made with Super Pillow Top® and completed with cashmere, wool and 4cm Talalay® latex layer, to provide you with unparalleled comfort. The 20cm pocket spring system not only brings you the unmatched support your body desires but also respomsive to body movement.</p>', 0x7374726573736c6573732d2d636974795f63686169725f6c6f775f6261636b5f7374616e646172645f626173652e6a7067, '2019-01-30 17:00:00', '2019-03-20 12:43:24'),
(127, 4, 2, 'Dummy', '<p>Lorem Ipsum</p>\r\n', 0x73657274612d6265645f6c696e656e2d64756d6d792e706e67, '2019-02-11 17:00:00', '2019-03-20 12:43:23'),
(129, 3, 3, 'Test Product', '<p>Deskripsi Product Test</p>\r\n', 0x666c6f72656e63652d70696c6c6f772d746573745f70726f647563742e6a7067, '2019-02-26 17:00:00', '2019-03-20 12:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `tm_promotion`
--

DROP TABLE IF EXISTS `tm_promotion`;
CREATE TABLE `tm_promotion` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` blob NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tm_review`
--

DROP TABLE IF EXISTS `tm_review`;
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

DROP TABLE IF EXISTS `tm_size`;
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

DROP TABLE IF EXISTS `tm_slide`;
CREATE TABLE `tm_slide` (
  `id` int(11) NOT NULL,
  `slide` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cover` char(1) NOT NULL COMMENT '1 = header, 2 = best seller, 3 = special package, 4 = bed linen, 5 = bedding acc'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_slide`
--

INSERT INTO `tm_slide` (`id`, `slide`, `created_at`, `updated_at`, `cover`) VALUES
(3, 0x312e6a7067, '2019-01-14 17:00:00', '2019-03-26 14:09:20', '1'),
(5, 0x626573742d73656c6c65722d636f7665722d356339613364386238386532392e6a7067, '2019-03-25 17:00:00', '2019-03-26 14:56:11', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tm_spec`
--

DROP TABLE IF EXISTS `tm_spec`;
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

DROP TABLE IF EXISTS `tm_special_package`;
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
(7, 'Test Special Package', 0x7370656369616c5f7061636b6167652d746573745f7370656369616c5f7061636b6167652e6a7067, '<p>Special Package Description</p>\r\n', '1', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `tm_status_order`
--

DROP TABLE IF EXISTS `tm_status_order`;
CREATE TABLE `tm_status_order` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tm_store_owner`
--

DROP TABLE IF EXISTS `tm_store_owner`;
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
  `langtitude` double DEFAULT NULL,
  `postcode` varchar(25) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `id_super_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_store_owner`
--

INSERT INTO `tm_store_owner` (`id`, `id_userlogin`, `company_name`, `address`, `address2`, `sub_district`, `city`, `province`, `latitude`, `langtitude`, `postcode`, `phone1`, `fax`, `id_super_admin`) VALUES
(1, 36, 'AGM JDC', 'Jl. Gatot Subroto No. 53, Jakarta Design Center Lantai 4 - 4SR081', 'Jakarta Design Center Lantai 4 - 4SR081', '317403', '3174', '31', -6.201671, 106.80097, '12780', '0215720533', '', 2),
(2, 37, 'AGM Simpruk', 'Jl. Teuku Nyak Arief, Simpruk Garden Raya Blok G No.1, Permata Hijau', 'Jakarta Design Center Lantai 4 - 4SR081', '317405', '3174', '31', -6.234099, 106.786999, '12220', '0217254363', '', 2),
(3, 38, 'AGM Emporium Pluit Mall', 'Jl. Pluit Selatan Raya No.5', 'Emporim Mall Pluit Lantai 3-23, 3-25, 3-26', '317201', '3172', '31', -6.127242, 106.790272, '14440', '02166676278', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tm_super_admin`
--

DROP TABLE IF EXISTS `tm_super_admin`;
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
(14, 29, 'dummy', 'superadmin', '088991122334');

-- --------------------------------------------------------

--
-- Table structure for table `tm_voucher`
--

DROP TABLE IF EXISTS `tm_voucher`;
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
(7, 'AGM_VCR0001', 'Voucher Pertama', '<p>Test Voucher Pertama</p>\r\n', 2, '0.70', 100, 1),
(8, 'AGM_VCR0001', 'Voucher Pertama', '<p>Test Voucher Pertama</p>\r\n', 8, '0.70', 100, 1),
(9, 'AGM_VCR0001', 'Voucher Pertama', '<p>Test Voucher Pertama</p>\r\n', 20, '0.70', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_bonus_voucher`
--

DROP TABLE IF EXISTS `tr_bonus_voucher`;
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

DROP TABLE IF EXISTS `tr_order_detail`;
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
(7, 54, 5, 3, 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product`
--

DROP TABLE IF EXISTS `tr_product`;
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
(4, 1, 45, 77, 4, 0, 2),
(5, 1, 45, 78, 4, 0, 2),
(9, 1, 30, 46, 4, 0, 2),
(10, 1, 30, 45, 7, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_bedding_acc`
--

DROP TABLE IF EXISTS `tr_product_bedding_acc`;
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

DROP TABLE IF EXISTS `tr_product_bed_linen`;
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
(4, 16, '3', 1),
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
(26, 127, '5', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_best_seller`
--

DROP TABLE IF EXISTS `tr_product_best_seller`;
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
(106, 125, '5', 106);

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_size`
--

DROP TABLE IF EXISTS `tr_product_size`;
CREATE TABLE `tr_product_size` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_product_size`
--

INSERT INTO `tr_product_size` (`id`, `prod_id`, `size_id`, `price`) VALUES
(1, 1, 4, '1000000'),
(2, 2, 3, '1000000'),
(3, 3, 5, '1000000'),
(4, 4, 2, '1000000'),
(5, 5, 1, '1000000'),
(6, 6, 2, '1000000'),
(7, 7, 5, '1000000'),
(8, 8, 4, '1000000'),
(9, 9, 2, '1000000'),
(10, 10, 5, '1000000'),
(11, 11, 3, '1000000'),
(12, 12, 1, '1000000'),
(13, 13, 5, '1000000'),
(17, 16, 1, '1000000'),
(18, 16, 3, '2000000'),
(19, 17, 1, '1000000'),
(20, 17, 3, '2000000'),
(21, 18, 1, '1000000'),
(22, 18, 3, '2000000'),
(23, 19, 3, '1000000'),
(24, 19, 5, '2000000'),
(25, 20, 3, '1000000'),
(26, 20, 4, '2000000'),
(27, 21, 5, '1000000'),
(28, 21, 5, '2000000'),
(29, 22, 3, '1000000'),
(30, 22, 4, '2000000'),
(31, 23, 3, '1000000'),
(32, 23, 4, '2000000'),
(33, 24, 1, '1000000'),
(34, 24, 2, '2000000'),
(35, 25, 2, '1000000'),
(36, 25, 4, '2000000'),
(37, 26, 3, '1000000'),
(38, 26, 5, '2000000'),
(39, 27, 2, '1000000'),
(40, 27, 5, '2000000'),
(41, 28, 4, '1000000'),
(42, 28, 5, '2000000'),
(45, 30, 1, '1000000'),
(46, 30, 4, '2000000'),
(47, 31, 2, '1000000'),
(48, 31, 4, '2000000'),
(49, 32, 3, '1000000'),
(50, 32, 2, '2000000'),
(53, 34, 3, '1000000'),
(54, 34, 2, '2000000'),
(55, 35, 2, '1000000'),
(56, 35, 3, '2000000'),
(59, 37, 2, '1000000'),
(60, 37, 3, '2000000'),
(61, 38, 1, '1000000'),
(62, 38, 3, '2000000'),
(63, 39, 2, '1000000'),
(64, 39, 3, '2000000'),
(65, 40, 2, '1000000'),
(66, 40, 4, '2000000'),
(73, 43, 1, '1000000'),
(74, 43, 3, '2000000'),
(75, 44, 2, '1000000'),
(76, 44, 3, '2000000'),
(77, 45, 2, '1000000'),
(78, 45, 4, '22222222'),
(79, 46, 2, '1000000'),
(80, 46, 4, '2000000'),
(81, 47, 1, '1000000'),
(82, 47, 4, '2000000'),
(83, 48, 2, '1000000'),
(84, 48, 4, '2000000'),
(87, 50, 2, '1000000'),
(88, 50, 4, '2000000'),
(89, 51, 3, '1000000'),
(90, 51, 5, '2000000'),
(91, 52, 2, '10000000'),
(92, 52, 5, '2000000'),
(93, 53, 3, '1000000'),
(94, 53, 4, '2000000'),
(95, 54, 1, '1000000'),
(96, 54, 4, '2000000'),
(97, 55, 1, '1000000'),
(98, 55, 3, '2000000'),
(99, 56, 2, '1000000'),
(100, 56, 1, '2000000'),
(101, 57, 4, '1000000'),
(102, 58, 2, '1000000'),
(103, 58, 4, '2000000'),
(104, 59, 2, '1000000'),
(105, 59, 4, '2000000'),
(106, 60, 4, '1000000'),
(107, 60, 5, '2000000'),
(108, 61, 4, '1000000'),
(109, 61, 5, '2000000'),
(110, 28, 2, '1000000'),
(111, 28, 5, '2000000'),
(118, 66, 2, '1000000'),
(119, 66, 4, '2000000'),
(120, 67, 3, '1000000'),
(121, 67, 5, '2000000'),
(124, 34, 2, '1000000'),
(125, 34, 4, '2000000'),
(126, 35, 4, '1000000'),
(127, 35, 5, '2000000'),
(130, 37, 4, '1000000'),
(131, 37, 4, '2000000'),
(132, 38, 4, '1000000'),
(133, 38, 5, '2000000'),
(134, 74, 4, '1000000'),
(135, 74, 3, '2000000'),
(136, 75, 3, '1000000'),
(137, 75, 5, '2000000'),
(138, 76, 4, '1000000'),
(139, 76, 5, '2000000'),
(140, 77, 4, '10000000'),
(141, 77, 5, '20000000'),
(142, 78, 3, '1000000'),
(143, 78, 5, '2000000'),
(144, 79, 3, '1000000'),
(145, 79, 4, '4000000'),
(146, 80, 3, '1000000'),
(147, 80, 5, '2000000'),
(148, 81, 4, '1000000'),
(149, 81, 5, '2000000'),
(150, 82, 3, '1000000'),
(151, 82, 5, '2000000'),
(152, 83, 4, '1000000'),
(153, 83, 2, '2000000'),
(154, 84, 4, '1000000'),
(155, 84, 2, '2000000'),
(156, 85, 1, '1000000'),
(157, 85, 3, '2000000'),
(158, 86, 3, '1000000'),
(159, 86, 4, '2000000'),
(160, 86, 3, '1000000'),
(161, 86, 4, '2000000'),
(162, 87, 2, '1000000'),
(163, 87, 4, '2000000'),
(164, 88, 2, '1000000'),
(165, 88, 3, '2000000'),
(166, 89, 4, '1000000'),
(167, 89, 5, '2000000'),
(168, 90, 3, '1000000'),
(169, 90, 1, '2000000'),
(170, 91, 2, '1000000'),
(171, 91, 1, '2000000'),
(172, 92, 2, '1000000'),
(173, 92, 4, '2000000'),
(174, 93, 1, '1000000'),
(175, 93, 5, '2000000'),
(182, 96, 1, '1000000'),
(183, 96, 3, '2000000'),
(184, 97, 2, '1000000'),
(185, 97, 1, '2000000'),
(186, 98, 1, '1000000'),
(187, 98, 2, '2000000'),
(188, 99, 2, '1000000'),
(189, 99, 4, '2000000'),
(190, 100, 3, '1000000'),
(191, 100, 4, '2000000'),
(192, 101, 2, '1000000'),
(193, 101, 4, '2000000'),
(194, 102, 2, '1000000'),
(195, 102, 2, '2000000'),
(196, 103, 1, '1000000'),
(197, 103, 3, '2000000'),
(198, 104, 1, '1000000'),
(199, 104, 3, '2000000'),
(200, 105, 3, '1000000'),
(201, 105, 4, '2000000'),
(202, 106, 3, '1000000'),
(203, 106, 4, '2000000'),
(204, 107, 2, '1000000'),
(205, 107, 4, '2000000'),
(206, 108, 1, '1000000'),
(207, 108, 3, '2000000'),
(208, 34, 2, '1000000'),
(209, 34, 5, '2000000'),
(210, 110, 3, '1000000'),
(211, 110, 4, '2000000'),
(212, 37, 1, '1000000'),
(213, 37, 4, '2000000'),
(214, 38, 4, '1000000'),
(215, 38, 5, '2000000'),
(219, 115, 3, '1000000'),
(220, 115, 5, '2000000'),
(221, 116, 1, '1000000'),
(222, 116, 5, '2000000'),
(223, 117, 2, '1000000'),
(224, 117, 5, '2000000'),
(225, 118, 2, '1000000'),
(226, 118, 4, '2000000'),
(227, 119, 3, '1000000'),
(228, 119, 5, '2000000'),
(229, 120, 2, '1000000'),
(230, 120, 4, '2000000'),
(231, 121, 3, '1000000'),
(232, 121, 5, '2000000'),
(233, 122, 3, '1000000'),
(234, 122, 4, '2000000'),
(235, 123, 2, '1000000'),
(236, 123, 1, '2000000'),
(237, 124, 4, '1000000'),
(238, 124, 2, '2000000'),
(239, 125, 3, '1000000'),
(240, 125, 2, '2000000'),
(243, 127, 1, '100'),
(244, 127, 2, '1000'),
(247, 129, 1, '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `tr_product_spec`
--

DROP TABLE IF EXISTS `tr_product_spec`;
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
(89, 45, 4),
(90, 45, 6),
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
(231, 106, 4),
(232, 106, 19),
(233, 107, 6),
(234, 107, 24),
(235, 108, 34),
(236, 108, 47),
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
(285, 129, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tr_special_package`
--

DROP TABLE IF EXISTS `tr_special_package`;
CREATE TABLE `tr_special_package` (
  `id` int(11) NOT NULL,
  `id_special_package` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_special_package`
--

INSERT INTO `tr_special_package` (`id`, `id_special_package`, `id_product`) VALUES
(4, 7, 2),
(5, 7, 7),
(6, 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tr_storeowner_special_package`
--

DROP TABLE IF EXISTS `tr_storeowner_special_package`;
CREATE TABLE `tr_storeowner_special_package` (
  `id` int(11) NOT NULL,
  `id_special_package` int(11) NOT NULL,
  `id_store_owner` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_store_owner_cluster`
--

DROP TABLE IF EXISTS `tr_store_owner_cluster`;
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

DROP TABLE IF EXISTS `user_login`;
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
(40, 'fachrul', '$2y$10$dVMsMIUSpeYVmzKWsIIh2e2/VeaAP87wkDr4WvmshYDSdRxerodaO', 'fachrul@email.com', 4, 0, NULL),
(42, 'fandi', '$2y$10$ib6SwmQ7CI3.ljYEa/QzR.XempU8pczfVU10dLUvM/nrXWhH/XTk2', 'fandi@email.com', 4, 0, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tm_customer_detail`
--
ALTER TABLE `tm_customer_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`),
  ADD KEY `id_userlogin` (`id_userlogin`),
  ADD KEY `province` (`province`),
  ADD KEY `sub_district` (`sub_district`);

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
  ADD KEY `tr_special_package_ibfk_2` (`id_product`);

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
-- AUTO_INCREMENT for table `tm_customer_detail`
--
ALTER TABLE `tm_customer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tm_order`
--
ALTER TABLE `tm_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tm_product`
--
ALTER TABLE `tm_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `tm_size`
--
ALTER TABLE `tm_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tm_slide`
--
ALTER TABLE `tm_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tm_spec`
--
ALTER TABLE `tm_spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tm_special_package`
--
ALTER TABLE `tm_special_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tm_store_owner`
--
ALTER TABLE `tm_store_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_super_admin`
--
ALTER TABLE `tm_super_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tm_voucher`
--
ALTER TABLE `tm_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tr_bonus_voucher`
--
ALTER TABLE `tr_bonus_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_order_detail`
--
ALTER TABLE `tr_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tr_product`
--
ALTER TABLE `tr_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tr_product_bedding_acc`
--
ALTER TABLE `tr_product_bedding_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tr_product_bed_linen`
--
ALTER TABLE `tr_product_bed_linen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tr_product_best_seller`
--
ALTER TABLE `tr_product_best_seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tr_product_size`
--
ALTER TABLE `tr_product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `tr_product_spec`
--
ALTER TABLE `tr_product_spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `tr_special_package`
--
ALTER TABLE `tr_special_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tr_storeowner_special_package`
--
ALTER TABLE `tr_storeowner_special_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_store_owner_cluster`
--
ALTER TABLE `tr_store_owner_cluster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `tr_special_package`
--
ALTER TABLE `tr_special_package`
  ADD CONSTRAINT `tr_special_package_ibfk_1` FOREIGN KEY (`id_special_package`) REFERENCES `tm_special_package` (`id`),
  ADD CONSTRAINT `tr_special_package_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `tm_product` (`id`);

--
-- Constraints for table `tr_storeowner_special_package`
--
ALTER TABLE `tr_storeowner_special_package`
  ADD CONSTRAINT `tr_storeowner_special_package_ibfk_1` FOREIGN KEY (`id_special_package`) REFERENCES `tm_special_package` (`id`),
  ADD CONSTRAINT `tr_storeowner_special_package_ibfk_2` FOREIGN KEY (`id_store_owner`) REFERENCES `tm_store_owner` (`id`);

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
