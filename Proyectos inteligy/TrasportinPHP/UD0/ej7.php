<!DOCTYPE html>
<html>

<head>
    <title>ej7</title>
    <style>
    table{
        border-collapse: collapse;
        border: solid rgb(75,172,198) 2px;
    }
    th{
        background-color:rgb(75,172,198) ;
        padding: 1em;

    }
    td{
        border-bottom: solid rgb(75,172,198) 2px;
        padding: 1em;
    }
    </style>
</head>

<body>
<?php
function notas($alumno, $matematicas, $lengua, $historia, $dibujo)
{
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