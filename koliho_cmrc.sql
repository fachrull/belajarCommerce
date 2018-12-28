-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: koliho_cmrc
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tm_customer`
--

DROP TABLE IF EXISTS `tm_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_userlogin` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` text,
  `sub_district` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `postcode` varchar(25) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_customer`
--

LOCK TABLES `tm_customer` WRITE;
/*!40000 ALTER TABLE `tm_customer` DISABLE KEYS */;
INSERT INTO `tm_customer` VALUES (1,15,'dummy','customer2',NULL,'',NULL,NULL,NULL,'m',NULL),(2,3,'Frist','Customer','Jl. Durian No. H23 RT003/003 Kelapa Dua Wetan, Ciracas','','Jakarta Timur','DKI Jakarta','13730','m','02187701150'),(3,16,'customer','coba',NULL,'',NULL,NULL,NULL,'m',NULL);
/*!40000 ALTER TABLE `tm_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_store_owner`
--

DROP TABLE IF EXISTS `tm_store_owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_store_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_store_owner`
--

LOCK TABLES `tm_store_owner` WRITE;
/*!40000 ALTER TABLE `tm_store_owner` DISABLE KEYS */;
INSERT INTO `tm_store_owner` VALUES (1,4,'PT First Company','JL. Akses UI No.123','Kelapa Dua','Depok','Jawa Barat','16451',NULL,NULL,'First');
/*!40000 ALTER TABLE `tm_store_owner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_super_admin`
--

DROP TABLE IF EXISTS `tm_super_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_super_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_userlogin` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_super_admin`
--

LOCK TABLES `tm_super_admin` WRITE;
/*!40000 ALTER TABLE `tm_super_admin` DISABLE KEYS */;
INSERT INTO `tm_super_admin` VALUES (1,5,'First','Admin','02198761234'),(2,2,'Super','Admin','02112345678');
/*!40000 ALTER TABLE `tm_super_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `user_type` int(11) DEFAULT NULL,
  `newer` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_login`
--

LOCK TABLES `user_login` WRITE;
/*!40000 ALTER TABLE `user_login` DISABLE KEYS */;
INSERT INTO `user_login` VALUES (2,'superAdmin','$2y$10$go/at5f32Z8ll84Kjk3TU.v2.Zcox5Lo/KHSnHxGBP//r9wWr4P22','super.admin@keraton.com',1,0),(3,'dummyCS','$2y$10$go/at5f32Z8ll84Kjk3TU.v2.Zcox5Lo/KHSnHxGBP//r9wWr4P22','dummy@koliho.com',4,0),(4,'dummyStr','$2y$10$go/at5f32Z8ll84Kjk3TU.v2.Zcox5Lo/KHSnHxGBP//r9wWr4P22','dummystr@koliho.com',3,0),(5,'admin','$2y$10$go/at5f32Z8ll84Kjk3TU.v2.Zcox5Lo/KHSnHxGBP//r9wWr4P22','admin@keraton.com',2,0),(15,'dummyCS2','$2y$10$go/at5f32Z8ll84Kjk3TU.v2.Zcox5Lo/KHSnHxGBP//r9wWr4P22','dummycs2@koliho.com',4,0),(16,'customer','$2y$10$go/at5f32Z8ll84Kjk3TU.v2.Zcox5Lo/KHSnHxGBP//r9wWr4P22','customer@koliho.com',4,0);
/*!40000 ALTER TABLE `user_login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-29  1:04:38
