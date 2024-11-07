-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2024 a las 10:01:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: `clinica`

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `admin`

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
  `disponibilidad` varchar(45) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `asistente`

CREATE TABLE `asistente` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `fecha_union` date NOT NULL,
  `disponibilidad` varchar(45) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `citas`

CREATE TABLE `citas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `paciente` varchar(9) NOT NULL,
  `doctor` varchar(9) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `motivo` text NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dni_doctor` (`doctor`),
  KEY `dni_paciente` (`paciente`),
  CONSTRAINT `dni_doctor` FOREIGN KEY (`doctor`) REFERENCES `doctores` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dni_paciente` FOREIGN KEY (`paciente`) REFERENCES `paciente` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `doctores`

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
  `disponibilidad` varchar(45) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `paciente`

CREATE TABLE `paciente` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `presupuestos`

CREATE TABLE `presupuestos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `paciente` varchar(9) NOT NULL,
  `doctor` varchar(9) NOT NULL,
  `tratamiento` int(11) NOT NULL,
  `precio` decimal(11,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paciente_dni` (`paciente`),
  KEY `doctor_dni` (`doctor`),
  CONSTRAINT `doctor_dni` FOREIGN KEY (`doctor`) REFERENCES `doctores` (`dni`),
  CONSTRAINT `paciente_dni` FOREIGN KEY (`paciente`) REFERENCES `paciente` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `tratamientos`

CREATE TABLE `tratamientos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `tratamientos_presupuestos`

CREATE TABLE `tratamientos_presupuestos` (
  `presupuesto_id` int(10) NOT NULL,
  `tratamiento_id` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  PRIMARY KEY (`presupuesto_id`, `tratamiento_id`),
  KEY `id_presupuesto` (`presupuesto_id`),
  KEY `id_tratamiento` (`tratamiento_id`),
  CONSTRAINT `id_presupuesto` FOREIGN KEY (`presupuesto_id`) REFERENCES `presupuestos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_tratamiento` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamientos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;

