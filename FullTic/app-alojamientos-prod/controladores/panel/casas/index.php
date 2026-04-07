<?php

require_once LIBRERIA_PHP . "comun.php";

$provincias = getProvincias();

$casasControl = new casas();

$casas = $casasControl->getCasas();
//$columnas= $casasControl->getColumnas();

switch ($_POST["action"]) {
    case "insert":

        //Gestionar formulario 
        parse_str($_POST["datos"], $form);

        $guardado = $casasControl->guardarCasas($form);

        //Ultima casa insertada

        $casas = $casasControl->getCasas();

        $ultCasa = $casas[count($casas) - 1];

        echo json_encode([
            "ok" => !empty($guardado),
            "casa" => $ultCasa,
            "casas" => $casas
        ]);
        break;
    case "update":
        break;

    case "delete":
        $id = $_POST["id"];

        $casasControl->eliminarPorId($id);

        $casas = $casasControl->getCasas();

        echo json_encode([
            "HTML" => "El  con ID $id ha sido eliminado correctamente.",
            "casas" => $casas
        ]);
        break;
}
