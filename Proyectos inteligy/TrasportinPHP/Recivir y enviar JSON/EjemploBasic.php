<?php
echo "Ejercicio 1: Crea un script PHP que defina la información de un alumno utilizando arrays
PHP. El alumno deberá tener los siguientes datos:
• DNI
• Nombre
• Edad
• Un conjunto de asignaturas con su correspondiente nota
Convierte la estructura creada a formato JSON y muéstrala por pantalla de forma legible.";
// eso lo crea de verdad o eso creo es nesesario al principio (en las apis no se implime nada que no sea json osea nada de echo "hola")
header('Content-Type: application/json; charset=utf-8');
echo json_encode(['status' => 'ok']);
// Salida: {"status":"ok"}

//creamos el alumno esto es asociativo no seas pendeja ok?
$alumnoA = ["DNI" => "00658845D", "Nombre" => "Celia", "Edad" => 20, "Asignaturas" => ["Mates" => 5, "Lengua" => 7, "Historia" => 2]];
// y este de aqui es posicional lul
$alumnoP=["alto","fuerte","marron","pescado","hibernar","cazar"];
// em creo que ta bien ahora a json..
//. eso lo pone bonico para ponerlo en el json    pero ojo estee es casi obligatorio ñ áéi...
echo json_encode($alumnoA,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
echo json_encode($alumnoP,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
// eso para las clases
class Usuario {
    public $nombre = "Ana";
    public $edad = 30;
}

echo json_encode(new Usuario());
header('Content-Type: application/json; charset=utf-8');

$alumno = [
    "nombre" => "Carlos García",
    "modulo" => "DWES",
    "nota" => 8.5,
    "aprobado" => true
];

echo json_encode($alumno, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
