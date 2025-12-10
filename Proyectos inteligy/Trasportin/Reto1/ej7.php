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
$cine = [
    'cine' => [
        'sala1' => [
            ['nombre' => '', 'duracion' => 'entrada', 'precio' => 0.00],
            ['nombre' => '', 'duracion' => 'entrada', 'precio' => 0.00]
        ]
    ],
        'cine2' => [
                'sala1' => [
                        ['nombre' => '', 'duracion' => 'entrada', 'precio' => 0.00],
                        ['nombre' => '', 'duracion' => 'entrada', 'precio' => 0.00]
                ]
        ]
];
foreach ($cine as $sala => $peliculas) {
    echo $sala;
    foreach ($peliculas as $pelicula) {
      echo $pelicula;
    }

}
?>
</body>
</html>