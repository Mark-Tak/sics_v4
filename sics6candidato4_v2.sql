-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-10-2024 a las 20:35:50
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
-- Base de datos: `sics_4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checklist`
--

CREATE TABLE `checklist` (
  `id_check` int(11) NOT NULL,
  `nombre` char(100) NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  `limpieza` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `checklist`
--

INSERT INTO `checklist` (`id_check`, `nombre`, `fecha`, `observaciones`, `limpieza`) VALUES
(1, 'VIRREINAL 1', '2024-10-14', 'Semanal', 1),
(2, 'PREHISPÁNICO 1', '2024-10-14', 'Semanal', 1),
(3, 'CONTEMPORANEO 1', '2024-10-14', 'Semanal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `id` int(11) NOT NULL,
  `objeto` int(11) DEFAULT NULL,
  `username` char(25) NOT NULL,
  `fecha` datetime NOT NULL,
  `turno` int(1) NOT NULL,
  `observacion_check` tinyint(1) NOT NULL,
  `observacion_text` text DEFAULT NULL,
  `imagen` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id`, `objeto`, `username`, `fecha`, `turno`, `observacion_check`, `observacion_text`, `imagen`) VALUES
(1, 1, 'Rodrigo', '2024-10-15 00:03:18', 1, 1, NULL, NULL),
(2, 2, 'Laura', '2024-10-15 00:03:18', 2, 1, NULL, NULL),
(3, 1, 'Laura', '2024-10-15 00:08:04', 2, 1, NULL, NULL),
(4, 2, 'Rodrigo', '2024-10-15 00:08:42', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE `obra` (
  `id_obra` int(11) NOT NULL,
  `pertenencia_check` int(11) NOT NULL,
  `pertenencia_sala` int(11) NOT NULL,
  `nombre` char(250) NOT NULL,
  `artista` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `obra`
--

INSERT INTO `obra` (`id_obra`, `pertenencia_check`, `pertenencia_sala`, `nombre`, `artista`) VALUES
(1, 1, 2, 'CANDELEROS', 'Iglesia de Tacoronte'),
(2, 1, 5, 'INMACULADA CONCEPCIÓN', 'Francisco'),
(3, 3, 4, 'HORIZONTE ROTO', 'Gutiérrez'),
(4, 3, 3, 'ROSTRO HUMANO CON TOCADO', 'Cotastan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `nombre` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id_sala`, `nombre`) VALUES
(1, 'Cocina'),
(2, 'Sala 1'),
(3, 'Sala 2'),
(4, 'Sala 3'),
(5, 'Tiempos cortos'),
(6, 'Sala 6. Arte, forma y expresión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `usuario` char(25) NOT NULL,
  `nombreusuario` varchar(120) DEFAULT NULL,
  `contrasena` varchar(120) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`usuario`, `nombreusuario`, `contrasena`, `tipo`) VALUES
('Domino', 'Dominos', '$2y$10$tV4Hg5ntFRqn2sYSTYjVeurGD9bv5U0FT7qnJCJtjTmWeKbkwK00a', 2),
('Laura', 'Laura VazXX', '789', 2),
('Marcos', 'Marcos Cesar', '123', 1),
('Raúl', 'Raúl XX', '889', 1),
('Rodrigo', 'Rodrigo XX', '1234', 2),
('Rosario', 'Rosario de la Cruz', '$2y$10$hm/NqLDDXAJqsc5Ap2V.ketitITBRl6HgIFew1VR/tpcer4ZYN9dm', 1),
('Vazquez', 'Vazquez Anaya', '$2y$10$.nd6b3Xway86uDYua/WRX.boxsEc8t6Wz2KbtSDv2/pEi0nirNQC.', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id_check`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eval_ibfk1` (`username`),
  ADD KEY `eval_ibfk2` (`objeto`);

--
-- Indices de la tabla `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`id_obra`),
  ADD KEY `obra_ibfk_1` (`pertenencia_check`),
  ADD KEY `obra_ibfk_2` (`pertenencia_sala`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `id_obra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `eval_ibfk1` FOREIGN KEY (`username`) REFERENCES `user` (`usuario`),
  ADD CONSTRAINT `eval_ibfk2` FOREIGN KEY (`objeto`) REFERENCES `obra` (`id_obra`);

--
-- Filtros para la tabla `obra`
--
ALTER TABLE `obra`
  ADD CONSTRAINT `obra_ibfk_1` FOREIGN KEY (`pertenencia_check`) REFERENCES `checklist` (`id_check`),
  ADD CONSTRAINT `obra_ibfk_2` FOREIGN KEY (`pertenencia_sala`) REFERENCES `sala` (`id_sala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
