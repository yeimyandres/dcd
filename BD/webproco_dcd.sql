-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2015 a las 18:53:06
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
-- Estructura de tabla para la tabla `biblias`
--

DROP TABLE IF EXISTS `biblias`;
CREATE TABLE IF NOT EXISTS `biblias` (
  `idbiblia` int(11) NOT NULL AUTO_INCREMENT,
  `nombiblia` varchar(100) NOT NULL,
  `abrevbiblia` varchar(10) NOT NULL,
  PRIMARY KEY (`idbiblia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncar tablas antes de insertar `biblias`
--

TRUNCATE TABLE `biblias`;
--
-- Volcado de datos para la tabla `biblias`
--

INSERT INTO `biblias` (`idbiblia`, `nombiblia`, `abrevbiblia`) VALUES
(1, 'Reina Valera 1960', 'RV60'),
(2, 'Nueva Versión Internacional', 'NVI');

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
-- Truncar tablas antes de insertar `ciudades`
--

TRUNCATE TABLE `ciudades`;
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
-- Estructura de tabla para la tabla `devocionales`
--

DROP TABLE IF EXISTS `devocionales`;
CREATE TABLE IF NOT EXISTS `devocionales` (
  `iddevocional` int(11) NOT NULL AUTO_INCREMENT,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `anual` int(11) NOT NULL,
  `libro` int(11) NOT NULL,
  `capitulo` int(11) NOT NULL,
  `versiculoini` int(11) NOT NULL,
  `versiculofin` int(11) NOT NULL,
  PRIMARY KEY (`iddevocional`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Truncar tablas antes de insertar `devocionales`
--

TRUNCATE TABLE `devocionales`;
--
-- Volcado de datos para la tabla `devocionales`
--

INSERT INTO `devocionales` (`iddevocional`, `dia`, `mes`, `anual`, `libro`, `capitulo`, `versiculoini`, `versiculofin`) VALUES
(1, 14, 5, 2015, 5, 3, 6, 12),
(5, 15, 5, 2015, 18, 3, 2, 8),
(7, 16, 5, 2015, 20, 2, 3, 3),
(8, 14, 5, 2015, 23, 2, 1, 1);

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
-- Truncar tablas antes de insertar `itemsayuda`
--

TRUNCATE TABLE `itemsayuda`;
--
-- Volcado de datos para la tabla `itemsayuda`
--

INSERT INTO `itemsayuda` (`iditemayuda`, `idseccionayuda`, `titularayuda`, `detalleayuda`) VALUES
(1, 1, 'Registro en la plataforma', 'Para registrarse, debe hacer clic en el enlace "Registrarme" de la página de ingreso de la plataforma, diligenciar los datos solicitados y hacer clic en el botón "Registrar".  Luego revise su correo y siga los pasos para ingresar con su usuario.'),
(2, 3, 'Selección de día', 'Por defecto se presenta el pasaje y el formato de registro del devocional para el día actual.  Si desea cambiarlo primero se debe hacer clic en el botón azul con el año actual, luego en el botón azul con el mes actual y por último clic en el día deseado.'),
(3, 3, 'Diligenciamiento del formato', 'Para diligenciar el formato, debe hacer clic en cada uno de los enlaces que se encuentran debajo del pasaje del día (Dios Me Habla, Hablo con Dios, Hablo con Mi Lider) y se desplegarán cajas de texto para registrar la información del devocional.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE IF NOT EXISTS `libros` (
  `idlibro` int(11) NOT NULL,
  `nomlibro` varchar(50) NOT NULL,
  `abrevlibro` varchar(5) NOT NULL,
  PRIMARY KEY (`idlibro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `libros`
--

TRUNCATE TABLE `libros`;
--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idlibro`, `nomlibro`, `abrevlibro`) VALUES
(1, 'Génesis', 'Gn'),
(2, 'Éxodo', 'Ex'),
(3, 'Levítico', 'Lv'),
(4, 'Números', 'Nm'),
(5, 'Deuteronomio', 'Dt'),
(6, 'Josué', 'Jos'),
(7, 'Jueces', 'Jue'),
(8, 'Rut', 'Rt'),
(9, '1 Samuel', '1S'),
(10, '2 Samuel', '2S'),
(11, '1 Reyes', '1R'),
(12, '2 Reyes', '2R'),
(13, '1 Crónicas', '1Cr'),
(14, '2 Crónicas', '2Cr'),
(15, 'Esdras', 'Esd'),
(16, 'Nehemías', 'Neh'),
(17, 'Ester', 'Est'),
(18, 'Job', 'Job'),
(19, 'Salmos', 'Sal'),
(20, 'Proverbios', 'Pr'),
(21, 'Eclesiastés', 'Ec'),
(22, 'Cantar de los Cantares', 'Cnt'),
(23, 'Isaías', 'Is'),
(24, 'Jeremías', 'Jer'),
(25, 'Lamentaciones', 'Lm'),
(26, 'Ezequiel', 'Ez'),
(27, 'Daniel', 'Dn'),
(28, 'Oseas', 'Os'),
(29, 'Joel', 'Jl'),
(30, 'Am?s', 'Am'),
(31, 'Abdías', 'Abd'),
(32, 'Jon', 'Jon'),
(33, 'Miqueas', 'Miq'),
(34, 'Nahúm', 'Nah'),
(35, 'Habacuc', 'Hab'),
(36, 'Sofonías', 'Sof'),
(37, 'Hageo', 'Hag'),
(38, 'Zacarías', 'Zac'),
(39, 'Malaquías', 'Mal'),
(40, 'Mateo', 'Mt'),
(41, 'Marcos', 'Mc'),
(42, 'Lucas', 'Lc'),
(43, 'Juan', 'Jn'),
(44, 'Hechos', 'Hch'),
(45, 'Romanos', 'Ro'),
(46, '1 Corintios', '1Co'),
(47, '2 Corintios', '2Co'),
(48, 'Gálatas', 'Gl'),
(49, 'Efesios', 'Ef'),
(50, 'Filipenses', 'Flp'),
(51, 'Colosenses', 'Col'),
(52, '1 Tesalonicenses', '1Ts'),
(53, '2 Tesalonicenses', '2Ts'),
(54, '1 Timoteo', '1Ti'),
(55, '2 Timoteo', '2Ti'),
(56, 'Tito', 'Tit'),
(57, 'Filemón', 'Flm'),
(58, 'Hebreos', 'Heb'),
(59, 'Santiago', 'Stg'),
(60, '1 Pedro', '1P'),
(61, '2 Pedro', '2P'),
(62, '1 Juan', '1Jn'),
(63, '2 Juan', '2Jn'),
(64, '3 Juan', '3Jn'),
(65, 'Judas', 'Jud'),
(66, 'Apocalipsis', 'Ap');

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
-- Truncar tablas antes de insertar `seccionesayuda`
--

TRUNCATE TABLE `seccionesayuda`;
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
-- Truncar tablas antes de insertar `usuarios`
--

TRUNCATE TABLE `usuarios`;
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
-- Truncar tablas antes de insertar `zonas`
--

TRUNCATE TABLE `zonas`;
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
