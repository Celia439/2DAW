<!DOCTYPE html>
<html>
<head>
    <title>array2</title>
    <style>
        table {
            background-color: white;
            font-family: cursive;
            border-collapse: collapse;
            border: darkseagreen 2px solid;
        }

        th {
            background-color: yellowgreen ;
            color: white;
            width: 23em;
            border-bottom: darkseagreen solid 2px ;

        }

        td {
            width: 23em;
            border-bottom: darkseagreen solid 2px ;
        }
    </style>
</head>
<body>
<?php
// declarar ciudades
$ciudades= [
    "Granada" => 150000,
    "Madrid" => 3000000,
    "Barcelona" => 2879200,
    "Málaga" => 240000,
    "Sevilla" => 500000,
    "Valencia" => 1584600,
    "Tarragona" => 485210
];
?>
<table>
    <tr>
        <th>Ciudad(nombre_posicion)</th>

        <th>Población(contenido)</th>
    </tr>
    <?php
    //ordenar ciudades por orden alfabético
    asort($ciudades);
    //Ordenar por cantidad de población
    ksort($ciudades);
    // imprimir las ciudades con los colores correspondientes
    $cambioColor=true;
    foreach ($ciudades as $ciudad => $poblacion){
        $estilo = $cambioColor ? "background-color: lightgreen;" : "";
        echo "<tr style=\"$estilo\">";
        echo "<td><b>$ciudad</b></td>";
        echo "<td>$poblacion</td>";
        echo "</tr>";
        $cambioColor = !$cambioColor;
    }
    ?>
</table>
<?php
// mostrar y buscar la ciudad con más población y la que menos
$mayorPoblacion = max($ciudades);
$menorPoblacion = min($ciudades);
$mayorPobl = array_search($mayorPoblacion, $ciudades, true);
$menorPobl = array_search($menorPoblacion, $ciudades, true);
echo "Ciudad con mayor población: " . $mayorPobl."<br>";
echo "Ciudad con menor población: " . $menorPobl;
?>
</body>
</html>
