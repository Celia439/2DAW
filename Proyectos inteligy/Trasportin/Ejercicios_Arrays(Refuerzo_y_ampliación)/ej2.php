<!Doctype html>
<html>

<head>
    <title>ej2</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }

        table {
            margin-top: 2em;
            margin-left: 25%;
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
// Declarar un array secuencial de arrray asociatico que contienen los datos de cada jugador
$jugadores = [
        ['nombre' => 'Ana', 'partida1' => 10, 'partida2' => 15, 'partida3' => 20],
        ['nombre' => 'Luis', 'partida1' => 20, 'partida2' => 25, 'partida3' => 30],
        ['nombre' => 'Marta', 'partida1' => 15, 'partida2' => 10, 'partida3' => 5],
];
// a) Calcule la puntuación total de cada jugador
//dos formas
// buscar cada partida sin importar cuantas tenga el jugador(implicaría jugar con cadena de texto)
// o simplemente pillar los indices uno dos y tres de cada jugador
// almacenar en un array asociativo nombre y puntuacion total

$nombre_puntuacion = [];
$i = 0;
foreach ($jugadores as $jugador) {
    $nombre_puntuacion [$jugador['nombre']] = ($jugador['partida1'] + $jugador['partida2'] + $jugador['partida3']);
    $i++;
}
foreach ($nombre_puntuacion as $nombre => $maxpunt) {
    echo "$nombre max puntuacion $maxpunt <br>";
}
//b)Genere un ranking ordenado de mayor a menor según la puntuación total.
//  ordenar por valor inversamente arsort
arsort($nombre_puntuacion);
//c)Muestre el ranking en una tabla HTML con el nombre del jugador y su
//puntuación total.
// Simplemente mostrar en una tabla recorriendo el array asociativo
?>
<table>
    <tr>
        <th colspan="2">Ranking</th>
    </tr>
    <tr>
        <th>Nombre</th>
        <th>Puntuación total</th>
    </tr>
    <?php
foreach ($nombre_puntuacion as $nombre => $puntuacion){

    echo "<tr><td>$nombre</td><td>$puntuacion</td></tr>";
}
    ?>
</table>
</body>

</html>
