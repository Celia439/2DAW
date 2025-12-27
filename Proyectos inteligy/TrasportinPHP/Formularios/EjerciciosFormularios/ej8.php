<!doctype html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            text-align: left;
        }

        th {
            font-family: cursive;
            border: solid green 2px;
            padding: 1em;
            border-bottom: solid green 3px;
        }

        td {
            text-align: left;
            border: solid green 2px;
            padding: 1em;
        }
    </style>
</head>
<body>
<h2>Ejercicio8</h2>

<form action="ej8.php" method="post">
    <input type="text" name="nombre" placeholder="Introduce tu nombre" required/>
    <input type="number" name="mates" placeholder="matematicas" required/>
    <input type="number" name="lengua" placeholder="lengua" required/>
    <input type="number" name="historia" placeholder="historia" required/>
    <input type="number" name="dibujo" placeholder="dibujo" required/>
    <input type="submit" value="Comprobar">
</form>
<?php
//7. Programar una página en HTML – PHP que pida al usuario un número y le diga
//si el número es primo o no lo es. En caso de que no lo sea deberá mostrar una
//tabla con los divisores de dicho número.
function calcularNota($alumno, $matematicas, $lengua, $historia, $dibujo)
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

if (isset($_POST["nombre"]) && isset($_POST["mates"]) && isset($_POST["lengua"]) && isset($_POST["historia"]) && isset($_POST["dibujo"])) {
    $alumno = $_POST["nombre"];
    $matematicas = $_POST["mates"];
    $lengua = $_POST["lengua"];
    $historia = $_POST["historia"];
    $dibujo = $_POST["dibujo"];


// Ejemplos:
    calcularNota($alumno, $matematicas, $lengua, $historia, $dibujo);
}

?>

</body>
</html>