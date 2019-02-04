-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2019 at 06:44 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(29, 'dummy', '$2y$10$6OLUFwLTmS2maUqXsIG.FOH8//BUfe3zAxikWqzTNkqmFWtbfRmyq', 'dummySA@email.com', 1, 1, 2),
(32, 'agmJDC', '$2y$10$ypn0tqqvhahBZX5E3H2.ye.ewV6SxDlkeZrt7prrBeLnKUuZX9dky', 'agm.jdc@email.com', 3, 0, 2),
(33, 'agmSimpruk', '$2y$10$jkK2KE1kCW8oKSTjqid1B..c0gOKptpwu3GTcZ23LqrtJwevDBIay', 'agm.simpruk@email.com', 3, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
