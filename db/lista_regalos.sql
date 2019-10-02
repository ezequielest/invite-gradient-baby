-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-10-2019 a las 03:04:19
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `invite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_regalos`
--

DROP TABLE IF EXISTS `lista_regalos`;
CREATE TABLE IF NOT EXISTS `lista_regalos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gift` varchar(50) NOT NULL,
  `gifted` char(1) NOT NULL DEFAULT '0',
  `gifted_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lista_regalos`
--

INSERT INTO `lista_regalos` (`id`, `gift`, `gifted`, `gifted_by`) VALUES
(1, 'Heladera', '1', 'ezequiel estigarribia'),
(2, 'Cafetera', '1', 'Debora Frojan'),
(3, 'Micro Hondas', '1', 'Juan M Nosecuanto'),
(4, 'Acolchado', '0', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
