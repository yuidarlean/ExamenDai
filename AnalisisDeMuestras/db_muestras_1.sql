-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_muestras
-- ------------------------------------------------------
-- Server version	5.7.18-log

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
-- Table structure for table `analisismuestras`
--

DROP TABLE IF EXISTS `analisismuestras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analisismuestras` (
  `idAnalisisMuestras` int(11) NOT NULL AUTO_INCREMENT,
  `codigomuestra` varchar(9) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  `fechaRecepcion` date NOT NULL,
  `temperaturaMuestra` decimal(3,1) NOT NULL,
  `cantidadMuestra` int(11) NOT NULL,
  `codigoUsuarioCliente` int(11) NOT NULL,
  `codigoUsuarioEmpleado` int(11) NOT NULL,
  PRIMARY KEY (`idAnalisisMuestras`),
  KEY `FKEmpleadoRecibe_idx` (`codigoUsuarioEmpleado`),
  KEY `FKClienteEntrega_idx` (`codigoUsuarioCliente`),
  CONSTRAINT `FKClienteEntrega` FOREIGN KEY (`codigoUsuarioCliente`) REFERENCES `usuario` (`codigoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKEmpleadoRecibe` FOREIGN KEY (`codigoUsuarioEmpleado`) REFERENCES `usuario` (`codigoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analisismuestras`
--

LOCK TABLES `analisismuestras` WRITE;
/*!40000 ALTER TABLE `analisismuestras` DISABLE KEYS */;
/*!40000 ALTER TABLE `analisismuestras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto`
--

DROP TABLE IF EXISTS `contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacto` (
  `codigoContacto` int(11) NOT NULL AUTO_INCREMENT,
  `rutContacto` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombreContacto` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `emailContacto` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefonoContacto` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `codigoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`codigoContacto`),
  KEY `FKContactoUsuario_idx` (`codigoUsuario`),
  CONSTRAINT `FKContactoUsuario` FOREIGN KEY (`codigoUsuario`) REFERENCES `usuario` (`codigoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto`
--

LOCK TABLES `contacto` WRITE;
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultadoanalisis`
--

DROP TABLE IF EXISTS `resultadoanalisis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultadoanalisis` (
  `idTipoAnalisis` int(11) NOT NULL,
  `idAnalisisMuestras` int(11) NOT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `PPM` int(11) DEFAULT NULL,
  `estado` bit(1) NOT NULL,
  `codigoEmpleadoAnalista` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTipoAnalisis`,`idAnalisisMuestras`),
  KEY `FKempleado_idx` (`codigoEmpleadoAnalista`),
  KEY `FKAnalisis_idx` (`idAnalisisMuestras`),
  CONSTRAINT `FKAnalisis` FOREIGN KEY (`idAnalisisMuestras`) REFERENCES `analisismuestras` (`idAnalisisMuestras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKTipoAnalisis` FOREIGN KEY (`idTipoAnalisis`) REFERENCES `tipoanalisis` (`idTipoAnalisis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKempleado` FOREIGN KEY (`codigoEmpleadoAnalista`) REFERENCES `usuario` (`codigoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultadoanalisis`
--

LOCK TABLES `resultadoanalisis` WRITE;
/*!40000 ALTER TABLE `resultadoanalisis` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultadoanalisis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoanalisis`
--

DROP TABLE IF EXISTS `tipoanalisis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoanalisis` (
  `idTipoAnalisis` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idTipoAnalisis`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoanalisis`
--

LOCK TABLES `tipoanalisis` WRITE;
/*!40000 ALTER TABLE `tipoanalisis` DISABLE KEYS */;
INSERT INTO `tipoanalisis` VALUES (1,'Micotoxinas'),(2,'Metales pesados'),(3,'Plaguicidas prohibidos'),(4,'Marea roja'),(5,'Bacterias nocivas');
/*!40000 ALTER TABLE `tipoanalisis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `codigoTipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombresTipo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`codigoTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'Administrador'),(2,'Receptor de muestras'),(3,'Técnico de laboratorio'),(4,'Cliente Natrual'),(5,'Cliente Empresa');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `codigoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `rutUsuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `passwordUsuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombreUsuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `direccionUsuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`codigoUsuario`),
  KEY `FKTiupoUsuario_idx` (`tipoUsuario`),
  CONSTRAINT `FKTiupoUsuario` FOREIGN KEY (`tipoUsuario`) REFERENCES `tipousuario` (`codigoTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'111111111','$2y$10$NGrKWLMEVy3Milk1l66cje3sx/HRiIOC7lQdxlxLxFZtRQu6I2yi6','Dario administrador','direccion 1',1,1),(2,'222222222','$2y$10$NGrKWLMEVy3Milk1l66cje3sx/HRiIOC7lQdxlxLxFZtRQu6I2yi6','Juan Receptor','direccion 2',2,1),(3,'333333333','$2y$10$NGrKWLMEVy3Milk1l66cje3sx/HRiIOC7lQdxlxLxFZtRQu6I2yi6','Maria Tecnica Laboratorista','direccion 3',3,1),(4,'131313131','$2y$10$NGrKWLMEVy3Milk1l66cje3sx/HRiIOC7lQdxlxLxFZtRQu6I2yi6','Teresa Cliente','direccion 4',4,1),(5,'555555555','$2y$10$NGrKWLMEVy3Milk1l66cje3sx/HRiIOC7lQdxlxLxFZtRQu6I2yi6','Lait SA Cliente Emp','direccion 5',5,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-06 15:36:33
