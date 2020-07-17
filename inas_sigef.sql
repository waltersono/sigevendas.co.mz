-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: inas_sigef
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_levels`
--

LOCK TABLES `academic_levels` WRITE;
/*!40000 ALTER TABLE `academic_levels` DISABLE KEYS */;
INSERT INTO `academic_levels` VALUES (1,'Elementar','2020-06-12 06:00:48','2020-06-12 06:00:48'),(2,'Basico Geral','2020-06-12 06:00:49','2020-06-12 06:00:49'),(3,'Medio Geral','2020-06-12 06:00:49','2020-06-12 06:00:49'),(4,'Medio Profissional','2020-06-12 06:00:49','2020-06-12 06:00:49'),(5,'Superior','2020-06-12 06:00:49','2020-06-12 06:00:49'),(6,'Mestre','2020-06-12 06:00:49','2020-06-12 06:00:49'),(7,'Doutorado','2020-06-12 06:00:49','2020-06-12 06:00:49');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `careers`
--

LOCK TABLES `careers` WRITE;
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;
INSERT INTO `careers` VALUES (1,'Dolor','2020-06-12 06:00:49','2020-06-12 06:00:49'),(3,'Sunt','2020-06-12 06:00:49','2020-06-12 06:00:49'),(4,'Et','2020-06-12 06:00:49','2020-06-12 06:00:49'),(5,'Eveniet','2020-06-12 06:00:49','2020-06-12 06:00:49'),(6,'Consequatur','2020-06-12 06:00:49','2020-06-12 06:00:49'),(7,'Asperiores','2020-06-12 06:00:49','2020-06-12 06:00:49'),(8,'Rerum','2020-06-12 06:00:49','2020-06-12 06:00:49'),(9,'Autem','2020-06-12 06:00:49','2020-06-12 06:00:49'),(10,'Velit','2020-06-12 06:00:49','2020-06-12 06:00:49');
/*!40000 ALTER TABLE `careers` ENABLE KEYS */;
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
INSERT INTO `delegations` VALUES (1,'INAS Maputo Cidade',NULL,'2020-06-12 06:00:46','2020-06-12 06:00:46'),(2,'INAS Matola',NULL,'2020-06-12 06:00:46','2020-06-12 06:00:46'),(3,'INAS Manhica',NULL,'2020-06-12 06:00:46','2020-06-12 06:00:46'),(4,'INAS Xai-xai',NULL,'2020-06-12 06:00:46','2020-06-12 06:00:46'),(5,'INAS Chibuto',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(6,'INAS Chokwe',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(7,'INAS Chicualacuala',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(8,'INAS Inhambane',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(9,'INAS Maxixe',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(10,'INAS Vilanculos',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(11,'INAS Chimoio',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(12,'INAS Barue',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(13,'INAS Machanga',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(14,'INAS Beira',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(15,'INAS Caia',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(16,'INAS Tete',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(17,'INAS Moatize',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(18,'INAS Maravia',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(19,'INAS Quelimane',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(20,'INAS Mocuba',NULL,'2020-06-12 06:00:47','2020-06-12 06:00:47'),(21,'INAS Gorue',NULL,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(22,'INAS Angoche',NULL,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(23,'INAS Nampula',NULL,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(24,'INAS Ribaue',NULL,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(25,'INAS Nacala',NULL,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(26,'INAS Cuamba',NULL,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(27,'INAS Marupa',NULL,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(28,'INAS Pemba',NULL,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(29,'INAS Motepuez',NULL,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(30,'INAS Mocimboa da Praia',NULL,'2020-06-12 06:00:48','2020-06-12 06:00:48');
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
INSERT INTO `departments` VALUES (1,'DPE',NULL,'2020-06-12 06:00:46','2020-06-12 06:00:46'),(2,'DAS',NULL,'2020-06-12 06:00:46','2020-06-12 06:00:46'),(3,'DPD',NULL,'2020-06-12 06:00:46','2020-06-12 06:00:46'),(4,'DAF',NULL,'2020-06-12 06:00:46','2020-06-12 06:00:46'),(5,'DAC',NULL,'2020-06-12 06:00:46','2020-06-12 06:00:46'),(6,'DRH',NULL,'2020-06-12 06:00:46','2020-06-12 06:00:46'),(7,'UGEA',NULL,'2020-06-12 06:00:46','2020-06-12 06:00:46');
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
  `carrer_id` mediumint(8) unsigned NOT NULL,
  `academicLevel_id` tinyint(3) unsigned NOT NULL,
  `repartition_id` bigint(20) unsigned NOT NULL,
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_id_number_unique` (`id_number`),
  UNIQUE KEY `employees_nuit_unique` (`nuit`),
  UNIQUE KEY `employees_email_unique` (`email`),
  UNIQUE KEY `employees_contact_1_unique` (`contact_1`),
  UNIQUE KEY `employees_contact_2_unique` (`contact_2`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Ulises','Moore','m','2003-12-20','262843022477',1996896723,'ywatsica@example.com','681-845-5683 x92545','1-729-268-8502 x2099',1,5,3,NULL,'2020-06-12 06:00:50','2020-06-12 06:00:50'),(2,'Mara','Roberts','f','2017-02-23','94439601939',728666,'frederik51@example.org','347-997-2287 x5026','232.695.1875 x5649',5,4,3,NULL,'2020-06-12 06:00:50','2020-06-12 06:00:50'),(3,'Jasen','Nader','m','1971-08-17','84202190',71926799345,'kautzer.kaley@example.net','797.556.2508 x34513','474.345.8776 x73774',10,5,3,NULL,'2020-06-12 06:00:50','2020-06-12 06:00:50'),(4,'Sarai','Halvorson','m','2002-01-18','4283006656',676075234,'qcrooks@example.net','+1-571-955-0933','(545) 861-0481',3,6,1,NULL,'2020-06-12 06:00:50','2020-06-12 06:00:50'),(5,'Hazel','Reichel','f','1983-04-07','203038727983',927382249956,'lpollich@example.net','548-971-4634 x557','+1 (847) 663-9465',3,7,7,NULL,'2020-06-12 06:00:50','2020-06-12 06:00:50'),(6,'Moses','Boyer','f','1974-04-13','8114157744313',9980719,'evans.bauch@example.net','854.474.0604','945-373-3678',3,2,1,NULL,'2020-06-12 06:00:50','2020-06-12 06:00:50'),(7,'Sedrick','Gutkowski','f','2017-10-14','11216050694',401890730,'theron.daniel@example.com','(809) 719-2709','474.820.3598',5,5,3,NULL,'2020-06-12 06:00:50','2020-06-12 06:00:50'),(8,'Mustafa','Connelly','m','1976-06-26','72843946768959',511742389486,'hauck.cleo@example.net','214-320-1821 x2810','412.575.4057 x0996',10,6,4,NULL,'2020-06-12 06:00:50','2020-06-12 06:00:50'),(9,'Gwen','Lubowitz','f','2010-03-17','154584726833',6497472217,'fabian56@example.com','1-730-488-5304 x0491','545-252-2578 x1550',8,3,5,NULL,'2020-06-12 06:00:50','2020-06-12 06:00:50'),(10,'Kristy','Bauch','f','2005-11-27','12561697030516',7015951651,'chloe56@example.net','(886) 550-4042 x9160','(363) 327-9216',9,7,5,NULL,'2020-06-12 06:00:50','2020-06-12 06:00:50'),(11,'Walter da Conceicao Antonio','Sono','m','1994-04-15',NULL,NULL,'tec.waltersono@gmail.com','847975052','867975057',6,5,3,NULL,'2020-06-13 09:48:33','2020-06-13 09:48:33'),(12,'John','Doe','m','1999-01-01','1104057975F',12345000,'face1@face1.com','840000001',NULL,7,2,3,NULL,'2020-06-15 04:49:58','2020-06-15 04:49:58'),(13,'das','asdas','f','1994-01-01','312321',12312312,'face2@face2.com','840000002',NULL,9,2,3,NULL,'2020-06-15 04:56:56','2020-06-15 04:56:56'),(14,'Face2','das','m','1994-12-01','1231231',1312,'face3@face3.com','840000003',NULL,9,2,3,'employees_photos/JSqZLPiBmPEmnivSw85IiFYBdboJVBGosuevIsB7.jpeg','2020-06-15 04:59:00','2020-06-15 04:59:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institutions`
--

LOCK TABLES `institutions` WRITE;
/*!40000 ALTER TABLE `institutions` DISABLE KEYS */;
INSERT INTO `institutions` VALUES (1,'Fuga','1529 Gleason Pike Apt. 841\nMyrtieburgh, SC 58643-4879','1-795-701-7727 x4097','1-413-512-9675','2020-06-12 06:00:50','2020-06-12 06:00:50'),(2,'Omnis','37223 Brian Ways Suite 087\nWest Marcmouth, ME 37603-2414','980.677.0641','(821) 362-1471 x8925','2020-06-12 06:00:50','2020-06-12 06:00:50'),(4,'Ducimus','135 Gunner Land\nRubytown, KY 83185-5947','358-413-2551','+1 (272) 775-0740','2020-06-12 06:00:51','2020-06-12 06:00:51'),(5,'Voluptatem','538 Bednar Knolls\nWest Todfort, UT 04713','1-987-259-9068','1-969-277-0441','2020-06-12 06:00:51','2020-06-12 06:00:51');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2020_06_06_114526_create_organic_unities_table',1),(4,'2020_06_07_065351_create_departments_table',1),(5,'2020_06_09_120154_create_delegations_table',1),(6,'2020_06_09_125918_create_careers_table',1),(7,'2020_06_09_130940_create_academic_levels_table',1),(8,'2020_06_10_073504_create_repartitions_table',1),(9,'2020_06_11_085243_create_employees_table',1),(10,'2020_06_11_104927_create_institutions_table',1);
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
INSERT INTO `organic_unities` VALUES (1,'INAS Central',NULL,NULL,'2020-06-12 06:00:46','2020-06-12 06:00:46');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repartitions`
--

LOCK TABLES `repartitions` WRITE;
/*!40000 ALTER TABLE `repartitions` DISABLE KEYS */;
INSERT INTO `repartitions` VALUES (1,'RPE',NULL,1,1,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(2,'RMA',NULL,1,2,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(3,'RTICI',NULL,1,4,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(4,'RAS',NULL,1,5,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(5,'RAF',NULL,1,3,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(6,'Secretaria',NULL,1,1,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(7,'RPD',NULL,1,1,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(8,'RPA',NULL,1,7,'2020-06-12 06:00:48','2020-06-12 06:00:48'),(9,'RAF',NULL,0,29,'2020-06-12 06:56:12','2020-06-12 06:56:12');
/*!40000 ALTER TABLE `repartitions` ENABLE KEYS */;
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Dr. Cindy Gerlach','root@root.com','2020-06-12 06:00:46','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','UhQAWGYvFyJQgJDhDX1MJ8oKg1Oe9Qiz3OFGUwr82PiAz32LHkGZzHhuXfpE','2020-06-12 06:00:46','2020-06-12 06:00:46');
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

-- Dump completed on 2020-06-15 12:55:59
