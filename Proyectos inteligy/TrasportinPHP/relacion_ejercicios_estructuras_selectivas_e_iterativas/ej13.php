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
<p>13.Usando un array de números, muestra cuál es el mayor y el menor sin usar
    max() ni min().
</p>

<?php
$numeros = [rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10)];
$minimo=1;
$maximo=9;
foreach ($numeros as $numero) {
    if ($numero >$maximo) {
        $maximo=$numero;
    }
    if($numero<$minimo){
        $minimo=$numero;
    }
}
echo "mimimo $minimo <br>";
echo "maximo $maximo";
?>
</body>

</html>
