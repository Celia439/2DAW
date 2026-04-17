<?php
header("Content-Type: application/json; charset=utf-8");

require_once LIBRERIA_PHP . 'comun.php';

$comun= new comun();

$idProvincia = $_POST["provincia"] ?? null;

$municipios = $comun->getMunicipiosPorProvincia($idProvincia);

echo json_encode([
    "ok" => true,
    "municipios" => $municipios
]);
exit;