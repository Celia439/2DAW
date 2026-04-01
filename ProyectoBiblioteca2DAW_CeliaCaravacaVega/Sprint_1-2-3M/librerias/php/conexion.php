<?php
require_once __DIR__ . '/config.php';

function conectar()
{
    try {
        // Cadena de conexión con los datos de base de datos definidos en config.php.
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', DB_HOST, DB_NAME, DB_CHARSET);
        //Conexión a la base de datos
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        // Atributos de la conexión
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        // Si estamos en modo desarrollo, mostramos el error
        if (defined('ENVIRONMENT') && ENVIRONMENT === 'development') {
            die($e->getMessage());
        }
        // En producción, mostramos un mensaje genérico
        die('Error de conexión a la base de datos.');
    }
}
