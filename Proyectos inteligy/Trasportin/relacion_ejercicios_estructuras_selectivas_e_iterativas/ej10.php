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
<p>10.Codificar una página en PHP que recorra los números desde el 260 hasta el
    110, mostrando sólo los números que sean múltiplos de 3 o de 2. Hacerlo
    utilizando los 3 tipos de bucles existentes en PHP
</p>

<h2>Múltiplos de 2 o 3 desde 260 hasta 110</h2>

<?php
echo "<h3>Con bucle FOR</h3>";
for ($i = 260; $i >= 110; $i--) {
    if ($i % 2 == 0 || $i % 3 == 0) {
        echo $i . "<br>";
    }
}

echo "<h3>Con bucle WHILE</h3>";
$i = 260;
while ($i >= 110) {
    if ($i % 2 == 0 || $i % 3 == 0) {
        echo $i . "<br>";
    }
    $i--;
}

echo "<h3>Con bucle DO...WHILE</h3>";
$i = 260;
do {
    if ($i % 2 == 0 || $i % 3 == 0) {
        echo $i . "<br>";
    }
    $i--;
} while ($i >= 110);
?>
</body>

</html>
