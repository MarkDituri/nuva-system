-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2021 a las 21:20:56
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
-- Base de datos: `intranet_skytel`
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
(2, 'boss', 'Estevan', 'Prueba', 'colombia', 'm', '7852', '1984-11-13', 'Finanzas', 'contador', 'prueba@skytel.com.ar', '123456', 'Skytel', '', '2019-10-08', 'uploads/4cb5009fcf403b272bc88e717e860bdb.jpg', ''),
(3, 'normal', 'Maria', 'Josefina', 'paraguay', 'f', '5040', '1974-11-19', 'Desarrollo', 'Diseñadora Grafica', 'maria@skytel.com.ar', '123456', 'Skytel', '1', '2019-11-18', 'uploads/images.jpg', ''),
(4, 'normal', 'Markis', 'Diutirs', 'argentina', 'm', '7884', '1995-10-30', 'Digital', 'Web', 'marcos.dituri@skytel.com.ar', '123456', '', '2', '2021-10-30', 'uploads/Sin-título-1.jpg', 'normal'),
(7, 'normal', 'Marcos', 'Dituri', 'argentina', 'm', '877', '1995-10-30', 'Digital', 'Wev', 'marcos.dituri@skytel.com.ar', '123456', 'Nuvatronic', '2', '1995-10-30', 'uploads/user.png', 'normal'),
(8, 'normal', 'Eze', 'Dit', 'argentina', 'm', '4478', '1994-10-30', 'Finanzas', 'Webi', 'marcos.dituri@skytel.com.ar', '123456', 'Nuvatronic', '2', '1994-10-30', 'uploads/user.png', 'master'),
(9, 'normal', 'Eze', 'Ditu', 'argentina', 'm', '77744', '1994-10-30', 'Digital', 'Test', 'eze@gmail.com', '4444', 'Nuvatronic', '2', '1995-10-30', 'uploads/unnamed.jpg', 'master'),
(10, 'normal', 'Marks', 'Anthony', 'argentina', 'm', '4785', '1994-10-30', 'Digital', 'Developer', 'eze@hotmail.com', '444555', 'Nuvatronic', '2', '1994-10-30', 'uploads/user.png', 'normal'),
(11, 'normal', 'Prueba', 'Test', 'argentina', 'm', '447', '1995-10-30', 'Digital', 'Test', 'prueba@mail.com', '123456789', 'Nuvatronic', '2', '1994-10-30', 'uploads/usuario-de-perfil.png', 'normal');

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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios_boss`
--
ALTER TABLE `usuarios_boss`
  MODIFY `id_usuario` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
