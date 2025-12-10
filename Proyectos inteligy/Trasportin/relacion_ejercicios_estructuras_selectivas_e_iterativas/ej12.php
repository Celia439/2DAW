<!Doctype html>
<html>

<head>
    <title>Estructuras selectivas e iterativas</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }
        .azul{
            background: blue;
            color: white;
        }
        .verde{
            background: green;
            color: white;
        }
        .rojo{
            background: red;
            color: white;
        }
    </style>
</head>

<body>
<p>12.Crea un array asociativo con nombre de un alumno y sus notas en los
    diferentes módulos. Muestra la nota de cada módulo con su nota. Al final,
    realiza la media de todos los módulos e indica si ha aprobado o no el ciclo.
    Nota: para generar las notas, puedes usar la función rand(min, max).
</p>



<?php
$alumno = [
    "nombre" => "Laura García",
        "Programación" => rand(0, 10),
        "Bases de datos" => rand(0, 10),
        "Sistemas" => rand(0, 10),
        "Entornos de desarrollo" => rand(0, 10),
        "Lenguajes de marcas" => rand(0, 10)

];
echo "Notas de " . $alumno["nombre"] . ":<br>";
$total = 0;
$contador = 0;
foreach ($alumno as $clave => $valor) {
    if ($clave != "nombre") {
        echo "$clave: $valor<br>";
        $total += $valor;
        $contador++;
    }
}
$media = $total / $contador;
echo "<br>Media: " . number_format($media, 2) . "<br>";

// Indicar si aprueba o no
if ($media >= 5) {
    echo " Ha aprobado el ciclo.";
} else {
    echo " Ha suspendido el ciclo.";
}
?>
</body>

</html>
