<!doctype html>
<html>
<head>

</head>
<body>
<h1>Ejercicio2</h1>
<form action="ej2.php" method="get">
    <label>
        <input type="number" name="numero1" placeholder="0" value="0"/>
    </label>
    <label>
        <input type="number" name="numero2" placeholder="0" value="0"/>
    </label>
    <input type="submit">
</form>
<?php
if (isset($_GET["numero1"]) && isset($_GET["numero2"])) {
    $num1 = $_GET["numero1"];
    $num2 = $_GET["numero2"];
    echo "$num1 + $num2 = ".($num1 + $num2)."<br>";
    echo "$num1 - $num2 = ".($num1 - $num2)."<br>";
    echo "$num1 * $num2 = ".($num1 * $num2)."<br>";
    if ($num2 != 0) {
        echo "$num1 / $num2 = "($num1 / $num2)."<br>";
    }else{
        echo "No puedes dividir con 0";
    }


}
?>
</body>
</html>