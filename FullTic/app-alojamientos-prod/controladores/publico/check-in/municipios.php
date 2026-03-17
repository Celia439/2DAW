<?php

header("Content-Type: application/json; charset=utf-8");

// Recoger provincia desde AJAX ((null coalescing) Sí provincia no está vacío o null o si no "")
$idProvincia = $_GET["provincia"] ?? "";

// Crear instancia del modelo
$checkin = new checkin();

// Obtener municipios filtrados
$municipios = $checkin->getMunicipiosPorProvincia($idProvincia);

// Devolver JSON limpio
echo json_encode($municipios);
exit;
