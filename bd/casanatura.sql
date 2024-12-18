-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 10:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casanatura`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
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
  `Necesidades` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`ID_Animal`, `Nombre`, `Raza`, `Especie`, `Fecha_Ingreso`, `Estado_Salud`, `Fecha_Nacimiento`, `Apadrinado`, `Imagen`, `Historia`, `Necesidades`) VALUES
(1, 'Donkey', 'Burro Común', 'Equino', '2024-12-06', 'Saludable', '2014-12-09', 0, 'img/burrito.jpg', 'Donkey, un burro joven rescatado, fue encontrado en condiciones difíciles. Ahora recibe cuidados veterinarios, una dieta balanceada y espacio seguro. Es sociable, curioso y necesita compañía, ejercicio y un refugio adecuado. ', 'Donkey necesita un refugio adecuado, espacio para moverse libremente, una dieta equilibrada con heno y agua limpia, atención veterinaria regular, compañía de otros animales para evitar la soledad y cuidados amorosos que promuevan su bienestar.');

-- --------------------------------------------------------

--
-- Table structure for table `animal_usuario`
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
-- Dumping data for table `animal_usuario`
--

INSERT INTO `animal_usuario` (`ID`, `ID_Usuario`, `ID_Animal`, `FechaApadrinamiento`, `FechaFin`, `Monto`, `Frecuencia`, `Estado`) VALUES
(1, 1, 1, '2024-12-09', '2024-12-15', 20, 'Mensual', 0),
(3, 2, 1, '2024-12-15', '2024-12-18', 80, 'Mensual', 0),
(4, 2, 1, '2024-12-18', '2024-12-18', 80, 'Mensual', 1),
(5, 2, 1, '2024-12-18', '2024-12-18', 60, 'Mensual', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
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
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`ID`, `Nombre`, `Apellido`, `Email`, `ID_Usuario`, `Mensaje`) VALUES
(1, 'Paola    ', 'Calderon', 'arianafallas1@gmail.com', 2, 'sdf'),
(2, 'Paola    ', 'Calderon', 'arianafallas1@gmail.com', 2, 'dfj');

-- --------------------------------------------------------

--
-- Table structure for table `direccion`
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
-- Dumping data for table `direccion`
--

INSERT INTO `direccion` (`ID_Direccion`, `Provincia`, `Canton`, `Distrito`, `Direccion_Exacta`, `ID_Usuario`) VALUES
(1, 'Cartago', 'Cartago', 'Cartago', 'La Lima Cartago', 1),
(2, 'd', 'd', 'd', 'd', 2),
(3, 'f', 'f', 'f', 'f', 3);

-- --------------------------------------------------------

--
-- Table structure for table `donaciones`
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
-- Dumping data for table `donaciones`
--

INSERT INTO `donaciones` (`ID_Donacion`, `Monto`, `Fecha`, `ID_Usuario`, `Estado`, `MetodoPago`) VALUES
(1, 20000, '2024-11-01', 1, 1, NULL),
(2, 20000, '2024-12-02', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
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
  `Costo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`ID_Evento`, `Nombre`, `Descripcion`, `Fecha`, `Hora`, `Lugar`, `Imagen`, `Cupos`, `CuposVendidos`, `Costo`) VALUES
(5, 'Camitada', 'hdjd', '2024-12-21', '22:16:00.000000', 'ss', 'Digrama Relacional proyecto.jpg', 23, 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID_Rol` int(10) NOT NULL,
  `Rol` varchar(15) NOT NULL,
  `ID_Usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID_Rol`, `Rol`, `ID_Usuario`) VALUES
(2, 'cliente', 2),
(3, 'admin', 3),
(4, 'cliente', 4),
(5, 'cliente', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
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
  `Imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`ID_Tour`, `Nombre`, `Descripcion`, `Fecha`, `Hora`, `Precio_Boleto`, `Tickets_Disponibles`, `TicketsVendidos`, `Imagen`) VALUES
(2, 'srg', 'gsrg', '2024-12-06', '22:15:00.000000', 45.00, 32, 0, 'Digrama Relacional proyecto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(10) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Apellido1` varchar(15) NOT NULL,
  `Apellido2` varchar(15) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono` int(40) DEFAULT NULL,
  `Donador` tinyint(1) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Password`, `Apellido1`, `Apellido2`, `Correo`, `Telefono`, `Donador`, `Estado`) VALUES
(1, 'Ariana    ', '$2y$10$AcomD5YW.cE.vGnLBnydOO68HuK91I1gA550wXWsdfqU7URVl8d32', 'Fallas    ', 'Calderon    ', 'ariana@gmail.com', 72307240, 0, 'Activo'),
(2, 'Paola    ', '$2y$10$Scp8wmVLytjc5fwJhO7dB.oohKseUg6ylPMhmU/k3jFocY4WGQK6S', 'Calderon', 'Romero', 'arianafallas1@gmail.com', 88494643, 0, 'Activo'),
(3, 'Ariana', '$2y$10$Q1fVmFUnl2Bfq9/sHOQsOeJXjhoxH6pz2qd3DLEFPX6II7//Ve/Fu', 'Fallas', 'Calderon', 'a@gmail.com', 78779, 0, 'Activo'),
(4, 'Pablo  ', '$2y$10$vYvsVJb6GupYrE7ZHNN/A.BPpgrc0EfXq99iE1BEfHF8mQC26OxeW', 'Fallas  ', 'Calderon  ', 'pfalla@gmail.com', 72307240, 0, 'Inactivo');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_evento`
--

CREATE TABLE `usuario_evento` (
  `ID_Relacion_UE` int(10) NOT NULL,
  `ID_Usuario` int(10) NOT NULL,
  `ID_Evento` int(10) NOT NULL,
  `MetodoPago` varchar(50) DEFAULT NULL,
  `BoletosAdquiridos` int(11) DEFAULT NULL,
  `Total` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario_tour`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`ID_Animal`);

--
-- Indexes for table `animal_usuario`
--
ALTER TABLE `animal_usuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ANIMAL` (`ID_Animal`),
  ADD KEY `FK_USUARIO` (`ID_Usuario`);

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_CONTACTO` (`ID_Usuario`);

--
-- Indexes for table `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`ID_Direccion`),
  ADD KEY `FK_U_DIRECCION` (`ID_Usuario`);

--
-- Indexes for table `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`ID_Donacion`),
  ADD KEY `FK_DONACION_USER` (`ID_Usuario`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ID_Evento`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_Rol`),
  ADD KEY `FK_ROL_USUARIO` (`ID_Usuario`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`ID_Tour`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- Indexes for table `usuario_evento`
--
ALTER TABLE `usuario_evento`
  ADD PRIMARY KEY (`ID_Relacion_UE`),
  ADD KEY `FK_USUARIO_EVENTO` (`ID_Usuario`),
  ADD KEY `FK_EVENTO` (`ID_Evento`);

--
-- Indexes for table `usuario_tour`
--
ALTER TABLE `usuario_tour`
  ADD PRIMARY KEY (`ID_Relacion_UT`),
  ADD KEY `FK_TOUR_USUARIO` (`ID_Usuario`),
  ADD KEY `FK_TOUR` (`ID_Tour`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `ID_Animal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `animal_usuario`
--
ALTER TABLE `animal_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `direccion`
--
ALTER TABLE `direccion`
  MODIFY `ID_Direccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `ID_Donacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ID_Evento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID_Rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `ID_Tour` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario_evento`
--
ALTER TABLE `usuario_evento`
  MODIFY `ID_Relacion_UE` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario_tour`
--
ALTER TABLE `usuario_tour`
  MODIFY `ID_Relacion_UT` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal_usuario`
--
ALTER TABLE `animal_usuario`
  ADD CONSTRAINT `FK_ANIMAL` FOREIGN KEY (`ID_Animal`) REFERENCES `animal` (`ID_Animal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_USUARIO` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `FK_CONTACTO` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `FK_U_DIRECCION` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `FK_DONACION_USER` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `FK_ROL_USUARIO` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON UPDATE CASCADE;

--
-- Constraints for table `usuario_evento`
--
ALTER TABLE `usuario_evento`
  ADD CONSTRAINT `FK_EVENTO` FOREIGN KEY (`ID_Evento`) REFERENCES `eventos` (`ID_Evento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USUARIO_EVENTO` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON UPDATE CASCADE;

--
-- Constraints for table `usuario_tour`
--
ALTER TABLE `usuario_tour`
  ADD CONSTRAINT `FK_TOUR` FOREIGN KEY (`ID_Tour`) REFERENCES `tours` (`ID_Tour`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TOUR_USUARIO` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
