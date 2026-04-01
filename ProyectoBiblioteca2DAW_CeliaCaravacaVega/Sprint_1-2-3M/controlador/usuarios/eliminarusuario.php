<?php
/**
 * CONTROLADOR: Eliminar usuario
 * Recibe ID por POST y elimina el usuario
 */

header('Content-Type: application/json');

include_once __DIR__ . '/../../modelo/Usuario.php';
include_once __DIR__ . '/../../librerias/php/helpers.php';

$id = isset($_POST['id']) ? intval($_POST['id']) : null;

if (!$id) {
    echo json_encode([
        'ok' => false,
        'error' => 'ID de usuario no proporcionado'
    ]);
    exit;
}

try {
    $filasAfectadas = Usuario::eliminar($id);
    
    if ($filasAfectadas > 0) {
        echo json_encode([
            'ok' => true,
            'mensaje' => 'Usuario eliminado correctamente'
        ]);
    } else {
        echo json_encode([
            'ok' => false,
            'error' => 'No se pudo eliminar el usuario'
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'ok' => false,
        'error' => $e->getMessage()
    ]);
}
?>