-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2026 a las 19:41:10
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
-- Base de datos: `bibliotech`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplares`
--

CREATE TABLE `ejemplares` (
  `id_ejemplar` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `codigo_barra` varchar(50) NOT NULL,
  `estado` enum('disponible','prestado','reservado','perdido') NOT NULL DEFAULT 'disponible',
  `id_estanteria` int(11) DEFAULT NULL,
  `fecha_alta` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejemplares`
--

INSERT INTO `ejemplares` (`id_ejemplar`, `id_libro`, `codigo_barra`, `estado`, `id_estanteria`, `fecha_alta`) VALUES
(1, 1, 'EJ-001-001', 'disponible', 1, '2026-02-20'),
(2, 1, 'EJ-001-002', 'disponible', 1, '2026-02-20'),
(3, 1, 'EJ-001-003', 'prestado', 1, '2026-02-20'),
(4, 2, 'EJ-002-001', 'disponible', 3, '2026-02-20'),
(5, 2, 'EJ-002-002', 'reservado', 3, '2026-02-20'),
(6, 3, 'EJ-003-001', 'disponible', 2, '2026-02-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`, `telefono`, `direccion`, `email`, `logo_url`) VALUES
(1, 'BiblioTech Central', '912345678', 'Calle Ejemplo 123, Madrid', 'contacto@bibliotech.es', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanterias`
--

CREATE TABLE `estanterias` (
  `id_estanteria` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `pasillo` varchar(50) DEFAULT NULL,
  `seccion` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estanterias`
--

INSERT INTO `estanterias` (`id_estanteria`, `codigo`, `pasillo`, `seccion`, `descripcion`) VALUES
(1, 'EST-A1', 'A', '1', 'Estantería de ficción general'),
(2, 'EST-A2', 'A', '2', 'Estantería de drama y clásicos'),
(3, 'EST-B1', 'B', '1', 'Estantería de ciencia ficción'),
(4, 'EST-B2', 'B', '2', 'Estantería de fantasía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `nombre`, `descripcion`) VALUES
(1, 'Ficción', 'Narrativa de ficción general'),
(2, 'Drama', 'Obras dramáticas y teatrales'),
(3, 'Acción', 'Aventuras y acción'),
(4, 'Romance', 'Novelas románticas'),
(5, 'Ciencia Ficción', 'Ficción científica y futurista'),
(6, 'Fantasía', 'Mundos fantásticos y magia'),
(7, 'Terror', 'Historias de miedo y suspense'),
(8, 'Misterio', 'Novelas de misterio y detectives'),
(9, 'Historia', 'Novelas históricas'),
(10, 'Biografía', 'Biografías y autobiografías');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(150) NOT NULL,
  `editorial` varchar(100) DEFAULT NULL,
  `anio_publicacion` year(4) DEFAULT NULL,
  `idioma` varchar(50) DEFAULT 'Español',
  `num_paginas` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `descripcion` text DEFAULT NULL,
  `estado` enum('activo','deshabilitado') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `isbn`, `titulo`, `autor`, `editorial`, `anio_publicacion`, `idioma`, `num_paginas`, `cantidad`, `descripcion`, `estado`) VALUES
(1, '978-84-1107-123-9', 'El principio', 'Autor Ejemplo', 'Editorial Planeta', '2020', 'Español', 320, 5, 'Una historia fascinante sobre los orígenes', 'activo'),
(2, '978-84-9998-456-2', 'Aventuras sin fin', 'María López', 'Penguin Random House', '2019', 'Español', 450, 3, 'Aventuras épicas en tierras lejanas', 'activo'),
(3, '978-84-2233-789-1', 'Misterio en la noche', 'Carlos Ruiz', 'Alfaguara', '2021', 'Español', 280, 4, 'Un thriller apasionante', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_genero`
--

CREATE TABLE `libro_genero` (
  `id_libro` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libro_genero`
--

INSERT INTO `libro_genero` (`id_libro`, `id_genero`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 6),
(3, 7),
(3, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multas`
--

CREATE TABLE `multas` (
  `id_multa` int(11) NOT NULL,
  `id_prestamo` int(11) NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `pagada` tinyint(1) NOT NULL DEFAULT 0,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` int(11) NOT NULL,
  `id_usuario_lector` int(11) NOT NULL,
  `id_ejemplar` int(11) NOT NULL,
  `id_bibliotecario` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_limite` date NOT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `estado` enum('activo','devuelto','retrasado') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `id_usuario_lector`, `id_ejemplar`, `id_bibliotecario`, `fecha_prestamo`, `fecha_limite`, `fecha_devolucion`, `observacion`, `estado`) VALUES
(1, 2, 3, 3, '2025-01-15', '2025-02-15', NULL, 'Esquina doblada en página 45', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_ejemplar` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `observacion` text DEFAULT NULL,
  `estado` enum('activa','caducada','cumplida','cancelada') NOT NULL DEFAULT 'activa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_usuario`, `id_ejemplar`, `fecha_reserva`, `observacion`, `estado`) VALUES
(1, 2, 5, '2025-02-01', 'Cliente esperando disponibilidad', 'activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `rol` enum('lector','bibliotecario','admin') NOT NULL DEFAULT 'lector',
  `estado` enum('activo','bloqueado') NOT NULL DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `dni`, `email`, `password`, `telefono`, `direccion`, `rol`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Principal', '12345678A', 'admin@bibliotech.es', '$2y$10$abcdefghijklmnopqrstuvwxyz123456', '600000000', 'Madrid', 'admin', 'activo', '2026-02-20 18:31:30', '2026-02-20 18:31:30'),
(2, 'Celia', 'Vega', '44589762T', 'celia@example.com', '$2y$10$abcdefghijklmnopqrstuvwxyz123456', '678542315', 'Málaga', 'lector', 'activo', '2026-02-20 18:31:30', '2026-02-20 18:31:30'),
(3, 'Juan', 'García', '87654321B', 'juan@bibliotech.es', '$2y$10$abcdefghijklmnopqrstuvwxyz123456', '611111111', 'Madrid', 'bibliotecario', 'activo', '2026-02-20 18:31:30', '2026-02-20 18:31:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ejemplares`
--
ALTER TABLE `ejemplares`
  ADD PRIMARY KEY (`id_ejemplar`),
  ADD UNIQUE KEY `codigo_barra` (`codigo_barra`),
  ADD KEY `id_libro` (`id_libro`),
  ADD KEY `id_estanteria` (`id_estanteria`),
  ADD KEY `idx_ejemplares_estado` (`estado`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `estanterias`
--
ALTER TABLE `estanterias`
  ADD PRIMARY KEY (`id_estanteria`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `idx_libros_isbn` (`isbn`);

--
-- Indices de la tabla `libro_genero`
--
ALTER TABLE `libro_genero`
  ADD PRIMARY KEY (`id_libro`,`id_genero`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`id_multa`),
  ADD UNIQUE KEY `id_prestamo` (`id_prestamo`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `id_usuario_lector` (`id_usuario_lector`),
  ADD KEY `id_ejemplar` (`id_ejemplar`),
  ADD KEY `id_bibliotecario` (`id_bibliotecario`),
  ADD KEY `idx_prestamos_estado` (`estado`),
  ADD KEY `idx_prestamos_fecha` (`fecha_prestamo`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_ejemplar` (`id_ejemplar`),
  ADD KEY `idx_reservas_estado` (`estado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `idx_usuarios_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ejemplares`
--
ALTER TABLE `ejemplares`
  MODIFY `id_ejemplar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estanterias`
--
ALTER TABLE `estanterias`
  MODIFY `id_estanteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `multas`
--
ALTER TABLE `multas`
  MODIFY `id_multa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejemplares`
--
ALTER TABLE `ejemplares`
  ADD CONSTRAINT `ejemplares_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`) ON DELETE CASCADE,
  ADD CONSTRAINT `ejemplares_ibfk_2` FOREIGN KEY (`id_estanteria`) REFERENCES `estanterias` (`id_estanteria`) ON DELETE SET NULL;

--
-- Filtros para la tabla `libro_genero`
--
ALTER TABLE `libro_genero`
  ADD CONSTRAINT `libro_genero_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`) ON DELETE CASCADE,
  ADD CONSTRAINT `libro_genero_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`) ON DELETE CASCADE;

--
-- Filtros para la tabla `multas`
--
ALTER TABLE `multas`
  ADD CONSTRAINT `multas_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamos` (`id_prestamo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`id_usuario_lector`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`id_ejemplar`) REFERENCES `ejemplares` (`id_ejemplar`) ON DELETE CASCADE,
  ADD CONSTRAINT `prestamos_ibfk_3` FOREIGN KEY (`id_bibliotecario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_ejemplar`) REFERENCES `ejemplares` (`id_ejemplar`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
