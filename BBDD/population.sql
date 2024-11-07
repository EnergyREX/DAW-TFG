-- Inserciones en la tabla `admin`
INSERT INTO `admin` (`dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `contraseña`, `especialidad`, `fecha_union`, `disponibilidad`)
VALUES
('12345678A', 'Juan', 'Pérez', 'Calle Falsa 123', '612345678', 'juan.perez@clinica.com', 'password123', 'Cardiología', '2024-01-15', 'Lunes a Viernes 9:00-18:00'),
('22345678B', 'María', 'López', 'Avenida Gran Vía 21', '612345679', 'maria.lopez@clinica.com', 'password456', 'Dermatología', '2024-02-25', 'Lunes a Viernes 8:00-14:00'),
('32345678C', 'Carlos', 'Rodríguez', 'Calle del Río 88', '622345680', 'carlos.rodriguez@clinica.com', 'password789', 'Neurología', '2024-03-18', 'Martes a Jueves 9:00-17:00'),
('42345678D', 'Lucía', 'Torres', 'Calle de la Paz 43', '632345681', 'lucia.torres@clinica.com', 'password012', 'Endocrinología', '2024-04-02', 'Lunes a Viernes 10:00-19:00');

-- Inserciones en la tabla `asistente`
INSERT INTO `asistente` (`dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `contraseña`, `fecha_union`, `disponibilidad`)
VALUES
('23456789B', 'Ana', 'Gómez', 'Calle Real 456', '622345678', 'ana.gomez@clinica.com', 'password456', '2024-02-20', 'Lunes a Viernes 10:00-16:00'),
('33456789C', 'Luis', 'Pérez', 'Calle del Sol 89', '632345679', 'luis.perez@clinica.com', 'password789', '2024-03-30', 'Lunes a Viernes 9:00-14:00'),
('43456789D', 'Elena', 'Vega', 'Calle Santa Teresa 150', '642345680', 'elena.vega@clinica.com', 'password321', '2024-04-12', 'Martes a Sábado 10:00-17:00'),
('53456789E', 'Jorge', 'García', 'Calle de la Luz 10', '652345681', 'jorge.garcia@clinica.com', 'password654', '2024-05-05', 'Lunes a Viernes 8:00-15:00');

-- Inserciones en la tabla `doctores`
INSERT INTO `doctores` (`dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `contraseña`, `especialidad`, `fecha_union`, `disponibilidad`)
VALUES
('34567890C', 'Carlos', 'Martínez', 'Calle Mayor 789', '632345678', 'carlos.martinez@clinica.com', 'password789', 'Pediatría', '2024-03-10', 'Lunes a Viernes 8:00-17:00'),
('44567891D', 'Elena', 'Sánchez', 'Avenida Libertad 22', '642345679', 'elena.sanchez@clinica.com', 'password101', 'Ginecología', '2024-04-12', 'Lunes a Jueves 8:00-15:00'),
('54567892E', 'Antonio', 'Jiménez', 'Calle Sevilla 101', '652345682', 'antonio.jimenez@clinica.com', 'password123', 'Traumatología', '2024-05-20', 'Lunes a Viernes 9:00-18:00'),
('64567893F', 'Raquel', 'Alonso', 'Calle Toledo 33', '662345683', 'raquel.alonso@clinica.com', 'password567', 'Oftalmología', '2024-06-01', 'Martes a Viernes 10:00-16:00');

-- Inserciones en la tabla `paciente`
INSERT INTO `paciente` (`dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `contraseña`)
VALUES
('45678901D', 'Lucía', 'Fernández', 'Calle Luna 101', '642345678', 'lucia.fernandez@paciente.com', 'password101'),
('55678901E', 'Pedro', 'García', 'Calle del Mar 10', '652345678', 'pedro.garcia@paciente.com', 'password202'),
('65678902F', 'Sara', 'Hernández', 'Calle de la Paz 34', '662345679', 'sara.hernandez@paciente.com', 'password303'),
('75678903G', 'Martín', 'Ruiz', 'Calle del Sol 12', '672345680', 'martin.ruiz@paciente.com', 'password404'),
('85678904H', 'Raquel', 'Molina', 'Calle del Valle 55', '682345681', 'raquel.molina@paciente.com', 'password505');

-- Inserciones en la tabla `citas`
INSERT INTO `citas` (`paciente`, `doctor`, `estado`, `motivo`, `dia`, `hora`)
VALUES
('45678901D', '34567890C', 'Confirmada', 'Revisión pediátrica', '2024-11-10', '10:00:00'),
('55678901E', '44567891D', 'Confirmada', 'Revisión ginecológica', '2024-11-12', '11:30:00'),
('65678902F', '34567890C', 'Pendiente', 'Consulta general', '2024-11-15', '09:00:00'),
('75678903G', '54567892E', 'Confirmada', 'Fractura de pierna', '2024-11-16', '14:30:00'),
('85678904H', '64567893F', 'Pendiente', 'Consulta de vista', '2024-11-18', '15:00:00');

-- Inserciones en la tabla `presupuestos`
INSERT INTO `presupuestos` (`paciente`, `doctor`, `tratamiento`, `precio`)
VALUES
('45678901D', '34567890C', 1, 200),
('55678901E', '44567891D', 2, 150),
('65678902F', '34567890C', 3, 180),
('75678903G', '54567892E', 4, 350),
('85678904H', '64567893F', 5, 100);

-- Inserciones en la tabla `tratamientos`
INSERT INTO `tratamientos` (`nombre`, `precio`)
VALUES
('Consulta pediátrica', 150),
('Revisión ginecológica', 120),
('Consulta general', 180),
('Vacunación', 50),
('Tratamiento dental', 200),
('Revisión traumatológica', 300),
('Consulta oftalmológica', 100);

-- Inserciones en la tabla `tratamientos_presupuestos`
INSERT INTO `tratamientos_presupuestos` (`presupuesto_id`, `tratamiento_id`, `cantidad`)
VALUES
(1, 1, 1),  -- 1 consulta pediátrica
(1, 4, 2),  -- 2 vacunas
(2, 2, 1),  -- 1 revisión ginecológica
(3, 3, 1),  -- 1 consulta general
(4, 6, 1),  -- 1 revisión traumatológica
(5, 7, 1);  -- 1 consulta oftalmológica
