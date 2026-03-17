<?php

$checkinControl = new checkin();


// Pasamos los datos a un array asociativo
parse_str($_POST["datos"], $form);

// miramos cuantos huespedes registrados para saber si el el titular 
$resultado= $checkinControl->n_huespedes_registrados($_SESSION["id_reserva"]);
$registrados = $resultado[0]["total"];

//Si es el primero es el titular 
$esTitular = ($registrados == 0) ? 1 : 0;

//guardamos los clientes 
$guardado = $checkinControl->guardarCliente($form);

//guardamos el campo reservas_huespedes
$guardado2=$checkinControl->guardarReservasHuespedes($_SESSION["id_reserva"],$_SESSION["id_casa"],$guardado,$esTitular);

// devolvemos el total de huespedes 
$totalHuespedes=$checkinControl->n_huespedes_reserva($_SESSION["id_reserva"]);
$totalHuespedes = $totalHuespedes[0]["total_huespedes"];

// miramos cuantos huespedes registrados para devolver el total actualizado 
$resultado= $checkinControl->n_huespedes_registrados($_SESSION["id_reserva"]);
$registrados = $resultado[0]["total"];
//debug

echo json_encode([
    "ok" => !empty($guardado),
    "registrados"=>$registrados,
    "total"=>$totalHuespedes,
    "error" => $guardado ? null : "no se pudo gurardar"
]);