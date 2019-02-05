-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2019 a las 04:49:17
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `codproducto` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `detalle` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codproducto`, `nombre`, `precio`, `detalle`, `foto`, `fecha`, `hora`, `activo`) VALUES
(6, 'aaaaaaaaaa', 45, 'vvvvvvvvvvvvvvvvvvvvvvkjvgjkvg', 'imagen19.jpg', '2019-01-31', '14:02:48', 1),
(4, 'aaaaaaaaaa', 45, 'vvvvvvvvvvvvvvvvvvvvvvkjvgjkvg', 'imagen17.jpg', '2019-01-31', '13:59:46', 1),
(3, 'aaaaaaaaaa', 45, 'vvvvvvvvvvvvvvvvvvvvvvkjvgjkvg', 'imagen16.jpg', '2019-01-31', '13:54:23', 1),
(5, 'aaaaaaaaaa', 45, 'vvvvvvvvvvvvvvvvvvvvvvkjvgjkvg', 'imagen18.jpg', '2019-01-31', '14:00:41', 1),
(7, 'aaaaaaaaaa', 45, 'vvvvvvvvvvvvvvvvvvvvvvkjvgjkvg', 'imagen110.jpg', '2019-01-31', '14:03:35', 1),
(8, 'eqweqwe', 12, 'sdgsdgfdsgfdsfg', 'Tulips.jpg', '2019-01-31', '14:09:01', 1),
(9, 'erwewr', 12, 'sdfasdfsdf', 'Jellyfish.jpg', '2019-01-31', '14:09:13', 1),
(10, 'erwewr', 12, 'sdfasdfsdf', 'Jellyfish1.jpg', '2019-01-31', '14:09:17', 1),
(11, 'erwewr', 12, 'sdfasdfsdf', 'Jellyfish2.jpg', '2019-01-31', '14:09:19', 1),
(12, 'sdfasdfasf', 12, 'qweqwewefqwefqwefqef', 'Koala.jpg', '2019-01-31', '14:09:31', 1),
(13, 'ddddddddddddddddddddddd', 34, 'qqqqqqqqsdfasfasdfasdfgfhjghj', 'Lighthouse.jpg', '2019-01-31', '14:09:55', 1),
(14, 'ddddddddddddddddddddddd', 34, 'qqqqqqqqsdfasfasdfasdfgfhjghj', 'Lighthouse1.jpg', '2019-01-31', '14:09:57', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `codusuario` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `paterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `materno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ci` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  `nick` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `contra` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codusuario`, `nombre`, `paterno`, `materno`, `ci`, `nivel`, `nick`, `contra`, `fecha`, `hora`, `activo`) VALUES
(1, 'Andres', 'Murillo', 'Mamani', '8340433', 1, 'Murisan', '123456', '2019-01-31', '23:10:48', 1),
(2, 'Andres', 'Murillo', 'Mamani', '8340433', 1, 'Murisan', '123456', '2019-01-31', '23:11:22', 1),
(3, 'Andres', 'Murillo', 'Mamani', '8340433', 1, 'Murisan', '123456', '2019-01-31', '23:21:24', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codproducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
