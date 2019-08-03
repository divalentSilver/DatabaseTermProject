-- MySQL dump 10.15  Distrib 10.0.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db2017320143
-- ------------------------------------------------------
-- Server version	10.0.38-MariaDB-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `cust_id` int(10) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(40) NOT NULL,
  `cust_mobile` char(15) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'이가은','010-5672-9384'),(2,'한가인','010-5678-9673'),(3,'김제니','010-2019-0523'),(5,'이수지','010-3456-3847'),(6,'최우성','010-0000-0000');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manager` (
  `mgr_id` int(10) NOT NULL AUTO_INCREMENT,
  `mgr_name` varchar(40) NOT NULL,
  `mgr_mobile` char(15) NOT NULL,
  `mgr_town` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`mgr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (2,'지익원','01047384950','동작구'),(3,'정종철','01037284937','금천구'),(4,'Billy Ray','01029384756','동대문구'),(5,'지석진','01098765432','강남구'),(8,'장주희','010-4738-4957','성북구'),(9,'정현도','010-6567-4808','서울시 성북구');
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `pay_id` int(10) NOT NULL DEFAULT '0',
  `pay_method` varchar(20) NOT NULL,
  `pay_dc_rate` int(5) DEFAULT '0',
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,'cash',0),(2,'cash',5),(3,'cash',10),(4,'cash',15),(5,'card',0),(6,'card',5),(7,'card',10),(8,'card',15);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `reserv_id` int(10) NOT NULL AUTO_INCREMENT,
  `reserv_from` date NOT NULL,
  `reserv_to` date NOT NULL,
  `cust_id` int(10) NOT NULL,
  `pay_id` int(10) NOT NULL,
  `room_no` int(5) NOT NULL,
  PRIMARY KEY (`reserv_id`),
  KEY `cust_id` (`cust_id`),
  KEY `pay_id` (`pay_id`),
  KEY `room_no` (`room_no`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`pay_id`) REFERENCES `payment` (`pay_id`),
  CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`room_no`) REFERENCES `room` (`room_no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (1,'2019-05-25','2019-05-27',1,8,405),(2,'2019-05-27','2019-05-28',2,2,404),(3,'2019-05-26','2019-05-29',3,4,305),(6,'2019-05-27','2019-05-28',5,4,205),(7,'2019-06-06','2019-06-22',1,2,202);
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `room_no` int(5) NOT NULL DEFAULT '0',
  `room_type` varchar(20) NOT NULL,
  `room_price` int(10) NOT NULL,
  `mgr_id` int(10) NOT NULL,
  PRIMARY KEY (`room_no`),
  KEY `mgr_id` (`mgr_id`),
  CONSTRAINT `room_ibfk_1` FOREIGN KEY (`mgr_id`) REFERENCES `manager` (`mgr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (101,'single',50000,2),(102,'double',80000,2),(103,'twin',68000,2),(104,'triple',89000,2),(105,'suite',95000,2),(201,'single',50000,3),(202,'double',80000,3),(203,'twin',68000,3),(204,'triple',89000,3),(205,'suite',95000,3),(301,'single',50000,4),(302,'double',80000,4),(303,'twin',70000,4),(304,'triple',90000,4),(305,'suite',97000,4),(401,'single',52000,5),(402,'double',84000,5),(403,'twin',73000,5),(404,'triple',94000,5),(405,'suite',11000,4);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-03 23:43:54
