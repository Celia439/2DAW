<!doctype html>
<html>
<head>
    <title>reto1</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td, th {
            padding: 1em;
            border: green dashed 3px;
        }
    </style>
</head>
<body>
<?php

$almacen = [
    'ficcion' => [
        [
            ['titulo' => 'Cien años de soledad', 'autor' => 'Gabriel García Márquez', 'anio_publicacion' => 1967, 'stock' => mt_rand(0, 10)],
            ['titulo' => '1984', 'autor' => 'George Orwell', 'anio_publicacion' => 1949, 'stock' => mt_rand(0, 10)],
            ['titulo' => 'El señor de los anillos', 'autor' => 'J. R. R. Tolkien', 'anio_publicacion' => 1954, 'stock' => mt_rand(0, 10)]
        ],
        [
            ['titulo' => 'Fahrenheit 451', 'autor' => 'Ray Bradbury', 'anio_publicacion' => 1953, 'stock' => mt_rand(0, 10)],
            ['titulo' => 'Crónica de una muerte anunciada', 'autor' => 'Gabriel García Márquez', 'anio_publicacion' => 1981, 'stock' => mt_rand(0, 10)],
            ['titulo' => 'El nombre del viento', 'autor' => 'Patrick Rothfuss', 'anio_publicacion' => 2007, 'stock' => mt_rand(0, 10)]
        ]
    ],
    'no_ficcion' => [
        [
            ['titulo' => 'Sapiens: De animales a dioses', 'autor' => 'Yuval Noah Harari', 'anio_publicacion' => 2011, 'stock' => mt_rand(0, 10)],
            ['titulo' => 'Educated', 'autor' => 'Tara Westover', 'anio_publicacion' => 2018, 'stock' => mt_rand(0, 10)],
            ['titulo' => 'El poder del ahora', 'autor' => 'Eckhart Tolle', 'anio_publicacion' => 1997, 'stock' => mt_rand(0, 10)]
        ],
        [
            ['titulo' => 'Los cuatro acuerdos', 'autor' => 'Don Miguel Ruiz', 'anio_publicacion' => 1997, 'stock' => mt_rand(0, 10)],
            ['titulo' => 'Hábitos atómicos', 'autor' => 'James Clear', 'anio_publicacion' => 2018, 'stock' => mt_rand(0, 10)],
            ['titulo' => 'Piensa rápido, piensa despacio', 'autor' => 'Daniel Kahneman', 'anio_publicacion' => 2011, 'stock' => mt_rand(0, 10)]
        ]
    ],
    'infantil' => [
        [
            ['titulo' => 'El principito', 'autor' => 'Antoine de Saint-Exupéry', 'anio_publicacion' => 1943, 'stock' => mt_rand(0, 10)],
            ['titulo' => 'Matilda', 'autor' => 'Roald Dahl', 'anio_publicacion' => 1988, 'stock' => mt_rand(0, 10)],
            ['titulo' => 'Alicia en el país de las maravillas', 'autor' => 'Lewis Carroll', 'anio_publicacion' => 1865, 'stock' => mt_rand(0, 10)]
        ]
    ]
];
$almacenAux = $almacen;
echo "<table>";

echo "<tr>";
echo "<th>Categoria</th><th>Titulo</th><th>Autor</th><th>Año de publicación</th><th>stock</th>";
echo "</tr>";
$totalEjemplares = 0;
foreach ($almacen as $seccion => $estanteria) {
    echo "<tr>";
    echo "<th>" . $seccion . "</th>";
    echo "</tr>";
    foreach ($estanteria as $productos) {
        foreach ($productos as $producto) {
            echo "<tr>";
            echo "<td></td>";
            echo "<td>" . $producto['titulo'] . "</td>";
            echo "<td>" . $producto['autor'] . "</td>";
            echo "<td>" . $producto['anio_publicacion'] . "</td>";
            echo "<td>" . $producto['stock'] . "</td>";
            $totalEjemplares += $producto['stock'];
            echo "</tr>";

        }
        echo "<tr><th>Nº Ejemplares</th> <td>$totalEjemplares</td></tr>";
    }
    $totalEjemplares = 0;
}
echo "</table>";


?>
</body>
</html>