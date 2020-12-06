-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-12-2020 a las 19:01:01
-- Versión del servidor: 5.6.50-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `geoconst_beacons`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conexiones_beacons`
--

CREATE TABLE `conexiones_beacons` (
  `conexion_id` int(10) NOT NULL COMMENT 'Identificador de conexion ',
  `fecha` date NOT NULL COMMENT 'fecha de conexion',
  `id_user` int(10) NOT NULL COMMENT 'identificador de usuario',
  `estado_conexion` varchar(12) NOT NULL COMMENT 'estado de la conexion: conectado,desconectado',
  `la_latitud` decimal(11,7) NOT NULL COMMENT 'latitud conexion usuario',
  `la_longitud` decimal(11,7) NOT NULL COMMENT 'longitud conexion usuario',
  `nodo_id` int(10) NOT NULL COMMENT 'identificador del nodo al que esta conectado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conexiones_beacons`
--

INSERT INTO `conexiones_beacons` (`conexion_id`, `fecha`, `id_user`, `estado_conexion`, `la_latitud`, `la_longitud`, `nodo_id`) VALUES
(1, '2020-12-22', 3, 'CONECTADO', 31.8254400, -116.5990000, 1),
(2, '2020-12-24', 4, 'CONECTADO', 31.8252800, -116.5990000, 1),
(27, '2020-12-12', 29, 'CONECTADO', 31.8240900, -116.5975000, 4),
(28, '2020-12-12', 30, 'CONECTADO', 31.8240900, -116.5975000, 4),
(29, '2020-12-12', 31, 'CONECTADO', 31.8241500, -116.5976000, 4),
(30, '2020-12-12', 32, 'CONECTADO', 31.8241300, -116.5975000, 4),
(31, '2020-12-12', 33, 'CONECTADO', 31.8241500, -116.5974000, 4),
(32, '2020-12-12', 34, 'CONECTADO', 31.8242100, -116.5975000, 4),
(33, '2020-12-12', 35, 'CONECTADO', 31.8241100, -116.5975000, 4),
(34, '2020-12-12', 36, 'CONECTADO', 31.8240600, -116.5975000, 4),
(35, '2020-12-12', 37, 'CONECTADO', 31.8240400, -116.5975000, 4),
(36, '2020-12-12', 38, 'CONECTADO', 31.8241000, -116.5975000, 4),
(37, '2020-12-12', 39, 'CONECTADO', 31.8243200, -116.5975000, 2),
(38, '2020-12-12', 40, 'CONECTADO', 31.8243100, -116.5977000, 2),
(39, '2020-12-12', 41, 'CONECTADO', 31.8245500, -116.5977000, 2),
(40, '2020-12-12', 42, 'CONECTADO', 31.8244000, -116.5976000, 2),
(41, '2020-12-12', 43, 'CONECTADO', 31.8243300, -116.5976000, 2),
(42, '2020-12-12', 44, 'CONECTADO', 31.8243700, -116.5978000, 2),
(43, '2020-12-12', 45, 'CONECTADO', 31.8242800, -116.5976000, 2),
(44, '2020-12-12', 46, 'CONECTADO', 31.8245700, -116.5978000, 2),
(45, '2020-12-12', 47, 'CONECTADO', 31.8243200, -116.5978000, 2),
(46, '2020-12-12', 48, 'CONECTADO', 31.8245400, -116.5977000, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conexiones_beacons`
--
ALTER TABLE `conexiones_beacons`
  ADD PRIMARY KEY (`conexion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conexiones_beacons`
--
ALTER TABLE `conexiones_beacons`
  MODIFY `conexion_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de conexion ', AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
