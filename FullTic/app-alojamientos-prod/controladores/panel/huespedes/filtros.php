<?php
$huespedControl = new huespedes();

// Recoger los datos
$id = $_POST["id"] ?? null;
$id_reserva = $_POST["id_reserva"] ?? null;
$id_casa = $_POST["id_casa"] ?? null;
$id_cliente = $_POST["id_cliente"] ?? null;

// Construir where dinámico
$whereCondiciones = [];

if (!empty($id)) {
    $whereCondiciones[] = "id = $id";
}
if (!empty($id_reserva)) {
    $whereCondiciones[] = "id_reserva = $id_reserva";
}
if (!empty($id_casa)) {
    $whereCondiciones[] = "id_casa = $id_casa";
}
if (!empty($id_cliente)) {
    $whereCondiciones[] = "id_cliente = $id_cliente";
}

// Si no hay filtros, devolver todos
if (empty($whereCondiciones)) {
    $registros = $huespedControl->getHuespedes();
} else {
    // Realizar consulta con filtros
    require_once CONSULTAS;
    $dbControl = new Database();
    $parametros = new stdClass();
    $parametros->tabla = "reservas_huespedes";
    $parametros->where = implode(" AND ", $whereCondiciones);
    $registros = $dbControl->select($parametros);
}

echo json_encode([
    "registros" => $registros ?? []
]);
