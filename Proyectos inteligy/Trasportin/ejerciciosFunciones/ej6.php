<!DOCTYPE html>
<html>

<head>
    <title>ej6</title>
    <style>
    table{
        border-collapse: collapse;
    }
    th{
        font-family: cursive;
        border: solid green 2px;
        padding: 1em;
        border-bottom: solid green 3px;
    }
    td{
        border: solid green 2px;
        padding: 1em;
    }
    </style>
</head>

<body>
<?php
function notas($alumno, $matematicas, $lengua, $historia, $dibujo)
{
    // hacerlo con array asociativo
    $asignaruras = ["matematicas", "lengua", "historia", "dibujo"];
    $notas = [$matematicas, $lengua, $historia, $dibujo];
    echo "<table>
    <tr>
    <th>Alumno</th>
    <th>$alumno</th>
    </tr>";
    $indice = 0;
    foreach ($asignaruras as $asignarura) {
        echo "<tr>";
        echo "<td>$asignarura</td>";
        if ($notas[$indice] >= 9 && $notas[$indice] <= 10) {
            echo "<td>Sobresaliente.</td>";
        } elseif ($notas[$indice] >= 7 && $notas[$indice] < 9) {
            echo "<td>Notable.</td>";
        } elseif ($notas[$indice] >= 5 && $notas[$indice] < 7) {
            echo "<td>Suficiente.</td>";
        } elseif ($notas[$indice] >= 0 && $notas[$indice] < 5) {
            echo "<td>Insuficiente.</td>";
        } else {
            echo "<td>Nota no válida.</td>";
        }
        echo "</tr>";
        $indice++;
    }
    echo "</table>";

}

// Ejemplos:
notas("Celia", 7, 6, 5, 10);
?>


</body>

</html>