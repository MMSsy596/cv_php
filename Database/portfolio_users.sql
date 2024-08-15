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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `bio` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Phạm Đức Hải','haipd.it@gmail.com','0395037600','Thái Bình ','xuất sắcc','https://lh3.googleusercontent.com/pw/AP1GczO6XUvoAPOBlMX_vdv1zWyzkBjGsFeuXg-fEFHbauD_CoukWhkKqMw9lFj4eQzz3a4GIttl1eCDnoOtNWFeEVtqvh051x1mbnhmx0C8Uv4Lm2ojWdFoqPUo3MBPbxvrJc3FnlK2BwK5Mlup2Io2Z7hPEA=w930-h930-s-no-gm?authuser=0'),(2,'Phạm Đức Việt','phamviet4454@gamil.com','0394816057','Thái Bình ','lúc đc lúc ko','https://lh3.googleusercontent.com/pw/AP1GczOCysIGvdBP_F67kU1IURhcUCR5OxADo8GVERYR1Qsi4RAQkuIjJ9Y2hTzxAkGEBt-UMBIrub0GwE7zHdIGIruVd2enYqxKxQDkq8GNkz5YeQDpkNOjH73puF86HgK0C3BknEfUlp6UdRqX9e0VwE4I2A=w224-h225-s-no-gm?authuser=0'),(3,'Nguyễn Quốc Quý','nguyenquy@gamil.com','0394834321','Sóc lọ','trung bình','https://lh3.googleusercontent.com/pw/AP1GczOCysIGvdBP_F67kU1IURhcUCR5OxADo8GVERYR1Qsi4RAQkuIjJ9Y2hTzxAkGEBt-UMBIrub0GwE7zHdIGIruVd2enYqxKxQDkq8GNkz5YeQDpkNOjH73puF86HgK0C3BknEfUlp6UdRqX9e0VwE4I2A=w224-h225-s-no-gm?authuser=0'),(4,'Nguyễn Hoàng Anh','hoanganh@gamil.com','0393432057','Sóc trăng','khá','https://lh3.googleusercontent.com/pw/AP1GczOCysIGvdBP_F67kU1IURhcUCR5OxADo8GVERYR1Qsi4RAQkuIjJ9Y2hTzxAkGEBt-UMBIrub0GwE7zHdIGIruVd2enYqxKxQDkq8GNkz5YeQDpkNOjH73puF86HgK0C3BknEfUlp6UdRqX9e0VwE4I2A=w224-h225-s-no-gm?authuser=0'),(5,'Nguyễn Quang Hiệp','quanghiep54@gamil.com','0394816023','Khánh ','lúc đc lúc ko','https://lh3.googleusercontent.com/pw/AP1GczOCysIGvdBP_F67kU1IURhcUCR5OxADo8GVERYR1Qsi4RAQkuIjJ9Y2hTzxAkGEBt-UMBIrub0GwE7zHdIGIruVd2enYqxKxQDkq8GNkz5YeQDpkNOjH73puF86HgK0C3BknEfUlp6UdRqX9e0VwE4I2A=w224-h225-s-no-gm?authuser=0');
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

-- Dump completed on 2024-08-15 10:27:36
