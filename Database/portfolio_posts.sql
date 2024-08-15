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
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `published_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Giới thiệu về SQL','SQL (Structured Query Language) là một ngôn ngữ được sử dụng để giao tiếp với cơ sở dữ liệu. Nó cho phép người dùng truy vấn, cập nhật, và quản lý dữ liệu trong cơ sở dữ liệu quan hệ.','2024-08-15 02:00:00',1),(2,'Hướng dẫn sử dụng Python','Python là một ngôn ngữ lập trình mạnh mẽ và dễ học, được sử dụng rộng rãi trong nhiều lĩnh vực từ phát triển web đến phân tích dữ liệu. Khóa học này cung cấp hướng dẫn từng bước về cách sử dụng Python.','2024-08-15 04:30:00',2),(3,'Lập trình Web cơ bản','Khóa học này cung cấp kiến thức nền tảng về lập trình web, bao gồm HTML, CSS, và JavaScript. Bạn sẽ học cách xây dựng các trang web tương tác và đẹp mắt.','2024-08-15 07:00:00',3),(4,'Cơ sở dữ liệu NoSQL','NoSQL là loại cơ sở dữ liệu không sử dụng mô hình quan hệ. Khóa học này giúp bạn hiểu các loại cơ sở dữ liệu NoSQL khác nhau và cách chúng có thể được sử dụng trong các ứng dụng hiện đại.','2024-08-15 09:45:00',4),(5,'An ninh mạng cơ bản','Khóa học cung cấp kiến thức cơ bản về an ninh mạng, bao gồm các nguyên tắc bảo mật, các loại mối đe dọa và cách phòng chống chúng.','2024-08-15 11:00:00',5);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-15 10:27:37
