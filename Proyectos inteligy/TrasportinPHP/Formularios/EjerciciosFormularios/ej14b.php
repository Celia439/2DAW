<!doctype html>
<html>
<head>
    <style>
        body {
            background-color: lightblue;
        }

        table {
            border-collapse: collapse;
            margin: 25%;
            border: white solid 1px;
        }

        th {
            background-color: white;
            color: black;
            border: purple solid 2px;
            padding: 15px;
            text-align: center;
        }

    </style>
</head>
<body>
<h2>Ejercicio14</h2>

<form action="ej14b.php" method="get">
    <input type="text" name="text1" placeholder="Introduce palabra">
    <input type="text" maxlength="1" name="p1" placeholder="Introduce letra">
    <input type="text" maxlength="1" name="p2" placeholder="Introduce letra">
    <input type="submit" value="Comprobar">
</form>
<?php
//14. Crear un documento PHP que simule la función de reemplazo de los editores de
//texto. El documento pedirá al usuario un texto y dos letras. A continuación
//cambiará en el texto introducido por el usuario, la primera letra por la segunda.
//Se deberán mostrar los cambios en una tabla en la que se vea el texto antes y
//después del cambio.
if (
        !empty($_GET["text1"]) &&
        !empty($_GET["p1"]) &&
        !empty($_GET["p2"])
) {
    $text1 = $_GET["text1"];
$letra1=$_GET["p1"];
$letra2=$_GET["p2"];

echo "<table>";
    echo '<tr><th>Cadena</th><th>Cadena modificada</th></tr>';

        echo "<tr><td><b>$text1</b></td>";
        $textAux=$text1;
        for($i=0; $i < (strlen($text1));$i++){
            if($textAux[$i] === $letra1){
                $textAux[$i]=$letra2;
            }

        }
        echo "<td>$textAux</td></tr>";
    }

echo "</table>";
        ?>
</body>
</html>