-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ssip2
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discount` (
  `discountId` int(11) NOT NULL AUTO_INCREMENT,
  `discountCode` char(50) DEFAULT NULL,
  `discountAmount` int(11) DEFAULT NULL,
  `discountName` char(255) DEFAULT NULL,
  PRIMARY KEY (`discountId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount`
--

LOCK TABLES `discount` WRITE;
/*!40000 ALTER TABLE `discount` DISABLE KEYS */;
INSERT INTO `discount` VALUES (4,'001',10,'Martabak'),(7,'newyear23',40,'New Year');
/*!40000 ALTER TABLE `discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentmethod`
--

DROP TABLE IF EXISTS `paymentmethod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymentmethod` (
  `paymentMethodId` int(11) NOT NULL AUTO_INCREMENT,
  `paymentMethodName` char(50) DEFAULT NULL,
  `paymentMethodImage` longblob DEFAULT NULL,
  PRIMARY KEY (`paymentMethodId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentmethod`
--

LOCK TABLES `paymentmethod` WRITE;
/*!40000 ALTER TABLE `paymentmethod` DISABLE KEYS */;
/*!40000 ALTER TABLE `paymentmethod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` char(255) DEFAULT NULL,
  `productDesc` char(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productQty` int(11) DEFAULT NULL,
  `productImage` longblob DEFAULT NULL,
  `imageSize` int(11) DEFAULT NULL,
  `imageType` char(255) DEFAULT NULL,
  `productType` char(50) DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (19,'Sate Taichan','Sate Taichan',30000,1,'63a036dfb8359.jpg',NULL,NULL,'food'),(20,'Martabak','Martabak',40000,1,'63a037fda8454.jpg',NULL,NULL,'food'),(22,'Thai Tea Original','Thai Tea Original',25000,1,'63a038ab70a60.jpg',NULL,NULL,'drink'),(24,'Coffee','Coffee',30000,1,'63a03e9840109.jpg',NULL,NULL,'drink'),(25,'Avocado Juice','Avocado Juice',20000,1,'63a03f07a7c57.jpg',NULL,NULL,'drink'),(26,'Pizza Hut','Pizza Hut',100000,1,'63a28ba0bb5ed.jpg',NULL,NULL,'food');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productorder`
--

DROP TABLE IF EXISTS `productorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productorder` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `orderQty` int(11) DEFAULT NULL,
  `orderTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orderList` varchar(255) DEFAULT NULL,
  `userName` char(255) DEFAULT NULL,
  `price` char(255) DEFAULT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productorder`
--

LOCK TABLES `productorder` WRITE;
/*!40000 ALTER TABLE `productorder` DISABLE KEYS */;
INSERT INTO `productorder` VALUES (17,6,'2022-12-20 17:00:00','Sate Taichan, Avocado Juice, Thai Tea Original, ','USER  1','165000'),(18,14,'2022-12-21 17:00:00','Sate Taichan, Avocado Juice, Thai Tea Original, ','USER  1','324000');
/*!40000 ALTER TABLE `productorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `role` char(15) NOT NULL,
  `password` char(255) DEFAULT NULL,
  `nohp` char(20) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userImage` longblob DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (12,'Haikal Fiqih','admin','321','0816453722','haikal',NULL),(13,'MUH. FAHRUL','admin','123','+6285656853337','fahrul',NULL),(14,'mumun','cashier','123','643434534','mumun',NULL),(18,'Andi Marmut','customer','123','0895150979','andi',''),(19,'Park Ji min','cashier','123','0816453722','jimin',''),(20,'admin','admin','123','0816453722','admin',''),(21,'customer','customer','123','123456','customer',''),(22,'cashier','cashier','123','123456','cashier',''),(23,'lisa','customer','123','082188586884','lisa',NULL),(24,'USER  1','customer','123','0816453722','user1',''),(25,'User 2','customer','123','0816453722','user2','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-23  0:37:52
