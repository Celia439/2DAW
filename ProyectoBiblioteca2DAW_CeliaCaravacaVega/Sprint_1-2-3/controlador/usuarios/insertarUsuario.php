<?php

include_once "../crud/crud.php";
include_once "../crud/Parametros.php";

$nombre     = $_POST["nombre"];
$apellido   = $_POST["apellido"];
$dni        = $_POST["dni"];
$email      = $_POST["email"];
$password   = $_POST["password"];
$telefono   = $_POST["telefono"];
$direccion  = $_POST["direccion"];
$rol        = $_POST["rol"];
$estado     = $_POST["estado"];

$datos = [
    "tabla" => "usuarios",
    "arrayCampos" => ["nombre", "apellido", "dni", "email", "password", "telefono", "direccion", "rol", "estado"],
    "campos" => [
        "'$nombre'",
        "'$apellido'",
        "'$dni'",
        "'$email'",
        "'$password'",
        "'$telefono'",
        "'$direccion'",
        "'$rol'",
        "'$estado'"
    ]
];

$param = new Parametros($datos);

try {
    $id = insertar($param);
    echo json_encode(["ok" => true, "id" => $id]);
} catch (Exception $e) {
    echo json_encode(["ok" => false, "error" => $e->getMessage()]);
}