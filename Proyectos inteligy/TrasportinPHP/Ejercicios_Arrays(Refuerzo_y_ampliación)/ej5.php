<!Doctype html>
<html>

<head>
    <title>ej4</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }

        table {
            margin-top: 2em;
            margin-left: 15%;
            background-color: palevioletred;
            border-collapse: collapse;
        }

        th {
            background-color: palevioletred;
            padding: 1em;
            border: papayawhip dashed 2px;
            color: white;


        }

        td {
            background-color: pink;
            text-align: center;
            border: papayawhip solid 2px;
            padding: 3px;
        }
    </style>
</head>

<body>
<?php
//      funciones
/**
 * @param array $asistencias
 * @return void
 * Recorre cada alumno del array que le proporcionas e imprime nombre y si asiste a clase 1 si falta 0.
 */
function recorrerCadaAlumnoConSusAsistencias(array $asistencias)
{
// recorrer cada alumno con sus asistencias
    foreach ($asistencias as $alumno => $asistencia) {
        echo "<tr>";
        echo "<td>" . $alumno . "</td>";
        //Comprobar si a asistido, a faltado o hay un error
        foreach ($asistencia as $aF) {
            if ($aF == 1) {
                echo "<td>Asistido</td>";
            } elseif ($aF == 0) {
                echo "<td>Falta</td>";
            } else {
                echo "<td>Error</td>";
            }
        }

        echo "</tr>";
    }
}

/*
 * Calcula el porcentaje de la asistencia de un alumno
 */
function calcularPorcentajeDeAsistencia($asistencia)
{
    $numDias = 5;
    $asistido = 0;
    foreach ($asistencia as $aF) {
        if ($aF == 1) {
            $asistido++;
        }
    }
    $porcentaje = (100 * $asistido) / $numDias;
    return $porcentaje;
}



//      datos
$asistencias = [
        "Ana" => [mt_rand(0,1), mt_rand(0,1), mt_rand(0,1), mt_rand(0,1), mt_rand(0,1)],
        "Pepe" => [mt_rand(0,1), mt_rand(0,1), mt_rand(0,1), mt_rand(0,1), mt_rand(0,1)],
        "Ignacio" => [mt_rand(0,1), mt_rand(0,1), mt_rand(0,1), mt_rand(0,1), mt_rand(0,1)],
        "Celia" => [1, 1, 1, 1, 1],
        "Paula" => [1, 0, 1, 1, 1],
        "Javi" => [0, 0, 1, 1, 0]
];
$porcentajeDeAsistencia = [];
//      cuerpo
//a)Muestre la matriz de asistencia en una tabla HTML con los alumnos (filas) y
//días (columnas).
?>
<table>
    <tr>
        <th>Alumno</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miercoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
    </tr>
    <?php
    recorrerCadaAlumnoConSusAsistencias($asistencias);
    ?>
</table>
<?php
//b) Calcule el porcentaje de asistencia de cada alumno sobre el total de días

foreach ($asistencias as $alumno => $asistencia) {
    $porcentajeDeAsistencia[$alumno] = calcularPorcentajeDeAsistencia($asistencia);
}
//c) Identifique al alumno con mejor y peor asistencia
$mejorAsistencia="";
$mejorAux=0;
$peorAsistencia="";
$peorAux=100;
foreach ($porcentajeDeAsistencia as $alumno => $porcentaje) {
    if($porcentaje > $mejorAux ){
    $mejorAsistencia=$alumno;
    $mejorAux=$porcentaje;
    }
    if($porcentaje < $peorAux ){
        $peorAsistencia=$alumno;
        $peorAux=$porcentaje;
        }
}
echo "Alumno con mejor asistencia $mejorAsistencia $mejorAux%<br>";
echo "Alumno con peor asistencia $peorAsistencia $peorAux%";
//d) Permita buscar un alumno concreto (usando una variable con su nombre) y
//mostrar únicamente su asistencia y su porcentaje.
$input='Celia';
$inputAux= $asistencias[$input];
echo "<br>";
foreach($inputAux as $aF){
echo $aF;
}
echo "<br>".$porcentajeDeAsistencia[$input];
?>
</body>

</html>
