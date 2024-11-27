SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE clinic;
USE clinic;

CREATE TABLE `appointments` (
  `id` int(255) NOT NULL,
  `patient_dni` varchar(9) NOT NULL,
  `doctor_dni` varchar(9) NOT NULL,
  `hour` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `last_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `medical_records` (
  `id` int(11) NOT NULL,
  `patient_dni` varchar(9) NOT NULL,
  `record_date` date NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `treatments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `pfpimg` varchar(255) DEFAULT NULL,
  `dni` varchar(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwd` varchar(255) NOT NULL,
  `specialization` int(20) DEFAULT NULL,
  `fecha_union` date NOT NULL,
  `disponibilidad` varchar(255) DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `role_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni_doctor` (`doctor_dni`),
  ADD KEY `dni_paciente` (`patient_dni`);

ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_dni` (`patient_dni`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `rol` (`role_id`);

ALTER TABLE `appointments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `medical_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `appointments`
  ADD CONSTRAINT `dni_doctor` FOREIGN KEY (`doctor_dni`) REFERENCES `users` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dni_paciente` FOREIGN KEY (`patient_dni`) REFERENCES `users` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `medical_records`
  ADD CONSTRAINT `paciente_dni` FOREIGN KEY (`patient_dni`) REFERENCES `users` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `users`
  ADD CONSTRAINT `rol` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;