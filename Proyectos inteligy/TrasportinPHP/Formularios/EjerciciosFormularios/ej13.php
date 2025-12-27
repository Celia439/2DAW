<!doctype html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
        }

        th {
            font-family: cursive;
            padding: 1em;
        }

        td {
            padding: 1em;
        }
    </style>
</head>
<body>
<h2>Ejercicio13</h2>

<form action="ej13.php" method="get">
    <input type="password" name="contrasena" placeholder="Introduce su contraseña">
    <input type="submit" value="Comprobar">
</form>
<?php
//13. Programar una página en HTML – PHP que pida al usuario su contraseña. La
//página deberá asegurarse de que la contraseña introducida no tienen ninguno de
//los siguientes caracteres: $, C, / o @.
if (!empty($_POST["contrasena"])) {
    $contrasena = $_POST["contrasena"];


    echo "<table>";
    echo "<tr>";
    echo "<th> su contraseña</th>";

    echo "</tr>";
    echo "<tr>";
    //primera forma
    $caracteres = '$C/@';

    // strpbrk lo que hace es comprobar si en la cadena aparece el caracter
    $encontrado = strpbrk($contrasena, $caracteres);
    if (empty($encontrado)) {
        echo "<td style='background-color: green'>";
    } else {
        echo "<td style='background-color: red'>";
    }
    for ($a = 0; $a < (strlen($contrasena)); $a++) {
        echo "*";
    }

    echo "</td>";


    echo " </tr>";
    echo "</table>";
}
?>
</body>
</html>