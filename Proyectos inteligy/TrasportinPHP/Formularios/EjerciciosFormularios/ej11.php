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
<h2>Ejercicio11</h2>

<form action="ej11.php" method="post">

    <input type="number" name="num1" value="0">
    <input type="number" name="num2" value="0">
    <input type="number" name="num3" value="0">
    <input type="number" name="num4" value="0">
    <input type="number" name="num5" value="0">
    <input type="number" name="num6" value="0">
    <input type="number" name="num7" value="0">
    <input type="number" name="num8" value="0">
    <input type="number" name="num9" value="0">
    <input type="number" name="num10" value="0">
    <input type="submit" value="Comprobar">
</form>
<?php
//11. Programar una página en HTML – PHP que a través de formularios pida al
//usuario un total de 10 números. La página mostrará en una tabla:
//a. El array completo
//b. El mayor.
//c. El menor.
//d. La media.
//e. La suma.

if (isset($_POST["num1"], $_POST["num2"],$_POST["num3"],$_POST["num4"],$_POST["num5"],$_POST["num6"],$_POST["num7"],$_POST["num8"],$_POST["num9"],$_POST["num10"])) {
    // meter en el array con un bucle for
    $nums = [];
    for( $a=1;$a<=10;$a++){
        $nums[]=$_POST["num$a"];
    }
// $nums = [$_POST["num1"], $_POST["num2"], $_POST["num3"], $_POST["num4"], $_POST["num5"], $_POST["num6"],$_POST["num7"], $_POST["num8"], $_POST["num9"], $_POST["num10"]];
    echo "<table>";
    echo "<tr>";
    echo "<td >El array completo</td>";
    echo "<td >" .implode(",",$nums) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td > El mayor</td>";
    echo "<td >" .max(...$nums) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td >El menor</td>";
    echo "<td >" . min(...$nums). "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td >La media</td>";
    $suma = array_sum($nums);
    $total= count($nums);
    echo "<td >" .($suma/$total). "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td >la Suma</td>";
    echo "<td >" . $suma. "</td>";
    echo "</tr>";


    echo "</table>";
}

?>


</body>
</html>