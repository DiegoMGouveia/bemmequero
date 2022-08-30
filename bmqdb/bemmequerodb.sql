-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: localhost    Database: bemmequerodb
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery` (
  `galleryID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(955) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(995) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`galleryID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (3,'Foto 1','img/portfolio/Foto 12022.08.29-21.53.29.jpg',0,'2022-08-29 21:53:29'),(4,'Foto 2','img/portfolio/Foto 22022.08.29-21.53.56.jpg',0,'2022-08-29 21:53:56'),(5,'Foto 3','img/portfolio/Foto 32022.08.29-21.54.16.jpg',0,'2022-08-29 21:54:16'),(6,'Foto 4','img/portfolio/Foto 42022.08.29-21.54.36.jpg',0,'2022-08-29 21:54:36'),(7,'Foto 5','img/portfolio/Foto 52022.08.29-21.54.56.jpg',0,'2022-08-29 21:54:56'),(8,'Foto 6','img/portfolio/Foto 62022.08.29-21.55.18.jpg',0,'2022-08-29 21:55:18'),(9,'Foto 7','img/portfolio/Foto 72022.08.29-21.55.52.jpg',0,'2022-08-29 21:55:52');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `serviceID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `image` varchar(2000) DEFAULT NULL,
  `promotion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`serviceID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (21,'Teste 3','100','teste destivtivo 3','img/service/2022.07.30-21.03.48.jpg',NULL),(22,'Teste 3','100','teste destivtivo 3','img/service/2022.07.30-21.05.22.jpg',NULL),(23,'Teste 4 ','100','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','img/service/2022.07.30-23.55.03.png',NULL),(24,'Escova + Chapinha','50','Chapinha e escova por apenas 50 reais.','img/service/2022.08.03-15.37.05.jpg',NULL),(25,'Escova e Chapinha','50','escova e chapinha','img/service/2022.08.03-15.37.40.jpg',NULL),(26,'Escova e Chapinha','50','escova e chapinha','img/service/2022.08.03-15.39.28.jpg',NULL),(27,'Escova e Chapinha','50','escova e chapinha','img/service/2022.08.03-15.39.48.jpg',NULL),(28,'Escova e Chapinha','50','escova e chapinha','img/service/2022.08.03-15.41.26.jpg',NULL),(30,'Teste Serviço 6','100','ryhurururjurjrjryryryjyrjryjyrj','img/service/2022.08.27-11.15.30.jpg',NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `cellphone` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `wallet` varchar(255) DEFAULT '0',
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(995) DEFAULT 'img/profile/noimg.jpg',
  `registered` varchar(255) DEFAULT 'false',
  `conf_mail` varchar(255) DEFAULT 'false',
  `conf_cel` varchar(255) DEFAULT 'false',
  `type` varchar(45) DEFAULT 'user',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `document_UNIQUE` (`document`),
  UNIQUE KEY `cellphone_UNIQUE` (`cellphone`),
  UNIQUE KEY `mail_UNIQUE` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Diego Malta Gouveia','999999999-99','99999999999','diego.backend@gmail.com','Rua da Silva','999999','21232f297a57a5a743894a0e4a801fc3','img/profile/2022.08.16-00.28.07.jpg','false','true','false','Admin'),(2,'Diego Gouveia','141245124','212421125125','testando@gmail.com','rua da esquina 1212',NULL,'21232f297a57a5a743894a0e4a801fc3','img/profile/2022.08.16-00.25.47.jpg','false','true','false','user'),(3,'Outro Diego','423344','18937139871','dieguito@live.com','rua da esquinas434',NULL,'21232f297a57a5a743894a0e4a801fc3','img/profile/2022.08.16-00.30.37.jpg','false','false','true','user'),(4,'Joao','232131233235','837183877','julio.backend@gmail.com','rua da esquinas','0','21232f297a57a5a743894a0e4a801fc3','img/profile/noimg.jpg','true','true','false','user'),(6,'Joao almeida','5465415415','89721397','jorjebackend@gmail.com','rua esquina 32','0','21232f297a57a5a743894a0e4a801fc3','img/profile/noimg.jpg','false','false','false','user'),(10,'Diego Gouveia',NULL,'1231231231','wewqewe.backend@gmail.com',NULL,'0','21232f297a57a5a743894a0e4a801fc3','img/profile/noimg.jpg','false','false','false','user'),(12,'ewqeqewq',NULL,'1232131312','qwewekend@gmail.com',NULL,'0','21232f297a57a5a743894a0e4a801fc3','img/profile/noimg.jpg','false','false','false','user'),(30,'Outro Diego',NULL,'21312312','diego.backenwed@gmail.com',NULL,'0','21232f297a57a5a743894a0e4a801fc3','img/profile/noimg.jpg','false','false','false','user'),(31,'Diego Gouveia',NULL,'71613231827368','diego.baasend@gmail.com',NULL,'0','81dc9bdb52d04dc20036dbd8313ed055','img/profile/noimg.jpg','false','false','false','user'),(32,'joaizinho',NULL,'6545646','asdaddiego.backend@gmail.com',NULL,'0','202cb962ac59075b964b07152d234b70','img/profile/noimg.jpg','false','false','false','user'),(52,'Diego Gouveia',NULL,'123213123','diegoqwqwq.backend@gmail.com',NULL,'0','202cb962ac59075b964b07152d234b70','img/profile/noimg.jpg','false','false','false','user'),(54,'Diego Gouveia',NULL,'189371239871','diegobackend@gmail.com',NULL,'0','202cb962ac59075b964b07152d234b70','img/profile/noimg.jpg','false','false','false','user');
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

-- Dump completed on 2022-08-29 22:37:41
