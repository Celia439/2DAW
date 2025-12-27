<!doctype html>
<html>
<head>
</head>
<body>
<h2>Ejercicio2</h2>

<form action="ej2.php" method="get">
    <input type="number" name="numero" placeholder="La tabla de multiplicar del num"/>
    <input type="submit">
</form>
<?php
$num = "";
if (isset($_GET["numero"])) {
    $num = $_GET["numero"];
    $potencia = $num;
    for ($a = 0; $a <= 10; $a++) {
        echo "$num * $a = " . ($num * $a) . "<br>";
    }

}
?>
</body>
</html>