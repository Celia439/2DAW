<!Doctype html>
<html>

<head>
    <title>Estructuras selectivas e iterativas</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }
        .rojo{
            background: red;
            color: white;
        }
        .rosa{
            background: blue;
            color: white;
        }
    </style>
</head>

<body>
<p>9. Crear un documento PHP que muestre por pantalla los múltiplos que existen
    de 7 desde 1 hasta 100. Hacerlo utilizando los 3 tipos de bucles que existen
    en PHP.
</p>
<h2>Múltiplos de 7 del 1 al 100</h2>

<?php
echo "<h3>Con bucle FOR</h3>";
for ($i = 1; $i <= 100; $i++) {
    if ($i % 7 == 0) {
        echo $i . "<br>";
    }
}

echo "<h3>Con bucle WHILE</h3>";
$i = 1;
while ($i <= 100) {
    if ($i % 7 == 0) {
        echo $i . "<br>";
    }
    $i++;
}

echo "<h3>Con bucle DO...WHILE</h3>";
$i = 1;
do {
    if ($i % 7 == 0) {
        echo $i . "<br>";
    }
    $i++;
} while ($i <= 100);
?>

</body>

</html>
