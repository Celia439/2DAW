<!doctype html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
        }

        th {
            font-family: cursive;
            border: solid black 2px;
            padding: 1em;
            border-bottom: solid black 3px;
        }

        td {
            border: solid black 2px;
            padding: 1em;
        }
    </style>
</head>
<body>
<h2>Ejercicio10</h2>

<form action="ej10.php" method="post">
<!--implementar bucle for -->
    <select name="desplegable" >
        <option value="no" selected>Elija la tabla que quiere visualizar</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
    <label>Rojo
        <input type="radio" name="color" value="red">
    </label>
    <label>Verde
        <input type="radio" name="color" value="green">
    </label>
    <label>Azul
        <input type="radio" name="color" value="blue">
    </label>
    <input type="submit" value="Comprobar">
</form>
<?php
//10. Programar una página en HTML – PHP que utilizando una lista desplegable deje
//al usuario elegir qué tabla de multiplicar quiere visualizar. Además le dejará
//elegir (utilizando un conjunto de tipo radio) en qué color quiere visualizarla.
//Después, la página Web le mostrará dicha tabla de multiplicar utilizando el color
//elegido por el usuario.
if (isset($_POST["desplegable"], $_POST["color"]) && ($_POST["desplegable"]) !== "no") {
    $num1 = $_POST["desplegable"];
    $color= $_POST["color"];

    echo "<table style=' border: $color 1px solid'>
    <tr>
        <th style=' border: $color 1px solid'>Operación</th>
        <th style=' border: $color 1px solid'>Resultado</th>
    </tr>";
//Array con numeros

    for ($i=0;$i<=10;$i++) {
        echo "<tr>";
        echo "<td style=' color: $color;border: $color 1px solid'> $num1 * $i =</td>";
        echo "<td style='color: $color; border: $color 1px solid'>" . ($num1*$i) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

?>


</body>
</html>