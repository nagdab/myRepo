-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: fp
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `shoppingList` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `address` varchar(255) NOT NULL,
  `fulfilled` int(10) unsigned NOT NULL,
  `time_fulfilled` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (27,27,'2 lbs apples, 4 lbs potatoes, 1 gallon 2% milk, 1 bunch of bananas','2016-05-09 01:37:29',-71.0876,42.36,'MIT Media Lab, Amherst Street, Cambridge, MA, United States',29,'2016-05-09 01:37:29'),(28,27,'1 lb rice, 2 cans black beans, 1 box salt, 1 box clementines.','2016-05-09 01:17:35',-3.74922,40.4637,'Spain',27,'2016-05-09 01:17:35'),(29,27,'1 bottle vanilla extract, 2 bottles soy sauce, 1 packet cheddar cheese, 1 box of almonds.','2016-05-09 01:19:21',-81.5158,27.6648,'Florida, United States',27,'2016-05-09 01:19:21'),(30,26,'2 pineapples, 3 oranges, 5 plums, 1 bunch of bananas, 1 bouquet of flowers','2016-05-09 01:37:29',-71.2083,42.3141,'143 Upland Avenue, Newton, MA, United States',29,'2016-05-09 01:37:29'),(31,29,'1lb potatoes','2016-05-09 03:38:47',-71.1152,42.3739,'Emerson Hall, Quincy Street, Cambridge, MA, United States',30,'2016-05-09 03:38:47'),(32,30,'Lots of good good stuff. Bring me something really sweet.','2016-05-09 03:38:47',-71.0754,42.355,'140 Beacon Street, MA, United States',30,'2016-05-09 03:38:47');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `port_history`
--

DROP TABLE IF EXISTS `port_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `port_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numPort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `port_history`
--

LOCK TABLES `port_history` WRITE;
/*!40000 ALTER TABLE `port_history` DISABLE KEYS */;
INSERT INTO `port_history` VALUES (8,27,'2016-05-09 01:17:35',1),(9,27,'2016-05-09 01:19:06',0),(10,27,'2016-05-09 01:19:21',1),(11,29,'2016-05-09 01:37:29',2),(12,30,'2016-05-09 03:38:47',2);
/*!40000 ALTER TABLE `port_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Andy Smith','andysmith@gmail.com','andi','$2y$10$c.e4DK7pVyLT.stmHxgAleWq4yViMmkwKz3x8XCo4b/u3r8g5OTnS'),(2,'Caesar Solution','caesar@gmail.com','caesar','$2y$10$0p2dlmu6HnhzEMf9UaUIfuaQP7tFVDMxgFcVs0irhGqhOxt6hJFaa'),(3,'Eli Gold','eli@gmail.com','eli','$2y$10$COO6EnTVrCPCEddZyWeEJeH9qPCwPkCS0jJpusNiru.XpRN6Jf7HW'),(4,'Harvard Daniels','h@gmail.com','hdan','$2y$10$o9a4ZoHqVkVHSno6j.k34.wC.qzgeQTBHiwa3rpnLq7j2PlPJHo1G'),(5,'Jason Ma','jma@gmail.com','jason','$2y$10$ci2zwcWLJmSSqyhCnHKUF.AjoysFMvlIb1w4zfmCS7/WaOrmBnLNe'),(6,'John Yu','jyu@gmail.com','john','$2y$10$dy.LVhWgoxIQHAgfCStWietGdJCPjnNrxKNRs5twGcMrQvAPPIxSy'),(7,'Lev Tsybin','lev@gmail.com','levatich','$2y$10$fBfk7L/QFiplffZdo6etM.096pt4Oyz2imLSp5s8HUAykdLXaz6MK'),(8,'Rob Gronkowski','rob@gmail.com','rob','$2y$10$3pRWcBbGdAdzdDiVVybKSeFq6C50g80zyPRAxcsh2t5UnwAkG.I.2'),(9,'Skrooby Smith','skroob@gmail.com','skroob','$2y$10$395b7wODm.o2N7W5UZSXXuXwrC0OtFB17w4VjPnCIn/nvv9e4XUQK'),(10,'Zamyla Chan','zchang@gmail.com','zamyla','$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e'),(24,'CS50','cs50@gmail.com','CS50username','$2y$10$jy0.8Xnkwv8fTPm8Jy6sTOW2rpcIjXOv5REFebpYFtyyBti.Ri0bO'),(26,'Bhavik Nagda','bhavik@gmail.com','BhavikNagda','$2y$10$lMmWCAu9OkK9dMJzcbxo7u9ST.ezYCj8h3lkVWarIq/euSTypUi16'),(27,'Jackie Chan','jc@gmail.com','KarateKid','$2y$10$YXEZuVtknslNrHhDs7vKJepB2ICRriUfIetB326Ntbr/CUmDDOSbK'),(29,'CS50','cs50tester@gmail.com','CS50TESTING','$2y$10$VtFyA68dg5Fk/p.ypH2.7eocm2LfNP5AEPnv0BqT7.mBVW7R8vANG'),(30,'Dipal Nagda','dips@gmail.com','dips','$2y$10$mBU6eB7DFt8nHhDr/.z1kebK5CHw/ejUgbQkDbfwTvIx4MPFFvdNm');
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

-- Dump completed on 2016-05-09  3:43:58
