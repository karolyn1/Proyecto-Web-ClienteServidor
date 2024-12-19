-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2024 a las 08:56:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `casanatura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `ID_Animal` int(10) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Raza` varchar(30) NOT NULL,
  `Especie` varchar(30) NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Estado_Salud` varchar(20) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Apadrinado` tinyint(1) NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  `Historia` varchar(255) NOT NULL,
  `Necesidades` varchar(255) NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`ID_Animal`, `Nombre`, `Raza`, `Especie`, `Fecha_Ingreso`, `Estado_Salud`, `Fecha_Nacimiento`, `Apadrinado`, `Imagen`, `Historia`, `Necesidades`, `Estado`) VALUES
(7, 'sdsd', 'sd', 'sdsd', '2024-12-20', 'sdds', '2024-12-20', 1, '../imagenes/query.jpg', 'sd', 'sd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal_usuario`
--

CREATE TABLE `animal_usuario` (
  `ID` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Animal` int(11) NOT NULL,
  `FechaApadrinamiento` date NOT NULL,
  `FechaFin` date DEFAULT NULL,
  `Monto` decimal(10,0) NOT NULL,
  `Frecuencia` varchar(50) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `animal_usuario`
--

INSERT INTO `animal_usuario` (`ID`, `ID_Usuario`, `ID_Animal`, `FechaApadrinamiento`, `FechaFin`, `Monto`, `Frecuencia`, `Estado`) VALUES
(17, 1, 7, '2024-12-19', '2024-12-19', 70, 'Mensual', 0),
(18, 4, 7, '2024-12-19', '2024-12-19', 80, 'Mensual', 0),
(19, 4, 7, '2024-12-19', '2024-12-19', 90, '', 0),
(20, 1, 7, '2024-12-19', NULL, 90, 'Mensual', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ID_Usuario` int(10) DEFAULT NULL,
  `Mensaje` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`ID`, `Nombre`, `Apellido`, `Email`, `ID_Usuario`, `Mensaje`) VALUES
(1, 'Paola    ', 'Calderon', 'arianafallas1@gmail.com', 2, 'sdf'),
(2, 'Paola    ', 'Calderon', 'arianafallas1@gmail.com', 2, 'dfj'),
(3, 'Paola    ', 'Calderon', 'arianafallas1@gmail.com', 2, 'dd'),
(4, 'Paola    ', 'Calderon', 'arianafallas1@gmail.com', 2, 'ff'),
(5, 'ariana', 'fallas', 'ari@gmsj.com', NULL, 'hahs'),
(6, 'sas', 'as', 'p@gmail.com', NULL, 's'),
(7, 'dd', 'd', 'd@gmail.com', NULL, 'eks'),
(14, 'ariana', 'fallas', 'a@gmail.com', NULL, '1234\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `ID_Direccion` int(10) NOT NULL,
  `Provincia` varchar(20) NOT NULL,
  `Canton` varchar(20) NOT NULL,
  `Distrito` varchar(20) NOT NULL,
  `Direccion_Exacta` text NOT NULL,
  `ID_Usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`ID_Direccion`, `Provincia`, `Canton`, `Distrito`, `Direccion_Exacta`, `ID_Usuario`) VALUES
(1, 'Cartago', 'Cartago', 'Cartago', 'La Lima Cartago', 1),
(2, 'Cartago', 'Heredia', 'd', 'd', 2),
(3, 'f', 'f', 'f', 'f', 3),
(4, 'fs', 'fs', 'fs', 'fs', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `ID_Donacion` int(10) NOT NULL,
  `Monto` int(50) NOT NULL,
  `Fecha` date NOT NULL,
  `ID_Usuario` int(10) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `MetodoPago` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `donaciones`
--

INSERT INTO `donaciones` (`ID_Donacion`, `Monto`, `Fecha`, `ID_Usuario`, `Estado`, `MetodoPago`) VALUES
(1, 20000, '2024-11-01', 1, 1, NULL),
(2, 20000, '2024-12-02', 1, 1, NULL),
(3, 20, '2024-12-18', 2, 1, 'sinpe'),
(4, 20, '2024-12-18', 2, 1, 'sinpe'),
(5, 70, '2024-12-18', 2, 1, 'tarjeta'),
(6, 70, '2024-12-18', 2, 1, 'tarjeta'),
(7, 78, '2024-12-18', 2, 1, 'tarjeta'),
(8, 78, '2024-12-18', 2, 1, 'tarjeta'),
(9, 23, '2024-12-18', 2, 1, 'tarjeta'),
(10, 23, '2024-12-18', 2, 1, 'tarjeta'),
(11, 46, '2024-12-18', 2, 1, 'sinpe'),
(12, 46, '2024-12-18', 2, 1, 'sinpe'),
(13, 90, '2024-12-18', 2, 1, 'tarjeta'),
(14, 90, '2024-12-18', 2, 1, 'tarjeta'),
(15, 90, '2024-12-18', 2, 1, 'tarjeta'),
(16, 90, '2024-12-18', 2, 1, 'tarjeta'),
(17, 23, '2024-12-18', 2, 1, 'tarjeta'),
(18, 78, '2024-12-18', 2, 1, 'tarjeta'),
(19, 25, '2024-12-18', 2, 1, 'tarjeta'),
(20, 78, '2024-12-18', 2, 1, 'tarjeta'),
(21, 90, '2024-12-18', 2, 1, 'tarjeta'),
(22, 23, '2024-12-18', 2, 1, 'tarjeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `ID_Evento` int(10) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time(6) NOT NULL,
  `Lugar` varchar(50) NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  `Cupos` int(11) DEFAULT NULL,
  `CuposVendidos` int(11) NOT NULL,
  `Costo` decimal(10,2) NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ID_Evento`, `Nombre`, `Descripcion`, `Fecha`, `Hora`, `Lugar`, `Imagen`, `Cupos`, `CuposVendidos`, `Costo`, `Estado`) VALUES
(5, 'CCaminata', 'hdjd', '2024-12-21', '22:16:00.000000', 'ss', 'Digrama Relacional proyecto.jpg', 0, 1, 12.00, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ID_Rol` int(10) NOT NULL,
  `Rol` varchar(15) NOT NULL,
  `ID_Usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ID_Rol`, `Rol`, `ID_Usuario`) VALUES
(2, 'cliente', 2),
(3, 'admin', 3),
(4, 'cliente', 4),
(5, 'cliente', 1),
(6, 'cliente', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tours`
--

CREATE TABLE `tours` (
  `ID_Tour` int(10) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time(6) NOT NULL,
  `Precio_Boleto` decimal(10,2) NOT NULL,
  `Tickets_Disponibles` int(10) NOT NULL,
  `TicketsVendidos` int(11) NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tours`
--

INSERT INTO `tours` (`ID_Tour`, `Nombre`, `Descripcion`, `Fecha`, `Hora`, `Precio_Boleto`, `Tickets_Disponibles`, `TicketsVendidos`, `Imagen`, `Estado`) VALUES
(2, 'sdf', 'gsrg', '2024-12-06', '22:15:00.000000', 0.00, 0, 31, 'imagenes/imagen (1).png', 1),
(3, 's', 's', '2024-12-05', '21:23:00.000000', 23.00, 20, 23, 'imagenes/query.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(10) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Apellido1` varchar(15) NOT NULL,
  `Apellido2` varchar(15) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono` int(40) DEFAULT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Password`, `Apellido1`, `Apellido2`, `Correo`, `Telefono`, `Estado`) VALUES
(1, 'Ariana     ', '$2y$10$AcomD5YW.cE.vGnLBnydOO68HuK91I1gA550wXWsdfqU7URVl8d32', 'Fallas     ', 'Calderon     ', 'ariana@gmail.com', 72307240, 'Activo'),
(2, 'Paola       ', '$2y$10$hKcs9UMsu86dtkvS.1CNgOJjIsyARHPBheqikhLOWlnDazR8NCQvO', 'Calderon   ', 'Romero   ', 'arianafallas1@gmail.com', 72307240, 'Activo'),
(3, 'Ariana', '$2y$10$h/k.3o8W2CxzLv3UMNK5I.nqt/U4WFAaddmwidFFPgIIGiuj8ilgK', 'Fallas', 'Calderon', 'a2@gmail.com', 72307240, 'Activo'),
(4, 'Pablo   ', '$2y$10$vYvsVJb6GupYrE7ZHNN/A.BPpgrc0EfXq99iE1BEfHF8mQC26OxeW', 'Fallas   ', 'Calderon   ', 'pfalla@gmail.com', 72307240, 'Activo'),
(5, 'fsd', '$2y$10$0kqieoDH26QoHUiYvOThCODx/larMMzr5kDEcp7Ek71n5fB8rRWoi', 'fsd', 'ffs', 'e@gmail.com', NULL, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_evento`
--

CREATE TABLE `usuario_evento` (
  `ID_Relacion_UE` int(10) NOT NULL,
  `ID_Usuario` int(10) NOT NULL,
  `ID_Evento` int(10) NOT NULL,
  `MetodoPago` varchar(50) DEFAULT NULL,
  `BoletosAdquiridos` int(11) DEFAULT NULL,
  `Total` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_evento`
--

INSERT INTO `usuario_evento` (`ID_Relacion_UE`, `ID_Usuario`, `ID_Evento`, `MetodoPago`, `BoletosAdquiridos`, `Total`) VALUES
(1, 2, 5, 'Tarjeta de Crédito', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tour`
--

CREATE TABLE `usuario_tour` (
  `ID_Relacion_UT` int(10) NOT NULL,
  `ID_Usuario` int(10) NOT NULL,
  `ID_Tour` int(10) NOT NULL,
  `MetodoPago` varchar(50) DEFAULT NULL,
  `BoletosAdquridos` int(11) DEFAULT NULL,
  `Total` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_tour`
--

INSERT INTO `usuario_tour` (`ID_Relacion_UT`, `ID_Usuario`, `ID_Tour`, `MetodoPago`, `BoletosAdquridos`, `Total`) VALUES
(1, 2, 2, 'Tarjeta de Crédito', 12, 540),
(2, 2, 2, 'Tarjeta de Crédito', 12, 540),
(3, 2, 2, 'Tarjeta de Crédito', 7, 315),
(4, 2, 3, 'Tarjeta de Crédito', 12, 252),
(5, 2, 3, 'SINPE Móvil', 11, 231);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`ID_Animal`);

--
-- Indices de la tabla `animal_usuario`
--
ALTER TABLE `animal_usuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ANIMAL` (`ID_Animal`),
  ADD KEY `FK_USUARIO` (`ID_Usuario`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_CONTACTO` (`ID_Usuario`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`ID_Direccion`),
  ADD KEY `FK_U_DIRECCION` (`ID_Usuario`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`ID_Donacion`),
  ADD KEY `FK_DONACION_USER` (`ID_Usuario`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ID_Evento`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_Rol`),
  ADD KEY `FK_ROL_USUARIO` (`ID_Usuario`);

--
-- Indices de la tabla `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`ID_Tour`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- Indices de la tabla `usuario_evento`
--
ALTER TABLE `usuario_evento`
  ADD PRIMARY KEY (`ID_Relacion_UE`),
  ADD KEY `FK_USUARIO_EVENTO` (`ID_Usuario`),
  ADD KEY `FK_EVENTO` (`ID_Evento`);

--
-- Indices de la tabla `usuario_tour`
--
ALTER TABLE `usuario_tour`
  ADD PRIMARY KEY (`ID_Relacion_UT`),
  ADD KEY `FK_TOUR_USUARIO` (`ID_Usuario`),
  ADD KEY `FK_TOUR` (`ID_Tour`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
  MODIFY `ID_Animal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `animal_usuario`
--
ALTER TABLE `animal_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `ID_Direccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `ID_Donacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ID_Evento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ID_Rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tours`
--
ALTER TABLE `tours`
  MODIFY `ID_Tour` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario_evento`
--
ALTER TABLE `usuario_evento`
  MODIFY `ID_Relacion_UE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario_tour`
--
ALTER TABLE `usuario_tour`
  MODIFY `ID_Relacion_UT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animal_usuario`
--
ALTER TABLE `animal_usuario`
  ADD CONSTRAINT `FK_ANIMAL` FOREIGN KEY (`ID_Animal`) REFERENCES `animal` (`ID_Animal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USUARIO` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `FK_CONTACTO` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `FK_U_DIRECCION` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `FK_DONACION_USER` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `FK_ROL_USUARIO` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_evento`
--
ALTER TABLE `usuario_evento`
  ADD CONSTRAINT `FK_EVENTO` FOREIGN KEY (`ID_Evento`) REFERENCES `eventos` (`ID_Evento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USUARIO_EVENTO` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_tour`
--
ALTER TABLE `usuario_tour`
  ADD CONSTRAINT `FK_TOUR` FOREIGN KEY (`ID_Tour`) REFERENCES `tours` (`ID_Tour`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TOUR_USUARIO` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
