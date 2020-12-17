-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2020 a las 02:12:11
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mercancia`
--
CREATE DATABASE IF NOT EXISTS `mercancia` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `mercancia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `Nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Unidad` int(255) NOT NULL,
  `Cantidad` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Precio_c` int(255) NOT NULL,
  `Precio_v` int(255) NOT NULL,
  `Ganancia` int(255) NOT NULL,
  `Imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`Nombre`, `Unidad`, `Cantidad`, `Precio_c`, `Precio_v`, `Ganancia`, `Imagen`) VALUES
('Tatuaje', 83, 'Unidad', 1000, 2000, 1000, '20190903_jHkR1LGejluZxwT.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `Nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Unidad` int(255) NOT NULL,
  `Cantidad` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Precio_c` int(255) NOT NULL,
  `Precio_v` int(255) NOT NULL,
  `Ganancias` int(255) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`Nombre`, `Unidad`, `Cantidad`, `Precio_c`, `Precio_v`, `Ganancias`, `Fecha`) VALUES
('Tatuaje', 20, 'Unidad', 1000, 2000, 1000, '2020-12-06 16:21:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `vendedor` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Unidad` int(255) NOT NULL,
  `Cantidad` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Precio_c` int(255) NOT NULL,
  `Precio_v` int(255) NOT NULL,
  `Ganancias` int(255) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`vendedor`, `Nombre`, `Unidad`, `Cantidad`, `Precio_c`, `Precio_v`, `Ganancias`, `Fecha`) VALUES
('willian', 'Tatuaje', 1, 'Unidad', 1000, 2000, 1000, '2020-12-06 16:13:01'),
('willian', 'Tatuaje', 1, 'Unidad', 1000, 2000, 1000, '2020-12-06 16:19:16'),
('willian', 'Tatuaje', 2, 'Unidad', 1000, 2000, 1000, '2020-12-06 16:20:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
