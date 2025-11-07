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
<p>20.Crear un documento PHP que cree un array de distintos tipos de datos. El
    documento mostrará después para aquellos valores que sean numéricos,
    cuales son primos y cuales no lo son.
</p>
<?php
// Array con distintos tipos de datos
$elementos = array('lunes', 26, 'abichuelas', 20, 'uwu', 0.16, 'hola', 14);

foreach ($elementos as $elemento) {
    // Verificamos que sea un número entero mayor que 1
    if (is_numeric($elemento) && is_int($elemento + 0) && $elemento > 1) {
        $esPrimo = true;

        for ($i = 2; $i <= sqrt($elemento); $i++) {
            if ($elemento % $i == 0) {
                $esPrimo = false;
                break; // No hace falta seguir comprobando
            }
        }

        if ($esPrimo) {
            echo "El número $elemento es primo.<br>";
        } else {
            echo "El número $elemento no es primo.<br>";
        }

    } else {
        // Si no es número o no es entero mayor que 1
        echo "$elemento<br>";
    }
}
?>

</body>

</html>
