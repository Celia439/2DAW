<!Doctype html>
<html>

<head>
    <title>ej4</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }

        table {
            margin-top: 2em;
            margin-left: 15%;
            background-color: palevioletred;
            border-collapse: collapse;
        }

        th {
            background-color: palevioletred;
            padding: 1em;
            border: papayawhip dashed 2px;
            color: white;


        }

        td {
            background-color: pink;
            text-align: center;
            border: papayawhip solid 2px;
            padding: 3px;
        }
    </style>
</head>

<body>
<?php
//      funciones
function generadorCodBarras()
{
    $contador = 8;
    $codigo = "";
    while ($contador > -1) {
        //strval para de num a string
        $codigo .= strval(mt_rand(0, 9));
        $contador--;
    }
    return $codigo;
}

//      datos

//a)Crea una matriz con 10 códigos de barras, cada uno formado por 8 dígitos
//aleatorios entre 0 y 9.

$codigos = [];

for ($i = 0; $i <= 10; $i++) {
    $codigos[$i] = generadorCodBarras();
}

//      cuerpo
//b)Crea una matriz con 10 códigos de barras, cada uno formado por 8 dígitos
//aleatorios entre 0 y 9.
?>
<table>
    <tr>
        <th>Códigos</th>
    </tr>
    <?php
    foreach ($codigos as $codigo) {
        echo "<tr><td>$codigo</td></tr>";
    }
    ?>
</table>
<?php
//c)Busca y muestra aquellos códigos que contienen el número 5 al menos 3
//veces.
$tresVecesCinco = [];
foreach ($codigos as $codigo) {
    $repetido = 0;
    for ($i = 0; $i < strlen($codigo); $i++) {
        if ($codigo[$i] === '5') {
            $repetido++;
        }
    }
    if ($repetido >= 3) {
        $tresVecesCinco[] = $codigo;
    }
    $repetido = 0;
}
// si solo hay uno o más mostrar un mensaje adecuado
if (isset($tresVecesCinco) && count($tresVecesCinco) == 1) {
    echo "<br>El código que repite el número 5 más de tres veces es :";
    echo "<br>" . $tresVecesCinco[0];
} elseif (isset($tresVecesCinco)) {
    echo "<br>Los códigos que repiten el número 5 más de tres veces son :";
    foreach ($tresVecesCinco as $codigoAct) {
        echo "<br>$codigoAct";
    }
}
?>
</body>

</html>
