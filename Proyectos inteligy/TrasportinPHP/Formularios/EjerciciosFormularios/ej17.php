<!doctype html>
<html>
<head>
    <style>
        body {
            background-color: lightblue;
        }

        table {
            border-collapse: collapse;
            margin: 5%;
        }

        th {
            background-color: cornflowerblue;
            color: white;
            border: cornflowerblue solid 2px;
            padding: 15px;
            text-align: center;
        }
        td{
            border: cornflowerblue solid 2px;
    background-color: white;
        }

    </style>
</head>
<body>
<h2>Ejercicio17</h2>

<form action="ej17.php" method="get">
    <input type="text" name="texto" placeholder="Introduce un texto">
    <input type="text" name="palabra" placeholder="Palabra a comprobar">
    <input type="submit" value="Comprobar">
</form>
<?php
//17. Queremos hacer un documento PHP que sirva para comprobar la calidad de un
//texto. La calidad de un texto se mide en el número de veces que el escritor repite
//determinadas palabras. Hacer una página en PHP que reciba un texto y una
//palabra. El sitio Web dará una puntuación al texto dependiendo el número de
//veces que se repita la palabra en el texto:

if (!empty($_GET["texto"]) && !empty($_GET["palabra"])) {

    $texto = $_GET["texto"];
    $palabra = $_GET["palabra"];

    $textoMin = strtolower($texto);
    $palabraMin = strtolower($palabra);

    // Separamos en palabras
    $palabras = explode(" ", $textoMin);

    $contador = 0;

    foreach ($palabras as $p) {
        $p = trim($p, ".,;:!?");
        if ($p === $palabraMin) {
            $contador++;
        }
    }

    // Porcentaje = (veces que aparece / total palabras) * 100
    $totalPalabras = count($palabras);
    $porcentaje = ($contador / $totalPalabras) * 100;

    // Determinar la calidad
    if ($porcentaje <= 10) {
        $calidad = "Muy Buena calidad";
    } elseif ($porcentaje <= 25) {
        $calidad = "Buena calidad";
    } elseif ($porcentaje <= 50) {
        $calidad = "Baja calidad";
    } else {
        $calidad = "Mala calidad";
    }

    echo "<table>";
    echo "<tr><th>Repeticiones</th><th>Puntuación</th></tr>";
    echo "<tr>";
    echo "<td>" . number_format($porcentaje, 2) . "%</td>";
    echo "<td>$calidad</td>";
    echo "</tr>";
    echo "</table>";
}

?>
</body>
</html>