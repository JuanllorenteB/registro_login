-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2023 a las 02:30:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_datos_aerolinea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_destino`
--

CREATE TABLE `tbl_destino` (
  `id_destino` int(11) NOT NULL,
  `vuelos_destinos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_destino`
--

INSERT INTO `tbl_destino` (`id_destino`, `vuelos_destinos`) VALUES
(1, 'Bogota'),
(2, 'Medellin'),
(3, 'Tokio'),
(4, 'Toronto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado`
--

CREATE TABLE `tbl_estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_estado`
--

INSERT INTO `tbl_estado` (`id_estado`, `estado`) VALUES
(1, 'pago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_precio`
--

CREATE TABLE `tbl_precio` (
  `id_precio` int(11) NOT NULL,
  `precio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_precio`
--

INSERT INTO `tbl_precio` (`id_precio`, `precio`) VALUES
(1, '$ 100 dolares'),
(3, '$ 900 dolares'),
(4, '$ 1.100 dolares');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservas`
--

CREATE TABLE `tbl_reservas` (
  `id_reservas` int(11) NOT NULL,
  `id_vuelo` int(11) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `vuelo_salida` date NOT NULL,
  `vuelo_regreso` date NOT NULL,
  `correos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_reservas`
--

INSERT INTO `tbl_reservas` (`id_reservas`, `id_vuelo`, `nombre_cliente`, `vuelo_salida`, `vuelo_regreso`, `correos`) VALUES
(22, 3, 'juan', '2023-05-30', '2023-05-31', 'c@gmail.com'),
(25, 3, 'pedro', '2023-05-22', '2023-05-23', 'oscar@gmail.com'),
(28, 3, 'juan', '2023-05-31', '2023-06-23', 'cf@gmail.com'),
(29, 2, 'juan', '2023-05-31', '2023-06-01', 'pedro@gmai.com'),
(31, 2, 'maria', '2023-05-27', '2023-05-31', 'juan@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_salida`
--

CREATE TABLE `tbl_salida` (
  `id_salida` int(11) NOT NULL,
  `vuelos_salida` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_salida`
--

INSERT INTO `tbl_salida` (`id_salida`, `vuelos_salida`) VALUES
(1, 'Medellin'),
(2, 'Bogotá');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ticket`
--

CREATE TABLE `tbl_ticket` (
  `id_ticket` int(11) NOT NULL,
  `id_reservas` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_ticket`
--

INSERT INTO `tbl_ticket` (`id_ticket`, `id_reservas`, `id_estado`, `correo`) VALUES
(30, 22, 1, 'c@gmail.com'),
(31, 25, 1, 'oscar@gmail.com'),
(32, 28, 1, 'cf@gmail.com'),
(33, 29, 1, 'pedro@gmai.com'),
(34, 31, 1, 'juan@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `passwor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombre`, `telefono`, `correo`, `passwor`) VALUES
(82, 'juan', '3123123211', 'juan@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_vuelo`
--

CREATE TABLE `tbl_vuelo` (
  `id_vuelo` int(11) NOT NULL,
  `id_salida` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `id_precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_vuelo`
--

INSERT INTO `tbl_vuelo` (`id_vuelo`, `id_salida`, `id_destino`, `id_precio`) VALUES
(3, 1, 1, 1),
(4, 1, 4, 3),
(1, 2, 2, 1),
(2, 2, 3, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_destino`
--
ALTER TABLE `tbl_destino`
  ADD PRIMARY KEY (`id_destino`);

--
-- Indices de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `tbl_precio`
--
ALTER TABLE `tbl_precio`
  ADD PRIMARY KEY (`id_precio`);

--
-- Indices de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD PRIMARY KEY (`id_reservas`),
  ADD KEY `id_vuelos` (`id_vuelo`);

--
-- Indices de la tabla `tbl_salida`
--
ALTER TABLE `tbl_salida`
  ADD PRIMARY KEY (`id_salida`);

--
-- Indices de la tabla `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `id_reservas` (`id_reservas`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `tbl_vuelo`
--
ALTER TABLE `tbl_vuelo`
  ADD PRIMARY KEY (`id_vuelo`),
  ADD KEY `id_salida` (`id_salida`,`id_destino`,`id_precio`),
  ADD KEY `id_precio` (`id_precio`),
  ADD KEY `id_destino` (`id_destino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_destino`
--
ALTER TABLE `tbl_destino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_precio`
--
ALTER TABLE `tbl_precio`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  MODIFY `id_reservas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `tbl_salida`
--
ALTER TABLE `tbl_salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `tbl_vuelo`
--
ALTER TABLE `tbl_vuelo`
  MODIFY `id_vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD CONSTRAINT `tbl_reservas_ibfk_1` FOREIGN KEY (`id_vuelo`) REFERENCES `tbl_vuelo` (`id_vuelo`);

--
-- Filtros para la tabla `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  ADD CONSTRAINT `tbl_ticket_ibfk_2` FOREIGN KEY (`id_reservas`) REFERENCES `tbl_reservas` (`id_reservas`),
  ADD CONSTRAINT `tbl_ticket_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `tbl_estado` (`id_estado`);

--
-- Filtros para la tabla `tbl_vuelo`
--
ALTER TABLE `tbl_vuelo`
  ADD CONSTRAINT `tbl_vuelo_ibfk_1` FOREIGN KEY (`id_precio`) REFERENCES `tbl_precio` (`id_precio`),
  ADD CONSTRAINT `tbl_vuelo_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `tbl_destino` (`id_destino`),
  ADD CONSTRAINT `tbl_vuelo_ibfk_3` FOREIGN KEY (`id_salida`) REFERENCES `tbl_salida` (`id_salida`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
