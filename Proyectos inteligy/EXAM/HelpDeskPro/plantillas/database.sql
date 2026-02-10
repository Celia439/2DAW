DROP DATABASE IF EXISTS examen_php;
CREATE DATABASE examen_php;
USE examen_php;

-- Tabla usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(50),
    rol ENUM('admin', 'usuario')
);

-- Tabla categorias
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50)
);

-- Tabla incidencias
CREATE TABLE incidencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    prioridad ENUM('Baja', 'Media', 'Alta'),
    resuelto TINYINT(1) DEFAULT 0,
    categoria_id INT,
    usuario_id INT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Datos iniciales usuarios
INSERT INTO usuarios (nombre, email, password, rol) VALUES 
('Admin Profe', 'admin@test.com', '1234', 'admin'),
('Alumno DAW', 'user@test.com', '1234', 'usuario');

-- Datos iniciales categorías
INSERT INTO categorias (nombre) VALUES ('Hardware'), ('Software'), ('Redes'), ('Seguridad');