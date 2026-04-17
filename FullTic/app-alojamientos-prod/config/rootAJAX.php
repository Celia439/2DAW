<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();

require_once ($_SERVER["DOCUMENT_ROOT"] . "/app-alojamientos-prod/config/index.php");

$pagina = $_POST["pagina"] ?? "";
$modelo = $_POST["modelo"] ?? "";
$origenHTTP = $_SERVER['HTTP_REFERER'];

unset($_POST["pagina"]);
unset($_POST["modelo"]);

// Si no viene modelo, lo generamos automáticamente a partir de la página
if (empty($modelo) && !empty($pagina)) {
    // Extraer: "controladores/panel/clientes/index.php" → "modelos/panel/clientes/index.php"
    $ruta = str_replace('controladores/', '', $pagina);     // panel/clientes/index.php
    $carpeta = dirname($ruta);                                // panel/clientes
    $modelo = "modelos/" . $carpeta . "/index.php";          // modelos/panel/clientes/index.php
}

include ROOT . $modelo;
include ROOT . $pagina;

?>