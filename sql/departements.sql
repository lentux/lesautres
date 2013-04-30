-- MySQL dump 10.13  Distrib 5.1.66, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: autres
-- ------------------------------------------------------
-- Server version	5.1.66-0+squeeze1

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
-- Table structure for table `departements`
--

DROP TABLE IF EXISTS `departements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departements`
--

LOCK TABLES `departements` WRITE;
/*!40000 ALTER TABLE `departements` DISABLE KEYS */;
INSERT INTO `departements` VALUES (1,'01','Ain'),(2,'02','Aisne'),(3,'03','Allier'),(4,'04','Alpes-de-Haute-Provence'),(5,'05','Hautes-Alpes'),(6,'06','Alpes-Maritimes'),(7,'07','Ardèche'),(8,'08','Ardennes'),(9,'09','Ariège'),(10,'10','Aube'),(11,'11','Aude'),(12,'12','Aveyron'),(13,'13','Bouches-du-Rhône'),(14,'14','Calvados'),(15,'15','Cantal'),(16,'16','Charente'),(17,'17','Charente-Maritime'),(18,'18','Cher'),(19,'19','Corrèze'),(20,'2A','Corse-du-Sud'),(21,'2B','Haute-Corse'),(22,'21','Côte-d\'Or'),(23,'22','Côtes-d\'Armor'),(24,'23','Creuse'),(25,'24','Dordogne'),(26,'25','Doubs'),(27,'26','Drôme'),(28,'27','Eure'),(29,'28','Eure-et-Loir'),(30,'29','Finistère'),(31,'30','Gard'),(32,'31','Haute-Garonne'),(33,'32','Gers'),(34,'33','Gironde'),(35,'34','Hérault'),(36,'35','Ille-et-Vilaine'),(37,'36','Indre'),(38,'37','Indre-et-Loire'),(39,'38','Isère'),(40,'39','Jura'),(41,'40','Landes'),(42,'41','Loir-et-Cher'),(43,'42','Loire'),(44,'43','Haute-Loire'),(45,'44','Loire-Atlantique'),(46,'45','Loiret'),(47,'46','Lot'),(48,'47','Lot-et-Garonne'),(49,'48','Lozère'),(50,'49','Maine-et-Loire'),(51,'50','Manche'),(52,'51','Marne'),(53,'52','Haute-Marne'),(54,'53','Mayenne'),(55,'54','Meurthe-et-Moselle'),(56,'55','Meuse'),(57,'56','Morbihan'),(58,'57','Moselle'),(59,'58','Nièvre'),(60,'59','Nord'),(61,'60','Oise'),(62,'61','Orne'),(63,'62','Pas-de-Calais'),(64,'63','Puy-de-Dôme'),(65,'64','Pyrénées-Atlantiques'),(66,'65','Hautes-Pyrénées'),(67,'66','Pyrénées-Orientales'),(68,'67','Bas-Rhin'),(69,'68','Haut-Rhin'),(70,'69','Rhône'),(71,'70','Haute-Saône'),(72,'71','Saône-et-Loire'),(73,'72','Sarthe'),(74,'73','Savoie'),(75,'74','Haute-Savoie'),(76,'75','Paris'),(77,'76','Seine-Maritime'),(78,'77','Seine-et-Marne'),(79,'78','Yvelines'),(80,'79','Deux-Sèvres'),(81,'80','Somme'),(82,'81','Tarn'),(83,'82','Tarn-et-Garonne'),(84,'83','Var'),(85,'84','Vaucluse'),(86,'85','Vendée'),(87,'86','Vienne'),(88,'87','Haute-Vienne'),(89,'88','Vosges'),(90,'89','Yonne'),(91,'90','Territoire de Belfort'),(92,'91','Essonne'),(93,'92','Hauts-de-Seine'),(94,'93','Seine-Saint-Denis'),(95,'94','Val-de-Marne'),(96,'95','Val-d\'Oise');
/*!40000 ALTER TABLE `departements` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-04-30 11:48:43
