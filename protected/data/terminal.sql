-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: terminal
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.10.1

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
-- Table structure for table `AuthAssignment`
--

DROP TABLE IF EXISTS `AuthAssignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthAssignment`
--

LOCK TABLES `AuthAssignment` WRITE;
/*!40000 ALTER TABLE `AuthAssignment` DISABLE KEYS */;
INSERT INTO `AuthAssignment` VALUES ('Admin','1',NULL,NULL);
/*!40000 ALTER TABLE `AuthAssignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItem`
--

DROP TABLE IF EXISTS `AuthItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItem`
--

LOCK TABLES `AuthItem` WRITE;
/*!40000 ALTER TABLE `AuthItem` DISABLE KEYS */;
INSERT INTO `AuthItem` VALUES ('Admin',2,NULL,NULL,NULL);
/*!40000 ALTER TABLE `AuthItem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItemChild`
--

DROP TABLE IF EXISTS `AuthItemChild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItemChild`
--

LOCK TABLES `AuthItemChild` WRITE;
/*!40000 ALTER TABLE `AuthItemChild` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthItemChild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Rights`
--

DROP TABLE IF EXISTS `Rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Rights`
--

LOCK TABLES `Rights` WRITE;
/*!40000 ALTER TABLE `Rights` DISABLE KEYS */;
/*!40000 ALTER TABLE `Rights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counter`
--

DROP TABLE IF EXISTS `counter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `counter` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counter`
--

LOCK TABLES `counter` WRITE;
/*!40000 ALTER TABLE `counter` DISABLE KEYS */;
INSERT INTO `counter` VALUES (1,'barcode',NULL,221),(2,'transaction',NULL,56);
/*!40000 ALTER TABLE `counter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passenger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passenger`
--

LOCK TABLES `passenger` WRITE;
/*!40000 ALTER TABLE `passenger` DISABLE KEYS */;
INSERT INTO `passenger` VALUES (1,'','',NULL,NULL),(2,'','',NULL,NULL),(3,'','',NULL,NULL),(4,'','',NULL,NULL),(5,'','',NULL,NULL),(6,'','',NULL,NULL),(7,'','',NULL,NULL),(8,'','',NULL,NULL),(9,'','',NULL,NULL),(10,'','',NULL,NULL),(11,'','',NULL,NULL),(12,'','',NULL,NULL),(13,'','',NULL,NULL),(14,'','',NULL,NULL),(15,'','',NULL,NULL),(16,'','',NULL,NULL),(17,'','',NULL,NULL),(18,'','',NULL,NULL),(19,'','',NULL,NULL),(20,'','',NULL,NULL),(21,'','',NULL,NULL),(22,'','',NULL,NULL),(23,'','',NULL,NULL),(24,'','',NULL,NULL),(25,'','',NULL,NULL),(26,'','',NULL,NULL),(27,'','',NULL,NULL),(28,'','',NULL,NULL),(29,'','',NULL,NULL),(30,'','',NULL,NULL),(31,'','',NULL,NULL),(32,'','',NULL,NULL),(33,'','',NULL,NULL),(34,'','',NULL,NULL),(35,'','',NULL,NULL),(36,'','',NULL,NULL),(37,'','',NULL,NULL),(38,'','',NULL,NULL),(39,'','',NULL,NULL),(40,'','',NULL,NULL),(41,'','',NULL,NULL),(42,'','',NULL,NULL),(43,'','',NULL,NULL),(44,'','',NULL,NULL),(45,'','',NULL,NULL),(46,'','',NULL,NULL),(47,'','',NULL,NULL),(48,'','',NULL,NULL),(49,'','',NULL,NULL),(50,'','',NULL,NULL),(51,'','',NULL,NULL),(52,'','',NULL,NULL),(53,'','',NULL,NULL),(54,'','',NULL,NULL),(55,'','',NULL,NULL),(56,'','',NULL,NULL),(57,'','',NULL,NULL),(58,'','',NULL,NULL),(59,'','',NULL,NULL),(60,'','',NULL,NULL),(61,'','',NULL,NULL),(62,'','',NULL,NULL),(63,'','',NULL,NULL),(64,'','',NULL,NULL),(65,'','',NULL,NULL),(66,'','',NULL,NULL),(67,'','',NULL,NULL),(68,'','',NULL,NULL),(69,'','',NULL,NULL),(70,'','',NULL,NULL),(71,'','',NULL,NULL),(72,'','',NULL,NULL),(73,'','',NULL,NULL),(74,'','',NULL,NULL),(75,'','',NULL,NULL),(76,'','',NULL,NULL),(77,'','',NULL,NULL),(78,'','',NULL,NULL),(79,'','',NULL,NULL),(80,'','',NULL,NULL),(81,'','',NULL,NULL),(82,'','',NULL,NULL),(83,'','',NULL,NULL),(84,'','',NULL,NULL),(85,'','',NULL,NULL),(86,'','',NULL,NULL),(87,'','',NULL,NULL),(88,'','',NULL,NULL),(89,'','',NULL,NULL),(90,'','',NULL,NULL),(91,'','',NULL,NULL),(92,'','',NULL,NULL),(93,'','',NULL,NULL),(94,'','',NULL,NULL),(95,'','',NULL,NULL),(96,'','',NULL,NULL),(97,'','',NULL,NULL),(98,'','',NULL,NULL),(99,'','',NULL,NULL),(100,'','',NULL,NULL),(101,'','',NULL,NULL),(102,'','',NULL,NULL),(103,'','',NULL,NULL),(104,'','',NULL,NULL),(105,'','',NULL,NULL),(106,'','',NULL,NULL),(107,'','',NULL,NULL),(108,'','',NULL,NULL),(109,'','',NULL,NULL),(110,'','',NULL,NULL),(111,'','',NULL,NULL),(112,'','',NULL,NULL),(113,'','',NULL,NULL),(114,'','',NULL,NULL),(115,'','',NULL,NULL),(116,'','',NULL,NULL),(117,'','',NULL,NULL),(118,'','',NULL,NULL),(119,'','',NULL,NULL),(120,'','',NULL,NULL),(121,'','',NULL,NULL),(122,'','',NULL,NULL),(123,'','',NULL,NULL),(124,'','',NULL,NULL),(125,'','',NULL,NULL),(126,'','',NULL,NULL),(127,'','',NULL,NULL),(128,'','',NULL,NULL),(129,'','',NULL,NULL),(130,'','',NULL,NULL),(131,'','',NULL,NULL),(132,'','',NULL,NULL),(133,'','',NULL,NULL),(134,'','',NULL,NULL),(135,'','',NULL,NULL),(136,'','',NULL,NULL),(137,'','',NULL,NULL),(138,'','',NULL,NULL),(139,'','',NULL,NULL),(140,'','',NULL,NULL),(141,'','',NULL,NULL),(142,'','',NULL,NULL),(143,'','',NULL,NULL),(144,'','',NULL,NULL),(145,'','',NULL,NULL),(146,'','',NULL,NULL),(147,'','',NULL,NULL),(148,'','',NULL,NULL),(149,'','',NULL,NULL),(150,'','',NULL,NULL),(151,'','',NULL,NULL),(152,'','',NULL,NULL),(153,'','',NULL,NULL),(154,'','',NULL,NULL),(155,'','',NULL,NULL),(156,'','',NULL,NULL),(157,'','',NULL,NULL),(158,'','',NULL,NULL),(159,'','',NULL,NULL),(160,'','',NULL,NULL),(161,'','',NULL,NULL),(162,'','',NULL,NULL),(163,'','',NULL,NULL),(164,'','',NULL,NULL),(165,'','',NULL,NULL),(166,'','',NULL,NULL),(167,'','',NULL,NULL),(168,'','',NULL,NULL),(169,'','',NULL,NULL),(170,'','',NULL,NULL),(171,'','',NULL,NULL),(172,'','',NULL,NULL),(173,'','',NULL,NULL),(174,'','',NULL,NULL),(175,'','',NULL,NULL),(176,'','',NULL,NULL),(177,'','',NULL,NULL),(178,'','',NULL,NULL),(179,'','',NULL,NULL),(180,'','',NULL,NULL),(181,'','',NULL,NULL),(182,'','',NULL,NULL),(183,'','',NULL,NULL),(184,'','',NULL,NULL),(185,'','',NULL,NULL),(186,'','',NULL,NULL),(187,'','',NULL,NULL),(188,'','',NULL,NULL),(189,'','',NULL,NULL),(190,'','',NULL,NULL),(191,'','',NULL,NULL),(192,'','',NULL,NULL),(193,'','',NULL,NULL),(194,'','',NULL,NULL),(195,'','',NULL,NULL),(196,'','',NULL,NULL),(197,'','',NULL,NULL),(198,'','',NULL,NULL),(199,'','',NULL,NULL),(200,'','',NULL,NULL),(201,'','',NULL,NULL),(202,'','',NULL,NULL),(203,'','',NULL,NULL),(204,'','',NULL,NULL),(205,'','',NULL,NULL),(206,'','',NULL,NULL),(207,'','',NULL,NULL),(208,'','',NULL,NULL),(209,'','',NULL,NULL),(210,'','',NULL,NULL),(211,'','',NULL,NULL),(212,'','',NULL,NULL),(213,'','',NULL,NULL),(214,'','',NULL,NULL),(215,'','',NULL,NULL),(216,'','',NULL,NULL),(217,'','',NULL,NULL),(218,'vhihi','da',34,NULL),(219,'','',NULL,NULL);
/*!40000 ALTER TABLE `passenger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passenger_type`
--

DROP TABLE IF EXISTS `passenger_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passenger_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` tinytext,
  `code` varchar(10) DEFAULT NULL,
  `fee` decimal(20,2) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passenger_type`
--

LOCK TABLES `passenger_type` WRITE;
/*!40000 ALTER TABLE `passenger_type` DISABLE KEYS */;
INSERT INTO `passenger_type` VALUES (1,'Regular Fare','','RF',120.00,1);
/*!40000 ALTER TABLE `passenger_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'vhilly','santiago');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles_fields`
--

DROP TABLE IF EXISTS `profiles_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles_fields`
--

LOCK TABLES `profiles_fields` WRITE;
/*!40000 ALTER TABLE `profiles_fields` DISABLE KEYS */;
INSERT INTO `profiles_fields` VALUES (1,'lastname','Last Name','VARCHAR','50','3',1,'','','Incorrect Last Name (length between 3 and 50 characters).','','','','',1,3),(2,'firstname','First Name','VARCHAR','50','3',1,'','','Incorrect First Name (length between 3 and 50 characters).','','','','',0,3);
/*!40000 ALTER TABLE `profiles_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_lines`
--

DROP TABLE IF EXISTS `shipping_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` tinytext,
  `contact` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_lines`
--

LOCK TABLES `shipping_lines` WRITE;
/*!40000 ALTER TABLE `shipping_lines` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipping_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'paid',1),(2,'checked-in',1),(3,'boarded',1),(4,'canceled',1);
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terminal_fee`
--

DROP TABLE IF EXISTS `terminal_fee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terminal_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voyage` int(11) DEFAULT NULL,
  `shipping_lines` int(11) DEFAULT NULL,
  `passenger` int(11) NOT NULL,
  `ticket_no` varchar(100) DEFAULT NULL,
  `transaction_no` varchar(100) DEFAULT NULL,
  `barcode` varchar(100) NOT NULL,
  `passenger_type` int(11) NOT NULL,
  `price_paid` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checkin_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ticket_no` (`ticket_no`),
  KEY `created_by` (`created_by`),
  KEY `passenger` (`passenger`),
  KEY `status` (`status`),
  KEY `shipping_lines` (`shipping_lines`),
  KEY `voyage` (`voyage`),
  KEY `passenger_type` (`passenger_type`),
  CONSTRAINT `terminal_fee_ibfk_4` FOREIGN KEY (`passenger_type`) REFERENCES `passenger_type` (`id`),
  CONSTRAINT `terminal_fee_ibfk_1` FOREIGN KEY (`passenger`) REFERENCES `passenger` (`id`),
  CONSTRAINT `terminal_fee_ibfk_2` FOREIGN KEY (`shipping_lines`) REFERENCES `shipping_lines` (`id`),
  CONSTRAINT `terminal_fee_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terminal_fee`
--

LOCK TABLES `terminal_fee` WRITE;
/*!40000 ALTER TABLE `terminal_fee` DISABLE KEYS */;
INSERT INTO `terminal_fee` VALUES (1,NULL,NULL,208,NULL,'000053','000209',1,120.00,4,1,'2013-12-16 06:18:38',NULL),(2,NULL,NULL,209,NULL,'000053','000210',1,120.00,4,1,'2013-12-16 06:18:38',NULL),(3,NULL,NULL,210,NULL,'000053','000211',1,120.00,4,1,'2013-12-16 06:18:39',NULL),(4,NULL,NULL,211,NULL,'000053','000212',1,120.00,4,1,'2013-12-16 06:18:39',NULL),(5,NULL,NULL,212,NULL,'000054','000213',1,120.00,1,1,'2013-12-16 06:18:43',NULL),(6,NULL,NULL,213,NULL,'000054','000214',1,120.00,1,1,'2013-12-16 06:18:43',NULL),(7,NULL,NULL,214,NULL,'000054','000215',1,120.00,1,1,'2013-12-16 06:18:44',NULL),(8,NULL,NULL,215,NULL,'000055','000216',1,120.00,1,1,'2013-12-16 06:18:47',NULL),(9,NULL,NULL,216,NULL,'000055','000217',1,120.00,1,1,'2013-12-16 06:18:47',NULL),(10,NULL,NULL,217,NULL,'000055','000218',1,120.00,1,1,'2013-12-16 06:18:47',NULL),(11,NULL,NULL,218,NULL,'000056','000220',1,120.00,1,1,'2013-12-16 07:03:00',NULL),(12,NULL,NULL,219,NULL,'000056','000221',1,120.00,1,1,'2013-12-16 07:03:01',NULL);
/*!40000 ALTER TABLE `terminal_fee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','vhilly@imperium.ph','','2013-12-16 01:01:06','2013-12-16 05:07:39',1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-16 15:50:14
