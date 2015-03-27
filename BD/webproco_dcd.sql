-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2015 a las 18:50:52
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `webproco_dcd`
--
CREATE DATABASE IF NOT EXISTS `webproco_dcd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `webproco_dcd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
CREATE TABLE IF NOT EXISTS `ciudades` (
  `idciudad` int(11) NOT NULL AUTO_INCREMENT,
  `nomciudad` varchar(80) NOT NULL,
  PRIMARY KEY (`idciudad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`idciudad`, `nomciudad`) VALUES
(1, 'Cali'),
(2, 'Bogotá'),
(3, 'Palmira'),
(4, 'Jamundí'),
(5, 'Yumbo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemsayuda`
--

DROP TABLE IF EXISTS `itemsayuda`;
CREATE TABLE IF NOT EXISTS `itemsayuda` (
  `iditemayuda` int(11) NOT NULL AUTO_INCREMENT,
  `idseccionayuda` int(11) NOT NULL,
  `titularayuda` varchar(125) NOT NULL,
  `detalleayuda` varchar(255) NOT NULL,
  PRIMARY KEY (`iditemayuda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `itemsayuda`
--

INSERT INTO `itemsayuda` (`iditemayuda`, `idseccionayuda`, `titularayuda`, `detalleayuda`) VALUES
(1, 1, 'Registro en la plataforma', 'Para registrarse, debe hacer clic en el enlace "Registrarme" de la página de ingreso de la plataforma, diligenciar los datos solicitados y hacer clic en el botón "Registrar".  Luego revise su correo y siga los pasos para ingresar con su usuario.'),
(2, 3, 'Selección de día', 'Por defecto se presenta el pasaje y el formato de registro del devocional para el día actual.  Si desea cambiarlo primero se debe hacer clic en el botón azul con el año actual, luego en el botón azul con el mes actual y por último clic en el día deseado.'),
(3, 3, 'Diligenciamiento del formato', 'Para diligenciar el formato, debe hacer clic en cada uno de los enlaces que se encuentran debajo del pasaje del día (Dios Me Habla, Hablo con Dios, Hablo con Mi Lider) y se desplegarán cajas de texto para registrar la información del devocional.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccionesayuda`
--

DROP TABLE IF EXISTS `seccionesayuda`;
CREATE TABLE IF NOT EXISTS `seccionesayuda` (
  `idseccionayuda` int(11) NOT NULL AUTO_INCREMENT,
  `nomseccionayuda` varchar(35) NOT NULL,
  PRIMARY KEY (`idseccionayuda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `seccionesayuda`
--

INSERT INTO `seccionesayuda` (`idseccionayuda`, `nomseccionayuda`) VALUES
(1, 'Ingreso a la plataforma'),
(2, 'Aspectos Básicos'),
(3, 'Devocional'),
(4, 'Comentarios'),
(5, 'Favoritos'),
(6, 'Perfil de Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` varchar(20) NOT NULL,
  `nombreusuario` varchar(80) NOT NULL,
  `emailusuario` varchar(120) NOT NULL,
  `claveusuario` varchar(100) NOT NULL,
  `rolusuario` int(11) NOT NULL,
  `idzona` int(11) NOT NULL,
  `fotousuario` varchar(100) NOT NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `emailusuario`, `claveusuario`, `rolusuario`, `idzona`, `fotousuario`, `estado`) VALUES
('yeimyandres', 'Yeimy Andrés Arteaga Guerrón', 'yeimyandres@gmail.com', '5816e9548040b61ebecc01156db79061', 1, 1, 'yeimyandres.jpg', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

DROP TABLE IF EXISTS `zonas`;
CREATE TABLE IF NOT EXISTS `zonas` (
  `idzona` int(11) NOT NULL AUTO_INCREMENT,
  `idciudad` int(11) NOT NULL,
  `nomzona` varchar(50) NOT NULL,
  PRIMARY KEY (`idzona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`idzona`, `idciudad`, `nomzona`) VALUES
(1, 1, 'Sur'),
(2, 1, 'Norte'),
(3, 1, 'Oriente'),
(4, 1, 'Occidente'),
(5, 1, 'Centro');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
