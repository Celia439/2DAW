<!doctype html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            border:1px;
            cellpadding:5px;
        }

        th {
            font-family: cursive;
            border: solid green 2px;
            padding: 1em;
            border-bottom: solid green 3px;
        }

        td {
            border: solid green 2px;
            padding: 1em;
        }
    </style>
</head>
<body>
<h2>Ejercicio7</h2>

<form action="ej7.php" method="post">
    <input type="number" name="numero" placeholder="Introduce un número" required/>
    <input type="submit" value="Comprobar">
</form>
<?php
//7. Programar una página en HTML – PHP que pida al usuario un número y le diga
//si el número es primo o no lo es. En caso de que no lo sea deberá mostrar una
//tabla con los divisores de dicho número.

/**
 * @param int $num
 * @return void
 */
function esPrimo(int $num): void
{
    $esPrimo = true;
    $divisores = [];

    // 1 y 0 no son primos
    if ($num <= 1) {
        $esPrimo = false;
    }

    // Comprobar divisores
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            $esPrimo = false;
            $divisores[] = $i; // guardar divisor
        }
    }

    if ($esPrimo) {
        echo "<p><strong>$num es un número primo.</strong></p>";
    } else {
        echo "<p><strong>$num NO es primo.</strong></p>";

        echo "<table>";
        echo "<tr><th>Divisores</th></tr>";

        foreach ($divisores as $d) {
            echo "<tr><td>$d</td></tr>";
        }

        echo "</table>";
    }
}

if (isset($_POST["numero"]) && is_numeric($_POST["numero"])) {

    $num = (int)$_POST["numero"];
    esPrimo($num);
}

?>


</body>
</html>