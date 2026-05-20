<?php
require_once LIBRERIA_PHP . "comun.php";
$comun = new comun();
// Recoger los datos solo si existen en el POST
$datos = [];
if (isset($_POST["numero"]) || isset($_POST["anio"]) || isset($_POST["desde"]) || isset($_POST["hasta"])) {
    $datos = [
        "numero" => $_POST["numero"] ?? "",
        "anio"   => $_POST["anio"] ?? "",
        "desde"  => $_POST["desde"] ?? "",
        "hasta"  => $_POST["hasta"] ?? ""
    ];
}

// realizar consulta
$registros = $comun->getReservas($datos);

// Generar URL de check-in encriptada para cada reserva
foreach ($registros as &$res) {
    $res['url_checkin'] = $comun->Get_url_customer_booking($res['id']);
}
unset($res); // romper la referencia

// Calcular resumen a partir de los registros obtenidos
$total_huespedes = 0;
$total_bruto = 0;
$suma_descuento = 0;
$suma_comision = 0;
$total_final = 0;
$num_filas = count($registros);

foreach ($registros as $res) {
    $total_huespedes += (int)$res["total_huespedes"];
    $total_bruto     += (float)$res["importe_bruto"];
    $suma_descuento  += (float)$res["descuento"];
    $suma_comision   += (float)$res["comision"];
    $total_final     += (float)$res["importe_final"];
}

// Media de descuento y comisión
$media_descuento = $num_filas > 0 ? round($suma_descuento / $num_filas, 2) : 0;
$media_comision  = $num_filas > 0 ? round($suma_comision  / $num_filas, 2) : 0;

echo json_encode([
    "registros" => $registros,
    "resumen"   => [
        "total_huespedes"  => $total_huespedes,
        "total_bruto"      => round($total_bruto, 2),
        "total_descuento"  => $media_descuento,
        "total_comision"   => $media_comision,
        "total_final"      => round($total_final, 2)
    ]
]);
