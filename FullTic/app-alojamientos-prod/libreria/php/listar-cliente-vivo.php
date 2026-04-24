<?php
require_once CONSULTAS;
$consultasControl = new Database();

$parametros = new stdClass();
$parametros->tabla = "clientes";
// CORRECCIÓN PHP 8: Usamos comillas en "busqueda"
$busqueda = $_POST["busqueda"];
$parametros->where = "numero_documento_identidad LIKE :busqueda OR nombre LIKE :busqueda OR primer_apellido LIKE :busqueda OR segundo_apellido LIKE :busqueda OR telefono_movil LIKE :busqueda OR correo LIKE :busqueda";
$parametros->valoresWhere = ["busqueda" => "%$busqueda%"];

$result = $consultasControl->select($parametros);

$arrayJSON = array();
if ($result) {
    ob_start();
    foreach ($result as $fila) {
        // Esta es la fila que crearemos en el paso 4
        include LIBRERIA_HTML . "fila-busqueda-cliente-vivo.php";
    }
    $arrayJSON["HTML"] = ob_get_contents();
    ob_end_clean();
} else {
    $arrayJSON["HTML"] = "<li class='list-group-item'>No hay resultados</li>";
}

echo json_encode($arrayJSON);
