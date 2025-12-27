<!doctype html>
<html>
<head>
    <style>
table{
    border-collapse: separate;
margin: 2em;
}
th{
    background-color: darkslateblue;
    padding-left:26em ;
    color: white;
    text-align: left;
}
td{
    background-color: #cbbaef;
}
th,td{
    padding: 15px;
}
    </style>
</head>
<body>
<h2>Ejercicio4</h2>

<form action="ej4.php" method="post">
    <input type="number" name="numero1" placeholder="num"/>
    <input type="number" name="numero2" placeholder="num"/>
    <input type="number" name="numero3" placeholder="num"/>
    <input type="submit">
</form>
<?php
//4. Programar una página en HTML – PHP que pida al usuario 3 número y muestre
//la siguiente tabla:
$primero = "";
$segundo = "";
$tercero = "";
if (isset($_POST["numero1"]) && isset($_POST["numero2"]) && isset($_POST["numero3"])) {
    $primero = $_POST["numero1"];
    $segundo = $_POST["numero2"];
    $tercero = $_POST["numero3"];
    echo "<table><tr><th>Valor1</th><td>$primero</td></tr>";
    echo "<tr><th>Valor2</th><td>$segundo</td></tr>";
    echo "<tr><th>Valor3</th><td>$tercero</td></tr>";
    echo "<tr><th>valor1+ valor2</th><td>" . ($primero + $segundo) . "</td></tr>";
    echo "<tr><th>valor2* valor3</th><td>" . ($tercero * $segundo) . "</td></tr>";
    if ($tercero != 0) {
        echo "<tr><th>valor1/ valor3</th><td>" . ($primero / $tercero) . "</td></tr>";
    } else {
        echo "<td>tercer valor = 0</td>";
    }
    echo "<tr><th>valor1+valor2+valor3</th><td>" . ($primero + $segundo + $tercero) . "</td></tr>";
    if ($primero != 0) {

        echo "<tr><th>(valor2+valor3)/1</th><td>" . (($segundo + $tercero) / $primero) . "</td></tr>";
    } else {
        echo "<td>primer valor = 0</td>";
    }

    echo "</tr></table>";
}
?>
</body>
</html>