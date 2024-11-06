-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2024 a las 21:35:59
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
  `fecha_termino` date DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `limpieza` tinyint(1) DEFAULT NULL,
  `archivado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `checklist`
--

INSERT INTO `checklist` (`id_check`, `nombre`, `fecha`, `fecha_termino`, `observaciones`, `limpieza`, `archivado`) VALUES
(1, 'VIRREINAL 1', '2024-10-14', NULL, 'Semanal', 1, 1),
(2, 'PREHISPÁNICO 1', '2024-10-14', NULL, 'Semanal', 1, 1),
(3, 'CONTEMPORANEO 1', '2024-10-14', NULL, 'Semanal', 1, 1),
(4, 'EJEMPLO', '2024-10-15', NULL, 'SEMANAL', 1, 1),
(5, 'EJEMPLO 2', '2025-10-15', NULL, 'SEMANAL', 1, 1),
(6, 'EJEMPLO 3', '2025-10-15', NULL, 'SEMANAL', 0, 1),
(7, 'VIRREINAL 80', '2024-10-21', '2024-10-31', '', 1, 1),
(8, 'VIRREINAL 30', '2024-10-01', NULL, NULL, 1, 1),
(9, 'VIRRERINAL 7', '2024-10-01', '2024-10-31', 'asjdnkankjsa', 1, 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE `obra` (
  `id_obra` int(11) NOT NULL,
  `pertenencia_check` int(11) NOT NULL,
  `pertenencia_sala` int(11) NOT NULL,
  `nombre` char(250) NOT NULL,
  `artista` char(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `obra`
--

INSERT INTO `obra` (`id_obra`, `pertenencia_check`, `pertenencia_sala`, `nombre`, `artista`, `cantidad`) VALUES
(6, 1, 2, 'CANDELEROS', 'IGLESIA DE TACORONTE', NULL),
(7, 3, 3, 'ROSTRO HUMANO CON TOCADO RECTANGULAR', 'COTASTAN', NULL),
(8, 1, 6, 'HORIZONTE ROTO', 'GUTIERREZ', NULL),
(9, 3, 1, 'SAN PASCUAL BAILÓN', 'JOSÉ AGUSTÍN ARRIETA', NULL),
(10, 1, 5, 'INMACULADA CONCECPCIÓN', 'FRANCISCO', NULL),
(11, 7, 7, 'O3', 'A1', NULL),
(12, 7, 7, 'O6', 'A8', NULL),
(13, 7, 7, 'K', 'O', NULL),
(14, 7, 7, 'q', 'w', NULL),
(15, 7, 7, 'a', 'z', NULL),
(16, 1, 1, 'o', 'p', NULL),
(17, 1, 1, 'p', 'a', NULL),
(18, 7, 1, 'a', 'b', NULL),
(19, 2, 6, 'a', 'b', NULL),
(20, 2, 6, 'V', 'A', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `nombre` char(100) NOT NULL,
  `activa` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id_sala`, `nombre`, `activa`) VALUES
(1, 'Cocina', 1),
(2, 'Sala 1', 1),
(3, 'Sala 2', 1),
(4, 'Sala 3', 1),
(5, 'Tiempos cortos', 1),
(6, 'Sala 6. Arte, forma y expresión', 1),
(7, 'SALA A6', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `usuario` char(25) NOT NULL,
  `nombreusuario` varchar(120) DEFAULT NULL,
  `contrasena` varchar(120) NOT NULL,
  `tipo` int(1) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`usuario`, `nombreusuario`, `contrasena`, `tipo`, `activo`) VALUES
('Domino', 'Dominos', '$2y$10$tV4Hg5ntFRqn2sYSTYjVeurGD9bv5U0FT7qnJCJtjTmWeKbkwK00a', 2, 1),
('Laura', 'Laura VazXX', '789', 2, 1),
('Marcos', 'Marcos Cesar', '123', 1, 1),
('Raúl', 'Raúl XX', '889', 1, 1),
('Rodrigo', 'Rodrigo XX', '1234', 2, 1),
('Rosario', 'Rosario de la Cruz', '$2y$10$hm/NqLDDXAJqsc5Ap2V.ketitITBRl6HgIFew1VR/tpcer4ZYN9dm', 1, 1),
('Vazquez', 'Vazquez Anaya', '$2y$10$.nd6b3Xway86uDYua/WRX.boxsEc8t6Wz2KbtSDv2/pEi0nirNQC.', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_check`
--

CREATE TABLE `usuario_check` (
  `id` int(11) NOT NULL,
  `user_check` char(25) NOT NULL,
  `check_user` int(11) NOT NULL,
  `nombreusuario` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `usuario_check`
--
ALTER TABLE `usuario_check`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usercheck_ibfk1` (`check_user`),
  ADD KEY `usercheck_ibfk2` (`user_check`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id_check` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `id_obra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario_check`
--
ALTER TABLE `usuario_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `obra_ibfk` FOREIGN KEY (`pertenencia_check`) REFERENCES `checklist` (`id_check`),
  ADD CONSTRAINT `obra_ibfk_2` FOREIGN KEY (`pertenencia_sala`) REFERENCES `sala` (`id_sala`);

--
-- Filtros para la tabla `usuario_check`
--
ALTER TABLE `usuario_check`
  ADD CONSTRAINT `usercheck_ibfk1` FOREIGN KEY (`check_user`) REFERENCES `checklist` (`id_check`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usercheck_ibfk2` FOREIGN KEY (`user_check`) REFERENCES `user` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
