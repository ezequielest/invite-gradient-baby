-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 08-10-2019 a las 03:23:21
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `invite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `guest`
--

INSERT INTO `guest` (`id`, `description`, `confirmed`) VALUES
(1, 'Familia Froja', 0),
(2, 'Miguel Leonard', 0),
(3, 'Lucas Lara', 0),
(4, 'Familia Ruis', 0),
(5, 'Fernandez', 0),
(6, 'Familia Ruis', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;