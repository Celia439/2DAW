<!DOCTYPE html>
<html>
<head>
    <title>array4</title>
    <style>
        table {
            background-color: white;
            font-family: cursive;
            border-collapse: collapse;
            border-bottom: black solid 3px;

        }

        th {
            background-color: orange;
            color: white;
            width: 10em;
            border-top: black solid 3px;
            border-bottom: black solid 3px;
            text-align: left;
        }

        td {
            width: 10em;
        }
    </style>
</head>
<body>
<?php
// array con array asociativo con alumnos y notas ( urgente cambiar la fila)
$mascotas = [
        [
                "nombre" => "Pepe",
                "peso" => 4.5,
                "color" => "Marrón",
                "edad" => 12
        ],
        [
                "nombre" => "Sparky",
                "peso" => 3,
                "color" => "Blanco",
                "edad" => 2
        ],
        [
                "nombre" => "Tobby",
                "peso" => 7.2,
                "color" => "Beige",
                "edad" => 8
        ],
        [
                "nombre" => "Bigotes",
                "peso" => 4,
                "color" => "Negro",
                "edad" => 9
        ],
        [
                "nombre" => "Ricky",
                "peso" => 0.1,
                "color" => "Verde",
                "edad" => 2
        ]
];
?>

<table>
    <tr>
        <th style="background-color: green ; color: white">fila</th>
        <th>Nombre</th>
        <th>Peso</th>
        <th>Color</th>
        <th>Edad</th>
    </tr>
    <?php
    // recorrer los alumnos e imprimir sus notas con su estilo
    $cambioColor = true;
    $fila = 0;
    foreach ($mascotas as $mascota) {
        $estilo = $cambioColor ? "background-color: grey;" : "";
        echo "<tr style=\"$estilo\">";
        echo "<td style=\" background-color: green; color: white;\">$fila</td>";
        echo "<td>{$mascota["nombre"]}</td>";
        echo "<td>{$mascota["peso"]}</td>";
        echo "<td>{$mascota["color"]}</td>";
        echo "<td>{$mascota["edad"]}</td>";
        echo "</tr>";
        $cambioColor = !$cambioColor;
        $fila++;
    }
    ?>
</table>
<?php
// acceder a la mascota 3 el peso
echo "-Mostrar sólo el peso de la mascota con código “3” <br>";
echo $mascotas[3]["peso"] . "<br>";
// solo el color del que se llama sparki
echo "-Mostrar sólo el color de la mascota de nombre Sparky <br>";
$encontada = true;
$caja = 0;
while ($encontada && $caja < count($mascotas)) {
    if ($mascotas[$caja]["nombre"] === "Sparky") {
        echo "El color de Sparki es " . $mascotas[$caja]["color"] . "<br>";
        $encontada = false;
    } else {
        $caja++;
    }
}

// todos los datos de la mascota mas viejo
echo "-Mostrar todos los datos de la mascota más mayor.<br>";
$perroMasViejo = -1;
$masViejo = 0;
$indice = 0;
foreach ($mascotas as $mascota) {
    if ($mascota["edad"] > $masViejo) {
        $masViejo = $mascota["edad"];
        $perroMasViejo = $indice;
        $indice++;
    }
    $indice++;
}
echo "Mascota más vieja<br>";
echo $mascotas[$perroMasViejo]["nombre"] . "<br>";
echo $mascotas[$perroMasViejo]["peso"] . "<br>";
echo $mascotas[$perroMasViejo]["color"] . "<br>";
echo $mascotas[$perroMasViejo]["edad"] . "<br>";
// nombre de la mascota que pesa menos
echo "-Mostrar el nombre de la mascota que pesa menos<br>";
$perroPesaMenos = -1;
$menosPesado = 1000;
$indice = 0;
foreach ($mascotas as $mascota) {
    if ($mascota["peso"] < $menosPesado) {
        $menosPesado = $mascota["peso"];
        $perroPesaMenos = $indice;
        $indice++;
    }
    $indice++;
}
echo $mascotas[$perroPesaMenos]["nombre"] . "<br>";
?>
</body>
</html>
