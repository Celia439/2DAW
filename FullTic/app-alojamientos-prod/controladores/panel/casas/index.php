<?php


$casasControl = new casas();

$casas=$casasControl->getCasas();
$columnas= $casasControl->getColumnas();

switch ($_POST["action"]) {
    case "insert":

        //Gestionar formulario 
        parse_str($_POST["datos"], $form);

    case "update":

    case "delete":
        $id = $_POST["id"];

        $casasControl->eliminarPorId($id);

        echo json_encode([
            "HTML" => "El  con ID $id ha sido eliminado correctamente."
        ]);
        exit;
}
