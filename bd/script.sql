-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 11:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
  `ID_Usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `donaciones`
--

CREATE TABLE `donaciones` (
  `ID_Donacion` int(10) NOT NULL,
  `Monto` int(50) NOT NULL,
  `Fecha` date NOT NULL,
  `ID_Usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `ID_Evento` int(10) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time(6) NOT NULL,
  `Lugar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID_Rol` int(10) NOT NULL,
  `Rol` varchar(15) NOT NULL,
  `ID_Usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `ID_Tour` int(10) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time(6) NOT NULL,
  `Precio_Boleto` varchar(10) NOT NULL,
  `Tickets_Disponibles` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(10) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Apellido1` varchar(15) NOT NULL,
  `Apellido2` varchar(15) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Donador` tinyint(1) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario_evento`
--

CREATE TABLE `usuario_evento` (
  `ID_Relacion_UE` int(10) NOT NULL,
  `ID_Usuario` int(10) NOT NULL,
  `ID_Evento` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario_tour`
--

CREATE TABLE `usuario_tour` (
  `ID_Relacion_UT` int(10) NOT NULL,
  `ID_Usuario` int(10) NOT NULL,
  `ID_Tour` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`ID_Direccion`);

--
-- Indexes for table `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`ID_Donacion`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ID_Evento`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_Rol`);

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
  ADD PRIMARY KEY (`ID_Relacion_UE`);

--
-- Indexes for table `usuario_tour`
--
ALTER TABLE `usuario_tour`
  ADD PRIMARY KEY (`ID_Relacion_UT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `direccion`
--
ALTER TABLE `direccion`
  MODIFY `ID_Direccion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `ID_Donacion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ID_Evento` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID_Rol` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `ID_Tour` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(10) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
