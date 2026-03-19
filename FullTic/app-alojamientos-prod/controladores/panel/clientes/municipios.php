<?php
header("Content-Type: application/json; charset=utf-8");

require_once __DIR__ . "/../../../modelos/comun/ubicaciones.php";

$idProvincia = $_POST["provincia"] ?? null;

$municipios = getMunicipiosPorProvincia($idProvincia);

echo json_encode([
    "ok" => true,
    "municipios" => $municipios
]);
exit;