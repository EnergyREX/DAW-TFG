-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2024 a las 22:24:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

CREATE DATABASE clinica;
USE clinica;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `fecha_union` date NOT NULL,
  `disponibilidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `contraseña`, `especialidad`, `fecha_union`, `disponibilidad`) VALUES
('12345678A', 'Juan', 'Pérez', 'Calle Falsa 123', '612345678', 'juan.perez@clinica.com', 'password123', 'Cardiología', '2024-01-15', 'Lunes a Viernes 9:00-18:00'),
('22345678B', 'María', 'López', 'Avenida Gran Vía 21', '612345679', 'maria.lopez@clinica.com', 'password456', 'Dermatología', '2024-02-25', 'Lunes a Viernes 8:00-14:00'),
('32345678C', 'Carlos', 'Rodríguez', 'Calle del Río 88', '622345680', 'carlos.rodriguez@clinica.com', 'password789', 'Neurología', '2024-03-18', 'Martes a Jueves 9:00-17:00'),
('42345678D', 'Lucía', 'Torres', 'Calle de la Paz 43', '632345681', 'lucia.torres@clinica.com', 'password012', 'Endocrinología', '2024-04-02', 'Lunes a Viernes 10:00-19:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistente`
--

CREATE TABLE `asistente` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `fecha_union` date NOT NULL,
  `disponibilidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistente`
--

INSERT INTO `asistente` (`dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `contraseña`, `fecha_union`, `disponibilidad`) VALUES
('23456789B', 'Ana', 'Gómez', 'Calle Real 456', '622345678', 'ana.gomez@clinica.com', 'password456', '2024-02-20', 'Lunes a Viernes 10:00-16:00'),
('33456789C', 'Luis', 'Pérez', 'Calle del Sol 89', '632345679', 'luis.perez@clinica.com', 'password789', '2024-03-30', 'Lunes a Viernes 9:00-14:00'),
('43456789D', 'Elena', 'Vega', 'Calle Santa Teresa 150', '642345680', 'elena.vega@clinica.com', 'password321', '2024-04-12', 'Martes a Sábado 10:00-17:00'),
('53456789E', 'Jorge', 'García', 'Calle de la Luz 10', '652345681', 'jorge.garcia@clinica.com', 'password654', '2024-05-05', 'Lunes a Viernes 8:00-15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(10) NOT NULL,
  `paciente` varchar(9) NOT NULL,
  `doctor` varchar(9) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `motivo` text NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `paciente`, `doctor`, `estado`, `motivo`, `dia`, `hora`) VALUES
(1, '45678901D', '34567890C', 'Confirmada', 'Lobotomía', '2027-11-08', '20:00:00'),
(2, '55678901E', '44567891D', 'Confirmada', 'Revisión ginecológica', '2024-11-12', '11:30:00'),
(3, '65678902F', '34567890C', 'Pendiente', 'Consulta general', '2024-11-15', '09:00:00'),
(4, '75678903G', '54567892E', 'Confirmada', 'Fractura de pierna', '2024-11-16', '14:30:00'),
(5, '85678904H', '64567893F', 'Pendiente', 'Consulta de vista', '2024-11-18', '15:00:00'),
(21, '45678901D', '34567890C', 'Cancelada', 'Lobotomía', '2025-03-12', '11:10:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `fecha_union` date NOT NULL,
  `disponibilidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `contraseña`, `especialidad`, `fecha_union`, `disponibilidad`) VALUES
('34567890C', 'Carlos', 'Martínez', 'Calle Mayor 789', '632345678', 'carlos.martinez@clinica.com', 'password789', 'Pediatría', '2024-03-10', 'Lunes a Viernes 8:00-17:00'),
('44567891D', 'Elena', 'Sánchez', 'Avenida Libertad 22', '642345679', 'elena.sanchez@clinica.com', 'password101', 'Ginecología', '2024-04-12', 'Lunes a Jueves 8:00-15:00'),
('54567892E', 'Antonio', 'Jiménez', 'Calle Sevilla 101', '652345682', 'antonio.jimenez@clinica.com', 'password123', 'Traumatología', '2024-05-20', 'Lunes a Viernes 9:00-18:00'),
('64567893F', 'Raquel', 'Alonso', 'Calle Toledo 33', '662345683', 'raquel.alonso@clinica.com', 'password567', 'Oftalmología', '2024-06-01', 'Martes a Viernes 10:00-16:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `contraseña`) VALUES
('45678901D', 'Lucía', 'Fernández', 'Calle Luna 101', '642345678', 'lucia.fernandez@paciente.com', 'password101'),
('55678901E', 'Pedro', 'García', 'Calle del Mar 10', '652345678', 'pedro.garcia@paciente.com', 'password202'),
('65678902F', 'Sara', 'Hernández', 'Calle de la Paz 34', '662345679', 'sara.hernandez@paciente.com', 'password303'),
('75678903G', 'Martín', 'Ruiz', 'Calle del Sol 12', '672345680', 'martin.ruiz@paciente.com', 'password404'),
('85678904H', 'Raquel', 'Molina', 'Calle del Valle 55', '682345681', 'raquel.molina@paciente.com', 'password505');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE `presupuestos` (
  `id` int(10) NOT NULL,
  `paciente` varchar(9) NOT NULL,
  `doctor` varchar(9) NOT NULL,
  `tratamiento` int(11) NOT NULL,
  `precio` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `presupuestos`
--

INSERT INTO `presupuestos` (`id`, `paciente`, `doctor`, `tratamiento`, `precio`) VALUES
(1, '45678901D', '34567890C', 1, 200),
(2, '55678901E', '44567891D', 2, 150),
(3, '65678902F', '34567890C', 3, 180),
(4, '75678903G', '54567892E', 4, 350),
(5, '85678904H', '64567893F', 5, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id`, `nombre`, `precio`) VALUES
(1, 'Consulta pediátrica', 150),
(2, 'Revisión ginecológica', 120),
(3, 'Consulta general', 180),
(4, 'Vacunación', 50),
(5, 'Tratamiento dental', 200),
(6, 'Revisión traumatológica', 300),
(7, 'Consulta oftalmológica', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos_presupuestos`
--

CREATE TABLE `tratamientos_presupuestos` (
  `presupuesto_id` int(10) NOT NULL,
  `tratamiento_id` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamientos_presupuestos`
--

INSERT INTO `tratamientos_presupuestos` (`presupuesto_id`, `tratamiento_id`, `cantidad`) VALUES
(1, 1, 1),
(1, 4, 2),
(2, 2, 1),
(3, 3, 1),
(4, 6, 1),
(5, 7, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `asistente`
--
ALTER TABLE `asistente`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni_doctor` (`doctor`),
  ADD KEY `dni_paciente` (`paciente`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_dni` (`paciente`),
  ADD KEY `doctor_dni` (`doctor`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tratamientos_presupuestos`
--
ALTER TABLE `tratamientos_presupuestos`
  ADD KEY `id_presupuesto` (`presupuesto_id`),
  ADD KEY `id_tratamiento` (`tratamiento_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `dni_doctor` FOREIGN KEY (`doctor`) REFERENCES `doctores` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dni_paciente` FOREIGN KEY (`paciente`) REFERENCES `paciente` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD CONSTRAINT `doctor_dni` FOREIGN KEY (`doctor`) REFERENCES `doctores` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paciente_dni` FOREIGN KEY (`paciente`) REFERENCES `paciente` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tratamientos_presupuestos`
--
ALTER TABLE `tratamientos_presupuestos`
  ADD CONSTRAINT `id_presupuesto` FOREIGN KEY (`presupuesto_id`) REFERENCES `presupuestos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_tratamiento` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamientos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
