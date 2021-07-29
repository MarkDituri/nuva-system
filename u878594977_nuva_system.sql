-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-07-2021 a las 00:07:03
-- Versión del servidor: 10.4.19-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u878594977_nuva_system`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(250) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `nombre`) VALUES
(1, 'Digital'),
(2, 'RRHH'),
(3, 'Finanzas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_tareas`
--

CREATE TABLE `estados_tareas` (
  `id_estado_tarea` int(250) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `icono` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados_tareas`
--

INSERT INTO `estados_tareas` (`id_estado_tarea`, `nombre`, `icono`) VALUES
(1, 'Pendiente', '<i class=\'fas fa-play color-as\'></i>'),
(2, 'En curso', '<i class=\'fas fa-toolbox color-tr\'></i>'),
(3, 'Completado', '<i class=\'fas fa-check-circle color-fn\'></i>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` int(250) NOT NULL,
  `status` varchar(2) DEFAULT NULL,
  `estado` varchar(250) DEFAULT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `detalle` varchar(250) DEFAULT NULL,
  `link_1` varchar(250) DEFAULT NULL,
  `link_2` varchar(250) DEFAULT NULL,
  `link_3` varchar(250) DEFAULT NULL,
  `id_usuario` varchar(250) DEFAULT NULL,
  `fecha_1` date NOT NULL,
  `fecha_2` date NOT NULL,
  `fecha_3` date NOT NULL,
  `fecha_4` date NOT NULL,
  `email_noti_1` varchar(100) NOT NULL,
  `email_noti_2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `status`, `estado`, `titulo`, `detalle`, `link_1`, `link_2`, `link_3`, `id_usuario`, `fecha_1`, `fecha_2`, `fecha_3`, `fecha_4`, `email_noti_1`, `email_noti_2`) VALUES
(7, 'no', '3', 'Crear video de nuva para youtube', 'Este es un detalle de ejemplo para el video de youtube', 'https://www.google.com', '', '', '13', '2021-07-13', '2021-07-14', '0000-00-00', '0000-00-00', '', ''),
(8, 'no', '1', 'Tarea numero2 de ejemplo', '', '', '', '', '15', '2021-07-14', '2021-07-22', '0000-00-00', '0000-00-00', '', ''),
(9, 'si', '3', 'Crear un video para youitube de nuva', 'este es un detalle de prueba aca va ams información de la tarea', 'https://www.google.com/', '', '', '13', '2021-07-12', '2021-07-14', '0000-00-00', '0000-00-00', '', ''),
(10, 'no', '3', 'Tarea de ejemplo numero Dos', '', '', '', '', '14', '2021-07-13', '2021-07-14', '0000-00-00', '0000-00-00', '', ''),
(11, 'no', '1', 'Primera', '', '', '', '', '13', '2021-07-17', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(12, 'no', '1', 'Segunda', '', '', '', '', '13', '2021-07-17', '2021-07-18', '0000-00-00', '0000-00-00', '', ''),
(13, 'no', '1', 'Segunda', '', '', '', '', '13', '2021-07-18', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(14, 'no', '1', 'Tercera', '', '', '', '', '13', '2021-07-17', '2021-07-18', '2021-07-19', '0000-00-00', '', ''),
(15, 'no', '1', 'Tercera', '', '', '', '', '13', '2021-07-18', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(16, 'no', '1', 'Tercera', '', '', '', '', '13', '2021-07-19', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(17, 'no', '3', 'Cuarta', '', '', '', '', '13', '2021-07-17', '2021-07-18', '2021-07-19', '2021-07-20', '', ''),
(18, 'no', '2', 'Cuarta', '', '', '', '', '13', '2021-07-18', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(19, 'no', '1', 'Cuarta', '', '', '', '', '13', '2021-07-19', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(20, 'no', '1', 'Cuarta', '', '', '', '', '13', '2021-07-20', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(21, 'no', '1', 'Para Lucas', '', '', '', '', '14', '2021-07-18', '2021-07-30', '0000-00-00', '0000-00-00', '', ''),
(22, 'no', '3', 'Para Lucas', '', '', '', '', '14', '2021-07-30', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(23, 'no', '3', 'Para test', '', '', '', '', '16', '2021-07-17', '2021-07-18', '0000-00-00', '0000-00-00', '', ''),
(24, 'no', '1', 'Para test', '', '', '', '', '16', '2021-07-18', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(25, 'si', '3', 'Reporte Stock', 'Actualizacion reporte stock', 'https://docs.google.com/spreadsheets/d/13FNRL8QCCcaT4MfxKjQmIiDegWEMC2VI/edit?rtpof=true', '', '', '16', '2021-07-19', '2021-07-20', '2021-07-21', '2021-07-22', '', ''),
(26, 'si', '3', 'Reporte Stock', 'Actualizacion reporte stock', 'https://docs.google.com/spreadsheets/d/13FNRL8QCCcaT4MfxKjQmIiDegWEMC2VI/edit?rtpof=true', '', '', '16', '2021-07-20', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(27, 'si', '1', 'Reporte Stock', 'Actualizacion reporte stock', 'https://docs.google.com/spreadsheets/d/13FNRL8QCCcaT4MfxKjQmIiDegWEMC2VI/edit?rtpof=true', '', '', '16', '2021-07-21', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(28, 'si', '1', 'Reporte Stock', 'Actualizacion reporte stock', 'https://docs.google.com/spreadsheets/d/13FNRL8QCCcaT4MfxKjQmIiDegWEMC2VI/edit?rtpof=true', '', '', '16', '2021-07-22', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(29, 'si', '1', 'PVP DIARIO', 'Completar precio de analisis diario', '', '', '', '16', '2021-07-19', '2021-07-20', '2021-07-21', '2021-07-22', '', ''),
(30, 'si', '1', 'PVP DIARIO', 'Completar precio de analisis diario', '', '', '', '16', '2021-07-20', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(31, 'si', '1', 'PVP DIARIO', 'Completar precio de analisis diario', '', '', '', '16', '2021-07-21', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(32, 'si', '1', 'PVP DIARIO', 'Completar precio de analisis diario', '', '', '', '16', '2021-07-22', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(33, 'si', '1', 'Facturacion', 'Facturacion Contabilium Ventas', '', '', '', '16', '2021-07-19', '2021-07-20', '2021-07-21', '2021-07-22', '', ''),
(34, 'si', '1', 'Facturacion', 'Facturacion Contabilium Ventas', '', '', '', '16', '2021-07-20', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(35, 'si', '1', 'Facturacion', 'Facturacion Contabilium Ventas', '', '', '', '16', '2021-07-21', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(36, 'si', '1', 'Facturacion', 'Facturacion Contabilium Ventas', '', '', '', '16', '2021-07-22', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(37, 'si', '1', 'Control Stock Manual', '', '', '', '', '16', '2021-07-23', '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(38, 'si', '3', 'Prueba envio', '', '', '', '', '12', '2021-07-25', '0000-00-00', '0000-00-00', '0000-00-00', 'edituri.nuvatronic@outlook.com', '0'),
(39, 'si', '3', 'Titulo prueba', 'detalles prueba', '', '', '', '13', '2021-07-25', '0000-00-00', '0000-00-00', '0000-00-00', 'edituri.nuvatronic@outlook.com', 'edituri.nuvatronic@outlook.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(250) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `apellido` varchar(500) DEFAULT NULL,
  `pais` varchar(250) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `interno` varchar(20) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `area` varchar(500) DEFAULT NULL,
  `cargo` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `clave` varchar(500) DEFAULT NULL,
  `empresa` varchar(500) DEFAULT NULL,
  `superior` varchar(250) NOT NULL,
  `fecha_ing` date NOT NULL DEFAULT current_timestamp(),
  `URL_imagen` text NOT NULL,
  `acceso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `tipo`, `nombre`, `apellido`, `pais`, `sexo`, `interno`, `fecha`, `area`, `cargo`, `email`, `clave`, `empresa`, `superior`, `fecha_ing`, `URL_imagen`, `acceso`) VALUES
(12, 'boss', 'Nuva', 'Tronic', 'argentina', 'm', '1133048081', '1994-07-04', 'n/a', 'CEO', 'nuvatronicarg@gmail.com', 'admin2021!!', 'Nuvatronic', '12', '2021-07-04', 'uploads/icon.jpg', 'master'),
(13, 'normal', 'Marcos', 'Dituri', 'argentina', 'm', '1133048081', '1994-10-30', 'Digital', 'Programación web', 'edituri.nuvatronic@outlook.com', '123456', 'Nuvatronic', '12', '2021-06-28', 'uploads/marcos.jpg', 'normal'),
(14, 'normal', 'Lucas', 'Motta', 'argentina', 'm', '1150411620', '1995-01-18', 'CEO', '', 'lmotta.nuvatronic@outlook.com', 'Agosto2020*', 'Nuvatronic', '12', '2020-08-20', 'uploads/user.png', 'master'),
(15, 'normal', 'Ezequiel', 'Mosquera', 'argentina', 'm', '11 6442-9059', '1995-01-01', 'CEO', '', 'emosquera.nuvatronic@outlook.com', 'Agosto2020*', 'Nuvatronic', '12', '2020-08-20', 'uploads/user.png', 'master'),
(16, 'normal', 'Mariana', 'Danese', 'argentina', 'f', '11 4041-6073', '2000-01-01', 'Administracion', 'Atencion al cliente y gestion de ventas', 'mdanese.nuvatronic@outlook.com', 'Marzo2021*', 'Nuvatronic', '12', '2021-03-20', 'uploads/user.png', 'normal'),
(17, 'normal', 'Alejandra', 'Bulkitch', 'argentina', 'f', '11 2658-2741', '1965-05-03', 'Logistica', 'Deposito y Despacho', 'abulkitch.nuvatronic@outlook.com', 'Diciembre2020*', 'Nuvatronic', '12', '2020-12-22', 'uploads/user.png', 'normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_boss`
--

CREATE TABLE `usuarios_boss` (
  `id_usuario` int(250) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `apellido` varchar(500) DEFAULT NULL,
  `pais` varchar(250) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `interno` varchar(20) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `area` varchar(500) DEFAULT NULL,
  `cargo` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `clave` varchar(500) DEFAULT NULL,
  `empresa` varchar(500) DEFAULT NULL,
  `superior` varchar(250) NOT NULL,
  `fecha_ing` date NOT NULL DEFAULT current_timestamp(),
  `URL_imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `estados_tareas`
--
ALTER TABLE `estados_tareas`
  ADD PRIMARY KEY (`id_estado_tarea`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuarios_boss`
--
ALTER TABLE `usuarios_boss`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estados_tareas`
--
ALTER TABLE `estados_tareas`
  MODIFY `id_estado_tarea` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios_boss`
--
ALTER TABLE `usuarios_boss`
  MODIFY `id_usuario` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
