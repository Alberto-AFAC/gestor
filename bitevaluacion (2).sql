-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2021 a las 18:36:09
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitevaluacion`
--

CREATE TABLE `bitevaluacion` (
  `id` int(11) NOT NULL,
  `date_update` date NOT NULL,
  `obtained` varchar(255) NOT NULL,
  `evaluation` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bitevaluacion`
--

INSERT INTO `bitevaluacion` (`id`, `date_update`, `obtained`, `evaluation`, `start_date`, `end_date`) VALUES
(1, '2021-09-07', '', '100', '2021-09-08', '2021-09-08'),
(2, '2021-09-07', '', '75', '2021-10-02', '2021-11-14'),
(3, '2021-09-07', '', '50', '2021-09-10', '2021-09-24'),
(4, '2021-09-07', '', '75.2', '2021-08-04', '2021-09-07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitevaluacion`
--
ALTER TABLE `bitevaluacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitevaluacion`
--
ALTER TABLE `bitevaluacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
