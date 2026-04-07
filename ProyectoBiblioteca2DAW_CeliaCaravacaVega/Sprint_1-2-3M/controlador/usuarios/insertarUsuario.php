<?php

header('Content-Type: application/json');

include_once __DIR__ . "/../../modelo/usuario/usuario.php";
include_once __DIR__ . "/../../librerias/php/helpers.php";

$datos = [
    'nombre' => $_POST['nombre'] ?? '',
    'apellido' => $_POST['apellido'] ?? '',
    'dni' => $_POST['dni'] ?? '',
    'email' => $_POST['email'] ?? '',
    'password' => $_POST['password'] ?? '',
    'telefono' => $_POST['telefono'] ?? '',
    'direccion' => $_POST['direccion'] ?? '',
    'rol' => $_POST['rol'] ?? 'lector',
    'estado' => $_POST['estado'] ?? 'activo'
];

$datos = sanearArray($datos);

if (empty($datos['nombre']) || empty($datos['email']) || empty($datos['password'])) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Faltan campos obligatorios: nombre, email, password']);
    exit;
}

try {
    $id = Usuario::crear($datos);
    echo json_encode(['ok' => true, 'id' => $id]);
} catch (Exception $e) {
    echo json_encode(['ok' => false, 'error' => $e->getMessage()]);
}
