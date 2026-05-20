<?php
$comun = new comun();
//Recoger los datos 
$id = $_POST["id"];
$alojamiento = $_POST["alojamiento"];
$provincia = $_POST["provincia"];
$localidad = $_POST["localidad"];
//almacenarlos 
$datos = ["id" => $id, "alojamiento" => $alojamiento, "provincia" => $provincia, "localidad" => $localidad];

//realizar consulta
$registros = $comun->getCasas($datos);

echo json_encode([
    "registros" => $registros
]);
