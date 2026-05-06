<?php

require_once LIBRERIA_PHP . "comun.php";
$comun=new comun();

$controlHuespedes = new huespedes();


$huespedes = $controlHuespedes->getHuespedes();
$casas= $comun->getCasas();
$clientes= $comun->getClientes();
$reservas=$comun->getReservas();

switch ($_POST["action"]) {
    case "insert":

        //Gestionar formulario 
        parse_str($_POST["datos"], $form);

        $guardado = $controlHuespedes->guardarHuesped($form);
 
        //Ultima huesped insertado

        $huespedes = $controlHuespedes->getHuespedes();

        $ultHuesped = $huespedes[count($huespedes) - 1];

        echo json_encode([
            "ok" => !empty($guardado),
            "casa" => $ultHuesped,
            "huespedes" => $huespedes
        ]);
        break;
    case "update":
        parse_str($_POST["datos"], $form);

        $controlHuespedes->editarHuesped($form);
        
        $huespedes = $controlHuespedes->getHuespedes();
        
        echo json_encode([
            "huespedes" => $huespedes
        ]);
        break;

    case "delete":
        $id = $_POST["id"];

        $controlHuespedes->eliminarPorId($id);

        $huespedes = $controlHuespedes->getHuespedes();

        echo json_encode([
            "HTML" => "El registro con ID $id ha sido eliminado correctamente.",
            "huespedes" => $huespedes
        ]);
        break;
}
