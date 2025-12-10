<html>

<head>
    <title>Suma</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }
    </style>
</head>

<body>


<h1>7. Declara una variable con un valor (puede ser string, número o booleano).</h1>
<?php
$temperatura = 16.5;
?>
a) Si es numérica, multiplícala por 10.<br>
<?php
if (gettype($temperatura) != "int" || gettype($temperatura) != "float") {
    echo "Si es numérica<br>";
} else {
    echo "No es numérica<br>";
}
?>
b) Si es string, concatena el texto " - tipo string".<br>
<?php
if (is_string($temperatura)) {
    echo $temperatura . " tipo - string<br>";
} else {
    echo $temperatura . " tipo - no string<br>";
}
?>
c) Si es booleano, muestra "Es verdadero" o "Es falso".<br>
<?php
if (is_bool($temperatura)) {
    echo "Es verdadero<br>";
} else {
    echo "Es falso<br>";
}
?>

</body>

</html>
