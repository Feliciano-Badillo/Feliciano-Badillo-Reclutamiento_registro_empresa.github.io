-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-11-2022 a las 19:05:28
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresarios`
--

CREATE TABLE `empresarios` (
  `id_empresario` int(6) NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contrasena` char(64) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estatus` smallint(6) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(6) NOT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `siglas` varchar(16) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ceo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `giro` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tamano` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `celular` char(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `catalogo_puestos` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estatus` smallint(6) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id_empresa` int(6) NOT NULL,
  `id_oferta` int(11) NOT NULL,
  `habilidades` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `conocimientos` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `grado_academico` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `experiencia` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `puesto` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `horario_trabajo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `requisitos` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `estatus` smallint(6) NOT NULL,
  `actualizar_oferta` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `salario` int(6) NOT NULL,
  `lugar_puesto` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresarios`
--
ALTER TABLE `empresarios`
  ADD PRIMARY KEY (`id_empresario`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id_empresa`,`id_oferta`),
  ADD KEY `empresas_ofertas_fk` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
