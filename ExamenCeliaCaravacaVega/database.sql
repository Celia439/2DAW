DROP DATABASE IF EXISTS examen2_php;
CREATE DATABASE examen2_php;
USE examen2_php;

-- Tabla usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(50),
    rol ENUM('admin', 'usuario')
);

-- Tabla libros
CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    autor VARCHAR(100),
    disponible TINYINT(1) DEFAULT 1,
    usuario_id INT NULL,
    fecha_prestamo TIMESTAMP NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Datos iniciales usuarios
INSERT INTO usuarios (nombre, email, password, rol) VALUES 
('Admin Profe', 'admin@test.com', '1234', 'admin'),
('Alumno DAW', 'user@test.com', '1234', 'usuario');

-- Datos iniciales libros
INSERT INTO libros (titulo, autor, disponible) VALUES 
('Don Quijote', 'Miguel de Cervantes', 1),
('Cien años de soledad', 'Gabriel García Márquez', 1),
('El principito', 'Antoine de Saint-Exupéry', 1),
('1984', 'George Orwell', 1);
