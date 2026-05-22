<?php

require_once LIBRERIA_PHP . "comun.php";
$comun = new comun();

$provincias = $comun->getProvincias();

$casasControl = new casas();

// Con el JOIN en comun.php, ya tenemos provinciaN y localidadN disponibles
$casas = $comun->getCasas([]); 

//$columnas= $casasControl->getColumnas();

switch ($_POST["action"]) {
    case "insert":

        //Gestionar formulario 
        parse_str($_POST["datos"], $form);

        $guardado = $casasControl->guardarCasas($form);

        //Ultima casa insertada

        $casas = $comun->getCasas([]);

        $ultCasa = $casas[count($casas) - 1];

        echo json_encode([
            "ok" => !empty($guardado),
            "casa" => $ultCasa,
            "casas" => $casas
        ]);
        exit;
    case "update":
        parse_str($_POST["datos"], $form);
        $casasControl->editarCasa($form);
        $casas = $comun->getCasas([]);
        echo json_encode([
            "ok" => true,
            "casas" => $casas
        ]);
        exit;

    case "delete":
        $id = $_POST["id"];

        $casasControl->eliminarPorId($id);

        $casas = $comun->getCasas([]);
        echo json_encode([
            "ok" => true,
            "HTML" => "El registro con ID $id ha sido eliminado correctamente.",
            "casas" => $casas
        ]);
        exit;
}
