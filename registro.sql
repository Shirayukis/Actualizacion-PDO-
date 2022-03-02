-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-03-2022 a las 17:14:14
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `Id` int(9) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_reg` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `termino` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `definicion` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estatus` enum('Capturado','Publicado') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`Id`, `nombre`, `email`, `fecha_reg`, `termino`, `definicion`, `estatus`) VALUES
(23, 'alejandro', 'alejandro.castelancbc@gmail.com', '18/02/22', 'Cartel', 'definicion', 'Capturado'),
(24, 'Tiburon', 'Tiburcio@gmail.com', '18/02/22', 'Costo anual', 'definicion', 'Capturado'),
(25, 'Panda', 'PandaNation@gmail.com', '18/02/22', 'Costo fijo', 'definicion', 'Capturado'),
(26, 'Hamster', 'Hamster@outlook.com', '18/02/22', 'Costo Variable', 'definicion', 'Capturado'),
(27, 'Hamster', 'Hamster@outlook.com', '18/02/22', 'Costo Variable', 'definicion', 'Capturado'),
(28, 'Hamster', 'Hamster@outlook.com', '18/02/22', 'Costo Variable', 'definicion', 'Capturado'),
(29, 'Caballo', 'Caballo@outlook.com', '18/02/22', 'Cartera', 'definicion', 'Capturado'),
(30, 'Caballo', 'Caballo@outlook.com', '18/02/22', 'Cartera', 'definicion', 'Capturado'),
(31, 'MHZDRS', 'alejandro.castelancbc@gmail.com', '18/02/22', 'Cartera', 'definicion', 'Capturado'),
(32, 'MHZDRS', 'alejandro.castelancbc@gmail.com', '18/02/22', 'Cartera', 'definicion', 'Capturado'),
(33, 'Roberto', 'Roberto@outlook.com', '21/02/22', 'Cotizacion', 'definicion', 'Capturado'),
(34, 'Roberto', 'kurokami16@outlook.com', '22/02/22', 'Hola', 'definicion', 'Capturado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `Id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
