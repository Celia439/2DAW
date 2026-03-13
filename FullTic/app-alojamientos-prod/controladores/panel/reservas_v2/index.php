<?php


$reservasControl = new reservas();

$reservas= $reservasControl->getReservas();

//Gestionar formulario 
parse_str($_POST["datos"], $form);

switch ($_POST["accion"]) {
    case "insert": 
    case "update": 
    case "delete": 
}
