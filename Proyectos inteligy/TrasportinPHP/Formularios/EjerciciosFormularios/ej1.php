<!doctype html>
<html>
<head>

</head>
<body>
<h1>Primer formulario funcional</h1>
<h2>Ejercicio1</h2>

<form action="ej1.php" method="post">
    <input type="number" name="numero" placeholder="Potencias del uno al diez"/>
    <input type="submit">
</form>
<?php
$num = "";
if (isset($_POST["numero"]) && is_numeric($_POST["numero"])) {
    $num= $_POST["numero"];
    echo "<p>Las potencias de $num son:</p>";
    $potencia=$num;
    for($a=2;$a<=10;$a++){
    $potencia=pow($num,$a);

    echo "$num elevado a $a = $potencia<br>";
    $potencia=0;
    }

}
?>
</body>
</html>