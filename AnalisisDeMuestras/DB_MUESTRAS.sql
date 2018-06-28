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
  `fechaRecepcion` date NOT NULL,
  `temperaturaMuestra` decimal(3,1) NOT NULL,
  `cantidadMuestra` int(11) NOT NULL,
  `codigoEmpresa` int(11) DEFAULT NULL,
  `codigoParticular` int(11) DEFAULT NULL,
  `rutEmpleadoRecibe` varchar(10) NOT NULL,
  PRIMARY KEY (`idAnalisisMuestras`),
  KEY `fk_analisismuestras_empresa1_idx` (`codigoEmpresa`),
  KEY `fk_analisismuestras_particular1_idx` (`codigoParticular`),
  KEY `fk_analisismuestras_empleado1_idx` (`rutEmpleadoRecibe`),
  CONSTRAINT `fk_analisismuestras_empleado1` FOREIGN KEY (`rutEmpleadoRecibe`) REFERENCES `empleado` (`rutEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_analisismuestras_empresa1` FOREIGN KEY (`codigoEmpresa`) REFERENCES `empresa` (`codigoEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_analisismuestras_particular1` FOREIGN KEY (`codigoParticular`) REFERENCES `particular` (`codigoParticular`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contacto`
--

DROP TABLE IF EXISTS `contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacto` (
  `rutContacto` varchar(10) NOT NULL,
  `nombreContacto` varchar(30) NOT NULL,
  `emailContacto` varchar(45) NOT NULL,
  `telefonoContacto` varchar(15) NOT NULL,
  `codigoEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`rutContacto`),
  KEY `fk_contacto_empresa_idx` (`codigoEmpresa`),
  CONSTRAINT `fk_contacto_empresa` FOREIGN KEY (`codigoEmpresa`) REFERENCES `empresa` (`codigoEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `rutEmpleado` varchar(10) NOT NULL,
  `nombreEmpleado` varchar(50) NOT NULL,
  `passwordEmpleado` varchar(100) NOT NULL,
  `categoria` varchar(1) NOT NULL,
  PRIMARY KEY (`rutEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `codigoEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `rutEmpresa` varchar(10) NOT NULL,
  `nombreEmpresa` varchar(30) NOT NULL,
  `passwordEmpresa` varchar(100) NOT NULL,
  `direccionEmpresa` varchar(50) NOT NULL,
  PRIMARY KEY (`codigoEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `particular`
--

DROP TABLE IF EXISTS `particular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `particular` (
  `codigoParticular` int(11) NOT NULL AUTO_INCREMENT,
  `rutParticular` varchar(45) NOT NULL,
  `passwordParticular` varchar(100) NOT NULL,
  `nombreParticular` varchar(45) NOT NULL,
  `direccionParticular` varchar(45) NOT NULL,
  `emailParticular` varchar(45) NOT NULL,
  PRIMARY KEY (`codigoParticular`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `resultadoanalisis`
--

DROP TABLE IF EXISTS `resultadoanalisis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultadoanalisis` (
  `idTipoAnalisis` int(11) NOT NULL,
  `idAnalisisMuestras` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `PPM` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `rutEmpleadoAnalista` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idTipoAnalisis`,`idAnalisisMuestras`),
  KEY `fk_resultadoanalisis_analisismuestras1_idx` (`idAnalisisMuestras`),
  KEY `fk_resultadoanalisis_empleado1_idx` (`rutEmpleadoAnalista`),
  CONSTRAINT `fk_resultadoanalisis_analisismuestras1` FOREIGN KEY (`idAnalisisMuestras`) REFERENCES `analisismuestras` (`idAnalisisMuestras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultadoanalisis_empleado1` FOREIGN KEY (`rutEmpleadoAnalista`) REFERENCES `empleado` (`rutEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultadoanalisis_tipoanalisis1` FOREIGN KEY (`idTipoAnalisis`) REFERENCES `tipoanalisis` (`idTipoAnalisis`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `telefono`
--

DROP TABLE IF EXISTS `telefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefono` (
  `idTelefono` int(11) NOT NULL AUTO_INCREMENT,
  `numeroTelefono` varchar(15) NOT NULL,
  `codigoParticular` int(11) NOT NULL,
  PRIMARY KEY (`idTelefono`,`codigoParticular`),
  KEY `fk_telefono_particular1_idx` (`codigoParticular`),
  CONSTRAINT `fk_telefono_particular1` FOREIGN KEY (`codigoParticular`) REFERENCES `particular` (`codigoParticular`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipoanalisis`
--

DROP TABLE IF EXISTS `tipoanalisis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoanalisis` (
  `idTipoAnalisis` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipoAnalisis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-28 12:57:33
