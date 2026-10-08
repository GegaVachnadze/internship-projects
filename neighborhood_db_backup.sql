-- MySQL dump 10.13  Distrib 8.0.46, for Linux (x86_64)
--
-- Host: localhost    Database: neighborhood_db
-- ------------------------------------------------------
-- Server version	8.0.46-0ubuntu0.24.04.4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `announcements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requires_payment` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
INSERT INTO `announcements` VALUES (13,'ლიფტის შეკეთება','<p><strong>ლიფთის შეკეთება</strong></p>',1,'2026-10-08 04:40:48','2026-10-08 04:40:48',60.00),(16,'გადახდის ტესტი','<p><strong>გადახდის ტესტი</strong></p>',1,'2026-10-08 09:20:32','2026-10-08 09:20:32',100.00),(17,'Test 1','<p><strong>Test 1</strong></p>',1,'2026-10-08 09:38:49','2026-10-08 09:38:49',100.00);
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartments`
--

DROP TABLE IF EXISTS `apartments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apartments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `apartment_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartments`
--

LOCK TABLES `apartments` WRITE;
/*!40000 ALTER TABLE `apartments` DISABLE KEYS */;
INSERT INTO `apartments` VALUES (116,'67',5,'2026-10-07 01:11:24','2026-10-07 01:14:20'),(117,'38',5,'2026-10-07 01:11:24','2026-10-07 01:11:24'),(118,'39',5,'2026-10-07 01:11:24','2026-10-07 01:11:24'),(119,'40',5,'2026-10-07 01:11:24','2026-10-07 01:11:24'),(120,'41',5,'2026-10-07 01:11:24','2026-10-07 01:11:24'),(121,'42',5,'2026-10-07 01:11:24','2026-10-07 01:11:24'),(122,'43',5,'2026-10-07 01:11:24','2026-10-07 01:11:24'),(123,'44',5,'2026-10-07 01:11:24','2026-10-07 01:11:24'),(124,'45',5,'2026-10-07 01:11:24','2026-10-07 01:11:24'),(125,'56',7,'2026-10-07 01:16:13','2026-10-07 01:16:13'),(126,'57',7,'2026-10-07 01:16:13','2026-10-07 01:16:13'),(127,'58',7,'2026-10-07 01:16:13','2026-10-07 01:16:13'),(128,'59',7,'2026-10-07 01:16:13','2026-10-07 01:16:13'),(129,'60',7,'2026-10-07 01:16:13','2026-10-07 01:16:13'),(130,'61',7,'2026-10-07 01:16:13','2026-10-07 01:16:13'),(161,'1',1,'2026-10-07 01:40:29','2026-10-07 01:40:29'),(162,'2',1,'2026-10-07 01:40:29','2026-10-07 01:40:29'),(163,'3',1,'2026-10-07 01:40:29','2026-10-07 01:40:29'),(164,'4',1,'2026-10-07 01:40:29','2026-10-07 01:40:29'),(165,'5',1,'2026-10-07 01:40:29','2026-10-07 01:40:29'),(166,'6',1,'2026-10-07 01:40:29','2026-10-07 01:40:29'),(167,'7',1,'2026-10-07 01:40:29','2026-10-07 01:40:29'),(168,'8',1,'2026-10-07 01:40:29','2026-10-07 01:40:29'),(169,'9',1,'2026-10-07 01:40:29','2026-10-07 01:40:29'),(170,'10',1,'2026-10-07 01:40:29','2026-10-07 01:40:29'),(171,'1',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(172,'2',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(173,'3',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(174,'4',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(175,'5',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(176,'6',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(177,'7',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(178,'8',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(179,'9',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(180,'10',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(181,'11',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(182,'12',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(183,'13',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(184,'14',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(185,'15',2,'2026-10-07 01:44:24','2026-10-07 01:44:24'),(186,'1',25,'2026-10-08 03:11:59','2026-10-08 03:11:59'),(187,'2',25,'2026-10-08 03:11:59','2026-10-08 03:11:59'),(188,'3',25,'2026-10-08 03:11:59','2026-10-08 03:11:59'),(189,'4',25,'2026-10-08 03:11:59','2026-10-08 03:11:59'),(190,'5',25,'2026-10-08 03:11:59','2026-10-08 03:11:59'),(191,'6',25,'2026-10-08 03:11:59','2026-10-08 03:11:59'),(192,'7',25,'2026-10-08 03:11:59','2026-10-08 03:11:59'),(193,'8',25,'2026-10-08 03:11:59','2026-10-08 03:11:59'),(194,'9',25,'2026-10-08 03:11:59','2026-10-08 03:11:59'),(195,'10',25,'2026-10-08 03:11:59','2026-10-08 03:11:59'),(196,'16',2,'2026-10-08 04:37:51','2026-10-08 04:37:51'),(197,'17',2,'2026-10-08 04:37:51','2026-10-08 04:37:51'),(198,'18',2,'2026-10-08 04:37:51','2026-10-08 04:37:51'),(199,'19',2,'2026-10-08 04:37:51','2026-10-08 04:37:51'),(201,'1',11,'2026-10-08 05:00:31','2026-10-08 05:00:31'),(202,'2',11,'2026-10-08 05:00:31','2026-10-08 05:00:31'),(203,'3',11,'2026-10-08 05:00:31','2026-10-08 05:00:31'),(204,'4',11,'2026-10-08 05:00:31','2026-10-08 05:00:31'),(205,'5',11,'2026-10-08 05:00:31','2026-10-08 05:00:31'),(206,'6',11,'2026-10-08 05:00:31','2026-10-08 05:00:31'),(207,'7',11,'2026-10-08 05:00:31','2026-10-08 05:00:31'),(208,'8',11,'2026-10-08 05:00:31','2026-10-08 05:00:31'),(209,'9',11,'2026-10-08 05:00:31','2026-10-08 05:00:31'),(210,'10',11,'2026-10-08 05:00:31','2026-10-08 05:00:31'),(211,'11',11,'2026-10-08 05:03:32','2026-10-08 05:03:32'),(212,'12',11,'2026-10-08 05:03:32','2026-10-08 05:03:32'),(213,'13',11,'2026-10-08 05:03:32','2026-10-08 05:03:32'),(214,'14',11,'2026-10-08 05:03:32','2026-10-08 05:03:32'),(215,'15',11,'2026-10-08 05:03:32','2026-10-08 05:03:32'),(216,'16',11,'2026-10-08 05:03:32','2026-10-08 05:03:32'),(217,'17',11,'2026-10-08 05:03:32','2026-10-08 05:03:32'),(218,'18',11,'2026-10-08 05:03:32','2026-10-08 05:03:32'),(219,'19',11,'2026-10-08 05:03:32','2026-10-08 05:03:32'),(220,'20',11,'2026-10-08 05:03:32','2026-10-08 05:03:32');
/*!40000 ALTER TABLE `apartments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel-cache-spatie.permission.cache','a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:73:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:20:\"ViewAny:Announcement\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:17:\"View:Announcement\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:19:\"Create:Announcement\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:19:\"Update:Announcement\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:19:\"Delete:Announcement\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:22:\"DeleteAny:Announcement\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:20:\"Restore:Announcement\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:24:\"ForceDelete:Announcement\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:27:\"ForceDeleteAny:Announcement\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:23:\"RestoreAny:Announcement\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:22:\"Replicate:Announcement\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:20:\"Reorder:Announcement\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:17:\"ViewAny:Apartment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:14:\"View:Apartment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:16:\"Create:Apartment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:16:\"Update:Apartment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:16:\"Delete:Apartment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:19:\"DeleteAny:Apartment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:17:\"Restore:Apartment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:21:\"ForceDelete:Apartment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:24:\"ForceDeleteAny:Apartment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:20:\"RestoreAny:Apartment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:19:\"Replicate:Apartment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:17:\"Reorder:Apartment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:15:\"ViewAny:Expense\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:12:\"View:Expense\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:14:\"Create:Expense\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:14:\"Update:Expense\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:14:\"Delete:Expense\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:17:\"DeleteAny:Expense\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:15:\"Restore:Expense\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:19:\"ForceDelete:Expense\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:22:\"ForceDeleteAny:Expense\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:18:\"RestoreAny:Expense\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:17:\"Replicate:Expense\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:15:\"Reorder:Expense\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:18:\"ViewAny:MonthlyFee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:15:\"View:MonthlyFee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:17:\"Create:MonthlyFee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:17:\"Update:MonthlyFee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:17:\"Delete:MonthlyFee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:20:\"DeleteAny:MonthlyFee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:18:\"Restore:MonthlyFee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:22:\"ForceDelete:MonthlyFee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:25:\"ForceDeleteAny:MonthlyFee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:21:\"RestoreAny:MonthlyFee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:20:\"Replicate:MonthlyFee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:18:\"Reorder:MonthlyFee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:15:\"ViewAny:Payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:12:\"View:Payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:14:\"Create:Payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:14:\"Update:Payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:14:\"Delete:Payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:17:\"DeleteAny:Payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:15:\"Restore:Payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:19:\"ForceDelete:Payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:22:\"ForceDeleteAny:Payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:18:\"RestoreAny:Payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:17:\"Replicate:Payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:15:\"Reorder:Payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:12:\"ViewAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:9:\"View:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:11:\"Create:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:11:\"Update:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:11:\"Delete:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:14:\"DeleteAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:12:\"Restore:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:16:\"ForceDelete:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:19:\"ForceDeleteAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:15:\"RestoreAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:14:\"Replicate:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:12:\"Reorder:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:20:\"View:FinanceOverview\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:8:\"Chairman\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:8:\"Resident\";s:1:\"c\";s:3:\"web\";}}}',1791555005);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_conversations`
--

DROP TABLE IF EXISTS `chat_conversations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat_conversations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ulid` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_user_id` bigint unsigned DEFAULT NULL,
  `direct_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_message_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chat_conversations_ulid_unique` (`ulid`),
  UNIQUE KEY `chat_conversations_direct_key_unique` (`direct_key`),
  KEY `chat_conversations_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `chat_conversations_last_message_at_index` (`last_message_at`),
  CONSTRAINT `chat_conversations_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_conversations`
--

LOCK TABLES `chat_conversations` WRITE;
/*!40000 ALTER TABLE `chat_conversations` DISABLE KEYS */;
INSERT INTO `chat_conversations` VALUES (1,'01M4B6P4YWCJZCVNQVGHQDN0CW','group','Apartment 12',NULL,NULL,'2026-10-07 08:54:18','2026-10-07 08:51:18','2026-10-07 11:48:34'),(2,'01M4DACGX1JQ0TTNKP60J7VTXV','direct',NULL,17,'10:17',NULL,'2026-10-08 04:34:26','2026-10-08 04:34:26'),(3,'01M4DAD98PD9413XWK4BTTYEDR','group','Apartment 12',17,NULL,'2026-10-08 05:19:01','2026-10-08 04:34:51','2026-10-08 05:19:01'),(4,'01M4DCTXN4TYPW6GCKFJ5KR7BN','direct',NULL,17,'17:19','2026-10-08 05:18:25','2026-10-08 05:17:15','2026-10-08 05:18:25');
/*!40000 ALTER TABLE `chat_conversations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_message_reactions`
--

DROP TABLE IF EXISTS `chat_message_reactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat_message_reactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ulid` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_message_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `reaction` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chat_message_reactions_chat_message_id_user_id_unique` (`chat_message_id`,`user_id`),
  UNIQUE KEY `chat_message_reactions_ulid_unique` (`ulid`),
  KEY `chat_message_reactions_user_id_foreign` (`user_id`),
  CONSTRAINT `chat_message_reactions_chat_message_id_foreign` FOREIGN KEY (`chat_message_id`) REFERENCES `chat_messages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chat_message_reactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_message_reactions`
--

LOCK TABLES `chat_message_reactions` WRITE;
/*!40000 ALTER TABLE `chat_message_reactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat_message_reactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_messages`
--

DROP TABLE IF EXISTS `chat_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ulid` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversation_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` bigint unsigned DEFAULT NULL,
  `reply_to_id` bigint unsigned DEFAULT NULL,
  `mentions` json DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chat_messages_ulid_unique` (`ulid`),
  KEY `chat_messages_user_id_foreign` (`user_id`),
  KEY `chat_messages_conversation_id_id_index` (`conversation_id`,`id`),
  KEY `chat_messages_reply_to_id_foreign` (`reply_to_id`),
  CONSTRAINT `chat_messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `chat_conversations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chat_messages_reply_to_id_foreign` FOREIGN KEY (`reply_to_id`) REFERENCES `chat_messages` (`id`) ON DELETE SET NULL,
  CONSTRAINT `chat_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_messages`
--

LOCK TABLES `chat_messages` WRITE;
/*!40000 ALTER TABLE `chat_messages` DISABLE KEYS */;
INSERT INTO `chat_messages` VALUES (1,'01M4B6PJ4ZJ8HHNG0F4GHYY565',1,NULL,'Hello Hello მე ვარ თავჯდომარე',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-10-07 08:51:32','2026-10-07 08:51:32'),(2,'01M4B6VMFB36PTPN9QF2HJRZ7F',1,NULL,'გამარჯობა გამარჯობა, მე ვარ უბრალო მაცხოვრებელი',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-10-07 08:54:18','2026-10-07 08:54:18'),(5,'01M4DCVVPGPXD4QJNKFH4H85C6',4,17,'გამარჯობა',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-10-08 05:17:46','2026-10-08 05:17:46'),(6,'01M4DCX25P4RFK14YTBZJWEWC4',4,19,'','chat-attachments/PduNvFpJfl59s1mFvyDoCAyAwe45xPFm6w7iylz9.png','Screenshot 2025-10-27 114944.png',NULL,NULL,NULL,NULL,NULL,'2026-10-08 05:18:25','2026-10-08 05:18:25'),(7,'01M4DCY53MHGFJEBFMZ6MHEA7P',3,17,'გამარჯობათ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-10-08 05:19:01','2026-10-08 05:19:01');
/*!40000 ALTER TABLE `chat_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_participants`
--

DROP TABLE IF EXISTS `chat_participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat_participants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ulid` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversation_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `last_read_message_id` bigint unsigned DEFAULT NULL,
  `joined_at` timestamp NULL DEFAULT NULL,
  `left_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chat_participants_conversation_id_user_id_unique` (`conversation_id`,`user_id`),
  UNIQUE KEY `chat_participants_ulid_unique` (`ulid`),
  KEY `chat_participants_user_id_left_at_index` (`user_id`,`left_at`),
  CONSTRAINT `chat_participants_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `chat_conversations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chat_participants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_participants`
--

LOCK TABLES `chat_participants` WRITE;
/*!40000 ALTER TABLE `chat_participants` DISABLE KEYS */;
INSERT INTO `chat_participants` VALUES (4,'01M4DACGX41AK9QGH7B9ZC86P2',2,17,NULL,'2026-10-08 04:34:26',NULL,'2026-10-08 04:34:26','2026-10-08 04:34:26'),(5,'01M4DACGX6ZMRN3T32ZN176709',2,10,NULL,'2026-10-08 04:34:26',NULL,'2026-10-08 04:34:26','2026-10-08 04:34:26'),(6,'01M4DAD98RK18VA3V5F08PWXC4',3,17,7,'2026-10-08 04:34:51',NULL,'2026-10-08 04:34:51','2026-10-08 04:34:51'),(7,'01M4DAD98SD38DM1GXQ3C1P19Y',3,10,NULL,'2026-10-08 04:34:51',NULL,'2026-10-08 04:34:51','2026-10-08 04:34:51'),(8,'01M4DCTXN7JFZ8NGRYQ8V15B6K',4,17,6,'2026-10-08 05:17:15',NULL,'2026-10-08 05:17:15','2026-10-08 05:17:15'),(9,'01M4DCTXN8DC6DZAB7KA2H3V0X',4,19,6,'2026-10-08 05:17:15',NULL,'2026-10-08 05:17:15','2026-10-08 05:17:15'),(10,'01M4DCXZGQ9BG3MX56TMC5H5BB',3,19,7,'2026-10-08 05:18:55',NULL,'2026-10-08 05:18:55','2026-10-08 05:18:55');
/*!40000 ALTER TABLE `chat_participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tenant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chats_tenant_id_unique` (`tenant_id`),
  CONSTRAINT `chats_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES (1,'House N2','2026-10-07 05:27:15','2026-10-07 05:27:15'),(2,'new_house','2026-10-07 05:27:15','2026-10-07 05:27:15');
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domains`
--

DROP TABLE IF EXISTS `domains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domains` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `domains_domain_unique` (`domain`),
  KEY `domains_tenant_id_foreign` (`tenant_id`),
  CONSTRAINT `domains_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domains`
--

LOCK TABLES `domains` WRITE;
/*!40000 ALTER TABLE `domains` DISABLE KEYS */;
INSERT INTO `domains` VALUES (1,'tbilisi-hills.localhost','new_house','2026-09-30 09:54:11','2026-09-30 09:54:11');
/*!40000 ALTER TABLE `domains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `expense_date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (3,'შლაგბაუმის გაკეთება',500.00,'2026-10-08','შლაგბაუმის გაკეთება','2026-10-08 05:07:46','2026-10-08 05:07:46');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `floors`
--

DROP TABLE IF EXISTS `floors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `floors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `number` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `floors_number_unique` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `floors`
--

LOCK TABLES `floors` WRITE;
/*!40000 ALTER TABLE `floors` DISABLE KEYS */;
INSERT INTO `floors` VALUES (1,1,'2026-10-07 01:34:15','2026-10-07 01:34:15'),(2,2,'2026-10-07 01:34:15','2026-10-07 01:34:15'),(3,3,'2026-10-07 01:34:15','2026-10-07 01:34:15'),(4,4,'2026-10-07 01:34:15','2026-10-07 01:34:15'),(5,5,'2026-10-07 01:34:15','2026-10-07 01:34:15'),(6,6,'2026-10-07 01:34:15','2026-10-07 01:34:15'),(7,7,'2026-10-07 01:34:15','2026-10-07 01:34:15'),(8,8,'2026-10-07 01:34:15','2026-10-07 01:34:15'),(9,9,'2026-10-07 01:34:15','2026-10-07 01:34:15'),(10,10,'2026-10-07 01:34:15','2026-10-07 01:34:15'),(11,11,'2026-10-08 04:59:48','2026-10-08 04:59:48'),(12,12,'2026-10-08 04:59:48','2026-10-08 04:59:48'),(13,13,'2026-10-08 04:59:48','2026-10-08 04:59:48'),(14,14,'2026-10-08 04:59:48','2026-10-08 04:59:48'),(15,15,'2026-10-08 04:59:48','2026-10-08 04:59:48'),(16,16,'2026-10-08 04:59:48','2026-10-08 04:59:48'),(17,17,'2026-10-08 04:59:48','2026-10-08 04:59:48'),(18,18,'2026-10-08 04:59:48','2026-10-08 04:59:48'),(19,19,'2026-10-08 04:59:48','2026-10-08 04:59:48'),(20,20,'2026-10-08 04:59:48','2026-10-08 04:59:48');
/*!40000 ALTER TABLE `floors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `chat_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `attachment_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_chat_id_foreign` (`chat_id`),
  KEY `messages_user_id_foreign` (`user_id`),
  CONSTRAINT `messages_chat_id_foreign` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE,
  CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_09_20_000000_create_neighborhoods_table',1),(5,'2026_09_24_142430_create_permission_tables',1),(6,'2026_09_24_151405_create_apartments_table',1),(7,'2026_09_24_151539_apartment_to_users_table',1),(8,'2026_09_24_152551_create_payments_table',1),(9,'2026_09_24_153352_create_expenses_table',1),(10,'2026_09_29_114611_create_announcements_table',1),(11,'2026_09_30_071427_add_neighborhood_id_to_existing_tables',1),(12,'2026_09_30_082015_create_neighborhood_user_table',1),(13,'2019_09_15_000010_create_tenants_table',2),(14,'2019_09_15_000020_create_domains_table',2),(15,'2026_10_02_072153_add_neighborhood_id_to_apartments_table',3),(16,'2026_10_02_074605_create_monthly_fees_table',4),(17,'2026_10_02_075355_update_payments_table_for_monthly_fees',5),(18,'2026_10_02_135948_add_is_super_admin_to_users_table',6),(19,'2026_10_05_132015_add_requires_payment_to_announcements_table',7),(20,'2026_10_05_154548_change_apartment_number_to_string_on_apartments_table',8),(21,'2026_10_06_043032_add_payment_fields_to_tenants_and_announcements',9),(22,'2026_10_06_043715_add_announcement_and_user_to_payments_table',10),(23,'2026_10_06_063310_make_monthly_fee_nullable_and_add_bank_to_payments',11),(24,'2026_10_06_064439_add_payer_iban_to_payments_table',12),(25,'2026_10_06_105427_remove_old_bank_fields_from_payments_and_tenants',13),(26,'2026_10_06_143904_create_notifications_table',14),(27,'2026_10_06_165515_add_status_to_payments_table',15),(28,'2026_10_06_170601_add_is_paid_to_monthly_fees_table',16),(29,'2026_10_06_192149_create_resident_invitations_table',17),(30,'2026_10_07_052518_create_floors_table',18),(31,'2026_10_07_091905_create_chats_table',19),(32,'2026_10_07_091906_create_messages_table',19),(33,'2026_10_07_122947_create_filament_chat_tables',20),(34,'2026_10_07_122948_add_reply_to_filament_chat_messages',20),(35,'2026_10_07_142033_add_attachment_fields_to_chat_messages_table',21);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (2,'App\\Models\\User',17),(3,'App\\Models\\User',18),(3,'App\\Models\\User',19),(3,'App\\Models\\User',20),(3,'App\\Models\\User',21),(3,'App\\Models\\User',22),(3,'App\\Models\\User',23);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monthly_fees`
--

DROP TABLE IF EXISTS `monthly_fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `monthly_fees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `apartment_id` bigint unsigned NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `monthly_fees_apartment_id_foreign` (`apartment_id`),
  CONSTRAINT `monthly_fees_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monthly_fees`
--

LOCK TABLES `monthly_fees` WRITE;
/*!40000 ALTER TABLE `monthly_fees` DISABLE KEYS */;
INSERT INTO `monthly_fees` VALUES (72,117,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(73,118,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(74,119,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(75,120,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(76,121,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(77,122,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(78,123,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(79,124,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(80,125,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(81,126,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(82,127,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(83,128,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(84,129,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(85,130,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(86,161,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(87,162,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(88,163,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(89,164,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(90,165,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(91,166,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(92,167,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(93,168,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(94,169,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(95,170,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(96,171,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 09:22:31'),(97,172,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(98,173,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(99,174,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(100,175,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(101,176,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(102,177,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(103,178,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(104,179,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(105,180,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(106,181,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(107,182,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(108,183,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(109,184,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(110,185,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(111,186,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(112,187,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(113,188,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(114,189,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(115,190,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(116,191,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(117,192,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(118,193,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(119,194,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(120,195,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(121,196,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(122,197,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(123,198,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(124,199,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(125,201,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(126,202,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(127,203,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(128,204,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(129,205,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(130,206,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(131,207,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(132,208,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(133,209,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(134,210,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(135,211,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(136,212,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(137,213,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(138,214,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(139,215,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(140,216,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(141,217,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(142,218,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(143,219,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(144,220,600.00,0,'10/8/2026','2026-10-08 05:09:40','2026-10-08 05:09:40'),(145,116,50.00,0,'10/9/2026','2026-10-08 09:26:45','2026-10-08 09:26:45'),(146,117,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(147,118,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(148,119,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(149,120,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(150,121,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(151,122,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(152,123,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(153,124,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(154,125,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(155,126,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(156,127,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(157,128,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(158,129,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(159,130,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(160,161,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(161,162,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(162,163,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(163,164,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(164,165,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(165,166,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(166,167,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(167,168,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(168,169,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(169,170,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(170,171,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(171,172,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(172,173,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(173,174,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(174,175,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(175,176,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(176,177,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(177,178,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(178,179,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(179,180,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(180,181,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(181,182,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(182,183,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(183,184,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(184,185,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(185,186,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(186,187,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(187,188,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(188,189,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(189,190,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(190,191,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(191,192,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(192,193,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(193,194,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(194,195,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(195,196,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(196,197,50.00,1,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:28:47'),(197,198,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(198,199,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(199,201,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(200,202,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(201,203,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(202,204,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(203,205,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(204,206,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(205,207,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(206,208,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(207,209,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(208,210,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(209,211,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(210,212,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(211,213,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(212,214,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(213,215,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(214,216,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(215,217,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(216,218,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(217,219,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46'),(218,220,50.00,0,'10/9/2026','2026-10-08 09:26:46','2026-10-08 09:26:46');
/*!40000 ALTER TABLE `monthly_fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('0e15cf9d-eba2-456b-9530-632860532ed5','App\\Notifications\\AnnouncementNotification','App\\Models\\User',1,'{\"title\":\"Test announcement\",\"message\":\"<p><strong>Test Announecement<\\/strong><\\/p>\",\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building\\/announcements\\/5\\/edit\"}',NULL,'2026-10-06 10:50:32','2026-10-06 10:50:32'),('0e52ae56-8fb6-40b4-be30-01854df8ba41','App\\Notifications\\AnnouncementNotification','App\\Models\\User',20,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"\\u10d2\\u10d0\\u10dc\\u10ea\\u10ee\\u10d0\\u10d3\\u10d4\\u10d1\\u10d8\\u10e1 \\u10dc\\u10d0\\u10ee\\u10d5\\u10d0\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-14\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>\\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8 \\u10d3\\u10d0 \\u10d9\\u10d5\\u10d4\\u10d1\\u10d0<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"\\u10d3\\u10d0\\u10d5\\u10d0\\u10d8 \\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8 \\u10d3\\u10d8\\u10da\\u10d8\\u10e1 7 \\u10d3\\u10d0\\u10dc\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 08:10:33','2026-10-08 08:10:33'),('11f0a978-794d-452a-aa3b-5d3790f75146','App\\Notifications\\AnnouncementNotification','App\\Models\\User',1,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building\\/announcements\\/8\\/edit\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>\\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"\\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-06 11:28:19','2026-10-06 11:28:19'),('12435283-4e1e-432f-9e21-0dc473fe5eda','App\\Notifications\\AnnouncementNotification','App\\Models\\User',19,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-17\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>Test 1<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Test 1\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 09:38:49','2026-10-08 09:38:49'),('13520815-a9fa-4436-b277-5fd25fc05796','App\\Notifications\\AnnouncementNotification','App\\Models\\User',19,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"\\u10d2\\u10d0\\u10dc\\u10ea\\u10ee\\u10d0\\u10d3\\u10d4\\u10d1\\u10d8\\u10e1 \\u10dc\\u10d0\\u10ee\\u10d5\\u10d0\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-14\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>\\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8 \\u10d3\\u10d0 \\u10d9\\u10d5\\u10d4\\u10d1\\u10d0<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"\\u10d3\\u10d0\\u10d5\\u10d0\\u10d8 \\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8 \\u10d3\\u10d8\\u10da\\u10d8\\u10e1 7 \\u10d3\\u10d0\\u10dc\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 08:10:33','2026-10-08 08:10:33'),('136caa3e-aeea-4844-ae83-27f102015361','App\\Notifications\\AnnouncementNotification','App\\Models\\User',20,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"\\u10d2\\u10d0\\u10dc\\u10ea\\u10ee\\u10d0\\u10d3\\u10d4\\u10d1\\u10d8\\u10e1 \\u10dc\\u10d0\\u10ee\\u10d5\\u10d0\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-15\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>\\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"\\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 08:12:10','2026-10-08 08:12:10'),('14e8d993-aa31-4c71-83ba-40749865a5d0','App\\Notifications\\AnnouncementNotification','App\\Models\\User',1,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-10\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>Test 10<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Test 10\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-06 13:26:36','2026-10-06 13:26:36'),('1d3a5de4-19c1-43a3-8d1c-4d724eb4f9a6','App\\Notifications\\AnnouncementNotification','App\\Models\\User',21,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-17\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>Test 1<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Test 1\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 09:38:49','2026-10-08 09:38:49'),('2b38b3fc-9c53-446f-9a0b-c441ab289f95','Asignua\\FilamentChat\\Notifications\\NewMessageNotification','App\\Models\\User',17,'{\"actions\":[{\"name\":\"open\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"Open chat\",\"shouldClose\":false,\"shouldMarkAsRead\":true,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building\\/chat?c=01M4DCTXN4TYPW6GCKFJ5KR7BN\",\"view\":\"filament::components.link\"}],\"body\":\"\\ud83d\\udcce Attachment\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-chat-bubble-left-right\",\"iconColor\":null,\"status\":null,\"title\":\"lado sent you a message\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 05:18:25','2026-10-08 05:18:25'),('37fcce3d-8ad8-44db-841d-70eb45237853','App\\Notifications\\AnnouncementNotification','App\\Models\\User',8,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-12\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>\\u10da\\u10d8\\u10e4\\u10e2\\u10d8\\u10e1 \\u10e8\\u10d4\\u10d9\\u10d4\\u10d7\\u10d4\\u10d1\\u10d0 !<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"\\u10da\\u10d8\\u10e4\\u10e2\\u10d8\\u10e1 \\u10e8\\u10d4\\u10d9\\u10d4\\u10d7\\u10d4\\u10d1\\u10d0\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-07 06:06:54','2026-10-07 06:06:54'),('3a6d85eb-1d06-4923-a292-afcdd2a278ea','Asignua\\FilamentChat\\Notifications\\NewMessageNotification','App\\Models\\User',19,'{\"actions\":[{\"name\":\"open\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"Open chat\",\"shouldClose\":false,\"shouldMarkAsRead\":true,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building\\/chat?c=01M4DCTXN4TYPW6GCKFJ5KR7BN\",\"view\":\"filament::components.link\"}],\"body\":\"\\u10d2\\u10d0\\u10db\\u10d0\\u10e0\\u10ef\\u10dd\\u10d1\\u10d0\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-chat-bubble-left-right\",\"iconColor\":null,\"status\":null,\"title\":\"goga sent you a message\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 05:17:46','2026-10-08 05:17:46'),('4662db0d-ae6e-42dc-8073-a65a50b1c25b','App\\Notifications\\AnnouncementNotification','App\\Models\\User',18,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"\\u10d2\\u10d0\\u10dc\\u10ea\\u10ee\\u10d0\\u10d3\\u10d4\\u10d1\\u10d8\\u10e1 \\u10dc\\u10d0\\u10ee\\u10d5\\u10d0\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-14\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>\\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8 \\u10d3\\u10d0 \\u10d9\\u10d5\\u10d4\\u10d1\\u10d0<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"\\u10d3\\u10d0\\u10d5\\u10d0\\u10d8 \\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8 \\u10d3\\u10d8\\u10da\\u10d8\\u10e1 7 \\u10d3\\u10d0\\u10dc\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 08:10:33','2026-10-08 08:10:33'),('47a4079b-329c-46c9-882f-63ea93442111','App\\Notifications\\AnnouncementNotification','App\\Models\\User',7,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-12\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>\\u10da\\u10d8\\u10e4\\u10e2\\u10d8\\u10e1 \\u10e8\\u10d4\\u10d9\\u10d4\\u10d7\\u10d4\\u10d1\\u10d0 !<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"\\u10da\\u10d8\\u10e4\\u10e2\\u10d8\\u10e1 \\u10e8\\u10d4\\u10d9\\u10d4\\u10d7\\u10d4\\u10d1\\u10d0\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-07 06:06:54','2026-10-07 06:06:54'),('5b0f0777-6b1d-4358-80aa-8c1e9fdcea9f','App\\Notifications\\AnnouncementNotification','App\\Models\\User',1,'{\"actions\":[],\"body\":\"<p><strong>Notification must work<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Notification must work\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-06 11:02:44','2026-10-06 11:02:44'),('5bc65604-92dd-4744-89cd-bfafdbc56a14','App\\Notifications\\AnnouncementNotification','App\\Models\\User',7,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-10\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>Test 10<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Test 10\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-06 13:26:36','2026-10-06 13:26:36'),('5ed2d528-1abd-46ae-9b42-556682123f58','App\\Notifications\\AnnouncementNotification','App\\Models\\User',19,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"\\u10d2\\u10d0\\u10dc\\u10ea\\u10ee\\u10d0\\u10d3\\u10d4\\u10d1\\u10d8\\u10e1 \\u10dc\\u10d0\\u10ee\\u10d5\\u10d0\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-15\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>\\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"\\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 08:12:10','2026-10-08 08:12:10'),('6d3ff549-da2a-4302-a424-b8d5fc3dab1a','App\\Notifications\\AnnouncementNotification','App\\Models\\User',18,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-16\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>\\u10d2\\u10d0\\u10d3\\u10d0\\u10ee\\u10d3\\u10d8\\u10e1 \\u10e2\\u10d4\\u10e1\\u10e2\\u10d8<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"\\u10d2\\u10d0\\u10d3\\u10d0\\u10ee\\u10d3\\u10d8\\u10e1 \\u10e2\\u10d4\\u10e1\\u10e2\\u10d8\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 09:20:32','2026-10-08 09:20:32'),('6e3cdccc-9a75-4278-93c6-40b0177239d8','Asignua\\FilamentChat\\Notifications\\NewMessageNotification','App\\Models\\User',4,'{\"actions\":[{\"name\":\"open\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"Open chat\",\"shouldClose\":false,\"shouldMarkAsRead\":true,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building\\/chat?c=01M4B6P4YWCJZCVNQVGHQDN0CW\",\"view\":\"filament::components.link\"}],\"body\":\"\\u10d2\\u10d0\\u10db\\u10d0\\u10e0\\u10ef\\u10dd\\u10d1\\u10d0 \\u10d2\\u10d0\\u10db\\u10d0\\u10e0\\u10ef\\u10dd\\u10d1\\u10d0, \\u10db\\u10d4 \\u10d5\\u10d0\\u10e0 \\u10e3\\u10d1\\u10e0\\u10d0\\u10da\\u10dd \\u10db\\u10d0\\u10ea\\u10ee\\u10dd\\u10d5\\u10e0\\u10d4\\u10d1\\u10d4\\u10da\\u10d8\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-chat-bubble-left-right\",\"iconColor\":null,\"status\":null,\"title\":\"Gega Vachnadze in \\u201cApartment 12\\u201d\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-07 08:54:18','2026-10-07 08:54:18'),('6f5edd45-d763-4633-b8e1-ad022252e3bc','Asignua\\FilamentChat\\Notifications\\NewMessageNotification','App\\Models\\User',7,'{\"actions\":[{\"name\":\"open\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"Open chat\",\"shouldClose\":false,\"shouldMarkAsRead\":true,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building\\/chat?c=01M4B6P4YWCJZCVNQVGHQDN0CW\",\"view\":\"filament::components.link\"}],\"body\":\"Hello Hello \\u10db\\u10d4 \\u10d5\\u10d0\\u10e0 \\u10d7\\u10d0\\u10d5\\u10ef\\u10d3\\u10dd\\u10db\\u10d0\\u10e0\\u10d4\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-chat-bubble-left-right\",\"iconColor\":null,\"status\":null,\"title\":\"Giorgi Kobeshavidze in \\u201cApartment 12\\u201d\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-07 08:51:32','2026-10-07 08:51:32'),('88964d3d-bd1b-44d8-ad83-875bcace92f3','App\\Notifications\\AnnouncementNotification','App\\Models\\User',7,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-11\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>Now by only 1 url we can create 500 residents or more<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"I made a cool logic for resident\\/chairman\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-06 15:57:00','2026-10-06 15:57:00'),('917877dc-0133-4a09-92d5-b689d34fd47c','App\\Notifications\\AnnouncementNotification','App\\Models\\User',19,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-16\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>\\u10d2\\u10d0\\u10d3\\u10d0\\u10ee\\u10d3\\u10d8\\u10e1 \\u10e2\\u10d4\\u10e1\\u10e2\\u10d8<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"\\u10d2\\u10d0\\u10d3\\u10d0\\u10ee\\u10d3\\u10d8\\u10e1 \\u10e2\\u10d4\\u10e1\\u10e2\\u10d8\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 09:20:32','2026-10-08 09:20:32'),('982deac3-52aa-4f01-a540-d4641548c962','App\\Notifications\\AnnouncementNotification','App\\Models\\User',18,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-17\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>Test 1<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Test 1\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 09:38:49','2026-10-08 09:38:49'),('b1a30dad-55fb-4dc4-89b1-1ec50e953dff','Asignua\\FilamentChat\\Notifications\\NewMessageNotification','App\\Models\\User',19,'{\"actions\":[{\"name\":\"open\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"Open chat\",\"shouldClose\":false,\"shouldMarkAsRead\":true,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building\\/chat?c=01M4DAD98PD9413XWK4BTTYEDR\",\"view\":\"filament::components.link\"}],\"body\":\"\\u10d2\\u10d0\\u10db\\u10d0\\u10e0\\u10ef\\u10dd\\u10d1\\u10d0\\u10d7\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-chat-bubble-left-right\",\"iconColor\":null,\"status\":null,\"title\":\"goga in \\u201cApartment 12\\u201d\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 05:19:01','2026-10-08 05:19:01'),('c2217eb7-1995-460e-b45d-2c464ede589d','Asignua\\FilamentChat\\Notifications\\NewMessageNotification','App\\Models\\User',10,'{\"actions\":[{\"name\":\"open\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"Open chat\",\"shouldClose\":false,\"shouldMarkAsRead\":true,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building\\/chat?c=01M4DAD98PD9413XWK4BTTYEDR\",\"view\":\"filament::components.link\"}],\"body\":\"\\u10d2\\u10d0\\u10db\\u10d0\\u10e0\\u10ef\\u10dd\\u10d1\\u10d0\\u10d7\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-chat-bubble-left-right\",\"iconColor\":null,\"status\":null,\"title\":\"goga in \\u201cApartment 12\\u201d\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 05:19:01','2026-10-08 05:19:01'),('d10ddd1e-70a4-4145-9048-b3c0f8a82314','App\\Notifications\\AnnouncementNotification','App\\Models\\User',18,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"\\u10d2\\u10d0\\u10dc\\u10ea\\u10ee\\u10d0\\u10d3\\u10d4\\u10d1\\u10d8\\u10e1 \\u10dc\\u10d0\\u10ee\\u10d5\\u10d0\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-15\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>\\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"\\u10d5\\u10d0\\u10e0\\u10ef\\u10d8\\u10e8\\u10d8\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 08:12:10','2026-10-08 08:12:10'),('d70c238d-0ffe-44b7-8a34-fe1e06f26f7d','App\\Notifications\\AnnouncementNotification','App\\Models\\User',20,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-16\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>\\u10d2\\u10d0\\u10d3\\u10d0\\u10ee\\u10d3\\u10d8\\u10e1 \\u10e2\\u10d4\\u10e1\\u10e2\\u10d8<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"\\u10d2\\u10d0\\u10d3\\u10d0\\u10ee\\u10d3\\u10d8\\u10e1 \\u10e2\\u10d4\\u10e1\\u10e2\\u10d8\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 09:20:32','2026-10-08 09:20:32'),('d7e58678-2301-4e0b-855b-4faa7e2dbfa8','App\\Notifications\\AnnouncementNotification','App\\Models\\User',7,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"messages.view_announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-9\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>Must work<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Must work\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-06 11:41:00','2026-10-06 11:41:00'),('dbe1c1a3-e490-427f-a52b-d14ec43e3b7b','App\\Notifications\\AnnouncementNotification','App\\Models\\User',20,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-17\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>Test 1<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Test 1\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-08 09:38:49','2026-10-08 09:38:49'),('e3c5fabc-e4e7-4d86-8168-6e0651d2185e','App\\Notifications\\AnnouncementNotification','App\\Models\\User',1,'{\"actions\":[{\"name\":\"view\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"messages.view_announcement\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building#announcement-9\",\"view\":\"filament::components.link\"}],\"body\":\"<p><strong>Must work<\\/strong><\\/p>\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Must work\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-06 11:41:00','2026-10-06 11:41:00'),('f18dac52-2201-4db8-b1e8-a2a6f6e8e827','Asignua\\FilamentChat\\Notifications\\NewMessageNotification','App\\Models\\User',8,'{\"actions\":[{\"name\":\"open\",\"alpineClickHandler\":null,\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"Open chat\",\"shouldClose\":false,\"shouldMarkAsRead\":true,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"shouldPostToUrl\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building\\/chat?c=01M4B6P4YWCJZCVNQVGHQDN0CW\",\"view\":\"filament::components.link\"}],\"body\":\"Hello Hello \\u10db\\u10d4 \\u10d5\\u10d0\\u10e0 \\u10d7\\u10d0\\u10d5\\u10ef\\u10d3\\u10dd\\u10db\\u10d0\\u10e0\\u10d4\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-chat-bubble-left-right\",\"iconColor\":null,\"status\":null,\"title\":\"Giorgi Kobeshavidze in \\u201cApartment 12\\u201d\",\"view\":null,\"viewData\":[],\"format\":\"filament\"}',NULL,'2026-10-07 08:51:32','2026-10-07 08:51:32'),('f4497c6f-2ade-47ee-b120-7eb1297b7da8','App\\Notifications\\AnnouncementNotification','App\\Models\\User',8,'{\"title\":\"Test announcement\",\"message\":\"<p><strong>Test Announecement<\\/strong><\\/p>\",\"url\":\"http:\\/\\/tbilisi-hills.localhost:8000\\/building\\/announcements\\/5\\/edit\"}',NULL,'2026-10-06 10:50:32','2026-10-06 10:50:32');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `announcement_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `monthly_fee_id` bigint unsigned DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_monthly_fee_id_foreign` (`monthly_fee_id`),
  KEY `payments_announcement_id_foreign` (`announcement_id`),
  KEY `payments_user_id_foreign` (`user_id`),
  CONSTRAINT `payments_announcement_id_foreign` FOREIGN KEY (`announcement_id`) REFERENCES `announcements` (`id`) ON DELETE CASCADE,
  CONSTRAINT `payments_monthly_fee_id_foreign` FOREIGN KEY (`monthly_fee_id`) REFERENCES `monthly_fees` (`id`) ON DELETE CASCADE,
  CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'ViewAny:Announcement','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(2,'View:Announcement','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(3,'Create:Announcement','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(4,'Update:Announcement','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(5,'Delete:Announcement','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(6,'DeleteAny:Announcement','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(7,'Restore:Announcement','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(8,'ForceDelete:Announcement','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(9,'ForceDeleteAny:Announcement','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(10,'RestoreAny:Announcement','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(11,'Replicate:Announcement','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(12,'Reorder:Announcement','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(13,'ViewAny:Apartment','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(14,'View:Apartment','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(15,'Create:Apartment','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(16,'Update:Apartment','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(17,'Delete:Apartment','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(18,'DeleteAny:Apartment','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(19,'Restore:Apartment','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(20,'ForceDelete:Apartment','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(21,'ForceDeleteAny:Apartment','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(22,'RestoreAny:Apartment','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(23,'Replicate:Apartment','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(24,'Reorder:Apartment','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(25,'ViewAny:Expense','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(26,'View:Expense','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(27,'Create:Expense','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(28,'Update:Expense','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(29,'Delete:Expense','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(30,'DeleteAny:Expense','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(31,'Restore:Expense','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(32,'ForceDelete:Expense','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(33,'ForceDeleteAny:Expense','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(34,'RestoreAny:Expense','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(35,'Replicate:Expense','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(36,'Reorder:Expense','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(37,'ViewAny:MonthlyFee','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(38,'View:MonthlyFee','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(39,'Create:MonthlyFee','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(40,'Update:MonthlyFee','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(41,'Delete:MonthlyFee','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(42,'DeleteAny:MonthlyFee','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(43,'Restore:MonthlyFee','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(44,'ForceDelete:MonthlyFee','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(45,'ForceDeleteAny:MonthlyFee','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(46,'RestoreAny:MonthlyFee','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(47,'Replicate:MonthlyFee','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(48,'Reorder:MonthlyFee','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(49,'ViewAny:Payment','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(50,'View:Payment','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(51,'Create:Payment','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(52,'Update:Payment','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(53,'Delete:Payment','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(54,'DeleteAny:Payment','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(55,'Restore:Payment','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(56,'ForceDelete:Payment','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(57,'ForceDeleteAny:Payment','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(58,'RestoreAny:Payment','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(59,'Replicate:Payment','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(60,'Reorder:Payment','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(61,'ViewAny:Role','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(62,'View:Role','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(63,'Create:Role','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(64,'Update:Role','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(65,'Delete:Role','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(66,'DeleteAny:Role','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(67,'Restore:Role','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(68,'ForceDelete:Role','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(69,'ForceDeleteAny:Role','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(70,'RestoreAny:Role','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(71,'Replicate:Role','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(72,'Reorder:Role','web','2026-10-02 10:43:00','2026-10-02 10:43:00'),(73,'View:FinanceOverview','web','2026-10-02 10:43:00','2026-10-02 10:43:00');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(1,2),(2,2),(3,2),(4,2),(5,2),(13,2),(14,2),(15,2),(16,2),(17,2),(25,2),(26,2),(27,2),(28,2),(29,2),(37,2),(38,2),(39,2),(40,2),(41,2),(49,2),(50,2),(51,2),(52,2),(53,2),(73,2),(49,3),(50,3),(73,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super_admin','web','2026-10-02 10:42:59','2026-10-02 10:42:59'),(2,'Chairman','web','2026-10-02 10:48:35','2026-10-02 10:48:35'),(3,'Resident','web','2026-10-02 10:48:39','2026-10-02 10:48:39');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('t4MQtPqEzTmCYJhmdKOwhfQzA7p78maFRteBVn7i',17,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJ4Z1BiTHZWSnZtUVZxdTZkcXZ1WmZJcm5VRFFNcTYxZ0dIbDVKSjJsIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvdGJpbGlzaS1oaWxscy5sb2NhbGhvc3Q6ODAwMFwvYnVpbGRpbmdcL2FwYXJ0bWVudHNcL2Zsb29yXC8xIiwicm91dGUiOiJmaWxhbWVudC5idWlsZGluZy5yZXNvdXJjZXMuYXBhcnRtZW50cy5tYW5hZ2UifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjE3LCJwYXNzd29yZF9oYXNoX3dlYiI6IjAwNTcwZjI4MTg0MTY4MjJhMjA1MTlkMWFhMTI0NjI2YjFiMDYzYTIxOTUwZjE1YzRmNDA5NjFhMWVkOTdlODAiLCJsb2NhbGUiOiJrYSIsInRhYmxlcyI6eyJkODMyMzA3ZmRiZTUyOTIyNGFkMDNmOWVlYTFhMGI0ZF9jb2x1bW5zIjpbeyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im51bWJlciIsImxhYmVsIjoiXHUxMGUxXHUxMGQwXHUxMGUwXHUxMGQ3XHUxMGUzXHUxMGRhXHUxMGQ4IiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImFwYXJ0bWVudHNfY291bnQiLCJsYWJlbCI6Ilx1MTBkMVx1MTBkOFx1MTBkY1x1MTBkMFx1MTBkN1x1MTBkMCBcdTEwZTBcdTEwZDBcdTEwZGRcdTEwZDNcdTEwZDRcdTEwZGNcdTEwZGRcdTEwZDFcdTEwZDAiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfV0sImRjZTUzZTU0YjM0NGMzYzM1MTUyZjE5YmY5MjE0ZWVhX2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiYXBhcnRtZW50X251bWJlciIsImxhYmVsIjoiXHUxMGQ3XHUxMGU1XHUxMGQ1XHUxMGQ0XHUxMGRjXHUxMGQ4IFx1MTBkMVx1MTBkOFx1MTBkY1x1MTBkOFx1MTBlMSBcdTEwZGNcdTEwZGRcdTEwZGJcdTEwZDRcdTEwZTBcdTEwZDgiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidXNlcnMubmFtZSIsImxhYmVsIjoiXHUxMGRiXHUxMGQwXHUxMGVhXHUxMGVlXHUxMGRkXHUxMGQ1XHUxMGUwXHUxMGQ0XHUxMGQxXHUxMGRhXHUxMGQ0XHUxMGQxXHUxMGQ4IiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH1dfX0=',1791469840);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tenants`
--

DROP TABLE IF EXISTS `tenants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tenants` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenants`
--

LOCK TABLES `tenants` WRITE;
/*!40000 ALTER TABLE `tenants` DISABLE KEYS */;
INSERT INTO `tenants` VALUES ('House N2','2026-10-06 13:35:35','2026-10-06 13:35:35','{\"domain\": \"House_2\"}'),('new_house','2026-09-30 09:50:51','2026-10-06 02:38:32','{\"domain\": \"tbilisi_hills\", \"created_at\": \"2026-09-30 13:50:51\", \"updated_at\": \"2026-09-30 13:50:51\"}');
/*!40000 ALTER TABLE `tenants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `apartment_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_apartment_id_foreign` (`apartment_id`),
  CONSTRAINT `users_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'Super Admin','superadmin@building.test',NULL,'$2y$12$./l0/Nh7vMJZHh0Awszl4.VoHVFZOsPE12C99GjnwS3Wh1.l4xbBa',1,'mgKSxbrPJemFPpnk0lnFWQo0Y1tKTGiihRJXmgQJMygRNbBVnjcVDaxbbC9s','2026-10-04 01:51:28','2026-10-08 03:08:34',NULL),(10,'Niki Datunashvili','Nikidatunashvili2008@gmail.com',NULL,'$2y$12$eW23kxS7VD.yDBSULj9nkePZVyr3dur2C8QlMmPzkg4UGDJV5.DNS',0,NULL,'2026-10-08 02:12:15','2026-10-08 02:12:15',NULL),(17,'goga','jamesisgood@gmail.com',NULL,'$2y$12$XJzjVJh2Ij9oWxzM6EtEZOBGuZIiPK0wrrmXwP/.UzJlyjHrYlY2e',0,NULL,'2026-10-08 03:04:29','2026-10-08 09:19:52',119),(18,'Gega Vachnadze','gegukavachnadze2007@gmail.com',NULL,'$2y$12$0lfkEPgBt29Q1NcA6oP4N.BQE1jvsxwTe3w5YRCsYqckBcyIeynB6',0,NULL,'2026-10-08 04:45:07','2026-10-08 04:45:07',171),(19,'lado','ladomagaria123@gmail.com',NULL,'$2y$12$iZFZZc8PGDrZLYOTt0I1BeznRQp88106DfVbY99Pk/Qs1WN9FKvOu',0,NULL,'2026-10-08 05:16:13','2026-10-08 05:16:13',125),(20,'gerondi','gerondi@gmail.com',NULL,'$2y$12$nj15upzBiYMC/NpWICJTROvnBLci7nUIhlCEHhNlF8d/PRLALWMcy',0,NULL,'2026-10-08 07:14:44','2026-10-08 07:14:44',180),(21,'new_member','new_member@gmail.com',NULL,'$2y$12$JxvclkIi3RPmlIMQkifWbutYOJlJtH2RK3POzrzd.Oe4EiEbq2V.K',0,NULL,'2026-10-08 09:28:41','2026-10-08 09:28:41',197),(22,'Resident_1','Resident@gmail.com',NULL,'$2y$12$j0CRANo3KwS9/t.Z3SqJZuEIQhBZ5FZj.x393AGGdNtiVddA0aHoS',0,NULL,'2026-10-08 09:58:48','2026-10-08 09:58:48',169),(23,'Resident_2','Resident2@gmail.com',NULL,'$2y$12$HfL/SoJrnzQYRzj.NugArOk3Jton87Zi5Z8QoC1dxUo9GOZnoh4F.',0,NULL,'2026-10-08 10:00:13','2026-10-08 10:00:13',169);
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

-- Dump completed on 2026-10-08 18:33:05
