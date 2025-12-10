<!DOCTYPE html>
<html>
<head>
    <title>array3</title>
    <style>
        table {
            background-color: white;
            font-family: cursive;
            border-collapse: collapse;
        }

        th {
            background-color: blueviolet;
            width: 10em;
        }

        td {
            width: 10em;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
// array con array asociativo con alumnos y notas
$alumnos = [
    [
        "Nombre" => "Alejandro",
        "Matematicas" => 5,
        "Lengua" => 6.5,
        "Ciencias_naturales" => 7.3,
        "Geografia" => 8.1
    ],
    [
        "Nombre" => "Álvaro",
        "Matematicas" => 4.8,
        "Lengua" => 5.5,
        "Ciencias_naturales" => 6.2,
        "Geografia" => 7.0
    ],
    [
        "Nombre" => "Juanfri",
        "Matematicas" => 7.5,
        "Lengua" => 6.8,
        "Ciencias_naturales" => 8.4,
        "Geografia" => 7.2
    ],
    [
        "Nombre" => "Celia",
        "Matematicas" => 9.1,
        "Lengua" => 8.7,
        "Ciencias_naturales" => 9.4,
        "Geografia" => 9.0
    ],
    [
        "Nombre" => "Fran",
        "Matematicas" => 6.3,
        "Lengua" => 5.9,
        "Ciencias_naturales" => 7.0,
        "Geografia" => 6.8
    ],
    [
        "Nombre" => "Adrián",
        "Matematicas" => 8.4,
        "Lengua" => 7.6,
        "Ciencias_naturales" => 8.9,
        "Geografia" => 8.3
    ],
    [
        "Nombre" => "Diego",
        "Matematicas" => 5.2,
        "Lengua" => 6.1,
        "Ciencias_naturales" => 5.8,
        "Geografia" => 6.4
    ],
    [
        "Nombre" => "Paula",
        "Matematicas" => 9.0,
        "Lengua" => 9.5,
        "Ciencias_naturales" => 9.7,
        "Geografia" => 9.2
    ],
    [
        "Nombre" => "Julio",
        "Matematicas" => 7.1,
        "Lengua" => 7.4,
        "Ciencias_naturales" => 7.8,
        "Geografia" => 7.6
    ],
    [
        "Nombre" => "Ignacio",
        "Matematicas" => 6.0,
        "Lengua" => 6.5,
        "Ciencias_naturales" => 6.9,
        "Geografia" => 7.1
    ]
];
?>

<table>
    <tr>
        <th>Alumno</th>
        <th>Matemáticas</th>
        <th>Lengua</th>
        <th>Ciencias Naturales</th>
        <th>Geografía</th>
        <th>Media</th>
    </tr>
    <?php
    // recorrer los alumnos e imprimir sus notas con su estilo
    $media=0;
    $cambioColor=true;
    foreach ($alumnos as $alumno ){
        $estilo = $cambioColor ? "background-color: grey;" : "";
        echo "<tr style=\"$estilo\">";
        echo "<td style=\" background-color: blueviolet; color: white; text-align: left\">{$alumno["Nombre"]}</td>";
        echo "<td>{$alumno["Matematicas"]}</td>";
        echo "<td>{$alumno["Lengua"]}</td>";
        echo "<td>{$alumno["Ciencias_naturales"]}</td>";
        echo "<td>{$alumno["Geografia"]}</td>";
        $cambioColor = !$cambioColor;
        //calcular media
        $media = ($alumno["Matematicas"] + $alumno["Lengua"] + $alumno["Ciencias_naturales"] + $alumno["Geografia"]) / 4;
        echo "<td>".number_format($media,3)."</td>";}
        echo "</tr>";
    ?>
</table>
</body>
</html>
