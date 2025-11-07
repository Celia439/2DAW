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
$menuPorDia = [
        'lunes' => [
                ['nombre' => '', 'tipo' => 'entrada', 'precio' => 0.00],
                ['nombre' => '', 'tipo' => 'entrada', 'precio' => 0.00]
        ]
];
foreach ($menuPorDia as $dia => $menus) {
    echo $dia;
    foreach ($menus as $plato) {
        echo $plato['nombre'];
        echo $plato['tipo'];
        echo $plato['precio'];
    }

}
?>
</body>
</html>