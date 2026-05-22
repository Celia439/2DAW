<?php

$checkinControl = new checkin();

// Pasamos los datos a un array asociativo
parse_str($_POST["datos"], $form);

// guardamos el cliente
$guardado = $checkinControl->guardarCliente($form);

// Buscar si hay un registro vacío (sin id_cliente) creado desde el panel
$existentes = $checkinControl->getReservaHuespedByReserva($_SESSION["id_reserva"]);
$registroVacio = null;
foreach ($existentes as $ex) {
    if (empty($ex['id_cliente'])) {
        $registroVacio = $ex;
        break;
    }
}

if ($registroVacio) {
    // Actualizamos el registro vacío con el nuevo cliente y lo hacemos titular
    $checkinControl->actualizarReservasHuespedes($registroVacio["id"], $guardado, 1);
} else {
    // No hay registro vacío. Contamos huéspedes reales (con id_cliente)
    $registradosReales = 0;
    foreach ($existentes as $ex) {
        if (!empty($ex['id_cliente'])) {
            $registradosReales++;
        }
    }
    $esTitular = ($registradosReales == 0) ? 1 : 0;
    $checkinControl->guardarReservasHuespedes($_SESSION["id_reserva"], $_SESSION["id_casa"], $guardado, $esTitular);
}

// devolvemos el total de huespedes 
$totalHuespedes = $checkinControl->n_huespedes_reserva($_SESSION["id_reserva"]);
$totalHuespedes = $totalHuespedes[0]["total_huespedes"];

// miramos cuantos huespedes registrados para devolver el total actualizado 
$resultado = $checkinControl->n_huespedes_registrados($_SESSION["id_reserva"]);
$registrados = $resultado[0]["total"];

echo json_encode([
    "ok" => !empty($guardado),
    "registrados" => $registrados,
    "total" => $totalHuespedes,
    "error" => $guardado ? null : "no se pudo gurardar"
]);
