<?php
$reservasControl = new reservas();
//Recoger los datos 
$numero = $_POST["numero"];
$anio = $_POST["anio"];
$desde = $_POST["desde"];
$hasta = $_POST["hasta"];
//almacenarlos 
$datos = ["numero" => $numero, "anio" => $anio, "desde" => $desde, "hasta" => $hasta];

//realizar consulta
$registros = $reservasControl->consultarReservas($datos);

echo json_encode([
    "registros" => $registros
]);
