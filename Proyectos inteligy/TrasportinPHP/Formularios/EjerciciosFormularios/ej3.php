<!doctype html>
<html>
<head>
</head>
<body>
<h2>Ejercicio3</h2>

<form action="ej3.php" method="post">
    <input type="number" name="numero1" placeholder="num"/>
    <input type="number" name="numero2" placeholder="num"/>
    <input type="number" name="numero3" placeholder="num"/>
    <input type="submit">
</form>
<?php
$primero = "";
$segundo = "";
$tercero = "";
if (isset($_POST["numero1"]) && isset($_POST["numero2"]) && isset($_POST["numero3"])) {

    $primero = $_POST["numero1"];
    $segundo = $_POST["numero2"];
    $tercero = $_POST["numero3"];
    /** funcion que hace lo mismo que sort
    echo "<table><tr>";
    $max = max([$primero, $segundo, $tercero]);
    $min = min([$primero, $segundo, $tercero]);
    echo "<td>$min</td>";
    if ($min < $segundo && $segundo < $max) {
        echo "<td>$segundo</td> ";
    }elseif ($min < $primero && $primero< $max) {
        echo "<td>$primero</td> ";
    }else{
        echo "<td>$tercero</td> ";
    }
    echo "<td>$max</td> ";

    echo "</tr></table>";

     */
    // opción más rapida
    $ordenados=[$primero,$segundo,$tercero];
    sort($ordenados);
    echo "<table>";
    echo "<tr>";
    foreach ($ordenados as $num){
        echo "<td>$num</td>";
    }
    echo "</tr>";
    echo "</table>";
}
?>
</body>
</html>