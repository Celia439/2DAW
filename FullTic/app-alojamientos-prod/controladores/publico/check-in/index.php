<?php
require_once __DIR__ . "/../../../modelos/comun/ubicaciones.php";

$paises = getNacionalidades();
$provincias = getProvincias();



$checkinControl = new checkin();
//De manera asíncrona
//$municipios = $checkinControl->getMunicipiosPorProvincia_v2();

$resultado= $checkinControl->n_huespedes_registrados($_SESSION["id_reserva"]);

$registrados = $resultado[0]["total"];

$totalHuespedes=$checkinControl->n_huespedes_reserva($_SESSION["id_reserva"]);
$totalHuespedes = $totalHuespedes[0]["total_huespedes"];