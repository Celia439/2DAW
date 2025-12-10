<!Doctype html>
<html>

<head>
    <title>Estructuras selectivas e iterativas</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }

    </style>
</head>

<body>
<p>8. Codificar una página en PHP que, utilizando los tres tipos de bucles, muestre
    por pantalla las 10 primeras potencias de un número.
</p>

<?php
$numero = 2;

echo "<h3> Con bucle FOR</h3>";
for ($i = 1; $i <= 10; $i++) {
    echo "$numero<sup>$i</sup> = " . pow($numero, $i) . "<br>";
}

echo "<h3>2 Con bucle WHILE</h3>";
$i = 1;
while ($i <= 10) {
    echo "$numero<sup>$i</sup> = " . pow($numero, $i) . "<br>";
    $i++;
}

echo "<h3>3 Con bucle DO...WHILE</h3>";
$i = 1;
do {
    echo "$numero<sup>$i</sup> = " . pow($numero, $i) . "<br>";
    $i++;
} while ($i <= 10);
?>


</body>

</html>
