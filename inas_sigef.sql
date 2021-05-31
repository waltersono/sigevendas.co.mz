-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: inas_sigef
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

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
-- Table structure for table `academic_levels`
--

DROP TABLE IF EXISTS `academic_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academic_levels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `academic_levels_designation_unique` (`designation`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_levels`
--

LOCK TABLES `academic_levels` WRITE;
/*!40000 ALTER TABLE `academic_levels` DISABLE KEYS */;
INSERT INTO `academic_levels` VALUES (1,'N/A','2020-08-05 12:39:33','2020-08-05 12:39:33'),(2,'Elementar','2020-08-05 12:39:33','2020-08-05 12:39:33'),(3,'Basico Geral','2020-08-05 12:39:33','2020-08-05 12:39:33'),(4,'Medio Geral','2020-08-05 12:39:33','2020-08-05 12:39:33'),(5,'Medio Profissional','2020-08-05 12:39:33','2020-08-05 12:39:33'),(6,'Licenciatura','2020-08-05 12:39:33','2020-08-05 12:39:33'),(7,'Mestrado','2020-08-05 12:39:33','2020-08-05 12:39:33'),(8,'Doutorado','2020-08-05 12:39:33','2020-08-05 12:39:33');
/*!40000 ALTER TABLE `academic_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `careers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `careers_designation_unique` (`designation`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `careers`
--

LOCK TABLES `careers` WRITE;
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;
INSERT INTO `careers` VALUES (1,'Tecnico Superior N1','2020-08-05 12:39:33','2020-08-05 12:39:33'),(2,'Tecnico Superior N2','2020-08-05 12:39:33','2020-08-05 12:39:33'),(3,'Tecnico Profissional','2020-08-05 12:39:34','2020-08-05 12:39:34'),(4,'Tecnico','2020-08-05 12:39:34','2020-08-05 12:39:34');
/*!40000 ALTER TABLE `careers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('short','long') COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` mediumint(8) unsigned NOT NULL,
  `academicLevel_id` bigint(20) unsigned NOT NULL,
  `institution_id` mediumint(8) unsigned NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delegations`
--

DROP TABLE IF EXISTS `delegations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delegations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deputy_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `delegations_designation_unique` (`designation`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delegations`
--

LOCK TABLES `delegations` WRITE;
/*!40000 ALTER TABLE `delegations` DISABLE KEYS */;
INSERT INTO `delegations` VALUES (1,'INAS Maputo Cidade',NULL,'2020-08-05 12:39:15','2020-08-05 12:39:15'),(2,'INAS Matola',NULL,'2020-08-05 12:39:15','2020-08-05 12:39:15'),(3,'INAS Manhica',NULL,'2020-08-05 12:39:15','2020-08-05 12:39:15'),(4,'INAS Xai-xai',NULL,'2020-08-05 12:39:15','2020-08-05 12:39:15'),(5,'INAS Chibuto',NULL,'2020-08-05 12:39:15','2020-08-05 12:39:15'),(6,'INAS Chokwe',NULL,'2020-08-05 12:39:15','2020-08-05 12:39:15'),(7,'INAS Chicualacuala',NULL,'2020-08-05 12:39:15','2020-08-05 12:39:15'),(8,'INAS Inhambane',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(9,'INAS Maxixe',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(10,'INAS Vilanculos',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(11,'INAS Chimoio',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(12,'INAS Barue',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(13,'INAS Machanga',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(14,'INAS Beira',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(15,'INAS Caia',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(16,'INAS Tete',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(17,'INAS Moatize',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(18,'INAS Maravia',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(19,'INAS Quelimane',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(20,'INAS Mocuba',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(21,'INAS Gorue',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(22,'INAS Angoche',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(23,'INAS Nampula',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(24,'INAS Ribaue',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(25,'INAS Nacala',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(26,'INAS Cuamba',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(27,'INAS Marupa',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(28,'INAS Pemba',NULL,'2020-08-05 12:39:16','2020-08-05 12:39:16'),(29,'INAS Motepuez',NULL,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(30,'INAS Mocimboa da Praia',NULL,'2020-08-05 12:39:17','2020-08-05 12:39:17');
/*!40000 ALTER TABLE `delegations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_of_department_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_designation_unique` (`designation`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'DPE',NULL,'2020-08-05 12:39:13','2020-08-05 12:39:13'),(2,'DAS',NULL,'2020-08-05 12:39:13','2020-08-05 12:39:13'),(3,'DPD',NULL,'2020-08-05 12:39:14','2020-08-05 12:39:14'),(4,'DAF',NULL,'2020-08-05 12:39:14','2020-08-05 12:39:14'),(5,'DAC',NULL,'2020-08-05 12:39:14','2020-08-05 12:39:14'),(6,'DRH',NULL,'2020-08-05 12:39:14','2020-08-05 12:39:14'),(7,'UGEA',NULL,'2020-08-05 12:39:15','2020-08-05 12:39:15');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('m','f','o') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nuit` bigint(20) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career_id` mediumint(8) unsigned NOT NULL,
  `academicLevel_id` tinyint(3) unsigned NOT NULL,
  `central` tinyint(1) NOT NULL,
  `division_id` bigint(20) unsigned DEFAULT NULL,
  `repartition_id` bigint(20) unsigned DEFAULT NULL,
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_id_number_unique` (`id_number`),
  UNIQUE KEY `employees_nuit_unique` (`nuit`),
  UNIQUE KEY `employees_email_unique` (`email`),
  UNIQUE KEY `employees_contact_1_unique` (`contact_1`),
  UNIQUE KEY `employees_contact_2_unique` (`contact_2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `institutions`
--

DROP TABLE IF EXISTS `institutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institutions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `institutions_designation_unique` (`designation`),
  UNIQUE KEY `institutions_address_unique` (`address`),
  UNIQUE KEY `institutions_contact_1_unique` (`contact_1`),
  UNIQUE KEY `institutions_contact_2_unique` (`contact_2`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institutions`
--

LOCK TABLES `institutions` WRITE;
/*!40000 ALTER TABLE `institutions` DISABLE KEYS */;
INSERT INTO `institutions` VALUES (1,'Suscipit Tempore Eum Fugiat.','36067 Carter Square Suite 433\nNorth Zoemouth, NC 47532','275-621-4713 x00026','(491) 736-4395 x85973','2020-08-05 12:39:34','2020-08-05 12:39:34'),(2,'Asperiores Similique Vel Cupiditate.','516 Vandervort Lodge Apt. 458\nKatherinetown, ND 82218','+1-223-992-5709','1-757-458-9963 x52047','2020-08-05 12:39:34','2020-08-05 12:39:34'),(3,'Omnis Accusantium Quis.','941 Kozey Walks Suite 608\nNorth Katlynnton, MN 67760','(558) 860-1016 x420','215-547-8234','2020-08-05 12:39:34','2020-08-05 12:39:34'),(4,'Minus Quasi.','6738 Orn Street Apt. 661\nWest Thaliafort, DC 80041-9980','572-367-7214 x61485','+19098226033','2020-08-05 12:39:34','2020-08-05 12:39:34'),(5,'Dolores Officiis Quia At.','9331 Hassie Parks\nTheaville, VA 37465-5500','480.260.7648 x55160','+19862983472','2020-08-05 12:39:34','2020-08-05 12:39:34'),(6,'Voluptates Sit Tempora.','4019 Natalie Square Apt. 127\nDenesikhaven, MA 47537-2743','516-227-7936 x8021','(508) 467-6661 x631','2020-08-05 12:39:34','2020-08-05 12:39:34'),(7,'Rerum Maxime In.','27987 Rodriguez Causeway\nDavisbury, AZ 30707','316-718-9344','296-699-3572 x6708','2020-08-05 12:39:34','2020-08-05 12:39:34'),(8,'Voluptas Voluptates Enim.','24019 Vivianne Camp\nBulahton, VA 04613-3259','1-874-471-2364 x801','(456) 941-4084','2020-08-05 12:39:34','2020-08-05 12:39:34'),(9,'Rerum Asperiores Perspiciatis.','557 Jolie Road Suite 294\nWest Luther, AK 83640','247.961.4574','1-656-278-5842 x8395','2020-08-05 12:39:34','2020-08-05 12:39:34');
/*!40000 ALTER TABLE `institutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2020_06_06_114526_create_organic_unities_table',1),(4,'2020_06_07_065351_create_departments_table',1),(5,'2020_06_09_120154_create_delegations_table',1),(6,'2020_06_09_125918_create_careers_table',1),(7,'2020_06_09_130940_create_academic_levels_table',1),(8,'2020_06_10_073504_create_repartitions_table',1),(9,'2020_06_11_085243_create_employees_table',1),(10,'2020_06_11_104927_create_institutions_table',1),(11,'2020_06_14_122039_create_courses_table',1),(12,'2020_06_22_180853_create_training_table',1),(13,'2020_07_01_073133_create_reports_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organic_unities`
--

DROP TABLE IF EXISTS `organic_unities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organic_unities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `general_manager_id` int(10) unsigned DEFAULT NULL,
  `deputy_director_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `organic_unities_designation_unique` (`designation`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organic_unities`
--

LOCK TABLES `organic_unities` WRITE;
/*!40000 ALTER TABLE `organic_unities` DISABLE KEYS */;
INSERT INTO `organic_unities` VALUES (1,'INAS Central',NULL,NULL,'2020-08-05 12:39:13','2020-08-05 12:39:13');
/*!40000 ALTER TABLE `organic_unities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repartitions`
--

DROP TABLE IF EXISTS `repartitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repartitions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_of_repartition_id` bigint(20) unsigned DEFAULT NULL,
  `central` tinyint(1) NOT NULL,
  `division_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=285 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repartitions`
--

LOCK TABLES `repartitions` WRITE;
/*!40000 ALTER TABLE `repartitions` DISABLE KEYS */;
INSERT INTO `repartitions` VALUES (1,'RPE',NULL,1,1,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(2,'RMA',NULL,1,1,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(3,'RTICI',NULL,1,1,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(4,'RF',NULL,1,6,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(5,'RGP',NULL,1,6,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(6,'RAS',NULL,1,2,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(7,'RSS',NULL,1,2,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(8,'RDP',NULL,1,3,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(9,'RPIGR',NULL,1,3,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(10,'RAC',NULL,1,5,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(11,'RA',NULL,1,5,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(12,'RC',NULL,1,4,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(13,'RP',NULL,1,4,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(14,'RAC',NULL,1,7,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(15,'RPE',NULL,0,1,'2020-08-05 12:39:17','2020-08-05 12:39:17'),(16,'RMA',NULL,0,1,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(17,'RTICI',NULL,0,1,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(18,'RAF',NULL,0,1,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(19,'RP',NULL,0,1,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(20,'RPD',NULL,0,1,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(21,'RAS',NULL,0,1,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(22,'RRH',NULL,0,1,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(23,'RA',NULL,0,1,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(24,'RPE',NULL,0,2,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(25,'RMA',NULL,0,2,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(26,'RTICI',NULL,0,2,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(27,'RAF',NULL,0,2,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(28,'RP',NULL,0,2,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(29,'RPD',NULL,0,2,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(30,'RAS',NULL,0,2,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(31,'RRH',NULL,0,2,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(32,'RA',NULL,0,2,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(33,'RPE',NULL,0,3,'2020-08-05 12:39:18','2020-08-05 12:39:18'),(34,'RMA',NULL,0,3,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(35,'RTICI',NULL,0,3,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(36,'RAF',NULL,0,3,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(37,'RP',NULL,0,3,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(38,'RPD',NULL,0,3,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(39,'RAS',NULL,0,3,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(40,'RRH',NULL,0,3,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(41,'RA',NULL,0,3,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(42,'RPE',NULL,0,4,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(43,'RMA',NULL,0,4,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(44,'RTICI',NULL,0,4,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(45,'RAF',NULL,0,4,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(46,'RP',NULL,0,4,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(47,'RPD',NULL,0,4,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(48,'RAS',NULL,0,4,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(49,'RRH',NULL,0,4,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(50,'RA',NULL,0,4,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(51,'RPE',NULL,0,5,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(52,'RMA',NULL,0,5,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(53,'RTICI',NULL,0,5,'2020-08-05 12:39:19','2020-08-05 12:39:19'),(54,'RAF',NULL,0,5,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(55,'RP',NULL,0,5,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(56,'RPD',NULL,0,5,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(57,'RAS',NULL,0,5,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(58,'RRH',NULL,0,5,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(59,'RA',NULL,0,5,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(60,'RPE',NULL,0,6,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(61,'RMA',NULL,0,6,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(62,'RTICI',NULL,0,6,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(63,'RAF',NULL,0,6,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(64,'RP',NULL,0,6,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(65,'RPD',NULL,0,6,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(66,'RAS',NULL,0,6,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(67,'RRH',NULL,0,6,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(68,'RA',NULL,0,6,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(69,'RPE',NULL,0,7,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(70,'RMA',NULL,0,7,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(71,'RTICI',NULL,0,7,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(72,'RAF',NULL,0,7,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(73,'RP',NULL,0,7,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(74,'RPD',NULL,0,7,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(75,'RAS',NULL,0,7,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(76,'RRH',NULL,0,7,'2020-08-05 12:39:20','2020-08-05 12:39:20'),(77,'RA',NULL,0,7,'2020-08-05 12:39:21','2020-08-05 12:39:21'),(78,'RPE',NULL,0,8,'2020-08-05 12:39:21','2020-08-05 12:39:21'),(79,'RMA',NULL,0,8,'2020-08-05 12:39:21','2020-08-05 12:39:21'),(80,'RTICI',NULL,0,8,'2020-08-05 12:39:21','2020-08-05 12:39:21'),(81,'RAF',NULL,0,8,'2020-08-05 12:39:21','2020-08-05 12:39:21'),(82,'RP',NULL,0,8,'2020-08-05 12:39:21','2020-08-05 12:39:21'),(83,'RPD',NULL,0,8,'2020-08-05 12:39:21','2020-08-05 12:39:21'),(84,'RAS',NULL,0,8,'2020-08-05 12:39:21','2020-08-05 12:39:21'),(85,'RRH',NULL,0,8,'2020-08-05 12:39:21','2020-08-05 12:39:21'),(86,'RA',NULL,0,8,'2020-08-05 12:39:21','2020-08-05 12:39:21'),(87,'RPE',NULL,0,9,'2020-08-05 12:39:21','2020-08-05 12:39:21'),(88,'RMA',NULL,0,9,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(89,'RTICI',NULL,0,9,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(90,'RAF',NULL,0,9,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(91,'RP',NULL,0,9,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(92,'RPD',NULL,0,9,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(93,'RAS',NULL,0,9,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(94,'RRH',NULL,0,9,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(95,'RA',NULL,0,9,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(96,'RPE',NULL,0,10,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(97,'RMA',NULL,0,10,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(98,'RTICI',NULL,0,10,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(99,'RAF',NULL,0,10,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(100,'RP',NULL,0,10,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(101,'RPD',NULL,0,10,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(102,'RAS',NULL,0,10,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(103,'RRH',NULL,0,10,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(104,'RA',NULL,0,10,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(105,'RPE',NULL,0,11,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(106,'RMA',NULL,0,11,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(107,'RTICI',NULL,0,11,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(108,'RAF',NULL,0,11,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(109,'RP',NULL,0,11,'2020-08-05 12:39:22','2020-08-05 12:39:22'),(110,'RPD',NULL,0,11,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(111,'RAS',NULL,0,11,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(112,'RRH',NULL,0,11,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(113,'RA',NULL,0,11,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(114,'RPE',NULL,0,12,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(115,'RMA',NULL,0,12,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(116,'RTICI',NULL,0,12,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(117,'RAF',NULL,0,12,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(118,'RP',NULL,0,12,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(119,'RPD',NULL,0,12,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(120,'RAS',NULL,0,12,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(121,'RRH',NULL,0,12,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(122,'RA',NULL,0,12,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(123,'RPE',NULL,0,13,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(124,'RMA',NULL,0,13,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(125,'RTICI',NULL,0,13,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(126,'RAF',NULL,0,13,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(127,'RP',NULL,0,13,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(128,'RPD',NULL,0,13,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(129,'RAS',NULL,0,13,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(130,'RRH',NULL,0,13,'2020-08-05 12:39:23','2020-08-05 12:39:23'),(131,'RA',NULL,0,13,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(132,'RPE',NULL,0,14,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(133,'RMA',NULL,0,14,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(134,'RTICI',NULL,0,14,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(135,'RAF',NULL,0,14,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(136,'RP',NULL,0,14,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(137,'RPD',NULL,0,14,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(138,'RAS',NULL,0,14,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(139,'RRH',NULL,0,14,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(140,'RA',NULL,0,14,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(141,'RPE',NULL,0,15,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(142,'RMA',NULL,0,15,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(143,'RTICI',NULL,0,15,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(144,'RAF',NULL,0,15,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(145,'RP',NULL,0,15,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(146,'RPD',NULL,0,15,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(147,'RAS',NULL,0,15,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(148,'RRH',NULL,0,15,'2020-08-05 12:39:24','2020-08-05 12:39:24'),(149,'RA',NULL,0,15,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(150,'RPE',NULL,0,16,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(151,'RMA',NULL,0,16,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(152,'RTICI',NULL,0,16,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(153,'RAF',NULL,0,16,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(154,'RP',NULL,0,16,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(155,'RPD',NULL,0,16,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(156,'RAS',NULL,0,16,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(157,'RRH',NULL,0,16,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(158,'RA',NULL,0,16,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(159,'RPE',NULL,0,17,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(160,'RMA',NULL,0,17,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(161,'RTICI',NULL,0,17,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(162,'RAF',NULL,0,17,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(163,'RP',NULL,0,17,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(164,'RPD',NULL,0,17,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(165,'RAS',NULL,0,17,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(166,'RRH',NULL,0,17,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(167,'RA',NULL,0,17,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(168,'RPE',NULL,0,18,'2020-08-05 12:39:25','2020-08-05 12:39:25'),(169,'RMA',NULL,0,18,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(170,'RTICI',NULL,0,18,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(171,'RAF',NULL,0,18,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(172,'RP',NULL,0,18,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(173,'RPD',NULL,0,18,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(174,'RAS',NULL,0,18,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(175,'RRH',NULL,0,18,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(176,'RA',NULL,0,18,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(177,'RPE',NULL,0,19,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(178,'RMA',NULL,0,19,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(179,'RTICI',NULL,0,19,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(180,'RAF',NULL,0,19,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(181,'RP',NULL,0,19,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(182,'RPD',NULL,0,19,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(183,'RAS',NULL,0,19,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(184,'RRH',NULL,0,19,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(185,'RA',NULL,0,19,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(186,'RPE',NULL,0,20,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(187,'RMA',NULL,0,20,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(188,'RTICI',NULL,0,20,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(189,'RAF',NULL,0,20,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(190,'RP',NULL,0,20,'2020-08-05 12:39:26','2020-08-05 12:39:26'),(191,'RPD',NULL,0,20,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(192,'RAS',NULL,0,20,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(193,'RRH',NULL,0,20,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(194,'RA',NULL,0,20,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(195,'RPE',NULL,0,21,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(196,'RMA',NULL,0,21,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(197,'RTICI',NULL,0,21,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(198,'RAF',NULL,0,21,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(199,'RP',NULL,0,21,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(200,'RPD',NULL,0,21,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(201,'RAS',NULL,0,21,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(202,'RRH',NULL,0,21,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(203,'RA',NULL,0,21,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(204,'RPE',NULL,0,22,'2020-08-05 12:39:27','2020-08-05 12:39:27'),(205,'RMA',NULL,0,22,'2020-08-05 12:39:28','2020-08-05 12:39:28'),(206,'RTICI',NULL,0,22,'2020-08-05 12:39:28','2020-08-05 12:39:28'),(207,'RAF',NULL,0,22,'2020-08-05 12:39:28','2020-08-05 12:39:28'),(208,'RP',NULL,0,22,'2020-08-05 12:39:28','2020-08-05 12:39:28'),(209,'RPD',NULL,0,22,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(210,'RAS',NULL,0,22,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(211,'RRH',NULL,0,22,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(212,'RA',NULL,0,22,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(213,'RPE',NULL,0,23,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(214,'RMA',NULL,0,23,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(215,'RTICI',NULL,0,23,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(216,'RAF',NULL,0,23,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(217,'RP',NULL,0,23,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(218,'RPD',NULL,0,23,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(219,'RAS',NULL,0,23,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(220,'RRH',NULL,0,23,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(221,'RA',NULL,0,23,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(222,'RPE',NULL,0,24,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(223,'RMA',NULL,0,24,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(224,'RTICI',NULL,0,24,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(225,'RAF',NULL,0,24,'2020-08-05 12:39:29','2020-08-05 12:39:29'),(226,'RP',NULL,0,24,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(227,'RPD',NULL,0,24,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(228,'RAS',NULL,0,24,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(229,'RRH',NULL,0,24,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(230,'RA',NULL,0,24,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(231,'RPE',NULL,0,25,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(232,'RMA',NULL,0,25,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(233,'RTICI',NULL,0,25,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(234,'RAF',NULL,0,25,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(235,'RP',NULL,0,25,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(236,'RPD',NULL,0,25,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(237,'RAS',NULL,0,25,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(238,'RRH',NULL,0,25,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(239,'RA',NULL,0,25,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(240,'RPE',NULL,0,26,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(241,'RMA',NULL,0,26,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(242,'RTICI',NULL,0,26,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(243,'RAF',NULL,0,26,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(244,'RP',NULL,0,26,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(245,'RPD',NULL,0,26,'2020-08-05 12:39:30','2020-08-05 12:39:30'),(246,'RAS',NULL,0,26,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(247,'RRH',NULL,0,26,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(248,'RA',NULL,0,26,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(249,'RPE',NULL,0,27,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(250,'RMA',NULL,0,27,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(251,'RTICI',NULL,0,27,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(252,'RAF',NULL,0,27,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(253,'RP',NULL,0,27,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(254,'RPD',NULL,0,27,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(255,'RAS',NULL,0,27,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(256,'RRH',NULL,0,27,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(257,'RA',NULL,0,27,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(258,'RPE',NULL,0,28,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(259,'RMA',NULL,0,28,'2020-08-05 12:39:31','2020-08-05 12:39:31'),(260,'RTICI',NULL,0,28,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(261,'RAF',NULL,0,28,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(262,'RP',NULL,0,28,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(263,'RPD',NULL,0,28,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(264,'RAS',NULL,0,28,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(265,'RRH',NULL,0,28,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(266,'RA',NULL,0,28,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(267,'RPE',NULL,0,29,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(268,'RMA',NULL,0,29,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(269,'RTICI',NULL,0,29,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(270,'RAF',NULL,0,29,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(271,'RP',NULL,0,29,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(272,'RPD',NULL,0,29,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(273,'RAS',NULL,0,29,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(274,'RRH',NULL,0,29,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(275,'RA',NULL,0,29,'2020-08-05 12:39:32','2020-08-05 12:39:32'),(276,'RPE',NULL,0,30,'2020-08-05 12:39:33','2020-08-05 12:39:33'),(277,'RMA',NULL,0,30,'2020-08-05 12:39:33','2020-08-05 12:39:33'),(278,'RTICI',NULL,0,30,'2020-08-05 12:39:33','2020-08-05 12:39:33'),(279,'RAF',NULL,0,30,'2020-08-05 12:39:33','2020-08-05 12:39:33'),(280,'RP',NULL,0,30,'2020-08-05 12:39:33','2020-08-05 12:39:33'),(281,'RPD',NULL,0,30,'2020-08-05 12:39:33','2020-08-05 12:39:33'),(282,'RAS',NULL,0,30,'2020-08-05 12:39:33','2020-08-05 12:39:33'),(283,'RRH',NULL,0,30,'2020-08-05 12:39:33','2020-08-05 12:39:33'),(284,'RA',NULL,0,30,'2020-08-05 12:39:33','2020-08-05 12:39:33');
/*!40000 ALTER TABLE `repartitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reports_designation_unique` (`designation`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` VALUES (1,'Informacao do Nivel Academico','2020-08-05 12:39:34','2020-08-05 12:39:34'),(2,'Funcionarios Estudantes','2020-08-05 12:39:35','2020-08-05 12:39:35'),(3,'Funcionarios Graduados','2020-08-05 12:39:35','2020-08-05 12:39:35'),(4,'Funcionarios Formados na Area Especifica','2020-08-05 12:39:35','2020-08-05 12:39:35');
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trainings`
--

DROP TABLE IF EXISTS `trainings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trainings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) unsigned NOT NULL,
  `employee_id` bigint(20) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trainings`
--

LOCK TABLES `trainings` WRITE;
/*!40000 ALTER TABLE `trainings` DISABLE KEYS */;
/*!40000 ALTER TABLE `trainings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Operator','Administrator') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Operator',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ollie Koelpin','nienow.haskell@turcotte.com','2020-08-05 12:39:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Operator','Chs70Nwef8EOfDFhZuLH19hqogReYE75tLampQC43iDzAAcEJIQE0sflc8uu','2020-08-05 12:39:13','2020-08-05 12:39:13'),(2,'Miss Eldora Krajcik DVM','root@root.com','2020-08-05 12:39:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Administrator','1A2i3zzwC8tTAEhnuSTQCc2LBHHpS2SnM3ZEVPsS0EOhvFrZDCgNgfmA7Snd','2020-08-05 12:39:13','2020-08-05 12:39:13'),(3,'Jennifer Oberbrunner','marjorie.dibbert@emmerich.info','2020-08-05 12:39:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Operator','sTcNKq8Oe7','2020-08-05 12:39:13','2020-08-05 12:39:13'),(4,'Gabriella Hoppe','edwin.blick@stracke.org','2020-08-05 12:39:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Administrator','ZBXnPGg6bX','2020-08-05 12:39:13','2020-08-05 12:39:13'),(5,'Yazmin Hoeger PhD','dominic74@gmail.com','2020-08-05 12:39:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Operator','dXDP5IeqDq','2020-08-05 12:39:13','2020-08-05 12:39:13');
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

-- Dump completed on 2020-09-04  8:55:17
