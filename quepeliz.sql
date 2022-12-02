-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-12-2022 a las 04:23:27
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quepeliz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datouser`
--

DROP TABLE IF EXISTS `datouser`;
CREATE TABLE IF NOT EXISTS `datouser` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `apellidoMat` varchar(40) NOT NULL,
  `apellidoPat` varchar(40) NOT NULL,
  `puesto` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contrasena` varchar(60) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

DROP TABLE IF EXISTS `funcion`;
CREATE TABLE IF NOT EXISTS `funcion` (
  `pelicula` varchar(50) NOT NULL,
  `sala` varchar(50) NOT NULL,
  `sucursal` varchar(20) NOT NULL,
  `fecha_exhibicion` date NOT NULL,
  `hora_inicio` varchar(10) NOT NULL,
  `costo` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `id_gene` varchar(5) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`id_gene`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_gene`, `tipo`, `descripcion`) VALUES
('1', 'Comedia', 'Peliculas de comedia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
CREATE TABLE IF NOT EXISTS `pelicula` (
  `id_peli` varchar(5) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `clasificacion` varchar(60) NOT NULL,
  `duracion` varchar(6) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `sinopis` varchar(150) NOT NULL,
  `reparto` varchar(50) NOT NULL,
  `directores` varchar(50) NOT NULL,
  `estatus` varchar(12) NOT NULL,
  PRIMARY KEY (`id_peli`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_peli`, `imagen`, `titulo`, `clasificacion`, `duracion`, `genero`, `sinopis`, `reparto`, `directores`, `estatus`) VALUES
('4', 'images/613ed9bd05f79749abd58377385d50d3.jpg', '67', 'mediana', 'g', 'niÃ±os', 'ggg', 'gg', 'g', 'g'),
('1212', 'images/cfb37e7eebaf13f140d53a98ffd68214.png', '4', 'Grande', '19:56', 'terror', 'dfcs', 'dfg', 'gg', 'g'),
('5555', 'images/IMG-20210808-WA0057_polarr.jpg', 'm', 'Adolescentes y adultos', '7', 'terror', 'g', 'g', 'gj', 'Cartelera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

DROP TABLE IF EXISTS `sala`;
CREATE TABLE IF NOT EXISTS `sala` (
  `id_sala` varchar(5) NOT NULL,
  `tipo_sala` varchar(25) NOT NULL,
  `horario` varchar(10) NOT NULL,
  PRIMARY KEY (`id_sala`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id_sala`, `tipo_sala`, `horario`) VALUES
('2', 'r', '22:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `id_sucursal` varchar(5) NOT NULL,
  `nombre_sucu` varchar(20) NOT NULL,
  `calle` varchar(25) NOT NULL,
  `colonia` varchar(25) NOT NULL,
  `municipio` varchar(25) NOT NULL,
  `cod_postal` int(5) NOT NULL,
  PRIMARY KEY (`id_sucursal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nombre_sucu`, `calle`, `colonia`, `municipio`, `cod_postal`) VALUES
('12', 'mari', 'primero', 'NiÃ±os heroes', 'NezahualcÃ³yotl', 67567);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `clave` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`clave`, `email`, `contrasena`) VALUES
(1, 'empleado@gmail.com', '12345'),
(2, 'empleado1@gmail.com', '123456'),
(3, 'empleadodgfsdg@gmail.com', '123456'),
(4, 'mari@gmail.com', 'Mari1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
