-- MySQL dump 10.16  Distrib 10.1.18-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: wallgreen4
-- ------------------------------------------------------
-- Server version	10.1.18-MariaDB

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
-- Table structure for table `accesos`
--

DROP TABLE IF EXISTS `accesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accesos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_acceso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ubicacion` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accesos_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesos`
--

LOCK TABLES `accesos` WRITE;
/*!40000 ALTER TABLE `accesos` DISABLE KEYS */;
INSERT INTO `accesos` VALUES (1,'Accesso01',2,'2017-09-27 00:18:13','2017-09-28 03:29:52',NULL),(2,'Acceso02',4,'2017-09-27 00:29:10','2017-09-28 03:29:31',NULL),(3,'Puerta Princial',3,'2017-09-27 07:01:22','2017-09-28 03:29:43',NULL);
/*!40000 ALTER TABLE `accesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departamento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departamentos_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'TI','Tecnología de información','2017-09-27 11:14:44','2017-09-27 11:14:44',NULL),(2,'RH','Recursos Humanos','2017-09-27 11:14:58','2017-09-27 11:14:58',NULL);
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_descripcion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Proyecto MD200','Proyector VGA de 200 canales ....','2017-09-27 05:25:17','2017-09-27 05:25:17',NULL),(2,'Laptop','Laptop para proyectar Dell XPS 3514 salida HDMI','2017-09-27 05:28:54','2017-09-27 05:28:54',NULL),(3,'Pintarron Grande','Pintarron Grande 2.00 mts','2017-09-27 05:29:21','2017-09-27 05:29:21',NULL),(4,'Proyecto HP','Proyector hp de 3000 lumns','2017-09-27 07:02:28','2017-09-27 07:02:28',NULL);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items_seccions`
--

DROP TABLE IF EXISTS `items_seccions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items_seccions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_seccions` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items_seccions`
--

LOCK TABLES `items_seccions` WRITE;
/*!40000 ALTER TABLE `items_seccions` DISABLE KEYS */;
INSERT INTO `items_seccions` VALUES (1,12,1,'2017-09-27 03:36:11',NULL),(2,12,3,'2017-09-27 03:36:11',NULL),(3,13,1,'2017-09-27 03:47:13',NULL),(4,13,2,'2017-09-27 03:47:13',NULL),(18,14,1,'2017-09-28 03:12:26',NULL),(19,14,2,'2017-09-28 03:12:26',NULL),(20,14,3,'2017-09-28 03:12:26',NULL),(21,14,4,'2017-09-28 03:12:26',NULL),(32,15,1,'2017-09-28 03:35:53',NULL);
/*!40000 ALTER TABLE `items_seccions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2017_09_25_040737_create_1506301657_roles_table',1),(3,'2017_09_25_040740_create_1506301659_users_table',1),(4,'2017_09_25_040741_add_59c856dd0d225_relationships_to_user_table',1),(5,'2017_09_25_041648_create_1506302208_reservacions_table',1),(6,'2017_09_25_044419_update_1506303859_reservacions_table',1),(7,'2017_09_25_063435_update_1506310475_reservacions_table',1),(8,'2017_09_26_034411_create_1506386651_ubicaciones_table',1),(9,'2017_09_26_035236_create_1506387156_accesos_table',1),(10,'2017_09_26_040509_create_1506387909_seccions_table',1),(11,'2017_09_26_045342_update_1506390822_users_table',1),(12,'2017_09_26_045343_add_59c9b3277b07c_relationships_to_user_table',1),(13,'2017_09_26_052706_update_1506392826_reservacions_table',1),(14,'2017_09_26_054546_update_1506393946_reservacions_table',1),(15,'2017_09_27_025600_create_1506470160_items_table',2),(16,'2017_09_27_074401_update_1506487441_users_table',3),(17,'2017_09_27_090134_create_1506492094_departamentos_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservacions`
--

DROP TABLE IF EXISTS `reservacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservacions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nombre_de_reunion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sala_de_juntas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario` text COLLATE utf8mb4_unicode_ci,
  `ubicacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repeat` tinyint(4) DEFAULT '0',
  `hora_duracion` int(11) DEFAULT NULL,
  `minuto_duracion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservacions_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservacions`
--

LOCK TABLES `reservacions` WRITE;
/*!40000 ALTER TABLE `reservacions` DISABLE KEYS */;
INSERT INTO `reservacions` VALUES (1,'2017-09-26 07:53:55','2017-09-26 07:53:55',NULL,'Reunion kickoff','imperial','porfavor vallan a la sala de juntas',NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `reservacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator (can create other users)','2017-09-26 07:53:55','2017-09-26 07:53:55'),(2,'Simple user','2017-09-26 07:53:55','2017-09-26 07:53:55'),(3,'Usuario de Accesos','2017-09-27 07:10:35','2017-09-27 07:10:35');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccions`
--

DROP TABLE IF EXISTS `seccions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_ubicacion` int(11) DEFAULT NULL,
  `nombre_seccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_atributos` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seccions_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccions`
--

LOCK TABLES `seccions` WRITE;
/*!40000 ALTER TABLE `seccions` DISABLE KEYS */;
INSERT INTO `seccions` VALUES (1,1,'Sala Imperial',3,'2017-09-27 01:31:20','2017-09-27 01:31:20',NULL),(2,4,'Sala prinicipal',NULL,'2017-09-27 07:03:03','2017-09-27 07:03:03',NULL),(3,2,'ássas',2,'2017-09-27 08:10:44','2017-09-27 08:36:58','2017-09-27 08:36:58'),(4,4,'sala test',1,'2017-09-27 08:11:11','2017-09-27 08:11:11',NULL),(5,2,'last',1,'2017-09-27 08:15:03','2017-09-27 08:15:03',NULL),(6,2,'last',1,'2017-09-27 08:17:24','2017-09-27 08:36:58','2017-09-27 08:36:58'),(7,2,'sala demo',3,'2017-09-27 08:18:31','2017-09-27 08:18:31',NULL),(8,1,'sala demo 44',2,'2017-09-27 08:30:01','2017-09-27 08:30:01',NULL),(9,1,'sala demo 44',2,'2017-09-27 08:33:08','2017-09-27 08:36:58','2017-09-27 08:36:58'),(10,1,'sala demo 44',2,'2017-09-27 08:33:30','2017-09-27 08:36:58','2017-09-27 08:36:58'),(11,1,'sala demo 44',2,'2017-09-27 08:34:40','2017-09-27 08:36:58','2017-09-27 08:36:58'),(12,1,'sala demo 44',2,'2017-09-27 08:36:11','2017-09-27 08:36:58','2017-09-27 08:36:58'),(13,1,'Nueva SALA',2,'2017-09-27 08:47:13','2017-09-27 08:47:13',NULL),(14,1,'BIG',2,'2017-09-27 09:20:16','2017-09-27 09:20:16',NULL),(15,3,'SALA EXPERIMENTO',2,'2017-09-28 08:15:46','2017-09-28 08:15:46',NULL);
/*!40000 ALTER TABLE `seccions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicaciones`
--

DROP TABLE IF EXISTS `ubicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ubicaciones_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicaciones`
--

LOCK TABLES `ubicaciones` WRITE;
/*!40000 ALTER TABLE `ubicaciones` DISABLE KEYS */;
INSERT INTO `ubicaciones` VALUES (1,'Corporativo MTY','MTY','Nuevo Leon','2017-09-26 07:53:55','2017-09-27 00:27:38',NULL),(2,'Corporativo GDL','GDL','Guadalajara','2017-09-26 07:53:55','2017-09-27 00:28:39',NULL),(3,'Corporativo CDMX','CDMX','CDMX','2017-09-26 07:53:55','2017-09-27 00:28:51',NULL),(4,'Ubicacion002','MTY','Nuevo Leon','2017-09-27 07:00:49','2017-09-27 07:00:49',NULL);
/*!40000 ALTER TABLE `ubicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `apellido_paterno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ubicacion` int(11) DEFAULT NULL,
  `departamento` int(11) DEFAULT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `76436_59c856dc03987` (`role_id`),
  CONSTRAINT `76436_59c856dc03987` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com','$2y$10$XuPH4b3YFTONjfbKNUswZO4lxP7jQKLlKthn30uhfs6diiJdYUoX2','6iBPUHPAgEboaimR6fwDtlpiIPWUcFViFC13sh6lGL48C47iX6lYd3VBGuVA','2017-09-26 07:53:55','2017-09-27 10:14:54',1,'admin','aDMIN',NULL,1,1,'111'),(2,'user','user@user.com','$2y$10$NFtyGYjP9UZAKZfxYbhOQOLGQeqcGGDkVLuoorjUBS3R9T4jJ/YMa',NULL,'2017-09-26 07:53:55','2017-09-26 07:53:55',2,'user','user',NULL,NULL,NULL,''),(3,'sergio','chekosg@gmail.com','$2y$10$LNlBAuSKaZMQn1zfl8SedeSAmXdrgH7E4YeeUftnUs6stagocmUPS',NULL,'2017-09-27 11:28:00','2017-09-27 11:28:00',2,'salinas','de la garza',NULL,1,1,'311'),(4,'alvero','aperez@gmail.com','$2y$10$9iPOeth1Q7A8UAgH3zhzE.q7JVDyI.AF4ruI07otU/HbZmHW531YS',NULL,'2017-09-27 11:28:50','2017-09-27 11:28:50',2,'perez','perez',NULL,3,2,'620');
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

-- Dump completed on 2017-10-01 21:34:35
