-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2015 a las 16:52:55
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
