-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: portfolio
-- ------------------------------------------------------
-- Server version	8.4.0

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
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,1,'Giới thiệu về cơ sở dữ liệu','Khóa học giới thiệu về các khái niệm cơ bản của cơ sở dữ liệu, bao gồm SQL và thiết kế cơ sở dữ liệu.','https://photos.app.goo.gl/kwfqa6Voscyy4iyS6','https://lh3.googleusercontent.com/pw/AP1GczO6XUvoAPOBlMX_vdv1zWyzkBjGsFeuXg-fEFHbauD_CoukWhkKqMw9lFj4eQzz3a4GIttl1eCDnoOtNWFeEVtqvh051x1mbnhmx0C8Uv4Lm2ojWdFoqPUo3MBPbxvrJc3FnlK2BwK5Mlup2Io2Z7hPEA=w930-h930-s-no-gm?authuser=0'),(2,2,'Khóa học lập trình cơ bản','Khóa học này giúp bạn nắm vững các khái niệm cơ bản về lập trình và phát triển phần mềm.','https://photos.app.goo.gl/kwfqa6Voscyy4iyS6','https://lh3.googleusercontent.com/pw/AP1GczNjyy3OCEIsLoFRTgWWfVbKNNm6OdZM5mk46M7sl2AvSWNTtqzxOYJu-vcTAYgeiansp8uhyIMv_8X2_4FP20kYIT0DWYz6M4jsd_uPys8tX4NLjXceenjpI8-Oed4-nx9JmNuLAsnjHD0M2jAFEeM0-A=w512-h512-s-no-gm?authuser=0'),(3,3,'Quản trị hệ thống mạng','Khóa học này cung cấp kiến thức về quản trị hệ thống mạng và các kỹ năng cần thiết để duy trì và quản lý hệ thống mạng.','https://photos.app.goo.gl/kwfqa6Voscyy4iyS6','https://lh3.googleusercontent.com/pw/AP1GczMqACQO9A9dhfpH-mfIKbLfZaRkearQ_byP3XuizzJaACc8N8uC_RYR2k7Sa4hIVLyDpHCgkdX_WYrRGCui4tGOWUuL91ZN8XvHlzZRa1J06RuCzS5QxvlyQLKSZKsztuF7VtRY6EiqHiNPSOVPfNelAQ=w930-h930-s-no-gm?authuser=0'),(4,4,'An ninh mạng nâng cao','Khóa học cung cấp kiến thức nâng cao về an ninh mạng, các phương pháp bảo mật và phòng chống các mối đe dọa mạng.','https://photos.app.goo.gl/kwfqa6Voscyy4iyS6','https://lh3.googleusercontent.com/pw/AP1GczMqACQO9A9dhfpH-mfIKbLfZaRkearQ_byP3XuizzJaACc8N8uC_RYR2k7Sa4hIVLyDpHCgkdX_WYrRGCui4tGOWUuL91ZN8XvHlzZRa1J06RuCzS5QxvlyQLKSZKsztuF7VtRY6EiqHiNPSOVPfNelAQ=w930-h930-s-no-gm?authuser=0'),(5,5,'Phát triển ứng dụng di động','Khóa học tập trung vào phát triển ứng dụng di động cho nền tảng Android và iOS, bao gồm lập trình và thiết kế ứng dụng.','https://photos.app.goo.gl/kwfqa6Voscyy4iyS6','https://lh3.googleusercontent.com/pw/AP1GczMqACQO9A9dhfpH-mfIKbLfZaRkearQ_byP3XuizzJaACc8N8uC_RYR2k7Sa4hIVLyDpHCgkdX_WYrRGCui4tGOWUuL91ZN8XvHlzZRa1J06RuCzS5QxvlyQLKSZKsztuF7VtRY6EiqHiNPSOVPfNelAQ=w930-h930-s-no-gm?authuser=0');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-15 10:27:36
