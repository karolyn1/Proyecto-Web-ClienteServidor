- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 09:08 PM
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
  `Imagen` varchar(255) NOT NULL,
  `Historia` varchar(255) NOT NULL,
  `Necesidades` varchar(255) NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`ID_Animal`, `Nombre`, `Raza`, `Especie`, `Fecha_Ingreso`, `Estado_Salud`, `Fecha_Nacimiento`, `Apadrinado`, `Imagen`, `Historia`, `Necesidades`, `Estado`) VALUES
(8, 'Bartolomeo', 'Ajolote', 'Anfibio', '2024-12-05', 'Herido', '2024-10-17', 0, '../imagenes/Ajolote en acuario.jpg', ' Bartolomeo está en un tanque del refugio, inmóvil la mayor parte del tiempo. Tiene una herida en la cola que aún no cierra por completo, resultado de haber quedado atrapado en un canal lleno de basura. Los encargados cambian el agua cada día y le dan peq', 'Tratamientos para recuperación.', 1),
(9, 'Coco', 'Cocodrilo', 'Reptil', '2024-12-07', 'Herido', '2022-02-02', 0, '../imagenes/Crocodylus_acutus_mexico_02-edit1.jpg', 'Coco está en un área cercada del refugio, tumbado cerca del agua con una pata trasera vendada. Lo encontraron herido en un río donde solían arrojar basura y redes de pesca. La herida, probablemente causada por un anzuelo, aún requiere atención diaria. Ape', 'Operación para recuperación.', 1),
(10, 'Samira', 'Cebra', 'Equino', '2024-12-13', 'Saludable', '2023-01-12', 0, '../imagenes/ai-generated-zebra-foal-resting-on-grass-in-the-forest-photo.jpg', 'Samira, una cebra joven con un pelaje brillante de rayas bien definidas, camina tranquila en su espacio del refugio. Fue rescatada de una operación de tráfico ilegal, pero, sorprendentemente, se encuentra en buen estado físico. Los cuidadores la observan ', 'Donaciones para reintegración a hábitat.', 1);

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
(15, 'Nicole', 'Obregón Munguia', 'nicole@gmail.com', NULL, 'Quiero un tour privado'),
(16, 'Nicole', 'Obregón Munguia', 'nicole@gmail.com', NULL, 'Quiero un tour privado');

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
(5, 'Cartago', 'El Guarco', 'La Cangreja', 'La Cangreja', 6),
(6, 'Cartago', 'El Guarco', 'La Cangreja', 'La Cangreja', 7),
(7, 'San José', 'Curridabat', 'Granadilla', 'Condominio Cipreses de Granadilla', 8),
(8, 'Cartago', 'Cartago', 'San Isidro', 'San Isidro', 9);

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
  `Costo` decimal(10,2) NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`ID_Evento`, `Nombre`, `Descripcion`, `Fecha`, `Hora`, `Lugar`, `Imagen`, `Cupos`, `CuposVendidos`, `Costo`, `Estado`) VALUES
(8, 'Un Día en la Vida del Refugio', 'Los visitantes tendrán la oportunidad de experimentar el día a día en un refugio de animales. Podrán participar en actividades como alimentar a los animales, limpiar sus hábitats y aprender sobre los esfuerzos de conservación. ', '2024-12-28', '07:00:00.000000', 'Zona de animales rescatados', 'ayudante.jpg', 30, 0, 0.00, 1),
(9, 'Noche de Estrellas y Animales', 'Evento nocturno donde los participantes disfrutarán de una charla sobre el trabajo del refugio, seguida de un recorrido bajo las estrellas para ver los animales nocturnos. Habrá actividades de observación de fauna nocturna y proyecciones sobre conservación.', '2025-02-23', '19:00:00.000000', 'Zona de animales nocturnos y áreas de observación.', 'Noche-estrellada-en-el-Refugio-de-Riaño.jpg', 20, 0, 40.00, 1);

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
(7, 'admin', 6),
(8, 'cliente', 7),
(9, 'cliente', 8),
(10, 'cliente', 9);

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
  `Imagen` varchar(255) NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`ID_Tour`, `Nombre`, `Descripcion`, `Fecha`, `Hora`, `Precio_Boleto`, `Tickets_Disponibles`, `TicketsVendidos`, `Imagen`, `Estado`) VALUES
(11, 'Tour de Rescate y Recuperación', 'Los visitantes conocerán las historias de rescate de algunos animales del refugio, desde las circunstancias en que fueron encontrados hasta los cuidados que recibieron.', '2024-12-27', '08:30:00.000000', 25.00, 100, 0, 'entrada-school-groups-scaled.jpg', 1),
(12, 'Safari Educativo: Conociendo a los Habitantes del Refugio', 'Un recorrido por las áreas donde los animales rescatados viven, destacando sus comportamientos naturales y cómo se cuida su bienestar.', '2024-12-21', '16:00:00.000000', 75.00, 50, 0, 'safari-and-waterfalls-tour-sitios-ticos-costa-rica-1140.jpg', 1),
(13, 'Pequeños Guardianes de la Naturaleza', 'Un tour interactivo diseñado para que los más pequeños aprendan sobre la fauna rescatada mientras participan en actividades divertidas y educativas.', '2024-12-29', '13:30:00.000000', 10.00, 25, 0, 'field-deciding.jpg', 1);

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
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Password`, `Apellido1`, `Apellido2`, `Correo`, `Telefono`, `Estado`) VALUES
(6, 'Ariana', '$2y$10$zCDvCuLoNYW0hByWBilqcuesiH5PKMqtZQTzXpHzsO7khrE5jXeuy', 'Fallas', 'Calderon', 'ariana@gmail.com', NULL, 'Activo'),
(7, 'Karolyn', '$2y$10$s6F8fKSMM7jkjo3cn9iJXugsOmxwhoNqU9lq3oH2jeSK19NgWMKCe', 'Bastista', 'Acuña', 'karolyn@gmail.com', NULL, 'Activo'),
(8, 'Johnny', '$2y$10$16GtmoB4ctgF.k5TKj5dTeXydk6gGvYHSiYFD1I/SG0okEXjqyniW', 'Castillo', 'Fallas', 'johnny@gmail.com', NULL, 'Activo'),
(9, 'Nicole', '$2y$10$yEEnXYb.9gBsgZ5pXYSsE.vc332F2Vt5c2xepbETbxf0F1TQY8Viy', 'Obregón ', 'Munguia', 'nicole@gmail.com', NULL, 'Activo');

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
  MODIFY `ID_Animal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `animal_usuario`
--
ALTER TABLE `animal_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `direccion`
--
ALTER TABLE `direccion`
  MODIFY `ID_Direccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `ID_Donacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ID_Evento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID_Rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `ID_Tour` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuario_evento`
--
ALTER TABLE `usuario_evento`
  MODIFY `ID_Relacion_UE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario_tour`
--
ALTER TABLE `usuario_tour`
  MODIFY `ID_Relacion_UT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal_usuario`
--
ALTER TABLE `animal_usuario`
  ADD CONSTRAINT `FK_ANIMAL` FOREIGN KEY (`ID_Animal`) REFERENCES `animal` (`ID_Animal`) ON DELETE CASCADE ON UPDATE CASCADE,
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
