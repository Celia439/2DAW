<!DOCTYPE html>
<html>
<head>
    <title>Condicionales</title>
</head>
<body>
<?php
$primero = 15;
$segundo = 80;
$tercero = 60;
if ($primero > $segundo && $primero > $segundo) {
    echo $primero . " es el más grande de los tres";
} elseif ($segundo > $primero && $segundo > $tercero) {
    echo $segundo . " es el más grande de los tres";
} elseif ($tercero > $primero && $tercero > $segundo) {
    echo $tercero . " es el más grande de los tres";
} else {
    echo "dos o tres numeros son iguales no hay uno solo que sea el mayor :(";
}
?>

</body>
</html>
