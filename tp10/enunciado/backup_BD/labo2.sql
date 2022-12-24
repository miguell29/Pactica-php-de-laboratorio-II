-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: labo2
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(75) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `paginas` smallint(6) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `portada` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` VALUES (1,'Padre rico padre pobre','Robert Kiyosaki','Finanzas',207,'1997-02-23','Padre rico padre pobre.jpg'),(2,'El elemento','Ken Robinson','Autoayuda',336,'2009-07-15','El elemento.jpg'),(3,'La libertad de ser quien soy','Pilar Sordo','Autoayuda',163,'2020-01-02','La libertad de ser quien soy.jpg'),(4,'Tres formas de tomar un helado','Enrique Espeche','Marketing',314,'2022-07-18','Tres formas de tomar un helado.jpg'),(5,'Caos','Magalí Tajes','Poesía',234,'2018-04-29','Caos.jpg'),(6,'Los secretos de la mente millonaria','Harv Eker','Finanzas',246,'2005-02-15','Los secretos de la mente millonaria.jpg'),(7,'Historias de diván','Gabriel Rolón','Psicología',256,'2007-06-17','Historias de diván.jpg'),(8,'La inteligenia emocional','Daniel Goleman','Psicología',353,'1995-11-20','La inteligenia emocional.jpg');
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'jpepe','39d19e8bec728e2cd4d2a4199e9434ad7df5e459','Administrador','jpepe.jpg'),(2,'mruiz','397747e2ea1fd4995810616087d0e6c4ab7014d4','Administrador','mruiz.jpg'),(3,'dsingh','abab1d2a5f608941022d1b43da6c92d574d55060','Común','dsingh.jpg'),(4,'cflores','d1662c4daf4585ab458111cff0b30c954603d0ea','Común',''),(5,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Administrador','');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'labo2'
--

--
-- Dumping routines for database 'labo2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-08  3:51:37
