-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2018 a las 03:27:18
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_muestras`
--
CREATE DATABASE IF NOT EXISTS `db_muestras` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `db_muestras`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisismuestras`
--

DROP TABLE IF EXISTS `analisismuestras`;
CREATE TABLE `analisismuestras` (
  `idAnalisisMuestras` int(11) NOT NULL,
  `fechaRecepcion` date NULL, 
  `temperaturaMuestra` decimal(3,1) NOT NULL,
  `cantidadMuestra` int(11) NOT NULL,
  `codigoUsuarioCliente` int(11) DEFAULT NULL,
  `codigoUsuarioEmpleado` int(11) NOT NULL,
  `codigomuestra` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `analisismuestras`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE `contacto` (
  `codigoContacto` int(11) NOT NULL,
  `rutContacto` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombreContacto` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `emailContacto` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefonoContacto` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `codigoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contacto`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultadoanalisis`
--

DROP TABLE IF EXISTS `resultadoanalisis`;
CREATE TABLE `resultadoanalisis` (
  `idTipoAnalisis` int(11) NOT NULL,
  `idAnalisisMuestras` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `PPM` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1',
  `codigoEmpleadoAnalista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `resultadoanalisis`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoanalisis`
--

DROP TABLE IF EXISTS `tipoanalisis`;
CREATE TABLE `tipoanalisis` (
  `idTipoAnalisis` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipoanalisis`
--

INSERT INTO `tipoanalisis` (`idTipoAnalisis`, `nombre`) VALUES
(1, 'Micotoxinas'),
(2, 'Metales pesados'),
(3, 'Plaguicidas prohibidos'),
(4, 'Marea roja'),
(5, 'Bacterias nocivas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE `tipousuario` (
  `codigoTipo` int(11) NOT NULL,
  `nombresTipo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipousuario` 
--

INSERT INTO `tipousuario` (`codigoTipo`, `nombresTipo`) VALUES
(1, 'Administrador'),
(2, 'Receptor de muestras'),
(3, 'Técnico de laboratorio'),
(4, 'Cliente Natural'), 
(5, 'Cliente Empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `codigoUsuario` int(11) NOT NULL,
  `rutUsuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `passwordUsuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombreUsuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `direccionUsuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigoUsuario`, `rutUsuario`, `passwordUsuario`, `nombreUsuario`, `direccionUsuario`, `tipoUsuario`, `estado`) VALUES
(1, '111111111', '$2y$10$FOiJufJunWMxwONzU.0pceqMLoXDq4EhgXLKejjlDBe.e8t3YcDue', 'Dario adminis', 'direccion 133', 1, 1),
(2, '222222222', '$2y$10$NGrKWLMEVy3Milk1l66cje3sx/HRiIOC7lQdxlxLxFZtRQu6I2yi6', 'sdfdsfsdf', 'direccion 222222222222', 2, 1),
(3, '333333333', '$2y$10$NGrKWLMEVy3Milk1l66cje3sx/HRiIOC7lQdxlxLxFZtRQu6I2yi6', 'Maria Tecnica Laboratorista asdasd', 'direccion 3', 3, 1),
(4, '444444444', '$2y$10$NGrKWLMEVy3Milk1l66cje3sx/HRiIOC7lQdxlxLxFZtRQu6I2yi6', 'Teresa Cliente', 'direccion 4', 4, 1),
(5, '555555555', '$2y$10$NGrKWLMEVy3Milk1l66cje3sx/HRiIOC7lQdxlxLxFZtRQu6I2yi6', 'Lait SA Cliente Emp', 'direccion 5', 5, 1),
(9, '999999999', '$2y$10$Ogm6DQYZI03Zm6lzteoYG.qxeb8s8My9.g5NK/ez8QCqnQsjnH1Gy', 'empresa 9', 'direccion 9', 5, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analisismuestras`
--
ALTER TABLE `analisismuestras`
  ADD PRIMARY KEY (`idAnalisisMuestras`),
  ADD KEY `FKEmpleadoRecibe_idx` (`codigoUsuarioEmpleado`),
  ADD KEY `FKClienteEntrega_idx` (`codigoUsuarioCliente`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`codigoContacto`),
  ADD KEY `FKContactoUsuario_idx` (`codigoUsuario`);

--
-- Indices de la tabla `resultadoanalisis`
--
ALTER TABLE `resultadoanalisis`
  ADD PRIMARY KEY (`idTipoAnalisis`,`idAnalisisMuestras`),
  ADD KEY `FKempleado_idx` (`codigoEmpleadoAnalista`),
  ADD KEY `FKAnalisis_idx` (`idAnalisisMuestras`);

--
-- Indices de la tabla `tipoanalisis`
--
ALTER TABLE `tipoanalisis`
  ADD PRIMARY KEY (`idTipoAnalisis`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`codigoTipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigoUsuario`),
  ADD KEY `FKTiupoUsuario_idx` (`tipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analisismuestras`
--
ALTER TABLE `analisismuestras`
  MODIFY `idAnalisisMuestras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `codigoContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tipoanalisis`
--
ALTER TABLE `tipoanalisis`
  MODIFY `idTipoAnalisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `codigoTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analisismuestras`
--
ALTER TABLE `analisismuestras`
  ADD CONSTRAINT `FKClienteEntrega` FOREIGN KEY (`codigoUsuarioCliente`) REFERENCES `usuario` (`codigoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKEmpleadoRecibe` FOREIGN KEY (`codigoUsuarioEmpleado`) REFERENCES `usuario` (`codigoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `FKContactoUsuario` FOREIGN KEY (`codigoUsuario`) REFERENCES `usuario` (`codigoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `resultadoanalisis`
--
ALTER TABLE `resultadoanalisis`
  ADD CONSTRAINT `FKAnalisis` FOREIGN KEY (`idAnalisisMuestras`) REFERENCES `analisismuestras` (`idAnalisisMuestras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKTipoAnalisis` FOREIGN KEY (`idTipoAnalisis`) REFERENCES `tipoanalisis` (`idTipoAnalisis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKempleado` FOREIGN KEY (`codigoEmpleadoAnalista`) REFERENCES `usuario` (`codigoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FKTiupoUsuario` FOREIGN KEY (`tipoUsuario`) REFERENCES `tipousuario` (`codigoTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
