<?php
/**
 * CONTROLADOR: Obtener todos los usuarios
 * Devuelve JSON con la lista de usuarios
 */

header('Content-Type: application/json');

include_once __DIR__ . '/../../modelo/Usuario.php';

try {
    $usuarios = Usuario::obtenerTodos();
    echo json_encode([
        'ok' => true,
        'datos' => $usuarios
    ]);
} catch (Exception $e) {
    echo json_encode([
        'ok' => false,
        'error' => $e->getMessage()
    ]);
}
?>