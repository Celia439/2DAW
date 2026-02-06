-- Crear tabla de usuarios
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertar usuarios de ejemplo
INSERT INTO users (username, email, password) VALUES
('admin', 'admin@example.com', 'admin123'),
('maria_garcia', 'maria@example.com', 'pass456'),
('juan_lopez', 'juan@example.com', 'pass789'),
('ana_martinez', 'ana@example.com', 'pass321'),
('carlos_rodriguez', 'carlos@example.com', 'pass654');

-- Mensaje de confirmación
SELECT 'Base de datos inicializada correctamente' AS mensaje;
